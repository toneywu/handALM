{literal}<script>

$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap-iconpicker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css"/>');
$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap-iconpicker/icon-fonts/icomoon/css/style.css"/>');
$('head').append('<link rel="stylesheet" href="modules/HAA_Shortcuts/style.css"/>');


if(typeof OrgSelector == 'undefined') { //如果有多个Selector，只有一个有效，只加载一次
	function Set_Framework(framework_id) {
	     //在选了业务框架后完成两个动作
	     //1、通过Ajax加载对应的Site列表
	     //2、通过Ajax加载对应的ShortCuts
	     ajaxStatus.showStatus('{/literal}{$saving}{literal}'); // show that AJAX call is happening
	     	$.ajax({
					url: 'index.php?to_pdf=true&module=HAA_Frameworks&action=setframework&framework_id='+framework_id,
					success: function (data) {
						//将当前Framework写入Session,同时Data返回当前Framework对应的Sites列表
						//如果Framework正确加载，则进一步加载MaintSites
						//console.log('index.php?to_pdf=true&module=HAA_Frameworks&action=setframework&framework_id='+framework_id);
						//console.log(data);
						$("#site_selector_{/literal}{$id}{literal}").html(data);
						$("#site_selector_{/literal}{$id}{literal}").change();
						if(data=="") {
							$("#HAA_SiteSeletor_{/literal}{$id}{literal}").hide();
						}else{
							$("#HAA_SiteSeletor_{/literal}{$id}{literal}").show();
						}
					},
					error: function () { //失败
						alert('Error loading document');
					}
				})

	     		$.ajax({
					url: 'index.php?to_pdf=true&module=HAA_Shortcuts&action=getShortcutsPanel&framework_id='+framework_id,
					success: function (data) {
						console.log('index.php?to_pdf=true&module=HAA_Shortcuts&action=getShortcutsPanel&framework_id='+framework_id);
						$("#shortcuts_panel_{/literal}{$id}{literal}").html(data);
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
						//将当前Site写入Session
					},
					error: function () { //失败
						alert('Error loading document');
					}
				})
	}

}

$(document).ready(function(){

	$("#framework_selector_{/literal}{$id}{literal}").change(function(){
		Set_Framework($(this).val());
		//写入Session，同时列出Sites
		var logo_src=$("#framework_selector_{/literal}{$id}{literal} option:selected").attr('image');
		if (logo_src !="") {
			$("#Framework_Logo_{/literal}{$id}{literal}").html("<img src='"+logo_src+"'>");
		} else {
			$("#Framework_Logo_{/literal}{$id}{literal}").html("");
		}
	})

	$("#site_selector_{/literal}{$id}{literal}").change(function(){
		Set_Site($(this).val());
	})

	$("#framework_selector_{/literal}{$id}{literal}").change();
	$("#site_selector_{/literal}{$id}{literal}").change();
});

</script>{/literal}
