$.getScript("modules/HAA_FF/ff_include.js");
$.getScript("cache/include/javascript/sugar_grp_yui_widgets.js"); // MessageBox
$.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");
$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); // MessageBox
$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css" />');
function setOwningOrgPopupReturn(popupReplyData){//选择完所属组织的动作
	set_return(popupReplyData);
	$("#owning_person").val("");//因为组织变化了，对应的人员也一定会变化，因此将人员字段清空后，手工重新选择。
	$("#owning_person_id").val("");
}
function setUsingOrgPopupReturn(popupReplyData){//选择完使用组织的动作
	set_return(popupReplyData);
	$("#using_person").val("");//因为组织变化了，对应的人员也一定会变化，因此将人员字段清空后，手工重新选择。
	$("#using_person_id").val("");
}


function setAssetGroupPopupReturn(popupReplyData){//选择地点类型后
    set_return(popupReplyData);
    call_ff();
}

function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HIT_Racks");
    $(".expandLink").click();
}


function check_source_qty(){
		var return_status="S";
		var json_data={};
		json_data['record']=$("input[name=record]").val();
		json_data['asset_source_id']=$("#asset_source_id").val();

		$.ajax({
			type:"POST",
			url: "index.php?to_pdf=true&module=HIT_Racks&action=checkSourceCount",
			data: json_data,
			cache:false,  
            async:false,//重要的关健点在于同步和异步的参数，  
			success: function(msg){ 
					console.log(msg);

					$result_json=jQuery.parseJSON(msg);
					console.log($result_json.status);
					console.log($result_json.msg);
					return_status=$result_json.status;
					if($result_json.status!='S'){
						BootstrapDialog.alert({
							type : BootstrapDialog.TYPE_DANGER,
							title : SUGAR.language.get('app_strings',
									'LBL_EMAIL_ERROR_GENERAL_TITLE'),
							message : $result_json.msg
						});
					}
					},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				 //alert('Error loading document');
				 console.log(textStatus+errorThrown);
			},
		});
		return return_status;
}

function check_unique_name(){
		var return_status="S";
		var json_data={};
		json_data['record']=$("input[name=record]").val();
		json_data['name']=$("#name").val();
		json_data['asset_number']=$("#asset_number").val();

		$.ajax({
			type:"POST",
			url: "index.php?to_pdf=true&module=HIT_Racks&action=checkUniqueName",
			data: json_data,
			cache:false,  
            async:false,//重要的关健点在于同步和异步的参数，  
			success: function(msg){ 
					console.log("check_unique_name="+msg);
					$result_json=jQuery.parseJSON(msg);
					return_status=$result_json.status;
					if($result_json.status!='S'){
						BootstrapDialog.alert({
							type : BootstrapDialog.TYPE_DANGER,
							title : SUGAR.language.get('app_strings',
									'LBL_EMAIL_ERROR_GENERAL_TITLE'),
							message : $result_json.msg
						});
					}
					},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				 //alert('Error loading document');
				 console.log(textStatus+errorThrown);
			},
		});
		return return_status;
}


/**
* 保存前验证
*/

function preValidateFunction(async_bool = false) {
		var result = true;
		var error_msg="S";
		var return_status = check_source_qty();
		if(return_status!="S"){
			return;
		}
	    var return_status_name = check_unique_name();
		if(return_status_name!="S"){
			return;
		}
		return result;
}

$(document).ready(function() {
	
	SUGAR.util.doWhen("typeof OverwriteSaveBtn == 'function'", function(){
		OverwriteSaveBtn(preValidateFunction);//注意引用时不加（）
	});
	
	
	
    //这里可以有其它代码;
		if($('#haa_ff_id').length==0) {//如果对象不存在就添加一个
				$("#EditView").append('<input id="haa_ff_id" name="haa_ff_id" type=hidden>');
		}

    //触发FF
    SUGAR.util.doWhen("typeof setFF == 'function'", function(){
        call_ff();
    });
});

