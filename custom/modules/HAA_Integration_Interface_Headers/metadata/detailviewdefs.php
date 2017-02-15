<?php
$module_name = 'HAA_Integration_Interface_Headers';
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
        'LBL_DETAILVIEW_PANEL1' => 
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
            'name' => 'ext_batch_number',
            'label' => 'LBL_EXT_BATCH_NUMBER',
          ),
          1 => 
          array (
            'name' => 'received_date',
            'label' => 'LBL_RECEIVED_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'line_cnt',
            'label' => 'LBL_LINE_CNT',
          ),
          1 => 
          array (
            'name' => 'execute_file',
            'label' => 'LBL_EXECUTE_FILE',
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
            'name' => 'process_message',
            'label' => 'LBL_PROCESS_MESSAGE',
          ),
          1 => 
          array (
            'name' => 'reference1',
            'label' => 'LBL_REFERENCE1',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'reference2',
            'label' => 'LBL_REFERENCE2',
          ),
          1 => 
          array (
            'name' => 'reference3',
            'label' => 'LBL_REFERENCE3',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'reference4',
            'label' => 'LBL_REFERENCE4',
          ),
          1 => 'description',
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'line_infos',
            'label' => 'LBL_LINE_INFOS',
          ),
        ),
      ),
    ),
  ),
);
?>
