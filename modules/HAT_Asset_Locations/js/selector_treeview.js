$('head').append('<link href="custom/resources/zTree/css/metroStyle/metroStyle.css" rel="stylesheet" type="text/css" />');
$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap-iconpicker/icon-fonts/icomoon/css/style.css"/>');

var zTreeObj;
var setting = {
		//判断是否为多选
		check: {
				enable: true, //表示是否显示节点前的checkbox选择框,
				chkboxType: { "Y" : "s", "N" : "ps" },//不关联父，关联子
				chkStyle: "checkbox",
				nocheckInherit: true,
			},
		view: {
			showIcon: false,
			selectedMulti: false,
			nameIsHTML: true,
			showTitle: false
		},
		async: {
			enable: true,
			url: 'index.php?to_pdf=true&module=HAT_Asset_Locations&action=getTreeNodes&site_id='+$("#site_id").val(),
			autoParam:["id", "type","query_id","current_mode"],
			dataFilter: filter
		},
		callback: {
			//beforeClick: beforeClick,
			onClick: onClick,
			onAsyncSuccess:onAsyncSuccess,
			onCheck: onCheck,
			//onAsyncError: onAsyncError,
		},
		data: {
			simpleData: {
				enable: true,
				idKey: "id",
				pIdKey: "pId",
				rootPId: 0
			}
		},
	};
