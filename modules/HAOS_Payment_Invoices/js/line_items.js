var prodln = 0;
//var sort_order_num = 0;
var columnNum = 9;
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
  a.innerHTML=SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_NUMBER');
  var c=x.insertCell(1);
  c.innerHTML=SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_NAME');
  var b1=x.insertCell(2);
  b1.innerHTML=SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_DATE');
  var d=x.insertCell(3);
  d.innerHTML=SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_DUE_DATE');
  var e=x.insertCell(4);
  e.innerHTML=SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_OVERDUE_DAYS');
  var f=x.insertCell(5);
  f.innerHTML=SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_UNPAID_AMOUNT');   
  var b=x.insertCell(6);
  b.innerHTML=SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_AMOUNT');
  var h=x.insertCell(7);
  h.innerHTML=SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_DESCRIPTION'); 
  var j=x.insertCell(8);
  j.innerHTML='&nbsp;';
}


function insertLineData(line_data ){ //将数据写入到对应的行字段中
  var ln = 0;
  if(line_data.id != '0' && line_data.id !== ''){
    //sort_order_num = line_data.max_sort_order;

    ln = insertLineElements("lineItems");
    $("#line_id".concat(String(ln))).val(line_data.id);
    $("#line_payment_name".concat(String(ln))).val(line_data.payment_name);
    $("#line_invoice_id".concat(String(ln))).val(line_data.invoice_id);
    $("#line_invoice_number".concat(String(ln))).val(line_data.invoice_number);
    //$("#disabled_line_sort_order".concat(String(ln))).val(line_data.sort_order);
    $("#line_invoice_name".concat(String(ln))).val(line_data.invoice_name);
    $("#line_invoice_date".concat(String(ln))).val(line_data.invoice_date);
    $("#line_invoice_due_date".concat(String(ln))).val(line_data.invoice_due_date);
    $("#line_invoice_overdue_days".concat(String(ln))).val(line_data.invoice_overdue_days);
    $("#line_invoice_unpaid_amount".concat(String(ln))).val(format2Number(line_data.invoice_unpaid_amount,2));
    $("#line_amount".concat(String(ln))).val(format2Number(line_data.amount,2));
    $("#line_amount_usdollar".concat(String(ln))).val(format2Number(line_data.amount_usdollar,2));
    //$("#line_enabled_flag".concat(String(ln))).val(line_data.enabled_flag);
    $("#line_description".concat(String(ln))).val(line_data.description);

    renderLine(ln);
  }
}

function insertInvLineData(line_data ){ //将数据写入到对应的行字段中
  var ln = 0;
  //if(line_data.id != '0' && line_data.id !== ''){
    //sort_order_num = line_data.max_sort_order;

    ln = insertLineElements("lineItems");
    $("#line_id".concat(String(ln))).val(line_data.id);
    $("#line_payment_name".concat(String(ln))).val(line_data.payment_name);
    $("#line_invoice_id".concat(String(ln))).val(line_data.invoice_id);
    $("#line_invoice_number".concat(String(ln))).val(line_data.invoice_number);
    //$("#disabled_line_sort_order".concat(String(ln))).val(line_data.sort_order);
    $("#line_invoice_name".concat(String(ln))).val(line_data.invoice_name);
    $("#line_invoice_date".concat(String(ln))).val(line_data.invoice_date);
    $("#line_invoice_due_date".concat(String(ln))).val(line_data.invoice_due_date);
    $("#line_invoice_overdue_days".concat(String(ln))).val(line_data.invoice_overdue_days);
    $("#line_invoice_unpaid_amount".concat(String(ln))).val(format2Number(line_data.invoice_unpaid_amount,2));
    $("#line_amount".concat(String(ln))).val(format2Number(line_data.amount,2));
    $("#line_amount_usdollar".concat(String(ln))).val(format2Number(line_data.amount_usdollar,2));
    //$("#line_enabled_flag".concat(String(ln))).val(line_data.enabled_flag);
    $("#line_description".concat(String(ln))).val(line_data.description);

    renderLine(ln);
  
}

