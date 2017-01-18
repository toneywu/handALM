<?php 
//REF:http://urdhva-tech.blogspot.sg/2013/02/add-custom-subpanel-in-accounts-module.html
function get_current_asset($params) {
    $args = func_get_args();
	$asset_id = $args[0]['asset_id'];

    $return_array['select'] = " SELECT *";
    $return_array['from'] = " FROM hat_assets ";
    $return_array['where'] = " WHERE hat_assets.id = '" . $asset_id . "'";//»á×Ô¶¯¼ÓÈëdeleted×Ö¶Î
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}

function get_hit_racks($params) {
    $args = func_get_args();
	$using_org_id = $args[0]['using_org_id'];
    if ($using_org_id==''){
        $using_org_id = $_REQUEST['record'];
    }
    $return_array['select'] = " SELECT hit_racks.*";
    $return_array['from'] = " FROM hit_racks";

    $return_array['join'] = "";//hat_assets";//是追加到where条件之后
    $return_array['join_tables'] = "";//hit_racks.hat_assets_id = hat_assets.id";

    $return_array['where'] = " hit_racks.id IN
        (SELECT hr1.id FROM
          hit_racks hr1,
          hat_assets ha1
        WHERE hr1.hat_assets_id = ha1.id
          AND ha1.using_org_id = '" . $using_org_id . "'
          AND hr1.deleted = 0
          AND ha1.`deleted` = 0)
        OR hit_racks.id IN
        (SELECT hr2.id FROM
          hit_racks hr2,
          hit_rack_allocations hra,
          hat_assets ha2
        WHERE hra.hit_racks_id = hr2.id
          AND hra.`hit_racks_id` = hr2.`id`
          AND hra.hat_assets_id = ha2.id
          AND ha2.using_org_id = '" . $using_org_id . "'
          AND ha2.deleted = 0
          AND hra.deleted = 0
          AND hr2.`deleted` = 0)";

    return $return_array;
}
