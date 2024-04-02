<?php include ("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');

$AD_USERNAME = $_POST["AD_USERNAME"];
$AD_PASSWORD = $_POST["AD_PASSWORD"];
$AD_NAME = $_POST["AD_NAME"];

if (!empty(Database::squery("SELECT * FROM `shr_admin` WHERE AD_USERNAME ='$AD_USERNAME'", PDO::FETCH_OBJ, true))) {
    echo json_encode(false);
    exit;
}

// สร้างข้อมูล อาหาร กุ้ง shr_foodtype
$sq = "INSERT INTO `shr_admin` (`AD_ID`, `AD_USERNAME`, `AD_PASSWORD`, `AD_NAME`, `AD_STAMP`) VALUES (NULL, '$AD_USERNAME', '$AD_PASSWORD', '$AD_NAME', current_timestamp());";
if (Database::query($sq)) {
} else {
    echo json_encode(false);
    exit;
}
echo json_encode(true);



