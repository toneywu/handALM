<?php
/**
* 
*/
class Auto_Create_Task
{
	/*参数 $param=array();
	current_framework 当前业务框架
	batch_id 当前批
	*/

	function hat_counting($param=array()){
		global $db,$app_list_strings,$current_user;
		$return_msg='执行成功';
		$time='';
		$sql_batch_rule="SELECT
		a.id,
		a.hat_asset_locations_id_c,
		a.location_drilldown,
		a.account_id_c,
		a.org_drilldown,
		a.account_id_c1,
		a.using_org_drilldown,
		a.haa_codes_id_c,
		a.major_drilldown,
		a.aos_product_categories_id_c,
		a.category_drilldown,
		a.user_contacts_id_c,
		a.own_contacts_id_c,
		a.hat_counting_policies_id_c
		FROM
		hat_counting_batch_rules a,
		hat_counting_batchs_hat_counting_batch_rules_c b
		where a.id = b.hat_counti8f01h_rules_idb
		and b.hat_counti9a14_batchs_ida ='".$param["batch_id"]."'";
		$result_batch_rule = $db->query($sql_batch_rule);
		if(!$result_batch_rule){
			return "盘点范围及拆分策略信息拉取失败";
		}
		//循环盘点当前批拆分规则及策略
		//var_dump("循环盘点当前批拆分规则及策略");
		while($row_batch_rule = $db->fetchByAssoc($result_batch_rule)){
			//调用HAT_Counting_asset_info过程，通过拆分范围筛选资产数据放入临时表
			//var_dump("开始循环");
			$query_asset_info = "call HAT_Counting_asset_info('".$param["current_framework"]."','".$row_batch_rule["id"]."','".$row_batch_rule["hat_asset_locations_id_c"]."','".$row_batch_rule["location_drilldown"]."','".$row_batch_rule["account_id_c"]."','".$row_batch_rule["org_drilldown"]."','".$row_batch_rule["account_id_c1"]."','".$row_batch_rule["using_org_drilldown"]."','".$row_batch_rule["haa_codes_id_c"]."','".$row_batch_rule["major_drilldown"]."','".$row_batch_rule["aos_product_categories_id_c"]."','".$row_batch_rule["category_drilldown"]."','".$row_batch_rule["user_contacts_id_c"]."','".$row_batch_rule["own_contacts_id_c"]."',@time);";
			$result_asset_info = $db->query($query_asset_info);
			if(!$result_asset_info){
				return "通过拆分范围筛选资产数据失败";
			}
			$return_time=$db->query("select @time");
			$row_time = $db->fetchByAssoc($return_time);
			$time=$row_time["@time"];
			//找出盘点策略上的“数据抽取逻辑”
			$sql_policy_info="SELECT
			hcp.data_populate_sql,
			hcp.split_type,
			hcp.hat_counting_task_templates_id_c,
			hcp.additional_logic,
			hcp.id
			FROM
			hat_counting_policies hcp
			WHERE
			hcp.id ='".$row_batch_rule["hat_counting_policies_id_c"]."'";
			//var_dump($sql_policy_info);
			$result_policy_info = $db->query($sql_policy_info);
			if(!$result_policy_info){
				return "盘点策略信息拉取失败";
			}
			$row_policy_info = $db->fetchByAssoc($result_policy_info);
			//解析抽数SQL,将数据放入临时表
			$sql_counting_info=$row_policy_info["data_populate_sql"];
			$result_counting_info = $db->query($sql_counting_info);
			if(!$result_counting_info){
				return "数据抽取逻辑执行失败";
			}
			//$times=0;
			while ($row_counting_info = $db->fetchByAssoc($result_counting_info)){
				//$times++;
				$query_data_populate_sql ="INSERT INTO hat_counting_task_dtl_tmp (
				counting_batch_rule_id,counting_policy_id,task_attribute1,task_attribute2,task_attribute3,
				task_attribute4,task_attribute5,task_attribute6,task_attribute7,task_attribute8,task_attribute9,
				task_attribute10,task_attribute11,task_attribute12,task_attribute13,task_attribute14,task_attribute15,
				asset_id,grouped_flag,line_attribute1,line_attribute2,line_attribute3,line_attribute4,line_attribute5,
				line_attribute6,line_attribute7,line_attribute8,line_attribute9,line_attribute10,line_attribute11,
				line_attribute12,line_attribute13,line_attribute14,line_attribute15
				)
				VALUES
				('".$row_batch_rule["id"]."','".$row_batch_rule["hat_counting_policies_id_c"]."',
				'".$row_counting_info["task_attribute1"]."','".$row_counting_info["task_attribute2"]."',
				'".$row_counting_info["task_attribute3"]."','".$row_counting_info["task_attribute4"]."',
				'".$row_counting_info["task_attribute5"]."','".$row_counting_info["task_attribute6"]."',
				'".$row_counting_info["task_attribute7"]."','".$row_counting_info["task_attribute8"]."',
				'".$row_counting_info["task_attribute9"]."','".$row_counting_info["task_attribute10"]."',
				'".$row_counting_info["task_attribute11"]."','".$row_counting_info["task_attribute12"]."',
				'".$row_counting_info["task_attribute13"]."','".$row_counting_info["task_attribute14"]."',
				'".$row_counting_info["task_attribute15"]."','".$row_counting_info["asset_id"]."','N',
				'".$row_counting_info["line_attribute1"]."','".$row_counting_info["line_attribute2"]."',
				'".$row_counting_info["line_attribute3"]."','".$row_counting_info["line_attribute4"]."',
				'".$row_counting_info["line_attribute5"]."','".$row_counting_info["line_attribute6"]."',
				'".$row_counting_info["line_attribute7"]."','".$row_counting_info["line_attribute8"]."',
				'".$row_counting_info["line_attribute9"]."','".$row_counting_info["line_attribute10"]."',
				'".$row_counting_info["line_attribute11"]."','".$row_counting_info["line_attribute12"]."',
				'".$row_counting_info["line_attribute13"]."','".$row_counting_info["line_attribute14"]."',
				'".$row_counting_info["line_attribute15"]."')";
				$result_data_populate_sql = $db->query($query_data_populate_sql);
				if(!$result_data_populate_sql){
					return "数据导入hat_counting_task_dtl_tmp表时出错";
				}
		}//取数结束
			//var_dump("取数结束");
			//拆分策略类型为逻辑拆分
		if($row_policy_info["split_type"]=='LOGIC'){
			//var_dump("进入逻辑拆分");
			$logic=array(
				'hat_counting_task_templates_id_c' => $row_policy_info["hat_counting_task_templates_id_c"],
				'batch_id' => $param["batch_id"],
				);
			$logic_return=$this->logic_type($logic);
			if($logic_return!=''){
				return $logic_return;
			}
			//var_dump("逻辑拆分处理结束");
			}//逻辑拆分处理结束
			
			else if($row_policy_info["split_type"]=='CUSTOM'){//如果拆分策略类型为自定义
				//var_dump("进入自定义拆分");
				$sql_custom="SELECT
				hcpl.*
				FROM
				hat_counting_policies_hat_counting_policy_lines_c h,
				hat_counting_policy_lines hcpl
				WHERE
				1 = 1
				AND h.deleted = 0
				AND hcpl.deleted = 0
				AND h.hat_countifea6y_lines_idb = hcpl.id
				AND h.hat_counti5649olicies_ida ='".$row_batch_rule["hat_counting_policies_id_c"]."'";
				$result_custom = $db->query($sql_custom);
				if(!$result_custom){
					return "自定义分组信息拉取失败";
				}
				//循环每一个自定义分组

				while($row_custom = $db->fetchByAssoc($result_custom)){
					//var_dump("进入自定义分组循环");
					//var_dump($row_custom["group_clause"]);
					$custom=array(
						'batch_id' => $param["batch_id"],
						'additional_logic' => $row_custom["additional_logic"],
						'hat_counting_task_templates_id_c' => $row_custom["hat_counting_task_templates_id_c"],
						'group_clause' => $row_custom["group_clause"],
						'counting_batch_rule_id' => $row_batch_rule["id"],
						);
					$custom_return=$this->custom_type($custom);
					if($custom_return!=''){
						return $custom_return;
					}
					//var_dump("自定义分组循环结束");
				}

				//“是否已分组”为N的数据合为同一组，生成一个盘点任务及明细
				
				$sql_if_n="SELECT
				count(*) count
				FROM
				hat_counting_task_dtl_tmp a
				where a.grouped_flag='N'";
				$result_if_n = $db->query($sql_if_n);
				if(!$result_custom){
					return "判断是否有未分组数据时失败";
				}
				$row_if_n = $db->fetchByAssoc($result_if_n);
				if($row_if_n["count"]>0){
					//var_dump("处理未分组数据");
					$if_n=array(
						'batch_id' => $param["batch_id"],
						'additional_logic' => $row_policy_info["additional_logic"],
						'hat_counting_task_templates_id_c' => $row_policy_info["hat_counting_task_templates_id_c"],
						'group_clause' => '',
						'counting_batch_rule_id' => $row_batch_rule["id"],
						);
					$this->custom_type($if_n);
				}
				//var_dump("自定义处理结束");
			}//自定义处理结束
		}//拆分规则循环结束
		//回写快照时间
		$query_time="UPDATE hat_counting_batchs a
		SET a.snapshot_date = '".$time."'
		WHERE
		a.id = '".$param["batch_id"]."'";
		//var_dump($time);
		$result_time = $db->query($query_time, true);
		if(!$result_time){
			return "回写快照时间失败";

		}
		return $return_msg;
	}

	function setTaskname($row_task,$task_templates_id,$task_name){
		global $app_list_strings,$db;
		$msg="";
		$sql_template="SELECT
		hctd.*
		FROM
		hat_counting_task_templates_hat_counting_template_details_c h,
		hat_counting_template_details hctd
		WHERE
		1 = 1
		AND h.deleted = 0
		AND hctd.deleted = 0
		AND hctd.table_names='INV_TASKS'
		AND h.hat_countib27cdetails_idb = hctd.id
		AND h.hat_countid917mplates_ida = '".$task_templates_id."'";

		$result_template = $db->query($sql_template);
		if(!$result_template){
			return  array('task_name' => $task_name,'msg' => "盘点任务模版信息拉取失败");
		}

		//循环任务模版明细 获取对应attribute转化的名称拼接到任务名称
		while($row_template = $db->fetchByAssoc($result_template)){
			foreach ($row_task as $key => $value) {
				$attr_tmp=split('_', $key);
				if($attr_tmp[1]){
					$attr=$attr_tmp[1];
				}
				else{
					$attr=$attr_tmp[0];
				}
				if($attr==$row_template["column_name"]){
					if($row_template["field_type"]=='LOV'){
						$beanAttr = BeanFactory::getBean($row_template["relate_module"], $value);
						$row_name = $beanAttr->$row_template["module_dsp"];
						/*if(!$result_attr){
							return  array('task_name' => $task_name,'msg' => "字段类型为LOV时,任务名称拼接失败");
						}*/
						if($row_name){
							$task_name=$row_name.'-'.$task_name;
						}
					}else if ($row_template["field_type"]=='LIST') {
						foreach ($app_list_strings[$row_template["list_name"]] as $key_list => $value_list) {
							if($key_list==$value){
								if($value_list){
									$task_name=$value_list.'-'.$task_name;
								}
							}
						}
					}else{
						if($value){
							$task_name=$value.'-'.$task_name;
						}
					}
				}
			}
		}//任务名称拼接完成
		return array('task_name' => $task_name,'msg' => '');
	}

	function logic_type($logic=array()){
		global $db,$app_list_strings,$current_user;
		//对临时表数据进行分组
		//var_dump($logic);
		$sql_group="SELECT
		a.counting_batch_rule_id,
		a.counting_policy_id,
		a.task_attribute1,
		a.task_attribute2,
		a.task_attribute3,
		a.task_attribute4,
		a.task_attribute5,
		a.task_attribute6,
		a.task_attribute7,
		a.task_attribute8,
		a.task_attribute9,
		a.task_attribute10,
		a.task_attribute11,
		a.task_attribute12,
		a.task_attribute13,
		a.task_attribute14,
		a.task_attribute15
		FROM
		hat_counting_task_dtl_tmp a
		GROUP BY
		a.counting_batch_rule_id,
		a.counting_policy_id,
		a.task_attribute1,
		a.task_attribute2,
		a.task_attribute3,
		a.task_attribute4,
		a.task_attribute5,
		a.task_attribute6,
		a.task_attribute7,
		a.task_attribute8,
		a.task_attribute9,
		a.task_attribute10,
		a.task_attribute11,
		a.task_attribute12,
		a.task_attribute13,
		a.task_attribute14,
		a.task_attribute15";
		$result_group = $db->query($sql_group);
		if(!$result_group){
			return "逻辑拆分时分组失败";
		}
		//循环每一个分组
		while($row_group = $db->fetchByAssoc($result_group)){
			//找出对应任务模版维护的atrribute信息
			$task_name='';
			$task_return=$this->setTaskname($row_group,$logic["hat_counting_task_templates_id_c"],$task_name);
			if($task_return['msg']!=''){
				return $task_return['msg'];
			}
			$task_name=$task_return['task_name'];
			//调用HAT_Counting_asset_info_toCountingTask创建盘点任务
			$query_insert_task = "call HAT_Counting_asset_info_toCountingTask('".$logic["batch_id"]."','".$row_group["counting_batch_rule_id"]."','".$current_user->id."','".$task_name."','".$row_group["task_attribute1"]."','".$row_group["task_attribute2"]."','".$row_group["task_attribute3"]."','".$row_group["task_attribute4"]."','".$row_group["task_attribute5"]."','".$row_group["task_attribute6"]."','".$row_group["task_attribute7"]."','".$row_group["task_attribute8"]."','".$row_group["task_attribute9"]."','".$row_group["task_attribute10"]."','".$row_group["task_attribute11"]."','".$row_group["task_attribute12"]."','".$row_group["task_attribute13"]."','".$row_group["task_attribute14"]."','".$row_group["task_attribute15"]."',@task_id)";
			//var_dump($query_insert_task);
			$result_insert_task = $db->query($query_insert_task);
			if(!$result_insert_task){
				return "创建盘点任务失败";
			}
			$return_task_id=$db->query("select @task_id");
			$row_task_id = $db->fetchByAssoc($return_task_id);
			$task_id=$row_task_id["@task_id"];
			//调用HAT_Counting_asset_info_toCountingLine创建盘点明细
			$query_insert_line = "call HAT_Counting_asset_info_toCountingLine('".$task_id."',
			'".$current_user->id."','".$row_group["task_attribute1"]."','".$row_group["task_attribute2"]."','".$row_group["task_attribute3"]."','".$row_group["task_attribute4"]."','".$row_group["task_attribute5"]."','".$row_group["task_attribute6"]."','".$row_group["task_attribute7"]."','".$row_group["task_attribute8"]."','".$row_group["task_attribute9"]."','".$row_group["task_attribute10"]."','".$row_group["task_attribute11"]."','".$row_group["task_attribute12"]."','".$row_group["task_attribute13"]."','".$row_group["task_attribute14"]."','".$row_group["task_attribute15"]."')";
			//var_dump($query_insert_line);
			$result_insert_line = $db->query($query_insert_line);
			if(!$result_insert_line){
				return "创建盘点明细失败";
			}

		}//分组循环结束
		return "";
	}

	function custom_type($custom){
		global $db,$app_list_strings,$current_user;
			//调用HAT_Counting_asset_info_toCountingTask创建盘点任务
		$query_insert_task = "call HAT_Counting_asset_info_toCountingTask('".$custom["batch_id"]."','".$custom["counting_batch_rule_id"]."',
		'".$current_user->id."','','','','','','','','','','','','','','','','',@task_id)";
		//var_dump($query_insert_task);
		$result_insert_task = $db->query($query_insert_task);
		if(!$result_insert_task){
			return "自定义分组创建盘点任务失败";
		}
		$return_task_id=$db->query("select @task_id");
		$row_task_id = $db->fetchByAssoc($return_task_id);
		$task_id=$row_task_id["@task_id"];
		//附加逻辑不为空
		if($custom["additional_logic"]){
			//var_dump("附加逻辑不为空");
			$additional_logic=str_replace("&#039;","'",$custom["additional_logic"]);
			$query_update="UPDATE hat_counting_tasks
			SET ".$additional_logic." 
			WHERE
			id ='".$task_id."'";
			//var_dump($query_update);
			$result_update = $db->query($query_update);
			if(!$result_update){
				return  "附加逻辑更新盘点任务信息失败";
			}
			//对新插入的盘点任务重新查询以便整理attribute信息

			$sql_task="SELECT
			a.*
			FROM
			hat_counting_tasks a
			WHERE
			a.id ='".$task_id."'";
			$result_task = $db->query($sql_task);
			if(!$result_task){
				return  "盘点任务信息拉取失败";
			}
			$row_task = $db->fetchByAssoc($result_task);
			//找出对应任务模版维护的atrribute信息
			//获取盘点批名称
			$sql_batch="SELECT
			a.name
			FROM
			hat_counting_batchs a
			WHERE
			a.id='".$custom["batch_id"]."'";
			$result_batch = $db->query($sql_batch);
			if(!$result_batch){
				return "盘点批信息拉取失败";
			}
			$row_batch = $db->fetchByAssoc($result_batch);
			$task_name=$row_batch["name"];
			$task_return=$this->setTaskname($row_task,$custom["hat_counting_task_templates_id_c"],$task_name);
			if($task_return['msg']!=''){
				return $task_return['msg'];
			}
			$task_name=$task_return["task_name"];
			//更新盘点任务名称
			$query_update_name="UPDATE hat_counting_tasks
			SET hat_counting_tasks.name = '".$task_name."'
			WHERE
			id ='".$task_id."'";
			$result_update_name = $db->query($query_update_name);
			if(!$result_update_name){
				return "更新盘点任务名称失败";
			}
			//分组条件处理
			$group_clause='';
			if($custom["group_clause"]){
				$group_clause=str_replace("&#039;","'",$custom["group_clause"]);
			}else{
				$group_clause='1=1 and hat_counting_task_dtl_tmp.grouped_flag="N"';
			}
			//获取分组 创建盘点明细
			$sql_group="SELECT
			*
			FROM
			hat_counting_task_dtl_tmp
			WHERE
			".$group_clause."";
			//var_dump($sql_group);
			$result_group = $db->query($sql_group);
			if(!$result_group){
				return "分组条件出错";
			}
			while($row_group = $db->fetchByAssoc($result_group)){
				//调用HAT_Counting_custom_to_line创建盘点明细
				$query_insert_line = "call HAT_Counting_custom_to_line('".$task_id."',
				'".$current_user->id."','".$row_group["asset_id"]."','".$row_group["line_attribute1"]."','".$row_group["line_attribute2"]."','".$row_group["line_attribute3"]."','".$row_group["line_attribute4"]."','".$row_group["line_attribute5"]."','".$row_group["line_attribute6"]."','".$row_group["line_attribute7"]."','".$row_group["line_attribute8"]."','".$row_group["line_attribute9"]."','".$row_group["line_attribute10"]."','".$row_group["line_attribute11"]."','".$row_group["line_attribute12"]."','".$row_group["line_attribute13"]."','".$row_group["line_attribute14"]."','".$row_group["line_attribute15"]."')";
					//var_dump($query_insert_line);
				$result_insert_line = $db->query($query_insert_line);
				if(!$result_insert_line){
					return "创建盘点明细失败";
				}

			}
			$sql_count="SELECT
			count(*) counting
			FROM
			hat_counting_tasks a
			WHERE
			1 = 1
			AND a.id='".$task_id."'
			AND NOT EXISTS (
			SELECT
			*
			FROM
			hat_counting_lines b
			WHERE
			a.id = b.hat_counting_tasks_id_c
			)";
			$result_count = $db->query($sql_count);
			if(!$result_count){
				return "查询未包含明细记录的任务时出错";
			}
			$row_count = $db->fetchByAssoc($result_count);
			if($row_count["counting"]>0){
				$query_delete_task="DELETE
				FROM
				hat_counting_tasks
				WHERE
				id = '".$task_id."'";
				$result_delete_task = $db->query($query_delete_task);
				if(!$result_delete_task){
					return "删除任务失败";
				}
			}
			}//附加逻辑不为空处理结束
		}
	}