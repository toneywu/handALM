$(document).ready(function(){
   if(typeof site_type!="undefined"){
	$html='<input id="site_type" name="site_type" type="hidden" value="'+site_type+'"/>';
	$("#maint_site_advanced").after($html);
   }
});