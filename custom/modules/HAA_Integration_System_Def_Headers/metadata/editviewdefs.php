<?php
$module_name = 'HAA_Integration_System_Def_Headers';
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
          'file' => 'modules/HAA_Integration_System_Def_Headers/js/HAA_Integration_System_Def_Headers_editview.js',
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
            'name' => 'own_interface',
            'studio' => 'visible',
            'label' => 'LBL_OWN_INTERFACE',
            'displayParams' => 
            array (
              'initial_filter' => '&frame_c_advanced="+$("#haa_framework").val()+"&enabled_flag_advanced=1',
              'field_to_name_array' => 
              array (
                'name' => 'own_interface',
                'id' => 'haa_interfaces_id_c',
                'link_system' => 'link_system',
                'interface_type' => 'interface_type',
                //'name' => 'name',
              ),
              'call_back_function' => 'setExtendValReturn',
            ),
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'interface_type',
            'studio' => 'visible',
            'label' => 'LBL_INTERFACE_TYPE',
            'customCode' => '<input name="interface_type" id="interface_type" size="30" value="" title="" type="text" readonly>',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'link_system',
            'studio' => 'visible',
            'label' => 'LBL_LIMK_SYSTEM',
            'customCode' => '<input name="link_system" id="link_system" size="30" value="" title="" type="text" readonly>',
          ),
          1 => 
          array (
            'name' => 'enabled_flag',
            'label' => 'LBL_ENABLED_FLAG',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'effected_flag',
            'label' => 'LBL_EFFECTED_FLAG',
            'customCode' => '<input name="effected_flag" value="0" type="hidden">
                              <input id="effected_flag" name="effected_flag" value="1" title="" tabindex="0" type="checkbox" onchange="setifon();">',
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
