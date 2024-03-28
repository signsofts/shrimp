<?php include ("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');

$FT_ID = $_GET["ID"];

// อัพเดตตาราง shr_foodtype
$sq = "UPDATE `shr_foodtype` SET `FT_STATUS` = 1 WHERE `shr_foodtype`.`FT_ID` = $FT_ID;";
if (Database::query($sq)) {
} else {
    echo json_encode(false);
    exit;
}
echo json_encode(true);



