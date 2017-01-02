if(typeof(YAHOO.SUGAR) == 'undefined') {
  $.getScript("include/javascript/sugarwidgets/SugarYUIWidgets.js");
}

var prodln = 0;

if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function openAssetPopup(ln){//本文件为行上选择资产的按钮
  //var eventOptions = jQuery.parseJSON($("#eventOptions").val());
  //alert("asset_popup");
  lineno=ln;
  console.log("EVENTOPTION="+$("#eventOptions").val());
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
      "rack_desc":"line_target_rack_position_desc"+ln,
      "rack":"line_target_rack_position_data"+ln,
      "cost_center_id":"line_current_cost_center_id"+ln,
      "cost_center":"line_current_cost_center"+ln,
      "attribute10":"line_current_asset_attribute10"+ln,
      "attribute11":"line_current_asset_attribute11"+ln,
      "attribute12":"line_current_asset_attribute12"+ln,
      "enable_partial_allocation":"line_enable_partial_allocation"+ln,
    }
  };

  var global_eventOptions = jQuery.parseJSON($("#eventOptions").val());	


  var popupFilter = '&current_mode='+global_eventOptions.asset_scope.toLowerCase()
  +'&defualt_list='+global_eventOptions.default_asset_list.toLowerCase()
  +'&wo_id='+source_wo_id
  +'&haa_frameworks_id_advanced='+$("#haa_frameworks_id").val()
  +'&site_id='+$("#ham_maint_sites_id").val()
  ;


  if ($("#target_using_org_id").val()!="") {
    popupFilter +="&target_using_org="+$("#target_using_org").val()
    +"&target_using_org_id="+$("#target_using_org_id").val();
  }

  console.log(popupFilter);
  open_popup('HAT_Assets', 1200, 850, popupFilter, true, true, popupRequestData);

}

function setAssetReturn(popupReplyData){
  //popupReplyData中lineno会做为行号一并返回
  set_return(popupReplyData);
  resetAsset(lineno);
  //console.log("line_target_rack_position_desc0="+$("#line_target_rack_position_desc0").val())
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
  var popupFilter = '&current_mode=asset&framework_advanced='+$("#haa_framework").val();
  open_popup('HAT_Assets', 1200, 850, popupFilter, true, true, popupRequestData);
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
  var popupFilter = '&frame_c_advanced='+$("#haa_framework").val()+"&asset_using_org=Y";
  open_popup('Accounts', 1000, 850,popupFilter, true, true, popupRequestData);
}

function openCostCenterPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_target_cost_center" + ln,
      "id" : "line_target_cost_center_id" + ln,
    },
  };
  var popupFilter = '&frame_c_advanced='+$("#haa_framework").val()+'&code_type_advanced=asset_main_cost_center';
//http://localhost/handALM/index.php?module=HAA_Codes&action=Popup&mode=single&create=true&field_to_name[]=name
  open_popup('HAA_Codes', 1000, 850,popupFilter, true, true, popupRequestData);
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
  var popupFilter = '&frame_c_advanced='+$("#haa_framework").val()+"&asset_using_org=Y";
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
     // "location_title" : "line_target_location_desc" + ln,
      "id" : "line_target_location_id" + ln
    }
  };
  open_popup('HAT_Asset_Locations', 1000, 850, '', true, true, popupRequestData);
}


function openRackPopup(ln){

  if ($("#line_asset_id"+ln).val()=="") {
    alert("No Asset")
    return;
  }

  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_target_rack_position_desc" + ln,
      "rackvalue" : "line_target_rack_position_data" + ln,
      "rackid" : "line_target_parent_asset_id" + ln,
      "rackname" : "line_target_parent_asset" + ln,
    }
  };
  var popupFilter = '&current_mode=rackposition&defualt_list=rack'
  +'&asset_id='+$("#line_asset_id"+ln).val()
  +'&wo_id='+source_wo_id
  +'&framework_advanced='+$("#haa_framework").val()
  +'&defualt_list=rack';
  open_popup('HAT_Assets', 1200, 850, popupFilter, true, true, popupRequestData);
}

