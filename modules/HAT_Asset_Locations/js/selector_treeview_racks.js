/*********************
/* 基于U位明细进行绘图
/***************************/
//$.getScript("custom/resources/JSON/json2.js"); //JASON2
//$.getScript("cache/include/javascript/sugar_grp_yui_widgets.js"); //old MessageBox
$.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); //MessageBox
$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css" />');


var globalServerData;

function showITRacks(node){ //渲染机柜，在首次加载时被调用
	if(typeof node.data.server != "undefined") {
		//console.log(node.data.server);
		globalServerData = node.data;

		for (i in globalServerData.server) {
		  	drawBlocker(i)//绘制设备占位或空占位
		}

	}
	selectServerArea();//加载可触发的事件
}

/******************
*通过合并单元格的方式，在界面上呈现出机柜的样式
*在首次生成机柜时会调用本函数。在每次确认机柜数据修改时，也会调用本函数进行重新绘制。
*（在重新绘制前可能通过cleanBlocker先清空单元格）
********************/
//function drawBlocker(pos_x, pos_height, pos_y, asset_id, asset_status, asset_name, asset_desc, asset_using_org, asset_using_org_id, desc) {//绘制设备占位或空占位
//显示当前服务器
//

function drawBlocker(i) {//绘制设备占位或空占位
//显示当前服务器

  	var pos_y = globalServerData.server[i].rack_pos_top;
  	var pos_height = globalServerData.server[i].height;
  	var pos_x = globalServerData.server[i].rack_pos_depth;

  	var asset_id = globalServerData.server[i].asset_id;
  	var asset_status = globalServerData.server[i].asset_status;
  	var asset_name = globalServerData.server[i].asset_name;
  	var asset_desc = globalServerData.server[i].asset_desc;
	var asset_using_org = globalServerData.server[i].hat_assets_accounts_name;
	var asset_using_org_id = globalServerData.server[i].hat_assets_accounts_id;
	var desc = globalServerData.server[i].desc;
	var numberingRule = globalServerData.numbering_rule;//获取是大编号在TOP还是小编号在TOP，影响Height的计算

  	var pos_obj = $("#position_"+pos_x.substring(0,1)+"_"+pos_y)//定位上左上角的td对象
  	pos_obj.after("<td id='element_"+pos_x.substring(0,1)+"_"+pos_y+"'></td>");
  	var element_obj = $("#element_"+pos_x.substring(0,1)+"_"+pos_y)
	//console.log(globalServerData.server[i]);

	if(asset_id!=""&&asset_id!=undefined) {
		//提供了资产编号的都是正常的设备
		element_obj.append("<span class='color_asset_status_"+asset_status+
						"' style='width:12px;height:12px;border:#ccc 1px solid;display:inline-block'>&nbsp</span> <a href='?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3DHAT_Assets%26action%3DDetailView%26record="+asset_id+"'>"+ 
						asset_name+"</a> "+asset_desc+
						" | "+asset_using_org);
		element_obj.css({
			"background-color":"#fff",
			"vertical-align":"middle",
			"border":"#000 2px solid", 
		});

	}else{
		//没有提供资产编号的就是按占位处理
		element_obj.append(SUGAR.language.get('HAT_Asset_Locations', 'LBL_PLACEHOLDER')+"|"+desc);
		element_obj.css({
			"background-color":"#efefef",
			"vertical-align":"middle",
			"border":"2px #A8A8A8 dashed",
		});
	}
	//横向合并
	element_obj.attr("class","Rack_Elements");
	//console.log(jQuery.parseJSON(varServer.server[i]));
	element_obj.attr("onclick","clickRackElement("+i+")");//加入了点击后的事件
	element_obj.attr("colspan",pos_x.length);
	//纵向合并列
	element_obj.attr("rowspan",pos_height);

	for(var y=0; y<Number(pos_height); y++) { //将周边单元格进行合并
		var var_target_row = 0;
		if(numberingRule=="TOP") {
			var_target_row =(Number(pos_y)+y);
		} else {
			var_target_row =(Number(pos_y)-y);
		}

		for(var x=0; x<pos_x.length; x++) {
			//console.log("#position_"+pos_x.substring(x,x+1)+"_"+var_target_row);
			$("#position_"+pos_x.substring(x,x+1)+"_"+var_target_row).hide();
		}
	}
	//pos_obj.show();//上述循环时将自己也隐藏了，现在重新显示出来
}

