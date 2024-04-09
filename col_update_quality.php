<?php include("config/connectdb.php");
// header('Content-type: application/json; charset=utf-8');

$QY_ID = $_POST["QY_ID"];

$item = new stdClass();

// ดึกข้อมูลปัจจุบัน 
$sql = "SELECT * FROM `shr_quality`
WHERE shr_quality.QY_ID = '$QY_ID'";
$item = Database::squery($sql, PDO::FETCH_OBJ, false);


$FT_ID = $_POST["FT_ID"];
$SUMFT  = (int) Database::query("SELECT  SUM(FTT_ITEM) AS SUM  FROM `shr_foodtypetran` WHERE FTT_TYPE = '1' AND FT_ID ='$FT_ID'", PDO::FETCH_OBJ)->fetch(PDO::FETCH_OBJ)->SUM - (int) Database::query("SELECT SUM(FTT_ITEM) AS SUM FROM `shr_foodtypetran` WHERE  FTT_TYPE = '0' AND FT_ID ='$FT_ID'", PDO::FETCH_OBJ)->fetch(PDO::FETCH_OBJ)->SUM;

if (isset($_POST["QY_FEED_1"])) {
        if ($SUMFT < $_POST["QY_FEED_1"]) {
                echo "<script>alert('แจ้งเตือนอาหารในคลังหมด คงเหลือ $SUMFT Kg.')</script>";
                echo "<script>location.assign('./infoshrimp.php?ISP_ID=$item->ISP_ID')</script>";
                exit;
        }
}

if (isset($_POST["QY_FEED_2"])) {
        if ($SUMFT < $_POST["QY_FEED_2"]) {
                echo "<script>alert('แจ้งเตือนอาหารในคลังหมด คงเหลือ $SUMFT Kg.')</script>";
                echo "<script>location.assign('./infoshrimp.php?ISP_ID=$item->ISP_ID')</script>";
                exit;
        }
}
if (isset($_POST["QY_FEED_2"])) {
        if ($SUMFT < $_POST["QY_FEED_2"]) {
                echo "<script>alert('แจ้งเตือนอาหารในคลังหมด คงเหลือ $SUMFT Kg.')</script>";
                echo "<script>location.assign('./infoshrimp.php?ISP_ID=$item->ISP_ID')</script>";
                exit;
        }
}
if (isset($_POST["QY_FEED_3"])) {
        if ($SUMFT < $_POST["QY_FEED_3"]) {
                echo "<script>alert('แจ้งเตือนอาหารในคลังหมด คงเหลือ $SUMFT Kg.')</script>";
                echo "<script>location.assign('./infoshrimp.php?ISP_ID=$item->ISP_ID')</script>";
                exit;
        }
}

if (isset($_POST["QY_FEED_4"])) {
        if ($SUMFT < $_POST["QY_FEED_4"]) {
                echo "<script>alert('แจ้งเตือนอาหารในคลังหมด คงเหลือ $SUMFT Kg.')</script>";
                echo "<script>location.assign('./infoshrimp.php?ISP_ID=$item->ISP_ID')</script>";
                exit;
        }
}
if (isset($_POST["QY_FEED_5"])) {
        if ($SUMFT < $_POST["QY_FEED_5"]) {
                echo "<script>alert('แจ้งเตือนอาหารในคลังหมด คงเหลือ $SUMFT Kg.')</script>";
                echo "<script>location.assign('./infoshrimp.php?ISP_ID=$item->ISP_ID')</script>";
                exit;
        }
}
if (isset($_POST["QY_FEED_6"])) {
        if ($SUMFT < $_POST["QY_FEED_6"]) {
                echo "<script>alert('แจ้งเตือนอาหารในคลังหมด คงเหลือ $SUMFT Kg.')</script>";
                echo "<script>location.assign('./infoshrimp.php?ISP_ID=$item->ISP_ID')</script>";
                exit;
        }
}



    

// echo $SUMFT;
// if (isset($_POST["QY_FEED_6"])) {
//         $ISP_ID = $item->ISP_ID;
//         $FT_PRICE = $_POST["FT_PRICE"];
//         $QY_AGE = $_POST["QY_AGE"];

//         $ML_AMOUNT = (int)$_POST["QY_FEED_6"] * (int)$FT_PRICE;

