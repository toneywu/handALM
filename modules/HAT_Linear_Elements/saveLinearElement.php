<?php
	$parent_asset_id = $_REQUEST["parent_asset_id"];
	$name = $_REQUEST["name"];
	$description = $_REQUEST["description"];
	$beanObj = BeanFactory::newBean('HAT_Linear_Elements');
	$beanObj->parent_asset_id = $parent_asset_id;
	$beanObj->name = $name;
	$beanObj->description = $description;
	$beanObj->save();
?>