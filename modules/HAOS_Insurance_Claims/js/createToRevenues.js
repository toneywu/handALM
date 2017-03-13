//给创建发票按钮增加 同步结算逻辑
function createRevenues(){
    $.getScript("modules/HAOS_Revenues_Quotes/js/createRenenues.js");
    var id = $('input[name=record]').val();
    SubmitToCreateToRevenues(id,'HAOS_Insurance_Claims','createToRevenues');   
}