$(document).ready(function(){
	if($('#haa_ff_id').length==0) {//如果对象不存在就添加一个
		$("#EditView").append('<input id="haa_ff_id" name="haa_ff_id" type=hidden>');
	};

    //触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
        triger_setFF($("#haa_ff_id").val(),"HAT_Assets")
		$("a.collapsed").click();
     });

	$("#asset_desc").css("font-weight","bold");
	$("#name").css("font-weight","bold");


	if($('#enable_vehicle_mgmt').length!=0){
		if (!document.getElementById('enable_vehicle_mgmt').checked) {
		//如果没有选中车辆管理，将车辆相关的字段隐藏。
		$("#vin").parents("div.detail-view-row-item").hide();
		}
	}

	if($('#enable_linear').length!=0){
		if (!document.getElementById('enable_linear').checked) {
		//如果没有选Linear管理，将相关的字段隐藏。
			$("#top-panel-0").closest("div.panel").hide();
		}
	}


});

