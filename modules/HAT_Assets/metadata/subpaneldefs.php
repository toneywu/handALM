<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['HAT_Assets'] = array(
    // list of what Subpanels to show in the DetailView
  'subpanel_setup' => array(
    'hat_linear_elements' => array(
      'order' => 10,
      'module' => 'HAT_Linear_Elements',
      'subpanel_name' => 'HAT_Assets_subpanel_hat_linear_elements',
      'sort_order' => 'asc',
      'sort_by' => 'id',
      'title_key' => 'LBL_LINEAR_ELEMENTS_SUBPANEL',
      'get_subpanel_data' => 'hat_linear_elements_link',
      'top_buttons' => 
      array (
        0 => 
        array (
          'widget_class' => 'SubPanelTopCreateButton',
          ),
        ),
      ),

    'hat_meters' => array(
      'order' => 10,
      'module' => 'HAT_Meters',
      'subpanel_name' => 'default',
      'sort_order' => 'asc',
      'sort_by' => 'id',
      'title_key' => 'LBL_METERS_SUBPANEL',
      'get_subpanel_data' => 'hat_meters_hat_assets_link',
      'top_buttons' => 
      array (
        0 => 
        array (
          'widget_class' => 'SubPanelTopCreateButton',
          ),
        ),
      ),

    'hat_asset_sr' => array(
      'order' => 10,
      'module' => 'HAM_SR',
      'subpanel_name' => 'HAT_Assets_subpanel_ham_sr_hat_assets',
      'sort_order' => 'asc',
      'sort_by' => 'id',
      'title_key' => 'LBL_SR_SUBPANEL',
      'get_subpanel_data' => 'ham_sr_link',
      'top_buttons' => 
      array (
        0 => 
        array (
          'widget_class' => 'SubPanelTopCreateButton',
          ),
        ),
      ),

    'hat_asset_wo' => array(
      'order' => 10,
      'module' => 'HAM_WO',
      'subpanel_name' => 'HAT_Assets_subpanel_ham_wo_hat_assets',
      'sort_order' => 'asc',
      'sort_by' => 'id',
      'title_key' => 'LBL_WO_SUBPANEL',
      'get_subpanel_data' => 'ham_wo_link',
      'top_buttons' => 
      array (
        0 => 
        array (
          'widget_class' => 'SubPanelTopCreateButton',
          ),
        ),
      ),

    'hat_assets_hat_asset_trans' => array(
      'order' => 20,
      'module' => 'HAT_Asset_Trans',
      'subpanel_name' => 'forAssets',
      'sort_order' => 'desc',
      'sort_by' => 'acctual_complete_date',
      'title_key' => 'LBL_TRANSATION_SUBPANEL',
      'get_subpanel_data' => 'function:get_asset_trans_by_asset',
      'top_buttons' => array (),
      'generate_select' => true,
            'function_parameters' => array(
                'import_function_file' => 'modules/HAT_Asset_Trans/TransAssetsSubpanel.php',//指向特定的文件
                'parent_id' => $this->_focus->id,
                'return_as_array' => 'true'
                ),
      ),

     'haos_insurances' => array(
          'order' => 25,
          'module' => 'HAOS_Insurances',
          'sort_order' => 'asc',
          'sort_by' => 'name',
          'subpanel_name' => 'HAT_Assets_subpanel_haos_insurances',
            'get_subpanel_data' => 'function:get_haos_insurances',//这里没有指向传统的link，而是指向了一个function
            'generate_select' => true,
            'title_key' => 'LBL_HAOS_INSURANCES_SUBPANEL_TITLE',
            'top_buttons'  => array (0 => 
              array (
                'widget_class' => 'SubPanelTopCreateButton',
                ),),
            'function_parameters' => array(
                'import_function_file' => 'modules/HAOS_Insurances/InsuranceSubpanel.php',//指向特定的文件
                'parent_id' => $this->_focus->id,
                'return_as_array' => 'true'
                ),
            ),

    'haos_insurance_claims' => array(
      'order' => 30,
      'module' => 'HAOS_Insurance_Claims',
      'sort_order' => 'asc',
      'sort_by' => 'claim_number',
      'subpanel_name' => 'HAT_Assets_subpanel_haos_insurance_claims',
            'get_subpanel_data' => 'function:get_haos_insurance_claims',//这里没有指向传统的link，而是指向了一个function
            'generate_select' => true,
            'title_key' => 'LBL_HAOS_INSURANCE_CLAIMS_SUBPANEL_TITLE',
            'top_buttons'  => array (),
            'function_parameters' => array(
                'import_function_file' => 'modules/HAOS_Insurance_Claims/Insurance_ClaimsSubpanel.php',//指向特定的文件
                'parent_id' => $this->_focus->id,
                'return_as_array' => 'true'
                ),
            ),
    ),
  );
  ?>