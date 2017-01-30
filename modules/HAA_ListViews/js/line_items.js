var prodln=0;
var columnNum=6;
var columList = "";
var count=0;
if(typeof sqs_objects=='undefined'){var sqs_objects=new Array;}

$(document).ready(function(){
	
/*var t_name = $("#data_source_view_name").val();
if (t_name !="") {
    var record=$("input[name='record']").val();
    $.ajax({
			url:"index.php?module=HAA_ListViews&action=set_column_list&to_pdf=true",
			data:"&t_name="+t_name+"&record="+record,
			async:false,
			type:"POST",//PUT
			success:function(result){
				if (result !="") {
					var list = $.parseJSON(result);
					$("#sort_column1").after("<select id='s_sort_column1' name='s_sort_column1' title='' onchange='changeColumn1();'> "+ list[0] + " </select>");
					$("#sort_column2").after("<select id='s_sort_column2' name='s_sort_column2' title='' onchange='changeColumn2();'> "+ list[0] + " </select>");
					$("#sort_column3").after("<select id='s_sort_column3' name='s_sort_column3' title='' onchange='changeColumn3();'> "+ list[0] + " </select>");
					$("#sort_column4").after("<select id='s_sort_column4' name='s_sort_column4' title='' onchange='changeColumn4();'> "+ list[0] + " </select>");
					$("#s_sort_column1").val(list[1]);
					$("#s_sort_column2").val(list[2]);
					$("#s_sort_column3").val(list[3]);
					$("#s_sort_column4").val(list[4]);
					columList = list[0];
				}
			}

	});
}*/
if (columList =="") {
	//console.log("-------------------------------------11111" + $("#linecolumnhidden").val());
	columList = $("#linecolumnhidden").val();
}
$("#sort_column1").after("<select id='s_sort_column1' name='s_sort_column1' title='' onchange='changeColumn1();'> "+ columList + " </select>");
$("#sort_column2").after("<select id='s_sort_column2' name='s_sort_column2' title='' onchange='changeColumn2();'> "+ columList + " </select>");
$("#sort_column3").after("<select id='s_sort_column3' name='s_sort_column3' title='' onchange='changeColumn3();'> "+ columList + " </select>");
$("#sort_column4").after("<select id='s_sort_column4' name='s_sort_column4' title='' onchange='changeColumn4();'> "+ columList + " </select>");
$("#s_sort_column1").val($("#sort_column1").val());
$("#s_sort_column2").val($("#sort_column2").val());
$("#s_sort_column3").val($("#sort_column3").val());
$("#s_sort_column4").val($("#sort_column4").val());

  $("#data_source_view_name").change(function(){
		var t_name=$(this).val();
		console.log("change");
		if (t_name=="") { 
			var null_list = "<option value=''> </option>";
			$("#s_sort_column1").replaceWith("<select id='s_sort_column1' name='s_sort_column1' title='' onchange='changeColumn1();> "+ null_list + " </select>");
			$("#s_sort_column2").replaceWith("<select id='s_sort_column2' name='s_sort_column2' title='' onchange='changeColumn2();> "+ null_list + " </select>");
			$("#s_sort_column3").replaceWith("<select id='s_sort_column3' name='s_sort_column3' title='' onchange='changeColumn3();> "+ null_list + " </select>");
			$("#s_sort_column4").replaceWith("<select id='s_sort_column4' name='s_sort_column4' title='' onchange='changeColumn4();> "+ null_list + " </select>");
			columList = null_list;
			return false;
		}
		$.ajax({
			url:"index.php?module=HAA_ListViews&action=set_column_list&to_pdf=true",
			data:"&t_name="+t_name,
			type:"POST",//PUT
			success:function(result){
				if (result !="") {
					var list = $.parseJSON(result);
					$("#s_sort_column1").replaceWith("<select id='s_sort_column1' name='s_sort_column1' title='' onchange='changeColumn1();> "+ list[0] + " </select>");
					$("#s_sort_column2").replaceWith("<select id='s_sort_column2' name='s_sort_column2' title='' onchange='changeColumn2();> "+ list[0] + " </select>");
					$("#s_sort_column3").replaceWith("<select id='s_sort_column3' name='s_sort_column3' title='' onchange='changeColumn3();> "+ list[0] + " </select>");
					$("#s_sort_column4").replaceWith("<select id='s_sort_column4' name='s_sort_column4' title='' onchange='changeColumn4();> "+ list[0] + " </select>");
					columList = list[0];
				}
			}

		});
    });
});

