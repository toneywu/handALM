<?php
$module_name = 'HMM_Trans_Batch';
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
        ),
      ),
      'includes' => 
      array (
        1 => 
        array (
          'file' => 'modules/HMM_Trans_Batch/js/HMM_Trans_Batch_detailview.js',
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
            'name' => 'site',
            'studio' => 'visible',
            'label' => 'LBL_SITE',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          1 => 
          array (
            'name' => 'trans_date',
            'label' => 'LBL_TRANS_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'ham_wo',
            'studio' => 'visible',
            'label' => 'LBL_WO',
          ),
          1 => 
          array (
            'name' => 'ham_woop',
            'studio' => 'visible',
            'label' => 'LBL_WOOP',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'hmm_mo_request',
            'studio' => 'visible',
            'label' => 'LBL_HMM_MO_REQUESTS',
          ),
        ),
        4 => 
        array (
          0 => 'description',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'line_items',
            'label' => 'LBL_LINE_ITEMS',
          ),
        ),
      ),
    ),
  ),
);
?>
