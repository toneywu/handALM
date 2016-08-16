$('head').append('<link href="include/javascript/yui/build/treeview/assets/skins/sam/treeview.css" rel="stylesheet" type="text/css" />');
//$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap-iconpicker-master/icon-fonts/material-design-2.2.0/css/material-design-iconic-font.css"/>');
$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap-iconpicker/icon-fonts/icomoon/css/style.css"/>');

$.getScript("include/javascript/yui/build/yahoo-dom-event/yahoo-dom-event.js");
$.getScript("include/javascript/yui/build/animation/animation-min.js");
$.getScript("include/javascript/yui/build/json/json-min.js");
$.getScript("include/javascript/yui/build/animation/animation-min.js");

//

var tree;
function treeInit() {
	tree = new YAHOO.widget.TreeView("divTreeview");
	tree.setDynamicLoad(loadDataForNode);
	var root = tree.getRoot();
	var myobj = {
		html: "<i class='"+$("#current_icon").val()+" icon-hc-lg' ></i> <span class='treeview_location'>"+$("#name").text()+"</span> : "+$("#location_title").text(),
		id: $("input[name='record']").val(),
		nodeType: "location"
	};
	var tmpNode = new YAHOO.widget.HTMLNode(myobj, root, true);

		tree.subscribe('clickEvent',nodeClicked);
	tree.render();
}

function nodeClicked(oArgs) {
	//节点点击后，加载当前节点的详细描述
	var nodeDiv = $("#divTreeNode");
	var nodeHTML ="";
	nodeHTML +="<div id='divTreeNode_header'>"+oArgs.node.html+"</div>";
	nodeHTML +="<div id='divTreeNode_detail'>";
	nodeHTML +="Type: "+oArgs.node.data.nodeType;
	nodeHTML +="</div>";
	nodeHTML +="<div id='divTreeNode_footer'>"
	if(oArgs.node.data.nodeType=="asset") {
		nodeHTML +="<a style='display:none' id='btn_view_rack' href='#'>"+SUGAR.language.get('HAT_Asset_Locations', 'LBL_ACT_VIEW_RACK_DETAIL')+"</a>"
		nodeHTML +="<a href='index.php?module=HAT_Assets&action=DetailView&record="+oArgs.node.data.id+"'>"+SUGAR.language.get('HAT_Asset_Locations', 'LBL_ACT_VIEW_DETAIL')+"</a>"
		nodeHTML +="<a href='index.php?module=HAM_SR&action=EditView&hat_assets_id="+oArgs.node.data.id+"'>"+SUGAR.language.get('HAT_Asset_Locations', 'LBL_ACT_CREATE_SR')+"</a>"
		nodeHTML +="<a href='index.php?module=HAM_WO&action=EditView&hat_assets_id="+oArgs.node.data.id+"'>"+SUGAR.language.get('HAT_Asset_Locations', 'LBL_ACT_CREATE_WO')+"</a></div>";
	}else if(oArgs.node.data.nodeType=="location") {
		nodeHTML +="<a href='index.php?module=HAT_Asset_Locations&action=DetailView&record="+oArgs.node.data.id+"'>"+SUGAR.language.get('HAT_Asset_Locations', 'LBL_ACT_VIEW_DETAIL')+"</a>"
		nodeHTML +="<a href='index.php?module=HAM_SR&action=EditView&location_id="+oArgs.node.data.id+"'>"+SUGAR.language.get('HAT_Asset_Locations', 'LBL_ACT_CREATE_SR')+"</a>"
		nodeHTML +="<a href='index.php?module=HAM_WO&action=EditView&location_id="+oArgs.node.data.id+"'>"+SUGAR.language.get('HAT_Asset_Locations', 'LBL_ACT_CREATE_WO')+"</a></div>";
	}

	nodeDiv.html(nodeHTML);

	//console.log(oArgs.node);
	if (oArgs.node.data.NodeLoaded != "true") { //如果还没有加载过，就先不进行读取，因为会调用节点加载，此时会读取
		//loadDataForNode(oArgs.node, onCompleteCallback);
	}else {
		showNodeDetail(oArgs.node,$("#divTreeNode_detail"));//如果当前节点已经加载过，就进行进行渲染。
	}
}

