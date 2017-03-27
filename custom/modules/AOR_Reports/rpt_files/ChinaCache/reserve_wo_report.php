<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
*预留工单报表
*/
function custom_report_main($paraArray=array()){
    /*global $db,$bean_module;
    ini_set('zlib.output_compression', 'Off');
    require_once('include/export_utils.php');
    $delimiter = getDelimiter();
    ob_start();
    $parameterValueArray=$_REQUEST['parameter_value'];
    $csv = '"工单编号"'.$delimiter.'"工单类型"'.$delimiter.'"客户名称"'.$delimiter.'"工单状态"'.$delimiter.'"数据中心"'.$delimiter.'"合同"'.$delimiter.'"预留机柜数量"'.$delimiter.'"目标开始时间"'.$delimiter.'"目标完成时间"'.$delimiter.'"工单发起人"'.$delimiter.'"当前工序"'.$delimiter.'"当前工序操作人"'.$delimiter.'"描述"'.$delimiter.'"销售人员/责任人"'.$delimiter;

    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;
    
    $sql = 'SELECT
                hw.id,
                hw.wo_number,
                ha. NAME activity_name,
                a. NAME account_name,
                hw.wo_status,
                hms. NAME site_name,
                ac. NAME contract_name,
                hw.date_target_start,
                hw.date_target_finish,
                u.last_name,
                hw.description
            FROM
                ham_wo hw
            LEFT JOIN ham_act ha ON hw.activity = ha.id
            LEFT JOIN accounts a ON hw.account_id = a.id
            LEFT JOIN users u ON hw.created_by = u.id
            LEFT JOIN ham_work_center_people hwcp ON hw.work_center_people_id = hwcp.id
            LEFT JOIN ham_maint_sites hms ON hms.id = hw.ham_maint_sites_id
            LEFT JOIN aos_contracts ac ON hw.contract_id = ac.id
            WHERE
                1 = 1
            AND ha. NAME LIKE "%预留%"';

    if ($parameterValueArray[0] != '' ) {
        $frame_id = $parameterValueArray[0];
    }
    if ($parameterValueArray[1] != '' ) {
        $sql = $sql.' AND hw.wo_number = "'.$parameterValueArray[1].'"';
    }
    if ($parameterValueArray[2] != '' ) {
        $sql = $sql.' AND hw.account_id = "'.$parameterValueArray[2].'"';
    }
    if ($parameterValueArray[3] != '' ) {
        $sql = $sql.' AND hw.contract_id = "'.$parameterValueArray[3].'"';
    }
    if ($parameterValueArray[4] != '' ) {
        $sql = $sql.' AND hw.date_target_start >= "'.$parameterValueArray[4].'"';
    }
    if ($parameterValueArray[5] != '' ) {
        $sql = $sql.' AND hw.date_target_start < "'.$parameterValueArray[5].'"';
    }
    if ($parameterValueArray[6] != '' ) {
        $sql = $sql.' AND hw.date_target_finish >= "'.$parameterValueArray[6].'"';
    }
    if ($parameterValueArray[7] != '' ) {
        $sql = $sql.' AND hw.date_target_finish < "'.$parameterValueArray[7].'"';
    }
    if ($frame_id != '' ) {
        $sql = $sql.' AND EXISTS (SELECT 1 FROM ham_maint_sites hms WHERE hms.id = hw.ham_maint_sites_id AND hms.haa_frameworks_id = "'.$frame_id.'")';
    }
    $result = $db->query($sql);
    while ($row = $db->fetchByAssoc($result)) {
        $csv .= "\r\n";

        $csv .= encloseForCSV($row['wo_number']);
        $csv .= encloseForCSV($row['activity_name']);
        $csv .= encloseForCSV($row['account_name']);
        $csv .= encloseForCSV($row['wo_status']);
        $csv .= encloseForCSV($row['site_name']);
        $csv .= encloseForCSV($row['contract_name']);
        $csv .= encloseForCSV($row['date_target_start']);
        $csv .= encloseForCSV($row['date_target_finish']);
        $csv .= encloseForCSV($row['last_name']);
        $csv .= encloseForCSV($row['description']);
        

    }
    $name = getMillisecond();
    createRptDataFile($name,$csv);
    print $name.'.csv';*/
   


    global $db,$bean_module,$app_list_strings;
    ini_set('zlib.output_compression', 'Off');
    require_once('include/export_utils.php');
    require_once('include/utils.php');
    require_once('custom/modules/AOR_Reports/ExcelUtil.php');
    ob_start();
    $parameterValueArray=$_REQUEST['parameter_value'];
    $eu = new ExcelUtil();
    $eu -> setActiveSheet(0);
    $columnNameArray=array("工单编号","工单类型","客户名称","工单状态","数据中心","合同","预留机柜数量","目标开始时间","目标完成时间","工单发起人","当前工序","当前工序操作人","描述","销售人员/责任人");
    $eu -> buildColumnName($columnNameArray);
    
    $excel_data=array();
    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;
    
    $sql = 'SELECT
                hw.id,
                hw.wo_number,
                ha. NAME activity_name,
                a. NAME account_name,
                hw.wo_status,
                hw.ham_maint_sites_id,
                ac. NAME contract_name,
                date_format(hw.date_target_start,"%Y-%m-%d") date_target_start,
                date_format(hw.date_target_finish,"%Y-%m-%d") date_target_finish,
                u.last_name,
                hw.description,
                accounts_cstm.attribute2_c
            FROM
                ham_wo hw
            LEFT JOIN ham_act ha ON hw.activity = ha.id
            LEFT JOIN accounts a ON hw.account_id = a.id
            LEFT JOIN accounts_cstm ON accounts_cstm.id_c = a.id
            LEFT JOIN users u ON hw.created_by = u.id
            LEFT JOIN aos_contracts ac ON hw.contract_id = ac.id
            WHERE
                 hw.deleted = 0
            AND ha. NAME LIKE "%预留%"
            AND ha.name NOT LIKE "IX%"';

    if ($parameterValueArray[0] != '' ) {
        $frame_id = $parameterValueArray[0];
    }
    if ($parameterValueArray[1] != '' ) {
        $sql = $sql.' AND hw.wo_number = "'.$parameterValueArray[1].'"';
    }
    if ($parameterValueArray[2] != '' ) {
        $sql = $sql.' AND hw.account_id = "'.$parameterValueArray[2].'"';
    }
    if ($parameterValueArray[3] != '' ) {
        $sql = $sql.' AND hw.contract_id = "'.$parameterValueArray[3].'"';
    }
    if ($parameterValueArray[4] != '' ) {
        $sql = $sql.' AND hw.date_target_start >= "'.$parameterValueArray[4].'"';
    }
    if ($parameterValueArray[5] != '' ) {
        $sql = $sql.' AND hw.date_target_start < "'.$parameterValueArray[5].'"';
    }
    if ($parameterValueArray[6] != '' ) {
        $sql = $sql.' AND hw.date_target_finish >= "'.$parameterValueArray[6].'"';
    }
    if ($parameterValueArray[7] != '' ) {
        $sql = $sql.' AND hw.date_target_finish < "'.$parameterValueArray[7].'"';
    }
    if ($frame_id != '' ) {
        $sql = $sql.' AND EXISTS (SELECT 1 FROM ham_maint_sites hms WHERE hms.id = hw.ham_maint_sites_id AND hms.haa_frameworks_id = "'.$frame_id.'")';
    }
    $result = $db->query($sql);
    while ($row = $db->fetchByAssoc($result)) {
        $rowData = array();
        $rowData[]= $row['wo_number'];
        $rowData[]= $row['activity_name'];
        $rowData[]= $row['account_name'];
        $status_list = $app_list_strings['ham_wo_status_list'];
        $value="";
        foreach ($status_list as $k => $v) {
            if ($k==$row['wo_status']) {
                $value=$v;
                break;
            }
        }
        $rowData[]= $value;
        $sql0 = 'SELECT
                    hal.map_address
                FROM
                    hat_asset_locations hal
                LEFT JOIN haa_codes hc ON hal.code_asset_location_type_id = hc.id
                WHERE
                    hal.deleted = 0
                AND hal.ham_maint_sites_id ="'.$row['ham_maint_sites_id'].'"
                AND hc. NAME = "数据中心"';
        $result0 = $db->query($sql0);
        $val = '';
        while ($row0 = $db->fetchByAssoc($result0)) {
            $val=$row0['map_address'];
        }         
        $rowData[]= $val;
        $rowData[]= $row['contract_name'];
        $sql1 = 'SELECT
                    sum(hwl.quantity) prod_count
                FROM
                    ham_wo_lines hwl
                LEFT JOIN aos_products_cstm apc ON apc.id_c = hwl.product_id
                WHERE
                    hwl.deleted = 0
                AND apc.asset_criticality_c = "A"
                AND ham_wo_id =  "'.$row['id'].'"';
        $result1 = $db->query($sql1);
        $val = '';
        while ($row1 = $db->fetchByAssoc($result1)) {
            $val=$row1['prod_count'];
        }        
        $rowData[]= $val;
        $rowData[]= $row['date_target_start'];
        $rowData[]= $row['date_target_finish'];
        $rowData[]= $row['last_name'];
        $sql2 = 'SELECT
                    hw. NAME wp_name,
                    hw.woop_status
                FROM
                    ham_woop hw
                WHERE
                    hw.ham_wo_id = "'.$row['id'].'"
                AND hw.woop_status in("APPROVED","COMPLETED")
                ORDER BY hw.woop_number DESC
                LIMIT 1';
        $val = '';
        $result2  = $db->query($sql2);
        while ($row2 = $db->fetchByAssoc($result2)) {
            $val=$row2['wp_name'];
        }         
        $rowData[]= $val;
        $sql3 = 'SELECT
                hwcp. NAME p_name
                FROM
                ham_woop hw
                LEFT JOIN ham_work_center_people hwcp ON hw.work_center_people_id = hwcp.id
                WHERE
                hw.ham_wo_id = "'.$row['id'].'"
                AND hw.woop_status in ("APPROVED","COMPLETED")
                ORDER BY
                hw.woop_number DESC';
        $result3  = $db->query($sql3);
        $val = '';
        while ($row3 = $db->fetchByAssoc($result3)) {
            if(!empty($row3['p_name'])){
                $val = $row3['p_name'];
                break;
            }
        }
        $rowData[]= $val;
        $rowData[]= $row['description'];
        $rowData[]= $row['attribute2_c'];
        $excel_data[]=$rowData;
    }
    $eu -> buildExcelContent($excel_data);
    $name = $eu -> createExcelFile('custom/modules/AOR_Reports/rpt_data_files/','预留工单报表');
    /*$name= $GLOBALS['locale']->translateCharset($name, 'UTF-8', $GLOBALS['locale']->getExportCharset());*/
    ob_clean();
    header("Pragma: cache");
    header("Content-type: text/html; charset=".$GLOBALS['locale']->getExportCharset());
    header("Content-Disposition: attachment; filename=\"{$name}.csv\"");
    header("Content-transfer-encoding: binary");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
    header("Last-Modified: " . TimeDate::httpTime() );
    header("Cache-Control: post-check=0, pre-check=0", false );
    
    print $name;

    sugar_cleanup(true);
}
?>