//这整个asset trans batch中有两个主要的文件，一个是当前的文件
//另一个在hmm_trans_lines/js/line_item.js

function setEventTypePopupReturn(popupReplyData){
	set_return(popupReplyData);
	$("#trans_basic_type").val(getLovValueByText("trans_basic_type","trans_basic_type_lov"));
	setEventTypeForm();//不同的EventType会需要更新不同的界面字段。根据出入移发而不同
}

$(document).ready(function(){

	$('#detailpanel_3').hide();
	//initTransHeaderStatus();
	setEventTypeForm();

	if($("#name").val()=="") {//将手工编号，替换为自动编号
        $("#name").val("TBD");
        $("#name").after(SUGAR.language.get('HMM_Trans_Batch', 'LBL_AUTONUM'));
        $("#name").hide();
	} else {
        $("#name").after($("#name").val());
        $("#name").hide();
    }
});

function setEventTypeForm() {
basic_evert_type = $("#trans_basic_type").val();
  switch (basic_evert_type) {
    case "INV_IN": //入库时
      $("#from_locator_control").val("");
        mark_field_disabled("hmm_mo_request");
        mark_field_disabled("ham_woop");
        mark_field_disabled("ham_wo");
        break;
      case "INV_OUT": //出库
      $("#to_locator_control").val("");
        mark_field_enabled("hmm_mo_request",true);
        mark_field_disabled("ham_woop");
        mark_field_disabled("ham_wo");
        break;
    case "INV_TRANSFER":  //移库
        mark_field_enabled("hmm_mo_request",true);
        mark_field_disabled("ham_woop");
        mark_field_disabled("ham_wo");
        break;
    case "INV_WO"://发料
      $("#to_locator_control").val("");
        mark_field_enabled("hmm_mo_request",true);
        mark_field_enabled("ham_woop",true);
        mark_field_enabled("ham_wo",true);
        break;
      default:
        mark_field_disabled("hmm_mo_request");
        mark_field_disabled("ham_woop");
        mark_field_disabled("ham_wo");
        break;
    }
}

//*********************************************************************
//以下为公共的函数
//*********************************************************************
//
function getLovValueByText(focused_textfiled_id,list_Lov_id) { //根据LOV的Text，转为Value标准功能有BUG，返回的只能是TEXT
	var LovValue, LovText;
	LovText = $("#"+focused_textfiled_id).val();
	LovValue = $("#"+list_Lov_id+" option").filter(function() {return $(this).html() == LovText;}).val();
	return LovValue;
}

function mark_field_disabled(field_name, hide_bool) {
  mark_obj = $("#"+field_name);
  mark_obj_lable = $("#"+field_name+"_label");

  if(hide_bool==true) {
    mark_obj.css({"display":"none"});
    mark_obj_lable.css({"display":"none"});
  }else{
  mark_obj.css({"color":"#efefef","background-Color":"#efefef;"});
  mark_obj.attr("readonly",true);
  mark_obj_lable.css({"color":"#aaaaaa","text-decoration":"line-through"});
  }
  if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
    removeFromValidate('EditView',field_name); //去除必须验证
  }
  $("#"+field_name+"_label .required").hide();

  if  (typeof $("#btn_"+field_name)!= 'undefined') {
    $("#btn_"+field_name).css({"visibility":"hidden"});
  }
  if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {
    $("#btn_clr_"+field_name).css({"visibility":"hidden"});
  }
  //消除已经填写的数据
  $("#"+field_name).val("");
  if  (typeof $("#"+field_name+"_id")!= 'undefined') {
    $("#"+field_name+"_id").val("");
  }
}

function mark_field_enabled(field_name,not_required_bool) {
  //field_name = 字段名，不需要jquery select标志，直接写名字
  //not_required_bool如果为空或没有明确定义为true的话，字段为必须输入。如果=ture则为非必须
  //alert(required_bool);

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
  } else { //如果不是必须的，则不显示星标
    removeFromValidate('EditView',field_name); //去除必须验证
    $("#"+field_name+"_label .required").hide();
  }
  if  (typeof $("#btn_"+field_name)!= 'undefined') {//移除选择按钮
    $("#btn_"+field_name).css({"visibility":"visible"});
  }
  if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {//移除清空按钮
    $("#btn_clr_"+field_name).css({"visibility":"visible"});
  }
}
