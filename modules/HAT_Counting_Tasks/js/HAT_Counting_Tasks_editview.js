function setExtendValReturn(popupReplyData){
	if(popupReplyData['name_to_value_array']['counting_by_location']==1){
		$("#counting_by_location").attr('checked',true);
	}

	$("#name").val(popupReplyData['name_to_value_array']['counting_batch_name']);
	$("#location_attr").val(popupReplyData['name_to_value_array']['location_attr']);
	$("#oranization_attr").val(popupReplyData['name_to_value_array']['oranization_attr']);
	$("#major_attr").val(popupReplyData['name_to_value_array']['major_attr']);
	$("#category_attr").val(popupReplyData['name_to_value_array']['category_attr']);
	set_return(popupReplyData);//标准Popup-Return函数
}

function get_template_info(popupReplyData){
	set_return(popupReplyData);//标准Popup-Return函数
	//console.log(popupReplyData["name_to_value_array"]["hat_counting_task_templates_id_c"]);
	attr_info(popupReplyData["name_to_value_array"]["hat_counting_task_templates_id_c"]);
	$("#detailpanel_2").show();
}
function attr_info(id){
	var module_id = $("input[name*='record']").val();
	$.ajax({
		url:'index.php?to_pdf=true&module=HAT_Counting_Tasks&action=counting_task_attr',
		data:'&id='+id+'&type=INV_TASKS&module_action=EditView&module_name=HAT_Counting_Tasks&module_id='+module_id+'&prefix='+''
		+'&prodln='+'',
		type:'POST',
		success:function(result){
			get_html(result);
		}
	});
}

function get_html(result){
	var lineItems=document.getElementById('LBL_EDITVIEW_PANEL1');
  	lineItems.innerHTML=result;
}

$(function(){
	var id=$("#hat_counting_task_templates_id_c").val();
	if (id!="") {
		attr_info(id);
	}
	else{
		$("#detailpanel_2").hide();
	}
})