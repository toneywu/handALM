function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HAT_Asset_Trans_Batch");
    $(".expandLink").click();
}
var prodln = 0;
//var global_eventOptions;

function setEventTypePopupReturn(popupReplyData){
	if (prodln>0) {
		//如果已经有行信息，则弹出确认框在确认后才发生变化。
		//如果没有行，则直接变化
		var title_txt="!!!";
		var html=SUGAR.language.get('HAT_Asset_Trans_Batch', 'LBL_ENVENT_TYPE_CONFIRM');
		YAHOO.SUGAR.MessageBox.show({msg: html, title: title_txt,
				type: 'confirm',
				fn: function(confirm) {
					if (confirm == 'yes') {
						cleanAllTransLines()
						set_return(popupReplyData);
						setEventTypeFields();
					}
				}
			});
	} else {
		//如果还没有行，则直接执行
		set_return(popupReplyData);
		setEventTypeFields();
	}

	 call_ff();//调用FlexForm

}

function setEventTypeFields() {
	//console.log('index.php?to_pdf=true&module=HAT_EventType&action=getTransSetting&id=' + $("#hat_eventtype_id").val())//e74a5e34-906f-0590-d914-57cbe0e5ae89
	$.ajax({//
		url: 'index.php?to_pdf=true&module=HAT_EventType&action=getTransSetting&id=' + $("#hat_eventtype_id").val(),//e74a5e34-906f-0590-d914-57cbe0e5ae89
		async: false,
		success: function (data) {
			$("#eventOptions").val(data);
			resetEventType();
			if($("#haa_ff_id").val()==""){
				$("#haa_ff_id").val(jQuery.parseJSON(data).haa_ff_id);
			}
		},
		error: function () { //失败
			alert('Error loading document');
		}
	})
}

function showWOLines(wo_id) {
    console.log('index.php?to_pdf=true&module=HAM_WO&action=getWOLiness&id=' + wo_id);
        $.ajax({
            url: 'index.php?to_pdf=true&module=HAM_WO&action=getWOLiness&id=' + wo_id,
            success: function (data) {
                //console.log(data);
                $("#wo_lines_display").html(data);
            },
            error: function () { //失败
                alert('Error loading document');
            }
        });
};

function setHeaderOrganizationPopupReturn(popupReplyData) {
	set_return(popupReplyData);
	//checkLinesReady();
	//console.log(popupReplyData);
}

