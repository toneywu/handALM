

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


	//add by hq 20170310 获取收支子面板信息（金额）
	var revenuesRow = $('#whole_subpanel_haos_revenues_quotes #list_subpanel_haos_revenues_quotes ul');
	//var revenuesRow = document.getElementById('whole_subpanel_haos_revenues_quotes').getElementById('list_subpanel_haos_revenues_quotes').getElementsByTagName('tbody').getElementsByTagName('ul');
	//console.log(revenuesRow);
	var revenuesRowLength = revenuesRow.length;
	console.log(revenuesRowLength);	
	for(i=0; i < revenuesRowLength; i++){
		console.log(revenuesRow[i].id);
		if(revenuesRow[i].id!=''){
			$.ajax({
				url:'index.php?module=AOS_Contracts&action=getRevenuesSubpanelInfo&to_pdf=true',
				data:{"revenuesID":revenuesRow[i].id},
				type:'POST',
				dataType: "json",
				success:function(data){
					if(data.return_status=='S'){
						console.log('金额：'+data.return_data.total_price);
						if(data.return_data.total_price!=''){
							for(j=0; j < revenuesRowLength; j++){
								if(revenuesRow[j].id==data.return_data.revenuesID){
									console.log('金额：dsfsd');
									//var x = $('#'+revenuesRow[j].id).parent().parent().childNodes(4);.prev()
									$('#'+revenuesRow[j].id).parent().prev().prev().prev().html(data.return_data.total_price);
									//x.innerHTML = '<span>'+data.return_data.total_price+'</span>';
								}
							}
						}
					}
				}
			});

		}
	}
	//end add 20170310
}
);
