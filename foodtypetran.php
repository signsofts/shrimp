<!DOCTYPE html>
<html lang="en">

<?php
$title = 'หน้าหลัก';
$activeFood = 'active';

$FT_ID = isset($_GET['FT_ID']) ? $_GET['FT_ID'] : null;

if ($FT_ID == null) {
    echo "<script>alert('กรุณาคลิกที่รายการ')</script>";
    echo "<script>setTimeout(() => {location.assign('./foodtype.php');}, 500);</script>";
}

?>

<head>
    <?php include("inc/head.php") ?>
</head>

<body>
    <?php include("inc/header.php") ?>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-0">ประวัติสต็อก</h1>
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
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modalAdd" class="btn btn-primary py-3 px-5 mb-4">นำเข้าอาหาร</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <table id="mainMList" class=" table table-bordered"  style="width: 100%; ">
                        <thead>
                            <tr>
                                <th style="width: 1%;">ลำดับ</th>
                                <th style="width: 5%;">วันที่นำเข้า</th>
                                <th style="width: 10%;">ประเภท</th>
                                <th style="width: 5%;">จำนวน</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php $Sum = 0; ?>
                            <!-- get ค่าข้อมูล อาหาร มาแสดง  -->
                            <?php foreach (Database::query("SELECT * FROM `shr_foodtypetran` WHERE FT_ID ='$FT_ID'", PDO::FETCH_OBJ) as $key => $item) : ?>
                                <tr>
                                    <td>
                                        <?php echo $key + 1; ?>
                                    </td>
                                    <td>

                                        <?php echo date("d-m-Y",strtotime($item->FTT_DATE)) ;?>
                                    </td>
                                    <td>
                                        <?php echo $item->FTT_TYPE == '1'  ? " <span class='text-success'>นำเข้า</span>" : "<span class='text-danger'>ใช้ไป</span>"; ?>
                                    </td>

                                    <td>

                                        <?php echo $item->FTT_ITEM ?>
                                    </td>

                                </tr>

                            <?php endforeach; ?>


                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>


    <!-- ป็อบอัพแสดงการเพิ่มอาหาร -->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form-add" action="javascript:void(0);" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddLabel">นำเข้าอาหาร</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="FT_ID" value="<?php echo $FT_ID ?>">
                        <input type="hidden" name="FTT_TYPE" value="1">
                        
                        <div class="row g-3">
                            <div class="col-12 col-sm-12">
                                <label for="">วันที่นำเข้า</label>
                                <input type="date" class="form-control border-0" name="FTT_DATE" required style="height: 55px;">
                            </div>

                            <div class="col-12 col-sm-12">
                                <label for="">จำนวน</label>
                                <input type="number" class="form-control border-0" name="FTT_ITEM" placeholder="จำนวนอาที่นำเข้า" value=0" min="1" required style="height: 55px;">
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center  ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>

            </div>
        </div>
    </div>





    <?php include("inc/footer.php") ?>

    <!-- https://code.jquery.com/jquery-3.7.1.js
https://cdn.datatables.net/2.0.3/js/dataTables.js
https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js
https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js
https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js

https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js

 -->


    <!-- <script src="js/index.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script> -->
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>


    <script>
        const mainMLists = new DataTable('#mainMList', {
            // responsive: true,
            ordering: false,
            searching: true,
            "sScrollX": '100%',
            // layout: {
            //     topStart: {
            //         buttons: [
            //             {
            //                 extend: 'print',
            //                 exportOptions: {
            //                     columns: [0, 1, 2, 4, 5, 6, 7]
            //                 }
            //             },
            //             {
            //                 extend: 'excel',
            //                 exportOptions: {
            //                     columns: [0, 1, 2, 4, 5, 6, 7]
            //                 }
            //             },
            //         ]
            //     }
            // }
        });
    </script>

    <script>
        const deleteBtn = (ID) => {
            fetch('./col_delete_foodtype.php?ID=' + ID, {
                method: "POST",
                body: JSON.stringify(),
            }).then(r => r.json()).then(res => {
                if (res) {
                    alert("บันทึกข้อมูลสำเร็จ");
                    location.reload();
                } else {
                    alert("บันทึกข้อมูลไม่สำเร็จ");
                }
            });
        }
        document.getElementById('form-add').addEventListener('submit', (e) => {

            e.preventDefault();
            let ev = e.target;
            fetch('./col_add_foodtypetran.php', {
                method: "POST",
                body: new FormData(ev),
            }).then(r => r.json()).then(res => {
                if (res) {
                    alert("บันทึกข้อมูลสำเร็จ");
                    location.reload();
                } else {
                    alert("บันทึกข้อมูลไม่สำเร็จ");
                }
            });

        });
    </script>
</body>

</html>