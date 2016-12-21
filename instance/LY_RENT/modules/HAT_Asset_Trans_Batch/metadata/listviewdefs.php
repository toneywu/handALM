<?php
$module_name = 'HAT_Asset_Trans_Batch';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSET_TRANS_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'default' => true,
    'label' => 'LBL_ASSET_TRANS_STATUS',
    'width' => '5%',
    'customCode'=>'<span class="color_tag color_doc_status_{$ASSET_TRANS_STATUS_VAL}">{$ASSET_TRANS_STATUS}</span>',
  ),
  /*'CURRENT_OWNING_ORG' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CURRENT_OWNING_ORG',
    'id' => 'CURRENT_OWNING_ORG_ID',
    'link' => true,
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
  'PLANNED_EXECUTION_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PLANNED_EXECUTION_DATE',
    'width' => '10%',
    'default' => true,
  ),*/
);
?>
