<?php
$module_name='HAT_Counting_Lines';
$subpanel_layout = array (
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
      ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'HAT_Counting_Lines',
      ),
    ),
  'where' => '',
  'list_fields' => 
  array (
    'name' => 
    array (
      'vname' => 'LBL_NAME',
      'widget_class' => 'SubPanelDetailViewLink',
      'width' => '15%',
      'default' => true,
      ),
    'total_counting' => 
    array (
      'type' => 'int',
      'vname' => 'LBL_TOTAL_COUNTING',
      'width' => '10%',
      'default' => true,
      ),
    'actual_counting' => 
    array (
      'type' => 'int',
      'vname' => 'LBL_ACTUAL_COUNTING',
      'width' => '10%',
      'default' => true,
      ),
    'amt_actual_counting' => 
    array (
      'type' => 'int',
      'vname' => 'LBL_AMT_ACTUAL_COUNTING',
      'width' => '10%',
      'default' => true,
      ),
    'profit_counting' => 
    array (
      'type' => 'int',
      'vname' => 'LBL_PROFIT_COUNTING',
      'width' => '10%',
      'default' => true,
      ),
    'loss_counting' => 
    array (
      'type' => 'int',
      'vname' => 'LBL_LOSS_COUNTING',
      'width' => '10%',
      'default' => true,
      ),
    'diff_counting' => 
    array (
      'type' => 'int',
      'vname' => 'LBL_DIFF_COUNTING',
      'width' => '10%',
      'default' => true,
      ),
    'actual_adjust_count' => 
    array (
      'type' => 'int',
      'vname' => 'LBL_ACTUAL_ADJUST_COUNT',
      'width' => '10%',
      'default' => true,
      ),
/*    'oranization' => 
    array (
      'type' => 'relate',
      'studio' => 'visible',
      'vname' => 'LBL_ORANIZATION',
      'id' => 'ACCOUNT_ID_C',
      'link' => true,
      'width' => '10%',
      'default' => true,
      'widget_class' => 'SubPanelDetailViewLink',
      'target_module' => 'Accounts',
      'target_record_key' => 'account_id_c',
      ),*/
      'edit_button' => 
      array (
        'vname' => 'LBL_EDIT_BUTTON',
        'widget_class' => 'SubPanelEditButton',
        'module' => 'HAT_Counting_Lines',
        'width' => '4%',
        'default' => true,
        ),
      ),
  );