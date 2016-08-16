//引用了IP解析代码
//REF：https://github.com/franksrevenge/IPSubnetCalculator
//
//    console.log( IpSubnetCalculator.toDecimal( '127.0.0.1' ) ); // "2130706433"
 //  console.log( IpSubnetCalculator.calculate( '5.4.3.21', '6.7.8.9' ) );

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

$(document).ready(function(){

	$("#name_desc").html(SUGAR.language.get('HIT_IP', 'LBL_NAME_DESC'));
	show_ip_desc($("#name").val(),$("#name_ip_desc"));


	$("#name").change(function(){
		show_ip_desc($("#name").val(),$("#name_ip_desc"));
	})

});