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


$layout_defs['HAM_ACT_OP'] = array(
    // list of what Subpanels to show in the DetailView
    'subpanel_setup' => array(

        'ham_act_checklists' => array(
            'order' => 10,
            'module' => 'HAM_ACT_Checklists',
            'subpanel_name' => 'default',
            'sort_order' => 'desc',
            'sort_by' => 'name',
            'get_subpanel_data' => 'ham_act_checklists_link',
            'title_key' => 'LBL_HAM_ACT_CHECKLISTS_SUBPANEL_TITLE',
            'top_buttons' => array(
                0 => array('widget_class' => 'SubPanelTopCreateButton'),
            ),
        ),

        'ham_act_materials' => array(
            'order' => 20,
            'module' => 'HAM_ACT_Materials',
            'subpanel_name' => 'default',
            'sort_order' => 'desc',
            'sort_by' => 'name',
            'get_subpanel_data' => 'ham_act_materials_link',
            'title_key' => 'LBL_HAM_ACT_MATERIALS_SUBPANEL_TITLE',
            'top_buttons' => array(
                0 => array('widget_class' => 'SubPanelTopCreateButton'),
            ),
        ),

        'ham_act_labors' => array(
            'order' => 10,
            'module' => 'HAM_ACT_Labors',
            'subpanel_name' => 'default',
            'sort_order' => 'desc',
            'sort_by' => 'name',
            'get_subpanel_data' => 'ham_act_labors_link',
            'title_key' => 'LBL_HAM_ACT_LABORS_SUBPANEL_TITLE',
            'top_buttons' => array(
                0 => array('widget_class' => 'SubPanelTopCreateButton'),
            ),
        ),

        'ham_act_tools' => array(
            'order' => 10,
            'module' => 'HAM_ACT_Tools',
            'subpanel_name' => 'default',
            'sort_order' => 'desc',
            'sort_by' => 'name',
            'get_subpanel_data' => 'ham_act_tools_link',
            'title_key' => 'LBL_HAM_ACT_TOOLS_SUBPANEL_TITLE',
            'top_buttons' => array(
                0 => array('widget_class' => 'SubPanelTopCreateButton'),
            ),
        ),

        'ham_act_subcontracts' => array(
            'order' => 10,
            'module' => 'HAM_ACT_Subcontracts',
            'subpanel_name' => 'default',
            'sort_order' => 'desc',
            'sort_by' => 'name',
            'get_subpanel_data' => 'ham_act_subcontracts_link',
            'title_key' => 'LBL_HAM_ACT_SUBCONTRACTS_SUBPANEL_TITLE',
            'top_buttons' => array(
                0 => array('widget_class' => 'SubPanelTopCreateButton'),
            ),
        ),
    ),
);
?>
