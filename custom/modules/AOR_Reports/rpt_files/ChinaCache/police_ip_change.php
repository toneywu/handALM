<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
*公安局固定IP变更表
*/
function custom_report_main($paraArray=array()){
    //echo '---------------------1-------------------------';
    global $db,$bean_module;
    ini_set('zlib.output_compression', 'Off');
    require_once('include/export_utils.php');
    $delimiter = getDelimiter();
    ob_start();
    $parameterValueArray=$_REQUEST['parameter_value'];
    $csv = '"变更类型"'.$delimiter.'"接入网络服务商组织机构代码"'.$delimiter.'"使用用户(单位名称)"'.$delimiter.'"用户性质"'.$delimiter.'"用户地址"'.$delimiter.'"联系人姓名"'.$delimiter.'"联系人联系电话"'.$delimiter.'"联系人证件类型"'.$delimiter.'"联系人证件号码"'.$delimiter.'"装机地址"'.$delimiter.'"装机日期"'.$delimiter.'"起始IP地址"'.$delimiter.'"结束IP地址"'.$delimiter.'"使用类型"'.$delimiter.'"管辖地网安部门代码"'.$delimiter;

    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;
    
    $sql = 'SELECT
    hw.id,
    ha. NAME activity_name,
    hw.account_id,
    hw.ham_maint_sites_id,

    IF (
    his.ip_type = 0,
    his.ip_lowest,
    his.ip_subnet) start_ip,

    IF (
    his.ip_type = 0,
    his.ip_highest,
    "") end_ip
    FROM
    ham_wo hw
    LEFT JOIN ham_act ha ON hw.activity = ha.id
    LEFT JOIN hit_ip_allocations hia ON hw.id = hia.source_wo_id
    LEFT JOIN hit_ip_subnets his ON hia.hit_ip_subnets_id = his.id
    WHERE
    hw.wo_status = "CLOSED"
    AND (
    ha. NAME LIKE "标准%"
    OR ha. NAME LIKE "绿通%"
    )';

    if ($parameterValueArray[0] != '' ) {
        $sql = $sql.' AND hw.account_id = "'.$parameterValueArray[0].'"';
    }
    if ($frame_id != '' ) {
        $sql = $sql.' AND EXISTS (SELECT 1 FROM ham_maint_sites hms WHERE hms.id = hw.ham_maint_sites_id AND hms.haa_frameworks_id = "'.$frame_id.'")';
    }
    $result = $db->query($sql);
    while ($row = $db->fetchByAssoc($result)) {
        $csv .= "\r\n";
        /*$sql1 = 'select ha.name ha_name from ham_act ha where ha.id = "'.$row['activity'].'"';
        // echo '-------sql1:'.$sql1;
        $val = '';
        $result1 = $db->query($sql1);
        while ($row1 = $db->fetchByAssoc($result1)) {
            $val = $row1['ha_name'];
        }
        $csv .= encloseForCSV($val);*/
        $csv .= encloseForCSV($row['activity_name']);
        $csv .= encloseForCSV('蓝汛');

        $sql2 = 'select a.id,a.name account_name, a.billing_address_street from accounts a LEFT JOIN accounts_cstm ac ON a.id = ac.id_c  where a.id ="'.$row['account_id'].'"';
        $result2  = $db->query($sql2);
        $val1 = '';$val2 = '';
        while ($row2 = $db->fetchByAssoc($result2)) {
            $val1 = $row2['account_name'];
            $val2 = $row2['billing_address_street'];
        }
        $csv .= encloseForCSV($val1);
        $csv .= encloseForCSV('');
        $csv .= encloseForCSV($val2);

        
        $sql3 = 'SELECT
        c.last_name,
        c.phone_mobile,
        cc.id_number_c,
        hc. NAME
        FROM
        contacts c,
        contacts_cstm cc
        LEFT JOIN haa_codes hc ON cc.haa_codes_id2_c = hc.id,
        accounts_contacts ac
        WHERE
        c.id = cc.id_c
        AND c.id = ac.contact_id
        AND cc.primary_contact_c = 1
        AND ac.account_id"'.$row['account_id'].'"';
        $val1 = '';$val2 = '';$val3 = '';$val4 = '';
        $result3 = $db->query($sql3);
        while ($row3 = $db->fetchByAssoc($result3)) {
            $val1 = $row3['last_name'];
            $val2 = $row3['phone_mobile'];
            $val3 = $row3['NAME'];
            $val4 = $row3['id_number_c'];
        }
        $csv .= encloseForCSV($val1);
        $csv .= encloseForCSV($val2);
        $csv .= encloseForCSV($val3);
        $csv .= encloseForCSV($val4);
        
        $sql4 = 'select name site_name from ham_maint_sites where id ="'.$row['ham_maint_sites_id'].'"';
        $val = '';
        $result4 = $db->query($sql4);
        while ($row4 = $db->fetchByAssoc($result4)) {
            $val = $row4['site_name'];
        }
        $csv .= encloseForCSV($val);
        $sql5 = 'select hwp.date_actual_finish from  ham_woop hwp where  hwp.ham_wo_id = "'.$row['id'].'" ORDER BY woop_number desc LIMIT 1;';
        $val = '';
        $result5 = $db->query($sql5);
        while ($row5 = $db->fetchByAssoc($result5)) {
            $val = $row5['date_actual_finish'];
        }
        $csv .= encloseForCSV($val);
        $csv .= encloseForCSV($row['start_ip']); 
        $csv .= encloseForCSV($row['end_ip']);
        $csv .= encloseForCSV('');
        $csv .= encloseForCSV('');
    }
    //print $csv;
    //echo '---------------------3-------------------------';
    $csv= $GLOBALS['locale']->translateCharset($csv, 'UTF-8', $GLOBALS['locale']->getExportCharset());

    ob_clean();
    header("Pragma: cache");
    header("Content-type: text/comma-separated-values; charset=GBK");
   /* header("Content-type: text/comma-separated-values; charset=".$GLOBALS['locale']->getExportCharset());*/
    header("Content-Disposition: attachment; filename=\"{$name}.csv\"");
    header("Content-transfer-encoding: binary");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
    header("Last-Modified: " . TimeDate::httpTime() );
    header("Cache-Control: post-check=0, pre-check=0", false );
    header("Content-Length: ".mb_strlen($csv, '8bit'));
    if (!empty($sugar_config['export_excel_compatible'])) {
        $csv = chr(255) . chr(254) . mb_convert_encoding($csv, 'UTF-16LE', 'UTF-8');
    }


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