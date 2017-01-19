
$(document).ready(function(){

    console.log("------------------------------------------------------------------------------------");
    /*$("#name").change(function(){
		var val=$(this).val();
		var record=$("input[name='record']").val();
		if (val=="") {
			return false;
		}
		$.ajax({
			url:"index.php?module=HAA_ValueSets&action=check_name&to_pdf=true",
			data:"&name="+val+"&record="+record,
			type:"POST",//PUT
			success:function(result){
				if (result == '0') {
					$("#name").val("");
				   $("#name").attr("placeholder","值集代码已存在");
				}
			}

		});
    });*/
	$("#SAVE_FOOTER").hide();
	$("#CANCEL_FOOTER").hide();
	$("#keyword1").attr('type','password');
	$("#keyword2").attr('type','password');
	$("#keyword3").attr('type','password');
	$("#keyword4").attr('type','password');
	$("#certificate_key").attr('type','password');

	/*check_type();
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
	$("#parent_flex_value_set_desc").attr('disabled',true);*/
	
	

});