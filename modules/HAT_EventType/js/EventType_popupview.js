//http://localhost/handALM/index.php?module=HAT_EventType&action=Popup&query=true&basic_type_advanced=SR&mode=single&create=true&metadata=undefined&field_to_name[]=name

$('head').append('<link href="custom/resources/zTree/css/zTreeStyle/zTreeStyle.css" rel="stylesheet" type="text/css" />');

var module="HAT_EventType";
var is_show_fullname =0;
var associated_javascript_data;


	function btn_eventtype_clicked() {

		var treeObj = $.fn.zTree.getZTreeObj("PopupView");
		var nodes = treeObj.getSelectedNodes();
		var id = nodes[0].id;

		data='{"'+nodes[0].id+'":{"ID":"'+nodes[0].id+'","NAME":"'+nodes[0].name+'","DATE_ENTERED":"","DATE_MODIFIED":"","MODIFIED_USER_ID":"","MODIFIED_BY_NAME":"","CREATED_BY":"","CREATED_BY_NAME":"","DESCRIPTION":"","DELETED":"","CREATED_BY_LINK":"","MODIFIED_USER_LINK":"","ASSIGNED_USER_ID":"","ASSIGNED_USER_NAME":"","ASSIGNED_USER_LINK":"","SECURITYGROUPS":"","BASIC_TYPE":"Service Request","PARENT_EVENTTYPE_ID":"","PARENT_EVENTTYPE":"","HAA_FF_ID":"","HAA_FF":"","TARGET_ASSET_STATUS":"","CHANGE_PARENT":"","CHANGE_LOCATION":"","PROCESSING_ASSET_STATUS":"","CHANGE_RACK_POSITION":"","CHANGE_OWNING_ORG":"","CHANGE_OWNING_PERSON":"","CHANGE_USING_ORG":"","CHANGE_USING_PERSON":"","CHANGE_ORANIZATION_LE":"","CHANGE_LOCATION_DESC":"","REQUIRE_APPROVAL_WORKFLOW":"","REQUIRE_CONFIRMATION":"","CHANGE_TARGET_STATUS":"","CHANGE_PROCESSING_STATUS":"","CONCAT_NAME":"","EVENT_SHORT_DESC":""}}';
		associated_javascript_data = jQuery.parseJSON(data)
		//console.log(associated_javascript_data);
		send_back('HAT_EventType',id);
	}


	function filter(treeId, parentNode, childNodes) {
	if (!childNodes) return null;
	for (var i=0, l=childNodes.length; i<l; i++) {
		//childNodes[i].name = childNodes[i].name.replace(/\.n/g, '.');
		childNodes[i].isParent = true;
				//childNodes[i].t="";
			}
			return childNodes;
	}
	function onClick(event, treeId, treeNode, clickFlag) {
		if(treeNode.pId!=0) { //非根结点点击后的作用
			zTreeObj= $.fn.zTree.getZTreeObj(treeId);
			$("#eventtype_selected").val(treeNode.name);
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
				url: 'index.php?to_pdf=true&module=HAT_EventType&action=getEventTreeNodes&type='+$("#PopupView").attr('eventtype'),
				autoParam:["id"],
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

	//console.log('index.php?to_pdf=true&module=HAT_EventType&action=getEventTreeNodes&type='+$("#PopupView").attr('eventtype'));

	$("#PopupView").addClass("ztree");

	//第一个节点
	var zNodes = [{name:$("#PopupView").attr('eventtype')+":"+$("#PopupView").attr('eventtype_name'), open:true, isParent:true,pId: 0,type:$("#PopupView").attr('eventtype')}];
	//初始化树
	//SUGAR.util.doWhen("typeof $.fn.zTree.init == 'function'", function(){
	$.getScript("custom/resources/zTree/js/jquery.ztree.core.min.js", function() {
		zTreeObj = $.fn.zTree.init($("#PopupView"), setting, zNodes);
		//加载第一层的所有节点
		zTreeObj.reAsyncChildNodes(zTreeObj.getNodeByTId("treeview_selector_1"), "refresh", false);
	});


})

