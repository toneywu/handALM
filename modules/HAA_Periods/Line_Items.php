<?php

function display_lines($focus, $field, $value, $view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;
    
    $sort_order_num = 0;

	$html = '';
	if($view == 'EditView'){
		$html .= '<script src="modules/HAA_Periods/js/line_items.js"></script>';
		$html .= "<table border='0' cellspacing='4' width='37.5%' id='lineItems' class='list view table'></table>";
		// $html .='<input type="hidden" name="explinetypeidden" id="explinetypeidden" value="'.get_select_options_with_id($app_list_strings['hie_exp_line_type_list'], '').'">';

		$html .= '<script>insertLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
         	$sql = "SELECT
         	hl.id,
         	hl.haa_period_sets_id_c period_set,
         	hl.sort_order,
         	hl.period_name,
         	hl.period_year,
         	hl.quarter_num,
         	hl.period_num,
         	hl.start_date,
         	hl.end_date,
         	hl.enabled_flag,
         	hl.description,
            (
            SELECT
                max(h2.sort_order)
              FROM
                haa_periods h2
                where h2.haa_period_sets_id_c = '".$focus->id."'
            ) max_sort_order
         	from 
         		haa_periods hl
         	where 1=1
             and hl.deleted = 0
             and hl.haa_period_sets_id_c  ='".$focus->id."'
              order by hl.sort_order asc"
         	 ;
         	// and ha.id  ='".$focus->id."'"


         	$result = $focus->db->query($sql);




         	while ($row = $focus->db->fetchByAssoc($result)) {
         		$line_data = json_encode($row);
         		$html .= "<script>insertLineData(" . $line_data . ");</script>";
         	}
         }
         $html .= '<script>insertLineFootor(\'lineItems\');</script>';
     }
     else if($view == 'DetailView'){
     }
     return $html;
 }
