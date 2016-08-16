<?php
$module_name = 'HAA_UOM';
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
          'file' => 'modules/HAA_UOM/js/HAA_UOM_editview.js',
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
        ),
      'syncDetailEditViews' => true,
      ),
    'panels' => 
    array (
      'default' => 
      array (
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'uom_code',
            'label' => 'LBL_UOM_CODE',
            ),
          ),
        2 => 
        array (
          0 => 'uom_symbol',
          1 => 
          array (
            'name' => 'uom_class',
            'studio' => 'visible',
            'label' => 'LBL_UOM_CLASS',
            'displayParams' => 
            array (
              'field_to_name_array' => 
              array (
                'name' => 'uom_class',
                'id' => 'haa_uom_classes_id',
                'base_unit_name' => 'base_unit',
                ),
              'call_back_function' => 'setClassPopupReturn',
              ),
            ),

          ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'conversion',
            'label' => 'LBL_CONVERSION',
            'customCode' => '= <input type="text" name="conversion" id="conversion" value="{$fields.conversion.value}" size="8"> X <span id="base_unit_text">{$fields.base_unit.value}</span><input type="hidden" name="base_unit" id="base_unit" value="{$fields.base_unit.value}">'
            ),
          1 => '',
          ),
        ),
      ),
    ),
  );
  ?>
