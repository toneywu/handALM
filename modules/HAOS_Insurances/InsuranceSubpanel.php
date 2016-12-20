<?php 
//REF:http://urdhva-tech.blogspot.sg/2013/02/add-custom-subpanel-in-accounts-module.html


function get_haos_insurances($params) {
    $args = func_get_args();
	$parent_id = $args[0]['parent_id'];

    $return_array['select'] = " SELECT haos_insurances.*";
    $return_array['from'] = " FROM haos_insurances";
    $return_array['where'] = " WHERE haos_insurances.parent_type='HAT_Assets' and haos_insurances.parent_id='" . $parent_id . "'";//会自动加入deleted字段
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}