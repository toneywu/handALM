$('head').append('<link href="custom/resources/zTree/css/metroStyle/metroStyle.css" rel="stylesheet" type="text/css" />');
$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap-iconpicker/icon-fonts/icomoon/css/style.css"/>');

var zTreeObj;
var setting = {
		view: {
			showIcon: false,
			selectedMulti: false,
			nameIsHTML: true,
			showTitle: false
		},
		async: {
			enable: true,
			url: 'index.php?to_pdf=true&module=HAT_Asset_Locations&action=getTreeNodes',
			autoParam:["id", "type","wo_id","current_mode"],
			dataFilter: filter
		},
		callback: {
			//beforeClick: beforeClick,
			onClick: onClick,
			onAsyncSuccess:onAsyncSuccess,
			//onAsyncError: onAsyncError,
/*				beforeAsync: beforeAsync,
onAsyncSuccess: onAsyncSuccess*/
},
data: {
	simpleData: {
		enable: true,
		idKey: "id",
		pIdKey: "pId",
		rootPId: 0
	}
}
};


	function filter(treeId, parentNode, childNodes) {
	if (!childNodes) return null;
	for (var i=0, l=childNodes.length; i<l; i++) {
		//childNodes[i].name = childNodes[i].name.replace(/\.n/g, '.');
		childNodes[i].detailed_name = childNodes[i].name;

		if (typeof childNodes[i].status != 'undefined') {
			childNodes[i].name = childNodes[i].name +" "+childNodes[i].status;
		} else {
			childNodes[i].name = childNodes[i].name;
		}
		childNodes[i].isParent = true;
				//childNodes[i].t="";
		}
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
		if(treeNode.pId!=0) { //非根结点点击后的作用
			zTreeObj= $.fn.zTree.getZTreeObj(treeId);
			//console.log(treeNode);
			loadDataForNodeDetail(zTreeObj, treeNode, $("#node_details"));
		}
	}

	function onAsyncSuccess(e, treeId, treeNode) {
			//if (!treeNode) return;
			zTreeObj= $.fn.zTree.getZTreeObj(treeId);
			if (treeNode.children.length==0) { //如果尝试加载后发现没有子节点，就将当前节点标记为末节点
				treeNode.isParent = false;
				zTreeObj.updateNode(treeNode);
			}
		}

	function onAsyncError(e, treeId, treeNode) {
			zTreeObj= $.fn.zTree.getZTreeObj(treeId);
			treeNode.isParent = true;
			zTreeObj.updateNode(treeNode);
	}
	function ajaxGetNodes(treeNode, type) {
			zTree.reAsyncChildNodes(treeNode, type, false);
	};

	function loadDataForNodeDetail(treeObj, node, targetDIV) {//通过Ajax加载当前节点明细
		var id = node.id;
		var type = node.type;
		console.log('index.php?to_pdf=true&module=HAT_Asset_Locations&action=getTreeNodeDetailHTML&id=' + id+"&type="+ type);
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
						showNodeDetailHTML(node,targetDIV);
					},
					error: function () { //失败
						alert('Error loading document');
					}
				})
		}else{
			//如果当前节点已有明细数据，则不通过Ajax加载，直接进行显示
			showNodeDetailHTML(node,targetDIV);
		}
	}



function showNodeDetailHTML(node,targetDIV) {
	//加载每个节点的详细内容
	var varHTML = "";
	varHTML ="<h3>"+(node.detailed_name)+"</h3>";
	if (node.type=='location'||node.type=='asset') {
		//显示主要动作按钮

		if (current_mode=="view") {
			varHTML+="<div class='detail_action_panel'>";
			for (index = 0; index < node.data.btn.length; ++index) {
			    varHTML+="<a href='index.php?"+node.data.btn[index]['link']+"' class='button'>"+node.data.btn[index]['lab']+"</a>";
			}
		} else {
			varHTML+=showNodeDetailBtn(node);
		}


		varHTML+="</div>";
		//显示主要字段
		varHTML+="<div class='detailed_data_table'>"
		for (var index = 0; index < node.data.fields.length; ++index) {
		    varHTML+="<div class='detailed_fileds'><span class='lab'>"+node.data.fields[index]['lab']+"</span><span class='detail_data'>"+node.data.fields[index]['val']+"</span></div>";
		}
		varHTML+="</div>"
		if (typeof (node.data.chart)!="undefined") {
			varHTML+=node.data.chart;
		}


	}
	targetDIV.html(varHTML);
	//读取机柜信息
	showITRacks(node);

	if (current_mode=="rackposition") {//如果当前模式是选择U位，则出现U位选择的按钮
		$("#rack_frame").after(showITRacksForm(node));
	}
}

function showNodeDetailBtn(node) {
	//如果是在选择模块下（参数current_mode!="view")。Ajax不会返回HTML形式的Buttons
	//因此在JS中生成按钮。
	console.log("current_mode="+current_mode);
	console.log("node.type"+node.type);
	console.log("node.data.rackid"+node.data.rackid);
	if ((current_mode=="asset" && node.type=="asset") ||//选择所有资产
		(current_mode=="it" && node.type=="asset" && node.data.enable_it_ports=="1") ||//选择IT可联网设备
		(current_mode=="rack" && node.type=="asset" && typeof(node.data.rackid)!="undefined") //选择机柜
		)
		 {
		 return "<a href='#' class='button' onclick='btn_select_clicked()'>"+SUGAR.language.get('HAT_Asset_Locations', 'LBL_BTN_SELECT')+"</a>";
	} else {
		return "";
	}
}


function btn_select_clicked() {
	//在选择模式下返回值
	var treeObj = $.fn.zTree.getZTreeObj("treeview_selector");
	var nodes = treeObj.getSelectedNodes();
	var id = nodes[0].id;

	data="";
	for(var fields in nodes[0]['data']['rdata']) {
	   data += '"'+ fields.toUpperCase()+'":"'+nodes[0]['data']['rdata'][fields]+'",';

	}
	data = data.slice(0, -1);//cut last char
	data='{"'+nodes[0]['data']['rdata']['id']+'":{'+data+'}}';
	//console.log(jQuery.parseJSON(data));

	associated_javascript_data = jQuery.parseJSON(data)
	//console.log(data);
	send_back('HAT_Asset_Locations',id);
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
		var zNodes = [{name:framework_title+$("#selector_view_tree option[value='"+$("#current_view").val()+"']").text(), open:true, isParent:true,pId: 0, type:default_list, wo_id:p3, current_mode: current_mode}];
		console.log(zNodes);
	} else if (treeView=='TREE_LOCATON') {
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
	}
	//初始化树
	zTreeObj = $.fn.zTree.init($("#treeview_selector"), setting, zNodes);
	//加载第一层的所有节点
	zTreeObj.reAsyncChildNodes(zTreeObj.getNodeByTId("treeview_selector_1"), "refresh", false);

}