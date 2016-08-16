<?php
/**
 * 本文件被，返回一个Jason形式的单位换算
 * 本文件参数有@s_uom_id，@d_uom_id, @product_id(非必须)
 * 返回的JASON示例：
 * {"node":[{"conversion":"0.004"}]}
 *
 *
 *1、先将当前d_uom_id转化为当前UOM分类下的Base-UOM
 *    1.1 先找有没有Item-Specific的分类下转换
 *    1.2 如果没有，则通过Standard转移
 *
 *2、将当前s_uom_id转化为当前UOM分类下的Base-UOM
 *
 *3、如果是分类间，比较两者是否有Item Specific，没有就=0
 *   如果是分类内，直接进行换算
 ***/
error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

global $db;
$txt_jason ='';

$d_uom_base_conversion = 0;
$s_uom_base_conversion = 0;
$ds_uom_base_conversion = 0;
$d_uom_class="";
$s_uom_class="";

if(isset($_GET['d_uom_id']) && $_GET['d_uom_id']!="") { //1.1先找当前d_uom_id是否有item-specfic的分类内单位
    if(isset($_GET['product_id']) && $_GET['product_id']!="") {
        $sel_d_uom_id_item_converstion = "SELECT
                            haa_uom_classes.base_unit_id,
                            haa_uom_conversions.destination_unit_id,
                            haa_uom_conversions.conversion,
                            haa_uom_conversions.destination_uom_classes_id,
                            haa_uom_conversions.source_uom_class_id
                        FROM
                            haa_uom_conversions,
                            haa_uom_classes,
                            aos_products_haa_uom_conversions_1_c,
                            aos_products
                        WHERE
                            haa_uom_conversions.source_uom_class_id = haa_uom_classes.id
                                AND aos_products_haa_uom_conversions_1_c.aos_products_haa_uom_conversions_1haa_uom_conversions_idb = haa_uom_conversions.id
                                AND aos_products_haa_uom_conversions_1_c.aos_products_haa_uom_conversions_1aos_products_ida = aos_products.id
                                AND haa_uom_conversions.source_uom_class_id = haa_uom_conversions.destination_uom_classes_id
                                AND haa_uom_conversions.deleted = 0
                                AND haa_uom_classes.deleted = 0
                                AND aos_products_haa_uom_conversions_1_c.deleted = 0
                                AND aos_products.deleted = 0
                                AND aos_products.id = '".$_GET['product_id']."'
                                AND destination_unit_id =  '".$_GET['d_uom_id']."'";

        $bean_d_uom_id_item_converstion =  $db-> query($sel_d_uom_id_item_converstion);
        while ( $d_uom_id_item_converstion = $db->fetchByAssoc($bean_d_uom_id_item_converstion) ) {
                $d_uom_base_conversion = $d_uom_id_item_converstion['conversion'];
                $d_uom_class = $d_uom_id_item_converstion['destination_uom_classes_id'];
        }
    }
    if($d_uom_base_conversion == 0) {
        //没有找到Item-Specific的换算，继续找Standard
        //1.2 找Standard换算
        $sel_d_uom_id_std_converstion = "SELECT
                                                    haa_uom.conversion,
                                                    haa_uom.haa_uom_classes_id
                                                FROM
                                                    haa_uom
                                                WHERE
                                                    haa_uom.id ='".$_GET['d_uom_id']."'
                                                    AND haa_uom.deleted = 0;";
        $bean_d_uom_id_std_converstion =  $db-> query($sel_d_uom_id_std_converstion);
        while ( $d_uom_id_std_converstion = $db->fetchByAssoc($bean_d_uom_id_std_converstion) ) {
                $d_uom_base_conversion = $d_uom_id_std_converstion['conversion'];
                $d_uom_class = $d_uom_id_std_converstion['haa_uom_classes_id'];
        }
    }
}

//2,以下同理，找s_uom_id
if(isset($_GET['s_uom_id']) && $_GET['s_uom_id']!="") { //1.1先找当前s_uom_id是否有item-specfic的分类内单位
    if(isset($_GET['product_id']) && $_GET['product_id']!="") {
        $sel_s_uom_id_item_converstion = "SELECT
                            haa_uom_classes.base_unit_id,
                            haa_uom_conversions.destination_unit_id,
                            haa_uom_conversions.conversion,
                            haa_uom_conversions.destination_uom_classes_id,
                            haa_uom_conversions.source_uom_class_id
                        FROM
                            haa_uom_conversions,
                            haa_uom_classes,
                            aos_products_haa_uom_conversions_1_c,
                            aos_products
                        WHERE
                            haa_uom_conversions.source_uom_class_id = haa_uom_classes.id
                                AND aos_products_haa_uom_conversions_1_c.aos_products_haa_uom_conversions_1haa_uom_conversions_idb = haa_uom_conversions.id
                                AND aos_products_haa_uom_conversions_1_c.aos_products_haa_uom_conversions_1aos_products_ida = aos_products.id
                                AND haa_uom_conversions.source_uom_class_id = haa_uom_conversions.destination_uom_classes_id
                                AND haa_uom_conversions.deleted = 0
                                AND haa_uom_classes.deleted = 0
                                AND aos_products_haa_uom_conversions_1_c.deleted = 0
                                AND aos_products.deleted = 0
                                AND aos_products.id = '".$_GET['product_id']."'
                                AND destination_unit_id =  '".$_GET['s_uom_id']."'";

        $bean_s_uom_id_item_converstion =  $db-> query($sel_s_uom_id_item_converstion);
        while ( $s_uom_id_item_converstion = $db->fetchByAssoc($bean_s_uom_id_item_converstion) ) {
                $s_uom_base_conversion = $s_uom_id_item_converstion['conversion'];
                $s_uom_class = $s_uom_id_item_converstion['destination_uom_classes_id'];
        }
    }
    if($s_uom_base_conversion == 0) {
        //没有找到Item-Specific的换算，继续找Standard
        //1.2 找Standard换算
        $sel_s_uom_id_std_converstion = "SELECT
                                                    haa_uom.conversion,
                                                    haa_uom.haa_uom_classes_id
                                                FROM
                                                    haa_uom
                                                WHERE
                                                    haa_uom.id ='".$_GET['s_uom_id']."'
                                                    AND haa_uom.deleted = 0;";
        $bean_s_uom_id_std_converstion =  $db-> query($sel_s_uom_id_std_converstion);
        while ( $s_uom_id_std_converstion = $db->fetchByAssoc($bean_s_uom_id_std_converstion) ) {
                $s_uom_base_conversion = $s_uom_id_std_converstion['conversion'];
                $s_uom_class = $s_uom_id_std_converstion['haa_uom_classes_id'];
        }
    }
}

