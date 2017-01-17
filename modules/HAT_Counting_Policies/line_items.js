var prodln = 0;
var columnNum1 = 7;
var lineno;
var num;
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function insertLineHeader(tableid){
  $("#line_items_label").hide();//隐藏SugarCRM字段

  tablehead = document.createElement("thead");
  tablehead.id = tableid +"_head";
  document.getElementById(tableid).appendChild(tablehead);

  var x=tablehead.insertRow(-1);
  x.id='Line_head';
  var a=x.insertCell(0);
  a.innerHTML=SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_COUNTING_POLICY');
  var b=x.insertCell(1);
  b.innerHTML=SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_SEQ');
  var c=x.insertCell(2);
  c.innerHTML=SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_NAME');
  var b1=x.insertCell(3);
  b1.innerHTML=SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_GROUP_CLAUSE');
  var d=x.insertCell(4);
  d.innerHTML=SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_ENABLED_FLAG');
  var e=x.insertCell(5);
  e.innerHTML=SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_DESCRIPTION');
  var f=x.insertCell(6);
  f.innerHTML='&nbsp;';
}


function insertLineData(line_data ){ //将数据写入到对应的行字段中
  var ln = 0;
  if(line_data.id != '0' && line_data.id !== ''){

    ln = insertLineElements("lineItems");
    $("#line_id".concat(String(ln))).val(line_data.id);
    $("#line_name".concat(String(ln))).val(line_data.name);
    $("#line_group_clause".concat(String(ln))).val(line_data.group_clause);
    $("#line_description".concat(String(ln))).val(line_data.description);
    $("#line_enabled_flag".concat(String(ln))).attr('checked',line_data.enabled_flag==1?true:false);
    $("#line_enabled_flag".concat(String(ln))).val(line_data.enabled_flag);
    $("#line_hat_counting_policies_id_c".concat(String(ln))).val(line_data.hat_counting_policies_id_c);
    $("#line_policy_name".concat(String(ln))).val(line_data.policy_name);
    $("#line_seq".concat(String(ln))).val(line_data.seq);

    renderLine(ln);
    $("#line_editor"+ln).hide();
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

//var line_item_type_option = document.getElementById("splittypeidden").value;

var z1 = tablebody.insertRow(-1);
z1.id = 'line_displayed' + prodln;
z1.className = 'oddListRowS1';
z1.innerHTML  =
"<td><span name='displayed_line_policy_name[" + prodln + "]' id='displayed_line_policy_name" + prodln + "'></span></td>" +
"<td><span name='displayed_line_seq[" + prodln + "]' id='displayed_line_seq" + prodln + "'></span></td>"+
"<td><span name='displayed_line_name[" + prodln + "]' id='displayed_line_name" + prodln + "'></span></td>"+
"<td><span name='displayed_line_group_clause[" + prodln + "]' id='displayed_line_group_clause" + prodln + "'></span></td>"+
"<td><span name='displayed_line_enabled_flag[" + prodln + "]' id='displayed_line_enabled_flag" + prodln + "'></span></td>"+
"<td><span name='displayed_line_description[" + prodln + "]' id='displayed_line_description" + prodln + "'></span></td>"+
"<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'></td>";

  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'line_editor' + prodln;
  x.style = "display:none";


  x.innerHTML  = "<td colSpan='"+columnNum1+"'>"+
  "<link rel='stylesheet' type='text/css' href='custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'>"+
  "<table border='0' class='lineEditor' width='100%'>"+

  "<tr>"+
  "<input name='line_id["+prodln+"]' id='line_id"+prodln+"' value='' type='hidden'>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_COUNTING_POLICY')+"<span class='required'>*</span></td>"+
  "<td><input name='line_policy_name["+prodln+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_policy_name"+prodln+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text' readonly>"+
  "<input name='line_hat_counting_policies_id_c["+prodln+"]' id='line_hat_counting_policies_id_c"+prodln+"' type='hidden' value=''>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_SEQ')+"<span class='required'>*</span></td>"+
  "<td><input name='line_seq["+prodln+"]' id='line_seq"+prodln+"' size='30' maxlength='255' type='text'></td>"+
  "</tr>"+
  "<tr>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_NAME')+"<span class='required'>*</span></td>"+
  "<td><input name='line_name["+prodln+"]' id='line_name"+prodln+"' size='30' maxlength='255' type='text'></td>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_GROUP_CLAUSE')+"</td>"+
  "<td><textarea id='line_group_clause"+prodln+"' name='line_group_clause["+prodln+"]' rows='2' cols='50' title='' tabindex='0' style='overflow: hidden;'></textarea></td>"+
  "<tr>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_ENABLED_FLAG')+"<span class='required'>*</span></td>"+
  "<input type='hidden' name='line_enabled_flag["+prodln+"]' value='0'> "+
  "<td><input name='line_enabled_flag["+prodln+"]' id='line_enabled_flag"+prodln+"' title='' value='1' type='checkbox' checked></td>"+
  "<td>"+SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_DESCRIPTION')+"</td>"+
  "<td><textarea id='line_description"+prodln+"' name='line_description["+prodln+"]' rows='2' cols='50' title='' tabindex='0' style='overflow: hidden;'></textarea></td>"+
  "<td><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'></td>"+
  "<td><input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
  "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button></td>"+
  "</tr>"+
  "</table></td>";
  
  addToValidate('EditView', 'line_hat_counting_policies_id_c'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_COUNTING_POLICY'));
  addToValidate('EditView', 'line_seq'+ prodln,'int', 'true',SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_SEQ'));
  addToValidate('EditView', 'line_name'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_NAME'));
  addToValidate('EditView', 'line_enabled_flag'+ prodln,'int', 'true',SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_ENABLED_FLAG'));

  renderLine(prodln);
  num=prodln;
  prodln++;
  return prodln - 1;
}

function renderLine(ln) { //将编辑器中的内容显示于正常行中
  $("#displayed_line_policy_name"+ln).html($("#line_policy_name"+ln).val());
  $("#displayed_line_seq"+ln).html($("#line_seq"+ln).val());
  $("#displayed_line_name"+ln).html($("#line_name"+ln).val());
  $("#displayed_line_group_clause"+ln).html($("#line_group_clause"+ln).val());
  var flag=$("#line_enabled_flag"+ln).is(':checked')?"是":"否";
  $("#displayed_line_enabled_flag"+ln).html(flag);
  $("#displayed_line_description"+ln).html($("#line_description"+ln).val());

  $("#lineItems tr td").each(function(){
    $(this).css('vertical-align','middle');
  });
}

function insertLineFootor(tableid)
{
  tablefooter = document.createElement("tfoot");
  document.getElementById(tableid).appendChild(tablefooter);

  var footer_row=tablefooter.insertRow(-1);
  var footer_cell = footer_row.insertCell(0);

  footer_cell.scope="row";
  footer_cell.colSpan=columnNum1;
  footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_BTN_ADD_LINE')+"' />";
}

function addNewLine(tableid) {
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增
    insertLineElements(tableid);//加入新行
    LineEditorShow(prodln-1);       //打开行编辑器
    setdefaltpolicy(num);
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
    removeFromValidate('EditView','line_hat_counting_policies_id_c'+ ln);
    removeFromValidate('EditView','line_seq'+ ln);
    removeFromValidate('EditView','line_name'+ ln);
    removeFromValidate('EditView','line_enabled_flag'+ ln);
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

function validate(ln){

 addToValidate('EditView', 'line_hat_counting_policies_id_c'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_COUNTING_POLICY'));
 addToValidate('EditView', 'line_seq'+ prodln,'int', 'true',SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_SEQ'));
 addToValidate('EditView', 'line_name'+ prodln,'varchar', 'true',SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_NAME'));
 addToValidate('EditView', 'line_enabled_flag'+ prodln,'int', 'true',SUGAR.language.get('HAT_Counting_Policy_Lines', 'LBL_ENABLED_FLAG'));
}

$("#LBL_EDITVIEW_PANEL1 tr").each(function(i){
  $(this).children().each(function(i){
    $(this).removeAttr('colspan');
    if(i==1)
      $(this).attr('width','87.5%');
  });
  if (i==1) {
    $("#line_items_span").parent().attr('colspan','2');
    $("#line_items_span").parent().attr('width','100%');
  }
});

function replace_display_lines(linesHtml,elementId) {
  var lineItems=document.getElementById(elementId);
  lineItems.innerHTML=linesHtml;
}

function setdefaltpolicy(ln){
  var policy_name=$("#name").val();
  var record_id = $("input[name*='record']").val();
  document.getElementById("line_policy_name"+ln).value=policy_name;
  document.getElementById("line_hat_counting_policies_id_c"+ln).value=record_id;
}

$(function(){
  if(!num && typeof(num)!="undefined"){
    if(document.getElementById("line_hat_counting_policies_id_c"+num).value==''){
      markLineDeleted(num, "line_");
    }
  }
  $("#split_type").change(function(){
    if($(this).val()!='CUSTOM'){
      $("#detailpanel_2").hide();
    }else{
      $("#detailpanel_2").show();
    }
  });
})