function addNewAssetLine(){
	var popupRequestData = {
   "call_back_function" : "setAddNewLineBtnReturn",
   "form_name" : "EditView",
   "field_to_name_array" : {
   }};


   var eventOptions = $("#eventOptions").val()!=""?jQuery.parseJSON($("#eventOptions").val()):"";
  //console.log(eventOptions);
  var popupFilter = '&current_mode='+eventOptions.asset_scope.toLowerCase()
                +'&defualt_list='+eventOptions.default_asset_list.toLowerCase()
                +'&wo_id='+source_wo_id
                +'&haa_frameworks_id_advanced='+$("#haa_frameworks_id").val()
                +'&site_id='+$("#ham_maint_sites_id").val();

  if ($("#target_using_org_id").val()!="") {
    popupFilter +="&target_using_org="+$("#target_using_org").val()
    +"&target_using_org_id="+$("#target_using_org_id").val();
  }

//20161130 toney.wu relpace popup list with tree selection.
/* if (eventOptions!="") {
    if (eventOptions.default_asset_list=="USING_ORG") {
      popupFilter += '&using_org_id_advanced='+ $("#target_using_org_id").val();
    } else if  (eventOptions.default_asset_list=="WO_ASSET_TRANS") {
      popupFilter += '&asset_wo_id='+ $("#source_wo_id").val();
    } else if  (eventOptions.default_asset_list=="WO_IP_TRANS") {
      popupFilter += '&ip_wo_id='+ $("#source_wo_id").val();
    }

    if (eventOptions.asset_scope=="RACK") {
      popupFilter += '&enable_it_rack_advanced=1';
    } else if (eventOptions.asset_scope=="IT") {
      popupFilter += '&enable_it_ports=1';
    }
*/



    open_popup('HAT_Assets', 1200, 850,popupFilter, true, true, popupRequestData, "MultiSelect", true);
}


