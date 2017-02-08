<?php
/**
* 
*/
class Attr_Replace
{
	/*参数 $template_arr=array();
	module_id：attr对应模块的ID
	module_name：attr对应模块的名称
	template_type：模版类型
	template_id：模版ID
	module_action：模块对应action
	prefix：字段前缀
	prodln：行模块对应行号
	asset_id：资产ID
	*/
	

	function attr_info($template_arr=array()){
		global $db;
		$asset_id =$template_arr["asset_id"];
		$asset_info='';
		if ($template_arr["module_id"]!='') {
			$sql_attr="SELECT
			a.*
			FROM ".$template_arr["module_name"]." a
			WHERE
			a.id = '".$template_arr["module_id"]."'
			";
			$result_attr = $db->query($sql_attr);
			$row_attr = $db->fetchByAssoc($result_attr);
			/*if($template_arr["template_type"]=='INV_TASK_DETAILS'){
				$asset_id=$row_attr["hat_assets_id_c"];
			}*/
		}
		$sql="SELECT
		hctd.*, 
		if('".$template_arr["template_type"]."'='INV_TASK_DETAILS',(SELECT
			hctd1.asset_options
		FROM
		hat_counting_template_details hctd1
		WHERE
		1 = 1
		AND hctd1.id = hctd.id
		AND hctd1.table_names = 'INV_TASK_DETAILS'
		AND (
		hctd1.asset_options IS NOT NULL
		OR hctd1.asset_options <> ''
		)
		AND hctd1.enabled_flag = 1
		),null) asset_options
		FROM
		hat_counting_task_templates hctt,
		hat_counting_task_templates_hat_counting_template_details_c h,
		hat_counting_template_details hctd
		WHERE
		1 = 1
		AND hctt.id = h.hat_countid917mplates_ida
		AND h.hat_countib27cdetails_idb = hctd.id
		AND hctt.deleted = 0
		AND h.deleted = 0
		AND hctd.deleted = 0
		AND hctd.enabled_flag = 1
		and hctd.table_names = '".$template_arr["template_type"]."'
		AND hctt.id ='".$template_arr["template_id"]."'
		ORDER BY hctd.sort_order";
		$result = $db->query($sql);
		$template_data='';
		$num=0;
		while ($row = $db->fetchByAssoc($result)) {
			if($asset_id!='' && $row['asset_options']!=''){
				$sql_asset="SELECT
				".$row['asset_options']." asset_options
				FROM hat_assets
				WHERE
				id = '".$asset_id."'
				";
				$result_asset = $db->query($sql_asset);
				$row_asset = $db->fetchByAssoc($result_asset);
				$asset_info=$row_asset["asset_options"];
			}
			if($template_arr["module_id"]==''){
				$field_info=array(
					'field_lable'=>$row['field_lable'],
					'column_name'=>$row['column_name'],
					'relate_module'=>$row['relate_module'],
					'module_filter'=>$row['module_filter'],
					'haa_valuesets_id_c'=>$row['haa_valuesets_id_c'],
					'list_name'=>$row['list_name'],
					'required_flag'=>$row['required_flag'],
					'can_edit_flag'=>$row['can_edit_flag'],
					'asset_options'=>$row['asset_options'],
					'lookup_type'=>$row['lookup_type'],
					'column_id' => '',
					'module_dsp' => $row['module_dsp'],
					'asset_info' => $asset_info,
					'prefix' => $template_arr['prefix'], 
					'prodln' => $template_arr['prodln'],
					'on_diff_flag' => $row['on_diff_flag'],
					'table_names' => $row['table_names'],
					);
			}else{
				$field_info=array(
					'field_lable'=>$row['field_lable'],
					'column_name'=>$row['column_name'],
					'relate_module'=>$row['relate_module'],
					'module_filter'=>$row['module_filter'],
					'haa_valuesets_id_c'=>$row['haa_valuesets_id_c'],
					'list_name'=>$row['list_name'],
					'required_flag'=>$row['required_flag'],
					'can_edit_flag'=>$row['can_edit_flag'],
					'asset_options'=>$row['asset_options'],
					'lookup_type'=>$row['lookup_type'],
					'column_id' => $row_attr[$row["column_name"]],
					'module_dsp' => $row['module_dsp'],
					'asset_info' => $asset_info,
					'prefix' => $template_arr['prefix'], 
					'prodln' => $template_arr['prodln'],
					'on_diff_flag' => $row['on_diff_flag'],
					'table_names' => $row['table_names'],
					);
			}
			$template_data.=$num%2==0?"<tr>":"";
			if($template_arr["module_action"]=='EditView'){
				$template_data.='<td id="'.$row['column_name'].'_label" data-total-columns="2" scope="col" width="12.5%" valign="top">'.$row['field_lable'].':';
				$addToValidate='';
				if ($row['required_flag']==1) {
					$template_data.='<span class="required">*</span>';
					if($template_arr["template_type"]=='INV_DETAIL_RESULTS'){
						$addToValidate="<script>addToValidate('EditView', '".$template_arr["prefix"].$row['column_name'].$template_arr["prodln"]."','varchar', 'true','".$row['field_lable']."');</script>";
					}else{
						$addToValidate="<script>addToValidate('EditView', '".$row['column_name']."','varchar', 'true','".$row['field_lable']."');</script>";
					}
					
				}
				$template_data.='</td>'.$addToValidate;
			}else if ($template_arr["module_action"]=='DetailView') {
				$template_data.='<td scope="col" width="12.5%">'.$field_info["field_lable"].':</td>';

			}
			switch ($row["field_type"]) {
				case 'VARCHAR':
				case 'NUMBER':
				if($template_arr["module_action"]=='EditView'){
					$template_data.=$this->setInput($field_info);
				}else if($template_arr["module_action"]=='DetailView') {
					$template_data.=$this->setInput_detail($field_info);
				}
				break;
				case 'DATE':
				if($template_arr["module_action"]=='EditView'){
					$template_data.=$this->setDate($field_info);
				}else if($template_arr["module_action"]=='DetailView') {
					$template_data.=$this->setDate_detail($field_info);
				}
				break;
				case 'LIST':
				if($template_arr["module_action"]=='EditView'){
					$template_data.=$this->setList($field_info);
				}else if($template_arr["module_action"]=='DetailView') {
					$template_data.=$this->setList_detail($field_info);
				}
				break;
				case 'LOV':
				if($template_arr["module_action"]=='EditView'){
					$template_data.=$this->setLov($field_info);
				}else if($template_arr["module_action"]=='DetailView') {
					$template_data.=$this->setLov_detail($field_info);
				}
				break;
				case 'CHECKBOX':
				if($template_arr["module_action"]=='EditView'){
					$template_data.=$this->setCheckbox($field_info);
				}else if($template_arr["module_action"]=='DetailView') {
					$template_data.=$this->setCheckbox_detail($field_info);
				}
				break;
			}
			$template_data.=$num%2==0?"":"</tr>";
			$num++;
		}
		if ($num%2!=0) {
			$template_data=substr($template_data, 0,strlen($template_data)-5);
			$template_data.="<td></td><td></td></tr>";
		}
		return $template_data;
	}

