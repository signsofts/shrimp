<?php include ("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');

$FT_ID = $_POST["FT_ID"];
$FT_NAME = $_POST["FT_NAME"];
$FT_NUMBER = $_POST["FT_NUMBER"];
$FT_PRICE = $_POST["FT_PRICE"];

// print_r($_POST);
$sq = "UPDATE `shr_foodtype` SET `FT_NAME` = '$FT_NAME' ,  `FT_PRICE` = '$FT_PRICE' , `FT_NUMBER` = '$FT_NUMBER' WHERE `shr_foodtype`.`FT_ID` = $FT_ID;";
if (Database::query($sq)) {
} else {
    echo json_encode(false);
    exit;
}
echo json_encode(true);



