function set_PF(module_name) {
	if (module_name!="") {
		var urlStr="index.php?module=HPR_Group_Priviliges&action=Field_Priviliges&to_pdf=true";
		var postData="&module_name="+module_name;
		$.ajax({
			url:urlStr,
			type:'POST',
			data:postData,
			async:false,
			success:function(jsonData){
				set_PFields(JSON.parse(jsonData));
			}
		});
	}
}

function set_PFields(fields){
	for (var i = 0; i < fields.length; i++) {
		if (fields[i].edit_enable_flag==0) {
			set_PFieldReadonly(fields[i].hpr_column_name);
		}else{
			unset_PFieldReadonly(fields[i].hpr_column_name);
		}
		if (fields[i].hide_enable_flag==0) {
			unset_PFieldHidden(fields[i].hpr_column_name);
		}else{
			set_PFieldHidden(fields[i].hpr_column_name);
		}
	}
}

function set_PFieldReadonly(field_name){
	$("#"+field_name).attr("disable",true);
	$("#btn_"+field_name).attr("disable",true);//LOV时执行
	$("#btn_clr_"+field_name).attr("disable",true);
}

function unset_PFieldReadonly(field_name){
	$("#"+field_name).attr("disable",false);
	$("#btn_"+field_name).attr("disable",false);//LOV时执行
	$("#btn_clr_"+field_name).attr("disable",false);
}

function set_PFieldHidden(field_name){
	$("#"+field_name).hide();
	$("#"+field_name).prev().hide();
	var text=$("#"+field_name).parent().prev().text();
	$("#"+field_name).parent().prev().html('<span class="hidden">'+text+'</span>');
	$("#"+field_name).parent().parent().css("height","0");
	$("#"+field_name).parent().parent().css("min-height","0");
	$("#"+field_name).parent().prev().find('.required').addClass("hidden");
	$("#btn_"+field_name).hide();
	$("#btn_clr_"+field_name).hide();
}

function unset_PFieldHidden(field_name) {
	$("#"+field_name).show();
	$("#"+field_name).prev().show();
	var text=$("#"+field_name).parent().prev().text();
	$("#"+field_name).parent().prev().find('span.hidden').html(text);
	$("#"+field_name).parent().prev().find('span').removeClass("hidden");
	$("#"+field_name).parent().parent().removeAttr("style");
	$("#"+field_name).parent().prev().find('.required').removeClass("hidden");
	$("#btn_"+field_name).show();
	$("#btn_clr_"+field_name).show();
}