function loadDataForNodeDetail(node,targetDIV) {//通过Ajax加载当前节点明细
	//console.log(node)
	var id = node.data.id;
	var type = node.data.nodeType;
	targetDIV.html('Loading...');
	//console.log(node.data.Loaded);
	//
		//console.log('index.php?to_pdf=true&module=HAT_Asset_Locations&action=getTreeNodeDetail&id=' + id+"&type="+ type);
		$.ajax({//读取子地点
			url: 'index.php?to_pdf=true&module=HAT_Asset_Locations&action=getTreeNodeDetail&id=' + id+"&type="+ type,
			success: function (data) {
				//ajaxStatus.hideStatus();
				//console.log(data);
				var obj = jQuery.parseJSON(data);
				for(var i in obj) {
				   //console.log(k, obj[k]);
					node.setNodesProperty(i, obj[i] , true);
				}
				node.setNodesProperty("NodeLoaded", "true" , true);
				showNodeDetail(node,targetDIV);
			},
			error: function () { //失败
				alert('Error loading document');
			}
		})
	/*} else {
		showNodeDetail(node,targetDIV);
	}*/
}

function showNodeDetail(node,targetDIV) {
	var varHTML = "";
	//console.log(node);
	if (node.data.type=='asset') {
		varHTML += showNodeField(node.data.category,'LBL_ASSET_CATEGORY','HAT_Assets');
		varHTML += showNodeField(node.data.asset_group,'LBL_ASSET_GROUP','HAT_Assets');
		varHTML += showNodeField(node.data.name,'LBL_NAME','HAT_Assets',node.data.id,'HAT_Assets');
		varHTML += showNodeField(node.data.asset_number,'LBL_ASSET_NUMBER','HAT_Assets');
		varHTML += showNodeField(node.data.serial_number,'LBL_SERIAL_NUMBER','HAT_Assets');
		varHTML += showNodeField(node.data.vin,'LBL_VIN','HAT_Assets');
		varHTML += showNodeField(node.data.engine_num,'LBL_ENGINE_NUM','HAT_Assets');
		varHTML += showNodeField(node.data.tracking_number,'LBL_TRACKING_NUMBER','HAT_Assets');
		varHTML += showNodeField(node.data.asset_name,'LBL_ASSET_NAME','HAT_Assets');
		varHTML += showNodeField(node.data.brand,'LBL_BRAND','HAT_Assets');
		varHTML += showNodeField(node.data.model,'LBL_MODEL','HAT_Assets');
		varHTML += showNodeField(node.data.asset_status,'LBL_ASSET_STATUS','HAT_Assets');
		varHTML += showNodeField(node.data.maintainable,'LBL_MAINTAINABLE','HAT_Assets');
		varHTML += showNodeField(node.data.site_name,'LBL_MAINT_SITE','HAT_Asset_Locations',node.data.site_id,'HAM_Maint_Sites');
		varHTML += showNodeField(node.data.location_name,'LBL_HAT_ASSET_LOCATIONS_HAT_ASSETS_FROM_HAT_ASSET_LOCATIONS_TITLE','HAT_Assets',node.data.location_id,'HAT_Asset_Locations');
		varHTML += showNodeField(node.data.location_desc,'LBL_LOCATION_DESC','HAT_Assets');
		varHTML += showNodeField(node.data.account_name,'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE','HAT_Assets');
		varHTML += showNodeField(node.data.contact_name,'LBL_HAT_ASSETS_CONTACTS_FROM_CONTACTS_TITLE','HAT_Assets');

		//console.log(node.data.enable_it_rack);
		if(node.data.enable_it_rack==1) {
			$("#btn_view_rack").show();
			$("#btn_view_rack").attr("href","index.php?module=HIT_Racks&action=DetailView&record="+node.data.hit_racks_id);
		}else {
			$("#btn_view_rack").hide();
		}

	} else if (node.data.type=='location'){
		varHTML += showNodeField(node.data.location_name,'LBL_NAME','HAT_Asset_Locations',node.data.id,'HAT_Asset_Locations');
		varHTML += showNodeField(node.data.site_name,'LBL_MAINT_SITE','HAT_Asset_Locations',node.data.site_id,'HAM_Maint_Sites');
		varHTML += showNodeField(node.data.inventory_mode,'LBL_INVENTORY_MODE','HAT_Asset_Locations');
		varHTML += showNodeField(node.data.asset_node,'LBL_ASSET_NODE','HAT_Asset_Locations');
		varHTML += showNodeField(node.data.maint_node,'LBL_MAINT_NODE','HAT_Asset_Locations');
		varHTML += showNodeField(node.data.map_address,'LBL_MAP_ADDRESS','HAT_Asset_Locations');
	}
	targetDIV.html(varHTML);
}

