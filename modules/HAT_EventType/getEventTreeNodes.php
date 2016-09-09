<?php
error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

global $db;
$txt_jason ='';




if($_REQUEST['type']!="") { //如果是Locationg来源，需要读取子位置和子资产（Asset来源只需要子资产）
        $sel ="SELECT 
                              hat_eventtype.id,
                              hat_eventtype.name
                            FROM
                              hat_eventtype 
                            WHERE 
                             hat_eventtype.`deleted`=0 AND
                             hat_eventtype.`basic_type`= '".$_REQUEST['type']."'";

        if (isset($_REQUEST['id'])) {//如果指明了当前的ID
            $sel .= " AND parent_eventtype_id = '".$_REQUEST['id']."'";
        } else {
            $sel .= " AND parent_eventtype_id = ''";
        }
        $sel .= " ORDER BY name";

    $bean_event =  $db-> query($sel);

    while ( $eventtype = $db->fetchByAssoc($bean_event) ) {
            $txt_jason .='{id:"'.$eventtype['id'].'",';
            $txt_jason .='name:"'.$eventtype['name'].'"},';
    }

$txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);
//$txt_jason='{"node":['.$txt_jason.']}';
$txt_jason='['.$txt_jason.']';
echo($txt_jason);
}
exit();