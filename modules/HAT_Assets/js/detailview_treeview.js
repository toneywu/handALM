$('head').append('<link href="include/javascript/yui/build/treeview/assets/skins/sam/treeview.css" rel="stylesheet" type="text/css" />');
$.getScript("include/javascript/yui/build/yahoo-dom-event/yahoo-dom-event.js");
$.getScript("include/javascript/yui/build/animation/animation-min.js");
$.getScript("include/javascript/yui/build/json/json-min.js");
$.getScript("include/javascript/yui/build/animation/animation-min.js");
//

var tree;
function treeInit() { //初始化完成第一个节点的绘制
	tree = new YAHOO.widget.TreeView("divTreeview");
	tree.setDynamicLoad(loadDataForNode);
	var root = tree.getRoot();
	var myobj = {
		html: "<span class='treeview_location'>"+$("#name").text()+"</span> : "+$("#asset_desc").text(),
		id: $("input[name='record']").val(),
		nodeType: "asset"
	};
	var tmpNode = new YAHOO.widget.HTMLNode(myobj, root, true);//最后一个参数，会自动加载第一个节点的子节点
	tree.render();
}

function loadDataForNode(node, onCompleteCallback) {
	var id = node.data.id;
	var type = node.data.nodeType;
	//console.log('index.php?to_pdf=true&module=HAT_Asset_Locations&action=getTreeNodes&id=' + id+"&type="+ type);
	console.log(id);
	console.log(type);
	
	$.ajax({//读取子地点(从Location模块加载ajax)
		url: 'index.php?to_pdf=true&module=HAT_Asset_Locations&action=getTreeNodes&id=' + id+"&type="+ type,
		
		success: function (data) {
			//ajaxStatus.hideStatus();
			//console.log(data);
			var obj = jQuery.parseJSON(data);
			if(obj.node.length>0) { //如果读取到1个以上的节点，则直接增加节点
				$.each(obj.node, function () {
					var myobj = {
						html: this.html,
						id: this.id,
						nodeType: this.type
					};
					var tmpNode = new YAHOO.widget.HTMLNode(myobj, node, false);
					
				});
			} else {
				node.setNodesProperty("iconMode", "false" , true);//如果读不到Ajax返回的数据，将当前节点标记为最末节点
			}

			onCompleteCallback();

		},
		error: function () { //失败
			alert('Error loading document');
		}
	})
}

$(document).ready(function() {

	$("#LBL_DETAILVIEW_PANEL6").after("<div id='tree_view_area'><div id='divTreeview'></div></div>");
	$("#divTreeview").css("margin","10px 20px");
	$.getScript("include/javascript/yui/build/treeview/treeview-min.js", treeInit);
	
});
