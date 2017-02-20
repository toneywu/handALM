var prodln = 0;
var sort_order_num = 0;
var columnNum = 11;
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function insertLineHeader(tableid){
  $("#line_items_span").parent().prev().hide();//隐藏SugarCRM字段

  tablehead = document.createElement("thead");
  tablehead.id = tableid +"_head";
  //tablehead.style.display="none";
  document.getElementById(tableid).appendChild(tablehead);

  var x=tablehead.insertRow(-1);
  x.id='Line_head';
  var a=x.insertCell(0);
  a.innerHTML=SUGAR.language.get('HAA_Periods', 'LBL_SORT_ORDER');
  var c=x.insertCell(1);
  c.innerHTML=SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_YEAR');
  var b1=x.insertCell(2);
  b1.innerHTML=SUGAR.language.get('HAA_Periods', 'LBL_QUARTER_NUM');
  var d=x.insertCell(3);
  d.innerHTML=SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_NUM');
  var e=x.insertCell(4);
  e.innerHTML=SUGAR.language.get('HAA_Periods', 'LBL_START_DATE');
  var f=x.insertCell(5);
  f.innerHTML=SUGAR.language.get('HAA_Periods', 'LBL_END_DATE');   
  var b=x.insertCell(6);
  b.innerHTML=SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_NAME');
  var i=x.insertCell(7);
  i.innerHTML=SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_STATUS');
  var g=x.insertCell(8);
  g.innerHTML=SUGAR.language.get('HAA_Periods', 'LBL_ENABLED_FLAG');
  var h=x.insertCell(9);
  h.innerHTML=SUGAR.language.get('HAA_Periods', 'LBL_DESCRIPTION'); 
  var j=x.insertCell(10);
  j.innerHTML='&nbsp;';
}


