<?php

function display_lines($focus, $field, $value, $view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

	$html = '';
	if($view == 'EditView'){
     }
     else if($view == 'DetailView'){
     	$html .= '<script src="modules/HAA_Import_Sets/js/detail_upload_document.js"></script>
     			  <script src="include/javascript/jquery/jquery.form.js"></script> ';
		$html .= "<form id='upload_form'  name= 'upload_form' method = 'post'>
		<table border='0' cellspacing='4' width='100%' id='lineItems' class='list view table'>
		<tbody>
		<input id='status_id' name='status_id' type='hidden' value='Active'>
		<input id='revision' name='revision' type='hidden' value='1'>
		<input id='document_id1' name='document_id1' type='hidden' value=''>
		<input id='active_date' class='date_input' autocomplete='off' name='active_date' value=".date("Y-m-d")." title='' tabindex='0' type='hidden'>
		<tr><td width='12.5%'>文件名称</td>
			<td width='37.5%'><input id='filename_file' name='filename_file' title='' size='30' accesskey='7' maxlength='255' type='file' onchange='file_change()'></td>
			<td width='50%'></td></tr>
		<tr><td width='12.5%'>文档名称</td>
			<td width='37.5%'><input id='document_name' name='document_name' size='30' maxlength='255' value='' title='' type='text'></td>
			<td width='50%'></td></tr>
		<input class='button' id='upload_confirm' onclick='upload_file()' value='确认上传' type='button'>
		</tbody></table></form>";
		$html .= '<script>hideFirstTd(\'lineItems\');</script>';

     }
     return $html;
 }
