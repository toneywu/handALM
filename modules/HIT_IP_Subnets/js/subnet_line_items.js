$.getScript("cache/include/javascript/sugar_grp_yui_widgets.js"); //MessageBox
$.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js"); 

var prodln = 0;
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function show_ip_desc(ip_val,desc_obj) {
  ip_splited = ip_val.split("/");
  if ( IpSubnetCalculator.isIp(ip_splited[0])&&ip_splited[1]<=32&&ip_splited[1]>=0) {
    var ip_caled = IpSubnetCalculator.calculateSubnetMask(ip_splited[0],ip_splited[1])
    //console.log(ip_caled);
    desc_obj.html("-----<br/>"
                + SUGAR.language.get('HIT_IP', 'LBL_IP_NETMASK')+" <strong>"+ip_caled.prefixMaskStr + "</strong><br/>" 
                          + SUGAR.language.get('HIT_IP', 'LBL_IP_FIRST')+" <strong>"+ip_caled.ipLowStr + "</strong><br/>" 
                          + SUGAR.language.get('HIT_IP', 'LBL_IP_LAST')+" <strong>"+ip_caled.ipHighStr + "</strong><br/>" 
                          + SUGAR.language.get('HIT_IP', 'LBL_IP_COUNT')+" <strong>"+Math.pow(2,ip_caled.invertedSize)+"</strong>");
   } else {
    desc_obj.html("");
   }
};

/**
 * 点击按钮 调用Ajax请求 获取list里面根据工单状态应该显示的value
 * @param name
 */
/*function getPopListValue(id,selectIn){
		$.ajax({
			url: 'index.php?to_pdf=true&module=HIT_IP_Subnets&action=getListFields&id=' + id+"&prodln="+selectIn,
			success: function (data) {
				var html="";
				html=data;
				console.log(html);
				$("#line_ip_back_type"+selectIn).after(html);
				$("#line_ip_back_type"+selectIn).hide();
			},
			error: function () { //失败
				alert('Error loading document');
			}
		});
};
*/

function selectedLine(selectIn){
	
	if($("#line_ip_type"+selectIn).is(':checked')){
		console.log("checked");
		$("#line_ip_type"+selectIn).attr("checked",'true');
		$("#line_ip_type"+selectIn).val("0");
		$("#line_ip_type_val"+selectIn).val("0");
		//$("#line_ip_type"+selectIn).prop( "checked", true );
		//$("#displayed_line_ip_type"+ln).attr("checked","true");
	}else{
		console.log("unchecked");
		$("#line_ip_type"+selectIn).removeAttr("checked");
		$("#line_ip_type"+selectIn).val("1");
		$("#line_ip_type_val"+selectIn).val("1");
		//$("#line_ip_type"+selectIn).prop( "checked", false );
		//$("#displayed_line_ip_type"+ln).removeAttr("checked");
	}
	
}

function show_ip_subnet_ojb(ln) {
  	$("#line_name"+ln).val($("#line_ip_subnet"+ln).val());
  	show_ip_desc($("#line_ip_subnet"+ln).val(),$("#line_ip_subnet"+ln+"_ip_desc"));
  	show_ip_desc($("#line_name"+ln).val(),$("#line_name"+ln+"_ip_desc"));
}

function show_ip_desc_ojb(obj) {
  show_ip_desc(obj.value,$("#"+obj.id+"_ip_desc"));
}

function openVLANPopup(ln){ //在行上选择了From Location
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_vlan" + ln,
      "id" : "line_vlan_id" + ln,
    }
  };
  open_popup('HIT_VLAN', 1000, 850, '', true, true, popupRequestData);
}

function openOrgPopup(ln){ //在行上选择了From Location
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_org" + ln,
      "id" : "line_org_id" + ln,
    }
  };
  open_popup('Accounts', 1000, 850, '', true, true, popupRequestData);
}
function openMassOrgPopup(ln){ //在行上选择了From Location
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "mass_org" + ln,
      "id" : "mass_org_id" + ln,
    }
  };
  open_popup('Accounts', 1000, 850, '', true, true, popupRequestData);
}


