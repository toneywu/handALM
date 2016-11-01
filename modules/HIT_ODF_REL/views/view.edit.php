<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
require_once ('include/MVC/View/views/view.detail.php');
class HIT_ODF_RELViewEdit extends ViewEdit {
	function Display() {
		global $db;
		global $current_user,$mod_strings;
		
		$wo_num_html="";
		if(empty($this->bean->jump_number)){
			//如果当前工作单号为空，则返回自动编号标签
			$wo_num_html=$mod_strings['LBL_AUTONUM'].'<input type="hidden" value="" id="jump_number" name="jump_number">';
		} else {
			$wo_num_html=$this->bean->jump_number.'<input type="hidden" value="'.$this->bean->jump_number.'" id="jump_number" name="jump_number">';
		}
		$this->ss->assign('JUMP_NUMBER',$wo_num_html);
		
		
		parent :: Display();
	}
}