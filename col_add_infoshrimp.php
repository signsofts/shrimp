<?php include("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');

$PON_ID = $_POST["PON_ID"];
$BRE_ID = $_POST["BRE_ID"];
$ISP_START = $_POST["ISP_START"];
$ISP_NOTE = $_POST["ISP_NOTE"];
$ISP_ITEM = (int)  $_POST["ISP_ITEM"];
$ISP_PRICE = (double) $_POST["ISP_PRICE"];
$ISP_PRICE_OTH = (double)  $_POST["ISP_PRICE_OTH"];
$ISP_ID = 0;

// สร้างข้อมูลการเลี้ยงกุ้งใหม่
$sq = "INSERT INTO `shr_infoshrimp` (`ISP_ID`, `PON_ID`, `BRE_ID`, `ISP_START`, `ISP_END`, `ISP_STAMP`, `ISP_STATUS`, `ISP_NOTE`, `ISP_ITEM`, `ISP_PRICE`, `ISP_PRICE_OTH`) 
                        VALUES (NULL, '$PON_ID', '$BRE_ID', '$ISP_START', NULL, current_timestamp(), '', '$ISP_NOTE',$ISP_ITEM ,$ISP_PRICE ,$ISP_PRICE_OTH );";
if (Database::query($sq)) {

    $ISP_IDMAXX = count(Database::squery("SELECT *  FROM shr_infoshrimp", PDO::FETCH_OBJ, true));

    // var_dump($ISP_IDMAXX);
    // exit;
    $ISP_ID = $ISP_IDMAXX;
    $ML_AMOUNT = $ISP_ITEM * (double) $ISP_PRICE;
    $ML_TYPE = '0'; // รายรับ - รายจ่าย
    $ML_NAME = "ราคากุ้งเปิดบ่อ จำนวน $ISP_ITEM ตัว";
    // var_dump($ML_NAME);
    // exit;สร้างล่วงหน้า

    // สร้างข้อมูลลงตาราง shr_moneylist 
    $sqm1 = "INSERT INTO `shr_moneylist` (`ML_ID`, `ISP_ID`, `ML_NAME`, `ML_TYPE`, `ML_STATUS`, `ML_AMOUNT`, `ML_STAMP`) 
                            VALUES (NULL, $ISP_ID, '$ML_NAME', '$ML_TYPE', null, '$ML_AMOUNT', current_timestamp());";
    // ;
    // var_dump($sqm1);
    // exit;
    // 
    Database::query($sqm1);
    // var_dump();
    // exit;
    $ML_NAME = "ค่าใช้จ่ายอื่นๆ ไม่รวมราคากุ้ง";
    $ML_AMOUNT = (double) $ISP_PRICE_OTH;

    // // สร้างข้อมูลลงตาราง shr_moneylist 
    $sqm2 = "INSERT INTO `shr_moneylist` (`ML_ID`, `ISP_ID`, `ML_NAME`, `ML_TYPE`, `ML_STATUS`, `ML_AMOUNT`, `ML_STAMP`) 
                            VALUES (NULL, '$ISP_ID', '$ML_NAME', '$ML_TYPE', null, '$ML_AMOUNT', current_timestamp());";
    Database::query($sqm2);
    // print_r();
    // exit;
    // อัพสถานะบ่กุ้งให้ถูกเลี้ยงกุ้งแล้ว 
    Database::query("UPDATE `shr_pond` SET `PON_STATUS` = '1' WHERE `shr_pond`.`PON_ID` ='$PON_ID';");

    echo json_encode(true);
} else {
    echo json_encode(false);
}
