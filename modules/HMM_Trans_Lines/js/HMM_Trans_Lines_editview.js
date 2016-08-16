function getLovValueByText(focused_textfiled_id,list_Lov_id) { //根据LOV的Text，转为Value标准功能有BUG，返回的只能是TEXT
	var LovValue, LovText;
	LovText = $("#"+focused_textfiled_id).val();
	LovValue = $("#"+list_Lov_id+" option").filter(function() {return $(this).html() == LovText;}).val();
	return LovValue;
}

function setEventTypePopupReturn(popupReplyData){
	set_return(popupReplyData);
	$("#trans_basic_type").val(getLovValueByText("trans_basic_type","trans_basic_type_lov"));
	setEventTypeForm();//不同的EventType会需要更新不同的界面字段。根据出入移发而不同
}

function setInventoryItemPopupReturn(popupReplyData){
	set_return(popupReplyData);
	//将返回的文字描述转为CODE
	$("#secondary_unit_defaulting").val(getLovValueByText("secondary_unit_defaulting","secondary_unit_defaulting_lov"));
	$("#tracking_uom").val(getLovValueByText("tracking_uom","tracking_uom_lov"));

	if ($("#secondary_uom").val()!="") { //如果当前物料存在辅助单位
		mark_field_enabled("secondary_qty");
		mark_field_enabled("secondary_uom");
		getUOMConversion($("#secondary_uom_id").val(),$("#primary_uom_id").val(),$("#item_id").val());
		//通过Ajax得到当前物料的UOM换算率

	} else { //如果当前物料不存在辅助单位
		mark_field_disabled("secondary_qty");
		mark_field_disabled("secondary_uom");
	}
	//通过Ajax来确定物料的单位，以及单位换算
}

function settoLocatorPopupReturn(popupReplyData){
	set_return(popupReplyData);
	$("#to_locator_control").val(getLovValueByText("to_locator_control","locator_control_lov"));
	setLocatorFields();
}
function setfromLocatorPopupReturn(popupReplyData){
	set_return(popupReplyData);
	$("#from_locator_control").val(getLovValueByText("from_locator_control","locator_control_lov"));
	setLocatorFields();
}


function mark_field_hidden(field_name) {
	$("#"+field_name).css("visibility","hidden");
	$("#"+field_name+"_label").css("visibility","hidden");
}

function mark_field_disabled(field_name) {
	mark_obj = $("#"+field_name);
	mark_obj.attr("style","color:#efefef;background-Color:#efefef;");
	mark_obj.attr("readonly",true);
	$("#"+field_name+"_label").attr("style","color:#aaaaaa;text-decoration:line-through");

	if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
		removeFromValidate('EditView',field_name); //去除必须验证
	}
	$("#"+field_name+"_label .required").hide();

	if  (typeof $("#btn_"+field_name)!= 'undefined') {
		$("#btn_"+field_name).attr("style","visibility:hidden");
	}
	if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {
		$("#btn_clr_"+field_name).attr("style","visibility:hidden");
	}
	//消除已经填写的数据
	$("#"+field_name).val("");
	if  (typeof $("#"+field_name+"_id")!= 'undefined') {
		$("#"+field_name+"_id").val("");
	}
}

function mark_field_enabled(field_name) {
	$("#"+field_name).attr("style","color:#000000:background-Color:#ffffff");
	$("#"+field_name).attr("readonly",false);
	$("#"+field_name+"_label").attr("style","color:#000000;text-decoration:none;")

	addToValidate('EditView', field_name,'varchar', 'true', $("#"+field_name+"_label").text());//将当前字段标记为必须验证
	//打上必须星标
	if  ($("#"+field_name+"_label .required").text()!='*') {//如果没有星标，则打上星标
		$("#"+field_name+"_label").html($("#"+field_name+"_label").text()+"<span class='required'>*</span>");//打上星标
	} else {//如果已经有星标了，则显示出来
		$("#"+field_name+"_label .required").show();
	}

	if  (typeof $("#btn_"+field_name)!= 'undefined') {//移除选择按钮
		$("#btn_"+field_name).attr("style","visibility:visible");
	}
	if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {//移除清空按钮
		$("#btn_clr_"+field_name).attr("style","visibility:visible");
	}
}

function setLocatorFields() {
	if ($("#from_locator_control").val()=="LOCATOR") {
	//启用了货位控制，显示货位
		mark_field_enabled("from_locator");
	} else {
	//停用货位
		mark_field_disabled("from_locator");
	};
	if ($("#to_locator_control").val()=="LOCATOR") {
	//启用了货位控制，显示货位
		mark_field_enabled("to_locator");
	} else {
	//停用货位
		mark_field_disabled("to_locator");
	};
}


