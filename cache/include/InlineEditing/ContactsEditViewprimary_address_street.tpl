
{if strlen($fields.primary_address_street.value) <= 0}
{assign var="value" value=$fields.primary_address_street.default_value }
{else}
{assign var="value" value=$fields.primary_address_street.value }
{/if}  
<input type='text' name='{$fields.primary_address_street.name}' 
    id='{$fields.primary_address_street.name}' size='30' 
    maxlength='150' 
    value='{$value}' title=''  tabindex='1'      >