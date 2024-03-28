<?php include ("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');

$PON_ID = $_POST["PON_ID"];
$BRE_ID = $_POST["BRE_ID"];
$ISP_START = $_POST["ISP_START"];
$ISP_NOTE = $_POST["ISP_NOTE"];


// สร้างข้อมูลการเลี้ยงกุ้งใหม่
$sq = "INSERT INTO `shr_infoshrimp` (`ISP_ID`, `PON_ID`, `BRE_ID`, `ISP_START`, `ISP_END`, `ISP_STAMP`, `ISP_STATUS`, `ISP_NOTE`) 
                        VALUES (NULL, '$PON_ID', '$BRE_ID', '$ISP_START', NULL, current_timestamp(), '', '$ISP_NOTE');";
if (Database::query($sq)) {

    // อัพสถานะบ่กุ้งให้ถูกเลี้ยงกุ้งแล้ว 
    Database::query("UPDATE `shr_pond` SET `PON_STATUS` = '1' WHERE `shr_pond`.`PON_ID` ='$PON_ID';");

    echo json_encode(true);
} else {
    echo json_encode(false);
}










