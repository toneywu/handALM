$.getScript("cache/include/javascript/sugar_grp_yui_widgets.js"); // MessageBox
$.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");
$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); // MessageBox
$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css" />');

var prodln = 0;
if (typeof sqs_objects == 'undefined') {
	var sqs_objects = new Array;
}

function check_subnet_ip(ln) { // 检查子网IP是否合规
	// 1、判断子网IP是否在网段之内
	// 2、判断精确IP是否在当前子网网段内
	// 2、判断精确IP是否在当前网段中已经存在
	var err_msg = "";

	if ($("#line_ip_subnet" + ln).val() == "") {
		return;
	}

	var ip_subnet_splited = $("#line_ip_subnet" + ln).val().split("/");// 当前行的IP
	/*if(typeof $("#line_name" + ln).val()=="undefined"){
		$("#line_name" + ln).val($("#line_ip_subnet" + ln).val());
		var ip_splited = $("#line_name" + ln).val().split("/");
	}else{
		var ip_transfer_splited = $("#line_name" + ln).val() + "\/" + ip_subnet_splited[1];
	    var ip_splited = ip_transfer_splited.split("/");
	}*/
	
	var spilit_str = $("#line_name" + ln).val();
	if(spilit_str==""){
		spilit_str=$("#line_ip_subnet" + ln).val();
	}else{
		spilit_str=spilit_str+ "\/" + ip_subnet_splited[1];
	}
	ip_splited=spilit_str.split("/");
	console.log(ip_splited);
	
	var line_name = $("#line_name" + ln).val().split("/");// 当前行的IP
	var ip_parenet_splited = $("#name").val().split("/");// 头上的IP地址

	//C段下的子网段掩码只能是大于等于24,且小于等于32。和准确ip一致
	if ($("#line_ip_subnet" + ln).val() != null
			&& IpSubnetCalculator.isIp(ip_subnet_splited[0])
			&& ip_subnet_splited[1] >= 24 && ip_subnet_splited[1] <= 32) {
	}else{
		console.log(ip_subnet_splited[1]+"~"+ip_splited[0]);
		err_msg = SUGAR.language.get('HIT_IP_Subnets',
				'LBL_ERR_SUBNET_IP_SCOPE2');
	}

	if(IpSubnetCalculator.isIp(ip_parenet_splited[0])&&IpSubnetCalculator.isIp(ip_subnet_splited[0])){
		var c_segment_array = ip_parenet_splited[0].split(".");
		var subnet_array =  ip_subnet_splited[0].split(".");
		if(c_segment_array[0]!=subnet_array[0]||c_segment_array[1]!=subnet_array[1]||c_segment_array[2]!=subnet_array[2]){
			err_msg = SUGAR.language.get('HIT_IP_Subnets',
										'LBL_ERR_NOT_EQUAL_PARENT_IP');
		}
	}
	if (err_msg == "") {
		if (IpSubnetCalculator.isIp(ip_splited[0]) && ip_splited[1] <= 32&& ip_splited[1] >=24
			) {
			// 如果当前IP格式正常就继续判断是否有冲突
			var ip_caled = IpSubnetCalculator.calculateSubnetMask(
					ip_splited[0], ip_subnet_splited[1])
			var ip_parenet_caled = IpSubnetCalculator.calculateSubnetMask(
					ip_parenet_splited[0], ip_parenet_splited[1]);

			var ip_subnet_caled = IpSubnetCalculator.calculateSubnetMask(
					ip_subnet_splited[0], ip_subnet_splited[1]);
			// 1、判断子网IP是否在网段之内
			 console.log('ipHigh ='+ip_caled.ipHigh+"~"+ip_subnet_caled.ipHigh);
			 console.log('ipLow = '+ip_caled.ipLow+"~"+ip_subnet_caled.ipLow);
			if (ip_caled.ipHigh > ip_subnet_caled.ipHigh
					|| ip_caled.ipLow < ip_subnet_caled.ipLow) {
				// 与父IP确认，是否走出当前父IP的范围 当前IP录入的值不在父项的范围内
				err_msg = SUGAR.language.get('HIT_IP_Subnets',
						'LBL_ERR_IP_SCOPE');
			}
			if (ip_caled.ipHigh > ip_subnet_caled.ipHigh
					|| ip_caled.ipLow < ip_subnet_caled.ipLow) {
				err_msg = SUGAR.language.get('HIT_IP_Subnets',
						'LBL_ERR_SUBNET_IP_SCOPE');
			}

			// 2、判断精确IP是否在当前子网网段内
			if (ip_caled.ipHigh > ip_parenet_caled.ipHigh
					|| ip_caled.ipLow < ip_parenet_caled.ipLow) {
				// if (ip_caled.ipHigh>ip_subnet_splited.ipHigh ||
				// ip_caled.ipLow<ip_subnet_splited.ipLow) {
				// 与父IP确认，是否走出当前父IP的范围 当前IP录入的值不在父项的范围内
				err_msg = SUGAR.language.get('HIT_IP_Subnets',
						'LBL_ERR_IP_SCOPE');
			}

			// 2、判断精确IP是否在当前网段中已经存在
			for (var i = 0; i < prodln - 1; i++) {
				console.log("2、判断精确IP是否在当前网段中已经存在 line_ip_typei="+$("#line_ip_type" + i).val()+",ln="+$("#line_ip_type" + ln).val());	
				/*if (i != ln && $("#line_deleted" + i).val() != 1&& $("#line_ip_type" + i).val() != 1&& $("#line_ip_type" + ln).val() != 1) { // 针对之前所有行的记录进行比较
					ip_loop_splited = $("#line_ip_subnet" + i).val().split("/");// 当前行的IP地址
					if (IpSubnetCalculator.isIp(ip_loop_splited[0])
							&& ip_loop_splited[1] <= 32
							&& ip_loop_splited[1] >= 0) {
						var ip_loop_caled = IpSubnetCalculator
								.calculateSubnetMask(ip_splited[0],
										ip_splited[1])
						if ((ip_caled.ipLow <= ip_loop_caled.ipHigh && ip_caled.ipLow >= ip_loop_caled.ipLow)
								|| (ip_caled.ipHigh <= ip_loop_caled.ipHigh && ip_caled.ipHigh >= ip_loop_caled.ipLow)) {
							// 判断当前IP和LOOP的IP是否有重合
							err_msg = SUGAR.language.get('HIT_IP_Subnets',
									'LBL_ERR_IP_CONFILCT')
									+ "[<strong>"
									+ $("#line_ip_subnet" + i).val()
									+ "</strong> :"
									+ ip_loop_caled.ipLowStr
									+ "~" + ip_loop_caled.ipHighStr + "]";
						}
					}
				}*/
			
			
			//散U的时候 精确ip不能重复
			for (var j = 0; j <= prodln - 1; j++) {	
				//排除已经删除的行
				//散U的时候 勾选为散U  为0
				if(i!=j&&$("#line_deleted" + i).val() != "1"&&$("#line_deleted" + j).val() != "1"&&$("#line_ip_type" + i).val()=="0"&&$("#line_ip_type" + j).val()=="0"){
					console.log("i = "+i+",j="+j);
					//并且必须是ip
					var ip_loop_splited_a = $("#line_name" + i).val().split("/");
					var ip_loop_splited_b = $("#line_name" + j).val().split("/");
					//console.log("i="+$.trim(ip_loop_splited_a[0]));
					//console.log("j="+$.trim(ip_loop_splited_b[0]));
					if(IpSubnetCalculator.isIp($.trim(ip_loop_splited_a[0]))&&IpSubnetCalculator.isIp($.trim(ip_loop_splited_b[0]))){
						var ip_array_a = $.trim(ip_loop_splited_a[0]).split(".");
						var ip_array_b = $.trim(ip_loop_splited_b[0]).split(".");
						if(ip_array_a[0]==ip_array_b[0]&&ip_array_a[1]==ip_array_b[1]&&ip_array_a[2]==ip_array_b[2]&&ip_array_a[3]==ip_array_b[3]){
							err_msg = SUGAR.language.get('HIT_IP_Subnets','LBL_ERR_IP_CONFILCT2');
							occur_error(err_msg,ln);
							return;
						}
					}
				}
				
			}
			//整柜的时候子网段不能重复
			for (var k = 0; k <= prodln-1; k++) {	
				//排除已经删除的行
				console.log(" k ="+k+",line_deleted="+$("#line_deleted" + k).val()+",line_ip_type I="+$("#line_ip_type" + i).val()+",line_ip_type K="+$("#line_ip_type" + k).val());
				
				if(i!=k&&$.trim($("#line_deleted" + k).val()) == "0"&&$.trim($("#line_ip_type" + i).val())=="1"&&$.trim($("#line_ip_type" + k).val())=="1"){
					console.log("i = "+i+",k="+k);
					//并且必须是ip
					var ip_loop_splited_a = $("#line_ip_subnet" + i).val().split("/");
					var ip_loop_splited_b = $("#line_ip_subnet" + k).val().split("/");
					//console.log("i="+$.trim(ip_loop_splited_a[0]));
					//console.log("k="+$.trim(ip_loop_splited_b[0]));
					if(IpSubnetCalculator.isIp($.trim(ip_loop_splited_a[0]))&&IpSubnetCalculator.isIp($.trim(ip_loop_splited_b[0]))){
						var ip_array_a = $.trim(ip_loop_splited_a[0]).split(".");
						var ip_array_b = $.trim(ip_loop_splited_b[0]).split(".");
						if(ip_array_a[0]==ip_array_b[0]&&ip_array_a[1]==ip_array_b[1]&&ip_array_a[2]==ip_array_b[2]&&ip_array_a[3]==ip_array_b[3]){
							err_msg = SUGAR.language.get('HIT_IP_Subnets','LBL_ERR_IP_CONFILCT');
							occur_error(err_msg,ln);
							return;
						}
					}
				}
				
			}
			
			}
			
			
			// end for
		} else {
			//if (IpSubnetCalculator.isIp(ip_splited[0]) && ip_splited[1] <= 32&& ip_splited[1] >=24
			//) {
				console.log("ip_splited[0] = "+ip_splited[0]+",ip_splited[1]="+ip_splited[1]+",ip_splited="+ip_splited);
			err_msg = SUGAR.language.get('HIT_IP_Subnets',
					'LBL_ERR_SUBNET_IP_SCOPE2');
		}
	}
	clear_all_errors();
	$("#btn_LineEditorClose" + ln).show()
	$("#btn_LineEditorClose" + ln).prop('disabled', false);
	console.log("err_msg = "+err_msg);
	occur_error(err_msg);
}// end function check_subnet_ip


