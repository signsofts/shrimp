<?php include ("config/connectdb.php");
header('Content-type: application/json; charset=utf-8');


// รับค่าจากที่ ส่งมา
$ISP_ID = $_POST["ISP_ID"];
$QY_DATE = new DateTime($_POST["QY_DATE"]);
$QY_DATE->modify("-1 day");
$QY_AGE = (int) $_POST["QY_AGE"];
$QY_AGE -= 1;
$FT_ID = $_POST["FT_ID"];
$QY_REMARK = $_POST["QY_REMARK"]?? '';
$COUNT = $_POST["COUNT"];


// var_dump($_POST);
// $re = true;


// นับจำนวนจากจำนวน ที่สร้างอายุกุ้งล้วงหน้า กี่วัน 
for ($i = 0; $i < $COUNT; $i++) {
    $QY_AGE += 1; // สร้างตาราง อายุกุ้ง บวก 1
    $QY_DATE->modify("+1 day");// วันที่อายุกุ้ง บวก 1

    // วเพิ่มข้อมูลใหม่ในตาราง  shr_quality
    $QY_DATEs =  $QY_DATE->format('Y-m-d');
    $sq = "INSERT INTO `shr_quality` (`QY_ID`, `ISP_ID`, `QY_DATE`, `QY_AGE`, `FT_ID`, `QY_REMARK`,`QY_STAMP`, `QY_STATUS` ,`QY_W_ACID_2`) 
                                VALUES (NULL, '$ISP_ID', '$QY_DATEs', '$QY_AGE', '$FT_ID',  '$QY_REMARK' ,current_timestamp(), NULL , NULL);";
    if (Database::query($sq)) {
    } else {
        echo json_encode(false);
        exit;
    }
}

echo json_encode(true);



