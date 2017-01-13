<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
*收入明细报表
*/
function custom_report_main($paraArray=array()){
    //echo '---------------------1-------------------------';

    global $db,$bean_module,$app_list_strings;
    ini_set('zlib.output_compression', 'Off');
    require_once('include/export_utils.php');
    require_once('include/utils.php');
    $delimiter = getDelimiter();
    ob_start();
    $parameterValueArray=$_REQUEST['parameter_value'];
    $pEventDateF = $parameterValueArray[0];
    $pEventDateT = $parameterValueArray[1];
    $pClearStatus = $parameterValueArray[2];
    $pInvoiceStatus = $parameterValueArray[3]=='undefined'?"":$parameterValueArray[3];
    $pDriver = $parameterValueArray[4]=='undefined'?"":$parameterValueArray[4];
    $pVehicle = $parameterValueArray[5]=='undefined'?"":$parameterValueArray[5];
    $csv = '"司机"'.$delimiter.'"车辆"'.$delimiter.'"来源"'.$delimiter.'"合同类型"'.$delimiter.'"说明"'.$delimiter.'"金额"'.$delimiter.'"发生日期"'.$delimiter.'"结算状态"'.$delimiter.'"结清状态"'.$delimiter.'"发票号"'.$delimiter.'"发票日期"'.$delimiter.'"到期日期"'.$delimiter.'"逾期天数"'.$delimiter;

    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;
    
    $sql = 'SELECT
    c.last_name,
    hrq.source_code,
    hrq.source_id,
    apq. NAME,
    apq.product_total_price,
    hrq.event_date,
    hrq.clear_status,
    ai.`status`,
    ai.`name` invoice_name,
    ai.invoice_date,
    ai.due_date,
    aic.late_days_c
    FROM
    haos_revenues_quotes hrq
    LEFT JOIN contacts c ON hrq.contact_id_c = c.id
    LEFT JOIN aos_products_quotes apq ON hrq.aos_products_quotes_id_c = apq.id
    LEFT JOIN aos_invoices ai ON hrq.aos_invoices_id_c = ai.id
    LEFT JOIN aos_invoices_cstm aic ON ai.id = aic.id_c
    where 1=1';
    if ($frame_id != '' ) {
        $sql = $sql.' AND hrq.haa_frameworks_id_c = "'.$frame_id.'"';
    }
    if ($pEventDateF != '' ) {
        $sql = $sql.' AND hrq.event_date >= "'.$pEventDateF.'"';
    }
    if ($pEventDateT != '' ) {
        $sql = $sql.' AND hrq.event_date <= "'.$pEventDateT.'"';
    }
    if ($pClearStatus != '' ) {
        $sql = $sql.' AND hrq.clear_status = "'.$pClearStatus.'"';
    }
    if ($pInvoiceStatus != '' ) {
        $sql = $sql.' AND ai.status = "'.$pInvoiceStatus.'"';
    }
    if ($pDriver != '' ) {
        $sql = $sql.' AND hrq.contact_id_c = "'.$pDriver.'"';
    }
    if ($pVehicle != '' ) {
        //$sql = $sql.' AND 车辆 = "'.$pVehicle.'"';
    }
    $result = $db->query($sql);
    while ($row = $db->fetchByAssoc($result)) {
        $csv .= "\r\n";
        $csv .= encloseForCSV($row['last_name']);
        $csv .= encloseForCSV('');
        $source = $app_list_strings['haos_source_code_list'];
         
        //console.log($source);
        $value="";
        foreach ($source as $k => $v) {
            if ($k==$row['source_code']) {
                $value=$v;
                break;
            }
        }
        $csv .= encloseForCSV($value);
        $val='';
        if($row['source_code']=='AOS_Contracts'){
            $sql1 = "SELECT
            hc.`name`
            FROM
            aos_contracts_cstm ac,
            haa_codes hc
            WHERE
            ac.haa_codes_id_c = hc.id
            AND id_c ='".$row['source_id']."'";
            $result1 = $db->query($sql1);
            while ($row1 = $db->fetchByAssoc($result1)) {
              $val = $row1['name'];
            }
        }
        $csv .= encloseForCSV($val);
        $csv .= encloseForCSV($row['NAME']);
        $csv .= encloseForCSV($row['product_total_price']);
        $csv .= encloseForCSV($row['event_date']);
        $clear_status = $app_list_strings['haos_revenue_clear_status_list'];
        $value="";
        foreach ($clear_status as $k => $v) {
            if ($k==$row['clear_status']) {
                $value=$v;
                break;
            }
        }
        $csv .= encloseForCSV($value);
        $invoice_status = $app_list_strings['invoice_status_dom'];
        $value="";
        foreach ($invoice_status as $k => $v) {
            if ($k==$row['status']) {
                $value=$v;
                break;
            }
        }
        $csv .= encloseForCSV($value);
        $csv .= encloseForCSV($row['invoice_name']);
        $csv .= encloseForCSV($row['invoice_date']);
        $csv .= encloseForCSV($row['due_date']);
        $csv .= encloseForCSV($row['late_days_c']);

  }
    //print $csv;
    //echo '---------------------3-------------------------';
    
    
    $csv= $GLOBALS['locale']->translateCharset($csv, 'UTF-8', $GLOBALS['locale']->getExportCharset());
    $name= $GLOBALS['locale']->translateCharset($name, 'UTF-8', $GLOBALS['locale']->getExportCharset());
    ob_clean();
    header("Pragma: cache");
    /*header("Content-type: text/comma-separated-values; charset=".$GLOBALS['locale']->getExportCharset());
    header("Content-Disposition: attachment; filename=\"{$name}.csv\"");*/
    //header("Content-type: text/html; charset=GBK");
    header("Content-type: text/html; charset=".$GLOBALS['locale']->getExportCharset());
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

    sugar_cleanup(true);
}
?>