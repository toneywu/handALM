var prodln=0;
var columnNum=6;
if(typeof sqs_objects=='undefined'){var sqs_objects=new Array;}
//$.getScript("custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js");

function insertLineHeader(tableid){
$("#line_items_label").hide();//隐藏SugarCRM字段

tablehead=document.createElement("thead");
tablehead.id=tableid+"_head";
//tablehead.style.display="none";
document.getElementById(tableid).appendChild(tablehead);

var x=tablehead.insertRow(-1);
x.id='Line_head';

/*var a=x.insertCell(0);
a.width="20%";
a.innerHTML=SUGAR.language.get('HAA_SSO_Login_Logs','LBL_SSO_NAME');*/
var b=x.insertCell(0);
b.width="20%";
b.innerHTML=SUGAR.language.get('HAA_SSO_Login_Logs','LBL_SEQ');
var c=x.insertCell(1);
c.width="10%";
c.innerHTML=SUGAR.language.get('HAA_SSO_Login_Logs','LBL_LOGIN_USER_NAME');
var d=x.insertCell(2);
d.width="20%";
d.innerHTML=SUGAR.language.get('HAA_SSO_Login_Logs','LBL_LOGIN_TIME');
var e=x.insertCell(3);
e.width="10%";
e.innerHTML=SUGAR.language.get('HAA_SSO_Login_Logs','LBL_LOGIN_SECS');
var f=x.insertCell(4);
f.width="20%";
f.innerHTML=SUGAR.language.get('HAA_SSO_Login_Logs','LBL_DESCRIPTION');
/*var g=x.insertCell(6);
g.width="20%";
g.innerHTML=SUGAR.language.get('HAA_SSO_Login_Logs','LBL_OPERATE');*/
tablebody=document.createElement("tbody");
tablebody.id="lines";
document.getElementById(tableid).appendChild(tablebody);
}


function insertLineData(line_data,current_view){//将数据写入到对应的行字段中  
	var ln=0;
	if(line_data.id!='0'&&line_data.id!==''){
		ln=insertLineElements("lineItems",current_view);
        $("#line_id".concat(String(ln))).val(line_data.id);
		$("#line_sso_name".concat(String(ln))).val(line_data.sso_name);
		$("#line_haa_ssosets_id_c".concat(String(ln))).val(line_data.haa_ssosets_id_c);
		$("#line_seq".concat(String(ln))).val(line_data.seq);
		$("#line_login_user_name".concat(String(ln))).val(line_data.login_user_name);
        $("#line_user_id_c".concat(String(ln))).val(line_data.user_id_c);
		$("#line_login_secs".concat(String(ln))).val(line_data.login_secs);
		$("#line_login_time".concat(String(ln))).val(line_data.login_time);
        $("#line_description".concat(String(ln))).val(line_data.description);
		
		renderLine(ln);
		$("#line_editor"+ln).hide();
	}
}

