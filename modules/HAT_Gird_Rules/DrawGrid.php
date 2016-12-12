<?php
/**********************************************************
* 这是一个PHP文件，可以被其他文件进行调用
**********************************************************
*输入参数1项：
*		location_id，通过$_REQUEST['location_id']获取，指向一个GridRuld指向的Location_ID对应的房间
*输出结果
*	本页面的输出结果为HTML结果，以表格的形式完成Gird的分布
/**********************************************************/
//测试示例：
//index.php?module=HAT_Gird_Rules&action=DrawGrid&location_id=ba004a74-f938-fde3-eda2-5833e5883851


	echo '这是一个简单的参考，请参考上面的注释完成具体的内容';
	echo '本页面的输出结果为HTML结果，以表格的形式完成Gird的分布'."<br/>";

	global $app_list_strings, $timedate, $db;
	$location_id = $_REQUEST['location_id'];

	//这是一个简单的示例，说明了如何写入参数，以及如何通过SQL取数据
	$sel = "SELECT * FROM hat_asset_locations WHERE hat_asset_locations.deleted=0 and hat_asset_locations.id='".$location_id."'";
	$beanSEL = $db->query($sel);

    while ( $result = $db->fetchByAssoc($beanSEL) ) {
    	if (!empty ($result['name'])) {
			echo '当前位置为: <strong>'.$result['name'].'</strong>';
    	}
	}

	echo '<table>';
	//你需要在这里完成这个表格，把当前ID的下一层做为机柜行。下一层的子资产做为每个点
	echo '</table>';

?>

HTML end