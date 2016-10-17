//deleted by toney.wu 前两个函数保持在ff_include.js中，不要单独进行维护，如果ff_include.js不完整，请针对此文件进行更新

function mark_field_disabled_mine(field_name, hide_bool, keep_position=false) {
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
	    //$("#"+field_name).val("");
	    //if  (typeof $("#"+field_name+"_id")!= 'undefined') {
	   //   $("#"+field_name+"_id").val("");
	   // }
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
/**
 * loopField
 */
function loopField(fieldName,type){
	if(type=="OPTIONAL"){
		for (var i=0;i<prodln;i++) {
			mark_field_enabled(fieldName+i,true);
		 }
	}else if(type=="LOCKED"){
		for (var i=0;i<prodln;i++) {
		    mark_field_disabled_mine(fieldName+i,false);
		}
	}else if(type=="REQUIRED"){
		for (var i=0;i<prodln;i++) {
			// mark_field_disabled(fieldName+i,false);
		    mark_field_enabled(fieldName+i,false);
		}
	}else if(type=="INVISIABLE"){
		for (var i=0;i<prodln;i++) {
			// hide_field_disabled(fieldName+i,true,false)
		    $("#"+fieldName+i).css({"visibility":"hidden"});
		    $("#"+fieldName+i+"_label").css({"visibility":"hidden"});
		    $("#btn_"+fieldName+i).css({"visibility":"hidden"});
		    $("#"+fieldName+i).parents('.input_group').hide();//remove(); 
		    $("#"+fieldName+"_title").hide();//remove(); 
		    $("#displayed_"+fieldName+i).hide();//remove(); 
		    mark_field_disabled(fieldName+i,false);
		}
	}
}
/**
 * 
 */
function changeRequired(lineRecord){
	console.log("begin to changeRequired");
	console.log(lineRecord);
	loopField("line_hit_ip_subnets",lineRecord.lineRecord);
	// loopField("line_hit_ip_subnets",lineRecord.change_associated_ip);
	loopField("line_gateway",lineRecord.change_gateway);
	loopField("line_bandwidth_type",lineRecord.change_bandwidth_type);
	loopField("line_port",lineRecord.change_port);
	loopField("line_speed_limit",lineRecord.change_speed_limit);
	loopField("line_hat_asset_name",lineRecord.change_asset);
	loopField("line_hat_assets_cabinet",lineRecord.change_cabinet);
	loopField("line_monitoring",lineRecord.change_monitoring);
	loopField("line_channel_num",lineRecord.change_channel_num);
	loopField("line_channel_content",lineRecord.change_channel_content);
	loopField("line_mrtg_link",lineRecord.change_mrtg_link);
	loopField("line_access_assets_name",lineRecord.change_access_assets_name);
	loopField("line_parent_ip",lineRecord.change_parent);
	loopField("line_associated_ip",lineRecord.change_associated_ip);
}

//delted by toney.wu 20161007
//所有的功能已经实现HAT_Asset_Trans_Batch_editview.js的函数resetEventType()
/*function change_asset_Required(lineRecord){

	console.log("lineRecord");

	loopField("line_target_owning_org",lineRecord.change_owning_org);
	loopField("line_target_owning_org",lineRecord.change_using_org);
	loopField("line_target_owning_person",lineRecord.change_owning_person);
	loopField("line_target_rack_position_desc",lineRecord.change_rack_position);
}
*/