<?php 
function get_menus_lists($params) {
	$args = func_get_args();
	$menu_id = $args[0]['menu_id'];
	if ($menu_id==''){
		$menu_id = $_REQUEST['record'];
	}
	$return_array['select'] = " SELECT haa_menus_lists.*";
	$return_array['from'] = " FROM haa_menus_lists";
    $return_array['where'] = " WHERE haa_menus_lists.menu_id='" . $menu_id . "'";//会自动加入deleted字段
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}