
$.getScript("cache/include/javascript/sugar_grp_yui_widgets.js"); //MessageBox

var prodln = 0;
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function openItemPopup(ln){//在行上选择了物料之后
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setItemReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id" : "line_item_id" + ln,
      "name" : "line_inventory_item" + ln,
      "primary_uom_c" : "line_primary_uom" + ln,
      "haa_uom_id_c" : "line_primary_uom_id" + ln,
      "secondary_uom_c" : "line_secondary_uom" + ln,
      "haa_uom_id1_c" : "line_secondary_uom_id" + ln,
      "secondary_unit_defaulting_c" : "line_secondary_unit_defaulting"+ln,
      "tracking_uom_c" : "line_tracking_uom" + ln,
    }
  };
  open_popup('AOS_Products', 600, 850, '', true, true, popupRequestData);
}

function setItemReturn(popupReplyData){
  set_return(popupReplyData);
  resetItem(lineno);
}


function openFromLocationPopup(ln){ //在行上选择了From Location
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setFromLocationPopupReturn",
    "form_name" : "EditView",
    "line_number":ln,
    "field_to_name_array" : {
      "name" : "line_from_location" + ln,
      "id" : "line_from_location_id" + ln,
      'inventory_mode' : 'line_from_locator_control'+ln,
    }
  };
  open_popup('HAT_Asset_Locations', 1000, 850, '', true, true, popupRequestData);
}

function openToLocationPopup(ln){ //在行上选择了To Location
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setToLocationPopupReturn",
    "form_name" : "EditView",
    "line_number":ln,
    "field_to_name_array" : {
      "name" : "line_to_location" + ln,
      "id" : "line_to_location_id" + ln,
      'inventory_mode' :'line_to_locator_control'+ln,
    }
  };
  open_popup('HAT_Asset_Locations', 1000, 850, '', true, true, popupRequestData);
}

function setToLocationPopupReturn(popupReplyData){
  set_return(popupReplyData);
  $("#line_to_locator_control"+lineno).val(getLovValueByText("line_to_locator_control"+lineno,"locator_control_lov"));
  setLineLocatorFields(lineno);
}
function setFromLocationPopupReturn(popupReplyData){
  set_return(popupReplyData);
  $("#line_from_locator_control"+lineno).val(getLovValueByText("line_from_locator_control"+lineno,"locator_control_lov"));
  setLineLocatorFields(lineno);
}
function setLineLocatorFields(ln) {
  //跟踪选择的Location货位控制属性，显示Locator相关的内容
  if ($("#line_from_locator_control"+ln).val()=="LOCATOR") {
  //启用了货位控制，显示货位
  mark_field_enabled("line_from_locator"+ln);
} else {
  //停用货位
  mark_field_disabled("line_from_locator"+ln);
};
if ($("#line_to_locator_control"+ln).val()=="LOCATOR") {
  //启用了货位控制，显示货位
  mark_field_enabled("line_to_locator"+ln);
} else {
  //停用货位
  mark_field_disabled("line_to_locator"+ln);
};
}

