<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
//require_once('modules/HAA_FF/HAA_FF_sugar.php');

class HAA_FF extends Basic {
	var $new_schema = true;
	var $module_dir = 'HAA_FF';
	var $object_name = 'HAA_FF';
	var $table_name = 'haa_ff';
	var $importable = false;
	var $disable_row_level_security = true ;


/*	function HAA_FF() {
		echo"<h1>TEST</h1>";
		$GLOBALS['log']->error("HAA_FF Loaded");
		parent::Basic();
        $this->load_flow_beans();
        require_once('modules/AOW_WorkFlow/aow_utils.php');
	}

	function bean_implements($interface){
		switch($interface){
			case 'ACL': return true;
		}
		return false;
	}
*/
/*
	function load_flow_beans(){
        global $beanList, $app_list_strings;

        $app_list_strings['aow_moduleList'] = $app_list_strings['moduleList'];

        if(!empty($app_list_strings['aow_moduleList'])){
            foreach($app_list_strings['aow_moduleList'] as $mkey => $mvalue){
                if(!isset($beanList[$mkey]) || str_begin($mkey, 'HAA_')){
                    unset($app_list_strings['aow_moduleList'][$mkey]);
                }
            }
        }

        $app_list_strings['aow_moduleList'] = array_merge((array)array(''=>''), (array)$app_list_strings['aow_moduleList']);

        asort($app_list_strings['aow_moduleList']);
    }
*/

    function __construct(){
		parent::__construct();
	}
}
?>