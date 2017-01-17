$(document).ready(function(){
   if(typeof asset_using_org!="undefined"){
	$html='<input id="asset_using_org" name="asset_using_org" type="hidden" value="'+asset_using_org+'"/>';
	$("#frame_c_advanced").after($html);
   }
   
   $("#popup_query_form").attr("action",window.location.href);
});