<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class HAA_SSOSetsViewList extends ViewList
{
    function processSearchForm()
    {
        parent::processSearchForm();
        $haa_frameworks_id=$_SESSION["current_framework"];
        if ($this->where) { 
          $this->where.=" AND haa_frameworks_id_c ='".$haa_frameworks_id."'";
        }else{
         $this->where.=" haa_frameworks_id_c ='".$haa_frameworks_id."'";
       }
    }
}