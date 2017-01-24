<?php
$module_name = 'HAA_Integration_Mapping_Def_Headers';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'includes'=>
      array(
        0 => array(
        'file'=>'modules/HAA_Integration_Mapping_Def_Headers/js/HAA_Integration_Mapping_Def_Headers_editview.js',
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
            'name' => 'maping_code',
            'label' => 'LBL_MAPING_CODE',
          ),
        ),
        1 => 
        array (
          0 => 'name',
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
              ),
              'call_back_function' => 'setExtendValReturn',
            ),
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'enabled_flag',
            'label' => 'LBL_ENABLED_FLAG',
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
