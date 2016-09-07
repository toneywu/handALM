<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HIT_RacksViewEdit extends ViewEdit
{

    function Display() {
        //1、初始化Framework
        require_once('modules/HAA_Frameworks/orgSelector_class.php');
        $current_framework_id = empty($this->bean->hat_framework_id)?"":$this->bean->hat_framework_id;
        $current_module = $this->module;
        $current_action = $this->action;
        $this->ss->assign('FRAMEWORK',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_frameworks_id'));

        $beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
            if (isset($beanFramework->itrack_aos_products_id) && empty($this->bean->aos_products_id)) {
              //如果当前机柜还没有资产组信息，则从Framework默认机柜的资产组
              //否则的话不对产品进行任意复制，系统会自动读取记录的值
                $this->bean->aos_products_id = $beanFramework->itrack_aos_products_id;
                $this->bean->asset_group     = $beanFramework->itrack_asset_group;
            }

        if (isset($this->bean->hat_assets_id)) {
        	//如果当前数据有ID号，也就是说当前是在编辑修改模式，而不是新增模式下
            $asset = BeanFactory::getBean('HAT_Assets',$this->bean->hat_assets_id); //更新已有资产信息

            $this->bean->asset_number = $asset->asset_number;
            $this->bean->asset_location_id = $asset->hat_asset_locations_hat_assetshat_asset_locations_ida;
            $this->bean->asset_location = $asset->hat_asset_locations_hat_assets_name;

            $this->bean->aos_products_id = $asset->aos_products_id ;
            $this->bean->supplier_org_id = $asset->supplier_org_id;
            $this->bean->asset_source_id = $asset->asset_source_id ;
            $this->bean->supplier_desc = $asset->supplier_desc;
            $this->bean->asset_source_type = $asset->asset_source_type;
            $this->bean->asset_source_ref= $asset->asset_source_ref;
            $this->bean->asset_status = $asset->asset_status;
            $this->bean->using_org_id = $asset->using_org_id;
            $this->bean->owning_org_id = $asset->owning_org_id;
            $this->bean->using_person_id = $asset->using_person_id ;
            $this->bean->owning_person_id = $asset->owning_person_id ;
            $this->bean->using_person_desc = $asset->using_person_desc;
            $this->bean->owning_person_desc= $asset->owning_person_desc;
            $this->bean->using_org = $asset->using_org;
            $this->bean->owning_org= $asset->owning_org;
            $this->bean->start_date = $asset->start_date;
            $this->bean->received_date = $asset->received_date;
            $this->bean->dismiss_date = $asset->dismiss_date;
        }
        parent::Display();


        //处理Framework中的相关字段
        if(isset($beanFramework)) {
            if($beanFramework->owning_person_field_rule=='TEXT'){
                $current_owning_person = isset($this->bean->owning_person)?($this->bean->owning_person):"";
                $current_owning_person_id=isset($this->bean->owning_person_id)?$this->bean->owning_person_id:"";
                $current_owning_person_desc=isset($this->bean->owning_person_desc)?$this->bean->owning_person_desc:"";
                echo ('<script>$("#owning_person").parent().html(\'<input type="hidden" name="owning_person" id="owning_person" value="'.$current_owning_person.'"/><input type="hidden" name="owning_person_id" id="owning_person_id" value="'.$current_owning_person_id.'"/><input type="text" name="owning_person_desc" id="owning_person_desc" value="'.$current_owning_person_desc.'"/>\');</script>');
            }


            if($beanFramework->using_person_field_rule=='TEXT'){
                $current_using_person = isset($this->bean->using_person)?($this->bean->using_person):"";
                $current_using_person_id=isset($this->bean->using_person_id)?$this->bean->using_person_id:"";
                $current_using_person_desc=isset($this->bean->using_person_desc)?$this->bean->using_person_desc:"";
                echo ('<script>$("#using_person").parent().html(\'<input type="hidden" name="using_person" id="using_person" value="'.$current_using_person.'"/><input type="hidden" name="using_person_id" id="using_person_id" value="'.$current_using_person_id.'"/><input type="text" name="using_person_desc" id="using_person_desc" value="'.$current_using_person_desc.'"/>\');</script>');
            }

            if($beanFramework->supplier_field_rule=='TEXT'){
                $current_supplier_org = isset($this->bean->supplier_org)?($this->bean->supplier_org):"";
                $current_supplier_org_id=isset($this->bean->supplier_org_id)?$this->bean->supplier_org_id:"";
                $current_supplier_desc=isset($this->bean->supplier_desc)?$this->bean->supplier_desc:"";
                echo ('<script>$("#supplier_org").parent().html(\'<input type="hidden" name="supplier_org" id="supplier_org" value="'.$current_supplier_org.'"/><input type="hidden" name="supplier_org_id" id="supplier_org_id" value="'.$current_supplier_org_id.'"/><input type="text" name="supplier_desc" id="supplier_desc" value="'.$current_supplier_desc.'"/>\');</script>');
            }

            if($beanFramework->source_reference_field_rule=='TEXT'){
                $current_source_reference = isset($this->bean->asset_source)?($this->bean->asset_source):"";
                $current_source_reference_id=isset($this->bean->asset_source_id)?$this->bean->asset_source_id:"";
                $current_source_reference_desc=isset($this->bean->asset_source_ref)?$this->bean->asset_source_ref:"";
                echo ('<script>$("#asset_source").parent().html(\'<input type="hidden" name="asset_source" id="asset_source" value="'.$current_source_reference.'"/><input type="hidden" name="asset_source_id" id="asset_source_id" value="'.$current_source_reference_id.'"/><input type="text" name="asset_source_ref" id="asset_source_ref" value="'.$current_source_reference_desc.'"/>\');</script>');
            }

        }
      }


}
