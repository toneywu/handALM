var prodln=0;
var columnNum=6;
if(typeof sqs_objects=='undefined'){var sqs_objects=new Array;}

function insertLineHeader(tableid){
	tablehead=document.createElement("thead");
	tablehead.id=tableid+"_head";
	document.getElementById(tableid).appendChild(tablehead);
	var x=tablehead.insertRow(-1);
	/*x.id='Line_head';
	var a=x.insertCell(0);
	a.width="17%";
	a.innerHTML=SUGAR.language.get('HAA_Menu_Group_Lists','LBL_MENU_GROUP_NAME');*/
	var b=x.insertCell(0);
	b.width="12%";
	b.innerHTML=SUGAR.language.get('HAA_Menu_Group_Lists','LBL_SORT_ORDER');
	var b1=x.insertCell(1);
	b1.width="22%";
	b1.innerHTML=SUGAR.language.get('HAA_Menu_Group_Lists','LBL_MENU_NAME');
	var c=x.insertCell(2);
	c.width="12%";
	c.innerHTML=SUGAR.language.get('HAA_Menu_Group_Lists','LBL_ENABLED_FLAG');
	var d=x.insertCell(3);
	d.width="35%";
	d.innerHTML=SUGAR.language.get('HAA_Menu_Group_Lists','LBL_DESCRIPTION');
	var f=x.insertCell(4);
	f.width="9%";
	f.innerHTML='&nbsp;';
}


function insertLineData(line_data){//将数据写入到对应的行字段中
	var ln=0;
	if(line_data.id!='0'&&line_data.id!==''){
		ln=insertLineElements("lineItems_menus");
		$("#line_id"+ln).val(line_data.id);
		//$("#line_haa_menu_groups_id_c"+ln).val(line_data.haa_menu_groups_id_c);
		//$("#line_menu_group_name"+ln).html(line_data.menu_group_name);
		$("#line_sort_order"+ln).val(line_data.sort_order);
		$("#line_haa_menus_id_c"+ln).val(line_data.haa_menus_id_c);
		$("#line_menu_name"+ln).val(line_data.menu_name);
		$("#line_enabled_flag"+ln).attr("checked",line_data.enabled_flag==1?true:false);
		$("#line_description"+ln).val(line_data.description);
		renderLine(ln);
	}
}

function insertLineElements(tableid){//创建界面要素
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
//"<td><span name='displayed_line_menu_group_name["+prodln+"]'id='displayed_line_menu_group_name"+prodln+"'></span></td>"+
"<td><span name='displayed_line_sort_order["+prodln+"]'id='displayed_line_sort_order"+prodln+"'></span></td>"+
"<td><span name='displayed_line_menu_name["+prodln+"]'id='displayed_line_menu_name"+prodln+"'></span></td>"+
"<td><span name='displayed_line_enabled_flag["+prodln+"]'id='displayed_line_enabled_flag"+prodln+"'></span></td>"+
"<td><span name='displayed_line_description["+prodln+"]'id='displayed_line_description"+prodln+"'></span></td>"+
"<td><input type='button'value='"+SUGAR.language.get('app_strings','LBL_EDITINLINE')+"'class='button'id='btn_edit_line"+prodln+"'onclick='LineEditorShow("+prodln+")'></td>";

var x=tablebody.insertRow(-1);//以下生成的是LineEditor
x.id='line_editor'+prodln;
x.style="display:none";
//var group_name=$("#name").val();
//var group_id=$("input[name='record']").val();
x.innerHTML="<td colSpan='"+columnNum+"'>"+
	"<table border='0' class='lineEditors' width='80%' align='center'>"+
	"<tr>"+
		"<td id='sort_order_label' style='padding-right:30px;text-align:right'>"+SUGAR.language.get('HAA_Menu_Group_Lists','LBL_SORT_ORDER')+":<span class='required'>*</span></td>"+
		"<td><input type='text' id='line_sort_order"+prodln+"' name='line_sort_order["+prodln+"]'maxlength='255' size='24' value=''/></td>"+
		"<td id='menu_name_label' style='padding-right:30px;text-align:right'>"+SUGAR.language.get('HAA_Menu_Group_Lists','LBL_MENU_NAME')+":<span class='required'>*</span></td>"+
		"<td><input type='hidden' id='line_haa_menus_id_c"+prodln+"' name='line_haa_menus_id_c["+prodln+"]' value=''/>"+
		"<input type='text' name='line_menu_name["+prodln+"]' id='line_menu_name"+prodln+"' maxlength='50' size='30' value='' onblur='if(this.form.line_haa_menus_id_c"+prodln+".value==\"\")this.value=\"\";'/>"+
		"<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openMenusPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
		"<button value='清除' onclick='this.form.line_menu_name"+prodln+".value = \"\"; this.form.line_haa_menus_id_c"+prodln+".value = \"\";' class='button lastChild' title='清除[Alt+C]' tabindex='0' id='btn_clr_menus_name' name='btn_clr_menus_name' type='button'>"+
		"<img src='themes/default/images/id-ff-clear.png?v=ehf-FkQ5ENVuqzsrdphKxQ'></button></td>"+
	"</tr>"+
	"<tr>"+
		
		"<td id='line_enabled_flag_label' style='padding-right:30px;text-align:right'>"+SUGAR.language.get('HAA_Menu_Group_Lists','LBL_ENABLED_FLAG')+":<span class='required'>*</span></td>"+
		"<td><input type='hidden' name='line_enabled_flag["+prodln+"]' value='0'/>"+
		"<input type='checkbox' id='line_enabled_flag"+prodln+"' name='line_enabled_flag["+prodln+"]' checked value='1'/></td>"+
		"<td id='description_label' style='padding-right:30px;text-align:right'>"+SUGAR.language.get('HAA_Menu_Group_Lists','LBL_DESCRIPTION')+":</td>"+
		"<td><textarea name='line_description["+prodln+"]'id='line_description"+prodln+"' rows='2' cols='35' ></textarea></td>"+
	"</tr>"+
	"<tr>"+
		"<td colSpan='2'><input type='hidden' id='line_id"+prodln+"' name='line_id["+prodln+"]' value=''/></td>"+
		"<td colSpan='2'><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'>"+
						"<input type='button' id='line_delete_line"+prodln+"' class='button btn_del' value='"+SUGAR.language.get('app_strings','LBL_DELETE_INLINE')+"' tabindex='116' onclick='btnMarkLineDeleted("+prodln+",\"line_\")'>"+
						"<button type='button' id='btn_LineEditorClose"+prodln+"' class='button btn_save' value='"+SUGAR.language.get('app_strings','LBL_CLOSEINLINE')+"' tabindex='116' onclick='LineEditorClose("+prodln+",\"line_\")'>"+SUGAR.language.get('app_strings','LBL_SAVE_BUTTON_LABEL')+"&"+SUGAR.language.get('app_strings','LBL_CLOSEINLINE')+"<img src='themes/default/images/id-ff-clear.png' alt='"+SUGAR.language.get(module_sugar_grp1,'LBL_REMOVE_PRODUCT_LINE')+"'></button>"+
		"</td>"+
		"</tr>"+
	"</table></td>";
	renderLine(prodln);
	addCheckInvalidate(prodln);
	prodln++;
	return prodln-1;
}