function insertLineData(line_data ){ //将数据写入到对应的行字段中
  var ln = 0;
  if(line_data.id != '0' && line_data.id !== ''){
    sort_order_num = line_data.max_sort_order;

    ln = insertLineElements("lineItems");
    $("#line_id".concat(String(ln))).val(line_data.id);
    $("#line_period_set".concat(String(ln))).val(line_data.period_set);
    $("#line_sort_order".concat(String(ln))).val(line_data.sort_order);
    $("#disabled_line_sort_order".concat(String(ln))).val(line_data.sort_order);

    $("#line_period_name".concat(String(ln))).val(line_data.period_name);
    $("#line_period_year".concat(String(ln))).val(line_data.period_year);
    $("#line_quarter_num".concat(String(ln))).val(line_data.quarter_num);
    $("#line_period_num".concat(String(ln))).val(line_data.period_num);
    $("#line_start_date".concat(String(ln))).val(line_data.start_date);
    $("#line_end_date".concat(String(ln))).val(line_data.end_date);
    $("#line_period_status".concat(String(ln))).val(line_data.period_status);

    $("#line_enabled_flag".concat(String(ln))).attr('checked',line_data.enabled_flag==1?true:false);
    $("#line_enabled_flag".concat(String(ln))).val(line_data.enabled_flag);
    //$("#line_enabled_flag".concat(String(ln))).val(line_data.enabled_flag);
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

var line_period_status_option = document.getElementById("period_status_type").value;

var z1 = tablebody.insertRow(-1);
z1.id = 'line1_displayed' + prodln;
z1.className = 'oddListRowS1';
z1.innerHTML  =
"<td><span name='displayed_line_sort_order[" + prodln + "]' id='displayed_line_sort_order" + prodln + "'></span></td>" +
"<td><span name='displayed_line_period_year[" + prodln + "]' id='displayed_line_period_year" + prodln + "'></span></td>" +
"<td><span name='displayed_line_quarter_num[" + prodln + "]' id='displayed_line_quarter_num" + prodln + "'></span></td>" +
"<td><span name='displayed_line_period_num[" + prodln + "]' id='displayed_line_period_num" + prodln + "'></span></td>" +
"<td><span name='displayed_line_start_date[" + prodln + "]' id='displayed_line_start_date" + prodln + "'></span></td>"+
"<td><span name='displayed_line_end_date[" + prodln + "]' id='displayed_line_end_date" + prodln + "'></span></td>"+
"<td><span name='displayed_line_period_name[" + prodln + "]' id='displayed_line_period_name" + prodln + "'></span></td>" +
"<td><select disabled='disabled' tabindex='116' name='displayed_line_period_status[" + prodln + "]' id='displayed_line_period_status" + prodln + "'>" + line_period_status_option +"</select></td>"+
//"<td><span><input name='displayed_line_enabled_flag[" + prodln + "]' type='checkbox' value='' title='' id='displayed_line_enabled_flag" + prodln + "'  onclick='CheckBoxChang(this.id)'></input></span></td>"+

"<td><span name='displayed_line_enabled_flag[" + prodln + "]'  value='' title='' id='displayed_line_enabled_flag" + prodln + "' ></span></td>"+

"<td><span name='displayed_line_description[" + prodln + "]' id='displayed_line_description" + prodln + "'></span></td>"+
"<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'></td>";


// "<td><select disabled='disabled' tabindex='116' name='displayed_line_item_type_code[" + prodln + "]' id='displayed_line_item_type_code" + prodln + "'>" + line_item_type_option +"</select></td>"+
// "<td><span name='displayed_line_name[" + prodln + "]' id='displayed_line_name" + prodln + "'></span></td>"+
// "<td><span name='displayed_line_exp_date[" + prodln + "]' id='displayed_line_exp_date" + prodln + "'></span></td>"+
// "<td><span name='displayed_line_amount[" + prodln + "]' id='displayed_line_amount" + prodln + "'></span></td>"+
// "<td><span name='displayed_line_description[" + prodln + "]' id='displayed_line_description" + prodln + "'></span></td>"+
// "<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln +"' onclick='LineEditorShow("+prodln+")'></td>";

  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'line_editor' + prodln;
  x.style = "display:none";

  var startDateHTML='<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">'+  
  '<span class="input_group"><span class="input-group date calender" id="span_line_exp_date'+prodln+'" >'+
  "<label>"+SUGAR.language.get('HAA_Periods', 'LBL_START_DATE')+" <span class='required'>*</span></label>"+
  '<input class="date_input" autocomplete="off" style="width:180px;"  name="line_start_date[' + prodln + ']" id="line_start_date' + prodln + '" value="" title="" tabindex="116" type="text" onblur="validateStartAndEndDate(this.id,' + prodln + ')">'+
  '<span class="input-group-addon">'+
  '<span class="glyphicon glyphicon-calendar"></span>'+
  '</span>'+
  '<span style="color:red;font-size:15px;display:none"  type="text" name="validate_line_start_date[' + prodln + ']" id="validate_line_start_date' + prodln + '" maxlength="50"  value="" title="">日期从大于日期至</span>'+
  '</span>'+
  '</span>';

  var endDateHTML= '<span class="input_group"><span class="input-group date calender" id="span_end_date'+prodln+'" >'+
  "<label>"+SUGAR.language.get('HAA_Periods', 'LBL_END_DATE')+" <span class='required'>*</span></label>"+
  '<input class="date_input" autocomplete="off" style="width:180px;" name="line_end_date[' + prodln + ']" id="line_end_date' + prodln + '" value="" title="" tabindex="116" type="text" onblur="validateStartAndEndDate(this.id,' + prodln + ')">'+
  
  '<span class="input-group-addon">'+
  '<span class="glyphicon glyphicon-calendar"></span>'+
  '</span>'+
  '<span style="color:red;font-size:15px;display:none"  type="text" name="validate_line_end_date[' + prodln + ']" id="validate_line_end_date' + prodln + '" maxlength="50"  value="" title="">日期从大于日期至</span>'+
  '</span>'+
  '</span>';

  x.innerHTML  = "<td colSpan='"+columnNum+"'><div class='lineEditor'>"+
  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HAA_Periods', 'LBL_SORT_ORDER')+" <span class='required'>*</span></label>"+
  "<input style='width:180px;' disabled=true autocomplete='off' type='text' name='disabled_line_sort_order[" + prodln + "]' id='disabled_line_sort_order" + prodln + "' maxlength='50' value='"+sort_order_num+"' title=''>"+
  "<input style='width:180px;display:none;' autocomplete='off' type='text' name='line_sort_order[" + prodln + "]' id='line_sort_order" + prodln + "' maxlength='50' value='"+sort_order_num+"' title=''>"+
  "</span>"+

  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_YEAR')+" <span class='required'>*</span></label>"+
  "<input style='width:180px;'  autocomplete='off' type='text' name='line_period_year[" + prodln + "]' id='line_period_year" + prodln + "' maxlength='50' value='' title='' onblur='onblurLinePeriodYear(this.id,"+prodln+")'>"+
  "<span style='color:red;font-size:15px;display:none'  type='text' name='validate_line_period_year[" + prodln + "]' id='validate_line_period_year" + prodln + "' maxlength='50'  value='' title=''>限制值在1900-9999之间</span>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HAA_Periods', 'LBL_QUARTER_NUM')+" <span class='required'>*</span></label>"+
  "<input style='width:180px;'  autocomplete='off' type='text' name='line_quarter_num[" + prodln + "]' id='line_quarter_num" + prodln + "' maxlength='50' value='' title='' onblur='validateQuarterNum(this.id)'>"+
  "<span style='color:red;font-size:15px;display:none'  type='text' name='validate_line_quarter_num[" + prodln + "]' id='validate_line_quarter_num" + prodln + "' maxlength='50'  value='' title=''>限制值在1-4之间</span>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_NUM')+" <span class='required'>*</span></label>"+
  "<input style='width:180px;'  autocomplete='off' type='text' name='line_period_num[" + prodln + "]' id='line_period_num" + prodln + "' maxlength='50' value='' title=''onblur='onblurLinePeriodNum(this.id,"+prodln+")'>"+
  "<span style='color:red;font-size:15px;display:none'  type='text' name='validate_line_period_num[" + prodln + "]' id='validate_line_period_num" + prodln + "' maxlength='50'  value='' title=''>限制值在1-12之间</span>"+
  "</span>"+


  startDateHTML+
  endDateHTML+

  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_NAME')+" <span class='required'>*</span></label>"+
  "<input style='width:180px;'  autocomplete='off' type='text' name='line_period_name[" + prodln + "]' id='line_period_name" + prodln + "' maxlength='50' value='' title=''>"+
  "</span>"+
  // "<span class='input_group'>"+
  // "<label>"+SUGAR.language.get('HAA_Periods', 'LBL_ENABLED_FLAG')+" <span class='required'>*</span></label>"+
  // "<input style=' width:153px;' type='checkbox' name='line_enabled_flag[" + prodln + "]' id='line_enabled_flag" + prodln + "' maxlength='50' value='' checked='checked' title='' >"+
  // "</span>"+

  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_STATUS')+" <span class='required'>*</span></label>"+
  "<select tabindex='116' name='line_period_status[" + prodln + "]' id='line_period_status" + prodln + "'>" + line_period_status_option + "</select>"+
  "</span>"+

  "<span class='input_group' style='height:32px;'>"+
  "<label>"+SUGAR.language.get('HAA_Periods', 'LBL_ENABLED_FLAG')+" <span class='required'>*</span></label>"+
  "<input style=' width:120px;' type='checkbox' name='line_enabled_flag[" + prodln + "]' id='line_enabled_flag" + prodln + "' maxlength='50' value=''  title='' >"+
  "</span>"+

  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HAA_Periods', 'LBL_DESCRIPTION')+"</label>"+
  "<input style=' width:210px;' type='text' name='line_description[" + prodln + "]' id='line_description" + prodln + "' maxlength='50' value='' title=''>"+
  "</span>"+
  "<input type='hidden' name='line_deleted[" + prodln + "]' id='line_deleted" + prodln + "' value='0'>"+
  "<input type='hidden' name='line_period_set[" + prodln + "]' id='line_period_set" + prodln + "' value='0'>"+
  "<input type='hidden' name='line_id[" + prodln + "]' id='line_id" + prodln + "' value=''>"+

  "<input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
  "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>"+

  "</div></td>";
    // console.log(x.innerHTML);
    //加验证

   // validateRequired(prodln);
    // addToValidate('EditView', 'line_period_set'+ prodln,'int', 'true',SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_SET'));
    // addToValidate('EditView', 'line_sort_order'+ prodln,'int', 'true',SUGAR.language.get('HAA_Periods', 'LBL_SORT_ORDER'));
    // addToValidate('EditView', 'line_period_name'+ prodln,'varchar', 'true',SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_NAME'));
    // addToValidate('EditView', 'line_period_year'+ prodln,'int', 'true',SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_YEAR'));
    // addToValidate('EditView', 'line_quarter_num'+ prodln,'int', 'true',SUGAR.language.get('HAA_Periods', 'LBL_QUARTER_NUM'));
    // addToValidate('EditView', 'line_period_num'+ prodln,'int', 'true',SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_NUM'));
    // addToValidate('EditView', 'line_start_date'+ prodln,'date', 'true',SUGAR.language.get('HAA_Periods', 'LBL_START_DATE'));
    // addToValidate('EditView', 'line_end_date'+ prodln,'date', 'true',SUGAR.language.get('HAA_Periods', 'LBL_END_DATE'));
    //addToValidate('EditView', 'enabled_flag'+ prodln,'int', 'true',SUGAR.language.get('HAA_Periods', 'LBL_ENABLED_FLAG'));
    //addToValidate('EditView', 'line_amount'+ prodln,'float', 'true',SUGAR.language.get('HAA_Periods', 'LBL_AMOUNT'));

    renderLine(prodln);
    CalendarShow();
    prodln++;

    return prodln - 1;
  }

  function validateRequired(ln){
    //addToValidate('EditView', 'line_period_set'+ ln,'int', 'true',SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_SET'));
    addToValidate('EditView', 'line_sort_order'+ ln,'int', 'true',SUGAR.language.get('HAA_Periods', 'LBL_SORT_ORDER'));
    addToValidate('EditView', 'line_period_name'+ ln,'varchar', 'true',SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_NAME'));
    addToValidate('EditView', 'line_period_year'+ ln,'int', 'true',SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_YEAR'));
    addToValidate('EditView', 'line_quarter_num'+ ln,'int', 'true',SUGAR.language.get('HAA_Periods', 'LBL_QUARTER_NUM'));
    addToValidate('EditView', 'line_period_num'+ ln,'int', 'true',SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_NUM'));
    addToValidate('EditView', 'line_start_date'+ ln,'date', 'true',SUGAR.language.get('HAA_Periods', 'LBL_START_DATE'));
    addToValidate('EditView', 'line_end_date'+ ln,'date', 'true',SUGAR.language.get('HAA_Periods', 'LBL_END_DATE'));
    addToValidate('EditView', 'line_period_status'+ ln,'varchar', 'true',SUGAR.language.get('HAA_Periods', 'LBL_PERIOD_STATUS'));
    //addToValidate('EditView', 'enabled_flag'+ prodln,'int', 'true',SUGAR.language.get('HAA_Periods', 'LBL_ENABLED_FLAG'));
    //addToValidate('EditView', 'line_amount'+ prodln,'float', 'true',SUGAR.language.get('HAA_Periods', 'LBL_AMOUNT'));

  }

function renderLine(ln) { //将编辑器中的内容显示于正常行中

  $("#displayed_line_sort_order"+ln).html($("#line_sort_order"+ln).val());
  $("#displayed_line_period_name"+ln).html($("#line_period_name"+ln).val());
  $("#displayed_line_period_year"+ln).html($("#line_period_year"+ln).val());
  $("#displayed_line_quarter_num"+ln).html($("#line_quarter_num"+ln).val());
  $("#displayed_line_period_num"+ln).html($("#line_period_num"+ln).val());
  $("#displayed_line_period_status"+ln).val($("#line_period_status"+ln).val());

  $("#displayed_line_start_date"+ln).html($("#line_start_date"+ln).val());
  $("#displayed_line_start_date"+ln).html($("#line_start_date"+ln).val());
  $("#displayed_line_end_date"+ln).html($("#line_end_date"+ln).val());
  var flag=$("#line_enabled_flag"+ln).is(':checked')?"是":"否";
  $("#line_enabled_flag"+ln).val($("#line_enabled_flag"+ln).is(':checked')?"1":"0");
  $("#displayed_line_enabled_flag"+ln).html(flag);
 //$("#displayed_line_enabled_flag"+ln).html($("#line_enabled_flag"+ln).val());
 $("#displayed_line_description"+ln).html($("#line_description"+ln).val());
}

function insertLineFootor(tableid)
{
  tablefooter = document.createElement("tfoot");
  document.getElementById(tableid).appendChild(tablefooter);

  var footer_row=tablefooter.insertRow(-1);
  var footer_cell = footer_row.insertCell(0);

  footer_cell.scope="row";
  footer_cell.colSpan=columnNum;
  footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HAA_Periods', 'LBL_BTN_ADD_LINE')+"' />";
}

function addNewLine(tableid) {
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增
    sort_order_num++;
    insertLineElements(tableid);//加入新行
    LineEditorShow(prodln - 1);       //打开行编辑器
  }
}

// function CalendarShow() {//显示日历
//   //var field_name='#span_'+field.getAttribute("id");
//   //var Datetimepicker=$(field_name);
//   // var dateformat="Y-m-d H:M";
//   // dateformat = dateformat.replace(/Y/,"yyyy");
//   // dateformat = dateformat.replace(/m/,"mm");
//   // dateformat = dateformat.replace(/d/,"dd");
//   // dateformat = dateformat.split(" ",1);
//   var dateformat = "yyyy-mm-dd";
//   $(".calender").datetimepicker({
//    language: 'zh_CN',
//    format: dateformat,
//    showMeridian: true,
//    minView: 2,
//    todayBtn: true,
//    autoclose: true,
//  });
// }

function CheckBoxChang(thisid){//显示日历
  //echo "<script>alert('"+thisid+"')</script>";
  //alter(thisid);
  if ($("#"+thisid).val() == 0){
    $("#"+thisid).val(1);
    $("#"+thisid).attr("checked","checked");
    //$("#"+thisid+ln).val()
  }else{
    $("#"+thisid).val(0);
    $("#"+thisid).attr("checked","unchecked");
    //$("#"+thisid).checked='unchecked';
  };

  //$("#displayed_"+thisid+ln).html($("#"+thisid+ln).val());
}

function CalendarShow(){//显示日历
  var Datetimepicker=$(".calender");
  //var dateformat="Y-m-d H:M";
  var dateformat = "yyyy-mm-dd";
  Datetimepicker.datetimepicker({
    language:'zh_CN',
    format:dateformat,
    showMeridian:true,
    minView:2,
    todayBtn:true,
    autoclose:true,
  });
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
    removeFromValidate('EditView','line_sort_order'+ ln);
    removeFromValidate('EditView','line_period_name'+ ln);
    removeFromValidate('EditView','line_period_year'+ ln);
    removeFromValidate('EditView','line_quarter_num'+ ln);
    removeFromValidate('EditView','line_period_num'+ ln);
    removeFromValidate('EditView','line_start_date'+ ln);
    removeFromValidate('EditView','line_end_date'+ ln);
    removeFromValidate('EditView','line_period_status'+ ln);

  }
  resetLineNum_Bold();

}

function LineEditorShow(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
  validateRequired(ln);
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
      $("#displayed_line_num" + i).text(j);
    }
  }
}

