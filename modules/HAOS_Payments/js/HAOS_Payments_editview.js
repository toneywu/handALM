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
			sum_line_amount = sum_line_amount + unformatNumber($(this).val().trim(),',','.');
		}
	});

   if(sum_line_amount == header_amount){
   	  result = true;
   	}else{
      result = false;
   	}
   	return result;
}



function check_amount(){
	//alert('234324');
	var result = true;
	var check_from_flag = check_form('EditView');
	var check_amount_flag = validateHeaderAmountAndLineAmount();
	if(check_from_flag){
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
    }else{
	 	result = false;
	}
	return result;
}

$(document).ready(function(){
    //alert('23432');

	//改写Save事件，在Save之前加入数据校验
	SUGAR.util.doWhen("typeof OverwriteSaveBtn == 'function'", function(){
		OverwriteSaveBtn(check_amount);//ff_include.js 注意preValidateFunction是一个Function，在此引用时不加（）
	});


	
});