	function setLov($field_info){
		global $db;
		$row_name='';
		$id='';

		if($field_info["column_id"]!=''){
			$sql_id="SELECT ".$field_info["module_dsp"]." module_dsp from ".$field_info["relate_module"]."  where id='".$field_info["column_id"]."'";
			$result_id = $db->query($sql_id);
			//var_dump($sql_id);
			$row_id = $db->fetchByAssoc($result_id);
			$row_name=$row_id["module_dsp"];
			$id=$field_info["column_id"];
		}else if ($field_info["asset_info"]!=''){
			$sql_id="SELECT ".$field_info["module_dsp"]." module_dsp from ".$field_info["relate_module"]."  where id='".$field_info["asset_info"]."'";
			$result_id = $db->query($sql_id);
			$row_id = $db->fetchByAssoc($result_id);
			$row_name=$row_id["module_dsp"];
			$id=$field_info["asset_info"];
		}
		$return_html="";
		$lov_name="";
		$lov_id='';
		if($field_info["prodln"]==''){
			$lov_name=$field_info["column_name"]."_name";
			$lov_id=$field_info["prefix"].$field_info["column_name"].$field_info["prodln"];
		}else{
			$lov_name=$field_info["prefix"].$field_info["column_name"]."_name[".$field_info["prodln"]."]";
			$lov_id=$field_info["prefix"].$field_info["column_name"].'['.$field_info["prodln"].']';
		}
		$call_back_function='set_return';
		if($field_info["table_names"]=='INV_DETAIL_RESULTS'&& $field_info["prodln"]!='' && $field_info["on_diff_flag"]==1){
			$call_back_function='setReturn'.$field_info["column_name"];
		}
		$function_html='';
		$function_html=$this->getControlHtml($field_info);
		$clear_html='';
		$clear_html=$this->getClearHtml($field_info);
		$return_html="<td><input name='".$lov_name."' class='sqsEnabled yui-ac-input' tabindex='0' id='".$field_info["prefix"].$field_info["column_name"]."_name".$field_info["prodln"]."' size='' value='".$row_name."' title='' autocomplete='off' accesskey='7' type='text'";
		$return_html.=$field_info['can_edit_flag']==0?"disabled='disabled'":"";
		$return_html.="><input name='".$lov_id."' id='".$field_info["prefix"].$field_info["column_name"].$field_info["prodln"]."' type='hidden' value='".$id."'>".
		"<button title='选择[Alt+T]' accessKey='T' type='button' tabindex='116' class='button' value='选择' name='btn1' onclick='open_popup(\"".$field_info["relate_module"]."\", 600, 400, \"".$field_info["module_filter"]."\", true, false, {\"call_back_function\":\"".$call_back_function."\",\"form_name\":\"EditView\",\"field_to_name_array\":{\"id\":\"".$field_info["prefix"].$field_info["column_name"].$field_info["prodln"]."\",\"name\":\"".$lov_name."\"}}, \"single\", true );'";
		$return_html.=$field_info['can_edit_flag']==0?"disabled='disabled'":"";
		$return_html.="><img src='themes/default/images/id-ff-select.png' alt=''></button>".
		"<button type='button' name='btn_clr_".$field_info["column_name"]."' id='btn_clr_".$field_info["column_name"]."' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"".$lov_name."\", \"".$field_info["prefix"].$field_info["column_name"].$field_info["prodln"]."\");".$clear_html.";' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>";
		$return_html.='</td>';
		return $return_html;
	}

