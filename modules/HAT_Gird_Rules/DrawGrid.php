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
	$current_framework=(isset($_SESSION["current_framework"]))?$_SESSION["current_framework"]:"";
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
		//
		$rackOnly = " AND hat_assets.enable_it_rack = 1 ";
		$assetsql = "SELECT hat_assets.`id` AS asid, hat_assets.`name` AS asname,hat_assets.`asset_status`,accounts.`name` as acname FROM  hat_assets LEFT JOIN hat_asset_locations_hat_assets_c c on hat_assets.id = c.`hat_asset_locations_hat_assetshat_assets_idb`  LEFT JOIN accounts ON hat_assets.`using_org_id` = accounts.`id` WHERE c.`hat_asset_locations_hat_assetshat_asset_locations_ida` = '".$lresult['id']."' AND hat_assets.`deleted`=0  and c.`deleted`=0 AND hat_assets.haa_frameworks_id='".$current_framework."' AND (hat_assets.parent_asset_id = '' OR hat_assets.parent_asset_id IS NULL) ".$rackOnly." order by hat_assets.`name` ASC";
			$beanasset = $db->query($assetsql);
			if($beanasset->num_rows > $xcount){
				$xcount = $beanasset->num_rows;
			}
			while ( $aresult = $db->fetchByAssoc($beanasset) ) {
				$aresult['sign'] = 0;
				$aresult['racks'] = getOccupationCnt($aresult['asid']);
				//echo($result['asname']."<br/>");
				$data[$lresult['id']][] = $aresult;
			}
	}
	//自动补充数组
	foreach ($data as $ak => $av){
		$data[$ak] = array_pad($av, $xcount+1, 0);
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

<script>
	function openAssetPopup(id){
		popupFilter = '&action=DetailView&record='+id;
		open_popup('HAT_Assets', 1000, 750, popupFilter, true, true,'{}');
	}
</script>
<table class="GridTable">
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
			echo '<td class="frist col"><div>'. ($j-1) .'</div></td>';
		}
		foreach($av as $k => $v) {
			if ($v['sign'] == 1) {
				echo '<td class="frist"><div>'. $v['name'] .'</div></td>';
			} else {
				if($v == 0){
					echo "<td><div class='empty'></div></td>";
				}else {
					echo "<td onclick='openGridDetail(\"".$v['asid']."\")' class='color_asset_status_". $v['asset_status']."'><div><span class='asset_name'>";
				    echo $v['asname'] . "</span><span class='using_org'>". $v['acname'] . "</span><span class='rack_all'>" . $v['racks'] . "</span>";
				    echo "</div></td>";
				}
			}
		}
	?>
	</tr>
	<?php
		$j++;
	}
	?>

</table>