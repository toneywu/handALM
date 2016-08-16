<?php
$module_name = 'HFA_Fixed_Assets';
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
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
          0 => 
          array (
            'name' => 'book_name',
            'studio' => 'visible',
            'label' => 'LBL_BOOK_NAME',
          ),
          1 => 
          array (
            'name' => 'asset_num',
            'label' => 'LBL_ASSET_NUM',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'fixed_asset_type',
            'studio' => 'visible',
            'label' => 'LBL_FIXED_ASSET_TYPE',
          ),
          1 => 'name',
        ),
        2 => 
        array (
          0 => 'description',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'owning_dept',
            'label' => 'LBL_OWNING_DEPT',
          ),
          1 => 
          array (
            'name' => 'location',
            'label' => 'LBL_LOCATION',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'service_year',
            'label' => 'LBL_SERVICE_YEAR',
          ),
          1 => 
          array (
            'name' => 'date_in_service',
            'label' => 'LBL_DATE_IN_SERVICE',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'original_value',
            'label' => 'LBL_ORIGINAL_VALUE',
          ),
          1 => 
          array (
            'name' => 'current_value',
            'label' => 'LBL_CURRENT_VALUE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'accumulated_depre',
            'label' => 'LBL_ACCUMULATED_DEPRE',
          ),
          1 => 
          array (
            'name' => 'ytd_depre',
            'label' => 'LBL_YTD_DEPRE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'depreciation_prep',
            'label' => 'LBL_DEPRECIATION_PREP',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'net_value',
            'label' => 'LBL_NET_VALUE',
          ),
          1 => 
          array (
            'name' => 'salvage_value',
            'label' => 'LBL_SALVAGE_VALUE',
          ),
        ),
      ),
    ),
  ),
);
?>