function openFromLocatorPopup(ln){ //在行上选择了From Locator
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setLocatorPopupReturn",
    "form_name" : "EditView",
    'initial_filter':'&location_advanced='+$("#line_from_location"+ln).val()+'"',
    "field_to_name_array" : {
      "name" : "line_from_locator" + ln,
      "id" : "line_from_locator_id" + ln,
    }
  };
  open_popup('HMM_Locators', 1000, 850, '', true, true, popupRequestData);
}
function openToLocatorPopup(ln){ //在行上选择了From Locator
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setLocatorPopupReturn",
    "form_name" : "EditView",
    'initial_filter' : '&location_advanced='+$("#line_to_location"+ln).val()+'"',
    "field_to_name_array" : {
      "name" : "line_to_locator" + ln,
      "id" : "line_to_locator_id" + ln,
    }
  };
  open_popup('HMM_Locators', 1000, 850, '', true, true, popupRequestData);
}
function setLocatorPopupReturn(popupReplyData){
  set_return(popupReplyData);
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
  b.innerHTML=SUGAR.language.get('HMM_Trans_Lines', 'LBL_ITEM');
  var b1=x.insertCell(2);
  b1.innerHTML=SUGAR.language.get('HMM_Trans_Lines', 'LBL_PRIMARY_QTY');
  var c=x.insertCell(3);
  c.innerHTML=SUGAR.language.get('HMM_Trans_Lines', 'LBL_SECONDARY_QTY');
  var d=x.insertCell(4);
  d.innerHTML=SUGAR.language.get('HMM_Trans_Lines', 'LBL_FROM_LOCATION');
  var e=x.insertCell(5);
  e.innerHTML=SUGAR.language.get('HMM_Trans_Lines', 'LBL_FROM_LOCATOR');
  var f=x.insertCell(6);
  f.innerHTML=SUGAR.language.get('HMM_Trans_Lines', 'LBL_TO_LOCATION');
  var g=x.insertCell(7);
  g.innerHTML=SUGAR.language.get('HMM_Trans_Lines', 'LBL_TO_LOCATOR');
  var h=x.insertCell(8);
  h.innerHTML=SUGAR.language.get('HMM_Trans_Lines', 'LBL_WOOP');
  var i=x.insertCell(9);
  i.innerHTML=SUGAR.language.get('HMM_Trans_Lines', 'LBL_DESCRIPTION');
  var j=x.insertCell(10);
  j.innerHTML='&nbsp;';
}


function insertLineData(hmm_trans_lines){ //将数据写入到对应的行字段中
  //console.log(hmm_trans_lines);
  var ln = 0;
  if(hmm_trans_lines.id != '0' && hmm_trans_lines.id !== ''){
    ln = insertTransLineElements("lineItems");
    $("#line_id".concat(String(ln))).val(hmm_trans_lines.id);
    $("#line_inventory_item".concat(String(ln))).val(hmm_trans_lines.product_name);
    $("#line_item_id".concat(String(ln))).val(hmm_trans_lines.product_id);
    $("#line_description".concat(String(ln))).val(hmm_trans_lines.description);
    $("#line_primary_qty".concat(String(ln))).val(hmm_trans_lines.primary_qty>0?parseFloat(hmm_trans_lines.primary_qty):null);
    $("#line_secondary_qty".concat(String(ln))).val(hmm_trans_lines.secondary_qty>0?parseFloat(hmm_trans_lines.secondary_qty):null);
    $("#line_from_location_id".concat(String(ln))).val(hmm_trans_lines.from_location_id);
    $("#line_from_location".concat(String(ln))).val(hmm_trans_lines.from_location);
    $("#line_from_locator_id".concat(String(ln))).val(hmm_trans_lines.from_locator_id);
    $("#line_from_locator".concat(String(ln))).val(hmm_trans_lines.from_locator);
    $("#line_to_location_id".concat(String(ln))).val(hmm_trans_lines.to_location_id);
    $("#line_to_location".concat(String(ln))).val(hmm_trans_lines.to_location);
    $("#line_to_locator_id".concat(String(ln))).val(hmm_trans_lines.to_locator_id);
    $("#line_to_locator".concat(String(ln))).val(hmm_trans_lines.to_locator);
    $("#line_ham_woop_id".concat(String(ln))).val(hmm_trans_lines.woop_name_id);
    $("#line_ham_woop".concat(String(ln))).val(hmm_trans_lines.woop_name);
    $("#line_primary_uom".concat(String(ln))).val(hmm_trans_lines.uom1);
    $("#line_secondary_uom".concat(String(ln))).val(hmm_trans_lines.uom2);
    $("#line_primary_uom_id".concat(String(ln))).val(hmm_trans_lines.uom1_id);
    $("#line_secondary_uom_id".concat(String(ln))).val(hmm_trans_lines.uom2_id);
    $("#line_secondary_unit_defaulting".concat(String(ln))).val(hmm_trans_lines.secondary_unit_defaulting_c);
    $("#line_tracking_uom".concat(String(ln))).val(hmm_trans_lines.tracking_uom_c);
    //$("#line_uom_conversion".concat(String(ln))).val((hmm_trans_lines.uom_conversion==0)?null:hmm_trans_lines.uom_conversion);//?????
    $("#line_from_locator_control".concat(String(ln))).val(hmm_trans_lines.from_location_mode);
    $("#line_to_locator_control".concat(String(ln))).val(hmm_trans_lines.to_location_mode);
    renderTransLine(ln);
    resetItem(ln);
  }
}

