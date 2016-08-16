
{if strlen($fields.asset_desc.value) <= 0}
{assign var="value" value=$fields.asset_desc.default_value }
{else}
{assign var="value" value=$fields.asset_desc.value }
{/if}  
<input type='text' name='{$fields.asset_desc.name}' 
    id='{$fields.asset_desc.name}' size='30' 
    maxlength='255' 
    value='{$value}' title=''  tabindex='1'      >