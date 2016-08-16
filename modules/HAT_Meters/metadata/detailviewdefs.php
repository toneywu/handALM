<?php
$module_name = 'HAT_Meters';
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
      'includes' => 
      array ( 
       0 =>
       array (
        'file' => 'modules/HAT_Meters/js/Chart_detailview.js',
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
            'name' => 'domain',
            'studio' => 'visible',
            'label' => 'LBL_DOMAIN',
            ),
          1 => '',
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'hat_asset_location',
            'studio' => 'visible',
            'label' => 'LBL_HAT_ASSET_LOCATION',
            ),
          1 => 
          array (
            'name' => 'asset',
            'studio' => 'visible',
            'label' => 'LBL_ASSET',
            ),
          ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'meter_type',
            'studio' => 'visible',
            'label' => 'LBL_METER_TYPE',
            ),
          1 => '',
          ),
        3 => 
        array (
          0 => 'name',
          1 => 'description',
          ),
        ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'latest_reading',
            'label' => 'LBL_LATEST_READING',
            ),
          1 => 
          array (
            'name' => 'meter_uom',
            'studio' => 'visible',
            'label' => 'LBL_METER_UOM',
            ),
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'reading_date',
            'label' => 'LBL_READING_DATE',
            ),
          1 => '',
          ),
        ),
      ),
    ),
  );
  ?>
