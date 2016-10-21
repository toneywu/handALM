//必须要这个
$.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");
var prodln = 0;
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function insertTransLineHeader(tableid){
  $("#line_items_label").hide();//隐藏SugarCRM字段
 //alert($("#LBL_DETAILVIEW_PANEL1 tr:eq(:first)").first());
 //alert($("#LBL_DETAILVIEW_PANEL1 tr td:first").text());
 $("#LBL_DETAILVIEW_PANEL1 tr td:first").remove();
 $("#LBL_EDITVIEW_PANEL1 tr td:first").remove();
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
  b.innerHTML="<span id='line_parent_ip_title'>C段</span>";
  var b1=x.insertCell(2);
  b1.innerHTML="<span id='line_hit_ip_subnets_title'>网段</span>";
  var c=x.insertCell(3);
  c.innerHTML="<span id='line_associated_ip_title'>可用IP</span>";
  var d=x.insertCell(4);
  d.innerHTML="<span id='line_mask_title'>掩码</span>";
  var e=x.insertCell(5);
  e.innerHTML="<span id='line_gateway_title'>网关</span>";
  
  var j=x.insertCell(6);
  j.innerHTML="<span id='line_hat_asset_name_title'>网关设备</span>";
  var p=x.insertCell(7);
  p.innerHTML="<span id='line_access_assets_name_title'>接入设备(主)</span>";
  var p2=x.insertCell(8);
  p2.innerHTML="<span id='line_access_assets_backup_name_title'>接入设备(备)</span>";
  var g=x.insertCell(9);
  g.innerHTML="<span id='line_port_title'>端口(主)</span>";
  var g2=x.insertCell(10);
  g2.innerHTML="<span id='line_port_backup_title'>端口(备)</span>";
  var f=x.insertCell(11);
  f.innerHTML="<span id='line_bandwidth_type_title'>带宽类型</span>"; 
  var i=x.insertCell(12);
  i.innerHTML="<span id='line_speed_limit_title'>限速</span>";
  var k=x.insertCell(13);
  k.innerHTML="<span id='line_hat_assets_cabinet_title'>机柜</span>";
  var l=x.insertCell(14);
  l.innerHTML="<span id='line_monitoring_title'>监控链接(主)</span>";
  var l2=x.insertCell(15);
  l2.innerHTML="<span id='line_monitoring_backup_title'>监控链接(备)</span>";
  var o=x.insertCell(16);
  o.innerHTML="<span id='line_mrtg_link_title'>MRTG 链接</span>";
  var m=x.insertCell(17);
  m.innerHTML="<span id='line_channel_num_title'>频道号(主)</span>";
  var m2=x.insertCell(18);
  m2.innerHTML="<span id='line_channel_num_backup_title'>频道号(备)</span>";
  var n=x.insertCell(19);
  n.innerHTML="<span id='line_channel_content_title'>频道内容(主)</span>";
  var n2=x.insertCell(20);
  n2.innerHTML="<span id='line_channel_content_backup_title'>频道内容(备)</span>"
  var n3=x.insertCell(21);
  n3.innerHTML="<span id='line_date_start_title'>占用起始时间</span>"
  var n4=x.insertCell(22);
  n4.innerHTML="<span id='line_date_end_title'>占用终止时间</span>"
  var e2=x.insertCell(23);
  e2.innerHTML="<span id='line_status_title'>状态</span>";;
}


