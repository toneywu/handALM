<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/** @var AuthenticationController $authController */
/*先从cookies中获取用户名，判断其在本系统中是否存在，
  设置其在本系统中的session以及cookies
  判断其是否登录，未登录则跳转至统一登陆界面登录
 */
global $db,$mod_strings,$sugar_config;
if (isset($_SERVER['HTTP_OAM_REMOTE_USER'])&&$_SERVER['HTTP_OAM_REMOTE_USER']!="") {
	$user_name=$_SERVER['HTTP_OAM_REMOTE_USER'];
	$sql="select count(*) user,id,user_hash from users where user_name='".$user_name."' and status='Active' and employee_status='Active'";
	$result=$db->query($sql);
	$res=$db->fetchByAssoc($result);
	if ($res['user']==1) {
		session_start();
		$_SESSION['authenticated_user_id']=$res['id'];
		$rand_time=time().mt_rand();//时间+随机数作为登陆密码
		$user_hash=crypt(strtolower(MD5($rand_time)));
		$pre_sql="update users set user_hash='".$user_hash."' where user_name='".$user_name."' and status='Active' and employee_status='Active' and deleted=0";
		$result=$db->query($pre_sql);
 		$_SESSION['unique_key'] = $sugar_config['unique_key'];
 		$_REQUEST['login_language']='zh_CN';
 		$_REQUEST['Login']='Log In';
 		$_REQUEST["sugar_user_theme"]="SuiteR_HANDALM";
 		$_REQUEST["ck_login_language_20"]= "zh_CN";
 		$_REQUEST["ck_login_id_20"]= $res['id'];
 		$_REQUEST['default_user_name']=$user_name;
 		$_SESSION['login_password']=MD5($rand_time);
 		//如果是从这里登录的，设置登出地址
		SugarApplication::setCookie('logout_url', 'http://testidm.zzmetro.cn:7777/webcenter/', time()+3600*12, '/');
 		login_api($user_name,$rand_time);
		$after_sql="update users set user_hash='".$res['user_hash']."' where user_name='".$user_name."' and status='Active' and employee_status='Active' and deleted=0";
		$db->query($after_sql);
	}
}else{
	header("Location:http://testidm.zzmetro.cn:7777/webcenter/");
	exit();
}

function login_api($user_name,$password){
	if (!defined('SUITE_PHPUNIT_RUNNER')) {
    	session_regenerate_id(false);
	}
	global $mod_strings;
	$login_vars = $GLOBALS['app']->getLoginVars(false);
	require_once("modules/Users/authentication/AuthenticationController.php");
	$authController=new AuthenticationController();
	$authController->login($user_name, $password);
	// authController will set the authenticated_user_id session variable
	if(isset($_SESSION['authenticated_user_id'])) {
		// Login is successful
	    global $record;
	    global $current_user;
	    global $sugar_config;
	    if(isset($current_user)  && empty($login_vars)) {
	        if(!empty($GLOBALS['sugar_config']['default_module']) && !empty($GLOBALS['sugar_config']['default_action'])) {
	            $url = "index.php?module={$GLOBALS['sugar_config']['default_module']}&action={$GLOBALS['sugar_config']['default_action']}";
	        } else {
	    	    $modListHeader = query_module_access_list($current_user);
	    	    //try to get the user's tabs
	    	    $tempList = $modListHeader;
	    	    $idx = array_shift($tempList);
	    	    if(!empty($modListHeader[$idx])){
	    	    	$url = "index.php?module={$modListHeader[$idx]}&action=index";
	    	    }
	        }
	    } else {
	        $url = $GLOBALS['app']->getLoginRedirect();
	    }
	} else {
	    // Login has failed
	    if(isset($_POST['login_language']) && !empty($_POST['login_language'])) {
	        $url ="index.php?module=Users&action=Login&login_language=". $_POST['login_language'];
	    } else {
	        $url ="index.php?module=Users&action=Login";
	    }

	    if(!empty($login_vars))
	    {
	        $url .= '&' . http_build_query($login_vars);
	    }
	}
	$url = 'Location: '.$url;
	if(!empty($GLOBALS['app'])) {
	    $GLOBALS['app']->headerDisplayed = true;
	}
	if (!defined('SUITE_PHPUNIT_RUNNER')) {
	    sugar_cleanup();
	    header($url);
	}
}')) {
	    sugar_cleanup();
	    header($url);
	}
}