var prodln = 0;
var l_prodln=0;
var columnNum1 = 11;
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function insertLineHeader(tableid){
  $("#line_items_label").hide();//隐藏SugarCRM字段

  tablehead = document.createElement("thead");
  tablehead.id = tableid +"_head";
  document.getElementById(tableid).appendChild(tablehead);

  var x=tablehead.insertRow(-1);
  x.id='Line_head';
  var a=x.insertCell(0);
  a.innerHTML=SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_LINE_NUMBER');
  var b=x.insertCell(1);
  b.innerHTML=SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_TITLE');
    var h=x.insertCell(2);
  h.innerHTML=SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_TYPE');
  var c=x.insertCell(3);
  c.innerHTML=SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_NAME');
 
  var b1=x.insertCell(4);
  b1.innerHTML=SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_DATA_TYPE');
  var d=x.insertCell(5);
  d.innerHTML=SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_LENGTH');
    var i=x.insertCell(6);
  i.innerHTML=SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_MASK');
  var e=x.insertCell(7);
  e.innerHTML=SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_VALIDATE_VALUESET');
  var f=x.insertCell(8);
  f.innerHTML=SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_REQUIRED_FLAG');
  var g=x.insertCell(9);
  g.innerHTML=SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_ENABLED_FLAG');
var j=x.insertCell(10);
  j.innerHTML='&nbsp;';
}


function insertLineData(line_data ){ //将数据写入到对应的行字段中
  var ln = 0;
  if(line_data.id != '0' && line_data.id !== ''){
    ln = insertLineElements("lineItems");
    $("#line_id".concat(String(ln))).val(line_data.line_id);
    $("#line_line_number".concat(String(ln))).val(line_data.line_number);
    $("#line_column_title".concat(String(ln))).val(line_data.column_title);
    $("#line_column_type".concat(String(ln))).val(line_data.column_type);
    $("#line_column_name".concat(String(ln))).val(line_data.column_name);
    $("#line_column_data_type".concat(String(ln))).val(line_data.column_data_type);
    $("#line_column_length".concat(String(ln))).val(line_data.column_length);
    $("#line_valueset_name".concat(String(ln))).val(line_data.valueset_name);
     $("#line_required_flag".concat(String(ln))).attr('checked',line_data.required_flag==1?true:false);
    //$("#line_required_flag".concat(String(ln))).val(line_data.required_flag);
    
     $("#line_enabled_flag".concat(String(ln))).attr('checked',line_data.enabled_flag==1?true:false);
    //$("#line_enabled_flag".concat(String(ln))).val(line_data.enabled_flag);
   
 
    $("#line_header_id".concat(String(ln))).val(line_data.header_id);
    $("#line_haa_valuesets_id_c".concat(String(ln))).val(line_data.haa_valuesets_id_c);
    $("#line_column_mask".concat(String(ln))).val(line_data.column_mask);
    renderLine(ln);
  }
}