/******************
*将已经绘制的设备或框图清除，用于在关闭弹出式编辑界面后将图上的数据清空。
*包括对设备位置进行修改时，也会先调用本函数，再通过drawBlocker进行重新绘制
********************/
function cleanBlocker(pos_x, pos_height, pos_y) {
	var numberingRule = globalServerData.numbering_rule;//获取是大编号在TOP还是小编号在TOP，影响Height的计算
  	var pos_obj = $("#position_"+pos_x.substring(0,1)+"_"+pos_y)//定位上左上角的td对象
  	var var_paired_y = 0;

  	$("#element_"+pos_x.substring(0,1)+"_"+pos_y).remove()
	if(numberingRule=="TOP") {
		var_paired_y =(Number(pos_y)+Number(pos_height));
	} else {
		var_paired_y =(Number(pos_y)-Number(pos_height));
	}

	pos_obj.replaceWith('<td id="'+'position_'+pos_x.substring(0,1)+'_'+pos_y+'" class="rack_td"></td>');
	for(var drawY=Math.min(pos_y,var_paired_y); drawY<=Math.max(pos_y,var_paired_y); drawY++) {
		for(var drawX=0; drawX<pos_x.length; drawX++) {
			$("#position_"+pos_x.substring(drawX,drawX+1)+"_"+drawY).css("display","");
		}
	}
}




function openAssetPopup(ln){//本文件为行上选择资产的按钮
  var popupRequestData = {
    "call_back_function" : "setAssetReturn",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "id" : "rack_pos_asset_id",
      "name" : "rack_pos_asset_name",
      "asset_desc" : "rack_pos_asset_desc",
      "asset_status" : "rack_pos_asset_status",//注意，这一条目写的是Current
      "using_org" : "rack_poshat_assets_accounts_name",
      "using_org_id" : "rack_poshat_assets_accounts_id",
/*      "using_person" : "line_current_using_person",
      "using_person_id" : "line_current_using_person_id",
      "using_person_desc" : "line_current_using_person_desc",
*/    }
  };
  open_popup('HAT_Assets', 1200, 850, "", true, true, popupRequestData);
}
function setAssetReturn(popupReplyData){
  //popupReplyData中lineno会做为行号一并返回
  set_return(popupReplyData);
  if ($("#target_using_org_id").val()!="") {
  	$("#rack_poshat_assets_accounts_name").val($("#target_using_org").val());
  	$("#rack_poshat_assets_accounts_id").val($("#target_using_org_id").val())
  }
  //console.log(popupReplyData);
}

function openUsingOrgPopup(ln){
  lineno=ln;
  var popupRequestData = {
    "call_back_function" : "set_return",
    "form_name" : "EditView",
    "field_to_name_array" : {
      "name" : "line_target_using_org" + ln,
      "id" : "line_target_using_org_id" + ln,
    },
  };
  var popupFilter = '&frame_c_advanced='+$("#haa_framework").val();
  open_popup('Accounts', 1000, 850,popupFilter , true, true, popupRequestData);
}

