<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAT_AssetsViewEdit extends ViewEdit
{

	function Display() {

        require_once('modules/HAA_FF/ff_include_editview.php');
        initEditViewByFF((!empty($this->bean->aos_products_id))?$this->bean->aos_products_id:"",'AOS_Products');

		parent::Display();

	    //如果已经选择产品，无论是否产品对应的FlexForm有值，值将界面展开。
	    //（如果没有产品，则界面保持折叠状态。）
        require_once('modules/HAA_FF/ff_include_editview.php');
        initEditViewByFF((!empty($this->bean->aos_products_id))?$this->bean->aos_products_id:"");

/*		if(isset($this->bean->aos_products_id) && ($this->bean->aos_products_id)!=""){
                	echo '<script>$(".collapsed").switchClass("collapsed","expanded");</script>';
         } else {
            	echo '<script>$(".expanded").switchClass("expanded","collapsed");</script>';
         }
*//******************************
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
