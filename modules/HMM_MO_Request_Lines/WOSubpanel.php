<?php
//REF:http://urdhva-tech.blogspot.sg/2013/02/add-custom-subpanel-in-accounts-module.html
//
/*SELECT 
    aos_products.name item_name,
    aos_products.part_number,
    sum(hmm_mo_request_lines.primary_qty) req_qty,
    s.trans_qty,
    haa_uom.uom_symbol
FROM
    aos_products,
    aos_products_cstm,
    haa_uom,
    hmm_mo_request_lines
        LEFT JOIN
    (SELECT 
        hmm_trans_lines.item_id,
            hmm_trans_lines.ham_woop_id,
            SUM(hmm_trans_lines.primary_qty) trans_qty
    FROM
        hmm_trans_lines
    GROUP BY hmm_trans_lines.item_id , hmm_trans_lines.ham_woop_id) s ON (hmm_mo_request_lines.ham_woop_id = s.ham_woop_id
        AND hmm_mo_request_lines.item_id = s.item_id)
WHERE
    aos_products.id = hmm_mo_request_lines.item_id
        AND aos_products.id = aos_products_cstm.id_c
        AND aos_products_cstm.haa_uom_id_c = haa_uom.id
        group by hmm_mo_request_lines.item_id,hmm_mo_request_lines.ham_woop_id*/
//
function get_material_lines($params) {
    $args = func_get_args();
/*	$base_unit_id = $args[0]['base_unit_id'];
	$uom_class_id = $args[0]['uom_class_id'];*/

    $return_array['select'] = "SELECT 
    aos_products.name item_name,
    aos_products.part_number,
    hmm_mo_request_lines.primary_qty,
    s.trans_qty,
    haa_uom.uom_symbol";
    $return_array['from'] = "FROM aos_products, aos_products_cstm, haa_uom, hmm_mo_request_lines ";
    $return_array['where'] = "WHERE aos_products.id = hmm_mo_request_lines.item_id
        AND aos_products.id = aos_products_cstm.id_c
        AND aos_products_cstm.haa_uom_id_c = haa_uom.id
";
    $return_array['join'] = "LEFT JOIN
    (SELECT 
        hmm_trans_lines.item_id,
            hmm_trans_lines.ham_woop_id,
            SUM(hmm_trans_lines.primary_qty) trans_qty
    FROM
        hmm_trans_lines
    GROUP BY hmm_trans_lines.item_id , hmm_trans_lines.ham_woop_id) s ON (hmm_mo_request_lines.ham_woop_id = s.ham_woop_id
        AND hmm_mo_request_lines.item_id = s.item_id)";
    $return_array['join_tables'] = "";
    return $return_array;
}