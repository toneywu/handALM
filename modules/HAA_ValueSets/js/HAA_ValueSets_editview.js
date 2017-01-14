
//$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); // MessageBox
//$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css" />');

//如果类型为表验证,则显示表验证的子画版   detailpanel_2 
function check_type() {
	var valueset_type=document.getElementById('valueset_type').value;
	//console.log("valueset_type   " + "      " + valueset_type);
	removeFromValidate('EditView','application_table_name');
 	removeFromValidate('EditView','value_column_name');
 	removeFromValidate('EditView','value_column_size');
 	removeFromValidate('EditView','parent_flex_value_set');
 	removeFromValidate('EditView','dependant_default_value');
 	removeFromValidate('EditView','dependant_default_value_desc');
	if (valueset_type == 'F') {
		$("#detailpanel_2").show();
		$("#detailpanel_4").hide();//值集段值定义
		addToValidate('EditView','application_table_name','varchar','true',SUGAR.language.get('HAA_ValueSets','LBL_APPLICATION_TABLE_NAME'));
		addToValidate('EditView','value_column_name','varchar','true',SUGAR.language.get('HAA_ValueSets','LBL_VALUE_COLUMN_NAME'));
		addToValidate('EditView','value_column_size','varchar','true',SUGAR.language.get('HAA_ValueSets','LBL_VALUE_COLUMN_SIZE'));
	 } else {
	 	$("#detailpanel_2").hide();
	 	removeFromValidate('EditView','application_table_name');
	 	removeFromValidate('EditView','value_column_name');
	 	removeFromValidate('EditView','value_column_size');
	 	$("#detailpanel_4").show();//值集段值定义
	 }
	 if (valueset_type == 'D') {
		$("#detailpanel_3").show();
		addToValidate('EditView','parent_flex_value_set','varchar','true',SUGAR.language.get('HAA_ValueSets','LBL_PARENT_FLEX_VALUE_SET'));
		addToValidate('EditView','dependant_default_value','varchar','true',SUGAR.language.get('HAA_ValueSets','LBL_DEPENDANT_DEFAULT_VALUE'));
		addToValidate('EditView','dependant_default_value_desc','varchar','true',SUGAR.language.get('HAA_ValueSets','LBL_DEPENDANT_DEFAULT_VALUE_DESC'));
	 } else {
	 	$("#detailpanel_3").hide();
	 	removeFromValidate('EditView','parent_flex_value_set');
	 	removeFromValidate('EditView','haa_valuesets_id_c');
	 	removeFromValidate('EditView','dependant_default_value');
	 	removeFromValidate('EditView','dependant_default_value_desc');
	 }
};

function checkFormatType()
{
	var format_type = document.getElementById('format_type').value;
	//console.log("format_type   " + "      " + format_type);
	if(format_type == 'D')
	{
		$("#maximum_size").val(11);
		$("#maximum_size").attr("disabled",true);
	}
	else{
		$("#maximum_size").attr("disabled",false);
	}
};

function checkIdColumn()
{
	//console.log("id_column_name   " + "      " + $("#id_column_name").val());
	if($("#id_column_name").val() == '')
	{
		$("#id_column_size").val('');
		$("#id_column_size").attr("disabled",true);
		removeFromValidate('EditView','id_column_size');
		$("#id_column_type").val('');
		$("#id_column_type").attr("disabled",true);
		removeFromValidate('EditView','id_column_type');
		
	}
	else{
		$("#id_column_size").attr("disabled",false);
		$("#id_column_type").attr("disabled",false);
		addToValidate('EditView','id_column_size','varchar','true',SUGAR.language.get('HAA_ValueSets','LBL_ID_COLUMN_SIZE'));
		addToValidate('EditView','id_column_type','varchar','true',SUGAR.language.get('HAA_ValueSets','LBL_ID_COLUMN_TYPE'));
	}
};

function checkMeaningColumn()
{
	console.log("meaning_column_name   " + "      " + $("#meaning_column_name").val());
	if($("#meaning_column_name").val() == '')
	{
		$("#meaning_column_size").val('');
		$("#meaning_column_size").attr("disabled",true);
		removeFromValidate('EditView','meaning_column_size');
		$("#meaning_column_type").val('');
		$("#meaning_column_type").attr("disabled",true);
		removeFromValidate('EditView','meaning_column_type');
	}
	else{
		$("#meaning_column_size").attr("disabled",false);
		addToValidate('EditView','meaning_column_size','varchar','true',SUGAR.language.get('HAA_ValueSets','LBL_MEANING_COLUMN_SIZE'));
		$("#meaning_column_type").attr("disabled",false);
		addToValidate('EditView','meaning_column_type','varchar','true',SUGAR.language.get('HAA_ValueSets','LBL_MEANING_COLUMN_TYPE'));
	}
};

$(document).ready(function(){

    console.log("------------------------------------------------------------------------------------");
	$("#SAVE_FOOTER").hide();
	$("#CANCEL_FOOTER").hide();
	
	check_type();
	checkIdColumn();
	checkMeaningColumn();
	$("#valueset_type").change(function(){
		check_type();
	});
	$("#format_type").change(function(){
		checkFormatType();
	});
	$("#id_column_name").change(function(){
		checkIdColumn();
	});
	$("#meaning_column_name").change(function(){
		checkMeaningColumn();
	});
	$("#parent_flex_value_set_desc").val($("#description0").val());
	$("#parent_flex_value_set_desc").attr('disabled',true);
	

});