<?php include ("config/connectdb.php");
// header('Content-type: application/json; charset=utf-8');

$QY_ID = $_POST["QY_ID"];

$item = new stdClass();

// ดึกข้อมูลปัจจุบัน 
$sql = "SELECT * FROM `shr_quality`
WHERE shr_quality.QY_ID = '$QY_ID'";
$item = Database::squery($sql, PDO::FETCH_OBJ, false);




//  ตรวจสอบค่าว่าง กรณีที่มี ค่าว่าง ที่ส่งเข้ามา ให้ใช้ค่า ที่อยู่ในฐานข้อมูล
$QY_FEED_1 = isset ($_POST["QY_FEED_1"]) ? $_POST["QY_FEED_1"] : $item->QY_FEED_1;
$QY_FEED_2 = isset ($_POST["QY_FEED_2"]) ? $_POST["QY_FEED_2"] : $item->QY_FEED_2;
$QY_FEED_3 = isset ($_POST["QY_FEED_3"]) ? $_POST["QY_FEED_3"] : $item->QY_FEED_3;
$QY_FEED_4 = isset ($_POST["QY_FEED_4"]) ? $_POST["QY_FEED_4"] : $item->QY_FEED_4;
$QY_FEED_5 = isset ($_POST["QY_FEED_5"]) ? $_POST["QY_FEED_5"] : $item->QY_FEED_5;
$QY_FEED_6 = isset ($_POST["QY_FEED_6"]) ? $_POST["QY_FEED_6"] : $item->QY_FEED_6;

$QY_SURPLUS_1 = isset ($_POST["QY_SURPLUS_1"]) ? $_POST["QY_SURPLUS_1"] : $item->QY_SURPLUS_1;
$QY_SURPLUS_2 = isset ($_POST["QY_SURPLUS_2"]) ? $_POST["QY_SURPLUS_2"] : $item->QY_SURPLUS_2;
$QY_SURPLUS_3 = isset ($_POST["QY_SURPLUS_3"]) ? $_POST["QY_SURPLUS_3"] : $item->QY_SURPLUS_3;
$QY_SURPLUS_4 = isset ($_POST["QY_SURPLUS_4"]) ? $_POST["QY_SURPLUS_4"] : $item->QY_SURPLUS_4;
$QY_SURPLUS_5 = isset ($_POST["QY_SURPLUS_5"]) ? $_POST["QY_SURPLUS_5"] : $item->QY_SURPLUS_5;
$QY_SURPLUS_6 = isset ($_POST["QY_SURPLUS_6"]) ? $_POST["QY_SURPLUS_6"] : $item->QY_SURPLUS_6;

$QY_W_SALTY = isset ($_POST["QY_W_SALTY"]) ? $_POST["QY_W_SALTY"] : $item->QY_W_SALTY;
$QY_W_AMMONIA = isset ($_POST["QY_W_AMMONIA"]) ? $_POST["QY_W_AMMONIA"] : $item->QY_W_AMMONIA;
$QY_W_NITRITE = isset ($_POST["QY_W_NITRITE"]) ? $_POST["QY_W_NITRITE"] : $item->QY_W_NITRITE;

$QY_W_PH_1 = isset ($_POST["QY_W_PH_1"]) ? $_POST["QY_W_PH_1"] : $item->QY_W_PH_1;
$QY_W_PH_2 = isset ($_POST["QY_W_PH_2"]) ? $_POST["QY_W_PH_2"] : $item->QY_W_PH_2;

$QY_W_ACID_1 = isset ($_POST["QY_W_ACID_1"]) ? $_POST["QY_W_ACID_1"] : $item->QY_W_ACID_1;
$QY_W_ACID_2 = isset ($_POST["QY_W_ACID_2"]) ? $_POST["QY_W_ACID_2"] : $item->QY_W_ACID_2;

$QY_W_PERA_1 = isset ($_POST["QY_W_PERA_1"]) ? $_POST["QY_W_PERA_1"] : $item->QY_W_PERA_1;
$QY_W_PERA_2 = isset ($_POST["QY_W_PERA_2"]) ? $_POST["QY_W_PERA_2"] : $item->QY_W_PERA_2;

$QY_W_COLOR = isset ($_POST["QY_W_COLOR"]) ? $_POST["QY_W_COLOR"] : $item->QY_W_COLOR;
$QY_W_MOIST = isset ($_POST["QY_W_MOIST"]) ? $_POST["QY_W_MOIST"] : $item->QY_W_MOIST;
$QY_W_KALINE = isset ($_POST["QY_W_KALINE"]) ? $_POST["QY_W_KALINE"] : $item->QY_W_KALINE;

$QY_RDOM_GRAM = isset ($_POST["QY_RDOM_GRAM"]) ? $_POST["QY_RDOM_GRAM"] : $item->QY_RDOM_GRAM;
$QY_RDOM_KG = isset ($_POST["QY_RDOM_KG"]) ? $_POST["QY_RDOM_KG"] : $item->QY_RDOM_KG;

$QY_REMARK = isset ($_POST["QY_REMARK"]) ? $_POST["QY_REMARK"] : $item->QY_REMARK;



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


// อัพเดตข้อมูล 
if (Database::query($sqll)) {
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



