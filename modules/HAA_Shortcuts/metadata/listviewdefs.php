<?php
$module_name = 'HAA_Shortcuts';
$listViewDefs [$module_name] = 
array (
  'CODE_SHORTCUT_SCENARIO' => 
  array (
    'type' => 'relate',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SCENARIO',
    'id' => 'CODE_SHORTCUT_SCENARIO_ID',
    'link' => true,
    'width' => '10%',
  ),
  'SEQUENCE_NUMBER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SEQUENCE_NUMBER',
    'width' => '5%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SHORTCUT_MODULE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_MODULE',
    'width' => '10%',
  ),
  'SHORTCUT_ACTION' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ACTION',
    'width' => '10%',
  ),
  'URL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_URL',
    'width' => '15%',
    'default' => true,
  ),
  'SHORTCUT_ICON' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ICON',
    'width' => '10%',
    'default' => true,
  ),
);
?>
