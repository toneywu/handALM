$.getScript("cache/include/javascript/sugar_grp_yui_widgets.js"); // MessageBox
$.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");
$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); // MessageBox
$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css" />');
function call_ff() {
    triger_setFF($("#haa_ff_id").val(),"HAT_Asset_Trans_Batch");
    $(".expandLink").click();
	//console.log($("#haa_ff_id").val());
}

var prodln = 0;
var global_eventOptions;

function setEventTypePopupReturn(popupReplyData){
	set_return(popupReplyData);
	console.log(popupReplyData);

	setEventTypeFields();
	$("#haa_ff_id").val(popupReplyData.name_to_value_array.haa_ff_id);
	triger_setFF($("#haa_ff_id").val(),"HAT_Asset_Trans_Batch");
    $(".expandLink").click();
    //Add By ling.zhang01 20161229
    if($("#tracking_number").val()==''){
    	createTrackNumber();
    }
    //Add Instance By ling.zhang01 20161229 End
}
//Add By ling.zhang01 20161229
function createTrackNumber(){
	var return_number;
	var json_data ={};
		json_data['haa_frameworks_id']=$("#haa_frameworks_id").val();

		$.ajax({
			type:"POST",
			url: "index.php?to_pdf=true&module=HAT_Asset_Trans_Batch&action=createTrackingNumber",
			data: json_data,
			success: function(msg){ 
				return_number = msg;
				console.log("msg = "+msg);
				$("#tracking_number").val(return_number);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				 alert('Error loading document');
				 console.log(textStatus+errorThrown);
			},
		});
}
//Add Instance By ling.zhang01 20161229 End

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
	$.ajax({//
		url: 'index.php?to_pdf=true&module=HAT_EventType&action=getTransSetting&id=' + $("#hat_eventtype_id").val(),//e74a5e34-906f-0590-d914-57cbe0e5ae89
		async: false,
		success: function (data) {
			global_eventOptions = jQuery.parseJSON(data);
			//console.log(global_eventOptions);
			$("#eventOptions").val(data);
			var obj = jQuery.parseJSON(data);
			resetEventType();
		},
		error: function () { //失败
			alert('Error loading document');
		}
	})
}

function resetEventType(){
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

	loopField("line_target_asset_attribute10",global_eventOptions.change_asset_attribute10);
	loopField("line_target_asset_attribute11",global_eventOptions.change_asset_attribute11);
	loopField("line_target_asset_attribute12",global_eventOptions.change_asset_attribute12);
	loopField("line_target_cost_center",global_eventOptions.change_cost_center);
	loopField("line_target_cost_center_id",global_eventOptions.change_cost_center);

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
};

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





/**
 * 设置必输
 */