function selectAllClicked(obj) {
  if(obj.checked) {
      //console.log("select all")
      for (var i=0;i<prodln;i++) {
          ($("#selectLineClicked"+i).prop( "checked", true ))
          $("#selectLineClicked"+i).parent().css("background-Color","#888");
      }
    } else {
      for (var i=0;i<prodln;i++) {
          ($("#selectLineClicked"+i).prop( "checked", false ))
          $("#selectLineClicked"+i).parent().css("background-Color","");
      }
    }
}

function selectLineClicked(obj) {
  if(obj.checked) {
      console.log("select a line")
      $(obj).parent().css("background-Color","#888");
    } else {
      console.log("unselect a line")
      $(obj).parent().css("background-Color","");
    }
}


function insertTransLineHeader(tableid){
  $("#line_items_label").hide();//隐藏SugarCRM字段

  tablehead = document.createElement("thead");
  tablehead.id = tableid +"_head";
  tablehead.style.display="none";
  document.getElementById(tableid).appendChild(tablehead);

  var x=tablehead.insertRow(-1);
  x.id='Trans_line_head';
  var aa=x.insertCell(0);
  aa.innerHTML='<input type="checkbox" id="selectAll" onclick="selectAllClicked(this)">';
  var a=x.insertCell(1);
  a.innerHTML='#';
  var b=x.insertCell(2);
  b.innerHTML=SUGAR.language.get('HIT_IP_Subnets', 'LBL_IP_SUBNET');
  var b=x.insertCell(3);
  b.innerHTML=SUGAR.language.get('HIT_IP_Subnets', 'LBL_NAME');
  var b1=x.insertCell(4);
  b1.innerHTML=SUGAR.language.get('HIT_IP_Subnets', 'LBL_NETMASK');
  var c=x.insertCell(5);
  c.innerHTML=SUGAR.language.get('HIT_IP_Subnets', 'LBL_LOWEST');
  var d=x.insertCell(6);
  d.innerHTML=SUGAR.language.get('HIT_IP_Subnets', 'LBL_HIGHEST');
  var e=x.insertCell(7);
  e.innerHTML=SUGAR.language.get('HIT_IP_Subnets', 'LBL_QTY');
  var f=x.insertCell(8);
  f.innerHTML=SUGAR.language.get('HIT_IP_Subnets', 'LBL_VLAN');
  var g=x.insertCell(9);
  g.innerHTML=SUGAR.language.get('HIT_IP_Subnets', 'LBL_TUNNEL');
  var h=x.insertCell(10);
  h.innerHTML=SUGAR.language.get('HIT_IP_Subnets', 'LBL_DESCRIPTION');
  var i=x.insertCell(11);
  i.innerHTML=SUGAR.language.get('HIT_IP_Subnets', 'LBL_IP_TYPE');
  var i1=x.insertCell(12);
  i1.innerHTML=SUGAR.language.get('HIT_IP_Subnets', 'LBL_GATEWAY');
  var i2=x.insertCell(13);
  i2.innerHTML=SUGAR.language.get('HIT_IP_Subnets', 'LBL_ORGANIZATION');
  var j=x.insertCell(14);
  j.innerHTML='&nbsp;';
}


function insertLineData(hit_ip_subnets, current_view){ //将数据写入到对应的行字段中
  console.log(hit_ip_subnets);
  var ln = 0;
  if(hit_ip_subnets.id != '0' && hit_ip_subnets.id !== ''){
    ln = insertTransLineElements("lineItems", current_view);
    $("#line_id".concat(String(ln))).val(hit_ip_subnets.id);
    $("#line_ip_subnet".concat(String(ln))).val(hit_ip_subnets.ip_subnet);
/*    $("#line_ip_netmask".concat(String(ln))).val(hit_ip_subnets.ip_netmask);
    $("#line_ip_highest".concat(String(ln))).val(hit_ip_subnets.ip_highest);
    $("#line_ip_lowest".concat(String(ln))).val(hit_ip_subnets.ip_lowest);
*/    $("#line_name".concat(String(ln))).val(hit_ip_subnets.name);
    $("#line_vlan".concat(String(ln))).val(hit_ip_subnets.vlan);
    $("#line_vlan_id".concat(String(ln))).val(hit_ip_subnets.vlan_id);
	$("#line_org".concat(String(ln))).val(hit_ip_subnets.org);
    $("#line_org_id".concat(String(ln))).val(hit_ip_subnets.org_id);
    $("#line_description".concat(String(ln))).val(hit_ip_subnets.description);
    $("#line_tunnel".concat(String(ln))).val(hit_ip_subnets.tunnel);
    $("#line_ip_type".concat(String(ln))).val(hit_ip_subnets.ip_type);
    $("#line_gateway".concat(String(ln))).val(hit_ip_subnets.gateway);
    $("#line_ip_type_val".concat(String(ln))).val(hit_ip_subnets.ip_type);


      renderTransLine(ln);

    resetItem(ln);
  }
}

