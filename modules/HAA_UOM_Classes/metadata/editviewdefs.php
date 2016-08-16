<?php
$module_name = 'HAA_UOM_Classes';
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
          'file' => 'modules/HAA_UOM_Classes/js/HAA_UOM_Classes_editview.js',
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
        0 => 
        array (
          0 => 'name',
          1 => '',
          ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'base_unit_name',
            'label' => 'LBL_BASE_UNIT_NAME',
            'customCode' => '<input type="text" name="base_unit_name" id="base_unit_name" value="{$fields.base_unit_name.value}"><input type="hidden" name="base_unit_id" id="base_unit_id" value="{$fields.base_unit_id.value}">'
            ),
          1 => 
          array (
            'name' => 'base_unit_code',
            'label' => 'LBL_BASE_UNIT_CODE',
            'customCode' => '<input type="text" name="base_unit_code" id="base_unit_code" value="{$fields.base_unit_code.value}">'
            ),
          ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'base_unit_symbol',
            'label' => 'LBL_BASE_UNIT_SYMBOL',
            'customCode' => '<input type="text" name="base_unit_symbol" id="base_unit_symbol" value="{$fields.base_unit_symbol.value}">'
            ),
          1 => ''
          ),
        ),

      ),
    ),
  );
  ?>
