// $.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");
var prodln = 0;
var currentLine=0;
if (typeof sqs_objects == 'undefined') {
	var sqs_objects = new Array;
}

if (typeof(YAHOO.SUGAR) == 'undefined') {
	$.getScript("include/javascript/sugarwidgets/SugarYUIWidgets.js");
}
$.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");

//补齐两位数  
function padleft0(obj) {  
	return obj.toString().replace(/^[0-9]{1}$/, "0" + obj);  
} 
		
function getnowtime() {
		var nowtime = new Date();
		var year = nowtime.getFullYear();
		var month = padleft0(nowtime.getMonth() + 1);
		var day = padleft0(nowtime.getDate());
		var hour = padleft0(nowtime.getHours());
		var minute = padleft0(nowtime.getMinutes());
		var second = padleft0(nowtime.getSeconds());
		var millisecond = nowtime.getMilliseconds(); millisecond = millisecond.toString().length == 1 ? "00" + millisecond : millisecond.toString().length == 2 ? "0" + millisecond : millisecond;
		return year + "-" + month + "-" + day + " " + hour + ":" + minute ;//+ ":" + second + "." + millisecond;
}
		
function openDateStart(ln){
	var Datetimepicker=$('#span_line_date_start'+ln);
	//console.log(Datetimepicker);
	Datetimepicker.val(getnowtime());
	var start_date = getnowtime();
	var dateformat="Y-m-d H:M";
	var newDate = new Date();
	var t       = newDate.toJSON(); 
	dateformat = dateformat.replace(/Y/,"yyyy");
	dateformat = dateformat.replace(/m/,"mm");
	dateformat = dateformat.replace(/d/,"dd");
	dateformat = dateformat.replace(/H/,"hh");
	dateformat = dateformat.replace(/M/,"ii");
	//Datetimepicker.datetimepicker('setStartDate',start_date);
	Datetimepicker.datetimepicker({
		language: 'en_us',
		format: dateformat,
		showMeridian: true,
		startView: 1,
		todayHighlight: 1,
		todayBtn: true,
		autoclose: true,
		startDate:new Date(t),
	});
	
	/*var Datetimepicker2 =$('#line_date_start_date');
	Datetimepicker2.datetimepicker({
		language: 'en_us',
		format: dateformat,
		showMeridian: true,
		startView: 1,
		todayHighlight: 1,
		todayBtn: true,
		autoclose: true,
		startDate:new Date(t),
	});*/
}
/**
 * 点击失效的checkbox
 * @param {} selectIn
 */
function selectedLine(selectIn){
	
	if($("#line_enable_action"+selectIn).is(':checked')){
		$("#line_enable_action"+selectIn).prop("checked",'true');
		$("#line_status"+selectIn).val("UNEFFECTIVE");
		$("#line_status_dis"+selectIn).val(SUGAR.language.get('HIT_IP_TRANS', 'LBL_EFFICACY'));
		var mydate = new Date();
  		var currentDate=mydate.toLocaleString();
		$("#line_date_end"+selectIn).val(getnowtime());
		$("#line_enable_action"+selectIn).val('1');
		$("#line_enable_action_val"+selectIn).val('1');
        $("#displayed_line_enable_action"+selectIn).attr("checked",true);
        $("#displayed_line_enable_action"+selectIn).prop("checked",true);
        document.getElementById("displayed_line_enable_action"+selectIn).checked = true;
	}else{
		$("#line_enable_action"+selectIn).removeAttr("checked");
		$("#line_date_end"+selectIn).val(null);
		$("#line_status"+selectIn).val("EFFECTIVE");
		$("#line_status_dis"+selectIn).val(SUGAR.language.get('HIT_IP_TRANS', 'LBL_EFFECTIVE'));

        $("#displayed_line_enable_action"+selectIn).removeAttr("checked");
        $("#line_enable_action"+selectIn).val('0');
        $("#line_enable_action_val"+selectIn).val('0');
	}
	
}


/**
 * 设置必输 TODO：确认本函数能否删除，在include.js中有公共的函数
 */
/*function mark_field_enabled(field_name, not_required_bool) {
	// field_name = 字段名，不需要jquery select标志，直接写名字
	// not_required_bool如果为空或没有明确定义为true的话，字段为必须输入。如果=true则为非必须
	// alert(not_required_bool);
	$("#" + field_name).css({
				"color" : "#000000",
				"background-Color" : "#ffffff"
			});
	$("#" + field_name).attr("readonly", false);
	$("#" + field_name + "_label").css({
				"color" : "#000000",
				"text-decoration" : "none"
			})

	if (typeof not_required_bool == "undefined" || not_required_bool == false
			|| not_required_bool == "") {
		addToValidate('EditView', field_name, 'varchar', 'true', $("#"
						+ field_name + "_label").text());// 将当前字段标记为必须验证
		// 打上必须星标
		if ($("#" + field_name + "_label .required").text() != '*') {// 如果没有星标，则打上星标
			$("#" + field_name + "_label").html($("#" + field_name + "_label")
					.text()
					+ "<span class='required'>*</span>");// 打上星标
		} else {// 如果已经有星标了，则显示出来
			$("#" + field_name + "_label .required").show();
		}
		// $("#"+field_name+"_btn").remove();
	} else { // 如果不是必须的，则不显示星标
		// 直接Remove有时会出错，所有先设置为Validate再Remove
		addToValidate('EditView', field_name, 'varchar', 'true', $("#"
						+ field_name + "_label").text());
		removeFromValidate('EditView', field_name);
		// 去除必须验证
		$("#" + field_name + "_label .required").hide();
	}
	if (typeof $("#btn_" + field_name) != 'undefined') {// 移除选择按钮
		$("#btn_" + field_name).css({
					"visibility" : "visible"
				});
	}
	if (typeof $("#btn_clr_" + field_name) != 'undefined') {// 移除清空按钮
		$("#btn_clr_" + field_name).css({
					"visibility" : "visible"
				});
	}
}*/
function openHitIpPopup(ln) {// 本文件为行上选择IP按钮
	lineno = ln;
	currentLine=ln;
	var popupRequestData = {
		"call_back_function" : "setHitIpReturn",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"id" : "line_hit_ip_subnets_id" + ln,
			"name" : "line_hit_ip_subnets" + ln,
			"parent_hit_ip" : "line_parent_ip"+ln,
			"ip_netmask" : "line_mask" + ln,
			"gateway" : "line_gateway" + ln,
			"ip_lowest" : "line_low_associated_ip" + ln,
			"ip_highest" : "line_high_associated_ip" + ln
		}
	};
	console.log("当前行号="+currentLine);
	if($("#line_hit_ip_subnets"+ln).val()==""){
	    var popupFilter = '&current_mode=rack';
	   open_popup('HIT_IP_Subnets', 600, 850, popupFilter, true, true, popupRequestData, "MultiSelect", true);
	
	}else{
	    var popupFilter = '&current_mode=rack';
	    open_popup('HIT_IP_Subnets', 600, 850, popupFilter, true, true, popupRequestData);
	}
}

function openCabinetPopup(ln) {// 本文件为行上选择机柜的按钮
	lineno = ln;
	var popupRequestData = {
		"call_back_function" : "setCabinetReturn",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"id" : "line_hat_assets_cabinet_id" + ln,
			"name" : "line_hat_assets_cabinet" + ln
		}
	};
	//目前列表限制规则为，如果来源为工作单，则限制在本工作单范围内填写的设备，否则不限制
	//TODO:需要加上从EventType上的列表规则，现在设置的列表规则无效，都是在此写死的
  var popupFilter;
  var source_wo_id=$("#source_wo_id").val();
  var popupFilter = '&current_mode=rack&defualt_list='+global_eventOptions.default_asset_list.toLowerCase()+'&wo_id='+source_wo_id+'&haa_frameworks_id_advanced='+$("#haa_frameworks_id").val();
  open_popup('HAT_Assets', 1200, 850, popupFilter, true, true, popupRequestData);
	//open_popup('HIT_Racks', 600, 850, '', true, true, popupRequestData);

}

function setCabinetReturn(popupReplyData) {
	set_return(popupReplyData);
}

function openAssetPopup(ln) {// 本文件为行上选择资产的按钮
	lineno = ln;
	var popupRequestData = {
		"call_back_function" : "setAssetReturn",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"id" : "line_hat_assets_id" + ln,
			"name" : "line_hat_asset_name" + ln
		}
	};
	//目前列表限制规则为，如果来源为工作单，则限制在本工作单范围内填写的设备，否则不限制
	//TODO:需要加上从EventType上的列表规则，现在设置的列表规则无效，都是在此写死的
  var popupFilter;
  var source_wo_id=$("#source_wo_id").val();
  var popupFilter = '&current_mode=it&defualt_list='+global_eventOptions.default_asset_list.toLowerCase()+'&wo_id='+source_wo_id+'&haa_frameworks_id_advanced='+$("#haa_frameworks_id").val();
  open_popup('HAT_Assets', 1200, 850, popupFilter, true, true, popupRequestData);
}


