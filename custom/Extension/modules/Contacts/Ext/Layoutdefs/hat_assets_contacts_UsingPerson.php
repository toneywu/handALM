<?php
 // created: 2016-02-08 10:53:31

//人员上显示的资产相关Subpanel
$layout_defs["Contacts"]["subpanel_setup"]['hat_assets_contacts_usingperson'] = array (
            'order' => 100,
            'module' => 'HAT_Assets',
            //'sort_order' => 'asc',
            'sort_by' => 'name asc',
            'subpanel_name' => 'forContacts',
            'title_key' => 'LBL_HAT_ASSETS_CONTACTS_FROM_HAT_ASSETS_TITLE',
            'get_subpanel_data' => 'function:get_assets_by_usingperson',
            'generate_select' => true,
            'top_buttons'  => array (
                0 => array (
                    'widget_class' => 'SubPanelTopSelectButton',
                    'mode'         => 'MultiSelect',
                ),
            ),
            'function_parameters' => array(
                'import_function_file' => 'modules/HAT_Assets/ContactsAssetsSubpanel.php',
                'contact_id' => $this->_focus->id,
                'return_as_array' => 'true'
            ),
);
