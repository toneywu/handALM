<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once ('include/MVC/View/views/view.detail.php');

class HAA_QUALViewDetail extends ViewDetail {

	function Display() {
		
		parent :: Display(); 
		
		
		//ff 在DetailView显示之前中进行初始化数据的加载 
		if(isset($this->bean->code_qualification_type_id) && ($this->bean->code_qualification_type_id)!=""){
			$code_qualification_type_id = $this->bean->code_qualification_type_id;
            $bean_codes = BeanFactory::getBean('HAA_Codes',$code_qualification_type_id);

            $ff_id = $bean_codes->haa_ff_id;
            //如果分类有对应的FlexForm，些建立一个对象去存储FF_ID

			if (isset ($ff_id) && $ff_id != "") {
				echo '<script src="modules/HAA_FF/ff_include.js"></script>';
				echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
				echo '<script> function call_ff() {
				    triger_setFF($("#haa_ff_id").val(),"HAA_QUAL","DetailView");
				    $(".expandLink").click();
				 
				}</script>';
				echo '<script>call_ff()</script>';
			}
}


	}

	

}
?>