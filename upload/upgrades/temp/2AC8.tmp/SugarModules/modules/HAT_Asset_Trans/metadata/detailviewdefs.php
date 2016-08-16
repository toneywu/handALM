<?php
$module_name = 'HAT_Asset_Trans';
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
        'LBL_DETAILVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL4' => 
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
            'name' => 'hat_asset_trans_batch_hat_asset_trans_name',
          ),
          1 => 
          array (
            'name' => 'hat_assets_hat_asset_trans_name',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'trans_status',
            'studio' => 'visible',
            'label' => 'LBL_TRANS_STATUS',
          ),
        ),
        2 => 
        array (
          0 => 'date_entered',
          1 => 
          array (
            'name' => 'created_by_name',
            'label' => 'LBL_CREATED',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'planned_execution_date',
            'label' => 'LBL_PLANNED_EXECUTION_DATE',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'planned_complete_date',
            'label' => 'LBL_PLANNED_COMPLETE_DATE',
          ),
          1 => 
          array (
            'name' => 'acctual_complete_date',
            'label' => 'LBL_ACCTUAL_COMPLETE_DATE',
          ),
        ),
      ),
      'lbl_detailview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'current_asset_status',
            'label' => 'LBL_CURRENT_ASSET_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'current_location',
            'label' => 'LBL_CURRENT_LOCATION',
          ),
          1 => 
          array (
            'name' => 'current_location_desc',
            'label' => 'LBL_CURRENT_LOCATION_DESC',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'current_responsible_center',
            'label' => 'LBL_CURRENT_RESPONSIBLE_CENTER',
          ),
          1 => 
          array (
            'name' => 'current_responsible_person',
            'label' => 'LBL_CURRENT_RESPONSIBLE_PERSON',
          ),
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'target_asset_status',
            'studio' => 'visible',
            'label' => 'LBL_TARGET_ASSET_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'target_location',
            'studio' => 'visible',
            'label' => 'LBL_TARGET_LOCATION',
          ),
          1 => 
          array (
            'name' => 'target_location_desc',
            'label' => 'LBL_TARGET_LOCATION_DESC',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'target_responsible_center',
            'studio' => 'visible',
            'label' => 'LBL_TARGET_RESPONSIBLE_CENTER',
          ),
          1 => 
          array (
            'name' => 'target_responsible_person',
            'studio' => 'visible',
            'label' => 'LBL_TARGET_RESPONSIBLE_PERSON',
          ),
        ),
      ),
      'lbl_detailview_panel4' => 
      array (
        0 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
?>
