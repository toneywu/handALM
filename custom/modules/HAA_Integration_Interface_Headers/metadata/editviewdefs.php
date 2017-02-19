<?php
$module_name = 'HAA_Integration_Interface_Headers';
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
            'name' => 'frameworks',
            'studio' => 'visible',
            'label' => 'LBL_FRAMEWORKS',
            'customCode' => '{$FRAMEWORK_C}',
          ),
          1 => 
          array (
            'name' => 'interface_code',
            'label' => 'LBL_INTERFACE_CODE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'own_interface',
            'studio' => 'visible',
            'label' => 'LBL_OWN_INTERFACE',
          ),
          1 => 
          array (
            'name' => 'ext_batch_number',
            'label' => 'LBL_EXT_BATCH_NUMBER',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'received_date',
            'label' => 'LBL_RECEIVED_DATE',
          ),
          1 => 
          array (
            'name' => 'line_cnt',
            'label' => 'LBL_LINE_CNT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'process_status',
            'studio' => 'visible',
            'label' => 'LBL_PROCESS_STATUS',
          ),
          1 => 
          array (
            'name' => 'process_date',
            'label' => 'LBL_PROCESS_DATE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'reference1',
            'label' => 'LBL_REFERENCE1',
          ),
          1 => 
          array (
            'name' => 'reference2',
            'label' => 'LBL_REFERENCE2',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'reference3',
            'label' => 'LBL_REFERENCE3',
          ),
          1 => 
          array (
            'name' => 'reference4',
            'label' => 'LBL_REFERENCE4',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'process_message',
            'label' => 'LBL_PROCESS_MESSAGE',
          ),
          1 => 'description',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'line_items',
            'studio' => 'visible',
            'label' => 'LBL_LINE_ITEMS',
          ),
        ),
      ),
    ),
  ),
);
?>
