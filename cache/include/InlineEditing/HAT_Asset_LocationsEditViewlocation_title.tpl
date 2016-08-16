
{if strlen($fields.location_title.value) <= 0}
{assign var="value" value=$fields.location_title.default_value }
{else}
{assign var="value" value=$fields.location_title.value }
{/if}  
<input type='text' name='{$fields.location_title.name}' 
    id='{$fields.location_title.name}' size='30' 
    maxlength='255' 
    value='{$value}' title=''  tabindex='1'      >