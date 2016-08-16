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


// THIS CONTENT IS GENERATED BY MBPackage.php
$manifest = array (
  0 => 
  array (
    'acceptable_sugar_versions' => 
    array (
      0 => '',
    ),
  ),
  1 => 
  array (
    'acceptable_sugar_flavors' => 
    array (
      0 => 'CE',
      1 => 'PRO',
      2 => 'ENT',
    ),
  ),
  'readme' => '',
  'key' => 'HIM',
  'author' => 'HAND',
  'description' => '',
  'icon' => '',
  'is_uninstallable' => true,
  'name' => 'HIM_Investment',
  'published_date' => '2016-05-10 13:37:04',
  'type' => 'module',
  'version' => 1462887425,
  'remove_tables' => 'prompt',
);


$installdefs = array (
  'id' => 'HIM_Investment',
  'beans' => 
  array (
    0 => 
    array (
      'module' => 'HIM_IM_Budget_Revisions',
      'class' => 'HIM_IM_Budget_Revisions',
      'path' => 'modules/HIM_IM_Budget_Revisions/HIM_IM_Budget_Revisions.php',
      'tab' => true,
    ),
    1 => 
    array (
      'module' => 'HIM_IM_Categories',
      'class' => 'HIM_IM_Categories',
      'path' => 'modules/HIM_IM_Categories/HIM_IM_Categories.php',
      'tab' => true,
    ),
    2 => 
    array (
      'module' => 'HIM_Programs',
      'class' => 'HIM_Programs',
      'path' => 'modules/HIM_Programs/HIM_Programs.php',
      'tab' => true,
    ),
    3 => 
    array (
      'module' => 'HIM_Project_Budgets',
      'class' => 'HIM_Project_Budgets',
      'path' => 'modules/HIM_Project_Budgets/HIM_Project_Budgets.php',
      'tab' => true,
    ),
    4 => 
    array (
      'module' => 'HIM_Project_Requests',
      'class' => 'HIM_Project_Requests',
      'path' => 'modules/HIM_Project_Requests/HIM_Project_Requests.php',
      'tab' => true,
    ),
    5 => 
    array (
      'module' => 'HIM_Project_Tasks',
      'class' => 'HIM_Project_Tasks',
      'path' => 'modules/HIM_Project_Tasks/HIM_Project_Tasks.php',
      'tab' => true,
    ),
  ),
  'layoutdefs' => 
  array (
  ),
  'relationships' => 
  array (
  ),
  'image_dir' => '<basepath>/icons',
  'copy' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/modules/HIM_IM_Budget_Revisions',
      'to' => 'modules/HIM_IM_Budget_Revisions',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/modules/HIM_IM_Categories',
      'to' => 'modules/HIM_IM_Categories',
    ),
    2 => 
    array (
      'from' => '<basepath>/SugarModules/modules/HIM_Programs',
      'to' => 'modules/HIM_Programs',
    ),
    3 => 
    array (
      'from' => '<basepath>/SugarModules/modules/HIM_Project_Budgets',
      'to' => 'modules/HIM_Project_Budgets',
    ),
    4 => 
    array (
      'from' => '<basepath>/SugarModules/modules/HIM_Project_Requests',
      'to' => 'modules/HIM_Project_Requests',
    ),
    5 => 
    array (
      'from' => '<basepath>/SugarModules/modules/HIM_Project_Tasks',
      'to' => 'modules/HIM_Project_Tasks',
    ),
  ),
  'language' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/language/application/en_us.lang.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),
  ),
);