var loadNextLevel = false;


	function filter(treeId, parentNode, childNodes) {//对加载后的结果进行处理,这一段是树结点数据展示的关键字段
	if (!childNodes) return null;
		//console.log(childNodes);
		for (var i=0, l=childNodes.length; i<l; i++) {
			//childNodes[i].name = childNodes[i].name.replace(/\.n/g, '.');
			//name是会在Tree中展示的名称

			if (typeof childNodes[i].name == 'undefined') {
				childNodes[i].name = "";
			}

			if (typeof childNodes[i].img != 'undefined') {//图标
				childNodes[i].name += " "+'<i class="zmdi '+childNodes[i].img+' icon-hc-lg "></i> ';
			}
			childNodes[i].name += '<span class="treeview_'+childNodes[i].type+'">';
			if (childNodes[i].type=="asset" ) {//依据Business Framework定义的显示规则，确定是否显示CODE、名称
				if (asset_display_rule == "CODE") {
					if (typeof childNodes[i].code != 'undefined') {//只显示CODE
						childNodes[i].name += childNodes[i].code;
					}
					childNodes[i].name +="</span>";//close treeview span
				} else if (asset_display_rule == "DESC") {
					if (typeof childNodes[i].desc != 'undefined') {//只显示名称
						childNodes[i].name += childNodes[i].desc;
					}
					childNodes[i].name +="</span>";//close treeview span
				} else {//BOTH and Others
					if (typeof childNodes[i].code != 'undefined') {//显示Code+名称
						childNodes[i].name += childNodes[i].code;
					}
					childNodes[i].name +="</span>";//close treeview span
					if (typeof childNodes[i].desc != 'undefined') {
						childNodes[i].name += " "+childNodes[i].desc;
					}
				} // end if for CODE

			}else if (childNodes[i].type=="location" ) {//依据Business Framework定义的显示规则，确定是否显示CODE、名称
				if (location_display_rule == "CODE") {
					if (typeof childNodes[i].code != 'undefined') {//只显示CODE
						childNodes[i].name += childNodes[i].code;
					}
					childNodes[i].name +="</span>";//close treeview span
				} else if (asset_display_rule == "DESC") {
					if (typeof childNodes[i].desc != 'undefined') {//只显示名称
						childNodes[i].name += childNodes[i].desc;
					}
					childNodes[i].name +="</span>";//close treeview span
				} else {
					if (typeof childNodes[i].code != 'undefined') {//显示Code+名称
						childNodes[i].name += childNodes[i].code;
					}
					childNodes[i].name +="</span>";//close treeview span
					if (typeof childNodes[i].desc != 'undefined') {
						childNodes[i].name += " "+childNodes[i].desc;
					}
				}
			} else {//Asset and Location以外的情况
					if (typeof childNodes[i].code != 'undefined') {//显示Code+名称
						childNodes[i].name += " "+childNodes[i].code+"</span>";//close treeview span
					}
					if (typeof childNodes[i].desc != 'undefined') {
						childNodes[i].name += " "+childNodes[i].desc;
					}
			}//End code and name

			//detailed_name是在DetailView中需要显示的名称。
			childNodes[i].detailed_name = childNodes[i].name;


			if (typeof childNodes[i].status != 'undefined') {
				if (typeof childNodes[i].status_tag != 'undefined') {
					childNodes[i].name += " <span class='"+childNodes[i].status_tag+"'>"+childNodes[i].status+"</span>";
				} else {
					childNodes[i].name += " "+childNodes[i].status;
				}
			}
			childNodes[i].isParent = true;
					//childNodes[i].t="";
		}//end for
		return childNodes;
	}


	function beforeExpand(treeId, treeNode) {
			if (!treeNode.isAjaxing) {
				startTime = new Date();
				treeNode.times = 1;
				ajaxGetNodes(treeNode, "refresh");
				return true;
			} else {
				alert("Loading...");
				return false;
			}
	}

	function onClick(event, treeId, treeNode, clickFlag) {
		if(treeNode.pId!=0) { //非根结点点击后的作用,如果是根结点，点击后无反应。
			zTreeObj= $.fn.zTree.getZTreeObj(treeId);
			console.log(treeNode);
			loadDataForNodeDetail(zTreeObj, treeNode, $("#node_details"));
		}
	}

	function onAsyncSuccess(e, treeId, treeNode) {
		//if (!treeNode) return;
		//标记是否为最后一个节点
		zTreeObj= $.fn.zTree.getZTreeObj(treeId);
		if (treeNode.children.length==0) { //如果尝试加载后发现没有子节点，就将当前节点标记为末节点
			treeNode.isParent = false;
			zTreeObj.updateNode(treeNode);
		}

		//判断是否需要再打开一层子节点
		if (loadNextLevel) {
			for (var i=0, l=treeNode.children.length; i<l; i++) {
				zTreeObj.reAsyncChildNodes(treeNode.children[i], "refresh", true);
			}
			loadNextLevel=false
		}

		//以下是针对多选的情况进行处理
		if (zTreeObj.setting.check.enable == true) {
			//del:zTreeObj.setChkDisabled(treeNode, true);//先标记当前结点Checkbox状态为不可点，如果有子节点，当前节点有可能被标记为可点
			for (var i=0, l=treeNode.children.length; i<l; i++) {//标记Checkbox状态
				//del:markNodeCheckable(e, treeId, treeNode.children[i]);
				//如果当前某个子结点满足要求
				if (checkNodeSelectable(e, zTreeObj, treeNode.children[i])) {
					zTreeObj.setChkDisabled(treeNode.children[i], false);//如果满足条件，当前字段为可勾选
					setAllParentsCheckable(e, zTreeObj, treeNode.children[i])
				}else{
					zTreeObj.setChkDisabled(treeNode.children[i], true);//如果不满足条件，当前字段为不可勾选
				};
			}//end for
		}//end if
	}

	function setAllParentsCheckable(e, zTreeObj, treeNode) {
	//通过向上循环将同一个路径上的节点都标为可点击（在多选时使用，如果子节点可以选择，则通过这一方法将父结点变为可选择）
		parentNode= treeNode.getParentNode();
		while (parentNode.chkDisabled == true || parentNode.isFirstNode == false) { //如果父节点已经可以勾选，则不再循环
		  zTreeObj.setChkDisabled(parentNode, false);
		  parentNode= parentNode.getParentNode();
		}
	}

	function checkNodeSelectable(e, zTreeObj, treeNode) {
	//依据当前节点属性以及当前的模式判断是否可以选中。
	if ((current_mode=="asset" && treeNode.type=="asset") ||//选择所有资产
		(current_mode=="it" && treeNode.type=="asset" && node.data.enable_it_ports=="1") ||//选择IT可联网设备
		(current_mode=="rack" && treeNode.type=="asset" && typeof(treeNode.rack_id)!="undefined") //选择机柜 
		){
			return true;
		} else {
			return false;
		}
	}

	function onAsyncError(e, treeId, treeNode) {
			zTreeObj= $.fn.zTree.getZTreeObj(treeId);
			treeNode.isParent = true;
			zTreeObj.updateNode(treeNode);
	}

	function onCheck(e, treeId, treeNode) {//如果是多选模式，触发OnCheck事件
	//OnCheck事件依据树上选择的内容，显示在MultiSelectDiv区域中
			var zTree = $.fn.zTree.getZTreeObj(treeId),
				checkedNodes = zTree.getCheckedNodes(true),
				checkCount = 0,
				MultiSelectHTML = "",
				data = "";
			for (var i=0, l=checkedNodes.length; i<l; i++) {//标记Checkbox状态
				if (checkNodeSelectable(e, zTreeObj, checkedNodes[i])) {
					checkCount++;
					MultiSelectHTML+= '<li>'
									+ '<input type="checkbox" class="checkbox" name="mass[]" checked="checked" value="'+checkedNodes[i].id+'" style="display:none">'
									+ checkedNodes[i].name
									+ '</li>';
					data = '"'+checkedNodes[i].id+'":{"ID":"'+checkedNodes[i].id+'"},';
				}
			}
			$("#MultiSelectCount").html(checkCount);
			$("#MultiSelectList").html("<ul>"+MultiSelectHTML+"</ul>");

			if (data!="") {
				data = data.slice(0, -1);//cut last char
				data = '{'+data+"}";
				console.log(data);
				associated_javascript_data = jQuery.parseJSON(data);
			}
	}



	function ajaxGetNodes(treeNode, type, silent = false) {
			zTree.reAsyncChildNodes(treeNode, type, false);
	};


	function openGridDetail(asset_id) {
		var zTreeObj = $.fn.zTree.getZTreeObj("treeview_selector");
		var treeNode = zTreeObj.getNodeByParam("id",asset_id,null);
		loadDataForNodeDetail(zTreeObj, treeNode, $("#node_details"), true);
	}


	function loadDataForNodeDetail(treeObj, node, targetDIV, keepMidPanel = false) {//通过Ajax加载当前节点明细
		var id = node.id;
		var type = node.type;
		//console.log('index.php?to_pdf=true&module=HAT_Asset_Locations&action=getTreeNodeDetailHTML&id=' + id+"&type="+ type);
		if ( typeof(node.data)== 'undefined') {
			//undefined说明当前的结点没有明细信息，所以需要通过Ajax加载数据
			targetDIV.html('<img align="absmiddle" src="custom/resources/zTree/css/metroStyle/img/loading.gif"></span> '+SUGAR.language.get('app_strings', 'LBL_LOADING'));
				$.ajax({//读取子地点
					url: 'index.php?to_pdf=true&module=HAT_Asset_Locations&action=getTreeNodeDetailHTML&current_mode='+current_mode+'&id=' + id+"&type="+ type,
					success: function (data) {
						var obj = jQuery.parseJSON(data);
						var datatopush = new Object();
						for(var i in obj) {
						   jQuery.extend(datatopush,{[i]:obj[i]});
						}
						node.data=datatopush;
						treeObj.updateNode(node);
						console.log(node);
						//node.setNodesProperty("NodeLoaded", "true" , true);
						showNodeDetailHTML(treeObj, node, targetDIV, keepMidPanel);
					},
					error: function () { //失败
						alert('Error loading document');
					}
				})
		}else{
			//如果当前节点已有明细数据，则不通过Ajax加载，直接进行显示
			showNodeDetailHTML(treeObj, node, targetDIV, keepMidPanel);
		}
	}