function setAddNewLineBtnReturn(popupReplyData) { //批量添加资产的POPUP返回处理
	set_return(popupReplyData);
	var idJson = popupReplyData.selection_list;
    $.ajax({
      url:'index.php?to_pdf=true&module=HAT_Asset_Trans&action=LoadSelectedAssets',
      data:{idArray:idJson},
      type:"POST",
      success: function (msg) {

        linesReturned=$.parseJSON(msg);
        $(linesReturned.lines).each(function(){
          insertLineData($(this)[0],'EditView');
          //console.log($(this));
        });

        resetAsset((prodln-1));
      },
      error: function () { //失败
        alert('Error loading document');
      }
    });
	// 设置行号
	resetLineNum();
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
  var ln = 0;
  //if(asset_trans_line.id != '0' && asset_trans_line.id !== ''){
    ln = insertTransLineElements("lineItems", current_view);
	console.log(asset_trans_line);
    for(var propertyName in asset_trans_line) {
      //这里直接遍历所有的属性（因此需要建立与Bean属性同名的各个字段）
      //console.log(propertyName+"="+asset_trans_line[propertyName]);
      //console.log("#line_"+propertyName.concat(String(ln)) +"=="+ asset_trans_line[propertyName] );
      if ($("#line_"+propertyName.concat(String(ln))).is(':checkbox')) {
        if (asset_trans_line[propertyName]==true) {
          console.log(propertyName+"="+asset_trans_line[propertyName]);
          document.getElementById("line_"+propertyName.concat(String(ln))).checked = true;
          document.getElementById("line_"+propertyName.concat(String(ln))).value = 1;
        }
      } else if(propertyName=="target_rack_position_data" && asset_trans_line[propertyName]!=null){
        //有个特殊字段需要处理
         $("#line_"+propertyName.concat(String(ln))).val(asset_trans_line[propertyName].replace(/&quot;/g, '"'));
      } else {
        //如果当前字段不是checkbox，就以val的形式赋值
        $("#line_"+propertyName.concat(String(ln))).val(asset_trans_line[propertyName]);
      }
    }

    renderTransLine(ln);
	//$("#line_target_cost_center"+ln).val(asset_trans_line.target_cost_center);
	//$("#line_target_cost_center_id"+ln).val(asset_trans_line.target_cost_center_id);
	//console.log(asset_trans_line.target_cost_center);
  //}
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

  if(current_view == "EditView" && $("#asset_trans_status").val()=="DRAFT") {
    z1.innerHTML+="<input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'>";
  }


  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'asset_trans_editor' + prodln;
  x.style = "display:none";

  x.innerHTML  = "<td colSpan='9'><div class='lineEditor'>"+
  "<span class='input_group'>"+
  "<label id='line_asset" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_HAT_ASSETS_HAT_ASSET_TRANS_FROM_HAT_ASSETS_TITLE')+"<span class='required'>*</span></label>"+
  "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_asset[" + prodln + "]' id='line_asset" + prodln + "' value='' title='' onblur='resetAsset("+prodln+")'>"+
  "<input type='hidden' name='line_asset_id[" + prodln + "]' id='line_asset_id" + prodln + "' value=''>"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openAssetPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label id='line_name" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_NAME')+" <span class='required'>*</span></label>"+
  "<input style='width:225px;'  autocomplete='off' type='text' name='line_name[" + prodln + "]' id='line_name" + prodln + "' maxlength='50' value='' title=''>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label id='line_target_asset_status" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_ASSET_STATUS')+"</label>"+
  "<input style='width:78px;' type='hidden' readonly='readonly' name='line_target_asset_status[" + prodln + "]' id='line_target_asset_status" + prodln + "'  value='' title=''>"+
  "<span id='line_target_asset_status_displayed" + prodln + "' ></span>"+
  "</span>"+
  "<span class='input_group ig_parent_asset'>"+
  "<label id='line_target_parent_asset" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_PARENT_ASSET')+"</label>"+
  "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='line_target_parent_asset[" + prodln + "]' id='line_target_parent_asset" + prodln + "' value='' title='' onblur='resetAsset("+prodln+")'>"+
  "<input type='hidden' name='line_target_parent_asset_id[" + prodln + "]' id='line_target_parent_asset_id" + prodln + "' value=''>"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openParentAssetPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+
  "<span class='input_group ig_owning_org'>"+
  "<label id='line_target_owning_org" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_RESPONSIBLE_CENTER')+" <span class='required'>*</span></label>"+
  "<input class='sqsEnabled' style='width:153px;' autocomplete='off' type='text' name='line_target_owning_org[" + prodln + "]' id='line_target_owning_org" + prodln + "' value='' title='' >"+
  "<input type='hidden' name='line_target_owning_org_id[" + prodln + "]' id='line_target_owning_org_id" + prodln + "' value='' />"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openOwningOrgPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+
  "<span class='input_group ig_owning_person_list ig_owning_person'>"+
  "<label id='line_target_owning_person" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_OWNING_PERSON')+"</label>"+
  "<input class='sqsEnabled' style='width:103px;' type='text' name='line_target_owning_person[" + prodln + "]' id='line_target_owning_person" + prodln + "' maxlength='50' value='' title=''>"+
  "<input type='hidden' name='line_target_owning_person_id[" + prodln + "]' id='line_target_owning_person_id" + prodln + "' value='' />"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openOwningPersonPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+
  "<span class='input_group ig_owning_person_desc ig_owning_person'>"+
  "<label id='line_target_owning_person_desc" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_OWNING_PERSON')+"</label>"+
  "<input style='width:103px;' name='line_target_owning_person_desc[" + prodln + "]' id='line_target_owning_person_desc" + prodln + "' value='' />"+
  "</span>"+

  "<span class='input_group ig_cost_center'>"+
  "<label id='line_cost_center" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_COST_CENTER')+" <span class='required'>*</span></label>"+
  "<input class='sqsEnabled' style='width:153px;' autocomplete='off' type='text' name='line_target_cost_center[" + prodln + "]' id='line_target_cost_center" + prodln + "' value='' title='' >"+
  "<input type='hidden' name='line_target_cost_center_id[" + prodln + "]' id='line_target_cost_center_id" + prodln + "' value='' />"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openCostCenterPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+

  "<span class='input_group ig_using_org'>"+
  "<label id='line_target_using_org" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_USING_ORG')+" <span class='required'>*</span></label>"+
  "<input class='sqsEnabled' style='width:153px;' autocomplete='off' type='text' name='line_target_using_org[" + prodln + "]' id='line_target_using_org" + prodln + "' value='' title='' >"+
  "<input type='hidden' name='line_target_using_org_id[" + prodln + "]' id='line_target_using_org_id" + prodln + "' value='' />"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openUsingOrgPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+
  "<span class='input_group ig_using_person_list ig_using_person'>"+
  "<label id='line_target_using_person" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_USING_PERSON')+"</label>"+
  "<input class='sqsEnabled' style='width:103px;' type='text' name='line_target_using_person[" + prodln + "]' id='line_target_using_person" + prodln + "' maxlength='50' value='' title=''>"+
  "<input type='hidden' name='line_target_using_person_id[" + prodln + "]' id='line_target_using_person_id" + prodln + "' value='' />"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openUsingPersonPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+
  "<span class='input_group ig_using_person_desc ig_using_person'>"+
  "<label id='line_target_using_person_desc" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_USING_PERSON')+"</label>"+
  "<input style='width:103px;' type='text' name='line_target_using_person_desc[" + prodln + "]' id='line_target_using_person_desc" + prodln + "' maxlength='50' value='' title=''>"+
  "</span>"+



      //失效时间
      "<span class='input_group'>"+
      "<label>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_INACTIVE_USING')+" </label>"+
      "<input name='line_inactive_using[" + prodln + "]'  type='checkbox' id='line_inactive_using" + prodln + "'  value='' title='"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_INACTIVE_USING')+"' onclick=inactiveUsingLine("+prodln+")></input>"+
      "</span>"+
      "<span class='input_group ig_location'>"+
      "<label id='line_date_start" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_DATE_START')+"</label>"+
      "<input style='width:153px;' type='text' name='line_date_start[" + prodln + "]' id='line_date_start" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      "<span class='input_group ig_location'>"+
      "<label id='line_date_end" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_DATE_END')+"</label>"+
      "<input style='width:153px;' type='text' name='line_date_end[" + prodln + "]' id='line_date_end" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+

      "<span class='input_group'>"+
      "<label id='line_target_location" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_LOCATION')+" <span class='required'>*</span></label>"+
      "<input class='sqsEnabled' style='width:153px;' type='text' name='line_target_location[" + prodln + "]' id='line_target_location" + prodln + "' maxlength='50' value='' title=''>"+
      "<input type='hidden' name='line_target_location_id[" + prodln + "]' id='line_target_location_id" + prodln + "' value='' />"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openLocationPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+
      "<span class='input_group'>"+
      "<label id='line_target_location_desc" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_LOCATION_DESC')+"</label>"+
      "<input style='width:153px;' type='text' name='line_target_location_desc[" + prodln + "]' id='line_target_location_desc" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+
      "<span class='input_group'>"+
      "<label id='line_target_rack_position_desc" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_RACK')+" <span class='required'>*</span></label>"+
      "<input style='width:153px;' type='text' name='line_target_rack_position_desc[" + prodln + "]' id='line_target_rack_position_desc" + prodln + "' maxlength='50' value='' title=''>"+
      "<input type='hidden' name='line_target_rack_position_data[" + prodln + "]' id='line_target_rack_position_data" + prodln + "' value='' />"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openRackPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>"+

      "<span class='input_group'>"+
      "<label id='line_target_asset_attribute10" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_ASSET_ATTRIBUTE10')+"</label>"+
      "<input style='width:153px;' type='text' name='line_target_asset_attribute10[" + prodln + "]' id='line_target_asset_attribute10" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+

      "<span class='input_group'>"+
      "<label id='line_target_asset_attribute11" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_ASSET_ATTRIBUTE11')+"</label>"+
      "<input style='width:153px;' type='text' name='line_target_asset_attribute11[" + prodln + "]' id='line_target_asset_attribute11" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+

      "<span class='input_group'>"+
      "<label id='line_target_asset_attribute12" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_TARGET_ASSET_ATTRIBUTE12')+"</label>"+
      "<input style='width:153px;' type='text' name='line_target_asset_attribute12[" + prodln + "]' id='line_target_asset_attribute12" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+


