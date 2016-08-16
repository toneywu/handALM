<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAA_MapsViewEdit extends ViewEdit {
	function HAA_MapsViewEdit(){
 		parent::ViewEdit();
 	}

    function display(){

        global $app_strings,$sugar_config;

        isset($this->bean->map_file) ? $image = $this->bean->map_file : $image = '';


        //$temp = str_replace($sugar_config['site_url'].'/'.$sugar_config['upload_dir'],"", $image);
        $temp = str_replace($sugar_config['site_url'].'/'.$sugar_config['upload_dir'],"", $image);
        $html = '<span id=\'new_attachment\' style=\'display:';
        if(!empty($this->bean->map_file)){
            $html .= 'none';
        }
        $html .= '\'><input name="uploadimage" tabindex="3" type="file" size="60"/>
        	</span>
		<span id=\'old_attachment\' style=\'display:';
        if (empty($image)){
            $html .= 'none';
        }
        $html .= '\'><input type=\'hidden\' id=\'deleteAttachment\' name=\'deleteAttachment\' value=\'0\'>
		'.$temp.'<input type=\'hidden\' name=\'old_product_image\' value=\''.$image.'\'/>
		<input type=\'button\' class=\'button\' value=\''.$app_strings['LBL_REMOVE'].'\' onclick=\'deleteMapImage();\' >
		</span>';

        $this->ss->assign('MAP_IMAGE',$html);
        parent::display();
    }
}
?>
