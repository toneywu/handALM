<?php
$module_name = 'HAA_UOM_Conversions';
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
          'file' => 'modules/HAA_UOM_Conversions/js/HAA_UOM_Conversions_editview.js',
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
          0 => 
          array (
            'name' => 'aos_products_haa_uom_conversions_1_name',
            'customCode' => '<input type="hidden" name="name" id="name" size="" value="{$fields.name.value}" title="" ><input type="hidden" name="aos_products_haa_uom_conversions_1_name" id="aos_products_haa_uom_conversions_1_name" size="" value="{$fields.aos_products_haa_uom_conversions_1_name.value}" title="" ><input type="hidden" name="aos_products_haa_uom_conversions_1aos_products_ida" id="aos_products_haa_uom_conversions_1aos_products_ida" size="" value="{$fields.aos_products_haa_uom_conversions_1aos_products_ida.value}" title="" >{$fields.aos_products_haa_uom_conversions_1_name.value}',
          ),
          1 => 
          array (
            'name'=>'primary_uom_conversion',
            'customCode'=>'<input type="hidden" name="primary_uom" id="primary_uom" size="" value="{$fields.primary_uom.value}" title="" ><input type="hidden" name="primary_uom_conversion" id="primary_uom_conversion" size="" value="{$fields.primary_uom_conversion.value}" title="" >{$fields.primary_uom_conversion_str.value}'
            ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'destination_uom_class',
            'studio' => 'visible',
            'label' => 'LBL_DESTINATION_UOM_CLASS',
            'displayParams' => 
            array (
              'field_to_name_array' => 
              array (
                'name' => 'destination_uom_class',
                'id' => 'destination_uom_classes_id',
                'base_unit_name' => 'destination_unit',
                'base_unit_id' => 'destination_unit_id',
              ),
              'call_back_function' => 'setDestinationUOMClassPopupReturn',
            ),
          ),
          1 =>''
        ),

        2 => 
        array (
          0 => 
          array (
            'name' => 'destination_unit',
            'studio' => 'visible',
            'label' => 'LBL_DESTINATION_UNIT',
            'displayParams' => 
            array (
              'field_to_name_array' => 
              array (
                'name' => 'destination_unit',
                'id' => 'destination_unit_id',
              ),
              'call_back_function' => 'setDestinationUOMClassPopupReturn',
            ),          ),
          1=>
          array (
            'name' => 'conversion',
            'label' => 'LBL_CONVERSION',
            'customCode' => '= <input type="text" name="conversion" id="conversion"  value="{$fields.conversion.value}" title="" ><input type="hidden" name="source_uom" id="source_uom" size="" value="{$fields.source_uom.value}" title="" > {$fields.source_uom.value}',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'source_uom_class',
            'studio' => 'visible',
            'label' => 'LBL_SOURCE_UOM_CLASS',
            'customCode' => '<input type="hidden" name="source_uom_class" id="source_uom_class" size="" value="{$fields.source_uom_class.value}" title="" ><input type="hidden" name="source_uom_class_id" id="source_uom_class_id" size="" value="{$fields.source_uom_class_id.value}" title="" >{$fields.source_uom_class.value}',
          ),
          1 => ''

        ),
        4 => 
        array (
          0 => 'description',
          1 => '',
        ),
      ),
    ),
  ),
);
?>
