<?php

require_once('include/MVC/View/views/view.list.php');

class HAA_InterfacesViewList extends ViewList
{

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
