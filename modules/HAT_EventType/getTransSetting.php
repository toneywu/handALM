<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');


if(empty($_REQUEST['id'])) {
	  die('Not A Valid ID');
}


global $db;
$txt_jason ='';


  $beanObj = BeanFactory::getBean('HAT_EventType',$_REQUEST['id']);
   //注意这个$beanFramework对象在DISPLAY之后还要被调用，以用于按照Framework中的规则去限定页面上的字段
	if(isset($beanObj)) {
		foreach (($beanObj->field_name_map) as $key) {

			if ($key['name']!='id' && $key['name']!='name' && $key['name']!='date_entered' && $key['name']!='date_modified' && $key['name']!='modified_user_id'
				&& $key['name']!='modified_by_name' && $key['name']!='created_by' && $key['name']!='created_by_name' && $key['name']!='description'
				&& $key['name']!='deleted' && $key['name']!='created_by_link' && $key['name']!='modified_user_link' && $key['name']!='assigned_user_id'
				&& $key['name']!='assigned_user_name' && $key['name']!='assigned_user_link' && $key['name']!='SecurityGroups' && $key['name']!='basic_type')
				$txt_jason .= '"'.$key['name'].'":"'. $beanObj->$key['name'].'",';
		};

	}

$txt_jason=substr($txt_jason,0,strlen($txt_jason)-1);
$txt_jason='{'.$txt_jason.'}';
echo($txt_jason);

exit();

?>