<?php
$module_name = 'HFA_Fixed_Assets';
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
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
            'name' => 'haa_framework',
            'studio' => 'visible',
            'label' => 'LBL_HAA_FRAMEWORK',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'book_name',
            'studio' => 'visible',
            'label' => 'LBL_BOOK_NAME',
          ),
          1 => 
          array (
            'name' => 'fixed_asset_type',
            'studio' => 'visible',
            'label' => 'LBL_FIXED_ASSET_TYPE',
          ),
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
      ),
    ),
);
?>
