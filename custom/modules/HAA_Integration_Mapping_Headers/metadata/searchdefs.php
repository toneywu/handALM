<?php
$module_name = 'HAA_Integration_Mapping_Headers';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'maping_def_name' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_MAPING_DEF_NAME',
        'id' => 'HAA_INTEGRATION_MAPPING_DEF_HEADERS_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'maping_def_name',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
