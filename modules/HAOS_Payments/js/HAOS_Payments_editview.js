$.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");
$.getScript("modules/HAA_FF/ff_include.js");
$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); // MessageBox

function setContactValReturn(popupReplyData){
	// if(popupReplyData['name_to_value_array']['counting_by_location']==1){
	// 	$("#counting_by_location").attr('checked',true);
	// }

	$("#contact_name").val(popupReplyData['name_to_value_array']['contact_name']);
	//$("#contact_number").val(popupReplyData['name_to_value_array']['contact_number']);
	$("#contact_id1_c").val(popupReplyData['name_to_value_array']['contact_id1_c']);
	set_return(popupReplyData);//标准Popup-Return函数
} 


function validateHeaderAmountAndLineAmount(){ 
	var result = true;
	var sum_line_amount = 0;
	var header_amount = unformatNumber($('#payment_amount').val().trim(),',','.');

	$("input[id^=line_amount]").each(function(){
		if($('#line_body'+i).css("display")!="none"){
			sum_line_amount = eval(sum_line_amount + unformatNumber($(this).val().trim(),',','.'));
		}
	});
	console.log('h::'+header_amount);
	console.log('l::'+sum_line_amount);
	if(sum_line_amount == header_amount){
		result = true;
	}else{
		result = false;
	}
	return result;
}

function getPeriod(){
	var dateTime=document.getElementById("payment_date").value;
	console.log(dateTime);
	var frame_id=document.getElementById("haa_frameworks_id_c").value;
	if(dateTime)
	{
		$.ajax({
            //async:false,
            url: 'index.php?to_pdf=true&module=HAOS_Payments&action=getPeriod',
            data: {'dateTime':dateTime,'frame_id':frame_id},
            type:'POST',
            dataType: "json",
            success: function (data) {//调用方法。
                //data=$.parseJSON(data);
                //data=JSON.parse(data);
                console.log(data);
                $("#haa_periods_id_c").val(data.id); 
                $("#period_name").val(data.name);

            }
        });
	}
}

function check_amount(){
	//alert('234324');
	var result = true;
	//var check_from_flag = check_form('EditView');
	var check_amount_flag = validateHeaderAmountAndLineAmount();
	//if(check_from_flag){
		if(check_amount_flag){
			result = true;
		}else{
			BootstrapDialog.alert({
				type : BootstrapDialog.TYPE_DANGER,
				title : '验证失败',
				message : '行金额总和必须等于头金额'
			});
			result = false;
		}
 //    }else{
	//  	result = false;
	// }
	return result;
}

function editControl(){

	//document.getElementsByTagName('input').disabled=true;
	if($('input[name=record]').val()){
		
		var inputArr=$('#EditView_tabs input');
		var inputArrLength=inputArr.length;
		for(var i=0;i<inputArrLength;i++){
			inputArr[i].disabled=true;
		}

		var selectArr=$('#EditView_tabs select');
		var selectArrLength=selectArr.length;
		for(var i=0;i<selectArrLength;i++){
			selectArr[i].disabled=true;
		}

		var buttonArr=$('#EditView_tabs button');
		var buttonArrLength=buttonArr.length;
		for(var i=0;i<buttonArrLength;i++){
			buttonArr[i].disabled=true;
		}

		var textareaArr=$('#EditView_tabs textarea');
		var textareaArrLength=textareaArr.length;
		for(var i=0;i<textareaArrLength;i++){
			textareaArr[i].disabled=true;
		}
		//
		var invInputArr=$('input[id^="line_invoice_id"]');
		var invInputArrLength=invInputArr.length;
		for(var i=0;i<invInputArrLength;i++){
			invInputArr[i].disabled=false;
		}

		var lineIdInputArr=$('input[id^="line_id"]');
		var lineIdInputArrLength=lineIdInputArr.length;
		for(var i=0;i<lineIdInputArrLength;i++){
			lineIdInputArr[i].disabled=false;
		}

		var lineDelInputArr=$('input[id^="line_deleted"]');
		var lineDelInputArrLength=lineDelInputArr.length;
		for(var i=0;i<lineDelInputArrLength;i++){
			lineDelInputArr[i].disabled=false;
		}
		// var spanArr=$('.datetimepicker.datetimepicker-dropdown-bottom-right.dropdown-menu');
		// var spanArrLength=spanArr.length;
		// for(var i=0;i<spanArrLength;i++){
		// 	spanArr[i].disabled=true;
		// }

		if($('#payment_status').val()=='P'){
			document.getElementById('payment_status').removeAttribute('disabled');
			//$('#payment_status').removeAttribute('disabled');
		}

		
	}
}

$(document).ready(function(){
	//alert('23432');
	editControl();
	//改写Save事件，在Save之前加入数据校验
	SUGAR.util.doWhen("typeof OverwriteSaveBtn == 'function'", function(){
		OverwriteSaveBtn(check_amount);//ff_include.js 注意preValidateFunction是一个Function，在此引用时不加（）
	});


	
});



