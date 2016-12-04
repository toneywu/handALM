<?php 
//REF:http://urdhva-tech.blogspot.sg/2013/02/add-custom-subpanel-in-accounts-module.html

function get_haos_insurance_claims($params) {
    $args = func_get_args();
	$parent_id = $args[0]['parent_id'];

    $return_array['select'] = " SELECT haos_insurance_claims.*";
    $return_array['from'] = " FROM haos_insurance_claims";
    $return_array['where'] = " WHERE haos_insurance_claims.parent_id='" . $parent_id . "'";//会自动加入deleted字段
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}

function get_insurance_claims($params) {
    $args = func_get_args();
	$insurance_id = $args[0]['insurance_id'];

    $return_array['select'] = " SELECT haos_insurance_claims.*";
    $return_array['from'] = " FROM haos_insurance_claims";
    $return_array['where'] = " WHERE haos_insurance_claims_haos_insurance_claims_lines_c.haos_insurf06es_lines_idb = haos_insurance_claims_lines.id and haos_insurance_claims_haos_insurance_claims_lines_c.haos_insurefcc_claims_ida=haos_insurance_claims.id and haos_insurance_claims_lines.haos_insurances_id_c='" . $insurance_id . "'";//会自动加入deleted字段
    $return_array['join'] = ",haos_insurance_claims_lines,haos_insurance_claims_haos_insurance_claims_lines_c";
    $return_array['join_tables'] = "";
    return $return_array;
}