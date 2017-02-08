var template_id='';
var arr_temp='';
function setExtendValReturn(popupReplyData){
	$("#loc_attr").val(popupReplyData['name_to_value_array']['loc_attr']);
	$("#org_attr").val(popupReplyData['name_to_value_array']['org_attr']);
	$("#major_attr").val(popupReplyData['name_to_value_array']['major_attr']);
	$("#category_attr").val(popupReplyData['name_to_value_array']['category_attr']);
	$("#user_attr").val(popupReplyData['name_to_value_array']['user_attr']);
	$("#own_attr").val(popupReplyData['name_to_value_array']['own_attr']);
	template_id=popupReplyData["name_to_value_array"]["task_template_attr"]
	attr_info(template_id);
	$("#task_template_attr").val(template_id);
	get_attr_info(template_id);
	$("#detailpanel_2").show();
	$("#detailpanel_3").show();
	set_return(popupReplyData);//标准Popup-Return函数
}

function get_display(popupReplyData){

	//$("#asset_status").val($("#asset_status_d").find("option:selected").val());
	//alert(template_id);
	attr_info_asset(template_id,popupReplyData["name_to_value_array"]["hat_assets_id_c"]);
	set_return(popupReplyData);
	
}

function attr_info(id){
	var module_id = $("input[name*='record']").val();
	//var module_id =document.getElementByTagName("name")
	$.ajax({
		url:'index.php?to_pdf=true&module=HAT_Counting_Tasks&action=counting_task_attr',
		data:'&id='+id+'&type=INV_TASK_DETAILS&module_action=EditView&module_name=HAT_Counting_Lines&module_id='+module_id+'&prefix='+''
		+'&prodln='+''+'&asset_id='+'',
		type:'POST',
		success:function(result){
			get_html(result);
			load_script(result);
		}
	});
}

function attr_info_asset(id,asset_id){
	var module_id = $("input[name*='record']").val();
	//var module_id =document.getElementByTagName("name")
	$.ajax({
		url:'index.php?to_pdf=true&module=HAT_Counting_Tasks&action=counting_task_attr',
		data:'&id='+id+'&type=INV_TASK_DETAILS&module_action=EditView&module_name=HAT_Counting_Lines&module_id='+module_id+'&prefix='+''
		+'&prodln='+''+'&asset_id='+asset_id,
		type:'POST',
		success:function(result){
			get_html(result);
			load_script(result);
		}
	});
}

function get_attr_info(id){
  $.ajax({
    url:'index.php?to_pdf=true&module=HAT_Counting_Lines&action=get_attr_info',
    data:'&id='+id,
    type:'POST',
    async:false,
    success:function(data){
    	//console.log(data);
      arr_temp=JSON.parse(data);
      insertLineHeader("lineItems","EditView",arr_temp["attr_label"],arr_temp["attr_data"],arr_temp["attr_type"],true);
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
		$("#detailpanel_3").hide();
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
