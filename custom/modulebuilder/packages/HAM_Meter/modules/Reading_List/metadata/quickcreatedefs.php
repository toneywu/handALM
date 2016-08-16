<?php
$module_name = 'HAT_Meter_Readings';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
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
          0 => 'name',
          1 => 
          array (
            'name' => 'reading_type',
            'studio' => 'visible',
            'label' => 'LBL_READING_TYPE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'reading_this_time',
            'label' => 'LBL_READING_THIS_TIME',
          ),
          1 => 
          array (
            'name' => 'reading_uom',
            'studio' => 'visible',
            'label' => 'LBL_READING_UOM',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
    ),
  ),
);
?>
