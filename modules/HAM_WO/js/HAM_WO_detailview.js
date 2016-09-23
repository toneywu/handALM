if(typeof(YAHOO.SUGAR) == 'undefined') {
	$.getScript("include/javascript/sugarwidgets/SugarYUIWidgets.js");
}

/**
 * 通过Ajax显示工作单行
 * @param name
 */
function showWOLines() {
	console.log('index.php?to_pdf=true&module=HAM_WO&action=getWOLiness&id=' + $("input[name=record]").val());
		$.ajax({
			url: 'index.php?to_pdf=true&module=HAM_WO&action=getWOLiness&id=' + $("input[name=record]").val(),
			success: function (data) {
				//console.log(data);
				$("#wo_lines").html(data);
			},
			error: function () { //失败
				alert('Error loading document');
			}
		});
};

/**
 * 点击按钮 调用Ajax请求 获取list里面根据工单状态应该显示的value
 * @param name
 */
function changeStatus(id){

	/*var flag= window.confirm("是否需要修改状态?");
	if(flag){*/
	//修改状态变更的样式 by:toney.wu 20160903
	//ref:https://developer.sugarcrm.com/2011/03/18/howto-create-nice-looking-popup-message-boxes-in-sugar/

		$.ajax({
			url: 'index.php?to_pdf=true&module=HAM_WO&action=getListFields&id=' + id,
			success: function (data) {
				var title_txt=SUGAR.language.get('HAM_WO', 'LBL_BTN_CHANGE_STATUS_BUTTON_LABEL')
				var html=""
				html+=title_txt;
				html+=data;
				//html+="<input type='button' class='btn_detailview' id='btn_save' value='"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+"'>";
				YAHOO.SUGAR.MessageBox.show({msg: html,title: title_txt, type: 'confirm',
																		fn: function(confirm) {
																			if (confirm == 'yes') {
																				save($("input[name='record']").val(),$("#wo_status").val());
																			}
																		}
											});
			},
			error: function () { //失败
				alert('Error loading document');
			}
		});
	/*}*/
};

function assignWoop(id,record){
	//alert(record);
	$.ajax({
		url: 'index.php?to_pdf=true&module=HAM_WOOP&action=assign_woop_people&id=' + id,
		success: function (data) {
			//alert(data);
			if(data!="Y"){
				window.location.href = "index.php?module=HAM_WO&action=DetailView&record="+record;
			}
		},
		error: function () { //失败
			alert('Error loading document');
		}
	});
}



function complete_work_order(record){
	//alert(record);
	window.location.href = "index.php?module=HAM_WO&action=EditView&record="+record+"&fromWoop=Y";
}

/**
 * 点击按钮 调用Ajax请求 保存
 * @param name
 */
function save(id,status_code){
		$.ajax({
			url: 'index.php?to_pdf=true&module=HAM_WO&action=saveBean&id=' + id+"&status_code="+status_code,
			success: function (data) {
				window.location.href = "index.php?module=HAM_WO&action=DetailView&record="+id;
			},
			error: function () { //失败
				alert('Error loading document');
			}
		});
};

/**
 * 点击按钮 调用Ajax请求 保存
 * @param name
 */
function cancel(id,status_code){
	window.location.href = "index.php?module=HAM_WO&action=DetailView&record="+id;
};



/**
 * 点击按钮 调用Ajax请求 获取权限
 * @param name
 */
function checkAccess(id){
	var return_val ="";
	return_val=$.ajax({
			url: 'index.php?to_pdf=true&module=HAM_WO&action=checkAccess&id=' + id,
			success: function (data) {
				if(data=="N"){
					$("#btn_change_status").hide();
					$("#edit_button").hide();
				}
			},
			error: function () {
				alert('Error loading document');
			}
		});
};

/**
 * document 页面加载 入口函数
 */
$(document).ready(function(){

	//明细页面添加一个按钮
	var change_btn=$("<input type='button' class='btn_detailview' id='btn_change_status' value='"+SUGAR.language.get('HAM_WO', 'LBL_BTN_CHANGE_STATUS_BUTTON_LABEL')+"'>");
	var save_btn=$("<input type='button' class='btn_detailview' id='btn_save' value='"+SUGAR.language.get('HAM_WO', 'LBL_BTN_SAVE_BUTTON_LABEL')+"'>");
	var cancel_btn=$("<input type='button' class='btn_detailview' id='btn_cancel' value='"+SUGAR.language.get('HAM_WO', 'LBL_BTN_CANCEL_BUTTON_LABEL')+"'>");

	$("#merge_duplicate_button").after(change_btn);

/*	$("#wo_lines").parent("td").prev("td").hide();
	showWOLines();*/

	//将Subpanel的内容前移到上方TAB中
	$("#LBL_EDITVIEW_PANEL_WOLINES").after("<div class='tab_subpanel'>"+$("#whole_subpanel_wo_line").html()+"</div>");
	$("#whole_subpanel_wo_line").html("");
	$("#LBL_EDITVIEW_PANEL_SOURCE").after("<div class='tab_subpanel'>"+$("#whole_subpanel_sr").html()+"</div>");
	$("#whole_subpanel_sr").html("");


	$("#btn_change_status").click(function(){ //如果点了修改状态按钮，调用Ajax修改状态

		$("#btn_change_status").after(save_btn);
		$("#btn_save").after(cancel_btn);

		//registe function save()
		$("#btn_save").click(function(){ //如果保存按钮 保存记录
			save($("input[name='record']").val(),$("#wo_status").val());
		   }
		);
		//registe function cancel()
		$("#btn_cancel").click(function(){ //如果取消按钮 返回
			cancel($("input[name='record']").val(),$("#wo_status").val());
		   }
		);
		////registe function changeStatus()
		changeStatus($("input[name='record']").val());
	   }
	);

	/**
	 * checkAccess
	 */
	checkAccess($("input[name='record']").val());
	
	
	var complete_btn=$("<input type='button' class='btn_detailview' id='btn_complete' value='"+SUGAR.language.get('HAM_WO', 'LBL_BTN_COMPLETE_BUTTON_LABEL')+"'>");
	if($("#wo_status").val()=="APPROVED"){
		$("#btn_change_status").after(complete_btn);
		//registe function cancel()
		$("#btn_complete").click(function(){ //如果取消按钮 返回
			complete_work_order($("input[name='record']").val());
		   }
		);
	}
	
	
}
);