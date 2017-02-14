<?php


	function get_mapping_lines($params) {
    $args = func_get_args();
    var_dump($args);
	$batch_id = $args[0]['line_id'];

    $return_array['select'] = " SELECT haa_integration_mapping_lines.*";
    $return_array['from'] = " FROM haa_integration_mapping_lines";
    $return_array['where'] = " WHERE haa_integration_mapping_lines.haa_integration_mapping_headers_id_c=haa_integration_mapping_headers.id and haa_integration_mapping_headers.id='" . $batch_id . "'";//会自动加入deleted字段
    $return_array['join'] = ",haa_integration_mapping_headers";
    $return_array['join_tables'] = "";
    return $return_array;
}