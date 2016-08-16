<?php
$module_name = 'HAT_Asset_Trans';
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
        'LBL_EDITVIEW_PANEL4' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL5' => 
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
            'name' => 'trans_status',
            'studio' => 'visible',
            'label' => 'LBL_TRANS_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'planned_execution_date',
            'label' => 'LBL_PLANNED_EXECUTION_DATE',
          ),
          1 => 
          array (
            'name' => 'planned_complete_date',
            'label' => 'LBL_PLANNED_COMPLETE_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'acctual_complete_date',
            'label' => 'LBL_ACCTUAL_COMPLETE_DATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'hat_assets_hat_asset_trans_name',
          ),
        ),
      ),
      'lbl_editview_panel4' => 
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
      'lbl_editview_panel3' => 
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
          1 => 
          array (
            'name' => 'target_responsible_person',
            'studio' => 'visible',
            'label' => 'LBL_TARGET_RESPONSIBLE_PERSON',
          ),
        ),
      ),
      'lbl_editview_panel5' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
    ),
  ),
);
?>
