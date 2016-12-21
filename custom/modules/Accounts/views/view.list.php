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

          //增加HPR权限控制逻辑
        require_once('modules/HPR_Group_Priviliges/checkListACL.php');
        global $current_user;
        $current_module = $this->module;
        $current_user_id =$current_user->id;
        $paraArray=array();
        $paraArray[]=$current_user_id;
        $aclSQLList=getListViewSQLStatement($current_module,$current_user_id,$haa_frameworks_id,$paraArray);
        $this->where.=empty($this->where)?(empty($aclSQLList)?"":$aclSQLList):(empty($aclSQLList)?"":'  AND '.$aclSQLList);
    //End HPR权限控制逻辑
    }

}