function insertLineHeader(tableid){
	$("#line_items_label").hide();//隐藏SugarCRM字段

	tablehead=document.createElement("thead");
	tablehead.id=tableid+"_head";
	//tablehead.style.display="none";
	document.getElementById(tableid).appendChild(tablehead);

	var x=tablehead.insertRow(-1);
	x.id='Line_head';

	var a=x.insertCell(0);
	a.width="10%";
	a.innerHTML=SUGAR.language.get('HAA_ListView_Columns','LBL_SORT_ORDER');
	var b=x.insertCell(1);
	b.width="10%";
	b.innerHTML=SUGAR.language.get('HAA_ListView_Columns','LBL_COLUMN_NAME');
	var c=x.insertCell(2);
	c.width="10%";
	c.innerHTML=SUGAR.language.get('HAA_ListView_Columns','LBL_FIELD_LABLE_ZHS');
	var d=x.insertCell(3);
	d.width="10%";
	d.innerHTML=SUGAR.language.get('HAA_ListView_Columns','LBL_DISPLAY_TYPE_CODE');
	var e=x.insertCell(4);
	e.width="10%";
	e.innerHTML=SUGAR.language.get('HAA_ListView_Columns','LBL_DISPLAY_HSIZE');
	var f=x.insertCell(5);
	f.width="10%";
	f.innerHTML=SUGAR.language.get('HAA_ListView_Columns','LBL_POPUP_VISIBLE_FLAG');
	var g=x.insertCell(6);
	g.width="10%";
	g.innerHTML=SUGAR.language.get('HAA_ListView_Columns','LBL_DASHLET_VISIBLE_FLAG');
	var h=x.insertCell(7);
	h.width="10%";
	h.innerHTML=SUGAR.language.get('HAA_ListView_Columns','LBL_QUERY_ALLOWED_FLAG');
	var i=x.insertCell(8);
	i.width="10%";
	i.innerHTML=SUGAR.language.get('HAA_ListView_Columns','LBL_VALUE_RETURN_FLAG');
	/*ar j=x.insertCell(9);
	j.width="10%";
	j.innerHTML=SUGAR.language.get('HAA_ListView_Columns','LBL_HEADER_ALIGNMENT_CODE');
	var k=x.insertCell(10);
	k.width="10%";
	k.innerHTML=SUGAR.language.get('HAA_ListView_Columns','LBL_CELL_ALIGNMENT_CODE');*/
	var l=x.insertCell(9);
	l.width="10%";
	l.innerHTML=SUGAR.language.get('HAA_ListView_Columns','LBL_ENABLED_FLAG');


	tablebody=document.createElement("tbody");
	tablebody.id="lines";
	document.getElementById(tableid).appendChild(tablebody);
}

