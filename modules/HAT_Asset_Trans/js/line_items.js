if(typeof(YAHOO.SUGAR) == 'undefined') {
  $.getScript("include/javascript/sugarwidgets/SugarYUIWidgets.js");
}

var prodln = 0;
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function openAssetPopup(ln){//本文件为行上选择资产的按钮
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setAssetReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id" : "line_asset_id" + ln,
      "name" : "line_asset" + ln,
      "asset_desc" : "line_name" + ln,
      "asset_status" : "line_current_asset_status" + ln,//注意，这一条目写的是Current
      "parent_asset" : "line_current_parent_asset" + ln,
      "parent_asset_id" : "line_current_parent_asset_id" + ln,
      "owning_org" : "line_current_owning_org" + ln,
      "owning_org_id" : "line_current_owning_org_id" + ln,
      "owning_person" : "line_current_owning_person" + ln,
      "owning_person_id" : "line_current_owning_person_id" + ln,
      "owning_person_desc" : "line_current_owning_person_desc" + ln,
      "using_org" : "line_current_using_org" + ln,
      "using_org_id" : "line_current_using_org_id" + ln,
      "using_person" : "line_current_using_person" + ln,
      "using_person_id" : "line_current_using_person_id" + ln,
      "using_person_desc" : "line_current_using_person_desc" + ln,
      "hat_asset_locations_hat_assets_name" : "line_current_location" + ln,
      "hat_asset_locations_hat_assetshat_asset_locations_ida" : "line_current_location_id" + ln,
      "location_desc" : "line_current_location_desc" + ln,
    }
  };
  var popupFilter = '&framework_advanced='+$("#haa_framework").val();
  open_popup('HAT_Assets', 600, 850, popupFilter, true, true, popupRequestData);
}

function setAssetReturn(popupReplyData){
  //popupReplyData中lineno会做为行号一并返回
  set_return(popupReplyData);

  //-Start:将Status的值返回到当前资产状态字段中（默认返回的是文本）
  var current_status_text = $("#line_current_asset_status"+lineno).val();//current从Popup中返回的是Text，要以Value形式保存，否则会有多语言问题
  var current_status_value = hat_asset_status_list.filter(function( obj ) {
                                return obj.value === current_status_text//current_status_text;
                              });
  $("#line_current_asset_status"+lineno).val(current_status_value[0].name);
  //-END:将Status的值返回到当前资产状态字段中

  resetAsset(lineno);
}


function openParentAssetPopup(ln){//本文件为行上选择资产的按钮
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_target_parent_asset" + ln,
      "id" : "line_target_parent_asset_id" + ln,
    },
  };
  var popupFilter = '&framework_advanced='+$("#haa_framework").val();
  open_popup('HAT_Assets', 600, 850, popupFilter, true, true, popupRequestData);
}


function openOwningOrgPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_target_owning_org" + ln,
      "id" : "line_target_owning_org_id" + ln,
    },
  };
  var popupFilter = '&frame_c_advanced='+$("#haa_framework").val();
  open_popup('Accounts', 1000, 850,popupFilter, true, true, popupRequestData);
}


function openUsingOrgPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_target_using_org" + ln,
      "id" : "line_target_using_org_id" + ln,
    },
  };
  var popupFilter = '&frame_c_advanced='+$("#haa_framework").val();
  open_popup('Accounts', 1000, 850,popupFilter , true, true, popupRequestData);
}



function openOwningPersonPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_target_owning_person" + ln,
      "id" : "line_target_owning_person_id" + ln,
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
      "id" : "line_target_using_person_id" + ln,
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
      "id" : "line_target_location_id" + ln
    }
  };
  open_popup('HAT_Asset_Locations', 1000, 850, '', true, true, popupRequestData);
}

/******************************
/* 加载表头
/*******************************/
function insertTransLineHeader(tableid){
  $("#line_items_label").hide();//隐藏标签
  var head_html="<tr>";
  head_html +="<th width='3%'>#</th>";
  head_html +="<th width='13%'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE')+"</th>";
  head_html +="<th width='22%'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_NAME')+"</th>";
  head_html +="<th width='55%'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_DESCRIPTION')+"</th>";
  head_html +="<th width='8%'> </th>";
  head_html +="<tr>";

  $("#lineItems").append(head_html)
}