//         echo $ML_AMOUNT;
// } else {
//         echo " lsdkf";
// }

// exit;

//  ตรวจสอบค่าว่าง กรณีที่มี ค่าว่าง ที่ส่งเข้ามา ให้ใช้ค่า ที่อยู่ในฐานข้อมูล
$QY_FEED_1 = isset($_POST["QY_FEED_1"]) ? $_POST["QY_FEED_1"] : $item->QY_FEED_1;
$QY_FEED_2 = isset($_POST["QY_FEED_2"]) ? $_POST["QY_FEED_2"] : $item->QY_FEED_2;
$QY_FEED_3 = isset($_POST["QY_FEED_3"]) ? $_POST["QY_FEED_3"] : $item->QY_FEED_3;
$QY_FEED_4 = isset($_POST["QY_FEED_4"]) ? $_POST["QY_FEED_4"] : $item->QY_FEED_4;
$QY_FEED_5 = isset($_POST["QY_FEED_5"]) ? $_POST["QY_FEED_5"] : $item->QY_FEED_5;
$QY_FEED_6 = isset($_POST["QY_FEED_6"]) ? $_POST["QY_FEED_6"] : $item->QY_FEED_6;

$QY_SURPLUS_1 = isset($_POST["QY_SURPLUS_1"]) ? $_POST["QY_SURPLUS_1"] : $item->QY_SURPLUS_1;
$QY_SURPLUS_2 = isset($_POST["QY_SURPLUS_2"]) ? $_POST["QY_SURPLUS_2"] : $item->QY_SURPLUS_2;
$QY_SURPLUS_3 = isset($_POST["QY_SURPLUS_3"]) ? $_POST["QY_SURPLUS_3"] : $item->QY_SURPLUS_3;
$QY_SURPLUS_4 = isset($_POST["QY_SURPLUS_4"]) ? $_POST["QY_SURPLUS_4"] : $item->QY_SURPLUS_4;
$QY_SURPLUS_5 = isset($_POST["QY_SURPLUS_5"]) ? $_POST["QY_SURPLUS_5"] : $item->QY_SURPLUS_5;
$QY_SURPLUS_6 = isset($_POST["QY_SURPLUS_6"]) ? $_POST["QY_SURPLUS_6"] : $item->QY_SURPLUS_6;

$QY_W_SALTY = isset($_POST["QY_W_SALTY"]) ? $_POST["QY_W_SALTY"] : $item->QY_W_SALTY;
$QY_W_AMMONIA = isset($_POST["QY_W_AMMONIA"]) ? $_POST["QY_W_AMMONIA"] : $item->QY_W_AMMONIA;
$QY_W_NITRITE = isset($_POST["QY_W_NITRITE"]) ? $_POST["QY_W_NITRITE"] : $item->QY_W_NITRITE;

$QY_W_PH_1 = isset($_POST["QY_W_PH_1"]) ? $_POST["QY_W_PH_1"] : $item->QY_W_PH_1;
$QY_W_PH_2 = isset($_POST["QY_W_PH_2"]) ? $_POST["QY_W_PH_2"] : $item->QY_W_PH_2;

$QY_W_ACID_1 = isset($_POST["QY_W_ACID_1"]) ? $_POST["QY_W_ACID_1"] : $item->QY_W_ACID_1;
$QY_W_ACID_2 = isset($_POST["QY_W_ACID_2"]) ? $_POST["QY_W_ACID_2"] : $item->QY_W_ACID_2;

$QY_W_PERA_1 = isset($_POST["QY_W_PERA_1"]) ? $_POST["QY_W_PERA_1"] : $item->QY_W_PERA_1;
$QY_W_PERA_2 = isset($_POST["QY_W_PERA_2"]) ? $_POST["QY_W_PERA_2"] : $item->QY_W_PERA_2;

$QY_W_COLOR = isset($_POST["QY_W_COLOR"]) ? $_POST["QY_W_COLOR"] : $item->QY_W_COLOR;
$QY_W_MOIST = isset($_POST["QY_W_MOIST"]) ? $_POST["QY_W_MOIST"] : $item->QY_W_MOIST;
$QY_W_KALINE = isset($_POST["QY_W_KALINE"]) ? $_POST["QY_W_KALINE"] : $item->QY_W_KALINE;