/*function mark_field_enabled(field_name,not_required_bool) {
  //field_name = 字段名，不需要jquery select标志，直接写名字
  //not_required_bool如果为空或没有明确定义为true的话，字段为必须输入。如果=true则为非必须
  //alert(not_required_bool);
  $("#"+field_name).css({"color":"#000000","background-Color":"#ffffff"});
  $("#"+field_name).attr("readonly",false);
  $("#"+field_name+"_label").css({"color":"#000000","text-decoration":"none"})

  if(typeof not_required_bool == "undefined" || not_required_bool==false || not_required_bool=="") {
      addToValidate('EditView', field_name,'varchar', 'true', $("#"+field_name+"_label").text());//将当前字段标记为必须验证
      //打上必须星标
      if  ($("#"+field_name+"_label .required").text()!='*') {//如果没有星标，则打上星标
        $("#"+field_name+"_label").html($("#"+field_name+"_label").text()+"<span class='required'>*</span>");//打上星标
      } else {//如果已经有星标了，则显示出来
        $("#"+field_name+"_label .required").show();
      }
      $("#"+field_name+"_btn").remove();
  } else { //如果不是必须的，则不显示星标
    //直接Remove有时会出错，所有先设置为Validate再Remove
    addToValidate('EditView', field_name,'varchar', 'true', $("#"+field_name+"_label").text());
    removeFromValidate('EditView',field_name);
     //去除必须验证
    $("#"+field_name+"_label .required").hide();
  }
  if  (typeof $("#btn_"+field_name)!= 'undefined') {//移除选择按钮
    $("#btn_"+field_name).css({"visibility":"visible"});
  }
  if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {//移除清空按钮
    $("#btn_clr_"+field_name).css({"visibility":"visible"});
  }
}
//设置字段不可更新
function mark_field_disabled(field_name, hide_bool, keep_position=false) {
	  mark_obj = $("#"+field_name);
	  mark_obj_lable = $("#"+field_name+"_label");

	  if(hide_bool==true) {
	  	if (keep_position==false) {
	    	mark_obj.closest('td').css({"display":"none"});
	    	mark_obj_lable.css({"display":"none"});
		}else{
	    	mark_obj.closest('td').css({"display":"table-column"});
	    	mark_obj_lable.css({"display":"table-column"});
		}
	  }else{
	  	mark_obj.closest('td').css({"display":""});
	    mark_obj_lable.css({"display":""});
		mark_obj.css({"color":"inherit","background-Color":"#efefef;"});
	  	mark_obj.attr("readonly",true);
	  	mark_obj_lable.css({"color":"#aaaaaa"});
	  }
	  if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
	    removeFromValidate('EditView',field_name); // 去除必须验证
	  }
	  $("#"+field_name+"_label .required").hide();
}
*/
/**
*验证重复元素，有重复返回true；否则返回false
*/
function check_repeat(ip_array)
{
   return /(\x0f[^\x0f]+)\x0f[\s\S]*\1/.test("\x0f"+ip_array.join("\x0f\x0f") +"\x0f");
}


