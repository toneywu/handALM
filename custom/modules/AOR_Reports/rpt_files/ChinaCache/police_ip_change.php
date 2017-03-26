<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
*公安局固定IP变更表
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
    $columnNameArray=array("变更类型","接入网络服务商组织机构代码","使用用户(单位名称)","用户性质","用户地址","联系人姓名","联系人联系电话","联系人证件类型","联系人证件号码","装机地址","装机日期","起始IP地址","结束IP地址","使用类型","管辖地网安部门代码");
    $eu -> buildColumnName($columnNameArray);
    
    $excel_data=array();
    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;
    
    $sql = 'SELECT
    hw.id,
    ha. NAME activity_name,
    hw.account_id,
    hw.ham_maint_sites_id,

    IF (
    his.ip_type = 1,
    his.ip_lowest,
    his.ip_subnet) start_ip,

    IF (
    his.ip_type = 1,
    his.ip_highest,
    "") end_ip
    FROM
    ham_wo hw
    LEFT JOIN ham_act ha ON hw.activity = ha.id
    LEFT JOIN hit_ip_allocations hia ON hw.id = hia.source_wo_id
    LEFT JOIN hit_ip_subnets his ON hia.hit_ip_subnets_id = his.id
    WHERE
    hw.deleted = 0
    and hw.wo_status = "COMPLETED"
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
        $rowData = array();
        $rowData[]= $row['activity_name'];
        //$rowData[]= '蓝汛';
        $rowData[]= '700034420';//接入网络服务商组织机构代码 

        $sql2 = 'select a.id,a.name account_name, a.billing_address_street from accounts a LEFT JOIN accounts_cstm ac ON a.id = ac.id_c  where a.id ="'.$row['account_id'].'"';
        $result2  = $db->query($sql2);
        $val1 = '';$val2 = '';
        while ($row2 = $db->fetchByAssoc($result2)) {
            $val1 = $row2['account_name'];
            $val2 = $row2['billing_address_street'];
        }
        $rowData[]= $val1;
        $rowData[]= '';
        $rowData[]= $val2;

        
        /*$sql3 = 'SELECT
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
        AND c.deleted=0 AND ac.deleted=0
        AND cc.primary_contact_c = 1
        AND ac.account_id="'.$row['account_id'].'"';*/
        $sql3 = "SELECT
                        contacts.last_name,
                        contacts.phone_mobile,
                        contacts_cstm.id_number_c,
                        haa_codes. NAME
                    FROM
                        contacts
                    LEFT JOIN contacts_cstm ON contacts.id = contacts_cstm.id_c
                    LEFT JOIN haa_codes ON contacts_cstm.haa_codes_id_c = haa_codes.id,
                     accounts_contacts
                    WHERE
                        contacts.id = accounts_contacts.contact_id
                    AND accounts_contacts.account_id = '".$row['account_id']."'
                    AND accounts_contacts.deleted = 0
                    AND haa_codes. NAME = '商务'
                    ORDER BY
                        contacts.date_entered DESC
                    LIMIT 0,1";
        $val1 = '';$val2 = '';$val3 = '';$val4 = '';
        $result3 = $db->query($sql3);
        while ($row3 = $db->fetchByAssoc($result3)) {
            $val1 = $row3['last_name'];
            $val2 = $row3['phone_mobile'];
            $val3 = $row3['NAME'];
            $val4 = $row3['id_number_c'];
        }
        $rowData[]= $val1;
        $rowData[]= $val2;
        $rowData[]= $val3;
        $rowData[]= $val4;//联系人证件号码
        
        /*$sql4 = 'select name site_name from ham_maint_sites where id ="'.$row['ham_maint_sites_id'].'"';*/
        $sql4 = "SELECT hat_asset_locations.map_address site_name
                    FROM hat_asset_locations LEFT JOIN haa_codes ON hat_asset_locations.code_asset_location_type_id = haa_codes.id
                    WHERE hat_asset_locations.ham_maint_sites_id = '".$row['ham_maint_sites_id']."'
                    AND haa_codes. NAME = '数据中心'";
        $val = '';
        $result4 = $db->query($sql4);
        while ($row4 = $db->fetchByAssoc($result4)) {
            $val = $row4['site_name'];
        }
        $rowData[]= $val;
        /*$sql5 = 'select hwp.date_actual_finish from  ham_woop hwp where  hwp.ham_wo_id = "'.$row['id'].'" ORDER BY woop_number desc LIMIT 1;';*/
        $sql5 = "select date_format(hwp.date_actual_finish,'%Y-%m-%d') date_actual_finish from  ham_woop hwp where  hwp.ham_wo_id = '".$row['id']."' ORDER BY woop_number desc LIMIT 1";
        $val = '';
        $result5 = $db->query($sql5);
        while ($row5 = $db->fetchByAssoc($result5)) {
            $val = $row5['date_actual_finish'];
        }
        $rowData[]= $val;
        $rowData[]= $row['start_ip'];
        $rowData[]= $row['end_ip'];
        $rowData[]= '03';//使用类型字段默认值统一为“03”
        $rowData[]= '110000000000';//管辖地网安部门代码默认 值统一为“110000000000”
        $excel_data[]=$rowData;
    }
    $eu -> buildExcelContent($excel_data);
    ob_end_clean();//清除缓冲区,避免乱码
    header('Content-Type: application/vnd.ms-excel');
    $fname= $GLOBALS['locale']->translateCharset('公安局固定IP变更表', 'UTF-8', $GLOBALS['locale']->getExportCharset());
    /*$fname= $GLOBALS['locale']->translateCharset('公安局固定IP变更表', 'UTF-8', "ISO-8859-1");*/
    $name = $eu -> createExcelFile('custom/modules/AOR_Reports/rpt_data_files/','公安局固定IP变更表');
    /*$name= $GLOBALS['locale']->translateCharset($name, $GLOBALS['locale']->getExportCharset(),"ISO-8859-1");*/
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
    his.ip_type = 1,
    his.ip_lowest,
    his.ip_subnet) start_ip,

    IF (
    his.ip_type = 1,
    his.ip_highest,
    "") end_ip
    FROM
    ham_wo hw
    LEFT JOIN ham_act ha ON hw.activity = ha.id
    LEFT JOIN hit_ip_allocations hia ON hw.id = hia.source_wo_id
    LEFT JOIN hit_ip_subnets his ON hia.hit_ip_subnets_id = his.id
    WHERE
    hw.deleted = 0
    and hw.wo_status = "COMPLETED"
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
        AND c.deleted=0 AND ac.deleted=0
        AND cc.primary_contact_c = 1
        AND ac.account_id="'.$row['account_id'].'"';
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