<?php
/**
 *	加载gantt图方法 loadGantt 参数：GET数据 POST数据 数据交互地址
 *  基础数据加载方法loadGanttData 参数：项目ID	返回json数据
 *	数据更新插入入口方法inUpTask 	参数：gantt POST数据 返回gantt XML数据
 *	加载gantt基础信息方法loadBaseInfo 参数：gantt语言js文件名；gantt主题CSS
 *	加载gantt js配置信息方法loadExtConfig 参数：配置文件地址
 *	TODO:任务关系处理和加载	  
 */
class ProjectPlanner
{	
	private $db;
	/**
	 *  初始化数据库查询DB
	 */
	function __construct(){
 		global $db;
		$this->db=$db;
 	}
	/**
 	 *  @param $get  $_GET数据
 	 *  @param $post $_POST数据
 	 *	@param $ajaxUrl 数据交互地址
 	 */
	public function loadGantt($get,$post,$ajaxUrl){
		$editing=isset($get['editing'])?$get['editing']:"";
		if(isset($get['to_pdf'])&&$get['to_pdf']=="true"&&$editing=="true"){
			echo $this->inUpTask($get,$post);
		}elseif(isset($get['project_id'])&&$get['project_id']){
			$prj_id=$get['project_id'];
			$users=$this->loadAssigned();
			echo $this->loadBaseInfo("dhtmlxgantt_meadow");
			include 'include/gantt/ProjectPlannerLayout.html';
			echo '<script> var users='.json_encode($users).';var prj_id="'.$prj_id.'";var taskData='.$this->loadGanttData($prj_id).';var priority='.$this->loadPriority().'</script>';
			echo $this->loadExtConfig();
			echo '<script type="text/javascript">
				gantt.init("gantt_map");
				var fileDnD = fileDragAndDrop();
				fileDnD.init(gantt.$container);
				function sendFile(file){
					fileDnD.showUpload();
					upload(file, function(){
						fileDnD.hideOverlay();
					})
				}
				fileDnD.onDrop(sendFile);
				var form = document.getElementById("mspImport");
				form.onsubmit = function(event) {
					event.preventDefault();
					var fileInput = document.getElementById("mspFile");
					sendFile(fileInput.files[0]);
				};
				gantt.parse(taskData);
				var dp=new gantt.dataProcessor("'.$ajaxUrl.'&project_id='.$prj_id.'");
				dp.init(gantt);
			</script>';
		}
	}
	/**
	 * @param  $project_id  task所属项目
	 * @param  $open gantt  树展开状态 1 展开 0 合拢
	 * @param  $ext 		额外增加字段     暂不增加
	 * @return json 		任务数据
	 */
	protected function loadGanttData($project_id,$open=1){
		$sql="SELECT
			project_task.project_task_id id,
			project_task.name text,
			(project_task.percent_complete/100) progress,
			project_task.date_start start_date,
			project_task.duration duration,
			project_task.milestone_flag milestone,
			project_task.assigned_user_id assigned,
			project_task.date_finish end_date,
			project_task.parent_task_id parent,
			project_task.priority priority,
			project_task.project_id project_id
		FROM
			project_task
		WHERE project_task.project_id='".$project_id."'
			AND project_task.deleted=0";		//sql设置别名映射名称
		$result=$this->db->query($sql);
		$resData['data']="";
		$resData['collections']['links']="";
		while ($row=$this->db->fetchByAssoc($result)) {
			$row['open']=$open;
			if ($row['milestone']=='1') {
				$row['type']='milestone';
			}
			$resData['data'][]=$row;
		}
		$link_sql="SELECT
			gantt_links.id,
			gantt_links.source,
			gantt_links.target,
			gantt_links.type
		FROM
			gantt_links 
		LEFT JOIN project_task ON gantt_links.source = project_task.project_task_id 
			WHERE project_task.project_id ='".$project_id."'";
		$result=$this->db->query($link_sql);
		//$links['links']="";
		while ($row=$this->db->fetchByAssoc($result)) {
			$links['links'][]=$row;
		}
		if (isset($links)) {
		 	$resData['collections']=$links;
		}
		return json_encode($resData);
	}
	/**
	 *  加载人员
	 */
	protected function loadAssigned(){
		$sql ="SELECT id `key`,IFNULL(last_name,first_name) `label` FROM contacts WHERE deleted = 0";
		return $this->ExcuteDQL($sql);
	}
	/**
	 *  加载优先级字段
	 */
	protected function loadPriority(){
		global $app_list_strings;
		$priority_list=array();
		foreach ($app_list_strings['project_task_priority_options'] as $k => $v) {
			$priority_list[]=array("key"=>$k,"label"=>$v);
		}
		return json_encode($priority_list);
	}
	/**
	 * @param  $postData 默认gantt POST传入的数据
	 * @return XML 返回gantt XML格式信息
	 */
	protected function inUpTask($get,$postData){
		$type="";		//执行操作方式
		$fields="";		//表字段
		$values="";		//字段=值
		$dbType=array('inserted','updated','deleted','order');
		$fieldMap=array('id'=>'project_task_id','text'=>'name','progress'=>'percent_complete','start_date'=>'date_start','duration'=>'duration','milestone'=>'milestone_flag','assigned'=>'assigned_user_id','parent'=>'parent_task_id','project_id'=>'project_id','priority'=>'priority','end_date'=>'date_finish');//字段映射Map
		$fields_link=array('id','source','target','type');
		foreach ($postData as $k => $v) {
			$key=preg_split("/[0-9]_/", $k);
			if (!in_array($v, $dbType)&&array_key_exists($key[1], $fieldMap)&&$get['gantt_mode']=="tasks") {
				$fields[]=$fieldMap[$key[1]];
				$values[]=$v;
			}
			if (in_array($key[1], $fields_link)&&$get['gantt_mode']=="links") {
				$fields[]=$key[1];
				$values[]=$v;
			}
			if (in_array($v, $dbType)) $type=$v;
			if ($k=='ids') $sid=$v;
		}
		if ($type=="updated") {
			$queryType=$this->updateTask($fields,$values);
			$tid=$queryType?$sid:'';
		}
		if ($type=="inserted"&&$get['gantt_mode']=="tasks") {
			$queryType=$this->insertTask($fields,$values);
			if ($queryType) {
				$sql = 'SELECT MAX(project_task_id) task_id FROM project_task';
				$result=$this->ExcuteDQL($sql);
				$tid=$result[0]['task_id'];
			}
		}
		if ($type=="order"&&$get['gantt_mode']=="tasks") {
			$queryType=$this->updateTask($fields,$values);
			$tid=$queryType?$sid:'';
		}
		if ($type=="inserted"&&$get['gantt_mode']=="links") {
			$queryType=$this->insertLinks($fields,$values);
			$tid=$queryType?$sid:'';
		}
		if ($type=="deleted"&&$get['gantt_mode']=="tasks") {
			$queryType=$this->deletedTask($values);
			$tid=$queryType?$sid:'';
		}
		if ($type=="deleted"&&$get['gantt_mode']=="links") {
			$queryType=$this->deletedLinks($values);
			$tid=$queryType?$sid:'';
		}
		if ($queryType) {
			return $this->ganttXML($type,$sid,$tid);
		}else{
			return $this->ganttXML('error','',$tid);
		}
	}
	/**
	 *	@param 	$langue gantt语言文件JS
	 *	@param 	$theme gantt主题css 
	 *  @return html 返回gantt JS文件及CSS文件
	 */
	protected function loadBaseInfo($theme='',$langue='locale_cn'){
		$infoHtml='<script src="include/gantt/codebase/dhtmlxSuite/dhtmlx.js" type="text/javascript" charset="utf-8"></script>';
		$infoHtml.='<script src="include/gantt/codebase/dhtmlxgantt.js" type="text/javascript"  charset="utf-8"></script>';
		$infoHtml.='<script src="include/gantt/codebase/locale/'.$langue.'.js" type="text/javascript" charset="utf-8"></script>';
		$infoHtml.='<script src="include/gantt/codebase/ext/dhtmlxgantt_undo.js" type="text/javascript" charset="utf-8"></script>';
		$infoHtml.='<script src="include/gantt/codebase/ext/dhtmlxgantt_marker.js" type="text/javascript" charset="utf-8"></script>';
		$infoHtml.='<script src="include/gantt/codebase/ext/dhtmlxgantt_tooltip.js" type="text/javascript" charset="utf-8"></script>';
		$infoHtml.='<script src="include/gantt/codebase/ext/dhtmlxgantt_fullscreen.js" type="text/javascript" charset="utf-8"></script>';
		$infoHtml.='<script src="include/gantt/codebase/ext/dhtmlxgantt_multiselect.js" type="text/javascript" charset="utf-8"></script>';
		$infoHtml.='<script src="include/gantt/codebase/ext/dhtmlxgantt_keyboard_navigation.js" type="text/javascript" charset="utf-8"></script>';
		$infoHtml.='<script src="include/gantt/js/api.js" type="text/javascript" charset="utf-8"></script>';
		$infoHtml.='<script src="include/gantt/codebase/ext/dhx_file_dnd.js" type="text/javascript" charset="utf-8"></script>';
		$infoHtml.='<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">';
		if ($theme) {
			$infoHtml.='<link id="skin" rel="stylesheet" type="text/css" href="include/gantt/codebase/skins/'.$theme.'.css">';
		}else{
			$infoHtml.='<link id="skin" rel="stylesheet" type="text/css" href="include/gantt/codebase/dhtmlxgantt.css">';
		}
		$infoHtml.='<link rel="stylesheet" href="include/gantt/style.css">';
		return $infoHtml;
	}
	/**
	 * @param $location 配置文件加载地址，提供默认配置文件地址
	 * @return 返回配置文件加载js全路径
	 */
	protected function loadExtConfig($localtion=''){
		if ($localtion) {
			$JSConfig='<script type="text/javascript" src="'.$localtion.'"></script>';
		}else{
			$JSConfig='<script type="text/javascript" src="include/gantt/js/gantt.config.js"></script>';
		}
		return $JSConfig;
	}
	/**
	 *  @param  array字段名称
	 *	@param  array字段对应的值
	 */
	protected function updateTask($fields,$values){
		$setStr=array();
		$i=1;
		while (($i-1) <= count($fields)) {
			if ($fields[$i-1]=="percent_complete") {
				$values[$i-1]=round($values[$i-1]*100);
			}
			if (is_numeric($values[$i-1])) {
				$setStr[]=$fields[$i-1]."=".$values[$i-1];
			}else{
				$setStr[]=$fields[$i-1]."='".$values[$i-1]."'";
			}
			if ($i%11==0) {
				$sql="UPDATE project_task SET ".implode(",", $setStr)." WHERE project_task_id=".$values[$i-11];
				$setStr=array();
				$result=$this->ExcuteDML($sql);
			}
			if (count($fields)<11&&$i==count($fields)) {
				$sql="UPDATE project_task SET ".implode(",", $setStr)." WHERE project_task_id=".$values[$i-11];
				$setStr=array();
				$result=$this->ExcuteDML($sql);
			}
			$i++;
		}
		return $result;
	}
	/**
	 *  @param  array字段名称
	 *	@param  array字段对应的值
	 */
	protected function insertTask($fields,$values){
		for($i=0;$i<count($fields);$i++) {
			if($fields[$i]=="project_task_id"){
				unset($fields[$i]);
				unset($values[$i]);
			}
		}
		$sql="INSERT INTO project_task(id,project_task_id,".implode(',', $fields).")VALUES(UUID(),(SELECT id FROM (SELECT MAX(project_task_id)+1 id FROM project_task) maxid),'".implode("','",$values)."')";
		return $this->ExcuteDML($sql);
	}
	/**
	 *  @param  array字段名称
	 *	@param  array字段对应的值
	 */
	protected function insertLinks($fields,$values){
		for($i=0;$i<=count($fields);$i++) {
			if($fields[$i]=="id"||$fields[$i]=="ids"||$fields[$i]=="project_task_id"){
				unset($fields[$i]);
				unset($values[$i]);
			}
		}
		$i=0;
		while ($i<=count($fields)) {
			$field[]=$fields[$i];
			$value[]=$values[$i];
			if (($i+1)%3==0) {
				$sql="INSERT INTO gantt_links(".implode(',', $field).")VALUES(".implode(",",$value).")";
				$type=$this->ExcuteDML($sql);
				$field=array();
				$value=array();
			}
			$i++;
		}
		return $type;
	}
	/**
	 * 	@param $values 传入id值
	 */
	protected function deletedTask($values){
		$sql="UPDATE project_task SET deleted=1 WHERE project_task_id=".$values[0];
		$del_sql="DELETE FROM gantt_links WHERE source=".$values[0];
		$this->ExcuteDML($del_sql);
		return $this->ExcuteDML($sql);
	}
	/**
	 * 	@param $values 传入id值
	 */
	protected function deletedLinks($values){
		$del_sql="DELETE FROM gantt_links WHERE id=".$values[0];
		$this->ExcuteDML($del_sql);
	}
	/**
	 * 	@param  $sql  sql字符串
	 *	@return 返回SQL执行状态
	 */
	protected function ExcuteDML($sql){
		return $this->db->query($sql);
	}
	/**
	 * 	@param  $sql  sql字符串
	 *	@return 返回结果集
	 */
	protected function ExcuteDQL($sql){
		$result=$this->db->query($sql);
		$data='';
		while ($row=$this->db->fetchByAssoc($result)) {
			$data[]=$row;
		}
		return $data;
	}
	/**
	 *  @param  $type 操作方式
	 *	@param  $sid  
	 *	@param  $tid  任务ID
	 *	@return XML   
	 */
	protected function ganttXML($type,$sid,$tid){
		$xml="<?xml version='1.0' ?><data>";
		if (is_numeric($sid)) {
			$xml.="<action type='".$type."' sid='".$sid."' tid='".$tid."' ></action>";
		}else{
			$sids=preg_split('/,/', $sid);
			foreach ($sids as $k => $v) {
				$xml.="<action type='".$type."' sid='".$v."' tid='".$v."'></action>";
			}
		}
		$xml.="</data>";
		return $xml;
	}
}
?>