<?php
$module_name = 'HAM_WO';
$listViewDefs [$module_name] = 
array (
  'WO_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WO_NUMBER',
    'width' => '8%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'WO_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_WO_STATUS',
    'width' => '7%',
    'default' => true,
   'customCode'=>'<span class="color_tag color_doc_status_{$WO_STATUS_VAL}">{$WO_STATUS}</span>',
  ),
  'WO_WORK_OBJECT' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_WO_WORK_OBJECT',
    'link' => false,
    'width' => '10%',
    'default' => true,
    'customCode'=>'{$WO_WORK_OBJECT}',
  ),
/*  'ASSET' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ASSET',
    'id' => 'HAT_ASSETS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),*/
  'DATE_ACTUAL_START' => 
  array (
    'type' => 'datetimecombo',
    'studio' => 'visible',
    'label' => 'LBL_ACTUAL_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  /*'DATE_TARGET_START' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_TARGET_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_TARGET_FINISH' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_TARGET_FINISH_DATE',
    'width' => '10%',
    'default' => true,
  ),*/
  'PROCESSING_DATE' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_PROCESSING_DATE',
    'link' => false,
    'width' => '10%',
    'default' => true,
    'customCode'=>'{$PROCESSING_DATE}',
  ),
  'PROCESSING_PEOPLE' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_PROCESSING_PEOPLE',
    'link' => false,
    'width' => '10%',
    'default' => true,
    'customCode'=>'{$PROCESSING_PEOPLE}',
  ),
  'WO_OWNER' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_WO_OWNER',
    'link' => false,
    'width' => '10%',
    'default' => true,
    'customCode'=>'{$WO_OWNER}',
  ),
  'SITE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_SITE',
    'id' => 'HAM_MAINT_SITES_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'link' => false,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
?>