/**********************
/* 提供用于数据提交的字段
/***************************/
function showITRacksForm(isPopup, varDeepth, varHeight, varTopmost , i) {
	var return_html="";
	var numberingRule = globalServerData.numbering_rule;//获取是大编号在TOP还是小编号在TOP，影响Height的计算

	if(varDeepth!="") { //初始化深度数据，后续深度的值就是直接复制 hit_rack_pos_depth_list
		$("#hit_rack_pos_depth_list option").attr("selected", false)//将当前先清空
		$("#hit_rack_pos_depth_list option[value='"+varDeepth+"']").attr("selected", true)
	} else {
		$("#hit_rack_pos_depth_list option[value='FM']").attr("selected", true);
	}

	//console.log(varDeepth);

	return_html += '<form id="EditView"><div class="lineEditor">';
	return_html +=  "<input type='hidden' name='rack_pos_id' id='rack_pos_id' value=''>";
	return_html += "<span class='input_group'>"+
			"<label>"+ SUGAR.language.get('HIT_Rack_Allocations', 'LBL_PLACEHOLDER')+"</label>"+
			"<input name='rack_pos_placeholder'  type='checkbox' id='rack_pos_placeholder'  value='' title='"+SUGAR.language.get('HIT_Rack_Allocations', 'LBL_PLACEHOLDER')+"'></input>"+
      		"</span>";

	return_html +=
      "<span class='input_group'>"+
      "<label id='rack_pos_asset_label'>"+SUGAR.language.get('HIT_Rack_Allocations', 'LBL_ASSET')+"<span class='required'>*</span></label>"+
      "<input class='sqsEnabled' autocomplete='off' type='text' style='width:153px;' name='rack_pos_asset_name' id='rack_pos_asset_name' value='' title='' onblur=''>"+
      "<input type='hidden' name='rack_pos_asset_id' id='rack_pos_asset_id' value=''>"+
      "<input type='hidden' name='rack_pos_asset_desc' id='rack_pos_asset_desc' value=''>"+
      "<input type='hidden' name='rack_pos_asset_status' id='rack_pos_asset_status' value=''>"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openAssetPopup();'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>";

	return_html +=
      "<span class='input_group ig_using_org'>"+
      "<label id='rack_poshat_assets_accounts_name_label'>"+SUGAR.language.get('HIT_Rack_Allocations', 'LBL_ASSET_ACCOUNT')+" <span class='required'>*</span></label>"+
      "<input class='sqsEnabled' style='width:153px;' autocomplete='off' type='text' name='rack_poshat_assets_accounts_name' id='rack_poshat_assets_accounts_name' value='' title='' >"+
      "<input type='hidden' name='rack_poshat_assets_accounts_id' id='rack_poshat_assets_accounts_id' value='' />"+
      "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openUsingOrgPopup();'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
      "</span>";

    return_html +=
      "<span class='input_group'>"+
      "<label id='rack_pos_desc_label'>"+SUGAR.language.get('HIT_Rack_Allocations', 'LBL_DESCRIPTION')+"</label>"+
      "<input style='width:153px;' type='text' name='rack_pos_desc' id='rack_pos_desc' maxlength='50' value='' title=''>"+
      "</span>";

	return_html += "<span class='input_group'>"+
				"<label id='rack_pos_top_label'>"+SUGAR.language.get('HIT_Rack_Allocations', 'LBL_RACK_POS_TOP')+"</label>"+
	            '<input type="text" style="width:50px" size="3" maxlength="2" name="rack_pos_top" id="rack_pos_top" value="'+varTopmost+'"> '+
      			"</span>";
	return_html += "<span class='input_group'>"+
				"<label id='rack_pos_height_label'>"+SUGAR.language.get('HIT_Rack_Allocations', 'LBL_HEIGHT')+"</label>"+
	            '<input type="text" size="3" style="width:50px" maxlength="2" name="rack_pos_height" id="rack_pos_height" value="'+varHeight+'"> '+
      			"</span>";
	return_html += "<span class='input_group'>"+
				"<label id='rack_pos_depth_label'>"+SUGAR.language.get('HIT_Rack_Allocations', 'LBL_RACK_POS_DEPTH')+"</label>" +
	            '<select name="rack_pos_depth" id="rack_pos_depth">'+$('#hit_rack_pos_depth_list').html()+'</select>'+
      			"</span>";
/*	return_html +=
      "<span class='input_group ig_location'>"+
      "<label id='rack_pos_date_start_label'>"+SUGAR.language.get('HIT_Rack_Allocations', 'LBL_DATE_START')+"</label>"+
      "<input style='width:153px;' type='text' name='rack_pos_date_start' id='rack_pos_date_start' maxlength='50' value='' title=''>"+
      "</span>"+
      "<span class='input_group ig_location'>"+
      "<label id='rack_pos_date_end_label'>"+SUGAR.language.get('HIT_Rack_Allocations', 'LBL_DATE_END')+"</label>"+
      "<input style='width:153px;' type='text' name='rack_pos_date_end' id='rack_pos_date_end' maxlength='50' value='' title=''>"+
      "</span>";*/
	return_html += '</div><div class="lineEditor"><div class="bg-warning">';
	return_html +=
      "<span class='input_group'>"+
      "<label>"+SUGAR.language.get('HIT_Rack_Allocations', 'LBL_INACTIVE_USING')+" </label>"+
      "<input name='rack_pos_inactive_using'  type='checkbox' id='rack_pos_inactive_using'  value='' title='"+SUGAR.language.get('HAT_Asset_Trans', 'LBL_INACTIVE_USING')+"'></input>"+
      "</span></div></form>"

	if (i!=undefined) {//如果i不为空说明是修改，不是新增，此时需要将已经有的值读入字段中
		var asset_id = globalServerData.server[i].asset_id;
	  	var asset_status = globalServerData.server[i].asset_status;
	  	var asset_name = globalServerData.server[i].asset_name;
	  	var asset_desc = globalServerData.server[i].asset_desc;
		var asset_using_org = globalServerData.server[i].hat_assets_accounts_name;
		var asset_using_org_id = globalServerData.server[i].hat_assets_accounts_id;
		var desc = globalServerData.server[i].desc;

		return_html += "<script>";
	    for(var propertyName in globalServerData.server[i]) {
	      //这里直接遍历所有的属性（因此需要建立与Bean属性同名的各个字段）
	      if ($("#rack_pos_"+propertyName).is(':checkbox')) {
	        if (globalServerData.server[i][propertyName]==true) {
	          return_html += 'document.getElementById("rack_pos_'+propertyName+'").checked = true;'
	        }
	      }else {
	        //如果当前字段不是checkbox，就以val的形式赋值
	       //console.log("#rack_pos_"+propertyName+"="+globalServerData.server[i][propertyName]);
	        return_html +='$("#rack_pos_'+propertyName+'").val("'+globalServerData.server[i][propertyName]+'");'
	      }
	    }

		return_html += "</script>";

	}

    //处理特殊的默认值
    if($("#target_using_org_id").val()!="") {
    	return_html +="<script>"
        return_html +='$("#rack_poshat_assets_accounts_name").val($("#target_using_org").val());'
        return_html +='$("#rack_poshat_assets_accounts_id").val($("#target_using_org_id").val());'
    	return_html +="</script>"
    }


	//if (isPopup==false) {
	//}
	return_html += '</div>';
	return return_html;
}




