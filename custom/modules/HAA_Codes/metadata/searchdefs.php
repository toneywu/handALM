<?php
$module_name = 'HAA_Codes';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'code_module' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_CODE_MODULE',
        'width' => '10%',
        'default' => true,
        'name' => 'code_module',
      ),
      'code_tag' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CODE_TAG',
        'width' => '10%',
        'default' => true,
        'name' => 'code_tag',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'code_module' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_CODE_MODULE',
        'width' => '10%',
        'default' => true,
        'name' => 'code_module',
      ),
      'code_type' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_CODE_TYPE',
        'width' => '10%',
        'default' => true,
        'name' => 'code_type',
      ),
      'code_tag' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CODE_TAG',
        'width' => '10%',
        'default' => true,
        'name' => 'code_tag',
      ),
      'haa_ff' => 
      array (
        'type' => 'relate',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_HAA_FF',
        'id' => 'HAA_FF_ID',
        'link' => true,
        'width' => '10%',
        'name' => 'haa_ff',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