function insertTransLineElements(tableid,current_view) { //创建界面要素
//包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面

  if (document.getElementById(tableid + '_head') !== null) {
    document.getElementById(tableid + '_head').style.display = "";
  }


  tablebody = document.createElement("tbody");
  tablebody.id = "line_body" + prodln;
  document.getElementById(tableid).appendChild(tablebody);


  var z1 = tablebody.insertRow(-1);
  z1.id = 'subnets_line_displayed' + prodln;
  z1.className = 'oddListRowS1';
  z1.innerHTML  =
  "<td><input id='selectLineClicked"+ prodln +"' type='checkbox' onclick='selectLineClicked(this)'></td>"+
  "<td><span name='displayed_line_num[" + prodln + "]' id='displayed_line_num" + prodln + "'>1</span></td>" +
  "<td><span name='displayed_line_ip_subnet[" + prodln + "]' id='displayed_line_ip_subnet" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_name[" + prodln + "]' id='displayed_line_name" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_ip_netmask[" + prodln + "]' id='displayed_line_ip_netmask" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_ip_lowest[" + prodln + "]' id='displayed_line_ip_lowest" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_ip_highest[" + prodln + "]' id='displayed_line_ip_highest" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_ip_qty[" + prodln + "]' id='displayed_line_ip_qty" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_vlan[" + prodln + "]' id='displayed_line_vlan" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_tunnel[" + prodln + "]' id='displayed_line_tunnel" + prodln + "'></span></td>" +
  "<td><span name='displayed_line_description[" + prodln + "]' id='displayed_line_description" + prodln + "'></span></td>" +
  //"<td><span name='displayed_line_ip_type[" + prodln + "]' id='displayed_line_ip_type" + prodln + "'></span></td>" +
  "<td><input type='checkbox' disabled='true'  name='displayed_line_ip_type[" + prodln + "]' id='displayed_line_ip_type" + prodln + "'></input></td>" +
  "<td><span name='displayed_line_gateway[" + prodln + "]' id='displayed_line_gateway" + prodln + "'></span></td>" +
  "<td><span name='displayed_line_organization[" + prodln + "]' id='displayed_line_organization" + prodln + "'></span></td>" +
  "<td>"

  if(current_view=="EditView") {
      z1.innerHTML+="<input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'>";
  }
  "</td>";

  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'trans_editor' + prodln;
  x.style = "display:none";

  x.innerHTML  = "<td colSpan='11'><div class='lineEditor'>"+
  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_IP_SUBNET')+"<span class='required'>*</span></label>"+
  "<input class='sqsEnabled' autocomplete='off' type='text' style='width:113px;' name='line_ip_subnet[" + prodln + "]' id='line_ip_subnet" + prodln + "' value='' title='' onblur='show_ip_subnet_ojb("+prodln+")'>"+
  "<span class='input_mask'>"+SUGAR.language.get('HIT_IP', 'LBL_NAME_DESC')+"</span>"+
  "<span class='input_desc' name='line_ip_subnet[" + prodln + "]_ip_desc' id='line_ip_subnet" + prodln + "_ip_desc' ></span>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_NAME')+"<span class='required'>*</span></label>"+
  "<input class='sqsEnabled' autocomplete='off' type='text' style='width:113px;' name='line_name[" + prodln + "]' id='line_name" + prodln + "' value='' title='' onblur='show_ip_desc_ojb(this)'>"+
  "<span class='input_mask'>"+SUGAR.language.get('HIT_IP', 'LBL_NAME_DESC')+"</span>"+
  "<span class='input_desc' name='line_name[" + prodln + "]_ip_desc' id='line_name" + prodln + "_ip_desc' ></span>"+
  "</span><hr/>"+
  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_DESCRIPTION')+"</label>"+
  "<input  autocomplete='off' type='text' style='width:153px;' name='line_description[" + prodln + "]' id='line_description" + prodln + "' value='' title='' onblur='resetItem("+prodln+")'>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label id='line_vlan" + prodln + "_label'>"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_VLAN')+"</label>"+
  "<input class='sqsEnabled' style='width:153px;' autocomplete='off' type='text' name='line_vlan[" + prodln + "]' id='line_vlan" + prodln + "' value='' title='' >"+
  "<input type='hidden' name='line_vlan_id[" + prodln + "]' id='line_vlan_id" + prodln + "' value='' />"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openVLANPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_TUNNEL')+" </label>"+
  "<input style='width:153px;'  autocomplete='off' type='text' name='line_tunnel[" + prodln + "]' id='line_tunnel" + prodln + "' maxlength='50' value='' title=''>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label id='line_vlan" + prodln + "_label'>"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_ORGANIZATION')+"</label>"+
  "<input class='sqsEnabled' style='width:153px;' autocomplete='off' type='text' name='line_org[" + prodln + "]' id='line_org" + prodln + "' value='' title='' >"+
  "<input type='hidden' name='line_org_id[" + prodln + "]' id='line_org_id" + prodln + "' value='' />"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openOrgPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+
  //add by yuan.chen
  "</span>"+
  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_IP_TYPE')+" </label>"+
  //"<select style='width:153px;' name='line_ip_back_type[" + prodln + "]' id='line_ip_back_type" + prodln + "' maxlength='50' value='' title='"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_IP_TYPE')+"'></select>"+
  "<input name='line_ip_type[" + prodln + "]'  type='checkbox' id='line_ip_type" + prodln + "'  value='' title='"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_IP_TYPE')+"' onclick=selectedLine("+prodln+")></input>"+
  "</span>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_GATEWAY')+" </label>"+
  "<input style='width:153px;'  autocomplete='off' type='text' name='line_gateway[" + prodln + "]' id='line_gateway" + prodln + "' maxlength='50' value='' title=''>"+
  "</span>"+

  "<input type='hidden' name='line_deleted[" + prodln + "]' id='line_deleted" + prodln + "' value='0'>"+
  "<input type='hidden' name='line_id[" + prodln + "]' id='line_id" + prodln + "' value=''>"+
  "<input type='hidden' name='line_ip_type_val[" + prodln + "]' id='line_ip_type_val" + prodln + "' value=''>"+
  "<input type='hidden' name='line_ip_netmask[" + prodln + "]' id='line_ip_netmask" + prodln + "' value=''>"+
  "<input type='hidden' name='line_ip_highest[" + prodln + "]' id='line_ip_highest" + prodln + "' value=''>"+
  "<input type='hidden' name='line_ip_lowest[" + prodln + "]' id='line_ip_lowest" + prodln + "' value=''>"+
  "<input type='hidden' name='line_ip_qty[" + prodln + "]' id='line_ip_qty" + prodln + "' value=''>"+

  "<input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
  "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>"+
  "</div></td>";

  addToValidate('EditView', 'line_name'+ prodln,'varchar', 'true',SUGAR.language.get('HIT_IP_Subnets', 'LBL_NAME'));

  renderTransLine(prodln);

  prodln++;

  return prodln - 1;
}