function btn_search_clicked() {
	//点击了搜索框进行数据搜索
	//
	var dialog = new BootstrapDialog({
        		//message: "<img src='"+SUGAR.themes.loading_image+"'/> "+SUGAR.language.get('app_strings', 'LBL_LOADING_PAGE'),
        		message: "<img src='themes/default/images/img_loading.gif'/> "+SUGAR.language.get('app_strings', 'LBL_LOADING_PAGE'),
        		//
    		});
	dialog.open();

	$.ajax({
	  	url: 'index.php?to_pdf=true&module=HAT_Asset_Locations&action=getTreeviewSearch',
	  	type: 'POST',
	  	data: { 'asset_status' : $('#asset_status').val(), 
	  			'asset_name' : $('#asset_name').val(), 
	  			'site_select': $('#ham_maint_sites_id').val(),
	  			'serial_number': $('#serial_number').val(),
	  			'using_org_name':$('#using_org_name').val(),
	  			'wo_id':$('#wo_id').val(),
	  			'current_owning_org_id':$('#current_owning_org_id').val(),
	  			'target_using_org_id':$('#target_using_org_id').val(),
	  			'current_mode':$('#current_mode').val(),
	  			'defualt_list':$('#defualt_list').val(),
	  			'owning_org_name':$('#owning_org_name').val()
	  		},
	  	success: function (rtn_data) {
			console.log(rtn_data);
			var zTreeObj = $.fn.zTree.getZTreeObj("treeview_selector");
			var RootNode = [{name: "Search Results"}];//默认的根节点
			zTreeObj = $.fn.zTree.init($("#treeview_selector"), setting, RootNode);//初始化根节点

			var Nodes = filter(null, null, jQuery.parseJSON(rtn_data));//搜索结果节点
			zTreeObj.addNodes(zTreeObj.getNodeByTId("treeview_selector_1"), Nodes);//加载搜索结果
			dialog.close();
		},
		error: function () { //失败
            alert('Error loading document');
        },
	});

}

