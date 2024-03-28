<?php include ("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');

$ISP_ID = $_POST["ISP_ID"];
$ML_AMOUNT = (int) $_POST["ML_AMOUNT"];
$ML_TYPE = $_POST["ML_TYPE"]; // รายรับ - รายจ่าย
$ML_NAME = $_POST["ML_NAME"];


// สร้างข้อมูลลงตาราง shr_moneylist 
$sq = "INSERT INTO `shr_moneylist` (`ML_ID`, `ISP_ID`, `ML_NAME`, `ML_TYPE`, `ML_STATUS`, `ML_AMOUNT`, `ML_STAMP`) 
                            VALUES (NULL, '$ISP_ID', '$ML_NAME', '$ML_TYPE', null, '$ML_AMOUNT', current_timestamp());";
if (Database::query($sq)) {
} else {
    echo json_encode(false);
    exit;
}


echo json_encode(true);



