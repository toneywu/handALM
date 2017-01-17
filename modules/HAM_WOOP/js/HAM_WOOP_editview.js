$.getScript("modules/HAA_FF/ff_include.js");

function require_field(){

	var woop_status = $("#woop_status").val();
	console.log(woop_status)

	if(woop_status!="COMPLETED"){
		mark_field_enabled("date_actual_start",true);
		mark_field_enabled("date_actual_finish",true);
		mark_field_enabled("work_center_people",false);
	}else if(woop_status=="COMPLETED"){ //如果当前状态为完工，则要求实际开始与结束时间为必须输入
		mark_field_enabled("next_work_center_people",true);
		mark_field_enabled("next_work_center_res",true);
		mark_field_enabled("date_actual_start",false);
		mark_field_enabled("date_actual_finish",false);

		$("#span_date_actual_start span.input-group-addon").show();
		$("#span_date_actual_finish span.input-group-addon").show();

		var d = new Date();
		var date = d.getFullYear() +"-"+(d.getMonth()+1) +"-"+ d.getDate()+" "+d.getHours() + ":" + d.getMinutes();
		console.log(d.getDate())

		$("#date_actual_finish").val(date);
		$("#date_actual_finish").change();
	}
}





function preValidateFunction(async_bool = false) {
		//但如果是SAVE按钮的触发，一定要async=false(保持默认)
	//console.log('index.php?to_pdf=true&module=HAM_WOOP&action=getTransStatus&ham_wo_id='+$("#ham_wo_id").val()+'&act_module='+$("#act_module").val()+"&woop_number="+$("#woop_number").val());
	var return_flag=true;
	$.ajax({
			url:'index.php?to_pdf=true&module=HAM_WOOP&action=getTransStatus&ham_wo_id='+$("#ham_wo_id").val()+'&act_module='+$("#act_module").val()+"&woop_number="+$("#woop_number").val(),
			success: function (data) {
				if(data=="N"){
				    var error_msg = SUGAR.language.get('HAM_WOOP', 'LBL_ERROR_STATUS_ERR');
					add_error_style('EditView',"woop_status",error_msg);
					return_flag=false;
				}else{
					console.log("data = "+data);
					return_flag=true;
				}
			},
		});
		return return_flag;
}