/*      "<span class='input_group ig_location'>"+
      "<label id='line_status" + prodln + "_label'>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_STATUS')+"</label>"+
      "<input style='width:153px;' type='text' name='line_status[" + prodln + "]' id='line_status" + prodln + "' maxlength='50' value='' title=''>"+
      "</span>"+*/
      //end 
      "<input type='hidden' name='line_deleted[" + prodln + "]' id='line_deleted" + prodln + "' value='0'>"+
      "<input type='hidden' name='line_id[" + prodln + "]' id='line_id" + prodln + "' value=''>"+

        //"<button type='button' id='line_delete_line" + prodln + "' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='markLineDeleted(" + prodln + ",\"line_\")'><img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>"+

        "<input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
        // "<input style='float:right;' type='button' id='btn_LineEditorClose" + prodln + "' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "'onclick='LineEditorClose(" + prodln + ")>"+
        "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>"+


        "<input type='hidden' name='line_current_cost_center[" + prodln + "]' id='line_current_cost_center" + prodln + "'  value='' title='' >"+
        "<input type='hidden' name='line_current_cost_center_id[" + prodln + "]' id='line_current_cost_center_id" + prodln + "'  value='' title='' >"+
        "<input type='hidden' name='line_current_asset_attribute10[" + prodln + "]' id='line_current_asset_attribute10" + prodln + "'  value='' title='' >"+
        "<input type='hidden' name='line_current_asset_attribute11[" + prodln + "]' id='line_current_asset_attribute11" + prodln + "'  value='' title='' >"+
        "<input type='hidden' name='line_current_asset_attribute12[" + prodln + "]' id='line_current_asset_attribute12" + prodln + "'  value='' title='' >"+
        "<input type='hidden' name='line_enable_partial_allocation[" + prodln + "]' id='line_enable_partial_allocation" + prodln + "'  value='' title='' >"+

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
//Add By LQ 
//20161117 添加默认头的目标所属组织和使用组织为行的目标所属组织和目标使用组织
$("#line_target_owning_org"+prodln).val($("#target_owning_org").val());
$("#line_target_owning_org_id"+prodln).val($("#target_owning_org_id").val());
$("#line_target_using_org"+prodln).val($("#target_using_org").val());
$("#line_target_using_org_id"+prodln).val($("#target_using_org_id").val());
//End
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
  LineDesc += LineDescElement("line_","target_owning_person_id","current_owning_person_id","LBL_OWNING_PERSON",ln,"target_owning_person","current_owning_person");

  if($("#line_inactive_using"+ln).is(':checked')){ //如果失效的Checkbox=Y，则显示已经清空组织
    console.log('inactive checked');
    LineDesc += SUGAR.language.get('HAT_Asset_Trans', 'LBL_INACTIVE_USING')+" ";
    LineDesc += LineDescElement("line_","","current_using_org_id","LBL_USING_ORG",ln,"","current_using_org");
    LineDesc += LineDescElement("line_","","current_using_person_id","LBL_USING_PERSON",ln,"","current_using_person");
  }else{
    //否则的话，继续对组织数据进行对比
    LineDesc += LineDescElement("line_","target_using_org_id","current_using_org_id","LBL_USING_ORG",ln,"target_using_org","current_using_org");
    LineDesc += LineDescElement("line_","target_using_person_id","current_using_person_id","LBL_USING_PERSON",ln,"target_using_person","current_using_person");
  }

  LineDesc += LineDescElement("line_","target_location_id","current_location_id","LBL_LOCATION",ln,"target_location","current_location");
  LineDesc += LineDescElement("line_","target_location_desc","current_location_desc","LBL_LOCATION_DESC",ln,"target_location_desc","current_location_desc");
  LineDesc += LineDescElement("line_","target_rack_position_desc","","LBL_RACK",ln,"target_rack_position_desc","");

  LineDesc += LineDescElement("line_","target_cost_center_id","current_cost_center_id","LBL_COST_CENTER",ln,"target_cost_center","current_cost_center");
  LineDesc += LineDescElement("line_","target_asset_attribute10","current_asset_attribute10","LBL_ATTRIBUTE10",ln,"target_asset_attribute10","current_asset_attribute10");
  LineDesc += LineDescElement("line_","target_asset_attribute11","current_asset_attribute11","LBL_ATTRIBUTE11",ln,"target_asset_attribute11","current_asset_attribute11");
  LineDesc += LineDescElement("line_","target_asset_attribute12","current_asset_attribute12","LBL_ATTRIBUTE12",ln,"target_asset_attribute12","current_asset_attribute12");

  $("#line_description"+ln).val(LineDesc);
};