function insertTransLineElements(tableid,current_view) { //创建界面要素
//包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面
if (document.getElementById(tableid + '_head') !== null) {
  document.getElementById(tableid + '_head').style.display = "";
}


sqs_objects["line_inventory_item[" + prodln + "]"] = {
  "form": "EditView",
  "method": "query",
  "modules": ["AOS_Products"],
  "group": "or",
  "field_list": ["name", "id", "primary_uom_c", "haa_uom_id_c", "secondary_uom_c","haa_uom_id1_c","secondary_unit_defaulting_c","tracking_uom_c"],
  "populate_list": ["line_inventory_item[" + prodln + "]", "line_item_id[" + prodln + "]", "line_primary_uom[" + prodln + "]", "line_primary_uom_id[" + prodln + "]", "line_secondary_uom[" + prodln + "]", "line_secondary_unit_defaulting[" + prodln + "]", "line_tracking_uom[" + prodln + "]"],
  "required_list": ["line_item_id[" + prodln + "]"],
  "conditions": [{
    "name": "name",
    "op": "like_custom",
    "end": "%",'begin': '%',
    "value": ""
  }],
  "order": "name",
  "limit": "30",
  "post_onblur_function": "resetItem(" + prodln + ");",
  "no_match_text": "No Match"
};
 /*  sqs_objects["line_target_organization[" + prodln + "]"] = {
    "form": "EditView",
    "method": "query",
    "modules": ["Accounts"],
    "group": "or",
    "field_list": ["name", "id"],
    "populate_list": ["line_target_organization[" + prodln + "]", "line_account_id_c[" + prodln + "]"],
    "required_list": ["line_account_id_c[" + prodln + "]"],
    "conditions": [{
      "name": "name",
      "op": "like_custom",
      "end": "%",'begin': '%',
      "value": ""
    }],
    "order": "name",
    "limit": "30",
    // "post_onblur_function": "resetItem(" + prodln + ");",
    "no_match_text": "No Match"
  };
  sqs_objects["line_target_person[" + prodln + "]"] = {
    "form": "EditView",
    "method": "query",
    "modules": ["Contacts"],
    "group": "or",
    "field_list": ["name", "id"],
    "populate_list": ["line_target_person[" + prodln + "]", "line_contact_id_c[" + prodln + "]"],
    "required_list": ["line_contact_id_c[" + prodln + "]"],
    "conditions": [{
      "name": "name",
      "op": "like_custom",
      "end": "%",'begin': '%',
      "value": ""
    }],
    "order": "name",
    "limit": "30",
    // "post_onblur_function": "resetItem(" + prodln + ");",
    "no_match_text": "No Match"
  };
  sqs_objects["line_target_location[" + prodln + "]"] = {
    "form": "EditView",
    "method": "query",
    "modules": ["HAT_Asset_Locations"],
    "group": "or",
    "field_list": ["name", "id","location_title"],
    "populate_list": ["line_target_location[" + prodln + "]", "line_hat_asset_locations_id_c[" + prodln + "]", "line_target_location_desc[" + prodln + "]"],
    "required_list": ["line_hat_asset_locations_id_c[" + prodln + "]"],
    "conditions": [{
      "name": "name",
      "op": "like_custom",
      "end": "%",'begin': '%',
      "value": ""
    }],
    "order": "name",
    "limit": "30",
    // "post_onblur_function": "resetItem(" + prodln + ");",
    "no_match_text": "No Match"
  };*/

  tablebody = document.createElement("tbody");
  tablebody.id = "line_body" + prodln;
  document.getElementById(tableid).appendChild(tablebody);


  var z1 = tablebody.insertRow(-1);
  z1.id = 'trans_line_displayed' + prodln;
  z1.className = 'oddListRowS1';
  z1.innerHTML  =
  "<td><span name='displayed_line_num[" + prodln + "]' id='displayed_line_num" + prodln + "'>1</span></td>" +
  "<td><span name='displayed_line_inventory_item[" + prodln + "]' id='displayed_line_inventory_item" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_primary_qty[" + prodln + "]' id='displayed_line_primary_qty" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_secondary_qty[" + prodln + "]' id='displayed_line_secondary_qty" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_from_location[" + prodln + "]' id='displayed_line_from_location" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_from_locator[" + prodln + "]' id='displayed_line_from_locator" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_to_location[" + prodln + "]' id='displayed_line_to_location" + prodln + "'></span></td>"+
  "<td><span name='displayed_line_to_locator[" + prodln + "]' id='displayed_line_to_locator" + prodln + "'></span></td>" +
  "<td><span name='displayed_line_ham_woop[" + prodln + "]' id='displayed_line_ham_woop" + prodln + "'></span></td>" +
  "<td><span name='displayed_line_description[" + prodln + "]' id='displayed_line_description" + prodln + "'></span></td>" +
  "<td>"+
  (current_view=="EditView"?"<input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'>":" ")+
  "</td>";

  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'trans_editor' + prodln;
  x.style = "display:none";

  x.innerHTML  = "<td colSpan='9'><div class='lineEditor'>"+
  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HMM_Trans_Lines', 'LBL_ITEM')+"<span class='required'>*</span></label>"+
  "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_inventory_item[" + prodln + "]' id='line_inventory_item" + prodln + "' value='' title='' onblur='resetItem("+prodln+")'>"+
  "<input type='hidden' name='line_item_id[" + prodln + "]' id='line_item_id" + prodln + "' value=''>"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openItemPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HMM_Trans_Lines', 'LBL_DESCRIPTION')+"</label>"+
  "<input  autocomplete='off' type='text' style='width:153px;' name='line_description[" + prodln + "]' id='line_description" + prodln + "' value='' title='' onblur='resetItem("+prodln+")'>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HMM_Trans_Lines', 'LBL_PRIMARY_QTY')+" <span class='required'>*</span></label>"+
  "<input style='width:153px;'  autocomplete='off' type='text' name='line_primary_qty[" + prodln + "]' id='line_primary_qty" + prodln + "' maxlength='50' value='' title='' onchange='primary_qty_change("+prodln+")'>"+
  " <span id='line_primary_qty_uom" + prodln + "'></span>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label id='line_secondary_qty" + prodln + "_label'>"+SUGAR.language.get('HMM_Trans_Lines', 'LBL_SECONDARY_QTY')+"</label>"+
  "<input style='width:153px;'  autocomplete='off' type='text' name='line_secondary_qty[" + prodln + "]' id='line_secondary_qty" + prodln + "' maxlength='50' value='' title='' onchange='secondary_qty_change("+prodln+")'>"+
  "<span id='line_target_asset_status_displayed" + prodln + "' ></span>"+
  " <span id='line_secondary_qty_uom" + prodln + "'></span>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label id='line_from_location" + prodln + "_label'>"+SUGAR.language.get('HMM_Trans_Lines', 'LBL_FROM_LOCATION')+" <span class='required'>*</span></label>"+
  "<input class='sqsEnabled' style='width:153px;' autocomplete='off' type='text' name='line_from_location[" + prodln + "]' id='line_from_location" + prodln + "' value='' title='' >"+
  "<input type='hidden' name='line_from_location_id[" + prodln + "]' id='line_from_location_id" + prodln + "' value='' />"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openFromLocationPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label id='line_from_locator" + prodln + "_label'>"+SUGAR.language.get('HMM_Trans_Lines', 'LBL_FROM_LOCATOR')+" <span class='required'>*</span></label>"+
  "<input class='sqsEnabled' style='width:153px;' autocomplete='off' type='text' name='line_from_locator[" + prodln + "]' id='line_from_locator" + prodln + "' value='' title='' >"+
  "<input type='hidden' name='line_from_locator_id[" + prodln + "]' id='line_from_locator_id" + prodln + "' value='' />"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openFromLocatorPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label id='line_to_location" + prodln + "_label'>"+SUGAR.language.get('HMM_Trans_Lines', 'LBL_TO_LOCATION')+"</label>"+
  "<input class='sqsEnabled' style=' width:153px;' type='text' name='line_to_location[" + prodln + "]' id='line_to_location" + prodln + "' maxlength='50' value='' title=''>"+
  "<input type='hidden' name='line_to_location_id[" + prodln + "]' id='line_to_location_id" + prodln + "' value='' />"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openToLocationPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label id='line_to_locator" + prodln + "_label'>"+SUGAR.language.get('HMM_Trans_Lines', 'LBL_TO_LOCATOR')+" <span class='required'>*</span></label>"+
  "<input class='sqsEnabled' style=' width:153px;' type='text' name='line_to_locator[" + prodln + "]' id='line_to_locator" + prodln + "' maxlength='50' value='' title=''>"+
  "<input type='hidden' name='line_to_locator_id[" + prodln + "]' id='line_to_locator_id" + prodln + "' value='' />"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openToLocatorPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label id='line_ham_woop" + prodln + "_label'>"+SUGAR.language.get('HMM_Trans_Lines', 'LBL_WOOP')+" <span class='required'>*</span></label>"+
  "<input class='sqsEnabled' style=' width:153px;' type='text' name='line_ham_woop[" + prodln + "]' id='line_ham_woop" + prodln + "' maxlength='50' value='' title=''>"+
  "<input type='hidden' name='line_ham_woop_id[" + prodln + "]' id='line_ham_woop_id" + prodln + "' value='' />"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openWOOPPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+
  "<input type='hidden' name='line_deleted[" + prodln + "]' id='line_deleted" + prodln + "' value='0'>"+
  "<input type='hidden' name='line_id[" + prodln + "]' id='line_id" + prodln + "' value=''>"+

  "<input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
  "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>"+

  "<input type='hidden' name='line_primary_uom[" + prodln + "]' id='line_primary_uom" + prodln + "' maxlength='50' value='' title=''>"+
  "<input type='hidden' name='line_secondary_uom[" + prodln + "]' id='line_secondary_uom" + prodln + "' maxlength='50' value='' title='' >"+
  "<input type='hidden' name='line_primary_uom_id[" + prodln + "]' id='line_primary_uom_id" + prodln + "' maxlength='50' value='' title=''>"+
  "<input type='hidden' name='line_secondary_uom_id[" + prodln + "]' id='line_secondary_uom_id" + prodln + "' maxlength='50' value='' title='' >"+
  "<input type='hidden' name='line_secondary_unit_defaulting[" + prodln + "]' id='line_secondary_unit_defaulting" + prodln + "' maxlength='50' value='' title=''>"+
  "<input type='hidden' name='line_tracking_uom[" + prodln + "]' id='line_tracking_uom" + prodln + "' maxlength='50' value='' title='' >"+
  "<input type='hidden' name='line_uom_conversion[" + prodln + "]' id='line_uom_conversion" + prodln + "' maxlength='50' value='' title='' >"+
  "<input type='hidden' name='line_from_locator_control[" + prodln + "]' id='line_from_locator_control" + prodln + "' maxlength='50' value='' title='' >"+
  "<input type='hidden' name='line_to_locator_control[" + prodln + "]' id='line_to_locator_control" + prodln + "' maxlength='50' value='' title='' >"+

  "</div></td>";

  addToValidate('EditView', 'line_item_id'+ prodln,'varchar', 'true',SUGAR.language.get('HMM_Trans_Lines', 'LBL_ITEM'));
  addToValidate('EditView', 'line_primary_qty'+ prodln,'varchar', 'true',SUGAR.language.get('HMM_Trans_Lines', 'LBL_PRIMARY_QTY'));

  renderTransLine(prodln);

  prodln++;

  return prodln - 1;
}

