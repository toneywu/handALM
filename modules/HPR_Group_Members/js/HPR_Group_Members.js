function setDefaultName(popupReplyData){
	set_return(popupReplyData);//标准Popup-Return函数
	var members_name=$("#organization").val();
	if ($("#user_name").val()) {
		var members_name=$("#user_name").val();
	}
	$("input[id='name']").val(members_name);
}