function renderTransLine(ln) { //将编辑器中的内容显示于正常行中
  //alert(("#displayed_line_num"+ln)+"="+ $("#displayed_line_num"+ln).html());
  //
	console.log("renderTransLine"+ln);
  ip_splited = $("#line_name"+ln).val().split("/")
  if ( IpSubnetCalculator.isIp(ip_splited[0])&&ip_splited[1]<=32&&ip_splited[1]>=0) {
	   var ip_caled = IpSubnetCalculator.calculateSubnetMask(ip_splited[0],ip_splited[1])
	    //显示IP细节信息，由IpSubnetCalculator.js完成算法
	   $("#displayed_line_ip_netmask"+ln).html(ip_caled.prefixMaskStr);
	   $("#displayed_line_ip_lowest"+ln).html(ip_caled.ipLowStr);
	   $("#displayed_line_ip_highest"+ln).html(ip_caled.ipHighStr);
	   $("#displayed_line_ip_qty"+ln).html(Math.pow(2,ip_caled.invertedSize));
     //对应的隐藏字段
     $("#line_ip_netmask"+ln).val(ip_caled.prefixMaskStr);
     $("#line_ip_lowest"+ln).val(ip_caled.ipLowStr);
     $("#line_ip_highest"+ln).val(ip_caled.ipHighStr);
     $("#line_ip_qty"+ln).val(Math.pow(2,ip_caled.invertedSize));

  }

  $("#displayed_line_ip_subnet"+ln).html("<strong>"+$("#line_ip_subnet"+ln).val()+"</strong>");
  $("#displayed_line_name"+ln).html("<strong>"+$("#line_name"+ln).val()+"</strong>");
  $("#displayed_line_vlan"+ln).html($("#line_vlan"+ln).val());
  $("#displayed_line_tunnel"+ln).html($("#line_tunnel"+ln).val());
  $("#displayed_line_description"+ln).html($("#line_description"+ln).val());
  $("#displayed_line_gateway"+ln).html($("#line_gateway"+ln).val());
  $("#displayed_line_ip_type"+ln).html($("#line_ip_type"+ln).val());

  if ($("#line_org"+ln).val()=="") {
    $("#displayed_line_organization"+ln).html(SUGAR.language.get('HIT_IP_Subnets', 'LBL_UNASSIGNED'));
  } else {
    $("#displayed_line_organization"+ln).html($("#line_org"+ln).val());
  }
  
  
  if ($("#line_ip_type_val"+ln).val()=="0") {
  	console.log("line_ip_type111 ="+$("#line_ip_type"+ln).val());
    $("#displayed_line_ip_type"+ln).attr("checked",true);
    $("#displayed_line_ip_type"+ln).prop("checked",true);
    document.getElementById("displayed_line_ip_type"+ln).checked = true;
  } 
  else {
  	console.log("line_ip_type2222 ="+$("#line_ip_type"+ln).val());
    $("#displayed_line_ip_type"+ln).removeAttr("checked");
  }
}


