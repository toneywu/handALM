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
 */

global $db ;
global $current_user;
$isNew=$_POST['isNew'];
$isClr=$_POST['isClr'];
$batchId=$_POST['record'];
require_once('modules/HAT_Counting_Batchs/auto_create_task.php');
$auto_create_task = new Auto_Create_Task();
$bean_batch = BeanFactory :: getBean('HAT_Counting_Batchs', $batchId);
$return_msg="";
$code="";
if ($isNew=="") {
	
	$sql="SELECT
	count(*) counting_task_status
	FROM
	hat_counting_batchs hcb,
	hat_counting_tasks hct
	WHERE
	1 = 1
	AND hct.hat_counting_batchs_id_c = hcb.id
	AND hct.counting_task_status <> 'New'
	and hcb.id='".$batchId."'";
	$result=$db->query($sql);
	$row=$db->fetchByAssoc($result);
	if($bean_batch->status!='New' || $row["counting_task_status"]>0){
		//echo "0";
		$code="0";
	}else{
		//echo "1";
		$code="1";
	}
}else{
	if ($bean_batch->snapshot_date ==''){
		//echo "2";
		$code="2";
		$param=array(
			'current_framework' => $_SESSION["current_framework"],
			'batch_id' => $batchId,
			);
		
		$return_msg=$auto_create_task->hat_counting($param);
		
	}else{
		//echo "3";
		$code="3";
		//var_dump($isClr);
		if($isClr=="true"){
			//先清除，再创建
		$query_reset = "call HAT_Counting_reset('".$batchId."')";
		$result_reset = $this->bean->db->query($query_reset);
		if(!$result_reset){
			$return_msg="清除当前批下已有任务失败";
		}
		$param=array(
			'current_framework' => $_SESSION["current_framework"],
			'batch_id' => $batchId,
			);
		
		$return_msg=$auto_create_task->hat_counting($param);
		
		}
	}
}
echo json_encode(array('code'=>$code,'msg'=>$return_msg));
?>