function occur_error(err_msg,ln){
	
	if (err_msg != "") {
		add_error_style('EditView', 'line_ip_subnet[' + ln + ']',
				SUGAR.language.get('app_strings',
						'LBL_EMAIL_ERROR_GENERAL_TITLE')
						+ ": " + err_msg);
		$("#btn_LineEditorClose" + ln).prop('disabled', true);
		$("#btn_LineEditorClose" + ln).hide();

		BootstrapDialog.alert({
					type : BootstrapDialog.TYPE_DANGER,
					title : SUGAR.language.get('app_strings',
							'LBL_EMAIL_ERROR_GENERAL_TITLE'),
					message : err_msg
				});
		$("#SAVE_HEADER").prop('disabled', true);
		$("#SAVE_HEADER").addClass('disabled');
	} else {
		$("#SAVE_HEADER").prop('disabled', false);
		$("#SAVE_HEADER").removeClass('disabled');
	}
	
}
/**
 * 将当前IP的关联信息，绘制在界面上
 * 
 * @ipval,desc_obj
 */
function show_ip_desc(ip_val, desc_obj) {
	ip_splited = ip_val.split("/");
	if (IpSubnetCalculator.isIp(ip_splited[0]) && ip_splited[1] <= 32
			&& ip_splited[1] >= 0) {
		var ip_caled = IpSubnetCalculator.calculateSubnetMask(ip_splited[0],
				ip_splited[1])
		// console.log(ip_caled);
		desc_obj.html("-----<br/>"
				+ SUGAR.language.get('HIT_IP', 'LBL_IP_NETMASK') + " <strong>"
				+ ip_caled.prefixMaskStr + "</strong><br/>"
				+ SUGAR.language.get('HIT_IP', 'LBL_IP_FIRST') + " <strong>"
				+ ip_caled.ipLowStr + "</strong><br/>"
				+ SUGAR.language.get('HIT_IP', 'LBL_IP_LAST') + " <strong>"
				+ ip_caled.ipHighStr + "</strong><br/>"
				+ SUGAR.language.get('HIT_IP', 'LBL_IP_COUNT') + " <strong>"
				+ Math.pow(2, ip_caled.invertedSize) + "</strong>");
	} else {
		desc_obj.html("");
	}
};