function LineDescElement(prefix_name,target_obj_name, current_obj_name, obj_label, ln, target_objval_name, current_objval_name) {
  var result="";
  //对字段进行比较，以生成字段变更对应的文字描述。
  var current_obj_val, target_obj_val, current_objval_val, target_objval_val
  if (typeof $("#"+prefix_name+current_obj_name+ln).val()=="undefined") {
    current_obj_val = "";
  } else {
    current_obj_val = $("#"+prefix_name+current_obj_name+ln).val();
  }

  if (typeof $("#"+prefix_name+target_obj_name+ln).val()=="undefined") {
    target_obj_val="";
  }else{
    target_obj_val = $("#"+prefix_name+target_obj_name+ln).val();
  }

  current_objval_val = $("#"+prefix_name+current_objval_name+ln).val()
  target_objval_val = $("#"+prefix_name+target_objval_name+ln).val();

//console.log( current_obj_val+", "+target_obj_val+", "+target_objval_name+", "+current_objval_name);
if(current_objval_name=="current_asset_status"){
//  current_objval_val="";
 current_objval_val = hat_asset_status_list.filter(function(obj) {
  return obj.name === current_objval_val;
})[0].value;

}

if(target_objval_name=="target_asset_status"){
  //current_objval_val="";
 target_objval_val = hat_asset_status_list.filter(function(obj) {
  return obj.name === target_objval_val;
})[0].value;

}

  //console.log( current_obj_val+", "+target_obj_val+", "+target_objval_name+", "+current_objval_name);
  if (typeof current_obj_name != 'undefined' && current_obj_name!="") {
    //如果当前值不为空
    //将显示为XXX字段由XXX变更为XXX
    if(current_obj_val!=target_obj_val) {
      result  = SUGAR.language.get('HAT_Assets', obj_label);
      result += SUGAR.language.get('HAT_Asset_Trans', 'LBL_CHANGE_FROM');//" is changed from "

      if (current_obj_val=="") {
        result += SUGAR.language.get('HAT_Asset_Trans', 'LBL_CHANGE_NULL');//如果当前对比值为空，则显示FROM NULL
      } else {
        result += current_objval_val;//如果当前对比值不为空，则显示FROM XXX值名称
      }
      result += SUGAR.language.get('HAT_Asset_Trans', 'LBL_CHANGE_FROM_TO');//" to "

      if (target_obj_val=="") {
        result += "<strong>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_CHANGE_NULL')+"</strong>. ";
      }else {
        result += "<strong>"+target_objval_val+"</strong>. ";
      }
    }
  } else if ( $("#"+prefix_name+target_objval_name+ln).val()!="") {
  	//如果当前对象为空，并且目标不为空
  	//将显示为XXX字段变更为XXX
    result  = SUGAR.language.get('HAT_Assets', obj_label);
      result += SUGAR.language.get('HAT_Asset_Trans', 'LBL_CHANGE_TO');//" is changed to "
      if (target_obj_val=="") {
        result += "<strong>"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_CHANGE_NULL')+"</strong>. ";
      }else {
        result += "<strong>"+target_objval_val+"</strong>. ";
      }
    }
//console.log("#"+prefix_name+target_objval_name+ln+"="+$("#"+prefix_name+target_objval_name+ln).val());
return result;
}