function btn_RackSelect_clicked() {
	//在选择模式下返回值
	var treeObj = $.fn.zTree.getZTreeObj("treeview_selector");
	var nodes = treeObj.getSelectedNodes();
	var id = nodes[0].id;

	data="";
	data += '"RACKID":"'//资产号
	       + nodes[0]['data']['rdata']['id']+ '",'
	data += '"RACKNAME":"'//资产名
	       + nodes[0]['data']['rdata']['name']+ '",'

	data += '"RACKVALUE":"'
	       + nodes[0]['data']['rackid']+'|'//RACK_ID":
/*	       + '"RACK_NAME":"'+nodes[0]['data']['rdata']['name']+'",'
*/	       + $("#rack_pos_top").val()+'|'//RACK_POS_TOP
	       + $("#height").val()+'|'//HEIGHT
	       + $("#rack_pos_depth").val()//RACK_POS_DEPTH
	       + '",'

	data += '"NAME":"'
			+ nodes[0]['data']['rdata']['name']+"("
			+ $("#rack_pos_top").val()+'~'+ (Number($("#rack_pos_top").val())-Number($("#height").val()))//RACK_POS_TOP
			+ ')",';

	data = data.slice(0, -1);//cut last char
	data='{"'+nodes[0]['data']['rdata']['id']+'":{'+data+'}}';
	console.log(data);

	associated_javascript_data = jQuery.parseJSON(data)
	//console.log(data);
	//send_back('HAT_Asset_Locations',id);
}


//通过鼠标Drag来选中一个机柜的区域

var isMouseDown = false;
var NoConflict//NoConfilict用于判断当前鼠标划出的区域是否已经有设备或占用符冲突

