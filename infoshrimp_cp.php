<!DOCTYPE html>
<html lang="en">

<?php
$title = 'ข้อมูลการเลี้ยงกุ้ง';
?>

<head>
    <?php include ("inc/head.php") ?>
</head>

<body>
    <?php include ("inc/header.php") ?>

    <?php

    // $stop_date = new DateTime(date("Y-m-d"));
    // echo 'date before day adding: ' . $stop_date->format('Y-m-d H:i:s');
    // $stop_date->modify('+1 day');
    // echo 'date after adding 1 day: ' . $stop_date->format('Y-m-d H:i:s');
    // exit;
    


    if (!isset ($_GET["ISP_ID"])) {
        echo "<script>alert('ข้อมูลไม่ถูกต้อง')</script>";
        echo "<script>setTimeout(() => {location.assign('./index.php');}, 500);</script>";
    }
    $ISP_ID = $_GET["ISP_ID"];

    $isp_rco = Database::query("SELECT * FROM `shr_infoshrimp`
        INNER JOIN shr_pond ON shr_infoshrimp.PON_ID = shr_pond.PON_ID 
        INNER JOIN shr_breed ON shr_infoshrimp.BRE_ID = shr_breed.BRE_ID 
        WHERE shr_infoshrimp.ISP_ID  = '{$_GET["ISP_ID"]}' ;
        ", PDO::FETCH_OBJ)->fetch(PDO::FETCH_OBJ);

    ?>


    <div class="container-fluid bg-light overflow-hidden px-lg-0" style="margin: 1rem 0;">
        <div class="container quote px-lg-0">
            <div class="row g-0 mx-lg-0 p-5 pb-0">
                <div class="col-lg-2 ps-lg-0" style="width: 150px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid" src="img/BRE/<?php echo $isp_rco->BRE_IMG ?>"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-10 p-5 pt-0 pb-0  " data-wow-delay="0.5s">

                    <div class=" pe-lg-0">
                        <div class="row g-3">
                            <div class="col-12 col-sm-12">
                                <div class="row">
                                    <div class="col">
                                        <h4>
                                            บ่อกุ้ง :
                                            <?php echo $isp_rco->PON_NAME ?>
                                        </h4>
                                        <h4>
                                            สายพันธุ์ :
                                            <?php echo $isp_rco->BRE_NAME ?>
                                        </h4>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>


                            </div>
                            <div class="col-12 col-sm-4">
                                <label for="">วันที่เปิดบ่อ</label>
                                <input type="text" class="form-control border-0" disabled style=""
                                    value="<?php echo $isp_rco->ISP_START ?>">
                            </div>
                            <div class="col-12 col-sm-4">
                                <label for="">วันที่จับกุ้ง</label>
                                <input type="text" class="form-control border-0" disabled style=""
                                    value="<?php echo $isp_rco->ISP_END ?? '-' ?>">
                            </div>
                            <div class="col-sm-4">
                                <label for="">รายละเอียด</label>
                                <textarea class="form-control border-0" rows="1"
                                    disabled><?php echo $isp_rco->ISP_NOTE ?? '-' ?></textarea>
                            </div>
                            <?php if (empty ($isp_rco->ISP_STATUS)): ?>
                                <div class="col-12">
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modalClone"
                                        class="btn btn-sm btn-danger py-1 px-4">ปิดบ่อ</a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col">

                            </div>
                            <div class="col d-flex justify-content-end">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

        </div>
    </div>


    <div class="container-fluid">
        <div class="row g-0 mx-lg-0 p-5 pb-0">
            <div class="col-12">
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col d-flex justify-content-end">
                        <?php if (empty ($isp_rco->ISP_STATUS)): ?>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modalAdd"
                                class="btn btn-primary py-3 px-5 mb-4">สร้างข้อมูล</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <table id="mainTable" class=" table table-bordered" style="width: 100%; ">
                    <thead>
                        <tr class="table-secondary">
                            <th rowspan="3" class="text-center" style="vertical-align : middle;text-align:center;">
                                วันที่</th>
                            <th rowspan="3" class="text-center" style="vertical-align : middle;text-align:center;">
                                อายุกุ้ง</th>
                            <th rowspan="3" class="text-center" style="vertical-align : middle;text-align:center;">
                                เบอร์<br>อาหาร</th>
                            <th colspan="7" class="text-center" style="vertical-align : middle;text-align:center;">
                                จำนวนอาหาร(กก.)</th>
                            <th colspan="7" class="text-center" style="vertical-align : middle;text-align:center;">
                                จำนวนยอ</th>
                            <th colspan="12" class="text-center" style="vertical-align : middle;text-align:center;">
                                คุณภาพน้ำ</th>
                            <th colspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                สุ่มกุ้ง</th>
                            <th rowspan="3" class="text-center" style="vertical-align : middle;text-align:center;">
                                หมายเหตุ</th>
                        </tr>
                        <tr class="table-info">
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                มื้อ 1</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                มื้อ 2</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                มื้อ 3</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                มื้อ 4</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                มื้อ 5</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                มื้อ 6</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                รวม</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                มื้อ 1</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                มื้อ 2</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                มื้อ 3</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                มื้อ 4</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                มื้อ 5</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                มื้อ 6</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                รวม</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                ความ เค็ม</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                แอมโมเนีย</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                ไนไตรท์</td>
                            <td rowspan="1" colspan="2" class="text-center">pH</td>
                            <td rowspan="1" colspan="2" class="text-center">กรด ด่าง</td>
                            <td rowspan="1" colspan="2" class="text-center">อุณหภูมิ</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                สีน้ำ</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                ความชุ่ม</td>
                            <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                                ซัดคาไลน์</td>
                            <td rowspan="1" colspan="2" class="text-center"
                                style="vertical-align : middle;text-align:center;">
                                ขนาดเฉลี่ย</td>
                        </tr>

                        <tr class="table-success">
                            <td class="text-center">เช้า</td>
                            <td class="text-center">เย็น</td>
                            <td class="text-center">เช้า</td>
                            <td class="text-center">เย็น</td>
                            <td class="text-center">เช้า</td>
                            <td class="text-center">เย็น</td>
                            <td class="text-center">กรัม</td>
                            <td class="text-center">กก.</td>
                        </tr>

                    </thead>



                    <tbody>

                        <?php
                        $sql = "SELECT * FROM `shr_quality`
                                    INNER JOIN shr_foodtype ON shr_quality.FT_ID = shr_foodtype.FT_ID
                                    INNER JOIN shr_infoshrimp ON shr_quality.ISP_ID = shr_infoshrimp.ISP_ID
                                    WHERE shr_infoshrimp.ISP_ID = '$ISP_ID' ORDER BY shr_quality.QY_AGE DESC  ";

                        foreach (Database::squery($sql, PDO::FETCH_OBJ, true) as $key => $item):
                            ?>

                            <tr>
                                <form id="fq_id_<?php echo $item->QY_ID ?>"
                                    action="./col_update_quality.php?QY_ID=<?php echo $item->QY_ID ?>" method="post">
                                    <input type="hidden" name="QY_ID" value="<?php echo $item->QY_ID ?>">
                                    <td class="text-center">
                                        <?php echo $item->QY_DATE ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $item->QY_AGE ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $item->FT_NAME . "( $item->FT_NUMBER )" ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_FEED_1)): ?>
                                            <input type="number" min="1" name="QY_FEED_1" style="width: 40px;"
                                                value="<?php echo $item->QY_FEED_1; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_FEED_1 ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_FEED_2)): ?>
                                            <input type="number" min="1" name="QY_FEED_2" style="width: 40px;"
                                                value="<?php echo $item->QY_FEED_2; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_FEED_2 ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_FEED_3)): ?>
                                            <input type="number" min="1" name="QY_FEED_3" style="width: 40px;"
                                                value="<?php echo $item->QY_FEED_3; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_FEED_3 ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_FEED_4)): ?>
                                            <input type="number" min="1" name="QY_FEED_4" style="width: 40px;"
                                                value="<?php echo $item->QY_FEED_4; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_FEED_4 ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_FEED_5)): ?>
                                            <input type="number" min="1" name="QY_FEED_5" style="width: 40px;"
                                                value="<?php echo $item->QY_FEED_5; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_FEED_5 ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_FEED_6)): ?>
                                            <input type="number" min="1" name="QY_FEED_6" style="width: 40px;"
                                                value="<?php echo $item->QY_FEED_6; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_FEED_6 ?>
                                        <?php endif ?>


                                    </td>
                                    <td class="text-center">
                                        <?php echo (int) $item->QY_FEED_1 + (int) $item->QY_FEED_2 + (int) $item->QY_FEED_3 + (int) $item->QY_FEED_4 + (int) $item->QY_FEED_5 + (int) $item->QY_FEED_6 ?>
                                    </td>
                                    <td class="text-center">

                                        <?php if (empty ($item->QY_SURPLUS_1)): ?>
                                            <input type="text" name="QY_SURPLUS_1" style="width: 40px;"
                                                value="<?php echo $item->QY_SURPLUS_1; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_SURPLUS_1 ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">

                                        <?php if (empty ($item->QY_SURPLUS_2)): ?>
                                            <input type="text" name="QY_SURPLUS_2" style="width: 40px;"
                                                value="<?php echo $item->QY_SURPLUS_2; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_SURPLUS_2 ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">

                                        <?php if (empty ($item->QY_SURPLUS_3)): ?>
                                            <input type="text" name="QY_SURPLUS_3" style="width: 40px;"
                                                value="<?php echo $item->QY_SURPLUS_3; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_SURPLUS_3 ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">

                                        <?php if (empty ($item->QY_SURPLUS_4)): ?>
                                            <input type="text" name="QY_SURPLUS_4" style="width: 40px;"
                                                value="<?php echo $item->QY_SURPLUS_4; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_SURPLUS_4 ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">

                                        <?php if (empty ($item->QY_SURPLUS_5)): ?>
                                            <input type="text" name="QY_SURPLUS_5" style="width: 40px;"
                                                value="<?php echo $item->QY_SURPLUS_5; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_SURPLUS_5 ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">

                                        <?php if (empty ($item->QY_SURPLUS_6)): ?>
                                            <input type="text" name="QY_SURPLUS_6" style="width: 40px;"
                                                value="<?php echo $item->QY_SURPLUS_6; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_SURPLUS_6 ?>
                                        <?php endif ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo (int) $item->QY_SURPLUS_1 + (int) $item->QY_SURPLUS_2 + (int) $item->QY_SURPLUS_3 + (int) $item->QY_SURPLUS_4 + (int) $item->QY_SURPLUS_5 + (int) $item->QY_SURPLUS_6 ?>
                                    </td>
                                    <td class="text-center">

                                        <?php if (empty ($item->QY_W_SALTY)): ?>
                                            <input type="text" name="QY_W_SALTY" style="width: 40px;"
                                                value="<?php echo $item->QY_W_SALTY; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_W_SALTY ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_W_AMMONIA)): ?>
                                            <input type="text" name="QY_W_AMMONIA" style="width: 40px;"
                                                value="<?php echo $item->QY_W_AMMONIA; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_W_AMMONIA ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_W_NITRITE)): ?>
                                            <input type="text" name="QY_W_NITRITE" style="width: 40px;"
                                                value="<?php echo $item->QY_W_NITRITE; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_W_NITRITE ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_W_PH_1)): ?>
                                            <input type="text" name="QY_W_PH_1" style="width: 40px;"
                                                value="<?php echo $item->QY_W_PH_1; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_W_PH_1 ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_W_PH_2)): ?>
                                            <input type="text" name="QY_W_PH_2" style="width: 40px;"
                                                value="<?php echo $item->QY_W_PH_2; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_W_PH_2 ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_W_ACID_1)): ?>
                                            <input type="text" name="QY_W_ACID_1" style="width: 40px;"
                                                value="<?php echo $item->QY_W_ACID_1; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_W_ACID_1 ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_W_ACID_2)): ?>
                                            <input type="text" name="QY_W_ACID_2" style="width: 40px;"
                                                value="<?php echo $item->QY_W_ACID_2; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_W_ACID_2 ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_W_PERA_1)): ?>
                                            <input type="text" name="QY_W_PERA_1" style="width: 40px;"
                                                value="<?php echo $item->QY_W_PERA_1; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_W_PERA_1 ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_W_PERA_2)): ?>
                                            <input type="text" name="QY_W_PERA_2" style="width: 40px;"
                                                value="<?php echo $item->QY_W_PERA_2; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_W_PERA_2 ?>
                                        <?php endif ?>
                                    </td>

                                    <td class="text-center">
                                        <?php if (empty ($item->QY_W_COLOR)): ?>
                                            <input type="text" name="QY_W_COLOR" style="width: 40px;"
                                                value="<?php echo $item->QY_W_COLOR; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_W_COLOR ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_W_MOIST)): ?>
                                            <input type="text" name="QY_W_MOIST" style="width: 40px;"
                                                value="<?php echo $item->QY_W_MOIST; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_W_MOIST ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if (empty ($item->QY_W_KALINE)): ?>
                                            <input type="text" name="QY_W_KALINE" style="width: 40px;"
                                                value="<?php echo $item->QY_W_KALINE; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_W_KALINE ?>
                                        <?php endif ?>
                                    </td>


                                    <td class="text-center">
                                        <?php if (empty ($item->QY_RDOM_GRAM)): ?>
                                            <input type="text" name="QY_RDOM_GRAM" style="width: 40px;"
                                                value="<?php echo $item->QY_RDOM_GRAM; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_RDOM_GRAM ?>
                                        <?php endif ?>
                                    </td>

                                    <td class="text-center">
                                        <?php if (empty ($item->QY_RDOM_KG)): ?>
                                            <input type="text" name="QY_RDOM_KG" style="width: 40px;"
                                                value="<?php echo $item->QY_RDOM_KG; ?>"
                                                onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')">
                                        <?php else: ?>
                                            <?php echo $item->QY_RDOM_KG ?>
                                        <?php endif ?>
                                    </td>

                                    <td class="text-center">
                                        <textarea name="QY_REMARK" style="width: 70px;"
                                            onchange="funSubmint('fq_id_<?php echo $item->QY_ID ?>')"
                                            rows="1"><?php echo $item->QY_REMARK; ?></textarea>
                                    </td>
                                </form>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>




    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form-add" action="javascript:void(0);" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddLabel">สร้างข้อมูลบันทึก</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="ISP_ID" value="<?php echo $ISP_ID; ?>">
                        <div class="row g-3">
                            <div class="col-12 col-sm-12">
                                <label for="">วันที่บันทึก</label>
                                <input type="date" class="form-control border-0" name="QY_DATE" placeholder=""
                                    value="<?php echo date("Y-m-d") ?>" required style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="">อายุกุ้ง</label>
                                <input type="number" class="form-control border-0" name="QY_AGE" placeholder=""
                                    value="<?php echo Database::query("SELECT COUNT(*) AS COUNT FROM `shr_quality` WHERE ISP_ID = '$ISP_ID' ", PDO::FETCH_OBJ)->fetch(PDO::FETCH_OBJ)->COUNT + 1 ?>"
                                    required style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="">อาหารกุ้ง</label>
                                <select class="form-select border-0" style="height: 55px;" name="FT_ID" required>
                                    <option value="" selected>เลือก</option>
                                    <?php foreach (Database::query("SELECT * FROM `shr_foodtype` WHERE FT_STATUS IS NULL;", PDO::FETCH_OBJ) as $key => $item): ?>
                                        <option value="<?php echo $item->FT_ID ?>">
                                            <?php echo $item->FT_NAME . " ( เบอร์ $item->FT_NUMBER ) " ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="">รายละเอียด</label>
                                <textarea class="form-control border-0" name="QY_REMARK" placeholder="Note"></textarea>
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="">สร้างล่วงหน้า (วัน)</label>
                                <input type="number" class="form-control border-0" name="COUNT" placeholder="" value="1"
                                    required style="height: 55px;" min="1">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center  ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">สร้าง</button>
                    </div>
                </form>

                <script>


                </script>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalClone" tabindex="-1" aria-labelledby="modalCloneLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form-Clone" action="javascript:void(0);" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCloneLabel">ปิดบ่</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="ISP_ID" value="<?php echo $ISP_ID; ?>">
                        <div class="row g-3">
                            <div class="col-12 col-sm-12">
                                <label for="">รายรับทั้งหมดปิดบ่อ</label>
                                <input type="number" class="form-control border-0" name="QY_AGE" placeholder=""
                                    value="<?php echo Database::query("SELECT COUNT(*) AS COUNT FROM `shr_quality` WHERE ISP_ID = '$ISP_ID' ", PDO::FETCH_OBJ)->fetch(PDO::FETCH_OBJ)->COUNT + 1 ?>"
                                    required style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <label for="">รายละเอียด</label>
                                <textarea class="form-control border-0" name="QY_REMARK" placeholder="Note"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center  ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php include ("inc/footer.php") ?>

    <script src="js/infoshrimp.js"></script>

</body>

</html>