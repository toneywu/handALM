<?php

require_once('include/MVC/View/views/view.list.php');
require_once('modules/Accounts/AccountsListViewSmarty.php');

class AccountsViewList extends ViewList
{
    /**
     * @see ViewList::preDisplay()
     */
    public function preDisplay(){
    	require_once('modules/AOS_PDF_Templates/formLetter.php');
    	formLetter::LVPopupHtml('Accounts');
    	parent::preDisplay();

    	$this->lv = new AccountsListViewSmarty();
    }
    /*
 *  重写方法，添加where条件
 */
    function processSearchForm(){
    	parent::processSearchForm();

    	$haa_frameworks_id=$_SESSION["current_framework"];
    	if ($this->where) {
    		$this->where.=" and haa_frameworks_id_c='".$haa_frameworks_id."'";
    	}else{
    		$this->where="haa_frameworks_id_c='".$haa_frameworks_id."'";
    	}
    }

}
