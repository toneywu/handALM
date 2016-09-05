<?php
$module_name = 'HAM_Work_Center_People';
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
            'name' => 'ham_work_center_res_name',
            'studio' => 'visible',
            'label' => 'LBL_HAM_WORK_CENTER_RES_NAME',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 'description',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'people',
            'studio' => 'visible',
            'label' => 'LBL_PEROPLE',
          ),
          1 => 
          array (
            'name' => 'user_name',
            'studio' => 'visible',
            'label' => 'LBL_USER_NAME',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'organization_name',
            'studio' => 'visible',
            'label' => 'LBL_ORGANIZATION_NAME',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
