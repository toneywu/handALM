<?php 
//REF:http://urdhva-tech.blogspot.sg/2013/02/add-custom-subpanel-in-accounts-module.html
function get_assets_by_usingperson($params) {
    $args = func_get_args();
	$contact_id = $args[0]['contact_id'];

    $return_array['select'] = " SELECT hat_assets.*";
    $return_array['from'] = " FROM hat_assets ";
    $return_array['where'] = " WHERE hat_assets.deleted = '0' AND hat_assets.using_person_id = '" . $contact_id . "' ";
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}

function get_assets_by_owningperson($params) {
    $args = func_get_args();
    $contact_id = $args[0]['contact_id'];

    $return_array['select'] = " SELECT hat_assets.*";
    $return_array['from'] = " FROM hat_assets ";
    $return_array['where'] = " WHERE hat_assets.deleted = '0' AND hat_assets.owning_person_id = '" . $contact_id . "' ";
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}