function insertLineData(line_data,current_view){//将数据写入到对应的行字段中  
	var ln=0;
	if(line_data.id!='0'&&line_data.id!==''){
	
		if (columList =="") {
			//console.log("-------------------------------------11111" + $("#linecolumnhidden").val());
	        columList = $("#linecolumnhidden").val();
	    }
		ln=insertLineElements("lineItems",current_view);

        $("#line_id".concat(String(ln))).val(line_data.id);
		$("#line_name".concat(String(ln))).val(line_data.c_name);
		$("#line_haa_listviews_name".concat(String(ln))).val(line_data.v_name);
		$("#line_haa_listviews_id_c".concat(String(ln))).val(line_data.haa_listviews_id_c);
		$("#line_sort_order".concat(String(ln))).val(line_data.sort_order);
		//$("#line_sort_order".concat(String(ln))).after(line_data.sort_order);
		$("#line_column_name".concat(String(ln))).val(line_data.column_name);
		$("#line_field_lable_zhs".concat(String(ln))).val(line_data.field_lable_zhs);
		$("#line_field_lable_us".concat(String(ln))).val(line_data.field_lable_us);
		$("#line_display_type_code".concat(String(ln))).val(line_data.display_type_code);
		$("#line_display_hsize".concat(String(ln))).val(line_data.display_hsize);
		changeDisplayType(ln);
		$("#line_link_module".concat(String(ln))).val(line_data.link_module);
		$("#line_link_id_column".concat(String(ln))).val(line_data.link_id_column);
		$("#line_popup_visible_flag".concat(String(ln))).val(line_data.popup_visible_flag);
		$("#line_dashlet_visible_flag".concat(String(ln))).val(line_data.dashlet_visible_flag);
		$("#line_query_allowed_flag".concat(String(ln))).val(line_data.query_allowed_flag);
		$("#line_value_return_flag".concat(String(ln))).val(line_data.value_return_flag);
		$("#line_header_alignment_code".concat(String(ln))).val(line_data.header_alignment_code);
		$("#line_cell_alignment_code".concat(String(ln))).val(line_data.cell_alignment_code);
		$("#line_enabled_flag".concat(String(ln))).val(line_data.enabled_flag);
		$("#line_description".concat(String(ln))).val(line_data.description);

		$("#line_enabled_flag".concat(String(ln))).attr('checked',line_data.enabled_flag==1?true:false);
		$("#line_query_allowed_flag".concat(String(ln))).attr('checked',line_data.query_allowed_flag==1?true:false);
		$("#line_value_return_flag".concat(String(ln))).attr('checked',line_data.value_return_flag==1?true:false);
		$("#line_dashlet_visible_flag".concat(String(ln))).attr('checked',line_data.dashlet_visible_flag==1?true:false);
		$("#line_popup_visible_flag".concat(String(ln))).attr('checked',line_data.popup_visible_flag==1?true:false);
        
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

var line_item_alignment_option = $("#linealignhidden").val();

var z1=tablebody.insertRow(-1);
z1.id='line1_displayed'+prodln;
z1.className='oddListRowS1';
/*"<td id='displayed_line_header_alignment_code"+prodln+"'></td>"+
"<td id='displayed_line_cell_alignment_code"+prodln+"'></td>"+*/
z1.innerHTML=
"<td id='displayed_line_sort_order"+prodln+"'></td>"+
"<td id='displayed_line_column_name"+prodln+"'></td>"+
"<td id='displayed_line_field_lable_zhs"+prodln+"'></td>"+
"<td id='displayed_line_display_type_code"+prodln+"'></td>"+
"<td id='displayed_line_display_hsize"+prodln+"'></td>"+
"<td id='displayed_line_popup_visible_flag"+prodln+"'></td>"+
"<td id='displayed_line_dashlet_visible_flag"+prodln+"'></td>"+
"<td id='displayed_line_query_allowed_flag"+prodln+"'></td>"+
"<td id='displayed_line_value_return_flag"+prodln+"'></td>"+
"<td id='displayed_line_enabled_flag"+prodln+"'></td>";
//console.log("current_view : " +current_view);
if (current_view == "EditView") {//current_view == "EditView"
		z1.innerHTML += "<td><input type='button'value='"+SUGAR.language.get('app_strings','LBL_EDITINLINE')+"'class='button'id='btn_edit_line"+prodln+"'onclick='LineEditorShow("+prodln+")'></td>";
}

var x=tablebody.insertRow(-1);//以下生成的是LineEditor  
x.id='line_editor'+prodln;

x.innerHTML="<td colSpan='"+columnNum+"'><table border='0' class='lineEditor' width='100%'>"+
"<tr>"+
	"<td id='sort_order_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_SORT_ORDER')+":<span class='required'>*</span></td>"+
	"<td><input style='width:153px;'type='text'name='line_sort_order["+prodln+"]'id='line_sort_order"+prodln+"'maxlength='50'onchange='checkSortOrder(" + prodln + ");'value=''title=''/>"+
	"<input id='line_haa_listviews_id_c"+prodln+"' name='line_haa_listviews_id_c["+prodln+"]' type='hidden' value=''/>"+
	"<input id='line_id"+prodln+"' name='line_id["+prodln+"]' type='hidden' value=''/>"+
	"<input type='hidden'name='line_v_name["+prodln+"]'id='line_v_name"+prodln+"'maxlength='50'value=''title=''/>"+
	"<input id='line_name"+prodln+"' name='line_name["+prodln+"]' type='hidden' value=''/></td>"+
	"<td id='column_name_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_COLUMN_NAME')+":<span class='required'>*</span></td>"+
	"<td><select id='line_column_name"+prodln+"' name='line_column_name["+prodln+"]' title=''>"+columList+"</select></td>"+
"</tr>"+
"<tr>"+
	"<td id='field_lable_zhs_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_FIELD_LABLE_ZHS')+":<span class='required'>*</span></td>"+
	"<td><input style='width:153px;'type='text'name='line_field_lable_zhs["+prodln+"]'id='line_field_lable_zhs"+prodln+"'maxlength='50'value=''title=''></td>"+
	"<td id='field_lable_us_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_FIELD_LABLE_US')+":</td>"+
	"<td><input style='width:153px;'type='text'name='line_field_lable_us["+prodln+"]'id='line_field_lable_us"+prodln+"'maxlength='50'value=''title=''></td>"+
"</tr>"+
"<tr>"+
	"<td id='display_type_code_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_DISPLAY_TYPE_CODE')+":<span class='required'>*</span></td>"+
	"<td><select id='line_display_type_code"+prodln+"' name='line_display_type_code["+prodln+"]' title='' onchange='changeDisplayType("+prodln+");'>"+
	  "<option value='TXT'>文本</option>"+
	  "<option value='CHK'>复选框</option>"+
	  "<option value='LNK'>超链接</option>"+
	  "</select></td>"+
	"<td id='display_hsize_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_DISPLAY_HSIZE')+":<span class='required'>*</span></td>"+
	"<td><input style='width:153px;'type='text'name='line_display_hsize["+prodln+"]'id='line_display_hsize"+prodln+"'maxlength='50'value=''title=''onchange='checkDisplayHsize("+prodln+");'></td>"+
"</tr>"+
"<tr>"+
	"<td id='popup_visible_flag_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_POPUP_VISIBLE_FLAG')+":<span class='required'>*</span></td>"+
	"<td><input type='hidden' name='line_popup_visible_flag["+prodln+"]'value='0'title='' >"+
	"<input style='width:153px;'type='checkbox' onclick='changePopupFlag(" + prodln + ");'name='line_popup_visible_flag["+prodln+"]'id='line_popup_visible_flag"+prodln+"'maxlength='50'value='1'title='' ></td>"+
	"<td id='dashlet_visible_flag_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_DASHLET_VISIBLE_FLAG')+":<span class='required'>*</span></td>"+
	"<td><input type='hidden' name='line_dashlet_visible_flag["+prodln+"]'value='0'title='' >"+
	"<input style='width:153px;'type='checkbox' onclick='changeDashletFlag(" + prodln + ");'name='line_dashlet_visible_flag["+prodln+"]'id='line_dashlet_visible_flag"+prodln+"'maxlength='50'value='1'title='' ></td>"+
"</tr>"+
"<tr>"+
	"<td id='query_allowed_flag_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_QUERY_ALLOWED_FLAG')+":<span class='required'>*</span></td>"+
	"<td><input type='hidden' name='line_query_allowed_flag["+prodln+"]'value='0'title='' >"+
	"<input style='width:153px;'type='checkbox' onclick='changeQueryFlag(" + prodln + ");'name='line_query_allowed_flag["+prodln+"]'id='line_query_allowed_flag"+prodln+"'maxlength='50'value='0'title='' ></td>"+
	"<td id='value_return_flag_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_VALUE_RETURN_FLAG')+":<span class='required'>*</span></td>"+
	"<td><input type='hidden' name='line_value_return_flag["+prodln+"]'value='0'title='' >"+
	"<input style='width:153px;'type='checkbox' onclick='changeValueFlag(" + prodln + ");'name='line_value_return_flag["+prodln+"]'id='line_value_return_flag"+prodln+"'maxlength='50'value='0'title='' ></td>"+
"</tr>"+
"<tr>"+
	"<td id='header_alignment_code_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_HEADER_ALIGNMENT_CODE')+":<span class='required'>*</span></td>"+
	"<td><select id='line_header_alignment_code"+prodln+"' name='line_header_alignment_code["+prodln+"]' title=''>"+line_item_alignment_option+"</td>"+
	"<td id='cell_alignment_code_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_CELL_ALIGNMENT_CODE')+":</td>"+
	"<td><select id='line_cell_alignment_code"+prodln+"' name='line_cell_alignment_code["+prodln+"]' title=''>"+line_item_alignment_option+"</td>"+
"</tr>"+
"<tr>"+
	"<td id='description_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_DESCRIPTION')+":</td>"+
	"<td><textarea id='line_description"+prodln+"' name='line_description["+prodln+"]' rows='2' cols='50' title='' tabindex='0' style='overflow: hidden; height: 44px;'></textarea></td>"+
	"<td id='enabled_flag_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_ENABLED_FLAG')+":<span class='required'>*</span></td>"+
	"<td><input type='hidden' name='line_enabled_flag["+prodln+"]'value='0'title='' >"+
	"<input style='width:153px;'type='checkbox' onclick='changeEnabledFlag(" + prodln + ");'name='line_enabled_flag["+prodln+"]'id='line_enabled_flag"+prodln+"'maxlength='50'value='1'title='' ></td>"+
"</tr>"+
"<tr>"+
	"<td colSpan='2'><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'>"+
					"<input type='button' id='line_delete_line"+prodln+"' class='button btn_del' value='"+SUGAR.language.get('app_strings','LBL_DELETE_INLINE')+"' tabindex='116' onclick='btnMarkLineDeleted("+prodln+",\"line_\")'>"+
					"<button type='button' id='btn_LineEditorClose"+prodln+"' class='button btn_save' value='"+SUGAR.language.get('app_strings','LBL_CLOSEINLINE')+"' tabindex='116' onclick='LineEditorClose("+prodln+",\"line_\")'>"+SUGAR.language.get('app_strings','LBL_SAVE_BUTTON_LABEL')+"&"+SUGAR.language.get('app_strings','LBL_CLOSEINLINE')+"<img src='themes/default/images/id-ff-clear.png' alt='"+SUGAR.language.get(module_sugar_grp1,'LBL_REMOVE_PRODUCT_LINE')+"'></button>"+
	"</td>"+
	"</tr>"+
"</table></td>";
addValidate(prodln);
renderLine(prodln);
prodln++;
count++;
return prodln-1;
}

function renderLine(ln){//将编辑器中的内容显示于正常行中
	//$("#displayed_line_flex_value_set"+ln).html($("#line_flex_value_set"+ln).val());
	$("#displayed_line_sort_order"+ln).html($("#line_sort_order"+ln).val());
	$("#displayed_line_column_name"+ln).html($("#line_column_name"+ln).val());
	$("#displayed_line_field_lable_zhs"+ln).html($("#line_field_lable_zhs"+ln).val());
	$("#displayed_line_display_type_code"+ln).html($("#line_display_type_code"+ln).find("option:selected").text());
	$("#displayed_line_display_hsize"+ln).html($("#line_display_hsize"+ln).val());
	if ($("#line_popup_visible_flag"+ln).val() == 1) {
		$("#displayed_line_popup_visible_flag"+ln).html('是');
	}
	else{
		$("#displayed_line_popup_visible_flag"+ln).html('否');
	}
	if ($("#line_dashlet_visible_flag"+ln).val() == 1) {
		$("#displayed_line_dashlet_visible_flag"+ln).html('是');
	}
	else{
		$("#displayed_line_dashlet_visible_flag"+ln).html('否');
	}
	if ($("#line_query_allowed_flag"+ln).val() == 1) {
		$("#displayed_line_query_allowed_flag"+ln).html('是');
	}
	else{
		$("#displayed_line_query_allowed_flag"+ln).html('否');
	}
	if ($("#line_value_return_flag"+ln).val() == 1) {
		$("#displayed_line_value_return_flag"+ln).html('是');
	}
	else{
		$("#displayed_line_value_return_flag"+ln).html('否');
	}
	$("#displayed_line_header_alignment_code"+ln).html($("#line_header_alignment_code"+ln).val());
	$("#displayed_line_cell_alignment_code"+ln).html($("#line_cell_alignment_code"+ln).val());
	//$("#displayed_line_description"+ln).html($("#line_description"+ln).val());
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
	footer_cell.innerHTML="<input id='btnAddNewLine'type='button'class='buttonbtn_del'onclick='addNewLine(\""+tableid+"\")'value='+"+SUGAR.language.get('HAA_ListViews','LBL_NEW_LINE')+"'/>";
}

function addNewLine(tableid){
	
	if(check_form('EditView')){//只有必须填写的字段都填写了才可以新增

		$("#data_source_view_name").attr("disabled",true);

		var x = prodln;
		insertLineElements(tableid,'EditView');//加入新行
		$("#line_popup_visible_flag" + x).attr("checked", true);
		$("#line_dashlet_visible_flag" + x).attr("checked", true);
		$("#line_query_allowed_flag" + x).attr("checked", false);
		$("#line_value_return_flag" + x).attr("checked", false);
		$("#line_enabled_flag" + x).attr("checked", true);
		$("#line_v_name" + x).val($("#name").val());
		//console.log($("input[name='record']").val());
		$("#line_haa_listviews_id_c" + x).val($("input[name='record']").val());
		$("#line_sort_order"+x).val(x+1);
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

count = count-1;
if (count == 0) {
	$("#data_source_view_name").attr("disabled",false);
}
//collapseline;updatedeletedvalue
document.getElementById(key+'body'+ln).style.display='none';
document.getElementById(key+'deleted'+ln).value='1';
document.getElementById(key+'delete_line'+ln).onclick='';
//removeFromValidate('EditView','line_sort_order'+ln);
removeFromValidate('EditView','line_column_name'+ln);
removeFromValidate('EditView','line_field_lable_zhs'+ln);
removeFromValidate('EditView','line_display_type_code'+ln);
removeFromValidate('EditView','line_display_hsize'+ln);
removeFromValidate('EditView','line_header_alignment_code'+ln);
removeFromValidate('EditView','line_cell_alignment_code'+ln);
//removeFromValidate('EditView','line_line_link_id_column'+ln);
//resetLineNum_Bold();

}

function LineEditorShow(ln){//显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
	if(prodln>1){
		for(vari=0;i<prodln;i++){
			LineEditorClose(i);
		}
	}
	$("#line1_displayed"+ln).hide();
	$("#line_editor"+ln).show();
	addValidate(ln);
	

}
function LineEditorClose(ln) {//关闭行编辑器（显示为正常行）
  if (check_form('EditView')) {
    $("#line_editor"+ln).hide();
    $("#line1_displayed"+ln).show();
    renderLine(ln);
    //resetLineNum_Bold();
  
  }
}

function addValidate(ln){
	addToValidate('EditView','line_sort_order'+ln,'varchar','true',SUGAR.language.get('HAA_ListView_Columns','LBL_SORT_ORDER'));
	addToValidate('EditView','line_column_name'+ln,'varchar',true,SUGAR.language.get('HAA_ListView_Columns','LBL_COLUMN_NAME'));
	addToValidate('EditView','line_field_lable_zhs'+ln,'varchar',true,SUGAR.language.get('HAA_ListView_Columns','LBL_FIELD_LABLE_ZHS'));
	addToValidate('EditView','line_display_type_code'+ln,'varchar',true,SUGAR.language.get('HAA_ListView_Columns','LBL_DISPLAY_TYPE_CODE'));
	addToValidate('EditView','line_display_hsize'+ln,'int',true,SUGAR.language.get('HAA_ListView_Columns','LBL_DISPLAY_HSIZE'));
	addToValidate('EditView','line_header_alignment_code'+ln,'varchar',true,SUGAR.language.get('HAA_ListView_Columns','LBL_HEADER_ALIGNMENT_CODE'));
	addToValidate('EditView','line_cell_alignment_code'+ln,'varchar',true,SUGAR.language.get('HAA_ListView_Columns','LBL_CELL_ALIGNMENT_CODE'));
}

function changeDisplayType(ln){
	if ($("#line_display_type_code"+ln).val() == 'LNK') {
		var line_item_type_option = document.getElementById("linetypehidden").value;
		link_html = "<tr>"+
						"<td id='link_module_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_LINK_MODULE')+":<span class='required'>*</span></td>"+
						"<td><select id='line_link_module"+ln+"' name='line_link_module["+ln+"]' title=''>"+line_item_type_option+"</td>"+
						"<td id='link_id_column_label'>"+SUGAR.language.get('HAA_ListView_Columns','LBL_LINK_ID_COLUMN')+":<span class='required'>*</span></td>"+
						"<td><select id='line_link_id_column"+ln+"' name='line_link_id_column["+ln+"]' title=''>"+columList+"</td>"+
					"</tr>";
		$("#line_display_hsize"+ln).parent().parent().after(link_html);
		addToValidate('EditView','line_link_id_column'+ln,'varchar','true',SUGAR.language.get('HAA_ListView_Columns','LBL_LINE_LINK_ID_COLUMN'));
	}
	else{
		//removeFromValidate('EditView','line_line_link_id_column'+ln);
		$("#line_link_module"+ln).parent().parent().replaceWith("");
	}
	//addToValidate('EditView','line_link_id_column'+ln,'varchar','true',SUGAR.language.get('HAA_ListView_Columns','LBL_LINE_LINK_ID_COLUMN'));
}

function changeColumn1(){
  $("#sort_column1").val($("#s_sort_column1").val());
}
function changeColumn2(){
  $("#sort_column2").val($("#s_sort_column2").val());
}
function changeColumn3(){
  $("#sort_column3").val($("#s_sort_column3").val());
}
function changeColumn4(){
  $("#sort_column4").val($("#s_sort_column4").val());
}

//勾选改变时,value改变
function changeEnabledFlag(ln){
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
function changePopupFlag(ln){
  if ($("#line_popup_visible_flag"+ln).is(':checked')) {
		$("#line_popup_visible_flag"+ln).val(1);
		$("#displayed_line_popup_visible_flag"+ln).html('是');
	}
	else{
		$("#line_popup_visible_flag"+ln).val(0);
		$("#displayed_line_popup_visible_flag"+ln).html('否');
	}
	console.log($("#line_popup_visible_flag"+ln).val());
}
function changeDashletFlag(ln){
  if ($("#line_dashlet_visible_flag"+ln).is(':checked')) {
		$("#line_dashlet_visible_flag"+ln).val(1);
		$("#displayed_line_dashlet_visible_flag"+ln).html('是');
	}
	else{
		$("#line_dashlet_visible_flag"+ln).val(0);
		$("#displayed_line_dashlet_visible_flag"+ln).html('否');
	}
	console.log($("#line_dashlet_visible_flag"+ln).val());
}
function changeQueryFlag(ln){
  if ($("#line_query_allowed_flag"+ln).is(':checked')) {
		$("#line_query_allowed_flag"+ln).val(1);
		$("#displayed_line_query_allowed_flag"+ln).html('是');
	}
	else{
		$("#line_query_allowed_flag"+ln).val(0);
		$("#displayed_line_query_allowed_flag"+ln).html('否');
	}
	console.log($("#line_query_allowed_flag"+ln).val());
}
function changeValueFlag(ln){
  if ($("#line_value_return_flag"+ln).is(':checked')) {
		$("#line_value_return_flag"+ln).val(1);
		$("#displayed_line_value_return_flag"+ln).html('是');
	}
	else{
		$("#line_value_return_flag"+ln).val(0);
		$("#displayed_line_value_return_flag"+ln).html('否');
	}
	console.log($("#line_value_return_flag"+ln).val());
}



/*function openSetPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "setSetReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id":"line_HAA_ListView_Columnsets_id_c"+ln,
      "name" : "line_flex_value_set" + ln,
    }
  };
  var module_name='&module_name=HAA_ListView_Columnsets';
  open_popup('HAA_ListView_Columnsets', 800, 850,module_name, true, true, popupRequestData);
}

function setSetReturn(popupReplyData){
  set_return(popupReplyData);
}*/

function checkSortOrder(ln){
	var val =$("#line_sort_order"+ln).val();
	if(!isNaN(val)){
		//alert("是数字");
	}else{
		alert("不是数字");
		$("#line_sort_order"+ln).val(ln+1);
	}
}

function checkDisplayHsize(ln){
	var val =$("#line_display_hsize"+ln).val();
	if(!isNaN(val)){
		//alert("是数字");
	}else{
		alert("不是数字");
		$("#line_display_hsize"+ln).val(1);
	}
}

function resetLineNum_Bold(){//数行号
	var j=0;
	
	for(var i=0;i<prodln;i++){
		if($("#line_deleted"+i).val()!=1){//跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
			j=j+1;
			//$("#displayed_line_num"+i).text(j);
			$("#line_sort_order"+i).val(j);
			$("#displayed_line_sort_order"+i).html(j);
			//console.log($("#displayed_line_sort_order"+i).html());
		}
	}
}


