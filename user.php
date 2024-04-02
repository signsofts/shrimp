<!DOCTYPE html>
<html lang="en">

<?php
$title = 'จัดการผู้ใช้งาน';
$activeUser = 'active';

?>

<head>
    <?php include ("inc/head.php") ?>
</head>

<body>
    <?php include ("inc/header.php") ?>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-0">จัดการผู้ใช้งาน</h1>
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
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modalAdd"
                                class="btn btn-primary py-3 px-5 mb-4">เพิ่มอาหาร</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <table id="mainMList" class=" table table-bordered" style="width: 100%; ">
                        <thead>
                            <tr>
                                <th style="width: 1%;">ลำดับ</th>
                                <th style="width: 10%;">ชื่อ</th>
                                <th style="width: 5%;">UserName</th>
                                <th style="width: 5%;">PassWord</th>
                                <th style="width: 5%;">จัดการ</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php $Sum = 0; ?>
                            <!-- get ค่าข้อมูล อาหาร มาแสดง  -->
                            <?php foreach (Database::query("SELECT * FROM `shr_admin` WHERE AD_NAME != 'admin'", PDO::FETCH_OBJ) as $key => $item): ?>
                                <tr>
                                    <td>
                                        <?php echo $key + 1; ?>
                                    </td>
                                    <td>
                                        <?php echo $item->AD_NAME; ?>
                                    </td>
                                    <td>
                                        <?php echo $item->AD_USERNAME ?>
                                    </td>
                                    <td>
                                        <?php echo $item->AD_PASSWORD ?>
                                    </td>
                                    <td>
                                        <!-- เรียกโมเดลแสดงหน้าแก้ไข  -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit-<?php echo $item->AD_ID; ?>"> แก้ไข </button>


                                        <!-- เมื่อคลิกเรียนใช้ Fn deleteBtn()-->
                                        <button type="button" class="btn btn-secondary"
                                            onclick="deleteBtn('<?php echo $item->AD_ID; ?>')"> ลบ </button>

                                    </td>

                                    <!-- modal แก้ไข ข้อมูล อาหาร  -->
                                    <div class="modal fade" id="modalEdit-<?php echo $item->AD_ID; ?>" tabindex="-1"
                                        aria-labelledby="modalAddLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form id="form-edit-<?php echo $item->AD_ID; ?>"
                                                    action="javascript:void(0);" method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalAddLabel">แก้ไขข้อมูล</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <input type="hidden" class="form-control border-0" name="AD_ID"
                                                            placeholder="" value="<?php echo $item->AD_ID; ?>">
                                                        <div class="row g-3">
                                                            <div class="col-12 col-sm-12">
                                                                <label for="">ชื่อ</label>
                                                                <input type="text" class="form-control border-0"
                                                                    name="AD_NAME" placeholder=""
                                                                    value="<?php echo $item->AD_NAME; ?>" required
                                                                    style="height: 55px;">
                                                            </div>
                                                            <div class="col-12 col-sm-12">
                                                                <label for="">UserName</label>
                                                                <input type="text" class="form-control border-0"
                                                                    name="AD_USERNAME" placeholder=""
                                                                    value="<?php echo $item->AD_USERNAME; ?>" required
                                                                    style="height: 55px;">
                                                            </div>
                                                            <div class="col-12 col-sm-12">
                                                                <label for="">PassWord</label>
                                                                <input type="text" class="form-control border-0"
                                                                    name="AD_PASSWORD" placeholder=""
                                                                    value="<?php echo $item->AD_PASSWORD; ?>" required
                                                                    style="height: 55px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center  ">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">ปิด</button>
                                                        <button type="submit" class="btn btn-primary">บันทึก</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    <script>

                                        // Fn เมือกดบันทึก ปุ่ม แก้ไข ข้อมูล 
                                        document.getElementById('form-edit-<?php echo $item->AD_ID; ?>').addEventListener('submit', (e) => {

                                            e.preventDefault();
                                            let ev = e.target;
                                            fetch('./col_edit_usertype.php', { // ส่งข้อมูลไปยังหน้า col_edit_usertype.php
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
                        <h5 class="modal-title" id="modalAddLabel">เพิ่มผู้ใช้งาน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row g-3">
                            <div class="col-12 col-sm-12">
                                <label for="">ชื่อ</label>
                                <input type="text" class="form-control border-0" name="AD_NAME" placeholder="" value=""
                                    required style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="">UserName</label>
                                <input type="text" class="form-control border-0" name="AD_USERNAME" placeholder=""
                                    required style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="">PassWord</label>
                                <input type="text" class="form-control border-0" name="AD_PASSWORD" placeholder=""
                                    required style="height: 55px;">
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





    <?php include ("inc/footer.php") ?>

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
            fetch('./col_delete_usertype.php?ID=' + ID, {
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
            fetch('./col_add_usertype.php', {
                method: "POST",
                body: new FormData(ev),
            }).then(r => r.json()).then(res => {
                if (res) {
                    alert("บันทึกข้อมูลสำเร็จ");
                    location.reload();
                } else {
                    alert("กรุณาตรวจสอบข้อมูล ซ้ำ");
                }
            });

        });

    </script>
</body>

</html>