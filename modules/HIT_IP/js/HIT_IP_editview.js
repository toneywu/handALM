//引用了IP解析代码
//REF：https://github.com/franksrevenge/IPSubnetCalculator
//
//    console.log( IpSubnetCalculator.toDecimal( '127.0.0.1' ) ); // "2130706433"
 //  console.log( IpSubnetCalculator.calculate( '5.4.3.21', '6.7.8.9' ) );
 $.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");
 $.getScript("modules/HAA_FF/ff_include.js");
 $.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js"); // MessageBox
$('head').append('<link rel="stylesheet" href="custom/resources/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css" type="text/css" />');

function show_ip_desc(ip_val,desc_obj) {
	ip_splited = ip_val.split("/")
	if ( IpSubnetCalculator.isIp(ip_splited[0])&&ip_splited[1]<=32&&ip_splited[1]>=0) {
	  var ip_caled = IpSubnetCalculator.calculateSubnetMask(ip_splited[0],ip_splited[1])
	  //console.log(ip_caled);
	  desc_obj.html("-----<br/>"
	  						+ SUGAR.language.get('HIT_IP', 'LBL_IP_NETMASK')+" <strong>"+ip_caled.prefixMaskStr + "</strong><br/>" 
	  	                    + SUGAR.language.get('HIT_IP', 'LBL_IP_FIRST')+" <strong>"+ip_caled.ipLowStr + "</strong><br/>" 
	  	                    + SUGAR.language.get('HIT_IP', 'LBL_IP_LAST')+" <strong>"+ip_caled.ipHighStr + "</strong><br/>" 
	  	                    + SUGAR.language.get('HIT_IP', 'LBL_IP_COUNT')+" <strong>"+Math.pow(2,ip_caled.invertedSize)+"</strong>");
	 } else {
	 	desc_obj.html("");
	 }
};


/**
 * 点击按钮 调用Ajax请求 获取权限
 * @param name
 */
function checkAccess(){
	    var segmentName = $("#name").val();
		var record = $("input[name=record]").val();
		var error_msg="";
		console.log('index.php?to_pdf=true&module=HIT_IP&action=checkCSegmentExists&segmentName=' + segmentName+"&record="+record);
		$.ajax({
			url: 'index.php?to_pdf=true&module=HIT_IP&action=checkCSegmentExists&segmentName=' + segmentName+"&record="+record,
			success: function (data) {
				if(data=="Y"){
					error_msg=SUGAR.language.get("HIT_IP","LBL_ALREADY_EXISTS_IN_SYSTEM");
					add_error_style('EditView',"name_desc",error_msg);
					BootstrapDialog.alert({
					type : BootstrapDialog.TYPE_DANGER,
					title : SUGAR.language.get('app_strings',
							'LBL_EMAIL_ERROR_GENERAL_TITLE'),
					message : error_msg
				});
				}
			},
			error: function () { //失败
			}
		});
};


function check_name(){

	var result_flag = true;
	var error_msg = "";
	var str =  $("#name").val();
	var suffix = str.substr(-3,3);
	checkAccess();
	if(error_msg==""){
		if(suffix!="\/24"){
			$("#SAVE_HEADER").prop('disabled', true);
			$("#SAVE_HEADER").addClass('disabled');
			clear_all_errors();
			error_msg=SUGAR.language.get("HIT_IP","LBL_ERROR_IP_TYPE");
			add_error_style('EditView',"name_desc",error_msg);
			result_flag=false;
		}else{
			clear_all_errors();
			$("#SAVE_HEADER").prop('disabled', false);
			$("#SAVE_HEADER").removeClass('disabled');
		}
	
		$ip_splited = $("#name").val().split("/");
		if(!IpSubnetCalculator.isIp($ip_splited[0])){
			$("#SAVE_HEADER").prop('disabled', true);
				$("#SAVE_HEADER").addClass('disabled');
				clear_all_errors();
				add_error_style('EditView',"name_desc",SUGAR.language.get("HIT_IP","LBL_ERROR_IP_TYPE"));
				error_msg=SUGAR.language.get("HIT_IP","LBL_ERROR_IP_TYPE");
				result_flag=false;
		}else{
				 clear_all_errors();
				$("#SAVE_HEADER").prop('disabled', false);
				$("#SAVE_HEADER").removeClass('disabled');
		}
	}
		console.log(error_msg);
		if (error_msg != "") {
		add_error_style('EditView',"name_desc",error_msg);
		BootstrapDialog.alert({
					type : BootstrapDialog.TYPE_DANGER,
					title : SUGAR.language.get('app_strings',
							'LBL_EMAIL_ERROR_GENERAL_TITLE'),
					message : error_msg
				});
		}else{
			$("#SAVE_HEADER").prop('disabled', false);
		    $("#SAVE_HEADER").removeClass('disabled');
		
		}
		
		return result_flag;
}


$(document).ready(function(){
	
	$.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");

	$("#SAVE_FOOTER").hide();
	$("#CANCEL_FOOTER").hide();
	
	if($("#name").val()!=""){
		check_name();
	}
	
	//改写Save事件，在Save之前加入数据校验
	SUGAR.util.doWhen("typeof OverwriteSaveBtn == 'function'", function(){
		OverwriteSaveBtn(check_name);//ff_include.js 注意preValidateFunction是一个Function，在此引用时不加（）
	});
	

	$("#name_desc").html(SUGAR.language.get('HIT_IP', 'LBL_NAME_DESC'));
	show_ip_desc($("#name").val(),$("#name_ip_desc"));


	$("#name").change(function(){
		show_ip_desc($("#name").val(),$("#name_ip_desc"));
		check_name();
	});
	
	/*$("#SAVE_HEADER").click(function(){
		check_name();
	});*/
	
	/*$("#name").blur(function(){
		check_name();
	});*/

   $("#name").keyup(function(){    
		$(this).val($(this).val().replace(/[^0-9./]/g,''));   
		//console.log("keyup ");
	    //check_name();
	}).bind("paste",function(){     
		$(this).val($(this).val().replace(/[^0-9./]/g,''));     
	}).css("ime-mode", "disabled");
});