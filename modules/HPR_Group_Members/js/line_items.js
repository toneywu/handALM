var prodln1 = 0;
var columnNum1 = 6;
var lineno;
if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}

function insertLineHeader(tableid){
  $("#line_items1_label").hide();//隐藏SugarCRM字段

  tablehead = document.createElement("thead");
  tablehead.id = tableid +"_head";
  tablehead.style.display="none";
  document.getElementById(tableid).appendChild(tablehead);

  var x=tablehead.insertRow(-1);
  x.id='Line_head';
  var a=x.insertCell(0);
  a.innerHTML=SUGAR.language.get('HPR_Groups', 'LBL_MEM_ORGANIZATION');
  var b=x.insertCell(1);
  b.innerHTML=SUGAR.language.get('HPR_Groups', 'LBL_MEM_USER_NAME');
  var c=x.insertCell(2);
  c.innerHTML=SUGAR.language.get('HPR_Groups', 'LBL_MEM_NAME');
  var b1=x.insertCell(3);
  b1.innerHTML=SUGAR.language.get('HPR_Groups', 'LBL_MEM_ENABLED_FLAG');
  var d=x.insertCell(4);
  d.innerHTML=SUGAR.language.get('HPR_Groups', 'LBL_MEM_DESCRIPTION');
  var f=x.insertCell(5);
  f.innerHTML='&nbsp;';
}


function insertLineData(line_data ){ //将数据写入到对应的行字段中
  var ln = 0;
  if(line_data.id != '0' && line_data.id !== ''){
    ln = insertLineElements("lineItems");
    $("#line_id".concat(String(ln))).val(line_data.id);
    $("#line_organization".concat(String(ln))).val(line_data.account_name);
    $("#line_user_name".concat(String(ln))).val(line_data.last_name);
    $("#line_name".concat(String(ln))).val(line_data.member_name);
    $("#line_enabled_flag".concat(String(ln))).attr('checked',line_data.enabled_flag==1?true:false);
    $("#line_enabled_flag".concat(String(ln))).val(line_data.enabled_flag);
    $("#line_description".concat(String(ln))).val(line_data.description);
    $("#line_account_id_c".concat(String(ln))).val(line_data.account_id_c);
    $("#line_user_id_c".concat(String(ln))).val(line_data.user_id_c);

    renderLine(ln);
  }
}

