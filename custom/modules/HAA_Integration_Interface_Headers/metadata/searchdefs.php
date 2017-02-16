<?php
$module_name = 'HAA_Integration_Interface_Headers';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'interface_code' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INTERFACE_CODE',
        'width' => '10%',
        'default' => true,
        'name' => 'interface_code',
      ),
      'ext_batch_number' => 
      array (
        'type' => 'name',
        'link' => true,
        'label' => 'LBL_EXT_BATCH_NUMBER',
        'width' => '10%',
        'default' => true,
        'name' => 'ext_batch_number',
      ),
      'received_date' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_RECEIVED_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'received_date',
      ),
      'line_cnt' => 
      array (
        'type' => 'int',
        'label' => 'LBL_LINE_CNT',
        'width' => '10%',
        'default' => true,
        'name' => 'line_cnt',
      ),
      'process_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PROCESS_STATUS',
        'width' => '10%',
        'name' => 'process_status',
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
