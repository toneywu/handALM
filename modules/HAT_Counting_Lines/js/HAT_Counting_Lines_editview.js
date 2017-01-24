function setExtendValReturn(popupReplyData){
	$("#loc_attr").val(popupReplyData['name_to_value_array']['loc_attr']);
	$("#org_attr").val(popupReplyData['name_to_value_array']['org_attr']);
	$("#major_attr").val(popupReplyData['name_to_value_array']['major_attr']);
	$("#category_attr").val(popupReplyData['name_to_value_array']['category_attr']);
	$("#user_attr").val(popupReplyData['name_to_value_array']['user_attr']);
	$("#own_attr").val(popupReplyData['name_to_value_array']['own_attr']);
	attr_info(popupReplyData["name_to_value_array"]["task_template_attr"]);
	$("#detailpanel_2").show();
	set_return(popupReplyData);//标准Popup-Return函数
}

function attr_info(id){
	var module_id = $("input[name*='record']").val();
	//var module_id =document.getElementByTagName("name")
	$.ajax({
		url:'index.php?to_pdf=true&module=HAT_Counting_Tasks&action=counting_task_attr',
		data:'&id='+id+'&type=INV_TASK_DETAILS&module_action=EditView&module_name=HAT_Counting_Lines&module_id='+module_id+'&prefix='+''
		+'&prodln='+'',
		type:'POST',
		success:function(result){
			get_html(result);
		}
	});
}

function get_html(result){
	var lineItems=document.getElementById('LBL_EDITVIEW_PANEL3');
  	lineItems.innerHTML=result;
}

$(function(){
	var id=$("#task_template_attr").val();
	if (id!="") {
		attr_info(id);
	}
	else{
		$("#detailpanel_2").hide();
	}
})