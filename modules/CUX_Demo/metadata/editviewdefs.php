<?php
$module_name = 'CUX_Demo';
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
          1 => 
          array (
            'name' => 'issued_date',
            'label' => 'LBL_ISSUED_DATE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'note',
            'label' => 'LBL_NOTE',
          ),
          1 => 
          array (
            'name' => 'related_asset',
            'studio' => 'visible',
            'label' => 'LBL_RELATED_ASSET',
          ),
        ),
        2 => 
        array (
          0 => 'description',
          1 => 'note2',
        ),
      ),
    ),
  ),
);
?>
