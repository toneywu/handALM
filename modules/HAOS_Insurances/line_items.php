<?php

function display_lines($focus,$field,$value,$view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

	$html='';
	if($view=='EditView'){
		$html.='<script src="modules/HAOS_Insurances/line_items.js"></script>';
		$html.="<table border='0'cellspacing='4'width='100%'id='lineItems'class='listviewtable'></table>";
		$html.='<input type="hidden"name="documentstatus"id="documentstatus"value="'.get_select_options_with_id($app_list_strings['document_status_dom'],'').'">';
		$html.='<input type="hidden"name="documentcategory"id="documentcategory"value="'.get_select_options_with_id($app_list_strings['document_category_dom'],'').'">';
		$html.='<script>insertLineHeader(\'lineItems\');</script>';
    
if($focus->id!=''){//如果不是新增（即如果是编辑已有记录）
	
	$sql="SELECT
	doc.id,
	hid.haos_insurances_documentshaos_insurances_ida haos_insurance_id,
	doc.document_name, 
	dr.filename file_name,   
	doc.category_id,      
	doc.status_id,     
	doc.active_date,
	dr.revision, 
	doc.description     
	FROM
	documents doc,
	haos_insurances_documents_c hid,
	document_revisions dr
	WHERE
	doc.id=hid.haos_insurances_documentsdocuments_idb
	AND doc.deleted=0
	and doc.document_revision_id = dr.id
	AND hid.haos_insurances_documentshaos_insurances_ida='".$focus->id."'";


	$result=$focus->db->query($sql);

	while($row=$focus->db->fetchByAssoc($result)){
		$line_data=json_encode($row);
		$html.="<script>insertLineData(".$line_data.");</script>";
	}
}
$html.='<script>insertLineFootor(\'lineItems\');</script>';
}
elseif($view=='DetailView'){
}
return$html;
}
