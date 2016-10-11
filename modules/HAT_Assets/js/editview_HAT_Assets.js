$.getScript("modules/HAA_FF/ff_include.js");
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
	triger_setFF($("#haa_ff_id").val(),"HAT_Assets")
	$(".expandLink").click();
	$('#target_iconpicker').iconpicker('setIcon', $("#asset_icon"));
	//图标显示

}
function setOwningOrgPopupReturn(popupReplyData){//选择完所属组织的动作
	set_return(popupReplyData);
	$("#owning_person").val("");//因为组织变化了，对应的人员也一定会变化，因此将人员字段清空后，手工重新选择。
	$("#owning_person_id").val("");
}
function setUsingOrgPopupReturn(popupReplyData){//选择完使用组织的动作
	set_return(popupReplyData);
	$("#using_person").val("");//因为组织变化了，对应的人员也一定会变化，因此将人员字段清空后，手工重新选择。
	$("#using_person_id").val("");
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
	
	if($('#haa_ff_id').length==0) {//如果对象不存在就添加一个
		$("#EditView").append('<input id="haa_ff_id" name="haa_ff_id" type=hidden>');
	};

    //触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
        triger_setFF($("#haa_ff_id").val(),"HAT_Assets")
		$(".expandLink").click();
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

	$('#enable_vehicle_mgmt').change(function(){//针对是否启用车辆管理，显示对应字段
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

	$('#enable_fa').change(function(){ //针对是否对固定资产进行同步，决定了是否必须要提供固定资产编号字段
		if( $(this).is(':checked')) {
			//如果启用固定资产同步则必须有固定资产信息
			mark_field_enabled('fixed_asset',false);
		} else {
			//如果没有启用固定资产同步，则显示固定资产字段（不隐藏），但可以不必须输入
			//为防止出错，先加上必须输入的验证，再去除。
			mark_field_enabled('fixed_asset',true);
		}
	});

	$("#linear_start_measure,#linear_end_measure").change(function(){ //自动计算线性长度
		//if ($.isNumeric($("#linear_start_measure").val())&&$.isNumeric($("#linear_end_measure").val())) {
			$("#linear_length").val($("#linear_end_measure").val()-$("#linear_start_measure").val())
		//};
	});


/*	var isgv = $("#use_location_gis").attr("checked");
	if(isgv == 'checked'){
		$("#map_type").closest('td').toggle();
		$("#map_type_label").toggle();
	}
	$("[name=use_location_gis]").click(function () {
			 var crval = $(this).attr("checked");
			if(crval == 'checked'){
				$(this).attr("checked",false);
			}else{
				$(this).attr("checked",true);
			}
			$("#map_type").closest('td').toggle();
			$("#map_type_label").toggle();

		}
	);*/
	$("#use_location_gis").change(function(){
		$("#map_type select").val("NONE");//set seleted by value
		if(document.getElementById('use_location_gis').checked){
			//如果当前资产跟随地点的GIS信息，则不显示地图类型字段。
			mark_field_disabled('map_type');//基于HAA_FF/ff_include.js
		} else {
			//如果资产没有启用跟随地点的GIS信息，则可以在资产层定义，因此显示出当前的地图类型字段@20160825 ToneyWu
			mark_field_enabled('map_type');
		}

		SUGAR.util.doWhen("typeof initMap == 'function'", function(){
			//确保HAT_Asset_Locations中的JS加载完成
			$("#map_type").trigger("change");//基于地图类型，对面板进行初始化
		});
	});


	SUGAR.util.doWhen("typeof mark_field_disabled == 'function'", function(){
		$('#enable_vehicle_mgmt').change();
		$('#enable_linear').change();
		$('#linear_start_measure').change();
		$("#use_location_gis").change();
		$('#enable_fa').change();
	});



});



