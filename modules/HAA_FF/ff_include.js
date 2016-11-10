/*************************************************************
* 这个文件是HandALM一个重要的通用性模块，它会被其它多个模块调用
* 这个文件中定义了FlexForm的基本方法
* 同时这个文件中还提供了以下重要的函数
* mark_field_disabled
* mark_field_enabled
*************************************************************/

function triger_setFF(id_value, module_name) {
  //console.log("index.php?to_pdf=true&module=HAA_FF&action=setFF&ff_module="+module_name+"&ff_id="+id_value);
  if (id_value!="") {
   $.ajax({
        url: "index.php?to_pdf=true&module=HAA_FF&action=setFF&ff_module="+module_name+"&ff_id="+id_value,
        success: function (result) {
             var ff_fields = jQuery.parseJSON(result);

			 hideAllAttributes(ff_fields)//将所有的Attribute先变空，如果Attribute在FF中有设置，在后续的SetFF过程中会自动显示出来，否则这些扩展字段默认都不显示
             $.each(ff_fields.FF, function () { //针对读取到的FF模板，针对每个设置的条目进行处理
                setFF(this)
            })

            if (typeof(ff_fields.JS)!="undefined") {
             	eval($('<textarea>').html(htmlUnescape(ff_fields.JS)).text());
            }
        },
        error: function () { //失败
            alert('Error loading document');
        },
        async:false
    });
  }
}

