<?php
$module_name = 'HAT_Domains';
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
          0 => 'description',
          1 => '',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 'default_product_uom',
          1 => ''
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 'asset_numbering_rule',
          1 => '',
          ),
        1=>
        array (
          0 => 
          array (
            'name' => 'at_numbering_rule',
            'studio' => 'visible',
            'label' => 'LBL_AT_NUMBERING_RULE',
                        'displayParams' => 
            array (
              'initial_filter' => '&document_type_advanced=AT',
              )
          ),
          1 => 
          array (
            'name' => 'owner_tracking_rule',
            'studio' => 'visible',
            'label' => 'LBL_OWNER_TRACKING_RULE',
          ),
        ),
      ),      
    ),
  ),
);
?>
