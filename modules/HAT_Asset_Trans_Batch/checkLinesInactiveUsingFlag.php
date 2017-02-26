<?php


if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

if (empty ($_REQUEST['hat_eventtype_id'])) {
  return "0";
}
//echo $_REQUEST['hat_eventtype_id'];
$bean_eventType = BeanFactory :: getBean('HAT_EventType')->retrieve_by_string_fields(array (
            'id' =>  $_REQUEST['hat_eventtype_id'],
            ));
echo $bean_eventType->no_lines_inactive_using_flag;


?>