function insertLineData(asset_trans_line ){ //将数据写入到对应的行字段中
  console.log(asset_trans_line);
  var ln = 0;
  if(asset_trans_line.id != '0' && asset_trans_line.id !== ''){
    ln = insertTransLineElements("lineItems");
    //alert(asset_trans_line.hit_ip_subnets);
    ip_splited = asset_trans_line.hit_ip_subnets.split("/")
//    if ( IpSubnetCalculator.isIp(ip_splited[0])&&ip_splited[1]<=32&&ip_splited[1]>=0) {
//		   var ip_caled = IpSubnetCalculator.calculateSubnetMask(ip_splited[0],ip_splited[1]);
//		   var associated_ip= ip_caled.ipLowStr+"~"+ip_caled.ipHighStr;
//		   //显示IP细节信息，由IpSubnetCalculator.js完成算法
//		   $("#line_associated_ip"+ln).html(associated_ip);
//	  }
    $("#line_parent_ip".concat(String(ln))).val(asset_trans_line.parent_ip);
    $("#line_hit_ip_subnets".concat(String(ln))).val(asset_trans_line.hit_ip_subnets);
    //$("#line_associated_ip".concat(String(ln))).val(asset_trans_line.associated_ip);
    $("#line_mask".concat(String(ln))).val(asset_trans_line.ip_netmask);
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
    $("#line_mrtg_link".concat(String(ln))).val(asset_trans_line.mrtg_link);
    $("#line_access_assets_name".concat(String(ln))).val(asset_trans_line.access_assets_name);
    $("#line_access_assets_backup_name".concat(String(ln))).val(asset_trans_line.access_assets_backup_name);
    $("#line_status".concat(String(ln))).val(asset_trans_line.status);
    $("#line_port_backup".concat(String(ln))).val(asset_trans_line.port_backup);
    $("#line_monitoring_backup".concat(String(ln))).val(asset_trans_line.monitoring_backup);
    $("#line_channel_content_backup".concat(String(ln))).val(asset_trans_line.channel_content_backup);
    $("#line_channel_num_backup".concat(String(ln))).val(asset_trans_line.channel_num_backup);
    $("#line_date_start".concat(String(ln))).val(asset_trans_line.date_start);
    $("#line_date_end".concat(String(ln))).val(asset_trans_line.date_end);
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
      "<td><span name='displayed_line_hat_asset_name[" + prodln + "]' id='displayed_line_hat_asset_name" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_access_assets_name[" + prodln + "]' id='displayed_line_access_assets_name" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_access_assets_backup_name[" + prodln + "]' id='displayed_line_access_assets_backup_name" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_port[" + prodln + "]' id='displayed_line_port" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_port_backup[" + prodln + "]' id='displayed_line_port_backup" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_bandwidth_type[" + prodln + "]' id='displayed_line_bandwidth_type" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_speed_limit[" + prodln + "]' id='displayed_line_speed_limit" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_hat_assets_cabinet[" + prodln + "]' id='displayed_line_hat_assets_cabinet" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_monitoring[" + prodln + "]' id='displayed_line_monitoring" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_monitoring_backup[" + prodln + "]' id='displayed_line_monitoring_backup" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_mrtg_link[" + prodln + "]' id='displayed_line_mrtg_link" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_channel_num[" + prodln + "]' id='displayed_line_channel_num" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_channel_num_backup[" + prodln + "]' id='displayed_line_channel_num_backup" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_channel_content[" + prodln + "]' id='displayed_line_channel_content" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_channel_content_backup[" + prodln + "]' id='displayed_line_channel_content_backup" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_date_start[" + prodln + "]' id='displayed_line_date_start" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_date_end[" + prodln + "]' id='displayed_line_date_end" + prodln + "'></span></td>" +
      "<td><span name='displayed_line_status[" + prodln + "]' id='displayed_line_status" + prodln + "'></span></td>";
      
      //"<td><span name='displayed_line_hit_ip_subnets_id[" + prodln + "]' id='displayed_line_hit_ip_subnets_id" + prodln + "''></span></td>"+
      //"<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'></td>";

  
      
      
  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'asset_trans_editor' + prodln;
  x.style = "display:none";
  x.innerHTML  = "<td colSpan='19'><div class='lineEditor'>"+
	  //C段
	  "<label>"+"C段"+"</label>"+
	  "<input style='width:78px;' type='hidden' readonly='readonly' name='line_parent_ip[" + prodln + "]' id='line_parent_ip" + prodln + "'  value='' title=''>"+
	  "<span id='line_parent_ip_displayed" + prodln + "' ></span>"+
	  "</span>"+
	  
  	  //网段
      "<span class='input_group'>"+
      "<label>"+"网段"+"<span class='required'>*</span></label>"+
      //Lov描述
      "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_hit_ip_subnets[" + prodln + "]' id='line_hit_ip_subnets" + prodln + "' value='' title='' onblur='resetAsset("+prodln+")'>"+
      //Lov的Id
      "<input type='hidden' name='line_hit_ip_subnets_id[" + prodln + "]' id='line_hit_ip_subnets_id" + prodln + "' value=''>"+
      //Lov窗口
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openHitIpPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      "<span class='input_group'>"+
      //可用IP
      "<label>"+"可用IP"+"</label>"+
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
      "<label>"+"网关"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_gateway[" + prodln + "]' id='line_gateway" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      
      //带宽类型
      "<span class='input_group'>"+
      "<label>"+"带宽类型"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_bandwidth_type[" + prodln + "]' id='line_bandwidth_type" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      //端口
      "<span class='input_group'>"+
      "<label>"+"端口"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_port[" + prodln + "]' id='line_port" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      //限速
      "<span class='input_group'>"+
      "<label>"+"限速"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_speed_limit[" + prodln + "]' id='line_speed_limit" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      
      //资产lov
      "<label>"+"设备"+"<span class='required'>*</span></label>"+
      "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_hat_asset_name[" + prodln + "]' id='line_hat_asset_name" + prodln + "' value='' title='' onblur='resetAsset("+prodln+")'>"+
      "<input type='hidden' name='line_hat_assets_id[" + prodln + "]' id='line_hat_assets_id" + prodln + "' value=''>"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openAssetPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      //机柜lov
      "<label>"+"机柜"+"<span class='required'>*</span></label>"+
      "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_hat_assets_cabinet[" + prodln + "]' id='line_hat_assets_cabinet" + prodln + "' value='' title='' onblur='resetAsset("+prodln+")'>"+
      "<input type='hidden' name='line_hat_assets_cabinet_id[" + prodln + "]' id='line_hat_assets_cabinet_id" + prodln + "' value=''>"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openCabinetPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      //监控链接(主)
      "<span class='input_group'>"+
      "<label>"+"监控链接(主)"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_monitoring[" + prodln + "]' id='line_monitoring" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
	  //监控链接(备)
      "<span class='input_group'>"+
      "<label>"+"监控链接(备)"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_monitoring_backup[" + prodln + "]' id='line_monitoring_backup" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      //频道号(主)
      "<span class='input_group'>"+
      "<label>"+"频道号(主)"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_channel_num[" + prodln + "]' id='line_channel_num" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
	  //频道号(备)
      "<span class='input_group'>"+
      "<label>"+"频道号(备)"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_channel_num_backup[" + prodln + "]' id='line_channel_num_backup" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      //频道内容(主)
      "<span class='input_group'>"+
      "<label>"+"频道内容(主)"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_channel_content[" + prodln + "]' id='line_channel_content" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
	  //频道内容(备)
      "<span class='input_group'>"+
      "<label>"+"频道内容(备)"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_channel_content_backup[" + prodln + "]' id='line_channel_content_backup" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
       //MRTG Link
      "<span class='input_group'>"+
      "<label>"+"MRTG Link"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_mrtg_link[" + prodln + "]' id='line_mrtg_link" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      //接入设备(主)
      "<span class='input_group'><label>"+"接入设备"+"</label>"+
      "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_access_assets_name[" + prodln + "]' id='line_access_assets_name" + prodln + "' value='' title='' onblur='resetAsset("+prodln+")'>"+
      "<input type='hidden' name='line_access_assets_id[" + prodln + "]' id='line_access_assets_id" + prodln + "' value=''>"+
      "<button id='btn_line_access_assets_name" + prodln + "' title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openAccessAssetNamePopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
	  //接入设备(备)
      "<span class='input_group'><label>"+"接入设备(备)"+"</label>"+
      "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_access_assets_backup_name[" + prodln + "]' id='line_access_assets_backup_name" + prodln + "' value='' title='' onblur='resetAsset("+prodln+")'>"+
      "<input type='hidden' name='line_access_assets_backup_id[" + prodln + "]' id='line_access_assets_backup_id" + prodln + "' value=''>"+
      "<button id='btn_line_access_assets_backup_name" + prodln + "' title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openAccessAssetNamePopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      //状态
      "<span class='input_group'>"+
      "<label>"+"状态"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_status[" + prodln + "]' id='line_status" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      //占用起始时间
      "<span class='input_group'>"+
      "<label>"+"占用起始时间"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_date_start[" + prodln + "]' id='line_date_start" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      //占用终止时间
      "<span class='input_group'>"+
      "<label>"+"占用终止时间"+"</label>"+
      "<input style=' width:153px;' type='text' name='line_date_end[" + prodln + "]' id='line_date_end" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      //主
      /*"<label>"+"主"+"<span class='required'>*</span></label>"+
      "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_main_asset[" + prodln + "]' id='line_main_asset" + prodln + "' value='' title='' onblur='resetAsset("+prodln+")'>"+
      "<input type='hidden' name='line_main_asset_id[" + prodln + "]' id='line_main_asset_id" + prodln + "' value=''>"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openAssetPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      //备
      "<label>"+"备"+"<span class='required'>*</span></label>"+
      "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_backup_asset[" + prodln + "]' id='line_backup_asset" + prodln + "' value='' title='' onblur='resetAsset("+prodln+")'>"+
      "<input type='hidden' name='line_backup_asset_id[" + prodln + "]' id='line_backup_asset_id" + prodln + "' value=''>"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openAssetPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      */
      "<input type='hidden' name='line_deleted[" + prodln + "]' id='line_deleted" + prodln + "' value='0'>"+
      "<input type='hidden' name='line_id[" + prodln + "]' id='line_id" + prodln + "' value=''>"+

        //"<button type='button' id='line_delete_line" + prodln + "' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='markLineDeleted(" + prodln + ",\"line_\")'><img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>"+

     // "<input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
        // "<input style='float:right;' type='button' id='btn_LineEditorClose" + prodln + "' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "'onclick='LineEditorClose(" + prodln + ")>"+
      //"<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>"+
      //"<input type='hidden' name='associated_ip[" + prodln + "]' id='line_associated_ip" + prodln + "' maxlength='50' value='' title=''>"+
      //"<input type='hidden' name='mask[" + prodln + "]' id='line_mask" + prodln + "' maxlength='50' value='' title='' >"+
      //"<input type='hidden' name='gateway[" + prodln + "]' id='line_gateway" + prodln + "'  maxlength='50' value='' title='' >"+
      //"<input type='hidden' name='bandwidth_type[" + prodln + "]' id='line_bandwidth_type" + prodln + "'  value='' title='' >"+
      //"<input type='hidden' name='port[" + prodln + "]' id='line_port" + prodln + "'  maxlength='50' value='' title='' >"+
      //"<input type='hidden' name='speed_limit[" + prodln + "]' id='line_current_location_desc" + prodln + "'  maxlength='50' value='' title='' >"+
      "</div></td>";

  addToValidate('EditView', 'line_asset'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE'));
  addToValidate('EditView', 'line_name'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_NAME'));
  addToValidate('EditView', 'line_target_organization'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_TARGET_RESPONSIBLE_CENTER'));
  addToValidate('EditView', 'line_target_location'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_TARGET_LOCATION'));

  renderTransLine(prodln);

  prodln++;
  return prodln - 1;
}

function renderTransLine(ln) { //将编辑器中的内容显示于正常行中
	ip_splited = $("#line_hit_ip_subnets"+ln).val().split("/");
	SUGAR.util.doWhen("typeof IpSubnetCalculator != 'undefined'", function(){
		  if (IpSubnetCalculator.isIp(ip_splited[0])&&ip_splited[1]<=32&&ip_splited[1]>=0) {
			   var ip_caled = IpSubnetCalculator.calculateSubnetMask(ip_splited[0],ip_splited[1]);
			   var associated_ip= ip_caled.ipLowStr+"~"+ip_caled.ipHighStr;
			   //显示IP细节信息，由IpSubnetCalculator.js完成算法
			   $("#displayed_line_associated_ip"+ln).html(associated_ip);
			   $("#line_associated_ip"+ln).val(associated_ip);
		  }
		});
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
  $("#displayed_line_channel_num"+ln).html($("#line_channel_num"+ln).val());
  $("#displayed_line_channel_content"+ln).html($("#line_channel_content"+ln).val());
  $("#displayed_line_mrtg_link"+ln).html($("#line_mrtg_link"+ln).val());
  $("#displayed_line_access_assets_name"+ln).html($("#line_access_assets_name"+ln).val());
  $("#displayed_line_status"+ln).html($("#line_status"+ln).val());
  $("#displayed_line_port_backup"+ln).html($("#line_port_backup"+ln).val());
  $("#displayed_line_monitoring_backup"+ln).html($("#line_monitoring_backup"+ln).val());
  $("#displayed_line_channel_content_backup"+ln).html($("#line_channel_content_backup"+ln).val());
  $("#displayed_line_channel_num_backup"+ln).html($("#line_channel_num_backup"+ln).val());
  $("#displayed_line_access_assets_backup_name"+ln).html($("#line_access_assets_backup_name"+ln).val());
  $("#displayed_line_date_start"+ln).html($("#line_date_start"+ln).val());
  $("#displayed_line_date_end"+ln).html($("#line_date_end"+ln).val());
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

  var current_status_value = $("#hat_asset_status option").filter(function() {return $(this).html() == current_status_text;}).val()
  $("#line_current_asset_status"+ln).val(current_status_value);


  if($("#change_target_status").val()==1) { //如果头EventType需要变更
    $("#line_target_asset_status"+ln).val( $("#target_asset_status").val());//目标为当前资产状态
  } else {
    $("#line_target_asset_status"+ln).val(current_status_value);//目标为当前资产状态,以Value保存
  }
  var target_status_value = $("#line_target_asset_status"+ln).val();
  var target_status_text = $("#hat_asset_status option[value='"+target_status_value+"']").text();

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
  footer_cell.colSpan="14";
  //footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HIT_IP_TRANS', 'LBL_BTN_ADD_TRANS_LINE')+"' />";
  //TODO:添加一个Checkbox用于显示和隐藏当前组织、人员、地点……
}

function addNewLine(tableid) {
  //alert("clicked")
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
  if (prodln>1) {
    for (var i=0;i<prodln;i++) {
      LineEditorClose(i);
    }
  }
  $("#asset_trans_line1_displayed"+ln).hide();
  $("#asset_trans_line2_displayed"+ln).hide();
  $("#asset_trans_editor"+ln).show();

}

function LineEditorClose(ln) {//关闭行编辑器（显示为正常行）
  if (check_form('EditView')) {
    $("#asset_trans_editor"+ln).hide();
    $("#asset_trans_line1_displayed"+ln).show();
    $("#asset_trans_line2_displayed"+ln).show();
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
