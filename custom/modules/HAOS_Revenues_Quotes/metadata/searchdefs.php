<?php
$module_name = 'HAOS_Revenues_Quotes';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'account_name' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_ACCOUNT_NAME',
        'id' => 'ACCOUNT_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'account_name',
      ),
      'contract_number' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_CONTRACT_NUMBER',
        'id' => 'CONTACT_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'contract_number',
      ),
      'expense_group' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_EXPENSE_GROUP',
        'id' => 'HAA_CODES_ID_C',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'expense_group',
      ),
      'clear_status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_CLEAR_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'clear_status',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
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
