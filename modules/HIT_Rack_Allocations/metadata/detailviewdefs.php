<?php
$module_name = 'HIT_Rack_Allocations';
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
          0 => 
          array (
            'name' => 'rack',
            'studio' => 'visible',
            'label' => 'LBL_RACK',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'asset',
            'studio' => 'visible',
            'label' => 'LBL_ASSET',
          ),
          1 => 'name',
        ),
        2 => 
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
        3 => 
        array (
          0 => 'sync_parent_enabled',
          1 => 
          array (
            'name' => 'rack_pos_depth',
            'studio' => 'visible',
            'label' => 'LBL_RACK_POS_DEPTH',
          ),
        ),
        4=>
        array (
          0=>'description',
          1=>''
        ),
      ),
    ),
  ),
);
?>
