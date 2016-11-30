<?php
ini_set('max_execution_time', 180);
echo "hello world";

for ($i = 1; $i <= 70000; $i++) { 
	print date('Y-m-d H:i:s')."[".$i."]</br>";
	$accountBean = BeanFactory::getBean("Accounts","accounts.id='3a484fcd-1884-2a71-0b37-56b600f188f6'");
	$accountBean = BeanFactory::newBean('Accounts'); 
	echo "i = ".$i."<br>";
}