function resetItem(ln){ //在用户重新选择IP之后，会连带的更新相关的字段信息。
  resetLineNum_Bold();
}


function insertTransLineFootor(tableid)
{
  tablefooter = document.createElement("tfoot");
  document.getElementById(tableid).appendChild(tablefooter);

  var footer_row=tablefooter.insertRow(-1);
  var footer_cell = footer_row.insertCell(0);
  footer_cell.scope="row";
  footer_cell.colSpan="12";

  foot_html ="";
  foot_html += "<div style='text-align:left'>"
  foot_html += "<input id='btnAddNewLine' type='button' class='button' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HIT_IP_Subnets', 'LBL_BTN_ADD_NEW_IP')+"' />";
/*  foot_html += "<span class='input_group'>" +
  " <label id='mass_org_label" + prodln + "_label'>"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_IP_MASS_ASIGN')+":</label>"+
  "<input class='sqsEnabled' style='width:153px;' autocomplete='off' type='text' name='mass_org[" + prodln + "]' id='mass_org" + prodln + "' value='' title='' >"+
  "<input type='hidden' name='line_vlan_id[" + prodln + "]' id='line_vlan_id" + prodln + "' value='' />"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openMassOrgPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>";
  foot_html += "<input id='btnMassAsign' type='button' class='button' onclick='addNewLine(\"" +tableid+ "\")' value='"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_BTN_ASIGN_ORG')+"' />"
  foot_html += "<input id='btnMassAsign' type='button' class='button' onclick='addNewLine(\"" +tableid+ "\")' value='"+SUGAR.language.get('HIT_IP_Subnets', 'LBL_BTN_UNASIGN_ORG')+"' />"
 */ foot_html += "</div>";
  footer_cell.innerHTML=foot_html;
}

function addNewLine(tableid) {
  //console.log(check_form('EditView'));
  //
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增
    insertTransLineElements(tableid,'EditView');//加入新行
    LineEditorShow(prodln - 1);       //打开行编辑器
    //console.log("check_form OK");
  } else {
    //console.log("check_form failed");
  }
}