function htmlUnescape(str){
    return str
        .replace(/&quot;/g, '"')
        .replace(/&#39;/g, "'")
        .replace(/&lt;/g, '<')
        .replace(/&gt;/g, '>')
        .replace(/&amp;/g, '&');
}

function setFF(FFObj) {
	//设置FlexFORM，基于triger_setFF函数读取到的Ajax结果，动态的调整界面字段
	//其中FFObj是FF_Fields中定义的需要变化的各个字段及属性
	//console.log(FFObj);//<-------------------如果你需要调试，可以将这一行的内容输出

	var view = action_sugar_grp1;
	//有些界面在EditView和DetailView中处理有所不同，因此先读取出当前界面是哪些，保存在View中
	//另外如果当前界面不是EditView或DetailView可能会有错误

	if (FFObj.fieldtype=="HIDE") { //将字段进行隐藏
		mark_field_disabled(FFObj.field,true,false);
	} else if(FFObj.fieldtype=="LIST"){
		mark_field_setlist(FFObj);
	} else if(FFObj.fieldtype=="CHECKBOX"){ 
		mark_field_setcheckbox(FFObj);
	} else if (FFObj.fieldtype=="PLACEHOLDER"){
		mark_field_disabled(FFObj.field,true,true);
	} else if (FFObj.fieldtype=="READONLY"){
		//write annother function to control
		//add by yuan.chen

		mark_field_readonly(FFObj.field,false);
		//修改标签名称
		if (FFObj.label!=null && FFObj.label!="") {
			if (view=="EditView") {
				$("#"+FFObj.field+'_label').html(FFObj.label+":"); 
			} else if(view =="DetailView") {
				$("td[field='"+FFObj.field+"']").prev("td").html(FFObj.label+":");
			}
		}
		//end 
	} else {
	//如果是非隐藏字段
		//修改标签名称
		if (FFObj.label!=null && FFObj.label!="") {
			if (view=="EditView") {
				$("#"+FFObj.field+'_label').html(FFObj.label+":"); 
			} else if(view =="DetailView") {
				$("td[field='"+FFObj.field+"']").prev("td").html(FFObj.label+":");

			}
		}
	}

	if (view=="EditView") {
		//设定是否为必须值
		//TODO:
		//这里的处理逻辑没有写完，因为判断的逻辑比较复杂。先要判断当前字段是否为必须，然后需要继续当前是否有变化来进行处理
		//并且处理包括在样式上打上*的标记或去除，以及在字段验证上进行处理
		if ((FFObj.att_required == 0||FFObj.att_required == '0')
			&&(FFObj.fieldtype!="HIDE"&&FFObj.fieldtype!="PLACEHOLDER"&&FFObj.fieldtype!="CHECKBOX")) {
			//非必须
			$("#"+FFObj.field+'_label').children().remove(".required");
		} else {
			//必须
			if ($("#"+FFObj.field+'_label').is(":visible")) {
				$("#"+FFObj.field+"_label").append('<span class="required">*</span>');
				//只需要加入这个Class系统就会自动进行验证，不需要额外的内容
			}
		}

		//TODO还需要添加字段为值列表、Checkbox等一系列形态

		//设定默认值
		if (FFObj.default_val!=null&&FFObj.default_val!="") {
			var thisObj = $("#"+FFObj.field);
			$("#"+FFObj.field+":checkbox").attr('checked',(FFObj.default_val=='1'?'true':'false')); //针对Checkbox
			thisObj.val(FFObj.default_val);//针对其它input以及select对象
			$("#"+FFObj.field).trigger('change');//触发设置了默认值之后的chanage事件
		}
	}
}
//重写check_form方法
function check_form(formname){
	if(typeof(siw)!='undefined'&&siw&&typeof(siw.selectingSomething)!='undefined'&&siw.selectingSomething)
		return false;
	else{
		var flag=false;
		$(".required").each(function(){
			//获取label的ID
			var label_id="";
			if($(this).parent().attr("id")){
				label_id=$(this).parent().attr("id");
			}
			//按照_label截取为数组,取第一个,即为字段ID
			var array=label_id.split("_label");
			var field_id=array[0];
			if (array[1]!="") {
				field_id+=array[1];
			}
			var field_label=$(this).parent().text().replace("*","");
			field_label=field_label.replace(":","");
			if($("#"+field_id).val()==""){//文本域input、textarea
				//获取字段对应文本框的ID
				add_error_style('EditView', field_id, SUGAR.language.get('app_strings', 'ERR_MISSING_REQUIRED_FIELDS')+field_label);
				flag=true;
			}
		});
		if(!flag)
			return validate_form(formname,'');
	}
}

/******************************
//在FF设置之前进行调用，用于将所有的Attribute对象进行隐藏，也就是所有的Attribute默认都是不显示的，除非在FF中进行了设置
//之后通过SetFF确定是否需要将已经隐藏的Attribute进行显示出来。
/*****************************/
function hideAllAttributes(ff_fields) {

	var i=1;
	while ($("#attribute"+i).length != 0 || $("#attribute"+i+"_c").length != 0) {
		//检查界面模块是否有Attribute存在，如果有就继续下一个，循环直到不再有新的Attribute存在

		var ff_defined=false;
        $.each(ff_fields.FF, function () { //针对读取到的FF模板，针对每个设置的条目进行处理
            if (this.field == "attribute"+i || this.field == "attribute"+i+"_c") {
            	//如果在当前FF中有针对当前Attribute字段的定义，则不对当前字段进行处理，直接以FF的定义进行处理
            	ff_defined=true;
            }
        })
        if (ff_defined==false) {
			//以下判断是将attributeX失效，还是将attributeX_c失效
			if ($("#attribute"+i).length != 0) {
				mark_field_disabled("attribute"+i,true,false);
			} else {
				mark_field_disabled("attribute"+i+"_c",true,false);
			}
		}
		i++;//查找下一个attribute
	}
}

function mark_field_setlist(fields) {
	var view=action_sugar_grp1;
	var field_name=fields.field;
	if (view=='EditView') {
		var html="<select id='"+field_name+"' name='"+field_name+"'></select>";
		$("#"+field_name+'_label').html(fields.label+":");
		$("#"+field_name).parent().html(html);
		$.ajax({
			url:"index.php?to_pdf=true&module=HAA_FF&action=get_HAA_FF&code_tag="+fields.listfilter,
			type:"POST",
			success:function(data){
				var fields = jQuery.parseJSON(data);
				var option="";
				for (var i = 0; i < fields.length; i++) {
					option+="<option value='"+fields[i]+"'>"+fields[i]+"</option>";
				}
				$("#"+field_name).append(option);
			}
		});
	}else if(view=='DetailView'){
		$("#"+field_name).parent().prev().html(fields.label+":");
	}
}

function mark_field_setcheckbox(fields){
	var view=action_sugar_grp1;
	var html="";
	var field_name=fields.field;
	if (view=='EditView') {
		$("#"+field_name+'_label').html(fields.label+":");
		var checkval=$("#"+field_name).val();
		html='<input id="'+field_name+'" name="'+field_name+'" type="checkbox" value="1"/>';//默认为false
		if (checkval==1) {
			html='<input id="'+field_name+'" name="'+field_name+'" type="checkbox" value="1" checked/>';
		}
		$("#"+field_name).val("0").hide();
		$("#"+field_name).parent().append(html);
	} else if(view=='DetailView'){
		var checkval=$("#"+field_name).html();
		html='<input id="'+field_name+'" name="'+field_name+'" type="checkbox" disabled value="1"/>';
		if (checkval==1) {
			html='<input id="'+field_name+'" name="'+field_name+'" type="checkbox" disabled value="1" checked/>';
		}
		$("#"+field_name).hide();
		$("#"+field_name).parent().html(html);
		$("#"+field_name).parent().prev().html(fields.label+":");
	}
}

function mark_field_disabled(field_name, hide_bool, keep_position=false, donot_clean=true) {
	var view = action_sugar_grp1;
	if(view == 'EditView') {
		mark_obj = ($("#"+field_name).length>0)?$("#"+field_name):$("[name='"+field_name+"'");
		mark_obj_lable = $("#"+field_name+"_label");
		mark_obj_tr = $("#"+field_name).closest("tr");

		if (donot_clean==false) {
		    //消除已经填写的数据
		    if ($("#"+field_name).prev().prop('nodeName')=="INPUT") {
		    	$("#"+field_name).removeAttr('value')
		    }
		    if ($("#"+field_name+"_id").prev().prop('nodeName')=="INPUT") {
		    	$("#"+field_name+"_id").removeAttr('value')
		    }
		}

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

	  } //End EditView
	  else if (view == 'DetailView') {
	    //DetailedView只需要考虑隐藏字段的情况
		  mark_obj_td = $("td[field='"+field_name+"']");
		  mark_obj_lable_td = mark_obj_td.prev("td");
		  mark_obj_tr = mark_obj_td.closest("tr");

	      if(hide_bool==true) {
		     //需要进行隐藏
	          if (keep_position==false) {
	          	//缩进隐藏
	          	if (mark_obj_td.css("display")!="none") {
		            mark_obj_td.hide(); //当前字段所在的TD隐藏
		            mark_obj_lable_td.hide();//当前字段之前的TD隐藏（标签TD)
					mark_obj_tr.append("<td></td><td></td>");
				//之前HIDE了两个单元格，在此补上，以防显示错位
				}
	          }else{
	          	//不缩进隐藏,直接接两个TD中的内容清空，不进行处理

	          }
			mark_obj_lable_td.html("");
			mark_obj_td.html("");
	     }
	  } //end DetailView

	  	//以下内容针对EditView和DetailView都有效，基于mark_obj_tr
  	    //判断是否当前行完全是空白了，如果已经完全是空白，则将当前行直接清空
  	    //如果当前行可以清空，则进一步判断，当前区域是否是空白，如果当前区域也是空白，直接将当前区域清空
		var hide_tr_bool=true;
		$.each(mark_obj_tr.children("td"), function() {
		  	if ($(this).text().trim()!="" && !($(this).css("visibility")=="hidden" || $(this).css("display")=="none")) {
		  		//如果当前字段有内容，并且有内容的字段没有隐藏，则认为当前行不为空
		  		hide_tr_bool=false;
		  		return false;//break for jquery each;
		  	}
		});


		if (hide_tr_bool==true) {//如果确定当前行已经完全为空了，则将当前行直接隐去。
			var hide_table_bool=true;
			//如果当前行可以直接隐去，则进一步判断是否当前行所在的整个区块都可以直接隐去
			$.each(mark_obj_tr.siblings().children("td"), function() {
			  	//if ($(this).text()!="" && !($(this).css("visibility")=="hidden" || $(this).css("display")=="none")) {
			  		if ($(this).text()!="" && ($(this).css("visibility")!="hidden" || $(this).css("display")!="none")) {
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
}//end function mark_field_disabled

function mark_field_readonly(field_name) {
	  var view = action_sugar_grp1;
	  if(view == 'EditView') {
		mark_obj = ($("#"+field_name).length>0)?$("#"+field_name):$("[name='"+field_name+"'");
		mark_obj_lable = $("#"+field_name+"_label");
		mark_obj_tr = $("#"+field_name).closest("tr");

	   
		mark_obj.closest('td').css({"display":""});
		mark_obj_lable.css({"display":""});
		mark_obj.attr("disabled","disabled");
		
		mark_obj.css({"background-Color":"#efefef;"});
		mark_obj.attr("readonly",true);
		mark_obj_lable.css({"color":"#aaaaaa"});
	    
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
	    //$("#"+field_name).val("");
	    if  (typeof $("#"+field_name+"_id")!= 'undefined') {
	      $("#"+field_name+"_id").val("");
	    }
		
		if($("#"+field_name).attr("class")=="date_input"){
		console.log(field_name);
		var next_dates_array =$("#"+field_name).nextAll();
		next_dates_array.css({"visibility":"hidden"});
		}
		
		
	  }
}


function mark_field_enabled(field_name,not_required_bool) {
  // field_name = 字段名，不需要jquery select标志，直接写名字
  // not_required_bool如果为空或没有明确定义为true的话，字段为必须输入。如果=true则为非必须
  // alert(not_required_bool);
  $("#"+field_name).css({"color":"#000000","background-Color":"#ffffff"});
  $("#"+field_name).attr("readonly",false);
  $("#"+field_name+"_label").css({"color":"#000000"})

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


function FFCheckField(field_id,ajaxStr,errMsg) {
	// for example,
	// ajaxStr="d&mode=locationName&val='+checkname+'&id=' + locaton_id"
	// errMsg="SUGAR.language.get('app_strings', 'LBL_DUPLICATED_ERR')"

	var checkname =$("#"+field_id+"").val();

		console.log('index.php?to_pdf=true&module=HAA_FF&action=validateField&'+ajaxStr);
		if(checkname=="") {
			return
		}

		$.ajax({//
			url: 'index.php?to_pdf=true&module=HAA_FF&action=validateField&'+ajaxStr,
			//async: false,
			success: function (data) {
				console.log("checked result="+data+":"+(data=='0'||data==0));
				clear_all_errors();
				if (data=='0'||data==0) {
					console.log('error');
					add_error_style('EditView',field_id,errMsg);
				}
			},//end sucess
			error: function () { //失败
				alert('Error loading AJAX for status check');
			}//end error
		})//end ajax
}