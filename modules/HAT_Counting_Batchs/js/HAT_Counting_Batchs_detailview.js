$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); //MessageBox
$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css" />');

function createTask() {
	var record=$("input[name='record']").val();
	$.ajax({
		url: 'index.php?to_pdf=true&module=HAT_Counting_Batchs&action=createToTasks', 
		data:"&record="+record,
		type:"POST",
		success: function (data) {
			if (data=="0"){
				var title_txt='提示';
				var html="";
				html+=SUGAR.language.get("HAT_Counting_Batchs", "LBL_MESSAGE_STATUS");
				BootstrapDialog.confirm({
		              //type: BootstrapDialog.TYPE_DANGER,
		              title: title_txt,
		              message: html,
		              callback: function(msg){
		              		//createtoTask("true");
		              	}
		              });
			}
			else if(data=="1"){
				createtoTask("true",record);
			}
		},
			error: function () { //失败
				alert('Error loading');
			}
		});
	/*}*/
}

function createtoTask(p,id) {
	$.ajax({
		url: 'index.php?to_pdf=true&module=HAT_Counting_Batchs&action=createToTasks', 
		data:'&isNew='+p+'&record='+id,
		type:"POST",
		success: function (data) {
				//如果成功的通过Ajax读取了状态列表，则显示出状态列表，并通过Dialog确认是否修改状态
				if(data=="3"){
					var title_txt='提示';
					var html="";
					html+=SUGAR.language.get("HAT_Counting_Batchs", "LBL_MESSAGE_TASK");
					BootstrapDialog.confirm({
		              //type: BootstrapDialog.TYPE_DANGER,
		              title: title_txt,
		              message: html,
		              callback: function(result){
		              	if(result==true) {
		              		clrtoTask("true",id);
		              	}else {
				            	//cancel
				            }
				        }
				    });
				}
				else if(data=="2"){
					window.location.reload();
				}
			},
			error: function () { //失败
				alert('Error loading');
			}

		});
	/*}*/
}

function clrtoTask(p,id) {
	$.ajax({
		url: 'index.php?to_pdf=true&module=HAT_Counting_Batchs&action=createToTasks', 
		data:'&isClr='+p+'&record='+id+'&isNew=true',
		type:'POST',
		success: function (data) {
			window.location.reload();
		},
			error: function () { //失败
				alert('Error loading');
			}
		});
}

function datatocounting() {
	var record_id = $("input[name*='record']").val();

	var title_txt=SUGAR.language.get('HAT_Counting_Batchs','LBL_INTERFACES');
	var return_data;
	$.ajax({
		url: 'index.php?to_pdf=true&module=HAT_Counting_Batchs&action=datatocounting', 
		type:'POST',
		success: function (data) {
			return_data=data;
		}
	});
	var $html=$(return_data);
	var html=return_data;
	var num=0;
		BootstrapDialog.confirm({
			title: title_txt,
			message:$html,
			callback: function(result){
				if(result==true) {
					var isChecked=$html.find("input:checked");
					if (isChecked.length==0) {
						alert('请选择需要同步的接口');
						return false;
					}else{
						isChecked.each(function(){
							if(handle_interface($(this).val(),record_id)==1){
								num=num+1;
							}
						});
						if(isChecked.length==num){
							window.location.reload();
						}
					}
				}else{            
				}
			}
		});
	}

	function handle_interface(id,batch_id) {
		var num=0;
		$.ajax({
			async:false,
			url: 'index.php?to_pdf=true&module=HAT_Counting_Batchs&action=handle_interface',
			data: '&interface_id='+id+'&batch_id='+batch_id,
			type:'POST',
			success: function (data) {
				//data=$.parseJSON(data);
				data=JSON.parse(data);
				if(data['return_status']==0){
					num=1;
				}else{
					alert('执行接口出错:'+data["msg_data"]);
			}
		}
	});
		return num;
	}