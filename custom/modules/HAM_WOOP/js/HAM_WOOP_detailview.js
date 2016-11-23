/**
 * 点击按钮 调用Ajax请求 给当前工序分配人员
 * @param name
 */
function assign(id){
		$.ajax({
			url: 'index.php?to_pdf=true&module=HAM_WOOP&action=assign_woop_people&id=' + id,
			success: function (data) {
				if(data!="Y"){
					window.location.href = "index.php?module=HAM_WOOP&action=DetailView&record="+id;
				}
			},
			error: function () { //失败
				alert('Error loading document');
			}
		});
};



$(document).ready(function(){

    var act_module_value = $("#act_module").val();
	var woop_id =$("input[name='record']").val();
	var href_text = $("td[field='act_module']").text();
	$("td[field='act_module']").text("");
	var href_url = '<a href=index.php?module='+act_module_value+'&action=EditView&woop_id='+woop_id+'>'+href_text+'</a>';
	$("#act_module").hide();
	$("td[field='act_module']").append(href_url);
	
	var assing_btn=$("<input type='button' class='btn_detailview' id='btn_assign' value='"+SUGAR.language.get('HAM_WOOP', 'LBL_BTN_ASSIGN_BUTTON_LABEL')+"'>");
	$("#btn_view_change_log").after(assing_btn);
	$("#btn_assign").click(function(){ //如果保存按钮 保存记录
		assign($("input[name='record']").val());
	   }
	);


});