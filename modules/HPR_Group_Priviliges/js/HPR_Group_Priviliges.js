function setDefaultName(popupReplyData){
	set_return(popupReplyData);//标准Popup-Return函数

	var members_name=$("#privilige_module").val();
	if ($("#group_member").val()) {
		var members_name=$("#group_member").val();
	}
	$("input[id='name']").val(members_name);
}
