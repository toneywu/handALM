<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
*IDC客户专线表
*/
function custom_report_main($paraArray=array()){
     global $db,$bean_module,$app_list_strings;
    ini_set('zlib.output_compression', 'Off');
    require_once('include/export_utils.php');
    require_once('include/utils.php');
    require_once('custom/modules/AOR_Reports/ExcelUtil.php');
    ob_start();
    $parameterValueArray=$_REQUEST['parameter_value'];
    $eu = new ExcelUtil();
    $eu -> setActiveSheet(0);
    $columnNameArray=array("公司名称","申请方","对段地址","本端地址","专线类型","数量");
    $eu -> buildColumnName($columnNameArray);
    
    $excel_data=array();
    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;
    
    $sql = 'SELECT
    ha.id,
    a.`name` org_name,
    ha.attribute1,
    ha.attribute2,
    ap.`name` ap_name,
    ha.size,
    ha.weight
    FROM
        hat_assets ha
    LEFT JOIN accounts a ON ha.owning_org_id = a.id
    LEFT JOIN aos_products ap ON ha.aos_products_id = ap.id
    LEFT JOIN aos_product_categories apc ON ha.aos_product_categories_id = apc.id
    WHERE
        ha.deleted = 0
    AND (
        ap.`name` = "专线"
    )
    AND ha.haa_frameworks_id ="'.$parameterValueArray[0].'"';

    if ($parameterValueArray[1] != '' ) {
        $sql = $sql.' AND a.id = "'.$parameterValueArray[1].'"';
    }
    if ($frame_id != '' ) {
        $sql = $sql.' AND ha.haa_frameworks_id = "'.$frame_id.'"';
    }
    
    $result = $db->query($sql);
    while ($row = $db->fetchByAssoc($result)) {
        $rowData = array();
        $rowData[]= $row['org_name'];
        $rowData[]= "我方";
        $rowData[]= $row['attribute1'];
        $rowData[]= $row['attribute2'];
        $rowData[]= $row['ap_name'];
        $sql3 = 'SELECT
                    FORMAT(bill_quantity, 2) quantity,
                    bill_unit_of_measure uom
                FROM
                    hit_link_po
                WHERE
                    product_id = "'.$row['id'].'"';
        $result3 = $db->query($sql3);
        $val='';
        while ($row3 = $db->fetchByAssoc($result3)) {
            $val = $row3['quantity'].$row3['uom'];
        } 
        $rowData[]= $val;   
        $excel_data[]=$rowData;        
        
    }
    $eu -> buildExcelContent($excel_data);
    $name = $eu -> createExcelFile('custom/modules/AOR_Reports/rpt_data_files/','IDC客户专线表');
    /*$name= $GLOBALS['locale']->translateCharset($name, 'UTF-8', $GLOBALS['locale']->getExportCharset());*/
    ob_clean();
    header("Pragma: cache");
    header("Content-type: text/html; charset=".$GLOBALS['locale']->getExportCharset());
    header("Content-Disposition: attachment; filename=\"{$name}\"");
    header("Content-transfer-encoding: binary");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
    header("Last-Modified: " . TimeDate::httpTime() );
    header("Cache-Control: post-check=0, pre-check=0", false );
    
    print $name;

    sugar_cleanup(true);
}
//不使用
function custom_report_main_CSV($paraArray=array()){
    //echo '---------------------1-------------------------';
    global $db,$bean_module;
    ini_set('zlib.output_compression', 'Off');
    require_once('include/export_utils.php');
    $delimiter = getDelimiter();
    ob_start();
    $parameterValueArray=$_REQUEST['parameter_value'];
    $csv = '"公司名称"'.$delimiter.'"申请方"'.$delimiter.'"对段地址"'.$delimiter.'"本端地址"'.$delimiter.'"专线类型"'.$delimiter.'"数量"'.$delimiter;

    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;

    
    $sql = 'SELECT
    ha.id,
    a.`name` org_name,
    ha.attribute1,
    ha.attribute2,
    ap.`name` ap_name,
    ha.size,
    ha.weight
    FROM
        hat_assets ha
    LEFT JOIN accounts a ON ha.owning_org_id = a.id
    LEFT JOIN aos_products ap ON ha.aos_products_id = ap.id
    LEFT JOIN aos_product_categories apc ON ha.aos_product_categories_id = apc.id
    WHERE
        ha.deleted = 0
    AND (
        ap.`name` = "专线"
    )
    AND ha.haa_frameworks_id ="'.$parameterValueArray[0].'"';

    if ($parameterValueArray[1] != '' ) {
        $sql = $sql.' AND a.id = "'.$parameterValueArray[1].'"';
    }
    if ($frame_id != '' ) {
        $sql = $sql.' AND ha.haa_frameworks_id = "'.$frame_id.'"';
    }
    
    $result = $db->query($sql);
    while ($row = $db->fetchByAssoc($result)) {
        $csv .= "\r\n";
        $csv .= encloseForCSV($row['org_name']);
        $csv .= encloseForCSV('我方');
        $csv .= encloseForCSV($row['attribute1']);
        $csv .= encloseForCSV($row['attribute2']);
        /*$sql2 = 'SELECT
        ap.name ap_name
        FROM
        aos_products ap
        WHERE
        ap.id="'.$row['aos_products_id'].'"';
        //echo '-------sql2:'.$sql2;
        $val = '';
        $result2 = $db->query($sql2);
        while ($row2 = $db->fetchByAssoc($result2)) {
            $val = $row2['ap_name'];
        }*/
        $csv .= encloseForCSV($row['ap_name']);
        $sql3 = 'SELECT
                    FORMAT(bill_quantity, 2) quantity,
                    bill_unit_of_measure uom
                FROM
                    hit_link_po
                WHERE
                    product_id = "'.$row['id'].'"';
        $result3 = $db->query($sql3);
        $val='';
        while ($row3 = $db->fetchByAssoc($result3)) {
            $val = $row3['quantity'].$row3['uom'];
        }            
        $csv .= encloseForCSV($val);
        
    }
    $name = getMillisecond();
    createRptDataFile($name,$csv);
    print $name.'.csv';
    //print $csv;
    //echo '---------------------3-------------------------';
    /*$csv= $GLOBALS['locale']->translateCharset($csv, 'UTF-8', $GLOBALS['locale']->getExportCharset());
    $name= $GLOBALS['locale']->translateCharset($name, 'UTF-8', $GLOBALS['locale']->getExportCharset());
    ob_clean();
    header("Pragma: cache");*/
    /*header("Content-type: text/comma-separated-values; charset=".$GLOBALS['locale']->getExportCharset());
    header("Content-Disposition: attachment; filename=\"{$name}.csv\"");*/
    //header("Content-type: text/html; charset=GBK");
    /*header("Content-type: text/html; charset=".$GLOBALS['locale']->getExportCharset());
    header("Content-Disposition: attachment; filename=\"{$name}.csv\"");
    header("Content-transfer-encoding: binary");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
    header("Last-Modified: " . TimeDate::httpTime() );
    header("Cache-Control: post-check=0, pre-check=0", false );
    header("Content-Length: ".mb_strlen($csv, '8bit'));
    if (!empty($sugar_config['export_excel_compatible'])) {
        $csv = chr(255) . chr(254) . mb_convert_encoding($csv, 'UTF-16LE', 'UTF-8');
    }
    $name = getMillisecond();
    
    createRptDataFile($name,$csv);
    print $name.'.csv';

    sugar_cleanup(true);*/
}
?>