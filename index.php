<!DOCTYPE html>
<html lang="en">

<?php
$title = 'หน้าหลัก';
$activeHome = 'active';
?>

<head>
    <?php include ("inc/head.php") ?>
</head>

<body>
    <?php include ("inc/header.php") ?>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-0">บ่อกุ้ง</h1>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-4 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <?php $c1 = Database::squery("SELECT * FROM `shr_pond` WHERE (PON_STATUS IS NULL OR PON_STATUS = '1') AND PON_DELETE IS NULL ", PDO::FETCH_OBJ, true) ?>
                        <h1 class="display-1 text-primary mb-0">
                            <?php echo sprintf("%02d", count($c1)) ?>
                        </h1>
                    </div>
                    <h5>บ่อกุ้งทั้งหมด</h5>
                </div>
                <div class="col-md-4 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <?php $c1 = Database::squery("SELECT * FROM `shr_pond` WHERE PON_STATUS IS NULL AND PON_DELETE IS NULL", PDO::FETCH_OBJ, true) ?>
                        <h1 class="display-1 text-warning mb-0">
                            <?php echo sprintf("%02d", count($c1)) ?>
                        </h1>
                    </div>
                    <h5>บ่อกุ้งที่ว่าง</h5>
                </div>
                <div class="col-md-4 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <?php $c1 = Database::squery("SELECT * FROM `shr_pond` WHERE PON_STATUS = '1' AND PON_DELETE IS NULL ", PDO::FETCH_OBJ, true) ?>
                        <h1 class="display-1 text-success mb-0">
                            <?php echo sprintf("%02d", count($c1)) ?>
                        </h1>
                    </div>
                    <h5>บ่อกุ้งที่กำลังเลี้ยง</h5>
                </div>
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
                                class="btn btn-primary py-3 px-5 mb-4">เปิดบ่อกุ้งใหม่</a>
                        </div>
                    </div>
                </div>
                <?php foreach (Database::query("SELECT * FROM `shr_infoshrimp`
                INNER JOIN shr_pond ON shr_infoshrimp.PON_ID = shr_pond.PON_ID 
                INNER JOIN shr_breed ON shr_infoshrimp.BRE_ID = shr_breed.BRE_ID 
                WHERE shr_infoshrimp.ISP_END IS NULL;
                ", PDO::FETCH_OBJ) as $key => $item): ?>
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s" style="cursor: pointer ;">
                        <a class="service-item" href="./infoshrimp.php?ISP_ID=<?php echo $item->ISP_ID ?>">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="img/BRE/<?php echo $item->BRE_IMG ?>" alt="">
                            </div>
                            <div class="p-4 text-center border border-5 border-light border-top-0">
                                <h4 class="mb-2">
                                    ชื่อบ่อ :
                                    <?php echo $item->PON_NAME ?>
                                </h4>
                                <h4 class="mb-2">
                                    สายพันธุ์ :
                                    <?php echo $item->BRE_NAME ?>
                                </h4>

                                <p>เปิดบ่อ :
                                    <?php echo date("d/m/Y", strtotime($item->ISP_START)) ?>
                                </p>
                                <a class="fw-medium" href="">บันทึกข้อมูลบ่อกุ้ง<i class="fa fa-arrow-right ms-2"></i></a>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- form-add ไปทำงาน ที่ไฟล์ index.js  js/index.js-->
                <form id="form-add" action="javascript:void(0);" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddLabel">เปิดบ่อกุ้งใหม่</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12 col-sm-12">
                                <label for="">บ่อกุ้ง</label>
                                <select class="form-select border-0" style="height: 55px;" name="PON_ID" required>
                                    <option value="" selected>เลือก</option>
                                    <!-- ค้นหาบ่กุ้งที่ว่า -->
                                    <?php foreach (Database::query("SELECT * FROM `shr_pond` WHERE PON_STATUS IS NULL  AND PON_DELETE IS NULL ; ", PDO::FETCH_OBJ) as $key => $item): ?>
                                        <option value="<?php echo $item->PON_ID ?>">
                                            <?php echo $item->PON_NAME ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="">สายพันธุ์กุ้ง</label>
                                <select class="form-select border-0" style="height: 55px;" name="BRE_ID" required>
                                    <option value="" selected>เลือก</option>
                                    <!-- ค้นหาสายพันธุ์กุ้ง -->
                                    <?php foreach (Database::query("SELECT * FROM `shr_breed` WHERE BRE_STATUS IS NULL;", PDO::FETCH_OBJ) as $key => $item): ?>
                                        <option value="<?php echo $item->BRE_ID ?>">
                                            <?php echo $item->BRE_NAME ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="">วันที่เปิดบ่อ</label>
                                <input type="date" class="form-control border-0" name="ISP_START" placeholder=""
                                    required style="height: 55px;">
                            </div>

                            <div class="col-12">
                                <label for="">รายละเอียดเปิดบ่ใหม่</label>
                                <textarea class="form-control border-0" name="ISP_NOTE" placeholder="Note"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center  ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">เปิดบ่อกุ้งใหม่</button>
                    </div>
                </form>

                <script>


                </script>
            </div>
        </div>
    </div>

    <?php include ("inc/footer.php") ?>

    <script src="js/index.js"></script>

</body>

</html>