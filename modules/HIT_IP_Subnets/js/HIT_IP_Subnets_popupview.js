//**********************************************************/
//*本文件被POPUP View引用，用于生成一个树型的选择框，代替传统的List
//By toney.wu
//*********************************************************/
$('head').append('<link href="custom/resources/zTree/css/zTreeStyle/zTreeStyle.css" rel="stylesheet" type="text/css" />');


var module="HIT_IT_Subnets";
var is_show_fullname =0;
var associated_javascript_data;


	function btn_submit_clicked() {

		var treeObj = $.fn.zTree.getZTreeObj("PopupView");
		var nodes = treeObj.getSelectedNodes();
		var id = nodes[0].id;

		data="";
		data += '"NAME":"'+nodes[0]['return_name']+'",';
		for(var propertyName in nodes[0]) {
		   if (typeof(nodes[0][propertyName]) == 'string') {
		   		//console.log(nodes[0][propertyName]);
				if (propertyName != 'name' && propertyName != 'return_name') {
					//name字段额外处理。因为name中的内容是HTML的，需要给出干净的Nmae
			   		data += '"'+propertyName.toUpperCase()+'":"'+nodes[0][propertyName]+'",';
			   	}
		   }
		}
		data = data.slice(0, -1);//cut last char
		data='{"'+nodes[0].id+'":{'+data+'}}';
		associated_javascript_data = jQuery.parseJSON(data)

		//alert(data);

		//console.log(associated_javascript_data);
		send_back('HIT_IT_Subnets',id);
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
		if(treeNode.pId!=0  && treeNode.isParent==false) { //非根结点点击后的作用
			zTreeObj= $.fn.zTree.getZTreeObj(treeId);
			$("#val_selected").val(treeNode.return_name);
			$("#btn_submit").attr('disabled',false);
		}else{
			$("#btn_submit").attr('disabled',true);
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
				showTitle: true,
				selectedMulti: false,
				nameIsHTML: true,
				showTitle: true,
				//fontCss: {'font-size':'22px'},
			},
			async: {
				enable: false,
/*				url: 'index.php?to_pdf=true&module=HAT_EventType&action=getEventTreeNodes&type='+$("#PopupView").attr('eventtype'),
				autoParam:["id"],
				dataFilter: filter*/
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
			rootPId: 0,
		}
	}
	};


	//console.log(zNodes);
	$("#PopupView").addClass("ztree");
		$("#btn_submit").attr('disabled',true);



	//第一个节点
	//var zNodes = [{name:$("#PopupView").attr('eventtype')+":"+$("#PopupView").attr('eventtype_name'), open:true, isParent:true,pId: 0,type:$("#PopupView").attr('eventtype')}];
	//初始化树
	//SUGAR.util.doWhen("typeof $.fn.zTree.init == 'function'", function(){
	$.getScript("custom/resources/zTree/js/jquery.ztree.core.min.js", function() {
		zTreeObj = $.fn.zTree.init($("#PopupView"), setting, zNodes);
		//加载第一层的所有节点
		//zTreeObj.reAsyncChildNodes(zTreeObj.getNodeByTId("treeview_selector_1"), "refresh", false);
	});


})

