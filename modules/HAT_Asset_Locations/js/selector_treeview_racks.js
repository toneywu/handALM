/**********************
/* 基于U位明细进行绘图
/***************************/

function showITRacks(node){
	if(typeof node.data.server != "undefined") {
		//console.log(node.data.server);
		var varServer = node.data;//jQuery.parseJSON($('#js_jason').text());
		var numberingRule = varServer.numbering_rule;

		for (i in varServer.server)
		  {
		  	pos_y = varServer.server[i].rack_pos_top;
		  	pos_x = varServer.server[i].rack_pos_depth;
		  	pos_height = varServer.server[i].height;
		  	console.log("#position_"+pos_x.substring(0,1)+"_"+pos_y);
		  	//显示当前服务器
		  	pos_obj = $("#position_"+pos_x.substring(0,1)+"_"+pos_y)
			console.log(varServer.server[i]);
			if(varServer.server[i].asset_id!="") {

				//$("#position_F_36").hide();

				pos_obj.append("<span class='color_asset_status_"+varServer.server[i].asset_status+
								"' style='width:12px;height:12px;border:#ccc 1px solid;display:inline-block'>&nbsp</span> <a href='?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3DHAT_Assets%26action%3DDetailView%26record%3D95e17429-c68c-8ef9-90c1-5720358e705d'>"+ 
								varServer.server[i].asset_name+"</a> "+varServer.server[i].asset_desc+
								" | "+varServer.server[i].hat_assets_accounts_name);
				pos_obj.css({
					"background-color":"#fff",
					"vertical-align":"middle",
					"border":"#000 2px solid", 
				});

				console.log("AAA");
			}else{
				pos_obj.append(SUGAR.language.get('app_strings', 'LBL_PLACEHOLDER'));
				pos_obj.css({
					"background-color":"#efefef",
					"vertical-align":"middle",
					"border":"2px #A8A8A8 dashed", 
				});
			}
			//if(pos_x=="FM")
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
			//showITRacksForm(node);

		}
	}
}

/**********************
/* 提供用于数据提交的字段
/***************************/
function showITRacksForm(node){
	var return_html="";
	console.log($('#hit_rack_pos_depth_list').html());
	return_html += '<div class="lineEditor">';
	return_html += SUGAR.language.get('HIT_Rack_Allocations', 'LBL_RACK_POS_TOP') 
	             + '<input type="text" style="width:50px" size="3" maxlength="2" name="rack_pos_top" id="rack_pos_top">';
	return_html += SUGAR.language.get('HIT_Rack_Allocations', 'LBL_HEIGHT') 
	             + '<input type="text" size="3" style="width:50px" maxlength="2" name="height" id="height">';
	return_html += SUGAR.language.get('HIT_Rack_Allocations', 'LBL_RACK_POS_DEPTH') 
	             + '<select name="rack_pos_depth" id="rack_pos_depth">'+$('#hit_rack_pos_depth_list').html()+'</select>';
	return_html += '<button type="button" id="btn_LineEditorClose0" class="button btn_save" value="Close"  onclick="btn_RackSelect_clicked()">'+ SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL') +'</button>'
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