/************************************/
/*加载最右侧的详细信息内容          */
/************************************/
function showNodeDetailHTML(treeObj, node, targetDIV, keepMidPanel = false ) {

	//如果当前节点是Gird模式，则展开当前界面的中间界面，并绘制布局图
	if (typeof(node.data.special_mode)!='undefined') {
		showGridPanel();//展开界面
		DrawGridPosition(treeObj, node)//绘制布局图
		//TODO：这里有一个优化点，每次点击房间结点都会刷新界面，应当基于Node缓存进行绘制
	} else if(keepMidPanel==true) {
		showGridPanel();//展开界面但不加载布局图
	} else {
		hideGridPanel();//不显示展开的界面
	}


	//加载每个节点的详细内容
	var varHTML = "";
	varHTML ="<h3>"+(node.detailed_name)+"</h3>";
	if (node.type=='location' || node.type=='asset') {

		//显示主要动作按钮
		if (current_mode=="view") {
			varHTML+="<div class='detail_action_panel'><ul>";
			for (index = 0; index < node.data.btn.length; ++index) {
			    varHTML+="<li><a href='"+node.data.btn[index]['link']+"' class='button'>"+node.data.btn[index]['lab']+"</a></li>";
			}
		} else {
			varHTML+=showNodeDetailBtn(node);
		}
		varHTML+="</div>";


		//显示主要字段
		varHTML+="<div class='detailed_data_table'>"
		for (var index = 0; index < node.data.fields.length; ++index) {
		    varHTML+="<div class='detailed_fields'><span class='lab'>"+node.data.fields[index]['lab']+"</span><span class='detail_data'>"+node.data.fields[index]['val']+"</span></div>";
		}

		varHTML+="</div>"
		if (typeof (node.data.chart)!="undefined") {
			varHTML+=node.data.chart;
		}

	}
	targetDIV.html(varHTML);
	//读取机柜信息
	if( typeof (node.data.rackid) != "undefined") {
		showITRacks(node);
		//显示布局调整，机柜之前是画到机柜信息之后，现在将此图前移
		$("#rack_frame").prependTo($(".detailed_data_table"));
	}

	if (current_mode=="rackposition") {//如果当前模式是选择U位，则出现U位选择的按钮
		$("#rack_frame").after(showITRacksForm(node));
	}
}


/************************************/
/*在中间的图层进行Gird布局图的绘制 */
/************************************/
function DrawGridPosition(treeObj, location_node) {

	//预先加载2层节点（用于直接点击）
	if (location_node.zAsync == false) {
		//加载第1层节点
		loadNextLevel=true; //需要加载后再加载一层
		treeObj.reAsyncChildNodes(location_node, "refresh", true);
	} else {//检查子节点是否都已经加载，如果没有加载则补充
		for (var i=0, l=location_node.children.length; i<l; i++) {
			if (location_node.children[i].zAsync == false) {
				zTreeObj.reAsyncChildNodes(location_node.children[i], "refresh", true);
			}
		}
	}

	//加载中间页的内容
	$("#workbench_mid").html('<div style="padding:20px"><img align="absmiddle" src="custom/resources/zTree/css/metroStyle/img/loading.gif"></span> '+SUGAR.language.get('app_strings', 'LBL_LOADING'))+"</div>";
	$.ajax({//读取子地点
		url: 'index.php?to_pdf=true&module=HAT_Gird_Rules&action=DrawGrid&location_id='+location_node.id+'&tabtype=1',
		success: function (data) {
			$("#workbench_mid").html(data);
		},
		error: function () { //失败
			alert('Error loading document');
		}
	})
}



