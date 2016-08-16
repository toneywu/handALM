<?php if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');?>

<link rel="stylesheet" src="custom/resources/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
<script src="custom/resources/zTree/js/jquery.ztree.core.min.js"></script>
<style type="text/css">
	#workbench_left {
		width:450px;
		height:600px;
		float:left;
		background-color:#efefef;
		overflow: scroll;
		display: block;
	}
	#node_details {
		padding: 20px;
		width: auto;
		overflow:auto;
	}

	#node_details h3 {
		padding: 10px 5px 15px 5px;
		font-size:medium;
		border-bottom: 1px solid #000;
		margin:0 0 20px 0;
	}
	#node_details p span,#node_details p span a {
		font-size: small;
	}

	#node_details span.lab {
		width:35%;
		padding:2px;
		margin: 0 1em 0 0;
		text-align: right;
		display: inline-block;
	}

	#node_details_footer {
		margin: 50px 0 0 0;
	}

	#node_details_footer a{
		margin:5px;
		padding: 2px 5px;
		font-size: small;
	}

	.field_span {
		padding: 0px;
	}
	.top_label,.top_filter_label {
		width:80px;
		display: inline-flex;
		text-align: right;
	}
	#selector_top_view {
		background-color:aliceblue;
		padding: 10px 5px;
		margin: -2px 0 0 0;
		border: 1px solid #ccc;
	}

	#selctor_top_view_details {
		border-right:1px dashed #ccc;
	}

	#select_mode .tab_label {
		margin: 0 1em 0 0;
		vertical-align:middle;
		font-size: medium;
	}
	#select_mode .tabFocused, #select_mode .tabUnfocused {
		border-radius: 5px 5px 0 0;
		display: inline-flex;
		vertical-align:middle;
		padding: 10px 15px;
	}
	#select_mode .tabFocused {
		background-color:aliceblue;
		border: 1px solid #ccc;
		border-bottom: 0;
	}
	#select_mode .tabUnfocused {
		background-color:#efefef;
		border: 1px solid #ccc;
	}
.treeview_location {
	font-weight: bolder;
	background-color: #F3EEDF;
	/*padding:1px 15px 2px 10px;*/
}
.treeview_asset {
	font-weight: bolder;
	background-color: #ffcfbf;
	/*padding:1px 15px 2px 10px;*/
}
.treeview_product {
	font-weight: bolder;
	background-color: #ffc7c7;
	/*padding:1px 15px 2px 10px;*/
}
.detail_action_panel {
	margin: 25px 0;
}
</style>

<?php global $mod_strings, $app_strings, $app_list_strings;?>

<div id="selector_top">
	<div id="select_mode">
		 <div id="selectorType_Tree" class="tabFocused">
	         <span class="tab_label"><i class="icon-sitemap"></i> <?php echo $mod_strings['LBL_NAV_MODE_TREE'];?> </span>
		     <select id="selector_view_tree" class="form-horizontal">
		     <?php foreach ($app_list_strings['hat_navigator_tree_type_list'] as $key => $value) {
		     	echo '<option value="'.$key.'">'.$value.'</option>';
		     }?>
			</select>
			<input type="hidden" id="current_view">
			<button id="btn_switch_tree_view"><?php echo $mod_strings['LBL_BTN_SWITCH_VIEW'];?></button>
	    </div>
		<div id="selectorType_Map" class="tabUnfocused">
	         <span class="tab_label"><i class="icon-map-o"></i> <?php echo $mod_strings['LBL_NAV_MODE_MAP'];?> </span>
		<select id="selector_map_type" class="form-horizontal">
		     <?php foreach ($app_list_strings['cux_map_type_list'] as $key => $value) {
		     	echo '<option value="'.$key.'">'.$value.'</option>';
		     }?>
		</select>
		<button id="btn_switch_map_view"><?php echo $mod_strings['LBL_BTN_SWITCH_VIEW'];?></button>
	    </div>
	</div>

<div id="selector_top_view" class="row">

