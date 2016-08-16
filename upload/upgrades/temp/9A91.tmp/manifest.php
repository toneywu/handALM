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
  'key' => 'HAT',
  'author' => '',
  'description' => '',
  'icon' => '',
  'is_uninstallable' => true,
  'name' => 'HAT_Counting',
  'published_date' => '2016-03-25 15:33:15',
  'type' => 'module',
  'version' => 1458919996,
  'remove_tables' => 'prompt',
);


$installdefs = array (
  'id' => 'HAT_Counting',
  'beans' => 
  array (
    0 => 
    array (
      'module' => 'HAT_Counting_Batchs',
      'class' => 'HAT_Counting_Batchs',
      'path' => 'modules/HAT_Counting_Batchs/HAT_Counting_Batchs.php',
      'tab' => true,
    ),
    1 => 
    array (
      'module' => 'HAT_Counting_Lines',
      'class' => 'HAT_Counting_Lines',
      'path' => 'modules/HAT_Counting_Lines/HAT_Counting_Lines.php',
      'tab' => true,
    ),
  ),
  'layoutdefs' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/hat_counting_lines_hat_counting_batchs_HAT_Counting_Batchs.php',
      'to_module' => 'HAT_Counting_Batchs',
    ),
  ),
  'relationships' => 
  array (
    0 => 
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/hat_counting_lines_hat_counting_batchsMetaData.php',
    ),
  ),
  'image_dir' => '<basepath>/icons',
  'copy' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/modules/HAT_Counting_Batchs',
      'to' => 'modules/HAT_Counting_Batchs',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/modules/HAT_Counting_Lines',
      'to' => 'modules/HAT_Counting_Lines',
    ),
  ),
  'language' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Counting_Lines.php',
      'to_module' => 'HAT_Counting_Lines',
      'language' => 'en_us',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Counting_Lines.php',
      'to_module' => 'HAT_Counting_Lines',
      'language' => 'zh_CN',
    ),
    2 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Counting_Lines.php',
      'to_module' => 'HAT_Counting_Lines',
      'language' => 'zh_TW',
    ),
    3 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Counting_Batchs.php',
      'to_module' => 'HAT_Counting_Batchs',
      'language' => 'en_us',
    ),
    4 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Counting_Batchs.php',
      'to_module' => 'HAT_Counting_Batchs',
      'language' => 'zh_CN',
    ),
    5 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Counting_Batchs.php',
      'to_module' => 'HAT_Counting_Batchs',
      'language' => 'zh_TW',
    ),
    6 => 
    array (
      'from' => '<basepath>/SugarModules/language/application/en_us.lang.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),
    7 => 
    array (
      'from' => '<basepath>/SugarModules/language/application/zh_CN.lang.php',
      'to_module' => 'application',
      'language' => 'zh_CN',
    ),
  ),
  'vardefs' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/hat_counting_lines_hat_counting_batchs_HAT_Counting_Lines.php',
      'to_module' => 'HAT_Counting_Lines',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/hat_counting_lines_hat_counting_batchs_HAT_Counting_Batchs.php',
      'to_module' => 'HAT_Counting_Batchs',
    ),
  ),
  'layoutfields' => 
  array (
    0 => 
    array (
      'additional_fields' => 
      array (
      ),
    ),
  ),
);