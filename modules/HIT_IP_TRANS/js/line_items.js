$.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");
var prodln = 0;
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

/**
 * 设置必输
 */
function mark_field_enabled(field_name,not_required_bool) {
  //field_name = 字段名，不需要jquery select标志，直接写名字
  //not_required_bool如果为空或没有明确定义为true的话，字段为必须输入。如果=true则为非必须
  //alert(not_required_bool);
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
      //$("#"+field_name+"_btn").remove();
  } else { //如果不是必须的，则不显示星标
    //直接Remove有时会出错，所有先设置为Validate再Remove
    addToValidate('EditView', field_name,'varchar', 'true', $("#"+field_name+"_label").text());
    removeFromValidate('EditView',field_name);
     //去除必须验证
    $("#"+field_name+"_label .required").hide();
  }
  if  (typeof $("#btn_"+field_name)!= 'undefined') {//移除选择按钮
    $("#btn_"+field_name).css({"visibility":"visible"});
  }
  if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {//移除清空按钮
    $("#btn_clr_"+field_name).css({"visibility":"visible"});
  }
}

function openHitIpPopup(ln){//本文件为行上选择资产的按钮
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setAssetReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id" : "line_hit_ip_subnets_id" + ln,
      "name" : "line_hit_ip_subnets" + ln,
      "parent_hit_ip" : "line_parent_ip" + ln,
    }
  };
  open_popup('HIT_IP_Subnets', 600, 850, '', true, true, popupRequestData);
}

function openCabinetPopup(ln){//本文件为行上选择资产的按钮
	  lineno=ln;
	  var popupRequestData = {
	    "call_back_function" : "setCabinetReturn",
	    "form_name" : "EditView",
	    "field_to_name_array" : {
	      "id" : "line_hat_assets_cabinet_id" + ln,
	      "name" : "line_hat_assets_cabinet" + ln,
	    }
};
	  open_popup('HAT_Assets', 600, 850, '', true, true, popupRequestData);
}

function openAssetPopup(ln){//本文件为行上选择资产的按钮
	  lineno=ln;
	  var popupRequestData = {
	    "call_back_function" : "setAssetReturn",
	    "form_name" : "EditView",
	    "field_to_name_array" : {
	      "id" : "line_hat_assets_id" + ln,
	      "name" : "line_hat_asset_name" + ln,
	    }
	  };
	  open_popup('HAT_Assets', 600, 850, '', true, true, popupRequestData);
	}


function setAssetReturn(popupReplyData){
  set_return(popupReplyData);
  //console.log(popupReplyData);
  resetAsset(lineno);
}

function setCabinetReturn(popupReplyData){
	  set_return(popupReplyData);
	  //console.log(popupReplyData);
	  //resetAsset(lineno);
}

function openParentAssetPopup(ln){//本文件为行上选择资产的按钮
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "target_parent_asset" + ln,
      "id" : "line_parent_asset_id" + ln,
    },    
  };
  open_popup('HAT_Assets', 600, 850, '', true, true, popupRequestData);
}


function openOwningOrgPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_target_owning_org" + ln,
      "id" : "line_owning_org_id" + ln,
    },
  };

  open_popup('Accounts', 1000, 850,'' , true, true, popupRequestData);
}


function openUsingOrgPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_target_using_org" + ln,
      "id" : "line_using_org_id" + ln,
    },
  };

  open_popup('Accounts', 1000, 850,'' , true, true, popupRequestData);
}



function openOwningPersonPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_target_owning_person" + ln,
      "id" : "line_owning_person_id" + ln,
    }
  };
  var popupFilter = '&account_locked=ture&account_name_advanced='+$("#line_target_owning_org"+ln).val();
  open_popup('Contacts', 1000, 850,popupFilter, true, true, popupRequestData);
}

function openUsingPersonPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_target_using_person" + ln,
      "id" : "line_using_person_id" + ln,
    }
  };
  var popupFilter = '&account_locked=ture&account_name_advanced='+$("#line_target_using_org"+ln).val();
  open_popup('Contacts', 1000, 850,popupFilter, true, true, popupRequestData);
}



function openLocationPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_target_location" + ln,
      "location_title" : "line_target_location_desc" + ln,
      "id" : "line_hat_asset_locations_id" + ln
    }
  };
  open_popup('HAT_Asset_Locations', 1000, 850, '', true, true, popupRequestData);
}

function insertTransLineHeader(tableid){
  $("#line_items_label").hide();//隐藏SugarCRM字段
  //alert(SUGAR.language.get('HAT_Asset_Trans', 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE'));

  tablehead = document.createElement("thead");
  tablehead.id = tableid +"_head";
  tablehead.style.display="none";
  document.getElementById(tableid).appendChild(tablehead);

  var x=tablehead.insertRow(-1);
  x.id='Trans_line_head';
  var a=x.insertCell(0);
  a.innerHTML='#';//SUGAR.language.get('HAT_Asset_Trans', 'LBL_TRANS_STATUS');
  var b=x.insertCell(1);
//  b.innerHTML=SUGAR.language.get('HAT_Asset_Trans', 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE');
//  var b1=x.insertCell(2);
//  b1.innerHTML=SUGAR.language.get('HAT_Asset_Trans', 'LBL_NAME');
//  var c=x.insertCell(3);
//  c.innerHTML=SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_TARGET_ASSET_STATUS');
//  var d=x.insertCell(4);
//  d.innerHTML=SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_RESPONSIBLE_CENTER');
//  var e=x.insertCell(5);
//  e.innerHTML=SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_RESPONSIBLE_PERSON');
//  var f=x.insertCell(6);
//  f.innerHTML=SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_LOCATION');
//  var g=x.insertCell(7);
//  g.innerHTML=SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_LOCATION_DESC');
//  var h=x.insertCell(8);
  b.innerHTML="C段";
  var b1=x.insertCell(2);
  b1.innerHTML="网段";
  var c=x.insertCell(3);
  c.innerHTML="可用IP";
  var d=x.insertCell(4);
  d.innerHTML="掩码";
  var e=x.insertCell(5);
  e.innerHTML="网关";
  var f=x.insertCell(6);
  f.innerHTML="带宽类型";
  var g=x.insertCell(7);
  g.innerHTML="端口";


  var i=x.insertCell(8);
  i.innerHTML="限速";

  var j=x.insertCell(9);
  j.innerHTML="设备";
  
  var k=x.insertCell(10);
  k.innerHTML="机柜";
  var l=x.insertCell(11);
  l.innerHTML="监控链接";
  var m=x.insertCell(12);
  m.innerHTML="频道号";
  var n=x.insertCell(13);
  n.innerHTML="频道内容";
  
}


function insertLineData(asset_trans_line ){ //将数据写入到对应的行字段中
  console.log(asset_trans_line);
  var ln = 0;
  if(asset_trans_line.id != '0' && asset_trans_line.id !== ''){
    ln = insertTransLineElements("lineItems");
    //alert(asset_trans_line.hit_ip_subnets);
    ip_splited = asset_trans_line.hit_ip_subnets.split("/");
    //alert(ip_splited[0]);
//    var a = ip_splited[0];
//    alert(a);
//    if ( IpSubnetCalculator.isIp(ip_splited[0])&&ip_splited[1]<=32&&ip_splited[1]>=0) {
//        var ip_caled = IpSubnetCalculator.calculateSubnetMask(ip_splited[0],ip_splited[1])
//        //显示IP细节信息，由IpSubnetCalculator.js完成算法
//        $("#line_mask".concat(String(ln))).val(ip_caled.prefixMaskStr);
//      }

    
    $("#line_parent_ip".concat(String(ln))).val(asset_trans_line.parent_ip);
    $("#line_hit_ip_subnets".concat(String(ln))).val(asset_trans_line.hit_ip_subnets);
    $("#line_associated_ip".concat(String(ln))).val(asset_trans_line.associated_ip);
    //$("#line_mask".concat(String(ln))).val(asset_trans_line.mask);
    $("#line_gateway".concat(String(ln))).val(asset_trans_line.gateway);
    $("#line_bandwidth_type".concat(String(ln))).val(asset_trans_line.bandwidth_type);
    $("#line_port".concat(String(ln))).val(asset_trans_line.port);
    $("#line_speed_limit".concat(String(ln))).val(asset_trans_line.speed_limit);
    $("#line_hat_asset_name".concat(String(ln))).val(asset_trans_line.hat_asset_name);
    $("#line_hit_ip_subnets_id".concat(String(ln))).val(asset_trans_line.hit_ip_subnets_id);
    $("#line_id".concat(String(ln))).val(asset_trans_line.id);
    $("#line_hat_assets_cabinet_id".concat(String(ln))).val(asset_trans_line.hat_assets_cabinet_id);
    $("#line_hat_assets_cabinet".concat(String(ln))).val(asset_trans_line.hat_assets_cabinet);
    $("#line_channel_content".concat(String(ln))).val(asset_trans_line.channel_content);
    $("#line_channel_num".concat(String(ln))).val(asset_trans_line.channel_num);
    $("#line_monitoring".concat(String(ln))).val(asset_trans_line.monitoring);
    renderTransLine(ln);
  }
}

