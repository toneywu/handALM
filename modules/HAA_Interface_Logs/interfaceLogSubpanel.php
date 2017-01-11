<?php 
function get_haa_interface_logs($params) {
	$args = func_get_args();
	$interface_id = $args[0]['interface_id'];
	if ($interface_id==''){
		$interface_id = $_REQUEST['record'];
	}
	$return_array['select'] = " SELECT haa_interface_logs.*";
	$return_array['from'] = " FROM haa_interface_logs";
    $return_array['where'] = " WHERE haa_interface_logs.haa_interface_id_c='" . $interface_id . "'";//会自动加入deleted字段
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}