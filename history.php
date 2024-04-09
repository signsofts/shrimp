<!DOCTYPE html>
<html lang="en">

<?php
$title = 'หน้าหลัก';
$activeHistory = 'active';

?>

<head>
    <?php include ("inc/head.php") ?>
</head>

<body>
    <?php include ("inc/header.php") ?>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-0">ประวัติการเลี้ยงกุ้ง</h1>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <!-- <h1 class="display-5 mb-5">เลือกบ่อกุ้ง</h1> -->
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col d-flex justify-content-end">
                            <!-- <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modalAdd"
                                class="btn btn-primary py-3 px-5 mb-4">เปิดบ่อกุ้งใหม่</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <table id="mainMList" class=" table table-bordered" style="width: 100%; ">
                        <thead>
                            <tr>
                                <th style="width: 1%;">ลำดับ</th>
                                <th style="width: 10%;">บ่อกุ้ง</th>
                                <th style="width: 10%;">สายพันธุ์กุ้ง</th>
                                <th>วันที่เปิดบ่อ</th>
                                <th>วันที่จับกุ้ง</th>
                                <th>รายจ่าย / บาท</th>
                                <th>รายรับ / บาท</th>
                                <th style="width: 20%;">กำไร</th>
                                <th style="width: 5%;">รายละเอียด</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php $Sum = 0; ?>
                            <?php foreach (Database::query("SELECT * FROM `shr_infoshrimp`
                                                    INNER JOIN shr_pond ON shr_infoshrimp.PON_ID = shr_pond.PON_ID 
                                                    INNER JOIN shr_breed ON shr_infoshrimp.BRE_ID = shr_breed.BRE_ID ;
                                                    ", PDO::FETCH_OBJ) as $key => $item): ?>

                                <?php

                                $SumIn = Database::squery("SELECT SUM(ML_AMOUNT) as ML_AMOUNT FROM `shr_moneylist`
                                    WHERE shr_moneylist.ISP_ID = '$item->ISP_ID' AND ML_TYPE = '1'  ORDER BY shr_moneylist.ML_STAMP DESC ", PDO::FETCH_OBJ, false)->ML_AMOUNT;
                                $SumOut = Database::squery("SELECT SUM(ML_AMOUNT) as ML_AMOUNT FROM `shr_moneylist`
                                    WHERE shr_moneylist.ISP_ID = '$item->ISP_ID' AND ML_TYPE = '0'  ORDER BY shr_moneylist.ML_STAMP DESC ", PDO::FETCH_OBJ, false)->ML_AMOUNT;

                                ?>
                                <tr>
                                    <td>
                                        <?php echo $key + 1; ?>
                                    </td>
                                    <td>
                                        <?php echo $item->PON_NAME; ?>
                                    </td>
                                    <td>
                                        <?php echo $item->BRE_NAME ?>
                                    </td>
                                    <td>
                                        <?php echo date("d/m/Y", strtotime($item->ISP_START)) ?>
                                    </td>
                                    <td>
                                        <?php echo date("d/m/Y", strtotime($item->ISP_END)) ?>
                                    </td>
                                    <td>
                                        <?php echo $SumIn; ?>
                                    </td>
                                    <td>
                                        <?php echo $SumOut; ?>
                                    </td>
                                    <td>
                                        <?php $Sum += (int) $SumIn - (int) $SumOut; ?>
                                        <?php echo (int) $SumIn - (int) $SumOut; ?>
                                    </td>
                                    <td>
                                        <a href="./infoshrimp.php?ISP_ID=<?php echo $item->ISP_ID ?>">ดูรายละเอียด</a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h4>ผลกำไร</h4>

                                </td>
                                <td>
                                    <h4>
                                        <?php echo $Sum; ?>
                                    </h4>
                                </td>
                                <td></td>

                            </tr>
                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>


    <?php include ("inc/footer.php") ?>

    <!-- https://code.jquery.com/jquery-3.7.1.js
https://cdn.datatables.net/2.0.3/js/dataTables.js
https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js
https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js
https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js

https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js

 -->


    <script src="js/index.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script> -->
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>




    <script>
        const mainMLists = new DataTable('#mainMList', {
            // responsive: true,
            ordering: false,
            searching: true,
            "sScrollX": '100%',
            layout: {
                topStart: {
                    buttons: [
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: [0, 1, 2, 4,5,6,7]
                            }
                        },
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: [0, 1, 2, 4,5,6,7]
                            }
                        },
                    ]
                }
            }
        });

    </script>
</body>

</html>