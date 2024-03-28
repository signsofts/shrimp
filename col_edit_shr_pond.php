<?php include ("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');

$PON_ID = $_POST["PON_ID"];
$PON_NAME = $_POST["PON_NAME"];

// print_r($_POST);
$sq = "UPDATE `shr_pond` SET `PON_NAME` = '$PON_NAME' WHERE `shr_pond`.`PON_ID` = $PON_ID;";
if (Database::query($sq)) {
} else {
    echo json_encode(false);
    exit;
}
echo json_encode(true);



