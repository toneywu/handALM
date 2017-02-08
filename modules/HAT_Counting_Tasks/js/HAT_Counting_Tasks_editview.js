function setExtendValReturn(popupReplyData){
	if(popupReplyData['name_to_value_array']['counting_by_location']==1){
		$("#counting_by_location").attr('checked',true);
	}

	$("#name").val(popupReplyData['name_to_value_array']['counting_batch_name']);
	$("#location_attr").val(popupReplyData['name_to_value_array']['location_attr']);
	$("#oranization_attr").val(popupReplyData['name_to_value_array']['oranization_attr']);
	$("#major_attr").val(popupReplyData['name_to_value_array']['major_attr']);
	$("#category_attr").val(popupReplyData['name_to_value_array']['category_attr']);
	set_return(popupReplyData);//标准Popup-Return函数
}

function get_template_info(popupReplyData){
	set_return(popupReplyData);//标准Popup-Return函数
	//console.log(popupReplyData["name_to_value_array"]["hat_counting_task_templates_id_c"]);
	attr_info(popupReplyData["name_to_value_array"]["hat_counting_task_templates_id_c"]);
	$("#detailpanel_2").show();
}
function attr_info(id){
	var module_id = $("input[name*='record']").val();
	$.ajax({
		url:'index.php?to_pdf=true&module=HAT_Counting_Tasks&action=counting_task_attr',
		data:'&id='+id+'&type=INV_TASKS&module_action=EditView&module_name=HAT_Counting_Tasks&module_id='+module_id+'&prefix='+''
		+'&prodln='+''+'&asset_id='+'',
		type:'POST',
		success:function(result){
			get_html(result);
			load_script(result);
		}
	});
}

function get_html(result){
	var lineItems=document.getElementById('LBL_EDITVIEW_PANEL1');
  	lineItems.innerHTML=result;
}

$(function(){
	var id=$("#hat_counting_task_templates_id_c").val();
	if (id!="") {
		attr_info(id);
	}
	else{
		$("#detailpanel_2").hide();
	}
})

function load_script(data){
// 第一步：匹配加载的页面中是否含有js
var regDetectJs = /<script(.|\n)*?>(.|\n|\r\n)*?<\/script>/ig;
var jsContained = data.match(regDetectJs);

// 第二步：如果包含js，则一段一段的取出js再加载执行
if(jsContained) {
    // 分段取出js正则
    var regGetJS = /<script(.|\n)*?>((.|\n|\r\n)*)?<\/script>/im;

    // 按顺序分段执行js
    var jsNums = jsContained.length;
    for (var i=0; i<jsNums; i++) {
        var jsSection = jsContained[i].match(regGetJS);

        if(jsSection[2]) {
            if(window.execScript) {
                // 给IE的特殊待遇
                window.execScript(jsSection[2]);
            } else {
                // 给其他大部分浏览器用的
                window.eval(jsSection[2]);
            }
        }
    }
}

}