function showNodeDetailBtn(node) {
	//如果是在选择模块下（参数current_mode!="view")。Ajax不会返回HTML形式的Buttons
	//因此在JS中生成按钮。
	//
/*	console.log("current_mode="+current_mode);
	console.log("node.type="+node.type);
	console.log("node.data.rackid="+node.data.rackid);*/
	if 
	($("#mode").val()!="MultiSelect" &&
	((current_mode=="asset" && node.type=="asset") ||//选择所有资产
		(current_mode=="it" && node.type=="asset" && node.data.enable_it_ports=="1") ||//选择IT可联网设备
		(current_mode=="rack" && node.type=="asset" && typeof(node.data.rackid)!="undefined") //选择机柜
		))
		 {
		 return "<a href='#' id='singleSelectBtn' class='button' onclick='btn_select_clicked(\""+node.id+"\")'>"+SUGAR.language.get('HAT_Asset_Locations', 'LBL_BTN_SELECT')+"</a>";
		 //return "<a href='#' class='button' onclick='btn_select_clicked(\""+node.id+"\")'>"+SUGAR.language.get('HAT_Asset_Locations', 'LBL_BTN_SELECT')+"</a>";
	} else {
		return "";
	}
}


function btn_select_clicked(node_id) {
	//在选择模式下返回值
	var treeObj = $.fn.zTree.getZTreeObj("treeview_selector");
	var node = treeObj.getNodeByParam("id", node_id, null);//treeObj.getSelectedNodes();
	var id = node.id;

	data="";
	for(var fields in node['data']['rdata']) {
	   data += '"'+ fields.toUpperCase()+'":"'+node['data']['rdata'][fields]+'",';

	}
	data = data.slice(0, -1);//cut last char

	if (node['data']['rdata']['enable_it_rack']=="1") {
		data='{"'+node['data']['rdata']['id']+'":{'+data+returnRackData()+'}}';
	} else {
		data='{"'+node['data']['rdata']['id']+'":{'+data+'}}';
	}

	//console.log(jQuery.parseJSON(data));
	associated_javascript_data = jQuery.parseJSON(data)
	send_back('HAT_Asset_Locations',id);
}