function selectServerArea() {
	var selected_start_cell, selected_end_cell
	$("#rack_frame tr td.rack_td")
		.mousedown(function () {
		console.log("DOWN");
		  if (isMouseDown == false) {
		  	  $("#rack_frame td").removeClass("rack_highlighted");
		  	  $("#rack_frame td").removeClass("rack_error");
			  isMouseDown = true;
		  }
		  $(this).addClass("rack_highlighted");
		  selected_start_cell=$(this);
		  selected_end_cell = $(this);//默认首尾都一样，在后面的变化中首不变，END变随Mouseover进行变化
		  return false; // prevent text selection
		})
		.mouseover(function () {
		  if (isMouseDown) {
		  	if (selected_end_cell!=$(this)) { //只有在切换到新单元格时才生效
		  		selected_end_cell=$(this);
				$("#rack_frame td").removeClass("rack_highlighted");//将画图先清空，后面进行重新绘制
				$("#rack_frame td").removeClass("rack_error");

				var startArray = selected_start_cell.attr('id').split("_");//通过将_分离出X与Y
				var endArray = selected_end_cell.attr('id').split("_");

				NoConflict = true;

				for (var i=Math.min(startArray[2],endArray[2]);i<=Math.max(startArray[2],endArray[2]);i++) {
					$("#position_"+startArray[1]+"_"+i).addClass("rack_highlighted");
					$("#position_"+endArray[1]+"_"+i).addClass("rack_highlighted");

					if($("#position_"+startArray[1]+"_"+i).css("display")=='none' ||
					   $("#position_"+endArray[1]+"_"+i).css("display")=='none'||
					   $("#position_"+startArray[1]+"_"+i).hasClass('Rack_Elements')||
					   $("#position_"+endArray[1]+"_"+i).hasClass('Rack_Elements')) {
						//如果当前机柜上有设备，则单元格是不连续的，就会找不到对应的单元
						NoConflict = false;
					}
					//以上无论是各选了2列还是选同一列，都可以正确的渲染
					//但如果跨了3列此只能显示首尾两列，因此可以用下同的方式进行补充渲染
					if ((startArray[1]=="F" && endArray[1]=="B") || (startArray[1]=="B" && endArray[1]=="F")){//如果跨了3列，将中间列也渲染
						$("#position_M_"+i).addClass("rack_highlighted");
						if ($("#position_M_"+i).css("display")=='none' ||
						    $("#position_M_"+i).hasClass('Rack_Elements')) {
							//如果当前机柜上有设备，则单元格是不连续的，就会找不到对应的单元
							NoConflict = false;
						}
					}
				}//完成For循环

				if (NoConflict == false) { //如果有冲突，则将标记标为冲突的样式
					//console.log(this+" conflict")
					$(".rack_highlighted").addClass("rack_error");
					$(".rack_highlighted").removeClass("rack_highlighted");
				}

		  	}
		  }
		})
		.bind("selectstart", function () {
		  return false; // prevent text selection in IE
		})

		 document.onmouseup = function(e) { //Mouseup鼠标抬起，选择结束
		    e.stopPropagation();
		    //console.log(this+" "+isMouseDown);
			if (isMouseDown) {
			  	isMouseDown = false;
			  	if (NoConflict) { //NoConfilict用于判断当前鼠标划出的区域是否已经有设备或占用符冲突
			  		addPlaceHolder();
			  	}else{
					$("#rack_frame td").removeClass("rack_error");
			  	}
        	}
        };

		function addPlaceHolder() {
			//在选择完成区域后，弹出对话框，确认当前的选择
		  	var title_txt=SUGAR.language.get('HAT_Asset_Locations', 'LBL_ADD_PLACEHOLDER');
			var numberingRule = globalServerData.numbering_rule;
		  	var varTopmost=0;
		  	var varHeight=0;
		  	var varDeepth=""
			var startArray = selected_start_cell.attr('id').split("_");//通过将_分离出X与Y
			var endArray = selected_end_cell.attr('id').split("_");

			document.getElementById('hit_rack_pos_depth_list').value = "FBM";

			if(numberingRule=="TOP") { //获取设备顶端位置，机柜有两从编号方式（顶端大/顶端号小）
				varTopmost = Math.min(startArray[2],endArray[2]);
			}else {
				varTopmost = Math.max(startArray[2],endArray[2]);
			}

			varHeight =Math.max(startArray[2],endArray[2])-Math.min(startArray[2],endArray[2])+1; //获取设备高度

			if(startArray[1]=="F"||endArray[1]=="F") {
				varDeepth +="F"
			}
			if((startArray[1]=="F"&&endArray[1]=="B")||(startArray[1]=="B"&&endArray[1]=="F")||startArray[1]=="M"||endArray[1]=="M") {
				varDeepth +="M"
			}
			if(startArray[1]=="B"||endArray[1]=="B") {
				varDeepth +="B"
			}

			var html=showITRacksForm(true, varDeepth, varHeight, varTopmost);
		    BootstrapDialog.confirm({
		        title: title_txt,
		        message: html,
		        callback: function(result) {
		            if(result) {
		                //Clicked YES
		                //console.log($('rack_pos_depth').val()+",height="+ $('rack_pos_height').val()+", top="+$('rack_pos_top').val())
						$("#rack_frame td").removeClass("rack_error");
						$("#rack_frame td").removeClass("rack_highlighted");		                //
		            	savePlaceHolder()
		            }else {
		                //Clicked 'Nope.';
		            }
		        }
		    });
		}
}