function insertLineElements(tableid) { //创建界面要素
//包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面
if (document.getElementById(tableid + '_head') !== null) {
  document.getElementById(tableid + '_head').style.display = "";
}


sqs_objects["line_number[" + prodln + "]"] = {
  "form": "EditView",
  "method": "query",
  "modules": ["AOS_Invoices"],//值列表来源模块
  "group": "or",
  "field_list": ["number", "id", "name", "invoice_date","due_date","late_days_c","unpaied_amount_c"],//来源模块的字段（不仅仅是数据库表字段）
  "populate_list": ["line_invoice_number[" + prodln + "]", "line_invoice_id[" + prodln + "]","line_invoice_name[" + prodln + "]", "line_invoice_date[" + prodln + "]", "line_invoice_due_date[" + prodln + "]", "line_invoice_overdue_days[" + prodln + "]","line_invoice_unpaid_amount[" + prodln + "]"],//返回当前页面记录的对应字段
  "required_list": ["line_invoice_id[" + prodln + "]"],
  "conditions": [{
    "name": "name",
    "op": "like_custom",
    "end": "%",'begin': '%',
    "value": ""
  }],
  "order": "name",
  "limit": "30",//值列表显示的最大行数
  "post_onblur_function": "resetInvoice(" + prodln + ");",//选择后自动触发的函数
  "no_match_text": "No Match"
};


tablebody = document.createElement("tbody");
tablebody.id = "line_body" + prodln;
document.getElementById(tableid).appendChild(tablebody);



//var line_period_status_option = document.getElementById("period_status_type").value;

var z1 = tablebody.insertRow(-1);
z1.id = 'line1_displayed' + prodln;
z1.className = 'oddListRowS1';
z1.innerHTML  =
"<td><span name='displayed_line_invoice_number[" + prodln + "]' id='displayed_line_invoice_number" + prodln + "'></span></td>" +
"<td><span name='displayed_line_invoice_name[" + prodln + "]' id='displayed_line_invoice_name" + prodln + "'></span></td>" +
"<td><span name='displayed_line_invoice_date[" + prodln + "]' id='displayed_line_invoice_date" + prodln + "'></span></td>" +
"<td><span name='displayed_line_invoice_due_date[" + prodln + "]' id='displayed_line_invoice_due_date" + prodln + "'></span></td>"+
"<td><span name='displayed_line_invoice_overdue_days[" + prodln + "]' id='displayed_line_invoice_overdue_days" + prodln + "'></span></td>"+
"<td><span name='displayed_line_invoice_unpaid_amount[" + prodln + "]' id='displayed_line_invoice_unpaid_amount" + prodln + "'></span></td>" +
"<td><span name='displayed_line_amount[" + prodln + "]' id='displayed_line_amount" + prodln + "'></span></td>" +
"<td><span name='displayed_line_description[" + prodln + "]' id='displayed_line_description" + prodln + "'></span></td>" +
//"<td><select disabled='disabled' tabindex='116' name='displayed_line_period_status[" + prodln + "]' id='displayed_line_period_status" + prodln + "'>" + line_period_status_option +"</select></td>"+
//"<td><span><input name='displayed_line_enabled_flag[" + prodln + "]' type='checkbox' value='' title='' id='displayed_line_enabled_flag" + prodln + "'  onclick='CheckBoxChang(this.id)'></input></span></td>"+

// "<td><span name='displayed_line_enabled_flag[" + prodln + "]'  value='' title='' id='displayed_line_enabled_flag" + prodln + "' ></span></td>"+

// "<td><span name='displayed_line_description[" + prodln + "]' id='displayed_line_description" + prodln + "'></span></td>"+
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

  var InvDateHTML='<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">'+  
  '<span class="input_group"><span class="input-group date calender" id="span_line_exp_date'+prodln+'" >'+
  "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_DATE')+"</label>"+
  '<input class="date_input" readonly="readonly" autocomplete="off" style="width:180px;"  name="line_invoice_date[' + prodln + ']" id="line_invoice_date' + prodln + '" value="" title="" tabindex="116" type="text" >'+
  '<span class="input-group-addon">'+
  '<span class="glyphicon glyphicon-calendar"></span>'+
  '</span>'+
  '</span>'+
  '</span>';

  var InvDueDateHTML= '<span class="input_group"><span class="input-group date calender" id="span_end_date'+prodln+'" >'+
  "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_DUE_DATE')+"</label>"+
  '<input class="date_input" readonly="readonly" autocomplete="off" style="width:180px;" name="line_invoice_due_date[' + prodln + ']" id="line_invoice_due_date' + prodln + '" value="" title="" tabindex="116" type="text" >'+
  '<span class="input-group-addon">'+
  '<span class="glyphicon glyphicon-calendar"></span>'+
  '</span>'+
  '</span>'+
  '</span>';

  x.innerHTML  = "<td colSpan='"+columnNum+"'><div class='lineEditor'>"+

  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_NUMBER')+"<span class='required'>*</span></label>"+
  "<input class='sqsEnabled' autocomplete='off' type='text' style='width:180px;' name='line_invoice_number[" + prodln + "]' id='line_invoice_number" + prodln + "' value='' title='' onblur='resetProduct("+prodln+")' >"+
  "<input type='hidden' name='line_invoice_id[" + prodln + "]' id='line_invoice_id" + prodln + "' value=''>"+
  "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openProductPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  "</span>"+
  "<span class='input_group' style='height:44px;'>"+
  "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_NAME')+"</label>"+
  "<input readonly='readonly' style=' width:180px;' type='text' name='line_invoice_name[" + prodln + "]' id='line_invoice_name" + prodln + "' maxlength='50' value='' title=''>"+
  "</span>"+
  InvDateHTML+
  InvDueDateHTML+
  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_OVERDUE_DAYS')+"</label>"+
  "<input readonly='readonly' style=' width:180px;' type='text' name='line_invoice_overdue_days[" + prodln + "]' id='line_invoice_overdue_days" + prodln + "' maxlength='50' value='' title=''>"+
  "</span>"+
  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_UNPAID_AMOUNT')+"</label>"+
  "<input readonly='readonly' style=' width:180px;' type='text' name='line_invoice_unpaid_amount[" + prodln + "]' id='line_invoice_unpaid_amount" + prodln + "' maxlength='50' value='' title='' >"+
  "</span>"+

  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_AMOUNT')+" <span class='required'>*</span></label>"+
  "<input style='width:180px;'  autocomplete='off' type='text' name='line_amount[" + prodln + "]' id='line_amount" + prodln + "' maxlength='50' value='' title='' onfocus='getDefaultAmount("+prodln+")' onblur='validateLineAmount("+prodln+")'>"+//onblur='validateAmountFormat("+prodln+")'
  "<span style='color:red;font-size:15px;display:none'  type='text' name='validate_line_amount_min[" + prodln + "]' id='validate_line_amount_min" + prodln + "' maxlength='50'  value='' title=''>付款金额必须大于0</span>"+
  "<span style='color:red;font-size:15px;display:none'  type='text' name='validate_line_amount_max[" + prodln + "]' id='validate_line_amount_max" + prodln + "' maxlength='50'  value='' title=''>付款金额必须小于等于发票未付金额</span>"+
  "</span>"+

  

  "<span class='input_group'>"+
  "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_DESCRIPTION')+"</label>"+
  "<input style=' width:210px;' type='text' name='line_description[" + prodln + "]' id='line_description" + prodln + "' maxlength='50' value='' title=''>"+
  "</span>"+
  "<input type='hidden' name='line_amount_usdollar[" + prodln + "]' id='line_amount_usdollar" + prodln + "' value=''>"+
  "<input type='hidden' name='line_deleted[" + prodln + "]' id='line_deleted" + prodln + "' value='0'>"+
  "<input type='hidden' name='line_payment_name[" + prodln + "]' id='line_payment_name" + prodln + "' value='0'>"+
  "<input type='hidden' name='line_id[" + prodln + "]' id='line_id" + prodln + "' value=''>"+

  "<input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
  "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>"+

  "</div></td>";
    // console.log(x.innerHTML);
    //加验证

   // validateRequired(prodln);
    // addToValidate('EditView', 'line_period_set'+ prodln,'int', 'true',SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_PERIOD_SET'));
    // addToValidate('EditView', 'line_sort_order'+ prodln,'int', 'true',SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_SORT_ORDER'));
    // addToValidate('EditView', 'line_period_name'+ prodln,'varchar', 'true',SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_PERIOD_NAME'));
    // addToValidate('EditView', 'line_period_year'+ prodln,'int', 'true',SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_PERIOD_YEAR'));
    // addToValidate('EditView', 'line_quarter_num'+ prodln,'int', 'true',SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_QUARTER_NUM'));
    // addToValidate('EditView', 'line_period_num'+ prodln,'int', 'true',SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_PERIOD_NUM'));
    // addToValidate('EditView', 'line_start_date'+ prodln,'date', 'true',SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_START_DATE'));
    // addToValidate('EditView', 'line_end_date'+ prodln,'date', 'true',SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_END_DATE'));
    //addToValidate('EditView', 'enabled_flag'+ prodln,'int', 'true',SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_ENABLED_FLAG'));
    //addToValidate('EditView', 'line_amount'+ prodln,'float', 'true',SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_AMOUNT'));

    renderLine(prodln);
    CalendarShow();
    prodln++;

    return prodln - 1;
  }

  function validateRequired(ln){

    //addToValidate('EditView', 'line_period_set'+ ln,'int', 'true',SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_PERIOD_SET'));
    //addToValidate('EditView', 'line_payment_name'+ ln,'varchar', 'true',SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_SORT_ORDER'));
    addToValidate('EditView', 'line_invoice_number'+ ln,'int', 'true',SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_NUMBER'));
    addToValidate('EditView', 'line_amount'+ ln,'decimal', 'true',SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_AMOUNT'));
    }

function renderLine(ln) { //将编辑器中的内容显示于正常行中
  $("#displayed_line_payment_name"+ln).html($("#line_payment_name"+ln).val());
  $("#displayed_line_invoice_number"+ln).html($("#line_invoice_number"+ln).val());
  $("#displayed_line_invoice_name"+ln).html($("#line_invoice_name"+ln).val());
  $("#displayed_line_invoice_date"+ln).html($("#line_invoice_date"+ln).val());
  $("#displayed_line_invoice_due_date"+ln).html($("#line_invoice_due_date"+ln).val());
  $("#displayed_line_invoice_overdue_days"+ln).html($("#line_invoice_overdue_days"+ln).val());

  $("#displayed_line_invoice_unpaid_amount"+ln).html($("#line_invoice_unpaid_amount"+ln).val());
  $("#displayed_line_amount"+ln).html($("#line_amount"+ln).val());
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
  footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_BTN_ADD_LINE')+"' />";
}

function addNewLine(tableid) {
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增
    
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
    removeFromValidate('EditView','line_invoice_number'+ ln);
    removeFromValidate('EditView','line_amount'+ ln);
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




var pro_ln=0;
//产品选择按钮的响应函数
function openProductPopup(ln){
  pro_ln=ln;
  var popupRequestData = {
    "call_back_function" : "setProductReturn",//回调函数
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id" : "line_invoice_id" + ln,
      "name" : "line_invoice_name" + ln,
      "number" : "line_invoice_number"+ln,
      "invoice_date" : "line_invoice_date" + ln,
      "due_date" : "line_invoice_due_date" + ln,
      "late_days_c" : "line_invoice_overdue_days" + ln,
      "unpaied_amount_c" : "line_invoice_unpaid_amount" + ln,
    }
  };
  open_popup('AOS_Invoices', 600, 850, '', true, true, popupRequestData);
}

function setProductReturn(popupReplyData){
  var data=popupReplyData["name_to_value_array"]["line_invoice_unpaid_amount"+pro_ln];
  popupReplyData["name_to_value_array"]["line_invoice_unpaid_amount"+pro_ln]=format2Number(data,2);
  set_return(popupReplyData);//标准的POPUP 返回函数
  //resetProduct(lineno);

}
//在用户重新选择产品之后，需要联动更新相关的字段信息
function resetProduct(ln){  
//如果产品字段为空，则将所有关联的字段全部清空
if ($("#line_invoice_number"+ln).val()=== '') { 
    $("#line_invoice_id"+ln).val("");
    $("#line_invoice_name"+ln).val("");
    $("#line_invoice_date"+ln).val("");
    $("#line_invoice_due_date"+ln).val("");
    $("#line_invoice_overdue_days"+ln).val("");
    $("#line_invoice_unpaid_amount"+ln).val("");
  }
  if ($("#line_invoice_unpaid_amount"+ln).val() != '') {
    validateAmountFormat(ln);
  }
 

}

function getDefaultAmount(ln){
  //if($('#line_invoice_unpaid_amount').val()!=''){
    var unpaid_amount = unformatNumber($("#line_invoice_unpaid_amount"+ln).val().trim(),',','.'); 
    var unpaid_amount_num = format2Number(unpaid_amount,2);
    var p_amount = unformatNumber($("#payment_amount").val().trim(),',','.'); 
    var p_amount_num =  format2Number(p_amount,2);
    if(unpaid_amount > p_amount){
      $('#line_amount'+ln).val(p_amount_num);
    }else{
      $('#line_amount'+ln).val(unpaid_amount_num);
    }
  //}
}

function validateLineAmount(ln){
  if(unformatNumber($("#line_amount"+ln).val().trim(),',','.')<=0){
    $("#line_amount"+ln).val('');
    $('#validate_line_amount_min'+ln).show();
  }else{
    $('#validate_line_amount_min'+ln).hide();
  }
  if(unformatNumber($("#line_amount"+ln).val().trim(),',','.')>unformatNumber($("#line_invoice_unpaid_amount"+ln).val().trim(),',','.')){
    $("#line_amount"+ln).val('');
     $('#validate_line_amount_max'+ln).show();
  }else{
    $('#validate_line_amount_max'+ln).hide();
  }

  validateAmountFormat(ln);

}
function validateAmountFormat(ln){
  var line_invoice_unpaid_amount=unformatNumber($("#line_invoice_unpaid_amount"+ln).val().trim(),',','.');
  $("#line_invoice_unpaid_amount"+ln).val(format2Number(line_invoice_unpaid_amount,2));

  var line_amount=unformatNumber($("#line_amount"+ln).val().trim(),',','.');
  $("#line_amount"+ln).val(format2Number(line_amount,2));
}

// function line_caculate(ln) {//行内计算
//   var line_claim_amount=unformatNumber($("#line_claim_amount"+ln).val().trim(),',','.');
//   $("#line_claim_amount"+ln).val(format2Number(line_claim_amount,2));
//   var line_other_side_amount=unformatNumber($("#line_other_side_amount"+ln).val().trim(),',','.');
//   $("#line_other_side_amount"+ln).val(format2Number(line_other_side_amount,2));
//   var line_gap_amount=unformatNumber($("#line_gap_amount"+ln).val().trim(),',','.');
//   $("#line_gap_amount"+ln).val(format2Number(line_gap_amount,2));
//   $("#line_actual_amount"+ln).val(format2Number(line_claim_amount+line_gap_amount,2));
//   $("#line_other_side_act_amt"+ln).val(format2Number(line_other_side_amount-line_gap_amount,2));
// }

function format2Number(str, sig)
{
    if (typeof sig === 'undefined') { sig = sig_digits; }
      num = Number(str);
    if(sig == 2){
        str = formatCurrency(num);
    }
    else{
        str = num.toFixed(sig);
    }

    str = str.split(/,/).join('{,}').split(/\./).join('{.}');
    str = str.split('{,}').join(num_grp_sep).split('{.}').join(dec_sep);

    return str;
}

function unformat2Number(num)
{
    return unformatNumber(num, num_grp_sep, dec_sep);
}

function formatCurrency(strValue)
{
    strValue = strValue.toString().replace(/\$|\,/g,'');
    dblValue = parseFloat(strValue);

    blnSign = (dblValue == (dblValue = Math.abs(dblValue)));
    dblValue = Math.floor(dblValue*100+0.50000000001);
    intCents = dblValue%100;
    strCents = intCents.toString();
    dblValue = Math.floor(dblValue/100).toString();
    if(intCents<10)
        strCents = "0" + strCents;
    for (var i = 0; i < Math.floor((dblValue.length-(1+i))/3); i++)
        dblValue = dblValue.substring(0,dblValue.length-(4*i+3))+','+
            dblValue.substring(dblValue.length-(4*i+3));
    return (((blnSign)?'':'-') + dblValue + '.' + strCents);
}

function formatNumber(n, num_grp_sep, dec_sep, round, precision) {
    if (typeof num_grp_sep == "undefined" || typeof dec_sep == "undefined") {
        return n;
    }
    if(n === 0) n = '0';

    n = n ? n.toString() : "";
    if (n.split) {
        n = n.split(".");
    } else {
        return n;
    }
    if (n.length > 2) {
        return n.join(".");
    }
    if (typeof round != "undefined") {
        if (round > 0 && n.length > 1) {
            n[1] = parseFloat("0." + n[1]);
            n[1] = Math.round(n[1] * Math.pow(10, round)) / Math.pow(10, round);
            n[1] = n[1].toString().split(".")[1];
        }
        if (round <= 0) {
            n[0] = Math.round(parseInt(n[0], 10) * Math.pow(10, round)) / Math.pow(10, round);
            n[1] = "";
        }
    }
    if (typeof precision != "undefined" && precision >= 0) {
        if (n.length > 1 && typeof n[1] != "undefined") {
            n[1] = n[1].substring(0, precision);
        } else {
            n[1] = "";
        }
        if (n[1].length < precision) {
            for (var wp = n[1].length; wp < precision; wp++) {
                n[1] += "0";
            }
        }
    }
    regex = /(\d+)(\d{3})/;
    while (num_grp_sep !== "" && regex.test(n[0])) {
        n[0] = n[0].toString().replace(regex, "$1" + num_grp_sep + "$2");
    }
    return n[0] + (n.length > 1 && n[1] !== "" ? dec_sep + n[1] : "");
}



function replace_display_lines(linesHtml,elementId) {
  var lineItems=document.getElementById(elementId);
  lineItems.innerHTML=linesHtml;
}
