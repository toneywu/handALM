<?php
$module_name = 'HAM_Asset_Routes';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'site' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_SITE',
        'id' => 'HAM_MAINT_SITES_ID',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'site',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
      'assigned_user_id' => 
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
        'default' => true,
        'width' => '10%',
      ),
      'costing_rule' => 
      array (
        'type' => 'bool',
        'label' => 'LBL_COSTING_RULE',
        'width' => '10%',
        'default' => true,
        'name' => 'costing_rule',
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
