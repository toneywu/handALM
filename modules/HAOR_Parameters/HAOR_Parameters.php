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
require_once('modules/HAOR_Parameters/HAOR_Parameters_sugar.php');
class HAOR_Parameters extends HAOR_Parameters_sugar {
	
	function __construct(){
		parent::__construct();
	}
	
	function save_lines(array $post,AOR_Report $bean,$postKey){
        $seenIds = array();
        $lov_n = 0;
        $list_n = 0;
        $sql_n = 0;
        if(isset($post[$postKey.'id'])) {
            foreach ($post[$postKey . 'id'] as $key => $id) {
                if ($id) {
                    $aorParameter = BeanFactory::getBean('HAOR_Parameters', $id);
                } else {
                    $aorParameter = BeanFactory::newBean('HAOR_Parameters');
                }
                $aorParameter->name = $post[$postKey . 'name'][$key];
                $aorParameter->description = $post[$postKey . 'des'][$key];
                $type = $post[$postKey . 'type'][$key];
                $aorParameter->type = $type;
                $aorParameter->value = $post[$postKey . 'value'][$key];
                if($type=='lov'){
                    $aorParameter->source_module = $post[$postKey . 'relevance_module'][$key-$lov_n];
                    $aorParameter->value_id = $post[$postKey . 'lov_id'][$key-$lov_n];
                    $list_n++;
                    $sql_n++;
                }else if($type=='list'){
                    $aorParameter->list_options_name = $post[$postKey . 'relevance_list'][$key-$list_n];
                    $lov_n++;
                    $sql_n++;
                }else if($type=='sql'){
                    $aorParameter->sql_statement = $post[$postKey . 'sql_statement'][$key-$sql_n];
                    $aorParameter->value_id = $post[$postKey . 'lov_sql_id'][$key-$sql_n];
                    $lov_n++;
                    $list_n++;
                }else{
                    $lov_n++;
                    $list_n++;
                    $sql_n++;
                }
                $aorParameter->aor_report_id = $bean->id;
                $aorParameter->save();
                $seenIds[] = $aorParameter->id;
            }
        }
        //Any beans that exist but aren't in $seenIds must have been removed.
        foreach($bean->get_linked_beans('haor_parameters','HAOR_Parameters') as $parameter){
            if(!in_array($parameter->id,$seenIds)){
                $parameter->mark_deleted($parameter->id);
            }
        }
    }
}
?>