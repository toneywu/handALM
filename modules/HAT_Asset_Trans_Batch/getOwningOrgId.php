<?php


if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

if (empty ($_REQUEST['orgname'])) {
  return "";
}

$bean_account = BeanFactory :: getBean('Accounts')->retrieve_by_string_fields(array (
            'name' =>  $_REQUEST['orgname'],
            'haa_frameworks_id_c' => $_REQUEST['haa_frameworks_id']
            ));
echo $bean_account->id;

/*global $db;

$wo_sql = "SELECT 
          h.date_target_start,
          h.date_target_finish
      FROM
            ham_wo h 
      WHERE h.deleted=0 
      AND   h.id ='" . $_GET['ham_wo_id'] . "'";
$wo_result = $db->query($wo_sql);

while ($wo_row = $db->fetchByAssoc($wo_result)) {
  $wo_line_data = json_encode($wo_row);
  echo $wo_line_data;
}
exit ();*/
?>