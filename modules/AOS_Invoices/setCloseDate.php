<?php
//Add by zengchen 20161219
	if (!defined('sugarEntry') || !sugarEntry)
		die('Not A Valid Entry Point');
	global $db,$timedate;
	$record=$_POST['record'];
	$bean=BeanFactory::getBean('AOS_Invoices', $record);
	$bean->closed_date_c=$timedate->nowDb();
	$bean->save();//默认成功
	echo "1";
?>