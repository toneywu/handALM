<?php
$module_name = 'HIT_IP';
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
          'file' => 'custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js',
        ),
        1 => 
        array (
          'file' => 'modules/HIT_IP/js/HIT_IP_detailview.js',
        ),
		3 => 
        array (
          'file' => 'custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js',
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
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'studio' => 'visible',
            'label' => 'LBL_IP_C',
          ),
          1 => 'description',
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 'line_items',
        ),
      ),
    ),
  ),
);
?>
