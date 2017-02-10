var prodlndoc=0;
var columnNumdoc=6;
if(typeof sqs_objects=='undefined'){var sqs_objects=new Array;}

function doc_insertLineHeader(tableid){
$('#line_doc_items_span').parent().prev().hide();//隐藏SugarCRM字段
$("#line_doc_items_span").parent().toggleClass("col-sm-8","col-sm-12");
tablehead=document.createElement("thead");
tablehead.id=tableid+"_head";
//tablehead.style.display="none";
document.getElementById(tableid).appendChild(tablehead);

var x=tablehead.insertRow(-1);
x.id='Line_head';
var a=x.insertCell(0);
a.width="25%";
a.innerHTML=SUGAR.language.get('HAT_Counting_Results','LBL_DOC_NAME');;
var b=x.insertCell(1);
b.width="25%";
b.innerHTML=SUGAR.language.get('HAT_Counting_Results','LBL_FILENAME');
var b1=x.insertCell(2);
b1.width="10%";
b1.innerHTML=SUGAR.language.get('HAT_Counting_Results','LBL_CATEGORY_VALUE');
var c=x.insertCell(3);
c.width="10%";
c.innerHTML=SUGAR.language.get('HAT_Counting_Results','LBL_DOC_STATUS');
var d=x.insertCell(4);
d.width="15%";
d.innerHTML=SUGAR.language.get('HAT_Counting_Results','LBL_DOC_ACTIVE_DATE');
var f=x.insertCell(5);
f.width="15%";
f.innerHTML='&nbsp;';
tablebody=document.createElement("tbody");
tablebody.id="lines";
document.getElementById(tableid).appendChild(tablebody);
}


function doc_insertLineData(line_data){//将数据写入到对应的行字段中
	var ln=0;

	if(line_data.id!='0'&&line_data.id!==''){
		ln=doc_insertLineElements("linedocItems");
		$("#line_doc_document_name".concat(String(ln))).val(line_data.document_name);
		$("#line_doc_id".concat(String(ln))).val(line_data.id);
		$("#displayed_filename_file".concat(String(ln))).html(line_data.file_name);
		$("#line_doc_category_id".concat(String(ln))).val(line_data.category_id);
		$("#line_doc_status_id".concat(String(ln))).val(line_data.status_id);
		$("#line_doc_active_date".concat(String(ln))).val(line_data.active_date);
		$("#line_doc_description".concat(String(ln))).val(line_data.description);
	    $("#line_doc_revision".concat(String(ln))).val(line_data.revision);
		
	doc_renderLine(ln);
		
		$("#line_doc_editor"+ln).hide();
	}
}

