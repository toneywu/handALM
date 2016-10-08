/*这个文件主要被其它模块调用*/

function triger_setFF(id_value, module_name) {

  //console.log("index.php?to_pdf=true&module=HAA_FF&action=setFF&ff_module="+module_name+"&ff_id="+id_value);
  hideAllAttributes()//将所有的Attribute先变空，如果Attribute在FF中有设置，在后续的SetFF过程中会自动显示出来，否则这些扩展字段默认都不显示
  if (id_value!="") {
   $.ajax({
        url: "index.php?to_pdf=true&module=HAA_FF&action=setFF&ff_module="+module_name+"&ff_id="+id_value,
        success: function (result) {
             var ff_fields = jQuery.parseJSON(result);
             $.each(ff_fields.FF, function () { //针对读取到的FF模板，针对每个设置的条目进行处理
                setFF(this)
            })
        },
        error: function () { //失败
            alert('Error loading document');
        },
        async:false
    });
  }
}


function setFF(FFObj) {
	//设置FlexFORM，也就是根据不同的Product结果，动态的调整界面字段
	//console.log(FFObj);
	if (FFObj.fieldtype=="HIDE") {
		mark_field_disabled(FFObj.field,true,false) //隐藏字段
	} else if (FFObj.fieldtype=="PLACEHOLDER"){
		mark_field_disabled(FFObj.field,true,true) //隐藏字段
	}

	if (FFObj.label!=null&&FFObj.label!="") {//修改标签
		$("#"+FFObj.field+'_label').html(FFObj.label+":"); 
	}
	if (FFObj.default_val!=null) {//设置默认值
		  $("#"+FFObj.field+":checkbox").prop('checked',FFObj.default_val=='1'?true:false);
		  $("#"+FFObj.field).val(FFObj.default_val);
	}
}

function hideAllAttributes() {
	//在FF设置之前进行调用，用于将所有的Attribute对象进行隐藏，也就是所有的Attribute默认都是不显示的，除非在FF中进行了设置
	//之后通过SetFF确定是否需要将已经隐藏的Attribute进行显示出来。
	var i=1;
	while ($("#attribute"+i).length != 0 || $("#attribute"+i+"_c").length != 0) {
		//检查界面模块是否有Attribute存在，如果有就继续下一个，循环直到不再有新的Attribute存在
		//console.log("#attribute"+i+"_c ："+$("#attribute"+i+"_c").length);
		//以下判断是将attributeX失效，还是将attributeX_c失效
		if ($("#attribute"+i).length != 0) {
			mark_field_disabled("attribute"+i,true,false);
		} else {
			mark_field_disabled("attribute"+i+"_c",true,false);
		}
		i++;//查找下一个attribute
	}
}

function mark_field_disabled(field_name, hide_bool, keep_position=false) {

	  var view = action_sugar_grp1;

	  mark_obj = $("#"+field_name);
	  mark_obj_lable = $("#"+field_name+"_label");
	  mark_obj_tr = $("#"+field_name).closest("tr");

	  if(view === 'EditView') {
	    if(hide_bool==true) {
	    	if (keep_position==false) {
	        	mark_obj.closest('td').css({"display":"none"});
	        	mark_obj_lable.css({"display":"none"});
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
	        mark_obj_lable.css({"color":"#aaaaaa","text-decoration":"line-through"});
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
	    $("#"+field_name).val("");
	    if  (typeof $("#"+field_name+"_id")!= 'undefined') {
	      $("#"+field_name+"_id").val("");
	    }
	  } else {
	    //DetailedView只需要考虑隐藏字段的情况
	      if(hide_bool==true) {
		     //需要进行隐藏
	          if (keep_position==false) {
	          	//缩进隐藏
	            mark_obj.closest('td').css({"display":"none"});
				//mark_obj.closest('td').css({"visibility":"hidden"});
	            mark_obj.closest('td').prev().css({"display":"none"});
				//mark_obj.closest('td').prev().css({"visibility":"hidden"});
/*				$("td[field="+field_name+"]").prev().css({"visibility":"hidden"});
				$("td[field="+field_name+"]").css({"visibility":"hidden"});
*/				mark_obj_tr.append("<td></td><td></td>");
				//之前HIDE了两个单元格，在此补上，以防显示错位
	          }else{
	          	//不缩进隐藏,直接接两个TD中的内容清空，不进行处理

	          }
			mark_obj.closest('td').prev().html("");
			mark_obj.closest('td').html("");
	     }
	  }
	  	//以下内容针对EditView和DetailView都有效
  	    //判断是否当前行完全是空白了，如果已经完全是空白，则将当前行直接清空
		var hide_bool=true;
		$.each(mark_obj_tr.children("td"), function() {
			//console.log($(this).css("visibility"));
		  	if ($(this).text()!="" && ($(this).css("visibility")!="hidden"||$(this).css("display")!="none")) { 
		  		//如果当前字段有内容，并且有内容的字段没有隐藏，则认为当前行不为空
		  		hide_bool=false;
		  	};
		});
		//console.log(hide_bool);
		if (hide_bool==true) {
			mark_obj_tr.hide();
		}
	}


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
