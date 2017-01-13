<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
*应收款明细报表
*/
function custom_report_main($paraArray=array()){
    //echo '---------------------1-------------------------';

    global $db,$bean_module;
    ini_set('zlib.output_compression', 'Off');
    require_once('include/export_utils.php');
    $delimiter = getDelimiter();
    ob_start();
    $parameterValueArray=$_REQUEST['parameter_value'];
    $pLateDaysF = $parameterValueArray[0];
    $pLateDaysT = $parameterValueArray[1];
    $pInvoiceDateF = $parameterValueArray[2];
    $pInvoiceDateT = $parameterValueArray[3];
    $pDueDateF = $parameterValueArray[4];
    $pDueDateT = $parameterValueArray[5];
    //$pType = $parameterValueArray[6];
    $csv = '"司机"'.$delimiter.'"车辆"'.$delimiter.'"应收款"'.$delimiter.'"实收款"'.$delimiter.'"欠款"'.$delimiter.'"发票日期"'.$delimiter.'"到期日期"'.$delimiter.'"逾期天数"'.$delimiter;

    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;
    
    $sql = 'SELECT
    ai.id,
    c.last_name,
    ai.total_amount,
    aic.amount_c,
    ai.invoice_date,
    ai.due_date,
    aic.late_days_c,
    ai.status
    FROM
    aos_invoices ai
    LEFT JOIN aos_invoices_cstm aic ON ai.id = aic.id_c
    LEFT JOIN contacts c ON ai.billing_contact_id = c.id
    WHERE
    1=1';
    if ($frame_id != '' ) {
        $sql = $sql.' AND aic.haa_frameworks_id_c = "'.$frame_id.'"';
    }
    if ($pLateDaysF != '' ) {
        $sql = $sql.' AND aic.late_days_c >= "'.$pLateDaysF.'"';
    }
    if ($pLateDaysT != '' ) {
        $sql = $sql.' AND aic.late_days_c <= "'.$pLateDaysT.'"';
    }
    if ($pInvoiceDateF != '' ) {
        $sql = $sql.' AND ai.invoice_date >= "'.$pInvoiceDateF.'"';
    }
    if ($pInvoiceDateT != '' ) {
        $sql = $sql.' AND ai.invoice_date <= "'.$pInvoiceDateT.'"';
    }
    if ($pDueDateF != '' ) {
        $sql = $sql.' AND ai.due_date >= "'.$pDueDateF.'"';
    }
    if ($pDueDateT != '' ) {
        $sql = $sql.' AND ai.due_date <= "'.$pDueDateT.'"';
    }
    /*if ($pType == 1){
        $sql = $sql.' group by c.last_name';
    }*/
    $result = $db->query($sql);
    while ($row = $db->fetchByAssoc($result)) {
        $csv .= "\r\n";
        $csv .= encloseForCSV($row['last_name']);
        $csv .= encloseForCSV('');
        $total_amount = $row['total_amount'];
        $amount = $row['amount_c'];
        $status = $row['status'];
        if($status == 'Paid') {
             $amount = $total_amount;
        }else if($status == 'Cancelled' || $status == 'Unpaid'){
            $amount = 0;
        }
        $uppaid_amount = $total_amount - $amount;
        $csv .= encloseForCSV($total_amount);
        $csv .= encloseForCSV($amount);
        $csv .= encloseForCSV($uppaid_amount);
        $csv .= encloseForCSV($row['invoice_date']);
        $csv .= encloseForCSV($row['due_date']);
        $csv .= encloseForCSV($row['late_days_c']);
        
    }
    //print $csv;
    //echo '---------------------3-------------------------';
    $name = getMillisecond();
    $csv= $GLOBALS['locale']->translateCharset($csv, 'UTF-8', $GLOBALS['locale']->getExportCharset());

    ob_clean();
    header("Pragma: cache");
    /*header("Content-type: text/comma-separated-values; charset=".$GLOBALS['locale']->getExportCharset());
    header("Content-Disposition: attachment; filename=\"{$name}.csv\"");*/
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
    //$name = mb_convert_encoding($name,'BUC-CN');
    $name= $GLOBALS['locale']->translateCharset($name, 'UTF-8', $GLOBALS['locale']->getExportCharset());
    
    createRptDataFile($name,$csv);
    print $name.'.csv';

    sugar_cleanup(true);
}
?>