/*$("#cost").change(function(){	//将成本价自动变为市场价
  if ($("#price").val()=='') {
  	$("#price").val($("#cost").val())
  }
});

$("#price").change(function(){	//将市场价自动带到成本价
  if ($("#cost").val()=='') {
  	$("#cost").val($("#price").val())
  }
});

$('#is_asset_group_c').click(function() { //选择是否为资产组
	alert("a");
	if ($('#type').val()=='Good') {
	    //只有Good类时，才可以选择此选项
	    var $this = $(this);
	    // $this will contain a reference to the checkbox
	    if ($this.is(':checked')) {
	       $("#asset_name_rule_c").closest(".panel").show('fast');
	    } else {
	        $("#asset_name_rule_c").closest(".panel").hide();
	    }
	} else {
		return false;
	}
});

$('#type').on('change', function (e) { //选择产品类型后处理字段
    //var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    //alert (valueSelected);
    if (valueSelected=="Good") {
    	//产品类
		mark_field_enabled("is_asset_group_c",true);
		mark_field_enabled("uom_conversions_c",true);
		mark_field_enabled("tracking_uom_c",true);
		mark_field_enabled("pricing_uom_c",true);
		mark_field_enabled("secondary_uom_c",true);
		mark_field_enabled("secondary_unit_defaulting_c",true);
    }else {
    	//服务类
		$("#is_asset_group_c").prop('checked', false);
		$("#detailpanel_3").hide();
		mark_field_disabled("is_asset_group_c");
		mark_field_disabled("uom_conversions_c");
		mark_field_disabled("tracking_uom_c");
		mark_field_disabled("pricing_uom_c");
		mark_field_disabled("secondary_uom_c");
		mark_field_disabled("secondary_unit_defaulting_c");
	}
});
*/

$(document).ready(function () {

  SUGAR.util.doWhen("typeof icon_edit_init == 'function'", function(){
    icon_edit_init($("#icon_c"));
  });

	//$('#is_asset_group_c').click()//根据是否是资产组的状态，显示资产相关字段。
});



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
