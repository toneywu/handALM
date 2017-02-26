var prodln = 0;
//var sort_order_num = 0;
var columnNum = 10;

var tabNumber=1;//当前页数
var totalPage = 0;//总页数，暂时没有用到
var l_psize=10;//每页显示的行数
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function insertLineHeader(tableid){
  //console.log(234324324324324);
  $("#line_subitems_span").parent().prev().hide();//隐藏SugarCRM字段
 // $("#line_subitems_span").parent().style.width='100%';

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
  j.innerHTML='';
  var j=x.insertCell(9);
  j.innerHTML='&nbsp;';

  var head_html_fy = '<tr class="pagination" role="presentation">'+
  '<td colspan="20" align="right">'+
  '<table width="100%" cellspacing="0" cellpadding="0" border="0">'+
  '<tbody>'+
  '<tr>'+
  '<td align="left"></td>'+
  '<td nowrap="" align="right">'+
  '<input class="button" value="首页" type="button" name="listViewStartButton"   onclick="goPagefist()"/>'+
  '<input class="button" value="上一页" type="button" name="listViewStartButton"   onclick="goPageNumre()"/>'+
  '<span id="pageNumbers" style="font-size:12px;valign: middle;"> <font color="black">(1 - 1 / 总记录条目数： 1)</font></span>'+
  '<input class="button" value="下一页" type="button" name="listViewStartButton"   onclick="goPageNumadd()"/>'+
  '<input class="button" value="末页" type="button" name="listViewStartButton"   onclick="goPagelast()"/>'+

  '</td></tr></tbody></table></td></tr>';
  $("#lineSubItems").append(head_html_fy);

  $('#Line_head').css('backgroundColor','#fff');
  $("#line_subitems_span").parent().css('width','100%');
}
//画分页
function goPageNumre()//上一页
{ 

  tabNumber--;//当前页面-1
  if (tabNumber==0){//如果当前页面减一后=0
    tabNumber=1;
    return false;//返回false，不翻页
  }
  goPage(tabNumber,l_psize);
}
function goPageNumadd()//下一页
{ 
  tabNumber++;
  if (tabNumber==totalPage+1){
    tabNumber--;
    return false;
  }
  goPage(tabNumber,l_psize);
  
}
function goPagefist(){//首页
  tabNumber=1;
  goPage(1,l_psize);
}
function goPagelast(){//末页
  tabNumber=totalPage;//当前页数等于总页数，即跳转到最后一页
  goPage(totalPage,l_psize);
}
 function goPage(pno,psize){//数据分页方法
      var linenum=0;
      var itable = document.getElementById("lineSubItems");//获取数据显示的表格
    var num = itable.rows.length;//表格所有行数(所有记录数)
    /*console.log(num);*/
    //总页数
    var pageSize = psize;//每页显示行数
    var real_num=num-2;
    //总共分几页 
    if(real_num/pageSize > parseInt(real_num/pageSize)){   //获取总页数
      totalPage=parseInt(real_num/pageSize)+1;   
    }else{   
     totalPage=parseInt(real_num/pageSize);   
   }   
    var currentPage = pno;//当前页数
    var startRow = (currentPage - 1) * pageSize+1;//开始显示的行  31 
       var endRow = currentPage * pageSize;//结束显示的行   40
       endRow = (endRow >real_num)? real_num : endRow;    //40
       /*console.log(endRow);*/
       //遍历显示数据实现分页

       for(var i=1;i<(num+1);i++){    //根据起始行和结束行判断需要显示表格的哪几行
        var irow = itable.rows[i-1];
        if (i==1 ||i==2){
          irow.style.display="";//固定显示表格的第1和2行，即表头和翻页按钮
        }
        else if((i-2)>=startRow && (i-2)<=endRow){
          irow.style.display="";    //显示对应的行
        }else{
          irow.style.display="none";//隐藏其他行
        }
      }
      for(var i=2;i<num;i++)
      {
        if(itable.rows[i].style.display=="")
        {
          linenum++;//获取当前页所显示的行数
        }
      }

      var l_pagenum="("+startRow+" - "+endRow+" / 总记录条目数："+linenum+")";
      document.getElementById("pageNumbers").innerHTML=l_pagenum;//替换页数信息
    }

