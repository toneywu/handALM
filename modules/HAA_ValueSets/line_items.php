<?php

function display_lines($focus,$field,$value,$view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

	$html='';
	if($view =='EditView' || $view == 'DetailView'){
		$html.='<script src="modules/HAA_ValueSets/js/line_items.js"></script>';
		$html.="<table border='0'cellspacing='4'width='100%'id='lineItems'class='listviewtable'></table>";
		/*$html.='<input type="hidden"name="documentstatus"id="documentstatus"value="'.get_select_options_with_id($app_list_strings['document_status_dom'],'').'">';
		$html.='<input type="hidden"name="documentcategory"id="documentcategory"value="'.get_select_options_with_id($app_list_strings['document_category_dom'],'').'">';*/
		$html.='<script>insertLineHeader(\'lineItems\');</script>';

		if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
			
			$sql="SELECT
			h.`name` h_name,
			l.name l_name,
			h.id hid,
			l.id,
			l.haa_values_id_c pid,
			parent_l.flex_meaning p_flex_value,
			l.flex_value,
			l.flex_meaning,
			l.description,
			l.enabled_flag
			FROM
			haa_valuesets h,
			haa_values l
			LEFT JOIN haa_values parent_l ON l.haa_values_id_c = parent_l.id
			/* haa_valuesets_haa_values_c c*/
			WHERE
			1 = 1
			AND l.deleted = 0
			and h.deleted=0
			AND l.haa_valuesets_id_c = h.id
			AND h.id ='".$focus->id."'";

			$result=$focus->db->query($sql);

			while($row=$focus->db->fetchByAssoc($result)){
				$line_data=json_encode($row);
				$html.="<script>insertLineData(".$line_data.",'".$view."');</script>";
			}
		$sqldesc="SELECT
			l.description parent_desc
			FROM
			haa_valuesets h
			LEFT JOIN haa_values l ON h.haa_values_id_c = l.id

			WHERE
			1 = 1
			AND l.deleted = 0
			AND h.deleted = 0
			AND h.id ='".$focus->id."'";
			$resultd=$focus->db->query($sqldesc);
			while($rowd=$focus->db->fetchByAssoc($resultd)){
			$line_datad=json_encode($rowd);
		}
			
		}
		if ($view == 'EditView') {

		$html.= "
				<script>parentDesc(".$line_datad.");</script>
			";
			$html.='<script>insertLineFootor(\'lineItems\');</script>';
		}else if ($view == 'DetailView') {

		$html.= "
				<script>parentDescD(".$line_datad.");</script>
			";
		}
	}
/*elseif($view=='DetailView'){
}*/
return$html;
}
