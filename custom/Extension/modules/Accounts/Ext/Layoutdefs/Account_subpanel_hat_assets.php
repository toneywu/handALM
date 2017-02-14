<?php
 // created: 2016-02-08 10:53:31
$layout_defs["Accounts"]["subpanel_setup"]['hat_assets'] = array (
        'order' => 30,
        'module' => 'HAT_Assets',
        'sort_order' => 'desc',//asc
        'sort_by' => 'date_modified',//name
        'subpanel_name' => 'Account_subpanel_hat_assets',
        'get_subpanel_data' => 'function:get_assets',//这里没有指向传统的link，而是指向了一个function
        'generate_select' => true,
        'title_key' => 'LBL_HAT_ASSETS_TITLE',
        'top_buttons'  => array (),
        'function_parameters' => array(
            'import_function_file' => 'modules/HAT_Assets/AssetsSubpanel.php',//指向特定的文件
            'using_org_id' => $this->_focus->id,
            'return_as_array' => 'true'
            ),
        );