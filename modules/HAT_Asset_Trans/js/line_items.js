var prodln = 0;
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function openAssetPopup(ln){//本文件为行上选择资产的按钮
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setAssetReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id" : "line_hat_assets_hat_asset_transhat_assets_ida" + ln,
      "name" : "line_asset" + ln,
      "asset_desc" : "line_name" + ln,
      "asset_status" : "line_current_asset_status" + ln,//注意，这一条目写的是Current
      "hat_assets_accounts_name" : "line_target_organization" + ln,
      "hat_assets_accountsaccounts_ida" : "line_account_id_c" + ln,
      "hat_assets_contacts_name" : "line_target_person" + ln,
      "hat_assets_contactscontacts_ida" : "line_contact_id_c" + ln,
      "hat_asset_locations_hat_assets_name" : "line_target_location" + ln,
      "hat_asset_locations_hat_assetshat_asset_locations_ida" : "line_hat_asset_locations_id_c" + ln,
      "location_desc" : "line_target_location_desc" + ln,
    }
  };
  open_popup('HAT_Assets', 600, 850, '', true, true, popupRequestData);
}

function setAssetReturn(popupReplyData){
  set_return(popupReplyData);
  resetAsset(lineno);
}



function openAccountPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_target_organization" + ln,
      "id" : "line_account_id_c" + ln,
    },
  };

  open_popup('Accounts', 1000, 850,'' , true, true, popupRequestData);
}
function openContactPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_target_person" + ln,
      "id" : "line_contact_id_c" + ln,
    }
  };
  var popupFilter = '&account_locked=ture&account_name_advanced='+$("#line_target_organization"+ln).val();
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
      "id" : "line_hat_asset_locations_id_c" + ln
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
  b.innerHTML=SUGAR.language.get('HAT_Asset_Trans', 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE');
  var b1=x.insertCell(2);
  b1.innerHTML=SUGAR.language.get('HAT_Asset_Trans', 'LBL_NAME');
  var c=x.insertCell(3);
  c.innerHTML=SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_TARGET_ASSET_STATUS');
  var d=x.insertCell(4);
  d.innerHTML=SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_RESPONSIBLE_CENTER');
  var e=x.insertCell(5);
  e.innerHTML=SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_RESPONSIBLE_PERSON');
  var f=x.insertCell(6);
  f.innerHTML=SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_LOCATION');
  var g=x.insertCell(7);
  g.innerHTML=SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_LOCATION_DESC');
  var h=x.insertCell(8);
  h.innerHTML='&nbsp;';
}


function insertLineData(asset_trans_line ){ //将数据写入到对应的行字段中
  //console.log(asset_trans_line);
  var ln = 0;
  if(asset_trans_line.id != '0' && asset_trans_line.id !== ''){
    ln = insertTransLineElements("lineItems");
    $("#line_id".concat(String(ln))).val(asset_trans_line.id);
    $("#line_asset".concat(String(ln))).val(asset_trans_line.asset_name);
    $("#line_hat_assets_hat_asset_transhat_assets_ida".concat(String(ln))).val(asset_trans_line.asset_id);
    $("#line_name".concat(String(ln))).val(asset_trans_line.line_name);
    $("#line_target_asset_status".concat(String(ln))).val(asset_trans_line.target_asset_status);
    $("#line_current_asset_status".concat(String(ln))).val(asset_trans_line.current_asset_status);
    $("#line_target_organization".concat(String(ln))).val(asset_trans_line.target_account_name);
    $("#line_account_id_c".concat(String(ln))).val(asset_trans_line.target_account_id);
    $("#line_current_responsible_center".concat(String(ln))).val(asset_trans_line.current_responsible_center);
    $("#line_target_person".concat(String(ln))).val(asset_trans_line.target_contact_name);
    $("#line_contact_id_c".concat(String(ln))).val(asset_trans_line.target_contact_id);
    $("#line_current_responsible_person".concat(String(ln))).val(asset_trans_line.current_responsible_person);
    $("#line_target_location".concat(String(ln))).val(asset_trans_line.target_location_name);
    $("#line_hat_asset_locations_id_c".concat(String(ln))).val(asset_trans_line.target_location_id);
    $("#line_target_location_desc".concat(String(ln))).val(asset_trans_line.target_location_desc);
    $("#line_current_location".concat(String(ln))).val(asset_trans_line.current_location);
    $("#line_current_location_desc".concat(String(ln))).val(asset_trans_line.current_location_desc);

    //$("#line_name".concat(String(ln))).val(asset_line.target_location_desc);
    renderTransLine(ln);
  }
}

