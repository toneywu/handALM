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
		$editing=$get['editing'];
		if(isset($get['to_pdf'])&&$get['to_pdf']=="true"&&$editing=="true"){
			echo $this->inUpTask($post);
		}elseif(isset($get['record'])&&$get['record']){
			$prj_id=$get['record'];
			$users=$this->loadAssigned();
			echo $this->loadBaseInfo();
			echo '<div id="gantt_map" style="width:99%"></div>';
			echo '<script> var users='.json_encode($users).';var prj_id="'.$prj_id.'";var taskData='.$this->loadGanttData($prj_id).'</script>';
			echo $this->loadExtConfig();
			echo '<script type="text/javascript">
				gantt.init("gantt_map");
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
			project_task.parent_task_id parent,
			project_task.project_id project_id
		FROM
			project_task
		WHERE project_task.project_id='".$project_id."'
			AND project_task.deleted=0";		//sql设置别名映射名称
		$result=$this->db->query($sql);
		$resData=array();
		while ($row=$this->db->fetchByAssoc($result)) {
			$row['open']=$open;
			$resData['data'][]=$row;
		}
		/**
		 * @TODO	加载任务关系数据
		 */
		$resData['collections']=array("links"=>array());
		return json_encode($resData);
	}

	protected function loadAssigned(){
		$sql ="SELECT id `key`,IFNULL(last_name,first_name) `label` FROM contacts WHERE deleted = 0";
		return $this->ExcuteDQL($sql);
	}
	/**
	 * @param  $postData 默认gantt POST传入的数据
	 * @return XML 返回gantt XML格式信息
	 */
	protected function inUpTask($postData){
		$type="";		//执行操作方式
		$fields="";		//表字段
		$values="";		//字段=值
		$dbType=array('inserted','updated','deleted');
		$fieldMap=array('id'=>'project_task_id','text'=>'name','progress'=>'percent_complete','start_date'=>'date_start','duration'=>'duration','milestone'=>'milestone_flag','assigned'=>'assigned_user_id','parent'=>'parent_task_id','project_id'=>'project_id');//字段映射Map
		foreach ($postData as $k => $v) {
			$key=preg_split("/[0-9]_/", $k);
			if (!in_array($v, $dbType)&&array_key_exists($key[1], $fieldMap)) {
				$fields[]=$fieldMap[$key[1]];
				$values[]=$v;
			}
			if (in_array($v, $dbType)) {
				$type=$v;
			}
			if ($k=='ids') {
				$sid=$v;
			}
		}
		if ($type=="updated") {
			$queryType=$this->updateTask($fields,$values);
			$tid=$queryType?$sid:'';
		}
		if ($type=="inserted") {
			$queryType=$this->insertTask($fields,$values);
			if ($queryType) {
				$sql = 'SELECT MAX(project_task_id) task_id FROM project_task';
				$result=$this->ExcuteDQL($sql);
				$tid=$result[0]['task_id'];
			}
		}
		if ($type=="deleted") {
			$queryType=$this->deletedTask($values);
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
	protected function loadBaseInfo($langue='locale_cn',$theme=''){
		$infoHtml='<script type="text/javascript" src="include/gantt/codebase/dhtmlxgantt.js"></script>';
		$infoHtml.='<script type="text/javascript" src="include/gantt/codebase/locale/'.$langue.'.js"></script>';
		if ($theme) {
			$infoHtml.='<link rel="stylesheet" type="text/css" href="include/gantt/codebase/dhtmlxgantt.css">';
			$infoHtml.='<link rel="stylesheet" type="text/css" href="include/gantt/codebase/skins/'.$theme.'.css">';
		}else{
			$infoHtml.='<link rel="stylesheet" type="text/css" href="include/gantt/codebase/dhtmlxgantt.css">';
		}
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

	protected function updateTask($fields,$values){
		$setStr=array();
		$project_task_id="";
		for($i=0;$i<count($fields);$i++) {
			if ($fields[$i]=="percent_complete") {
				$values[$i]=round($values[$i]*100);
			}
			if (is_numeric($values[$i])) {
				$setStr[]=$fields[$i]."=".$values[$i];
			}else{
				$setStr[]=$fields[$i]."='".$values[$i]."'";
			}
		}
		$sql="UPDATE project_task SET ".implode(",", $setStr)." WHERE project_task_id=".$values[0];
		$result=$this->ExcuteDML($sql);
		return $result;
	}

	protected function insertTask($fields,$values){
		for($i=0;$i<count($fields);$i++) {
			if($fields[$i]=="project_task_id"){
				unset($fields[$i]);
				unset($values[$i]);
			}
		}
		$sql="INSERT INTO project_task(id,project_task_id,".implode(',', $fields).")VALUES(UUID(),(SELECT id FROM (SELECT MAX(project_task_id)+1 id FROM project_task) maxid),'".implode("','",$values)."')";
		$result=$this->ExcuteDML($sql);
		return $result;
	}

	protected function deletedTask($values){
		$sql="UPDATE project_task SET deleted=1 WHERE project_task_id=".$values[0]."";
		$result=$this->ExcuteDML($sql);
		return $result;
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
		$xml="<?xml version='1.0' ?><data><action type='".$type."' sid='".$sid."' tid='".$tid."' ></action></data>";
		return $xml;
	}
}
?>