function insertLineData(line_data ){ //将数据写入到对应的行字段中
  var ln = 0;
  if(line_data.id != '0' && line_data.id !== ''){
    //sort_order_num = line_data.max_sort_order;

    ln = insertLineElements("lineSubItems");
    //$("#displayed_line_id".concat(String(ln))).val(line_data.id);
    //$("#displayed_line_payment_name".concat(String(ln))).val(line_data.payment_name);
    //$("#displayed_line_invoice_id".concat(String(ln))).val(line_data.invoice_id);
    $("#displayed_line_invoice_number".concat(String(ln))).html(line_data.invoice_number);
    //$("#disabled_line_sort_order".concat(String(ln))).val(line_data.sort_order);
    $("#displayed_line_invoice_name".concat(String(ln))).html(line_data.invoice_name);
    $("#displayed_line_invoice_date".concat(String(ln))).html(line_data.invoice_date);
    $("#displayed_line_invoice_due_date".concat(String(ln))).html(line_data.invoice_due_date);
    $("#displayed_line_invoice_overdue_days".concat(String(ln))).html(line_data.invoice_overdue_days);
    $("#displayed_line_invoice_unpaid_amount".concat(String(ln))).html(format2Number(line_data.invoice_unpaid_amount,2));
    $("#displayed_line_amount".concat(String(ln))).html(format2Number(line_data.amount,2));
    //$("#displayed_line_amount_usdollar".concat(String(ln))).val(format2Number(line_data.amount_usdollar,2));
    //$("#line_enabled_flag".concat(String(ln))).val(line_data.enabled_flag);
    $("#displayed_line_description".concat(String(ln))).html(line_data.description);

    //renderLine(ln);
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
"<td><span name='displayed_line_description[" + prodln + "]' id='displayed_line_description" + prodln + "'></span></td>"+
"<td><button type='button' style='border-radius:6px;background:#777777;border:0px' class='button' name='displayed_line_remove_but[" + prodln + "]' id='displayed_line_remove_but" + prodln + "' onclick='hiddenLine("+prodln+")'>移除</button></td>";
//"<td><select disabled='disabled' tabindex='116' name='displayed_line_period_status[" + prodln + "]' id='displayed_line_period_status" + prodln + "'>" + line_period_status_option +"</select></td>"+
//"<td><span><input name='displayed_line_enabled_flag[" + prodln + "]' type='checkbox' value='' title='' id='displayed_line_enabled_flag" + prodln + "'  onclick='CheckBoxChang(this.id)'></input></span></td>"+

// "<td><span name='displayed_line_enabled_flag[" + prodln + "]'  value='' title='' id='displayed_line_enabled_flag" + prodln + "' ></span></td>"+

// "<td><span name='displayed_line_description[" + prodln + "]' id='displayed_line_description" + prodln + "'></span></td>"+

    //行编辑区==========================
  // var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  // x.id = 'line_editor' + prodln;
  // x.style = "display:none";

  // var InvDateHTML='<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">'+  
  // '<span class="input_group"><span class="input-group date calender" id="span_line_exp_date'+prodln+'" >'+
  // "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_DATE')+"</label>"+
  // '<input class="date_input" readonly="readonly" autocomplete="off" style="width:180px;"  name="line_invoice_date[' + prodln + ']" id="line_invoice_date' + prodln + '" value="" title="" tabindex="116" type="text" >'+
  // '<span class="input-group-addon">'+
  // '<span class="glyphicon glyphicon-calendar"></span>'+
  // '</span>'+
  // '</span>'+
  // '</span>';

  // var InvDueDateHTML= '<span class="input_group"><span class="input-group date calender" id="span_end_date'+prodln+'" >'+
  // "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_DUE_DATE')+"</label>"+
  // '<input class="date_input" readonly="readonly" autocomplete="off" style="width:180px;" name="line_invoice_due_date[' + prodln + ']" id="line_invoice_due_date' + prodln + '" value="" title="" tabindex="116" type="text" >'+
  // '<span class="input-group-addon">'+
  // '<span class="glyphicon glyphicon-calendar"></span>'+
  // '</span>'+
  // '</span>'+
  // '</span>';

  // x.innerHTML  = "<td colSpan='"+columnNum+"'><div class='lineEditor'>"+

  // "<span class='input_group'>"+
  // "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_NUMBER')+"<span class='required'>*</span></label>"+
  // "<input class='sqsEnabled' autocomplete='off' type='text' style='width:180px;' name='line_invoice_number[" + prodln + "]' id='line_invoice_number" + prodln + "' value='' title='' onblur='resetProduct("+prodln+")' >"+
  // "<input type='hidden' name='line_invoice_id[" + prodln + "]' id='line_invoice_id" + prodln + "' value=''>"+
  // "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openProductPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
  // "</span>"+
  // "<span class='input_group' style='height:44px;'>"+
  // "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_NAME')+"</label>"+
  // "<input readonly='readonly' style=' width:180px;' type='text' name='line_invoice_name[" + prodln + "]' id='line_invoice_name" + prodln + "' maxlength='50' value='' title=''>"+
  // "</span>"+
  // InvDateHTML+
  // InvDueDateHTML+
  // "<span class='input_group'>"+
  // "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_OVERDUE_DAYS')+"</label>"+
  // "<input readonly='readonly' style=' width:180px;' type='text' name='line_invoice_overdue_days[" + prodln + "]' id='line_invoice_overdue_days" + prodln + "' maxlength='50' value='' title=''>"+
  // "</span>"+
  // "<span class='input_group'>"+
  // "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_INVOICE_UNPAID_AMOUNT')+"</label>"+
  // "<input readonly='readonly' style=' width:180px;' type='text' name='line_invoice_unpaid_amount[" + prodln + "]' id='line_invoice_unpaid_amount" + prodln + "' maxlength='50' value='' title='' onpropertychange='validateAmountFormat("+prodln+")'>"+
  // "</span>"+

  // "<span class='input_group'>"+
  // "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_AMOUNT')+" <span class='required'>*</span></label>"+
  // "<input style='width:180px;'  autocomplete='off' type='text' name='line_amount[" + prodln + "]' id='line_amount" + prodln + "' maxlength='50' value='' title='' >"+//onblur='validateAmountFormat("+prodln+")'
  // //"<span style='color:red;font-size:15px;display:none'  type='text' name='validate_line_period_year[" + prodln + "]' id='validate_line_period_year" + prodln + "' maxlength='50'  value='' title=''>限制值在1900-9999之间</span>"+
  // "</span>"+

  

  // "<span class='input_group'>"+
  // "<label>"+SUGAR.language.get('HAOS_Payment_Invoices', 'LBL_DESCRIPTION')+"</label>"+
  // "<input style=' width:210px;' type='text' name='line_description[" + prodln + "]' id='line_description" + prodln + "' maxlength='50' value='' title=''>"+
  // "</span>"+
  // "<input type='hidden' name='line_amount_usdollar[" + prodln + "]' id='line_amount_usdollar" + prodln + "' value=''>"+
  // "<input type='hidden' name='line_deleted[" + prodln + "]' id='line_deleted" + prodln + "' value='0'>"+
  // "<input type='hidden' name='line_payment_name[" + prodln + "]' id='line_payment_name" + prodln + "' value='0'>"+
  // "<input type='hidden' name='line_id[" + prodln + "]' id='line_id" + prodln + "' value=''>"+

  // // "<input type='button' id='line_delete_line" + prodln + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln + ",\"line_\")'>"+
  // // "<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>"+

  // "</div></td>";


  //行编辑区==========================
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

    //renderLine(prodln);
    prodln++;

    return prodln - 1;
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


function hiddenLine(ln){
  $('#line_body'+ln).hide();
}