function insertLineElements(tableid) { //创建界面要素
//包括以下内容：1）显示头，
//2）定义SQS对象，
//3）定义界面显示的可见字段，
//4）界面行编辑器界面
if (document.getElementById(tableid + '_head') !== null) {
  document.getElementById(tableid + '_head').style.display = "";
}

tablebody = document.createElement("tbody");
tablebody.id = "line_body" + prodln;
document.getElementById(tableid).appendChild(tablebody);

var sys_clomn_name = document.getElementById("sysclomnname").value;
var integration_date_type=document.getElementById("integrationdatetype").value;
var sys_clomn_type = document.getElementById("sysclomntype").value;
var z1 = tablebody.insertRow(-1);
z1.id = 'line1_displayed' + prodln;
z1.className = 'oddListRowS1';
z1.innerHTML  =
"<td><span name='displayed_line_number[" + prodln + "]' id='displayed_line_number" + prodln + "'></span></td>" +
"<td><span name='displayed_column_title[" + prodln + "]' id='displayed_column_title" + prodln + "'></span></td>" +
"<td><select disabled='disabled' tabindex='116' name='displayed_column_type[" + prodln + "]' id='displayed_column_type" + prodln + "'>" + sys_clomn_type +"</select></td>"+
"<td><select disabled='disabled' tabindex='116' name='displayed_column_name[" + prodln + "]' id='displayed_column_name" + prodln + "'>" + sys_clomn_name +"</select></td>"+
"<td><select disabled='disabled' tabindex='116' name='displayed_column_data_type[" + prodln + "]' id='displayed_column_data_type" + prodln + "'>" + integration_date_type +"</select></td>"+
"<td><span name='displayed_column_length[" + prodln + "]' id='displayed_column_length" + prodln + "'></span></td>" +
"<td><span name='displayed_column_mask[" + prodln + "]' id='displayed_column_mask" + prodln + "'></span></td>" +
"<td><span name='displayed_valueset_name[" + prodln + "]' id='displayed_valueset_name" + prodln + "'></span></td>"+
"<td><span name='displayed_required_flag[" + prodln + "]' id='displayed_required_flag" + prodln + "'></span></td>"+
"<td><span name='displayed_enabled_flag[" + prodln + "]' id='displayed_enabled_flag" + prodln + "'></span></td>"+
"<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'></td>";

  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'line_editor' + prodln;
  x.style = "display:none";
  
  /*l_prodln=prodln+1;*/
 x.innerHTML  = "<td colSpan='"+columnNum1+"'>"+
  "<table border='0' class='lineEditor' width='100%'>"+
  "<tr>"+
  "<input name='line_id["+prodln+"]' id='line_id"+prodln+"' value='' type='hidden'>"+
  "<input name='line_header_id["+prodln+"]' id='line_header_id"+prodln+"' value='' type='hidden' >"+
 "<td>"+SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_LINE_NUMBER')+"<span class='required'>*</span></td>"+
  "<td><input name='line_line_number["+prodln+"]' id='line_line_number"+prodln+"' size='30' maxlength='255' type='text' ></td>"+
  "<td>"+SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_TITLE')+"<span class='required'>*</span></td>"+
  "<td><input name='line_column_title["+prodln+"]' id='line_column_title"+prodln+"' size='30' maxlength='255' type='text'></td>"+
  "</tr>"+
  "<tr>"+
  "<td>"+SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_TYPE')+"<span class='required'>*</span></td>"+
  "<td><select onchange='changeColumnName("+prodln+")' tabindex='116' name='line_column_type[" + prodln + "]' id='line_column_type" + prodln + "'>" + sys_clomn_type +"</select></td>"+
  "<td>"+SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_NAME')+"<span class='required'>*</span></td>"+
  "<td><select onchange='changeValueset("+prodln+")' value='' tabindex='116' name='line_column_name[" + prodln + "]' id='line_column_name" + prodln + "'>" + sys_clomn_name +"</select></td>"+
  "</tr>"+
  "<tr>"+
  "<td>"+SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_DATA_TYPE')+"<span class='required'>*</span></td>"+
  "<td><select onchange='changeClumnLength("+prodln+")' tabindex='116' name='line_column_data_type[" + prodln + "]' id='line_column_data_type" + prodln + "'>" + integration_date_type +"</select></td>"+
  "<td>"+SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_LENGTH')+"<span class='required'>*</span></td>"+
  "<td><input name='line_column_length[" + prodln + "]' id='line_column_length" + prodln + "' size='30' maxlength='255' type='text'></td>"+
  "</tr>"+
  "<tr>"+
    "<td>"+SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_VALIDATE_VALUESET')+"</td>"+
    "<td><input name='line_valueset_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_valueset_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
    "<input name='line_haa_valuesets_id_c["+prodln+"]' id='line_haa_valuesets_id_c"+prodln+"' type='hidden' value=''>"+
    "<button id = 'btn_choose_valueset' title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openValueset(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_valueset' id='btn_clr_valueset' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_valueset_name"+prodln+"\", \"line_haa_valuesets_id_c"+prodln+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+
    "</td>"+
    "<td>"+SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_MASK')+"</td>"+
    "<td><input name='line_column_mask[" + prodln + "]' id='line_column_mask" + prodln + "' size='30' maxlength='255' type='text'></td>"+
  "</td>"+
  "</tr>"+
   "<tr>"+
    "<td>"+SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_ENABLED_FLAG')+"</td>"+
    "<td><input name='line_enabled_flag[" + prodln + "]' id='line_enabled_flag" + prodln + "' size='30' maxlength='255' type='checkbox' checked=true></td>"+
     "<td>"+SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_REQUIRED_FLAG')+"</td>"+
    "<td><input name='line_required_flag[" + prodln + "]' id='line_required_flag" + prodln + "' size='30' maxlength='255' type='checkbox'></td>"+
     "<td><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'></td>"+
    "<td><input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
    "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button></td>"+
  "</td>"+
  "</tr>"+
  "</table></td>";
  
    // console.log(x.innerHTML);
    valitems(prodln);
    /*addToValidate('EditView', 'line_line_number'+ prodln,'int', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_LINE_NUMBER'));
    addToValidate('EditView', 'line_column_title'+ prodln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_TITLE'));
    addToValidate('EditView', 'line_column_name'+ prodln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_NAME'));
    addToValidate('EditView', 'line_column_data_type'+ prodln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_DATA_TYPE'));
    addToValidate('EditView', 'line_column_type'+ prodln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_TYPE'));
    */
    renderLine(prodln);
    initInput(prodln);
    prodln++;

    return prodln - 1;
  }

