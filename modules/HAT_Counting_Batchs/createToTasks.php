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
$bean_batch = BeanFactory :: getBean('HAT_Counting_Batchs', $batchId);

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
		echo "0";
	}else{
		echo "1";
	}
}else{

	if ($bean_batch->snapshot_date ==''){
		echo "2";

		$query = "call HAT_Counting_asset_info('".$_SESSION["current_framework"]."','".$batchId."','".$current_user->id."')";

		$result = $this->bean->db->query($query, true);
		//$row = $this->bean->db->fetchByAssoc($result);
	}else{
		echo "3";
		//var_dump($isClr);
		if($isClr=="true"){
			//先清除，再创建
		$query_reset = "call HAT_Counting_reset('".$batchId."')";
		$result_reset = $this->bean->db->query($query_reset, true);
		$query = "call HAT_Counting_asset_info('".$_SESSION["current_framework"]."','".$batchId."','".$current_user->id."')";
		$result = $this->bean->db->query($query, true);
		}
	}
}
?>