function clickRackElement(i) { //点击了机柜上的某个设备之后
	var title_txt=SUGAR.language.get('HAT_Asset_Locations', 'LBL_ADD_PLACEHOLDER');
  	var pos_y = globalServerData.server[i].rack_pos_top;
  	var pos_height = globalServerData.server[i].height;
  	var pos_x = globalServerData.server[i].rack_pos_depth;

  	var asset_id = globalServerData.server[i].asset_id;
  	var asset_status = globalServerData.server[i].asset_status;
  	var asset_name = globalServerData.server[i].asset_name;
  	var asset_desc = globalServerData.server[i].asset_desc;
	var asset_using_org = globalServerData.server[i].hat_assets_accounts_name;
	var asset_using_org_id = globalServerData.server[i].hat_assets_accounts_id;
	var desc = globalServerData.server[i].desc;
	var numberingRule = globalServerData.numbering_rule;//获取是大编号在TOP还是小编号在TOP，影响Height的计算

	var html=showITRacksForm(true, pos_x, pos_height, pos_y, i);

    BootstrapDialog.confirm({
        title: title_txt,
        message: html,
        callback: function(result) {
            if(result) {
                //Clicked YES
                cleanBlocker(pos_x, pos_height, pos_y);
				savePlaceHolder(i)
            }else {
                //Clicked 'Nope.';
            }
        }
    });

}

function savePlaceHolder(i) {
	//确定可以保存当前的占位信息
	pos_x= (typeof($('#rack_pos_depth').val())!="undefined")?$('#rack_pos_depth').val():"";
	pos_height= (typeof($('#rack_pos_height').val())!="undefined")?$('#rack_pos_height').val():"";
	pos_y= (typeof($('#rack_pos_top').val())!="undefined")?$('#rack_pos_top').val():"";
	asset_id = (typeof($('#rack_pos_asset_id').val())!="undefined")?$('#rack_pos_asset_id').val():"";
	if (asset_id=="") {//ID为空时当前字段为占位符号，否则正常显示设备名
		asset_name = SUGAR.language.get('HAT_Asset_Locations', 'LBL_PLACEHOLDER');
	}else{
		asset_name = (typeof($('#rack_pos_asset_name').val())!="undefined")?$('#rack_pos_asset_name').val():"";
	}
	asset_desc = (typeof($('#rack_pos_asset_desc').val())!="undefined")?$('#rack_pos_asset_desc').val():"";
	asset_status = (typeof($('#rack_pos_asset_status').val())!="undefined")?$('#rack_pos_asset_status').val():"";
	asset_using_org = (typeof($('#rack_pos_hat_assets_accounts_name').val())!="undefined")?$('#rack_pos_hat_assets_accounts_name').val():"";
	asset_using_org_id = (typeof($('#rack_pos_hat_assets_accounts_id').val())!="undefined")?$('#rack_pos_hat_assets_accounts_id').val():"";
	id = (typeof($('#rack_pos_id').val())!="undefined")?$('#rack_pos_id').val():"";
	desc = (typeof($('#rack_pos_desc').val())!="undefined")?$('#rack_pos_desc').val():"";

	if ($('#rack_pos_inactive_using').is(':checked')) {
		inactive_using =1;
	}else {
		inactive_using =0;
	};


	Blocker = {
		id: id,
		rack_pos_depth : pos_x,
	    rack_pos_top : pos_y,
	    height : pos_height,
	    asset_id : asset_id,
	    asset_status : asset_status,
	    asset_name : asset_name,
	    asset_desc : asset_desc,
	    hat_assets_accounts_name : asset_using_org,
	    hat_assets_accounts_id : asset_using_org_id,
	    desc: desc,
	    inactive_using: inactive_using,
	    allc_status: "DRAFT",
	};

	if (i==undefined) { //插入或更新到当前对象数列中
  		globalServerData.server.push(Blocker);
  		i=globalServerData.server.length-1;
	}else{
		globalServerData.server[i]=Blocker;
	}
	//console.log('index.php?to_pdf=true&module=HIT_Rack_Allocations&action=SaveDynamicAllocation&rack_id=' + globalServerData.rackid,)
/*	$.ajax({
		url: 'index.php?to_pdf=true&module=HIT_Rack_Allocations&action=SaveDynamicAllocation&hit_rack_id=' + globalServerData.rackid,
		//data: {alldata:}
		type: 'POST',
		data: {jsonData: JSON.stringify(Blocker)},
		success: function (data) {
			if (data!="") {
				globalServerData.server[i].id = data;
			}

			//console.log(data)
		},
		error: function () { //失败
			alert('Error loading document');
		}
	});
*/
	console.log(Blocker.inactive_using+":"+Blocker.inactive_using!=1)
	if(Blocker.inactive_using!=1) {
		drawBlocker(i);//绘制图形在界面中
	}//如果失效就不再画了
}