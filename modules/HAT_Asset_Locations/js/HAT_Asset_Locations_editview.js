	$.getScript("modules/HAA_FF/ff_include.js");



//load triger_setFF()

function setLocationTypePopupReturn(popupReplyData){//选择地点类型后
	set_return(popupReplyData);
	call_ff();
}

function call_ff() {
	triger_setFF($("#haa_ff_id").val(),"HAT_Asset_Locations");
	$("a.collapsed").click();
}

function setParentLocationPopupReturn(popupReplyData){//选择地点类型后
	set_return(popupReplyData);
	if($("#name").val()==""){
	   $("#name").val($("#parent_location").val());
	}
}




$(document).ready(function() {
	//alert("haa_ff_id="+$("#haa_ff_id").val());
	if($('#haa_ff_id').length==0) {//如果对象不存在就添加一个
		$("#EditView").append('<input id="haa_ff_id" name="haa_ff_id" type=hidden>');
	}

	//加载图标选择器，从modules\HAT_Assets\js\editview_icon_picker.js
	SUGAR.util.doWhen("typeof icon_edit_init == 'function'", function(){
		icon_edit_init($("#location_icon"));
	});


	//触发FF
	SUGAR.util.doWhen("typeof setFF == 'function'", function(){
		call_ff();
	});


	function preValidateFunction(async_bool = false) {
		//验证当前地点代码是否唯一
		////如果是onChang校验，可以FFCheckField的async_bool=true这个输入过程与校验过程同步
		///但如果是SAVE按钮的触发，一定要async=false(保持默认)
		var ajaxStr='mode=locationName&val='+$("#name").val()+'&id=' + $("input[name*='record']" ).val()+'&site_id='+$("#ham_maint_sites_id").val();
		var errMSG = SUGAR.language.get('app_strings', 'LBL_DUPLICATED_ERR');
		var result= FFCheckField('name',ajaxStr,errMSG,async_bool);//ff_include.js
		console.log("checking..."+result);
		return result;
	}

	$("#name").change(function(){
		//验证当前地点代码是否唯一
		preValidateFunction(true)//如果是onChang校验，可以FFCheckField的async_bool=true这个输入过程与校验过程同步
	})//end onChange function


	//改写Save事件，在Save之前加入数据校验
	SUGAR.util.doWhen("typeof OverwriteSaveBtn == 'function'", function(){
		OverwriteSaveBtn(preValidateFunction);//ff_include.js 注意preValidateFunction是一个Function，在此引用时不加（）
	});


});