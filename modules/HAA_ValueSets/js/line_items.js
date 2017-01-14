var prodln=0;
var columnNum=6;
if(typeof sqs_objects=='undefined'){var sqs_objects=new Array;}

function insertLineHeader(tableid){
$("#line_items_label").hide();//隐藏SugarCRM字段

tablehead=document.createElement("thead");
tablehead.id=tableid+"_head";
//tablehead.style.display="none";
document.getElementById(tableid).appendChild(tablehead);

var x=tablehead.insertRow(-1);
x.id='Line_head';
//值集字段隐藏
/*var a=x.insertCell(0);
a.width="25%";
a.innerHTML=SUGAR.language.get('HAA_Values','LBL_FLEX_VALUE_SET');*/
if($("#valueset_type").val() == 'I'){
	var b=x.insertCell(0);
	b.width="30%";
	b.innerHTML=SUGAR.language.get('HAA_Values','LBL_FLEX_VALUE');
	var c=x.insertCell(1);
	c.width="30%";
	c.innerHTML=SUGAR.language.get('HAA_Values','LBL_FLEX_MEANING');
	var d=x.insertCell(2);
	d.width="30%";
	d.innerHTML=SUGAR.language.get('HAA_Values','LBL_DESCRIPTION');
	var e=x.insertCell(3);
	e.width="10%";
	e.innerHTML=SUGAR.language.get('HAA_Values','LBL_ENABLED_FLAG');
}else{
	var a=x.insertCell(0);
	a.width="20%";
	a.innerHTML=SUGAR.language.get('HAA_Values','LBL_PARENT_FLEX_VALUE');
	var b=x.insertCell(1);
	b.width="20%";
	b.innerHTML=SUGAR.language.get('HAA_Values','LBL_FLEX_VALUE');
	var c=x.insertCell(2);
	c.width="20%";
	c.innerHTML=SUGAR.language.get('HAA_Values','LBL_FLEX_MEANING');
	var d=x.insertCell(3);
	d.width="25%";
	d.innerHTML=SUGAR.language.get('HAA_Values','LBL_DESCRIPTION');
	var e=x.insertCell(4);
	e.width="10%";
	e.innerHTML=SUGAR.language.get('HAA_Values','LBL_ENABLED_FLAG');
}
tablebody=document.createElement("tbody");
tablebody.id="lines";
document.getElementById(tableid).appendChild(tablebody);
}