$QY_RDOM_GRAM = isset($_POST["QY_RDOM_GRAM"]) ? $_POST["QY_RDOM_GRAM"] : $item->QY_RDOM_GRAM;
$QY_RDOM_KG = isset($_POST["QY_RDOM_KG"]) ? $_POST["QY_RDOM_KG"] : $item->QY_RDOM_KG;

$QY_REMARK = isset($_POST["QY_REMARK"]) ? $_POST["QY_REMARK"] : $item->QY_REMARK;



// สร้างข้อมูล ที่ต้องการ อัพเดต
$sqll = "UPDATE `shr_quality` SET 
        `QY_FEED_1` = '$QY_FEED_1', 
        `QY_FEED_2` = '$QY_FEED_2', 
        `QY_FEED_3` = '$QY_FEED_3', 
        `QY_FEED_4` = '$QY_FEED_4', 
        `QY_FEED_5` = '$QY_FEED_5', 
        `QY_FEED_6` = '$QY_FEED_6', 
        `QY_SURPLUS_1` = '$QY_SURPLUS_1', 
        `QY_SURPLUS_2` = '$QY_SURPLUS_2', 
        `QY_SURPLUS_3` = '$QY_SURPLUS_3', 
        `QY_SURPLUS_4` = '$QY_SURPLUS_4', 
        `QY_SURPLUS_5` = '$QY_SURPLUS_5', 
        `QY_SURPLUS_6` = '$QY_SURPLUS_6', 
        `QY_W_SALTY` = '$QY_W_SALTY', 
        `QY_W_AMMONIA` = '$QY_W_AMMONIA', 
        `QY_W_NITRITE` = '$QY_W_NITRITE', 
        `QY_W_PH_1` = '$QY_W_PH_1', 
        `QY_W_PH_2` = '$QY_W_PH_2', 
        `QY_W_ACID_1` = '$QY_W_ACID_1', 
        `QY_W_ACID_2` = '$QY_W_ACID_2',
        `QY_W_PERA_1` = '$QY_W_PERA_1', 
        `QY_W_PERA_2` = '$QY_W_PERA_2', 
        `QY_W_COLOR` = '$QY_W_COLOR', 
        `QY_W_MOIST` = '$QY_W_MOIST', 
        `QY_W_KALINE` = '$QY_W_KALINE', 
        `QY_RDOM_GRAM` = '$QY_RDOM_GRAM', 
        `QY_RDOM_KG` = '$QY_RDOM_KG' ,
        `QY_REMARK` = '$QY_REMARK'
 WHERE `shr_quality`.`QY_ID` = $QY_ID;";

$ISP_ID = $item->ISP_ID;
$FT_PRICE = $_POST["FT_PRICE"];
$QY_AGE = $_POST["QY_AGE"];
$FT_ID = $_POST["FT_ID"];
$FTT_DATE = date("Y-m-d");
$FTT_TYPE = '0';

