<?php
$module_name = 'HAM_WO';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'ham_act_id_rule' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'HAM_ACT_ID_RULE',
        'id' => 'ACTIVITY',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'ham_act_id_rule',
      ),
      'wo_status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_WO_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'wo_status',
      ),
      'wo_number' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_WO_NUMBER',
        'width' => '10%',
        'default' => true,
        'name' => 'wo_number',
      ),
      'account' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_ACCOUNT',
        'id' => 'ACCOUNT_ID',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'account',
      ),
      'DATE_ACTUAL_START1' => 
      array (
        'type' => 'date',
        'label' => 'LBL_ACTUAL_START_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'date_actual_finish1',
      ),
      'PROCESSING_DATE' => 
      array (
        'type' => 'date',
        'label' => 'LBL_PROCESSING_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'processing_date',
      ),
      'location' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_LOCATION',
        'id' => 'HAT_ASSET_LOCATIONS_ID',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'location',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'work_center_people' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_WORK_CENTER_PEOPLE',
        'id' => 'work_center_people_id',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'work_center_people',
      ),
      /*'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),*/
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      /*1 => 
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
      ),*/
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
