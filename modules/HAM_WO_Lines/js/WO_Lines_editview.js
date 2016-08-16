function setAssetReturn(popupReplyData){
	set_return(popupReplyData);
	if($("#quantity").val()==""){
		$("#quantity").val("1.00000000");
	}
}