<?php
$module_name = 'HIT_IP_Subnets';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'parent_hit_ip',
            'studio' => 'visible',
            'label' => 'LBL_PARENT_HIT_IP',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 'name',
          1 => 'description',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'vlan',
            'studio' => 'visible',
            'label' => 'LBL_VLAN',
          ),
          1 => 
          array (
            'name' => 'tunnel',
            'label' => 'LBL_TUNNEL',
          ),
        ),
      ),
    ),
  ),
);
?>
