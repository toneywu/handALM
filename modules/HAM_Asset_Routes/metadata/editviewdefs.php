<?php
$module_name = 'HAM_Asset_Routes';
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
            'name' => 'site',
            'studio' => 'visible',
            'label' => 'LBL_SITE',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'costing_rule',
            'label' => 'LBL_COSTING_RULE',
          ),
        ),
      ),
    ),
  ),
);
?>