function doc_insertLineElements(tableid){//创建界面要素
//包括以下内容：1）显示头，2）定义SQS对象，3）定义界面显示的可见字段，4）界面行编辑器界面
if(document.getElementById(tableid+'_head')!==null){
	document.getElementById(tableid+'_head').style.display="";
}
tablebody=document.createElement("tbody");
tablebody.id="line_doc_body"+prodlndoc;
document.getElementById(tableid).appendChild(tablebody);

var line_status_option=document.getElementById("documentstatus").value;
var line_category_option=document.getElementById("documentcategory").value;

var z1=tablebody.insertRow(-1);
z1.id='line_doc_displayed'+prodlndoc;
z1.className='oddListRowS1';
z1.innerHTML=
"<td id='displayed_line_doc_document_name"+prodlndoc+"'></td>"+
"<td id='displayed_filename_file"+prodlndoc+"'></td>"+
"<td id='displayed_line_doc_category_id"+prodlndoc+"'></td>"+
"<td id='displayed_line_doc_status_id"+prodlndoc+"'></td>"+
"<td id='displayed_line_doc_active_date"+prodlndoc+"'></td>"+
"<td><input type='button'value='"+SUGAR.language.get('app_strings','LBL_EDITINLINE')+"'class='button'id='btn_edit_line"+prodlndoc+"'onclick='doc_LineEditorShow("+prodlndoc+")'></td>";

var x=tablebody.insertRow(-1);//以下生成的是LineEditor
x.id='line_doc_editor'+prodlndoc;

x.innerHTML="<td colSpan='"+columnNumdoc+"'><table border='0' class='linedocEditor' width='100%' style='display:table'>"+
"<tr>"+
	"<td id='doc_status_label'>"+SUGAR.language.get('HAT_Counting_Results','LBL_DOC_STATUS')+":</td>"+
	"<td><select tabindex='116' name='line_doc_status_id["+prodlndoc+"]'id='line_doc_status_id"+prodlndoc+"'>"+line_status_option+"</select></td>"+
	"<td colSpan='2'><input id='line_doc_id"+prodlndoc+"' name='line_doc_id["+prodlndoc+"]' type='hidden' value=''/></td>"+
"</tr>"+
"<tr>"+
	"<td id='filename_label'>"+SUGAR.language.get('HAT_Counting_Results','LBL_FILENAME')+":<span class='required'>*</span></td>"+
	"<td><input style='width:153px;' type='file' name='filename_file["+prodlndoc+"]' id='filename_file"+prodlndoc+"' title='' onchange='doc_getDocumentName("+prodlndoc+");'></td>"+
	"<td id='doc_name_label'>"+SUGAR.language.get('HAT_Counting_Results','LBL_DOC_NAME')+":<span class='required'>*</span></td>"+
	"<td><input style='width:153px;'type='text'name='line_doc_document_name["+prodlndoc+"]'id='line_doc_document_name"+prodlndoc+"'maxlength='50'value=''title=''></td>"+
"</tr>"+
"<tr>"+
	"<td id='active_date_label'>"+SUGAR.language.get('HAT_Counting_Results','LBL_DOC_ACTIVE_DATE')+"<span class='required'>*</span></td>"+
	"<td><span class='input-group date show_calendar' id='span_line_active_date"+prodlndoc+"'>"+
	"<input class='date_input' autocomplete='off' name='line_doc_active_date["+prodlndoc+"]' id='line_doc_active_date"+prodlndoc+"' value='' title='' tabindex='116' type='text'>"+
	"<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></span>"+
	"</td>"+
	"<td id='category_value_label'>"+SUGAR.language.get('HAT_Counting_Results','LBL_CATEGORY_VALUE')+":</td>"+
	"<td><select tabindex='116'name='line_doc_category_id["+prodlndoc+"]'id='line_doc_category_id"+prodlndoc+"'>"+line_category_option+"</select></td>"+
"</tr>"+
"<tr>"+
	"<td><input style='width:153px;'type='hidden'name='line_doc_revision["+prodlndoc+"]'id='line_doc_revision"+prodlndoc+"'maxlength='50'value=''title=''></td>"+
	"<td></td>"+
	"<td colSpan='2'><input type='hidden' id='line_doc_deleted"+prodlndoc+"' name='line_doc_deleted["+prodlndoc+"]' value='0'>"+
					"<input type='button' id='line_doc_delete_line"+prodlndoc+"' class='button btn_del' value='"+SUGAR.language.get('app_strings','LBL_DELETE_INLINE')+"' tabindex='116' onclick='doc_btnMarkLineDeleted("+prodlndoc+",\"line_doc_\")'>"+
					"<button type='button' id='btn_LineEditorClose"+prodlndoc+"' class='button btn_save' value='"+SUGAR.language.get('app_strings','LBL_CLOSEINLINE')+"' tabindex='116' onclick='doc_LineEditorClose("+prodlndoc+",\"line_doc_\")'>"+SUGAR.language.get('app_strings','LBL_SAVE_BUTTON_LABEL')+"&"+SUGAR.language.get('app_strings','LBL_CLOSEINLINE')+"<img src='themes/default/images/id-ff-clear.png' alt='"+SUGAR.language.get(module_sugar_grp1,'LBL_REMOVE_PRODUCT_LINE')+"'></button>"+
	"</td>"+
	"</tr>"+
"</table></td>";
addToValidate('EditView','line_doc_document_name'+prodlndoc,'file','true',SUGAR.language.get('HAT_Counting_Results','LBL_DOC_NAME'));
addToValidate('EditView','filename_file'+prodlndoc,'varchar','true',SUGAR.language.get('HAT_Counting_Results','LBL_FILENAME'));
addToValidate('EditView','line_doc_active_date'+prodlndoc,'date','true',SUGAR.language.get('HAT_Counting_Results','LBL_DOC_ACTIVE_DATE'));

doc_renderLine(prodlndoc);

prodlndoc++;
doc_CalendarShow();
return prodlndoc-1;
}

