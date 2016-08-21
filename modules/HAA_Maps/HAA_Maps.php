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

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/HAA_Maps/HAA_Maps_sugar.php');
class HAA_Maps extends HAA_Maps_sugar {

	function __construct(){
		parent::__construct();
	}

	function save($check_notify=false){
		global $sugar_config,$mod_strings;

		if (isset($_POST['deleteAttachment']) && $_POST['deleteAttachment']=='1') {
			$this->map_file = '';
		}

		require_once('include/upload_file.php');
		$GLOBALS['log']->debug('UPLOADING MAP IMAGE');
		$upload_file = new UploadFile('uploadfile');

		if (isset($_FILES['uploadimage']['tmp_name'])&&$_FILES['uploadimage']['tmp_name']!=""){

			if($_FILES['uploadimage']['size'] > $sugar_config['upload_maxsize']) {
				die($mod_strings['LBL_IMAGE_UPLOAD_FAIL'].$sugar_config['upload_maxsize']);
			} else {
            	//如果当前尺寸（只验证了文件大小，没有验证长宽尺寸）为许可范围，则开始上传
            	$upload_path = $sugar_config['upload_dir'].'haa_maps/'; //文件上传的路径
            	if (empty($this->id)){
	            	$this->id = create_guid();//来自己分配一个GUID
	            	$this->new_with_id = true;//以此处的ID进行数据保存
	            }
	            $upload_filename = $this->id.substr($_FILES['uploadimage']['name'],-4); 
            	//文件名这个例子中用当前模型对象名称作为文件名，substr($_FILES['uploadimage']['name'],-4)j是为了取得当前文件后缀名
            	//如果需要以上传文件名，可引用$_FILES['uploadimage']['name']
	            $this->logo_image=$upload_path.$upload_filename;
	            move_uploaded_file($_FILES['uploadimage']['tmp_name'], $upload_path.$upload_filename);
	        }
	    }

	    parent::save($check_notify);
    }
	
}
?>