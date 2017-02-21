<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['HAA_Menu_Groups'] = array(
    // list of what Subpanels to show in the DetailView
  'subpanel_setup' => array(
    'haa_menu_group_lists' => array(
      'order' => 10,
      'module' => 'HAA_Menu_Group_Lists',
      'sort_order' => 'asc',
      'sort_by' => 'id',
      'subpanel_name' => 'default',
      'get_subpanel_data' => 'function:get_menu_group_lists',
      'title_key' => 'LBL_HAA_MENU_GROUPS_SUBPANELS_LINES',
      'generate_select' => true,
      'function_parameters' => array(
        'import_function_file' => 'modules/HAA_Menu_Group_Lists/GroupListSubpanel.php',
        'lists_id' => $this->_focus->id,
        'return_as_array' => 'true',
        ),
      'top_buttons' => 
      array (
        
        ),
      ),  
    ),   
  );
  ?>