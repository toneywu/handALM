
{if strlen($fields.target_asset_status.value) <= 0}
{assign var="value" value=$fields.target_asset_status.default_value }
{else}
{assign var="value" value=$fields.target_asset_status.value }
{/if}  
<input type='text' name='{$fields.target_asset_status.name}' 
    id='{$fields.target_asset_status.name}' size='30' 
     
    value='{$value}' title=''  tabindex='1'      >