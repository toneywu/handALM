<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class HAT_Asset_Trans_BatchViewEdit extends ViewEdit
{

    function Display() {

        global $db;
        global $current_user;

        //0.处理头与行的语言包
        $modules = array('HAT_Asset_Trans', 'HAT_Asset_Trans_Batch', 'HAT_Assets'
        );

        foreach ($modules as $module) {
            if (!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js')) {
                require_once 'include/language/jsLanguage.php';
                jsLanguage::createModuleStringsCache($module, $GLOBALS['current_language']);
            }
            echo '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['js_version_key'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';
        };
	

        //1、初始化Framework
        require_once('modules/HAA_Frameworks/orgSelector_class.php');
        $current_framework_id = empty($this->bean->haa_frameworks_id)?"":$this->bean->haa_frameworks_id;
        $current_module = $this->module;
        $current_action = $this->action;
        $this->ss->assign('FRAMEWORK',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_frameworks_id'));

		//2、加载基于code_asset_location_type_id的动态界面模板（FF）
        if(isset($this->bean->hat_eventtype_id) && ($this->bean->hat_eventtype_id)!=""){
            //判断是否已经设置有位置分类，如果有分类，则进一步的加载分类对应的FlexForm
            $event_type_id = $this->bean->hat_eventtype_id;
            $bean_code = BeanFactory::getBean('HAT_EventType',$event_type_id);
            if (isset($bean_code->haa_ff_id)) {
                $ff_id = $bean_code->haa_ff_id;
            }
            if (isset($ff_id) && $ff_id!="") {
                //如果分类有对应的FlexForm，些建立一个对象去存储FF_ID
                //需要注意的是在Metadata中是不包括这个ID的，如果这里没有加载则在后续的JS文件中加载
                echo '<input id="haa_ff_id" name="haa_ff_id" type="hidden" value="'.$ff_id.'">';
            }
        }

        //如果有工序来源，则初始化工序信息
        if (empty($this->bean->id) && !empty($_REQUEST['woop_id'])) {
            //如果当前对象还没有设置工序信息，并且参数中的工序有值，则根据参数中的WOOP对象填写当前处理单上的相关字段
               $sql_current_string ="SELECT
										  ham_wo.`id` wo_id,
										  ham_wo.`name` wo_name,
										  ham_wo.`account_id` source_wo_account_id,
										  accounts2.`name` source_wo_account,
										  ham_wo.`contact_id` source_wo_contact,
										  contacts2.`last_name` source_wo_contact_id,
										  ham_woop.`id` woop_id,
										  ham_woop.`name` woop_name,
										  ham_wo.`wo_number` wo_number,
										  ham_woop.`woop_number` woop_number,
                                          ham_woop.`date_schedualed_finish` ,
                                          ham_woop.`date_target_finish`,
                                          ham_woop.`date_finish_not_later`,
                                          ham_woop.hat_eventtype_id,
                                          hat_eventtype.name event_type,
										  contacts.id contact_id,
										  contacts.`last_name` contact_name,
										  accounts.`id` org_id,
										  accounts.`name` org_name
										FROM
										  ham_wo
										  LEFT JOIN (
											accounts accounts2) ON (accounts2.id = ham_wo.`account_id`)
										  LEFT JOIN (
											contacts contacts2) ON (contacts2.id = ham_wo.`contact_id`),
										  ham_woop
										  LEFT JOIN (
										      ham_work_center_people,
										      contacts,
										      accounts,
										      accounts_contacts
										    )
										    ON (
										      ham_woop.`work_center_people_id` = ham_work_center_people.`id`
										      AND ham_work_center_people.`deleted` = 0
										      AND contacts.id = ham_work_center_people.`contact_id`
										      AND contacts.`deleted` = 0
										      AND accounts_contacts.`account_id`  = accounts.`id`
										      AND accounts_contacts.`contact_id` =contacts.`id`
										    )
                                        LEFT JOIN (hat_eventtype) 
                                        ON hat_eventtype.`id` = ham_woop.hat_eventtype_id 
										WHERE ham_wo.`id` = ham_woop.`ham_wo_id`
										  AND ham_wo.`deleted` = 0
										  AND ham_woop.`deleted` = 0
                                      and ham_woop.id = '".$_REQUEST['woop_id']."'";

                $result_woop =  $db->query($sql_current_string);

                while ( $bean_woop = $db->fetchByAssoc($result_woop) ) {

                    $this->bean->source_woop_id = $bean_woop['woop_id'];
                    $this->bean->source_woop = $bean_woop['woop_name'];
                    $this->bean->hat_eventtype_id = $bean_woop['hat_eventtype_id'];
                    $this->bean->event_type = $bean_woop['event_type'];
                    $this->bean->source_wo_id = $bean_woop['wo_id'];
                    $this->bean->source_wo = $bean_woop['wo_name'];
                    $this->bean->owner_id = $bean_woop['contact_id'];
                    $this->bean->owner_contacts = $bean_woop['contact_name'];
                    $this->bean->tracking_number = $bean_woop['wo_number'].' / '.$bean_woop['woop_number'];
                    $this->bean->name = $bean_woop['wo_number'].':'.$bean_woop['woop_name'];
                    $this->bean->current_owning_org_id = $bean_woop['org_id'];
                    $this->bean->current_owning_org = $bean_woop['org_name'];
                    //工单上的客户与联系人
                    //在选择EventType后，如果当前EventType需要变化组织就会默认工作单的内容
                    $this->bean->source_wo_account = $bean_woop['source_wo_account'];
                    $this->bean->source_wo_account_id = $bean_woop['source_wo_account_id'];
                    $this->bean->source_wo_contact = $bean_woop['source_wo_contact'];
                    $this->bean->source_wo_contact_id = $bean_woop['source_wo_contact_id'];

                    if(empty($this->bean->date_schedualed_finish)){
                        if(empty($this->bean->date_target_finish)){
                            if(empty($this->bean->date_finish_not_later)){
                                $this->bean->planned_complete_date = $this->bean->planned_execution_date;
                            } else {
                                $this->bean->planned_complete_date = $bean_woop['date_finish_not_later'];
                            }

                        } else {
                            $this->bean->planned_complete_date = $bean_woop['date_target_finish'];
                        }
                    } else {
                        $this->bean->planned_complete_date = $bean_woop['date_schedualed_finish'];
                    }

                    $this->ss->assign('SOURCE_WOOP_ID',$bean_woop['woop_id']);
                    $this->ss->assign('SOURCE_WO_ID',$bean_woop['wo_id']);
                    $this->ss->assign('SOURCE_WO_ORG',$bean_woop['wo_id']);
                    //找到工单上面的组织
					$wo_bean = BeanFactory :: getBean('HAM_WO')->retrieve_by_string_fields(array ('ID' => $bean_woop['wo_id']));
					if(!empty($wo_bean)){
						$this->bean->target_using_org_id=$wo_bean->account_id;
						$account_bean = BeanFactory :: getBean('Accounts')->retrieve_by_string_fields(array ('ID' => $wo_bean->account_id));
						if(!empty($account_bean)){
							$this->bean->target_using_org=$account_bean->name;
						}
					}

               }


        } elseif (empty($this->bean->id)){
            //如果不是从工序上来，但是处理新建的状态
            //默认当前人员信息到负责部门与人员
            $this->bean->owner_contacts = $current_user->linked_contact_c;
            $this->bean->owner_id = $current_user->contact_id_c;
            $this->bean->current_owning_org_id = $current_user->account_id_c;
            $this->bean->current_owning_org = $current_user->contact_organization_c;
        }


        $beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
        //处理Framework中的相关规则性字段
        //以下JS变更主要在modules\HAT_Asset_Trans\js\line_items.js中变调用
        echo "<script>";
        if(isset($beanFramework)) {
            echo "var owning_person_field_rule='".$beanFramework->owning_person_field_rule."';";
            echo "var using_person_field_rule='".$beanFramework->using_person_field_rule."';";
            //add by yuan.chen
            echo "var source_woop_id='".$this->bean->source_woop_id."';";
            echo "var source_wo_id='".$this->bean->source_wo_id."';";
        }
        echo "</script>";

/*		echo '<script src="modules/HIT_IP_TRANS_BATCH/js/html_dom_required_setting.js"></script>';

		//add by yuan.chen 
			$event_sql = "SELECT 
					  h.change_owning_org,
					  h.change_using_org,
					  h.change_location,
					  h.change_owning_person,
					  h.change_rack_position
				FROM
					  hat_eventtype h 
				WHERE h.deleted=0 
				AND   h.id ='" . $this->bean->hat_eventtype_id . "'";
			$event_result = $db->query($event_sql);
			while ($event_row = $db->fetchByAssoc($event_result)) {
				$event_line_data = json_encode($event_row);
				echo "<script> var event_line_data=".$event_line_data."</script>";
			}*/
	
        parent::Display();

        //如果已经选择EventType，值将界面展开。
        //（如果没有位置分类，则界面保持折叠状态。）
        if(isset($this->bean->hat_eventtype_id) && ($this->bean->hat_eventtype_id)!=""){
                    echo '<script>$(".collapsed").switchClass("collapsed","expanded");</script>';
         } else {
                echo '<script>$(".expanded").switchClass("expanded","collapsed");</script>';
         }
    }
}