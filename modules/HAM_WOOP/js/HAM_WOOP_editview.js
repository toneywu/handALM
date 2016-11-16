$.getScript("modules/HAA_FF/ff_include.js");
function require_field(){
	var woop_status = $("#woop_status").val();
	/*if(woop_status!="COMPLETED"){
		mark_field_enabled("date_actual_start",true);
		mark_field_enabled("date_actual_finish",true);
		
	}else{
		mark_field_enabled("date_actual_start",false);
		mark_field_enabled("date_actual_finish",false);
		$("#span_date_actual_start span.input-group-addon").show();
		$("#span_date_actual_finish span.input-group-addon").show();
	}*/
	mark_field_disabled("date_actual_start",false);
	mark_field_disabled("date_actual_finish",false);
}

function mark_field_disabled(field_name, hide_bool, keep_position=false) {
	  var view = action_sugar_grp1;
	  if(view == 'EditView') {
		mark_obj = ($("#"+field_name).length>0)?$("#"+field_name):$("[name='"+field_name+"'");
		mark_obj_lable = $("#"+field_name+"_label");
		mark_obj_tr = $("#"+field_name).closest("tr");

	    if(hide_bool==true) {
	    	if (keep_position==false) {
	        	mark_obj.closest('td').css({"display":"none"});
	        	mark_obj_lable.css({"display":"none"});
	        	mark_obj_tr.append("<td></td><td></td>");

				//mark_obj_lable.css({"visibility":"hidden"});
				//toney.wu 20161007修改为通过display控制，否则界面上会大面积留下 
	      	}else{
	          	mark_obj.closest('td').css({"display":"table-column"});
	          	mark_obj_lable.css({"display":"table-column"});
				mark_obj.closest('td').css({"visibility":"hidden"});
				mark_obj_lable.css({"visibility":"hidden"});
	      	}
	    }else{
	        mark_obj.closest('td').css({"display":""});
	        mark_obj_lable.css({"display":""});
	        mark_obj.css({"color":"#efefef","background-Color":"#efefef;"});
	        mark_obj.attr("readonly",true);
	        mark_obj_lable.css({"color":"#aaaaaa"});
	    }
	    if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
	      removeFromValidate('EditView',field_name); //去除必须验证
	    }
	    $("#"+field_name+"_label .required").hide();

	    if  (typeof $("#btn_"+field_name)!= 'undefined') {
	      $("#btn_"+field_name).css({"visibility":"hidden"});
	    }
	    if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {
	      $("#btn_clr_"+field_name).css({"visibility":"hidden"});
	    }
	    //消除已经填写的数据
	    /*$("#"+field_name).val("");
	    if  (typeof $("#"+field_name+"_id")!= 'undefined') {
	      $("#"+field_name+"_id").val("");
	    }*/
	  } else if (view === 'DetailView') {
	    //DetailedView只需要考虑隐藏字段的情况
		  mark_obj_td = $("td[field='"+field_name+"']");
		  mark_obj_lable_td = mark_obj_td.prev("td");
		  mark_obj_tr = mark_obj_td.closest("tr");

	      if(hide_bool==true) {
		     //需要进行隐藏
	          if (keep_position==false) {
	          	//缩进隐藏
	            mark_obj_td.hide(); //当前字段所在的TD隐藏
	            mark_obj_lable_td.hide();//当前字段之前的TD隐藏（标签TD)
				mark_obj_tr.append("<td></td><td></td>");
				//之前HIDE了两个单元格，在此补上，以防显示错位
	          }else{
	          	//不缩进隐藏,直接接两个TD中的内容清空，不进行处理

	          }
			mark_obj_lable_td.html("");
			mark_obj_td.html("");
	     }
	  }
	  	//以下内容针对EditView和DetailView都有效，基于mark_obj_tr
  	    //判断是否当前行完全是空白了，如果已经完全是空白，则将当前行直接清空
  	    //如果当前行可以清空，则进一步判断，当前区域是否是空白，如果当前区域也是空白，直接将当前区域清空
		var hide_tr_bool=true;
		$.each(mark_obj_tr.children("td"), function() {
		  	if ($(this).text()!="" && !($(this).css("visibility")=="hidden" || $(this).css("display")=="none")) {
		  		//如果当前字段有内容，并且有内容的字段没有隐藏，则认为当前行不为空
		  		hide_tr_bool=false;
		  		return false;//break for jquery each;
		  	};
		});


		if (hide_tr_bool==true) {//如果确定当前行已经完全为空了，则将当前行直接隐去。
			var hide_table_bool=true;
			//如果当前行可以直接隐去，则进一步判断是否当前行所在的整个区块都可以直接隐去
			$.each(mark_obj_tr.siblings().children("td"), function() {
			  	if ($(this).text()!="" && !($(this).css("visibility")=="hidden" || $(this).css("display")=="none")) {
			  		//如果当前字段有内容，并且有内容的字段没有隐藏，则认为当前行不为空
			  		hide_table_bool=false;
			  		return false;//break for jquery each;
			  	};
			});


			if (hide_table_bool==true) {
				mark_obj_tr.closest("div").hide();//将当前行所在区块隐去
			}else{
				mark_obj_tr.hide();//将当前行隐去
			}
		}
}


