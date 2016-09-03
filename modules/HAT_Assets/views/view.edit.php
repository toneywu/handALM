<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAT_AssetsViewEdit extends ViewEdit
{

	function Display() {

        //本函数完成以下事项
        //1、初始化Framework
        //2、初始化GIS信息
        //3、加载基于AOS_Products的动态界面模板（FF）
        //4、正常Display
        //5、处理Framework中的相关字段
        //6、基于FF判断是否展开界面

        //1、初始化Framework
        if (empty($this->bean->hat_framework_id)) {
            //从Session加载Business Framework字段的值
            //如果没有记录的framework(多半是因为正在处于新增记录)就从Session中加载默认的业务框架，如果当前Session还没有值，就跳转到业务框架的选择界面，选择后返回
            if (empty($_SESSION["current_framework"])) {
                    //如果当前没有Sersion就直接跳转选Business Framework
                    //注意在Sugar中无法直接用php标准的header进行跳转，用以下方法
                    //ref:https://developer.sugarcrm.com/2013/01/18/redirecting-to-another-page-inside-a-php-script-in-sugar/
                    $queryParams = array(
                        'module' => 'HAA_Frameworks',
                        'action' => 'orgSelector',
                        'return_module'=>'HAT_Assets',
                        'return_action'=>'EditView',
                        /*'record' => $recordId,*/
                    );
                    SugarApplication::redirect('index.php?' . http_build_query($queryParams));
                    //这里的逻辑是因数只有新增时才会找不到业务框架，所以返回时只要返回对应的模块即可，不需要有对应的记录ID
            } else {
                //从Session加载Business Framework字段的值
                $beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
                //注意这个$beanFramework对象在DISPLAY之后还要被调用，以用于按照Framework中的规则去限定页面上的字段
                if(isset($beanFramework)) {
                    $this->bean->hat_framework_id = $_SESSION["current_framework"];
                    $this->bean->framework = $beanFramework->name;
                }
            }
        } else {
            $beanFramework = BeanFactory::getBean('HAA_Frameworks', $this->bean->haa_frameworks_id_c);
            //如果已经有framework在记录中，则直接加载
            //注意这个$beanFramework对象在DISPLAY之后还要被调用，以用于按照Framework中的规则去限定页面上的字段
        }
        //当前字段由Relate类型变为只读，不可修改
        $html ='<input type="hidden" name="hat_framework_id" value="'.$this->bean->hat_framework_id .'"><input type="hidden" name="framework" value="'.$this->bean->framework .'">'. $this->bean->framework;
        $this->ss->assign('FRAMEWORK',$html);

        //2、初始化GIS信息
        ////关联地图图层
        if(!$this->bean->use_location_gis){
            $this->bean->map_type = $this->bean->asset_map_type;
            $this->bean->map_lat = $this->bean->asset_map_lat;
            $this->bean->map_lng = $this->bean->asset_map_lng;
            $this->bean->map_zoom = $this->bean->asset_map_zoom;
            $this->bean->map_marker_type = $this->bean->asset_map_marker_type;
            $this->bean->map_marker_data = $this->bean->asset_map_marker_data;
            $this->bean->map_layer_id = $this->bean->asset_map_layer_id;
        }


		if(isset($this->bean->aos_products_id) && ($this->bean->aos_products_id)!=""){
            //判断是否已经设置有产品，如果有产品，则进一步的加载产品对应的FlexForm

			$aos_products_id = $this->bean->aos_products_id;
			$bean_product = BeanFactory::getBean('AOS_Products',$aos_products_id);

			$ff_id = $bean_product->haa_ff_id_c;
			echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="'.$ff_id.'">';
            //如果分类有对应的FlexForm，些建立一个对象去存储FF_ID
            //需要注意的是在Metadata中是不包括这个ID的，如果这里没有加载则在后续的JS文件中加载


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
        }

	    //如果已经选择产品，无论是否产品对应的FlexForm有值，值将界面展开。
	    //（如果没有产品，则界面保持折叠状态。）
		if(isset($this->bean->aos_products_id) && ($this->bean->aos_products_id)!=""){
            echo '<script>$(".collapsed").switchClass("collapsed","expanded");</script>';
         } else {
            echo '<script>$(".expanded").switchClass("expanded","collapsed");</script>';
         }
            /******************************
            我们尝试使用以下语句在Display之前进行Panel属性的变更，但无法生效。属性变更了，依然还是会展开，所有采用JS的方式在加载后进行批量处理。
			可以尝试在TPL模板中进行优化。目前可以实现功能，但打开数据时会有先展开但收缩的过程
			foreach($this->ev->defs['templateMeta']['tabDefs'] as $tab_key => $tab_field ) {
                	$this->ev->defs['templateMeta']['tabDefs'][$tab_key]['panelDefault']='expanded';
            }
            foreach($this->ev->defs['templateMeta']['tabDefs'] as $tab_obj ) {
                	echo $tab_obj['panelDefault'].'</br>';
                }
			//END：与FF相关的内容说明****************************************************
                */


    }

}//end class