function insertTransLineElements(tableid) { //创建界面要素
//包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面
  if (document.getElementById(tableid + '_head') !== null) {
    document.getElementById(tableid + '_head').style.display = "";
  }
  sqs_objects["hit_ip_subnets[" + prodln + "]"] = {
    "form": "EditView",
    "method": "query",
    "modules": ["HIT_IP_TRANS"],
    "group": "or",
    "field_list": ["name", "id"],
    "populate_list": ["hit_ip_subnets_id[" + prodln + "]", "line_hat_assets_hat_asset_transhat_assets_ida[" + prodln + "]", "line_name[" + prodln + "]", "line_target_asset_status[" + prodln + "]", "line_target_organization[" + prodln + "]"],
    "required_list": ["hit_ip_subnets_id[" + prodln + "]"],
    "conditions": [{
      "name": "name",
      "op": "like_custom",
      "end": "%",'begin': '%',
      "value": ""
    }],
    "order": "name",
    "limit": "30",
    "post_onblur_function": "resetAsset(" + prodln + ");",
    "no_match_text": "No Match"
  };

  sqs_objects["line_hat_asset_name[" + prodln + "]"] = {
    "form": "EditView",
    "method": "query",
    "modules": ["HAT_Assets"],
    "group": "or",
    "field_list": ["name", "id"],
    "populate_list": ["line_hat_asset_name[" + prodln + "]", "line_hat_asset_id[" + prodln + "]"],
    "required_list": ["line_hat_asset_id[" + prodln + "]"],
    "conditions": [{
      "name": "name",
      "op": "like_custom",
      "end": "%",'begin': '%',
      "value": ""
    }],
    "order": "name",
    "limit": "30",
    // "post_onblur_function": "resetAsset(" + prodln + ");",
    "no_match_text": "No Match"
  };

  tablebody = document.createElement("tbody");
  tablebody.id = "line_body" + prodln;
  document.getElementById(tableid).appendChild(tablebody);


  var z1 = tablebody.insertRow(-1);
  z1.id = 'asset_trans_line1_displayed' + prodln;
  z1.className = 'oddListRowS1';
  z1.innerHTML  =
      "<td><span name='displayed_line_num[" + prodln + "]' id='displayed_line_num" + prodln + "'>1</span></td>" +
      "<td><span name='displayed_line_parent_ip[" + prodln + "]' id='displayed_line_parent_ip" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_hit_ip_subnets[" + prodln + "]' id='displayed_line_hit_ip_subnets" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_associated_ip[" + prodln + "]' id='displayed_line_associated_ip" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_mask[" + prodln + "]' id='displayed_line_mask" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_gateway[" + prodln + "]' id='displayed_line_gateway" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_bandwidth_type[" + prodln + "]' id='displayed_line_bandwidth_type" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_port[" + prodln + "]' id='displayed_line_port" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_speed_limit[" + prodln + "]' id='displayed_line_speed_limit" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_hat_asset_name[" + prodln + "]' id='displayed_line_hat_asset_name" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_hat_assets_cabinet[" + prodln + "]' id='displayed_line_hat_assets_cabinet" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_monitoring[" + prodln + "]' id='displayed_line_monitoring" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_channel_num[" + prodln + "]' id='displayed_line_channel_num" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_channel_content[" + prodln + "]' id='displayed_line_channel_content" + prodln + "'></span></td>"+
      //"<td><span name='displayed_line_hit_ip_subnets_id[" + prodln + "]' id='displayed_line_hit_ip_subnets_id" + prodln + "''></span></td>"+
      "<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'></td>";
  var z2 = tablebody.insertRow(-1);
  z2.id = 'asset_trans_line2_displayed' + prodln;
//  z2.innerHTML  =
//      "<td></td>" +
//      "<td></td>" +
//      "<td></td>" +
//      "<td><span name='displayed_line_current_asset_status[" + prodln + "]' id='displayed_line_current_asset_status" + prodln + "'>2</span></td>"+
//      "<td><span name='displayed_line_current_responsible_center[" + prodln + "]' id='displayed_line_current_responsible_center" + prodln + "'></span></td>"+
//      "<td><span name='displayed_line_current_responsible_person[" + prodln + "]' id='displayed_line_current_responsible_person" + prodln + "'></span></td>"+
//      "<td><span name='displayed_line_current_location[" + prodln + "]' id='displayed_line_current_location" + prodln + "'></span></td>"+
//      "<td><span name='displayed_line_current_location_desc[" + prodln + "]' id='displayed_line_current_location_desc" + prodln + "'></span></td>"+
//      "<td></td>";
  
  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'asset_trans_editor' + prodln;
  x.style = "display:none";
  x.innerHTML  = "<td colSpan='12'><div class='lineEditor'>"+
	  //C段
	  "<span class='input_group'><label>"+"C段"+"</label></span>"+
	  "<input style='width:78px;' type='hidden' readonly='readonly' name='line_parent_ip[" + prodln + "]' id='line_parent_ip" + prodln + "'  value='' title=''>"+
	  "<span id='line_parent_ip_displayed" + prodln + "' ></span>"+
	  "</span>"+
  	  //网段
      "<span class='input_group'>"+
      "<label>"+"网段"+"<span class='required'>*</span></label>"+
      //网段Lov描述
      "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_hit_ip_subnets[" + prodln + "]' id='line_hit_ip_subnets" + prodln + "' value='' title='' onblur='resetAsset("+prodln+")'>"+
      //Lov的Id
      "<input type='hidden' name='line_hit_ip_subnets_id[" + prodln + "]' id='line_hit_ip_subnets_id" + prodln + "' value=''>"+
      //Lov窗口
      "<button id='btn_line_hit_ip_subnets" + prodln + "' title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openHitIpPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      //可用IP
      "<span class='input_group'>"+
      "<label id='line_associated_ip"+prodln+"_label'>"+"可用IP"+"</label>"+
      "<input style='width:78px;' type='hidden' readonly='readonly' name='line_associated_ip[" + prodln + "]' id='line_associated_ip" + prodln + "'  value='' title=''>"+
      "<span id='line_associated_ip_displayed" + prodln + "' ></span>"+
      "</span>"+

  	   //掩码
      "<span class='input_group'>"+
      "<label>"+"掩码"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_mask[" + prodln + "]' id='line_mask" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      
      //网关
      "<span class='input_group'>"+
      "<label id='line_gateway"+prodln+"_label'>"+"网关"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_gateway[" + prodln + "]' id='line_gateway" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      
      //带宽类型
      "<span class='input_group'>"+
      "<label id='line_bandwidth_type"+prodln+"_label'>"+"带宽类型"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_bandwidth_type[" + prodln + "]' id='line_bandwidth_type" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      //端口
      "<span class='input_group'>"+
      "<label id='line_port_limit"+prodln+"_label'>"+"端口"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_port[" + prodln + "]' id='line_port" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      //限速
      "<span class='input_group'>"+
      "<label id='line_speed_limit"+prodln+"_label'>"+"限速"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_speed_limit[" + prodln + "]' id='line_speed_limit" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      
      //资产lov
      "<span class='input_group'><label>"+"设备"+"</label>"+
      "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_hat_asset_name[" + prodln + "]' id='line_hat_asset_name" + prodln + "' value='' title='' onblur='resetAsset("+prodln+")'>"+
      "<input type='hidden' name='line_hat_assets_id[" + prodln + "]' id='line_hat_assets_id" + prodln + "' value=''>"+
      "<button id='btn_line_hat_asset_name" + prodln + "' title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openAssetPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      //机柜lov
      "<span class='input_group'><label id='line_hat_assets_cabinet"+prodln+"_label'>"+"机柜"+"</label>"+
      "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_hat_assets_cabinet[" + prodln + "]' id='line_hat_assets_cabinet" + prodln + "' value='' title='' onblur='resetAsset("+prodln+")'>"+
      "<input type='hidden' name='line_hat_assets_cabinet_id[" + prodln + "]' id='line_hat_assets_cabinet_id" + prodln + "' value=''>"+
      "<button id='btn_line_hat_assets_cabinet" + prodln + "' title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn2' onclick='openCabinetPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      //监控链接
      "<span class='input_group'>"+
      "<label id='line_monitoring"+prodln+"_label'>"+"监控链接"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_monitoring[" + prodln + "]' id='line_monitoring" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      //频道号
      "<span class='input_group'>"+
      "<label id='line_channel_num"+prodln+"_label'>"+"频道号"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_channel_num[" + prodln + "]' id='line_channel_num" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      //频道内容
      "<span class='input_group'>"+
      "<label id='line_channel_content"+prodln+"_label'>"+"频道内容"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_channel_content[" + prodln + "]' id='line_channel_content" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      
      "<input type='hidden' name='line_deleted[" + prodln + "]' id='line_deleted" + prodln + "' value='0'>"+
      "<input type='hidden' name='line_id[" + prodln + "]' id='line_id" + prodln + "' value=''>"+

        //"<button type='button' id='line_delete_line" + prodln + "' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='markLineDeleted(" + prodln + ",\"line_\")'><img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>"+

      "<input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
        // "<input style='float:right;' type='button' id='btn_LineEditorClose" + prodln + "' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "'onclick='LineEditorClose(" + prodln + ")>"+
      "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>"+

      "<input type='hidden' name='associated_ip[" + prodln + "]' id='line_associated_ip" + prodln + "' maxlength='50' value='' title=''>"+
      "<input type='hidden' name='mask[" + prodln + "]' id='line_mask" + prodln + "' maxlength='50' value='' title='' >"+
      "<input type='hidden' name='gateway[" + prodln + "]' id='line_gateway" + prodln + "'  maxlength='50' value='' title='' >"+
      "<input type='hidden' name='bandwidth_type[" + prodln + "]' id='line_bandwidth_type" + prodln + "'  value='' title='' >"+
      "<input type='hidden' name='port[" + prodln + "]' id='line_port" + prodln + "'  maxlength='50' value='' title='' >"+
      "<input type='hidden' name='speed_limit[" + prodln + "]' id='line_current_location_desc" + prodln + "'  maxlength='50' value='' title='' >"+
      "</div></td>";
  addToValidate('EditView', 'line_hit_ip_subnets'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE'));
  addToValidate('EditView', 'line_name'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_NAME'));
  addToValidate('EditView', 'line_target_organization'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_TARGET_RESPONSIBLE_CENTER'));
  addToValidate('EditView', 'line_target_location'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_TARGET_LOCATION'));

  renderTransLine(prodln);

  prodln++;
  return prodln - 1;
}

function renderTransLine(ln) { //将编辑器中的内容显示于正常行中
	//alert($("#line_hit_ip_subnets"+ln).val());
  $("#displayed_line_parent_ip"+ln).html($("#line_parent_ip"+ln).val());
  $("#displayed_line_hit_ip_subnets"+ln).html($("#line_hit_ip_subnets"+ln).val());
  $("#displayed_line_mask"+ln).html($("#line_mask"+ln).val());
  $("#displayed_line_gateway"+ln).html($("#line_gateway"+ln).val());
  $("#displayed_line_bandwidth_type"+ln).html($("#line_bandwidth_type"+ln).val());
  $("#displayed_line_port"+ln).html($("#line_port"+ln).val());
  $("#displayed_line_speed_limit"+ln).html($("#line_speed_limit"+ln).val());
  $("#displayed_line_hat_asset_name"+ln).html($("#line_hat_asset_name"+ln).val());
  $("#displayed_line_hit_ip_subnets_id"+ln).html($("#line_hit_ip_subnets_id"+ln).val());
  $("#displayed_line_id"+ln).html($("#line_id"+ln).val());
  $("#displayed_line_monitoring"+ln).html($("#line_monitoring"+ln).val());
  $("#displayed_line_hat_assets_cabinet_id"+ln).html($("#line_hat_assets_cabinet_id"+ln).val());
  $("#displayed_line_hat_assets_cabinet"+ln).html($("#line_hat_assets_cabinet"+ln).val());
  $("#displayed_line_channel_content"+ln).html($("#line_channel_content"+ln).val());
  $("#displayed_line_channel_num"+ln).html($("#line_channel_num"+ln).val());
  mark_field_enabled("displayed_line_hit_ip_subnets", false);
}

function resetAsset(ln){ //在用户重新选择资产之后，会连带的更新资产相关的字段信息。
  //alert(document.getElementById("line_current_responsible_center"+ln).value);
  //alert($("#line_current_responsible_center"+ln).val());

  if ($("#line_asset"+ln).val()=== '') { //如果资产字段为空，则将所有关联的字段全部清空
    $("#line_hat_assets_hat_asset_transhat_assets_ida"+ln).val("");
    $("#line_target_owning_org"+ln).val("");
    $("#line_target_using_org"+ln).val("");
    $("#line_target_owning_org_id"+ln).val("");
    $("#line_target_using_org_id"+ln).val("");
    $("#line_target_owning_person"+ln).val("");
    $("#line_target_using_person"+ln).val("");
    $("#line_target_owning_person_id"+ln).val("");
    $("#line_target_using_person_id"+ln).val("");
    $("#line_target_location"+ln).val("");
    $("#line_target_location_desc"+ln).val("");
    $("#line_target_asset_status"+ln).val("");
    $("#line_current_asset_status"+ln).val("");
    $("#line_current_responsible_center"+ln).val("");
    $("#line_current_responsible_person"+ln).val("");
    $("#line_current_location"+ln).val("");
    $("#line_current_location_desc"+ln).val("");
  }


  //以下为Current的几个字段获得值，这几个字段为空时，直接从Target字段复制
  //这几行的位置在Target清空之后，这样如果Target为空，则当前Current也会清空
  if ($("#line_current_responsible_center"+ln).val()=== '') {
    $("#line_current_responsible_center"+ln).val($("#line_target_organization"+ln).val());
  }
  if ($("#line_current_responsible_person"+ln).val()=== '') {
    $("#line_current_responsible_person"+ln).val($("#line_target_person"+ln).val());
  } else {
    $("#line_contact_id_c"+ln).val('');
  }
  if ($("#line_current_location"+ln).val()=== '') {
    $("#line_current_location"+ln).val($("#line_target_location"+ln).val());
  }
  if ($("#line_current_location_desc"+ln).val()=== '') {
    $("#line_current_location_desc"+ln).val($("#line_target_location_desc"+ln).val());
  }

  //TODO 这里直接读取了头字段，最好改为参数
  //以下是根据Event Type的规则，对字段进行设置
  var tmp = document.createElement("DIV");
  tmp.innerHTML = $("#line_current_asset_status"+ln).val();
  var current_status_text = tmp.textContent || tmp.innerText || "";//current从Popup中返回的是Text，要以Value形式保存，否则会有多语言问题

  var current_status_value = $("#lov_asset_status_list option").filter(function() {return $(this).html() == current_status_text;}).val()
  $("#line_current_asset_status"+ln).val(current_status_value);


  if($("#change_target_status").val()==1) { //如果头EventType需要变更
    $("#line_target_asset_status"+ln).val( $("#target_asset_status").val());//目标为当前资产状态
  } else {
    $("#line_target_asset_status"+ln).val(current_status_value);//目标为当前资产状态,以Value保存
  }
  var target_status_value = $("#line_target_asset_status"+ln).val();
  var target_status_text = $("#lov_asset_status_list option[value='"+target_status_value+"']").text();

  $("#line_target_asset_status_displayed"+ln).html("<span class='color_tag color_asset_status_"+target_status_value+"'>"+target_status_text+"</span>");

  if($("#change_organization").val()=='LOCKED') {//如果不可以更新目标组织
    $("#line_target_organization"+ln).attr("readonly",true);
    $("#line_target_organization"+ln+"~ button").css('display','none');
  }
  if($("#change_contact").val()=='LOCKED') {//如果不可以更新联系人
    $("#line_target_person"+ln).attr("readonly",true);
    $("#line_target_person"+ln+"~ button").css('display','none');
  }
  if($("#change_location").val()=='LOCKED') {//如果不可以更新地点
    $("#line_target_location"+ln).attr("readonly",true);
    $("#line_target_location"+ln+"~ button").css('display','none');
  }
  if($("#change_location_desc").val()=='LOCKED') {//如果不可以更地点说明
    $("#line_target_location_desc"+ln).attr("readonly",true);
  }
}


function insertTransLineFootor(tableid)
{
  tablefooter = document.createElement("tfoot");
  document.getElementById(tableid).appendChild(tablefooter);

  var footer_row=tablefooter.insertRow(-1);
  var footer_cell = footer_row.insertCell(0);

  footer_cell.scope="row";
  footer_cell.colSpan="9";
  footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HIT_IP_TRANS', 'LBL_BTN_ADD_TRANS_LINE')+"' />";
  //TODO:添加一个Checkbox用于显示和隐藏当前组织、人员、地点……
}
/**
 * 添加事务处理行
 * @param tableid
 */
function addNewLine(tableid) {
	//alert(check_form('EditView'));
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增
    insertTransLineElements(tableid);//加入新行
    LineEditorShow(prodln - 1);       //打开行编辑器
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
  $("#Trans_line_head").show();
}
function markLineDeleted(ln, key) {//删除当前行

  // collapse line; update deleted value
  document.getElementById(key + 'body' + ln).style.display = 'none';
  document.getElementById(key + 'deleted' + ln).value = '1';
  document.getElementById(key + 'delete_line' + ln).onclick = '';

  if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
    removeFromValidate('EditView','line_asset'+ ln);
    removeFromValidate('EditView','line_name'+ ln);
    removeFromValidate('EditView','line_target_organization'+ ln);
    removeFromValidate('EditView','line_target_location'+ ln);
  }
  resetLineNum();

}

function LineEditorShow(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
	//mark_field_enabled("line_hit_ip_subnets0", false);
  if (prodln>1) {
    for (var i=0;i<prodln;i++) {
      LineEditorClose(i);
    }
  }
  $("#asset_trans_line1_displayed"+ln).hide();
  $("#asset_trans_line2_displayed"+ln).hide();
  $("#asset_trans_editor"+ln).show();
  $("#Trans_line_head").hide();
  changeRequired(lineData);
}

function LineEditorClose(ln) {//关闭行编辑器（显示为正常行）
  if (check_form('EditView')) {
	mark_field_enabled("line_hit_ip_subnets"+ln, false);
    $("#asset_trans_editor"+ln).hide();
    $("#asset_trans_line1_displayed"+ln).show();
    $("#asset_trans_line2_displayed"+ln).show();
    renderTransLine(ln);
    resetLineNum_Bold();
    
    $("#Trans_line_head").show()
    
    changeRequired(lineData);
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
