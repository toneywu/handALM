var prodln=0;
var columnNum=12;
if(typeof sqs_objects=='undefined'){var sqs_objects=new Array;}
//$.getScript("custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js");
function insertLineHeader(tableid){
	$("#line_items_label").remove();//隐藏SugarCRM字段
	//将总额设置为不可修改
	tablehead=document.createElement("thead");
	tablehead.id=tableid+"_head";
	document.getElementById(tableid).appendChild(tablehead);
	var x=tablehead.insertRow(-1);
	x.id='Line_head';
	var a=x.insertCell(0);
	a.width="12%";
	a.innerHTML=SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_RELATE_INSURANCE_NUMBER');
	var f=x.insertCell(1);
	f.width="8%";
	f.innerHTML=SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_INSURANCE_TYPE');
	var b=x.insertCell(2);
	b.width="10%";
	b.align='center';
	b.innerHTML=SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_CLAIM_AMOUNT');
	var b1=x.insertCell(3);
	b1.width="10%";
	b1.align='center';
	b1.innerHTML=SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_OTHER_SIDE_AMOUNT');
	var c=x.insertCell(4);
	c.width="10%";
	c.align='center';
	c.innerHTML=SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_GAP_AMOUNT');
	var d=x.insertCell(5);
	d.width="10%";
	d.align='center';
	d.innerHTML=SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_ACTUAL_AMOUNT');
	var e=x.insertCell(6);
	e.width="9%";
	e.align='center';
	e.innerHTML=SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_OTHER_SIDE_ACT_AMT');
	/*var f=x.insertCell(6);
	f.width="8%";
	f.innerHTML=SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_DOCUMENT_READY_FLAG');*/
	var g=x.insertCell(7);
	g.width="10%";
	g.innerHTML=SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_DOCUMENT_DELIVER_DATE');
	var h=x.insertCell(8);
	h.width="8%";
	h.innerHTML=SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_PREMIUM_PAYMENT_DATE');
	var i=x.insertCell(9);
	i.width="8%";
	i.innerHTML=SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_GAP_PAYMENT_DATE');
	/*var j=x.insertCell(10);
	j.width="8%";
	j.innerHTML=SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_ACCIDENT_EXPERIENCE');
	var k=x.insertCell(11);
	k.width="8%";
	k.innerHTML=SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_ADDITIONAL_COMMENTS');*/
	var l=x.insertCell(10);
	l.width="4%";
	l.innerHTML='&nbsp;';
}


