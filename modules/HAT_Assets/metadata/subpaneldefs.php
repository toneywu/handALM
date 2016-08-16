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
            'order' => 100,
            'module' => 'HAT_Asset_Trans',
            'subpanel_name' => 'default',
            'sort_order' => 'asc',
            'sort_by' => 'id',
            'title_key' => 'LBL_TRANSATION_SUBPANEL',
            'get_subpanel_data' => 'hat_assets_hat_asset_trans',
            'top_buttons' => array (),
            ),
        ),
    );
    ?>