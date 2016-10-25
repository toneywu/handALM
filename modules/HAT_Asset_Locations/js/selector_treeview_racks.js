/*********************
/* 基于U位明细进行绘图
/***************************/
//$.getScript("custom/resources/bootstrap3-dialog-master/src/js/bootstrap-dialog.js"); //MessageBox
$.getScript("cache/include/javascript/sugar_grp_yui_widgets.js"); //MessageBox

var globalServerData;

function showITRacks(node){ //渲染机柜，在首次加载时被调用
	if(typeof node.data.server != "undefined") {
		//console.log(node.data.server);
		globalServerData = node.data;


		for (i in globalServerData.server) {
		  	pos_y = globalServerData.server[i].rack_pos_top;
		  	pos_height = globalServerData.server[i].height;
		  	pos_x = globalServerData.server[i].rack_pos_depth;

		  	asset_id = globalServerData.server[i].asset_id;
		  	asset_status = globalServerData.server[i].asset_status;
		  	asset_name = globalServerData.server[i].asset_name;
		  	asset_desc = globalServerData.server[i].asset_desc;


		  	//console.log("#position_"+pos_x.substring(0,1)+"_"+pos_y);
		  	drawBlocker(pos_x, pos_height, pos_y)//绘制设备占位或空占位
			selectServerArea();//加载可触发的事件
			//showITRacksForm(node);
		}
	}
}

function drawBlocker(pos_x, pos_height, pos_y, asset_id, asset_status, asset_name, asset_desc) {//绘制设备占位或空占位
//显示当前服务器
	var numberingRule = globalServerData.numbering_rule;
  	pos_obj = $("#position_"+pos_x.substring(0,1)+"_"+pos_y)
	//console.log(globalServerData.server[i]);
	if(asset_id!="") {

		pos_obj.append("<span class='color_asset_status_"+asset_status+
						"' style='width:12px;height:12px;border:#ccc 1px solid;display:inline-block'>&nbsp</span> <a href='?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3DHAT_Assets%26action%3DDetailView%26record="+asset_id+"'>"+ 
						asset_name+"</a> "+asset_desc+
						" | "+hat_assets_accounts_name);
		pos_obj.css({
			"background-color":"#fff",
			"vertical-align":"middle",
			"border":"#000 2px solid", 
		});

	}else{
		pos_obj.append(SUGAR.language.get('app_strings', 'LBL_PLACEHOLDER'));
		pos_obj.css({
			"background-color":"#efefef",
			"vertical-align":"middle",
			"border":"2px #A8A8A8 dashed",
		});
	}
	//横向合并
	pos_obj.attr("class","Rack_Elements");
	//console.log(jQuery.parseJSON(varServer.server[i]));
	pos_obj.attr("onclick","clickRackElement("+i+")");//加入了点击后的事件
	pos_obj.attr("colspan",pos_x.length);
	//纵向合并列
	pos_obj.attr("rowspan",pos_height);

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
	//console.log(pos_obj);
	pos_obj.show();//上述循环时将自己也隐藏了，现在重新显示出来
}

function clickRackElement(i) { //点击了机柜上的某个设备之后
	alert("clicked"+i);
	//console.log(globalServerData.server[i]);
}