function renderTransLine(ln) { //将编辑器中的内容显示于正常行中
  generateLineDesc(ln);//去生成Description
  resetEditorFields(ln);//初始化编辑状态下的一些字段
  $("#displayed_line_asset"+ln).html("<a href='index.php?module=HAT_Assets&action=DetailView&record="+$("#line_asset_id"+ln).val()+"'>"+$("#line_asset"+ln).val()+"</a>");
  $("#displayed_line_name"+ln).html($("#line_name"+ln).val());
  $("#displayed_line_description"+ln).html($("#line_description"+ln).val());

}


function resetEditorFields(ln) {
  //生成编辑行中的字段样式，如锁定一些字段，以及加颜色的字段
  //以下处理当前资产的状态字段
  var eventOptions = $("#eventOptions").val()!=""?jQuery.parseJSON($("#eventOptions").val()):"";
  if (eventOptions!="") {

    if ($("#target_owning_org_id").val()!="" && (eventOptions.change_owning_org == "REQUIRED" ||eventOptions.change_owning_org == "OPTIONAL")){
      //如果需要变更或必须变更所属组织，并且头上有值，则将头上的所属组织复制到行上
      $("#line_target_owning_org"+ln).val($("#target_owning_org").val());
      $("#line_target_owning_org_id"+ln).val($("#target_owning_org_id").val());
    } else {
      //如果不需要变化使用组织，或是头上没有值 ，则资产的所属组织不变，将当前的所属组织复制到目标上
      if ($("#line_target_owning_org_id"+ln).val()=="") {
        $("#line_target_owning_org"+ln).val($("#line_current_owning_org"+ln).val());
        $("#line_target_owning_org_id"+ln).val($("#line_current_owning_org_id"+ln).val());
      }
    }

    if ($("#target_using_org_id").val()!="" && (eventOptions.change_using_org == "REQUIRED" ||eventOptions.change_using_org == "OPTIONAL")) {
      //如果需要变更或必须变更使用组织，并且头上有值，则将头上的使用组织复制到行上
      $("#line_target_using_org"+ln).val($("#target_using_org").val());
      $("#line_target_using_org_id"+ln).val($("#target_using_org_id").val());
    } else {
      //如果不需要变化使用组织，或是头上没有值 ，则资产的使用组织不变，将当前的使用组织复制到目标上
      $("#line_target_using_org"+ln).val($("#line_current_using_org"+ln).val());
      $("#line_target_using_org_id"+ln).val($("#line_current_using_org_id"+ln).val());
    }
    if (eventOptions.keep_seperated_allc_rack_using_org=="1" && $("#line_enable_partial_allocation"+ln).val()=="1") {
    	//当前为散U机柜且EventType定义散U机柜不变使用组织
      $("#line_target_using_org"+ln).val($("#line_current_using_org"+ln).val());
      $("#line_target_using_org_id"+ln).val($("#line_current_using_org_id"+ln).val());
    }
    if (eventOptions.keep_preassigned_status_using_org=="1" && $("#line_current_asset_status"+ln).val()=="PreAssigned") {
      //当前状态为预分配的行使用组织不变
      $("#line_target_using_org"+ln).val($("#line_current_using_org"+ln).val());
      $("#line_target_using_org_id"+ln).val($("#line_current_using_org_id"+ln).val());
    }


    if ($("#line_target_cost_center_id"+ln).val()==""
      && (eventOptions.change_cost_center == "REQUIRED" ||eventOptions.change_cost_center == "OPTIONAL")) {
      //将当前的成本中心复制到目标上
      $("#line_target_cost_center"+ln).val($("#line_current_cost_center"+ln).val());
      $("#line_target_cost_center_id"+ln).val($("#line_current_cost_center_id"+ln).val());
    }

    if ($("#line_target_asset_attribute10"+ln).val()==""
      && (eventOptions.change_asset_attribute10 == "REQUIRED" ||eventOptions.change_asset_attribute10 == "OPTIONAL")) {
      $("#line_target_asset_attribute10"+ln).val($("#line_current_asset_attribute10"+ln).val());
    }
    if ($("#line_target_asset_attribute11"+ln).val()==""
      && (eventOptions.change_asset_attribute11 == "REQUIRED" ||eventOptions.change_asset_attribute11 == "OPTIONAL")) {
      $("#line_target_asset_attribute11"+ln).val($("#line_current_asset_attribute11"+ln).val());
    }
    if  ($("#line_target_asset_attribute12"+ln).val()==""
      && (eventOptions.change_asset_attribute12 == "REQUIRED" ||eventOptions.change_asset_attribute12 == "OPTIONAL")) {
      $("#line_target_asset_attribute12"+ln).val($("#line_current_asset_attribute12"+ln).val());

    }


    if (eventOptions.change_target_status=='1') { //如果头EventType需要变更
       $("#line_target_asset_status"+ln).val(eventOptions.target_asset_status);//从头上复制当前的资产状态
     } else {
       $("#line_target_asset_status"+ln).val($("#line_current_asset_status"+ln).val());//目标状态=当前资产状态（保持不变）,以Value保存
     }
    if (eventOptions.keep_seperated_allc_rack_using_org=="1" && $("#line_enable_partial_allocation"+ln).val()=="1") {
      //当前为散U机柜且EventType定义散U机柜不变Status
      $("#line_target_asset_status"+ln).val($("#line_current_asset_status"+ln).val());//目标状态=当前资产状态（保持不变）,以Value保存
    }

     var target_status_value = $("#line_target_asset_status"+ln).val();
     var target_status_text = hat_asset_status_list.filter(function(obj) {
      return obj.name === target_status_value;
    })[0].value;
     $("#line_target_asset_status_displayed"+ln).html("<span class='color_tag color_asset_status_"+target_status_value+"'>"+target_status_text+"</span>");


    //判断是否要清空资产的使用组织及机柜上的信息
    if(eventOptions.change_using_org == "EMPTY") {//判断是否需要清空使用组织
      $("#line_target_using_org"+ln).val("");
      $("#line_target_using_org_id"+ln).val("");
    }
    if(eventOptions.change_using_org == "EMPTY" || eventOptions.change_using_person=="EMPTY") {//判断是否需要清空使用人。另外组织为空人一定为空
      $("#line_target_using_person"+ln).val("");
      $("#line_target_using_person_id"+ln).val("");
      $("#line_target_using_person_desc"+ln).val("");
    }
    if(eventOptions.change_rack_position == "EMPTY" || $("#line_target_rack_position_desc"+ln).val()== "undefined") {//判断是否需要清空机枻
      $("#line_target_rack_position_desc"+ln).val("");
      $("#line_target_rack_position_data"+ln).val("");
    }
  }
}

