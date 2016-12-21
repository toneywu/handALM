<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
*IDC客户信息表
*/
function custom_report_main($paraArray){
    //echo '---------------------1-------------------------';
    global $db,$bean_module;
    ini_set('zlib.output_compression', 'Off');
    require_once('include/export_utils.php');
    $delimiter = getDelimiter();
    ob_start();
    $parameterIdArray=$_REQUEST['parameter_id'];
    $parameterOperatorArray=$_REQUEST['parameter_operator'];
    $parameterTypeArray=$_REQUEST['parameter_type'];
    $parameterValueArray=$_REQUEST['parameter_value'];
    
    /*echo $parameterValueArray[0].$parameterValueArray[1];
    echo end($parameterValueArray);*/

    $csv = '"客户ID"'.$delimiter.'"公司名称"'.$delimiter.'"曾用名"'.$delimiter.'"客户类型"'.$delimiter.'"销售代表"'.$delimiter.'"销售单元"'.$delimiter.'"客服代表"'.$delimiter.'"散U托管（U）"'.$delimiter.'"整柜托管(R)"'.$delimiter.'"预留托管(R）"'.$delimiter.'"带宽类型"'.$delimiter.'"带宽数量（M）"'.$delimiter.'"IP   （个）"'.$delimiter.'"端口"'.$delimiter.'"所在机房"'.$delimiter.'"客户行业"'.$delimiter.'"客户业务"'.$delimiter.'"所属行业分类(工信部)"'.$delimiter.'"单位所属分类(工信部)"'.$delimiter.'"单位性质(工信部)"'.$delimiter.'"通知发送邮箱"'.$delimiter.'"注意事项"'.$delimiter.'"备注"'.$delimiter.'"失效时间"'.$delimiter;

    /*$sql = "SELECT * from aor_reports where id = '".$_REQUEST['record']."'";
    $result=$db->query($sql);
    while ($row = $db->fetchByAssoc($result)) {
        $name = $row['name'];
    }*/
    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;

    $sql = 'SELECT
    *
    FROM
    accounts a,
    accounts_cstm ac
    WHERE
    a.id = ac.id_c
    AND ac.org_type_c = "EXTERNAL"
    AND ac.is_asset_org_c = 1
    AND ac.haa_frameworks_id_c ="'.$parameterValueArray[0].'"';

    if ($parameterValueArray[1] != '' ) {
        $sql = $sql.' AND a.id = "'.$parameterValueArray[1].'"';
    }

    if ($frame_id != '' ) {
        $sql = $sql.' AND ac.haa_frameworks_id_c = "'.$frame_id.'"';
    }
    
    //echo $sql;
    $result = $db->query($sql);
    while ($row = $db->fetchByAssoc($result)) {
        $csv .= "\r\n";
        $csv .= encloseForCSV($row['organization_number_c']);
        $csv .= encloseForCSV($row['full_name_c']);
        $csv .= encloseForCSV($row['name']);
        $csv .= encloseForCSV($row['attribute9_c']);
        $csv .= encloseForCSV($row['attribute2_c']);
        $csv .= encloseForCSV($row['attribute1_c']);
        $sql0 ='select last_name from contacts where id ="'.$row['contact_id_c'].'"';
        $val = '';
        $result0 = $db->query($sql0);
        while ($row0 = $db->fetchByAssoc($result0)) {
            $val = $row0['last_name'];
        }
        $csv .= encloseForCSV($val);
        $sql1 = 'SELECT
        sum(hra.height) hra_height
        FROM
        hat_assets_accounts_c haac,
        hat_assets ha,
        hit_rack_allocations hra
        WHERE
        haac.hat_assets_accountshat_assets_idb = ha.id
        AND ha.id = hra.hat_assets_id
        AND haac.hat_assets_accountsaccounts_ida ="'.$row['id'].'"';
       // echo '-------sql1:'.$sql1;
        $val = '';
        $result1 = $db->query($sql1);
        while ($row1 = $db->fetchByAssoc($result1)) {
            $val = $row1['hra_height'];
        }
        $csv .= encloseForCSV($val);
        $sql2 = 'SELECT
        count(hra.id) hra_count
        FROM
        hat_assets_accounts_c haac,
        hat_assets ha,
        hit_rack_allocations hra
        WHERE
        haac.hat_assets_accountshat_assets_idb = ha.id
        AND ha.id = hra.hat_assets_id
        AND haac.hat_assets_accountsaccounts_ida="'.$row['id'].'"';
        //echo '-------sql2:'.$sql2;
        $val = '';
        $result2 = $db->query($sql2);
        while ($row2 = $db->fetchByAssoc($result2)) {
            $val = $row2['hra_count'];
        }
        $csv .= encloseForCSV($val);
        $sql3 = 'SELECT
        count(hra.id) hra_r_count
        FROM
        hat_assets_accounts_c haac,
        hat_assets ha,
        hit_rack_allocations hra
        WHERE
        haac.hat_assets_accountshat_assets_idb = ha.id
        AND ha.id = hra.hat_assets_id
        AND ha.asset_status = "PreAssigned"
        AND haac.hat_assets_accountsaccounts_ida="'.$row['id'].'"';
        //echo '-------sql3:'.$sql3;
        $val = '';
        $result3 = $db->query($sql3);
        while ($row3 = $db->fetchByAssoc($result3)) {
            $val = $row3['hra_r_count'];
        }
        $csv .= encloseForCSV($val);
        $sql4 = 'SELECT DISTINCT
        hia.bandwidth_type hia_bandwidth_type
        FROM
        hit_ip_trans_batch hitb,
        hit_ip_allocations hia
        WHERE 
        hitb.target_owning_org_id ="'.$row['id'].'"
        AND hia.hit_ip_trans_batch_id = hitb.id
        AND hia. STATUS = "EFFECTIVE"
        LIMIT 1';
        //echo '-------sql4:'.$sql4;
        $val = '';
        $result4 = $db->query($sql4);
        while ($row4 = $db->fetchByAssoc($result4)) {
            $val = $row4['hia_bandwidth_type'];
        }
        $csv .= encloseForCSV($val);
        $sql5 = 'SELECT
        sum(hia.speed_limit) hia_bandwidth_count
        FROM
        hit_ip_trans_batch hitb,
        hit_ip_allocations hia
        WHERE
        hia.hit_ip_trans_batch_id = hitb.id
        AND hitb.target_owning_org_id ="'.$row['id'].'"
        AND hia. STATUS = "EFFECTIVE"';
        //echo '-------sql5:'.$sql5;
        $val = '';
        $result5 = $db->query($sql5);
        while ($row5 = $db->fetchByAssoc($result5)) {
            $val= $row5['hia_bandwidth_count'];
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
        AND hitb.target_owning_org_id = "'.$row['id'].'"
        AND hia.hit_ip_subnets_id = his.id
        AND his.ip_type = 0';  
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
        AND hitb.target_owning_org_id = "'.$row['id'].'"
        AND hia.hit_ip_subnets_id = his.id
        AND his.ip_type = 1';
        $val_1 = '';
        $result5 = $db->query($sql5_2);
        while ($row5 = $db->fetchByAssoc($result5)) {
            $val_1 = $row5['ip_count1'];
        }
        $val = $val_0 + $val_1;
        $csv .= encloseForCSV($val);
        /*$sql6 = 'SELECT
        sum(ttt.ip_qty) + count(ttt.ip_qty IS NULL) - count(ttt.ip_qty) ip_count
        FROM
        (
        SELECT DISTINCT
        (his.id),
        his.ip_qty
        FROM
        hit_ip_trans_batch hitb,
        hit_ip_allocations hia,
        hit_ip_subnets his
        WHERE
        hia.hit_ip_trans_batch_id = hitb.id
        AND hitb.target_owning_org_id = "'.$row['id'].'"
        AND hia.hit_ip_subnets_id = his.id
        ) ttt';
        //echo '-------sql6:'.$sql6;    
        $val = '';
        $result6 = $db->query($sql6);
        while ($row6 = $db->fetchByAssoc($result6)) {
            $val = $row6['ip_count'];
        }
        $csv .= encloseForCSV($val);*/
        $sql7 = 'SELECT
        count(distinct hia.port) hia_port_count
        FROM
        hit_ip_trans_batch hitb,
        hit_ip_allocations hia
        WHERE
        hia.hit_ip_trans_batch_id = hitb.id
        AND hitb.target_owning_org_id ="'.$row['id'].'"
        AND hia. STATUS = "EFFECTIVE"';
        //echo '-------sql7:'.$sql7;    
        $val = '';
        $result7 = $db->query($sql7);
        while ($row7 = $db->fetchByAssoc($result7)) {
            $val = $row7['hia_port_count'];
        }
        $csv .= encloseForCSV($val);
        $sql8 = 'SELECT
        hms. NAME hms_name
        FROM
        hit_ip_trans_batch hitb,
        hit_ip_allocations hia,
        ham_maint_sites hms
        WHERE
        hia.hit_ip_trans_batch_id = hitb.id
        AND hitb.target_owning_org_id = "'.$row['id'].'"
        AND hia. STATUS = "EFFECTIVE"
        AND hia.ham_maint_sites_id = hms.id';
        //echo '-------sql8:'.$sql8;    
        $val = '';
        $result8 = $db->query($sql8);
        while ($row8 = $db->fetchByAssoc($result8)) {
            $val = $row8['hms_name'];
        }
        $csv .= encloseForCSV($val);
        $csv .= encloseForCSV($row['sales_note_c']);
        $csv .= encloseForCSV($row['service_note_c']);
        $csv .= encloseForCSV($row['attribute6_c']);
        $csv .= encloseForCSV($row['attribute4_c']);
        $csv .= encloseForCSV($row['attribute5_c']);
        $sql9 = 'SELECT
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
        AND ac.account_id =  "'.$row['id'].'"
        AND eabr.bean_id = c.id
        AND eabr.bean_module = "Contacts"
        AND eabr.email_address_id = ea.id
        AND cc.primary_contact_c = 1';
        //echo '-------sql9:'.$sql9;    
        $val = '';
        $result9 = $db->query($sql9);
        while ($row9 = $db->fetchByAssoc($result9)) {
            $val = $row9['email_address'];
        }
        $csv .= encloseForCSV($val);
        $csv .= encloseForCSV('');
        $csv .= encloseForCSV('');
        $csv .= encloseForCSV($row['attribute8_c']);

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