/**
 * 设置不可输入
 */
//设置字段不可更新
/*function mark_field_disabled(field_name, hide_bool, keep_position=false) {
	  mark_obj = $("#"+field_name);
	  mark_obj_lable = $("#"+field_name+"_label");

	  if(hide_bool==true) {
	  	if (keep_position==false) {
	    	mark_obj.closest('td').css({"display":"none"});
	    	mark_obj_lable.css({"display":"none"});
		}else{
	    	mark_obj.closest('td').css({"display":"table-column"});
	    	mark_obj_lable.css({"display":"table-column"});
		}
	  }else{
	  	mark_obj.closest('td').css({"display":""});
	    mark_obj_lable.css({"display":""});
		mark_obj.css({"color":"inherit","background-Color":"#efefef;"});
	  	mark_obj.attr("readonly",true);
	  	mark_obj_lable.css({"color":"#aaaaaa"});
	  }
	  if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
	    removeFromValidate('EditView',field_name); // 去除必须验证
	  }
	  $("#"+field_name+"_label .required").hide();

	  if  (typeof $("#btn_"+field_name)!= 'undefined') {
	    $("#btn_"+field_name).css({"visibility":"hidden"});
	  }
	  if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {
	    $("#btn_clr_"+field_name).css({"visibility":"hidden"});
	  }
	}
*/
///**
// * 设置必输
// 
function mark_field_enabled(field_name,not_required_bool) {
  //field_name = 字段名，不需要jquery select标志，直接写名字
  //not_required_bool如果为空或没有明确定义为true的话，字段为必须输入。如果=true则为非必须
  //alert(not_required_bool);
  $("#"+field_name).css({"color":"#000000","background-Color":"#ffffff"});
  $("#"+field_name).attr("readonly",false);
  $("#"+field_name+"_label").css({"color":"#000000","text-decoration":"none"})

  if(typeof not_required_bool == "undefined" || not_required_bool==false || not_required_bool=="") {
      addToValidate('EditView', field_name,'varchar', 'true', $("#"+field_name+"_label").text());//将当前字段标记为必须验证
      //打上必须星标
      if  ($("#"+field_name+"_label .required").text()!='*') {//如果没有星标，则打上星标
        $("#"+field_name+"_label").html($("#"+field_name+"_label").text()+"<span class='required'>*</span>");//打上星标
      } else {//如果已经有星标了，则显示出来
        $("#"+field_name+"_label .required").show();
      }
  } else { //如果不是必须的，则不显示星标
    //直接Remove有时会出错，所有先设置为Validate再Remove
    addToValidate('EditView', field_name,'varchar', 'true', $("#"+field_name+"_label").text());
    removeFromValidate('EditView',field_name);
     //去除必须验证
    $("#"+field_name+"_label .required").hide();
  }
  if  (typeof $("#btn_"+field_name)!= 'undefined') {//移除选择按钮
    $("#btn_"+field_name).css({"visibility":"visible"});
  }
  if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {//移除清空按钮
    $("#btn_clr_"+field_name).css({"visibility":"visible"});
  }
}

