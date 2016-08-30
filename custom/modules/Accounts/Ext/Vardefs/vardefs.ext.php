<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2016-02-08 10:53:31
$dictionary["Account"]["fields"]["haa_qual_accounts"] = array (
  'name' => 'haa_qual_accounts',
  'type' => 'link',
  'relationship' => 'haa_qual_accounts',
  'source' => 'non-db',
  'module' => 'HAA_QUAL',
  'bean_name' => 'HAA_QUAL',
  //'side' => 'right',
  'vname' => 'LBL_HAA_QUAL_TITLE',
);

$dictionary["Account"]["relationships"]["haa_qual_accounts"] = array (
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'HAA_QUAL',
    'rhs_table' => 'haa_qual',
    'rhs_key' => 'org_id',
    'relationship_type' => 'one-to-many',
);


// created: 2016-02-08 10:53:31
$dictionary["Account"]["fields"]["hat_assets_accounts"] = array (
  'name' => 'hat_assets_accounts',
  'type' => 'link',
  'relationship' => 'hat_assets_accounts',
  'source' => 'non-db',
  'module' => 'HAT_Assets',
  'bean_name' => 'HAT_Assets',
  'side' => 'right',
  'vname' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_HAT_ASSETS_TITLE',
);


 // created: 2016-06-16 17:00:03
$dictionary['Account']['fields']['account_id1_c']['inline_edit']=1;

 

 // created: 2016-06-16 16:59:36
$dictionary['Account']['fields']['account_id_c']['inline_edit']=1;

 

 // created: 2016-07-25 07:17:02
$dictionary['Account']['fields']['attribute1_c']['inline_edit']='';
$dictionary['Account']['fields']['attribute1_c']['labelValue']='Attribute 1';

 

 // created: 2016-07-25 07:17:43
$dictionary['Account']['fields']['attribute2_c']['inline_edit']='';
$dictionary['Account']['fields']['attribute2_c']['labelValue']='Attribute 2';

 

 // created: 2016-07-25 07:18:06
$dictionary['Account']['fields']['attribute3_c']['inline_edit']='';
$dictionary['Account']['fields']['attribute3_c']['labelValue']='Attribute 3';

 

 // created: 2016-07-25 07:18:28
$dictionary['Account']['fields']['attribute4_c']['inline_edit']='';
$dictionary['Account']['fields']['attribute4_c']['labelValue']='Attribute 4';

 

 // created: 2016-07-25 07:18:49
$dictionary['Account']['fields']['attribute5_c']['inline_edit']='';
$dictionary['Account']['fields']['attribute5_c']['labelValue']='Attribute 5';

 

 // created: 2016-07-25 07:55:20
$dictionary['Account']['fields']['business_type_c']['inline_edit']='';
$dictionary['Account']['fields']['business_type_c']['labelValue']='Business Type';

 

 // created: 2016-06-16 17:01:42
$dictionary['Account']['fields']['contact_id1_c']['inline_edit']=1;

 

 // created: 2016-06-16 17:01:11
$dictionary['Account']['fields']['contact_id_c']['inline_edit']=1;

 

 // created: 2016-08-02 20:55:48
$dictionary['Account']['fields']['customer_classs_c']['inline_edit']='';
$dictionary['Account']['fields']['customer_classs_c']['labelValue']='Customer Classs';

 

 // created: 2016-08-02 20:36:12
$dictionary['Account']['fields']['data_source_code_c']['inline_edit']='';
$dictionary['Account']['fields']['data_source_code_c']['labelValue']='Source Code';

 

 // created: 2016-08-02 20:36:53
$dictionary['Account']['fields']['data_source_id_c']['inline_edit']='';
$dictionary['Account']['fields']['data_source_id_c']['labelValue']='Source ID';

 

 // created: 2016-08-02 20:36:33
$dictionary['Account']['fields']['data_source_reference_c']['inline_edit']='';
$dictionary['Account']['fields']['data_source_reference_c']['labelValue']='Source Reference';

 

 // created: 2016-02-16 21:12:16
$dictionary['Account']['fields']['duns_number_c']['inline_edit']='1';
$dictionary['Account']['fields']['duns_number_c']['labelValue']='DUNS Number';

 

 // created: 2016-08-27 07:20:05
$dictionary['Account']['fields']['framework_c']['inline_edit']='';
$dictionary['Account']['fields']['framework_c']['labelValue']='Frame';

 

 // created: 2016-02-16 20:55:43
$dictionary['Account']['fields']['full_name_c']['inline_edit']='1';
$dictionary['Account']['fields']['full_name_c']['labelValue']='Full Name';

 

 // created: 2016-06-16 16:50:53
$dictionary['Account']['fields']['haa_codes_id1_c']['inline_edit']=1;

 

 // created: 2016-08-02 20:55:48
$dictionary['Account']['fields']['haa_codes_id2_c']['inline_edit']=1;

 

 // created: 2016-06-16 16:47:57
$dictionary['Account']['fields']['haa_codes_id_c']['inline_edit']=1;

 

 // created: 2016-08-27 07:20:05
$dictionary['Account']['fields']['haa_frameworks_id_c']['inline_edit']=1;

 

 // created: 2016-08-02 20:56:15
