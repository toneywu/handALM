function setExtendValReturn(popupReplyData){
	$("#loc_attr").val(popupReplyData['name_to_value_array']['loc_attr']);
	$("#org_attr").val(popupReplyData['name_to_value_array']['org_attr']);
	$("#major_attr").val(popupReplyData['name_to_value_array']['major_attr']);
	$("#category_attr").val(popupReplyData['name_to_value_array']['category_attr']);
	$("#user_attr").val(popupReplyData['name_to_value_array']['user_attr']);
	$("#own_attr").val(popupReplyData['name_to_value_array']['own_attr']);
	set_return(popupReplyData);//标准Popup-Return函数
}