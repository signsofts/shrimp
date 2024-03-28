<?php include ("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');

$ISP_ID = $_POST["ISP_ID"];
$ISP_NOTE = $_POST["ISP_NOTE"];
$PON_ID = $_POST["PON_ID"];
$ISP_END = $_POST["ISP_END"];



// อัพเดตตาราง shr_infoshrimp ปิดบ่อ
$sq = "UPDATE `shr_infoshrimp` SET `ISP_NOTE` = '$ISP_NOTE',
                                    `ISP_STATUS` = '1',
                                    `ISP_END` = '$ISP_END' 
WHERE `shr_infoshrimp`.`ISP_ID` ='$ISP_ID';";
if (Database::query($sq)) {

    // อัพเดตตาราง shr_pond `PON_STATUS` = null  เท่ากับ ปิดบ่อ
    Database::query("UPDATE `shr_pond` SET `PON_STATUS` = null WHERE `PON_ID` ='$PON_ID';");
} else {
    echo json_encode(false);
    exit;
}
echo json_encode(true);



