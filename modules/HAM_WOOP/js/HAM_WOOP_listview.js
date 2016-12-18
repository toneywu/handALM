function assignWoop(id,record){
	//alert(record);
	$.ajax({
		url: 'index.php?to_pdf=true&module=HAM_WOOP&action=assign_woop_people&id=' + id,
		success: function (data) {
			//alert(data);
			//alert("assignWoop")
			if(data!="Y"){
				window.location.href = "index.php?module=HAM_WOOP";
			}
		},
		error: function () { //失败
			alert('Error loading document');
		}
	});
	
}


$(document).ready(function(){
		    
	        $("#woop_status option[value='REJECTED']").remove();
	        $("#woop_status option[value='WORKING']").remove();
	        $("#woop_status option[value='TRANSACTED']").remove();
	        $("#woop_status option[value='WSCH']").remove();
	        $("#woop_status option[value='WMATL']").remove();
	        $("#woop_status option[value='WPCOND']").remove();
	        $("#woop_status option[value='INPRG']").remove();
	        $("#woop_status option[value='RELEASED']").remove();
	        $("#woop_status option[value='CANCELED']").remove();
	        $("#woop_status option[value='REWORK']").remove();
	        $("#woop_status option[value='RETURNED']").remove();
})