function resetAsset(ln){ 
//在用户重新选择资产之后，会连带的更新资产相关的字段信息。

var eventOptions = $("#eventOptions").val()!=""?jQuery.parseJSON($("#eventOptions").val()):"";

  if ($("#line_asset_id"+ln).val()=== '') { //如果资产字段为空（删除了资产），则将所有关联的字段全部清空
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

  //其它所有字段都假设不变
  $("#line_target_owning_person"+ln).val($("#line_current_owning_person"+ln).val());
  $("#line_target_using_person"+ln).val($("#line_current_using_person"+ln).val());
  $("#line_target_owning_person_id"+ln).val($("#line_current_owning_person_id"+ln).val());
  $("#line_target_using_person_id"+ln).val($("#line_current_using_person_id"+ln).val());
  $("#line_target_owning_person_desc"+ln).val($("#line_current_owning_person_desc"+ln).val());
  $("#line_target_using_person_desc"+ln).val($("#line_current_using_person_desc"+ln).val());
  $("#line_target_location"+ln).val($("#line_current_location"+ln).val());
  $("#line_target_location_id"+ln).val($("#line_current_location_id"+ln).val());
  $("#line_target_location_desc"+ln).val($("#line_current_location_desc"+ln).val());
  $("#line_target_parent_asset"+ln).val($("#line_current_parent_asset"+ln).val());
  $("#line_target_parent_asset_id"+ln).val($("#line_current_parent_asset_id"+ln).val());
  $("#line_target_cost_center"+ln).val($("#line_current_cost_center"+ln).val());
  $("#line_target_cost_center_id"+ln).val($("#line_current_cost_center_id"+ln).val());
  $("#line_target_asset_attribute10"+ln).val($("#line_current_asset_attribute10"+ln).val());
  $("#line_target_asset_attribute11"+ln).val($("#line_current_asset_attribute11"+ln).val());
  $("#line_target_asset_attribute12"+ln).val($("#line_current_asset_attribute12"+ln).val());

  resetEditorFields(ln);//本章节完成资产选择后目标与当前字段的值判断，依据事件类型上的设置点不同，有些内容是将目标设定为当前值，有些是从头上进行复制。

}


function insertTransLineFootor(tableid) {
  if($("#asset_trans_status").val()=="DRAFT") {
    tablefooter = document.createElement("tfoot");
    document.getElementById(tableid).appendChild(tablefooter);

    var footer_row=tablefooter.insertRow(-1);
    var footer_cell = footer_row.insertCell(0);

    footer_cell.scope="row";
    footer_cell.colSpan="5";
    footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HAT_Asset_Trans', 'LBL_BTN_ADD_TRANS_LINE')+"' />"
    +"<input id='btnNewLine' type='button' class='button btn_del' onclick='addNewAssetLine()' value='+ "+SUGAR.language.get('HAT_Asset_Trans', 'LBL_BTN_ADD_NEW_LINE')+"' />";
  }
}

function getWOTargetDate(ln){
  $wo_id = $("#source_wo_id").val();
  console.log("wo_id="+$wo_id);
  console.log('index.php?to_pdf=true&module=HAT_Asset_Trans_Batch&action=getWOInfos&ham_wo_id='+$wo_id);
	$.ajax({
   url:'index.php?to_pdf=true&module=HAT_Asset_Trans_Batch&action=getWOInfos&ham_wo_id='+$wo_id,
   success: function (data) {
    console.log(data);
    var obj = $.parseJSON(data);
				//console.log("which Line number = "+ln);
				//console.log(obj);
				//console.log(obj.date_target_finish);
				$("#line_date_start"+ln).val(obj.date_target_start);
				$("#line_date_end"+ln).val(obj.date_target_finish);
			},
			error: function () { //失败
				alert('Error loading document');
			}
		});
}

function addNewLine(tableid) {
  //alert("clicked")
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增
    insertTransLineElements(tableid,'EditView');//加入新行
    LineEditorShow(prodln - 1);       //打开行编辑器
    getWOTargetDate(prodln - 1);
    //获取工单上面的2个日期
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


  $("#line_*"+ ln).children().remove(".required");

  if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
    removeFromValidate('EditView','line_asset'+ ln);
    removeFromValidate('EditView','line_name'+ ln);
    removeFromValidate('EditView','line_target_organization'+ ln);
    removeFromValidate('EditView','line_target_location'+ ln);
    removeFromValidate('EditView','line_target_location_desc'+ ln);
  }
  resetLineNum();

}

