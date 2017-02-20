$.getScript("cache/include/javascript/sugar_grp_yui_widgets.js"); // MessageBox
$.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");
$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); // MessageBox
$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css" />');
function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HIT_IP_TRANS_BATCH");
    $(".expandLink").click();
}

var prodln = 0;
var global_eventOptions;

function setEventTypePopupReturn(popupReplyData){
	set_return(popupReplyData);
	setEventTypeFields();
	call_ff();
	
	
		var event_id = $("#hat_eventtype_id").val();
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


function setTargetOwningOrgPopupReturn(popupReplyData){
	set_return(popupReplyData);
	if($("#target_owning_org").val()=="") {
		$("#contact_name").val("");
		$("#account_id").val("");
		$("#email").val("");
	}else{
		mark_field_enabled("contact_name",true);
	}
}


function setEventTypeFields() {
	console.log("setEventTypeFields = "+$("#hat_eventtype_id").val());
	$.ajax({//
		url: 'index.php?to_pdf=true&module=HAT_EventType&action=getTransSetting&id=' + $("#hat_eventtype_id").val(),//e74a5e34-906f-0590-d914-57cbe0e5ae89
		async: false,
		success: function (data) {
			global_eventOptions = jQuery.parseJSON(data);
			console.log(global_eventOptions);

			var obj = jQuery.parseJSON(data);
			//console.log(obj);
			for(var i in obj) {
				$("#"+i).val(obj[i]);//向隐藏的字段中复制值，从而所有的EventType值都会提供到隐藏的字段中
			}
			resetEventType(data);
		},
		error: function () { //失败
			alert('Error loading document');
		}
	})
}

function resetEventType(data){
	var global_eventOptions = jQuery.parseJSON(data);

	if (global_eventOptions.no_add_ip_lines_flag == "1"){
	 	$("#btnAddNewLine").attr("disabled","disabled"); 
	 	$("#btnCopyLine").attr("disabled","disabled");
	 	$("#btnAddLine").attr("disabled","disabled");
	 	
	}else{
		$("#btnAddNewLine").removeAttr("disabled"); 
	 	$("#btnCopyLine").removeAttr("disabled");
	 	$("#btnAddLine").removeAttr("disabled");
	}
}

function setWoPopupReturn(popupReplyData){
	set_return(popupReplyData);
	//console.log(popupReplyData);
	$("location_id").val(popupReplyData.name_to_value_array.location_id);
	//console.log(popupReplyData.name_to_value_array.location_id);
	if($("#source_wo").val()=="") {
		$("#source_woop").val("");
		$("#source_woop_id").val("");
		mark_field_disabled("source_woop",false);
	}else{
		mark_field_enabled("source_woop",true);
	}
}

function validate_form_message(){
	$(".validation-message").each(function(){
		console.log("error_message = "+$(this).text());
		if($(this).text()!=""){
			BootstrapDialog.alert({
						type : BootstrapDialog.TYPE_DANGER,
						title : SUGAR.language.get('app_strings',
								'LBL_EMAIL_ERROR_GENERAL_TITLE'),
						message : $(this).text()
					});
		}
	});	
}

function preValidateFunction(async_bool = false) {
	//但如果是SAVE按钮的触发，一定要async=false(保持默认)
	
	//console.log("checkForm="+check_form('EditView'));
	//validate_form_message();
	var return_flag=true;

	for(var i=0;i<prodln;i++){
		console.log("prodln = "+prodln);
		var pre_ip_id = $("#line_hit_ip_subnets_id"+i).val();
		var pre_deleted = $("#line_deleted"+i).val();
		var pre_port = $("#line_port"+i).val();
		
		//console.log("第i行 "+(i+1)+",ip="+pre_ip_id+"~"+pre_port);

			for(var j=i+1;j<prodln-1;j++){
				var current_ip_id=$("#line_hit_ip_subnets_id"+j).val();
				var current_deleted=$("#line_deleted"+j).val();
				var current_port=$("#line_port"+j).val();
				
				console.log("第j行 "+(j+1)+",ip="+current_ip_id+"~"+current_port);
				
				if(pre_ip_id==current_ip_id&&current_deleted==pre_deleted&&pre_deleted=="0"&&pre_port==current_port){
					console.log("equal");
					return_flag=false;
					BootstrapDialog.alert({
						type : BootstrapDialog.TYPE_DANGER,
						title : SUGAR.language.get('app_strings',
								'LBL_EMAIL_ERROR_GENERAL_TITLE'),
						//message : "第"+$("#displayed_line_num"+i).text()+"行和第"+$("#displayed_line_num"+j).text()+"行存在重复的IP值"
						message : "IP存在重复"
					});
					break;
				}	
			}
			
		if(return_flag==false){
				break;
		}
	}
	//return_flag=false;
	return return_flag;
}


$(document).ready(function(){
	
	$("#line_items_span").parent().prev().hide();//现在的主题,隐藏事务处理行上的标签
	//改写Save事件，在Save之前加入数据校验
	SUGAR.util.doWhen("typeof OverwriteSaveBtn == 'function'", function(){
		OverwriteSaveBtn(preValidateFunction);//ff_include.js 注意preValidateFunction是一个Function，在此引用时不加（）
	});
	

	if($('#haa_ff_id').length==0) {//如果对象不存在就添加一个
		$("#EditView").append('<input id="haa_ff_id" name="haa_ff_id" type=hidden>');
	}
	
	    
       var current_header_status = $("#asset_trans_status").val();
       if (current_header_status=="DRAFT") {//可以DRAFT和SUBMIT
			$("#asset_trans_status option[value='SUBMITTED']").remove();
			$("#asset_trans_status option[value='REJECTED']").remove();
			$("#asset_trans_status option[value='APPROVED']").remove();
			$("#asset_trans_status option[value='CANCELED']").remove();
			//$("#asset_trans_status option[value='CLOSED']").remove();
			$("#asset_trans_status option[value='AUTO_TRANSACTED']").remove();
			$("#asset_trans_status option[value='TRANSACTED']").remove();
	   }
	
	
	//触发FF
	SUGAR.util.doWhen("typeof setFF == 'function'", function(){
		call_ff();
	});

	SUGAR.util.doWhen("typeof mark_field_disabled != 'undefined'", function(){
		if ($("#hat_eventtype_id").val() != "") {
			setEventTypeFields();//初始化EventType，完成后会将EventType的值写入global_eventOptions
		}
	});

	//add by yuan.chen
	if(typeof source_wo_id_tt!="undefined"){
		$("#CANCEL_HEADER").bind("click",function(){
			SUGAR.ajaxUI.loadContent('index.php?action=DetailView&module=HAM_WO&record='+source_wo_id_tt)
		});	
	};
	


	mark_field_disabled("email",false);
	if($("target_owning_org").val()==""){
	    mark_field_disabled("contact_name",false);
	}
	if($("#source_wo").val()=="") {
		mark_field_disabled("source_woop",false);
	}
	
	$("#source_wo").change(function(){
		if($("#source_wo").val()=="") {
			$("#source_woop").val("");
			$("#source_woop_id").val("");
			mark_field_disabled("source_woop",false);
		}
	});	
	
	$("#btn_clr_source_wo").click(function(){
		if($("#source_wo").val()=="") {
			$("#source_woop").val("");
			$("#source_woop_id").val("");
			mark_field_disabled("source_woop",false);
		}
	});	
	
	$("#contact_name").change(function(){
		if($("#contact_name").val()=="") {
			$("#email").val("");
			mark_field_disabled("email",false);
		}
	});	
	
	$("#btn_clr_contact_name").click(function(){
		if($("#contact_name").val()=="") {
			$("#email").val("");
			mark_field_disabled("email",false);
		}
	});	
	
	
	$("#target_owning_org").change(function(){
		if($("#target_owning_org").val()=="") {
			$("#contact_name").val("");
			$("#email").val("");
			mark_field_disabled("contact_name",false);
			mark_field_disabled("email",false);
		}
	});	
	
	$("#btn_clr_target_owning_org").click(function(){
		if($("#target_owning_org").val()=="") {
			$("#contact_name").val("");
			$("#email").val("");
			mark_field_disabled("contact_name",false);
			mark_field_disabled("email",false);
		}
	});	
	
	$("#email").css("color","");
	
	$("#wo_lines").hide();
    $("#wo_lines").after("<div id='wo_lines_display'></div>")
    if ($("#source_wo_id").val()!="") {
    	//如果来源于工作单则显示工作单对象行信息，否则直接隐藏行
    	showWOLines($("#source_wo_id").val());
    } else {
		$("#wo_lines").parent("td").prev("td").hide();
    }
	
	//add by yuan.chen 2016-12-08
	if($("#asset_trans_status").val()=="CLOSED"){
	   //$("#EditView_tabs button").css("display","none");
	   $("#EditView_tabs input").attr("readonly",true);
       $("#EditView_tabs input").attr("style","background-Color:#efefef");
	   $("#EditView_tabs textarea").attr("readonly",true);
	   $("#EditView_tabs select").attr("disabled","disabled");
	   $("#EditView_tabs select").css("background-Color","#efefef");
	   $("#EditView_tabs input").attr("disabled","disabled");
	   $("#EditView_tabs .dateTime").hide();
		$(".input-group-addon").hide();
		$("#EditView_tabs button").addClass("button");
		$("#EditView_tabs button").removeAttr("style");
		$("#EditView_tabs button").remove();
		$("input[name^=btn_edit_line]").remove();
	}
}
)
