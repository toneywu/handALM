$(document).ready(function(){
   if(typeof contract_type!="undefined"){
	$html='<input id="contract_type" name="contract_type" type="hidden" value="'+contract_type+'"/>';
	$("#people_type_c_advanced").after($html);
   }
});