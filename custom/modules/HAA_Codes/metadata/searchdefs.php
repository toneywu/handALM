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
      'parent_type_value' => 
      array (
       'type' => 'relate',
       'name' => 'parent_type_value',
       'width' => '10%',
       'default' => true,
       'label' => 'LBL_PARENT_TYPE_VALUE',
       'id' => 'parent_type_value_ID',
       'link' => true,
       'studio' => 'visible',
       'displayParams' => 
       array (
        'initial_filter' => '&code_type_advanced="+$("#code_type_basic").val()+"',
        ),
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
      'parent_type_value' => 
      array (
       'type' => 'relate',
       'name' => 'parent_type_value',
       'width' => '10%',
       'default' => true,
       'label' => 'LBL_PARENT_TYPE_VALUE',
       'id' => 'parent_type_value_ID',
       'link' => true,
       'studio' => 'visible',
       'displayParams' => 
       array (
        'initial_filter' => '&code_type_advanced="+$("#code_type_basic").val()+"',
        ),
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
