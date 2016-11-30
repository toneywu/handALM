<?php 
function get_revenue_quotes($params) {
    $args = func_get_args();
	$source_id = $args[0]['source_id'];

    $return_array['select'] = " SELECT * ";
    $return_array['from'] = " FROM haos_revenues_quotes  ";
    $return_array['where'] =  " WHERE haos_revenues_quotes.source_id = '" . $source_id . "'";
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}