function insertLineElements(tableid,current_view){//创建界面要素
//包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面
if(document.getElementById(tableid+'_head')!==null){
	document.getElementById(tableid+'_head').style.display="";
}
tablebody=document.createElement("tbody");
tablebody.id="line_body"+prodln;
document.getElementById(tableid).appendChild(tablebody);


var z1=tablebody.insertRow(-1);
z1.id='line1_displayed'+prodln;
z1.className='oddListRowS1';
z1.innerHTML=
"<td id='displayed_line_seq"+prodln+"'></td>"+
"<td id='displayed_line_login_user_name"+prodln+"'></td>"+
"<td id='displayed_line_login_time"+prodln+"'></td>"+
"<td id='displayed_line_login_secs"+prodln+"'></td>"+
"<td id='displayed_line_description"+prodln+"'></td>";
//console.log("current_view : " +current_view);
if (current_view == "EditView") {//current_view == "EditView"
		z1.innerHTML += "<td><input type='button'value='"+SUGAR.language.get('app_strings','LBL_EDITINLINE')+"'class='button'id='btn_edit_line"+prodln+"'onclick='LineEditorShow("+prodln+")'></td>";
}
/*else{
	z1.innerHTML += "<td><input type='button'value='"+SUGAR.language.get('HAA_SSO_Login_Logs','LBL_CONFIG_LINE')+"'class='button'id='btn_config_line"+prodln+"'onclick='LineConfigEnable("+prodln+")'></td>";
}*/

var x=tablebody.insertRow(-1);//以下生成的是LineEditor  
x.id='line_editor'+prodln;

x.innerHTML="<td colSpan='"+columnNum+"'><table border='0' class='lineEditor' width='100%'>"+
'<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">'+
//'<script type="text/javascript" src="custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>'+
"<tr>"+
	"<td id='seq_label'>"+SUGAR.language.get('HAA_SSO_Login_Logs','LBL_SEQ')+":<span class='required'>*</span></td>"+
	"<td><input style='width:153px;'type='text'name='line_seq["+prodln+"]'id='line_seq"+prodln+"'maxlength='50'value=''title=''>"+
	"<input id='line_id"+prodln+"' name='line_id["+prodln+"]' type='hidden' value=''/>"+
	"<input id='line_name"+prodln+"' name='line_name["+prodln+"]' type='hidden' value=''/>"+
	"<input style='width:153px;'type='hidden'name='line_sso_name["+prodln+"]'id='line_sso_name"+prodln+"'maxlength='50'value=''title=''>"+
	"<input type='hidden'name='line_haa_ssosets_id_c["+prodln+"]'id='line_haa_ssosets_id_c"+prodln+"'maxlength='50'value=''title=''/></td>"+
"</tr>"+
"<tr>"+
	"<td id='login_user_name_label'>"+SUGAR.language.get('HAA_SSO_Login_Logs','LBL_LOGIN_USER_NAME')+":<span class='required'>*</span></td>"+
	"<td><input style='width:153px;'type='text'name='line_login_user_name["+prodln+"]'id='line_login_user_name"+prodln+"'maxlength='50'value=''title=''>"+
	"<input id='line_user_id_c"+prodln+"' name='line_user_id_c["+prodln+"]' type='hidden' value=''/>"+
	"<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openUserPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_valuename' id='btn_clr_valuename' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_login_user_name"+prodln+"\", \"line_user_id_c"+prodln+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+"</td>"+
	"<td id='login_time_label'>"+SUGAR.language.get('HAA_SSO_Login_Logs','LBL_LOGIN_TIME')+":<span class='required'>*</span></td>"+
	"<td><span class='input-group date show_calendar' id='span_line_login_time"+prodln+"'>"+
	"<input class='date_input' autocomplete='off' name='line_login_time["+prodln+"]' id='line_login_time"+prodln+"' value='' title='' tabindex='116' type='text'>"+
	"<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></span></td>"+
"<tr>"+
"<tr>"+
    "<td id='login_secs_label'>"+SUGAR.language.get('HAA_SSO_Login_Logs','LBL_LOGIN_SECS')+":</td>"+
	"<td><input style='width:153px;'type='text'name='line_login_secs["+prodln+"]'id='line_login_secs"+prodln+"'maxlength='50'value=''title=''>"+
	"<td id='description_label'>"+SUGAR.language.get('HAA_SSO_Login_Logs','LBL_DESCRIPTION')+":</td>"+
	"<td><input style='width:153px;'type='text'name='line_description["+prodln+"]'id='line_description"+prodln+"'maxlength='50'value=''title=''></td>"+
"<tr>"+
"<tr>"+
	"<td colSpan='2'><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'>"+
					"<input type='button' id='line_delete_line"+prodln+"' class='button btn_del' value='"+SUGAR.language.get('app_strings','LBL_DELETE_INLINE')+"' tabindex='116' onclick='btnMarkLineDeleted("+prodln+",\"line_\")'>"+
					"<button type='button' id='btn_LineEditorClose"+prodln+"' class='button btn_save' value='"+SUGAR.language.get('app_strings','LBL_CLOSEINLINE')+"' tabindex='116' onclick='LineEditorClose("+prodln+",\"line_\")'>"+SUGAR.language.get('app_strings','LBL_SAVE_BUTTON_LABEL')+"&"+SUGAR.language.get('app_strings','LBL_CLOSEINLINE')+"<img src='themes/default/images/id-ff-clear.png' alt='"+SUGAR.language.get(module_sugar_grp1,'LBL_REMOVE_PRODUCT_LINE')+"'></button>"+
	"</td>"+
	"</tr>"+
"</table></td>";
addToValidate('EditView','line_sso_name'+prodln,'varchar','true',SUGAR.language.get('HAA_SSO_Login_Logs','LBL_SSO_NAME'));
addToValidate('EditView','line_seq'+prodln,'varchar','true',SUGAR.language.get('HAA_SSO_Login_Logs','LBL_SEQ'));
addToValidate('EditView','line_login_user_name'+prodln,'varchar','true',SUGAR.language.get('HAA_SSO_Login_Logs','LBL_LOGIN_USER_NAME'));
addToValidate('EditView','line_login_time'+prodln,'varchar','true',SUGAR.language.get('HAA_SSO_Login_Logs','LBL_LOGIN_TIME'));
//addToValidate('EditView','line_flex_value'+prodln,'varchar','true',SUGAR.language.get('HAA_SSO_Login_Logs','LBL_FLEX_VALUE'));
//addToValidate('EditView','line_flex_meaning'+prodln,'varchar','true',SUGAR.language.get('HAA_SSO_Login_Logs','LBL_ENABLED_FLAG'));
renderLine(prodln);

prodln++;
CalendarShow();
return prodln-1;
}

