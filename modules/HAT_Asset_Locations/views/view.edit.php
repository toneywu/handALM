<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAT_Asset_LocationsViewEdit extends ViewEdit
{

    function display(){

        //本函数完成以下事项
        //1、初始化Framework-Site信息
        //3、加载基于code_asset_location_type_id的动态界面模板（FF）
        //4、正常Display
        //5、基于FF判断是否展开界面

        //1、初始化Framework
        if (empty($this->bean->ham_maint_sites_id)) {
            //如果没有记录的framework(多半是因为正在处于新增记录)就从Session中加载默认的业务框架，如果当前Session还没有值，就跳转到业务框架的选择界面，选择后返回
            if (empty($_SESSION["current_framework"])) {
                    //如果当前没有Sersion就直接跳转选Business Framework
                    //注意在Sugar中无法直接用php标准的header进行跳转，用以下方法
                    //ref:https://developer.sugarcrm.com/2013/01/18/redirecting-to-another-page-inside-a-php-script-in-sugar/
                    $queryParams = array(
                        'module' => 'HAA_Frameworks',
                        'action' => 'orgSelector',
                        'return_module'=> $this->module,
                        'return_action'=>$this->action,
                        /*'record' => $recordId,*/
                    );
                    SugarApplication::redirect('index.php?' . http_build_query($queryParams));
                    //这里的逻辑是因数只有新增时才会找不到业务框架，所以返回时只要返回对应的模块即可，不需要有对应的记录ID
            } else {
                //从Session加载Business Framework字段的值
                $beanSite = BeanFactory::getBean('HAM_Maint_Sites');
                $beanSiteList = $beanSite ->get_full_list('name',"ham_maint_sites.haa_frameworks_id='".$_SESSION["current_framework"]."'");

                $html = '';
                if(! isset($beanSiteList)) {
                    $beanSiteList = array();
                    $html = "ERROR: Site list not found";
                }

                $this->bean->ham_maint_sites_id=empty($_SESSION['current_site'])?"":$_SESSION['current_site'];

                $html = "<select id='site_select' name='site_select'>";

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
        } //注意，因为没有Site上的参数要读取，所以如果已经有了site信息（也就是非新增模式）就不再加载$beanSite这个对象

        $html .='<input type="hidden" name="ham_maint_sites_id" id="ham_maint_sites_id" value="'.$this->bean->ham_maint_sites_id .'">';
        $html .='<script>$("#site_select").change(function(){$("#ham_maint_sites_id").val($(this).val())})</script>';
        $this->ss->assign('MAINT_SITE',$html);
        //1-END


        if(isset($this->bean->code_asset_location_type_id) && ($this->bean->code_asset_location_type_id)!=""){
            //判断是否已经设置有位置分类，如果有分类，则进一步的加载分类对应的FlexForm
            //判断是否已经设置有位置分类，如果有分类，则进一步的加载分类对应的FlexForm
            $location_type_id = $this->bean->code_asset_location_type_id;
            $bean_code = BeanFactory::getBean('HAA_Codes',$location_type_id);
            if (isset($bean_code->haa_ff_id)) {
                $ff_id = $bean_code->haa_ff_id;
            }
            if (isset($ff_id) && $ff_id!="") { 
                //如果分类有对应的FlexForm，些建立一个对象去存储FF_ID
                //需要注意的是在Metadata中是不包括这个ID的，如果这里没有加载则在后续的JS文件中加载
                echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="'.$ff_id.'">';
            }
        }
        parent::display();


        //如果已经选择位置分类，无论是否位置分类对应的FlexForm有值，值将界面展开。
        //（如果没有位置分类，则界面保持折叠状态。）
        if(isset($this->bean->code_asset_location_type_id) && ($this->bean->code_asset_location_type_id)!=""){
                    echo '<script>$(".collapsed").switchClass("collapsed","expanded");</script>';
         } else {
                echo '<script>$(".expanded").switchClass("expanded","collapsed");</script>';
         }
    }

}

