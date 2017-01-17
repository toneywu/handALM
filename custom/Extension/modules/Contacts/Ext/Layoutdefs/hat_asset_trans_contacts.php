<?php
 // created: 2016-02-08 10:53:31

//人员上显示的资产相关Subpanel
$layout_defs["Contacts"]["subpanel_setup"]['hat_assets_trans_contacts'] = array (
            'order' => 100,
            'module' => 'HAT_Asset_Trans',
            'sort_order' => 'desc',
            'sort_by' => 'acctual_complete_date',
            'subpanel_name' => 'forContact',
            'title_key' => 'LBL_ASSETS_TRANS_SUBPANEL',
            'get_subpanel_data' => 'function:get_asset_trans',
            'generate_select' => true,
            'function_parameters' => array(
                'import_function_file' => 'modules/HAT_Asset_Trans/TransAssetsSubpanel.php',
                'contact_id' => $this->_focus->id,
                'return_as_array' => 'true'
            ),
);
