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
  'author' => 'Toney',
  'description' => '',
  'icon' => '',
  'is_uninstallable' => true,
  'name' => 'handALM_Asset_Tracking',
  'published_date' => '2016-02-07 15:38:48',
  'type' => 'module',
  'version' => 1454859529,
  'remove_tables' => 'prompt',
);


$installdefs = array (
  'id' => 'handALM_Asset_Tracking',
  'beans' => 
  array (
    0 => 
    array (
      'module' => 'HAT_Assets',
      'class' => 'HAT_Assets',
      'path' => 'modules/HAT_Assets/HAT_Assets.php',
      'tab' => true,
    ),
    1 => 
    array (
      'module' => 'HAT_Asset_Locations',
      'class' => 'HAT_Asset_Locations',
      'path' => 'modules/HAT_Asset_Locations/HAT_Asset_Locations.php',
      'tab' => true,
    ),
    2 => 
    array (
      'module' => 'HAT_Asset_Trans',
      'class' => 'HAT_Asset_Trans',
      'path' => 'modules/HAT_Asset_Trans/HAT_Asset_Trans.php',
      'tab' => true,
    ),
    3 => 
    array (
      'module' => 'HAT_Asset_Trans_Batch',
      'class' => 'HAT_Asset_Trans_Batch',
      'path' => 'modules/HAT_Asset_Trans_Batch/HAT_Asset_Trans_Batch.php',
      'tab' => true,
    ),
  ),
  'layoutdefs' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/hat_assets_accounts_Accounts.php',
      'to_module' => 'Accounts',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/hat_assets_contacts_Contacts.php',
      'to_module' => 'Contacts',
    ),
    2 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/hat_assets_hat_asset_trans_HAT_Assets.php',
      'to_module' => 'HAT_Assets',
    ),
    3 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/hat_asset_locations_hat_assets_HAT_Asset_Locations.php',
      'to_module' => 'HAT_Asset_Locations',
    ),
    4 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/hat_asset_locations_hat_asset_locations_HAT_Asset_Locations.php',
      'to_module' => 'HAT_Asset_Locations',
    ),
  ),
  'relationships' => 
  array (
    0 => 
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/hat_assets_accountsMetaData.php',
    ),
    1 => 
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/hat_assets_contactsMetaData.php',
    ),
    2 => 
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/hat_assets_hat_asset_transMetaData.php',
    ),
    3 => 
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/hat_asset_locations_hat_assetsMetaData.php',
    ),
    4 => 
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/hat_asset_locations_hat_asset_locationsMetaData.php',
    ),
  ),
  'image_dir' => '<basepath>/icons',
  'copy' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/modules/HAT_Assets',
      'to' => 'modules/HAT_Assets',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/modules/HAT_Asset_Locations',
      'to' => 'modules/HAT_Asset_Locations',
    ),
    2 => 
    array (
      'from' => '<basepath>/SugarModules/modules/HAT_Asset_Trans',
      'to' => 'modules/HAT_Asset_Trans',
    ),
    3 => 
    array (
      'from' => '<basepath>/SugarModules/modules/HAT_Asset_Trans_Batch',
      'to' => 'modules/HAT_Asset_Trans_Batch',
    ),
  ),
  'language' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Assets.php',
      'to_module' => 'HAT_Assets',
      'language' => 'en_us',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Assets.php',
      'to_module' => 'HAT_Assets',
      'language' => 'zh_cn',
    ),
    2 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'en_us',
    ),
    3 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'zh_cn',
    ),
    4 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Assets.php',
      'to_module' => 'HAT_Assets',
      'language' => 'en_us',
    ),
    5 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Assets.php',
      'to_module' => 'HAT_Assets',
      'language' => 'zh_cn',
    ),
    6 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'en_us',
    ),
    7 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'zh_cn',
    ),
    8 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Asset_Trans.php',
      'to_module' => 'HAT_Asset_Trans',
      'language' => 'en_us',
    ),
    9 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Asset_Trans.php',
      'to_module' => 'HAT_Asset_Trans',
      'language' => 'zh_cn',
    ),
    10 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Assets.php',
      'to_module' => 'HAT_Assets',
      'language' => 'en_us',
    ),
    11 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Assets.php',
      'to_module' => 'HAT_Assets',
      'language' => 'zh_cn',
    ),
    12 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Assets.php',
      'to_module' => 'HAT_Assets',
      'language' => 'en_us',
    ),
    13 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Assets.php',
      'to_module' => 'HAT_Assets',
      'language' => 'zh_cn',
    ),
    14 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Asset_Locations.php',
      'to_module' => 'HAT_Asset_Locations',
      'language' => 'en_us',
    ),
    15 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Asset_Locations.php',
      'to_module' => 'HAT_Asset_Locations',
      'language' => 'zh_cn',
    ),
    16 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Asset_Locations.php',
      'to_module' => 'HAT_Asset_Locations',
      'language' => 'en_us',
    ),
    17 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/language/HAT_Asset_Locations.php',
      'to_module' => 'HAT_Asset_Locations',
      'language' => 'zh_cn',
    ),
    18 => 
    array (
      'from' => '<basepath>/SugarModules/language/application/en_us.lang.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),
  ),
  'vardefs' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/hat_assets_accounts_HAT_Assets.php',
      'to_module' => 'HAT_Assets',
    ),
    1 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/hat_assets_accounts_Accounts.php',
      'to_module' => 'Accounts',
    ),
    2 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/hat_assets_contacts_HAT_Assets.php',
      'to_module' => 'HAT_Assets',
    ),
    3 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/hat_assets_contacts_Contacts.php',
      'to_module' => 'Contacts',
    ),
    4 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/hat_assets_hat_asset_trans_HAT_Asset_Trans.php',
      'to_module' => 'HAT_Asset_Trans',
    ),
    5 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/hat_assets_hat_asset_trans_HAT_Assets.php',
      'to_module' => 'HAT_Assets',
    ),
    6 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/hat_asset_locations_hat_assets_HAT_Assets.php',
      'to_module' => 'HAT_Assets',
    ),
    7 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/hat_asset_locations_hat_assets_HAT_Asset_Locations.php',
      'to_module' => 'HAT_Asset_Locations',
    ),
    8 => 
    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/hat_asset_locations_hat_asset_locations_HAT_Asset_Locations.php',
      'to_module' => 'HAT_Asset_Locations',
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
    1 => 
    array (
      'additional_fields' => 
      array (
      ),
    ),
    2 => 
    array (
      'additional_fields' => 
      array (
      ),
    ),
    3 => 
    array (
      'additional_fields' => 
      array (
      ),
    ),
    4 => 
    array (
      'additional_fields' => 
      array (
      ),
    ),
  ),
);