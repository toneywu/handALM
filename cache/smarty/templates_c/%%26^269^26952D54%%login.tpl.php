<?php /* Smarty version 2.6.29, created on 2016-08-15 22:22:10
         compiled from themes/SuiteR_HANDALM/tpls/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_translate', 'themes/SuiteR_HANDALM/tpls/login.tpl', 45, false),)), $this); ?>
<!--
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

/*********************************************************************************

 ********************************************************************************/
-->
<script type='text/javascript'>
var LBL_LOGIN_SUBMIT = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LOGIN_SUBMIT'), $this);?>
';
var LBL_REQUEST_SUBMIT = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_REQUEST_SUBMIT'), $this);?>
';
var LBL_SHOWOPTIONS = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_SHOWOPTIONS'), $this);?>
';
var LBL_HIDEOPTIONS = '<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_HIDEOPTIONS'), $this);?>
';
</script>
<!-- Start login container -->
<div class="container">
    <div id="loginform">
    <form class="form-signin" role="form" action="index.php" method="post" name="DetailView" id="form" onsubmit="return document.getElementById('cant_login').value == ''">
        <div class="companylogo"><?php echo $this->_tpl_vars['LOGIN_IMAGE']; ?>
</div>
        <span class="error" id="browser_warning" style="display:none">
            <?php echo smarty_function_sugar_translate(array('label' => 'WARN_BROWSER_VERSION_WARNING'), $this);?>

        </span>
		<span class="error" id="ie_compatibility_mode_warning" style="display:none">
		<?php echo smarty_function_sugar_translate(array('label' => 'WARN_BROWSER_IE_COMPATIBILITY_MODE_WARNING'), $this);?>

		</span>
        <?php if ($this->_tpl_vars['LOGIN_ERROR'] != ''): ?>
            <span class="error"><?php echo $this->_tpl_vars['LOGIN_ERROR']; ?>
</span>
            <?php if ($this->_tpl_vars['WAITING_ERROR'] != ''): ?>
                <span class="error"><?php echo $this->_tpl_vars['WAITING_ERROR']; ?>
</span>
            <?php endif; ?>
        <?php else: ?>
            <span id='post_error' class="error"></span>
        <?php endif; ?>
        <input type="hidden" name="module" value="Users">
        <input type="hidden" name="action" value="Authenticate">
        <input type="hidden" name="return_module" value="Users">
        <input type="hidden" name="return_action" value="Login">
        <input type="hidden" id="cant_login" name="cant_login" value="">
        <?php $_from = $this->_tpl_vars['LOGIN_VARS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['var']):
?>
            <input type="hidden" name="<?php echo $this->_tpl_vars['key']; ?>
" value="<?php echo $this->_tpl_vars['var']; ?>
">
        <?php endforeach; endif; unset($_from); ?>
        <br>
        <?php if (! empty ( $this->_tpl_vars['SELECT_LANGUAGE'] )): ?>
                <?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LANGUAGE'), $this);?>
:
                <select name='login_language' onchange="switchLanguage(this.value)"><?php echo $this->_tpl_vars['SELECT_LANGUAGE']; ?>
</select>
        <?php endif; ?>
        <br>
        <br>
        <div class="input-group">
            <span class="input-group-addon logininput glyphicon glyphicon-user"></span>
            <input type="text" class="form-control" placeholder="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_USER_NAME'), $this);?>
" required autofocus tabindex="1" id="user_name" name="user_name"  value='<?php echo $this->_tpl_vars['LOGIN_USER_NAME']; ?>
' />
        </div>
        <br>
        <div class="input-group">
            <span class="input-group-addon logininput glyphicon glyphicon-lock"></span>
            <input type="password" class="form-control" placeholder="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_PASSWORD'), $this);?>
" tabindex="2" id="user_password" name="user_password" value='<?php echo $this->_tpl_vars['LOGIN_PASSWORD']; ?>
' />
        </div>
        <br>
        <input id="bigbutton" class="btn btn-lg btn-primary btn-block" type="submit" title="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LOGIN_BUTTON_TITLE'), $this);?>
" tabindex="3" name="Login" value="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LOGIN_BUTTON_LABEL'), $this);?>
">
        <div id="forgotpasslink" style="cursor: pointer; display:<?php echo $this->_tpl_vars['DISPLAY_FORGOT_PASSWORD_FEATURE']; ?>
;" onclick='toggleDisplay("forgot_password_dialog");'>
            <a href='javascript:void(0)'><?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LOGIN_FORGOT_PASSWORD'), $this);?>
</a>
        </div>
    </form>
        <form class="form-signin passform" role="form" action="index.php" method="post" name="DetailView" id="form" name="fp_form" id="fp_form" >
            <div id="forgot_password_dialog" style="display:none" >
                <input type="hidden" name="entryPoint" value="GeneratePassword">
                <div id="generate_success" class='error' style="display:inline;"></div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon logininput glyphicon glyphicon-user"></span>
                    <input type="text" class="form-control" size='26' id="fp_user_name" name="fp_user_name"  value='<?php echo $this->_tpl_vars['LOGIN_USER_NAME']; ?>
' placeholder="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_USER_NAME'), $this);?>
"/>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon logininput glyphicon glyphicon-envelope"></span>
                    <input type="text" class="form-control" size='26' id="fp_user_mail" name="fp_user_mail" value ='' placeholder="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_EMAIL'), $this);?>
">
                </div>
                <br>
                <?php echo $this->_tpl_vars['CAPTCHA']; ?>

                <div id='wait_pwd_generation'></div>
                <input title="Email Temp Password" class="button  btn-block" type="button" style="display:inline" onclick="validateAndSubmit(); return document.getElementById('cant_login').value == ''" id="generate_pwd_button" name="fp_login" value="<?php echo smarty_function_sugar_translate(array('module' => 'Users','label' => 'LBL_LOGIN_SUBMIT'), $this);?>
">
            </div>
        </form>
    </div>
</div>
<!-- End login container -->