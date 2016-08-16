<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class CUX_DemoViewEdit extends ViewEdit
{

	function Display() {

		print_r($this->ev->defs); //Array ( ) [_cache_include] => [_cache_including] => ) )
		echo ($this->ev->moduleTitleKey['viewObject']['formName']['defs']['templateMeta']['maxColumns']);
		echo "sting";
/*       foreach($this as $key => $value) {
           print "$key => $value\n";
       }*/
       // [moduleTitleKey] => [viewObject] => [formName] => [defs] 
		parent::Display();

		
	}

}//end class
