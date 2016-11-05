<?php

	$contractBean = BeanFactory::getBean("AOS_Contracts","d73e3089-1480-3903-bdc3-57656895cb08");
	
	echo $contractBean->id;
	$contractReversionBean = BeanFactory::getBean("AOS_Contracts_Documents","4acc4957-b461-e70d-62d0-5819993b37ec");
	echo $contractReversionBean->id;
?>