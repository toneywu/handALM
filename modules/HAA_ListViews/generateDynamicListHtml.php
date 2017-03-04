<?php
/**
 * Advanced OpenSales, Advanced, robust set of sales modules.
 * @package Advanced OpenSales for SugarCRM
 * @copyright SalesAgility Ltd http://www.salesagility.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SalesAgility <info@salesagility.com>
 */

class generateDynamicListHtml {

	var $listviewSet=array();
	var $popup_line=array();
	var $listViewId="";

	function parseListViewSet($listviewCode,$frameworkId='',$nowpage=1) {
		global $current_user,$current_language,$db;
		$current_user_id =$current_user->id;
		if($nowpage == ""){
			$nowpage = 1;
		}
		if ($frameworkId==''){
			$frameworkId=$_SESSION["current_framework"];
		}
		if ($frameworkId==''){
			$frameworkId=$current_user->haa_frameworks_id1_c;
		}
		
		$this->listviewSet["is_correct"]= true;
		$this->listviewSet["error_msg"]='';
		if ($frameworkId!=''){
			$beanListview = BeanFactory :: getBean('HAA_ListViews')->retrieve_by_string_fields(array (
				'listview_code' => $listviewCode,
				'haa_frameworks_id_c' => $frameworkId
				));
		}
		else
		{
			$beanListview = BeanFactory :: getBean('HAA_ListViews')->retrieve_by_string_fields(array (
				'listview_code' => $listviewCode,
				));
		}

		if ($beanListview) { 
			$this->listViewId=isset($beanListview->id)?$beanListview->id:'';
		}
		else{
			$this->listviewSet["is_correct"]= false;
			$this->listviewSet["error_msg"]= '传入的动态视图列表代码：'.$listviewCode." 非法。";	
		}


		$bean_v = BeanFactory::getBean('HAA_ListViews',$this->listViewId);
		$this->listviewSet["title"] = $bean_v->name;
		$view_name = $bean_v->data_source_view_name;
		$where_clause = $bean_v->where_clause;
		if($where_clause == ""){
			$where_clause = "1=1";
		}

    //处理默认关键字
		$where_clause=str_replace("%CURR_FRAME_ID%", "'".$frameworkId."'", $where_clause);
		$where_clause=str_replace("%CURR_USER_ID%", "'".$current_user_id."'", $where_clause);

		$sort_order = "";
		$sort_column1 = $bean_v->sort_column1;
		$sort_column1_order = $bean_v->sort_column1_order;
		if ($sort_column1 != "") {
			$sort_order .= $sort_column1." ".$sort_column1_order;
		}
		$sort_column2 = $bean_v->sort_column2;
		$sort_column2_order = $bean_v->sort_column2_order;
		if ($sort_column2 != "") {
			$sort_order .= ",".$sort_column2." ".$sort_column2_order;
		}
		$sort_column3 = $bean_v->sort_column3;
		$sort_column3_order = $bean_v->sort_column3_order;
		if ($sort_column3 != "") {
			$sort_order .= ",".$sort_column3." ".$sort_column3_order;
		}
		$sort_column4 = $bean_v->sort_column4;
		$sort_column4_order = $bean_v->sort_column4_order;
		if ($sort_column4 != "") {
			$sort_order .= ",".$sort_column4." ".$sort_column4_order;
		}
		$page_rows = $bean_v->page_rows;
		$this->listviewSet["page_rows"] = $page_rows;

    //获取页数
		$sql1 = "";
		$sql1 .= "SELECT count(1) sumpage "." FROM ".$view_name. " WHERE " .$where_clause;

		$result1=$db->query($sql1);

		if ($result1 == false) {
			$this->listviewSet["is_correct"]= false;
			$this->listviewSet["error_msg"]= $sql1;
			return;
		}

		$row1=$db->fetchByAssoc($result1);
		$this->listviewSet["sumpage"] = ceil($row1["sumpage"]/$page_rows);
		$this->listviewSet["sum"] = $row1["sumpage"];

		if ($nowpage > $this->listviewSet["sumpage"]) {
			$nowpage = $this->listviewSet["sumpage"];
		}
		if ($nowpage < 1) {
			$nowpage = 1;
		}
		$n = ($nowpage - 1)*$page_rows;
		$this->listviewSet["nowpage"] = $nowpage; 
		
    //获取列
		$sql_column = "SELECT DISTINCT
		%field_lable% lable_name,
		c.column_name,
		c.link_id_column,
		c.link_module,
		c.display_type_code,
		c.value_return_flag,
		c.popup_visible_flag,
		c.dashlet_visible_flag,
		c.cell_alignment_code,
		c.display_hsize,
		c.query_allowed_flag,
		c.header_alignment_code
		FROM
		haa_listview_columns c 
		WHERE c.deleted = 0
		AND c.enabled_flag = 1
		AND c.haa_listviews_id_c = '".$this->listViewId."' 
		ORDER BY
		c.sort_order";
		if ($current_language == "zh_CN") {
			$sql_column=str_replace("%field_lable%", "c.field_lable_zhs", $sql_column);
		}else{
			$sql_column=str_replace("%field_lable%", "c.field_lable_us", $sql_column);
		}

		$result_column=$db->query($sql_column);
		$list_column="";
		while($row_column=$db->fetchByAssoc($result_column)){
			if ($row_column['column_name'] != '') {
				$list_column .= $row_column['column_name'].",";
				$this->listviewSet["column"][]= $row_column['lable_name'];
				$this->listviewSet["popup_visible"][]= $row_column['popup_visible_flag'];
				$this->listviewSet["dashlet_visible"][]= $row_column['dashlet_visible_flag'];
				$this->listviewSet["value_return"][] = $row_column['value_return_flag'];
				$this->listviewSet["columns"][] = $row_column;
			}
		}

		$list_column = substr($list_column, 0,strlen($list_column)-1);

    //获取数据
		$sql = "";
		$sql .= "SELECT ".$list_column." FROM ".$view_name. " WHERE " .$where_clause. " ORDER BY ". $sort_order. " LIMIT ".$n.",".$page_rows;

		$result_sql=$db->query($sql);
		if ($result_sql == false) {
			$this->listviewSet["is_correct"]= false;
			$this->listviewSet["error_msg"]= $sql;
		}

		while($row_sql=$db->fetchByAssoc($result_sql)){
			$this->listviewSet["data"][]= $row_sql;
			$i = 0;
			foreach ($row_sql as $key=>$value){ 
				if ($this->listviewSet["value_return"][$i] == 1) {
					$new_key = $this->listviewSet["column"][$i];
					$line_data[$new_key] = $value;
				}
				$i++;
			} 
		//点击popup的图标需要获取的数组
			$this->listviewSet["column_popup"][] = $line_data;
			unset($line_data);
		}
	}