function renderLine(ln){//将编辑器中的内容显示于正常行中
	//$("#displayed_line_sso_name"+ln).html($("#line_sso_name"+ln).val());
	$("#displayed_line_seq"+ln).html($("#line_seq"+ln).val());
	$("#displayed_line_login_user_name"+ln).html($("#line_login_user_name"+ln).val());
	$("#displayed_line_login_time"+ln).html($("#line_login_time"+ln).val());
	getDisplayLoginTime(ln);
	//$("#displayed_line_login_secs"+ln).html($("#line_login_secs"+ln).val());
	$("#displayed_line_description"+ln).html($("#line_description"+ln).val());
}

function insertLineFootor(tableid)
{
	tablefooter=document.createElement("tfoot");
	document.getElementById(tableid).appendChild(tablefooter);

	var footer_row=tablefooter.insertRow(-1);
	var footer_cell=footer_row.insertCell(0);

	footer_cell.scope="row";
	footer_cell.colSpan=columnNum;
	footer_cell.innerHTML="<input id='btnAddNewLine'type='button'class='buttonbtn_del'onclick='addNewLine(\""+tableid+"\")'value='+"+SUGAR.language.get('HAA_SSO_Login_Logs','LBL_NEW_LINE')+"'/>";
    //不需要新增行的按钮
	footer_cell.innerHTML="";
}

function addNewLine(tableid){
	
	if(check_form('EditView')){//只有必须填写的字段都填写了才可以新增
		var x = prodln;
		insertLineElements(tableid,'EditView');//加入新行
		//$("#line_enabled_flag" + x).attr("checked", true);
		$("#line_sso_name" + x).val($("#name").val());
		//console.log($("input[name='record']").val());
		$("#line_haa_ssosets_id_c" + x).val($("input[name='record']").val());
		LineEditorShow(prodln-1);//打开行编辑器
	}
}

function btnMarkLineDeleted(ln,key){//删除当前行
	if(confirm(SUGAR.language.get('app_strings','NTC_DELETE_CONFIRMATION'))){
		markLineDeleted(ln,key);
		LineEditorClose(ln);
	}else{
		return false;
	}
}
function markLineDeleted(ln,key){//删除当前行

//collapseline;updatedeletedvalue
document.getElementById(key+'body'+ln).style.display='none';
document.getElementById(key+'deleted'+ln).value='1';
document.getElementById(key+'delete_line'+ln).onclick='';
removeFromValidate('EditView','line_sso_name'+ln);
removeFromValidate('EditView','line_seq'+ln);
removeFromValidate('EditView','line_login_user_name'+ln);
removeFromValidate('EditView','line_login_time'+ln);
resetLineNum_Bold();

}

function LineEditorShow(ln){//显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
	if(prodln>1){
		for(vari=0;i<prodln;i++){
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


function CalendarShow(){//显示日历
	//var Datetimepicker=$(".show_calendar");
	//var dateformat="yyyy-mm-dd hh:ii";
	$(".show_calendar").datetimepicker({
		language:'zh_CN',
		format:'yyyy-mm-dd hh:ii:ss',
		showMeridian:true,
		minView:4,
		minuteStep:5,
		todayBtn:true,
		autoclose:true,
	});
}

function getDisplayLoginTime(ln){
	if ($("#line_login_secs" + ln).val() !='') {
		var time = parseInt($("#line_login_secs" + ln).val(),10);
		var h = parseInt(time/3600);
		var m = parseInt((time - h*3600)/60);
		var s = parseInt(time%60);
		var displayed_login_time = h + "时" + m +"分" +s + "秒";
		$("#displayed_line_login_secs"+ln).html(displayed_login_time);
    }
}

function openUserPopup(ln){
  var popupRequestData = {
    "call_back_function" : "setUserReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_user_id_c"+ln,
      "user_name" : "line_login_user_name" + ln,
    }
  };
  var data="&deleted_advanced=0";
  open_popup('Users', 800, 850,data, true, true, popupRequestData);
}

function setUserReturn(popupReplyData){
  set_return(popupReplyData);
}

function resetLineNum_Bold(){//数行号
	var j=0;
	for(var i=0;i<prodln;i++){
		if($("#line_deleted"+i).val()!=1){//跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
			j=j+1;
			$("#displayed_line_num"+i).text(j);
		}
	}
}

/*$(function(){
	function CalendarShow(){//显示日历
		console.log($(".show_calendar"));
		$(".show_calendar").datetimepicker({
			language:'zh_CN',
			format:'yyyy-mm-dd hh:ii',
			showMeridian:true,
			minView:3,
			todayBtn:true,
			autoclose:true,
		});
	}
});*/
