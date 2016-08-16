/*var  varServer = {"server":[
		{	asset_name:"IT-SRV-SRV-001",
			asset_desc:"流媒体服务器.联想.RD440",
			asset_status:"InService",
			height:3,
			rack_pos_top:30,
			rack_pos_depth:"FM",
			hat_assets_accounts_name:"玄武中学",
		},
	]
};*/


$(document).ready(function(){


	var varServer = jQuery.parseJSON($("#js_jason").text());
	var numberingRule = varServer.numbering_rule;

	$("#LBL_DETAILVIEW_PANEL1 td:first").hide();
	for (i in varServer.server)
	  {
	  	pos_y = varServer.server[i].rack_pos_top;
	  	pos_x = varServer.server[i].rack_pos_depth;
	  	pos_height = varServer.server[i].height;
	  	//console.log(pos_x.length);
	  	//显示当前服务器
	  	pos_obj = $("#position_"+pos_x.substring(0,1)+"_"+pos_y)
		console.log(varServer.server[i]);
		if(varServer.server[i].asset_id!="") {
			pos_obj.append("<span class='color_asset_status_"+varServer.server[i].asset_status+
							"' style='width:12px;height:12px;border:#ccc 1px solid;display:inline-block'>&nbsp</span> <a href='?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3DHAT_Assets%26action%3DDetailView%26record%3D95e17429-c68c-8ef9-90c1-5720358e705d'>"+ 
							varServer.server[i].asset_name+"</a> "+varServer.server[i].asset_desc+
							" | "+varServer.server[i].hat_assets_accounts_name);
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

	}

});