function validatePeriodYear(thisid){
  if($('#'+thisid).val() > 9999 || $('#'+thisid).val() <1900){
    $('#'+thisid).val('');
    $('#validate_'+thisid).show();
  }else{
    $('#validate_'+thisid).hide();
  }

}

function validateQuarterNum(thisid){
  if($('#'+thisid).val() > 4 || $('#'+thisid).val() <1){
    $('#'+thisid).val('');
    $('#validate_'+thisid).show();
  }else{
    $('#validate_'+thisid).hide();
  }

}

function validatePeriodNum(thisid){
  if($('#'+thisid).val() > 12 || $('#'+thisid).val() <1){
    $('#'+thisid).val('');
    $('#validate_'+thisid).show();
  }else{
    $('#validate_'+thisid).hide();
  }

}

function validateStartAndEndDate(thisid,ln){
  var minid = 'line_start_date'+ln;
  var maxid = 'line_end_date'+ln;
  if(!(typeof($('#'+ minid).val()) == "undefined") && !(typeof($('#'+ maxid).val()) == "undefined")){
    if($('#'+minid).val() > $('#'+maxid).val()){
     $('#'+thisid).val('');
     $('#validate_'+thisid).show();
   }else{
     $('#validate_'+thisid).hide();
   }
 }
}

function getPeriodName(ln){
   //$('#line_period_name').val('dsfsdfdsfds');
 
 if(!(typeof($('#line_period_year'+ln).val()) == "undefined") && !(typeof($('#line_period_num'+ln).val()) == "undefined")){
     var name = $('#line_period_year'+ln).val()+'-'+$('#line_period_num'+ln).val();
    $('#line_period_name'+ln).val(name);
 }
}


function onblurLinePeriodYear(thisid,ln){
 validatePeriodYear(thisid);
 getPeriodName(ln);
}

function onblurLinePeriodNum(thisid,ln){
 validatePeriodNum(thisid);
 getPeriodName(ln);
}
