<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
*未过工单筛选表
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
    $columnNameArray=array("业务类型","工单号","客户名称","阶段","工单开始时间","工单发起人","工单最后操作结束日期","工单最后操作人","工单是否关闭");
    $eu -> buildColumnName($columnNameArray);
    
    $excel_data=array();
    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;
    //工单是否关闭只需要“否”。 liu
    $sql = 'SELECT
    hw.id,
    ha. NAME activity_name,
    hw.wo_number,
    a. NAME account_name,
    date_format(hw.date_entered,"%Y-%m-%d") date_entered,
    u.last_name,
    hw.wo_status,
    date_format(hw.date_modified,"%Y-%m-%d") date_modified,
    hwcp.name hwcp_name
    FROM
    ham_wo hw
    LEFT JOIN ham_act ha ON hw.activity = ha.id
    LEFT JOIN accounts a ON hw.account_id = a.id
    LEFT JOIN users u ON hw.created_by = u.id
    LEFT JOIN ham_work_center_people hwcp ON hw.work_center_people_id = hwcp.id
    WHERE 1 = 1
    AND hw.wo_status NOT IN ("COMPLETED", "CLOSED") 
    AND ha.name NOT LIKE "IX%"';

    if ($parameterValueArray[0] != '' ) {
        $sql = $sql.' AND hw.wo_number = "'.$parameterValueArray[0].'"';
    }
    if ($parameterValueArray[1] != '' ) {
        $sql = $sql.' AND hw.account_id = "'.$parameterValueArray[1].'"';
    }
    if ($frame_id != '' ) {
        $sql = $sql.' AND EXISTS (SELECT 1 FROM ham_maint_sites hms WHERE hms.id = hw.ham_maint_sites_id AND hms.haa_frameworks_id = "'.$frame_id.'")';
    }
    $result = $db->query($sql);
    while ($row = $db->fetchByAssoc($result)) {
        $rowData = array();
        $rowData[]= $row['activity_name'];
        $rowData[]= $row['wo_number'];
        $rowData[]= $row['account_name'];

        $sql1 = 'SELECT
        hw. NAME wp_name,
        hw.woop_status
        FROM
        ham_woop hw
        WHERE
        hw.ham_wo_id = "'.$row['id'].'"
        AND hw.woop_status in("APPROVED","COMPLETED")
        ORDER BY hw.woop_number DESC
        LIMIT 1';
        $result1  = $db->query($sql1);
        $val = '未下达';
        //$have_appr = '0';
        while ($row1 = $db->fetchByAssoc($result1)) {
            $val = $row1['wp_name'];
            /*if($row1['woop_status']=='APPROVED'){
                $val = $row1['wp_name'];
                $have_appr = '1';
            }
            if($have_appr=='0'&&$row1['woop_status']=='COMPLETED'){
                $val = '工序完成';
            }*/
        }
        $rowData[]= $val;
        $rowData[]= $row['date_entered'];
        $rowData[]= $row['last_name'];

        $sql2 = 'SELECT
        date_format(hw.date_actual_finish,"%Y-%m-%d") date_actual_finish
        FROM
        ham_woop hw
        WHERE
        hw.ham_wo_id = "'.$row['id'].'"
        AND hw.woop_status = "COMPLETED"
        ORDER BY
        hw.woop_number DESC
        LIMIT 1';
        $result2  = $db->query($sql2);
        $val = $row['date_modified'];
        while ($row2 = $db->fetchByAssoc($result2)) {
            $val = $row2['date_actual_finish'];
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
        $val = $row['hwcp_name'];
        while ($row3 = $db->fetchByAssoc($result3)) {
            if(!empty($row3['p_name'])){
                $val = $row3['p_name'];
                break;
            }
        }
        $rowData[]= $val;

        if ($row['wo_status'] == 'COMPLETED' || $row['wo_status'] == 'CLOSED'){
            $rowData[]= '是';
        } else {
            $rowData[]= '否';
        }
        $excel_data[]=$rowData;
    }
    $eu -> buildExcelContent($excel_data);
    $name = $eu -> createExcelFile('custom/modules/AOR_Reports/rpt_data_files/','未过工单筛选表');
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
function custom_report_main_CSV($paraArray=array()){
    global $db,$bean_module;
    ini_set('zlib.output_compression', 'Off');
    require_once('include/export_utils.php');
    $delimiter = getDelimiter();
    ob_start();
    $parameterValueArray=$_REQUEST['parameter_value'];
    $csv = '"业务类型"'.$delimiter.'"工单号"'.$delimiter.'"客户名称"'.$delimiter.'"阶段"'.$delimiter.'"工单开始时间"'.$delimiter.'"工单发起人"'.$delimiter.'"工单最后操作结束日期"'.$delimiter.'"工单最后操作人"'.$delimiter.'"工单是否关闭"'.$delimiter;

    $report_bean = BeanFactory::getBean('AOR_Reports',$_REQUEST['record']);
    $name = $report_bean->name;
    $frame_id = $report_bean->haa_frameworks_id_c;
    
    $sql = 'SELECT
    hw.id,
    ha. NAME activity_name,
    hw.wo_number,
    a. NAME account_name,
    hw.date_entered,
    u.last_name,
    hw.wo_status,
    hw.date_modified,
    hwcp.name hwcp_name
    FROM
    ham_wo hw
    LEFT JOIN ham_act ha ON hw.activity = ha.id
    LEFT JOIN accounts a ON hw.account_id = a.id
    LEFT JOIN users u ON hw.created_by = u.id
    LEFT JOIN ham_work_center_people hwcp ON hw.work_center_people_id = hwcp.id
    WHERE 1 = 1 
    AND ha.name NOT LIKE "IX%"';

    if ($parameterValueArray[0] != '' ) {
        $sql = $sql.' AND hw.wo_number = "'.$parameterValueArray[0].'"';
    }
    if ($parameterValueArray[1] != '' ) {
        $sql = $sql.' AND hw.account_id = "'.$parameterValueArray[1].'"';
    }
    if ($frame_id != '' ) {
        $sql = $sql.' AND EXISTS (SELECT 1 FROM ham_maint_sites hms WHERE hms.id = hw.ham_maint_sites_id AND hms.haa_frameworks_id = "'.$frame_id.'")';
    }
    $result = $db->query($sql);
    while ($row = $db->fetchByAssoc($result)) {
        $csv .= "\r\n";

        $csv .= encloseForCSV($row['activity_name']);
        $csv .= encloseForCSV($row['wo_number']);
        $csv .= encloseForCSV($row['account_name']);

        $sql1 = 'SELECT
        hw. NAME wp_name,
        hw.woop_status
        FROM
        ham_woop hw
        WHERE
        hw.ham_wo_id = "'.$row['id'].'"
        AND hw.woop_status in("APPROVED","COMPLETED")
        ORDER BY hw.woop_number DESC
        LIMIT 1';
        $result1  = $db->query($sql1);
        $val = '未下达';
        //$have_appr = '0';
        while ($row1 = $db->fetchByAssoc($result1)) {
            $val = $row1['wp_name'];
            /*if($row1['woop_status']=='APPROVED'){
                $val = $row1['wp_name'];
                $have_appr = '1';
            }
            if($have_appr=='0'&&$row1['woop_status']=='COMPLETED'){
                $val = '工序完成';
            }*/
        }
        $csv .= encloseForCSV($val);
        $csv .= encloseForCSV($row['date_entered']);
        $csv .= encloseForCSV($row['last_name']);

        $sql2 = 'SELECT
        hw.date_actual_finish
        FROM
        ham_woop hw
        WHERE
        hw.ham_wo_id = "'.$row['id'].'"
        AND hw.woop_status = "COMPLETED"
        ORDER BY
        hw.woop_number DESC
        LIMIT 1';
        $result2  = $db->query($sql2);
        $val = $row['date_modified'];
        while ($row2 = $db->fetchByAssoc($result2)) {
            $val = $row2['date_actual_finish'];
        }
        $csv .= encloseForCSV($val);

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
        $val = $row['hwcp_name'];
        while ($row3 = $db->fetchByAssoc($result3)) {
            if(!empty($row3['p_name'])){
                $val = $row3['p_name'];
                break;
            }
        }
        $csv .= encloseForCSV($val);

        if ($row['wo_status'] == 'COMPLETED' || $row['wo_status'] == 'CLOSED'){
            $csv .= encloseForCSV('是');
        } else {
            $csv .= encloseForCSV('否');
        }

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