/*
 * function getPopListValue(id,ln){ $.ajax({ url:
 * 'index.php?to_pdf=true&module=HIT_IP_Subnets&action=getListFields&id=' +
 * id+"&prodln="+selectIn, success: function (data) { var html=""; html=data;
 * console.log(html); $("#line_ip_back_type"+selectIn).after(html);
 * $("#line_ip_back_type"+selectIn).hide(); }, error: function () { //失败
 * alert('Error loading document'); } }); };
 */

 
function getPopListValue(id,ln){ 
  $.ajax(
  	{ 
     url:'index.php?to_pdf=true&module=HIT_IP_Subnets&action=getPurposeListField&id=' +  id+"&prodln="+ln,
     success: function (data) { 
          var html="";
          html=data;
          //console.log(html); 
        $("#line_purpose"+ln).remove(); 
		if($("line_purpose"+ln).length==0){
		  $("#line_purpose_label"+ln).after(html);
		}
    	
    }, 
    error: function () { //失败
					alert('Error loading document'); 
					} 
	}); 
  };
  
  
function checkEnableSeperateAsign(ln) {
	console.log("line_name = " + $("#line_name" + ln).val());
	if ($("#line_ip_type" + ln).is(':checked')) {
		// console.log("checked");
		$("#line_ip_type" + ln).attr("checked", 'true');
		$("#line_ip_type" + ln).val("0");
		$("#line_ip_type_val" + ln).val("0");
		$("#input_group_acc_ip" + ln).show();
		$("#displayed_line_name" + ln).css("color", "#000");
		addToValidate('EditView', 'line_name' + ln, 'varchar', 'true',
			SUGAR.language.get('HIT_IP_Subnets', 'LBL_NAME'));
			//check_subnet_ip(ln);
	} else {
		// console.log("unchecked");
		$("#line_ip_type" + ln).removeAttr("checked");
		$("#line_ip_type" + ln).val("1");
		$("#line_ip_type_val" + ln).val("1");
		// if($("#line_name"+ln).val()==""){
		// $("#line_name"+ln).val($("#line_ip_subnet"+ln).val());//如果不可以散U分配，则精确IP与子网IP相同
		// }
		$("#input_group_acc_ip" + ln).hide();
		$("#displayed_line_name" + ln).css("color", "#ccc");
		removeFromValidate('EditView', 'line_name' + ln);
	}

	// modified by yuan.chen 2016-11-12
	// 将C段复制给name并且取得后缀
	/**
	 * 获取C段最后一个/的位置 以此为终点 取得的字符串
	 * 
	 */

	var parent_ip = $("#line_ip_subnet" + ln).val();
	var last_index = parent_ip.indexOf("\/");
	var true_parent_ip = "";
	if ($("#line_name" + ln).val() == "") {
		true_parent_ip = parent_ip.substr(0, last_index);
	} else {
		true_parent_ip = $("#line_name" + ln).val();
	}
	$("#line_name" + ln).val(true_parent_ip);
	console.log("true_ip=" + true_parent_ip+"last_index = "+last_index);

}

function show_ip_subnet_ojb(ln) {
	//if ($("#line_name" + ln).val() == "") {
	//	$("#line_name" + ln).val($("#line_ip_subnet" + ln).val());
	//}
	show_ip_desc($("#line_ip_subnet" + ln).val(), $("#line_ip_subnet" + ln
					+ "_ip_desc"));
	show_ip_desc($("#line_name" + ln).val(), $("#line_name" + ln + "_ip_desc"));
	console.log("show_ip_subnet_ojb"+$("#line_hat_asset_locations_id" + ln).val());
	// console.log($("#line_hat_asset_locations_id"+ln).val()+":"+($("#line_hat_asset_locations_id"+ln).val()==""));
	if ($("#line_hat_asset_locations_id" + ln).val() == ""&&$("#hat_asset_locations_id").val()!="") {// 将位置从头复制到行上
		$("#line_hat_asset_locations_id" + ln).val($("#hat_asset_locations_id")
				.val());
		$("#line_location" + ln).val($("#location").val())
	}

	check_subnet_ip(ln);

	console.log("show_ip_subnet_ojb = " + $("#line_ip_type_val" + ln).val());
	if ($("#line_ip_type_val" + ln).val() == "0") {
		console.log("line_ip_type111 =" + $("#line_ip_type" + ln).val());
		$("#displayed_line_ip_type" + ln).attr("checked", true);
		$("#displayed_line_ip_type" + ln).prop("checked", true);
		document.getElementById("displayed_line_ip_type" + ln).checked = true;
	} else {
		$("#displayed_line_ip_type" + ln).removeAttr("checked");
	}

}

function show_ip_desc_ojb(ln) {
	show_ip_desc($("#line_name" + ln).val(), $("#line_name" + ln + "_ip_desc"));
	check_subnet_ip(ln);
}

function openVLANPopup(ln) { // 在行上选择了From Location
	lineno = ln;
	var popupRequestData = {
		"call_back_function" : "set_return",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"name" : "line_vlan" + ln,
			"id" : "line_vlan_id" + ln
		}
	};
	open_popup('HIT_VLAN', 1000, 850, '', true, true, popupRequestData);
}

function openLocationPopup(ln) { // 在行上选择了From Location
	lineno = ln;
	var popupRequestData = {
		"call_back_function" : "set_main_sites_return",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"name" : "line_location" + ln,
			"id" : "line_hat_asset_locations_id" + ln
		}
	};
	var popupFilter = '&site_type=D';
	open_popup('HAM_Maint_Sites', 1000, 850, popupFilter, true, true,
			popupRequestData);
}

