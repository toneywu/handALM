<?php 
function get_asset_trans($params) {
    $args = func_get_args();
    $contact_id = $args[0]['contact_id'];

    $return_array['select'] = "SELECT hat_asset_trans.*";
    $return_array['from'] = " FROM hat_asset_trans";
    $return_array['where'] = " WHERE (hat_asset_trans.trans_status='CLOSED' OR trans_status='AUTO_TRANSACTED') AND (hat_asset_trans.target_owning_person_id='".$contact_id."' OR hat_asset_trans.`current_owning_person_id`='".$contact_id."' OR hat_asset_trans.`current_using_person_id`='".$contact_id."' OR hat_asset_trans.`target_using_person_id`='".$contact_id."')";
							  //会自动加入deleted字段
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}

function get_asset_trans_by_asset($params) {
    $args = func_get_args();
    $parent_id = $args[0]['parent_id'];

    $return_array['select'] = "SELECT hat_asset_trans.*";
    $return_array['from'] = " FROM hat_asset_trans";
    $return_array['where'] = " WHERE (hat_asset_trans.trans_status='CLOSED' OR trans_status='AUTO_TRANSACTED') AND (hat_asset_trans.asset_id='".$parent_id."')";
							  //会自动加入deleted字段
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
//框架优先获取$_SESSION['last_sub' . $this->subpanel_module . '_order'] 指定的排序规则
    $_SESSION['last_sub' . 'hat_assets_hat_asset_trans' . '_order']='desc';

    return $return_array;
}