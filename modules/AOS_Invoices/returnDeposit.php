<?php
//Add by tangqi 20170224
	if (!defined('sugarEntry') || !sugarEntry)
		die('Not A Valid Entry Point');
	global $db,$timedate;
	$record=$_POST['record'];
	$bean=BeanFactory::getBean('AOS_Invoices', $record);
	$bean->return_deposit_date_c=$timedate->nowDb();
	$bean->status='Returned';
	$bean->save();//默认成功
	echo "1";
?>