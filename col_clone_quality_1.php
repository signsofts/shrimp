<?php include("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');

$ISP_ID = $_POST["ISP_ID"];
$ISP_NOTE = $_POST["ISP_NOTE"];
$PON_ID = $_POST["PON_ID"];
$ISP_END = $_POST["ISP_END"];
$ISP_ENDITEMKG = $_POST["ISP_ENDITEMKG"];
$ISP_ENDPRICEKG = $_POST["ISP_ENDPRICEKG"];



// อัพเดตตาราง shr_infoshrimp ปิดบ่อ
$sq = "UPDATE `shr_infoshrimp` SET `ISP_NOTE` = '$ISP_NOTE',
                                    `ISP_STATUS` = '1',
                                    `ISP_END` = '$ISP_END' 
WHERE `shr_infoshrimp`.`ISP_ID` ='$ISP_ID';";
if (Database::query($sq)) {

    $ML_AMOUNT = (int)$ISP_ENDITEMKG * (int)$ISP_ENDPRICEKG;
    $ML_TYPE = '1'; // รายรับ - รายจ่าย
    $ML_NAME = "จับกุ้งได้ $ISP_ENDITEMKG Kg.";
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


    // อัพเดตตาราง shr_pond `PON_STATUS` = null  เท่ากับ ปิดบ่อ
    Database::query("UPDATE `shr_pond` SET `PON_STATUS` = null WHERE `PON_ID` ='$PON_ID';");
} else {
    echo json_encode(false);
    exit;
}
echo json_encode(true);
