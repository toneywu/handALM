<?php

function display_lines_doc($focus,$field,$value,$view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

	echo '<script type="text/javascript" src="custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>';
echo '<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">';

	$html='';
	if($view=='EditView'){
		$html.='<script src="modules/HAT_Counting_Lines/line_doc_items.js"></script>';
		$html.="<table border='0'cellspacing='4'width='100%'id='linedocItems'class='listviewtable'></table>";
		$html.='<input type="hidden"name="documentstatus"id="documentstatus"value="'.get_select_options_with_id($app_list_strings['document_status_dom'],'').'">';
		$html.='<input type="hidden"name="documentcategory"id="documentcategory"value="'.get_select_options_with_id($app_list_strings['document_category_dom'],'').'">';
		$html.='<script>doc_insertLineHeader(\'linedocItems\');</script>';
    
if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
	
	$sql="SELECT
	doc.id,
	hid.hat_counting_lines_documentshat_counting_lines_ida hat_counting_lines_id,
	doc.document_name,
	dr.filename file_name,
	doc.category_id,
	doc.status_id,
	doc.active_date,
	dr.revision,
	doc.description
FROM
	documents doc,
	hat_counting_lines_documents_c hid,
	document_revisions dr
WHERE
	doc.id = hid.hat_counting_lines_documentsdocuments_idb
AND doc.deleted = 0
AND hid.deleted = 0
AND doc.document_revision_id = dr.id
AND hid.hat_counting_lines_documentshat_counting_lines_ida='".$focus->id."'";

	
	$result=$focus->db->query($sql);

	while($row=$focus->db->fetchByAssoc($result)){
		$line_data=json_encode($row);
		$html.="<script>doc_insertLineData(".$line_data.");</script>";
	}
}
$html.='<script>doc_insertLineFootor(\'linedocItems\');</script>';
}
elseif($view=='DetailView'){
}
return$html;
}
