<?php
$module_name = 'HAOS_Contract_Templates';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'template_code' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TEMPLATE_CODE',
        'width' => '10%',
        'default' => true,
        'name' => 'template_code',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'effective_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_EFFECTIVE_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'effective_date',
      ),
      'inactive_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_INACTIVE_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'inactive_date',
      ),
      'enabled_flag' => 
      array (
        'type' => 'bool',
        'default' => true,
        'label' => 'LBL_ENABLED_FLAG',
        'width' => '10%',
        'name' => 'enabled_flag',
      ),
      'contract_type' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_CONTRACT_TYPE',
        'id' => 'HAA_CODES_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'contract_type',
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
