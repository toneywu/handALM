<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
*IDC资源变更表
*/
function custom_report_main($paraArray=array()){
    //echo '---------------------1-------------------------';
    global $db,$bean_module;
    ini_set('zlib.output_compression', 'Off');
    require_once('include/export_utils.php');
    $delimiter = getDelimiter();
    ob_start();
    $parameterValueArray=$_REQUEST['parameter_value'];
    $csv = '"业务类型"'.$delimiter.'"申请日期（年/月/日）"'.$delimiter.'"申请绿通原因"'.$delimiter.'"客户名称"'.$delimiter.'"销售代表"'.$delimiter.'"销售单元"'.$delimiter.'"客服代表"'.$delimiter.'"机柜数量"'.$delimiter.'"带宽数量"'.$delimiter.'"IP数量"'.$delimiter.'"端口数量"'.$delimiter.'"其他服务"'.$delimiter.'"总月收入"'.$delimiter.'"是否发起合同流程"'.$delimiter.'"发起合同时间"'.$delimiter.'"ERP编号"'.$delimiter.'"合同号"'.$delimiter.'"机房"'.$delimiter.'"合同是否生效"'.$delimiter.'"第一周追踪情况"'.$delimiter.'"第二周追踪情况"'.$delimiter.'"第三周追踪情况"'.$delimiter;

    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;
    
    $sql = 'SELECT
    ha. NAME activity_name,
    hw.*
    FROM
    ham_wo hw
    LEFT JOIN ham_act ha ON hw.activity = ha.id
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
       /* $sql1 = 'select ha.name ha_name from ham_act ha where ha.id = "'.$row['activity'].'"';
       // echo '-------sql1:'.$sql1;
        $val = '';
        $result1 = $db->query($sql1);
        while ($row1 = $db->fetchByAssoc($result1)) {
            $val = $row1['ha_name'];
        }*/
        $csv .= encloseForCSV($row['activity_name']);
        $csv .= encloseForCSV($row['date_entered']);
        $csv .= encloseForCSV('');

        $sql2 = 'select a.name account_name, ac.attribute2_c,ac.attribute1_c ,c.last_name from accounts a LEFT JOIN accounts_cstm ac ON a.id = ac.id_c LEFT JOIN contacts c on ac.contact_id_c = c.id where a.id ="'.$row['account_id'].'"';
        $result2  = $db->query($sql2);
        $val1 = '';$val2 = '';$val3 = '';$val4 = '';
        while ($row2 = $db->fetchByAssoc($result2)) {
            $val1 = $row2['account_name'];
            $val2 = $row2['attribute2_c'];
            $val3 = $row2['attribute1_c'];
            $val4 = $row2['last_name'];
        }
        $csv .= encloseForCSV($val1);
        $csv .= encloseForCSV($val2);
        $csv .= encloseForCSV($val3);
        $csv .= encloseForCSV($val4);
        
        $sql3 = 'select count(*) rack_count from hit_racks hr where hr.enable_partial_allocation=0 and hr.hat_assets_id ="'.$row['hat_assets_id'].'"';
        $val = '';
        $result3 = $db->query($sql3);
        while ($row3 = $db->fetchByAssoc($result3)) {
            $val = $row3['rack_count'];
        }
        $csv .= encloseForCSV($val);
        $sql4 = 'SELECT
        sum(hia.speed_limit) hia_bandwidth_count
        FROM
        hit_ip_trans_batch hitb,
        hit_ip_allocations hia
        WHERE
        hia.hit_ip_trans_batch_id = hitb.id
        AND hitb.source_wo_id ="'.$row['id'].'"
        AND hia. STATUS = "EFFECTIVE"';
        //echo '-------sql4:'.$sql4;
        $val = '';
        $result4 = $db->query($sql4);
        while ($row4 = $db->fetchByAssoc($result4)) {
            $val= $row4['hia_bandwidth_count'];
        }
        $csv .= encloseForCSV($val);
        $sql5_1 = '
        SELECT 
        sum(his.ip_qty) ip_count0
        FROM
        hit_ip_trans_batch hitb,
        hit_ip_allocations hia,
        hit_ip_subnets his
        WHERE
        hia.hit_ip_trans_batch_id = hitb.id
        AND hitb.source_wo_id = "'.$row['id'].'"
        AND hia.hit_ip_subnets_id = his.id
        AND his.ip_type = 0';
        //echo '-------sql5:'.$sql5;    
        $val='';
        $val_0 = '';
        $result5 = $db->query($sql5_1);
        while ($row5 = $db->fetchByAssoc($result5)) {
            $val_0 = $row5['ip_count0'];
        }
        $sql5_2 = '
        SELECT 
        count(his.id) ip_count1
        FROM
        hit_ip_trans_batch hitb,
        hit_ip_allocations hia,
        hit_ip_subnets his
        WHERE
        hia.hit_ip_trans_batch_id = hitb.id
        AND hitb.source_wo_id = "'.$row['id'].'"
        AND hia.hit_ip_subnets_id = his.id
        AND his.ip_type = 1';
        $val_1 = '';
        $result5 = $db->query($sql5_2);
        while ($row5 = $db->fetchByAssoc($result5)) {
            $val_1 = $row5['ip_count1'];
        }
        $val = $val_0 + $val_1;
        $csv .= encloseForCSV($val);
        $sql6 = 'SELECT
        count(distinct hia.port) hia_port_count
        FROM
        hit_ip_trans_batch hitb,
        hit_ip_allocations hia
        WHERE
        hia.hit_ip_trans_batch_id = hitb.id
        AND hitb.source_wo_id ="'.$row['id'].'"
        AND hia. STATUS = "EFFECTIVE"';
        //echo '-------sql6:'.$sql6;    
        $val = '';
        $result6 = $db->query($sql6);
        while ($row6 = $db->fetchByAssoc($result6)) {
            $val = $row6['hia_port_count'];
        }
        $csv .= encloseForCSV($val);
        $csv .= encloseForCSV('');
        $csv .= encloseForCSV('');
        $csv .= encloseForCSV('');
        $csv .= encloseForCSV('');
        $sql7 = 'select ac.name contract_name, acc.contract_number_c,acc.attribute4_c from aos_contracts ac,aos_contracts_cstm acc where ac.id = acc.id_c and ac.id = "'.$row['contract_id'].'"';
        $result7 = $db->query($sql7);
        $val1 = '';$val2 = '';$val3 = '';
        while ($row7 = $db->fetchByAssoc($result7)) {
            $val1 = $row7['contract_number_c'];
            $val2 = $row7['contract_name'];
            $val3 = $row7['attribute4_c'];
        }
        $csv .= encloseForCSV($val1);
        $csv .= encloseForCSV($val2);
        $sql8 = 'select name site_name from ham_maint_sites where id ="'.$row['ham_maint_sites_id'].'"';
        $val = '';
        $result8 = $db->query($sql8);
        while ($row8 = $db->fetchByAssoc($result8)) {
            $val = $row8['site_name'];
        }
        $csv .= encloseForCSV($val);
        $csv .= encloseForCSV($val3);
        $csv .= encloseForCSV('');
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