function renderLine(ln) { //将编辑器中的内容显示于正常行中
 
  $("#displayed_line_number"+ln).html($("#line_line_number"+ln).val());
  $("#displayed_column_title"+ln).html($("#line_column_title"+ln).val());
  $("#displayed_column_type"+ln).val($("#line_column_type"+ln).val());
  $("#displayed_column_name"+ln).val($("#line_column_name"+ln).val());
  $("#displayed_column_data_type"+ln).val($("#line_column_data_type"+ln).val());
  $("#displayed_column_length"+ln).html($("#line_column_length"+ln).val());
  $("#displayed_column_mask"+ln).html($("#line_column_mask"+ln).val());
  $("#displayed_valueset_name"+ln).html($("#line_valueset_name"+ln).val());
  var flag=$("#line_required_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_required_flag"+ln).html(flag);
  var flag=$("#line_enabled_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_enabled_flag"+ln).html(flag);
  LineEditorClose(ln);
}

function insertLineFootor(tableid)
{
  tablefooter = document.createElement("tfoot");
  document.getElementById(tableid).appendChild(tablefooter);

  var footer_row=tablefooter.insertRow(-1);
  var footer_cell = footer_row.insertCell(0);

  footer_cell.scope="row";
  footer_cell.colSpan=columnNum1;
  footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+新增' />";
}

function addNewLine(tableid) {
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增
    insertLineElements(tableid);//加入新行
    LineEditorShow(prodln - 1);       //打开行编辑器
    setLineNum(prodln);
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
    removeFromValidate('EditView','line_line_number'+ ln);
    removeFromValidate('EditView','line_column_name'+ ln);
    removeFromValidate('EditView','line_column_title'+ ln);
    removeFromValidate('EditView','line_column_data_type'+ ln);
    removeFromValidate('EditView','line_column_type'+ ln);
    removeFromValidate('EditView','line_column_length'+ ln);
    removeFromValidate('EditView','line_enabled_flag'+ ln);
    removeFromValidate('EditView','line_required_flag'+ ln);
    removeFromValidate('EditView','line_valueset_name'+ ln);
  }

  resetLineNum_Bold();

}

function LineEditorShow(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
  valitems(ln);
  initInput(ln);
  if (prodln>1) {
    for (var i=0;i<prodln;i++) {
      LineEditorClose(i);
    }
  }

  $("#line1_displayed"+ln).hide();
  $("#line_editor"+ln).show();

}

