
$(document).ready(function() {
    
    //add by hq 20170315 获取收支计费项子面板信息
    $.getScript("modules/HAOS_Revenues_Quotes/js/getSubpanelInfo.js",function(){
        getRevenuesSubpanelInfo();
    });
    //end add 20170315  

});
