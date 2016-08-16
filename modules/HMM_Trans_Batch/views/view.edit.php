<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HMM_Trans_BatchViewEdit extends ViewEdit
{

    function Display() {

        if(isset($this->bean->id) && $this->bean->id !="") {
            //因为HMM_Trans_Batch被设定为保存后就生效不可以再修改,所以不准许进入修改模式，直接跳转到DetailView
            /*foreach ($_REQUEST as $request_test=>$v){
            echo "$request_test=$v <br />";
            }*/
/*            echo ("Recored cannot be modified, redirecting to DetailView...");
            $back_to_detailview_url = "index.php?module=HMM_Trans_Batch&action=DetailView&offset=".$_REQUEST['offset']."&return_module=".$_REQUEST['return_module']."&record=".$this->bean->id;
            header('Location: '.$back_to_detailview_url);
            exit;*/
        }

        //加载语言包
        $modules = array(
            'HMM_Trans_Batch',
            'HMM_Trans_Lines',
        );
        foreach ($modules as $module) {
            if (!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js')) {
                require_once 'include/language/jsLanguage.php';
                jsLanguage::createModuleStringsCache($module, $GLOBALS['current_language']);
            }
            echo '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['js_version_key'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';
        };
        //初始化数据

        if(isset($this->bean->id) && $this->bean->id !="") {
            //初始化相关数据
            //本部分其它没有用，因为HMM_Trans_Batch被设定为保存后就生效不可以再修改
            //所以不会执行到本部分的代码
            $bean_event_type = BeanFactory::getBean('HAT_EventType',$this->bean->hat_event_type_id);
            $this->bean->trans_basic_type = $bean_event_type->basic_type;
        }

        parent::Display();
    }
}