function resetEventType() {
//在选择了Event Type之后的相关处理，本函数被setEventTypePopupReturn调用，为实质性处理。
// 本函数在页面初始化时也会被首次调用，调用时isFirstTime=true。
	//deleted by toney.wu 20161007 不确定是否可以删除，但似乎没有需要执行的必要性了。
	/*	if (isFirstTime!=true) {
		cleanAllTransLines();
	}*/
	//本函数将change_asset_Required中的内容已经公完全实现了，没有change_asset_Required存在的必要性了
	//console.log(global_eventOptions);

	//处理头字段
	//依据事件类型，确认是否需要变化所属组织
	//

	var global_eventOptions = jQuery.parseJSON($("#eventOptions").val());

	if (global_eventOptions.check_customer_hold == "1"){
	 	$("#asset_trans_status").change(); //对客户的信息状态进行验证
	}

	if (global_eventOptions.change_owning_org == "REQUIRED"){
		mark_field_enabled('target_owning_org',false);
	} else if (global_eventOptions.change_owning_org == "OPTIONAL"){
		mark_field_enabled('target_owning_org',true);
	} else {
		mark_field_disabled('target_owning_org',false,false,false); //所属组织字段不可见,并清空当前值
	}
	if (global_eventOptions.change_owning_org == "REQUIRED"||global_eventOptions.change_owning_org == "OPTIONAL"){
		if ($("#target_owning_org_id").val()=="" && $("#source_wo_account_id").val()!="") {
			//如果当前的目标所属组织没有值，就从工单来源中复制
			//如果已经有值了，就保持不变
			$("#target_owning_org").val($("#source_wo_account").val())
			$("#target_owning_org_id").val($("#source_wo_account_id").val())
		}
	}

	//依据事件类型，确认是否需要变化使用组织
	//console.log(global_eventOptions.change_using_org);
	if (global_eventOptions.change_using_org == "REQUIRED"){ //必须提供使用组织及日期范围
		mark_field_enabled('target_using_org',false);
	} else if (global_eventOptions.change_using_org == "OPTIONAL"){
		mark_field_enabled('target_using_org',true);
	} else {
		mark_field_disabled('target_using_org',false,false,false); //使用组织字段不可见,并清空当前值
	}

	//如果需要变化（包括必须变化和可以变化2种场景，就从工作单上进行默认）
	//console.log("source_wo_account:"+$("#source_wo_account").val());
	if ($("#source_wo_account").val()!="" && (global_eventOptions.change_using_org == "REQUIRED"||global_eventOptions.change_using_org == "OPTIONAL")){
		$("#target_using_org").val($("#source_wo_account").val())
		$("#target_using_org_id").val($("#source_wo_account_id").val())
	}

	//处理行字段
	loopField("line_target_owning_org",global_eventOptions.change_owning_org);

	loopField("line_target_using_org",global_eventOptions.change_using_org);
	loopField("line_target_using_org_id",global_eventOptions.change_using_org);

	loopField("line_target_rack_position_desc",global_eventOptions.change_rack_position);

	//add by  yuan.chen
	loopField("line_target_parent_asset",global_eventOptions.change_parent);
	//add by  osmond.liu 20161123 增加资产地点的限制
	loopField("line_target_location",global_eventOptions.change_location);
	loopField("line_target_location_desc",global_eventOptions.change_location);
//end modefy osmond.liu 20161123
	//开始与结束时间根据使用组织及人员进行显示，不单独进行处理 deleted toney.wu 改到Using_org中
/*	loopField("line_date_start",global_eventOptions.change_asset_date_end);
	loopField("line_date_end",global_eventOptions.change_asset_date_start);
*/	//状态不单独进行处理，已经有了 deleted toney.wu
/*	loopField("line_status",global_eventOptions.change_asset_status);
*/	//end 

   if (global_eventOptions.change_owning_person=="INVISIABLE") {
		loopField("line_target_owning_person","INVISIABLE");
		loopField("line_target_owning_person_desc","INVISIABLE");
   }else{
   		  //在头的Views中会加载Framework中的属性。决定资产的使用人及负责人字段是值列表还是文字
		if (typeof using_person_field_rule== "undefined" || using_person_field_rule=="TEXT") { //判断使用人字段是列表还是文本框
			loopField("line_target_owning_person","INVISIABLE");
			loopField("line_target_owning_person_desc",global_eventOptions.change_owning_person);
		} else {
			loopField("line_target_owning_person",global_eventOptions.change_owning_person);
			loopField("line_target_owning_person_desc","INVISIABLE");
		}
   };

   if (global_eventOptions.change_using_person=="INVISIABLE") {
		loopField("line_target_using_person","INVISIABLE");
		loopField("line_target_using_person_desc","INVISIABLE");
   }else{
   		  //在头的Views中会加载Framework中的属性。决定资产的使用人及负责人字段是值列表还是文字
   		if (typeof owning_person_field_rule== "undefined" || owning_person_field_rule=="TEXT") {//判断负责人字段是列表还是文本框
			loopField("line_target_using_person","INVISIABLE");
			loopField("line_target_using_person_desc",global_eventOptions.change_using_person);
		} else {
			loopField("line_target_using_person",global_eventOptions.change_using_person);
			loopField("line_target_using_person_desc","INVISIABLE");
		}
   };

}


function cleanAllTransLines() {

	//重新清空所有的行
	//REF custom\modules\HAT_Asset_Trans\js\line_items.js
	if (prodln>0) {
		for(var i=0;i<prodln;i++ ) {
			markLineDeleted(i ,"line_");
		}
	}
}

