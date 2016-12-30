$.getScript("cache/include/javascript/sugar_grp_yui_widgets.js"); // MessageBox
$.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");
$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); // MessageBox
$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css" />');

function setAssetSourcePopupReturn(popupReplyData){
	set_return(popupReplyData);
	//console.log(isNaN(popupReplyData.name_to_value_array.bill_quantity));
	$("#total_amount").val(popupReplyData.name_to_value_array.bill_quantity*popupReplyData.name_to_value_array.unit_price);		
}
/**
* 保存前验证
*/
function preValidateFunction(async_bool = false) {
		var result = true;
		var product_id = $("#product_id").val();
		var asset_source_id = $("#asset_source_id").val();
		var record = $("input[name=record]").val();
		var json_data ={};
		json_data.product_id=product_id;
		json_data.asset_source_id=asset_source_id;
		json_data.record=record;
		$.ajax({
			type:"POST",
			url: "index.php?to_pdf=true&module=HIT_Link_PO&action=check_asset_unique",
			data: json_data,
			cache:false,
            async:false,//重要的关健点在于同步和异步的参数，
			success: function(msg){
				error_msg=msg;
				if(error_msg!="S"){
					if(error_msg==1){
						error_msg="资源编号重复,请选择其他";
						
					}else if(error_msg==2){
						
						error_msg="请选择有效的采购订单。且不允许保存";
					}
					
					result=false;
					BootstrapDialog.alert({
							type : BootstrapDialog.TYPE_DANGER,
							title : SUGAR.language.get('app_strings',
									'LBL_EMAIL_ERROR_GENERAL_TITLE'),
							message : error_msg
						});
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				 //alert('Error loading document');
				 console.log(textStatus+errorThrown);
			},
		});

		return result;
}

$(document).ready(function(){

	$("#asset_group").attr("readonly",true);
	$("#line_number").attr("readonly",true);
	$("#asset_location").attr("readonly",true);
	$("#vendor").attr("readonly",true);
	
	$("#asset_group").css({"background-Color":"#efefef;"});
	$("#line_number").css({"background-Color":"#efefef;"});
	$("#asset_location").css({"background-Color":"#efefef;"});
	$("#vendor").css({"background-Color":"#efefef;"});
	
	SUGAR.util.doWhen("typeof OverwriteSaveBtn == 'function'", function(){
		OverwriteSaveBtn(preValidateFunction);//注意引用时不加（）
	});
});