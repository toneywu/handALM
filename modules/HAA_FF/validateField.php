<?

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
//require_once("modules/AOW_WorkFlow/aow_utils.php");

if(empty($_REQUEST['mode']) ) die('invalid mode');
//require_once("modules/AOW_WorkFlow/aow_utils.php");

global $db;
global $mod_strings, $app_strings, $app_list_strings, $dictionary;

$result_bool = 0;

if ($_REQUEST['mode']=='accounthold') {

	$sel = "SELECT accounts_cstm.`credit_hold_c` FROM accounts_cstm WHERE accounts_cstm.`id_c` ='".$_GET['id']."'";
	$beanSEL = $db->query($sel); //无如是Location还是asset来源，都可以显示子资产

	    while ( $result = $db->fetchByAssoc($beanSEL) ) {
	    	if (isset($result['credit_hold_c']) && $result['credit_hold_c']==true){
	    		$result_bool=0;
	    	}else{
	    		$result_bool=1;
	    	}
	    }
}

if ($_REQUEST['mode']=='woaccounthold') {

	$sel = "SELECT accounts_cstm.`credit_hold_c` FROM accounts_cstm,ham_wo,accounts WHERE ham_wo.`account_id` = accounts_cstm.`id_c` AND accounts.id = accounts_cstm.`id_c` AND accounts.`deleted`=0 and ham_wo.id ='".$_GET['id']."'";
	$beanSEL = $db->query($sel); //无如是Location还是asset来源，都可以显示子资产

	    while ( $result = $db->fetchByAssoc($beanSEL) ) {
	    	if (isset($result['credit_hold_c']) && $result['credit_hold_c']==true){
	    		$result_bool=0;
	    	}else{
	    		$result_bool=1;
	    	}
	    }
}



echo $result_bool;


?>
