//引用了IP解析代码
//REF：https://github.com/franksrevenge/IPSubnetCalculator
//
//    console.log( IpSubnetCalculator.toDecimal( '127.0.0.1' ) ); // "2130706433"
 //  console.log( IpSubnetCalculator.calculate( '5.4.3.21', '6.7.8.9' ) );
 $.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");
$("#name").bind("change",function(){
	if($("#name").val()!=""){
		check_name();
	}

});


$("#SAVE_HEADER").blur(function(){
		check_name();
});
	
	
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

function check_name(){

	var str =  $("#name").val();
	var suffix = str.substr(-3,3);
		if(suffix!="\/24"){
			$("#SAVE_HEADER").prop('disabled', true);
			$("#SAVE_HEADER").addClass('disabled');
			clear_all_errors();
			add_error_style('EditView',"name","IP Type Is not right");
		}else{
			clear_all_errors();
			$("#SAVE_HEADER").prop('disabled', false);
			$("#SAVE_HEADER").removeClass('disabled');
		}
	$ip_splited = $("#name").val().split("/");
	console.log(IpSubnetCalculator.isIp($ip_splited[0]));
	console.log($ip_splited[0]);
	if(!IpSubnetCalculator.isIp($ip_splited[0])){
		$("#SAVE_HEADER").prop('disabled', true);
			$("#SAVE_HEADER").addClass('disabled');
			clear_all_errors();
			add_error_style('EditView',"name",SUGAR.language.get("HIT_IP","LBL_ERROR_IP_TYPE"));
	}else{
		     clear_all_errors();
			$("#SAVE_HEADER").prop('disabled', false);
			$("#SAVE_HEADER").removeClass('disabled');
	}	
}


$(document).ready(function(){
	
	$.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");

	$("#SAVE_FOOTER").hide();
	$("#CANCEL_FOOTER").hide();
	if($("#name").val()!=""){
		check_name();
	}
	

	$("#name_desc").html(SUGAR.language.get('HIT_IP', 'LBL_NAME_DESC'));
	show_ip_desc($("#name").val(),$("#name_ip_desc"));


	$("#name").change(function(){
		show_ip_desc($("#name").val(),$("#name_ip_desc"));
		check_name();
	});
	
	$("#SAVE_HEADER").click(function(){
		check_name();
	});
	
	$("#name").blur(function(){
		check_name();
	});

   $("#name").keyup(function(){    
		$(this).val($(this).val().replace(/[^0-9./]/g,''));   
		
		check_name();
	}).bind("paste",function(){     
		$(this).val($(this).val().replace(/[^0-9./]/g,''));     
	}).css("ime-mode", "disabled");
});