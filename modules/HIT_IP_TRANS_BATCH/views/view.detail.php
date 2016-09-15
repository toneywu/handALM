<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once ('include/MVC/View/views/view.detail.php');

class HIT_IP_TRANS_BATCHViewDetail extends ViewDetail {

	function Display() {
		//下一道工序的获取
		if (isset ($_REQUEST['record']) && $_REQUEST['record'] != "") {
			$bean_batch = BeanFactory :: getBean('HIT_IP_TRANS_BATCH', $_REQUEST['record']);
			$contact_id = $bean_batch->account_id;
			//echo $contact_id;
			if ($contact_id != null) {
				$contact_bean = BeanFactory :: getBean('Contacts')->retrieve_by_string_fields(array (
					'id' => $contact_id
				));

			}
		}
		if (!empty ($this->bean->account_id)) {
			$contact_id = $this->bean->account_id;
			if (!empty ($contact_id)) {
				$contact_bean = BeanFactory :: getBean('Contacts')->retrieve_by_string_fields(array (
					'id' => $contact_id
				));

				$sea = new SugarEmailAddress;
				$primary = $sea->getPrimaryAddress($contact_bean);
				$this->bean->email = $primary;
			}
		}

		parent :: Display();

	}

}
?>