function addCheckInvalidate(ln) {
	addToValidate('EditView','line_menu_group_name'+ln,'varchar','true',SUGAR.language.get('HAA_Menu_Group_Lists','LBL_MENU_GROUP_NAME'));
	addToValidate('EditView','line_sort_order'+ln,'varchar','true',SUGAR.language.get('HAA_Menu_Group_Lists','LBL_SORT_ORDER'));
	addToValidate('EditView','line_menu_name'+ln,'varchar','true',SUGAR.language.get('HAA_Menu_Group_Lists','LBL_MENU_NAME'));
}

function renderLine(ln){//将编辑器中的内容显示于正常行中
	//$("#displayed_line_menu_group_name"+ln).html($("#line_menu_group_name"+ln).html());
	$("#displayed_line_sort_order"+ln).html($("#line_sort_order"+ln).val());
	$("#displayed_line_menu_name"+ln).html($("#line_menu_name"+ln).val());
	$("#displayed_line_enabled_flag"+ln).html($("#line_enabled_flag"+ln).is(":checked")?"是":"否");
	$("#displayed_line_description"+ln).html($("#line_description"+ln).val());
}

function insertLineFooter(tableid)
{
	tablefooter=document.createElement("tfoot");
	document.getElementById(tableid).appendChild(tablefooter);
	var footer_row=tablefooter.insertRow(-1);
	var footer_cell=footer_row.insertCell(0);
	footer_cell.scope="row";
	footer_cell.colSpan=columnNum;
	footer_cell.innerHTML="<input id='btnAddNewLine'type='button'class='buttonbtn_del'onclick='addNewLine(\""+tableid+"\")'value='+"+SUGAR.language.get('app_strings','LBL_ADD_BUTTON_TITLE')+"'/>";
}

function addNewLine(tableid){
	if(check_form('EditView')){//只有必须填写的字段都填写了才可以新增
		insertLineElements(tableid);//加入新行
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
	document.getElementById(key+'body'+ln).style.display='none';
	document.getElementById(key+'deleted'+ln).value='1';
	if(typeof validate!="undefined"&&typeof validate['EditView']!="undefined"){
		//removeFromValidate('EditView','line_menu_group_name'+ln);
		removeFromValidate('EditView','line_sort_order'+ln);
		removeFromValidate('EditView','line_menu_name'+ln);
	}
	resetLineNum_Bold();

}

function LineEditorShow(ln){//显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
	if(prodln>1){
		for(var i=0;i<prodln;i++){
			LineEditorClose(i);
		}
	}
	addCheckInvalidate(ln) ;
	$("#line1_displayed"+ln).hide();
	$("#line_editor"+ln).show();

}

function LineEditorClose(ln){//关闭行编辑器（显示为正常行）
	if(check_form('EditView')){
		$("#line_editor"+ln).hide();
		$("#line1_displayed"+ln).show();
		renderLine(ln);
		resetLineNum_Bold();
	}
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

function openMenusPopup(ln){
	lineno=ln;
	var popupRequestData = {
		"call_back_function" : "setMenusGroupReturn",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"id":"line_haa_menus_id_c"+ln,
			"name" : "line_menu_name" + ln,
		}
	};
	open_popup('HAA_Menus', 800, 850, '', true, true, popupRequestData);
}

function setMenusGroupReturn(popupReplyData){
	set_return(popupReplyData);
}

function replace_display_lines(data,span){
	$("#"+span).parent().prev().hide();
	$("#"+span).parent().removeClass("col-sm-8");
	$("#"+span).parent().addClass("col-sm-12");
	$("#line_items_span").replaceWith(data);
}