function setMainAssetReturn(popupReplyData) {
	set_return(popupReplyData);
}
function openMainAssetPopup(ln) {// 本文件为行上选择资产的按钮
	lineno = ln;
	var popupRequestData = {
		"call_back_function" : "setMainAssetReturn",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"id" : "line_main_asset_id" + ln,
			"name" : "line_main_asset" + ln
		}
	};
	open_popup('HAT_Assets', 600, 850, '', true, true, popupRequestData);
}

function setBackupAssetReturn(popupReplyData) {
	set_return(popupReplyData);
	// console.log(popupReplyData);
	// resetAsset(lineno);
}
function openBackupAssetPopup(ln) {// 本文件为行上选择资产的按钮
	lineno = ln;
	var popupRequestData = {
		"call_back_function" : "setBackupAssetReturn",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"id" : "line_backup_asset_id" + ln,
			"name" : "line_backup_asset" + ln
		}
	};
	open_popup('HAT_Assets', 600, 850, '', true, true, popupRequestData);
}

function setAssetReturn(popupReplyData) {
	set_return(popupReplyData);
	resetAsset(lineno);
}

/**
 * 接入设备(主)
 * @param {} ln
 */
function openAccessAssetNamePopup(ln) {// 本文件为行上选择资产的按钮
	lineno = ln;
	var popupRequestData = {
		"call_back_function" : "setAccessAssetNameReturn",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"id" : "line_access_assets_id" + ln,
			"name" : "line_access_assets_name" + ln
		}
	};
  var popupFilter;
  var source_wo_id=$("#source_wo_id").val();
  var popupFilter = '&current_mode=it&defualt_list='+global_eventOptions.default_asset_list.toLowerCase()+'&wo_id='+source_wo_id+'&haa_frameworks_id_advanced='+$("#haa_frameworks_id").val();
  open_popup('HAT_Assets', 1200, 850, popupFilter, true, true, popupRequestData);
}

function setAccessAssetNameReturn(popupReplyData) {
	set_return(popupReplyData);
}

/**
 * 接入设备(备)
 * @param {} ln
 */
function openAccessAssetBackupPopup(ln) {
	lineno = ln;
	var popupRequestData = {
		"call_back_function" : "setAccessAssetBackupNameReturn",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"id" : "line_access_assets_backup_id" + ln,
			"name" : "line_access_assets_backup_name" + ln
		}
	};
  open_popup('HAT_Assets', 1200, 850, '', true, true, popupRequestData);
}


function btnAddAllocLine(){
	var popupRequestData = {
		"call_back_function" : "setAddLineBtnReturn",
		"form_name" : "EditView",
		"field_to_name_array" : {
		}
	};
	
  var target_owning_org_id = $("#target_owning_org_id").val();
  var popupFilter = '&target_owning_org_id_advanced='+target_owning_org_id;
  open_popup('HIT_IP_Allocations', 1200, 850,popupFilter, true, true, popupRequestData, "MultiSelect", true);
}

function setAddLineBtnReturn(popupReplyData) {
	set_return(popupReplyData);
	//console.log(JSON.stringify(popupReplyData.selection_list));
	//console.log(popupReplyData);
	var idJson = popupReplyData.selection_list;
	for(var p in idJson){
		$.ajax({
			url:'index.php?to_pdf=true&module=HIT_IP_TRANS&action=syncHtmlPage&record='+idJson[p],
			//data:JSON.stringify(popupReplyData.selection_list),
			//type:"POST",
			success: function (msg) {
				//console.log($.parseJSON(msg));
				insertLineData($.parseJSON(msg));
			},
			error: function () { //失败
				alert('Error loading document');
			}
		});
	};
	
	// 设置行号
	resetLineNum_Bold();
	
	/*$.ajax({
			url:'index.php?to_pdf=true&module=HIT_IP_TRANS&action=syncHtmlPage&idArray='+idJson,
			//data:JSON.stringify(popupReplyData.selection_list),
			//type:"POST",
			
			success: function (msg) {
				console.log(msg);
			},
			error: function () { //失败
				alert('Error loading document');
			}
		});*/
}

function setAccessAssetBackupNameReturn(popupReplyData) {
	set_return(popupReplyData);
}



function setHitIpReturn(popupReplyData) {
	console.log("回调");
	if($("#line_hit_ip_subnets"+currentLine).val()==""){
	    console.log("generate_ip_line");
	    generate_ip_line(popupReplyData);
		markLineDeleted(currentLine, "line_");
	   $("#Trans_line_head").show();
	   LineEditorClose(currentLine);
	   console.log(popupReplyData)	
	}
	set_return(popupReplyData);
	
}




function generate_ip_line(popupReplyData) {
	var idJson = popupReplyData.selection_list;
	for(var p in idJson){
		$.ajax({
			url:'index.php?to_pdf=true&module=HIT_IP_TRANS&action=gernate_ip_record&record='+idJson[p],
			//data:JSON.stringify(popupReplyData.selection_list),
			//type:"POST",
			success: function (msg) {
				//console.log($.parseJSON(msg));
				insertLineData($.parseJSON(msg));
				resetLineNum_Bold();
			},
			error: function () { //失败
				alert('Error loading document');
			}
		});
	};
	
	// 设置行号
	resetLineNum_Bold();

}

function openOwningOrgPopup(ln) {
	lineno = ln;
	var popupRequestData = {
		"call_back_function" : "set_return",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"name" : "line_target_owning_org" + ln,
			"id" : "line_owning_org_id" + ln
		}
	};

	open_popup('Accounts', 1000, 850, '', true, true, popupRequestData);
}

function openUsingOrgPopup(ln) {
	lineno = ln;
	var popupRequestData = {
		"call_back_function" : "set_return",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"name" : "line_target_using_org" + ln,
			"id" : "line_using_org_id" + ln
		}
	};

	open_popup('Accounts', 1000, 850, '', true, true, popupRequestData);
}

function openOwningPersonPopup(ln) {
	lineno = ln;
	var popupRequestData = {
		"call_back_function" : "set_return",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"name" : "line_target_owning_person" + ln,
			"id" : "line_owning_person_id" + ln
		}
	};
	var popupFilter = '&account_locked=ture&account_name_advanced='
			+ $("#line_target_owning_org" + ln).val();
	open_popup('Contacts', 1000, 850, popupFilter, true, true, popupRequestData);
}

function openUsingPersonPopup(ln) {
	lineno = ln;
	var popupRequestData = {
		"call_back_function" : "set_return",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"name" : "line_target_using_person" + ln,
			"id" : "line_using_person_id" + ln
		}
	};
	var popupFilter = '&account_locked=ture&account_name_advanced='
			+ $("#line_target_using_org" + ln).val();
	open_popup('Contacts', 1000, 850, popupFilter, true, true, popupRequestData);
}

function openLocationPopup(ln) {
	lineno = ln;
	var popupRequestData = {
		"call_back_function" : "set_return",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"name" : "line_target_location" + ln,
			"location_title" : "line_target_location_desc" + ln,
			"id" : "line_hat_asset_locations_id" + ln
		}
	};
	open_popup('HAT_Asset_Locations', 1000, 850, '', true, true,
			popupRequestData);
}

