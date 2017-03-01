<?php
$module_name = 'HAOS_Payments';
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
        'LBL_DETAILVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_SUBPANEL1' =>
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
          0 => 'name',
          1 => array (
            'name' => 'payment_date',
            'label' => 'LBL_PAYMENT_DATE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'period_name',
            'studio' => 'visible',
            'label' => 'LBL_PERIOD_NAME',
          ),
          1 => 
          array (
            'name' => 'currency_id',
            'label' => 'LBL_CURRENCY_ID',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'payment_amount',
            'label' => 'LBL_PAYMENT_AMOUNT',
          ),
          1 => 
          array (
            'name' => 'payment_method_type',
            'studio' => 'visible',
            'label' => 'LBL_PAYMENT_METHOD_TYPE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'responsible_person',
            'studio' => 'visible',
            'label' => 'LBL_RESPONSIBLE_PERSON',
          ),
          1 => 
          array (
            'name' => 'payment_status',
            'studio' => 'visible',
            'label' => 'LBL_PAYMENT_STATUS',
          ),
        ),
        4 => 
        array (
          0 => 'description',
          1 =>'',
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'cust_account_name',
            'studio' => 'visible',
            'label' => 'LBL_CUST_ACCOUNT_NAME',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'contact_number',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_NUMBER',
          ),
          1 => 
          array (
            'name' => 'contact_name',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_NAME',
          ),
        ),
      ),

      'LBL_DETAILVIEW_SUBPANEL1'=>
      array(
           0 => 
        array (
          0 => 
          array (
            'name' => 'line_subitems',
            'studio' => 'visible',
            'label' => 'LBL_LINE_SUBITEMS', 
            'customCode' =>'<span id="line_items_span">',
          ),
        ),
        ),
    ),
  ),
);
?>
