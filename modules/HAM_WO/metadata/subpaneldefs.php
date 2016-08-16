<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2016 Salesagility Ltd.
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

//REF:http://urdhva-tech.blogspot.sg/2013/02/add-custom-subpanel-in-accounts-module.html

$layout_defs['HAM_WO'] = array (
    // list of what Subpanels to show in the DetailView
    'subpanel_setup' => array (
        
		
		'sr' => array (
            'order' => 30,
            'module' => 'HAM_SR',
            'sort_order' => 'asc',
            'sort_by' => 'id',
            'subpanel_name' => 'HAM_WO_subpanel_ham_sr',
            'get_subpanel_data' => 'sr_link',
            'title_key' => 'LBL_SR_SUBPANEL_TITLE',
            'top_buttons'  => array (
                //array('widget_class' => 'SubPanelTopCreateButton'),
                0 => array (
                    'widget_class' => 'SubPanelTopSelectButton',
                    'mode'         => 'MultiSelect',
                    ),
                ),
            ),
			
			
        'woop' => array (
            'order' => 11,
            'module' => 'HAM_WOOP',
            'sort_order' => 'asc',
            'sort_by' => 'woop_number',
            'subpanel_name' => 'HAM_WO_subpanel_woop',
            'get_subpanel_data' => 'woop_link',
            'title_key' => 'LBL_WOOP_SUBPANEL_TITLE',
            'top_buttons'  => array (
                0 => array('widget_class' => 'SubPanelTopCreateButton'),
            ),
        ),
		
		'wo_line' => array (
            'order' => 12,
            'module' => 'HAM_WO_Lines',
            'sort_order' => 'asc',
            'sort_by' => 'name',
            'subpanel_name' => 'default',
            'get_subpanel_data' => 'wo_line_link',
            'title_key' => 'LBL_WO_LINE_SUBPANEL_TITLE',
            'top_buttons'  => array (
                0 => array('widget_class' => 'SubPanelTopCreateButton'),
            ),
        ),

/*        'hmm_mo_request_lines' => array (
            'order' => 10,
            'module' => 'HMM_MO_Request_Lines',
            'sort_order' => 'asc',
            'sort_by' => 'item_name',
            'subpanel_name' => 'default',
            'get_subpanel_data' => 'function:get_material_lines',
            'generate_select' => true,
            'title_key' => 'LBL_HMM_MO_Request_Lines_TITLE',
            'top_buttons'  => array (),
            'function_parameters' => array(
                'import_function_file' => 'modules/HMM_MO_Request_Lines/WOSubpanel.php',
                //'base_unit_id' => $this->_focus->base_unit_id,
                //'uom_class_id' => $this->_focus->id,
                'return_as_array' => 'true'
            ),
        ),*/

        

        ),
        
    );
    ?>