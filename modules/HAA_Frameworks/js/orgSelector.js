
if(typeof OrgSelector == 'undefined') { //如果有多个Selector，只有一个有效，只加载一次
	function Set_Framework(framework_id,site_selector_obj,btn_save_obj) {
	    // ajaxStatus.showStatus('{/literal}{$saving}{literal}'); // show that AJAX call is happening
	     //alert("clicked");
	     	$.ajax({
					url: 'index.php?to_pdf=true&module=HAA_Frameworks&action=setframework&framework_id='+framework_id,
					success: function (data) {
						//将当前Framework写入Session,同时Data返回当前Framework对应的Sites列表
						//如果Framework正确加载，则进一步加载MaintSites
						//console.log('index.php?to_pdf=true&module=HAA_Frameworks&action=setframework&framework_id='+framework_id);
						site_selector_obj.html(data);
						site_selector_obj.change();
						if(data=="") {
							site_selector_obj.parent().hide();
						}else{
							site_selector_obj.parent().show();
						}
						//如果Site列表已经加载完毕，则可以显示按钮
						btn_save_obj.show();
					},
					error: function () { //失败
						alert('Error loading document');
					}
				})
	}

	function Set_Site(site_id) {
	    	$.ajax({
				url: 'index.php?to_pdf=true&module=HAA_Frameworks&action=setsite&site_id='+site_id,
				success: function (data) {
					//将当前Site写入Session（在之前的Ajax中已经完成了这个过程）
				},
				error: function () { //失败
					alert('Error loading document');
				}
			})
	}


	function init_orgSelector(framework_selector_obj, site_selector_obj, btn_save_obj) {

		if (typeof btn_save_obj !="undefined") {
			btn_save_obj.hide(); //先将按钮隐藏，防止在没有加载完列表的情况下用户手快点击了按钮，从而没有完成应有的加载过程
		}

		framework_selector_obj.change(function(){
			//如果Framework选择列表有选择，就出发对Framework的Session写入，及关联Sites列表的加载
			Set_Framework($(this).val(),site_selector_obj,btn_save_obj);
		})

		site_selector_obj.change(function(){
			//如果选择了Site，就将Site保存在Session中
			Set_Site($(this).val());
		})

		//默认首个初始值，因为大多数情况下用户只有一个Framework或Session，这可以简化用户的操作。
		framework_selector_obj.change();
		site_selector_obj.change();
	}

	function btn_redirect(return_module,return_action){
		window.location ="index.php?module="+return_module+"&action="+return_action;
	}
}

$(document).ready(function(){
	init_orgSelector($("#framework_selector"),$("#site_selector"),$('#btn_save'));
});