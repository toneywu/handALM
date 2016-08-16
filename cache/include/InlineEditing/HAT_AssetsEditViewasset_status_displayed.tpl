
{if strlen($fields.asset_status_displayed.value) <= 0}
{assign var="value" value=$fields.asset_status_displayed.default_value }
{else}
{assign var="value" value=$fields.asset_status_displayed.value }
{/if}  
<input type='text' name='{$fields.asset_status_displayed.name}' 
    id='{$fields.asset_status_displayed.name}' size='30' 
     
    value='{$value}' title=''  tabindex='1'      >