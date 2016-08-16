//$.getScript("modules/HAA_FF/ff_include.js")

function trimStr(str){return str.replace(/(^\s*)|(\s*$)/g,"");}

function setProductPopupReturn(popupReplyData){//选择完产品后的动作
	set_return(popupReplyData);

	$("#asset_name").val($("#asset_group").val());//将产品名默认给资产名称
	generateAssetDesc();//自动生成资产全名=名称+厂商+型号

	$("#asset_name_rule option").filter(function() {//从产品上读取资产的铭牌号生成规则
		return this.text == $("#asset_name_rule_c").val();
	}).attr('selected', true);

	resetAssetName();//自动生成资产铭牌号

	//开始建立flexFields
	triger_setFF($("#haa_ff_id_c").val(),"HAT_Assets")
	$(".expandLink").click();
	$('#target_iconpicker').iconpicker('setIcon', $("#asset_icon").val());
	//图标显示

}


function generateAssetDesc() {//自动生成资产全名=名称+厂商+型号
	var combined_asset_desc;
	var trimed_name 	= trimStr($("#asset_name").val());
	var trimed_brand	= trimStr($("#brand").val());
	var trimed_model	= trimStr($("#model").val());
	combined_asset_desc = trimed_name;
	if (trimed_brand!="") {
		combined_asset_desc +="."+trimed_brand;
	}
	if (trimed_model!="") {
		combined_asset_desc +="."+trimed_model;
	}
	$("#asset_desc").val(combined_asset_desc);
}

function resetAssetName() { //自动生成资产铭牌号
	if($("#asset_name_rule").val()!="MANUAL") {
		$("#name").css("background-color","#efefef");
		$("#name").attr("readonly","true");

		switch($("#asset_name_rule").val())
		{
			case "ASSET":
			$("#name").val($("#asset_number").val());
			break;
			case "SN":
			$("#name").val($("#serial_number").val());
			break;
			case "VIN":
			$("#name").val($("#vin").val());
			break;
			case "ENGINE":
			$("#name").val($("#engine_num").val());
			break;
			case "OTHER":
			$("#name").val($("#tracking_number").val());
			break;
			default:
		}
	} else {
		$("#name").css("background-color","#fff");
		$("#name").attr("readonly","false");
	}
}


$(document).ready(function(){

	//加载图标选择器，从modules\HAT_Assets\js\editview_icon_picker.js
	SUGAR.util.doWhen("typeof icon_edit_init == 'function'", function(){
		icon_edit_init($("#asset_icon"));
	});

	$("#asset_desc").css("background-color","#efefef");
	$("#linear_length").css("background-color","#efefef");

	$("#asset_name,#brand,#model").change(function(){ //自动生成资产全名
		generateAssetDesc();
	});
	$("#asset_name_rule").change(function(){ //自动生成标签号
		resetAssetName();
	});
	$("#asset_number,#serial_number,#vin,#engine_num,#tracking_number").change(function(){ //自动生成标签号值
		resetAssetName();
	});

	$('#enable_vehicle_mgmt').change(function(){
		if( $(this).is(':checked')) {
			mark_field_enabled('vin');
			mark_field_enabled('engine_num');
		} else {
			mark_field_disabled('vin',true);
			mark_field_disabled('engine_num',true);
		}
	});


	$('#enable_linear').change(function(){ //针对是否启用线性资产，显示对应字段
		if( $(this).is(':checked')) {
			mark_field_enabled('linear_unit')
			mark_field_enabled('linear_start_measure')
			mark_field_enabled('linear_end_measure')
			$("#detailpanel_4").show();
		} else {
			mark_field_disabled('linear_unit')
			mark_field_disabled('linear_start_measure')
			mark_field_disabled('linear_end_measure')
			$("#detailpanel_4").hide();
		}
	});



	$("#linear_start_measure,#linear_end_measure").change(function(){ //自动计算线性长度
		//if ($.isNumeric($("#linear_start_measure").val())&&$.isNumeric($("#linear_end_measure").val())) {
			$("#linear_length").val($("#linear_end_measure").val()-$("#linear_start_measure").val())
		//};
	});

	SUGAR.util.doWhen("typeof mark_field_disabled == 'function'", function(){
		$('#enable_vehicle_mgmt').change();
		$('#enable_linear').change();
		$('#linear_start_measure').change();
	});


	//$("#detailpanel_2").switchClass("collapsed","expanded");

/*	SUGAR.util.doWhen("typeof $('#detailpanel_2') != 'undefined'", function(){
		//alert("expanded");
		$(".expandLink").click();
	})*/

});



