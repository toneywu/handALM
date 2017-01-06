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
					html+='盘点批状态必须为“未开始”，并且不存在非“未开始”状态的盘点任务';
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
					html+='盘点批已创建任务快照，是否重新创建盘点任务？';
					BootstrapDialog.confirm({
		              //type: BootstrapDialog.TYPE_DANGER,
		              title: title_txt,
		              message: html,
		              callback: function(result){
		              	if(result=="true") {
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
		data:'&isClr='+p+'&record='+id,
		type:'POST',
		success: function (data) {
		window.location.reload();
			},
			error: function () { //失败
				alert('Error loading');
			}
		});
}