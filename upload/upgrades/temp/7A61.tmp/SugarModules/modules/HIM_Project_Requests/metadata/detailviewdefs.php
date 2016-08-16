<?php
$module_name = 'HIM_Project_Requests';
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
            'name' => 'domain',
            'studio' => 'visible',
            'label' => 'LBL_DOMAIN',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'organization',
            'studio' => 'visible',
            'label' => 'LBL_ORGANIZATION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'im_categories',
            'studio' => 'visible',
            'label' => 'LBL_IM_CATEGORIES',
          ),
          1 => 
          array (
            'name' => 'programs',
            'studio' => 'visible',
            'label' => 'LBL_PROGRAMS',
          ),
        ),
        3 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
?>
