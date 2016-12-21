var prodln=0;
var columnNum=12;
if(typeof sqs_objects=='undefined'){var sqs_objects=new Array;}
function insertLineHeader(tableid){
	$("#line_items_label").remove();//隐藏SugarCRM字段
	tablehead=document.createElement("thead");
	tablehead.id=tableid+"_head";
	document.getElementById(tableid).appendChild(tablehead);
	var x=tablehead.insertRow(-1);
	x.id='Line_head';
	var a=x.insertCell(0);
	a.width="30%";
	a.align="center";
	a.innerHTML=SUGAR.language.get('HPR_Group_PopupModules','LBL_POPUPMODULE');
	var f=x.insertCell(1);
	f.width="30%";
	f.align="center";
	f.innerHTML=SUGAR.language.get('HPR_Group_PopupModules','LBL_LOGIC_TYPE');
	var b=x.insertCell(2);
	b.width="30%";
	b.align='center';
	b.innerHTML=SUGAR.language.get('HPR_Group_PopupModules','LBL_ADDITIONAL_CLAUSE');
	var b1=x.insertCell(3);
	var l=x.insertCell(4);
	l.width="10%";
	l.innerHTML='&nbsp;';
}


function insertLineData(line_data){//将数据写入到对应的行字段中
	var ln=0;
	if(line_data.id!='0'&&line_data.id!==''){
		ln=insertLineElements("lineItems");
		$("#line_popupmodule".concat(String(ln))).val(line_data.popupmodule);//
		$("#line_id".concat(String(ln))).val(line_data.id);
		$("#line_logic_type".concat(String(ln))).val(line_data.logic_type);
		$("#line_additional_clause".concat(String(ln))).val(line_data.additional_clause);
		renderLine(ln);
		$("#line_editor"+ln).hide();
	}
}

function insertLineElements(tableid){
	if(document.getElementById(tableid+'_head')!==null){
		document.getElementById(tableid+'_head').style.display="";
	}
	tablebody=document.createElement("tbody");
	tablebody.id="line_body"+prodln;
	document.getElementById(tableid).appendChild(tablebody);
	var vat_hidden=$("#vathidden").val();
	var logic_hidden=$("#logichidden").val();
	var z1=tablebody.insertRow(-1);
	z1.id='line1_displayed'+prodln;
	z1.className='oddListRowS1';
	z1.innerHTML=
	"<td id='displayed_popupmodule"+prodln+"' align='center'></td>"+
	"<td id='displayed_logic_type"+prodln+"' align='center'></td>"+
	"<td id='displayed_additional_clause"+prodln+"' align='center'></td>"+
	"<td><input type='button'value='"+SUGAR.language.get('app_strings','LBL_EDITINLINE')+"'class='button'id='btn_edit_line"+prodln+"'onclick='LineEditorShow("+prodln+")'></td>";

	var x=tablebody.insertRow(-1);//以下生成的是LineEditor
	x.id='line_editor'+prodln;

	x.innerHTML="<td colSpan='"+columnNum+"'>"+
	"<table border='0' class='lineEditor' width='100%'>"+
	"<tr>"+
		"<td id='popupmodule_label' width='12.5%'>"+SUGAR.language.get('HPR_Group_PopupModules','LBL_POPUPMODULE')+":<span class='required'>*</span></td>"+
		"<td width='37.5%'><select tabindex='116' name='line_popupmodule[" + prodln + "]' id='line_popupmodule" + prodln + "'>" + vat_hidden + "</select>"+
		"</td>"+
		"<td id='logic_type_label' width='12.5%'>"+SUGAR.language.get('HPR_Group_PopupModules','LBL_LOGIC_TYPE')+":<span class='required'>*</span></td>"+
		"<td width='37.5%'><select tabindex='116' name='line_logic_type[" + prodln + "]' id='line_logic_type" + prodln + "'>" + logic_hidden + "</select></td>"+
	"</tr>"+
	"<tr>"+
		"<td id='additional_clause_label'>"+SUGAR.language.get('HPR_Group_PopupModules','LBL_ADDITIONAL_CLAUSE')+":</td>"+
		"<td><textarea name='line_additional_clause["+prodln+"]' id='line_additional_clause"+prodln+"' rows='3' cols='50'></textarea></td>"+
		"<td></td>"+
		"<td></td>"+
	"</tr>"+
	"<tr>"+
		"<td colSpan='2'>"+
			"<input type='hidden' id='line_id"+prodln+"' name='line_id["+prodln+"]' value=''/>"+
		"</td>"+
		"<td colSpan='2'><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'>"+
						"<input type='button' id='line_delete_line"+prodln+"' class='button btn_del' value='"+SUGAR.language.get('app_strings','LBL_DELETE_INLINE')+"' tabindex='116' onclick='btnMarkLineDeleted("+prodln+",\"line_\")'>"+
						"<button type='button' id='btn_LineEditorClose"+prodln+"' class='button btn_save' value='"+SUGAR.language.get('app_strings','LBL_CLOSEINLINE')+"' tabindex='116' onclick='LineEditorClose("+prodln+",\"line_\")'>"+SUGAR.language.get('app_strings','LBL_SAVE_BUTTON_LABEL')+"&"+SUGAR.language.get('app_strings','LBL_CLOSEINLINE')+"<img src='themes/default/images/id-ff-clear.png' alt='"+SUGAR.language.get(module_sugar_grp1,'LBL_REMOVE_PRODUCT_LINE')+"'></button>"+
		"</td>"+
		"</tr>"+
	"</table></td>";
	var old_val="";
	renderLine(prodln);

	prodln++;
	return prodln-1;
}

