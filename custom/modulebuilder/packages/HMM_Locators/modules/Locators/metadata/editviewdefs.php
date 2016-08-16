<?php
$module_name = 'HMM_Locators';
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
          1 => 
          array (
            'name' => 'location',
            'studio' => 'visible',
            'label' => 'LBL_LOCATION',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'segment1',
            'label' => 'LBL_SEGMENT1',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'segment2',
            'label' => 'LBL_SEGMENT2',
          ),
          1 => 
          array (
            'name' => 'segment3',
            'label' => 'LBL_SEGMENT3',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'segment4',
            'label' => 'LBL_SEGMENT4',
          ),
          1 => 
          array (
            'name' => 'segment5',
            'label' => 'LBL_SEGMENT5',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'project_control',
            'label' => 'LBL_PROJECT_CONTROL',
          ),
          1 => 
          array (
            'name' => 'task_control',
            'label' => 'LBL_TASK_CONTROL',
          ),
        ),
      ),
    ),
  ),
);
?>