<!-- 	    <div id="selctor_top_view_details" class="col-md-3">
			<span class="col-md-12 field_span">
				<span class="top_label">Data Scope:</span>
				<select class="form-horizontal" style="200px">
					<option value="LOCATOIN">Location Only</option>
					<option value="ASSET" selected="selected">Equip./Asset and Location</option>
				</select>
 			</span>
		<span class="col-md-12 field_span"><span class="top_label">View:</span>



		</span>


    	</div>



	<div id="top_filter" class="col-md-9">
		<span class="col-md-6 field_span"><span id="site_advanced_label" class="top_filter_label">Site</span><input ></span>
		<span class="col-md-6 field_span"><span id="site_advanced_label" class="top_filter_label">Owining Org</span><select><option>Location Type</option></select><input></span>
		<span class="col-md-6 field_span"><span id="site_advanced_label" class="top_filter_label">Using Org</span><select><option>Location Type</option></select><input></span>
		<span class="col-md-6 field_span"><span id="site_advanced_label" class="top_filter_label">Location</span><select><option>Location Type</option></select><input></span>
		<span class="col-md-6 field_span"><span id="site_advanced_label" class="top_filter_label">Asset</span><select><option>Asset Nameplate</option></select><input></span>

		<button id="selectorType_Filter">
	        <span class="glyphicon glyphicon-filter"></span>Apply Filter
	    </button>
	</div> -->
</div>


<div id="workbench" style="margin:0;display:flex;border:1px solid #ccc">
	<div id="workbench_left">
		<ul id="treeview_selector" class="overflow: scroll">
			a tree
		</ul>
		<div id="cuxMap"></div>
	</div>
	<div id="node_details" style="float:left;">
	</div>
</div>

<?php //加载语言包
        $modules = array(
            'HAT_Asset_Locations',
            'HAT_Assets',
        );
        foreach ($modules as $module) {
            if (!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js')) {
                require_once 'include/language/jsLanguage.php';
                jsLanguage::createModuleStringsCache($module, $GLOBALS['current_language']);
            }
            echo '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['js_version_key'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';
        };
?>

<script>
	$.getScript("modules/HAT_Asset_Locations/js/selector_resizer.js"); //加载横竖两个可拖拉条
	$.getScript("modules/HAT_Asset_Locations/js/selector_treeview.js");//加载结构树的处理
	$.getScript("modules/HAT_Asset_Locations/js/selector_mapview.js");//加载地图视图的处理


$(document).ready(function(){

	$("#selectorType_Tree").click(function(){
		$("#selectorType_Tree").addClass("tabFocused");
		$("#selectorType_Tree").removeClass("tabUnfocused");
		$("#selectorType_Map").addClass("tabUnfocused");
		$("#selectorType_Map").removeClass("tabFocused");
		$("#selector_map_type").hide();
		$("#selector_view_tree").show();
		$("#btn_switch_map_view").hide();
		$("#btn_switch_tree_view").show();
	});

	$("#selectorType_Map").click(function(){
		$("#selectorType_Tree").addClass("tabUnfocused");
		$("#selectorType_Tree").removeClass("tabFocused");
		$("#selectorType_Map").addClass("tabFocused");
		$("#selectorType_Map").removeClass("tabUnfocused");
		$("#selector_map_type").show();
		$("#selector_view_tree").hide();
		$("#btn_switch_map_view").show();
		$("#btn_switch_tree_view").hide();
	});

	$("#btn_switch_tree_view").click(function(){
		if($("#selectorType_Tree").hasClass('tabFocused')) {
			//如果当前模块是Treeview
			$("#current_view").val($("#selector_view_tree").val());//加载树的类型

			SUGAR.util.doWhen("typeof initTree == 'function'", function() {//在selector_treeview.js完成加载之后，再继续加载
				//这里是需要执行的内容
				initTree($("#current_view").val());
			});
		} else {
			//如果当前模式不是Treeview，就是MapView
		}

	})

	$("#selectorType_Tree").click();//默认是Functional Tree的View
	$("#btn_switch_tree_view").click();//默认是Functional Tree的模式
});


</script>