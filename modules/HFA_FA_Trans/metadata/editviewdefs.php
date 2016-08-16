<?php
$module_name = 'HFA_FA_Trans';
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
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => true,
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
          1 => 'description',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'fa_trans_type',
            'studio' => 'visible',
            'label' => 'LBL_FA_TRANS_TYPE',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'trans_date',
            'label' => 'LBL_TRANS_DATE',
          ),
          1 => 
          array (
            'name' => 'period_name',
            'studio' => 'visible',
            'label' => 'LBL_PERIOD_NAME',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'hfa_fixed_assets_hfa_fa_trans_name',
            'label' => 'LBL_HFA_FIXED_ASSETS_HFA_FA_TRANS_FROM_HFA_FIXED_ASSETS_TITLE',
          ),
          1 => 
          array (
            'name' => 'fixed_assets',
            'studio' => 'visible',
            'label' => 'LBL_FIXED_ASSETS',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'related_asset_trans',
            'studio' => 'visible',
            'label' => 'LBL_RELATED_ASSET_TRANS',
          ),
        ),
      ),
    ),
  ),
);
?>
