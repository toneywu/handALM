<?php
$module_name = 'QA_CollectionElement';
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'qa_collectionelement_qa_elementtype_name',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 'description',
          1 => 
          array (
            'name' => 'date_entered',
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'qa_collectionelement_haa_uom_name',
            'label' => 'LBL_QA_COLLECTIONELEMENT_HAA_UOM_FROM_HAA_UOM_TITLE',
          ),
          1 => 
          array (
            'name' => 'defaultdate',
            'label' => 'LBL_DEFAULTDATE',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'objectivedate',
            'label' => 'LBL_OBJECTIVEDATE',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'lowerlimit',
            'label' => 'LBL_LOWERLIMIT',
          ),
          1 => 
          array (
            'name' => 'upperlimit',
            'label' => 'LBL_UPPERLIMIT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'lowerlimit1',
            'label' => 'LBL_LOWERLIMIT1',
          ),
          1 => 
          array (
            'name' => 'upperlimit1',
            'label' => 'LBL_UPPERLIMIT1',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'lowerlimit2',
            'label' => 'LBL_LOWERLIMIT2',
          ),
          1 => 
          array (
            'name' => 'upperlimit2',
            'label' => 'LBL_UPPERLIMIT2',
          ),
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'briefcode',
            'label' => 'LBL_BRIEFCODE',
          ),
          1 => 
          array (
            'name' => 'description1',
            'label' => 'LBL_DESCRIPTION1',
          ),
        ),
      ),
    ),
  ),
);
?>
