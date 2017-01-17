<?php 
function get_wo($params) {
    $args = func_get_args();
	$using_org_id = $args[0]['using_org_id'];
    if ($using_org_id==''){
		$using_org_id = $_REQUEST['record'];
	}
    $return_array['select'] = " SELECT h.*";
    $return_array['from'] = " FROM ham_wo";
    $return_array['where'] = " WHERE ham_wo.account_id='" . $using_org_id . "'";//会自动加入deleted字段
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}