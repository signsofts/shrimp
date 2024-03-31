<!DOCTYPE html>
<html lang="en">

<?php
$title = 'หน้าหลัก';
?>

<head>
    <?php include ("inc/head.php") ?>



</head>

<body>
    <?php include ("inc/header_login.php") ?>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center">
                <h1 class="display-5 mb-5">เข้าสู่ระบบ</h1>
            </div>

            <div class="card">
                <div class="card-body p-5">
                    <form action="./index.php" method="post">
                        <div class="row g-3 p-5">
                            <div class="col-12 col-sm-12">
                                <label for="">ชื่อผู้ใช้งาน</label>
                                <input type="text" class="form-control border-0" placeholder="ชื่อผู้ใช้"
                                    name="AD_USERNAME" value="admin" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="">รหัสผ่าน</label>

                                <input type="password" class="form-control border-0" name="AD_PASSWORD"
                                    placeholder="รหัสผ่าน" value="admin" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">เข้าสู่ระบบ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <?php include ("inc/footer.php") ?>

    <script src="js/index.js"></script>

</body>

</html>