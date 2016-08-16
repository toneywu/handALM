<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2016-02-08 10:53:31
$dictionary["HAT_Asset_Trans_Batch"]["fields"]["hat_asset_trans_batch_hat_asset_trans"] = array (
  'name' => 'hat_asset_trans_batch_hat_asset_trans',
  'type' => 'link',
  'relationship' => 'hat_asset_trans_batch_hat_asset_trans',
  'source' => 'non-db',
  'module' => 'HAT_Asset_Trans',
  'bean_name' => 'HAT_Asset_Trans',
  'side' => 'right',
  'vname' => 'LBL_HAT_ASSET_TRANS_BATCH_HAT_ASSET_TRANS_FROM_HAT_ASSET_TRANS_TITLE',
);

 
$dictionary['HAT_Asset_Trans_Batch']['fields']['line_items'] = array(
                'required' => false,
                'name' => 'line_items',
                'vname' => 'LBL_LINE_ITEMS',
                'type' => 'function',
                'source' => 'non-db',
                'massupdate' => 0,
                'importable' => 'false',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => 0,
                'audited' => false,
                'reportable' => false,
                'function' =>
                    array(
                        'name' => 'display_lines',
                        'returns' => 'html',
                        'include' => 'modules/HAT_Asset_Trans_Batch/Render_Line_Items.php'
                    ),
	);


 // created: 2016-02-17 12:47:11
$dictionary['HAT_Asset_Trans_Batch']['fields']['account_id1_c']['inline_edit']=1;

 

 // created: 2016-02-17 12:42:51
$dictionary['HAT_Asset_Trans_Batch']['fields']['account_id_c']['inline_edit']=1;

 

 // created: 2016-02-17 12:42:51
$dictionary['HAT_Asset_Trans_Batch']['fields']['current_organization_c']['inline_edit']='';
$dictionary['HAT_Asset_Trans_Batch']['fields']['current_organization_c']['labelValue']='Current Organization';

 

 // created: 2016-02-20 20:12:50
$dictionary['HAT_Asset_Trans_Batch']['fields']['event_type_c']['inline_edit']='';
$dictionary['HAT_Asset_Trans_Batch']['fields']['event_type_c']['labelValue']='Event Type';

 

 // created: 2016-02-20 20:12:50
$dictionary['HAT_Asset_Trans_Batch']['fields']['hat_eventtype_id_c']['inline_edit']=1;

 

 // created: 2016-02-26 09:51:33
$dictionary['HAT_Asset_Trans_Batch']['fields']['target_organization_c']['inline_edit']='1';
$dictionary['HAT_Asset_Trans_Batch']['fields']['target_organization_c']['labelValue']='Target Organization';

 
?>