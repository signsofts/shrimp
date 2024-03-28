<?php include ("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');

$ID = $_GET["ID"];

// print_r($_POST);
$sq = "UPDATE `shr_pond` SET `PON_STATUS` = '0' , PON_DELETE = '1' WHERE `shr_pond`.`PON_ID` = $ID;";
if (Database::query($sq)) {
} else {
    echo json_encode(false);
    exit;
}
echo json_encode(true);



