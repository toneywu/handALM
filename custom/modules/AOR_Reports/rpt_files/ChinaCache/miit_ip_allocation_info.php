<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
*工信部IP分配信息表
*/
function custom_report_main($paraArray=array()){
    //echo '---------------------1-------------------------';
    global $db,$bean_module;
    ini_set('zlib.output_compression', 'Off');
    require_once('include/export_utils.php');
    $delimiter = getDelimiter();
    ob_start();
    $parameterValueArray=$_REQUEST['parameter_value'];
    $csv = '"起始IP"'.$delimiter.'"结束IP"'.$delimiter.'"分配方式"'.$delimiter.'"使用方式"'.$delimiter.'"分配时间"'.$delimiter.'"网关IP"'.$delimiter.'"网关物理地址"'.$delimiter.'"来源单位"'.$delimiter.'"使用单位名称"'.$delimiter.'"所属行业分类"'.$delimiter.'"单位所属分类"'.$delimiter.'"单位性质"'.$delimiter.'"省编码"'.$delimiter.'"市编码"'.$delimiter.'"县编码"'.$delimiter.'"详细地址"'.$delimiter.'"联系人姓名"'.$delimiter.'"手机号"'.$delimiter.'"电子邮箱"'.$delimiter;

    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;
    
    $sql = 'SELECT
    hw.id,
    hw.account_id,
    hw.ham_maint_sites_id,

    IF (
    his.ip_type = 0,
    his.ip_lowest,
    his.ip_subnet) start_ip,

    IF (
    his.ip_type = 0,
    his.ip_highest,
    "") end_ip,
    his.gateway
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
        $csv .= encloseForCSV($row['start_ip']);
        $csv .= encloseForCSV($row['end_ip']);
        $csv .= encloseForCSV('');
        $csv .= encloseForCSV('静态');
        $sql1 = 'select hwp.date_actual_finish from  ham_woop hwp where  hwp.ham_wo_id = "'.$row['id'].'" ORDER BY woop_number desc LIMIT 1';
       // echo '-------sql1:'.$sql1;
        $val = '';
        $result1 = $db->query($sql1);
        while ($row1 = $db->fetchByAssoc($result1)) {
            $val = $row1['date_actual_finish'];
        }
        $csv .= encloseForCSV($val);

        $csv .= encloseForCSV($row['gateway']); // 网关IP

        $sql2 = 'select name site_name from ham_maint_sites where id ="'.$row['ham_maint_sites_id'].'"';
        $val = '';
        $result2 = $db->query($sql2);
        while ($row2 = $db->fetchByAssoc($result2)) {
            $val = $row2['site_name'];
        }
        $csv .= encloseForCSV($val);
        $csv .= encloseForCSV('蓝汛');
        $sql3 = 'SELECT
        a.id,
        a. NAME account_name,
        ac.attribute6_c,
        ac.attribute4_c,
        ac.attribute5_c,
        a.billing_address_state,
        a.billing_address_city,
        a.billing_address_street
        FROM
        accounts a
        LEFT JOIN accounts_cstm ac ON a.id = ac.id_c 
        where a.id ="'.$row['account_id'].'"';
        $result3  = $db->query($sql3);
        $val1 = '';$val2 = '';$val3 = '';$val4 = '';
        $val5 = '';$val6 = '';$val7 = '';
        while ($row3 = $db->fetchByAssoc($result3)) {
            $val1 = $row3['account_name'];
            $val2 = $row3['attribute6_c'];
            $val3 = $row3['attribute4_c'];
            $val4 = $row3['attribute5_c'];
            $val5 = $row3['billing_address_state'];
            $val6 = $row3['billing_address_city'];
            $val7 = $row3['billing_address_street'];
        }
        $csv .= encloseForCSV($val1);
        $csv .= encloseForCSV($val2);
        $csv .= encloseForCSV($val3);
        $csv .= encloseForCSV($val4);
        $csv .= encloseForCSV($val5);
        $csv .= encloseForCSV($val6);
        $csv .= encloseForCSV('');
        $csv .= encloseForCSV($val7);
        
        $sql4 = 'SELECT
        c.last_name,
        c.phone_mobile,
        ea.email_address
        FROM
        contacts c,
        contacts_cstm cc,
        accounts_contacts ac,
        email_addr_bean_rel eabr,
        email_addresses ea
        WHERE
        c.id = cc.id_c
        AND c.id = ac.contact_id
        AND ac.account_id =  "'.$row['account_id'].'"
        AND eabr.bean_id = c.id
        AND eabr.bean_module = "Contacts"
        AND eabr.email_address_id = ea.id
        AND cc.primary_contact_c = 1';
        $val1 = '';$val2 = '';$val3 = '';
        $result4 = $db->query($sql4);
        while ($row4 = $db->fetchByAssoc($result4)) {
            $val1 = $row4['last_name'];
            $val2 = $row4['phone_mobile'];
            $val3 = $row4['email_address'];
        }
        $csv .= encloseForCSV($val1);
        $csv .= encloseForCSV($val2);
        $csv .= encloseForCSV($val3);
        
    }
    //print $csv;
    //echo '---------------------3-------------------------';
    $csv= $GLOBALS['locale']->translateCharset($csv, 'UTF-8', $GLOBALS['locale']->getExportCharset());

    ob_clean();
    header("Pragma: cache");
    header("Content-type: text/comma-separated-values; charset=".$GLOBALS['locale']->getExportCharset());
    header("Content-Disposition: attachment; filename=\"{$name}.csv\"");
    header("Content-transfer-encoding: binary");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
    header("Last-Modified: " . TimeDate::httpTime() );
    header("Cache-Control: post-check=0, pre-check=0", false );
    header("Content-Length: ".mb_strlen($csv, '8bit'));
    if (!empty($sugar_config['export_excel_compatible'])) {
        $csv = chr(255) . chr(254) . mb_convert_encoding($csv, 'UTF-16LE', 'UTF-8');
    }
    
    print $csv;

    sugar_cleanup(true);
}
function encloseForCSV($field,$delimiter =','){
    return '"'.$field.'"'.$delimiter;
}
?>