	function setLov_detail($field_info){
		global $db;
		$row_name='';
		$id='';
		if($field_info["column_id"]!=''){
			$sql_id="SELECT ".$field_info["module_dsp"]." module_dsp from ".$field_info["relate_module"]."  where id='".$field_info["column_id"]."'";
			$result_id = $db->query($sql_id);
			$row_id = $db->fetchByAssoc($result_id);
			$row_name=$row_id["module_dsp"];
			$id=$field_info["column_id"];
		}else if ($field_info["asset_info"]!=''){
			$sql_id="SELECT ".$field_info["module_dsp"]." module_dsp from ".$field_info["relate_module"]."  where id='".$field_info["asset_info"]."'";
			$result_id = $db->query($sql_id);
			$row_id = $db->fetchByAssoc($result_id);
			$row_name=$row_id["module_dsp"];
			$id=$field_info["asset_info"];
		}

		$return_html="";
		$return_html.='<td class="" type="relate" field="'.$field_info["column_name"].'_name" width="37.5%">
		<a href="?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3D'.$field_info["relate_module"].'%26action%3D'.$template_arr["module_action"].'%26record%3D'.$id.'"><span id="'.$field_info["column_name"].'" class="sugar_field" data-id-value="'.$id.'">'.$row_name.'</span>
		</a></td>';

		return $return_html;
	}

	function setInput($field_info){
		$id='';
		$function_html='';
		if($field_info["column_id"]!=''){
			$id=$field_info["column_id"];
		}else if($field_info["asset_info"]!=''){
			$id=$field_info["asset_info"];
		}
		$return_html="";
		$lov_name="";
		if($field_info["prodln"]==''){
			$lov_name=$field_info["column_name"];
		}else{
			$lov_name=$field_info["prefix"].$field_info["column_name"]."[".$field_info["prodln"]."]";
		}
		$return_html='<td><input type="text" id="'.$field_info["prefix"].$field_info["column_name"].$field_info["prodln"].'" name="'.$lov_name.'"  value="'.$id.'"';
		$return_html.=$field_info['can_edit_flag']==0?"disabled='disabled'":"";
		$function_html=$this->getControlHtml($field_info);
		$return_html.=" onblur='".$function_html."' /></td>";
		return $return_html;
	}

