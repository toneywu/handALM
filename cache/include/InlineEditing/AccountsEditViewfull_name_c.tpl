
{if strlen($fields.full_name_c.value) <= 0}
{assign var="value" value=$fields.full_name_c.default_value }
{else}
{assign var="value" value=$fields.full_name_c.value }
{/if}  
<input type='text' name='{$fields.full_name_c.name}' 
    id='{$fields.full_name_c.name}' size='30' 
    maxlength='255' 
    value='{$value}' title=''  tabindex='1'      >