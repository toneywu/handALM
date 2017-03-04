<?php
//本文件主要是读取EventType对应的关联字段信息。

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    class getEventType {
        /**
         * @param $bean
         * @param $event
         * @param $arguments
         */
	
	//REF:http://developer.sugarcrm.com/2012/03/13/howto-grab-fields-from-a-related-record-without-sugar-logic/comment-page-1/#comment-31637
	//REF:https://suitecrm.com/forum/developer-help/3689-showing-fields-from-related-module-in-detail-view#14530 by Webber
	
	   public function getEventType($focus, $event, $arguments) {
			// Move on only if the field is not empy, so that it's not overwritten if set
			
			if (!empty($focus->fetched_row['id'])) {
			  // this will retrieve a record from ModuleB into $bean corresponding to the ID of the desired record in ModuleB
			  $bean = BeanFactory::getBean('HAT_EventType', $focus->hat_eventtype_id); // $module, $record_id
			  if ($bean) { // test if $bean was loaded successfully
				// this is only necessary if you'll need custom fields from ModuleB
				//$bean->custom_fields->retrieve();

				// now set some variables of current record on ModuleA to values retrieved from the related record on ModuleB
				$focus->target_asset_status = $bean->target_asset_status;
				$focus->change_location = $bean->change_location;
				$focus->processing_asset_status = $bean->processing_asset_status;
				$focus->change_organization = $bean->change_organization;
				$focus->change_contact = $bean->change_contact;
				$focus->change_oranization_le = $bean->change_oranization_le;
				$focus->change_location_desc = $bean->change_location_desc;
				$focus->require_approval_workflow = $bean->require_approval_workflow;				
				$focus->require_confirmation = $bean->require_confirmation;		
				$focus->change_target_status = $bean->change_target_status;		
				//echo ("<h1>".$focus->target_asset_status."</h1>");
				//$focus->location_maps_lng_c = $bean->maps_lng_c;
			  }
			  
			}
			
			
	  }		
    }

	?>