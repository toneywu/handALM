<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once ('include/MVC/View/views/view.detail.php');

class HAM_WOViewDetail extends ViewDetail {

	function Display() {

		//֮ǰ������������ݣ��ڴ˲�����ʾ
		/*echo "ViewDetail";
		foreach ($this->bean as $key => $value) {
		    echo '</br>'.$key;
		}*/
		parent :: Display(); //���ø��෽��

	}

	

}