function preValidateFunction(ham_woop_id) {
	$.ajax({
			url:'index.php?to_pdf=true&module=HAM_WOOP&action=getTransStatus&record='+ham_woop_id+"&ham_wo_id"+$("#ham_wo_id").val()+"&act_module="+$("#act_module").val(),
			success: function (msg) {
				console.log(msg);
			},
			error: function () { //失败
				alert('Error loading document');
			}
		});
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


	mark_field_disabled("next_woop_name",false);
	mark_field_disabled("next_woop",false);
	mark_field_disabled("next_work_center",false);
	// mark_field_disabled("next_work_center_people",false);
	// mark_field_disabled("next_work_center_res",false);
	
	var woop_status_code = $("#woop_status").val();
	// 从View.edit.php里面定义的变量来的wo_status,next_woop_assignment
	// 为批准、等待物料、等待计划安排、等待作业条件、进行中、等待前序
	//alert(next_woop_assignment);
	if(woop_status_code!="DRAFT"&&next_woop_assignment=="1"&&last_woop_number_flag!="Y"&&(wo_status=="APPROVED"||wo_status=="WMATL"||wo_status=="WSCH"||wo_status=="WPCOND"||wo_status=="INPRG"||wo_status=="WPREV")){
		
	}else{
		 mark_field_disabled("next_work_center_people",false);
		 mark_field_disabled("next_work_center_res",false);
	}
	
	/*if(woop_status_code=="COMPLETED"){
		mark_field_enabled("date_actual_start");
		mark_field_enabled("date_actual_finish");
	}*/
	
	mark_field_disabled("date_actual_start",false);
	mark_field_disabled("date_actual_finish",false);
	
	
	
/**
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
				alert("计划完成日期必须大于等于计划开始日期！");
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

	$("#woop_status").change(function(){
		require_field();
	});


	initTransHeaderStatus()

	function initTransHeaderStatus() {

	    var current_header_status = $("#woop_status").val();
	    if (current_header_status=="DRAFT") {//可以DRAFT和SUBMIT
	        $("#woop_status option[value='APPROVED']").remove();
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
	        setEditViewReadonly ();
	        
	    } else if ((current_header_status=="APPROVED")||(current_header_status=="RELEASED")) { //可以CANCEL,COMPLETED
	        /*$("#wo_status option[value='SUBMITTED']").remove();
	        $("#wo_status option[value='REJECTED']").remove();
	        $("#wo_status option[value='RELEASED']").remove();        
	        $("#wo_status option[value='DRAFT']").remove();
	        $("#wo_status option[value='CLOSED']").remove();
	        $("#wo_status option[value='TRANSACTED']").remove();*/
	    	$("#woop_status option[value='RELEASED']").remove();        
	    	$("#woop_status option[value='REJECTED']").remove();
	    	$("#woop_status option[value='DRAFT']").remove();
	    	$("#woop_status option[value='SUBMITTED']").remove();
	    	$("#woop_status option[value='CLOSED']").remove();
	    	$("#woop_status option[value='REWORK']").remove();
	        setEditViewReadonly ();
	    } else if ((current_header_status=="CANCELED")) { //什么也不能做
	        $("#woop_status option[value='SUBMITTED']").remove();
	        $("#woop_status option[value='REJECTED']").remove();
	        $("#woop_status option[value='DRAFT']").remove();
	        $("#woop_status option[value='RELEASED']").remove();
	        $("#woop_status option[value='APPROVED']").remove();
	        $("#woop_status option[value='CLOSED']").remove();
	        $("#woop_status option[value='TRANSACTED']").remove();
	        $("#woop_status option[value='COMPLETED']").remove();
	        $("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
	        
	      //add by yuan.chen 2016-08-11
	        $("#woop_status option[value='WSCH']").remove();
	        $("#woop_status option[value='WMATL']").remove();
	        $("#woop_status option[value='WPCOND']").remove();
	        $("#woop_status option[value='INPRG']").remove();
	        //end 
	        
	        setEditViewReadonly ();
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
	        $("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
	      
	        $("#wo_status option[value='WSCH']").remove();
	        $("#wo_status option[value='WMATL']").remove();
	        $("#wo_status option[value='WPCOND']").remove();
	        $("#wo_status option[value='INPRG']").remove();
	        setEditViewReadonly ();
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
	        //$("#SAVE_HEADER,#save_and_continue,#SAVE_FOOTER").hide();
	      
	        $("#wo_status option[value='WSCH']").remove();
	        $("#wo_status option[value='WMATL']").remove();
	        $("#wo_status option[value='WPCOND']").remove();
	        $("#wo_status option[value='INPRG']").remove();
	        setEditViewReadonly ();
	    }else if((current_header_status=="WSCH")){//等待计划安排 WSCH WMATL WPCOND INPRG CANCELED
	    	$("#woop_status option[value='DRAFT']").remove();
	    	$("#woop_status option[value='SUBMITTED']").remove();
	    	$("#woop_status option[value='APPROVED']").remove();
	    	$("#woop_status option[value='CLOSED']").remove();
	    	$("#woop_status option[value='REJECTED']").remove();
	    	$("#woop_status option[value='RELEASED']").remove(); 
	    	$("#woop_status option[value='REWORK']").remove(); 
	    	setEditViewReadonly ();
	    }else if((current_header_status=="WMATL")){//等待物料 WMATL WSCH WPCOND INPRG CANCELED
	    	$("#woop_status option[value='DRAFT']").remove();
	    	$("#woop_status option[value='SUBMITTED']").remove();
	    	$("#woop_status option[value='APPROVED']").remove();
	    	$("#woop_status option[value='CLOSED']").remove();
	    	$("#woop_status option[value='REJECTED']").remove();
	    	$("#woop_status option[value='RELEASED']").remove(); 
	    	$("#woop_status option[value='REWORK']").remove(); 
	    	setEditViewReadonly ();
	    }else if((current_header_status=="WPCOND")){//等待作业条件 WMATL WSCH WPCOND INPRG CANCELED
	    	$("#woop_status option[value='DRAFT']").remove();
	    	$("#woop_status option[value='SUBMITTED']").remove();
	    	$("#woop_status option[value='APPROVED']").remove();
	    	$("#woop_status option[value='CLOSED']").remove();
	    	$("#woop_status option[value='REJECTED']").remove();
	    	$("#woop_status option[value='RELEASED']").remove(); 
	    	$("#woop_status option[value='REWORK']").remove(); 
	    }else if((current_header_status=="INPRG")){//正在执行中 WMATL WSCH WPCOND INPRG CANCELED
	    	$("#woop_status option[value='DRAFT']").remove();
	    	$("#woop_status option[value='SUBMITTED']").remove();
	    	$("#woop_status option[value='APPROVED']").remove();
	    	$("#woop_status option[value='CLOSED']").remove();
	    	$("#woop_status option[value='REJECTED']").remove();
	    	$("#woop_status option[value='RELEASED']").remove(); 
	    	$("#woop_status option[value='REWORK']").remove(); 
	    }else if((current_header_status=="WPREV")){//正在执行中 WMATL WSCH WPCOND INPRG CANCELED
	    	$("#woop_status option[value='DRAFT']").remove();
	    	$("#woop_status option[value='SUBMITTED']").remove();
	    	$("#woop_status option[value='APPROVED']").remove();
	    	$("#woop_status option[value='CLOSED']").remove();
	    	$("#woop_status option[value='REJECTED']").remove();
	    	$("#woop_status option[value='RELEASED']").remove(); 
	    	$("#woop_status option[value='REWORK']").remove();  
	    	$("#woop_status option[value='REWORK']").remove(); 
	    }else if((current_header_status=="REWORK")){//正在执行中 WMATL WSCH WPCOND INPRG CANCELED
	    	$("#woop_status option[value='DRAFT']").remove();
	    	$("#woop_status option[value='SUBMITTED']").remove();
	    	$("#woop_status option[value='APPROVED']").remove();
	    	$("#woop_status option[value='CLOSED']").remove();
	    	$("#woop_status option[value='REJECTED']").remove();
	    	$("#woop_status option[value='RELEASED']").remove(); 
	    	$("#woop_status option[value='WPREV']").remove(); 
	    }
	    
	}

function setEditViewReadonly () { //如果当前头状态为Submitted、Approved、Canceled、Closed需要将字段变为只读
    $("#EditView_tabs input").attr("readonly",true);
    $("#EditView_tabs button").attr("readonly",true);
    $("#EditView_tabs input").attr("style","background-Color:#efefef");
    mark_field_disabled("work_center",false);
	mark_field_disabled("work_center_people",false);
	mark_field_disabled("work_center_res",false);
	mark_field_disabled("date_schedualed_start",false);
	mark_field_disabled("event_type",false);
	
	
	var woop_status = $("#woop_status").val();
	if(woop_status=="COMPLETED"){
		//mark_field_enabled("date_actual_start",true);
		//mark_field_enabled("date_actual_finish",true);
		$(".input-group-addon").hide();
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
		
	}else{
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
    
}


});
