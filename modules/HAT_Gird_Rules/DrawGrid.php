<?php
/**********************************************************
* 这是一个PHP文件，可以被其他文件进行调用
**********************************************************
*输入参数1项：
*		location_id，通过$_REQUEST['location_id']获取，指向一个GridRuld指向的Location_ID对应的房间
*输出结果
*	本页面的输出结果为HTML结果，以表格的形式完成Gird的分布
/**********************************************************/
//测试示例：
//index.php?module=HAT_Gird_Rules&action=DrawGrid&location_id=8fe32ae3-116b-ff2c-2cab-584a5e3ed2b5&tabtype=1
	global $app_list_strings, $timedate, $db;
	$location_id = $_REQUEST['location_id'];

	function rotate($a) {
		$b = array();
		foreach ($a as $val) {
			foreach ($val as $k => $v) {
				$b[$k][] = $v;
			}
		}
		return $b;
	}
	function getOccupationCnt($asid) {
		global $db;
		//计算机柜占用率
		$rackssql= "SELECT * FROM hit_racks WHERE hat_assets_id='".$asid."' limit 1";
		$reracksbean = $db->query($rackssql);
		$reracks = $db->fetchByAssoc($reracksbean);

		if(empty($reracks)){
			return "";
		}
		if (!empty($reracks['id']) && !empty($reracks['height'])) {
			$sel_rack_allocation = "SELECT
								hit_rack_allocations.height
							FROM
								hit_rack_allocations
							WHERE
								hit_rack_allocations.deleted =0
								AND hit_rack_allocations.hit_racks_id ='".$reracks['id']."'";
			$bean_rack_allocation =  $db-> query($sel_rack_allocation);
			$occupation_cnt=0;
			while ( $d_bean_rack_allocation= $db->fetchByAssoc($bean_rack_allocation) ) {
				$occupation_cnt += $d_bean_rack_allocation['height'];
			}

			return "<span style='white-space:nowrap;'> <span id='occupation_bar' style='border:#ccc 1px solid; height:1em; width:5em;display:inline-flex'><span id='occupation_bar_filled' style='background-color:#999; height:0.8em; width:".round($occupation_cnt/($reracks['height'])*10/2,1)."em; display:block'></span></span> ".round($occupation_cnt/($reracks['height'])*100)."%</span>";
		}
	}
	//房间信息
	$sel = "SELECT * FROM hat_asset_locations WHERE hat_asset_locations.deleted=0 and hat_asset_locations.id='".$location_id."' limit 1";
	$beanSEL = $db->query($sel);
	while ( $result = $db->fetchByAssoc($beanSEL) ) {
		if (!empty ($result['name'])) {
			echo '当前位置为: <strong>'.$result['name'].'</strong>';
		}
	}
	//布局线信息
	$linesql = "SELECT * FROM hat_asset_locations WHERE hat_asset_locations.deleted=0 and hat_asset_locations.parent_location_id='".$location_id."' order by name ASC";
	$beanline = $db->query($linesql);
	$ycount = 0;
	$xcount = 0;
	$data = array();
	while ( $lresult = $db->fetchByAssoc($beanline) ) {
		$ycount++;
		$lresult['sign'] = 1;
		$data[$lresult['id']][] = $lresult;
		//设备信息
		$assetsql = "SELECT hat_assets.`id` AS asid, hat_assets.`name` AS asname,hat_assets.`asset_status`,accounts.`name` as acname FROM hat_asset_locations_hat_assets_c c LEFT join hat_assets on hat_assets.id = c.`hat_asset_locations_hat_assetshat_assets_idb`  LEFT JOIN accounts ON hat_assets.`using_org_id` = accounts.`id`  WHERE c.`hat_asset_locations_hat_assetshat_asset_locations_ida` = '".$lresult['id']."' AND hat_assets.`deleted`=0  AND accounts.`deleted` = 0 order by hat_assets.`name` ASC";
			$beanasset = $db->query($assetsql);
			if($beanasset->num_rows > $xcount){
				$xcount = $beanasset->num_rows;
			}
			while ( $result = $db->fetchByAssoc($beanasset) ) {
				$result['sign'] = 0;
				$result['racks'] = getOccupationCnt($result['asid']);
				//var_dump($result['racks']);
				$data[$lresult['id']][] = $result;
			}
	}
	$tabtype = !empty($_GET['tabtype'])?1:0;
	//表格重排
	if($tabtype == 1) {
		$data = rotate($data);
		$tempy = $xcount;
		$xcount = $ycount;
		$ycount = $xcount;
	}
	//dump($data);
	?>
<style>
	table
	{
		border-collapse:separate;
		border-spacing:10px 50px;
	}
	.table_box{width:90%;}
	.table_box tr,.table_box tr td{
		height: 80px;
	}
	<?php
	if($tabtype == 1){
	?>
	td:nth-child(odd) {
		border:1px solid #ECEAE7;
	}

	td:nth-child(even) {
		border:1px solid #807D7D;
	}
	<?php
	}else{
	?>
		tr:nth-child(odd){border:1px solid #ECEAE7;}
		tr:nth-child(even){border:1px solid #807D7D;}
	<?php
	}
	?>
	.table_box tr td{
		padding: 5px;
		cursor: pointer;
	}
	.table_box tr td.frist{
		background: #FBF8F8;
		color: #C50A0A;
		border-right: 1px solid #D82222;
	}
</style>
<script>
	function openAssetPopup(id){
		popupFilter = '&action=DetailView&record='+id;
		open_popup('HAT_Assets', 1000, 750, popupFilter, true, true,'{}');
	}
</script>
<table class="table_box">
	<?php
		if($tabtype == 0) {
			?>
			<thead>
			<th>
				<?php
				for ($i = 1; $i <= $xcount; $i++) {
					echo "<td>$i</td>";
				}
				?>
			</th>
			</thead>

			<?php
		}
	$j = 1;
	foreach($data as $ak => $av){
	?>
	<tr>
	<?php
		if($tabtype == 1){
			?>
			<td class="frist">
				<?php echo $j-1; ?>
			</td>
			<?php
		}
		foreach($av as $k => $v) {
			if ($v['sign'] == 1) {
				?>
				<td class="frist">
					(<?php echo $j; ?>)<?php echo $v['name']; ?>
				</td>
				<?php
			} else {
				?>
				<td onclick="openAssetPopup(<?php echo "'".$v['asid']."'";?>)" <?php if($v['asset_status'] == 'Idle'){ echo "class='color_asset_status_Idle'";} ?>>
					<?php echo $v['asname'] . "<br>" . $v['acname'] . "<br>" .$v['racks']; ?>
				</td>
				<?php
			}
		}
	?>
	</tr>
	<?php
		$j++;
	}
	?>

</table>