function renderTransLine(ln) { //将编辑器中的内容显示于正常行中
  //alert(("#displayed_line_num"+ln)+"="+ $("#displayed_line_num"+ln).html());
  $("#displayed_line_inventory_item"+ln).html($("#line_inventory_item"+ln).val());
  $("#displayed_line_primary_qty"+ln).html($("#line_primary_qty"+ln).val() + " "+$("#line_primary_uom"+ln).val());
  if ($("#line_secondary_qty"+ln).val()!=0) {
    $("#displayed_line_secondary_qty"+ln).html($("#line_secondary_qty"+ln).val() + " " + $("#line_secondary_uom"+ln).val());
  }
  $("#displayed_line_from_location"+ln).html($("#line_from_location"+ln).val());
  $("#displayed_line_from_locator"+ln).html($("#line_line_from_locator"+ln).val());
  $("#displayed_line_to_location"+ln).html($("#line_to_location"+ln).val());
  $("#displayed_line_to_locator"+ln).html($("#line_to_locator"+ln).val());
  $("#displayed_line_ham_woop"+ln).html($("#line_ham_woop"+ln).val());
  $("#displayed_line_description"+ln).html($("#line_description"+ln).val());
  basic_evert_type = $("#trans_basic_type").val();
  switch (basic_evert_type) {
    case "INV_IN": //入库时
    $("#from_locator_control").val("");
    mark_field_disabled("line_from_location"+ln);
    mark_field_enabled("line_to_location"+ln);
    setLineLocatorFields(ln);
        //mark_field_disabled("hmm_mo_request");
        mark_field_disabled("line_ham_woop"+ln);
        break;
      case "INV_OUT": //出库
      $("#to_locator_control").val("");
      mark_field_enabled("from_location"+ln);
      setLineLocatorFields(ln)
      mark_field_disabled("line_to_location"+ln);
        //mark_field_disabled("hmm_mo_request");
        mark_field_disabled("line_ham_woop"+ln);
        break;
    case "INV_TRANSFER":  //移库
    mark_field_enabled("line_from_location"+ln);
    mark_field_enabled("line_to_location"+ln);
    setLineLocatorFields(ln)
        //mark_field_disabled("hmm_mo_request");
        mark_field_disabled("line_ham_woop"+ln);
        break;
    case "INV_WO"://发料
    $("#to_locator_control").val("");
    mark_field_enabled("line_from_location"+ln);
    setLineLocatorFields(ln)
    mark_field_disabled("line_to_location"+ln);
        //mark_field_disabled("hmm_mo_request");
        mark_field_enabled("ham_woop"+ln);
        break;
        default:
        $("#from_locator_control").val("");
        $("#to_locator_control").val("");
        mark_field_disabled("line_from_location"+ln);
        mark_field_disabled("line_to_location"+ln);
        //mark_field_disabled("hmm_mo_request");
        mark_field_disabled("line_ham_woop"+ln);
        break;
      }
    }

    function setLineLocatorFields(ln) {
      if ($("#line_from_locator_control"+ln).val()=="LOCATOR") {
  //启用了货位控制，显示货位
  mark_field_enabled("line_from_locator"+ln);
} else {
  //停用货位
  mark_field_disabled("line_from_locator"+ln);
};
if ($("#line_to_locator_control"+ln).val()=="LOCATOR") {
  //启用了货位控制，显示货位
  mark_field_enabled("line_to_locator"+ln);
} else {
  //停用货位
  mark_field_disabled("line_to_locator"+ln);
};
}

