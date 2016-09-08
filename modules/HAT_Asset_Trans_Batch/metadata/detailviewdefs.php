<?php
$module_name = 'HAT_Asset_Trans_Batch';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/HAT_Asset_Trans_Batch/js/HAT_Asset_Trans_Batch_detailview.js',
        ),
      ),
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
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
          0 => 
          array (
            'name' => 'event_type',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_TYPE',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'asset_trans_status',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_TRANS_STATUS',
          ),
          1 => 
          array (
            'name' => 'tracking_number',
            'label' => 'LBL_TRACKING_NUMBER',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'current_organization_c',
            'studio' => 'visible',
            'label' => 'LBL_CURRENT_ORGANIZATION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'target_asset_status',
            'label' => 'LBL_TARGET_ASSET_STATUS',
          ),
          1 => 
          array (
            'name' => 'change_location',
            'studio' => 'visible',
            'label' => 'LBL_CHANGE_LOCATION',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'target_organization_c',
            'studio' => 'visible',
            'label' => 'LBL_TARGET_ORGANIZATION',
          ),
          1 => 
          array (
            'name' => 'modified_by_name',
            'label' => 'LBL_MODIFIED_NAME',
          ),
        ),
        5 => 
        array (
          0 => 'date_entered',
          1 => 'date_modified',
        ),
        6 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
?>
