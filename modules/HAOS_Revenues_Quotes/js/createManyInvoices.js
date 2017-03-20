function createInvoices(){
				var bool=false;//是否有选择，默认没有
				var num=0;
				var data_array=new Array();
				$('table.list').find(':checkbox').each(function(){
					if($(this).is(':checked')){
						data_array[num]=$(this).val();
						bool=true;
						num++;
					}
				});  
				if(bool==true){
					$.ajax({
						url:'?module=HAOS_Revenues_Quotes&action=checkInfo&to_pdf=1',
						data:'&data='+data_array,
						type:'POST',
						success:function(data){
							var val=JSON.parse(data); 
							if(val['type']==-1){
								alert('创建发票时不能勾选已结清的收支项。');
							}
							else if(val['type']==0){
								alert('客户与人员信息必须一致！');
							}else{
								
								location.href='?module=AOS_Invoices&action=editview&data='+val['value']+'&cord='+val['cord']+'&amount_c=0&source_code_c=HAOS_Revenues_Quotes&name='+val['name']+'&due_date='+val['event_date'];
								
							}
						}
					}); 
				}else{
					alert('请勾选记录');
				}
			}

function createInvoices2(){
				var bool=false;//是否有选择，默认没有
				var num=0;
				var data_array=new Array();
				$('table.list').find(':checkbox').each(function(){
					if($(this).is(':checked')){
						data_array[num]=$(this).val();
						bool=true;
						num++;
					}
				});  
				if(bool==true){
					$.ajax({
						url:'?module=HAOS_Revenues_Quotes&action=checkInfoToManyInvoice&to_pdf=1',
						data:'&data='+data_array,
						type:'POST',
						success:function(data){
							var val=JSON.parse(data); 
							if(val['type']==-1){
								alert('创建发票时不能勾选已结清的收支项。');
							}
							// else if(val['type']==0){
							// 	alert('客户与人员信息必须一致！');
							// }
							else{
							   
								// location.href='?module=AOS_Invoices&action=editview&data='+val['value']+'&cord='+val['cord']+'&amount_c=0&source_code_c=HAOS_Revenues_Quotes&name='+val['name']+'&due_date='+val['event_date'];
								
							}
						}
					}); 
				}else{
					alert('请勾选记录');
				}
			}