/******************************
/* 加载表行数据，将具体的数据写入到insertTransLineElements创建出的界面要素中
/*******************************/
function insertLineData(asset_trans_line, current_view){ //将数据写入到对应的行字段中
  //console.log(asset_trans_line);
  var ln = 0;
  if(asset_trans_line.id != '0' && asset_trans_line.id !== ''){
    ln = insertTransLineElements("lineItems", current_view);

    for(var propertyName in asset_trans_line) {
      //这里直接遍历所有的属性（因此需要建立与Bean属性同名的各个字段）
      //console.log(propertyName+"="+asset_trans_line[propertyName]);
      //console.log("#line_"+propertyName.concat(String(ln)) +"=="+ asset_trans_line[propertyName] );
      $("#line_"+propertyName.concat(String(ln))).val(asset_trans_line[propertyName]);
    }

    renderTransLine(ln);
  }
}

/******************************
/* 创建出界面的字段要素（不包括填写值，填写值通过insertLineData完成
/*******************************/
function insertTransLineElements(tableid, current_view) { //创建界面要素
//包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面
  if (document.getElementById(tableid + '_head') !== null) {
    document.getElementById(tableid + '_head').style.display = "";
  }

/*  sqs_objects["line_asset[" + prodln + "]"] = {
    "form": "EditView",
    "method": "query",
    "modules": ["HAT_Assets"],
    "group": "or",
    "field_list": ["name", "id", "asset_desc", "asset_status", "hat_assets_accountsaccounts_ida"],
    "populate_list": ["line_asset[" + prodln + "]", "line_asset_id[" + prodln + "]", "line_name[" + prodln + "]", "line_target_asset_status[" + prodln + "]", "line_target_organization[" + prodln + "]"],
    "required_list": ["line_asset_id[" + prodln + "]"],
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
    "populate_list": ["line_target_location[" + prodln + "]", "line_hat_asset_locations_id[" + prodln + "]", "line_target_location_desc[" + prodln + "]"],
    "required_list": ["line_hat_asset_locations_id[" + prodln + "]"],
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
*/
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
    "<td><span name='displayed_line_description[" + prodln + "]' id='displayed_line_description" + prodln + "'></span></td>";

  if(current_view=="EditView" && $("#asset_trans_status")=="DRAFT") {
      z1.innerHTML+="<input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'>";
  }


  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'asset_trans_editor' + prodln;
  x.style = "display:none";

  x.innerHTML  = "<td colSpan='9'><div class='lineEditor'>"+
      "<span class='input_group'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE')+"<span class='required'>*</span></label>"+
      "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_asset[" + prodln + "]' id='line_asset" + prodln + "' value='' title='' onblur='resetAsset("+prodln+")'>"+
      "<input type='hidden' name='line_asset_id[" + prodln + "]' id='line_asset_id" + prodln + "' value=''>"+
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
      "<span class='input_group ig_parent_asset'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_PARENT_ASSET')+"</label>"+
      "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_target_parent_asset[" + prodln + "]' id='line_target_parent_asset" + prodln + "' value='' title='' onblur='resetAsset("+prodln+")'>"+
      "<input type='hidden' name='line_target_parent_asset_id[" + prodln + "]' id='line_target_parent_asset_id" + prodln + "' value=''>"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openParentAssetPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      "<span class='input_group ig_owning_org'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_RESPONSIBLE_CENTER')+" <span class='required'>*</span></label>"+
      "<input class='sqsEnabled' style='width:153px;' autocomplete='off' type='text' name='line_target_owning_org[" + prodln + "]' id='line_target_owning_org" + prodln + "' value='' title='' >"+
      "<input type='hidden' name='line_target_owning_org_id[" + prodln + "]' id='line_target_owning_org_id" + prodln + "' value='' />"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openOwningOrgPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      "<span class='input_group ig_owning_person_list ig_owning_person'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_OWNING_PERSON')+"</label>"+
      "<input class='sqsEnabled' style='width:103px;' type='text' name='line_target_owning_person[" + prodln + "]' id='line_target_owning_person" + prodln + "' maxlength='50' value='' title=''>"+
      "<input type='hidden' name='line_target_owning_person_id[" + prodln + "]' id='line_target_owning_person_id" + prodln + "' value='' />"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openOwningPersonPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      "<span class='input_group ig_owning_person_desc ig_owning_person'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_OWNING_PERSON')+"</label>"+
      "<input style='width:103px;' name='line_target_owning_person_desc[" + prodln + "]' id='line_target_owning_person_desc" + prodln + "' value='' />"+
      "</span>"+
      "<span class='input_group ig_using_org'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_USING_ORG')+" <span class='required'>*</span></label>"+
      "<input class='sqsEnabled' style='width:153px;' autocomplete='off' type='text' name='line_target_using_org[" + prodln + "]' id='line_target_using_org" + prodln + "' value='' title='' >"+
      "<input type='hidden' name='line_target_using_org_id[" + prodln + "]' id='line_target_using_org_id" + prodln + "' value='' />"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openUsingOrgPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      "<span class='input_group ig_using_person_list ig_using_person'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_USING_PERSON')+"</label>"+
      "<input class='sqsEnabled' style='width:103px;' type='text' name='line_target_using_person[" + prodln + "]' id='line_target_using_person" + prodln + "' maxlength='50' value='' title=''>"+
      "<input type='hidden' name='line_target_using_person_id[" + prodln + "]' id='line_target_using_person_id" + prodln + "' value='' />"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openUsingPersonPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      "<span class='input_group ig_using_person_desc ig_using_person'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_USING_PERSON')+"</label>"+
      "<input style='width:103px;' type='text' name='line_target_using_person_desc[" + prodln + "]' id='line_target_using_person_desc" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      "<span class='input_group ig_location'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_LOCATION')+" <span class='required'>*</span></label>"+
      "<input class='sqsEnabled' style='width:153px;' type='text' name='line_target_location[" + prodln + "]' id='line_target_location" + prodln + "' maxlength='50' value='' title=''>"+
      "<input type='hidden' name='line_target_location_id[" + prodln + "]' id='line_target_location_id" + prodln + "' value='' />"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openLocationPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      "<span class='input_group ig_location'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_LOCATION_DESC')+"</label>"+
      "<input style='width:153px;' type='text' name='line_target_location_desc[" + prodln + "]' id='line_target_location_desc" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      "<input type='hidden' name='line_deleted[" + prodln + "]' id='line_deleted" + prodln + "' value='0'>"+
      "<input type='hidden' name='line_id[" + prodln + "]' id='line_id" + prodln + "' value=''>"+

        //"<button type='button' id='line_delete_line" + prodln + "' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='markLineDeleted(" + prodln + ",\"line_\")'><img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>"+

      "<input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
        // "<input style='float:right;' type='button' id='btn_LineEditorClose" + prodln + "' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "'onclick='LineEditorClose(" + prodln + ")>"+
      "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>"+

      "<input type='hidden' name='line_current_parent_asset[" + prodln + "]' id='line_current_parent_asset" + prodln + "'  value='' title='' >"+
      "<input type='hidden' name='line_current_parent_asset_id[" + prodln + "]' id='line_current_parent_asset_id" + prodln + "'  value='' title='' >"+
      "<input type='hidden' name='line_current_using_org_id[" + prodln + "]' id='line_current_using_org_id" + prodln + "'  value='' title='' >"+
      "<input type='hidden' name='line_current_using_org[" + prodln + "]' id='line_current_using_org" + prodln + "'  value='' title='' >"+
      "<input type='hidden' name='line_current_owning_org_id[" + prodln + "]' id='line_current_owning_org_id" + prodln + "'  value='' title=''>"+
      "<input type='hidden' name='line_current_owning_org[" + prodln + "]' id='line_current_owning_org" + prodln + "' value='' title=''>"+
      "<input type='hidden' name='line_current_location_id[" + prodln + "]' id='line_current_location_id" + prodln + "'  value='' title='' >"+
      "<input type='hidden' name='line_current_location[" + prodln + "]' id='line_current_location" + prodln + "'  value='' title='' >"+
      "<input type='hidden' name='line_current_location_desc[" + prodln + "]' id='line_current_location_desc" + prodln + "'  value='' title='' >"+
      "<input type='hidden' name='line_current_using_person[" + prodln + "]' id='line_current_using_person" + prodln + "'  value='' title='' >"+
      "<input type='hidden' name='line_current_using_person_id[" + prodln + "]' id='line_current_using_person_id" + prodln + "'  value='' title='' >"+
      "<input type='hidden' name='line_current_using_person_desc[" + prodln + "]' id='line_current_using_person_desc" + prodln + "'  value='' title='' >"+
      "<input type='hidden' name='line_current_asset_status[" + prodln + "]' id='line_current_asset_status" + prodln + "'  value='' title=''>"+
      "<input type='hidden' name='line_current_owning_person_id[" + prodln + "]' id='line_current_owning_person_id" + prodln + "'  value='' title='' >"+
      "<input type='hidden' name='line_current_owning_person[" + prodln + "]' id='line_current_owning_person" + prodln + "'  value='' title='' >"+
      "<input type='hidden' name='line_current_owning_person_desc[" + prodln + "]' id='line_current_owning_person_desc" + prodln + "'  value='' title='' >"+
      "<input type='hidden' name='line_description[" + prodln + "]' id='line_description" + prodln + "'  value='' title='' >"+
      "</div></td>";

  addToValidate('EditView', 'line_asset'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE'));
  addToValidate('EditView', 'line_name'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_NAME'));
  addToValidate('EditView', 'line_target_organization'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_TARGET_RESPONSIBLE_CENTER'));
  addToValidate('EditView', 'line_target_location'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_TARGET_LOCATION'));
 //renderTransLine(prodln);

  prodln++;

  return prodln - 1;
}

function generateLineDesc(ln){
	//用于生成说明文字
  //例如XXX字段由XX变更为XXX
	var LineDesc="";
  LineDesc += LineDescElement("line_","target_asset_status","current_asset_status","LBL_ASSET_STATUS",ln,"target_asset_status","current_asset_status");
  LineDesc += LineDescElement("line_","target_parent_asset_id","current_parent_asset_id","LBL_PARENT_ASSET",ln,"target_parent_asset","current_parent_asset");
	LineDesc += LineDescElement("line_","target_owning_org_id","current_owning_org_id","LBL_OWING_ORG",ln,"target_owning_org","current_owning_org");
  LineDesc += LineDescElement("line_","target_using_org_id","current_using_org_id","LBL_USING_ORG",ln,"target_using_org","current_using_org");
  LineDesc += LineDescElement("line_","target_owning_person_id","current_owning_person_id","LBL_OWNING_PERSON",ln,"target_owning_person","current_owning_person");
  LineDesc += LineDescElement("line_","target_using_person_id","current_using_person_id","LBL_USING_PERSON",ln,"target_using_person","current_using_person");
  LineDesc += LineDescElement("line_","target_location_id","current_location_id","LBL_LOCATION",ln,"target_location","current_location");
  LineDesc += LineDescElement("line_","target_location_desc","current_location_desc","LBL_LOCATION_DESC",ln,"target_location_desc","current_location_desc");

	$("#line_description"+ln).val(LineDesc);
};

function LineDescElement(prefix_name,target_obj_name, current_obj_name, obj_label, ln, target_objval_name, current_objval_name) {
  var result="";
  //对字段进行比较，以生成字段变更对应的文字描述。
  if (typeof $("#"+prefix_name+current_obj_name+ln).val()=="undefined") {
    $("#"+prefix_name+current_obj_name+ln).val("");
  }
  if (typeof $("#"+prefix_name+target_obj_name+ln).val()=="undefined") {
    $("#"+prefix_name+target_obj_name+ln).val("");
  }

  if($("#"+prefix_name+current_obj_name+ln).val()!=$("#"+prefix_name+target_obj_name+ln).val()) {
    result  = SUGAR.language.get('HAT_Assets', obj_label);
    result += SUGAR.language.get('HAT_Asset_Trans', 'LBL_CHANGE_FROM');//" is changed from "

    if ($("#"+prefix_name+current_obj_name+ln).val()=="") {
      result += SUGAR.language.get('HAT_Asset_Trans', 'LBL_CHANGE_NULL');
    } else {
      result += $("#"+prefix_name+current_objval_name+ln).val();
    }
    result += SUGAR.language.get('HAT_Asset_Trans', 'LBL_CHANGE_FROM_TO');//" to "

    if ($("#"+prefix_name+target_obj_name+ln).val()=="") {
      result += "<strong>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_CHANGE_NULL')+"</strong>. ";
    }else {
      result += "<strong>"+$("#"+prefix_name+target_objval_name+ln).val()+"</strong>. ";
    }
  }
  return result;
}

function renderTransLine(ln) { //将编辑器中的内容显示于正常行中
  generateLineDesc(ln);//去生成Description
  resetEditorFields(ln);//初始化编辑状态下的一些字段
  $("#displayed_line_asset"+ln).html($("#line_asset"+ln).val());
  $("#displayed_line_name"+ln).html($("#line_name"+ln).val());
  $("#displayed_line_description"+ln).html($("#line_description"+ln).val());

}

function resetEditorFields(ln) {
  //生成编辑行中的字段样式，如锁定一些字段，以及加颜色的字段
  //以下处理当前资产的状态字段
	if($("#change_target_status").val()==1) { //如果头EventType需要变更
	$("#line_target_asset_status"+ln).val($("#target_asset_status").val());//从头上复制当前的资产状态
	} else {
	$("#line_target_asset_status"+ln).val($("#line_current_asset_status"+ln).val());//目标状态=当前资产状态（保持不变）,以Value保存
	}
	var target_status_value = $("#line_target_asset_status"+ln).val();
	var target_status_text = hat_asset_status_list.filter(function(obj) {
	                            return obj.name === target_status_value;
	                          })[0].value;
	$("#line_target_asset_status_displayed"+ln).html("<span class='color_tag color_asset_status_"+target_status_value+"'>"+target_status_text+"</span>");


 //以下处理EventType中定义的当前事件的业务规则
   if ($("#change_parent").val()=="LOCKED") {
		$("span.ig_parent_asset").hide()
   }else{
	   	$("span.ig_parent_asset").show()
   };

   if ($("#change_location").val()=="LOCKED") {
		$("span.ig_location").hide()
   }else{
   		$("span.ig_location").show()
   };

   if ($("#change_owning_org").val()=="LOCKED") {
		$("span.ig_owning_org").hide()
   }else{
		$("span.ig_owning_org").show()
   };

   if ($("#change_using_org").val()=="LOCKED") {
		$("span.ig_using_org").hide()
   }else{
   		$("span.ig_using_org").show()
   };

   if ($("#change_owning_person").val()=="LOCKED") {
		$("span.ig_using_person_list").hide();
		$("span.ig_using_person_desc").hide();
   }else{
   		  //在头的Views中会加载Framework中的属性。决定资产的使用人及负责人字段是值列表还是文字
		if (typeof using_person_field_rule== "undefined" || using_person_field_rule=="TEXT") { //判断使用人字段是列表还是文本框
			$("span.ig_using_person_list").hide();
			$("span.ig_using_person_desc").show();
		} else {
			$("span.ig_using_person_list").show();
			$("span.ig_using_person_desc").hide();
		}
   };


   if ($("#change_using_person").val()=="LOCKED") {
		$("span.ig_owning_person_list").hide();
		$("span.ig_owning_person_desc").hide();
   }else{
   		  //在头的Views中会加载Framework中的属性。决定资产的使用人及负责人字段是值列表还是文字
   		if (typeof owning_person_field_rule== "undefined" || owning_person_field_rule=="TEXT") {//判断负责人字段是列表还是文本框
			$("span.ig_owning_person_list").hide();
			$("span.ig_owning_person_desc").show();
		} else {
			$("span.ig_owning_person_list").show();
			$("span.ig_owning_person_desc").hide();
		}
   };

}

function resetAsset(ln){ //在用户重新选择资产之后，会连带的更新资产相关的字段信息。

  if ($("#line_asset"+ln).val()=== '') { //如果资产字段为空，则将所有关联的字段全部清空
    $("#line_asset_id"+ln).val("");
    $("#line_current_owning_org"+ln).val("");
    $("#line_current_using_org"+ln).val("");
    $("#line_current_owning_org_id"+ln).val("");
    $("#line_current_using_org_id"+ln).val("");
    $("#line_current_owning_person"+ln).val("");
    $("#line_current_using_person"+ln).val("");
    $("#line_current_owning_person_id"+ln).val("");
    $("#line_current_using_person_id"+ln).val("");
    $("#line_current_owning_person_desc"+ln).val("");
    $("#line_current_using_person_desc"+ln).val("");
    $("#line_current_location"+ln).val("");
    $("#line_current_location_desc"+ln).val("");
    $("#line_current_asset_status"+ln).val("");
    $("#line_current_parent_asset"+ln).val("");
    $("#line_current_parent_asset_id"+ln).val("");
  }
    $("#line_target_owning_org"+ln).val($("#line_current_owning_org"+ln).val());
    $("#line_target_using_org"+ln).val($("#line_current_using_org"+ln).val());
    $("#line_target_owning_org_id"+ln).val($("#line_current_owning_org_id"+ln).val());
    $("#line_target_using_org_id"+ln).val($("#line_current_using_org_id"+ln).val());
    $("#line_target_owning_person"+ln).val($("#line_current_owning_person"+ln).val());
    $("#line_target_using_person"+ln).val($("#line_current_using_person"+ln).val());
    $("#line_target_owning_person_id"+ln).val($("#line_current_owning_person_id"+ln).val());
    $("#line_target_using_person_id"+ln).val($("#line_current_using_person_id"+ln).val());
    $("#line_target_owning_person_desc"+ln).val($("#line_current_owning_person_desc"+ln).val());
    $("#line_target_using_person_desc"+ln).val($("#line_current_using_person_desc"+ln).val());
    $("#line_target_location"+ln).val($("#line_current_location"+ln).val());
    $("#line_target_location_id"+ln).val($("#line_current_location_id"+ln).val());
    $("#line_target_location_desc"+ln).val($("#line_current_location_desc"+ln).val());
    $("#line_target_asset_status"+ln).val($("#line_current_asset_status"+ln).val());
    $("#line_target_parent_asset"+ln).val($("#line_current_parent_asset"+ln).val());
    $("#line_target_parent_asset_id"+ln).val($("#line_current_parent_asset_id"+ln).val());

  resetEditorFields(ln);
/*
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
  }*/
}


function insertTransLineFootor(tableid) {
    if($("#asset_trans_status").val()=="DRAFT") {
      tablefooter = document.createElement("tfoot");
      document.getElementById(tableid).appendChild(tablefooter);

      var footer_row=tablefooter.insertRow(-1);
      var footer_cell = footer_row.insertCell(0);

      footer_cell.scope="row";
      footer_cell.colSpan="5";
      footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HAT_Asset_Trans', 'LBL_BTN_ADD_TRANS_LINE')+"' />";
      }
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
  $("#asset_trans_editor"+ln).show();

}

function LineEditorClose(ln) {//关闭行编辑器（显示为正常行）
  if (check_form('EditView')) {
    $("#asset_trans_editor"+ln).hide();
    $("#asset_trans_line1_displayed"+ln).show();
    renderTransLine(ln);
    resetLineNum();
  }
}

function resetLineNum() {//数行号
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