function getUOMConversion(s_uom_id, d_uom_id, product_id,input_obj) {
$.ajax({//读取子地点
  url: 'index.php?to_pdf=true&module=HAA_UOM_Conversions&action=getConversion&s_uom_id=' + s_uom_id + "&d_uom_id="+ d_uom_id+ "&product_id="+ product_id,
    //dataType: "json",
    success: function (data) {
      //console.log('index.php?to_pdf=true&module=HAA_UOM_Conversions&action=getConversion&s_uom_id=' + s_uom_id + "&d_uom_id="+ d_uom_id+ "&product_id="+ product_id);
      var obj = jQuery.parseJSON(data);
      input_obj.val(parseFloat(obj.conversion))
    },
    error: function () { //失败
      alert('Error loading document');
    }
  });
}

function resetItem(ln){ //在用户重新选择物料之后，会连带的更新相关的字段信息。
  $("#line_primary_qty_uom"+ln).text($("#line_primary_uom"+ln).val());
  $("#line_secondary_qty_uom"+ln).text($("#line_secondary_uom"+ln).val());

  $("#line_tracking_uom"+ln).val(getLovValueByText("line_tracking_uom"+ln,"tracking_uom_lov"));
  $("#line_secondary_unit_defaulting"+ln).val(getLovValueByText("line_secondary_unit_defaulting"+ln,"secondary_unit_defaulting_lov"));

  if ($("#line_secondary_uom"+ln).val()!="") { //如果当前物料存在辅助单位
    mark_field_enabled("line_secondary_qty"+ln);
    mark_field_enabled("line_secondary_uom"+ln);

    getUOMConversion($("#line_secondary_uom_id"+ln).val(),$("#line_primary_uom_id"+ln).val(),$("#line_item_id"+ln).val(),$("#line_uom_conversion"+ln));
    //通过Ajax得到当前物料的UOM换算率

  } else { //如果当前物料不存在辅助单位
    mark_field_disabled("line_secondary_qty"+ln);
    mark_field_disabled("line_secondary_uom"+ln);
  }
  //通过Ajax来确定物料的单位，以及单位换算

 // if ($("#line_item"+ln).val()=== '') { //如果资产字段为空，则将所有关联的字段全部清空
  //}
}


