<?php
$module_name = 'HAM_SR';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
         // 3 => 'FIND_DUPLICATES',
        ),
      ),
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HAM_SR/js/detailview_map_point.js',
        ),
        1 => 
        array (
          'file' => 'modules/HAM_SR/js/HAM_SR_detailview.js',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'sr_number',
            'label' => 'LBL_SR_NUMBER',
          ),
          1 => 
          array (
            'name' => 'sr_status',
            'studio' => 'visible',
            'label' => 'LBL_SR_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'site',
            'studio' => 'visible',
            'label' => 'LBL_SITE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'priority',
            'studio' => 'visible',
            'label' => 'LBL_PRIORITY',
          ),
          1 => 
          array (
            'name' => 'reported_date',
            'label' => 'LBL_REPORTED_DATE',
          ),
        ),
        3 => 
        array (
          0 => 'description',
        ),
        4 => 
        array (
          0 => array(
            'name'=>'ham_wo_name',
/*            'default' => true,
            'related_fields' => 
            array ( 
               0 => 'ham_wo_number', // your field name in all small letters
              ),*/
            //'customCode' => '{$HAM_WO_NAME}', // your field name in ALL CAPITAL LETTERS
          ),

          1 => 'ham_wo_status',
          ),
     
/*        5 => 
        array (
          0 => 'ham_wo_number',
          1 => '',
          ),*/
         ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'location',
            'studio' => 'visible',
            'label' => 'LBL_LOCATION',
          ),
          1 => 
          array (
            'name' => 'asset',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'location_extra_desc',
            'label' => 'LBL_LOCATION_EXTRA_DESC',
          ),
          1 => 
          array (
            'name' => 'map_enabled',
            'studio' => 'visible',
            'label' => 'LBL_MAPS_ENABLED',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'map_search_area',
            'label' => 'LBL_MAP_SEARCH_AREA',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'map_type',
            'label' => 'LBL_MAP_TYPE',
          ),
          1 => 
          array (
            'name' => 'map_zoom',
            'label' => 'LBL_MAP_ZOOM',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'map_lat',
            'label' => 'LBL_MAP_LAT',
          ),
          1 => 
          array (
            'name' => 'map_lng',
            'label' => 'LBL_MAP_LNG',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'map_display_area',
            'label' => 'LBL_MAP_DISPLAY_AREA',
            'customCode' => '<div id="cuxMap" style="background-color: #efefef; height: 20px; width: 80%;">map will be loaded here</div>',
          ),
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'reporter',
            'studio' => 'visible',
            'label' => 'LBL_REPORTER',
          ),
          1 => 
          array (
            'name' => 'reporter_org',
            'studio' => 'visible',
            'label' => 'LBL_REPORTER_ORG',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'work_phone',
            'label' => 'LBL_WORK_PHONE',
          ),
          1 => 
          array (
            'name' => 'mobile',
            'label' => 'LBL_MOBILE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'email',
            'label' => 'LBL_EMAIL',
          ),
          1 => 
          array (
            'name' => 'created_by_name',
            'label' => 'LBL_CREATED',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'contact_by',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_BY',
          ),
          1 => 
          array (
            'name' => 'contact_notes',
            'label' => 'LBL_CONTACT_NOTES',
          ),
        ),
      ),
    ),
  ),
);
?>
