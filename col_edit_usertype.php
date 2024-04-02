<?php include ("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');

$AD_ID = $_POST["AD_ID"];
$AD_USERNAME = $_POST["AD_USERNAME"];
$AD_PASSWORD = $_POST["AD_PASSWORD"];
$AD_NAME = $_POST["AD_NAME"];

if (!empty(Database::squery("SELECT * FROM `shr_admin` WHERE AD_USERNAME ='$AD_USERNAME' AND `shr_admin`.`AD_ID` != '$AD_ID'  ", PDO::FETCH_OBJ, true))) {
    echo json_encode(false);
    exit;
}
// print_r($_POST);
$sq = "UPDATE `shr_admin` SET `AD_USERNAME` = '$AD_USERNAME', `AD_PASSWORD` = '$AD_PASSWORD', `AD_NAME` = '$AD_NAME' WHERE `shr_admin`.`AD_ID` = '$AD_ID';";
if (Database::query($sq)) {
} else {
    echo json_encode(false);
    exit;
}
echo json_encode(true);



