<?php 
//REF:http://urdhva-tech.blogspot.sg/2013/02/add-custom-subpanel-in-accounts-module.html
function get_current_asset($params) {
    $args = func_get_args();
	$asset_id = $args[0]['asset_id'];

    $return_array['select'] = " SELECT *";
    $return_array['from'] = " FROM hat_assets ";
    $return_array['where'] = " WHERE hat_assets.id = '" . $asset_id . "'";//会自动加入deleted字段
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}

/*function get_uom_base($params) {
    $args = func_get_args();
	$base_unit_id = $args[0]['base_unit_id'];
	$uom_class_id = $args[0]['uom_class_id'];

    $return_array['select'] = " SELECT haa_uom.*";
    $return_array['from'] = " FROM haa_uom ";
    $return_array['where'] = " WHERE haa_uom.deleted = '0' AND haa_uom.id = '" . $base_unit_id . "' AND haa_uom.haa_uom_classes_id = '" . $uom_class_id . "' ";
    $return_array['join'] = "";
    $return_array['join_tables'] = "";

    return $return_array;
}*/

function get_ip_allocations($params) {
    $args = func_get_args();
	$using_org_id = $args[0]['using_org_id'];

    $return_array['select'] = " SELECT h.*";
    $return_array['from'] = " FROM hit_ip_allocations";
    $return_array['where'] = " WHERE hit_ip_allocations.hit_ip_trans_batch = hit_ip_trans_batch.id and hit_ip_trans_batch.current_owning_org_id='" . $using_org_id . "'";//会自动加入deleted字段
    $return_array['join'] = ",hit_ip_trans_batch";
    $return_array['join_tables'] = "hit_ip_allocations.hat_assets_id = hit_ip_trans_batch.id";
    return $return_array;
}