function btnMarkLineDeleted(ln, key) {//删除当前行
  YAHOO.SUGAR.MessageBox.show({
    msg: SUGAR.language.get('app_strings', 'NTC_DELETE_CONFIRMATION'), title: 'Alert', type: 'confirm',
    icon:'ICON_ALARM',
    fn: function (confirm) {
      if (confirm == 'yes') {
        markLineDeleted(ln, key);
        LineEditorClose(ln);
      }
      if (confirm == 'no') {
        //do something if 'No' was clicked
      }
    }
  })
}
function markLineDeleted(ln, key) {//删除当前行

  // collapse line; update deleted value
  document.getElementById(key + 'body' + ln).style.display = 'none';
  document.getElementById(key + 'deleted' + ln).value = '1';
  document.getElementById(key + 'delete_line' + ln).onclick = '';

  if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
    removeFromValidate('EditView', key + 'name'+ ln);
  }
  //resetLineNum();

}



function LineEditorShow(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
  if (prodln>1) {
    for (var i=0;i<prodln;i++) {
      LineEditorClose(i);
    }
  }
  $("#subnets_line_displayed"+ln).hide();
  $("#trans_editor"+ln).show();
  //渲染下拉列表框的值
  //通过ajax获取
  //getPopListValue($("#line_id"+ln).val(),ln);

}

function LineEditorClose(ln) {//关闭行编辑器（显示为正常行）
  if (check_form('EditView')) {
    $("#trans_editor"+ln).hide();
    $("#subnets_line_displayed"+ln).show();
    renderTransLine(ln);
    resetLineNum_Bold();
  }
}

function resetLineNum_Bold() {//数行号
  var j=0;
  for (var i=0;i<prodln;i++) {
    if ($("#line_deleted"+i).val()!=1) {//跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
      j=j+1;
      $("#displayed_line_num" + i).text(j);
    }
  }
  //TODO：如果最终有效的行数，则将头标记为空
  //if (j==0) {}
}


//*********************************************************************
//以下为公共的函数
//*********************************************************************
//
function mark_field_disabled(field_name, hide_bool) {
  mark_obj = $("#"+field_name);
  mark_obj_lable = $("#"+field_name+"_label");

  if(hide_bool==true) {
    mark_obj.css({"display":"none"});
    mark_obj_lable.css({"display":"none"});
  }else{
    mark_obj.css({"color":"#efefef","background-Color":"#efefef;"});
    mark_obj.attr("readonly",true);
    mark_obj_lable.css({"color":"#aaaaaa","text-decoration":"line-through"});
  }
  if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
    removeFromValidate('EditView',field_name); //去除必须验证
  }
  $("#"+field_name+"_label .required").hide();

  if  (typeof $("#btn_"+field_name)!= 'undefined') {
    $("#btn_"+field_name).css({"visibility":"hidden"});
  }
  if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {
    $("#btn_clr_"+field_name).css({"visibility":"hidden"});
  }
  //消除已经填写的数据
  $("#"+field_name).val("");
  if  (typeof $("#"+field_name+"_id")!= 'undefined') {
    $("#"+field_name+"_id").val("");
  }
}

function mark_field_enabled(field_name,not_required_bool) {
  //field_name = 字段名，不需要jquery select标志，直接写名字
  //not_required_bool如果为空或没有明确定义为true的话，字段为必须输入。如果=ture则为非必须
  //alert(required_bool);

  $("#"+field_name).css({"color":"#000000","background-Color":"#ffffff"});
  $("#"+field_name).attr("readonly",false);
  $("#"+field_name+"_label").css({"color":"#000000","text-decoration":"none"})

  if(typeof not_required_bool == "undefined" || not_required_bool==false || not_required_bool=="") {
      addToValidate('EditView', field_name,'varchar', 'true', $("#"+field_name+"_label").text());//将当前字段标记为必须验证
      //打上必须星标
      if  ($("#"+field_name+"_label .required").text()!='*') {//如果没有星标，则打上星标
      $("#"+field_name+"_label").html($("#"+field_name+"_label").text()+"<span class='required'>*</span>");//打上星标
    } else {//如果已经有星标了，则显示出来
      $("#"+field_name+"_label .required").show();
    }
  } else { //如果不是必须的，则不显示星标
    removeFromValidate('EditView',field_name); //去除必须验证
    $("#"+field_name+"_label .required").hide();
  }
  if  (typeof $("#btn_"+field_name)!= 'undefined') {//移除选择按钮
    $("#btn_"+field_name).css({"visibility":"visible"});
  }
  if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {//移除清空按钮
    $("#btn_clr_"+field_name).css({"visibility":"visible"});
  }
}