function set_main_sites_return(popupReplyData){
	set_return(popupReplyData);
}

function openOrgPopup(ln) { // 在行上选择了From Location
	lineno = ln;
	var popupRequestData = {
		"call_back_function" : "set_return",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"name" : "line_org" + ln,
			"id" : "line_org_id" + ln
		}
	};
	open_popup('Accounts', 1000, 850, '', true, true, popupRequestData);
}
function openMassOrgPopup(ln) { // 在行上选择了From Location
	lineno = ln;
	var popupRequestData = {
		"call_back_function" : "set_return",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"name" : "mass_org" + ln,
			"id" : "mass_org_id" + ln
		}
	};
	open_popup('Accounts', 1000, 850, '', true, true, popupRequestData);
}

function selectAllClicked(obj) {
	if (obj.checked) {
		// console.log("select all")
		for (var i = 0; i < prodln; i++) {
			($("#selectLineClicked" + i).prop("checked", true))
			$("#selectLineClicked" + i).parent()
					.css("background-Color", "#888");
		}
	} else {
		for (var i = 0; i < prodln; i++) {
			($("#selectLineClicked" + i).prop("checked", false))
			$("#selectLineClicked" + i).parent().css("background-Color", "");
		}
	}
}

function selectLineClicked(obj) {
	if (obj.checked) {
		console.log("select a line")
		$(obj).parent().css("background-Color", "#888");
	} else {
		console.log("unselect a line")
		$(obj).parent().css("background-Color", "");
	}
}

function insertTransLineHeader(tableid) {
	$("#line_items_label").hide();// 隐藏SugarCRM字段

	tablehead = document.createElement("thead");
	tablehead.id = tableid + "_head";
	tablehead.style.display = "none";
	document.getElementById(tableid).appendChild(tablehead);

	var x = tablehead.insertRow(-1);
	x.id = 'Trans_line_head';
	var aa = x.insertCell(0);
	aa.innerHTML = '<input type="checkbox" id="selectAll" onclick="selectAllClicked(this)">';
	var a = x.insertCell(1);
	a.innerHTML = '#';
	var b = x.insertCell(2);
	b.innerHTML = SUGAR.language.get('HIT_IP_Subnets', 'LBL_IP_SUBNET');
	var c = x.insertCell(3);
	c.innerHTML = SUGAR.language.get('HIT_IP_Subnets', 'LBL_IP_TYPE');
	var d = x.insertCell(4);
	d.innerHTML = SUGAR.language.get('HIT_IP_Subnets', 'LBL_NAME');
	var e = x.insertCell(5);
	e.innerHTML = SUGAR.language.get('HIT_IP_Subnets', 'LBL_NETMASK');
	var f = x.insertCell(6);
	f.innerHTML = SUGAR.language.get('HIT_IP_Subnets', 'LBL_LOWEST');
	var g = x.insertCell(7);
	g.innerHTML = SUGAR.language.get('HIT_IP_Subnets', 'LBL_HIGHEST');
	var h = x.insertCell(8);
	h.innerHTML = SUGAR.language.get('HIT_IP_Subnets', 'LBL_QTY');
	/*
	 * var f=x.insertCell(8); f.innerHTML=SUGAR.language.get('HIT_IP_Subnets',
	 * 'LBL_VLAN'); var g=x.insertCell(9);
	 * g.innerHTML=SUGAR.language.get('HIT_IP_Subnets', 'LBL_TUNNEL');
	 */
	var j = x.insertCell(9);
	j.innerHTML = SUGAR.language.get('HIT_IP_Subnets', 'LBL_GATEWAY');
	
	var i1 = x.insertCell(10);
	i1.innerHTML = SUGAR.language.get('HIT_IP_Subnets', 'LBL_PURPOSE');
	
	var i = x.insertCell(11);
	i.innerHTML = SUGAR.language.get('HIT_IP_Subnets', 'LBL_DESCRIPTION');

	var i = x.insertCell(12);
	i.innerHTML = SUGAR.language.get('HIT_IP_Subnets', 'LBL_LOCATION');

	var k = x.insertCell(13);
	k.innerHTML = SUGAR.language.get('HIT_IP_Subnets', 'LBL_ORGANIZATION');

	var l = x.insertCell(14);
	l.innerHTML = SUGAR.language.get('HIT_IP_Subnets', 'LBL_STATUS');

	var l = x.insertCell(15);
	l.innerHTML = " ";

}

function insertLineData(hit_ip_subnets, current_view) { // 将数据写入到对应的行字段中
	console.log(hit_ip_subnets);
	var ln = 0;
	if (hit_ip_subnets.id != '0' && hit_ip_subnets.id !== '') {
		ln = insertTransLineElements("lineItems", current_view);
		$("#line_id".concat(String(ln))).val(hit_ip_subnets.id);
		$("#line_ip_subnet".concat(String(ln))).val(hit_ip_subnets.ip_subnet);
		/*
		 * $("#line_ip_netmask".concat(String(ln))).val(hit_ip_subnets.ip_netmask);
		 * $("#line_ip_highest".concat(String(ln))).val(hit_ip_subnets.ip_highest);
		 * $("#line_ip_lowest".concat(String(ln))).val(hit_ip_subnets.ip_lowest);
		 */$("#line_name".concat(String(ln))).val(hit_ip_subnets.name);
		$("#line_vlan".concat(String(ln))).val(hit_ip_subnets.vlan);
		$("#line_vlan_id".concat(String(ln))).val(hit_ip_subnets.vlan_id);
		$("#line_org".concat(String(ln))).val(hit_ip_subnets.org);
		$("#line_org_id".concat(String(ln))).val(hit_ip_subnets.org_id);
		$("#line_description".concat(String(ln)))
				.val(hit_ip_subnets.description);
		$("#line_purpose".concat(String(ln)))
				.val(hit_ip_subnets.purpose);	
		$("#line_location".concat(String(ln)))
				.val(hit_ip_subnets.location);		
		$("#line_tunnel".concat(String(ln))).val(hit_ip_subnets.tunnel);
		$("#line_ip_type".concat(String(ln))).val(hit_ip_subnets.ip_type);
		$("#line_gateway".concat(String(ln))).val(hit_ip_subnets.gateway);
		$("#line_ip_type_val".concat(String(ln))).val(hit_ip_subnets.ip_type);
		$("#line_hat_asset_locations_id".concat(String(ln))).val(hit_ip_subnets.hat_asset_locations_id);
		renderTransLine(ln);

		resetItem(ln);
	}
}

