<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class HAT_Asset_Trans_BatchViewDetail extends ViewDetail
{

    function Display() {

        global $db;
        global $current_user;

        //0.处理头与行的语言包
        $modules = array('HAT_Asset_Trans', 'HAT_Asset_Trans_Batch','HAT_Assets'
        );

        foreach ($modules as $module) {
            if (!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js')) {
                require_once 'include/language/jsLanguage.php';
                jsLanguage::createModuleStringsCache($module, $GLOBALS['current_language']);
            }
            echo '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['js_version_key'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';
        };

		//echo '<script src="modules/HIT_IP_TRANS_BATCH/js/html_dom_required_setting.js"></script>';

		if(isset($_REQUEST["woop_id"])){
			echo '<script>var hideButtonFlag="Y";</script>';
		}

        parent::Display();


        //ff 在DetailView显示之前中进行初始化数据的加载
		if (isset ($this->bean->hat_eventtype_id) && ($this->bean->hat_eventtype_id) != "") {

			$event_type_id = $this->bean->hat_eventtype_id;
			$bean_code = BeanFactory :: getBean('HAT_EventType', $event_type_id);
			$ff_id = $bean_code->haa_ff_id;

			if (isset ($ff_id) && $ff_id != "") {
				echo '<script src="modules/HAA_FF/ff_include.js"></script>';
				echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
				echo '<script> function call_ff() {
				    triger_setFF($("#haa_ff_id").val(),"HAM_SR","DetailView");
				    $(".expandLink").click();

				}</script>';
				echo '<script>call_ff()</script>';
			}
            echo $bean_code->name;
            echo '<script>var template_id="'.$bean_code->aos_pdf_templates_id.'"</script>';
        }

    }
}