	function setInput_detail($field_info){
			$id='';
			if($field_info["column_id"]!=''){
				$id=$field_info["column_id"];
			}else if($field_info["asset_info"]!=''){
				$id=$field_info["asset_info"];
			}
			$return_html="";
			$return_html='<td><span class="sugar_field" id="'.$field_info["column_name"].'">'.$id.'</span></td>';
			return $return_html;
		}


	function setDate($field_info){
			$id='';
			if($field_info["column_id"]!=''){
				$id=$field_info["column_id"];
			}else if($field_info["asset_info"]!=''){
				$id=$field_info["asset_info"];
			}
			$return_html="";
			$return_html='<td><span class="input-group date" id="span_'.$field_info["column_name"].'" onclick="get_date()">
			<input class="date_input" autocomplete="off" name="'.$field_info["column_name"].'" id="'.$field_info["column_name"].'" value="'.$id.'" title="" tabindex="0" type="text">
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
			</span></span>';
			$return_html.='<script src="custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>';
			$return_html.='<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">';
			$return_html.='<script>
			function get_date(){
				var Datetimepicker=$("#span_'.$field_info["column_name"].'");
				var dateformat = "yyyy-mm-dd";
				Datetimepicker.datetimepicker({
					language:"zh_CN",
					format:dateformat,
					showMeridian:true,
					minView:2,
					todayBtn:true,
					autoclose:true,
				});
			}
		</script>';
		$return_html.='</td>';
		return $return_html;
	}

	function setDate_detail($field_info){
		$id='';
		if($field_info["column_id"]!=''){
			$id=$field_info["column_id"];
		}else if($field_info["asset_info"]!=''){
			$id=$field_info["asset_info"];
		}
		$return_html="";
		$return_html.='<td class="" type="date" field="'.$field_info["column_name"].'" width="37.5%">
		<span class="sugar_field" id="'.$field_info["column_name"].'">'.$id.'</span>
		</td>';
		return $return_html;
	}

function setList($field_info){
	global $app_list_strings;
	$str = "<option value='' selected> </option>";
	$list_data=$app_list_strings[$field_info['list_name']];
	if(is_array($list_data)){
		foreach ($list_data as $key => $value) {
			if(($field_info["asset_info"]!='' && $field_info["asset_info"]==$key) ||
				($field_info["column_id"]!='' && $field_info["column_id"]==$key)){
				$str =$str.'<option value='.$key.' selected>'.$value.'</option>';
			}else{
			$str =$str.'<option value='.$key.'>'.$value.'</option>';
			}
		}
	}
	$return_html="";
	$function_html='';
	$lov_name="";
		if($field_info["prodln"]==''){
			$lov_name=$field_info["column_name"];
		}else{
			$lov_name=$field_info["prefix"].$field_info["column_name"]."[".$field_info["prodln"]."]";
		}
	$return_html='<td><select name="'.$lov_name.'" id="'.$field_info["prefix"].$field_info["column_name"].$field_info["prodln"].'" title=""';
	$return_html.=$field_info['can_edit_flag']==0?"disabled='disabled'":"";
	$function_html=$this->getControlHtml($field_info);
	//var_dump($function_html);
	$return_html.="onchange='".$function_html."'";
	$return_html.='>'.$str.'</select>';
	$return_html.='</td>';
	return $return_html;
}

function setList_detail($field_info){
	global $app_list_strings;
	$list_value='';
	$id='';
	$str = "";
	$list_data=$app_list_strings[$field_info['list_name']];
	if(is_array($list_data)){
		foreach ($list_data as $key => $value) {
			if($field_info["column_id"]==$key || $field_info["asset_info"]==$key){
				$list_value=$value;
				$id=$key;
			}
		}
	}
	$return_html="";
	$return_html.='<td class="" type="enum" field="'.$field_info["column_name"].'" width="37.5%">
	<input class="sugar_field" id="'.$field_info["column_name"].'" value="'.$id.'" type="hidden">
	'.$list_value.'</td>';
	return $return_html;
}

function setCheckbox($field_info){
	$return_html="";
	$function_html='';
	$lov_name="";
		if($field_info["prodln"]==''){
			$lov_name=$field_info["column_name"];
		}else{
			$lov_name=$field_info["prefix"].$field_info["column_name"]."[".$field_info["prodln"]."]";
		}
	$return_html.='<td data-total-columns="2" width="37.5%" valign="top">
	<input name="'.$lov_name.'" value="0" type="hidden"><input id="'.$field_info["prefix"].$field_info["column_name"].$field_info["prodln"].'" name="'.$lov_name.'" value="1" title="" tabindex="0" type="checkbox"';
	$return_html.=$field_info["column_id"]==1?'checked="checked"':'';
	$return_html.=$field_info['can_edit_flag']==0?"disabled='disabled'":"";
	$function_html=$this->getControlHtml($field_info);
	$return_html.="onclick='".$function_html."'";
	$return_html.='></td>';
	return $return_html;
	}

