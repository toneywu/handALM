<?php 
function get_haa_interface_logs($params) {
	$args = func_get_args();
	$interface_id = $args[0]['interface_id'];
	if ($interface_id==''){
		$interface_id = $_REQUEST['record'];
	}
	$return_array['select'] = " SELECT h.*";
	$return_array['from'] = " FROM HAA_Interface_Logs";
    $return_array['where'] = " WHERE HAA_Interface_Logs.haa_interface_id_c='" . $interface_id . "'";//会自动加入deleted字段
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}