function insertLineElements(tableid) { //创建界面要素
//包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面
if (document.getElementById(tableid + '_head') !== null) {
  document.getElementById(tableid + '_head').style.display = "";
}

tablebody = document.createElement("tbody");
tablebody.id = "line_body" + prodln1;
document.getElementById(tableid).appendChild(tablebody);

/*var line_item_type_option = document.getElementById("explinetypeidden").value;*/

var z1 = tablebody.insertRow(-1);
z1.id = 'line_displayed' + prodln1;
z1.className = 'oddListRowS1';
z1.innerHTML  =
"<td><span name='displayed_line_organization[" + prodln1 + "]' id='displayed_line_organization" + prodln1 + "'></span></td>" +
//"<td><select disabled='disabled' tabindex='116' name='displayed_line_item_type_code[" + prodln + "]' id='displayed_line_item_type_code" + prodln + "'>" + line_item_type_option +"</select></td>"+
"<td><span name='displayed_line_user_name[" + prodln1 + "]' id='displayed_line_user_name" + prodln1 + "'></span></td>"+
"<td><span name='displayed_line_name[" + prodln1 + "]' id='displayed_line_name" + prodln1 + "'></span></td>"+
"<td><span name='displayed_line_enabled_flag[" + prodln1 + "]' id='displayed_line_enabled_flag" + prodln1 + "'></span></td>"+
"<td><span name='displayed_line_description[" + prodln1 + "]' id='displayed_line_description" + prodln1 + "'></span></td>"+
"<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_edit_line" + prodln1 +"' onclick='LineEditorShow("+prodln1+")'></td>";

  var x = tablebody.insertRow(-1); //以下生成的是Line Editor
  x.id = 'line_editor' + prodln1;
  x.style = "display:none";

   //var expDateHTML='<script type="text/javascript" src="custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>'+
  // '<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">'+
  // '<span class="input-group date" id="span_line_exp_date'+prodln1+'">'+
  // "<label>"+SUGAR.language.get('hie_exp_apply_lines', 'LBL_EXP_DATE')+" <span class='required'>*</span></label>"+
  // '<input class="date_input" autocomplete="off" name="line_exp_date[' + prodln1 + ']" id="line_exp_date' + prodln1 + '" value="" title="" tabindex="116" type="text" onclick="CalendarShow(this)">'+
  // '<span class="input-group-addon">'+
  // '<span class="glyphicon glyphicon-calendar"></span>'+
  // '</span>'+
  // '</span>';

  x.innerHTML  = "<td colSpan='"+columnNum1+"'><table id='member' width='100%'>"+
  "<tr>"+
    "<input name='line_id["+prodln1+"]' id='line_id"+prodln1+"' value='' type='hidden'>"+
    "<td>"+SUGAR.language.get('HPR_Groups', 'LBL_MEM_ORGANIZATION')+"<span class='required'>*</span></td>"+
    "<td><input name='line_organization["+prodln1+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_organization"+prodln1+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'>"+
    "<input name='line_account_id_c["+prodln1+"]' id='line_account_id_c"+prodln1+"' type='hidden' value=''>"+
    "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openOrgPopup(" + prodln1 + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_orgname' id='btn_clr_orgname' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_organization"+prodln1+"\", \"line_account_id_c"+prodln1+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+
    "</td>"+
    "<td>"+SUGAR.language.get('HPR_Groups', 'LBL_MEM_USER_NAME')+"</td>"+
    "<td><input name='line_user_name["+prodln1+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_user_name"+prodln1+"' size='' value='' title='' autocomplete='off' type='text'>"+
    "<input name='line_user_id_c["+prodln1+"]' id='line_user_id_c"+prodln1+"' type='hidden' value=''>"+
    "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openUserNamePopup(" + prodln1 + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_username' id='btn_clr_username' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_user_name"+prodln1+"\", \"line_user_id_c"+prodln1+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+
    "</td>"+
  "</tr>"+
  "<tr>"+
    "<td>"+SUGAR.language.get('HPR_Groups', 'LBL_MEM_NAME')+"<span class='required'>*</span></td>"+
    "<td><input name='line_name["+prodln1+"]' class='sqsEnabled yui-ac-input' tabindex='0' id='line_name"+prodln1+"' size='' value='' title='' autocomplete='off' accesskey='7' type='text'></td>"+
    "<td>"+SUGAR.language.get('HPR_Groups', 'LBL_MEM_ENABLED_FLAG')+"<span class='required'>*</span></td>"+
    "<input type='hidden' name='line_enabled_flag["+prodln1+"]' value='0'> "+
    "<td><input name='line_enabled_flag["+prodln1+"]' id='line_enabled_flag"+prodln1+"' title='' value='1' type='checkbox' checked></td>"+
  "</tr>"+
  "<tr>"+
    "<td>"+SUGAR.language.get('HPR_Groups', 'LBL_MEM_DESCRIPTION')+"</td>"+
    "<td><textarea id='line_description"+prodln1+"' name='line_description["+prodln1+"]' rows='2' cols='50' title='' tabindex='0' style='overflow: hidden;'></textarea></td>"+
    "<td><input type='hidden' id='line_deleted"+prodln1+"' name='line_deleted["+prodln1+"]' value='0'></td>"+
    "<td><input type='button' id='line_delete_line" + prodln1 + "' class='button btn_del' value='" + SUGAR.language.get('app_strings', 'LBL_DELETE_INLINE') + "' tabindex='116' onclick='btnMarkLineDeleted(" + prodln1 + ",\"line_\")'>"+
     "<button type='button' id='btn_LineEditorClose" + prodln1 + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln1 + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button></td>"+
  "</tr>"+
  "</table></td>";
    // console.log(x.innerHTML);
    addToValidate('EditView', 'line_account_id_c'+ prodln1,'id', 'true',SUGAR.language.get('HPR_Groups', 'LBL_MEM_ORGANIZATION'));
    //addToValidate('EditView', 'line_user_name'+ prodln1,'varchar', 'true',SUGAR.language.get('HPR_Groups', 'LBL_MEM_ORGANIZATION'));
    addToValidate('EditView', 'line_name'+ prodln1,'varchar', 'true',SUGAR.language.get('HPR_Groups', 'LBL_MEM_NAME'));
    addToValidate('EditView', 'line_enabled_flag'+ prodln1,'bool', 'true',SUGAR.language.get('HPR_Groups', 'LBL_MEM_ENABLED_FLAG'));
    //addToValidate('EditView', 'line_amount'+ prodln1,'float', 'true',SUGAR.language.get('hie_exp_apply_lines', 'LBL_AMOUNT'));

    clr_value('#line_organization','#line_account_id_c',prodln1);
    clr_value('#line_user_name','#line_user_id_c',prodln1);

    renderLine(prodln1);
    prodln1++;
    return prodln1 - 1;
  }

function renderLine(ln) { //将编辑器中的内容显示于正常行中
  $("#displayed_line_organization"+ln).html($("#line_organization"+ln).val());
  $("#displayed_line_user_name"+ln).html($("#line_user_name"+ln).val());
  $("#displayed_line_name"+ln).html($("#line_name"+ln).val());
  var flag=$("#line_enabled_flag"+ln).is(':checked')?"是":"否";
  $("#line_enabled_flag"+ln).html(flag);
  $("#displayed_line_enabled_flag"+ln).html(flag);
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
  footer_cell.innerHTML="<input id='btnAddNewLine' type='button' class='button btn_del' onclick='addNewLine(\"" +tableid+ "\")' value='+ "+SUGAR.language.get('HPR_Groups', 'LBL_BTN_ADD_LINE')+"' />";
}