function insertTransLineFootor(tableid)
{
  tablefooter = document.createElement("tfoot");
  document.getElementById(tableid).appendChild(tablefooter);

  var footer_row=tablefooter.insertRow(-1);
  var footer_cell = footer_row.insertCell(0);

  footer_cell.scope="row";
  footer_cell.colSpan="9";
  footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HMM_Trans_Lines', 'LBL_BTN_ADD_TRANS_LINE')+"' />";
  //TODO:添加一个Checkbox用于显示和隐藏当前组织、人员、地点……
}

function addNewLine(tableid) {
  //console.log(check_form('EditView'));
  //
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增
    insertTransLineElements(tableid);//加入新行
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
    removeFromValidate('EditView', key + 'inventory_item'+ ln);
    removeFromValidate('EditView', key + 'item_id'+ ln);
    removeFromValidate('EditView', key + 'primary_qty'+ ln);
    removeFromValidate('EditView', key + 'secondary_qty'+ ln);
    removeFromValidate('EditView', key + 'from_location'+ ln);
    removeFromValidate('EditView', key + 'to_location'+ ln);
    removeFromValidate('EditView', key + 'from_locator'+ ln);
    removeFromValidate('EditView', key + 'to_locator'+ ln);
    removeFromValidate('EditView', key + 'ham_woop'+ ln);
  }
  //resetLineNum();

}



