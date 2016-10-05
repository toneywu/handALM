/* 这个文件主要被其它模块调用 */

function triger_setFF(id_value, module_name) {

  // console.log("index.php?to_pdf=true&module=HAA_FF&action=setFF&ff_module="+module_name+"&ff_id="+id_value);
  if (id_value!="") {
   $.ajax({
        url: "index.php?to_pdf=true&module=HAA_FF&action=setFF&ff_module="+module_name+"&ff_id="+id_value,
        success: function (result) {
             var ff_fields = jQuery.parseJSON(result);
             $.each(ff_fields.FF, function () {
                setFF(this)
            })
             // alert("index.php?to_pdf=true&module=HAA_FF&action=setFF&ff_module="+module_name+"&ff_id="+id_value);
        },
        error: function () { // 失败
            alert('Error loading document');
        },
        async:false
    });
  }
}


function setFF(FFObj) {
	// 设置FlexFORM，也就是根据不同的Product结果，动态的调整界面字段
	// console.log(FFObj);
    console.log(FFObj);
	
	if (FFObj.fieldtype=="HIDE") {
		mark_field_disabled(FFObj.field,true,false);
	} else if (FFObj.fieldtype=="PLACEHOLDER"){
		mark_field_disabled(FFObj.field,true,true);
	}

	if (FFObj.label!=null&&FFObj.label!="") {
		$("#"+FFObj.field+'_label').html(FFObj.label+":"); 
	}
	if (FFObj.default_val!=null) {
		  $("#"+FFObj.field+":checkbox").prop('checked',FFObj.default_val=='1'?true:false);
		  $("#"+FFObj.field).val(FFObj.default_val);
	}
}


function mark_field_disabled(field_name, hide_bool, keep_position=false) {
  mark_obj = $("#"+field_name);
  mark_obj_lable = $("#"+field_name+"_label");
  var view = action_sugar_grp1;
  if(view == 'EditView') {
	  if(hide_bool==true) {
	  	if (keep_position==false) {
	    	mark_obj.closest('td').css({"display":"none"});
	    	mark_obj_lable.css({"display":"none"});
			console.log(field_name);
			removeFromValidate('EditView',field_name); 
			mark_obj.remove();
		}else{
	    	mark_obj.closest('td').css({"display":"table-column"});
	    	mark_obj_lable.css({"display":"table-column"});
			mark_obj.remove();
			removeFromValidate('EditView',field_name); 
			
		}
	  }else{
	  	mark_obj.closest('td').css({"display":""});
	    mark_obj_lable.css({"display":""});
		mark_obj.css({"color":"#efefef","background-Color":"#efefef;"});
	  	mark_obj.attr("readonly",true);
		mark_obj_lable.css({"color":"#aaaaaa"});
	  }
  if (typeof validate != "undefined" && typeof validate['EditView'] != "undefined") {
    removeFromValidate('EditView',field_name); 
  }
  $("#"+field_name+"_label .required").hide();
  if  (typeof $("#btn_"+field_name)!= 'undefined') {
    $("#btn_"+field_name).css({"visibility":"hidden"});
	$("#btn_"+field_name).css({"display":"none"});
  }
  if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {
    $("#btn_clr_"+field_name).css({"visibility":"hidden"});
	$("#btn_clr_"+field_name).css({"display":"none"});
  }
 
  $("#"+field_name).val("");
  if  (typeof $("#"+field_name+"_id")!= 'undefined') {
    $("#"+field_name+"_id").val("");
  }
  }else {

      if(hide_bool==true) {
          if (keep_position==false) {
            mark_obj.closest('td').css({"display":"none"});
            mark_obj.closest('td').prev().css({"display":"none"});
			$("td[field="+field_name+"]").prev().remove();
			$("td[field="+field_name+"]").remove();
          }else{
              mark_obj.closest('td').prev().html("");
              mark_obj.closest('td').html("");
			  
          }
		  
      }
  }
}

function mark_field_enabled(field_name,not_required_bool) {
  // field_name = 字段名，不需要jquery select标志，直接写名字
  // not_required_bool如果为空或没有明确定义为true的话，字段为必须输入。如果=true则为非必须
  // alert(not_required_bool);
  $("#"+field_name).css({"color":"#000000","background-Color":"#ffffff"});
  $("#"+field_name).attr("readonly",false);
  $("#"+field_name+"_label").css({"color":"#000000","text-decoration":"none"})

  if(typeof not_required_bool == "undefined" || not_required_bool==false || not_required_bool=="") {
      addToValidate('EditView', field_name,'varchar', 'true', $("#"+field_name+"_label").text());// 将当前字段标记为必须验证
      // 打上必须星标
      if  ($("#"+field_name+"_label .required").text()!='*') {// 如果没有星标，则打上星标
        $("#"+field_name+"_label").html($("#"+field_name+"_label").text()+"<span class='required'>*</span>");// 打上星标
      } else {// 如果已经有星标了，则显示出来
        $("#"+field_name+"_label .required").show();
      }

  } else { // 如果不是必须的，则不显示星标
    // 直接Remove有时会出错，所有先设置为Validate再Remove
    addToValidate('EditView', field_name,'varchar', 'true', $("#"+field_name+"_label").text());
    removeFromValidate('EditView',field_name);
     // 去除必须验证
    $("#"+field_name+"_label .required").hide();
  }
  if  (typeof $("#btn_"+field_name)!= 'undefined') {// 移除选择按钮
    $("#btn_"+field_name).css({"visibility":"visible"});
  }
  if  (typeof $("#btn_clr_"+field_name)!= 'undefined') {// 移除清空按钮
    $("#btn_clr_"+field_name).css({"visibility":"visible"});
  }
}
