function attr_info(id){
	var record_id = $("input[name*='record']").val();
	$.ajax({
		url:'index.php?to_pdf=true&module=HAT_Counting_Tasks&action=counting_task_attr',
		data:'&id='+id+'&type=INV_TASK_DETAILS&module_action=DetailView&module_name=HAT_Counting_Lines&module_id='+record_id+'&prefix='+''
		+'&prodln='+''+'&asset_id='+'',
		type:'POST',
		success:function(result){
			get_html(result);
		}
	});
}

function get_html(result){
	var lineItems=document.getElementById('LBL_EDITVIEW_PANEL3');
  	lineItems.innerHTML=result;
}

$(function(){
	var id=$("#task_template_attr").val();
	if (id!="") {
		attr_info(id);
	}
	else{
		$("#detailpanel_2").hide();
	}
})