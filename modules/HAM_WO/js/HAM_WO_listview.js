function getUrlParam(name) {
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
		var r = window.location.search.substr(1).match(reg);  //匹配目标参数
		if (r != null) return unescape(r[2]); return null; //返回参数值
}

$(document).ready(function(){
	var loaded = false; 
	if (!loaded) { 
		var return_message=getUrlParam("error_message");
			if(typeof return_message!="undefined" && return_message!=""&return_message!=null){
				loaded=true;
				jQuery.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js").done(function() {
					BootstrapDialog.show({
									size: BootstrapDialog.SIZE_NORMAL,
									message: "工单只有在拟定或退回状态下可删除",
									buttons: [{
										label: 'Close',
										action: function(dialogItself){
											dialogItself.close();
											return_message="";
											$("input[name=error_message]").val("");
											window.location.href="index.php?module=HAM_WO&action=index";
										}
									}]
								});
				});
		}	
	}
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
