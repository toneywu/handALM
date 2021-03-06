<?php
$module_name = 'HIT_VNI_LIST';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
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
          0 => 'name',
          1 => 
          array (
            'name' => 'bridge_domain',
            'label' => 'LBL_BRIDGE_DOMAIN',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'bandwidth_type',
            'studio' => 'visible',
            'label' => 'LBL_BANDWIDTH_TYPE',
          ),
          1 => 
          array (
            'name' => 'customer_name',
            'studio' => 'visible',
            'label' => 'LBL_CUSTOMER_NAME',
          ),
        ),
        2 => 
        array (
          0 => 'description',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
