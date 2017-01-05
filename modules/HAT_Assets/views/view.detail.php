<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class HAT_AssetsViewDetail extends ViewDetail
{

    function Display() {

    	//print_r($this->bean);

		//如果当前为机架，则试图显示当前的机架
    	$this->ss->assign('ENABLE_IT_RACK_DETAILS','<input type="checkbox" class="checkbox" id="hit_racks_hat_assets_flag" disabled="true">');
    	if($this->bean->enable_it_rack==1) {
    		$bean_rack = BeanFactory::getBean('HIT_Racks')->retrieve_by_string_fields(array('hat_assets_id'=>$this->bean->id));
    		$this->bean->hit_racks = $bean_rack->name;
    		$this->bean->hit_racks_id = $bean_rack->id;

    		$this->ss->assign('ENABLE_IT_RACK_DETAILS','<input type="checkbox" class="checkbox" id="hit_racks_hat_assets_flag" checked="checked"> <a href="index.php?module=HIT_Racks&action=DetailView&record='.$bean_rack->id.'">'.$bean_rack->name.'</a>');
    	}

    	//如果当前为IT可联网设备，则显示当前的上架信息
    	$this->ss->assign('ENABLE_IT_PORTS_DETAILS','<input type="checkbox" class="checkbox" id="enable_it_ports" disabled="true">');
    	if($this->bean->enable_it_ports==1) {
    		$bean_rack_allocation = BeanFactory::getBean('HIT_Rack_Allocations')->retrieve_by_string_fields(array('hat_assets_id'=>$this->bean->id));
    		$bean_rack = BeanFactory::getBean('HIT_Racks')->retrieve_by_string_fields(array('id'=>$bean_rack_allocation->hit_racks_id));
    		if ($bean_rack_allocation && $bean_rack) {

    			$this->ss->assign('ENABLE_IT_PORTS_DETAILS','<input type="checkbox" class="checkbox" id="enable_it_ports" checked="checked">@<a href="index.php?module=HIT_Racks&action=DetailView&record='.$bean_rack_allocation->hit_racks_id.'">'.$bean_rack->name.'</a>
    				['.$bean_rack_allocation->rack_pos_top.' U]');
    		}
    	}

    	if($this->bean->enable_linear==1) {
    		//如果启用了线性资产，则读取线性资产相关信息，如“Linear Reference Methord"

    	} else {
    		//
    	}


        //var_dump($bean_location);

        if(!$this->bean->use_location_gis){
            $this->bean->map_type = $this->bean->asset_map_type;
            $this->bean->map_lat = $this->bean->asset_map_lat;
            $this->bean->map_lng = $this->bean->asset_map_lng;
            $this->bean->map_zoom = $this->bean->asset_map_zoom;
            $this->bean->map_marker_type = $this->bean->asset_map_marker_type;
            $this->bean->map_marker_data = $this->bean->asset_map_marker_data;
            $this->bean->map_layer_id = $this->bean->asset_map_layer_id;
        }else{
        	if (isset($this->bean->hat_asset_locations_hat_assetshat_asset_locations_ida)) {
            $bean_location = BeanFactory::getBean('HAT_Asset_Locations', $this->bean->hat_asset_locations_hat_assetshat_asset_locations_ida);
            if ($bean_location) { // test if $bean_location was loaded successfully
                $this->bean->map_type =  isset($bean_location->map_type)?$bean_location->map_type:'NONE';
                $this->bean->map_lat = isset($bean_location->map_lat)?$bean_location->map_lat:'';
                $this->bean->map_lng = isset($bean_location->map_lng)?$bean_location->map_lng:'';
                $this->bean->map_address = isset($bean_location->map_address)?$bean_location->map_address:'';
                $this->bean->map_zoom = isset($bean_location->map_zoom)?$bean_location->map_zoom:'';
                $this->bean->map_marker_type = isset($bean_location->map_marker_type)?$bean_location->map_marker_type:'';;
                $this->bean->map_marker_data = isset($bean_location->map_marker_data)?$bean_location->map_marker_data:'';;
                $this->bean->map_layer_id = isset($bean_location->map_layer_id)?$bean_location->map_layer_id:'';;
            }
            }
        }

/*
		if (isset($this->bean->asset_status))
			$this->bean->asset_status = "<span class='color_tag color_asset_status_".$this->bean->asset_status."'>".$app_list_strings['hat_asset_status_list'][$this->bean->asset_status]."</span>";
*/
        parent::Display();

        //ff 在DetailView显示之前中进行初始化数据的加载 
		if (isset ($this->bean->aos_products_id) && ($this->bean->aos_products_id) != "") {
			$aos_products_id = $this->bean->aos_products_id;
			$bean_product = BeanFactory::getBean('AOS_Products',$aos_products_id);

			$ff_id = $bean_product->haa_ff_id_c;

			if (isset ($ff_id) && $ff_id != "") {
				echo '<script src="modules/HAA_FF/ff_include.js"></script>';
				echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
				echo '<script> function call_ff() {
								    triger_setFF($("#haa_ff_id").val(),"HAT_Assets","DetailView");
								    $(".expandLink").click();
								 
								}</script>';
				echo '<script>call_ff()</script>';
			}
		}

	}

}//end class
