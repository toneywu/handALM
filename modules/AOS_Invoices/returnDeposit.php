<?php
//Add by huangqing 20170301
	if (!defined('sugarEntry') || !sugarEntry)
		die('Not A Valid Entry Point');

	global $db;
	$predata = $_POST;
	if($predata['function']=='getInvStatus'){
		$result = getInvStatus($predata['invoice_id']);
		echo json_encode($result);
    }
    if($predata['function']=='returnDeposit'){
    	$result = returnDeposit($predata['invoice_id'],$predata['return_date']);
		echo json_encode($result);
    }


   //获取状态
    function getInvStatus($invid){
    	global $db;
    	$result = array(
  	    		'return_status'=>'S',
  	    		'return_msg'=>'',
  	    		'return_data'=>array(),
  	    		);
  	    $err_msg = '';

    	$bean=BeanFactory::getBean('AOS_Invoices', $invid);
    	$result['return_data']['invStatus'] = $bean->status;
    	$result['return_data']['return_date'] = $bean->return_deposit_date_c;
    	return $result;
    }

     //更改退回状态
     function returnDeposit($invid,$returnDate){
     	global $db;
    	$result = array(
  	    		'return_status'=>'S',
  	    		'return_msg'=>'',
  	    		'return_data'=>array(),
  	    		);
  	    $err_msg = '';
  	   

    	$bean=BeanFactory::getBean('AOS_Invoices', $invid);
    	$bean->return_deposit_date_c=$returnDate;
		$bean->status='Returned';
		$bean->save();
    	return $result;
    }
	
?>