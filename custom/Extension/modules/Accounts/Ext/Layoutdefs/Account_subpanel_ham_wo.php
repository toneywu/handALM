<?php
//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['ham_wo']  = array (
        'order' => 30,
        'module' => 'HAM_WO',
        'sort_order' => 'asc',
        'sort_by' => 'name',
        'subpanel_name' => 'Account_subpanel_ham_wo',
            'get_subpanel_data' => 'function:get_wo',//这里没有指向传统的link，而是指向了一个function
            'generate_select' => true,
            'title_key' => 'LBL_HAM_WO_TITLE',
            'top_buttons'  => array (),
            'function_parameters' => array(
                'import_function_file' => 'modules/HAM_WO/WOSubpanel.php',//指向特定的文件
                'using_org_id' => $this->_focus->id,
                'return_as_array' => 'true'
                ),
);
?>