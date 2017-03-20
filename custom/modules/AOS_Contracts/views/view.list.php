<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');
class AOS_ContractsViewList extends ViewList
{
/*
 *  重写方法，添加where条件
 */
function processSearchForm(){
	parent::processSearchForm();
	$haa_frameworks_id=$_SESSION["current_framework"];
	if ($this->where) { 
		$this->where.=" AND EXISTS ( SELECT 1 FROM aos_contracts_cstm tc WHERE aos_contracts.id=tc.id_c AND tc.haa_frameworks_id_c='".$haa_frameworks_id."')";
	}else{
		$this->where.=" EXISTS ( SELECT 1 FROM aos_contracts_cstm tc WHERE aos_contracts.id=tc.id_c AND tc.haa_frameworks_id_c='".$haa_frameworks_id."')";
	}
	//add by liu
	if ($_REQUEST['searchFormTab'] == 'advanced_search') {
		if ($_REQUEST['start_date_advanced_range_choice']!='') {
			$start_date_advanced_range_choice = $_REQUEST['start_date_advanced_range_choice'];
			if ($start_date_advanced_range_choice == '='
				||$start_date_advanced_range_choice == 'not_equal' 
				|| $start_date_advanced_range_choice == 'greater_than'
				||$start_date_advanced_range_choice == 'less_than') {
				if ($start_date_advanced_range_choice == '=') {
					$start_date_advanced_range_choice = '=';
				}elseif ($start_date_advanced_range_choice == 'not_equal') {
					$start_date_advanced_range_choice = '!=';
				}elseif ($start_date_advanced_range_choice == 'greater_than') {
					$start_date_advanced_range_choice = '>';
				}elseif ($start_date_advanced_range_choice == 'less_than') {
					$start_date_advanced_range_choice = '<';
				}
				if ($_REQUEST['range_start_date_advanced']!="") {
					$this->where.= " AND aos_contracts.start_date ".$start_date_advanced_range_choice." '".$_REQUEST['range_start_date_advanced']."'";
				}
				
			}elseif ($_REQUEST['start_date_advanced_range_choice']=='last_7_days') {
				$this->where.= " AND to_days(aos_contracts.start_date) >= to_days(now()) - 7
				AND aos_contracts.start_date <= now() ";
			}elseif ($_REQUEST['start_date_advanced_range_choice']=='next_7_days') {
				$this->where.= " AND aos_contracts.start_date >= now()
				AND to_days(aos_contracts.start_date) <= to_days(now()) + 7 ";
			}elseif ($_REQUEST['start_date_advanced_range_choice']=='last_30_days') {
				$this->where.= " AND to_days(aos_contracts.start_date) >= to_days(now()) - 30
				AND aos_contracts.start_date <= now() ";
			}elseif ($_REQUEST['start_date_advanced_range_choice']=='next_30_days') {
				$this->where.= " AND aos_contracts.start_date >= now()
				AND to_days(aos_contracts.start_date) <= to_days(now()) + 30 ";
			}elseif ($_REQUEST['start_date_advanced_range_choice']=='last_month') {
				$this->where.= " AND PERIOD_DIFF( date_format( now( ) , '%Y%m' ) , date_format( aos_contracts.start_date, '%Y%m' ) ) =1 ";
			}elseif ($_REQUEST['start_date_advanced_range_choice']=='this_month') {
				$this->where.= " AND DATE_FORMAT( aos_contracts.start_date, '%Y%m' ) = DATE_FORMAT( CURDATE( ) , '%Y%m' ) ";
			}elseif ($_REQUEST['start_date_advanced_range_choice']=='next_month') {
				$this->where.= " AND PERIOD_DIFF( date_format( now( ) , '%Y%m' ) , date_format( aos_contracts.start_date, '%Y%m' ) ) =-1 ";
			}elseif ($_REQUEST['start_date_advanced_range_choice']=='last_year') {
				$this->where.= " AND YEAR(aos_contracts.start_date)-YEAR(NOW()) =-1 ";
			}elseif ($_REQUEST['start_date_advanced_range_choice']=='this_year') {
				$this->where.= " AND YEAR(aos_contracts.start_date)=YEAR(NOW()) ";
			}elseif ($_REQUEST['start_date_advanced_range_choice']=='next_year') {
				$this->where.= " AND YEAR(aos_contracts.start_date)-YEAR(NOW()) =1 ";
			}elseif ($_REQUEST['start_date_advanced_range_choice']=='between') {
				if ($_REQUEST['range_start_date_advanced']!="") {
					$this->where.= " AND aos_contracts.start_date >= '".$_REQUEST['range_start_date_advanced']."' ";
				}
				if ($_REQUEST['end_range_start_date_advanced']!="") {
					$this->where.= " AND aos_contracts.start_date <= '".$_REQUEST['end_range_start_date_advanced']."' ";
				}
			}
		}
		if ($_REQUEST['end_date_advanced_range_choice']!='') {
			$end_date_advanced_range_choice = $_REQUEST['end_date_advanced_range_choice'];
			if ($end_date_advanced_range_choice == '='
				||$end_date_advanced_range_choice == 'not_equal' 
				|| $end_date_advanced_range_choice == 'greater_than'
				||$end_date_advanced_range_choice == 'less_than') {
				if ($end_date_advanced_range_choice == '=') {
					$end_date_advanced_range_choice = '=';
				}elseif ($end_date_advanced_range_choice == 'not_equal') {
					$end_date_advanced_range_choice = '!=';
				}elseif ($end_date_advanced_range_choice == 'greater_than') {
					$end_date_advanced_range_choice = '>';
				}elseif ($end_date_advanced_range_choice == 'less_than') {
					$end_date_advanced_range_choice = '<';
				}
				if ($_REQUEST['range_end_date_advanced']!="") {
					$this->where.= " AND aos_contracts.end_date ".$end_date_advanced_range_choice." '".$_REQUEST['range_end_date_advanced']."'";
				}
				
			}elseif ($_REQUEST['end_date_advanced_range_choice']=='last_7_days') {
				$this->where.= " AND to_days(aos_contracts.end_date) >= to_days(now()) - 7
				AND aos_contracts.end_date <= now() ";
			}elseif ($_REQUEST['end_date_advanced_range_choice']=='next_7_days') {
				$this->where.= " AND aos_contracts.end_date >= now()
				AND to_days(aos_contracts.end_date) <= to_days(now()) + 7 ";
			}elseif ($_REQUEST['end_date_advanced_range_choice']=='last_30_days') {
				$this->where.= " AND to_days(aos_contracts.end_date) >= to_days(now()) - 30
				AND aos_contracts.end_date <= now() ";
			}elseif ($_REQUEST['end_date_advanced_range_choice']=='next_30_days') {
				$this->where.= " AND aos_contracts.end_date >= now()
				AND to_days(aos_contracts.end_date) <= to_days(now()) + 30 ";
			}elseif ($_REQUEST['end_date_advanced_range_choice']=='last_month') {
				$this->where.= " AND PERIOD_DIFF( date_format( now( ) , '%Y%m' ) , date_format( aos_contracts.end_date, '%Y%m' ) ) =1 ";
			}elseif ($_REQUEST['end_date_advanced_range_choice']=='this_month') {
				$this->where.= " AND DATE_FORMAT( aos_contracts.end_date, '%Y%m' ) = DATE_FORMAT( CURDATE( ) , '%Y%m' ) ";
			}elseif ($_REQUEST['end_date_advanced_range_choice']=='next_month') {
				$this->where.= " AND PERIOD_DIFF( date_format( now( ) , '%Y%m' ) , date_format( aos_contracts.end_date, '%Y%m' ) ) =-1 ";
			}elseif ($_REQUEST['end_date_advanced_range_choice']=='last_year') {
				$this->where.= " AND YEAR(aos_contracts.end_date)-YEAR(NOW()) =-1 ";
			}elseif ($_REQUEST['end_date_advanced_range_choice']=='this_year') {
				$this->where.= " AND YEAR(aos_contracts.end_date)=YEAR(NOW()) ";
			}elseif ($_REQUEST['end_date_advanced_range_choice']=='next_year') {
				$this->where.= " AND YEAR(aos_contracts.end_date)-YEAR(NOW()) =1 ";
			}elseif ($_REQUEST['end_date_advanced_range_choice']=='between') {
				if ($_REQUEST['start_range_end_date_advanced']!="") {
					$this->where.= " AND aos_contracts.end_date >= '".$_REQUEST['start_range_end_date_advanced']."' ";
				}
				if ($_REQUEST['end_range_end_date_advanced']!="") {
					$this->where.= " AND aos_contracts.end_date <= '".$_REQUEST['end_range_end_date_advanced']."' ";
				}
			}
		}
	}
	else{
		if ($_REQUEST['start_date_basic_range_choice']!='') {
			$start_date_basic_range_choice = $_REQUEST['start_date_basic_range_choice'];
			if ($start_date_basic_range_choice == '='
				||$start_date_basic_range_choice == 'not_equal' 
				|| $start_date_basic_range_choice == 'greater_than'
				||$start_date_basic_range_choice == 'less_than') {
				if ($start_date_basic_range_choice == '=') {
					$start_date_basic_range_choice = '=';
				}elseif ($start_date_basic_range_choice == 'not_equal') {
					$start_date_basic_range_choice = '!=';
				}elseif ($start_date_basic_range_choice == 'greater_than') {
					$start_date_basic_range_choice = '>';
				}elseif ($start_date_basic_range_choice == 'less_than') {
					$start_date_basic_range_choice = '<';
				}
				if ($_REQUEST['range_start_date_basic']!="") {
					$this->where.= " AND aos_contracts.start_date ".$start_date_basic_range_choice." '".$_REQUEST['range_start_date_basic']."'";
				}
				
			}elseif ($_REQUEST['start_date_basic_range_choice']=='last_7_days') {
				$this->where.= " AND to_days(aos_contracts.start_date) >= to_days(now()) - 7
				AND aos_contracts.start_date <= now() ";
			}elseif ($_REQUEST['start_date_basic_range_choice']=='next_7_days') {
				$this->where.= " AND aos_contracts.start_date >= now()
				AND to_days(aos_contracts.start_date) <= to_days(now()) + 7 ";
			}elseif ($_REQUEST['start_date_basic_range_choice']=='last_30_days') {
				$this->where.= " AND to_days(aos_contracts.start_date) >= to_days(now()) - 30
				AND aos_contracts.start_date <= now() ";
			}elseif ($_REQUEST['start_date_basic_range_choice']=='next_30_days') {
				$this->where.= " AND aos_contracts.start_date >= now()
				AND to_days(aos_contracts.start_date) <= to_days(now()) + 30 ";
			}elseif ($_REQUEST['start_date_basic_range_choice']=='last_month') {
				$this->where.= " AND PERIOD_DIFF( date_format( now( ) , '%Y%m' ) , date_format( aos_contracts.start_date, '%Y%m' ) ) =1 ";
			}elseif ($_REQUEST['start_date_basic_range_choice']=='this_month') {
				$this->where.= " AND DATE_FORMAT( aos_contracts.start_date, '%Y%m' ) = DATE_FORMAT( CURDATE( ) , '%Y%m' ) ";
			}elseif ($_REQUEST['start_date_basic_range_choice']=='next_month') {
				$this->where.= " AND PERIOD_DIFF( date_format( now( ) , '%Y%m' ) , date_format( aos_contracts.start_date, '%Y%m' ) ) =-1 ";
			}elseif ($_REQUEST['start_date_basic_range_choice']=='last_year') {
				$this->where.= " AND YEAR(aos_contracts.start_date)-YEAR(NOW()) =-1 ";
			}elseif ($_REQUEST['start_date_basic_range_choice']=='this_year') {
				$this->where.= " AND YEAR(aos_contracts.start_date)=YEAR(NOW()) ";
			}elseif ($_REQUEST['start_date_basic_range_choice']=='next_year') {
				$this->where.= " AND YEAR(aos_contracts.start_date)-YEAR(NOW()) =1 ";
			}elseif ($_REQUEST['start_date_basic_range_choice']=='between') {
				if ($_REQUEST['start_range_start_date_basic']!="") {
					$this->where.= " AND aos_contracts.start_date >= '".$_REQUEST['start_range_start_date_basic']."' ";
				}
				if ($_REQUEST['end_range_start_date_basic']!="") {
					$this->where.= " AND aos_contracts.start_date <= '".$_REQUEST['end_range_start_date_basic']."' ";
				}
			}
		}

		///////////////////////////////////////
		if ($_REQUEST['end_date_basic_range_choice']!='') {
			$end_date_basic_range_choice = $_REQUEST['end_date_basic_range_choice'];
			if ($end_date_basic_range_choice == '='
				||$end_date_basic_range_choice == 'not_equal' 
				|| $end_date_basic_range_choice == 'greater_than'
				||$end_date_basic_range_choice == 'less_than') {
				if ($end_date_basic_range_choice == '=') {
					$end_date_basic_range_choice = '=';
				}elseif ($end_date_basic_range_choice == 'not_equal') {
					$end_date_basic_range_choice = '!=';
				}elseif ($end_date_basic_range_choice == 'greater_than') {
					$end_date_basic_range_choice = '>';
				}elseif ($end_date_basic_range_choice == 'less_than') {
					$end_date_basic_range_choice = '<';
				}
				if ($_REQUEST['range_end_date_basic']!="") {
					$this->where.= " AND aos_contracts.end_date ".$end_date_basic_range_choice." '".$_REQUEST['range_end_date_basic']."'";
				}
				
			}elseif ($_REQUEST['end_date_basic_range_choice']=='last_7_days') {
				$this->where.= " AND to_days(aos_contracts.end_date) >= to_days(now()) - 7
				AND aos_contracts.end_date <= now() ";
			}elseif ($_REQUEST['end_date_basic_range_choice']=='next_7_days') {
				$this->where.= " AND aos_contracts.end_date >= now()
				AND to_days(aos_contracts.end_date) <= to_days(now()) + 7 ";
			}elseif ($_REQUEST['end_date_basic_range_choice']=='last_30_days') {
				$this->where.= " AND to_days(aos_contracts.end_date) >= to_days(now()) - 30
				AND aos_contracts.end_date <= now() ";
			}elseif ($_REQUEST['end_date_basic_range_choice']=='next_30_days') {
				$this->where.= " AND aos_contracts.end_date >= now()
				AND to_days(aos_contracts.end_date) <= to_days(now()) + 30 ";
			}elseif ($_REQUEST['end_date_basic_range_choice']=='last_month') {
				$this->where.= " AND PERIOD_DIFF( date_format( now( ) , '%Y%m' ) , date_format( aos_contracts.end_date, '%Y%m' ) ) =1 ";
			}elseif ($_REQUEST['end_date_basic_range_choice']=='this_month') {
				$this->where.= " AND DATE_FORMAT( aos_contracts.end_date, '%Y%m' ) = DATE_FORMAT( CURDATE( ) , '%Y%m' ) ";
			}elseif ($_REQUEST['end_date_basic_range_choice']=='next_month') {
				$this->where.= " AND PERIOD_DIFF( date_format( now( ) , '%Y%m' ) , date_format( aos_contracts.end_date, '%Y%m' ) ) =-1 ";
			}elseif ($_REQUEST['end_date_basic_range_choice']=='last_year') {
				$this->where.= " AND YEAR(aos_contracts.end_date)-YEAR(NOW()) =-1 ";
			}elseif ($_REQUEST['end_date_basic_range_choice']=='this_year') {
				$this->where.= " AND YEAR(aos_contracts.end_date)=YEAR(NOW()) ";
			}elseif ($_REQUEST['end_date_basic_range_choice']=='next_year') {
				$this->where.= " AND YEAR(aos_contracts.end_date)-YEAR(NOW()) =1 ";
			}elseif ($_REQUEST['end_date_basic_range_choice']=='between') {
				if ($_REQUEST['start_range_end_date_basic']!="") {
					$this->where.= " AND aos_contracts.end_date >= '".$_REQUEST['start_range_end_date_basic']."' ";
				}
				if ($_REQUEST['end_range_end_date_basic']!="") {
					$this->where.= " AND aos_contracts.end_date <= '".$_REQUEST['end_range_end_date_basic']."' ";
				}
			}
		}
		
	}
	//增加HPR权限控制逻辑
	global $current_user;
	require_once('modules/HPR_Group_Priviliges/checkListACL.php');
	$current_module = $this->module;
	$current_user_id =$current_user->id;
	$aclSQLList=getListViewSQLStatement($current_module,$current_user_id,$haa_frameworks_id);
	$this->where.=empty($this->where)?(empty($aclSQLList)?"":$aclSQLList):(empty($aclSQLList)?"":'  AND '.$aclSQLList);
	//End HPR权限控制逻辑
} 
function display()
{
	//global $db;
	echo '<script src="modules/AOS_Contracts/js/AOS_Contracts_listview.js"></script>';
	/*if(isset($_GET['error_message'])&&!empty($_GET['error_message'])){
		echo '<script>var return_msg="'.$_GET['error_message'].'"</script>';
	}*/
	parent::display();
	//var_dump($db->lastsql);
}
}