function insertTransLineElements(tableid) { //创建界面要素
//包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面
  if (document.getElementById(tableid + '_head') !== null) {
    document.getElementById(tableid + '_head').style.display = "";
  }

  sqs_objects["line_asset[" + prodln + "]"] = {
    "form": "EditView",
    "method": "query",
    "modules": ["HAT_Assets"],
    "group": "or",
    "field_list": ["name", "id", "asset_desc", "asset_status", "hat_assets_accountsaccounts_ida"],
    "populate_list": ["line_asset[" + prodln + "]", "line_hat_assets_hat_asset_transhat_assets_ida[" + prodln + "]", "line_name[" + prodln + "]", "line_target_asset_status[" + prodln + "]", "line_target_organization[" + prodln + "]"],
    "required_list": ["line_hat_assets_hat_asset_transhat_assets_ida[" + prodln + "]"],
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
  sqs_objects["line_target_organization[" + prodln + "]"] = {
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
    // "post_onblur_function": "resetAsset(" + prodln + ");",
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
    // "post_onblur_function": "resetAsset(" + prodln + ");",
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
      "<td><span name='displayed_line_asset[" + prodln + "]' id='displayed_line_asset" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_name[" + prodln + "]' id='displayed_line_name" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_target_asset_status[" + prodln + "]' id='displayed_line_target_asset_status" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_target_organization[" + prodln + "]' id='displayed_line_target_organization" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_target_person[" + prodln + "]' id='displayed_line_target_person" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_target_location[" + prodln + "]' id='displayed_line_target_location" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_target_location_desc[" + prodln + "]' id='displayed_line_target_location_desc" + prodln + "'></span></td>"+
      "<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'></td>";
  var z2 = tablebody.insertRow(-1);
  z2.id = 'asset_trans_line2_displayed' + prodln;
  z2.innerHTML  =
      "<td></td>" +
      "<td></td>" +
      "<td></td>" +
      "<td><span name='displayed_line_current_asset_status[" + prodln + "]' id='displayed_line_current_asset_status" + prodln + "'>2</span></td>"+
      "<td><span name='displayed_line_current_responsible_center[" + prodln + "]' id='displayed_line_current_responsible_center" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_current_responsible_person[" + prodln + "]' id='displayed_line_current_responsible_person" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_current_location[" + prodln + "]' id='displayed_line_current_location" + prodln + "'></span></td>"+
      "<td><span name='displayed_line_current_location_desc[" + prodln + "]' id='displayed_line_current_location_desc" + prodln + "'></span></td>"+
      "<td></td>";

  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'asset_trans_editor' + prodln;
  x.style = "display:none";

  x.innerHTML  = "<td colSpan='9'><div class='lineEditor'>"+
      "<span class='input_group'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE')+"<span class='required'>*</span></label>"+
      "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_asset[" + prodln + "]' id='line_asset" + prodln + "' value='' title='' onblur='resetAsset("+prodln+")'>"+
      "<input type='hidden' name='line_hat_assets_hat_asset_transhat_assets_ida[" + prodln + "]' id='line_hat_assets_hat_asset_transhat_assets_ida" + prodln + "' value=''>"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openAssetPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      "<span class='input_group'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_NAME')+" <span class='required'>*</span></label>"+
      "<input style='width:225px;'  autocomplete='off' type='text' name='line_name[" + prodln + "]' id='line_name" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      "<span class='input_group'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_ASSET_STATUS')+"</label>"+
      "<input style='width:78px;' type='hidden' readonly='readonly' name='line_target_asset_status[" + prodln + "]' id='line_target_asset_status" + prodln + "'  value='' title=''>"+
      "<span id='line_target_asset_status_displayed" + prodln + "' ></span>"+
      "</span>"+
      "<span class='input_group'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_RESPONSIBLE_CENTER')+" <span class='required'>*</span></label>"+
      "<input class='sqsEnabled' style='width:153px;' autocomplete='off' type='text' name='line_target_organization[" + prodln + "]' id='line_target_organization" + prodln + "' value='' title='' >"+
      "<input type='hidden' name='line_account_id_c[" + prodln + "]' id='line_account_id_c" + prodln + "' value='' />"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openAccountPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      "<span class='input_group'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_RESPONSIBLE_PERSON')+"</label>"+
      "<input class='sqsEnabled' style=' width:103px;' type='text' name='line_target_person[" + prodln + "]' id='line_target_person" + prodln + "' maxlength='50' value='' title=''>"+
      "<input type='hidden' name='line_contact_id_c[" + prodln + "]' id='line_contact_id_c" + prodln + "' value='' />"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openContactPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      "<span class='input_group'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_LOCATION')+" <span class='required'>*</span></label>"+
      "<input class='sqsEnabled' style=' width:103px;' type='text' name='line_target_location[" + prodln + "]' id='line_target_location" + prodln + "' maxlength='50' value='' title=''>"+
      "<input type='hidden' name='line_hat_asset_locations_id_c[" + prodln + "]' id='line_hat_asset_locations_id_c" + prodln + "' value='' />"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openLocationPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      "<span class='input_group'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_LOCATION_DESC')+"</label>"+
      "<input style=' width:153px;' type='text' name='line_target_location_desc[" + prodln + "]' id='line_target_location_desc" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      "<input type='hidden' name='line_deleted[" + prodln + "]' id='line_deleted" + prodln + "' value='0'>"+
      "<input type='hidden' name='line_id[" + prodln + "]' id='line_id" + prodln + "' value=''>"+

        //"<button type='button' id='line_delete_line" + prodln + "' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='markLineDeleted(" + prodln + ",\"line_\")'><img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>"+

      "<input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
        // "<input style='float:right;' type='button' id='btn_LineEditorClose" + prodln + "' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "'onclick='LineEditorClose(" + prodln + ")>"+
      "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>"+

      "<input type='hidden' name='line_current_asset_status[" + prodln + "]' id='line_current_asset_status" + prodln + "' maxlength='50' value='' title=''>"+
      "<input type='hidden' name='line_current_responsible_center[" + prodln + "]' id='line_current_responsible_center" + prodln + "' maxlength='50' value='' title='' >"+
      "<input type='hidden' name='line_current_responsible_person[" + prodln + "]' id='line_current_responsible_person" + prodln + "'  maxlength='50' value='' title='' >"+
      "<input type='hidden' name='line_current_location[" + prodln + "]' id='line_current_location" + prodln + "'  value='' title='' >"+
      "<input type='hidden' name='line_current_location_desc[" + prodln + "]' id='line_current_location_desc" + prodln + "'  maxlength='50' value='' title='' >"+
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
  //alert(("#displayed_line_num"+ln)+"="+ $("#displayed_line_num"+ln).html());
  $("#displayed_line_asset"+ln).html($("#line_asset"+ln).val());
  $("#displayed_line_name"+ln).html($("#line_name"+ln).val());
  $("#displayed_line_target_asset_status"+ln).html($("#line_target_asset_status_displayed"+ln+" span").text());
  $("#displayed_line_target_organization"+ln).html($("#line_target_organization"+ln).val());
  $("#displayed_line_target_person"+ln).html($("#line_target_person"+ln).val());
  $("#displayed_line_target_location"+ln).html($("#line_target_location"+ln).val());
  $("#displayed_line_target_location_desc"+ln).html($("#line_target_location_desc"+ln).val());
  $("#displayed_line_current_asset_status"+ln).html($("#lov_asset_status_list option[value='"+$("#line_current_asset_status"+ln).val()+"']").text());
  $("#displayed_line_current_responsible_center"+ln).html($("#line_current_responsible_center"+ln).val());
  $("#displayed_line_current_responsible_person"+ln).html($("#line_current_responsible_person"+ln).val());
  $("#displayed_line_current_location"+ln).html($("#line_current_location"+ln).val());
  $("#displayed_line_current_location_desc"+ln).html($("#line_current_location_desc"+ln).val());
}

function resetAsset(ln){ //在用户重新选择资产之后，会连带的更新资产相关的字段信息。
  //alert(document.getElementById("line_current_responsible_center"+ln).value);
  //alert($("#line_current_responsible_center"+ln).val());
  if ($("#line_asset"+ln).val()=== '') { //如果资产字段为空，则将所有关联的字段全部清空
    $("#line_hat_assets_hat_asset_transhat_assets_ida"+ln).val("");
    $("#line_target_organization"+ln).val("");
    $("#line_target_person"+ln).val("");
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
  var current_status_text=$("#line_current_asset_status"+ln).val();//current从Popup中返回的是Text，要以Value形式保存，否则会有多语言问题
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
  footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HAT_Asset_Trans', 'LBL_BTN_ADD_TRANS_LINE')+"' />";
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
