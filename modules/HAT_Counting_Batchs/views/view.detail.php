<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.detail.php');
require_once('modules/HAT_Counting_Tasks/populateLineCountInfo.php');

class HAT_Counting_BatchsViewDetail extends ViewDetail
{
	function display()
	{
		global $db;
		parent::display();
		
		echo '<script>
		$(function(){
		$("#hat_counting_tasks_search").nextAll().each(function(i){
			if(i>0){
				var tds=$(this).children();
				var url=tds.eq(1).find("a").attr("href");
				var courd=decodeURIComponent(url).split(/=/)[5];
				$.ajax({
					url:"?module=HAT_Counting_Batchs&action=getCountingResult&to_pdf=true",
					data:"&id="+courd,
					type:"POST",
					async:false,
					success:function(data){
						data=JSON.parse(data);
						tds.eq(4).find("span").html(data["total_counting"]);
						tds.eq(5).find("span").html(data["actual_counting"]);
						tds.eq(6).find("span").html(data["matched_count"]);
						tds.eq(7).find("span").html(data["different_count"]);
						tds.eq(8).find("span").html(data["overage_count"]);
						tds.eq(9).find("span").html(data["loss_count"]);
						tds.eq(10).find("span").html(data["processed_count"]);
					}
				});
			}
		});
		});
		</script>';
	}
}