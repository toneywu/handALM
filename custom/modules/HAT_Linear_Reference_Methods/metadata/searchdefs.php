<?php
$module_name = 'HAT_Linear_Reference_Methods';
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
    ),
    'advanced_search' => 
    array (
      'domain' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_DOMAIN',
        'id' => 'HAT_DOMAINS_ID',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'domain',
      ),
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'linear_unit' => 
      array (
        'type' => 'relate',
        'studio' => 'visible',
        'label' => 'LBL_LINEAR_UNIT',
        'id' => 'LINEAR_UNIT_ID',
        'link' => true,
        'width' => '10%',
        'default' => true,
        'name' => 'linear_unit',
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
