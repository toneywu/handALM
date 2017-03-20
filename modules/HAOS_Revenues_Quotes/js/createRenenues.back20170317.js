
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
      if(result){
                  console.log('index.php?module='+module+'&action='+action+'&to_pdf=true');
                  
                  //modify by hq 20170314
                  $.ajax({
                    url: 'index.php?module='+module+'&action='+action+'&to_pdf=true',
                    data:{"record":id},
                    type:'POST',
                    dataType: "json",
                    success:function(data){
                      console.log('data:');
                      console.log(data);
                      if(data.return_status=='S'){
                        //window.location.href = "index.php?module=HAOS_Revenues_Quotes&action=EditView&record=86b3dc55-b21f-0921-b3b9-58c4f68a97ec";
                        //alert('111222');
                        RevenuesID = data.return_data.haos_revenues_quotes_id;
                        if(RevenuesID){
                          if($('#synchronization_settlement').is(':checked')){
                            getInfoToInvoice(RevenuesID);
                          }else{
                            window.location.href = "index.php?module=HAOS_Revenues_Quotes&action=EditView&record=" + RevenuesID;
                          }
                        }
                      }else{
                        BootstrapDialog.alert({
                          type : BootstrapDialog.TYPE_DANGER,
                          title : '警告',
                          message : data.return_msg
                        });

                      }

                    },
                    error:function(e){ 
                      alert('错误');       
                    }
                  });               
                  //end modify 20170314
                 
                }else{
                }
              }
            });
  
}

function createRevenuesAJAX(id,module,action){
  var RevenuesID = '';
   // console.log('index.php?module='+module+'&action='+action+'&to_pdf=true');
   $.ajax({
    url: 'index.php?module='+module+'&action='+action+'&to_pdf=true',
    data:{"record":id},
    type:'POST',
    dataType: "json",
    success:function(data){
            //alert(data.return_status);
            alert('111');
            console.log('data:');
            console.log(data);
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
            '&name='+data.name+'&status=Unpaid';

          },
          error:function(e){            
          }
        });
}