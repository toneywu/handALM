<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2017 SalesAgility Ltd.
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
 */

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

$module_name = 'HAA_Periods';
$subpanel_layout = array(
    'top_buttons' => array(
       // array('widget_class' => 'SubPanelTopCreateButton'),
       // array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => $module_name),
    ),

    'where' => '',

    'list_fields' => array(
        // 'name' => array(
        //     'vname' => 'LBL_NAME',
        //     'widget_class' => 'SubPanelDetailViewLink',
        //     'width' => '45%',
        // ),
        'sort_order' => array(
            'vname' => 'LBL_SORT_ORDER',
            'width' => '10%',
        ),
        'period_name' => array(
            'vname' => 'LBL_PERIOD_NAME',
            'width' => '10%',
        ),
        'period_year' => array(
            'vname' => 'LBL_PERIOD_YEAR',
            'width' => '10%',
        ),
        'quarter_num' => array(
            'vname' => 'LBL_QUARTER_NUM',
            'width' => '10%',
        ),
        'period_num' => array(
            'vname' => 'LBL_PERIOD_NUM',
            'width' => '10%',
        ),
        'start_date' => array(
            'vname' => 'LBL_START_DATE',
            'width' => '10%',
        ),
        'end_date' => array(
            'vname' => 'LBL_END_DATE',
            'width' => '10%',
        ),
        'enabled_flag' => array(
            'vname' => 'LBL_ENABLED_FLAG',
            'width' => '10%',
        ),
        'description' => array(
            'vname' => 'LBL_DESCRIPTION',
            'width' => '10%',
        ),
       
        // 'edit_button' => array(
        //     'vname' => 'LBL_EDIT_BUTTON',
        //     'widget_class' => 'SubPanelEditButton',
        //     'module' => $module_name,
        //     'width' => '4%',
        // ),
        'remove_button' => array(
            'vname' => 'LBL_REMOVE',
            'widget_class' => 'SubPanelRemoveButton',
            'module' => $module_name,
            'width' => '5%',
        ),
    ),
);
