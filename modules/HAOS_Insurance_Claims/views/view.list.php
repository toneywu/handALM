<?php
if(!defined('sugarEntry')||!sugarEntry)die('NotAValidEntryPoint');

require_once('include/MVC/View/views/view.list.php');

class HAOS_Insurance_ClaimsViewList extends ViewList
{
	function processSearchForm()
    {
        parent::processSearchForm();
        $haa_frameworks_id=$_SESSION["current_framework"];
        if ($this->where) { 
          $this->where.=" AND haos_insurance_claims.haa_frameworks_id_c ='".$haa_frameworks_id."'";
        }else{
         $this->where.=" haos_insurance_claims.haa_frameworks_id_c ='".$haa_frameworks_id."'";
       }
    }
}