$(document).ready(function(){

	//改写Save事件，在Save之前加入数据校验
	SUGAR.util.doWhen("typeof OverwriteSaveBtn == 'function'", function(){
		OverwriteSaveBtn(preValidateFunction);//ff_include.js 注意preValidateFunction是一个Function，在此引用时不加（）
	});

	function stringToTime(string){
	    var f = string.split(' ', 2);
	    var d = (f[0] ? f[0] : '').split('-', 3);
	    var t = (f[1] ? f[1] : '').split(':', 3);
	    return (new Date(
	    parseInt(d[0], 10) || null,
	    (parseInt(d[1], 10) || 1)-1,
	    parseInt(d[2], 10) || null,
	    parseInt(t[0], 10) || null,
	    parseInt(t[1], 10) || null,
	    parseInt(t[2], 10) || null
	    )).getTime();
	}


/*	SUGAR.util.doWhen("typeof mark_field_disabled == 'function'", function(){
		mark_field_disabled("next_woop_name",false);
		mark_field_disabled("next_woop",false);
		mark_field_disabled("next_work_center",false);
*/		// mark_field_disabled("next_work_center_people",false);
		// mark_field_disabled("next_work_center_res",false);


		var woop_status_code = $("#woop_status").val();
		// 从View.edit.php里面定义的变量来的wo_status,next_woop_assignment
		// 为批准、等待物料、等待计划安排、等待作业条件、进行中、等待前序
		//alert(next_woop_assignment);
		//if(woop_status_code!="DRAFT"&&next_woop_assignment=="1"&&last_woop_number_flag!="Y"&&(wo_status=="APPROVED"||wo_status=="WMATL"||wo_status=="WSCH"||wo_status=="WPCOND"||wo_status=="INPRG"||wo_status=="WPREV")){
/*		if(next_woop_assignment=="1"&&last_woop_number_flag!="Y"&&(wo_status=="APPROVED"||wo_status=="WMATL"||wo_status=="WSCH"||wo_status=="WPCOND"||wo_status=="INPRG"||wo_status=="WPREV")){

		}else{
			 mark_field_disabled("next_work_center_people",false);
			 mark_field_disabled("next_work_center_res",false);
		}
*/		/*if(woop_status_code=="COMPLETED"){
			mark_field_enabled("date_actual_start");
			mark_field_enabled("date_actual_finish");
		}*/

/*		mark_field_disabled("date_actual_start",false);
		mark_field_disabled("date_actual_finish",false);
	});

*//**
 * 对Date的扩展，将 Date 转化为指定格式的String 月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符，
 * 年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字) 例子： (new
 * Date()).Format("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423 (new
 * Date()).Format("yyyy-M-d h:m:s.S") ==> 2006-7-2 8:9:4.18
 * 
 * @param fmt
 *            string
 * @return string
 */
Date.prototype.format = function(fmt){ // author: meizz
    var o = {
        "M+": this.getMonth() + 1, // 月份
        "d+": this.getDate(), // 日
        "h+": this.getHours(), // 小时
        "m+": this.getMinutes(), // 分
        "s+": this.getSeconds(), // 秒
        "q+": Math.floor((this.getMonth() + 3) / 3), // 季度
        "S": this.getMilliseconds() // 毫秒
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt))
            fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}



// 时长
function duration_change(){	
	 if($('#duration_schedualed').val()!=null&&$('#duration_schedualed').val()!=""){
		 $("#duration_schedualed").val(parseFloat($("#duration_schedualed").val()).toFixed(5));
		 if(isNaN($('#duration_schedualed').val())){
			 alert("计划时长必须是数字类型的！");
			 $('#duration_schedualed').val("");
		     return false;
		 }
	 }
	 
	 if($('#duration_target').val()!=null&&$('#duration_target').val()!=""){
		 $("#duration_target").val(parseFloat($("#duration_target").val()).toFixed(5));
		 if(isNaN($('#duration_target').val())){
			 alert("目标时长必须是数字类型的！");
			 $('#duration_target').val("");
		     return false;
		 } 
	 }
	 
	 if($('#duration_actual').val()!=null&&$('#duration_actual').val()!=""){
		 $("#duration_actual").val(parseFloat($("#duration_actual").val()).toFixed(5));
		 if(isNaN($('#duration_actual').val())){
			 alert("实际时长必须是数字类型的！");
			 $('#duration_actual').val("");
		     return false;
		 } 
	 }

	// var time2=new Date(parseInt(1420184730)*1000).format('yyyy-M-d');
	// alert(time2);
	// 1>计划时长
	var $duration_schedualed_str = $("#duration_schedualed").val();
	var $date_schedualed_start_str = $("#date_schedualed_start").val();
	var $date_schedualed_finish_str = $("#date_schedualed_finish").val();
	var $duration_schedualed_nums = parseInt($duration_schedualed_str)*1000*3600;
	
	// 如果目标完成时间没有填写，目标时长有值 则自动更新目标完成时间
	if($duration_schedualed_str!=null&&$duration_schedualed_str!=""&&$date_schedualed_start_str!=null&&$date_schedualed_start_str!=""){
		var $total_num =stringToTime($date_schedualed_start_str)+$duration_schedualed_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_schedualed_finish").val(time2);
	}else if($duration_schedualed_str!=null&&$duration_schedualed_str!=""&&$date_schedualed_finish_str!=null&&$date_schedualed_finish_str!=""){
	// 如果目标完成时间有，没有填写目标开始，自动更新目标开始时间
		var $total_num =stringToTime($date_schedualed_finish_str)-$duration_schedualed_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_schedualed_start").val(time2);	
	}
	
	// 2>目标时长
	var $duration_target_str = $("#duration_target").val();
	// 目标开始时间
	var $date_target_start_str = $("#date_target_start").val();
	var $date_target_finish_str = $("#date_target_finish").val();
	var $duration_target_nums = parseInt($duration_target_str)*1000*3600;
	// 如果目标完成时间没有填写，目标时长有值 则自动更新目标完成时间
	if($duration_target_str!=null&&$duration_target_str!=""&&$date_target_start_str!=null&&$date_target_start_str!=""){
		var $total_num =stringToTime($date_target_start_str)+$duration_target_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_target_finish").val(time2);
	}else if($duration_target_str!=null&&$duration_target_str!=""&&$date_target_finish_str!=null&&$date_target_finish_str!=""){
	// 如果目标完成时间有，没有填写目标开始，自动更新目标开始时间
		var $total_num =stringToTime($date_target_finish_str)-$duration_target_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_target_start").val(time2);	
	}
	
	// 3>实际时长
	var $duration_actual_str = $("#duration_actual").val();
	// 实际开始时间
	var $date_actual_start_str = $("#date_actual_start").val();
	var $duration_actual_nums = parseInt($duration_actual_str)*1000*3600;
	var $date_actual_finish_str = $("#date_actual_finish").val();
	// 如果目标完成时间没有填写，目标时长有值 则自动更新目标完成时间
	if($duration_actual_str!=null&&$duration_actual_str!=""&&$date_actual_start_str!=null&&$date_actual_start_str!=""){

		var $total_num =stringToTime($date_actual_start_str)+$duration_actual_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_actual_finish").val(time2);
	}else if($duration_actual_str!=null&&$duration_actual_str!=""&&$date_actual_finish_str!=null&&$date_actual_finish_str!=""){
	// 如果目标完成时间有，没有填写目标开始，自动更新目标开始时间
		var $total_num =stringToTime($date_actual_finish_str)-$duration_actual_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_actual_start").val(time2);	
	}
}
	
	
// 开始日期
function date_start_change(){
	// 计划开始日期
	var $date_schedualed_start_str = $("#date_schedualed_start").val();
	var $date_schedualed_start_date;
	$date_schedualed_start_date = (stringToTime($date_schedualed_start_str)/1000/3600);
	// alert($("#date_schedualed_finish").val());
	if($("#date_schedualed_finish").val()!=null&&$("#date_schedualed_finish").val()!=""){
		// 1）如果计划完成时间有填写，自动更新计划时长。
		$date_schedualed_finish_date = (stringToTime($("#date_schedualed_finish").val())/1000/3600);
		var $differentHour = $date_schedualed_finish_date-$date_schedualed_start_date;
		if($differentHour>=0){
			 $("#duration_schedualed").val((parseFloat($differentHour)).toFixed(5));
		}else{
			alert("计划完成日期必须大于等于计划开始日期！");
		}
	}else if($date_schedualed_start_str!=null&&$date_schedualed_start_str!=""&&$("#duration_schedualed").val()!=null&&$("#duration_schedualed").val()!=""){
		// 如果开始时间 加时长不为空 完成时间为空 那么更新完成时间
		var $duration_schedualed_str = $("#duration_schedualed").val();
		var $duration_schedualed_nums = parseInt($duration_schedualed_str)*1000*3600;
		var $total_num =stringToTime($date_schedualed_start_str)+$duration_schedualed_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_schedualed_finish").val(time2);	
	}
	
	// 目标开始日期
	var $date_target_start_str = $("#date_target_start").val();
	var $date_target_start_date;
	$date_target_start_date = (stringToTime($date_target_start_str)/1000/3600);
	if($("#date_target_finish").val()!=null&&$("#date_target_finish").val()!=""){
		// 1）如果计划完成时间有填写，自动更新计划时长。
		$date_target_finish_date = (stringToTime($("#date_target_finish").val())/1000/3600);
		var $differentHour = $date_target_finish_date-$date_target_start_date;
		if($differentHour>=0){
			 $("#duration_target").val((parseFloat($differentHour)).toFixed(5));
		}else{
			alert("目标完成日期必须大于等于计划开始日期！");
		}
	}else if($date_target_start_str!=null&&$date_target_start_str!=""&&$("#duration_target").val()!=null&&$("#duration_target").val()!=""){
		// 如果开始时间 加时长不为空 完成时间为空 那么更新完成时间
		var $duration_target_str = $("#duration_target").val();
		var $duration_target_nums = parseInt($duration_target_str)*1000*3600;
		var $total_num =stringToTime($date_target_start_str)+$duration_target_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_target_finish").val(time2);	
	}
	 

	// 实际开始日期
	var $date_actual_start_str = $("#date_actual_start").val();
	var $date_actual_start_date = (stringToTime($date_actual_start_str)/1000/3600);
	if($("#date_actual_finish").val()!=null&&$("#date_actual_finish").val()!=""){
		// 1）如果计划完成时间有填写，自动更新计划时长。
		$date_actual_finish_date = (stringToTime($("#date_actual_finish").val())/1000/3600);
		var $differentHour = $date_actual_finish_date-$date_actual_start_date;
		if($differentHour>=0){
			 $("#duration_actual").val((parseFloat($differentHour)).toFixed(5));
		}else{
			alert("实际完成日期必须大于等于计划开始日期！");
		}
	}else if($date_actual_start_str!=null&&$date_actual_start_str!=""&&$("#duration_actual").val()!=null&&$("#duration_actual").val()!=""){
		// 如果开始时间 加时长不为空 完成时间为空 那么更新完成时间
		var $duration_actual_str = $("#duration_actual").val();
		var $duration_actual_nums = parseInt($duration_actual_str)*1000*3600;
		var $total_num =stringToTime($date_actual_start_str)+$duration_actual_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_actual_finish").val(time2);	
	}	
}


// 完成时间
function date_finish_change(){
	// 1）如果计划完成时间有填写，自动更新计划时长。
	// 2）如果目标完成时间没有填写，目标时长有值，则自动更新目标完成时间
		// 1>计划完成日期
		var $date_schedualed_start_str = $("#date_schedualed_start").val();
		var $date_schedualed_start_date;
		if($date_schedualed_start_str==null||$date_schedualed_start_str==""){
			 $date_schedualed_start_date=null;
		}else{
		     $date_schedualed_start_date = (stringToTime($date_schedualed_start_str)/1000/3600);
		}
		if($("#date_schedualed_finish").val()!=null&&$("#date_schedualed_finish").val()!=""&&$date_schedualed_start_date!=null){
			$date_schedualed_finish_date = (stringToTime($("#date_schedualed_finish").val())/1000/3600);
			
			var $differentHour = $date_schedualed_finish_date-$date_schedualed_start_date;
			if($differentHour>=0){
				 $("#duration_schedualed").val((parseFloat($differentHour)).toFixed(5));
			}else{
				//alert($differentHour);
				alert("计划完成日期必须大于等于计划开始日期！");

			}
		}else{
			var duration_schedualed_str =  $("#duration_schedualed").val();	
		}
		
		// 2>目标完成日期
		var $date_target_start_str = $("#date_target_start").val();
		var $date_target_start_date;
		if($date_target_start_str==null||$date_target_start_str==""){
			 $date_target_start_date=null;
		}else{
		     $date_target_start_date = (stringToTime($date_target_start_str)/1000/3600);
		}
		
		if($("#date_target_finish").val()!=null&&$("#date_target_finish").val()!=""&&$date_target_start_date!=null){
			$date_target_finish_date = (stringToTime($("#date_target_finish").val())/1000/3600);
			var $differentHour = $date_target_finish_date-$date_target_start_date;
			if($differentHour>=0){
				 $("#duration_target").val((parseFloat($differentHour)).toFixed(5));
			}else{
				alert("目标完成日期必须大于等于目标开始日期！");
			}
		}else{
			var duration_target_str =  $("#duration_schedualed").val();	
		}
		
		// 3>实际完成日期
		var $date_actual_start_str = $("#date_actual_start").val();
		var $date_actual_start_date;
		if($date_actual_start_str==null||$date_actual_start_str==""){
			 $date_actual_start_date=null;
		}else{
		     $date_actual_start_date = (stringToTime($date_actual_start_str)/1000/3600);
		}
		if($("#date_actual_finish").val()!=null&&$("#date_actual_finish").val()!=""&&$date_actual_start_date!=null){
			$date_actual_finish_date = (stringToTime($("#date_actual_finish").val())/1000/3600);
			var $differentHour = $date_actual_finish_date-$date_actual_start_date;
			if($differentHour>=0){
				 $("#duration_actual").val((parseFloat($differentHour)).toFixed(5));
			}else{
				alert("实际完成日期必须大于等于实际开始日期！");
			}
		}else{
			var duration_actual_str =  $("#duration_actual").val();	
		}
}


	$("#date_schedualed_start").change(function(){
		date_start_change();
	});

	$("#date_target_start").change(function(){
		date_start_change();
	});

	$("#date_actual_start").change(function(){
		date_start_change();
	});

	$("#date_schedualed_finish").change(function(){
		date_finish_change();
	});

	$("#date_target_finish").change(function(){
		date_finish_change();
	});

	$("#date_actual_finish").change(function(){
		date_finish_change();
	});

	$("#duration_schedualed").change(function(){
		duration_change();
	});

	$("#duration_target").change(function(){
		duration_change();
	});

	$("#duration_actual").change(function(){
		duration_change();
	});

	$("#woop_status").change(function(){
		require_field();
	});

	SUGAR.util.doWhen("typeof mark_field_disabled == 'function'", function(){
		//在加载完通用函数后，进行界面的初始化
		initTransHeaderStatus()
	});



	function initTransHeaderStatus() {

	    var current_header_status = $("#woop_status").val();
		console.log("current_header_status = "+current_header_status);
	    if (current_header_status=="DRAFT") {//可以DRAFT和SUBMIT
	        //$("#woop_status option[value='APPROVED']").remove();
	        $("#woop_status option[value='RELEASED']").remove();
	        $("#woop_status option[value='REJECTED']").remove();
	        $("#woop_status option[value='CANCELED']").remove();
	        $("#woop_status option[value='COMPLETED']").remove();
	        $("#woop_status option[value='TRANSACTED']").remove();
	        $("#woop_status option[value='WSCH']").remove();
	        $("#woop_status option[value='WMATL']").remove();
	        $("#woop_status option[value='WPCOND']").remove();
	        $("#woop_status option[value='INPRG']").remove();
	        $("#woop_status option[value='REWORK']").remove();
	        $("#woop_status option[value='SUBMITTED']").remove();
	        $("#woop_status option[value='WPREV']").remove();
	        $("#woop_status option[value='RETURNED']").remove();
			$("#woop_status option[value='WSCH']").remove();

	    } else if (current_header_status=="SUBMITTED") { //可以CANCEL和SUBMIT
	        $("#woop_status option[value='APPROVED']").remove();
	        $("#woop_status option[value='REJECTED']").remove();
	        $("#woop_status option[value='WORKING']").remove();
	        $("#woop_status option[value='CLOSED']").remove();
	        $("#woop_status option[value='TRANSACTED']").remove();
	        $("#woop_status option[value='COMPLETED']").remove();
	        $("#woop_status option[value='WSCH']").remove();
	        $("#woop_status option[value='WMATL']").remove();
	        $("#woop_status option[value='WPCOND']").remove();
	        $("#woop_status option[value='INPRG']").remove();
	        $("#woop_status option[value='DRAFT']").remove();
	        $("#woop_status option[value='RELEASED']").remove();
	        $("#woop_status option[value='CANCELED']").remove();
	        $("#woop_status option[value='REWORK']").remove();
	        $("#woop_status option[value='WPREV']").remove();
	        $("#woop_status option[value='RETURNED']").remove();

	        setEditViewByStatus ();
	        
	    } else if ((current_header_status=="APPROVED")||(current_header_status=="RELEASED")) { //可以CANCEL,COMPLETED
	        $("#wo_status option[value='SUBMITTED']").remove();
	        $("#wo_status option[value='REJECTED']").remove();
	        $("#wo_status option[value='RELEASED']").remove();        
	        $("#wo_status option[value='DRAFT']").remove();
	        $("#wo_status option[value='CLOSED']").remove();
	        $("#wo_status option[value='TRANSACTED']").remove();
			
	    	$("#woop_status option[value='RELEASED']").remove();        
	    	$("#woop_status option[value='REJECTED']").remove();
	    	$("#woop_status option[value='DRAFT']").remove();
	    	$("#woop_status option[value='SUBMITTED']").remove();
	    	$("#woop_status option[value='CLOSED']").remove();
	    	$("#woop_status option[value='REWORK']").remove();
	        $("#woop_status option[value='WPREV']").remove();
	        $("#woop_status option[value='RETURNED']").remove();

			$("#woop_status option[value='WSCH']").remove();
	        $("#woop_status option[value='WMATL']").remove();
	        $("#woop_status option[value='WPCOND']").remove();
			$("#woop_status option[value='INPRG']").remove();
			$("#woop_status option[value='CANCELED']").remove();

	        setEditViewByStatus ();
	    } else if ((current_header_status=="CANCELED")) { //什么也不能做
	        $("#woop_status option[value='SUBMITTED']").remove();
	        $("#woop_status option[value='REJECTED']").remove();
	        $("#woop_status option[value='DRAFT']").remove();
	        $("#woop_status option[value='RELEASED']").remove();
	        $("#woop_status option[value='APPROVED']").remove();
	        $("#woop_status option[value='CLOSED']").remove();
	        $("#woop_status option[value='TRANSACTED']").remove();
	        $("#woop_status option[value='COMPLETED']").remove();
	        $("#woop_status option[value='WPREV']").remove();
	        $("#woop_status option[value='RETURNED']").remove();

	        $("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();

	      //add by yuan.chen 2016-08-11
	        $("#woop_status option[value='WSCH']").remove();
	        $("#woop_status option[value='WMATL']").remove();
	        $("#woop_status option[value='WPCOND']").remove();
	        $("#woop_status option[value='INPRG']").remove();
	        //end 

	        setEditViewByStatus ();
	    }else if ((current_header_status=="CLOSED")) { //什么也不能做，同Canceled
	    	$("#woop_status option[value='SUBMITTED']").remove();
	        $("#woop_status option[value='REJECTED']").remove();
	        $("#woop_status option[value='DRAFT']").remove();
	        $("#woop_status option[value='RELEASED']").remove();        
	        $("#woop_status option[value='APPROVED']").remove();
	        $("#woop_status option[value='CANCELED']").remove();
	        $("#woop_status option[value='TRANSACTED']").remove();
	        $("#woop_status option[value='WSCH']").remove();
	        $("#woop_status option[value='WMATL']").remove();
	        $("#woop_status option[value='WPCOND']").remove();
	        $("#woop_status option[value='INPRG']").remove();
	        $("#woop_status option[value='COMPLETED']").remove();
	        $("#woop_status option[value='REWORK']").remove();
	        $("#woop_status option[value='WPREV']").remove();
	        $("#woop_status option[value='RETURNED']").remove();
	        $("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
	      
	        $("#wo_status option[value='WSCH']").remove();
	        $("#wo_status option[value='WMATL']").remove();
	        $("#wo_status option[value='WPCOND']").remove();
	        $("#wo_status option[value='INPRG']").remove();
	        setEditViewByStatus ();
	    }else if ((current_header_status=="COMPLETED")) { 
	    	$("#woop_status option[value='SUBMITTED']").remove();
	        $("#woop_status option[value='REJECTED']").remove();
	        $("#woop_status option[value='DRAFT']").remove();
	        $("#woop_status option[value='RELEASED']").remove();        
	        $("#woop_status option[value='APPROVED']").remove();
	        $("#woop_status option[value='CANCELED']").remove();
	        $("#woop_status option[value='TRANSACTED']").remove();
	        $("#woop_status option[value='WSCH']").remove();
	        $("#woop_status option[value='WMATL']").remove();
	        $("#woop_status option[value='WPCOND']").remove();
	        $("#woop_status option[value='INPRG']").remove();
	        $("#woop_status option[value='REWORK']").remove();
	        $("#woop_status option[value='WPREV']").remove();
	        $("#woop_status option[value='RETURNED']").remove();
			$("#woop_status option[value='CLOSED']").remove();


	        //$("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
	        $("#wo_status option[value='WSCH']").remove();
	        $("#wo_status option[value='WMATL']").remove();
	        $("#wo_status option[value='WPCOND']").remove();
	        $("#wo_status option[value='INPRG']").remove();
	        setEditViewByStatus ();
	    }else if((current_header_status=="WSCH")){//等待计划安排 WSCH WMATL WPCOND INPRG CANCELED
	    	$("#woop_status option[value='DRAFT']").remove();
	    	$("#woop_status option[value='SUBMITTED']").remove();
	    	$("#woop_status option[value='APPROVED']").remove();
	    	$("#woop_status option[value='CLOSED']").remove();
	    	$("#woop_status option[value='REJECTED']").remove();
	    	$("#woop_status option[value='RELEASED']").remove(); 
	    	$("#woop_status option[value='REWORK']").remove(); 
	        $("#woop_status option[value='RETURNED']").remove();

	    	setEditViewByStatus ();
	    }else if((current_header_status=="WMATL")){//等待物料 WMATL WSCH WPCOND INPRG CANCELED
	    	$("#woop_status option[value='DRAFT']").remove();
	    	$("#woop_status option[value='SUBMITTED']").remove();
	    	$("#woop_status option[value='APPROVED']").remove();
	    	$("#woop_status option[value='CLOSED']").remove();
	    	$("#woop_status option[value='REJECTED']").remove();
	    	$("#woop_status option[value='RELEASED']").remove(); 
	    	$("#woop_status option[value='REWORK']").remove(); 
	        $("#woop_status option[value='RETURNED']").remove();
	    	setEditViewByStatus ();
	    }else if((current_header_status=="WPCOND")){//等待作业条件 WMATL WSCH WPCOND INPRG CANCELED
	    	$("#woop_status option[value='DRAFT']").remove();
	    	$("#woop_status option[value='SUBMITTED']").remove();
	    	$("#woop_status option[value='APPROVED']").remove();
	    	$("#woop_status option[value='CLOSED']").remove();
	    	$("#woop_status option[value='REJECTED']").remove();
	    	$("#woop_status option[value='RELEASED']").remove(); 
	    	$("#woop_status option[value='REWORK']").remove(); 
	        $("#woop_status option[value='RETURNED']").remove();
	    }else if((current_header_status=="INPRG")){//正在执行中 WMATL WSCH WPCOND INPRG CANCELED
	    	$("#woop_status option[value='DRAFT']").remove();
	    	$("#woop_status option[value='SUBMITTED']").remove();
	    	$("#woop_status option[value='APPROVED']").remove();
	    	$("#woop_status option[value='CLOSED']").remove();
	    	$("#woop_status option[value='REJECTED']").remove();
	    	$("#woop_status option[value='RELEASED']").remove(); 
	    	$("#woop_status option[value='REWORK']").remove(); 
	        $("#woop_status option[value='RETURNED']").remove();
	    }else if((current_header_status=="WPREV")){//正在执行中 WMATL WSCH WPCOND INPRG CANCELED
	    	$("#woop_status option[value='COMPLETED']").remove();
	    	$("#woop_status option[value='SUBMITTED']").remove();
	    	$("#woop_status option[value='APPROVED']").remove();
	    	$("#woop_status option[value='CLOSED']").remove();
	    	$("#woop_status option[value='REJECTED']").remove();
	    	$("#woop_status option[value='RELEASED']").remove(); 
	    	$("#woop_status option[value='REWORK']").remove();  
	        $("#woop_status option[value='RETURNED']").remove();
			$("#woop_status option[value='WMATL']").remove();
	    	$("#woop_status option[value='WPCOND']").remove(); 
	    	$("#woop_status option[value='INPRG']").remove(); 
	        $("#woop_status option[value='CANCELED']").remove();
			$("#woop_status option[value='WSCH']").remove();
	    }else if((current_header_status=="REWORK")){//正在执行中 WMATL WSCH WPCOND INPRG CANCELED
	    	$("#woop_status option[value='DRAFT']").remove();
	    	$("#woop_status option[value='SUBMITTED']").remove();
	    	$("#woop_status option[value='APPROVED']").remove();
	    	$("#woop_status option[value='CLOSED']").remove();
	    	$("#woop_status option[value='REJECTED']").remove();
	    	$("#woop_status option[value='RELEASED']").remove(); 
	        $("#woop_status option[value='WPREV']").remove();
	        $("#woop_status option[value='RETURNED']").remove();
	    }
	    
	}
	

function setEditViewByStatus() { //如果当前头状态为Submitted、Approved、Canceled、Closed需要将字段变为只读
    //$("#EditView_tabs input").attr("readonly",true);
    //$("#EditView_tabs button").attr("readonly",true);
    //$("#EditView_tabs input").attr("style","background-Color:#efefef");
    //mark_field_disabled("work_center",false);
	//mark_field_disabled("work_center_people",false);
	//mark_field_disabled("work_center_res",false);
	//mark_field_disabled("date_schedualed_start",false);
	mark_field_disabled("next_woop",false);
	mark_field_disabled("next_woop_name",false);
	mark_field_disabled("next_work_center",false);


	var woop_status = $("#woop_status").val();
	if(woop_status!="DRAFT"){
		//的非撰写状态下，以下字段不可以修改
		mark_field_disabled("date_target_start",false);
		$("#date_target_start").next().hide();
		$("#date_target_start").unbind();
		
		mark_field_disabled("date_target_finish",false);
		$("#date_target_finish").next().hide();
		$("#date_target_finish").unbind();
		mark_field_disabled("date_start_not_earlier",false);
		$("#date_start_not_earlier").next().hide();
		$("#date_start_not_earlier").unbind();
		mark_field_disabled("date_target_finish",false);
		$("#date_target_finish").next().hide();
		$("#date_target_finish").unbind();
		
		mark_field_disabled("duration_target",false);
		
		mark_field_disabled("date_finish_not_later",false);
		$("#date_finish_not_later").next().hide();
		$("#date_finish_not_later").unbind();
		
		mark_field_disabled("work_center",false);

		mark_field_disabled("event_type",false);
		mark_field_disabled("act_module",false);
		
	}


	if(woop_status=="CANCELED"||woop_status=="CLOSED"){
		mark_field_disabled("date_actual_start",false);
		mark_field_disabled("date_actual_finish",false);
		//$(".input-group-addon").hide();
		$("#date_schedualed_start").unbind("focus");
		$("#date_target_start").unbind("focus");
		$("#date_start_not_earlier").unbind("focus");
		$("#date_actual_start").unbind("focus");
		$("#date_schedualed_finish").unbind("focus");
		$("#date_target_finish").unbind("focus");
		$("#date_finish_not_later").unbind("focus");
		$("#date_actual_finish").unbind("focus");


		//$("#span_date_actual_start span.input-group-addon").hide();
		//$("#span_date_actual_finish span.input-group-addon").hide();
	}/*else{
		$("#date_schedualed_start").unbind("focus");
		$("#date_target_start").unbind("focus");
		$("#date_start_not_earlier").unbind("focus");
		$("#date_actual_start").unbind("focus");
		
		$("#date_schedualed_finish").unbind("focus");
		$("#date_target_finish").unbind("focus");
		$("#date_finish_not_later").unbind("focus");
		$("#date_actual_finish").unbind("focus");
		$(".input-group-addon").hide();
	}
    */
   	require_field();
}


});
