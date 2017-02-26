<script type="text/javascript" src="modules/Project/codebase/dhtmlxgantt.js"></script>
<script type="text/javascript" src="modules/Project/codebase/locale/locale_cn.js"></script>
<link rel="stylesheet" type="text/css" href="modules/Project/codebase/dhtmlxgantt.css">
<div class="moduleTitle">
	<h2> Create new plan for the annual audit </h2>
	<div class="clear"></div>
	<br><a class="utilsLink" href="index.php?module=Project&action=DetailView&record={$record} &return_module=Project&return_action=view_GanttChart" id="create_link">View Details</a>
	<div class="clear"><input type="height" name="project_id" id="project_id" value="{$record}"></div>
</div>
<div class="yui-navset detailview_tabs yui-navset-top" id="Project_detailview_tabs">
	<div class="yui-content">    
		<div id="tabcontent0">
			<div id="detailpanel_1" class="detail view  detail508 expanded">
				<table id="project_information" class="panelContainer" cellspacing="0">
					<tbody>
						{foreach from=$prj_val item=val}
						<tr>
							<td scope="col" width="12.5%">{$val[0].label}</td>
							<td class="inlineEdit" width="37.5%">{$val[0].value}</td>
							<td scope="col" width="12.5%">{$val[1].label}</td>
							<td class="inlineEdit" width="37.5%">{$val[1].value}</td>
						</tr>
						<tr>
							<td scope="col" width="12.5%">{$val[2].label}</td>
							<td class="inlineEdit" width="37.5%">{$val[2].value}</td>
							<td scope="col" width="12.5%">{$val[3].label}</td>
							<td class="inlineEdit" width="37.5%">{$val[3].value}</td>
						</tr>
						 <tr>
							<td scope="col" width="12.5%">{$val[4].label}</td>
							<td class="inlineEdit" width="37.5%">{$val[4].value}</td>
							<!--<td scope="col" width="12.5%">{$val[5].label}</td>
							<td class="" width="37.5%">{$val[5].value}</td>-->
						</tr> 
						
						{/foreach}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="gantt_here" style='width:100%; height:400px;'>
</div>
<script type="text/javascript" src="modules/Project/js/gantt.config.js"></script>