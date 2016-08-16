<?php

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/HAA_UOM_Classes/HAA_UOM_Classes_sugar.php');
class HAA_UOM_Classes extends HAA_UOM_Classes_sugar {
	
	function __construct(){
		parent::__construct();
	}

	function save($check_notify=false){

		//在完成写入前，先创建或更新Base UOM
	    if($_POST['base_unit_id']=="0"||$_POST['base_unit_id']=="") {
	    	//创建一个新的Base UOM
	    	$uom_bean = BeanFactory::getBean('HAA_UOM');
	    	//$uom_bean->id = create_guid();
	    } else {
	    	//更新已有的Base UOM
	    	$uom_bean = BeanFactory::getBean('HAA_UOM') -> retrieve_by_string_fields(array('id'=>$_POST['base_unit_id']));
	    }
		if ($_POST['record']=="") { //如果是新的Class，则没有ID，则进一步预分配ID
			$_POST['record'] = create_guid();
			$this->id = $_POST['record'];
			$this->new_with_id = true;
		}

		$uom_bean->uom_code = trim($_POST['base_unit_code']);
		$uom_bean->uom_symbol = trim($_POST['base_unit_symbol']);
		$uom_bean->name = trim($_POST['base_unit_name']);
		$uom_bean->conversion = 1;
		$uom_bean->haa_uom_classes_id = $_POST['record'];
		

		if(!$uom_bean->ACLAccess('Save')){//确认访问权限
		    ACLController::displayNoAccess(true);
		    sugar_cleanup(true);
		}
		$uom_bean->save();
		//$GLOBALS['log']->error("related uom id = ".$uom_bean->id);

		//在Base UOM创建完成之后，继续创建当前的Class
		$this->base_unit_id = $uom_bean->id;
		parent::save($check_notify);
		
		
    }

}
?>