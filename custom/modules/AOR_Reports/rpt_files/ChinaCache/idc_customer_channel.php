<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
*IDC客户通道表
*/
function custom_report_main($paraArray=array()){
    //echo '---------------------1-------------------------';

    global $db,$bean_module;
    ini_set('zlib.output_compression', 'Off');
    require_once('include/export_utils.php');
    $delimiter = getDelimiter();
    ob_start();
    $parameterValueArray=$_REQUEST['parameter_value'];
    $csv = '"公司名称"'.$delimiter.'"申请方"'.$delimiter.'"本端地址"'.$delimiter.'"对端地址"'.$delimiter.'"带宽"'.$delimiter;

    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;
    
    $sql = 'SELECT
    ha.id,
    a.`name` org_name,
    ha.attribute7,
    ha.attribute8,
    ha.attribute5,
    ha.attribute6
    FROM
    hat_assets ha
    LEFT JOIN accounts a ON ha.owning_org_id = a.id
    LEFT JOIN aos_products ap ON ha.aos_products_id = ap.id
    WHERE
    a. NAME <> "自用"
    AND ap.`name` = "通道"
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
        $csv .= encloseForCSV($row['attribute7']);
        $csv .= encloseForCSV($row['attribute8']);
        $csv .= encloseForCSV($row['attribute5'].$row['attribute6']);
        
    }
    //print $csv;
    //echo '---------------------3-------------------------';
    $csv= $GLOBALS['locale']->translateCharset($csv, 'UTF-8', $GLOBALS['locale']->getExportCharset());

    ob_clean();
    header("Pragma: cache");
    /*header("Content-type: text/comma-separated-values; charset=".$GLOBALS['locale']->getExportCharset());
    header("Content-Disposition: attachment; filename=\"{$name}.csv\"");*/
    header("Content-type: text/comma-separated-values; charset=GBK");
    header("Content-Disposition: attachment; filename=\"test.csv\"");
    header("Content-transfer-encoding: binary");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
    header("Last-Modified: " . TimeDate::httpTime() );
    header("Cache-Control: post-check=0, pre-check=0", false );
    header("Content-Length: ".mb_strlen($csv, '8bit'));
    if (!empty($sugar_config['export_excel_compatible'])) {
        $csv = chr(255) . chr(254) . mb_convert_encoding($csv, 'UTF-16LE', 'UTF-8');
    }
    //$name = mb_convert_encoding($name,'BUC-CN');
    $name= $GLOBALS['locale']->translateCharset($name, 'UTF-8', $GLOBALS['locale']->getExportCharset());
    $myfile = fopen("custom/modules/AOR_Reports/rpt_data_files/".$name.".csv", "w") or die("Unable to open file!");
    fwrite($myfile, $csv);
    fclose($myfile);
    print $name.'.csv';

    sugar_cleanup(true);
}
function encloseForCSV($field,$delimiter =','){
    return '"'.$field.'"'.$delimiter;
}
?>