<?php 
function get_revenue_quotes($params) {
    $args = func_get_args();
	$aos_source_id = $args[0]['aos_source_id'];
    /*$return_array['select'] = " SELECT aos_products_quotes.product_total_price,haos_revenues_quotes.* ";
    $return_array['from'] = " FROM haos_revenues_quotes";
    $return_array['where'] =  " WHERE aos_products_quotes.parent_type='HAOS_Revenues_Quotes' AND aos_products_quotes.parent_id=haos_revenues_quotes.id AND haos_revenues_quotes.source_id = '" . $aos_source_id . "'";
    $return_array['join'] = ",aos_products_quotes";
    $return_array['join_tables'] = " aos_products_quotes.parent_id=haos_revenues_quotes.id";*/

    $return_array['select'] = " SELECT haos_revenues_quotes.* ";
    $return_array['from'] = " FROM haos_revenues_quotes";
    $return_array['where'] =  " WHERE  haos_revenues_quotes.source_id = '" . $aos_source_id . "'";
    $return_array['join'] = "";
    $return_array['join_tables'] = "";
    return $return_array;
}


// function get_revenue_quotes($params) {
//     $args = func_get_args();
//     $aos_source_id = $args[0]['aos_source_id'];

//     $query = "SELECT haos_revenues_quotes.*,
//               aos_products_quotes.product_total_price total_price
//                FROM  haos_revenues_quotes,aos_products_quotes 
//                WHERE aos_products_quotes.parent_id=haos_revenues_quotes.id and aos_products_quotes.parent_type='HAOS_Revenues_Quotes' AND aos_products_quotes.parent_id=haos_revenues_quotes.id AND haos_revenues_quotes.source_id = '" . $aos_source_id . "'";
//    //  $query = "SELECT haos_revenues_quotes.*, aos_products_quotes.product_total_price total_price FROM  haos_revenues_quotes,aos_products_quotes WHERE aos_products_quotes.parent_id=haos_revenues_quotes.id and aos_products_quotes.parent_type='HAOS_Revenues_Quotes' AND aos_products_quotes.parent_id=haos_revenues_quotes.id AND haos_revenues_quotes.source_id = '" . $aos_source_id . "'";
//    return $query;

// }
