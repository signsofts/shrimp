<?php include ("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');

$ID = $_GET["ID"];

// print_r($_POST);
$sq = "DELETE FROM shr_admin WHERE `shr_admin`.`AD_ID` = '$ID'";
if (Database::query($sq)) {
} else {
    echo json_encode(false);
    exit;
}
echo json_encode(true);



