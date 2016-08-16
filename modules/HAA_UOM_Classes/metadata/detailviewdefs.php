<?php
$module_name = 'HAA_UOM_Classes';
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
          1 => '',
          ),/*
        1 => 
        array (
          0 => 
          array (
            'name' => 'base_unit_name',
            'label' => 'LBL_BASE_UNIT_NAME',
            'link' => true,
            ),
          1 => 
          array (
            'name' => 'base_unit_code',
            'label' => 'LBL_BASE_UNIT_CODE',
            ),
          ),
        2 => 
        array (
          0 => 'base_unit_symbol',
          1 => ''
          ),
*/
        ),
      ),
    ),
  );
  ?>