// อัพเดตข้อมูล 
if (Database::query($sqll)) {



        if (isset($_POST["QY_FEED_1"])) {
                $ML_AMOUNT = (int)$_POST["QY_FEED_1"] * (int)$FT_PRICE;
                $ML_TYPE = '0'; // รายรับ - รายจ่าย
                $ML_NAME = "อายุุกุ้ง $QY_AGE อาหารมือ 1";

                $sqm1 = "INSERT INTO `shr_moneylist` (`ML_ID`, `ISP_ID`, `ML_NAME`, `ML_TYPE`, `ML_STATUS`, `ML_AMOUNT`, `ML_STAMP`) 
                        VALUES (NULL, $ISP_ID, '$ML_NAME', '$ML_TYPE', null, '$ML_AMOUNT', current_timestamp());";
                Database::query($sqm1);


                $FTT_ITEM = (int)$_POST["QY_FEED_1"];
                // สร้างข้อมูล อาหาร กุ้ง shr_foodtype
                $sqs = "INSERT INTO `shr_foodtypetran` (`FTT_ID`, `FTT_TYPE`, `FTT_STAMP`, `FTT_DATE`, `FT_ID`, `FTT_ITEM`) 
                                    VALUES (NULL, '$FTT_TYPE', current_timestamp(), '$FTT_DATE', '$FT_ID', '$FTT_ITEM');";
                Database::query($sqs);
        }

        if (isset($_POST["QY_FEED_2"])) {
                // $ML_AMOUNT = (int)$QY_FEED_2 * (int)$FT_PRICE;

                $ML_AMOUNT = (int)$_POST["QY_FEED_2"] * (int)$FT_PRICE;

                $ML_TYPE = '0'; // รายรับ - รายจ่าย
                $ML_NAME = "อายุุกุ้ง $QY_AGE อาหารมือ 2";

                $sqm1 = "INSERT INTO `shr_moneylist` (`ML_ID`, `ISP_ID`, `ML_NAME`, `ML_TYPE`, `ML_STATUS`, `ML_AMOUNT`, `ML_STAMP`) 
                        VALUES (NULL, $ISP_ID, '$ML_NAME', '$ML_TYPE', null, '$ML_AMOUNT', current_timestamp());";
                Database::query($sqm1);

                $FTT_ITEM = (int)$_POST["QY_FEED_2"];
                // สร้างข้อมูล อาหาร กุ้ง shr_foodtype
                $sqs = "INSERT INTO `shr_foodtypetran` (`FTT_ID`, `FTT_TYPE`, `FTT_STAMP`, `FTT_DATE`, `FT_ID`, `FTT_ITEM`) 
                                    VALUES (NULL, '$FTT_TYPE', current_timestamp(), '$FTT_DATE', '$FT_ID', '$FTT_ITEM');";
                Database::query($sqs);
        }

        if (isset($_POST["QY_FEED_3"])) {
                // $ML_AMOUNT = (int)$QY_FEED_3 * (int)$FT_PRICE;
                $ML_AMOUNT = (int)$_POST["QY_FEED_3"] * (int)$FT_PRICE;

                $ML_TYPE = '0'; // รายรับ - รายจ่าย
                $ML_NAME = "อายุุกุ้ง $QY_AGE อาหารมือ 3";

                $sqm1 = "INSERT INTO `shr_moneylist` (`ML_ID`, `ISP_ID`, `ML_NAME`, `ML_TYPE`, `ML_STATUS`, `ML_AMOUNT`, `ML_STAMP`) 
                        VALUES (NULL, $ISP_ID, '$ML_NAME', '$ML_TYPE', null, '$ML_AMOUNT', current_timestamp());";
                Database::query($sqm1);

                $FTT_ITEM = (int)$_POST["QY_FEED_3"];
                // สร้างข้อมูล อาหาร กุ้ง shr_foodtype
                $sqs = "INSERT INTO `shr_foodtypetran` (`FTT_ID`, `FTT_TYPE`, `FTT_STAMP`, `FTT_DATE`, `FT_ID`, `FTT_ITEM`) 
                                    VALUES (NULL, '$FTT_TYPE', current_timestamp(), '$FTT_DATE', '$FT_ID', '$FTT_ITEM');";
                Database::query($sqs);
        }

        if (isset($_POST["QY_FEED_4"])) {
                // $ML_AMOUNT = (int)$QY_FEED_4 * (int)$FT_PRICE;
                $ML_AMOUNT = (int)$_POST["QY_FEED_4"] * (int)$FT_PRICE;

                $ML_TYPE = '0'; // รายรับ - รายจ่าย
                $ML_NAME = "อายุุกุ้ง $QY_AGE อาหารมือ 4";

                $sqm1 = "INSERT INTO `shr_moneylist` (`ML_ID`, `ISP_ID`, `ML_NAME`, `ML_TYPE`, `ML_STATUS`, `ML_AMOUNT`, `ML_STAMP`) 
                        VALUES (NULL, $ISP_ID, '$ML_NAME', '$ML_TYPE', null, '$ML_AMOUNT', current_timestamp());";
                Database::query($sqm1);

                $FTT_ITEM = (int)$_POST["QY_FEED_4"];
                // สร้างข้อมูล อาหาร กุ้ง shr_foodtype
                $sqs = "INSERT INTO `shr_foodtypetran` (`FTT_ID`, `FTT_TYPE`, `FTT_STAMP`, `FTT_DATE`, `FT_ID`, `FTT_ITEM`) 
                                    VALUES (NULL, '$FTT_TYPE', current_timestamp(), '$FTT_DATE', '$FT_ID', '$FTT_ITEM');";
                Database::query($sqs);
        }

        if (isset($_POST["QY_FEED_5"])) {
                // $ML_AMOUNT = (int)$QY_FEED_5 * (int)$FT_PRICE;
                $ML_AMOUNT = (int)$_POST["QY_FEED_5"] * (int)$FT_PRICE;

                $ML_TYPE = '0'; // รายรับ - รายจ่าย
                $ML_NAME = "อายุุกุ้ง $QY_AGE อาหารมือ 5";

                $sqm1 = "INSERT INTO `shr_moneylist` (`ML_ID`, `ISP_ID`, `ML_NAME`, `ML_TYPE`, `ML_STATUS`, `ML_AMOUNT`, `ML_STAMP`) 
                        VALUES (NULL, $ISP_ID, '$ML_NAME', '$ML_TYPE', null, '$ML_AMOUNT', current_timestamp());";
                Database::query($sqm1);

                $FTT_ITEM = (int)$_POST["QY_FEED_5"];
                // สร้างข้อมูล อาหาร กุ้ง shr_foodtype
                $sqs = "INSERT INTO `shr_foodtypetran` (`FTT_ID`, `FTT_TYPE`, `FTT_STAMP`, `FTT_DATE`, `FT_ID`, `FTT_ITEM`) 
                                    VALUES (NULL, '$FTT_TYPE', current_timestamp(), '$FTT_DATE', '$FT_ID', '$FTT_ITEM');";
                Database::query($sqs);
        }

        if (isset($_POST["QY_FEED_6"])) {
                // $ML_AMOUNT = (int)$QY_FEED_6 * (int)$FT_PRICE;
                $ML_AMOUNT = (int)$_POST["QY_FEED_6"] * (int)$FT_PRICE;

                $ML_TYPE = '0'; // รายรับ - รายจ่าย
                $ML_NAME = "อายุุกุ้ง $QY_AGE อาหารมือ 6";

                $sqm1 = "INSERT INTO `shr_moneylist` (`ML_ID`, `ISP_ID`, `ML_NAME`, `ML_TYPE`, `ML_STATUS`, `ML_AMOUNT`, `ML_STAMP`) 
                        VALUES (NULL, $ISP_ID, '$ML_NAME', '$ML_TYPE', null, '$ML_AMOUNT', current_timestamp());";
                Database::query($sqm1);

                $FTT_ITEM = (int)$_POST["QY_FEED_6"];
                // สร้างข้อมูล อาหาร กุ้ง shr_foodtype
                $sqs = "INSERT INTO `shr_foodtypetran` (`FTT_ID`, `FTT_TYPE`, `FTT_STAMP`, `FTT_DATE`, `FT_ID`, `FTT_ITEM`) 
                                    VALUES (NULL, '$FTT_TYPE', current_timestamp(), '$FTT_DATE', '$FT_ID', '$FTT_ITEM');";
                Database::query($sqs);
        }
}
//  ลิงค์กลับไปยังหน้าเดิมปัจจุบัน
echo "<script>location.assign('./infoshrimp.php?ISP_ID=$item->ISP_ID')</script>";

// $QY_DATE = new DateTime($_POST["QY_DATE"]);
// $QY_DATE->modify("-1 day");
// $QY_AGE = (int) $_POST["QY_AGE"];
// $QY_AGE -= 1;
// $FT_ID = $_POST["FT_ID"];
// $QY_REMARK = $_POST["QY_REMARK"]?? '';
// $COUNT = $_POST["COUNT"];


// // var_dump($_POST);
// // $re = true;

// for ($i = 0; $i < $COUNT; $i++) {
//     $QY_AGE += 1;
//     $QY_DATE->modify("+1 day");

//     $QY_DATEs =  $QY_DATE->format('Y-m-d');
//     $sq = "INSERT INTO `shr_quality` (`QY_ID`, `ISP_ID`, `QY_DATE`, `QY_AGE`, `FT_ID`, `QY_REMARK`,`QY_STAMP`, `QY_STATUS` ,`QY_W_ACID_2`) 
//                                 VALUES (NULL, '$ISP_ID', '$QY_DATEs', '$QY_AGE', '$FT_ID',  '$QY_REMARK' ,current_timestamp(), NULL , NULL);";
//     if (Database::query($sq)) {
//     } else {
//         echo json_encode(false);
//         exit;
//     }
// }

// echo json_encode(true);
