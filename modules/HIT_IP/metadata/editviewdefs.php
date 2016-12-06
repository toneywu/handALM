<?php
$module_name = 'HIT_IP';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js',
        ),
        1 => 
        array (
          'file' => 'modules/HIT_IP/js/HIT_IP_editview.js',
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
      'syncDetailEditViews' => false,
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
            'customCode' => '{$MAINT_SITE}',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'customCode' => '<input type="text" name="name" id="name" value="{$fields.name.value}"><span class="input_mask" name="name_desc" id="name_desc"></span><span class="input_desc" name="name_ip_desc" id="name_ip_desc"></span>',
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
