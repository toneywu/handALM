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
  'CURRENT_OWNING_ORG' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CURRENT_OWNING_ORG',
    'id' => 'CURRENT_OWNING_ORG_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'OWNER_CONTACTS' => 
  array (
    'type' => 'relate',
    'studio' => 'visible', 
    'label' => 'LBL_OWNER',
    'id' => 'OWNER_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'target_owning_org'=> 
  array (
    'type' => 'relate',
    'studio' => 'visible', 
    'label' => 'LBL_TARGET_OWNING_ORG',
    'id' => 'target_owning_org_id',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'target_using_org'=>
  array (
    'type' => 'relate',
    'studio' => 'visible', 
    'label' => 'LBL_TARGET_USING_ORG',
    'id' => 'target_using_org_id',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'tracking_number'=>
  array(
    'width' => '10%',
    'label' => 'LBL_TRACKING_NUMBER',
    'default' => false,
    ),
  'PLANNED_EXECUTION_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PLANNED_EXECUTION_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'planned_complete_date'=>
  array (
    'type' => 'date',
    'label' => 'LBL_PLANNED_COMPLETE_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'source_wo'=>
  array (
    'type' => 'relate',
    'studio' => 'visible', 
    'label' => 'LBL_SOURCE_WO',
    'id' => 'source_wo_id',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'source_woop'=>
   array (
    'type' => 'relate',
    'studio' => 'visible', 
    'label' => 'LBL_SOURCE_WOOP',
    'id' => 'source_woop_id',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
);
?>
