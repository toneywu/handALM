<?php /* Smarty version 2.6.29, created on 2016-08-24 09:44:58
         compiled from modules/Alerts/templates/default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strstr', 'modules/Alerts/templates/default.tpl', 7, false),array('modifier', 'nl2br', 'modules/Alerts/templates/default.tpl', 21, false),)), $this); ?>
<?php echo $this->_tpl_vars['Flash']; ?>


<?php $_from = $this->_tpl_vars['Results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['result']):
?>
    <div class="alert alert-<?php if ($this->_tpl_vars['result']->type != null): ?><?php echo $this->_tpl_vars['result']->type; ?>
<?php else: ?>info<?php endif; ?> alert-dismissible module-alert" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="Alerts.prototype.markAsRead('<?php echo $this->_tpl_vars['result']->id; ?>
');"><span aria-hidden="true">&times;</span></button>
        <h4>
        <?php if ($this->_tpl_vars['result']->url_redirect != null && ! ( ((is_array($_tmp=$this->_tpl_vars['result']->url_redirect)) ? $this->_run_mod_handler('strstr', true, $_tmp, 'fake_') : strstr($_tmp, 'fake_')) )): ?>
        <a class="alert-link text-<?php if ($this->_tpl_vars['result']->type != null): ?><?php echo $this->_tpl_vars['result']->type; ?>
<?php else: ?>info<?php endif; ?>" href="index.php?module=Alerts&action=redirect&record=<?php echo $this->_tpl_vars['result']->id; ?>
">
        <?php endif; ?>
            <?php if ($this->_tpl_vars['result']->target_module != null): ?>
                <img src="index.php?entryPoint=getImage&themeName=SuiteR+&imageName=<?php echo $this->_tpl_vars['result']->target_module; ?>
s.gif"/>
                <strong class="text-<?php if ($this->_tpl_vars['result']->type != null): ?><?php echo $this->_tpl_vars['result']->type; ?>
<?php else: ?>info<?php endif; ?>"><?php echo $this->_tpl_vars['result']->target_module; ?>
</strong>
            <?php else: ?>
                <strong class="text-<?php if ($this->_tpl_vars['result']->type != null): ?><?php echo $this->_tpl_vars['result']->type; ?>
<?php else: ?>info<?php endif; ?>">Alert</strong>
            <?php endif; ?>
        <?php if ($this->_tpl_vars['result']->url_redirect != null): ?>
        </a>
        <?php endif; ?>
        </h4>
        <p>
            <?php echo ((is_array($_tmp=$this->_tpl_vars['result']->name)) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
<br/>
            <?php echo ((is_array($_tmp=$this->_tpl_vars['result']->description)) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

        </p>
    </div>
<?php endforeach; endif; unset($_from); ?>
