if(typeof(YAHOO.SUGAR) == 'undefined') {
	$.getScript("include/javascript/sugarwidgets/SugarYUIWidgets.js");
}

$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); //MessageBox
$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css" />');


$.getScript("modules/HAA_FF/ff_include.js");//load triger_setFF()
var global_eventOptions;
function call_ff() {
	triger_setFF($("#haa_ff_id").val(),"HAM_WO","DetailView");
	$(".expandLink").click();
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

	//bootstrap-dialog详细说明在：\custom\resources\bootstrap3-dialog-master\examples\index.html
	//注意在本文件头引用了，bootstrap-dialog.min.js和bootstrap-dialog.min.css
	//
	//console.log('index.php?to_pdf=true&module=HAM_WO&action=getListFields&id=' + id)
	$.ajax({
			url: 'index.php?to_pdf=true&module=HAM_WO&action=getListFields&id=' + id, //通过getListFields.php获取当前工单可选的状态
			success: function (data) {
				//如果成功的通过Ajax读取了状态列表，则显示出状态列表，并通过Dialog确认是否修改状态
				var title_txt=SUGAR.language.get('HAM_WO', 'LBL_BTN_CHANGE_STATUS_BUTTON_LABEL')
				var html="";
				html+='<label for="target_wo_status">'+title_txt+'</label>'+data;
				BootstrapDialog.confirm({
		              //type: BootstrapDialog.TYPE_DANGER,
		              title: title_txt,
		              message: html,
		              callback: function(result){
		              	if(result) {
				            	//alert('Yup.');
				                saveStatus($("input[name='record']").val(),$("#target_wo_status").val()); //
				            }else {
				                //alert('Nope.');
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
	
	var event_id = $("#hat_event_type_id").data("id-value");
		$.ajax({//
			url : 'index.php?to_pdf=true&module=HIT_IP_TRANS_BATCH&action=getEventJsonData&hat_eventtype_id='
					+ event_id,
			async : false,
			success : function(data) {
				line_data = jQuery.parseJSON(data);
				console.log(line_data);
			},
			error : function() { // 失败
				alert('Error loading document');
			}
		});
	var contract_id = $("#contract_id").data("id-value");
	if(line_data.contract_completed!=""&&line_data.contract_completed=="COMPLETED"&&contract_id==""){
		console.log(line_data.contract_completed);
		BootstrapDialog.alert({
						type : BootstrapDialog.TYPE_DANGER,
						title : SUGAR.language.get('app_strings',
								'LBL_EMAIL_ERROR_GENERAL_TITLE'),
						message : "完成工单之前请关联合同！"
					});
	}else{
		window.location.href = "index.php?module=HAM_WO&action=EditView&record="+record+"&fromWoop=Y";
	}
}

/**
 * 点击按钮 调用Ajax请求 保存
 * @param name
 */
 function saveStatus(id,status_code){
	//console.log('index.php?to_pdf=true&module=HAM_WO&action=saveStatusBean&id=' + id+"&status_code="+status_code);
	console.log(status_code);
	console.log(global_event_options.contract_completed);
	if(status_code=="SUBMITTED"&&global_event_options.contract_completed!=""&&global_event_options.contract_completed=="SUBMITTED"&&$("#contract_id").val()==""){
		console.log(global_event_options.contract_completed);
		return_flag=false;
		BootstrapDialog.alert({
						type : BootstrapDialog.TYPE_DANGER,
						title : SUGAR.language.get('app_strings',
								'LBL_EMAIL_ERROR_GENERAL_TITLE'),
						message : "提交工单之前请关联合同！"
					});
	}else{
		$.ajax({
		url: 'index.php?to_pdf=true&module=HAM_WO&action=saveStatus&id=' + id+"&status_code="+status_code,
		success: function (data) {
			window.location.href = "index.php?module=HAM_WO&action=DetailView&record="+id;
		},
			error: function () { //失败
				alert('Error loading document');
			}
		});
	}
};

/**
 * 点击按钮 调用Ajax请求 保存
 * @param name
 */
/*function cancel(id,status_code){
	window.location.href = "index.php?module=HAM_WO&action=DetailView&record="+id;
};

*/

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


/*function process_woop(woop_id,wo_id){
	//alert(record);
	console.log(woop_id+"-----"+wo_id);
	$.ajax({
		url: 'index.php?to_pdf=true&module=HAM_WOOP&action=rejectWoop&woop_id=' + id+'&wo_id='+wo_id,
		success: function (data) {
			alert("Success");
			console.log(data);
		
		},
		error: function () { //失败
			alert('Error loading document');
		}
	});
};
*/
function process_woop(woop_id,wo_id,include_reject_wo_val){
	console.log('index.php?to_pdf=true&module=HAM_WOOP&action=process_woop&record=' + woop_id+"&ham_wo_id="+wo_id+"&include_reject_wo_val="+include_reject_wo_val);
	$.ajax({
		url: 'index.php?to_pdf=true&module=HAM_WOOP&action=process_woop&record=' + woop_id+"&ham_wo_id="+wo_id+"&include_reject_wo_val="+include_reject_wo_val,
		success: function (data) {
			console.log(data);
			window.location.href = "index.php?module=HAM_WO&action=DetailView&record="+wo_id;
		},
			error: function () { //失败
				alert('Error loading document');
			}
		});
};

/**
 * 点击按钮 工序驳回,弹出POP对话框，要求选择退回的明细内容
 * @param name
 */
 function reject_woop(id){

 	$.ajax({
 		url: 'index.php?to_pdf=true&module=HAM_WOOP&action=rejectWoop&id=' + id,
 		success: function (data) {
 			var title_txt=SUGAR.language.get('HAM_WO', 'LBL_BTN_WOOP_REJECT_BUTTON_LABEL')
 			var html=""
 			html+=title_txt;
 			html+=data;
				//html+="<input type='button' class='btn_detailview' id='btn_save' value='"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+"'>";
				YAHOO.SUGAR.MessageBox.show({msg: html,title: title_txt, type: 'confirm',
					fn: function(confirm) {
						console.log("MessageBox");
						 $("#include_reject_wo").click(function(){
						 });
						 
						if (confirm == 'yes') {
							if ($("#include_reject_wo").is(':checked')) {
								$("#include_reject_wo").attr("checked", 'true');
								$("#include_reject_wo").val("0");
								$("#woop_num").attr("disabled",true);
								$('#woop_num').attr("disabled","disabled");
							} else {
								$("#include_reject_wo").removeAttr("checked");
								$("#include_reject_wo").removeAttr("disabled");
								$("#include_reject_wo").val("1");
							}
							var include_reject_wo_val = $("#include_reject_wo").val();
							
							console.log("include_reject_wo_val = "+include_reject_wo_val);
								//save($("input[name='record']").val(),$("#wo_status").val());
								//console.log($("#woop_num").val());
								//获取选择要驳回到哪一笔的工序
								process_woop($("#woop_num").val(),id,include_reject_wo_val);
							}
						}
					});
			},
			error: function () { //失败
				alert('Error loading document');
			}
		});
 };
	/**
 * 调用Ajax请求 获取是否有创建收支项权限
 * @param name
 */
 function checkEditRevenueACL(id){
 	var return_val ="";
 	return_val=$.ajax({
 		url: 'index.php?to_pdf=true&module=HAM_WO&action=checkEditRevenueACL&id=' + id,
 		success: function (data) {
 			if(data=="N"){
 				$("#create_to_revenue_button").hide();
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
	 var wo_status = $("#wo_status").val();
	 if(wo_status!="DRAFT"&&wo_status!="RETURNED"){
		 $("#delete_button").hide();
	 }
	 
	 
	 var event_id = $("#hat_event_type_id").data("id-value");
		$.ajax({//
			url : 'index.php?to_pdf=true&module=HIT_IP_TRANS_BATCH&action=getEventJsonData&hat_eventtype_id='
					+ event_id,
			async : false,
			success : function(data) {
			    global_event_options = jQuery.parseJSON(data);
				
			},
			error : function() { // 失败
				alert('Error loading document');
			}
		});

	//将Subpanel的内容前移到上方TAB中
	$("#LBL_EDITVIEW_PANEL_WOLINES").after("<div class='tab_subpanel'>"+$("#whole_subpanel_wo_line").html()+"</div>");
	$("#whole_subpanel_wo_line").replaceWith("");
	$("#LBL_EDITVIEW_PANEL_SOURCE").after("<div class='tab_subpanel'>"+$("#whole_subpanel_sr").html()+"</div>");
	$("#whole_subpanel_sr").replaceWith("");
/*	$("#wo_lines").parent("td").prev("td").hide();
showWOLines();*/

	//明细页面添加一个按钮
	var change_btn=$("<input type='button' class='btn_detailview' id='btn_change_status' value='"+SUGAR.language.get('HAM_WO', 'LBL_BTN_CHANGE_STATUS_BUTTON_LABEL')+"'>");
	$("#merge_duplicate_button").after(change_btn);
	$("#btn_change_status").click(function(){ //如果点了修改状态按钮，调用Ajax修改状态
		changeStatus($("input[name='record']").val());
	});

	/**
	 * checkAccess
	 */
	 checkAccess($("input[name='record']").val());
	 //增加创建收支项权限 osmond.liu 20161205
	 //checkEditRevenueACL
	 checkEditRevenueACL($("input[name='record']").val());
//end 

	var complete_btn=$("<input type='button' class='btn_detailview' id='btn_complete' value='"+SUGAR.language.get('HAM_WO', 'LBL_BTN_COMPLETE_BUTTON_LABEL')+"'>");
	if($("#wo_status").val()=="APPROVED"){
		$("#btn_change_status").after(complete_btn);
		//registe function cancel()
		$("#btn_complete").click(function(){ //如果取消按钮 返回
			complete_work_order($("input[name='record']").val());
		});
	}
	//add by yuan.chen
	var reject_woop_btn=$("<input type='button' class='btn_detailview' id='btn_woop_reject' value='"+SUGAR.language.get('HAM_WO', 'LBL_BTN_WOOP_REJECT_BUTTON_LABEL')+"'>");
	$("#formgetWOOPQuery").append(reject_woop_btn);
	$("#btn_woop_reject").click(function(){
		reject_woop($("input[name='record']").val());
	});

	//add by osmond.liu 20161114
	//等待前序的工序不能编辑
	var woopEdit='';
	var woopStatus='';
	$("#list_subpanel_woop table tbody tr:gt(3)").each(function(i){
		woopEdit="#woop_edit_"+(i+1);
		woopStatus=$(this).children().eq(2).text().trim();
		/*if (woopStatus=='等待前序'){
			$(woopEdit).removeAttr("href"); 
		}*/
		//add by zengchen 20161213
		var url=$(this).children().eq(1).find('a').attr('href');
		var wo_id=decodeURIComponent(url).split('=')[5];
		var action_module=$(this).children().eq(8).text().trim();
		if (action_module=="网络资源事务") {
			action_module='hit_ip_trans_batch';
		}
		if (action_module=="设备/资产事务") {
			action_module='hat_asset_trans_batch';
		}
		if(action_module=="操作"){
			var label_a_url=$(this).children().eq(8).find("a");
			var url=label_a_url.attr("href");
			if (url=="#") {
				url=label_a_url.attr("onclick");
				var url_module=url.split("=")[2];
				action_module=url_module.split("&")[0].toLowerCase();
			}else{
				var url_module=url.split("=")[1];
				action_module=url_module.split("&")[0].toLowerCase();
			}
		}
		var label_a=$(this).children().eq(7).find("a");
		var lead_url=label_a.attr("href");
		var url_arr=decodeURIComponent(lead_url).split("=");
		var leading=url_arr[5];//负责人
		var uname=label_a.text().trim();
		if(woopStatus=="等待前序"){
			$(woopEdit).removeAttr("href");
		}
		if (uname!="认领任务"&&woopStatus=="已批准") {
			var res=getDealStatu(wo_id,action_module,leading);
			if (res['leader']=="0") {
				$(this).children().eq(8).find("a").removeAttr("onclick");
				$(this).children().eq(8).find("a").removeAttr("href");
			}
			if (woopStatus=="已批准"&&res['leader']!="0"&&res['trans_status']=="CLOSED"){
				return false;//什么都不做
			}else if(woopStatus=="已批准"&&res['leader']!="0"&&res['trans_status']==null){
				return false;//什么都不做
			}else{//其他情况都移除并加上提示
				$(woopEdit).removeAttr("href");
				if(res['trans_status']=="DRAFT"){
					$(woopEdit).removeAttr("href");
					$(woopEdit).click(function(){
						alert("请将功能模块的业务处理完，再编辑工序！");
					});
				}
			}
		}
	});

	function getDealStatu(wo_id,module,leading){
		var url_addr = "index.php?module=HAM_WO&action=getStatu&to_pdf=true";
		$.ajax({
			url:url_addr,
			type:'POST',
			async: false,
			data:"&wo_id="+wo_id+"&module_name="+module+"&leading="+leading,
			success:function(res){
				res_date=JSON.parse(res);
			}
		});
		return res_date;
	}//end add 20161213
});