function LineEditorShow(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
  resetEventType();
  
  if (prodln>1) {
    for (var i=0;i<prodln;i++) {
      LineEditorClose(i);
    }
  }
  $("#asset_trans_line1_displayed"+ln).hide();
  $("#asset_trans_editor"+ln).show();
  if($("#target_using_org_id").val()!=null){
	  //console.log($("#target_using_org_id").val());
	  $("#line_target_using_org_id"+ln).val($("#target_using_org_id").val());
	  $("#line_target_using_org"+ln).val($("#target_using_org").val());
  }

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

function padleft0(obj) {//TODO 和hit_ip_trans中的一样，移动到公共函数库
  return obj.toString().replace(/^[0-9]{1}$/, "0" + obj);  
}
function getnowtime() {//TODO 和hit_ip_trans中的一样，移动到公共函数库
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

  function inactiveUsingLine(ln){
    if($("#line_inactive_using"+ln).is(':checked')){
    //$("#line_inactive_using"+ln).prop("checked",'true');
    document.getElementById("line_inactive_using"+ln).checked = true;
    var mydate = new Date();
    var currentDate=mydate.toLocaleString();
    $("#line_date_end"+ln).val(getnowtime());
    $("#line_inactive_using"+ln).val('1');
/*    $("#line_inactive_using"+ln).val('0');
    $("#line_inactive_using_val"+ln).val('0');
        $("#displayed_line_inactive_using"+ln).attr("checked",true);
        $("#displayed_line_inactive_using"+ln).prop("checked",true);
*/  //
}else{
  $("#line_inactive_using"+ln).removeAttr("checked");
  $("#line_date_end"+ln).val("");
  $("#line_inactive_using"+ln).val('0');
/*    $("#line_status"+ln).val("EFFECTIVE");
    $("#line_status_dis"+ln).val(SUGAR.language.get('HIT_IP_TRANS', 'LBL_EFFECTIVE'));

        $("#displayed_line_inactive_using"+ln).removeAttr("checked");
        $("#line_inactive_using"+ln).val('1');
        $("#line_inactive_using_val"+ln).val('1');*/
      }

    }