function insertTransLineHeader(tableid) {
	$("#line_items_label").hide();// 隐藏SugarCRM字段
	// alert(SUGAR.language.get('HAT_Asset_Trans',
	// 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE'));

	tablehead = document.createElement("thead");
	tablehead.id = tableid + "_head";
	tablehead.style.display = "none";
	document.getElementById(tableid).appendChild(tablehead);

	var x = tablehead.insertRow(-1);
	x.id = 'Trans_line_head';
	var a = x.insertCell(0);
	a.innerHTML = '#';// SUGAR.language.get('HAT_Asset_Trans',
	// 'LBL_TRANS_STATUS');
	var b = x.insertCell(1);
	b.innerHTML = "<span id='line_parent_ip_title'>"
			+ SUGAR.language.get('HIT_IP_TRANS', 'LBL_PARENT_IP')
			+ "</span>";
	var b1 = x.insertCell(2);
	b1.innerHTML = "<span id='line_hit_ip_subnets_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_HIT_IP')+"</span>";
	var c = x.insertCell(3);
	c.innerHTML = "<span id='line_associated_ip_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_ASSOCIATED_IP')+"</span>";
	var d = x.insertCell(4);
	d.innerHTML = "<span id='line_mask_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_MASK')+"</span>";
	var e = x.insertCell(5);
	e.innerHTML = "<span id='line_gateway_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_GATEWAY')+"</span>";
	var j = x.insertCell(6);
	j.innerHTML = "<span id='line_hat_asset_name_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_HAT_ASSET_NAME')+"</span>";
	var p = x.insertCell(7);
	p.innerHTML = "<span id='line_access_assets_name_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_ACCESS_ASSETS_NAME')+"</span>";
	var p2 = x.insertCell(8);
	p2.innerHTML = "<span id='line_access_assets_backup_name_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_ACCESS_ASSETS_BACKUP_NAME')+"</span>";
	var g = x.insertCell(9);
	g.innerHTML = "<span id='line_port_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_PORT')+"</span>";
	var g2 = x.insertCell(10);
	g2.innerHTML = "<span id='line_port_backup_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_PORT_BACKUP')+"</span>";
	var f = x.insertCell(11);
	f.innerHTML = "<span id='line_bandwidth_type_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_BANDWIDTH_TYPE')+"</span>";
	var i = x.insertCell(12);
	i.innerHTML = "<span id='line_speed_limit_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_SPEED_LIMIT')+"</span>";
	var k = x.insertCell(13);
	k.innerHTML = "<span id='line_hat_assets_cabinet_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_CABINET')+"</span>";
	var l = x.insertCell(14);
	l.innerHTML = "<span id='line_monitoring_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_MONITORING')+"</span>";
	var l2 = x.insertCell(15);
	l2.innerHTML = "<span id='line_monitoring_backup_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_MONITORING_BACKUP')+"</span>";
	var o = x.insertCell(16);
	o.innerHTML = "<span id='line_mrtg_link_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_MRTG_LINK')+"</span>";
	var m = x.insertCell(17);
	m.innerHTML = "<span id='line_channel_num_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_CHANNEL_NUM')+"</span>";
	var m2 = x.insertCell(18);
	m2.innerHTML = "<span id='line_channel_num_backup_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_CHANNEL_NUM_BACKUP')+"</span>";
	var n = x.insertCell(19);
	n.innerHTML = "<span id='line_channel_content_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_CHANNEL_CONTENT')+"</span>";
	var n = x.insertCell(20);
	n.innerHTML = "<span id='line_channel_content_backup_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_CHANNEL_CONTENT_BACKUP')+"</span>";
	var n3 = x.insertCell(21);
	n3.innerHTML = "<span id='line_date_start_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_DATE_START')+"</span>";
	var n4 = x.insertCell(22);
	n4.innerHTML = "<span id='line_date_end_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_DATE_END')+"</span>";
	var n3 = x.insertCell(23);
	n3.innerHTML = "<span id='line_enable_action_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_ENABLE_ACTION')+"</span>";
	var n2 = x.insertCell(24);
	n2.innerHTML = "<span id='line_status_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_STATUS')+"</span>";
	var n3 = x.insertCell(25);
	n3.innerHTML = "<span id='line_broadband_type_title'>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_BROADBAND_TYPE')+"</span>";

}