function doc_renderLine(ln){//将编辑器中的内容显示于正常行中
	$("#displayed_line_doc_document_name"+ln).html($("#line_doc_document_name"+ln).val());
	/*if ($("#filename_file"+ln).val()) 
		$("#displayed_filename_file"+ln).html($("#filename_file"+ln).val());*/
	$("#displayed_line_doc_category_id"+ln).html($("#line_doc_category_id"+ln).find("option:selected").text());
	$("#displayed_line_doc_status_id"+ln).html($("#line_doc_status_id"+ln).find("option:selected").text());
	$("#displayed_line_doc_active_date"+ln).html($("#line_doc_active_date"+ln).val());
}

function doc_insertLineFootor(tableid)
{
	tablefooter=document.createElement("tfoot");
	document.getElementById(tableid).appendChild(tablefooter);

	var footer_row=tablefooter.insertRow(-1);
	var footer_cell=footer_row.insertCell(0);

	footer_cell.scope="row";
	footer_cell.colSpan=columnNumdoc;
	footer_cell.innerHTML="<input id='doc_btnAddNewLine'type='button'class='buttonbtn_del'onclick='doc_addNewLine(\""+tableid+"\")'value='+"+SUGAR.language.get('HAT_Counting_Results','LBL_NEW_LINE')+"'/>";
}

function doc_addNewLine(tableid){
	if(check_form('EditView')){//只有必须填写的字段都填写了才可以新增
		doc_insertLineElements(tableid);//加入新行
		doc_LineEditorShow(prodlndoc-1);//打开行编辑器
	}
}

function doc_CalendarShow(){//显示日历
	var Datetimepicker=$(".show_calendar");
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

function doc_btnMarkLineDeleted(ln,key){//删除当前行
	if(confirm(SUGAR.language.get('app_strings','NTC_DELETE_CONFIRMATION'))){
		doc_markLineDeleted(ln,key);
		doc_LineEditorClose(ln);
	}else{
		return false;
	}
}
function doc_markLineDeleted(ln,key){//删除当前行

//collapseline;updatedeletedvalue
document.getElementById(key+'body'+ln).style.display='none';
document.getElementById(key+'deleted'+ln).value='1';
document.getElementById(key+'delete_line'+ln).onclick='';

if(typeof validate!="undefined"&&typeof validate['EditView']!="undefined"){
	removeFromValidate('EditView','line_doc_document_name'+ln);
	removeFromValidate('EditView','filename_file'+ln);
	removeFromValidate('EditView','line_doc_active_date'+ln);
}
doc_resetLineNum_Bold();

}

function doc_LineEditorShow(ln){//显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
	if(prodlndoc>1){
		for(vari=0;i<prodlndoc;i++){
			doc_LineEditorClose(i);
		}
	}
	var now = new Date(); 
	var nowStr=now.getFullYear()+"-"+now.getMonth()+1+"-"+now.getDate();
	
	$("#line_doc_active_date"+ln).val(nowStr);//默认当前日期
	$("#line_doc_revision"+ln).val("1");//默认版本号为1
	$("#line_doc_displayed"+ln).hide();
	$("#line_doc_editor"+ln).show();

}

function doc_LineEditorClose(ln){//关闭行编辑器（显示为正常行）
	if(check_form('EditView')){
		$("#line_doc_editor"+ln).hide();
		$("#line_doc_displayed"+ln).show();
		doc_renderLine(ln);
		doc_resetLineNum_Bold();
	}
}

function doc_resetLineNum_Bold(){//数行号
	var j=0;
	for(var i=0;i<prodlndoc;i++){
		if($("#line_doc_deleted"+i).val()!=1){//跳过已经删除的行（实际数据还没有删除，只是从界面隐藏）
			j=j+1;
			$("#displayed_line_doc_num"+i).text(j);
		}
	}
}

function doc_getDocumentName(ln){
	$("#line_doc_document_name"+ln).val($("#filename_file"+ln).val());
}

$("#LBL_EDITVIEW_PANEL2 tr").each(function(i){
  $(this).children().each(function(i){
    $(this).removeAttr('colspan');
    if(i==1)
      $(this).attr('width','87.5%');
  });
  if (i==1) {
    $("#line_doc_items_span").parent().attr('colspan','2');
    $("#line_doc_items_span").parent().attr('width','100%');
  }
});

function replace_display_lines_doc(linesHtml,elementId) {
  var linedocItems=document.getElementById(elementId);
  linedocItems.innerHTML=linesHtml;
}
