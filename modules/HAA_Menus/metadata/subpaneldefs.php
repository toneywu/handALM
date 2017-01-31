<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
$layout_defs['HAA_Menus'] = array(
  'subpanel_setup' => array(
    'haa_menus_haa_menus_lists' => array(
      'order' => 30,
      'module' => 'HAA_Menus_Lists',
      'sort_order' => 'asc',
      'sort_by' => 'sort_order',
      'subpanel_name' => 'HAA_Menus_subpanel_haa_menus_haa_menus_lists',
      'get_subpanel_data' => 'function:get_menus_lists',
      'title_key' => 'LBL_HAA_MENUS_SUBPANELS_LISTS',
      'generate_select' => true,
      'function_parameters' => array(
        'import_function_file' => 'modules/HAA_Menus_Lists/MenusListsSubpanel.php',
        'menu_id' => $this->_focus->id,
        'return_as_array' => 'true',
        ),
      'top_buttons' => 
      array (
        ),
      ),  
    ),   
  );
?>