function LineEditorShow(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
  if (prodln>1) {
    for (var i=0;i<prodln;i++) {
      LineEditorClose(i);
    }
  }
  $("#trans_line_displayed"+ln).hide();
  $("#trans_editor"+ln).show();

}

function LineEditorClose(ln) {//关闭行编辑器（显示为正常行）
  if (check_form('EditView')) {
    $("#trans_editor"+ln).hide();
    $("#trans_line_displayed"+ln).show();
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

function primary_qty_change(ln) { //输入完主数量后，自动更新辅助数量
  var primary_qty = parseFloat($("#line_primary_qty"+ln).val());
  var defaulting_mode = $("#line_secondary_unit_defaulting"+ln).val();
  if (defaulting_mode=="FIXED" || (defaulting_mode=="DEFAULT" & $("#line_secondary_qty"+ln).val()=="")) {
    //默认规则=FIXED在任意情况下都保持两个字段同步，DEFAULT只有在另一字段为空时才会同步
    $("#line_primary_qty"+ln).val(primary_qty);
    $("#line_secondary_qty"+ln).val(primary_qty*$("#line_uom_conversion"+ln).val());
  }
};


function secondary_qty_change(ln) { //输入完主数量后，自动更新辅助数量
  var secondary_qty =parseFloat($("#line_secondary_qty"+ln).val());
  var defaulting_mode = $("#line_secondary_unit_defaulting"+ln).val();
  if (defaulting_mode=="FIXED" || (defaulting_mode=="DEFAULT" & $("#line_primary_qty"+ln).val()=="")) {
    //默认规则=FIXED在任意情况下都保持两个字段同步，DEFAULT只有在另一字段为空时才会同步
    $("#line_secondary_qty"+ln).val(secondary_qty);
    $("#line_primary_qty"+ln).val(secondary_qty/$("#line_uom_conversion"+ln).val());
  }
};


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