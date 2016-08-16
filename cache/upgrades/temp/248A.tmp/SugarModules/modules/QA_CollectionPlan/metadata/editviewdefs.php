<?php
$module_name = 'QA_CollectionPlan';
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
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'qa_collectionplan_qa_plantype_name',
          ),
          1 => 
          array (
            'name' => 'qa_collectionplan_qa_collectionplandefine_name',
            'label' => 'LBL_QA_COLLECTIONPLAN_QA_COLLECTIONPLANDEFINE_FROM_QA_COLLECTIONPLANDEFINE_TITLE',
          ),
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
            'name' => 'qa_collectionplan_qa_collectionelement_name',
            'label' => 'LBL_QA_COLLECTIONPLAN_QA_COLLECTIONELEMENT_FROM_QA_COLLECTIONELEMENT_TITLE',
          ),
          1 => 
          array (
            'name' => 'number1',
            'label' => 'LBL_NUMBER1',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'necessary',
            'label' => 'LBL_NECESSARY',
          ),
          1 => 
          array (
            'name' => 'enabled',
            'label' => 'LBL_ENABLED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'readonly',
            'label' => 'LBL_READONLY',
          ),
          1 => 
          array (
            'name' => 'showed',
            'label' => 'LBL_SHOWED',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'information',
            'label' => 'LBL_INFORMATION',
          ),
          1 => 
          array (
            'name' => 'usingasset',
            'label' => 'LBL_USINGASSET',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'defaultdate',
            'label' => 'LBL_DEFAULTDATE',
          ),
          1 => 
          array (
            'name' => 'qa_collectionplan_haa_uom_name',
          ),
        ),
      ),
    ),
  ),
);
?>
