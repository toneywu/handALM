<?php 
function get_ip_allocation($params) {
    $args = func_get_args();
	$using_org_id = $args[0]['using_org_id'];

    $return_array['select'] = " SELECT h.*";
    $return_array['from'] = " FROM hit_ip_allocations";
    $return_array['where'] = " WHERE hit_ip_allocations.hit_ip_trans_batch_id = hit_ip_trans_batch.id and hit_ip_trans_batch.current_owning_org_id='" . $using_org_id . "'";//会自动加入deleted字段
    $return_array['join'] = ",hit_ip_trans_batch";
    $return_array['join_tables'] = "hit_ip_trans_batch.id = hit_ip_allocations.hit_ip_trans_batch_id";
    return $return_array;
}