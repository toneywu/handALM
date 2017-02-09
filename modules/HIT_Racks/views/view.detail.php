<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once ('include/MVC/View/views/view.detail.php');

class HIT_RACKSViewDetail extends ViewDetail {

	function Display() {

		global $current_user;
		global $db, $app_list_strings, $mod_strings;

		//读取资产相关的字段
		if (isset ($this->bean->hat_assets_id)) {
			//如果当前数据有ID号，也就是说当前是在编辑修改模式，而不是新增模式下
			$asset = BeanFactory :: getBean('HAT_Assets', $this->bean->hat_assets_id); //更新已有资产信息

			$this->bean->asset_number = $asset->asset_number;
			$this->bean->asset_location_id = $asset->hat_asset_locations_hat_assetshat_asset_locations_ida;
			$this->bean->asset_location = $asset->hat_asset_locations_hat_assets_name;

			$this->bean->aos_products_id = $asset->aos_products_id;
			$this->bean->asset_group = $asset->asset_group;

			$this->bean->supplier_org_id = $asset->supplier_org_id;
			$this->bean->supplier_org = (empty ($asset->supplier_desc)) ? $asset->supplier_org : $asset->supplier_desc;
			$this->bean->asset_source_id = $asset->asset_source_id;
			$this->bean->supplier_desc = $asset->supplier_desc;
			$this->bean->asset_source_type = $asset->asset_source_type;
			$this->bean->asset_source_ref = $asset->asset_source_ref;
			$this->bean->asset_status = $asset->asset_status;
			//$this->bean->asset_status = "<span class='color_tag color_asset_status_".$asset->asset_status."'>".$app_list_strings['hat_asset_status_list'][$asset->asset_status]."</span>";
			$this->bean->using_org_id = $asset->using_org_id;
			$this->bean->owning_org_id = $asset->owning_org_id;
			$this->bean->using_person_id = $asset->using_person_id;
			$this->bean->owning_person_id = $asset->owning_person_id;
			$this->bean->using_person_desc = $asset->using_person_desc;
			$this->bean->owning_person_desc = $asset->owning_person_desc;
			$this->bean->using_org = $asset->using_org;
			$this->bean->owning_org = $asset->owning_org;
			$this->bean->start_date = $asset->start_date;
			$this->bean->received_date = $asset->received_date;
			$this->bean->dismiss_date = $asset->dismiss_date;
			//画出机柜图
			require_once ('modules/HIT_Racks/ServerChart.php');
			$this->bean->position_display_area = getServerChart($this->bean, "RackFrame") . "<div id='js_jason' style='display:none'>{" . getServerChart($this->bean, "Servers") . "}</div>";
		}
		$this->bean->occupation = getOccupationCnt($this->bean);

		parent :: Display();
		//ff 在DetailView显示之前中进行初始化数据的加载 
		if (isset ($this->bean->aos_products_id) && ($this->bean->aos_products_id) != "") {
			$products_id = $this->bean->aos_products_id;
			$bean_code = BeanFactory :: getBean('AOS_Products', $products_id);
			$ff_id = $bean_code->haa_ff_id_c;

			if (isset ($ff_id) && $ff_id != "") {
				echo '<script src="modules/HAA_FF/ff_include.js"></script>';
				echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
				echo '<script> function call_ff() {
								    triger_setFF($("#haa_ff_id").val(),"HIT_Racks","DetailView");
								    $("a.collapsed").click();
								}</script>';
				echo '<script>call_ff()</script>';
			}
		}

	}

}