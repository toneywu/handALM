<?php global $mod_strings, $app_strings, $app_list_strings;?>

<?php 
	echo '<form id="MapView">';

	//显示地图类型字段
	echo '<span id="map_type_label">'.$mod_strings['LBL_MAP_TYPE'].'</span>';
	echo '<select id="map_type">';
	foreach ($app_list_strings['cux_map_type_list'] as $map_type => $value) {
		echo "<option value='".$map_type."'>".$value."</option>";
	}
	echo '</select>';

	//如果是自定义地图，需要选择自定义地图图层
	//LBL_MODULE_TITLE
	echo '<span id="map_layer_label">'.$mod_strings['LBL_MODULE_TITLE'].'</span>';
?>

<input type="text" name="map_layer" class="sqsEnabled yui-ac-input" tabindex="0" id="warranty_type" size="" value="" title="" autocomplete="off">
<input type="hidden" name="map_layer_id" id="map_layer_id" value="">
<span class="id-ff multiple">
	<button type="button" name="btn_map_layer_id" id="btn_map_layer_id" tabindex="0" title="Select" class="button firstChild" value="Select" onclick="open_popup('HAA_Maps',600,400,'',true,false,{'call_back_function':'set_return','form_name':'MapView','field_to_name_array':{'id':'map_layer_id','name','map_layer'}},'single',true);">
	<img src="themes/default/images/id-ff-select.png"></button>
	<button type="button" name="btn_clr_map_layer" id="btn_clr_map_layer" tabindex="0" title="Clear Selection" class="button lastChild" onclick="SUGAR.clearRelateField(this.form, 'map_layer', 'map_layer_id');" value="Clear Selection"><img src="themes/default/images/id-ff-clear.png"></button>
</span>

<?php

		$displayParams = array();
        //$displayParams['formName'] = 'EditView';

        // if this is the id relation field, then don't have a pop-up selector.
        if ($vardef['type'] == 'relate' && $vardef['id_name'] == $vardef['name']) {
            $vardef['type'] = 'varchar';
        }


        // load SugarFieldHandler to render the field tpl file
        static $sfh;

        if (!isset($sfh)) {
            require_once('include/SugarFields/SugarFieldHandler.php');
            $sfh = new SugarFieldHandler();
        }

        $contents = $sfh->displaySmarty('fields', $vardef, $view, $displayParams);

?>

</form>