var prodln = 0;
var columnNum1 = 7;
var lineno;
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function insertLineHeader(tableid){
  $("#line_items_label").hide();//隐藏SugarCRM字段

  tablehead = document.createElement("thead");
  tablehead.id = tableid +"_head";
  document.getElementById(tableid).appendChild(tablehead);

  var x=tablehead.insertRow(-1);
  x.id='Line_head';
  var a=x.insertCell(0);
  a.innerHTML=SUGAR.language.get('HAT_Counting_Rule_Dtls', 'LBL_ORGANIZATION_NAME');
  var b=x.insertCell(1);
  b.innerHTML=SUGAR.language.get('HAT_Counting_Rule_Dtls', 'LBL_COUNTING_OBJ_TYPE');
  var c=x.insertCell(2);
  c.innerHTML=SUGAR.language.get('HAT_Counting_Rule_Dtls', 'LBL_SPLIT_ACCORD');
  var b1=x.insertCell(3);
  b1.innerHTML=SUGAR.language.get('HAT_Counting_Rule_Dtls', 'LBL_ADDITIONAL_COMMENT');
  var d=x.insertCell(4);
  d.innerHTML=SUGAR.language.get('HAT_Counting_Rule_Dtls', 'LBL_DEFAULT_COUNTER');
  var e=x.insertCell(5);
  e.innerHTML=SUGAR.language.get('HAT_Counting_Rule_Dtls', 'LBL_DESCRIPTION');
  var f=x.insertCell(6);
  f.innerHTML='&nbsp;';
}


function insertLineData(line_data ){ //将数据写入到对应的行字段中
  var ln = 0;
  if(line_data.id != '0' && line_data.id !== ''){
    ln = insertLineElements("lineItems");
    $("#line_id".concat(String(ln))).val(line_data.id);
    $("#line_organization_name".concat(String(ln))).val(line_data.account_name);
    $("#line_account_id_c".concat(String(ln))).val(line_data.account_id_c);
    $("#line_counting_obj_type".concat(String(ln))).val(line_data.counting_obj_type);
    $("#line_split_accord".concat(String(ln))).val(line_data.split_accord);
    $("#line_additional_comment".concat(String(ln))).val(line_data.additional_comment);
    $("#line_default_counter".concat(String(ln))).val(line_data.default_counter);
    $("#line_description".concat(String(ln))).val(line_data.description);
    
    renderLine(ln);
  }
}

function insertLineElements(tableid) { //创建界面要素
//包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面
if (document.getElementById(tableid + '_head') !== null) {
  document.getElementById(tableid + '_head').style.display = "";
}

tablebody = document.createElement("tbody");
tablebody.id = "line_body" + prodln;
document.getElementById(tableid).appendChild(tablebody);

var line_item_type_option = document.getElementById("explinetypeidden").value;
var line_obj_type_option = document.getElementById("objlinetypeidden").value;

var z1 = tablebody.insertRow(-1);
z1.id = 'line_displayed' + prodln;
z1.className = 'oddListRowS1';
z1.innerHTML  =
"<td><span name='displayed_line_organization_name[" + prodln + "]' id='displayed_line_organization_name" + prodln + "'></span></td>" +
"<td><span name='displayed_line_counting_obj_type[" + prodln + "]' id='displayed_line_counting_obj_type" + prodln + "'></span></td>"+
"<td><span name='displayed_line_split_accord[" + prodln + "]' id='displayed_line_split_accord" + prodln + "'></span></td>"+
"<td><span name='displayed_line_additional_comment[" + prodln + "]' id='displayed_line_additional_comment" + prodln + "'></span></td>"+
"<td><span name='displayed_line_default_counter[" + prodln + "]' id='displayed_line_default_counter" + prodln + "'></span></td>"+
"<td><span name='displayed_line_description[" + prodln + "]' id='displayed_line_description" + prodln + "'></span></td>"+
"<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'></td>";

  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'line_editor' + prodln;
  x.style = "display:none";

   //var expDateHTML='<script type="text/javascript" src="custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>'+
  // '<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">'+
  // '<span class="input-group date" id="span_line_exp_date'+prodln+'">'+
  // "<label>"+SUGAR.language.get('hie_exp_apply_lines', 'LBL_EXP_DATE')+" <span class='required'>*</span></label>"+
  // '<input class="date_input" autocomplete="off" name="line_exp_date[' + prodln + ']" id="line_exp_date' + prodln + '" value="" title="" tabindex="116" type="text" onclick="CalendarShow(this)">'+
  // '<span class="input-group-addon">'+
  // '<span class="glyphicon glyphicon-calendar"></span>'+
  // '</span>'+
  // '</span>';

  x.innerHTML  = "<td colSpan='"+columnNum1+"'><table id='member' width='100%' style='display:table'>"+
  "<tr>"+
    "<input name='line_id["+prodln+"]' id='line_id"+prodln+"' value='' type='hidden'>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Rule_Dtls', 'LBL_ORGANIZATION_NAME')+"</td>"+
    "<td><input name='line_organization_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_organization_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
    "<input name='line_account_id_c["+prodln+"]' id='line_account_id_c"+prodln+"' type='hidden' value=''>"+
    "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openOrgPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_orgname' id='btn_clr_orgname' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_organization_name"+prodln+"\", \"line_account_id_c"+prodln+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+
    "</td>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Rule_Dtls', 'LBL_COUNTING_OBJ_TYPE')+"</td>"+
    //"<td><input name='line_counting_obj_type["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_counting_obj_type"+prodln+"' size='' value='' title='' autocomplete='off' type='text'>"+
    "<td><select tabindex='116' name='line_counting_obj_type[" + prodln + "]' id='line_counting_obj_type" + prodln + "'>" + line_obj_type_option +"</select></td>"+
    "</td>"+
  "</tr>"+
  "<tr>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Rule_Dtls', 'LBL_SPLIT_ACCORD')+"<span class='required'>*</span></td>"+
    "<td><select tabindex='116' name='line_split_accord[" + prodln + "]' id='line_split_accord" + prodln + "'>" + line_item_type_option +"</select></td>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Rule_Dtls', 'LBL_ADDITIONAL_COMMENT')+"</td>"+
    "<td><textarea id='line_additional_comment"+prodln+"' name='line_additional_comment["+prodln+"]' rows='2' cols='50' title='' tabindex='0' style='overflow: hidden;'></textarea></td>"+  "</tr>"+
  "<tr>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Rule_Dtls', 'LBL_DEFAULT_COUNTER')+"</td>"+
    "<td><textarea id='line_default_counter"+prodln+"' name='line_default_counter["+prodln+"]' rows='2' cols='50' title='' tabindex='0' style='overflow: hidden;'></textarea></td>"+
    "<td>"+SUGAR.language.get('HAT_Counting_Rule_Dtls', 'LBL_DESCRIPTION')+"</td>"+
    "<td><textarea id='line_description"+prodln+"' name='line_description["+prodln+"]' rows='2' cols='50' title='' tabindex='0' style='overflow: hidden;'></textarea></td>"+
    "<td><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'></td>"+
    "<td><input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
     "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button></td>"+
  "</tr>"+
  "</table></td>";
    // console.log(x.innerHTML);
    addToValidate('EditView', 'line_split_accord'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Rule_Dtls', 'LBL_SPLIT_ACCORD'));

    clr_value('#line_organization_name','#line_account_id_c',prodln);
    //clr_value('#line_counting_obj_type','#line_haa_codes_id_c',prodln);

    renderLine(prodln);
    prodln++;
    return prodln - 1;
  }

function renderLine(ln) { //将编辑器中的内容显示于正常行中
  $("#displayed_line_organization_name"+ln).html($("#line_organization_name"+ln).val());
  $("#displayed_line_counting_obj_type"+ln).html($("#line_counting_obj_type"+ln).find("option:selected").html());
  $("#displayed_line_split_accord"+ln).html($("#line_split_accord"+ln).find("option:selected").html());
  //$("#displayed_line_split_accord"+ln).html($("#line_split_accord"+ln).val());
  $("#displayed_line_additional_comment"+ln).html($("#line_additional_comment"+ln).val());
  $("#displayed_line_default_counter"+ln).html($("#line_default_counter"+ln).val());
  $("#displayed_line_description"+ln).html($("#line_description"+ln).val());
}

function insertLineFootor(tableid)
{
  tablefooter = document.createElement("tfoot");
  document.getElementById(tableid).appendChild(tablefooter);

  var footer_row=tablefooter.insertRow(-1);
  var footer_cell = footer_row.insertCell(0);

  footer_cell.scope="row";
  footer_cell.colSpan=columnNum1;
  footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HAT_Counting_Rule_Dtls', 'LBL_BTN_ADD_LINE')+"' />";
}

function addNewLine(tableid) {
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增
    insertLineElements(tableid);//加入新行
    LineEditorShow(prodln-1);       //打开行编辑器
  }
}


