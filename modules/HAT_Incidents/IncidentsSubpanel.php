<?php 
//REF:http://urdhva-tech.blogspot.sg/2013/02/add-custom-subpanel-in-accounts-module.html


function get_hat_incidents($params) {
    $args = func_get_args();
	$asset_id = $args[0]['asset_id'];

    $return_array['select'] = " SELECT hat_incidents.*";
    $return_array['from'] = " FROM hat_incidents";
    $return_array['where'] = " WHERE hat_incidents.hat_assets_id_c='" . $asset_id . "'";//会自动加入deleted字段
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}

function get_contact_incidents($params) {
    $args = func_get_args();
	$contact_id = $args[0]['contact_id'];

    $return_array['select'] = " SELECT hat_incidents.*";
    $return_array['from'] = " FROM hat_incidents";
    $return_array['where'] = " WHERE hat_incidents.contact_id_c='" . $contact_id . "'";//会自动加入deleted字段
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}