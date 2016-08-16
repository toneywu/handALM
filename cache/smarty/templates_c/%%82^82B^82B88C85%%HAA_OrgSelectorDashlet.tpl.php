<?php /* Smarty version 2.6.29, created on 2016-08-14 21:20:14
         compiled from modules/Home/Dashlets/HAA_OrgSelectorDashlet/HAA_OrgSelectorDashlet.tpl */ ?>

<div id="HAA_OrgSeletor_Domain_<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['domainLbl']; ?>
</div>
<select>
<option></option>
	<?php echo $this->_tpl_vars['domain_field']; ?>

</select>
<button onclick='OrgSelector.clicked(this, "<?php echo $this->_tpl_vars['id']; ?>
")'>set</button>

<!-- <div id="HAA_OrgSeletor_Site_<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['siteLbl']; ?>
</div>
<select>
	<option></option>
	<option value="1b48b5d5-ed90-68e1-d7ef-56d51da0441d">全上海地区-维护区域</option>
	<option value="7bb22b32-5a18-fb93-b8f2-56e66d6fd1f2">玄武高中-太平门校区</option>
</select>
 -->

<!-- <div id='jotpad_<?php echo $this->_tpl_vars['id']; ?>
' ondblclick='JotPad.edit(this, "<?php echo $this->_tpl_vars['id']; ?>
")' style='overflow: auto; width: 100%; height: <?php echo $this->_tpl_vars['height']; ?>
px; border: 1px #ddd solid'><?php echo $this->_tpl_vars['savedText']; ?>
</div>
<textarea id='jotpad_textarea_<?php echo $this->_tpl_vars['id']; ?>
' rows="5" onblur='JotPad.blur(this, "<?php echo $this->_tpl_vars['id']; ?>
")' style='display: none; width: 100%; height: <?php echo $this->_tpl_vars['height']; ?>
px; overflow: auto'></textarea> -->