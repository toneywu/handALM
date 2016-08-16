$('head').append('<link href="include/javascript/yui/build/treeview/assets/skins/sam/treeview.css" rel="stylesheet" type="text/css" />');
$.getScript("include/javascript/yui/build/yahoo-dom-event/yahoo-dom-event.js");
$.getScript("include/javascript/yui/build/animation/animation-min.js");
$.getScript("include/javascript/yui/build/json/json-min.js");
$.getScript("include/javascript/yui/build/animation/animation-min.js");

var tree;
function treeInit() {
	tree = new YAHOO.widget.TreeView("cuxTreeview");
	tree.setDynamicLoad(loadDataForNode);
	var root = tree.getRoot();
	var myobj = {
		html: "<span class='treeview_location'>"+$("#name").val()+"</span> : "+$("#location_title").val(),
		id: $("input[name='record']").val(),
		nodeType: "location"
	};
	var tmpNode = new YAHOO.widget.HTMLNode(myobj, root, false);

	tree.render();
}

function loadDataForNode(node, onCompleteCallback) {
	var id = node.data.id;
	var type = node.data.nodeType;

	//console.log("try to load");
	console.log(id);
	console.log(type);

	$.ajax({//读取子地点
		url: 'index.php?to_pdf=true&module=HAT_Asset_Locations&action=getTreeNodes&id=' + id+"&type="+ type,
		//dataType: "json",
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
					onCompleteCallback();
				});
			} else {
				onCompleteCallback();
				node.setNodesProperty("iconMode", "false" , true);//如果读不到Ajax返回的数据，将当前节点标记为最末节点
			};

		},
		error: function () { //失败
			alert('Error loading document');
		}
	});
}

$(document).ready(function() {
	//$("#treeview_display_area_label").hide();
	//$("#treeview_display_area_label").html("<span class='treeview_location'>Function Location</span> <span class='treeview_asset'>Asset</span>");
	$.getScript("include/javascript/yui/build/treeview/treeview-min.js", treeInit);
});