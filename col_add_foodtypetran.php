<?php include ("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');

$FT_ID = $_POST["FT_ID"];
$FTT_DATE = $_POST["FTT_DATE"];
$FTT_ITEM = $_POST["FTT_ITEM"];
$FTT_TYPE =  $_POST["FTT_TYPE"];;

// สร้างข้อมูล อาหาร กุ้ง shr_foodtype
$sq = "INSERT INTO `shr_foodtypetran` (`FTT_ID`, `FTT_TYPE`, `FTT_STAMP`, `FTT_DATE`, `FT_ID`, `FTT_ITEM`) 
                                    VALUES (NULL, '$FTT_TYPE', current_timestamp(), '$FTT_DATE', '$FT_ID', '$FTT_ITEM');";
if (Database::query($sq)) {
} else {
    echo json_encode(false);
    exit;
}
echo json_encode(true);