function insertTransLineElements(tableid, current_view) { // 创建界面要素
// 包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面

	if (document.getElementById(tableid + '_head') !== null) {
		document.getElementById(tableid + '_head').style.display = "";
	}

	tablebody = document.createElement("tbody");
	tablebody.id = "line_body" + prodln;
	document.getElementById(tableid).appendChild(tablebody);

	var z1 = tablebody.insertRow(-1);
	z1.id = 'subnets_line_displayed' + prodln;
	z1.className = 'oddListRowS1';
	z1.innerHTML = "<td><input id='selectLineClicked"
			+ prodln
			+ "' type='checkbox' onclick='selectLineClicked(this)'></td>"
			+ "<td><span name='displayed_line_num["
			+ prodln
			+ "]' id='displayed_line_num"
			+ prodln
			+ "'>1</span></td>"
			+ "<td><span name='displayed_line_ip_subnet["
			+ prodln
			+ "]' id='displayed_line_ip_subnet"
			+ prodln
			+ "'></span></td>"
			+ "<td><input type='checkbox' disabled='true'  name='displayed_line_ip_type["
			+ prodln
			+ "]' id='displayed_line_ip_type"
			+ prodln
			+ "'></input></td>"
			+ "<td><span name='displayed_line_name["
			+ prodln
			+ "]' id='displayed_line_name"
			+ prodln
			+ "'></span></td>"
			+ "<td><span name='displayed_line_ip_netmask["
			+ prodln
			+ "]' id='displayed_line_ip_netmask"
			+ prodln
			+ "'></span></td>"
			+ "<td><span name='displayed_line_ip_lowest["
			+ prodln
			+ "]' id='displayed_line_ip_lowest"
			+ prodln
			+ "'></span></td>"
			+ "<td><span name='displayed_line_ip_highest["
			+ prodln
			+ "]' id='displayed_line_ip_highest"
			+ prodln
			+ "'></span></td>"
			+ "<td><span name='displayed_line_ip_qty["
			+ prodln
			+ "]' id='displayed_line_ip_qty"
			+ prodln
			+ "'></span></td>"
			+
			// remvoed 20161102 按马丁提出的需求，将2个字段先隐藏
			/*
			 * "<td><span name='displayed_line_vlan[" + prodln + "]'
			 * id='displayed_line_vlan" + prodln + "'></span></td>"+ "<td><span
			 * name='displayed_line_tunnel[" + prodln + "]'
			 * id='displayed_line_tunnel" + prodln + "'></span></td>" +
			 */
			"<td><span name='displayed_line_gateway[" + prodln
			+ "]' id='displayed_line_gateway" + prodln + "'></span></td>"
			+ "<td><span name='displayed_line_purpose[" + prodln
			+ "]' id='displayed_line_purpose" + prodln + "'></span></td>"
			+ "<td><span name='displayed_line_description[" + prodln
			+ "]' id='displayed_line_description" + prodln + "'></span></td>"
			+ "<td><span name='displayed_line_location[" + prodln
			+ "]' id='displayed_line_location" + prodln + "'></span></td>"
			+ "<td><span name='displayed_line_organization[" + prodln
			+ "]' id='displayed_line_organization" + prodln + "'></span></td>"
			+ "<td><span name='displayed_line_status[" + prodln
			+ "]' id='displayed_line_status" + prodln + "'></span></td>"
			+ "<td>"

	if (current_view == "EditView") {
		z1.innerHTML += "<input type='button' value='"
				+ SUGAR.language.get('app_strings', 'LBL_EDITINLINE')
				+ "' class='button'  id='btn_edit_line" + prodln
				+ "' onclick='LineEditorShow(" + prodln + ")'>";
	}
	"</td>";

	var x = tablebody.insertRow(-1); // 以下生成的是Line Editor
	x.id = 'trans_editor' + prodln;
	x.style = "display:none";

	x.innerHTML = "<td colSpan='13'><div class='lineEditor'>"
			+ "<span class='input_group'>"
			+ "<label>"
			+ SUGAR.language.get('HIT_IP_Subnets', 'LBL_IP_SUBNET')
			+ "<span class='required'>*</span></label>"
			+ "<input class='sqsEnabled' autocomplete='off' type='text' style='width:113px;' name='line_ip_subnet["
			+ prodln
			+ "]' id='line_ip_subnet"
			+ prodln
			+ "' value='' title='' onblur='show_ip_subnet_ojb("
			+ prodln
			+ ")'>"
			+ "<span class='input_mask'>"
			+ SUGAR.language.get('HIT_IP', 'LBL_NAME_DESC')
			+ "</span>"
			+ "<span class='input_desc' name='line_ip_subnet["
			+ prodln
			+ "]_ip_desc' id='line_ip_subnet"
			+ prodln
			+ "_ip_desc' ></span>"
			+ "</span>"
			+

			"<span class='input_group '>"
			+ "<label>"
			+ SUGAR.language.get('HIT_IP_Subnets', 'LBL_IP_TYPE')
			+ " </label>"
			+
			// "<select style='width:153px;' name='line_ip_back_type[" + prodln
			// + "]' id='line_ip_back_type" + prodln + "' maxlength='50'
			// value='' title='"+SUGAR.language.get('HIT_IP_Subnets',
			// 'LBL_IP_TYPE')+"'></select>"+
			"<input name='line_ip_type["
			+ prodln
			+ "]'  type='checkbox' id='line_ip_type"
			+ prodln
			+ "'  value='' title='"
			+ SUGAR.language.get('HIT_IP_Subnets', 'LBL_IP_TYPE')
			+ "' onclick=checkEnableSeperateAsign("
			+ prodln
			+ ")></input>"
			+ "</span>"
			+

			"<span class='input_group' id='input_group_acc_ip"
			+ prodln
			+ "'>"
			+ "<label>"
			+ SUGAR.language.get('HIT_IP_Subnets', 'LBL_NAME')
			+ "<span class='required'>*</span></label>"
			+ "<input class='sqsEnabled' autocomplete='off' type='text' style='width:113px;' name='line_name["
			+ prodln
			+ "]' id='line_name"
			+ prodln
			+ "' value='' title=''  onblur='show_ip_desc_ojb("
			+ prodln
			+ ")'>"
			+ "<span class='input_mask'>"
			+ SUGAR.language.get('HIT_IP', 'LBL_NAME_DESC')
			+ "</span>"
			+ "<span class='input_desc' name='line_name["
			+ prodln
			+ "]_ip_desc' id='line_name"
			+ prodln
			+ "_ip_desc' ></span>"
			+ "</span><hr/>"
			+ "<span class='input_group'>"
			+ "<label id='line_purpose_label"+prodln+"'>"
			+ SUGAR.language.get('HIT_IP_Subnets', 'LBL_PURPOSE')
			+ "</label>"
			+ "<input  autocomplete='off' type='text' style='width:153px;' name='line_purpose["
			+ prodln
			+ "]' id='line_purpose"
			+ prodln
			+ "' value='' title='' onblur='resetItem("
			+ prodln
			+ ")'>"
			+ "</span>"
			
			+ "<span class='input_group'>"
			+ "<label>"
			+ SUGAR.language.get('HIT_IP_Subnets', 'LBL_DESCRIPTION')
			+ "</label>"
			+ "<input  autocomplete='off' type='text' style='width:153px;' name='line_description["
			+ prodln
			+ "]' id='line_description"
			+ prodln
			+ "' value='' title='' onblur='resetItem("
			+ prodln
			+ ")'>"
			+ "</span>"
			
			+
			/*
			 * "<span class='input_group'>"+ "<label id='line_vlan" + prodln +
			 * "_label'>"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_VLAN')+"</label>"+ "<input
			 * class='sqsEnabled' style='width:153px;' autocomplete='off'
			 * type='text' name='line_vlan[" + prodln + "]' id='line_vlan" +
			 * prodln + "' value='' title='' >"+ "<input type='hidden'
			 * name='line_vlan_id[" + prodln + "]' id='line_vlan_id" + prodln + "'
			 * value='' />"+ "<button title='" +
			 * SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "'
			 * accessKey='" + SUGAR.language.get('app_strings',
			 * 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116'
			 * class='button' value='" + SUGAR.language.get('app_strings',
			 * 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1'
			 * onclick='openVLANPopup(" + prodln + ");'><img
			 * src='themes/default/images/id-ff-select.png' alt='" +
			 * SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') +
			 * "'></button>"+ "</span>"+ "<span class='input_group'>"+ "<label>"+SUGAR.language.get('HIT_IP_Subnets',
			 * 'LBL_TUNNEL')+" </label>"+ "<input style='width:153px;'
			 * autocomplete='off' type='text' name='line_tunnel[" + prodln + "]'
			 * id='line_tunnel" + prodln + "' maxlength='50' value=''
			 * title=''>"+ "</span>"+
			 */
			"<span class='input_group'>"
			+ "<label id='line_vlan"
			+ prodln
			+ "_label'>"
			+ SUGAR.language.get('HIT_IP_Subnets', 'LBL_LOCATION')
			+ "</label>"
			+ "<input class='sqsEnabled' style='width:153px;' autocomplete='off' type='text' name='line_location["
			+ prodln
			+ "]' id='line_location"
			+ prodln
			+ "' value='' title='' >"
			+ "<input type='hidden' name='line_hat_asset_locations_id["
			+ prodln
			+ "]' id='line_hat_asset_locations_id"
			+ prodln
			+ "' value='' />"
			+ "<button title='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE')
			+ "' accessKey='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY')
			+ "' type='button' tabindex='116' class='button' value='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "' name='btn1' onclick='openLocationPopup("
			+ prodln
			+ ");'><img src='themes/default/images/id-ff-select.png' alt='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "'></button>"
			+ "</span>"
			+

			"<span class='input_group'>"
			+ "<label id='line_vlan"
			+ prodln
			+ "_label'>"
			+ SUGAR.language.get('HIT_IP_Subnets', 'LBL_ORGANIZATION')
			+ "</label>"
			+ "<input class='sqsEnabled' style='width:153px;' autocomplete='off' type='text' name='line_org["
			+ prodln
			+ "]' id='line_org"
			+ prodln
			+ "' value='' title='' >"
			+ "<input type='hidden' name='line_org_id["
			+ prodln
			+ "]' id='line_org_id"
			+ prodln
			+ "' value='' />"
			+ "<button title='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE')
			+ "' accessKey='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY')
			+ "' type='button' tabindex='116' class='button' value='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "' name='btn1' onclick='openOrgPopup("
			+ prodln
			+ ");'><img src='themes/default/images/id-ff-select.png' alt='"
			+ SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL')
			+ "'></button>"
			+ "</span>"
			+
			// add by yuan.chen
			"</span>"
			+ "</span>"
			+ "<span class='input_group'>"
			+ "<label>"
			+ SUGAR.language.get('HIT_IP_Subnets', 'LBL_GATEWAY')
			+ " </label>"
			+ "<input style='width:153px;'  autocomplete='off' type='text' name='line_gateway["
			+ prodln + "]' id='line_gateway" + prodln
			+ "' maxlength='50' value='' title=''>" + "</span>" +

			"<input type='hidden' name='line_deleted[" + prodln
			+ "]' id='line_deleted" + prodln + "' value='0'>"
			+ "<input type='hidden' name='line_id[" + prodln + "]' id='line_id"
			+ prodln + "' value=''>"
			+ "<input type='hidden' name='line_ip_type_val[" + prodln
			+ "]' id='line_ip_type_val" + prodln + "' value=''>"
			+ "<input type='hidden' name='line_ip_netmask[" + prodln
			+ "]' id='line_ip_netmask" + prodln + "' value=''>"
			+ "<input type='hidden' name='line_ip_highest[" + prodln
			+ "]' id='line_ip_highest" + prodln + "' value=''>"
			+ "<input type='hidden' name='line_ip_lowest[" + prodln
			+ "]' id='line_ip_lowest" + prodln + "' value=''>"
			+ "<input type='hidden' name='line_ip_qty[" + prodln
			+ "]' id='line_ip_qty" + prodln + "' value=''>" +

			"<input type='button' id='line_delete_line" + prodln
			+ "' class='button btn_del' value='"
			+ SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE')
			+ "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln
			+ ",\"line_\")'>" + "<button type='button' id='btn_LineEditorClose"
			+ prodln + "' class='button btn_save' value='"
			+ SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')
			+ "' tabindex='116' onclick='LineEditorClose(" + prodln
			+ ",\"line_\")'>"
			+ SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')
			+ " & " + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')
			+ " <img src='themes/default/images/id-ff-clear.png' alt='"
			+ SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE')
			+ "'></button>" + "</div></td>";

	addToValidate('EditView', 'line_name' + prodln, 'varchar', 'true',
			SUGAR.language.get('HIT_IP_Subnets', 'LBL_NAME'));

	renderTransLine(prodln);

	prodln++;

	return prodln - 1;
}

function renderTransLine(ln) { // 将编辑器中的内容显示于正常行中
	// alert(("#displayed_line_num"+ln)+"="+
	// $("#displayed_line_num"+ln).html());
	//
	// console.log("renderTransLine"+ln);
	
	console.log("line_ip_type= " + $("#line_ip_type" + ln).val());
	if ($("#line_ip_type_val" + ln).val() == "0") {
		$("#displayed_line_ip_type" + ln).attr("checked", true);
		$("#displayed_line_ip_type" + ln).prop("checked", true);
		document.getElementById("displayed_line_ip_type" + ln).checked = true;

		$("#line_ip_type" + ln).attr("checked", true);
		$("#line_ip_type" + ln).prop("checked", true);
		document.getElementById("line_ip_type" + ln).checked = true;
	} else {
		$("#displayed_line_ip_type" + ln).removeAttr("checked");
		$("#line_ip_type" + ln).removeAttr("checked");
	}

	checkEnableSeperateAsign(ln);

	ip_splited = $("#line_name" + ln).val().split("/")
	if (IpSubnetCalculator.isIp(ip_splited[0]) && ip_splited[1] <= 32
			&& ip_splited[1] >= 0) {
		var ip_caled = IpSubnetCalculator.calculateSubnetMask(ip_splited[0],
				ip_splited[1])
		// 显示IP细节信息，由IpSubnetCalculator.js完成算法
		$("#displayed_line_ip_netmask" + ln).html(ip_caled.prefixMaskStr);
		$("#displayed_line_ip_lowest" + ln).html(ip_caled.ipLowStr);
		$("#displayed_line_ip_highest" + ln).html(ip_caled.ipHighStr);
		$("#displayed_line_ip_qty" + ln).html(Math
				.pow(2, ip_caled.invertedSize));
		// 对应的隐藏字段
		$("#line_ip_netmask" + ln).val(ip_caled.prefixMaskStr);
		$("#line_ip_lowest" + ln).val(ip_caled.ipLowStr);
		$("#line_ip_highest" + ln).val(ip_caled.ipHighStr);
		$("#line_ip_qty" + ln).val(Math.pow(2, ip_caled.invertedSize));

	}

	$("#displayed_line_ip_subnet" + ln).html("<strong>"
			+ $("#line_ip_subnet" + ln).val() + "</strong>");
	$("#displayed_line_name" + ln).html("<strong>" + $("#line_name" + ln).val()
			+ "</strong>");
	$("#displayed_line_vlan" + ln).html($("#line_vlan" + ln).val());
	$("#displayed_line_tunnel" + ln).html($("#line_tunnel" + ln).val());
	$("#displayed_line_description" + ln).html($("#line_description" + ln)
			.val());
	$("#displayed_line_location" + ln).html($("#line_location" + ln)
			.val());	
			
	$("#displayed_line_purpose" + ln).html($("#line_purpose" + ln)
			.val());
	//console.log(SUGAR.language.get("app_list_strings","hit_ip_purpose_list").INTERNET);
	$meaning = SUGAR.language.get("app_list_strings","hit_ip_purpose_list");
	var key = $("#line_purpose" + ln).val();
	$("#displayed_line_purpose" + ln).html($meaning[key]);	
			
	$("#displayed_line_gateway" + ln).html($("#line_gateway" + ln).val());
	$("#displayed_line_ip_type" + ln).html($("#line_ip_type" + ln).val());
	$("#displayed_line_location" + ln).html($("#line_location" + ln).val());

	if ($("#line_org" + ln).val() == "") {
		$("#displayed_line_organization" + ln).html(SUGAR.language.get(
				'HIT_IP_Subnets', 'LBL_UNASSIGNED'));
	} else {
		$("#displayed_line_organization" + ln).html($("#line_org" + ln).val());
	}

}

function resetItem(ln) { // 在用户重新选择IP之后，会连带的更新相关的字段信息。
	resetLineNum_Bold();
}

function insertTransLineFootor(tableid) {
	tablefooter = document.createElement("tfoot");
	document.getElementById(tableid).appendChild(tablefooter);

	var footer_row = tablefooter.insertRow(-1);
	var footer_cell = footer_row.insertCell(0);
	footer_cell.scope = "row";
	footer_cell.colSpan = "12";

	foot_html = "";
	foot_html += "<div style='text-align:left'>"
	foot_html += "<input id='btnAddNewLine' type='button' class='button' onclick='addNewLine(\""
			+ tableid
			+ "\")' value='+ "
			+ SUGAR.language.get('HIT_IP_Subnets', 'LBL_BTN_ADD_NEW_IP')
			+ "' />";
	/*
	 * foot_html += "<span class='input_group'>" + " <label id='mass_org_label" +
	 * prodln + "_label'>"+SUGAR.language.get('HIT_IP_Subnets',
	 * 'LBL_IP_MASS_ASIGN')+":</label>"+ "<input class='sqsEnabled'
	 * style='width:153px;' autocomplete='off' type='text' name='mass_org[" +
	 * prodln + "]' id='mass_org" + prodln + "' value='' title='' >"+ "<input
	 * type='hidden' name='line_vlan_id[" + prodln + "]' id='line_vlan_id" +
	 * prodln + "' value='' />"+ "<button title='" +
	 * SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "'
	 * accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "'
	 * type='button' tabindex='116' class='button' value='" +
	 * SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'
	 * name='btn1' onclick='openMassOrgPopup(" + prodln + ");'><img
	 * src='themes/default/images/id-ff-select.png' alt='" +
	 * SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+ "</span>";
	 * foot_html += "<input id='btnMassAsign' type='button' class='button'
	 * onclick='addNewLine(\"" +tableid+ "\")'
	 * value='"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_BTN_ASIGN_ORG')+"' />"
	 * foot_html += "<input id='btnMassAsign' type='button' class='button'
	 * onclick='addNewLine(\"" +tableid+ "\")'
	 * value='"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_BTN_UNASIGN_ORG')+"'
	 * />"
	 */foot_html += "</div>";
	footer_cell.innerHTML = foot_html;
}

function addNewLine(tableid) {
	// console.log(check_form('EditView'));
	//
	if (check_form('EditView')) {// 只有必须填写的字段都填写了才可以新增
		insertTransLineElements(tableid, 'EditView');// 加入新行
		LineEditorShow(prodln - 1); // 打开行编辑器
		// console.log("check_form OK");
	} else {
		// console.log("check_form failed");
	}
}

function btnMarkLineDeleted(ln, key) {// 删除当前行
	$("#SAVE_HEADER").prop('disabled', false);
	$("#SAVE_HEADER").removeClass('disabled');
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
}
function markLineDeleted(ln, key) {// 删除当前行

	// collapse line; update deleted value
	document.getElementById(key + 'body' + ln).style.display = 'none';
	document.getElementById(key + 'deleted' + ln).value = '1';
	document.getElementById(key + 'delete_line' + ln).onclick = '';

	if (typeof validate != "undefined"
			&& typeof validate['EditView'] != "undefined") {
		removeFromValidate('EditView', key + 'name' + ln);
	}
	// resetLineNum();

}

function LineEditorShow(ln) { // 显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
	if (prodln > 1) {
		for (var i = 0; i < prodln; i++) {
			LineEditorClose(i);
		}
	}

	show_ip_subnet_ojb(ln)// 显示IP附加信息

	$("#subnets_line_displayed" + ln).hide();
	getPopListValue($("#line_id"+ln).val(),ln);
	
	
	
	$("#trans_editor" + ln).show();
	// 渲染下拉列表框的值
	// 通过ajax获取
	

}

function LineEditorClose(ln) {// 关闭行编辑器（显示为正常行）
	if (check_form('EditView')) {
		$("#trans_editor" + ln).hide();
		$("#subnets_line_displayed" + ln).show();
		renderTransLine(ln);
		resetLineNum_Bold();
	}
}

function resetLineNum_Bold() {// 数行号
	var j = 0;
	for (var i = 0; i < prodln; i++) {
		if ($("#line_deleted" + i).val() != 1) {// 跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
			j = j + 1;
			$("#displayed_line_num" + i).text(j);
		}
	}
	// TODO：如果最终有效的行数，则将头标记为空
	// if (j==0) {}
}

// *********************************************************************
// 以下为公共的函数
// *********************************************************************
//
/*
 * function mark_field_disabled(field_name, hide_bool) { mark_obj =
 * $("#"+field_name); mark_obj_lable = $("#"+field_name+"_label");
 * 
 * if(hide_bool==true) { mark_obj.css({"display":"none"});
 * mark_obj_lable.css({"display":"none"}); }else{
 * mark_obj.css({"color":"#efefef","background-Color":"#efefef;"});
 * mark_obj.attr("readonly",true);
 * mark_obj_lable.css({"color":"#aaaaaa","text-decoration":"line-through"}); }
 * if (typeof validate != "undefined" && typeof validate['EditView'] !=
 * "undefined") { removeFromValidate('EditView',field_name); //去除必须验证 }
 * $("#"+field_name+"_label .required").hide();
 * 
 * if (typeof $("#btn_"+field_name)!= 'undefined') {
 * $("#btn_"+field_name).css({"visibility":"hidden"}); } if (typeof
 * $("#btn_clr_"+field_name)!= 'undefined') {
 * $("#btn_clr_"+field_name).css({"visibility":"hidden"}); } //消除已经填写的数据
 * $("#"+field_name).val(""); if (typeof $("#"+field_name+"_id")!= 'undefined') {
 * $("#"+field_name+"_id").val(""); } }
 */
/*
 * function mark_field_enabled(field_name,not_required_bool) { //field_name =
 * 字段名，不需要jquery select标志，直接写名字
 * //not_required_bool如果为空或没有明确定义为true的话，字段为必须输入。如果=ture则为非必须
 * //alert(required_bool);
 * 
 * $("#"+field_name).css({"color":"#000000","background-Color":"#ffffff"});
 * $("#"+field_name).attr("readonly",false);
 * $("#"+field_name+"_label").css({"color":"#000000","text-decoration":"none"})
 * 
 * if(typeof not_required_bool == "undefined" || not_required_bool==false ||
 * not_required_bool=="") { addToValidate('EditView', field_name,'varchar',
 * 'true', $("#"+field_name+"_label").text());//将当前字段标记为必须验证 //打上必须星标 if
 * ($("#"+field_name+"_label .required").text()!='*') {//如果没有星标，则打上星标
 * $("#"+field_name+"_label").html($("#"+field_name+"_label").text()+"<span
 * class='required'>*</span>");//打上星标 } else {//如果已经有星标了，则显示出来
 * $("#"+field_name+"_label .required").show(); } } else { //如果不是必须的，则不显示星标
 * removeFromValidate('EditView',field_name); //去除必须验证 $("#"+field_name+"_label
 * .required").hide(); } if (typeof $("#btn_"+field_name)!= 'undefined')
 * {//移除选择按钮 $("#btn_"+field_name).css({"visibility":"visible"}); } if (typeof
 * $("#btn_clr_"+field_name)!= 'undefined') {//移除清空按钮
 * $("#btn_clr_"+field_name).css({"visibility":"visible"}); } }
 */