function check_quantity(){
		var error_msg="";
		var formData=$("#EditView");
		var formData_str = formData.serialize();

		var json_obj={};
		$("input[id^='line_asset_id']").each(function(){
			var id_name=$(this).attr("id");
			var id_index = id_name.split("line_asset_id")[1];
			if($("#line_deleted"+id_index).val()=="0"){
				json_obj[id_name]=$(this).val();
			}
		});

		var json_data ={};

		json_data['asset_trans_status']=$("#asset_trans_status").val();
		json_data['record']=$("input[name=record]").val();
		json_data['source_wo_id']=$("#source_wo_id").val();
		json_data['source_woop_id']=$("#source_woop_id").val();
		json_data["line_asset_id"]=json_obj;
		$.ajax({
			type:"POST",
			url: "index.php?to_pdf=true&module=HAT_Asset_Trans_Batch&action=checkContractQuantity",
			data: json_data,
			cache:false,
            async:false,//重要的关健点在于同步和异步的参数，
			success: function(msg){
				error_msg=msg;
				console.log("check_quantity = "+error_msg);
				if(error_msg!="S"){

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
	return error_msg;
	
}



/*function erp_allocations(){
		var json_obj={};
		var i=0;
*/
function erp_allocations(){
		var json_obj={};
		var i=0;
		var return_status="S";
		$("input[id^='line_asset_id']").each(function(){
			var id_name=$(this).attr("id");
			var id_index = id_name.split("line_asset_id")[1];
			if($("#line_deleted"+id_index).val()=="0"){
				json_obj["line_asset_id"+i]=$(this).val();
				json_obj["line_target_cost_center"+i]=$("#line_target_cost_center"+id_index).val();
				json_obj["line_target_cost_center_id"+i]=$("#line_target_cost_center_id"+id_index).val();
				json_obj["line_target_location"+i]=$("#line_target_location"+id_index).val();
				json_obj["line_target_location_id"+i]=$("#line_target_location_id"+id_index).val();
				json_obj["line_target_asset_attribute10"+i]=$("#line_target_asset_attribute10"+id_index).val();
				json_obj["line_target_location_desc"+i]=$("#line_target_location_desc"+id_index).val();
				i=i+1;
			}
			});

		var json_data ={};
		json_data['asset_trans_status']=$("#asset_trans_status").val();
		json_data['line_cnt']=i;
		json_data['event_type_id']=$("#hat_eventtype_id").val();
		json_data['record']=$("input[name=record]").val();
		json_data["line_asset_infos"]=json_obj;

		$.ajax({
			type:"POST",
			url: "index.php?to_pdf=true&module=HAT_Asset_Trans_Batch&action=ebs_fa_allocations",
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
/**
* 保存前验证
*/
function preValidateFunction(async_bool = false) {
		var result = true;
		var error_msg="S";

		var return_status = erp_allocations();
		if(return_status!="S"){
			return;
		}
		console.log("end erp_allocations");
		//return;
		//toney.wu 仅针对有来源的工作单进行数据验证
		if ($("#source_woop_id").val()!="") {
			//console.log("preValidateFunction");
			var error_msg = check_quantity(); //如果验证有误会返回错误信息
			//console.log("preValidateFunction = "+error_msg);
		}
		if(error_msg!=="S"&&error_msg!=""){
			return;
		}

		console.log("end check_quantity");
		//欠费
		var global_eventOptions = jQuery.parseJSON($("#eventOptions").val());

		if ($("#asset_trans_status").val()=="SUBMITTED"||$("#asset_trans_status").val()=="APPROVED") {//如果是提交状态，进行客户信息检查
			if (global_eventOptions.check_customer_hold_c_owning == "1"){
			//针对当前使用组织进行信息检查，如在报废或移出资产前确认，当前资产的拥有方是否有欠费行为
				var ajaxStr='mode=accounthold&val='+$("#name").val()+'&id=' + $("#current_owning_org_id").val();
				var errMSG = SUGAR.language.get('app_strings', 'LBL_CUSTOMER_HOLD_ERR');
				result= FFCheckField('current_owning_org',ajaxStr,errMSG,async_bool);
			}
			//针对当前的目前使用组织进行检查，如在分配资产前确认当前用户是否有不良信用。
			//因为FFCheckField会将已经的错误清除，所以如果当前已经报错（Result=false)就不再继续进行额外的校验了。
			if (result==false && global_eventOptions.check_customer_hold_c_owning == "1"){
				console.log("ddd");
				var ajaxStr='mode=accounthold&val='+$("#name").val()+'&id=' + $("#target_using_org_id").val();
				var errMSG = SUGAR.language.get('app_strings', 'LBL_CUSTOMER_HOLD_ERR');
				result= FFCheckField('target_using_org',ajaxStr,errMSG,async_bool);
			}

		}
		//End欠费

		return result;
}

$(document).ready(function(){

	SUGAR.util.doWhen("typeof OverwriteSaveBtn == 'function'", function(){
		OverwriteSaveBtn(preValidateFunction);//注意引用时不加（）
	});
	   $("#asset_trans_status option[value='SUBMITTED']").remove();
        $("#asset_trans_status option[value='REJECTED']").remove();
        $("#asset_trans_status option[value='CANCELED']").remove();
        $("#asset_trans_status option[value='CLOSED']").remove();
        $("#asset_trans_status option[value='TRANSACTED']").remove();


	if($('#haa_ff_id').length==0) {//如果对象不存在就添加一个
		$("#EditView").append('<input id="haa_ff_id" name="haa_ff_id" type=hidden>');
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
	//$("#wo_lines").closest().hide();
    $("#wo_lines").after("<div id='wo_lines_display'></div>")
    if ($("#source_wo_id").val()!="") {
    	//如果来源于工作单则显示工作单对象行信息，否则直接隐藏行
    	showWOLines($("#source_wo_id").val());
    } else {
		$("#wo_lines").parent("td").prev("td").hide();
    }
	
	//add by yuan.chen 2016-12-08
	if($("#asset_trans_status").val()=="APPROVED"){
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