/**********************
/* 提供用于数据提交的字段
/***************************/
function showITRacksForm(isPopup, varTopmost, varHeight, varDeepth) {
	var return_html="";

	if(varDeepth!="") { //初始化深度数据，后续深度的值就是直接复制 hit_rack_pos_depth_list
		$("#hit_rack_pos_depth_list option[value='"+$("#hit_rack_pos_depth_list").val()+"']").attr("selected", false)//将当前先清空
		$("#hit_rack_pos_depth_list option[value='"+varDeepth+"']").attr("selected", true)
	} else {
		$("#hit_rack_pos_depth_list option[value='FM']").attr("selected", true);
	}

	console.log(varDeepth);

	return_html += '<div class="lineEditor">';
	return_html += SUGAR.language.get('HIT_Rack_Allocations', 'LBL_RACK_POS_TOP')
	             + '<input type="text" style="width:50px" size="3" maxlength="2" name="rack_pos_top" id="rack_pos_top" value="'+varTopmost+'"> ';
	return_html += SUGAR.language.get('HIT_Rack_Allocations', 'LBL_HEIGHT')
	             + '<input type="text" size="3" style="width:50px" maxlength="2" name="height" id="height" value="'+varHeight+'"> '
	return_html += SUGAR.language.get('HIT_Rack_Allocations', 'LBL_RACK_POS_DEPTH')
	             + '<select name="rack_pos_depth" id="rack_pos_depth">'+$('#hit_rack_pos_depth_list').html()+'</select>'

	if (isPopup==false) {
		return_html += '<button type="button" id="btn_LineEditorClose0" class="button btn_save" value="Close"  onclick="btn_RackSelect_clicked()">'+ SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL') +'</button>';
	}
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
	//console.log(data);

	associated_javascript_data = jQuery.parseJSON(data)
	//console.log(data);
	send_back('HAT_Asset_Locations',id);
}


//通过鼠标Drag来选中一个机柜的区域


function selectServerArea() {
var isMouseDown = false;
var selected_start_cell, selected_end_cell

	$("#rack_frame td")
		.mousedown(function () {
		  if (isMouseDown == false) {
		  	  $("#rack_frame td").removeClass("rack_highlighted");
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

				var startArray = selected_start_cell.attr('id').split("_");//通过将_分离出X与Y
				var endArray = selected_end_cell.attr('id').split("_");
				var NoConflict = true;

				for (var i=Math.min(startArray[2],endArray[2]);i<=Math.max(startArray[2],endArray[2]);i++) {
					$("#position_"+startArray[1]+"_"+i).addClass("rack_highlighted");
					$("#position_"+endArray[1]+"_"+i).addClass("rack_highlighted");

					if($("#position_"+startArray[1]+"_"+i).length==0 || $("#position_"+endArray[1]+"_"+i).length==0) {
						//如果当前机柜上有设备，则单元格是不连续的，就会找不到对应的单元
						NoConflict = false;
					}
					//以上无论是各选了2列还是选同一列，都可以正确的渲染
					//但如果跨了3列此只能显示首尾两列，因此可以用下同的方式进行补充渲染
					if ((startArray[1]=="F" && endArray[1]=="B") || (startArray[1]=="B" && endArray[1]=="F")){//如果跨了3列，将中间列也渲染
						$("#position_M_"+i).addClass("rack_highlighted");
						if($("#position_M_"+i).length==0) {
							//如果当前机柜上有设备，则单元格是不连续的，就会找不到对应的单元
							NoConflict = false;
						}
					}
				}//完成For循环

				if (NoConflict == false) { //如果有冲突，则将标记标为冲突的样式
					console.log("conflict")
					$(".rack_highlighted").addClass("rack_error");
					$(".rack_highlighted").removeClass("rack_highlighted");
				}

		  	}
		  }
		})
		.bind("selectstart", function () {
		  return false; // prevent text selection in IE
		});

		$(document)
			.mouseup(function () {
				if(isMouseDown == true)  {
				  	isMouseDown = false;
				  	addPlaceHolder()
	        	}
        });

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

			var html=showITRacksForm(true, varTopmost, varHeight, varDeepth);
			YAHOO.SUGAR.MessageBox.show({msg: html, title: title_txt,
					type: 'confirm',
					width: '1024px',
					fn: function(confirm) {
						if (confirm == 'yes') {
							drawBlocker(varTopmost, varHeight, varDeepth);
						}
					}
				});
		}

		function savePlaceHolder() {
			//确定可以保存当前的占位信息
		}
}

/*



*/