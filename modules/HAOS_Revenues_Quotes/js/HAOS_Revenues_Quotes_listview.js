function getUrlParam(name) {
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
		var r = window.location.search.substr(1).match(reg);  //匹配目标参数
		if (r != null) return unescape(r[2]); return null; //返回参数值
}

$(document).ready(function(){
	var loaded = false; 
	if (!loaded) { 
		var return_message=getUrlParam("error_message");
			if(typeof return_message!="undefined" && return_message!=""&return_message!=null){
				loaded=true;
				jQuery.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js").done(function() {
					BootstrapDialog.show({
									size: BootstrapDialog.SIZE_NORMAL,
									message: "收支计费项在已结算状态下不可删除",
									buttons: [{
										label: 'Close',
										action: function(dialogItself){
											dialogItself.close();
											return_message="";
											$("input[name=error_message]").val("");
											window.location.href="index.php?module=HAOS_Revenues_Quotes&action=index";
										}
									}]
								});
				});
		}	
	}
	
});


//批量结算
function createInvoices2(){
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
			
}
