<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/** @var AuthenticationController $authController */
/**通过ssoCode从模块HAA_SSOSets中获取到如下信息：
 *	certificate_key：凭证关键字，用来指定单点登录的凭证用户关键字
 */
$ssoCode=$_GET['ssoCode'];
$module=isset($_GET['module'])?$_GET['module']:"Home";//默认为登录首页
$action=isset($_GET['action'])?$_GET['action']:"index";
global $db,$mod_strings,$sugar_config;
$user_sql="SELECT hs.id,hs.sso_url,hs.certificate_key,hs.default_login_url FROM haa_ssosets hs WHERE hs.sso_code='".$ssoCode."' AND hs.deleted=0";
$user_result=$db->query($user_sql);
$user_row=$db->fetchByAssoc($user_result);
$set_config=array(
	"language"=>"zh_CN",
	"sso_url"=>$user_row["sso_url"],
	"default_login_url"=>$user_row["default_login_url"],
	"default_module"=>$module,
	"default_action"=>strtolower($action),
	"user_name"=>$user_row["certificate_key"],
);
if (isset($_SERVER[$set_config["user_name"]])&&$_SERVER[$set_config["user_name"]]!="") {
	$user_name=$set_config["user_name"];
	$sso_url=$set_config["sso_url"];
	$sql="select count(*) user,id,user_hash from users where user_name='".$user_name."' and status='Active' and employee_status='Active'";
	$result=$db->query($sql);
	$res=$db->fetchByAssoc($result);
	if ($res['user']==1) {
		$set_config['user_id']=$res['id'];
		$set_config['ssoset_id']=$user_row['id'];
		session_start();
		$_SESSION['authenticated_user_id']=$res['id'];
		$user_pwd=time().mt_rand();
		$user_hash=crypt(strtolower(MD5($user_pwd)));
		$pre_sql="update users set user_hash='".$user_hash."' where user_name='".$user_name."' and status='Active' and employee_status='Active' and deleted=0";
		$result=$db->query($pre_sql);
 		$_SESSION['unique_key'] = $sugar_config['unique_key'];
 		$_REQUEST['login_language']=$set_config["language"];
 		$_REQUEST['Login']='Log In';
 		$_REQUEST["sugar_user_theme"]=$sugar_config['default_theme'];
 		$_REQUEST["ck_login_language_20"]= $set_config["language"];
 		$_REQUEST["ck_login_id_20"]= $res['id'];
 		$_REQUEST['default_user_name']=$user_name;
 		$_SESSION['login_password']=MD5($user_pwd);
 		$timeout=time()+$sugar_config['jobs']['timeout'];
 		SugarApplication::setCookie('logout_url',$sso_url,$timeout,'/');
 		login_api($user_name,$user_pwd,$set_config);
		$after_sql="update users set user_hash='".$res['user_hash']."' where user_name='".$user_name."' and status='Active' and employee_status='Active'";
		$db->query($after_sql);
	}
}else{
	header($sso_url);
	exit();
}

function login_api($user_name,$password,$set_config){
	if (!defined('SUITE_PHPUNIT_RUNNER')) {
    	session_regenerate_id(false);
	}
	global $mod_strings;
	$login_vars = $GLOBALS['app']->getLoginVars(false);
	require_once("modules/Users/authentication/AuthenticationController.php");
	$authController=new AuthenticationController();
	$authController->login($user_name, $password);
	if(isset($_SESSION['authenticated_user_id'])) {
	    global $db,$current_user,$sugar_config;
	    if(isset($current_user)  && empty($login_vars)) {
	    	if ($set_config["default_login_url"]!="") {
	    		$url=$set_config["default_login_url"];
	    	}else if(!empty($set_config['default_module']) && !empty($set_config['default_action'])) {
	            $url = "index.php?module=".$set_config['default_module']."&action=".$set_config['default_action'];
	        }
	    }
	    //写入日志模块HAA_SSO_Login_Logs 当前用户和当前时间 序号流水
		$sql="INSERT INTO haa_sso_login_logs(id,date_entered,date_modified,modified_user_id,created_by,seq,user_id_c,login_time,haa_ssosets_id_c) SELECT
	'".create_guid()."',NOW(),NOW(),'".$set_config['user_id']."','".$set_config['user_id']."',IFNULL(seq,0) + 1,'".$set_config['user_id']."',NOW(),'".$set_config['ssoset_id']."' FROM (SELECT MAX(seq) seq FROM haa_sso_login_logs WHERE user_id_c = '".$set_config['user_id']."') s";
		$db->query($sql);
	} else {
	    // Login has failed
	    if(!empty($set_config['language'])) {
	        $url ="index.php?module=Users&action=Login&login_language=".$set_config['language'];
	    } else {
	        $url ="index.php?module=Users&action=Login";
	    }
	    if(!empty($login_vars)){
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
}
