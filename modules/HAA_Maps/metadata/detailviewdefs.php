<?php
$module_name = 'HAA_Maps';
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
          3 => 'FIND_DUPLICATES',
        ),
      ),

      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/HAA_Maps/js/detailview_map_point.js',
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
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'description',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'map_file',
            'studio' => 'visible',
            'label' => 'LBL_MAP_FILE',
            //'customCode' => '<img src="{$fields.map_file.value}" style="width:80%"/>',
            'customCode' => '<input type="hidden" value="{$fields.map_file.value}" id="map_url".><div id="cuxMap" style="background-color: #efefef; height: 20px; width: 80%;">map will be loaded here</div>',
          ),
        ),
      ),
    ),
  ),
);
?>
