<?php 
function get_assets($params) {
	$args = func_get_args();
	$using_org_id = $args[0]['using_org_id'];
	if ($using_org_id==''){
		$using_org_id = $_REQUEST['record'];
	}
	$return_array['select'] = " SELECT h.*";
	$return_array['from'] = " FROM hat_assets";
    $return_array['where'] = " WHERE hat_assets.using_org_id='" . $using_org_id . "'"." or hat_assets.owning_org_id='".$using_org_id."'";//会自动加入deleted字段
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    $_SESSION['last_sub' . 'hat_assets' . '_order'] = 'desc';
    return $return_array;
}