function insertLineData(line_data){//将数据写入到对应的行字段中
	var ln=0;
	if(line_data.id!='0'&&line_data.id!==''){
		ln=insertLineElements("lineItems");
		$("#line_relate_insurance_number".concat(String(ln))).val(line_data.relate_insurance_number);
		$("#line_id".concat(String(ln))).val(line_data.id);
		$("#line_insurance_type".concat(String(ln))).val(line_data.insurance_type);
		$("#line_haos_insurances_id_c".concat(String(ln))).val(line_data.haos_insurances_id_c);
		$("#line_claim_amount".concat(String(ln))).val(format2Number(line_data.claim_amount,2));
		$("#line_other_side_amount".concat(String(ln))).val(format2Number(line_data.other_side_amount,2));
		$("#line_gap_amount".concat(String(ln))).val(format2Number(line_data.gap_amount,2));
		$("#line_actual_amount".concat(String(ln))).val(format2Number(line_data.actual_amount,2));
		$("#line_other_side_act_amt".concat(String(ln))).val(format2Number(line_data.other_side_act_amt,2));
		/*$("#line_document_ready_flag".concat(String(ln))).attr('checked',line_data.document_ready_flag==1?true:false);
        $("#line_document_ready_flag".concat(String(ln))).val(line_data.document_ready_flag);*/
        $("#line_document_deliver_date".concat(String(ln))).val(line_data.document_deliver_date);
        $("#line_premium_payment_date".concat(String(ln))).val(line_data.premium_payment_date);
        $("#line_gap_payment_date".concat(String(ln))).val(line_data.gap_payment_date);
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

	var z1=tablebody.insertRow(-1);
	z1.id='line1_displayed'+prodln;
	z1.className='oddListRowS1';
	z1.innerHTML=
	"<td id='displayed_relate_insurance_number"+prodln+"'></td>"+
	"<td id='displayed_insurance_type"+prodln+"'></td>"+
	"<td id='displayed_claim_amount"+prodln+"' align='right'></td>"+
	"<td id='displayed_other_side_amount"+prodln+"' align='right'></td>"+
	"<td id='displayed_gap_amount"+prodln+"' align='right'></td>"+
	"<td id='displayed_actual_amount"+prodln+"' align='right'></td>"+
	"<td id='displayed_other_side_act_amt"+prodln+"' align='right'></td>"+
	"<td id='displayed_document_deliver_date"+prodln+"' align='center'></td>"+
	"<td id='displayed_premium_payment_date"+prodln+"' align='center'></td>"+
	"<td id='displayed_gap_payment_date"+prodln+"' align='center'></td>"+
	/*"<td id='displayed_accident_experience"+prodln+"' style='white-space: nowrap;overflow: hidden;text-overflow: ellipsis;'></td>"+
	"<td id='displayed_additional_comments"+prodln+"' style='white-space: nowrap;overflow: hidden;text-overflow: ellipsis;'></td>"+*/
	"<td><input type='button'value='"+SUGAR.language.get('app_strings','LBL_EDITINLINE')+"'class='button'id='btn_edit_line"+prodln+"'onclick='LineEditorShow("+prodln+")'></td>";

	var x=tablebody.insertRow(-1);//以下生成的是LineEditor
	x.id='line_editor'+prodln;

	x.innerHTML="<td colSpan='"+columnNum+"'>"+
  	"<link rel='stylesheet' type='text/css' href='custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'>"+
	"<table border='0' class='lineEditor' width='100%'>"+
	"<tr>"+
		"<td id='relate_insurance_number_label'>"+SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_RELATE_INSURANCE_NUMBER')+":<span class='required'>*</span></td>"+
		"<td><input name='line_relate_insurance_number["+prodln+"]'id='line_relate_insurance_number"+prodln+"' type='text' tabindex='0' class='sqsEnabled yui-ac-input' autocomplete='off' maxlength='255' size='24' value=''/>"+
		"<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openInsurancePopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
		"</td>"+
		"<td id='insurance_type_label'>"+SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_INSURANCE_TYPE')+"</td>"+
		"<td><input type='text' id='line_insurance_type"+prodln+"' readonly value=''/>"+
		"<input type='hidden' id='line_haos_insurances_id_c"+prodln+"' name='line_haos_insurances_id_c["+prodln+"]' value=''/></td>"+
	"</tr>"+
	"<tr>"+
		"<td id='claim_amount_label'>"+SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_CLAIM_AMOUNT')+":<span class='required'>*</span></td>"+
		"<td><input type='text' name='line_claim_amount["+prodln+"]' id='line_claim_amount"+prodln+"' maxlength='50' size='30' value='' onblur='line_caculate("+prodln+");'></td>"+
		"<td id='other_side_amount_label'>"+SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_OTHER_SIDE_AMOUNT')+"</td>"+
		"<td><input type='text' id='line_other_side_amount"+prodln+"' name='line_other_side_amount["+prodln+"]' value='' maxlength='255' size='30' onblur='line_caculate("+prodln+");'/></td>"+
	"</tr>"+
	"<tr>"+
		"<td id='gap_amount_label'>"+SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_GAP_AMOUNT')+":</td>"+
		"<td><input type='text'name='line_gap_amount["+prodln+"]'id='line_gap_amount"+prodln+"'maxlength='255' size='30' value=''title='' onblur='line_caculate("+prodln+");'></td>"+
		"<td></td>"+
		"<td></td>"+
	"</tr>"+
	"<tr>"+
		"<td id='actual_amount_label'>"+SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_ACTUAL_AMOUNT')+":</td>"+
		"<td><input type='text' id='line_actual_amount"+prodln+"' name='line_actual_amount["+prodln+"]' readonly value='' maxlength='255' size='30'/></td>"+
		"<td id='other_side_act_amt_label'>"+SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_OTHER_SIDE_ACT_AMT')+":</td>"+
		"<td><input id='line_other_side_act_amt"+prodln+"' readonly name='line_other_side_act_amt["+prodln+"]' type='text' value='' maxlength='255' size='30'/></td>"+
	"</tr>"+
	"<tr>"+
		"<td id='document_ready_flag_label'>"+SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_DOCUMENT_READY_FLAG')+":</td>"+
		"<td><input type='checkbox' id='line_document_ready_flag"+prodln+"' name='line_document_ready_flag["+prodln+"]' value=''/></td>"+
		"<td id='document_deliver_date_label'>"+SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_DOCUMENT_DELIVER_DATE')+":</td>"+
		"<td><span class='input-group date show_calendar' id='span_line_active_date"+prodln+"'>"+
		"<input class='date_input' autocomplete='off' name='line_document_deliver_date["+prodln+"]' id='line_document_deliver_date"+prodln+"' value='' title='' tabindex='116' type='text'>"+
		"<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></span></td>"+
	"</tr>"+
	"<tr>"+
		"<td id='premium_payment_date_label'>"+SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_PREMIUM_PAYMENT_DATE')+":</td>"+
		"<td><span class='input-group date show_calendar' id='span_line_active_date"+prodln+"'>"+
		"<input class='date_input' autocomplete='off' name='line_premium_payment_date["+prodln+"]' id='line_premium_payment_date"+prodln+"' value='' title='' tabindex='116' type='text'>"+
		"<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></span></td>"+
		"<td id='gap_payment_date_label'>"+SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_GAP_PAYMENT_DATE')+":</td>"+
		"<td><span class='input-group date show_calendar' id='span_line_active_date"+prodln+"'>"+
		"<input class='date_input' autocomplete='off' name='line_gap_payment_date["+prodln+"]' id='line_gap_payment_date"+prodln+"' value='' title='' tabindex='116' type='text'>"+
		"<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></span></td>"+
	"</tr>"+
	"<tr>"+
		"<td id='accident_experience_label'>"+SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_ACCIDENT_EXPERIENCE')+":</td>"+
		"<td><textarea id='line_accident_experience"+prodln+"' name='line_accident_experience["+prodln+"]' rows='3' cols='50'></textarea></td>"+
		"<td id='additional_comments_label'>"+SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_ADDITIONAL_COMMENTS')+":</td>"+
		"<td><textarea id='line_additional_comments"+prodln+"' name='line_additional_comments["+prodln+"]' rows='3' cols='50'></textarea></td>"+
	"</tr>"+
	"<tr>"+
		"<td colSpan='2'><input type='hidden' id='line_id"+prodln+"' name='line_id["+prodln+"]' value=''/></td>"+
		"<td colSpan='2'><input type='hidden' id='line_deleted"+prodln+"' name='line_deleted["+prodln+"]' value='0'>"+
						"<input type='button' id='line_delete_line"+prodln+"' class='button btn_del' value='"+SUGAR.language.get('app_strings','LBL_DELETE_INLINE')+"' tabindex='116' onclick='btnMarkLineDeleted("+prodln+",\"line_\")'>"+
						"<button type='button' id='btn_LineEditorClose"+prodln+"' class='button btn_save' value='"+SUGAR.language.get('app_strings','LBL_CLOSEINLINE')+"' tabindex='116' onclick='LineEditorClose("+prodln+",\"line_\")'>"+SUGAR.language.get('app_strings','LBL_SAVE_BUTTON_LABEL')+"&"+SUGAR.language.get('app_strings','LBL_CLOSEINLINE')+"<img src='themes/default/images/id-ff-clear.png' alt='"+SUGAR.language.get(module_sugar_grp1,'LBL_REMOVE_PRODUCT_LINE')+"'></button>"+
		"</td>"+
		"</tr>"+
	"</table></td>";
	addToValidate('EditView','line_relate_insurance_number'+prodln,'varchar','true',SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_RELATE_INSURANCE_NUMBER'));
	addToValidate('EditView','line_claim_amount'+prodln,'varchar','true',SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_CLAIM_AMOUNT'));
	addToValidateBinaryDependency('EditView', 'line_relate_insurance_number'+prodln, 'varchar', false,'没有匹配字段: 保险单号', 'line_haos_insurances_id_c'+prodln );
	var old_val="";
	$("#line_relate_insurance_number"+prodln).click(function(){
		old_val=$(this).val();
	});
	$("#line_relate_insurance_number"+prodln).blur(function(){
		var leave_val=$(this).val();
		if (leave_val!=old_val) {
			$(this).val("");
			var line_num=$(this).attr("id").replace(/[^0-9]/ig,"");
			$("#line_haos_insurances_id_c"+line_num).val("");
		}
	});
	$("#line_document_ready_flag"+prodln).click(function(){
		$(this).val($(this).is(':checked')?1:0);
	});
	renderLine(prodln);

	prodln++;
	CalendarShow();
	return prodln-1;
}

function renderLine(ln){//将编辑器中的内容显示于正常行中
	$("#displayed_relate_insurance_number"+ln).html($("#line_relate_insurance_number"+ln).val());
	$("#displayed_claim_amount"+ln).html($("#line_claim_amount"+ln).val());
	$("#displayed_other_side_amount"+ln).html($("#line_other_side_amount"+ln).val());
	$("#displayed_gap_amount"+ln).html($("#line_gap_amount"+ln).val());
	$("#displayed_actual_amount"+ln).html($("#line_actual_amount"+ln).val());
	$("#displayed_other_side_act_amt"+ln).html($("#line_other_side_act_amt"+ln).val());
	/*var flag=$("#line_document_ready_flag"+ln).is(":checked")?"是":"否";
	$("#displayed_document_ready_flag"+ln).html(flag);*/
	$("#displayed_insurance_type"+ln).html($("#line_insurance_type"+ln).val());
	$("#displayed_document_deliver_date"+ln).html($("#line_document_deliver_date"+ln).val());
	$("#displayed_premium_payment_date"+ln).html($("#line_premium_payment_date"+ln).val());
	$("#displayed_gap_payment_date"+ln).html($("#line_gap_payment_date"+ln).val());
	/*$("#displayed_accident_experience"+ln).html($("#line_accident_experience"+ln).val());
	$("#displayed_additional_comments"+ln).html($("#line_additional_comments"+ln).val());*/
	//将文本垂直居中
	$("#lineItems tr td").each(function(){
		$(this).css('vertical-align','middle');
	});
}

function openInsurancePopup(ln){
	lineno=ln;
	var popupRequestData = {
		"call_back_function" : "setInsuranceReturn",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"id":"line_haos_insurances_id_c"+ln,
			"name" : "line_relate_insurance_number" + ln,
			"insurance_type":"line_insurance_type"+ln,
		}
	};
	open_popup('HAOS_Insurances', 800, 850, '', true, true, popupRequestData);
}

function setInsuranceReturn(popupReplyData){
	set_return(popupReplyData);
}

/*function openPopup() {
	var module=$("#parent_type").find("option:selected").val();
	var popupRequestData = {
		"call_back_function" : "setReturn",
		"form_name" : "EditView",
		"field_to_name_array" : {
			"id":"parent_id",
			"name" : "parent_name",
		}
	};
	console.log(module);
	open_popup(module, 800, 850, '', true, true, popupRequestData);
}*/

function line_caculate(ln) {//行内计算
	var line_claim_amount=unformatNumber($("#line_claim_amount"+ln).val().trim(),',','.');
	$("#line_claim_amount"+ln).val(format2Number(line_claim_amount,2));
	var line_other_side_amount=unformatNumber($("#line_other_side_amount"+ln).val().trim(),',','.');
	$("#line_other_side_amount"+ln).val(format2Number(line_other_side_amount,2));
	var line_gap_amount=unformatNumber($("#line_gap_amount"+ln).val().trim(),',','.');
	$("#line_gap_amount"+ln).val(format2Number(line_gap_amount,2));
	$("#line_actual_amount"+ln).val(format2Number(line_claim_amount+line_gap_amount,2));
	$("#line_other_side_act_amt"+ln).val(format2Number(line_other_side_amount-line_gap_amount,2));
}

function calculate() {
	var claim_amount=0;
	var gap_amount=0;
	var act_claim_total_amt=0;
	$("#lineItems>tbody").each(function(){
		$(this).children().eq(0).children().each(function(i){
			if($(this).parent().css("display")!="none"){
				if (i==2) {
					claim_amount=eval(claim_amount+unformatNumber($(this).text().trim(),',','.'));
				}
				if (i==4) {
					gap_amount=eval(gap_amount+unformatNumber($(this).text().trim(),',','.'));
				}
				if (i==5) {
					act_claim_total_amt=eval(act_claim_total_amt+unformatNumber($(this).text().trim(),',','.'));
				}
			}
		});
	});
	$("#claim_total_amount").val(format2Number(claim_amount,2));
	$("#gap_amount").val(format2Number(gap_amount,2));
	$("#act_claim_total_amt").val(format2Number(act_claim_total_amt,2));
}

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

function insertLineFootor(tableid)
{
	tablefooter=document.createElement("tfoot");
	document.getElementById(tableid).appendChild(tablefooter);

	var footer_row=tablefooter.insertRow(-1);
	var footer_cell=footer_row.insertCell(0);

	footer_cell.scope="row";
	footer_cell.colSpan=columnNum;
	footer_cell.innerHTML="<input id='btnAddNewLine'type='button'class='buttonbtn_del'onclick='addNewLine(\""+tableid+"\")'value='+"+SUGAR.language.get('HAOS_Insurance_Claims','LBL_NEW_LINE')+"'/>";
}

function addNewLine(tableid){
	if(check_form('EditView')){//只有必须填写的字段都填写了才可以新增
		insertLineElements(tableid);//加入新行
		LineEditorShow(prodln-1);//打开行编辑器
	}
}

function CalendarShow(){//显示日历
	var Datetimepicker=$(".show_calendar");
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

	if(typeof validate!="undefined"&&typeof validate['EditView']!="undefined"){
		removeFromValidate('EditView','line_relate_insurance_number'+ln);
		removeFromValidate('EditView','line_claim_amount'+ln);
	}
	resetLineNum_Bold();
}

function LineEditorShow(ln){//显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
	if(!checkValidate('EditView','line_relate_insurance_number'+ln))
	addToValidate('EditView','line_relate_insurance_number'+ln,'varchar','true',SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_RELATE_INSURANCE_NUMBER'));
	if(!checkValidate('EditView','line_claim_amount'+ln))
	addToValidate('EditView','line_claim_amount'+ln,'varchar','true',SUGAR.language.get('HAOS_Insurance_Claims_Lines','LBL_CLAIM_AMOUNT'));
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
	calculate();
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
	$("#claim_total_amount").attr("readonly",true);
	$("#gap_amount").attr("readonly",true);
	$("#act_claim_total_amt").attr("readonly",true);
	//设置可用/不可用
	setDefault();
	$("#time").attr("readonly",true);
	$("#location").attr("readonly",true);
	$("#comment").attr("readonly",true);
});


function setDefault() {
	var module=$("#parent_type").find("option:selected").val();
	var val=$("#parent_name").val();
	if (module=='HAT_Assets'&&val!="") {
		$("#btn_relate_event_number").attr("disabled",false);
		$("#btn_relate_wo_number").attr("disabled",false);
	}else{
		$("#btn_relate_event_number").attr("disabled",true);
		$("#btn_relate_wo_number").attr("disabled",true);
	}
	var setime=setTimeout("setDefault()",500);
}

function replace_display_lines(linesHtml,elementId) {
  var lineItems=document.getElementById(elementId);
  lineItems.innerHTML=linesHtml;
}