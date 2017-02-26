function setContactValReturn(popupReplyData){
	// if(popupReplyData['name_to_value_array']['counting_by_location']==1){
	// 	$("#counting_by_location").attr('checked',true);
	// }

	$("#contact_name").val(popupReplyData['name_to_value_array']['contact_name']);
	//$("#contact_number").val(popupReplyData['name_to_value_array']['contact_number']);
	$("#contact_id1_c").val(popupReplyData['name_to_value_array']['contact_id1_c']);
	set_return(popupReplyData);//标准Popup-Return函数
} 

function getPeriods(){
	var frm_id = $("#haa_frameworks_id_c").val();
	var pay_date = $("#payment_date").val();
}

function validateHeaderAmountAndLineAmount(){ 
	var sum_line_amount = 0;
	var header_amount = $('#payment_amount').val();

	$("input[id^=line_amount]").each(function(){
		if($('#line_body'+i).css("display")!="none"){
			sum_line_amount = eval(sum_line_amount + $(this).val());
		}
	});

   if(sum_line_amount == header_amount){
   	  return true;
   	}else{
      return false;
   	}
}


// $(function(){
// 	$("#SAVE").unbind("click");
// 	$("#SAVE").bind('click',function(){
// 		if(validateHeaderAmountAndLineAmount()){
// 			var _form = document.getElementById('EditView'); 
// 			_form.action.value='Save'; if(check_form('EditView'))SUGAR.ajaxUI.submitForm(_form);
// 			return false;
// 		}else{
// 			alert('行金额总和必须等于头金额');
// 		}
		
// 	})
// });