function addNewLine(tableid) {
  if (check_form('EditView')) {//只有必须填写的字段都填写了才可以新增
    insertLineElements(tableid);//加入新行
    LineEditorShow(prodln1-1);       //打开行编辑器
  }
}

// function CalendarShow(field) {//显示日历
//   var field_name='#span_'+field.getAttribute("id");
//   var Datetimepicker=$(field_name);
//   var dateformat="Y-m-d H:M";
//   dateformat = dateformat.replace(/Y/,"yyyy");
//   dateformat = dateformat.replace(/m/,"mm");
//   dateformat = dateformat.replace(/d/,"dd");
//   dateformat = dateformat.split(" ",1);
//   Datetimepicker.datetimepicker({
//    language: 'zh_CN',
//    format: dateformat[0],
//    showMeridian: true,
//    minView: 2,
//    todayBtn: true,
//    autoclose: true,
//  });
// }

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
    removeFromValidate('EditView','line_account_id_c'+ ln);
    //removeFromValidate('EditView','line_user_id_c'+ ln);
    removeFromValidate('EditView','line_name'+ ln);
    removeFromValidate('EditView','line_enabled_flag'+ ln);
   // removeFromValidate('EditView','line_amount'+ ln);
  }
  resetLineNum_Bold();

}

function LineEditorShow(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
  validate(ln);
  if (prodln1>1) {
    for (var i=0;i<prodln1;i++) {
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
    /*var data = new Array;
    data['module']=$("input[name='module']").val();
    data['record']=$("input[name='record']").val();
    data['return_module']=$("input[name='return_module']").val();
    data['relate_to']=$("input[name='relate_to']").val();
    data['offset']=$("input[name='offset']").val();
    data['line_organization'][ln]=$("#line_organization"+ln).val();
    data['line_account_id_c'][ln]=$("#line_account_id_c"+ln).val();
    data['line_user_name'][ln]=$("#line_user_name"+ln).val();
    data['line_user_id_c'][ln]=$("#line_user_id_c"+ln).val();
    data['line_name'][ln]=$("#line_name"+ln).val();
    data['line_enabled_flag'][ln]=$("#line_enabled_flag"+ln).is("checked")?'1':'0';
    data['line_description'][ln]=$("#line_description"+ln).val();
    data['line_deleted'][ln]=$("#line_deleted"+ln).val();
    console.log(data);*/
    /*$.ajax({
      type:"POST",
      url:'index.php',
      data:data,
      success:function(){

      }
    });*/
  }
}

function resetLineNum_Bold() {//数行号
  var j=0;
  for (var i=0;i<prodln1;i++) {
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
      "name" : "line_organization" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  var frame='&frame_c_advanced='+$("#frameworks").val();
  open_popup('Accounts', 800, 850,frame, true, true, popupRequestData);//frame_c_advanced=frameworks
}

function setOrgReturn(popupReplyData){
  set_return(popupReplyData);
  setDefaultMemberName(lineno);
}

function openUserNamePopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setUserNameReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_user_id_c"+ln,
      "name" : "line_user_name" + ln,
      //"insurance_type":"line_insurance_type"+ln,
    }
  };
  var contact='&contact_organization_c_advanced='+$("#line_organization"+ln).val();
  open_popup('Users', 800, 850, contact, true, true, popupRequestData);
}

function setUserNameReturn(popupReplyData){
  set_return(popupReplyData);
  setDefaultMemberName(lineno);
}

/*function clrOrgName(ln){

  var clr='';
  $("#line_organization"+ln).val(clr);
  $("#line_account_id_c"+ln).val(clr);
}*/

/*function clrUserName(ln){

  var clr='';
  $("#line_user_name"+ln).val(clr);
  $("#line_user_id_c"+ln).val(clr);
}*/

function validate(ln){
  addToValidate('EditView', 'line_account_id_c'+ prodln1,'id', 'true',SUGAR.language.get('HPR_Groups', 'LBL_MEM_ORGANIZATION'));
  //addToValidate('EditView', 'line_user_name'+ prodln1,'varchar', 'true',SUGAR.language.get('HPR_Groups', 'LBL_MEM_ORGANIZATION'));
  addToValidate('EditView', 'line_name'+ prodln1,'varchar', 'true',SUGAR.language.get('HPR_Groups', 'LBL_MEM_NAME'));
  addToValidate('EditView', 'line_enabled_flag'+ prodln1,'bool', 'true',SUGAR.language.get('HPR_Groups', 'LBL_MEM_ENABLED_FLAG'));
}

function setDefaultMemberName(ln){
  var members_name=$("#line_organization"+ln).val();
  if ($("#line_user_name"+ln).val()) {
   members_name=$("#line_user_name"+ln).val();
  }
  $("#line_name"+ln).val(members_name);
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