function initTransHeaderStatus() {
	var current_header_status = $("#asset_trans_status").val();
	if (current_header_status=="DRAFT") {//可以DRAFT和SUBMIT
		$("#asset_trans_status option[value='APPROVED']").remove();
		$("#asset_trans_status option[value='REJECTED']").remove();
		$("#asset_trans_status option[value='CANCELED']").remove();
		$("#asset_trans_status option[value='CLOSED']").remove();
		$("#asset_trans_status option[value='TRANSACTED']").remove();
	} else if (current_header_status=="SUBMITTED") { //可以CANCEL和SUBMIT
		$("#asset_trans_status option[value='APPROVED']").remove();
		$("#asset_trans_status option[value='REJECTED']").remove();
		//$("#asset_trans_status option[value='DRAFT']").remove();
		$("#asset_trans_status option[value='CLOSED']").remove();
		$("#asset_trans_status option[value='TRANSACTED']").remove();
		setEditViewReadonly ();
	} else if ((current_header_status=="APPROVED")) { //可以CANCEL,APPROVED
		$("#asset_trans_status option[value='SUBMITTED']").remove();
		$("#asset_trans_status option[value='REJECTED']").remove();
		$("#asset_trans_status option[value='DRAFT']").remove();
		$("#asset_trans_status option[value='CLOSED']").remove();
		$("#asset_trans_status option[value='TRANSACTED']").remove();
		setEditViewReadonly ();
	} else if ((current_header_status=="CANCELED")) { //可以CANCEL,APPROVED
		$("#asset_trans_status option[value='SUBMITTED']").remove();
		$("#asset_trans_status option[value='REJECTED']").remove();
		$("#asset_trans_status option[value='DRAFT']").remove();
		$("#asset_trans_status option[value='APPROVED']").remove();
		$("#asset_trans_status option[value='CLOSED']").remove();
		$("#asset_trans_status option[value='TRANSACTED']").remove();
		$("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
		setEditViewReadonly ();
	}else if ((current_header_status=="CLOSED")) { //可以CANCEL,APPROVED
		$("#asset_trans_status option[value='SUBMITTED']").remove();
		$("#asset_trans_status option[value='REJECTED']").remove();
		$("#asset_trans_status option[value='DRAFT']").remove();
		$("#asset_trans_status option[value='APPROVED']").remove();
		$("#asset_trans_status option[value='CANCELED']").remove();
		$("#asset_trans_status option[value='TRANSACTED']").remove();
		$("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
		setEditViewReadonly ();
	}
}

function setEditViewReadonly () { //如果当前头状态为Submitted、Approved、Canceled、Closed需要将字段变为只读
/*	$("#Default_HAT_Asset_Trans_Batch_Subpanel input").attr("readonly",true);
	$("#Default_HAT_Asset_Trans_Batch_Subpanel input").attr("style","background-Color:#efefef");

*/	//将文本显示在Input之后
	$("#Default_HAT_Asset_Trans_Batch_Subpanel input[type=text]").each(function(){
	    $(this).after($(this).val());
	  });
	//将文本变为Hidden
	$("#Default_HAT_Asset_Trans_Batch_Subpanel input[type=text]").each(function() {
	   $("<input type='hidden' />").attr({ id: this.id, name: this.name, value: this.value }).insertBefore(this);
	}).remove();
	//将按钮去除
	$("#Default_HAT_Asset_Trans_Batch_Subpanel button,#Default_HAT_Asset_Trans_Batch_Subpanel .input-group-addon").hide();

	//TODO：行上的禁用没有处理
}

function getLovValueByText(focused_textfiled_id,list_Lov_id) { //根据LOV的Text，转为Value
	var LovValue, LovText;
	LovText = $("#"+focused_textfiled_id).val();
	LovValue = $("#"+list_Lov_id+" option").filter(function() {return $(this).html() == LovText;}).val();
	return LovValue;
}

$(document).ready(function(){

	if($('#haa_ff_id').length==0) {//如果对象不存在就添加一个
		$("#EditView").append('<input id="haa_ff_id" name="haa_ff_id" type=hidden>');
	}
	SUGAR.util.doWhen("typeof setFF == 'function'", function(){
		call_ff();
	});

	//add by yuan.chen
	if(typeof source_wo_id_tt!="undefined"){
		$("#CANCEL_HEADER").bind("click",function(){
			SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module=HAM_WO&record='+source_wo_id_tt)
		});	
	};
	
	
	$("#source_woop_id").val(source_woop_id);
	$("#source_wo_id").val(source_wo_id);


	SUGAR.util.doWhen("typeof mark_field_disabled != 'undefined'", function(){
		if ($("#hat_eventtype_id").val() != "") {
			setEventTypeFields();//初始化EventType，完成后会将EventType的值写入eventOptions这一隐藏字段
		}
	})


	initTransHeaderStatus();

    $("#wo_lines").hide();
    $("#wo_lines").after("<div id='wo_lines_display'></div>")
    if ($("#source_wo_id").val()!="") {
    	//如果来源于工作单则显示工作单对象行信息，否则直接隐藏行
    	showWOLines($("#source_wo_id").val());
    } else {
		$("#wo_lines").parent("td").prev("td").hide();
    }


/*	//提交时做客户的信息检查，如果当前客户有值，并且头状态为提交，则进行信息检查
	$("#asset_trans_status").change(function(){
		//注意：这里只对头上的做了验证，没有去验证行
			if($("#eventOptions").val()=="") {
				return

		var global_eventOptions = jQuery.parseJSON($("#eventOptions").val());


		if (global_eventOptions.check_customer_hold == "1"){
			console.log("checking");
			if ($("#source_wo_id").val()!="" && $(this).children('option:selected').val()=="SUBMITTED") {

				console.log('index.php?to_pdf=true&module=HAA_FF&action=validateField&mode=woaccounthold&id=' + $("#source_wo_id").val())
				$.ajax({//
					url: 'index.php?to_pdf=true&module=HAA_FF&action=validateField&mode=woaccounthold&id=' + $("#source_wo_id").val(),
					async: false,
					success: function (data) {
						console.log("checked result="+data);
						clear_all_errors();
						if (data=='0') {
							add_error_style('EditView','asset_trans_status',SUGAR.language.get('app_strings', 'LBL_CUSTOMER_HOLD_ERR'));
						}
					},//end sucess
					error: function () { //失败
						alert('Error loading AJAX for status check');
					}//end error
				});//end ajax
			}//end if
		}
	})//end onChange function
*/

	function preValidateFunction(async_bool = false) {
		//验证当前如果状态是Submit则用户是否有暂挂冲突
		////如果是onChang校验，可以FFCheckField的async_bool=true这个输入过程与校验过程同步
		///但如果是SAVE按钮的触发，一定要async=false(保持默认)
		if($("#eventOptions").val()=="") {
				return
		}

		var result = true;
		var global_eventOptions = jQuery.parseJSON($("#eventOptions").val());

		if ($("#asset_trans_status").val()=="SUBMITTED") {//如果是提交状态，进行客户信息检查
			if (global_eventOptions.check_customer_hold_c_owning == "1"){
			//针对当前使用组织进行信息检查，如在报废或移出资产前确认，当前资产的拥有方是否有欠费行为
				var ajaxStr='mode=accounthold&val='+$("#name").val()+'&id=' + $("#current_owning_org_id").val();
				var errMSG = SUGAR.language.get('app_strings', 'LBL_CUSTOMER_HOLD_ERR');
				result= FFCheckField('current_owning_org',ajaxStr,errMSG,async_bool);
			}
			//针对当前的目前使用组织进行检查，如在分配资产前确认当前用户是否有不良信用。
			//因为FFCheckField会将已经的错误清除，所以如果当前已经报错（Result=false)就不再继续进行额外的校验了。
			if (result==true && global_eventOptions.check_customer_hold_t_using == "1"){
				var ajaxStr='mode=accounthold&val='+$("#name").val()+'&id=' + $("#target_using_org_id").val();
				var errMSG = SUGAR.language.get('app_strings', 'LBL_CUSTOMER_HOLD_ERR');
				result= FFCheckField('target_using_org',ajaxStr,errMSG,async_bool);
			}

		}
		return result
	}

	$("#asset_trans_status").change(function(){
		//验证当前地点代码是否唯一
		preValidateFunction(true)//如果是onChang校验，可以FFCheckField的async_bool=true这个输入过程与校验过程同步
	})//end onChange function


	SUGAR.util.doWhen("typeof OverwriteSaveBtn == 'function'", function(){
		OverwriteSaveBtn(preValidateFunction);//注意引用时不加（）
	});


})