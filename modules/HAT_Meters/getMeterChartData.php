<?php
/*本文件返回一个JASON式的X，Y坐标，X是时间，转换为Timestamp，Y是仪表读数
*/
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

if (!isset($_REQUEST['id']))
    die('no id');

global $db;
$txt_jason ='';

	$sql_string ="SELECT 
                  hat_meter_readings.`reading_date`,
                  hat_meter_readings.`reading_this_time` 
                FROM
                  hat_meter_readings 
                WHERE hat_meter_readings.`deleted` = 0
                  AND hat_meter_readings.meter_id='".$_REQUEST['id']."'
                  ORDER by reading_date DESC";

    $get_sql_results =  $db-> query($sql_string);//加载所有的组织类型
    while ( $sql_result = $db->fetchByAssoc($get_sql_results) ) {
          //  $txt_jason .='{"x": '.strtotime($sql_result['reading_date']).', "y": '.$sql_result['reading_this_time'].'},';
            $txt_jason .='{"x": "'.$sql_result['reading_date'].'", "y": '.$sql_result['reading_this_time'].'},';
          }

$txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);
//$txt_jason='{"node":['.$txt_jason.']}';
$txt_jason='['.$txt_jason.']';
echo($txt_jason);

exit();