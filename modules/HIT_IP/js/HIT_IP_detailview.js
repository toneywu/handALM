//引用了IP解析代码
//REF：https://github.com/franksrevenge/IPSubnetCalculator
//
//    console.log( IpSubnetCalculator.toDecimal( '127.0.0.1' ) ); // "2130706433"
 //  console.log( IpSubnetCalculator.calculate( '5.4.3.21', '6.7.8.9' ) );
$.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");

function commit_subnet_data(object_id) {
	SUGAR.ajaxUI.showLoadingPanel();
}

$(document).ready(function(){

/*	function show_ip_desc(ip_val,desc_obj) {
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


	$("#name").append("<span id='name_ip_desc' class='input_desc'></span>");
	show_ip_desc($("#name").text(),$("#name_ip_desc"));
*/
	$('#LBL_DETAILVIEW_PANEL1 td:first').hide();

   $("#btnAddNewLine").click(function(){ //如果点了Submit按钮，调用Ajax修改状态
     	commit_subnet_data($("input[name='record']").val());
   });



});