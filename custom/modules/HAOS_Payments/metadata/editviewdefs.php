<?php
$module_name = 'HAOS_Payments';
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
          'file' => 'modules/HAOS_Payments/js/HAOS_Payments_editview.js',
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
        'LBL_EDITVIEW_SUBPANEL1' => 
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
            'customCode'=>'{$FRAMEWORK_C}',
          ),
          1 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'payment_date',
            'label' => 'LBL_PAYMENT_DATE',
           // 'customCode' => '<input class="date_input" autocomplete="off" name="payment_date" id="payment_date" value="" title="" tabindex="" type="text" >',

    //         'customCode'=>'<script type="text/javascript" src="custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js?v=6T2wqZkzRRtQXSbbOJRC2A"></script>
    //         <link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
    //         <span class="input-group date" id="span_payment_date">
    //   <input class="date_input" autocomplete="off" name="payment_date" id="payment_date" value="" title="" tabindex="" type="text" onblur="getPeriods()">
    // <span class="input-group-addon">
    // <span class="glyphicon glyphicon-calendar"></span>
    // </span>
    // </span>
    // <script type="text/javascript">
    // var Datetimepicker=$("#span_payment_date");
    // var dateformat="Y-m-d H:M";
    //     dateformat = dateformat.replace(/Y/,"yyyy");
    //     dateformat = dateformat.replace(/m/,"mm");
    //     dateformat = dateformat.replace(/d/,"dd");
    //     dateformat = dateformat.split(" ",1);
    //     Datetimepicker.datetimepicker({
    //       language: "zh_CN",
    //       format: dateformat[0],
    //       showMeridian: true,
    //        minView: 2,
    //         todayBtn: true,
    //         autoclose: true,
    //     });
    //   </script>'
          ),
          1 => 
          array (
            'name' => 'period_name',
            'studio' => 'visible',
            'label' => 'LBL_PERIOD_NAME',
            // 'customCode'=>'<input name="period_name" class="sqsEnabled yui-ac-input" tabindex="" id="period_name" size="" value="" title="" autocomplete="off" type="text" readonly="readonly">',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'currency_id',
            'label' => 'LBL_CURRENCY_ID',
          ),
          1 => 
          array (
            'name' => 'payment_amount',
            'label' => 'LBL_PAYMENT_AMOUNT',
            'currency_format' => true,
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'payment_method_type',
            'studio' => 'visible',
            'label' => 'LBL_PAYMENT_METHOD_TYPE',
          ),
          1 => 
          array (
            'name' => 'responsible_person',
            'studio' => 'visible',
            'label' => 'LBL_RESPONSIBLE_PERSON',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'payment_status',
            'studio' => 'visible',
            'label' => 'LBL_PAYMENT_STATUS',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 'description',
        ),
      ),
      'lbl_editview_panel1' => 
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
          // 0 => 
          // array (
          //   'name' => 'contact_number',
          //   'studio' => 'visible',
          //   'label' => 'LBL_CONTACT_NUMBER',
          // ),
          0=>
           array (
            'name' => 'contact_number',
            'label' => 'LBL_CONTACT_NUMBER',            
            'displayParams' =>
            array (
              'field_to_name_array' =>
              array (
                'employee_number_c' => 'contact_number',
                'id' => 'contact_id1_c',
                'chinese_name_c' => 'contact_name', 
                ), 
              'call_back_function' => 'setContactValReturn',
              ),
            ),

          1 => 
          array (
            'name' => 'contact_name',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_NAME',
           // 'customCode' =>'<input name="contact_name" id="contact_name" size="30" maxlength="240" value="" title="" type="text">'
            // 'displayParams' =>
            // array (
            //   'field_to_name_array' =>
            //   array (
            //     'name' => 'product_name',
            //     'id' => 'product_id',
            //     'part_number' => 'product_number', 
            //     'aos_product_category_name' => 'product_category',
            //     ),
            //   //'call_back_function' => '可以触发的函数',
            //   ),


          ),
        ),
      ),
       'lbl_editview_subpanel1' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'line_items',
          'studio' => 'visible',
          'label' => 'LBL_LINE_ITEMS',
          'customCode' =>'<span id="line_items_span">',
        ),
      ),
    ),


    ),
  ),
);
?>
