
function SubmitToCreateToRevenues(id,module,action){  
   //alert('SubmitToCreateToRevenues');
   var html = '';
   html = getConfirmHtml();
   getConfirm(html,id,module,action);  
} 

function getConfirmHtml(){
  //增加同步结算 checkbox
  var SynHTML = "<span class='input_group' style='height:32px;'>"+
   "<label style='display:inline-block;width:120px;'>是否同步结算: </label>"+
   "<input  type='checkbox'  name='synchronization_settlement' id='synchronization_settlement' maxlength='50' value=''  title='' >"+
   "</span>";
   
  var html = SynHTML;

  return html;
}

function getConfirm(html,id,module,action){
  $.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");
    $.getScript("modules/HAA_FF/ff_include.js");
  $.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js");

  var RevenuesID = '';
  var InvoiceID = '';
  BootstrapDialog.confirm({
            size: BootstrapDialog.SIZE_NORMAL,
            title:"结算方式",
            message:html,
            callback: function(result){
                if(result) {
                  RevenuesID = createRevenuesAJAX(id,module,action);
                  //alert(RevenuesID);
                  if(RevenuesID){
                    if($('#synchronization_settlement').is(':checked')){
                       getInfoToInvoice(RevenuesID);
                    }else{
                      window.location.href = "index.php?module=HAOS_Revenues_Quotes&action=EditView&record=" + RevenuesID;
                    }
                  }
                  
                }else{
                    //alert($('#pay_date').val());
                }
            }
        });
    //return false;
  //return $return_result;
}

function createRevenuesAJAX(id,module,action){
  var RevenuesID = '';
    console.log('index.php?module='+module+'&action='+action+'&to_pdf=true');
   $.ajax({
          url: 'index.php?module='+module+'&action='+action+'&to_pdf=true',
          data:{"record":id},
          type:'POST',
          dataType: "json",
          success:function(data){
            //alert(data.return_status);
            if(data.return_status=='S'){
              RevenuesID = data.return_data.haos_revenues_quotes_id;
            }else{
              BootstrapDialog.alert({
                    type : BootstrapDialog.TYPE_DANGER,
                    title : '警告',
                    message : data.return_msg
                });

            }
           
          },
          error:function(e){            
          }
    });

   return RevenuesID;
}


function createInvoiceAJAX(RevenuesID){
  var InvoiceID = '';

   $.ajax({
          url: 'index.php?module=HAOS_Revenues_Quotes&action=createToInvoices&to_pdf=true',
          data:{"record":RevenuesID},
          type:'POST',
          dataType: "json",
          success:function(data){
           //InvoiceID = data;
            if(data.return_status=='S'){
              InvoiceID = data.return_data.aos_invoices_id_c;
            }else{
              BootstrapDialog.alert({
                    type : BootstrapDialog.TYPE_DANGER,
                    title : '警告',
                    message : data.return_msg
                });
            }
          },
          error:function(e){            
          }
    });

   return InvoiceID;
}

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