
{if strlen($fields.map_display_area.value) <= 0}
{assign var="value" value=$fields.map_display_area.default_value }
{else}
{assign var="value" value=$fields.map_display_area.value }
{/if}  
<input type='text' name='{$fields.map_display_area.name}' 
    id='{$fields.map_display_area.name}' size='30' 
     
    value='{$value}' title=''  tabindex='1'      >