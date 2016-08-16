
{if strval($fields.asset_node.value) == "1" || strval($fields.asset_node.value) == "yes" || strval($fields.asset_node.value) == "on"} 
{assign var="checked" value="CHECKED"}
{else}
{assign var="checked" value=""}
{/if}
<input type="hidden" name="{$fields.asset_node.name}" value="0"> 
<input type="checkbox" id="{$fields.asset_node.name}" 
name="{$fields.asset_node.name}" 
value="1" title='' tabindex="1" {$checked} >