function attr_info(id){
	var record_id = $("input[name*='record']").val();
	$.ajax({
		url:'index.php?to_pdf=true&module=HAT_Counting_Tasks&action=counting_task_attr',
		data:'&id='+id+'&type=INV_TASKS&module_action=DetailView&module_name=HAT_Counting_Tasks&module_id='+record_id+'&prefix='+''
		+'&prodln='+''+'&asset_id='+'',
		type:'POST',
		success:function(result){
			//console.log(result);
			get_html(result);
		}
	});
}

function get_html(result){
  	$("#line_items").parent().prev().hide();
  	$("#line_items").parent().toggleClass("col-sm-10","col-sm-12");
  	$("#line_items").replaceWith(result);
}

$(function(){
	var id=$("#hat_counting_task_templates_id_c").attr('data-id-value');
	if (id!="") {
		attr_info(id);
	}
	else{
		$("#detailpanel_0").hide();
	}
})