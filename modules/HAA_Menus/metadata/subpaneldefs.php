<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
$layout_defs['HAA_Menus'] = array(
  'subpanel_setup' => array(
    'haa_menus_haa_menus_lists' => array(
      'order' => 30,
      'module' => 'HAA_Menus_Lists',
      'sort_order' => 'asc',
      'sort_by' => 'name',
      'subpanel_name' => 'default',
      'get_subpanel_data' => 'function:get_menus_lists',
      'title_key' => 'LBL_HAA_MENUS_SUBPANELS_LISTS',
      'generate_select' => true,
      'function_parameters' => array(
        'import_function_file' => 'modules/HAT_Menus/MenusListsSubpanel.php',
        'parent_id' => 'bf6951e5-4646-6612-7c79-588729803e1f',
        'return_as_array' => 'true',
        ),
      'top_buttons' => 
      array (
        ),
      ),  
    ),   
  );
?>