<?php
$module_name = 'HAM_Work_Centers';
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
            'name' => 'sr_hat_domains_rule',
            'studio' => 'visible',
            'label' => 'LBL_SR_HAT_DOMAINS_RULE',
          ),
          1 => 
          array (
            'name' => 'site',
            'studio' => 'visible',
            'label' => 'LBL_SITE',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'work_center_number',
            'label' => 'LBL_WORK_CENTER_NUMBER',
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
