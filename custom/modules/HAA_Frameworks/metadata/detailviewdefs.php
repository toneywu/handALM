<?php
$module_name = 'HAA_Frameworks';
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
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL3' => 
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
          1 => 'code',
        ),
        1 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'logo_image',
            'comment' => 'Organization Logo (attachment)',
            'label' => 'LBL_LOGO_IMAGE',
            'customCode' => '<img src="{$fields.logo_image.value}"/>',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'default_product_uom',
            'studio' => 'visible',
            'label' => 'LBL_DEFAULT_PRODUCT_UOM',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'default_time_uom_class',
            'studio' => 'visible',
            'label' => 'LBL_DEFAULT_TIME_UOM_CLASS',
          ),
          1 => 
          array (
            'name' => 'default_area_uom_class',
            'studio' => 'visible',
            'label' => 'LBL_DEFAULT_AREA_UOM_CLASS',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'asset_numbering_rule',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_NUMBERING_RULE',
          ),
          1 => 
          array (
            'name' => 'at_numbering_rule',
            'studio' => 'visible',
            'label' => 'LBL_AT_NUMBERING_RULE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'owning_person_field_rule',
            'studio' => 'visible',
            'label' => 'LBL_OWNING_PERSON_FIELD_RULE',
          ),
          1 => 
          array (
            'name' => 'owning_person_rule',
            'studio' => 'visible',
            'label' => 'LBL_OWNING_PERSON_RULE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'using_person_field_rule',
            'studio' => 'visible',
            'label' => 'LBL_USING_PERSON_FIELD_RULE',
          ),
          1 => 
          array (
            'name' => 'using_person_rule',
            'studio' => 'visible',
            'label' => 'LBL_USING_PERSON_RULE',
          ),
        ),
        3 => 
        array (
          0 => 'supplier_field_rule',
          1 => 'source_reference_field_rule',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'location_display_rule',
            'studio' => 'visible',
            'label' => 'LBL_LOCATION_DISPLAY_RULE',
          ),
          1 => 
          array (
            'name' => 'asset_display_rule',
            'studio' => 'visible',
            'label' => 'LBL_ASSET_DISPLAY_RULE',
          ),
        ),
        5 => 
        array (
          0 => 'itrack_asset_group',
          1 => '',
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'sales_person_field_rule',
            'studio' => 'visible',
            'label' => 'LBL_SALES_PERSON_FIELD_RULE',
          ),
          1 => 
          array (
            'name' => 'service_person_field_rule',
            'studio' => 'visible',
            'label' => 'LBL_SERVICE_PERSON_FIELD_RULE',
          ),
        ),
      ),
    ),
  ),
);
?>