$dictionary['Account']['fields']['is_asset_org_c']['inline_edit']='';
$dictionary['Account']['fields']['is_asset_org_c']['labelValue']='资产组织？';

 

 // created: 2016-02-17 08:27:58
$dictionary['Account']['fields']['is_cooperation_group_c']['inline_edit']='1';
$dictionary['Account']['fields']['is_cooperation_group_c']['labelValue']='Cooperation Group';

 

 // created: 2016-06-16 16:54:08
$dictionary['Account']['fields']['is_customer_c']['inline_edit']='';
$dictionary['Account']['fields']['is_customer_c']['labelValue']='Is Customer?';

 

 // created: 2016-02-16 20:45:20
$dictionary['Account']['fields']['is_le_c']['inline_edit']='';
$dictionary['Account']['fields']['is_le_c']['labelValue']='Legal Entity';

 

 // created: 2016-02-16 20:45:05
$dictionary['Account']['fields']['is_ou_c']['inline_edit']='';
$dictionary['Account']['fields']['is_ou_c']['labelValue']='Operation Unit';

 

 // created: 2016-06-16 16:54:35
$dictionary['Account']['fields']['is_supplier_c']['inline_edit']='';
$dictionary['Account']['fields']['is_supplier_c']['labelValue']='is supplier';

 

 // created: 2016-02-06 22:15:30
$dictionary['Account']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

 // created: 2016-02-06 22:15:30
$dictionary['Account']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2016-02-06 22:15:30
$dictionary['Account']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 

 // created: 2016-02-06 22:15:30
$dictionary['Account']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 

 // created: 2016-06-16 16:47:57
$dictionary['Account']['fields']['organization_level_c']['inline_edit']='';
$dictionary['Account']['fields']['organization_level_c']['labelValue']='organization level';

 

 // created: 2016-06-16 16:33:34
$dictionary['Account']['fields']['organization_number_c']['inline_edit']='';
$dictionary['Account']['fields']['organization_number_c']['labelValue']='organization number';

 

 // created: 2016-02-16 21:17:56
$dictionary['Account']['fields']['org_type_c']['inline_edit']='1';
$dictionary['Account']['fields']['org_type_c']['labelValue']='Org Type';

 

 // created: 2016-02-16 21:16:20
$dictionary['Account']['fields']['registration_capital_c']['inline_edit']='1';
$dictionary['Account']['fields']['registration_capital_c']['labelValue']='Capital of Registration';

 

 // created: 2016-02-16 21:03:39
$dictionary['Account']['fields']['registration_id_c']['inline_edit']='1';
$dictionary['Account']['fields']['registration_id_c']['labelValue']='Registration ID';

 

 // created: 2016-02-16 21:03:19
$dictionary['Account']['fields']['registration_id_to_c']['inline_edit']='1';
$dictionary['Account']['fields']['registration_id_to_c']['labelValue']='Registration ID To';

 

 // created: 2016-06-16 16:35:12
$dictionary['Account']['fields']['responsible_person_c']['inline_edit']='';
$dictionary['Account']['fields']['responsible_person_c']['labelValue']='Responsible Person';

 

 // created: 2016-06-16 16:38:40
$dictionary['Account']['fields']['responsible_person_id_c']['inline_edit']='';
$dictionary['Account']['fields']['responsible_person_id_c']['labelValue']='Responsible Person ID';

 

 // created: 2016-06-16 16:39:27
$dictionary['Account']['fields']['responsible_person_note_c']['inline_edit']='';
$dictionary['Account']['fields']['responsible_person_note_c']['labelValue']='Responsible Person Note';

 

 // created: 2016-08-27 07:32:17
$dictionary['Account']['fields']['sales_note_c']['inline_edit']='';
$dictionary['Account']['fields']['sales_note_c']['labelValue']='Sales Note';

 

 // created: 2016-06-16 16:59:36
$dictionary['Account']['fields']['sales_org_c']['inline_edit']='';
$dictionary['Account']['fields']['sales_org_c']['labelValue']='Sales Org. /Dept.';

 

 // created: 2016-08-27 07:33:40
$dictionary['Account']['fields']['sales_person_desc_c']['inline_edit']='';
$dictionary['Account']['fields']['sales_person_desc_c']['labelValue']='Sales Person Desc';

 

 // created: 2016-06-16 17:01:11
$dictionary['Account']['fields']['sales_responsible_person_c']['inline_edit']='';
$dictionary['Account']['fields']['sales_responsible_person_c']['labelValue']='Sales Responsible Person';

 

 // created: 2016-08-27 07:33:03
$dictionary['Account']['fields']['service_note_c']['inline_edit']='';
$dictionary['Account']['fields']['service_note_c']['labelValue']='Service Note';

 

 // created: 2016-06-16 17:00:03
$dictionary['Account']['fields']['service_org_c']['inline_edit']='';
$dictionary['Account']['fields']['service_org_c']['labelValue']='Service Org. /Dept.';

 

 // created: 2016-08-27 07:34:07
$dictionary['Account']['fields']['service_person_desc_c']['inline_edit']='';
$dictionary['Account']['fields']['service_person_desc_c']['labelValue']='Service Person Desc';

 

 // created: 2016-06-16 17:01:42
$dictionary['Account']['fields']['service_responsible_person_c']['inline_edit']='';
$dictionary['Account']['fields']['service_responsible_person_c']['labelValue']='Service Responsible Person';

 
?>