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