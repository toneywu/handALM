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
            'name' => 'product',
            'studio' => 'visible',
            'label' => 'LBL_PRODUCT',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'location',
            'label' => 'LBL_LOCATION',
          ),
          1 => 
          array (
            'name' => 'snapshot_quantity',
            'label' => 'LBL_SNAPSHOT_QUANTITY',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'asset_status',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_STATUS',
          ),
          1 => 
          array (
            'name' => 'counting_task',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_TASK',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'counting_person',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_PERSON',
          ),
          1 => 
          array (
            'name' => 'counting_status',
            'studio' => 'visible',
            'label' => 'LBL_COUNTING_STATUS',
          ),
        ),
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'part_number',
            'studio' => 'visible',
            'label' => 'LBL_PART_NUMBER',
          ),
          1 => 
          array (
            'name' => 'oranization',
            'studio' => 'visible',
            'label' => 'LBL_ORANIZATION',
          ),
        ),
      ),
    ),
  ),
);
?>
