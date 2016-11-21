<?php
 // created: 2016-02-08 10:53:31
$layout_defs["Accounts"]["subpanel_setup"]['hit_racks'] = array (
  'order' => 30,
        'module' => 'HIT_Racks',
        'sort_order' => 'asc',
        'sort_by' => 'name',
        'subpanel_name' => 'Account_subpanel_hit_racks',
            'get_subpanel_data' => 'function:get_hit_racks',//这里没有指向传统的link，而是指向了一个function
            'generate_select' => true,
            'title_key' => 'LBL_HIT_RACKS_SUBPANEL_TITLE',
            'top_buttons'  => array (),
            'function_parameters' => array(
                'import_function_file' => 'modules/HIT_Racks/RacksSubpanel.php',//指向特定的文件
                'using_org_id' => $this->_focus->id,
                'return_as_array' => 'true'
                ),
  );