function renderLine(ln){//将编辑器中的内容显示于正常行中
	$("#displayed_popupmodule"+ln).html($("#line_popupmodule"+ln+" option:selected").html());
	$("#displayed_logic_type"+ln).html($("#line_logic_type"+ln+" option:selected").html());
	$("#displayed_additional_clause"+ln).html($("#line_additional_clause"+ln).val());
	//将文本垂直居中
	$("#lineItems tr td").each(function(){
		$(this).css('vertical-align','middle');
	});
}

function insertLineFootor(tableid)
{
	tablefooter=document.createElement("tfoot");
	document.getElementById(tableid).appendChild(tablefooter);

	var footer_row=tablefooter.insertRow(-1);
	var footer_cell=footer_row.insertCell(0);

	footer_cell.scope="row";
	footer_cell.colSpan=columnNum;
	footer_cell.innerHTML="<input id='btnAddNewLine'type='button'class='buttonbtn_del'onclick='addNewLine(\""+tableid+"\")'value='+"+SUGAR.language.get('app_strings','LBL_CREATE_BUTTON_LABEL')+"'/>";
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
		$("#line_editor"+ln).hide();
	}else{
		return false;
	}
}

function markLineDeleted(ln,key){//删除当前行

	document.getElementById(key+'editor'+ln).style.display='none';
	document.getElementById(key+'deleted'+ln).value='1';
	document.getElementById(key+'delete_line'+ln).onclick='';
	resetLineNum_Bold();
}

function LineEditorShow(ln){//显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
	if(!checkValidate('EditView','line_relate_insurance_number'+ln))
	addToValidate('EditView','line_relate_insurance_number'+ln,'varchar','true',SUGAR.language.get('HPR_Group_PopupModules','LBL_RELATE_INSURANCE_NUMBER'));
	if(!checkValidate('EditView','line_claim_amount'+ln))
	addToValidate('EditView','line_claim_amount'+ln,'varchar','true',SUGAR.language.get('HPR_Group_PopupModules','LBL_CLAIM_AMOUNT'));
	if(prodln>1){
		for(vari=0;i<prodln;i++){
			LineEditorClose(i);
		}
	}
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

//重写table
$("#LBL_EDITVIEW_PANEL3 tr").each(function(i){
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

$(function(){
	$("#sql_statement_for_listview").removeAttr("style");
	$("#sql_statement_for_listview").css("overflow-y","scroll");
});

function replace_display_lines(linesHtml,elementId) {
  var lineItems=document.getElementById(elementId);
  lineItems.innerHTML=linesHtml;
}