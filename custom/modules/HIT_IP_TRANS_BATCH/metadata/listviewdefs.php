<?php
$module_name = 'HIT_IP_TRANS_BATCH';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'TRACKING_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TRACKING_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'EVENT_TYPE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_EVENT_TYPE',
    'id' => 'HAT_EVENTTYPE_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'OWNER_CONTACTS' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_OWNER',
    'id' => 'OWNER_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
);
?>
