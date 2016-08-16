<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
include_once('include/SubPanel/SubPanel.php');
$GLOBALS['sugar_config']['enable_action_menu']=false;
if(empty($_REQUEST['module'])) {
    die("'module' was not defined");
}
if(empty($_REQUEST['record'])) {
    die("'record' was not defined");
}
$subpanel = $_REQUEST['subpanel'];
$record = $_REQUEST['record'];
$module = $_REQUEST['module'];
$layout_def_key = $_REQUEST['layout_def_key'];
if(empty($_REQUEST['inline'])) {
    insert_popup_header($theme);
}
// need to load the subpanel definition here and manipulate the 'where clause'
if ( ( $result = BeanFactory::getBean($module,$record) ) === FALSE ) {
    die("'$module' is not a valid module");
}
if (!class_exists('MyClass')) {
    require_once 'include/SubPanel/SubPanelDefinitions.php' ;
}
$panelsdef = new SubPanelDefinitions($result,$layout_def_key);
$subpanelDef = $panelsdef->load_subpanel($subpanel);
$table_name = $subpanelDef->table_name;
// create or append subpanel definition where clause for the filter
if (!isset($subpanelDef->panel_definition['where']) || $subpanelDef->panel_definition['where'] == '') {
    $subpanelDef->panel_definition['where'] = '';
} else {
    $subpanelDef->panel_definition['where'] .= ' AND ';
}
if ($_REQUEST['search_params'] && $_REQUEST['search_params'] != '' && $table_name != '') {
    if($table_name == 'contacts') {
        $subpanelDef->panel_definition['where'] .= " " . $table_name . ".first_name like '%" . trim($_REQUEST['search_params']) . "%' OR " . $table_name . ".last_name like '%" . trim($_REQUEST['search_params']) . "%'";
    } elseif($table_name == 'role_contact_roles') {
        $subpanelDef->panel_definition['where'] .= " " . $table_name . ".contact_role like '%" . trim($_REQUEST['search_params']) . "%' ";
        // check to see if the terms are a partial match for the terms in the drop down
        global $app_list_strings;
        
        $pattern = "/(.)*" . trim($_REQUEST['search_params']) . "(.)*/i";
        
        foreach ($app_list_strings['role_at_primary_account_list_DD'] as $key => $val) {
            if (preg_match($pattern, $key) || preg_match($pattern, $val)) {
                $subpanelDef->panel_definition['where'] .= " OR " . $table_name . ".contact_role = '" . $key . "' ";
            }
        }
    } else {
        $subpanelDef->panel_definition['where'] .= " " . $table_name . ".name like '%" . trim($_REQUEST['search_params']) . "%' ";
    }
}
$subpanel_object = new SubPanel($module, $record, $subpanel,$subpanelDef, $layout_def_key);
$subpanel_object->setTemplateFile('include/SubPanel/SubPanelDynamic.html');
echo (empty($_REQUEST['inline'])) ? $subpanel_object->get_buttons() : '' ;
$subpanel_object->display();
if(empty($_REQUEST['inline'])) {
    insert_popup_footer($theme);
}