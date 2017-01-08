<?php
$module_name = 'HAT_Counting_Lines';
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
            'name' => 'counting_task',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_TASK',
          ),
          1 => 
          array (
            'name' => 'counting_person',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_PERSON',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'asset',
            'studio' => 'visible',
            'label' => 'LBL_ASSET',
          ),
          1 => 
          array (
            'name' => 'asset_desc',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_DESC',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'counting_status',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_STATUS',
          ),
          1 => 
          array (
            'name' => 'asset_location',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_LOCATION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'oranization',
            'studio' => 'visible',
            'label' => 'LBL_ORANIZATION',
          ),
          1 => 
          array (
            'name' => 'asset_status',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_STATUS',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'asset_major',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_MAJOR',
          ),
          1 => 
          array (
            'name' => 'user_person',
            'studio' => 'visible',
            'label' => 'LBL_USER_PERSON',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'own_person',
            'studio' => 'visible',
            'label' => 'LBL_OWN_PERSON',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
