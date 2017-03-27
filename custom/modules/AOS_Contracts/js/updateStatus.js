$.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");
$.getScript("modules/HAA_FF/ff_include.js");
$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js");

function updateStatus(){
	var ContractsId = $('input[name=record]').val();
	var status = $('#status').val();
    //console.log('ContractsId:'+ContractsId+';'+status);
	updateStatusAlert(ContractsId,status);

}


function updateStatusAlert(ContractsId,status){
      var html = updateStatusAlertHtml(status);

	  BootstrapDialog.confirm({
            size: BootstrapDialog.SIZE_NORMAL,
            title:"更改状态",
            message:html,
            callback: function(result){
                if(result) {
                   var newStatus = $('#status_alert').val();
                  updateStatusAJAX(ContractsId,newStatus);
                  //console.log('ContractsId:'+ContractsId+';newStatus:'+newStatus);
                }else{
                   //alert($('#pay_date').val());
                }
            }
        });

}

function updateStatusAJAX(ContractsId,newStatus){
	$.ajax({
          url:'index.php?module=AOS_Contracts&action=updateStatus&to_pdf=true',
          data:{"ContractsId":ContractsId,"newStatus":newStatus},
          type:'POST',
          dataType: "json",
          success:function(data){
          	if(data.return_status=='S'){
          	 window.location.reload();
          	}
          }
	});
}

function updateStatusAlertHtml(status){
	var statusHTML = '';	
	if(status=='Not Started'){
		statusHTML = "<span class='input_group'>"+
		"<label style='display:inline-block;width:120px;'>状态: </label>"+
		"<select tabindex='116' name='status_alert' id='status_alert'>"+
		"<option label='处理中' value='In Progress'>处理中</option>"+
		"<option label='签约' value='Signed'>签约</option>"+
		"</select>"+
		"</span><br>";
	}else if(status=='In Progress'){
		statusHTML = "<span class='input_group'>"+
		"<label style='display:inline-block;width:120px;'>状态: </label>"+
		"<select tabindex='116' name='status_alert' id='status_alert'>"+
		"<option label='签约' value='Signed'>签约</option>"+
		"<option label='终止' value='Close'>终止</option>"+
		"</select>"+
		"</span><br>";
	}else if(status=='Signed'){
		statusHTML = "<span class='input_group'>"+
		"<label style='display:inline-block;width:120px;'>状态: </label>"+
		"<select tabindex='116' name='status_alert' id='status_alert'>"+
		"<option label='到期' value='Expired'>到期</option>"+
		"<option label='解除' value='Termination'>解除</option>"+
		"<option label='变更' value='Termination'>变更</option>"+//================
		"</select>"+
		"</span><br>";
	}else if(status==''){//变更
		statusHTML = "<span class='input_group'>"+
		"<label style='display:inline-block;width:120px;'>状态: </label>"+
		"<select tabindex='116' name='status_alert' id='status_alert'>"+
		"<option label='签约' value='Signed'>签约</option>"+//================
		"</select>"+
		"</span><br>";
	}else if(status=='Close'){ 
		statusHTML = "<span class='input_group'>"+
		"<label style='display:inline-block;width:120px;'>状态: </label>"+
		"<select tabindex='116' name='status_alert' id='status_alert'>"+
		"<option label='到期' value='Expired'>到期</option>"+
		"<option label='解除' value='Termination'>解除</option>"+
		"<option label='终止' value='Close' selected='selected'>终止</option>"+//================
		"</select>"+
		"</span><br>";
	}else if(status=='Termination'){
		statusHTML = "<span class='input_group'>"+
		"<label style='display:inline-block;width:120px;'>状态: </label>"+
		"<select tabindex='116' name='status_alert' id='status_alert'>"+
		"<option label='到期' value='Expired'>到期</option>"+
		"<option label='解除' value='Termination'  selected='selected'>解除</option>"+
		"<option label='终止' value='Close'>终止</option>"+//================
		"</select>"+
		"</span><br>";
	}else if(status=='Expired'){
		statusHTML = "<span class='input_group'>"+
		"<label style='display:inline-block;width:120px;'>状态: </label>"+
		"<select tabindex='116' name='status_alert' id='status_alert'>"+
		"<option label='到期' value='Expired' selected='selected'>到期</option>"+
		"<option label='解除' value='Termination'>解除</option>"+
		"<option label='终止' value='Close' selected='selected'>终止</option>"+//================
		"</select>"+
		"</span><br>";
	}

    var html = statusHTML;
	return html;
}

