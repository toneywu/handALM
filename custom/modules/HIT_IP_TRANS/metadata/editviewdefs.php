<?php
$module_name = 'HIT_IP_TRANS';
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'hit_ip_subnets',
            'studio' => 'visible',
            'label' => 'LBL_HIT_IP',
          ),
          1 => 
          array (
            'name' => 'bandwidth_type',
            'label' => 'LBL_BANDWIDTH_TYPE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'gateway',
            'label' => 'LBL_GATEWAY',
          ),
          1 => 
          array (
            'name' => 'hat_asset_name',
            'studio' => 'visible',
            'label' => 'LBL_HAT_ASSET_NAME',
          ),
        ),
        2 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'port',
            'label' => 'LBL_PORT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'mask',
            'label' => 'LBL_MASK',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