function insertLineData(asset_trans_line) { // 将数据写入到对应的行字段中
	var ln = 0;
	if (asset_trans_line.id != '0' && asset_trans_line.id !== '') {
		ln = insertTransLineElements("lineItems");
		// alert(asset_trans_line.hit_ip_subnets);
		var ip_splited = asset_trans_line.hit_ip_subnets.split("/");
		SUGAR.util.doWhen("typeof IpSubnetCalculator != 'undefined'",
				function() {
					if (IpSubnetCalculator.isIp(ip_splited[0])
							&& ip_splited[1] <= 32 && ip_splited[1] >= 0) {
						var ip_caled = IpSubnetCalculator.calculateSubnetMask(
								ip_splited[0], ip_splited[1]);
						var associated_ip = ip_caled.ipLowStr + "~"
								+ ip_caled.ipHighStr;
						// 显示IP细节信息，由IpSubnetCalculator.js完成算法
						$("#line_associated_ip" + ln).html(associated_ip);
					}
				});
		$("#line_parent_ip".concat(String(ln))).val(asset_trans_line.parent_ip);
		$("#line_hit_ip_subnets".concat(String(ln)))
				.val(asset_trans_line.hit_ip_subnets);
		// $("#line_associated_ip".concat(String(ln))).val(asset_trans_line.associated_ip);

		$("#line_mask".concat(String(ln))).val(asset_trans_line.ip_netmask);
		$("#line_gateway".concat(String(ln))).val(asset_trans_line.gateway);
		$("#line_bandwidth_type".concat(String(ln)))
				.val(asset_trans_line.bandwidth_type);
		$("#line_port".concat(String(ln))).val(asset_trans_line.port);
		$("#line_speed_limit".concat(String(ln)))
				.val(asset_trans_line.speed_limit);
		$("#line_hat_asset_name".concat(String(ln)))
				.val(asset_trans_line.hat_asset_name);
		$("#line_hit_ip_subnets_id".concat(String(ln)))
				.val(asset_trans_line.hit_ip_subnets_id);
		$("#line_id".concat(String(ln))).val(asset_trans_line.id);
		$("#line_hat_assets_cabinet_id".concat(String(ln)))
				.val(asset_trans_line.hat_assets_cabinet_id);
		$("#line_hat_assets_cabinet".concat(String(ln)))
				.val(asset_trans_line.hat_assets_cabinet);
		$("#line_channel_content".concat(String(ln)))
				.val(asset_trans_line.channel_content);
		$("#line_channel_num".concat(String(ln)))
				.val(asset_trans_line.channel_num);
		$("#line_monitoring".concat(String(ln)))
				.val(asset_trans_line.monitoring);
		$("#line_mrtg_link".concat(String(ln))).val(asset_trans_line.mrtg_link);
		$("#line_access_assets_name".concat(String(ln)))
				.val(asset_trans_line.access_assets_name);
		$("#line_source_ref".concat(String(ln)))
				.val(asset_trans_line.source_ref);
		$("#line_hat_assets_id".concat(String(ln)))
				.val(asset_trans_line.hat_assets_id);
		$("#line_access_assets_id".concat(String(ln)))
				.val(asset_trans_line.access_assets_id);
		$("#line_access_assets_backup_name".concat(String(ln))).val(asset_trans_line.access_assets_backup_name);
		$("#line_access_assets_backup_id".concat(String(ln))).val(asset_trans_line.access_assets_backup_id);
	    $("#line_status".concat(String(ln))).val(asset_trans_line.status);
	    $("#line_port_backup".concat(String(ln))).val(asset_trans_line.port_backup);
	    $("#line_monitoring_backup".concat(String(ln))).val(asset_trans_line.monitoring_backup);
	    $("#line_channel_content_backup".concat(String(ln))).val(asset_trans_line.channel_content_backup);
	    $("#line_channel_num_backup".concat(String(ln))).val(asset_trans_line.channel_num_backup);
	    $("#line_date_start".concat(String(ln))).val(asset_trans_line.date_start);
	    $("#line_date_end".concat(String(ln))).val(asset_trans_line.date_end);
	    $("#line_enable_action".concat(String(ln))).val(asset_trans_line.enable_action);
		$("#line_enable_action_val".concat(String(ln))).val(asset_trans_line.enable_action);
		$("#line_broadband_type".concat(String(ln))).val(asset_trans_line.broadband_type);
	    
	    if($("#line_status"+ln).val()=="EFFECTIVE"){
	  	  $("#line_status_dis"+ln).val(SUGAR.language.get('HIT_IP_TRANS',"LBL_EFFECTIVE"));
	    }else if($("#line_status"+ln).val()=="UNEFFECTIVE"){
	  	  $("#line_status_dis"+ln).val(SUGAR.language.get('HIT_IP_TRANS',"LBL_EFFICACY"));
	    } 
	    
	    if($("#line_enable_action"+ln).val()=="1"){
  	 	 $("#line_enable_action"+ln).attr("checked",true);
     	 $("#line_enable_action"+ln).prop("checked",true);
      	 document.getElementById("displayed_line_enable_action"+ln).checked = true;
 		 }else{
  			 $("#line_enable_action"+ln).removeAttr("checked");
 		 } 
	    
	    
		renderTransLine(ln);
		single_changeRequired(lineData,ln);	
	}
}
$(document).ready(function(){
	var newDate = new Date();
	var t       = newDate.toJSON(); 
	var dateformat="Y-m-d H:M";
	dateformat = dateformat.replace(/Y/,"yyyy");
	dateformat = dateformat.replace(/m/,"mm");
	dateformat = dateformat.replace(/d/,"dd");
	dateformat = dateformat.replace(/H/,"hh");
	dateformat = dateformat.replace(/M/,"ii");
	
	
	$('.form_datetime').datetimepicker({
    //精确到分的时间
    format: dateformat,
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    //showMeridian: 1,
    minuteStep : 1,
	startDate:new Date(t),
});
	
	
	
	
});
function insertTransLineElements(tableid) { // 创建界面要素
// 包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面
	if (document.getElementById(tableid + '_head') !== null) {
		document.getElementById(tableid + '_head').style.display = "";
	}
	sqs_objects["hit_ip_subnets[" + prodln + "]"] = {
		"form" : "EditView",
		"method" : "query",
		"modules" : ["HIT_IP_TRANS"],
		"group" : "or",
		"field_list" : ["name", "id"],
		"populate_list" : [
				"hit_ip_subnets_id[" + prodln + "]",
				"line_hat_assets_hat_asset_transhat_assets_ida[" + prodln + "]",
				"line_name[" + prodln + "]",
				"line_target_asset_status[" + prodln + "]",
				"line_target_organization[" + prodln + "]"],
		"required_list" : ["hit_ip_subnets_id[" + prodln + "]"],
		"conditions" : [{
					"name" : "name",
					"op" : "like_custom",
					"end" : "%",
					'begin' : '%',
					"value" : ""
				}],
		"order" : "name",
		"limit" : "30",
		"post_onblur_function" : "resetAsset(" + prodln + ");",
		"no_match_text" : "No Match"
	};

	sqs_objects["line_hat_asset_name[" + prodln + "]"] = {
		"form" : "EditView",
		"method" : "query",
		"modules" : ["HAT_Assets"],
		"group" : "or",
		"field_list" : ["name", "id"],
		"populate_list" : ["line_hat_asset_name[" + prodln + "]",
				"line_hat_asset_id[" + prodln + "]"],
		"required_list" : ["line_hat_asset_id[" + prodln + "]"],
		"conditions" : [{
					"name" : "name",
					"op" : "like_custom",
					"end" : "%",
					'begin' : '%',
					"value" : ""
				}],
		"order" : "name",
		"limit" : "30",
		// "post_onblur_function": "resetAsset(" + prodln + ");",
		"no_match_text" : "No Match"
	};

	tablebody = document.createElement("tbody");
	tablebody.id = "line_body" + prodln;
	document.getElementById(tableid).appendChild(tablebody);

	var z1 = tablebody.insertRow(-1);
	z1.id = 'asset_trans_line1_displayed' + prodln;
	z1.className = 'oddListRowS1';
	z1.innerHTML = 
	"<td><span name='displayed_line_num[" + prodln+ "]' id='displayed_line_num" + prodln + "'>1</span></td>"+ 
	"<td><span name='displayed_line_parent_ip[" + prodln+ "]' id='displayed_line_parent_ip" + prodln + "'></span></td>"+
	"<td><span name='displayed_line_hit_ip_subnets[" + prodln+ "]' id='displayed_line_hit_ip_subnets" + prodln+ "'></span></td>"+
	"<td><span name='displayed_line_associated_ip[" + prodln+ "]' id='displayed_line_associated_ip" + prodln + "'></span></td>"
			+ "<td><span name='displayed_line_mask[" + prodln+ "]' id='displayed_line_mask" + prodln + "'></span></td>"
			+ "<td><span name='displayed_line_gateway[" + prodln+ "]' id='displayed_line_gateway" + prodln + "'></span></td>"
			+ "<td><span name='displayed_line_hat_asset_name[" + prodln+ "]' id='displayed_line_hat_asset_name" + prodln+ "'></span></td>"
			+ "<td><span name='displayed_line_access_assets_name[" + prodln+ "]' id='displayed_line_access_assets_name" + prodln+ "'></span></td>" 
			+ "<td><span name='displayed_line_access_assets_backup_name[" + prodln+ "]' id='displayed_line_access_assets_backup_name" + prodln+ "'></span></td>"
			+ "<td><span name='displayed_line_port["+ prodln + "]' id='displayed_line_port" + prodln + "'></span></td>"
			+ "<td><span name='displayed_line_port_backup["+ prodln + "]' id='displayed_line_port_backup" + prodln + "'></span></td>"
			+ "<td><span name='displayed_line_bandwidth_type[" + prodln+ "]' id='displayed_line_bandwidth_type" + prodln+ "'></span></td>" 
			+ "<td><span name='displayed_line_speed_limit["+ prodln + "]' id='displayed_line_speed_limit" + prodln+ "'></span></td>"
			+ "<td><span name='displayed_line_hat_assets_cabinet[" + prodln+ "]' id='displayed_line_hat_assets_cabinet" + prodln+ "'></span></td>" 
			+ "<td><span name='displayed_line_monitoring["+ prodln + "]' id='displayed_line_monitoring" + prodln+ "'></span></td>"
			+ "<td><span name='displayed_line_monitoring_backup["+ prodln + "]' id='displayed_line_monitoring_backup" + prodln+ "'></span></td>"
			+ "<td><span name='displayed_line_mrtg_link["+ prodln+ "]' id='displayed_line_mrtg_link"+ prodln+ "'></span></td>"
			+ "<td><span name='displayed_line_channel_num["+ prodln+ "]' id='displayed_line_channel_num"+ prodln+ "'></span></td>"
			+ "<td><span name='displayed_line_channel_num_backup["+ prodln+ "]' id='displayed_line_channel_num_backup"+ prodln+ "'></span></td>"
			+ "<td><span name='displayed_line_channel_content["+ prodln+ "]' id='displayed_line_channel_content"+ prodln+ "'></span></td>"
			+ "<td><span name='displayed_line_channel_content_backup["+ prodln+ "]' id='displayed_line_channel_content_backup"+ prodln+ "'></span></td>"
			+ "<td><span name='displayed_line_date_start["+ prodln+ "]' id='displayed_line_date_start"+ prodln+ "'></span></td>"
			+ "<td><span name='displayed_line_date_end["+ prodln+ "]' id='displayed_line_date_end"+ prodln+ "'></span></td>"
			+"<td><input type='checkbox' disabled='true'  name='displayed_line_enable_action[" + prodln + "]' id='displayed_line_enable_action" + prodln + "'></input></td>"
			+ "<td><span name='displayed_line_status["+ prodln+ "]' id='displayed_line_status"+ prodln+ "'></span></td>"
			+ "<td><span name='displayed_line_broadband_type["+ prodln+ "]' id='displayed_line_broadband_type"+ prodln+ "'></span></td>"
			+"<td><input type='button' value='"+ SUGAR.language.get('app_strings', 'LBL_EDITINLINE')
			+"' class='button'  id='btn_edit_line" + prodln+ "' onclick='LineEditorShow(" + prodln + ")'></td>";
	var z2 = tablebody.insertRow(-1);
	z2.id = 'asset_trans_line2_displayed' + prodln;

	var x = tablebody.insertRow(-1); // 以下生成的是Line Editor
	x.id = 'asset_trans_editor' + prodln;
	x.style = "display:none";
	x.innerHTML = "<td colSpan='12'><div class='lineEditor'>"
			+
			// C段
			"<span class='input_group'>"
			+ "<label>"
			+ "C段"
			+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_parent_ip["
			+ prodln
			+ "]' id='line_parent_ip"
			+ prodln
			+ "' readonly='readonly' maxlength='50' value='' title=''>"
			+ "</span>"
			+

			// 网段
			"<span class='input_group'>"
			+ "<label>"
			+ "网段"
			+ "<span class='required'>*</span></label>"
			+
			// 网段Lov描述
			"<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_hit_ip_subnets["
			+ prodln
			+ "]' id='line_hit_ip_subnets"
			+ prodln
			+ "' value='' title='' onblur='resetAsset("
			+ prodln
			+ ")'>"
			+
			// Lov的Id
			"<input type='hidden' name='line_hit_ip_subnets_id["
			+ prodln
			+ "]' id='line_hit_ip_subnets_id"
			+ prodln
			+ "' value=''>"
			+
			// Lov窗口
			"<button id='btn_line_hit_ip_subnets"
			+ prodln
			+ "' title='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE')
			+ "' accessKey='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY')
			+ "' type='button' tabindex='116' class='button' value='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "' name='btn1' onclick='openHitIpPopup("
			+ prodln
			+ ");'><img src='themes/default/images/id-ff-select.png' alt='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "'></button>"
			+ "</span>"
			+
			// 可用IP
			"<span class='input_group'>"
			+ "<label id='line_associated_ip"
			+ prodln
			+ "_label'>"
			+ "可用IP"
			+ "</label>"
			+ "<input style=' width:200px;' type='text' name='line_associated_ip["
			+ prodln
			+ "]' id='line_associated_ip"
			+ prodln
			+ "' readonly='readonly' maxlength='50' value='' title=''>"
			+
			// "<input style='width:78px;' type='hidden' readonly='readonly'
			// name='line_associated_ip[" + prodln + "]' id='line_associated_ip"
			// + prodln + "' value='' title=''>"+
			// "<input style='width:78px;' type='hidden' readonly='readonly'
			// name='line_low_associated_ip[" + prodln + "]'
			// id='line_low_associated_ip" + prodln + "' value='' title=''>"+
			// "<input style='width:78px;' type='hidden' readonly='readonly'
			// name='line_high_associated_ip[" + prodln + "]'
			// id='line_high_associated_ip" + prodln + "' value='' title=''>"+
			"<span id='line_associated_ip_displayed"
			+ prodln
			+ "' ></span>"
			+ "</span>"
			+

			// 掩码
			"<span class='input_group'>"
			+ "<label>"+ "掩码"+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_mask["+ prodln+ "]' id='line_mask"
			+ prodln+ "' readonly='readonly' maxlength='50' value='' title=''>"
			+ "</span>"
			+

			// 网关
			"<span class='input_group'>"
			+ "<label id='line_gateway"
			+ prodln
			+ "_label'>"
			+ "网关"
			+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_gateway["
			+ prodln
			+ "]' id='line_gateway"
			+ prodln
			+ "' maxlength='50' value='' title=''>"
			+ "</span>"
			+

			// 网关设备lov
			"<span class='input_group'><label id='line_hat_asset_name"
			+ prodln
			+ "_label'>"
			+ "网关设备"
			+ "</label>"
			+ "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_hat_asset_name["
			+ prodln
			+ "]' id='line_hat_asset_name"
			+ prodln
			+ "' value='' title='' onblur='resetAsset("
			+ prodln
			+ ")'>"
			+ "<input type='hidden' name='line_hat_assets_id["
			+ prodln
			+ "]' id='line_hat_assets_id"
			+ prodln
			+ "' value=''>"
			+ "<button id='btn_line_hat_asset_name"
			+ prodln
			+ "' title='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE')
			+ "' accessKey='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY')
			+ "' type='button' tabindex='116' class='button' value='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "' name='btn1' onclick='openAssetPopup("
			+ prodln
			+ ");'><img src='themes/default/images/id-ff-select.png' alt='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "'></button>"
			+ "</span>"
			+
			// 接入设备
			"<span class='input_group'><label id='line_access_assets_name"
			+ prodln
			+ "_label'>"
			+ "接入设备(主)"
			+ "</label>"
			+ "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_access_assets_name["
			+ prodln
			+ "]' id='line_access_assets_name"
			+ prodln
			+ "' value='' title='' onblur='resetAsset("
			+ prodln
			+ ")'>"
			+ "<input type='hidden' name='line_access_assets_id["
			+ prodln
			+ "]' id='line_access_assets_id"
			+ prodln
			+ "' value=''>"
			+ "<button id='btn_line_access_assets_name"
			+ prodln
			+ "' title='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE')
			+ "' accessKey='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY')
			+ "' type='button' tabindex='116' class='button' value='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "' name='btn1' onclick='openAccessAssetNamePopup("
			+ prodln
			+ ");'><img src='themes/default/images/id-ff-select.png' alt='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "'></button>"
			+ "</span>"
			+
			// 接入设备(备)
			"<span class='input_group'><label id='line_access_assets_backup_name"
			+ prodln
			+ "_label'>"
			+ "接入设备(备)"
			+ "</label>"
			+ "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_access_assets_backup_name["
			+ prodln
			+ "]' id='line_access_assets_backup_name"
			+ prodln
			+ "' value='' title='' onblur='resetAsset("
			+ prodln
			+ ")'>"
			+ "<input type='hidden' name='line_access_assets_backup_id["
			+ prodln
			+ "]' id='line_access_assets_backup_id"
			+ prodln
			+ "' value=''>"
			+ "<button id='btn_line_access_assets_backup_name"
			+ prodln
			+ "' title='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE')
			+ "' accessKey='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY')
			+ "' type='button' tabindex='116' class='button' value='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "' name='btn1' onclick='openAccessAssetBackupPopup("
			+ prodln
			+ ");'><img src='themes/default/images/id-ff-select.png' alt='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "'></button>"
			+ "</span>"
			+
			
			// 端口(主)
			"<span class='input_group'>"
			+ "<label id='line_port"
			+ prodln
			+ "_label'>"
			+ "端口(主)"
			+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_port["
			+ prodln
			+ "]' id='line_port"
			+ prodln
			+ "' maxlength='50' value='' title=''>"
			+ "</span>"
			+
			// 端口(备)
			"<span class='input_group'>"
			+ "<label id='line_port_backup"
			+ prodln
			+ "_label'>"
			+ "端口(备)"
			+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_port_backup["
			+ prodln
			+ "]' id='line_port_backup"
			+ prodln
			+ "' maxlength='50' value='' title=''>"
			+ "</span>"
			+
			// 带宽类型
			"<span class='input_group'>"
			+ "<label id='line_bandwidth_type"
			+ prodln
			+ "_label'>"
			+ "带宽类型"
			+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_bandwidth_type["
			+ prodln
			+ "]' id='line_bandwidth_type"
			+ prodln
			+ "' maxlength='50' value='' title=''>"
			+ "</span>"
			+
			// 限速
			"<span class='input_group'>"
			+ "<label id='line_speed_limit"
			+ prodln
			+ "_label'>"
			+ "限速"
			+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_speed_limit["
			+ prodln
			+ "]' id='line_speed_limit"
			+ prodln
			+ "' maxlength='50' value='' title=''>"
			+ "</span>"
			+
			// 机柜lov
			"<span class='input_group'><label id='line_hat_assets_cabinet"
			+ prodln
			+ "_label'>"
			+ "机柜"
			+ "</label>"
			+ "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_hat_assets_cabinet["
			+ prodln
			+ "]' id='line_hat_assets_cabinet"
			+ prodln
			+ "' value='' title='' onblur='resetAsset("
			+ prodln
			+ ")'>"
			+ "<input type='hidden' name='line_hat_assets_cabinet_id["
			+ prodln
			+ "]' id='line_hat_assets_cabinet_id"
			+ prodln
			+ "' value=''>"
			+ "<button id='btn_line_hat_assets_cabinet"
			+ prodln
			+ "' title='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE')
			+ "' accessKey='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY')
			+ "' type='button' tabindex='116' class='button' value='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "' name='btn2' onclick='openCabinetPopup("
			+ prodln
			+ ");'><img src='themes/default/images/id-ff-select.png' alt='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "'></button>"
			+ "</span>"
			+
			// 监控链接(主)
			"<span class='input_group'>"
			+ "<label id='line_monitoring"
			+ prodln
			+ "_label'>"
			+ "监控链接(主)"
			+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_monitoring["
			+ prodln
			+ "]' id='line_monitoring"
			+ prodln
			+ "' maxlength='50' value='' title=''>"
			+ "</span>"
			+
			// 监控链接(备)
			"<span class='input_group'>"
			+ "<label id='line_monitoring_backup"
			+ prodln
			+ "_label'>"
			+ "监控链接(备)"
			+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_monitoring_backup["
			+ prodln
			+ "]' id='line_monitoring_backup"
			+ prodln
			+ "' maxlength='50' value='' title=''>"
			+ "</span>"
			+
			// mrtg Link
			"<span class='input_group'>"
			+ "<label id='line_mrtg_link"
			+ prodln
			+ "_label'>"
			+ "MRTG Link"
			+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_mrtg_link["
			+ prodln
			+ "]' id='line_mrtg_link"
			+ prodln
			+ "' maxlength='50' value='' title=''>"
			+ "</span>"
			+
			// 频道号(主)
			"<span class='input_group'>"
			+ "<label id='line_channel_num"
			+ prodln
			+ "_label'>"
			+ "频道号(主)"
			+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_channel_num["
			+ prodln
			+ "]' id='line_channel_num"
			+ prodln
			+ "' maxlength='50' value='' title=''>"
			+ "</span>"
			+
			// 频道号(备)
			"<span class='input_group'>"
			+ "<label id='line_channel_num_backup"
			+ prodln
			+ "_label'>"
			+ "频道号(备)"
			+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_channel_num_backup["
			+ prodln
			+ "]' id='line_channel_num_backup"
			+ prodln
			+ "' maxlength='50' value='' title=''>"
			+ "</span>"
			+
			// 频道内容(主)
			"<span class='input_group'>"
			+ "<label id='line_channel_content"
			+ prodln
			+ "_label'>"
			+ "频道内容(主)"
			+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_channel_content["
			+ prodln + "]' id='line_channel_content" + prodln
			+ "' maxlength='50' value='' title=''>" + "</span>"
			
			// 频道内容(备)
			+"<span class='input_group'>"
			+ "<label id='line_channel_content_backup"
			+ prodln
			+ "_label'>"
			+ "频道内容(备)"
			+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_channel_content_backup["
			+ prodln + "]' id='line_channel_content_backup" + prodln
			+ "' maxlength='50' value='' title=''>" + "</span>"
			
			// 主
			/*+"<span class='input_group'><label id='line_main_asset"
			+ prodln
			+ "_label'>"
			+ SUGAR.language.get('HIT_IP_TRANS', 'LBL_MAIN_ASSET')
			+ "</label>"
			+ "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_main_asset["
			+ prodln
			+ "]' id='line_main_asset"
			+ prodln
			+ "' value='' title='' onblur='resetAsset("
			+ prodln
			+ ")'>"
			+ "<input type='hidden' name='line_main_asset_id["
			+ prodln
			+ "]' id='line_main_asset_id"
			+ prodln
			+ "' value=''>"
			+ "<button id='btn_line_main_asset"
			+ prodln
			+ "' title='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE')
			+ "' accessKey='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY')
			+ "' type='button' tabindex='116' class='button' value='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "' name='btn2' onclick='openMainAssetPopup("
			+ prodln
			+ ");'><img src='themes/default/images/id-ff-select.png' alt='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "'></button>"
			+ "</span>"
			+
			// 备
			"<span class='input_group'><label id='line_backup_asset"
			+ prodln
			+ "_label'>"
			+ SUGAR.language.get('HIT_IP_TRANS', 'LBL_BACKUP_ASSET')
			+ "</label>"
			+ "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_backup_asset["
			+ prodln
			+ "]' id='line_backup_asset"
			+ prodln
			+ "' value='' title='' onblur='resetAsset("
			+ prodln
			+ ")'>"
			+ "<input type='hidden' name='line_backup_asset_id["
			+ prodln
			+ "]' id='line_backup_asset_id"
			+ prodln
			+ "' value=''>"
			+ "<button id='btn_line_backup_asset"
			+ prodln
			+ "' title='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE')
			+ "' accessKey='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY')
			+ "' type='button' tabindex='116' class='button' value='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "' name='btn2' onclick='openBackupAssetPopup("
			+ prodln
			+ ");'><img src='themes/default/images/id-ff-select.png' alt='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "'></button>"
			+ "</span>"*/
			
			// startdate
			+"<span class='input-group date form_datetime' id='span_line_date_start"+prodln+"' >"
			+ "<label id='line_date_start"+ prodln+ "_label'>"+ "占用起始时间"+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_date_start["+ prodln + "]' id='line_date_start" + prodln	+ "' maxlength='50' value='' title=''>" +"<span class='input-group-addon' id='line_date_start"+prodln+"_date"+"'><span class='glyphicon glyphicon-calendar'></span></span>"
			+ "</span>"
			
			
			// enddate
			+"<span class='input-group date form_datetime' id='span_line_date_end"+prodln+"' >"
			+ "<label id='line_date_end"+ prodln+ "_label'>"+ "占用终止时间"+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_date_end["+ prodln + "]' id='line_date_end" + prodln+ "' maxlength='50' value='' title=''>" +"<span class='input-group-addon' id='line_date_end"+prodln+"_date"+"'><span class='glyphicon glyphicon-calendar'></span></span>"
			+ "</span>"
			// endDate
			/*+"<span class='form-group' id='span_line_date_end'"+prodln+">"
            +    "<label for='dtp_input1' class='col-md-2 control-label'>占用终止时间</label>"
            +    "<span class='input-group date form_datetime col-md-5'>"
            +        "<input class='form-control' size='16' type='text' value='' readonly>"
            +        "<span class='input-group-addon'><span class='glyphicon glyphicon-remove'></span></span>+"
            +        "<span class='input-group-addon'><span class='glyphicon glyphicon-th'></span></span>"
            +    "</span>"
            +    "<input type='hidden' id='dtp_input1' value='' /><br/>"
            +"</span>"*/
		    +"<span class='input_group'>"+
		    "<label>"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_ENABLE_ACTION')+" </label>"+
		    "<input name='line_enable_action[" + prodln + "]'  type='checkbox' id='line_enable_action" + prodln + "'  value='' title='"+SUGAR.language.get('HIT_IP_TRANS', 'LBL_ENABLE_ACTION')+"' onclick=selectedLine("+prodln+")></input>"
		    +"</span>"
			// 状态
			+"<span class='input_group'>"
			+ "<label id='line_status"+ prodln+ "_label'>"+ "状态"+ "</label>"
			+ "<input style=' width:153px;' type='text' readonly='readonly' name='line_status_dis["+ prodln + "]' id='line_status_dis" + prodln+ "' maxlength='50' value='' title=''>" 
			+ "</span>"
			//带宽变量
			+"<span class='input_group'>"
			+ "<label id='line_broadband_type"+ prodln+ "_label'>"+ "带宽变量"+ "</label>"
			+ "<input style=' width:153px;' type='text' name='line_broadband_type["+ prodln+ "]' id='line_broadband_type"+ prodln+ "' maxlength='50' value='' title=''>"
			+ "</span>"
			
			+ "<input type='hidden' name='line_deleted[" + prodln+ "]' id='line_deleted" + prodln + "' value='0'>"
			+ "<input type='hidden' name='line_status[" + prodln+ "]' id='line_status" + prodln + "'>"
			+ "<input type='hidden' name='line_enable_action_val[" + prodln+ "]' id='line_enable_action_val" + prodln + "' value='1'>"
			+ "<input type='hidden' name='line_id[" + prodln + "]' id='line_id"+ prodln + "' value=''>"
			+ "<input type='hidden' name='line_source_ref[" + prodln+ "]' id='line_source_ref" + prodln + "' value=''>"
			+ "<input type='button' id='line_delete_line" + prodln+ "' class='button btn_del' value='"+ SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE')+ "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln+ ",\"line_\")'>" + "<button type='button' id='btn_LineEditorClose"+ prodln + "' class='button btn_save' value='"+ SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+ "' tabindex='116' onclick='LineEditorClose(" + prodln+ ",\"line_\")'>"+ SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+ " & " + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+ " <img src='themes/default/images/id-ff-clear.png' alt='"+ SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE')+ "'></button>"
			+"</div></td>";
			addToValidate('EditView', 'line_hit_ip_subnets' + prodln, 'varchar','true', SUGAR.language.get('HAT_Asset_Trans_Batch','LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE'));
			addToValidate('EditView', 'line_name' + prodln, 'varchar', 'true',SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_NAME'));
			addToValidate('EditView', 'line_target_organization' + prodln, 'varchar','true', SUGAR.language.get('HAT_Asset_Trans_Batch','LBL_TARGET_RESPONSIBLE_CENTER'));
			addToValidate('EditView', 'line_target_location' + prodln, 'varchar','true', SUGAR.language.get('HAT_Asset_Trans_Batch','LBL_TARGET_LOCATION'));

	renderTransLine(prodln);

	prodln++;
	return prodln - 1;
}

function renderTransLine(ln) { // 将编辑器中的内容显示于正常行中
	ip_splited = $("#line_hit_ip_subnets" + ln).val().split("/");
	if (IpSubnetCalculator.isIp(ip_splited[0]) && ip_splited[1] <= 32
			&& ip_splited[1] >= 0) {
		var ip_caled = IpSubnetCalculator.calculateSubnetMask(ip_splited[0],
				ip_splited[1]);
		var associated_ip = ip_caled.ipLowStr + "~" + ip_caled.ipHighStr;
		// 显示IP细节信息，由IpSubnetCalculator.js完成算法
		$("#displayed_line_associated_ip" + ln).html(associated_ip);
		$("#line_associated_ip" + ln).val(associated_ip);
		//console.log(associated_ip);
	}

	$("#displayed_line_parent_ip" + ln).html($("#line_parent_ip" + ln).val());
	$("#displayed_line_hit_ip_subnets" + ln)
			.html($("#line_hit_ip_subnets" + ln).val());
	$("#displayed_line_mask" + ln).html($("#line_mask" + ln).val());
	$("#displayed_line_gateway" + ln).html($("#line_gateway" + ln).val());
	$("#displayed_line_bandwidth_type" + ln)
			.html($("#line_bandwidth_type" + ln).val());
	$("#displayed_line_port" + ln).html($("#line_port" + ln).val());
	$("#displayed_line_speed_limit" + ln).html($("#line_speed_limit" + ln)
			.val());
	$("#displayed_line_hat_asset_name" + ln)
			.html($("#line_hat_asset_name" + ln).val());
	$("#displayed_line_hit_ip_subnets_id" + ln)
			.html($("#line_hit_ip_subnets_id" + ln).val());
	$("#displayed_line_id" + ln).html($("#line_id" + ln).val());
	$("#displayed_line_monitoring" + ln).html($("#line_monitoring" + ln).val());
	$("#displayed_line_hat_assets_cabinet_id" + ln)
			.html($("#line_hat_assets_cabinet_id" + ln).val());
	$("#displayed_line_hat_assets_cabinet" + ln)
			.html($("#line_hat_assets_cabinet" + ln).val());
	$("#displayed_line_channel_content" + ln).html($("#line_channel_content"
			+ ln).val());
	$("#displayed_line_channel_num" + ln).html($("#line_channel_num" + ln)
			.val());
	// $("#displayed_line_associated_ip"+ln).html($("#line_associated_ip"+ln).val());
	$("#displayed_line_mrtg_link" + ln).html($("#line_mrtg_link" + ln).val());
	$("#displayed_line_access_assets_name" + ln)
			.html($("#line_access_assets_name" + ln).val());
	$("#displayed_line_access_assets_id" + ln).html($("#line_access_assets_id"
			+ ln).val());
	$("#displayed_line_source_ref" + ln).html($("#line_source_ref" + ln).val());
	$("#displayed_line_id" + ln).html($("#line_id" + ln).val());
	$("#displayed_line_hat_assets_id" + ln).html($("#line_hat_assets_id" + ln)
			.val());
  $("#displayed_line_status"+ln).html($("#line_status"+ln).val());
  if($("#line_status"+ln).val()=="EFFECTIVE"||$("#line_status"+ln).val()==""){
  	  $("#displayed_line_status"+ln).html(SUGAR.language.get('HIT_IP_TRANS',"LBL_EFFECTIVE"));
  }else if($("#line_status"+ln).val()=="UNEFFECTIVE"){
  	 $("#displayed_line_status"+ln).html(SUGAR.language.get('HIT_IP_TRANS',"LBL_EFFICACY"));
  }  
  $("#displayed_line_port_backup"+ln).html($("#line_port_backup"+ln).val());
  $("#displayed_line_monitoring_backup"+ln).html($("#line_monitoring_backup"+ln).val());
  $("#displayed_line_channel_content_backup"+ln).html($("#line_channel_content_backup"+ln).val());
  $("#displayed_line_channel_num_backup"+ln).html($("#line_channel_num_backup"+ln).val());
  $("#displayed_line_access_assets_backup_name"+ln).html($("#line_access_assets_backup_name"+ln).val());
  $("#displayed_line_access_assets_backup_id"+ln).html($("#line_access_assets_backup_id"+ln).val());
  $("#displayed_line_date_start"+ln).html($("#line_date_start"+ln).val());
  $("#displayed_line_date_end"+ln).html( $("#line_date_end"+ln).val());
  $("#displayed_line_broadband_type"+ln).html( $("#line_broadband_type"+ln).val());
  if($("#line_enable_action"+ln).val()=="0"){
  	  
  	  $("#displayed_line_enable_action"+ln).attr("checked",true);
      $("#displayed_line_enable_action"+ln).prop("checked",true);
      document.getElementById("displayed_line_enable_action"+ln).checked = true;
  }else{
  	  $("#displayed_line_enable_action"+ln).removeAttr("checked");
  }  
    

}

function resetAsset(ln) { // 在用户重新选择资产之后，会连带的更新资产相关的字段信息。
	// alert(document.getElementById("line_current_responsible_center"+ln).value);
	// alert($("#line_current_responsible_center"+ln).val());

	if ($("#line_asset" + ln).val() === '') { // 如果资产字段为空，则将所有关联的字段全部清空
		$("#line_hat_assets_hat_asset_transhat_assets_ida" + ln).val("");
		$("#line_target_owning_org" + ln).val("");
		$("#line_target_using_org" + ln).val("");
		$("#line_target_owning_org_id" + ln).val("");
		$("#line_target_using_org_id" + ln).val("");
		$("#line_target_owning_person" + ln).val("");
		$("#line_target_using_person" + ln).val("");
		$("#line_target_owning_person_id" + ln).val("");
		$("#line_target_using_person_id" + ln).val("");
		$("#line_target_location" + ln).val("");
		$("#line_target_location_desc" + ln).val("");
		$("#line_target_asset_status" + ln).val("");
		$("#line_current_asset_status" + ln).val("");
		$("#line_current_responsible_center" + ln).val("");
		$("#line_current_responsible_person" + ln).val("");
		$("#line_current_location" + ln).val("");
		$("#line_current_location_desc" + ln).val("");
	}

	// 以下为Current的几个字段获得值，这几个字段为空时，直接从Target字段复制
	// 这几行的位置在Target清空之后，这样如果Target为空，则当前Current也会清空
	if ($("#line_current_responsible_center" + ln).val() === '') {
		$("#line_current_responsible_center" + ln)
				.val($("#line_target_organization" + ln).val());
	}
	if ($("#line_current_responsible_person" + ln).val() === '') {
		$("#line_current_responsible_person" + ln).val($("#line_target_person"
				+ ln).val());
	} else {
		$("#line_contact_id_c" + ln).val('');
	}
	if ($("#line_current_location" + ln).val() === '') {
		$("#line_current_location" + ln).val($("#line_target_location" + ln)
				.val());
	}
	if ($("#line_current_location_desc" + ln).val() === '') {
		$("#line_current_location_desc" + ln)
				.val($("#line_target_location_desc" + ln).val());
	}

	// TODO 这里直接读取了头字段，最好改为参数
	// 以下是根据Event Type的规则，对字段进行设置
	var tmp = document.createElement("DIV");
	tmp.innerHTML = $("#line_current_asset_status" + ln).val();
	var current_status_text = tmp.textContent || tmp.innerText || "";// current从Popup中返回的是Text，要以Value形式保存，否则会有多语言问题

	var current_status_value = $("#hat_asset_status option").filter(function() {
				return $(this).html() == current_status_text;
			}).val()
	$("#line_current_asset_status" + ln).val(current_status_value);

	if ($("#change_target_status").val() == 1) { // 如果头EventType需要变更
		$("#line_target_asset_status" + ln)
				.val($("#target_asset_status").val());// 目标为当前资产状态
	} else {
		$("#line_target_asset_status" + ln).val(current_status_value);// 目标为当前资产状态,以Value保存
	}
	var target_status_value = $("#line_target_asset_status" + ln).val();
	var target_status_text = $("#hat_asset_status option[value='"
			+ target_status_value + "']").text();

	$("#line_target_asset_status_displayed" + ln)
			.html("<span class='color_tag color_asset_status_"
					+ target_status_value + "'>" + target_status_text
					+ "</span>");

	if ($("#change_organization").val() == 'LOCKED') {// 如果不可以更新目标组织
		$("#line_target_organization" + ln).attr("readonly", true);
		$("#line_target_organization" + ln + "~ button").css('display', 'none');
	}
	if ($("#change_contact").val() == 'LOCKED') {// 如果不可以更新联系人
		$("#line_target_person" + ln).attr("readonly", true);
		$("#line_target_person" + ln + "~ button").css('display', 'none');
	}
	if ($("#change_location").val() == 'LOCKED') {// 如果不可以更新地点
		$("#line_target_location" + ln).attr("readonly", true);
		$("#line_target_location" + ln + "~ button").css('display', 'none');
	}
	if ($("#change_location_desc").val() == 'LOCKED') {// 如果不可以更地点说明
		$("#line_target_location_desc" + ln).attr("readonly", true);
	}
}

function insertTransLineFootor(tableid) {
	tablefooter = document.createElement("tfoot");
	document.getElementById(tableid).appendChild(tablefooter);

	var footer_row = tablefooter.insertRow(-1);
	var footer_cell = footer_row.insertCell(0);

	footer_cell.scope = "row";
	footer_cell.colSpan = "21";
	footer_cell.innerHTML = "<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\""
			+ tableid
			+ "\")' value='+ "
			+ SUGAR.language.get('HIT_IP_TRANS', 'LBL_BTN_ADD_TRANS_LINE')
			+ "' />"
			+ "<input id='btnCopyLine' type='button' class='button btn_del' onclick='dulicateTranLine(\""
			+ tableid
			+ "\")' value='+ "
			+ SUGAR.language.get('HIT_IP_TRANS', 'LBL_BTN_COPY_TRANS_LINE')
			+ "' />"
			+ "<input id='btnAddLine' type='button' class='button btn_del' onclick='btnAddAllocLine()' value='+ "
			+ SUGAR.language.get('HIT_IP_TRANS', 'LBL_BTN_ADD_ALLOC_TRANS_LINE')
			+ "' />";
	// TODO:添加一个Checkbox用于显示和隐藏当前组织、人员、地点……
}
/**
 * 添加事务处理行
 * 
 * @param tableid
 */
function addNewLine(tableid) {
	
	var line_data = "";
	//if (check_form('EditView')) {// 只有必须填写的字段都填写了才可以新增

		var event_id = $("#hat_eventtype_id").val();
		$.ajax({//
			url : 'index.php?to_pdf=true&module=HIT_IP_TRANS_BATCH&action=getEventJsonData&hat_eventtype_id='
					+ event_id,
			async : false,
			success : function(data) {
				line_data = jQuery.parseJSON(data);

			},
			error : function() { // 失败
				alert('Error loading document');
			}
		});

		insertTransLineElements(tableid);// 加入新行
		LineEditorShow(prodln - 1); // 打开行编辑器
		//single_changeRequired(line_data,(prodln - 1));
	//}
}

function btnMarkLineDeleted(ln, key) {// 删除当前行
	if ($("#line_source_ref" + ln).val() == "OTHER_WOOP") {
		alert("来源于其他工序不允许删除");
		return;
	}
	YAHOO.SUGAR.MessageBox.show({
				msg : SUGAR.language.get('app_strings',
						'NTC_DELETE_CONFIRMATION'),
				title : 'Alert',
				type : 'confirm',
				icon : 'ICON_ALARM',
				fn : function(confirm) {
					if (confirm == 'yes') {
						markLineDeleted(ln, key);
						LineEditorClose(ln);
					}
					if (confirm == 'no') {
						// do something if 'No' was clicked
					}
				}
			})
	$("#Trans_line_head").show();
}
function markLineDeleted(ln, key) {// 删除当前行

	// collapse line; update deleted value
	document.getElementById(key + 'body' + ln).style.display = 'none';
	document.getElementById(key + 'deleted' + ln).value = '1';
	document.getElementById(key + 'delete_line' + ln).onclick = '';

	$("#line_*"+ ln).children().remove(".required");

	//用新的删除验证方式代替老的，toney.wu20161111
/*	if (typeof validate != "undefined"
			&& typeof validate['EditView'] != "undefined") {
		removeFromValidate('EditView', 'line_hit_ip_subnets' + ln);
		removeFromValidate('EditView', 'line_speed_limit' + ln);
		removeFromValidate('EditView', 'line_monitoring' + ln);
		removeFromValidate('EditView', 'line_parent_ip' + ln);
		removeFromValidate('EditView', 'line_channel_content' + ln);
		removeFromValidate('EditView', 'line_access_assets_name' + ln);
		removeFromValidate('EditView', 'line_hat_asset_name' + ln);
		removeFromValidate('EditView', 'line_hit_ip_subnets_id' + ln);
		
		removeFromValidate('EditView','line_asset'+ ln);
	    removeFromValidate('EditView','line_name'+ ln);
	    removeFromValidate('EditView','line_target_organization'+ ln);
	    removeFromValidate('EditView','line_target_location'+ ln);
	    removeFromValidate('EditView','line_bandwidth_type'+ ln);
	    removeFromValidate('EditView','line_port'+ ln);
	    removeFromValidate('EditView','line_port_backup'+ ln);
	    removeFromValidate('EditView','line_access_assets_name'+ ln);
	    removeFromValidate('EditView','line_access_assets_backup_name'+ ln);
	    removeFromValidate('EditView','line_speed_limit'+ ln);
	    removeFromValidate('EditView','line_hat_assets_cabinet'+ ln);
	    removeFromValidate('EditView','line_monitoring'+ ln);
	    removeFromValidate('EditView','line_monitoring_backup'+ ln);
	    removeFromValidate('EditView','line_channel_num_backup'+ ln);
	    removeFromValidate('EditView','line_channel_content_backup'+ ln);
	    removeFromValidate('EditView','line_date_start'+ ln);
	    removeFromValidate('EditView','line_date_end'+ ln);
	    removeFromValidate('EditView','line_broadband_type'+ ln);
	}*/

	if ($("#line_hit_ip_subnets" + ln).val() == "") {
		$("#line_hit_ip_subnets" + ln).val("deleted");
	}
	if ($("#line_hit_ip_subnets" + ln).val() == "")
		$("#line_hit_ip_subnets" + ln).val("deleted");
	// resetLineNum();
}

function LineEditorShow(ln) { // 显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
	if (prodln > 1) {
		for (var i = 0; i < prodln; i++) {
			LineEditorClose(i);
		}
	}
	   var event_id = $("#hat_eventtype_id").val();
	   $.ajax({//
			url : 'index.php?to_pdf=true&module=HIT_IP_TRANS_BATCH&action=getEventJsonData&hat_eventtype_id='
					+ event_id,
			async : false,
			success : function(data) {
				var line_data = jQuery.parseJSON(data);
				single_changeRequired(line_data,ln);
			},
			error : function() { // 失败
				alert('Error loading document');
			}
		});
	
	//LineEditorClose(ln);
	$("#asset_trans_line1_displayed" + ln).hide();
	$("#asset_trans_line2_displayed" + ln).hide();
	$("#asset_trans_editor" + ln).show();
	$("#Trans_line_head").hide();
	
}

function resetLineNum_Bold() {// 数行号
	var j = 0;
	for (var i = 0; i < prodln; i++) {
		if ($("#line_deleted" + i).val() != 1) {// 跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
			j = j + 1;
			$("#displayed_line_num" + i).text(j);
		}
	}
}

function LineEditorClose(ln) {// 关闭行编辑器（显示为正常行）
	if (check_form('EditView')) {
		$("#asset_trans_editor" + ln).hide();
		$("#asset_trans_line1_displayed" + ln).show();
		$("#asset_trans_line2_displayed" + ln).show();
		renderTransLine(ln);
		resetLineNum_Bold();
	}else{
		return;
	}
	$("#Trans_line_head").show();
}

function single_Field(fieldName,type,i){
	if(type=="OPTIONAL"){
		//for (var i=0;i<prodln;i++) {
			mark_field_enabled_mine(fieldName+i,true);
		 //}
	}else if(type=="LOCKED"){
		//for (var i=0;i<prodln;i++) {
		    mark_field_disabled_mine(fieldName+i,false);
		//}
	}else if(type=="REQUIRED"){
		//for (var i=0;i<prodln;i++) {
			// mark_field_disabled(fieldName+i,false);
		    mark_field_enabled_mine(fieldName+i,false);
		//}
	}else if(type=="INVISIABLE"){
		//for (var i=0;i<prodln;i++) {
			// hide_field_disabled(fieldName+i,true,false)
		    $("#"+fieldName+i).css({"visibility":"hidden"});
		    $("#"+fieldName+i+"_label").css({"visibility":"hidden"});
		    $("#btn_"+fieldName+i).css({"visibility":"hidden"});
		    $("#"+fieldName+i).parents('.input_group').hide();//remove(); 
		    $("#"+fieldName+"_title").hide();//remove(); 
		    $("#displayed_"+fieldName+i).hide();//remove(); 
		    $("#span_"+fieldName+i).hide();//remove(); 
		    mark_field_disabled_mine(fieldName+i,false);
		//}
	}
}


function single_changeRequired(lineRecord,i){
	single_Field("line_hit_ip_subnets",lineRecord.hit_ip_subnets,i);
	single_Field("line_gateway",lineRecord.change_gateway,i);
	single_Field("line_bandwidth_type",lineRecord.change_bandwidth_type,i);
	single_Field("line_port",lineRecord.change_port,i);
	single_Field("line_speed_limit",lineRecord.change_speed_limit,i);
	single_Field("line_hat_asset_name",lineRecord.change_asset,i);
	single_Field("line_hat_assets_cabinet",lineRecord.change_cabinet,i);
	single_Field("line_monitoring",lineRecord.change_monitoring,i);
	single_Field("line_channel_num",lineRecord.change_channel_num,i);
	single_Field("line_channel_content",lineRecord.change_channel_content,i);
	single_Field("line_mrtg_link",lineRecord.change_mrtg_link,i);
	single_Field("line_access_assets_name",lineRecord.change_access_assets_name,i);
	single_Field("line_parent_ip",lineRecord.change_parent,i);
	single_Field("line_associated_ip",lineRecord.change_associated_ip,i);
	single_Field("line_date_end",lineRecord.change_date_end,i);
	single_Field("line_date_start",lineRecord.change_date_start,i);
	single_Field("line_port_backup",lineRecord.change_port_backup,i);
	single_Field("line_monitoring_backup",lineRecord.change_monitoring_backup,i);
	single_Field("line_channel_content_backup",lineRecord.change_channel_content_backup,i);
	single_Field("line_channel_num_backup",lineRecord.change_channel_num_backup,i);
	single_Field("line_status",lineRecord.change_status,i);
	single_Field("line_status_dis",lineRecord.change_status,i);
	single_Field("line_access_assets_backup_name",lineRecord.change_access_assets_backup_name,i);
	single_Field("line_change_enable_action",lineRecord.change_enable_action,i);
	single_Field("line_broadband_type",lineRecord.change_broadband_type,i);
}



function dulicateTranLine(ln) {// 关闭行编辑器（显示为正常行）
	//if (check_form('EditView')) {
		var keyValue = "";
		// 获取上一行 排除已经删除的得到prodin的真实数值
		var lastProdln = 1;
		for (var i = 0; i <= prodln - 1; i++) {
			if ($("#line_deleted" + i).val() != 1) {
				lastProdln = i;
			}
		}
		// 加入新行
		insertTransLineElements("lineItems");
		if(typeof lineDataTemp  =="undefined"){
			var lineDataTemp={
				id:"",
				hat_asset_name:"",
				hat_assets_id:"",
				hit_ip_subnets:"",
				hit_ip_subnets_id:"",
				parent_ip:"",
				associated_ip:"",
				mask:"",
				bandwidth_type:"",
				port:"",
				speed_limit:"",
				gateway:"",
				monitoring:"",
				hat_assets_cabinet_id:"",
				hat_assets_cabinet:"",
				channel_content:"",
				channel_num:"",
				ip_netmask:"",
				associated_ip:"",
				mrtg_link:"",
				access_assets_id:"",
				access_assets_name:"",
				source_ref:"",
				date_entered:"",
				access_assets_backup_id:"",
				access_assets_backup_name:"",
				status:"",
				port_backup:"",
				monitoring_backup:"",
				channel_content_backup:"",
				channel_num_backup:"",
				date_start:"",
				date_end:"",
				enable_action:'',
				broadband_type:''
			};
			
		}	

			for (var key in lineDataTemp) {
				var domvalue = $("#line_" + key + lastProdln).val();
				$("#line_" + key + (prodln - 1)).val(domvalue);
				//计算字段
				$("#displayed_line_" + key + (prodln - 1)).html(domvalue);
			}
		
			//if($("#line_parent_ip" + lastProdln).val()==""){
			//	$("#displayed_line_parent_ip" + (prodln - 1)).html($("#displayed_line_parent_ip" +lastProdln).html());
			//}
		//console.log("index = "+(prodln - 1)+"-----"+$("#line_parent_ip" + lastProdln).val());
		
		// 清除id
		$("#line_id" + (prodln - 1)).val(null);
		$("#line_source_ref" + (prodln - 1)).val(null);
		single_changeRequired(lineData,(prodln - 1));
		// 设置行号
		resetLineNum_Bold();
		
	//}
}
