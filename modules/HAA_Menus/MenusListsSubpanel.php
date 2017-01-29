<?php
function get_menus_lists($params) {
    $args = func_get_args();
	$parent_id = $args[0]['parent_id'];
	var_dump($parent_id);
    $return_array['select'] = "SELECT haa_menus_lists.* ";
    $return_array['from'] = " FROM haa_menus_lists";
    $return_array['where'] = " WHERE haa_menus.id=haa_menus_lists.menu_id";
    $return_array['join'] = ",haa_menus ";
    $return_array['join_tables'] = "";
    return $return_array;
}
?>