//3.找两个分类的换算
if ($d_uom_class == $s_uom_class) {
    //属于同一分类，直接换算。
    if ($s_uom_base_conversion!=0) {
        $ds_uom_base_conversion = $d_uom_base_conversion/$s_uom_base_conversion;
    }
} else if(isset($_GET['product_id']) && $_GET['product_id']!="") {
    //属于不同分类，通过Item-Specific找到换算
    $sel_ds_uom_id_item_converstion = "SELECT
                            haa_uom_classes.base_unit_id,
                            haa_uom_conversions.destination_unit_id,
                            haa_uom_conversions.conversion,
                            haa_uom_conversions.destination_uom_classes_id,
                            haa_uom_conversions.source_uom_class_id
                        FROM
                            haa_uom_conversions,
                            haa_uom_classes,
                            aos_products_haa_uom_conversions_1_c,
                            aos_products
                        WHERE
                            haa_uom_conversions.source_uom_class_id =  '".$s_uom_class."'
                                AND haa_uom_classes.id =  '".$d_uom_class."'
                                AND aos_products.id = '".$_GET['product_id']."'
                                AND aos_products_haa_uom_conversions_1_c.aos_products_haa_uom_conversions_1haa_uom_conversions_idb = haa_uom_conversions.id
                                AND aos_products_haa_uom_conversions_1_c.aos_products_haa_uom_conversions_1aos_products_ida = aos_products.id
                                AND haa_uom_conversions.source_uom_class_id != haa_uom_conversions.destination_uom_classes_id
                                AND haa_uom_conversions.deleted = 0
                                AND aos_products_haa_uom_conversions_1_c.deleted = 0
                                AND aos_products.deleted = 0
                                AND haa_uom_classes.deleted = 0";
    $bean_ds_uom_id_item_converstion =  $db-> query($sel_ds_uom_id_item_converstion);
    while ( $ds_uom_id_item_converstion = $db->fetchByAssoc($bean_ds_uom_id_item_converstion) ) {
            $ds_uom_base_conversion = $ds_uom_id_item_converstion['conversion'];
    }
    if ($ds_uom_id_item_converstion == 0) {
        //如果之前没有结果，试着反向再找一次
        $sel_sd_uom_id_item_converstion = "SELECT
                                haa_uom_classes.base_unit_id,
                                haa_uom_conversions.destination_unit_id,
                                haa_uom_conversions.conversion,
                                haa_uom_conversions.destination_uom_classes_id,
                                haa_uom_conversions.source_uom_class_id
                            FROM
                                haa_uom_conversions,
                                haa_uom_classes,
                                aos_products_haa_uom_conversions_1_c,
                                aos_products
                            WHERE
                                haa_uom_conversions.source_uom_class_id =  '".$d_uom_class."'
                                    AND haa_uom_classes.id =  '".$s_uom_class."'
                                    AND aos_products.id = '".$_GET['product_id']."'
                                    AND haa_uom_conversions.source_uom_class_id != haa_uom_conversions.destination_uom_classes_id
                                    AND aos_products_haa_uom_conversions_1_c.aos_products_haa_uom_conversions_1haa_uom_conversions_idb = haa_uom_conversions.id
                                    AND aos_products_haa_uom_conversions_1_c.aos_products_haa_uom_conversions_1aos_products_ida = aos_products.id
                                    AND haa_uom_conversions.deleted = 0
                                    AND aos_products_haa_uom_conversions_1_c.deleted = 0
                                    AND aos_products.deleted = 0
                                    AND haa_uom_classes.deleted = 0";
        $bean_sd_uom_id_item_converstion =  $db-> query($sel_sd_uom_id_item_converstion);
        while ( $sd_uom_id_item_converstion = $db->fetchByAssoc($bean_sd_uom_id_item_converstion) ) {
                $ds_uom_base_conversion = 1/$sd_uom_id_item_converstion['conversion'];
        }
    }
    if ($s_uom_base_conversion!=0) {
        $ds_uom_base_conversion = $ds_uom_base_conversion*$d_uom_base_conversion/$s_uom_base_conversion;
    }
}
 
 
$txt_jason ='{"conversion":"'.$ds_uom_base_conversion.'"}';

/*echo ($d_uom_base_conversion."<br/>");
echo ($s_uom_base_conversion."<br/>");
echo ($ds_uom_base_conversion."<br/>");

echo ($sel_s_uom_id_std_converstion."<br/>");

echo ('d_uom_class = '.$d_uom_class."<br/>");
echo ('s_uom_class = '.$s_uom_class."<br/>");*/
echo ($txt_jason);
exit();