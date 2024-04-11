<?php include ("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');

$PON_NAME = $_POST["PON_NAME"];

if (count(Database::squery("SELECT *  FROM shr_pond WHERE PON_NAME ='$PON_NAME' AND PON_STATUS IS NULL ", PDO::FETCH_OBJ, true)) > 0) {
    echo json_encode(false);
    exit;
}

// เพิ่มบ่อใหม่ บันทึกข้อมูล ลง บ่อใหม่
$sq = "INSERT INTO `shr_pond` (`PON_ID`, `PON_NAME`, `PON_STAMP`, `PON_STATUS`) VALUES (NULL, '$PON_NAME', current_timestamp(), NULL);";
if (Database::query($sq)) {
} else {
    echo json_encode(false);
    exit;
}
echo json_encode(true);



