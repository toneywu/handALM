//http://localhost/handALM/index.php?module=HAT_EventType&action=Popup&query=true&basic_type_advanced=SR&mode=single&create=true&metadata=undefined&field_to_name[]=name

$.getScript("custom/resources/zTree/js/jquery.ztree.core.min.js");
$('head').append('<link href="custom/resources/zTree/css/zTreeStyle/zTreeStyle.css" rel="stylesheet" type="text/css" />');

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
			autoParam:["id", "type"],
			dataFilter: filter
		},
		callback: {
			//beforeClick: beforeClick,
			onClick: onClick,
			onAsyncSuccess:onAsyncSuccess,
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
		childNodes[i].name = childNodes[i].name.replace(/\.n/g, '.');
		childNodes[i].isParent = true;
				//childNodes[i].t="";
			}
			return childNodes;
	}
	function onClick(event, treeId, treeNode, clickFlag) {
		if(treeNode.pId!=0) { //非根结点点击后的作用
			zTreeObj= $.fn.zTree.getZTreeObj(treeId);
			console.log(treeNode);
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

$(document).ready(function() {
	$("#PopupView").addClass("ztree");
	console.log($("#PopupView").attr('eventtype_name'));
	var zNodes = [{name:$("#PopupView").attr('eventtype_name'), open:true, isParent:true,pId: 0,type:"location"}];

	//初始化树
	SUGAR.util.doWhen("typeof $.fn.zTree.init == 'function'", function(){
		zTreeObj = $.fn.zTree.init($("#PopupView"), setting, zNodes);
		//加载第一层的所有节点
		zTreeObj.reAsyncChildNodes(zTreeObj.getNodeByTId("treeview_selector_1"), "refresh", false);
	});

})

