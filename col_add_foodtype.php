<?php include("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');

$FT_NAME = $_POST["FT_NAME"];
$FT_NUMBER = $_POST["FT_NUMBER"];
$FT_PRICE = $_POST["FT_PRICE"];


if (count(Database::squery("SELECT *  FROM shr_foodtype WHERE FT_NAME ='$FT_NAME' AND FT_STATUS IS NULL ", PDO::FETCH_OBJ, true)) > 0) {
    echo json_encode(false);
    exit;
}


// สร้างข้อมูล อาหาร กุ้ง shr_foodtype
$sq = "INSERT INTO `shr_foodtype` (`FT_ID`, `FT_NAME`, `FT_PRICE`, `FT_STATUS`, `FT_STAMP`, `FT_NUMBER`) VALUES (NULL, '$FT_NAME', '$FT_PRICE', NULL, current_timestamp(), '$FT_NUMBER');";
if (Database::query($sq)) {
} else {
    echo json_encode(false);
    exit;
}
echo json_encode(true);
