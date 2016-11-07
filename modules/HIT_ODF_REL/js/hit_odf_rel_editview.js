function setAODFMarkNameReturn(popupReplyData){
	set_return(popupReplyData);
	if($("#b_odf_mark_name")!=""){
		$("#b_odf_mark").val($("#a_odf_mark").val());
	}
}

function setBODFMarkNameReturn(popupReplyData){
	set_return(popupReplyData);
	if($("#a_odf_mark_name")!=""){
		$("#a_odf_mark").val($("#b_odf_mark").val());
	}
}

$(document).ready(function(){
});