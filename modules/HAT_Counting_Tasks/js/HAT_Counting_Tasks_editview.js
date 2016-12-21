function setExtendValReturn(popupReplyData){
	if(popupReplyData['name_to_value_array']['counting_by_location']==1){
		$("#counting_by_location").attr('checked',true);
	}
	console.log(popupReplyData['name_to_value_array']['counting_batch_name']);

	$("#name").val(popupReplyData['name_to_value_array']['counting_batch_name']);
	$("#location_attr").val(popupReplyData['name_to_value_array']['location_attr']);
	$("#oranization_attr").val(popupReplyData['name_to_value_array']['oranization_attr']);
	$("#major_attr").val(popupReplyData['name_to_value_array']['major_attr']);
	$("#category_attr").val(popupReplyData['name_to_value_array']['category_attr']);
	set_return(popupReplyData);//标准Popup-Return函数
}