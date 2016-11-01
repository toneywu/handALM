<?php
//显示一个orgSlector的组织选择器。
//如在定义资产时，如果资产无法找到已经确定的Business Framework，就会跳转到这个页面，显示对应的选择器，选择后，点击按钮回到之前的页面中。
//js\orgSelector.js
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

if(empty($_REQUEST['return_module']) || empty($_REQUEST['return_action'])) die('Return Module and Return Action cannot be found.');

		//业务框架及地点选择器，如果在首页用户没有确定业务框架，则相关需要业务框架信息的页面，会先调用这个页面，要求用户选择业务框架后，再跳转回原页面中
		global $mod_strings, $app_strings, $app_list_strings;

		$frameworkBean_list = BeanFactory::getBean('HAA_Frameworks')->get_full_list('name'); //Order by name
		$current_message="";
		$framework_field="";

		if (isset($frameworkBean_list)) { //如果当前列表中有值才进行加载
            $current_framework=isset($_SESSION["current_framework"])?$_SESSION["current_framework"]:''; //获取当前的业务框架，如果已经设置，应当为ID
            foreach ($frameworkBean_list as $d) {
                $framework_field .= "<option value='".$d->id."' ".(($current_framework==$d->id)?"selected='selected'":"")." image='".$d->logo_image."'>".$d->name."</option>";
            }
        } else {
            //显示出错信息
            if(ACLController::checkAccess('HAA_Frameworks', 'edit', true)) {
                $current_message = translate('LBL_ERR_NO_BUSINESS_FRAMEWORK_CREATOR','HAA_Frameworks');
            }else{
                $current_message = translate('LBL_ERR_NO_BUSINESS_FRAMEWORK','HAA_Frameworks');
            }
        }

        if ($current_message!="") {
        	echo $current_message;
        } else{
			echo '<div style="padding:5px" >
				<span id="HAA_FrameworkSeletor">'.$app_strings['LBL_FRAMEWORK'].'
				<select id="framework_selector">'
				.$framework_field.
				'</select></span>
				<span id="HAA_SiteSeletor">'.$app_strings['LBL_SITE'].
				'<select id="site_selector">
				</select>
				</span>
				<button id="btn_save" onclick="btn_redirect(\''.$_REQUEST["return_module"].'\',\''.$_REQUEST["return_action"].'\')">'.$app_strings['LBL_SAVE_AND_CONTINUE'].'</button>
			</div>
			<script>
				SUGAR.util.doWhen("typeof $ != \'undefined\'", function(){
					$.getScript("modules/HAA_Frameworks/js/orgSelector.js");
				});
			</script>';
		}


