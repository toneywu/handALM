<?php
//显示一个orgSlector的组织选择器。
//如在定义资产时，如果资产无法找到已经确定的Business Framework，就会跳转到这个页面，显示对应的选择器，选择后，点击按钮回到之前的页面中。
//js\orgSelector.js
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

function set_framework_selector($bean_framework_id,$current_module,$current_action,$vardef_framework_id_name = 'haa_frameworks_id') {
//一般情况下是$this->bean->hat_framework_id或$this->bean->hat_framework_id_c
    $html = '';
     if (empty($bean_framework_id)) {
            //从Session加载Business Framework字段的值
            //如果没有记录的framework(多半是因为正在处于新增记录)就从Session中加载默认的业务框架，如果当前Session还没有值，就跳转到业务框架的选择界面，选择后返回
            if (empty($_SESSION["current_framework"])) {
                    //如果当前没有Sersion就直接跳转选Business Framework
                    //注意在Sugar中无法直接用php标准的header进行跳转，用以下方法
                    //ref:https://developer.sugarcrm.com/2013/01/18/redirecting-to-another-page-inside-a-php-script-in-sugar/
                    $queryParams = array(
                        'module' => 'HAA_Frameworks',
                        'action' => 'orgSelector',
                        'return_module'=>'HAT_Assets',
                        'return_action'=>'EditView',
                        /*'record' => $recordId,*/
                    );
                    SugarApplication::redirect('index.php?' . http_build_query($queryParams));
                    //这里的逻辑是因数只有新增时才会找不到业务框架，所以返回时只要返回对应的模块即可，不需要有对应的记录ID
            } else {
                //从Session加载Business Framework字段的值
                $beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
                //注意这个$beanFramework对象在DISPLAY之后还要被调用，以用于按照Framework中的规则去限定页面上的字段
                if(isset($beanFramework)) {
                    $bean_framework_id = $_SESSION["current_framework"];
                    $bean_framework_name = $beanFramework->name;
                }
            }
        } else {
            $beanFramework = BeanFactory::getBean('HAA_Frameworks', $bean_framework_id);
            $bean_framework_name = $beanFramework->name;
            //如果已经有framework在记录中，则直接加载
        }
        //当前字段由Relate类型变为只读，不可修改
        $html ='<input type="hidden" name="'.$vardef_framework_id_name.'" id="'.$vardef_framework_id_name.'" value="'.$bean_framework_id .'"><input type="hidden" name="haa_framework" id="haa_framework" value="'.$bean_framework_name .'">'. $bean_framework_name;
        return $html;
}

function set_site_selector($bean_site_id,$current_module,$current_action,$vardef_site_id_name = 'ham_maint_sites_id') {
    //bean_site_id 当前Bean中的SiteID值
    //current_module 当前模块（返回用）
    //current_action 当前动作（同上）
    //vardef_site_id_name 当前vardef_site_id名称
    $html = '';
     if (empty($bean_site_id)) {
            //如果没有记录的framework(多半是因为正在处于新增记录)就从Session中加载默认的业务框架，如果当前Session还没有值，就跳转到业务框架的选择界面，选择后返回
            if (empty($_SESSION["current_framework"])) {
                    //如果当前没有Sersion就直接跳转选Business Framework
                    //注意在Sugar中无法直接用php标准的header进行跳转，用以下方法
                    //ref:https://developer.sugarcrm.com/2013/01/18/redirecting-to-another-page-inside-a-php-script-in-sugar/
                    $queryParams = array(
                        'module' => 'HAA_Frameworks',
                        'action' => 'orgSelector',
                        'return_module'=> $current_module,
                        'return_action'=> $current_action,
                        /*'record' => $recordId,*/
                    );
                    SugarApplication::redirect('index.php?' . http_build_query($queryParams));
                    //这里的逻辑是因数只有新增时才会找不到业务框架，所以返回时只要返回对应的模块即可，不需要有对应的记录ID
            } else {
                //从Session加载Business Framework字段的值
                $beanSite = BeanFactory::getBean('HAM_Maint_Sites');
                $beanSiteList = $beanSite ->get_full_list('name',"ham_maint_sites.haa_frameworks_id='".$_SESSION["current_framework"]."'");

                if(! isset($beanSiteList)) {
                    $beanSiteList = array();
                    $html = "ERROR: Site list not found";
                }

                $bean_site_id=empty($_SESSION['current_site'])?"":$_SESSION['current_site'];

                $html = "<select id='site_select' name='site_select'>";
                $html .= "<option value=''></option>";
                for($i=0; $i<count($beanSiteList); $i++) {
                    $the_site = $beanSiteList[$i];
                    if ($_SESSION['current_site']==$the_site->id) {
                        $html .= "<option value='".$the_site->id."' selected='selected'>".$the_site->name."</option>";
                    } else {
                        $html .= "<option value='".$the_site->id."'>".$the_site->name."</option>";
                    }
                    if($the_site->id = $_SESSION['current_site']) {
                        //TODO
                    }

                }
                $html .="</select>";

            }
            $html .='<input type="hidden" name="'.$vardef_site_id_name.'" id="'.$vardef_site_id_name.'" value="'.$bean_site_id .'">';
            $html .='<script>$("#site_select").change(function(){$("#'.$vardef_site_id_name.'").val($(this).val())})</script>';
        } else {
            $beanSite = BeanFactory::getBean('HAM_Maint_Sites',$bean_site_id);
            $html .='<input type="hidden" name="'.$vardef_site_id_name.'" id="'.$vardef_site_id_name.'" value="'.$bean_site_id .'">';
            $html .=$beanSite->name;
			if($current_module=="HAM_WO"&&$current_action=="EditView"){
				$html="";

				//add by yuan.chen 2016-12-16
				//从Session加载Business Framework字段的值
                $beanSite = BeanFactory::getBean('HAM_Maint_Sites');
                $beanSiteList = $beanSite ->get_full_list('name',"ham_maint_sites.haa_frameworks_id='".$_SESSION["current_framework"]."'");
                if(! isset($beanSiteList)) {
                    $beanSiteList = array();
                    $html = "ERROR: Site list not found";
                }
                $html = "<select id='site_select' name='site_select'>";

                for($i=0; $i<count($beanSiteList); $i++) {
                    $the_site = $beanSiteList[$i];
                    if ($bean_site_id==$the_site->id) {
                        $html .= "<option value='".$the_site->id."' selected='selected'>".$the_site->name."</option>";
                    } else {
                        $html .= "<option value='".$the_site->id."'>".$the_site->name."</option>";
                    }
                    if($the_site->id = $_SESSION['current_site']) {
                        //TODO
                    }

                }
                $html .="</select>";
				$html .='<input type="hidden" name="'.$vardef_site_id_name.'" id="'.$vardef_site_id_name.'" value="'.$bean_site_id .'">';
                $html .='<script>$("#site_select").change(function(){$("#'.$vardef_site_id_name.'").val($(this).val())})</script>';
				//end
			}
        }

        return $html;
}