function insertLineData(line_data,current_view){//将数据写入到对应的行字段中  
	var ln=0;
	if(line_data.id!='0'&&line_data.id!==''){
		ln=insertLineElements("lineItems",current_view);

		$("#line_name".concat(String(ln))).val(line_data.l_name);
		$("#line_flex_value_set".concat(String(ln))).val(line_data.h_name);
		$("#line_haa_valuesets_id_c".concat(String(ln))).val(line_data.hid);

		$("#line_parent_flex_value".concat(String(ln))).val(line_data.p_flex_value);
		$("#line_haa_values_id_c".concat(String(ln))).val(line_data.pid);

		$("#line_id".concat(String(ln))).val(line_data.id);

		//$("#displayed_filename_file".concat(String(ln))).html(line_data.file_name);
		$("#line_flex_value".concat(String(ln))).val(line_data.flex_value);
		$("#line_flex_meaning".concat(String(ln))).val(line_data.flex_meaning);
		$("#line_description".concat(String(ln))).val(line_data.description);
		if (line_data.enabled_flag==1) {
			$("#line_enabled_flag".concat(String(ln))).attr('checked',true);
		}
		else{
			$("#line_enabled_flag".concat(String(ln))).attr('checked',false);
		}

		//$("#line_enabled_flag".concat(String(ln))).attr('checked',line_data.enabled_flag==1?true:false);
		$("#line_enabled_flag".concat(String(ln))).val(line_data.enabled_flag);
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
"<td id='displayed_line_parent_flex_value"+prodln+"'></td>"+
"<td id='displayed_line_flex_value"+prodln+"'></td>"+
"<td id='displayed_line_flex_meaning"+prodln+"'></td>"+
"<td id='displayed_line_description"+prodln+"'></td>"+
"<td id='displayed_line_enabled_flag"+prodln+"'></td>";
//console.log("current_view : " +current_view);
if (current_view == "EditView") {//current_view == "EditView"
		z1.innerHTML += "<td><input type='button'value='"+SUGAR.language.get('app_strings','LBL_EDITINLINE')+"'class='button'id='btn_edit_line"+prodln+"'onclick='LineEditorShow("+prodln+")'></td>";
}

var x=tablebody.insertRow(-1);//以下生成的是LineEditor  
x.id='line_editor'+prodln;

/*"<td id='flex_value_set_label'>"+SUGAR.language.get('HAA_Values','LBL_FLEX_VALUE_SET')+":</td>"+
	"<td><input style='width:153px;'type='hidden'name='line_flex_value_set["+prodln+"]'id='line_flex_value_set"+prodln+"'maxlength='50'value=''title=''/>"+
	"<input id='line_haa_valuesets_id_c"+prodln+"' name='line_haa_valuesets_id_c["+prodln+"]' type='hidden' value=''/>"+
	"<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openSetPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_setname' id='btn_clr_setname' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_flex_value_set"+prodln+"\", \"line_haa_valuesets_id_c"+prodln+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+"</td>"+*/
//x.innerHTML="<td colSpan='"+columnNum+"'><table border='0' class='lineEditor' width='100%'>";
var r_html="";
if ($("#valueset_type").val()=='D') {
	r_html = "<tr>"+
	"<td id='parent_flex_value_label'>"+SUGAR.language.get('HAA_Values','LBL_PARENT_FLEX_VALUE')+":</td>"+
	"<td><input style='width:153px;'type='text'name='line_parent_flex_value["+prodln+"]'id='line_parent_flex_value"+prodln+"'maxlength='50'value=''title=''/>"+
	"<input id='line_haa_values_id_c"+prodln+"' name='line_haa_values_id_c["+prodln+"]' type='hidden' value=''/>"+
	"<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openValuePopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
    "<button type='button' name='btn_clr_valuename' id='btn_clr_valuename' tabindex='0' title='清除选择' class='button lastChild' onclick='SUGAR.clearRelateField(this.form, \"line_parent_flex_value"+prodln+"\", \"line_haa_values_id_c"+prodln+"\");' value='清除选择'><img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button>"+"</td>"+
"</tr>";
}

x.innerHTML="<td colSpan='"+columnNum+"'><table border='0' class='lineEditor' width='100%'>"+
r_html+
"<tr>"+
	"<td id='flex_value_label'>"+SUGAR.language.get('HAA_Values','LBL_FLEX_VALUE')+":<span class='required'>*</span></td>"+
	"<td><input style='width:153px;'type='text'name='line_flex_value["+prodln+"]'id='line_flex_value"+prodln+"'maxlength='50'value=''title=''></td>"+
	"<td id='flex_meaning_label'>"+SUGAR.language.get('HAA_Values','LBL_FLEX_MEANING')+":<span class='required'>*</span></td>"+
	"<td><input style='width:153px;'type='text'name='line_flex_meaning["+prodln+"]'id='line_flex_meaning"+prodln+"'maxlength='50'value=''title=''onkeyup='changeName(" + prodln + ");'>"+
	"<input id='line_id"+prodln+"' name='line_id["+prodln+"]' type='hidden' value=''/>"+
	"<input type='hidden'name='line_flex_value_set["+prodln+"]'id='line_flex_value_set"+prodln+"'maxlength='50'value=''title=''/>"+
	"<input id='line_haa_valuesets_id_c"+prodln+"' name='line_haa_valuesets_id_c["+prodln+"]' type='hidden' value=''/>"+
	"<input id='line_name"+prodln+"' name='line_name["+prodln+"]' type='hidden' value=''/></td>"+
"</tr>"+
"<tr>"+
	"<td id='description_label'>"+SUGAR.language.get('HAA_Values','LBL_DESCRIPTION')+":</td>"+
	"<td><input style='width:153px;'type='text'name='line_description["+prodln+"]'id='line_description"+prodln+"'maxlength='50'value=''title=''></td>"+
	"<td id='enabled_flag_label'>"+SUGAR.language.get('HAA_Values','LBL_ENABLED_FLAG')+":<span class='required'>*</span></td>"+
	"<td><input type='hidden' name='line_enabled_flag["+prodln+"]'value='0'title='' >"+
	"<input style='width:153px;'type='checkbox' onclick='changeValue(" + prodln + ");'name='line_enabled_flag["+prodln+"]'id='line_enabled_flag"+prodln+"'maxlength='50'value='1'title='' ></td>"+
"<tr>"+
"<tr>"+
	"<td colSpan='2'><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'>"+
					"<input type='button' id='line_delete_line"+prodln+"' class='button btn_del' value='"+SUGAR.language.get('app_strings','LBL_DELETE_INLINE')+"' tabindex='116' onclick='btnMarkLineDeleted("+prodln+",\"line_\")'>"+
					"<button type='button' id='btn_LineEditorClose"+prodln+"' class='button btn_save' value='"+SUGAR.language.get('app_strings','LBL_CLOSEINLINE')+"' tabindex='116' onclick='LineEditorClose("+prodln+",\"line_\")'>"+SUGAR.language.get('app_strings','LBL_SAVE_BUTTON_LABEL')+"&"+SUGAR.language.get('app_strings','LBL_CLOSEINLINE')+"<img src='themes/default/images/id-ff-clear.png' alt='"+SUGAR.language.get(module_sugar_grp1,'LBL_REMOVE_PRODUCT_LINE')+"'></button>"+
	"</td>"+
	"</tr>"+
"</table></td>";
//addToValidate('EditView','line_flex_value_set'+prodln,'varchar','true',SUGAR.language.get('HAA_Values','LBL_FLEX_VALUE_SET'));
addToValidate('EditView','line_flex_value'+prodln,'varchar','true',SUGAR.language.get('HAA_Values','LBL_FLEX_VALUE'));
addToValidate('EditView','line_flex_meaning'+prodln,'varchar','true',SUGAR.language.get('HAA_Values','LBL_ENABLED_FLAG'));
renderLine(prodln);

prodln++;
return prodln-1;
}

function renderLine(ln){//将编辑器中的内容显示于正常行中
	//$("#displayed_line_flex_value_set"+ln).html($("#line_flex_value_set"+ln).val());
	$("#displayed_line_parent_flex_value"+ln).html($("#line_parent_flex_value"+ln).val());
	$("#displayed_line_flex_value"+ln).html($("#line_flex_value"+ln).val());
	$("#displayed_line_flex_meaning"+ln).html($("#line_flex_meaning"+ln).val());
	$("#displayed_line_description"+ln).html($("#line_description"+ln).val());
	if ($("#line_enabled_flag"+ln).val() == 1) {
		$("#displayed_line_enabled_flag"+ln).html('是');
	}
	else{
		$("#displayed_line_enabled_flag"+ln).html('否');
	}
}

function insertLineFootor(tableid)
{
	tablefooter=document.createElement("tfoot");
	document.getElementById(tableid).appendChild(tablefooter);

	var footer_row=tablefooter.insertRow(-1);
	var footer_cell=footer_row.insertCell(0);

	footer_cell.scope="row";
	footer_cell.colSpan=columnNum;
	footer_cell.innerHTML="<input id='btnAddNewLine'type='button'class='buttonbtn_del'onclick='addNewLine(\""+tableid+"\")'value='+"+SUGAR.language.get('HAA_Values','LBL_NEW_LINE')+"'/>";
}

function addNewLine(tableid){
	
	check_type();
	if(check_form('EditView')){//只有必须填写的字段都填写了才可以新增
		var x = prodln;
		insertLineElements(tableid,'EditView');//加入新行
		$("#line_enabled_flag" + x).attr("checked", true);
		$("#line_flex_value_set" + x).val($("#name").val());
		//console.log($("input[name='record']").val());
		$("#line_haa_valuesets_id_c" + x).val($("input[name='record']").val());
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
removeFromValidate('EditView','line_flex_value'+ln);
removeFromValidate('EditView','line_flex_meaning'+ln);
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

//把flex_meaning的值给name
function changeName(ln){
  $("#line_name"+ln).val($("#line_flex_meaning"+ln).val());
}
//勾选改变时,value改变
function changeValue(ln){
  if ($("#line_enabled_flag"+ln).is(':checked')) {
		$("#line_enabled_flag"+ln).val(1);
		$("#displayed_line_enabled_flag"+ln).html('是');
	}
	else{
		$("#line_enabled_flag"+ln).val(0);
		$("#displayed_line_enabled_flag"+ln).html('否');
	}
	console.log($("#line_enabled_flag"+ln).val());
}


function openValuePopup(ln){
  var popupRequestData = {
    "call_back_function" : "setValueReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_haa_values_id_c"+ln,
      "flex_meaning" : "line_parent_flex_value" + ln,
    }
  };
  var data="&haa_valuesets_id_c_advanced="+$("#haa_valuesets_id_c").val();
  open_popup('HAA_Values', 800, 850,data, true, true, popupRequestData);
}

function setValueReturn(popupReplyData){
  set_return(popupReplyData);
}

/*function openSetPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setSetReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_haa_valuesets_id_c"+ln,
      "name" : "line_flex_value_set" + ln,
    }
  };
  var module_name='&module_name=HAA_ValueSets';
  open_popup('HAA_ValueSets', 800, 850,module_name, true, true, popupRequestData);
}

function setSetReturn(popupReplyData){
  set_return(popupReplyData);
}*/


function resetLineNum_Bold(){//数行号
	var j=0;
	for(var i=0;i<prodln;i++){
		if($("#line_deleted"+i).val()!=1){//跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
			j=j+1;
			$("#displayed_line_num"+i).text(j);
		}
	}
}

