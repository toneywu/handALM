
{if strlen($fields.current_responsible_person.value) <= 0}
{assign var="value" value=$fields.current_responsible_person.default_value }
{else}
{assign var="value" value=$fields.current_responsible_person.value }
{/if}  
<input type='text' name='{$fields.current_responsible_person.name}' 
    id='{$fields.current_responsible_person.name}' size='30' 
    maxlength='255' 
    value='{$value}' title=''  tabindex='1'      >