function showNodeField(field_value,field_label,field_module,field_id,field_link_module) {
	//field_value=显示的值
	//显示的标签
	//显示的模块名，主要是标签使用
	//如果有id则建立链接，如果没有则为空，无链接
	//链接到的模块名
	var fieldHTML = "";
	if (typeof field_value != 'undefined' && field_value!='') {
		if (typeof field_id != 'undefined' && field_id!='') {
			fieldHTML += "<p><span class='lab'>"+SUGAR.language.get(field_module, field_label)+"</span><span class='detail_data'><a href='index.php?module="+field_link_module+"&action=DetailView&record="+field_id+"'>"+field_value+"</a></span></p>";
		} else {
			fieldHTML += "<p><span class='lab'>"+SUGAR.language.get(field_module, field_label)+"</span><span class='detail_data'>"+field_value+"</span></p>";
		}
	}
	return fieldHTML;
}

function loadDataForNode(node, onCompleteCallback) { //通过Ajax加载子节点
	var id = node.data.id;
	var type = node.data.nodeType;

	//console.log('index.php?to_pdf=true&module=HAT_Asset_Locations&action=getTreeNodes&id=' + id + "&type=" + type);
	//console.log(id);
	//console.log(type);

	$.ajax({//读取子地点
		url: 'index.php?to_pdf=true&module=HAT_Asset_Locations&action=getTreeNodes&id=' + id+"&type="+ type,
		success: function (data) {
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
					//console.log(tmpNode);
				});
			} else {
				node.setNodesProperty("iconMode", "false" , true);//如果读不到Ajax返回的数据，将当前节点标记为最末节点
			}

			loadDataForNodeDetail(node,$("#divTreeNode_detail"));
			onCompleteCallback();
		},
		error: function () { //失败
			alert('Error loading document');
		}
	})


}

$(document).ready(function() {

	$("#name").html("<i class='"+$("#current_icon").val()+" icon-hc-lg '></i> "+$("#name").html());

	//$("#LBL_EDITVIEW_PANEL_TREEVIEW td:first").hide();
	$("#LBL_EDITVIEW_PANEL_TREEVIEW").hide();

	$("#LBL_EDITVIEW_PANEL_TREEVIEW").after("<div id='tree_view_area'><div id='divTreeview' style='width:40%;min-width:200px;float:left;overflow-y:scroll;overflow-x:auto;height:400px;'></div></div><div id='divTreeNode' style='margin:5px 0px;padding:15px;width:50%;min-width:200px;float:left;height:400px'></div>");
	$("#divTreeview").css("margin","10px 20px");
	$.getScript("include/javascript/yui/build/treeview/treeview-min.js", treeInit);

});
