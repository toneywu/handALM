<?php
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