function LineEditorClose(ln) {//关闭行编辑器（显示为正常行）
  if (check_form('EditView')) {
    $("#line_editor"+ln).hide();
    $("#line1_displayed"+ln).show();
    renderLine(ln);
    resetLineNum_Bold();
  }
}

function resetLineNum_Bold() {//数行号
  var j=0;
  for (var i=0;i<prodln;i++) {
    if ($("#line_deleted"+i).val()!=1) {//跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
      j=j+1;
      $("#displayed_line_number" + i).text(j);
    }
  }
}

function setLineNum(ln){
  var j=0;
  for (var i=0;i<ln;i++) {
    /*if ($("#line_deleted"+i).val()!=1) {*///跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
      j=j+1;
      $("#line_line_number"+i).val(j);
    //}
  }
}

function openValueset(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setValReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_haa_valuesets_id_c"+ln,
      "name" : "line_valueset_name" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  //var frame='&frame_c_advanced='+$("#haa_framework").val();
  open_popup('HAA_ValueSets', 800, 850,'', true, true, popupRequestData);
}

function setValReturn(popupReplyData){
  set_return(popupReplyData);
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

function changeColumnName(ln){
  var column_type=$("#line_column_type"+ln).val();
  var button1 = document.getElementById("btn_choose_valueset"); 
  valitems(ln); 
  if (column_type=="S") {
    $("#line_column_name"+ln).attr("disabled",false);
    addToValidate('EditView', 'line_column_name'+ ln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_NAME'));

  }
  else
  {
    $("#line_column_name"+ln).attr("disabled",true);
    $("#line_column_name"+ln).val('0');
    $("#line_valueset_name"+ln).attr("readOnly",true);
    $("#line_valueset_name"+ln).val('');
    removeFromValidate('EditView','line_column_name'+ ln);
    removeFromValidate('EditView','line_valueset_name'+ ln);
    button1.disabled=true;
  }
}

function changeValueset(ln){
  var column_name =$("#line_column_name"+ln).val();
var button1 = document.getElementById("btn_choose_valueset"); 

  if (column_name.substring(0,7)=="SEGMENT") {
    $("#line_valueset_name"+ln).attr("readOnly",false);
    addToValidate('EditView', 'line_valueset_name'+ ln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_VALIDATE_VALUESET'));
    button1.disabled=false;
  }
  else{
    $("#line_valueset_name"+ln).attr("readOnly",true);
    removeFromValidate('EditView','line_valueset_name'+ ln);
    $("#line_valueset_name"+ln).val('');
    button1.disabled=true;
  }
}

function changeClumnLength(ln){
  var column_name =$("#line_column_data_type"+ln).val();
  if (column_name=="C") {
    $("#line_column_length"+ln).attr("readOnly",false);
      addToValidate('EditView', 'line_column_length'+ ln,'number', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_LENGTH'));
removeFromValidate('EditView','line_column_mask'+ ln);
    $("#line_column_mask"+ln).attr("readOnly",true);
    $("#line_column_mask"+ln).val('');
  }else if (column_name=="D") {
    $("#line_column_length"+ln).attr("readOnly",true);
    addToValidate('EditView', 'line_column_mask'+ ln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_MASK'));
    removeFromValidate('EditView','line_column_length'+ ln);
    $("#line_column_mask"+ln).attr("readOnly",false);
    $("#line_column_length"+ln).val('');
  }else{
     $("#line_column_length"+ln).attr("readOnly",true);
     removeFromValidate('EditView','line_column_length'+ ln);
     $("#line_column_mask"+ln).attr("readOnly",true);
     removeFromValidate('EditView','line_column_mask'+ ln);
     $("#line_column_length"+ln).val('');
  }
}

function initInput(ln){
   var column_type=$("#line_column_type"+ln).val();
   var column_name =$("#line_column_name"+ln).val();
   var column_data_type =$("#line_column_data_type"+ln).val();
  var button1 = document.getElementById("btn_choose_valueset");
  if (column_type=="S" ) {
    $("#line_column_name"+ln).attr("disabled",false);
        addToValidate('EditView', 'line_column_name'+ ln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_NAME'));

  }
  else
  {
    $("#line_column_name"+ln).attr("disabled",true);
     removeFromValidate('EditView','line_column_name'+ ln);
    $("#line_column_name"+ln).val('0');
    $("#line_valueset_name"+ln).attr("readOnly",true);
    removeFromValidate('EditView','line_valueset_name'+ ln);
    $("#line_valueset_name"+ln).val('');
    button1.disabled=true;
  }
  if (column_name.substring(0,7)=="SEGMENT") {
    $("#line_valueset_name"+ln).attr("readOnly",false);
        addToValidate('EditView', 'line_valueset_name'+ ln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_VALIDATE_VALUESET'));
    button1.disabled=false;
  }
  else{
    $("#line_valueset_name"+ln).attr("readOnly",true);
    removeFromValidate('EditView','line_valueset_name'+ ln);
    $("#line_valueset_name"+ln).val('');
    button1.disabled=true;
  }
  if (column_data_type=="C") {
    $("#line_column_length"+ln).attr("readOnly",false);
    $("#line_column_mask"+ln).attr("readOnly",true);
    addToValidate('EditView', 'line_column_length'+ ln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_LENGTH'));
    removeFromValidate('EditView','line_column_mask'+ ln);
    $("#line_column_mask"+ln).val('');
  }else if (column_data_type=="D") {
    $("#line_column_length"+ln).attr("readOnly",true);
    $("#line_column_mask"+ln).attr("readOnly",false);
    addToValidate('EditView', 'line_column_mask'+ ln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_MASK'));
    removeFromValidate('EditView','line_column_length'+ ln);
    $("#line_column_length"+ln).val('');
  }else{
     $("#line_column_length"+ln).attr("readOnly",true);
     $("#line_column_mask"+ln).attr("readOnly",true);
     removeFromValidate('EditView','line_column_length'+ ln);
     removeFromValidate('EditView','line_column_mask'+ ln);
     $("#line_column_length"+ln).val('');
  }
}

/*function doValidate(ln){
  var length = document.getElementById("line_column_length");
  if (length.readOnly) {
  addToValidate('EditView', 'line_column_length'+ prodln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_LENGTH'));
}
}*/
function setifon(){ 
  if(document.getElementById("effected_flag").checked==true){
    $("#own_interface").attr("disabled",true);
    document.getElementById("btn_own_interface").disabled=true;
    document.getElementById("btnAddNewLine").disabled=true;
    $("#name").attr("disabled",true);
    $("#interface_type").attr("disabled",true);
    $("#link_system").attr("disabled",true);
    $("#enabled_flag").attr("disabled",true);
    $("#description").attr("disabled",true);
    for (var i =0 ; i < prodln; i++) {
       document.getElementById("btn_edit_line"+i).disabled=true;
    }
  }
  else
  {
    $("#own_interface").attr("disabled",false);
    document.getElementById("btn_own_interface").disabled=false;
    $("#name").attr("disabled",false);
    $("#interface_type").attr("disabled",false);
    $("#link_system").attr("disabled",false);
    $("#enabled_flag").attr("disabled",false);
    $("#description").attr("disabled",false);
    document.getElementById("btnAddNewLine").disabled=false;
    for (var i =0 ; i < prodln; i++) {
       document.getElementById("btn_edit_line"+i).disabled=false;
    }
  }
}

function valitems(ln){
  addToValidate('EditView', 'line_line_number'+ ln,'int', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_LINE_NUMBER'));
    addToValidate('EditView', 'line_column_title'+ ln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_TITLE'));
    addToValidate('EditView', 'line_column_name'+ ln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_NAME'));
    addToValidate('EditView', 'line_column_data_type'+ ln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_DATA_TYPE'));
    addToValidate('EditView', 'line_column_type'+ ln,'varchar', 'true',SUGAR.language.get('HAA_Integration_System_Def_Lines', 'LBL_COLUMN_TYPE'));
    
}
