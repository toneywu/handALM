<?php

function get_haa_periods($params) {
    $args = func_get_args();
	$header_id = $args[0]['header_id'];
    $return_array['select'] = " SELECT haa_periods.*";
    $return_array['from'] = " FROM haa_periods";
    $return_array['where'] = " WHERE haa_periods.haa_period_sets_id_c='" . $header_id . "'";//会自动加入deleted字段
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}

?>