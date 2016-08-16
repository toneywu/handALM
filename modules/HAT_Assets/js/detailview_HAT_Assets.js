$(document).ready(function(){

	$("#asset_desc").css("font-weight","bold");
	$("#name").css("font-weight","bold");


	if(!document.getElementById('enable_vehicle_mgmt').checked) {
		//如果没有选中车辆管理，将车辆相关的字段隐藏。
		$("#vin").parents("tr").hide();
	}

	if(!document.getElementById('enable_linear').checked) {
		//如果没有选中车辆管理，将车辆相关的字段隐藏。
		$("#detailpanel_2").hide();
	}


});