	function setCheckbox_detail($field_info){
		$return_html="";
		$return_html.='<td class="" type="bool" field="'.$field_info["column_name"].'" width="37.5%">
		<input class="checkbox" name="'.$field_info["column_name"].'" id="'.$field_info["column_name"].'" value="$fields.'.$field_info["column_name"].'.value" disabled="true" type="checkbox"';
		$return_html.=$field_info["column_id"]==1?'checked="checked"':'';
		$return_html.='></td>';
		return $return_html;
	}

	function getClearHtml($field_info){
		$function_html='';
		$column=split('i', $field_info["column_name"]);
		if($field_info["prodln"]!='' && $field_info["on_diff_flag"]==1 && $field_info["table_names"]=='INV_DETAIL_RESULTS'){
			$num=split('e', $field_info["column_name"]);
			$function_html='var flag="'.$field_info["prefix"].'diff_flag'.$num[1].$field_info["prodln"].'";
			var attr_h=document.getElementById("'.$field_info["column_name"].'").value;
			if(attr_h==""){
				document.getElementById(flag).checked=false;
			}
			else{
				document.getElementById(flag).checked=true;
			}
			var bool=false;
			for(i=1;i<16;i++){
				var diff_flag="'.$field_info["prefix"].'diff_flag"+i+"'.$field_info["prodln"].'";
				if(document.getElementById(diff_flag)!==null){
					bool=bool|document.getElementById(diff_flag).checked;
				}
			}
			if(bool==1){
				document.getElementById("line_counting_result'.$field_info["prodln"].'").value="Different";
			}else{
				document.getElementById("line_counting_result'.$field_info["prodln"].'").value="Matched";
			}
			if(document.getElementById("line_counting_result'.$field_info["prodln"].'").value!="Matched"){
				document.getElementById("line_adjust_needed'.$field_info["prodln"].'").checked=true;
			}else{
				document.getElementById("line_adjust_needed'.$field_info["prodln"].'").checked=false;
			}';
		}
		return $function_html;
	}

	function getControlHtml($field_info){
		$function_html='';
		//var_dump($field_info);
		$column=split('i', $field_info["column_name"]);
		if($field_info["prodln"]!='' && $field_info["on_diff_flag"]==1 && $field_info["table_names"]=='INV_DETAIL_RESULTS'){
			//var_dump($field_info);
			$num=split('e', $field_info["column_name"]);
			$function_html='var flag="'.$field_info["prefix"].'diff_flag'.$num[1].$field_info["prodln"].'";
			var this_value=document.getElementById("'.$field_info["prefix"].$field_info["column_name"].$field_info["prodln"].'").value;
			var attr_h=document.getElementById("'.$field_info["column_name"].'").value;
			if(attr_h==this_value){
				document.getElementById(flag).checked=false;
			}
			else{
				document.getElementById(flag).checked=true;
			}
			var bool=false;
			for(i=1;i<16;i++){
				var diff_flag="'.$field_info["prefix"].'diff_flag"+i+"'.$field_info["prodln"].'";
				if(document.getElementById(diff_flag)!==null){
					bool=bool|document.getElementById(diff_flag).checked;
				}
			}
			if(bool==1){
				document.getElementById("line_counting_result'.$field_info["prodln"].'").value="Different";
			}else{
				document.getElementById("line_counting_result'.$field_info["prodln"].'").value="Matched";
			}
			if(document.getElementById("line_counting_result'.$field_info["prodln"].'").value!="Matched"){
				document.getElementById("line_adjust_needed'.$field_info["prodln"].'").checked=true;
			}else{
				document.getElementById("line_adjust_needed'.$field_info["prodln"].'").checked=false;
			}';
		}else if($column[0]='d' && $field_info["table_names"]=='INV_DETAIL_RESULTS'){
			$function_html='';
		}else{
			$function_html='return false;';
		}
		return $function_html;
	}
}