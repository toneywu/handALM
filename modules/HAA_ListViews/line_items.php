<?php

function display_lines($focus,$field,$value,$view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

	$html='';
	if($view =='EditView' || $view == 'DetailView'){
		$html.='<script src="modules/HAA_ListViews/js/line_items.js"></script>';
		$html.="<table border='0'cellspacing='4'width='100%'id='lineItems'class='listviewtable'></table>";
		//获取系统定义的下拉框的值
		$html .='<input type="hidden" name="linetypehidden" id="linetypehidden" value="'.get_select_options_with_id($app_list_strings['moduleList'], '').'">';
		$html .='<input type="hidden" name="linealignhidden" id="linealignhidden" value="'.get_select_options_with_id($app_list_strings['haa_listview_align_code'], '').'">';
		$html.='<input type="hidden" name="windowtypehidden" id="windowtypehidden" value="'.get_select_options_with_id($app_list_strings['haa_listview_window_type'], '').'">';
		$html.='<script>insertLineHeader(\'lineItems\');</script>';

    
		if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
			
			$sql="SELECT
					c.id,
					c.`name` c_name,
					c.haa_listviews_id_c,
					v.`name` v_name,
					c.sort_order,
					c.column_name,
					c.field_lable_zhs,
					c.field_lable_us,
					c.display_type_code,
					c.display_hsize,
					c.link_module,
					c.link_id_column,
					c.popup_visible_flag,
					c.dashlet_visible_flag,
					c.query_allowed_flag,
					c.value_return_flag,
					c.header_alignment_code,
					c.cell_alignment_code,
					c.enabled_flag,
					c.description
				FROM
					haa_listviews v,
					haa_listview_columns c
				WHERE
					v.id = c.haa_listviews_id_c
				AND c.deleted = 0
				AND c.haa_listviews_id_c ='".$focus->id."'";


			$result=$focus->db->query($sql);

			while($row=$focus->db->fetchByAssoc($result)){
				$line_data=json_encode($row);
				$html.="<script>insertLineData(".$line_data.",'".$view."');</script>";
			}
        }
        if ($view == 'EditView') {
             $html.='<script>insertLineFootor(\'lineItems\');</script>';
        }
    }
/*elseif($view=='DetailView'){
}*/
    return$html;
}
