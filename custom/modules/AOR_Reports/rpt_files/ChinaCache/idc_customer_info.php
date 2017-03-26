<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
*IDC客户信息表
*/
function custom_report_main($paraArray){
    global $db,$bean_module,$app_list_strings;
    //ini_set('zlib.output_compression', 'Off');
    ini_set("memory_limit", "1024M"); // 不够继续加大
    set_time_limit(0);
    ini_set("display_errors","On");  
    error_reporting(E_ALL);  
    require_once('include/export_utils.php');
    require_once('include/utils.php');
    require_once('custom/modules/AOR_Reports/ExcelUtil.php');
    ob_start();
    $parameterValueArray=$_REQUEST['parameter_value'];
    $eu = new ExcelUtil();
    //$eu -> setActiveSheet(0);
    /*$columnNameArray=array("客户ID","公司名称","曾用名","客户类型","销售代表","销售单元","客服代表","散U托管（U）","整柜托管(R)","预留托管(R)","带宽类型","带宽数量（M）","IP   （个）","端口","所在机房","客户行业","客户业务","所属行业分类(工信部)","单位所属分类(工信部)","单位性质(工信部)","通知发送邮箱","注意事项","备注","失效时间");*/
    $columnNameArray=array("客户ID","公司名称","曾用名","客户类型","销售代表","销售单元","客服代表","散U托管（U）","整柜托管(R)","预留托管(R)","带宽类型","带宽数量（M）","IP   （个）","端口","所在机房","客户行业","客户业务","通知发送邮箱","注意事项","备注","失效时间");
    $eu -> buildColumnName($columnNameArray);
    
    $excel_data=array();
    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;
    $sql = 'SELECT DISTINCT
                (hms.id) site_id,
                hms. NAME site_name,
                hia.bandwidth_type,
                a.*,ac.*
            FROM
                accounts a
            LEFT JOIN accounts_cstm ac ON a.id = ac.id_c
            LEFT JOIN hit_ip_allocations hia ON (
                a.id = hia.target_owning_org_id
                AND hia.deleted = 0
            )
            LEFT JOIN hit_ip_subnets his ON (
                hia.hit_ip_subnets_id = his.id
            )
            LEFT JOIN ham_maint_sites hms ON (
                his.hat_asset_locations_id = hms.id
            )
            WHERE
                a.deleted = 0
            AND ac.org_type_c = "EXTERNAL"
            AND ac.is_asset_org_c = 1
            AND hia.bandwidth_type is not null 
            AND hia.bandwidth_type != ""
            AND hms.id is not null 
            AND hms.id != ""
    AND ac.haa_frameworks_id_c ="'.$parameterValueArray[0].'"';

    if ($parameterValueArray[1] != '' ) {
        $sql = $sql.' AND a.id = "'.$parameterValueArray[1].'"';
    }

    if ($frame_id != '' ) {
        $sql = $sql.' AND ac.haa_frameworks_id_c = "'.$frame_id.'"';
    }
    //$sql.=' limit 5000';
    //echo $sql;
    $result = $db->query($sql);
    $ed_count=0;
    $ed_index=0;
    while ($row = $db->fetchByAssoc($result)) {
        $ed_count++;
        $rowData = array();
        $rowData[]= $row['organization_number_c'];
        $rowData[]= $row['full_name_c'];
        $rowData[]= $row['name'];
        $rowData[]= $row['attribute9_c'];
        $rowData[]= $row['attribute2_c'];//销售代表
        //销售代表的值为空时，销售单元有值也不显示，输出为空
        if ($row['attribute2_c'] =='') {
            $rowData[] ='';
        }else{
            $rowData[]= $row['attribute1_c'];
        }
        $sql0 ='select last_name from contacts where id ="'.$row['contact_id_c'].'"';
        $val = '';
        $result0 = $db->query($sql0);
        while ($row0 = $db->fetchByAssoc($result0)) {
            $val = $row0['last_name'];
        }
        $rowData[]= $val;
        $sql1 = 'SELECT
                    sum(hra.height) hra_height
                FROM
                    hit_rack_allocations hra
                LEFT JOIN hat_assets ha ON ha.id = hra.hat_assets_id
                LEFT JOIN hit_racks hr ON hra.hit_racks_id = hr.id
                WHERE
                    hra.deleted = 0
                AND hr.enable_partial_allocation = 1
                AND ha.using_org_id = "'.$row['id'].'"';
       // echo '-------sql1:'.$sql1;
        $val = '';
        $result1 = $db->query($sql1);
        while ($row1 = $db->fetchByAssoc($result1)) {
            $val = $row1['hra_height'];
        }
        $rowData[]= $val;
        $sql2 = 'SELECT
                    count(hr.id) hr_count
                FROM
                    hit_racks hr
                LEFT JOIN hat_assets ha ON hr.hat_assets_id = ha.id
                WHERE
                    hr.deleted = 0
                AND ha.using_org_id ="'.$row['id'].'"';
        //echo '-------sql2:'.$sql2;
        $val = '';
        $result2 = $db->query($sql2);
        while ($row2 = $db->fetchByAssoc($result2)) {
            $val = $row2['hr_count'];
        }
        $rowData[]= $val;
        $sql3 = 'SELECT
                    count(hr.id) hr_p_count
                FROM
                    hit_racks hr
                LEFT JOIN hat_assets ha ON hr.hat_assets_id = ha.id
                WHERE
                    hr.deleted = 0
                AND ha.asset_status = "PreAssigned"
                AND ha.using_org_id = "'.$row['id'].'"';
        //echo '-------sql3:'.$sql3;
        $val = '';
        $result3 = $db->query($sql3);
        while ($row3 = $db->fetchByAssoc($result3)) {
            $val = $row3['hr_p_count'];
        }
        $rowData[]= $val;
        $sql4 = 'SELECT
                    his.hat_asset_locations_id,
                    hia.bandwidth_type hia_bandwidth_type,
                    sum(hia.speed_limit) hia_bandwidth_count,
                    count(DISTINCT hia. PORT) hia_port_count
                FROM
                    hit_ip_allocations hia
                LEFT JOIN hit_ip_subnets his ON hia.hit_ip_subnets_id = his.id
                WHERE
                    hia.deleted = 0
                AND hia.target_owning_org_id = "'.$row['id'].'"
                AND hia.bandwidth_type = "'.$row['bandwidth_type'].'"
                AND hia.bandwidth_type != ""
                AND (
                    hia. STATUS = "EFFECTIVE"
                    OR hia. STATUS = ""
                    OR hia. STATUS IS NULL
                )
                GROUP BY
                    his.hat_asset_locations_id
                HAVING
                    his.hat_asset_locations_id ="'.$row['site_id'].'"';
        //echo '-------sql4:'.$sql4;
        $val_hia_bandwidth_type = '';
        $val_hia_bandwidth_count = '';
        $val_hia_port_count = '';
        $result4 = $db->query($sql4);
        while ($row4 = $db->fetchByAssoc($result4)) {
            $val_hia_bandwidth_type = $row4['hia_bandwidth_type'];
            $val_hia_bandwidth_count = $row4['hia_bandwidth_count'];
            $val_hia_port_count = $row4['hia_port_count'];
        }
        $rowData[]= $val_hia_bandwidth_type;
        $rowData[]= $val_hia_bandwidth_count;
        $sql5_1 = 'SELECT 
                    sum(his.ip_qty) ip_count0
                    FROM
                    hit_ip_allocations hia,
                    hit_ip_subnets his
                    WHERE
                    hia.deleted=0
                    AND hia.target_owning_org_id = "'.$row['id'].'"
                    AND hia.hit_ip_subnets_id = his.id
                    AND his.ip_type = 1';  
        $val='';
        $val_0 = '';
        $result5 = $db->query($sql5_1);
        while ($row5 = $db->fetchByAssoc($result5)) {
            $val_0 = $row5['ip_count0'];
        }
        $sql5_2 = 'SELECT 
                    count(his.id) ip_count1
                    FROM
                    hit_ip_allocations hia,
                    hit_ip_subnets his
                    WHERE
                    hia.deleted=0
                    AND hia.target_owning_org_id = "'.$row['id'].'"
                    AND hia.hit_ip_subnets_id = his.id
                    AND his.ip_type = 0';
        $val_1 = '';
        $result5 = $db->query($sql5_2);
        while ($row5 = $db->fetchByAssoc($result5)) {
            $val_1 = $row5['ip_count1'];
        }
        $val = $val_0 + $val_1;
        $rowData[]= $val;
        $rowData[]= $val_hia_port_count;
       
        /*$sql8 = 'SELECT
        hms. NAME hms_name
        FROM
        hit_ip_allocations hia
        LEFT JOIN ham_maint_sites hms ON hia.ham_maint_sites_id = hms.id
        WHERE
        hia.deleted=0
        AND hia.target_owning_org_id = "'.$row['id'].'"
        AND (
                hia. STATUS = "EFFECTIVE"
            OR hia. STATUS = ""
            OR hia. STATUS IS NULL
        )';
        //echo '-------sql8:'.$sql8;    
        $val = '';
        $result8 = $db->query($sql8);
        while ($row8 = $db->fetchByAssoc($result8)) {
            $val = $row8['hms_name'];
        }*/
        //add liu 
        $sql_site = "SELECT hat_asset_locations.map_address site_name
                    FROM hat_asset_locations LEFT JOIN haa_codes ON hat_asset_locations.code_asset_location_type_id = haa_codes.id
                    WHERE hat_asset_locations.ham_maint_sites_id = '".$row['site_id']."'
                    AND haa_codes. NAME = '数据中心'";
        $val = '';
        $result_site = $db->query($sql_site);
        while ($row_site = $db->fetchByAssoc($result_site)) {
            $val = $row_site['site_name'];
        }
        $rowData[]= $val;
        //$rowData[]= $row['site_name'];
        $rowData[]= $row['sales_note_c'];
        $rowData[]= $row['service_note_c'];
        /*$rowData[]= $row['attribute6_c'];
        $rowData[]= $row['attribute4_c'];
        $rowData[]= $row['attribute5_c'];*/
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
        $rowData[]= $val;
        $rowData[]= '';
        $rowData[]= '';
        $rowData[]= $row['attribute8_c'];
        $excel_data[]=$rowData;
        unset($rowData);
        if($ed_count==100){
            $eu -> buildExcelContent($excel_data,$ed_index);
            unset($excel_data);
            $excel_data=array();
            $ed_index=$ed_index+$ed_count;
            $ed_count=0;
            
        }
    }
    if($ed_count!=0){
        $eu -> buildExcelContent($excel_data,$ed_index);
    }
    $name = $eu -> createExcelFile('custom/modules/AOR_Reports/rpt_data_files/','IDC客户信息表');
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
function custom_report_main_CSV($paraArray){
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

    $csv = '"客户ID"'.$delimiter.'"公司名称"'.$delimiter.'"曾用名"'.$delimiter.'"客户类型"'.$delimiter.'"销售代表"'.$delimiter.'"销售单元"'.$delimiter.'"客服代表"'.$delimiter.'"散U托管（U）"'.$delimiter.'"整柜托管(R)"'.$delimiter.'"预留托管(R）"'.$delimiter.'"带宽类型"'.$delimiter.'"带宽数量（M）"'.$delimiter.'"IP   （个）"'.$delimiter.'"端口"'.$delimiter.'"所在机房"'.$delimiter.'"客户行业"'.$delimiter.'"客户业务"'.$delimiter.'"所属行业分类(工信部)"'.$delimiter.'"单位所属分类(工信部)"'.$delimiter.'"单位性质(工信部)"'.$delimiter.'"通知发送邮箱"'.$delimiter.'"注意事项"'.$delimiter.'"备注"'.$delimiter.'"失效时间"'.$delimiter;

 
    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;

    $sql = 'SELECT DISTINCT
                (hms.id) site_id,
                hms. NAME site_name,
                a.*,ac.*
            FROM
                accounts a
            LEFT JOIN accounts_cstm ac ON a.id = ac.id_c
            LEFT JOIN hit_ip_allocations hia ON (
                a.id = hia.target_owning_org_id
                AND hia.deleted = 0
            )
            LEFT JOIN hit_ip_subnets his ON (
                hia.hit_ip_subnets_id = his.id
            )
            LEFT JOIN ham_maint_sites hms ON (
                his.hat_asset_locations_id = hms.id
            )
            WHERE
                a.deleted = 0
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
                    hit_rack_allocations hra
                LEFT JOIN hat_assets ha ON ha.id = hra.hat_assets_id
                LEFT JOIN hit_racks hr ON hra.hit_racks_id = hr.id
                WHERE
                    hra.deleted = 0
                AND hr.enable_partial_allocation = 1
                AND ha.using_org_id = "'.$row['id'].'"';
       // echo '-------sql1:'.$sql1;
        $val = '';
        $result1 = $db->query($sql1);
        while ($row1 = $db->fetchByAssoc($result1)) {
            $val = $row1['hra_height'];
        }
        $csv .= encloseForCSV($val);
        $sql2 = 'SELECT
                    count(hr.id) hr_count
                FROM
                    hit_racks hr
                LEFT JOIN hat_assets ha ON hr.hat_assets_id = ha.id
                WHERE
                    hr.deleted = 0
                AND ha.using_org_id ="'.$row['id'].'"';
        //echo '-------sql2:'.$sql2;
        $val = '';
        $result2 = $db->query($sql2);
        while ($row2 = $db->fetchByAssoc($result2)) {
            $val = $row2['hr_count'];
        }
        $csv .= encloseForCSV($val);
        $sql3 = 'SELECT
                    count(hr.id) hr_p_count
                FROM
                    hit_racks hr
                LEFT JOIN hat_assets ha ON hr.hat_assets_id = ha.id
                WHERE
                    hr.deleted = 0
                AND ha.asset_status = "PreAssigned"
                AND ha.using_org_id = "'.$row['id'].'"';
        //echo '-------sql3:'.$sql3;
        $val = '';
        $result3 = $db->query($sql3);
        while ($row3 = $db->fetchByAssoc($result3)) {
            $val = $row3['hr_p_count'];
        }
        $csv .= encloseForCSV($val);
        $sql4 = 'SELECT
                    his.hat_asset_locations_id,
                    hia.bandwidth_type hia_bandwidth_type,
                    sum(hia.speed_limit) hia_bandwidth_count,
                    count(DISTINCT hia. PORT) hia_port_count
                FROM
                    hit_ip_allocations hia
                LEFT JOIN hit_ip_subnets his ON hia.hit_ip_subnets_id = his.id
                WHERE
                    hia.deleted = 0
                AND hia.target_owning_org_id = "'.$row['id'].'"
                AND (
                    hia. STATUS = "EFFECTIVE"
                    OR hia. STATUS = ""
                    OR hia. STATUS IS NULL
                )
                GROUP BY
                    his.hat_asset_locations_id
                HAVING
                    his.hat_asset_locations_id ="'.$row['site_id'].'"';
        //echo '-------sql4:'.$sql4;
        $val_hia_bandwidth_type = '';
        $val_hia_bandwidth_count = '';
        $val_hia_port_count = '';
        $result4 = $db->query($sql4);
        while ($row4 = $db->fetchByAssoc($result4)) {
            $val_hia_bandwidth_type = $row4['hia_bandwidth_type'];
            $val_hia_bandwidth_count = $row4['hia_bandwidth_count'];
            $val_hia_port_count = $row4['hia_port_count'];
        }
        $csv .= encloseForCSV($val_hia_bandwidth_type);
        $csv .= encloseForCSV($val_hia_bandwidth_count);

        $sql5_1 = 'SELECT 
                    sum(his.ip_qty) ip_count0
                    FROM
                    hit_ip_allocations hia,
                    hit_ip_subnets his
                    WHERE
                    hia.deleted=0
                    AND hia.target_owning_org_id = "'.$row['id'].'"
                    AND hia.hit_ip_subnets_id = his.id
                    AND his.ip_type = 1';  
        $val='';
        $val_0 = '';
        $result5 = $db->query($sql5_1);
        while ($row5 = $db->fetchByAssoc($result5)) {
            $val_0 = $row5['ip_count0'];
        }
        $sql5_2 = 'SELECT 
                    count(his.id) ip_count1
                    FROM
                    hit_ip_allocations hia,
                    hit_ip_subnets his
                    WHERE
                    hia.deleted=0
                    AND hia.target_owning_org_id = "'.$row['id'].'"
                    AND hia.hit_ip_subnets_id = his.id
                    AND his.ip_type = 0';
        $val_1 = '';
        $result5 = $db->query($sql5_2);
        while ($row5 = $db->fetchByAssoc($result5)) {
            $val_1 = $row5['ip_count1'];
        }
        $val = $val_0 + $val_1;
        $csv .= encloseForCSV($val);
        
        $csv .= encloseForCSV($val_hia_port_count);
        /*$sql8 = 'SELECT
        hms. NAME hms_name
        FROM
        hit_ip_allocations hia
        LEFT JOIN ham_maint_sites hms ON hia.ham_maint_sites_id = hms.id
        WHERE
        hia.deleted=0
        AND hia.target_owning_org_id = "'.$row['id'].'"
        AND (
                hia. STATUS = "EFFECTIVE"
            OR hia. STATUS = ""
            OR hia. STATUS IS NULL
        )';
        //echo '-------sql8:'.$sql8;    
        $val = '';
        $result8 = $db->query($sql8);
        while ($row8 = $db->fetchByAssoc($result8)) {
            $val = $row8['hms_name'];
        }*/
        $csv .= encloseForCSV($row['site_name']);
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
    $name = getMillisecond();
    $csv= $GLOBALS['locale']->translateCharset($csv, 'UTF-8', $GLOBALS['locale']->getExportCharset());
    createRptDataFile($name,$csv);
    print $name.'.csv';
    //echo '---------------------3-------------------------';
    /*
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