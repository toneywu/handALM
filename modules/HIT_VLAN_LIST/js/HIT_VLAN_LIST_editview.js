
$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); 

function OverwriteSaveBtn(preValidateFunction) {
	SaveBtn = $('#SAVE_HEADER, #SAVE_FOOTER');
	//Add by zhangling 20170215
	if (SaveBtn !== null || SaveBtn !== undefined || SaveBtn !== '') {
		SaveBtn = $('.button.primary');
	} 
	//End add on 20170215
	SaveBtn.removeAttr('onclick');
	SaveBtn.attr("type","button"); //防止有Submit类的Button会自动提交，因此将类型变为Button

	SaveBtn.click(function(){
		//因为数据校验可能需要时间，在此可以先进行用户提示
		//因为Ajax检查时间可能很长，因此在检查前先显示出Dialog提示用户

		//setTimeout(SaveBtn.addClass("disabled").attr("disabled",true), 1000);
  		//SaveBtn.addClass("disabled").attr("disabled",true);
		var validateResult = preValidateFunction();

		//Updated by zhangling 20170215
		//if ($(".validation-message").length==0 && validateResult) {//如果验证没有问题
		if (validateResult) {//如果验证没有问题
		//End Updated on 20170215
			//执行Save按钮正常执行的内容
			validateResult = check_form('EditView');//通过标准的check_form再做一次校验
			if (validateResult) {
				BootstrapDialog.show({
            		message: "<img src='"+SUGAR.themes.loading_image+"'/> "+SUGAR.language.get('app_strings', 'LBL_SAVING')+" & "+SUGAR.language.get('app_strings', 'LBL_LOADING_PAGE'),
        		});
 				//以下是Save按钮标准的保存内容
 				var _form = document.getElementById('EditView'); _form.action.value='Save'; if(validateResult)SUGAR.ajaxUI.submitForm(_form);return false;
 			}
		} else {
			//console.log("Something wrong");
  			//SaveBtn.removeClass("disabled").attr("disabled",false);
/*			BootstrapDialog.show({
        		message: SUGAR.language.get('app_strings', 'LBL_EMAIL_ERROR_GENERAL_TITLE'),
        		type:BootstrapDialog.TYPE_WARNING,
    		});			//dialog.close();
*/		}

	// /save_and_continue 在修改时会存在，新增时不存在
	});

	if ($("#save_and_continue").length>0) {
		SaveCtiBtn = $('#save_and_continue');
		SaveCtiBtn.removeAttr('onclick');
		SaveCtiBtn.attr("type","button"); //防止有Submit类的Button会自动提交，因此将类型变为Button

		SaveCtiBtn.click(function(){
			//因为数据校验可能需要时间，在此可以先进行用户提示
			var validateResult = preValidateFunction();
			if ($(".validation-message").length==0 && validateResult) {//如果验证没有问题
				//执行Save按钮正常执行的内容
				validateResult = check_form('EditView');//通过标准的check_form再做一次校验
				if (validateResult) {
					BootstrapDialog.show({
	            		message: "<img src='"+SUGAR.themes.loading_image+"'/> "+SUGAR.language.get('app_strings', 'LBL_SAVING')+" & "+SUGAR.language.get('app_strings', 'LBL_LOADING_PAGE'),
	        		});
	 				//以下是Save按钮标准的保存内容
					this.form.action.value='Save';if(check_form('EditView')){sendAndRedirect('EditView', 'Saving HAT_Asset_Locations...', '?action=ajaxui#ajaxUILoc=index.php%3Faction%3DEditView%26module%3DHAT_Asset_Locations%26record%3Db65eb9e1-0bf7-baf7-d775-58071f913196%26offset%3D2');}	 			}
			} else {
					console.log("Something wrong")
			}
		});
	};

}

//add by liu 
function checkVLAN(){
	var error_msg="S";
	var re = /^[0-9]+.?[0-9]*$/; //判断字符串是否为数字 //判断正整数 /^[1-9]+[0-9]*]*$/ 
	if (!re.test($("#name").val())) {
		error_msg = "VLAN编号只能为数字";
		BootstrapDialog.alert({
			type : BootstrapDialog.TYPE_DANGER,
			title : SUGAR.language.get('app_strings',
				'LBL_EMAIL_ERROR_GENERAL_TITLE'),
			message : error_msg
		});
	}else{
		var vlan_num = parseInt($("#name").val(), 10);
		if (vlan_num < 0 || vlan_num>4096) {
			error_msg = "VLAN编号只能在0~4096之间";
			BootstrapDialog.alert({
				type : BootstrapDialog.TYPE_DANGER,
				title : SUGAR.language.get('app_strings',
					'LBL_EMAIL_ERROR_GENERAL_TITLE'),
				message : error_msg
			});
		}else{
			var json_data ={};
			json_data['vlan_id']=$("input[name='record']").val();
			json_data['vlan_name']=$("#name").val();

			$.ajax({
				url:'index.php?to_pdf=true&module=HIT_VLAN_LIST&action=checkVLAN',
				data: json_data,
				type:"POST",
				async:false,
				success: function (msg) {
					error_msg=msg;
					console.log("checkVLAN = "+error_msg);
					if(error_msg!="S"&&error_msg!=""){

						BootstrapDialog.alert({
							type : BootstrapDialog.TYPE_DANGER,
							title : SUGAR.language.get('app_strings',
								'LBL_EMAIL_ERROR_GENERAL_TITLE'),
							message : error_msg
						});
					}
				},
	            error: function () { //失败
	            	alert('Error loading document');
	            }
        	});
        }
    }
	return error_msg;
}

function preValidateFunction(async_bool = false) {
	var result = true;
	var error_msg="S";

	var return_status = checkVLAN();
	if(return_status!="S"&&return_status!=""){
		return;
	}
	console.log("end checkVLAN return_status:"+return_status);

	return result;
}

$(document).ready(function(){
    console.log("++++++++++++++++++++++++++++++++++++++++");
	//改写Save事件，在Save之前加入数据校验
	SUGAR.util.doWhen("typeof OverwriteSaveBtn == 'function'", function(){
		console.log("-----------------------------------------");
		OverwriteSaveBtn(preValidateFunction);//ff_include.js 注意preValidateFunction是一个Function，在此引用时不加（）
	});
});