<?php 
 //WARNING: The contents of this file are auto-generated


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

 // created: 2016-02-08 10:53:31
$layout_defs["Accounts"]["subpanel_setup"]['hit_ip_allocations'] = array (
        'order' => 30,
        'module' => 'HIT_IP_Allocations',
        'sort_order' => 'asc',
        'sort_by' => 'name',
        'subpanel_name' => 'Account_subpanel_hit_ip_allocations',
            'get_subpanel_data' => 'function:get_ip_allocation',//这里没有指向传统的link，而是指向了一个function
            'generate_select' => true,
            'title_key' => 'LBL_HIT_IP_ALLOCATIONS_TITLE',
            'top_buttons'  => array (),
            'function_parameters' => array(
                'import_function_file' => 'modules/HIT_IP_Allocations/AllocationSubpanel.php',//指向特定的文件
                'using_org_id' => $this->_focus->id,
                'return_as_array' => 'true'
                ),
            );

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

 // created: 2016-02-08 10:53:31
$layout_defs["Accounts"]["subpanel_setup"]['haa_qual_accounts'] = array (
  'order' => 10,
  'module' => 'HAA_QUAL',
  'subpanel_name' => 'Account_subpanel_haa_qual_accounts',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HAA_QUAL_SUBPANEL',
  'get_subpanel_data' => 'haa_qual_accounts',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
  ),
);


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']["subpanel_setup"]['contacts'] = array (
        'order' => 30,
        'module' => 'Contacts',
        'sort_order' => 'asc',
        'sort_by' => 'last_name, first_name',
        'subpanel_name' => 'ForAccounts',
        'get_subpanel_data' => 'contacts',
        'add_subpanel_data' => 'contact_id',
        'title_key' => 'LBL_CONTACTS_SUBPANEL_TITLE',
        'top_buttons' => array(
            array('widget_class' => 'SubPanelTopCreateButton'),
                //array('widget_class' => 'SubPanelTopCreateAccountNameButton'),
                //array('widget_class' => 'SubPanelTopSelectButton', 'mode' => 'MultiSelect')
            ),
    );

?>