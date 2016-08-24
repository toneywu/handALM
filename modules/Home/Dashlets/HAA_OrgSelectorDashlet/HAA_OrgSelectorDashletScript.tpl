{literal}<script>
if(typeof OrgSelector == 'undefined') { //如果有多个Selector，只有一个有效，只加载一次
	function Set_Framework(framework_id) {
	     ajaxStatus.showStatus('{/literal}{$saving}{literal}'); // show that AJAX call is happening
	     //alert("clicked");
	     	$.ajax({
					url: 'index.php?to_pdf=true&module=HAA_Frameworks&action=setframework&framework_id='+framework_id,
					success: function (data) {
						//将当前Framework写入Session,同时Data返回当前Framework对应的Sites列表
						//如果Framework正确加载，则进一步加载MaintSites
						console.log('index.php?to_pdf=true&module=HAA_Frameworks&action=setframework&framework_id='+framework_id);
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
	})

	$("#site_selector_{/literal}{$id}{literal}").change(function(){
		Set_Site($(this).val());
	})

	$("#framework_selector_{/literal}{$id}{literal}").change();
	$("#site_selector_{/literal}{$id}{literal}").change();
});

</script>{/literal}