function setEventTypeForm() {
	var basic_evert_type = $("#trans_basic_type").val();
	var event_type = $("#event_type").val();

	//alert(basic_evert_type);

	if (event_type=="") {
		basic_evert_type="";
	} else {
		$("#event_type_desc").text($("#trans_basic_type").find('option:selected').text());
	}
	switch (basic_evert_type) {
		case "INV_IN": //入库时
			$("#from_locator_control").val("");
		    mark_field_disabled("from_location");
		    mark_field_enabled("to_location");
		    setLocatorFields();
		    mark_field_disabled("hmm_mo_request");
		    mark_field_disabled("ham_woop");
		    break;
	    case "INV_OUT": //出库
			$("#to_locator_control").val("");
		    mark_field_enabled("from_location");
			setLocatorFields()
		    mark_field_disabled("to_location");
		    mark_field_disabled("hmm_mo_request");
		    mark_field_disabled("ham_woop");
		    break;
	 	case "INV_TRANSFER":  //移库
		    mark_field_enabled("from_location");
		    mark_field_enabled("to_location");
		    setLocatorFields()
		    mark_field_disabled("hmm_mo_request");
		    mark_field_disabled("ham_woop");
		    break;
	 	case "INV_WO"://发料
			$("#to_locator_control").val("");
		    mark_field_enabled("from_location");
			setLocatorFields()
		    mark_field_disabled("to_location");
		    mark_field_disabled("hmm_mo_request");
		    mark_field_enabled("ham_woop");
		    break;
	    default:
	    	$("#from_locator_control").val("");
	    	$("#to_locator_control").val("");
	    	mark_field_disabled("from_location");
		    mark_field_disabled("to_location");
		    mark_field_disabled("hmm_mo_request");
		    mark_field_disabled("ham_woop");
		    break;
    }
    setLocatorFields();
}

function getUOMConversion(s_uom_id, d_uom_id, product_id) {
$.ajax({//读取子地点
		url: 'index.php?to_pdf=true&module=HAA_UOM_Conversions&action=getConversion&s_uom_id=' + s_uom_id + "&d_uom_id="+ d_uom_id+ "&product_id="+ product_id,
		//dataType: "json",
		success: function (data) {
			//console.log('index.php?to_pdf=true&module=HAA_UOM_Conversions&action=getConversion&s_uom_id=' + s_uom_id + "&d_uom_id="+ d_uom_id+ "&product_id="+ product_id);
			var obj = jQuery.parseJSON(data);
			//console.log(obj.conversion);
			$("#uom_conversion").val(parseFloat(obj.conversion));
		},
		error: function () { //失败
			alert('Error loading document');
		}
	});
}


$(document).ready(function(){
	$("#detailpanel_4").attr("style","display:none");
	//自动编号字段
	if($("#name").val()=="") {
        $("#name").after(SUGAR.language.get('HMM_Trans_Lines', 'LBL_AUTONUM'));
        $("#name").val("TBD")
        $("#name").hide();
	} else {
        $("#name").after($("#name").val());
        $("#name").hide();
    }

    //trans_basic_type是基础的事件类型，由出入转发四种构成
    //将基础事件类型先隐藏，在后台进行判断
    $("#event_type").parent().append('<span class="input_desc" id="event_type_desc"></span>')
    setEventTypeForm();


	$("#btn_clr_event_type").on('click', function() { //消除事务处理类型后需要将关联的字段还原
	    $("#event_type").val("");
	    $("#hat_event_type_id").val("");
	    $("#trans_basic_type").val("");
	    $("#event_type_desc").html("");
		setEventTypeForm();//直接引用，自动还原
	});
	$("#btn_clr_from_location").on('click', function() { //消除位置后，需要关联的消除货位
	    $("#from_location").val("");
	    $("#from_location_id").val("");
	    $("#from_locator_control").val("");
		setLocatorFields();//直接引用，自动还原
	});
	$("#btn_clr_to_location").on('click', function() { //消除位置后，需要关联的消除货位
	    $("#to_location").val("");
	    $("#to_location_id").val("");
	    $("#to_locator_control").val("");
		setLocatorFields();//直接引用，自动还原
	});

	$("#primary_qty").on('change', function() { //输入完主数量后，自动更新辅助数量
		var primary_qty = parseFloat($("#primary_qty").val());
		var defaulting_mode = $("#secondary_unit_defaulting").val();
		if (defaulting_mode=="FIXED" || (defaulting_mode=="DEFAULT" & $("#secondary_qty").val()=="")) {
		//默认规则=FIXED在任意情况下都保持两个字段同步，DEFAULT只有在另一字段为空时才会同步
			$("#primary_qty").val(primary_qty);
			$("#secondary_qty").val(primary_qty*$("#uom_conversion").val());
		}
	});


	$("#secondary_qty").on('change', function() { //输入完主数量后，自动更新辅助数量
		var secondary_qty =parseFloat($("#secondary_qty").val());
		var defaulting_mode = $("#secondary_unit_defaulting").val();
		if (defaulting_mode=="FIXED" || (defaulting_mode=="DEFAULT" & $("#primary_qty").val()=="")) {
		//默认规则=FIXED在任意情况下都保持两个字段同步，DEFAULT只有在另一字段为空时才会同步
			$("#secondary_qty").val(secondary_qty);
			$("#primary_qty").val(secondary_qty/$("#uom_conversion").val());
		}
	});

});