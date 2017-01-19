<?php

$config_url=$_POST['config_url'];

//require_once('modules/HAOS_SSOSets/addConfigFromSSO.php');
//require_once('include/utils/sugar_file_utils.php');
//$bean_sso = BeanFactory::getBean('HAA_SSOSets',$id);
//$http_referer_url = $bean_sso->http_referer_url;
//$http_referer_url=addConfigFromSSO($Id);
if ($config_url != '') {

	//加载config_override.php,因为里面的内容全是数组,所以下面可以直接用该php里的数组
	require_once('config_override.php');

	//判断数组里是否已经存在
	if(is_array($sugar_config['http_referer']['list'])&&in_array($config_url, $sugar_config['http_referer']['list'])){
		echo "0";
	}else{
		/*sugar_file_utils.php中有写数组到file里的方法sugar_file_put_contents,该方法调用了php中自带的file_put_contents,只是比这个方法多了一个日志打印*/
		require_once('include/utils/sugar_file_utils.php');
		$arr_content="\n\$sugar_config['http_referer']['list'][]='".$config_url."';";

		//最后一个参数加上之后表示只是追加,不会覆盖以前的内容
		sugar_file_put_contents("config_override.php",$arr_content,FILE_APPEND);
		echo "1";
	}
}else{
	echo "0";
}
?>
