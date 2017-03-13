

function btn_create_wo_order(record){
	window.location.href = "index.php?module=HAM_WO&action=EditView&contract_id="+record;	
}



/**
 * document 页面加载 入口函数
 */
$(document).ready(function(){
	//明细页面添加一个按钮
	var create_wo_order_btn=$("<input type='button' class='btn_detailview' id='btn_create_wo_order' value='"+SUGAR.language.get('AOS_Contracts', 'LBL_BTN_CREATE_WO_ORDER_BUTTON_LABEL')+"'>");
	$("#btn_view_change_log").after(create_wo_order_btn);
	//registe function cancel()
	$("#btn_create_wo_order").click(function(){ //如果取消按钮 返回
		btn_create_wo_order($("input[name='record']").val());
	   }
	);
    //隐藏编辑按钮
    /*$("#edit_button").hide();
    console.log("1111111111111111111111111");
    //$("#detailview_more_actions").hide();
    $("#duplicate_button").hide();
    $("#delete_button").hide();
    $("#merge_duplicate_button").hide();
    $("#dropdownMenu1").hide();
    $("#dropdownMenu1").html("");
    $("#detailview_more_actions").find("button").hide();
    $("#btn_create_wo_order").prev().hide();*/
    //这两种状态,不能创建工单
	if ($("#attribute4_c").text()=="已取消" || $("#attribute4_c").text()=="已到期") {
		$("#btn_create_wo_order").hide();
	}

}
);