	function generateListviewHtml($listviewCode,$pageType,$frameworkId='',$nowpage=1,$elementId=''){
		$this->parseListViewSet($listviewCode,$frameworkId,$nowpage);
		$type=$pageType;
		if ($pageType==''){
			$type='popup';
		}

		$columns = $this->listviewSet["column"];
		
		$popup_visible = $this->listviewSet["popup_visible"];
		$dashlet_visible = $this->listviewSet["dashlet_visible"];

		$column_list = $this->listviewSet["columns"];

		$datas = $this->listviewSet["data"];
		$nowpage = $this->listviewSet["nowpage"];
		$sumpage = $this->listviewSet["sumpage"];
		$sum = $this->listviewSet["sum"];
		$page_rows=$this->listviewSet["page_rows"];
		$is_correct = $this->listviewSet["is_correct"];
		$error_msg = $this->listviewSet["error_msg"];
		$value_return = $this->listviewSet["value_return"];
		$this->popup_line = $this->listviewSet["column_popup"];
		
		$html = "<head>".
		"</head>";
		if ($is_correct) {
			
			$html .= '<table class="list view table footable-loaded footable default" id="html_table" width="100%" cellspacing="0" cellpadding="0" border="0">'.
			'<thead>'.
			'<tr id="pagination" role="presentation">'.
			'<td colspan="19" align="right">'.
			'<table class="paginationTable pull-right col-md-4" cellspacing="0" cellpadding="0" border="0">'.
			'<tbody>'.
			'<tr>'.
			'<td class="paginationChangeButtons" width="1%" nowrap="nowrap" align="right">'.
			'<button id="listViewStartButton_top" class="button" name="listViewStartButton" title="首页" onclick=listPagePreview("'.$listviewCode.'","'.$type.'","'.$frameworkId.'",'.(1).',"'.$elementId.'")>'.
			'<img src="themes/SuiteR_HANDALM/images/start_off.gif?v=6-oABrRk-DYgrmsAywj82w" alt="首页" border="0" align="absmiddle">'.
			'</button>'.
			'<button id="listViewPrevButton_top" class="button" type="button" name="listViewPrevButton" title="上页" onclick=listPagePreview("'.$listviewCode.'","'.$type.'","'.$frameworkId.'",'.($nowpage-1).',"'.$elementId.'")>'.
			'<img src="themes/SuiteR_HANDALM/images/previous_off.gif?v=6-oABrRk-DYgrmsAywj82w" alt="上页" border="0" align="absmiddle">'.
			'</button>'.
			'</td>'.
			'<td class="paginationActionButtons" width="1%" nowrap="nowrap">'.
			'<div class="pageNumbers">('.$nowpage.' - '.$sumpage.' / 总记录条目数： '.$sum.')</div>'.
			'</td>'.
			'<td class="paginationActionButtons" width="1%" nowrap="nowrap" align="right">'.
			'<button id="listViewNextButton_top" class="button" type="button" name="listViewNextButton" title="下页" onclick=listPagePreview("'.$listviewCode.'","'.$type.'","'.$frameworkId.'",'.($nowpage+1).',"'.$elementId.'")>'.
			'<img src="themes/SuiteR_HANDALM/images/next_off.gif?v=6-oABrRk-DYgrmsAywj82w" alt="下页" border="0" align="absmiddle">'.
			'</button>'.
			'<button id="listViewEndButton_top" class="button" type="button" name="listViewEndButton" title="末页" onclick=listPagePreview("'.$listviewCode.'","'.$type.'","'.$frameworkId.'",'.($sumpage).',"'.$elementId.'")>'.
			'<img src="themes/SuiteR_HANDALM/images/end_off.gif?v=6-oABrRk-DYgrmsAywj82w" alt="末页" align="absmiddle">'.
			'</button>'.
			'</td>'.
			'<td class="paginationActionButtons" width="4px" nowrap="nowrap"></td>'.
			'</tr>'.
			'</tbody>'.
			'</table>'.
			'</td>'.
			'</tr>';
			if ($type == "popup") {
				$html .= '<td class="nowrap" width="1%"></td>';
			}
			foreach($columns as $x=>$v){
				if(( $dashlet_visible[$x] == 1&&$type == "dashlet")||($popup_visible[$x] == 1&&$type == "popup")){
					$html .= "<th class='footable-visible' scope='col' >".$columns[$x]."</th>";
				}
			}
			$html .= "</tr>";
			$i = 0;
			foreach($datas as $y=>$v){
				$html .= "<tr class='oddListRowS1' height='20'>";
				if ($type == "popup") {
					$html .= '<td class="nowrap" width="1%"><input class="checkbox" title="选择该行" onclick="getDisplayColumn('.$i.')" name="mass[]" value="" type="checkbox"></td>';
				}
				$line_data = $v;

				$j= 0;
				foreach($line_data as $z=>$vz){
					if(($column_list[$j]["dashlet_visible_flag"] == 1&&$type == "dashlet")||($column_list[$j]["popup_visible_flag"] == 1&&$type == "popup")){
						if ($column_list[$j]["display_type_code"] == "LNK" && $column_list[$j]["column_name"] == $z) {
							$id = $line_data[$column_list[$j]["link_id_column"]];
							$html .= "<td class='footable-visible'  valign='top' align='left'>".
							"<a href='?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3D".$column_list[$j]["link_module"]."%26action%3DDetailView%26record%3D".$id."'>".
							$line_data[$z] . "</a></td>";
						}
						else {
							$html .="<td class='footable-visible'  valign='top' align='left'>" . $line_data[$z] . "</td>";
						}
					}
					$j++;
				}
				$html .= "</tr>";
			}
			$html .="</thead></table>";
		}else{
			$html .= "<span>执行出错：".$error_msg."</span>";
		}
		return $html;
		return "testhtml";
	}
}
?>
