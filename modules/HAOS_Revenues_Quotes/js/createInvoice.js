
function createInvoice(){
  var RevenuesID = $('input[name=record]').val();
  getInfoToInvoice(RevenuesID);
}

//收支创建发票（其它同步结算调用，收支detail调用）
function getInfoToInvoice(RevenuesID){ 
   $.ajax({
          url: 'index.php?module=HAOS_Revenues_Quotes&action=infoToInvoice&to_pdf=true',
          data:{"record":RevenuesID},
          type:'POST',
          dataType: "json",
          success:function(data){
            //alert(data.value+';;;'+data.cord);
             location.href='?module=AOS_Invoices&action=editview&data='+data.value+'&cord='+data.cord+
             '&amount_c=0&source_code_c=HAOS_Revenues_Quotes&due_date='+data.event_date+
             '&name='+data.name;
          
          },
          error:function(e){            
          }
    });
}