function getRevenuesSubpanelInfo(){
	//add by hq 20170310 获取收支子面板信息（金额）
	var revenuesRow = $('#whole_subpanel_haos_revenues_quotes #list_subpanel_haos_revenues_quotes ul');
	var revenuesRowLength = revenuesRow.length;
	//console.log(revenuesRowLength);	
	for(i=0; i < revenuesRowLength; i++){
		console.log(revenuesRow[i].id);
		if(revenuesRow[i].id!=''){
			$.ajax({
				url:'index.php?module=HAOS_Revenues_Quotes&action=getRevenuesSubpanelInfo&to_pdf=true',
				data:{"revenuesID":revenuesRow[i].id},
				type:'POST',
				dataType: "json",
				success:function(data){
					if(data.return_status=='S'){
						console.log('金额：'+data.return_data.total_price);
						if(data.return_data.total_price!=''){
							for(j=0; j < revenuesRowLength; j++){
								if(revenuesRow[j].id==data.return_data.revenuesID){
									//console.log('金额：dsfsd');
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