<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

require_once ('include/MVC/View/views/view.detail.php');

class HIT_IP_TRANS_BATCHViewDetail extends ViewDetail {

	function Display() {
		 global $db;
        global $current_user;
		//0.处理头与行的语言包
		$modules = array (
			'HIT_IP_TRANS_BATCH',
			'HIT_IP_TRANS',

			
		);
		foreach ($modules as $module) {
			if (!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js')) {
				require_once 'include/language/jsLanguage.php';
				jsLanguage :: createModuleStringsCache($module, $GLOBALS['current_language']);
			}
			echo '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['js_version_key'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';
		};
		
		//下一道工序的获取
		if (isset ($_REQUEST['record']) && $_REQUEST['record'] != "") {
			$bean_batch = BeanFactory :: getBean('HIT_IP_TRANS_BATCH', $_REQUEST['record']);
			$contact_id = $bean_batch->account_id;
			//echo $contact_id;
			if ($contact_id != null) {
				$contact_bean = BeanFactory :: getBean('Contacts')->retrieve_by_string_fields(array (
					'id' => $contact_id
				));

			}
		}
		if (!empty ($this->bean->account_id)) {
			$contact_id = $this->bean->account_id;
			if (!empty ($contact_id)) {
				$contact_bean = BeanFactory :: getBean('Contacts')->retrieve_by_string_fields(array (
					'id' => $contact_id
				));

				$sea = new SugarEmailAddress;
				$primary = $sea->getPrimaryAddress($contact_bean);
				$this->bean->email = $primary;
			}
		}

		if(isset($_REQUEST["woop_id"])){
			echo '<script>var hideButtonFlag="Y";</script>';
		}

		parent :: Display();
		//ff 在DetailView显示之前中进行初始化数据的加载 
		if (isset ($this->bean->hat_eventtype_id) && ($this->bean->hat_eventtype_id) != "") {
			$event_type_id = $this->bean->hat_eventtype_id;
			$bean_code = BeanFactory :: getBean('HAT_EventType', $event_type_id);
			$ff_id = $bean_code->haa_ff_id;

			if (isset ($ff_id) && $ff_id != "") {
				echo '<script src="modules/HAA_FF/ff_include.js"></script>';
				echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="' . $ff_id . '">';
				echo '<script> function call_ff() {
								    triger_setFF($("#haa_ff_id").val(),"HIT_IP_TRANS_BATCH","DetailView");
								    $("a.collapsed").click();
								}</script>';
				echo '<script>call_ff()</script>';
			}

			//Modefy by osmond.liu 20161118
     $aos_pdf_templates_id = $bean_code->aos_pdf_templates_id;
     $sql = "select id,name from aos_pdf_templates where type='HIT_IP_TRANS_BATCH' and deleted=0";
     $list=$db->query($sql);
     $option='';
     while ($row = $db->fetchByAssoc($list)){
        if ($aos_pdf_templates_id!=''&&$row['id']==$aos_pdf_templates_id){
            $option.="<option value=".$row['id']." selected>".$row['name']."</option>";
        }else{
            $option.="<option value=".$row['id'].">".$row['name']."</option>";
        }
        if ($aos_pdf_templates_id==''){
            $aos_pdf_templates_id=$row['id'];
        }
    }
    echo "<input type='hidden' id='pdftemplatehidden' name='pdftemplatehidden' value='".$option."'/>";
        //END Modefy osmond.liu 20161110
    echo '<script>var template_id="'.$aos_pdf_templates_id.'"</script>';
		}

	}

}
?>