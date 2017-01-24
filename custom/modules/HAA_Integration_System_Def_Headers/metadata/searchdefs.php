<?php
$module_name = 'HAA_Integration_System_Def_Headers';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'own_interface' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_OWN_INTERFACE',
        'id' => 'HAA_INTERFACES_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'own_interface',
      ),
      'link_system' => 
      array (
        'type' => 'varchar',
        'studio' => 'visible',
        'label' => 'LBL_LIMK_SYSTEM',
        'width' => '10%',
        'default' => true,
        'name' => 'link_system',
      ),
      'interface_type' => 
      array (
        'type' => 'varchar',
        'studio' => 'visible',
        'label' => 'LBL_INTERFACE_TYPE',
        'width' => '10%',
        'default' => true,
        'name' => 'interface_type',
      ),
      'effected_flag' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_EFFECTED_FLAG',
        'width' => '10%',
        'name' => 'effected_flag',
      ),
      'enabled_flag' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_ENABLED_FLAG',
        'width' => '10%',
        'name' => 'enabled_flag',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
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
