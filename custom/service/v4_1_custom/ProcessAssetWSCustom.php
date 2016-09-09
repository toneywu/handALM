<?php
if (!defined('sugarEntry'))
	define('sugarEntry', true);
require_once ('service/v4_1/SugarWebServiceImplv4_1.php');
class ProcessAssetWSCustom extends SugarWebServiceImplv4_1 {
	/*
	 * Returns the session id if authenticated
	 *
	 * @param string $session
	 * @return string $session - false if invalid.
	 *
	 */

	function process_asset_info($session, $module_name, $name_value_list) {
		global $beanList, $beanFiles, $current_user;
		$class_name = $beanList[$module_name];
		require_once ($beanFiles[$class_name]);
		$seed = new $class_name ();

		$GLOBALS['log']->info('Begin: ProcessAssetWSCustom->example_method');
		$error = new SoapError();

		//authenticate
		if (!self :: $helperObject->checkSessionAndModuleAccess($session, 'invalid_session', '', '', '', $error)) {
			$GLOBALS['log']->info('End: ProcessAssetWSCustom->example_method.');
			return false;
		}

		foreach ($name_value_list as $name => $value) {
			if (is_array($value) && $value['name'] == 'id') {
				$seed->retrieve($value['value']);
				break;
			} else
				if ($name === 'id') {
					$seed->retrieve($value);
				}
		}

		$asset_number = $name_value_list[0]["value"];
		$return_fields[] = $asset_number;
		$check_fix_beans = BeanFactory :: getBean('HFA_Fixed_Assets')->get_full_list("", "hfa_fixed_assets.name='" . $asset_number . "'", "", "");
		if (count($check_fix_beans) == 0) {
			$fixedtBean = BeanFactory :: newBean('HFA_Fixed_Assets');

			foreach ($name_value_list as $name => $value) {
				if ($name == 0) {
					$fixedtBean->name = $asset_number;
				}
				elseif ($name == 1) {
					$fixedtBean->book_name = $name_value_list[$name]["value"];
				}
				elseif ($name == 2) {
					$fixedtBean->fixed_asset_type = $name_value_list[$name]["value"];
				}
				elseif ($name == 3) {
					$fixedtBean->description = $name_value_list[$name]["value"];
				}
				elseif ($name == 4) {
					$fixedtBean->owning_dept = $name_value_list[$name]["value"];
				}
				elseif ($name == 5) {
					$fixedtBean->location = $name_value_list[$name]["value"];
				}
				elseif ($name == 6) {
					$fixedtBean->location = $name_value_list[$name]["value"];
				}
			}
			$frame_bean = BeanFactory :: getBean('HAA_Frameworks')->retrieve_by_string_fields(array (
				'code' => 'ChinaCache'
			));

			$fixedtBean->haa_frameworks_id = $frame_bean->id;
			$fixedtBean->save();

			$resource_id = $name_value_list[8]["value"];
			$asset_bean = BeanFactory :: getBean('HAT_Assets')->retrieve_by_string_fields(array (
				'id' => $resource_id
			));
			$asset_bean->fixed_asset_id = $fixedtBean->id;
			$asset_bean->save();
		}
		$return_entry_list = self::$helperObject->get_name_value_list_for_fields($seed, $return_fields );
		return array (
			'id' => $resource_id,
			'entry_list' => $return_entry_list
		);

	}
}
?>