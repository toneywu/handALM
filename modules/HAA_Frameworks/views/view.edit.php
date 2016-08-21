<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAA_FrameworksViewEdit extends ViewEdit {

	function HAA_FrameworksViewEdit(){
 		parent::ViewEdit();
 	}

    function display(){

        //这里处理上传字段，代码参考来源于AOS_Products
        //返回LOGO_IMAGE，显示以下内容：
        //1）Input type=file name=uploadimage; 
        //2) span old_attachment, input type=hidden id=deleteAttachment, input type=hidden id=old_log_image, button

        global $app_strings,$sugar_config;


        isset($this->bean->logo_image) ? $image = $this->bean->logo_image : $image = '';


        $temp = str_replace($sugar_config['site_url'].'/'.$sugar_config['upload_dir'],"", $image);
        $html = '<span id=\'new_attachment\' style=\'display:';
        if(!empty($this->bean->logo_image)){
            $html .= 'none';
        }
        $html .= '\'><input name="uploadimage" tabindex="3" type="file"  accept="image/png,image/gif,image/jpg" size="60"/>
        	</span>
		<span id=\'old_attachment\' style=\'display:';
        if (empty($image)){
            $html .= 'none';
        }
        $html .= '\'>
        <input type=\'hidden\' id=\'deleteAttachment\' name=\'deleteAttachment\' value=\'0\'>
		'.$temp.'<input type=\'hidden\' name=\'old_logo_image\' value=\''.$image.'\'/>
		<input type=\'button\' class=\'button\' value=\''.$app_strings['LBL_REMOVE'].'\' onclick=\'deleteLOGOImage();\' >
		</span>';

        $this->ss->assign('LOGO_IMAGE',$html);
        parent::display();
    }
}
?>
