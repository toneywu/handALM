


$(document).ready(function(){
	
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
	

/**
 * 对Date的扩展，将 Date 转化为指定格式的String
 * 月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符，
 * 年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字)
 * 例子：
 * (new Date()).Format("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423
 * (new Date()).Format("yyyy-M-d h:m:s.S")      ==> 2006-7-2 8:9:4.18
 * @param fmt string
 * @return string
 * */
Date.prototype.format = function(fmt){ //author: meizz
    var o = {
        "M+": this.getMonth() + 1, //月份
        "d+": this.getDate(), //日
        "h+": this.getHours(), //小时
        "m+": this.getMinutes(), //分
        "s+": this.getSeconds(), //秒
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度
        "S": this.getMilliseconds() //毫秒
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt))
            fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}



//时长
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

	//var time2=new Date(parseInt(1420184730)*1000).format('yyyy-M-d');
	//alert(time2);	 
	//1>计划时长
	var $duration_schedualed_str = $("#duration_schedualed").val();
	var $date_schedualed_start_str = $("#date_schedualed_start").val();
	var $date_schedualed_finish_str = $("#date_schedualed_finish").val();
	var $duration_schedualed_nums = parseInt($duration_schedualed_str)*1000*3600;
	
	//如果目标完成时间没有填写，目标时长有值 则自动更新目标完成时间
	if($duration_schedualed_str!=null&&$duration_schedualed_str!=""&&$date_schedualed_start_str!=null&&$date_schedualed_start_str!=""){
		//alert("1");
		var $total_num =stringToTime($date_schedualed_start_str)+$duration_schedualed_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_schedualed_finish").val(time2);
	}else if($duration_schedualed_str!=null&&$duration_schedualed_str!=""&&$date_schedualed_finish_str!=null&&$date_schedualed_finish_str!=""){
	//如果目标完成时间有，没有填写目标开始，自动更新目标开始时间
		//alert("2");
		var $total_num =stringToTime($date_schedualed_finish_str)-$duration_schedualed_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_schedualed_start").val(time2);	
	}
	
	//2>目标时长
	var $duration_target_str = $("#duration_target").val();
	//目标开始时间
	var $date_target_start_str = $("#date_target_start").val();
	var $date_target_finish_str = $("#date_target_finish").val();
	var $duration_target_nums = parseInt($duration_target_str)*1000*3600;
	//如果目标完成时间没有填写，目标时长有值 则自动更新目标完成时间
	if($duration_target_str!=null&&$duration_target_str!=""&&$date_target_start_str!=null&&$date_target_start_str!=""){
		//alert("3");
		var $total_num =stringToTime($date_target_start_str)+$duration_target_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_target_finish").val(time2);
	}else if($duration_target_str!=null&&$duration_target_str!=""&&$date_target_finish_str!=null&&$date_target_finish_str!=""){
	//如果目标完成时间有，没有填写目标开始，自动更新目标开始时间
		//alert("4");
		var $total_num =stringToTime($date_target_finish_str)-$duration_target_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_target_start").val(time2);	
	}
	
	//3>实际时长
	var $duration_actual_str = $("#duration_actual").val();
	//实际开始时间
	var $date_actual_start_str = $("#date_actual_start").val();
	var $duration_actual_nums = parseInt($duration_actual_str)*1000*3600;
	var $date_actual_finish_str = $("#date_actual_finish").val();
	//如果目标完成时间没有填写，目标时长有值 则自动更新目标完成时间
	if($duration_actual_str!=null&&$duration_actual_str!=""&&$date_actual_start_str!=null&&$date_actual_start_str!=""){
		//alert("5"+$duration_actual_str);
		
		var $total_num =stringToTime($date_actual_start_str)+$duration_actual_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_actual_finish").val(time2);
	}else if($duration_actual_str!=null&&$duration_actual_str!=""&&$date_actual_finish_str!=null&&$date_actual_finish_str!=""){
	//如果目标完成时间有，没有填写目标开始，自动更新目标开始时间
		//alert("6");
		var $total_num =stringToTime($date_actual_finish_str)-$duration_actual_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_actual_start").val(time2);	
	}
}
	
	
//开始日期
function date_start_change(){
	//计划开始日期
	var $date_schedualed_start_str = $("#date_schedualed_start").val();
	var $date_schedualed_start_date;
	$date_schedualed_start_date = (stringToTime($date_schedualed_start_str)/1000/3600);
	//alert($("#date_schedualed_finish").val());
	if($("#date_schedualed_finish").val()!=null&&$("#date_schedualed_finish").val()!=""){
		//1）如果计划完成时间有填写，自动更新计划时长。
		$date_schedualed_finish_date = (stringToTime($("#date_schedualed_finish").val())/1000/3600);
		var $differentHour = $date_schedualed_finish_date-$date_schedualed_start_date;
		if($differentHour>0){
			 $("#duration_schedualed").val((parseFloat($differentHour)).toFixed(5));
		}else{
			alert("计划完成日期必须大于等于计划开始日期！");
		}
	}else if($date_schedualed_start_str!=null&&$date_schedualed_start_str!=""&&$("#duration_schedualed").val()!=null&&$("#duration_schedualed").val()!=""){
		//如果开始时间 加时长不为空 完成时间为空 那么更新完成时间
		var $duration_schedualed_str = $("#duration_schedualed").val();
		var $duration_schedualed_nums = parseInt($duration_schedualed_str)*1000*3600;
		var $total_num =stringToTime($date_schedualed_start_str)+$duration_schedualed_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_schedualed_finish").val(time2);	
	}
	
	//目标开始日期
	var $date_target_start_str = $("#date_target_start").val();
	var $date_target_start_date;
	$date_target_start_date = (stringToTime($date_target_start_str)/1000/3600);
	if($("#date_target_finish").val()!=null&&$("#date_target_finish").val()!=""){
		//1）如果计划完成时间有填写，自动更新计划时长。
		$date_target_finish_date = (stringToTime($("#date_target_finish").val())/1000/3600);
		var $differentHour = $date_target_finish_date-$date_target_start_date;
		if($differentHour>0){
			 $("#duration_target").val((parseFloat($differentHour)).toFixed(5));
		}else{
			alert("目标完成日期必须大于等于计划开始日期！");
		}
	}else if($date_target_start_str!=null&&$date_target_start_str!=""&&$("#duration_target").val()!=null&&$("#duration_target").val()!=""){
		//如果开始时间 加时长不为空 完成时间为空 那么更新完成时间
		var $duration_target_str = $("#duration_target").val();
		var $duration_target_nums = parseInt($duration_target_str)*1000*3600;
		var $total_num =stringToTime($date_target_start_str)+$duration_target_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_target_finish").val(time2);	
	}
	 

	//实际开始日期
	var $date_actual_start_str = $("#date_actual_start").val();
	var $date_actual_start_date = (stringToTime($date_actual_start_str)/1000/3600);
	if($("#date_actual_finish").val()!=null&&$("#date_actual_finish").val()!=""){
		//1）如果计划完成时间有填写，自动更新计划时长。
		$date_actual_finish_date = (stringToTime($("#date_actual_finish").val())/1000/3600);
		var $differentHour = $date_actual_finish_date-$date_actual_start_date;
		if($differentHour>0){
			 $("#duration_actual").val((parseFloat($differentHour)).toFixed(5));
		}else{
			alert("实际完成日期必须大于等于计划开始日期！");
		}
	}else if($date_actual_start_str!=null&&$date_actual_start_str!=""&&$("#duration_actual").val()!=null&&$("#duration_actual").val()!=""){
		//如果开始时间 加时长不为空 完成时间为空 那么更新完成时间
		var $duration_actual_str = $("#duration_actual").val();
		var $duration_actual_nums = parseInt($duration_actual_str)*1000*3600;
		var $total_num =stringToTime($date_actual_start_str)+$duration_actual_nums;
		var time2=new Date(parseInt($total_num)).format('yyyy-M-d hh:m');
		$("#date_actual_finish").val(time2);	
	}	
}


//完成时间
function date_finish_change(){
	//1）如果计划完成时间有填写，自动更新计划时长。
	//2）如果目标完成时间没有填写，目标时长有值，则自动更新目标完成时间
		//1>计划完成日期
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
			if($differentHour>0){
				 $("#duration_schedualed").val((parseFloat($differentHour)).toFixed(5));
			}else{
				alert("计划完成日期必须大于等于计划开始日期！");
			}
		}else{
			var duration_schedualed_str =  $("#duration_schedualed").val();	
		}
		
		//2>目标完成日期
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
			if($differentHour>0){
				 $("#duration_target").val((parseFloat($differentHour)).toFixed(5));
			}else{
				alert("计划完成日期必须大于等于计划开始日期！");
			}
		}else{
			var duration_target_str =  $("#duration_schedualed").val();	
		}
		
		//3>实际完成日期
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
			if($differentHour>0){
				 $("#duration_actual").val((parseFloat($differentHour)).toFixed(5));
			}else{
				alert("计划完成日期必须大于等于计划开始日期！");
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
	



});
