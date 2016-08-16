
{if strlen($fields.name.value) <= 0}
{assign var="value" value=$fields.name.default_value }
{else}
{assign var="value" value=$fields.name.value }
{/if}  
<input type='text' name='{$fields.name.name}' 
    id='{$fields.name.name}' size='30' 
    maxlength='255' 
    value='{$value}' title=''  tabindex='1'      >