<?php

	function get_menu_group_lists($params) {
    $args = func_get_args();
	$batch_id = $args[0]['lists_id'];

    $return_array['select'] = " SELECT haa_menu_group_lists.*";
    $return_array['from'] = " FROM haa_menu_group_lists";
    $return_array['where'] = " WHERE haa_menu_group_lists.haa_menu_groups_id_c=haa_menu_groups.id and haa_menu_groups.id='" . $batch_id . "'";//会自动加入deleted字段
    $return_array['join'] = ",haa_menu_groups";
    $return_array['join_tables'] = "";
    return $return_array;
}