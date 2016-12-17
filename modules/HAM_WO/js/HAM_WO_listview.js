$(document).ready(function(){
console.log("hello world");	
	   $("#wo_status_basic  option[value='WSCH']").remove();
        $("#wo_status_basic option[value='WMATL']").remove();
        $("#wo_status_basic option[value='WPCOND']").remove();
        $("#wo_status_basic option[value='INPRG']").remove();
        $("#wo_status_basic option[value='WPREV']").remove();
        $("#wo_status_basic option[value='REWORK']").remove(); 
		$("#wo_status_basic option[value='TRANSACTED']").remove();
		$("#wo_status_basic option[value='RELEASED']").remove();
        $("#wo_status_basic option[value='REJECTED']").remove();
        $("#wo_status_basic option[value='CANCELED']").remove();
	
});