function returnRackData() {//返回机柜相关的信息
	//console.log(globalServerData);//数据来源于selector_treeview_racks.js
	var varRackJASON="";
	var varRackDESC="";
	var cnt = 0;

	for (i in globalServerData.server) {
		if (globalServerData.server[i].allc_status=="DRAFT") {//有变更，需要添加记录
			cnt++;
			varRackJASON += '"'+cnt+'":{';
			if (globalServerData.server[i].inactive_using!=1) {
				varRackJASON += '"id":"'+globalServerData.server[i].id+'",'
				 		+ '"rack_pos_depth":"'+globalServerData.server[i].rack_pos_depth+'",'
						+ '"rack_pos_top":"'+globalServerData.server[i].rack_pos_top+'",'
						+ '"height":"'+globalServerData.server[i].height+'",'
						+ '"asset_id":"'+globalServerData.server[i].asset_id+'",'
						+ '"asset_status":"'+globalServerData.server[i].asset_status+'",'
						+ '"asset_name":"'+globalServerData.server[i].asset_name+'",'
						+ '"asset_desc":"'+globalServerData.server[i].asset_desc+'",'
						+ '"hat_assets_accounts_name":"'+globalServerData.server[i].hat_assets_accounts_name+'",'
						+ '"hat_assets_accounts_id":"'+globalServerData.server[i].hat_assets_accounts_id+'",'
						+ '"desc":"'+globalServerData.server[i].desc+'",'
						+ '"inactive_using":"0"';//最后一个没有","结束
				varRackDESC += "["+globalServerData.server[i].rack_pos_top+"/"+globalServerData.server[i].height+"]"+globalServerData.server[i].asset_name+"|"+globalServerData.server[i].hat_assets_accounts_name+", "
			}else {
				varRackJASON += '"id":"'+globalServerData.server[i].id+'",'
						+ '"inactive_using":"1"';//最后一个没有","结束
				varRackDESC += "["+globalServerData.server[i].rack_pos_top+"/"+globalServerData.server[i].height+"]"+globalServerData.server[i].asset_name+" "+SUGAR.language.get('HAT_Asset_Locations', 'LBL_INACTIVED');+", "
			}
			varRackJASON += '},'
		}
	}//END FOR循环

	if (varRackDESC!="") {
		varRackDESC = varRackDESC.slice(0, -2);//cut last char
		varRackDESC = ',"RACK_DESC":"'+varRackDESC+'"';
	}else{
		varRackDESC = ',"RACK_DESC":""';
	}

	if (varRackJASON!="") {
		varRackJASON = varRackJASON.slice(0, -1);//cut last char
		varRackJASON = ',"RACK":"{'+varRackJASON.replace(/"/g, "&quot;")+'}"';
	}else{
		varRackJASON = ',"RACK":""';
	}

	//console.log(varRackJASON);
	return varRackDESC+varRackJASON;
}

function initTree(treeView, default_list, p3) {
	//p3 should be WO_ID
	$("#treeview_selector").addClass("ztree");
	$("#treeview_selector,#node_details").html("");
	$("#workbench_left").css('width','43%')
	$("#node_details").css('width','57%')


	//加载Root节点
	//这里的Root节点都GetTreeNodes.php进行加载
	//如果需要测试，可以直接用以下URL：http://localhost/suite/index.php?module=HAT_Asset_Locations&action=getTreeNodes&type=using_org_business_type
	//其中type是必须提供的，可能提供id参数。id参数与type有关，比如type为location，则对应的ID为HAT_Asset_Locations的ID
	//具体的ajax部分，见getTreeNodes.php，树与Ajax的关系，定义在Setting中

	var framework_title="<strong>"+$("#haa_framework").val()+"</strong> ";
	console.log(treeView);

	if (treeView=='LIST') {
		//alert(p3);
		console.log(p3);
		var zNodes = [{name:framework_title+$("#selector_view_tree option[value='"+$("#current_view").val()+"']").text(), open:true, isParent:true,pId: 0, type:default_list, query_id:p3, current_mode: current_mode}];
		console.log(zNodes);

	} else if (treeView=='SEARCH') {
		var zNodes = [p3];
		console.log(zNodes);
	}
	else if (treeView=='TREE_LOCATON') {
		var zNodes = [{name:framework_title+$("#selector_view_tree option[value='"+$("#current_view").val()+"']").text(), open:true, isParent:true,pId: 0,type:"location"}];
	} else if (treeView=='OWNING_ORG') {
		var zNodes = [
			{name:framework_title+$("#selector_view_tree option[value='"+$("#current_view").val()+"']").text(), open:true, isParent:true,pId: 0,type:"owning_org_business_type"},
			//资产一定会分配所属组织，所有没有未分配的情况
		];
	} else if (treeView=='USING_ORG') {
		var zNodes = [
			{name:framework_title+$("#selector_view_tree option[value='"+$("#current_view").val()+"']").text(), open:true, isParent:true,pId: 0,type:"using_org_business_type"},
			{name:"Unassigned", open:true, isParent:true,pId: 0,type:"using_org",id:"UNASSIGNED"}
		];
	} else if (treeView=='PRODUCT') {
		var zNodes = [
			{name:framework_title+$("#selector_view_tree option[value='"+$("#current_view").val()+"']").text(), open:true, isParent:true,pId: 0,type:"product_category"},
		];
	} else if (treeView=='CATEGORY') {
		var zNodes = [
			{name:framework_title+$("#selector_view_tree option[value='"+$("#current_view").val()+"']").text(), open:true, isParent:true,pId: 0,type:"asset_category"},
		];
	};

	//初始化树
	if ($("#mode").val()=="MultiSelect") {
		setting.check.enable=true;
	} else {
		setting.check.enable=false;
	}

	setting.async.url = 'index.php?to_pdf=true&module=HAT_Asset_Locations&action=getTreeNodes&site_id='+$("#site_id").val();
	zTreeObj = $.fn.zTree.init($("#treeview_selector"), setting, zNodes);

	//加载第一层的所有节点
	zTreeObj.reAsyncChildNodes(zTreeObj.getNodeByTId("treeview_selector_1"), "refresh", false);
}
