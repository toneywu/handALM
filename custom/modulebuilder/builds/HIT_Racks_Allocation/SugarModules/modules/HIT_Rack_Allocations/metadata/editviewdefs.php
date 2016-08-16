<?php
$module_name = 'HIT_Rack_Allocations';
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
          0 => 'name',
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'rack_pos_top',
            'label' => 'LBL_RACK_POS_TOP',
          ),
          1 => 
          array (
            'name' => 'height',
            'label' => 'LBL_HEIGHT',
          ),
        ),
        2 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'rack_pos_depth',
            'studio' => 'visible',
            'label' => 'LBL_RACK_POS_DEPTH',
          ),
        ),
      ),
    ),
  ),
);
?>