function btnMarkLineDeleted(ln, key) {//删除当前行
  if(confirm(SUGAR.language.get('app_strings','NTC_DELETE_CONFIRMATION'))) {
    markLineDeleted(ln, key);
    LineEditorClose(ln); 
  }
  else
  {
    return false;
  }
}
function markLineDeleted(ln, key) {//删除当前行

  // collapse line; update deleted value
  document.getElementById(key + 'body' + ln).style.display = 'none';
  document.getElementById(key + 'deleted' + ln).value = '1';
  document.getElementById(key + 'delete_line' + ln).onclick = '';

  if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
    removeFromValidate('EditView','line_split_accord'+ ln);
  }
  resetLineNum_Bold();

}

function LineEditorShow(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
  validate(ln);
  if (prodln>1) {
    for (var i=0;i<prodln;i++) {
      LineEditorClose(i);
    }
  }
  $("#line_displayed"+ln).hide();
  $("#line_editor"+ln).show();

}

function LineEditorClose(ln) {//关闭行编辑器（显示为正常行）
  if (check_form('EditView')) {
    $("#line_editor"+ln).hide();
    $("#line_displayed"+ln).show();
    renderLine(ln);
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
}

function openOrgPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setOrgReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_account_id_c"+ln,
      "name" : "line_organization_name" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  var frame='&frame_c_advanced='+$("#haa_framework").val();
  open_popup('Accounts', 800, 850,frame, true, true, popupRequestData);
}

function setOrgReturn(popupReplyData){
  set_return(popupReplyData);
}

/*function openCodeNamePopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setCodeNameReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_haa_codes_id_c"+ln,
      "name" : "line_counting_obj_type" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  var contact='&code_type_advanced=asset_counting_obj_type';
  open_popup('HAA_Codes', 800, 850, contact, true, true, popupRequestData);
}

function setCodeNameReturn(popupReplyData){
  set_return(popupReplyData);
}*/


function validate(ln){
 
    addToValidate('EditView', 'line_split_accord'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Rule_Dtls', 'LBL_SPLIT_ACCORD'));
}


function clr_value(attr_name,attr_id,ln){
  var old_val="";
  $(attr_name+ln).click(function(){
    old_val=$(this).val();
  });
  $(attr_name+ln).blur(function(){
    var leave_val=$(this).val();
    if (leave_val!=old_val) {
      $(this).val("");
      var line_num=$(this).attr("id").replace(/[^0-9]/ig,"");
      $(attr_id+line_num).val("");
    }
  });

}