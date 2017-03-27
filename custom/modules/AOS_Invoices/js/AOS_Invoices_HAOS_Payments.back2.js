 $.getScript("custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js");

 $.getScript("modules/HAA_FF/ff_include.js");
 $.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js");
//add by huangqing 20170225
function createPayments(){

 var moduleId = $("input[name=record]").val();
 var InvIdArr = new Array();
 InvIdArr.push(moduleId);
 createPaymentsAjax('DetailView',InvIdArr); 

}

function createPaymentsForManyInv(){
  var bool=false;//是否有选择，默认没有
  var num=0;
  var data_array=new Array();
  $('.list.view.table-responsive tbody').find(':checkbox').each(function(){
    if($(this).is(':checked')){
      data_array.push($(this).val());
            //alert('data_array[num]:'+data_array[num]);
            bool=true;
            num++;
          }
        });

  if(bool==true){
    createPaymentsAjax('ListView',data_array);          
  }else{
    jQuery.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js").done(function(){
     BootstrapDialog.alert({
      type : BootstrapDialog.TYPE_DANGER,
      title : '警告',
      message : '请勾选记录！'
    });
   });
  }
}


function createPaymentsAjax(p_view,p_InvIdArr){
  $.getScript("custom/modules/AOS_Invoices/js/validateAmount.js");
  $.ajax({
    url:'index.php?module=AOS_Invoices&action=createPayments&to_pdf=true',
    data:{"view":p_view,"type":"check","data":p_InvIdArr},
    type:'POST',
    dataType: "json",
    success:function(data){ 
      checkPayoff(data,p_view,p_InvIdArr);
    }
  });
}

//以往租金包括未完全支付后剩余款项
function checkPayoff(data,p_view,p_InvIdArr){
  var val=data;
  var result_data = data.return_data;
  $.ajax({
    url:'index.php?module=AOS_Invoices&action=validateWhetherPayOff&to_pdf=true',
    data:{"accountId":result_data.billing_account_id,"contactId":result_data.billing_contact_id,"invoiceIdArr":p_InvIdArr,"frameworksId":result_data.haa_frameworks_id_c},
    type:'POST',
    dataType:"json",
    success:function(data22){
                 //alert(data22.return_data.sqlq);
                 if(data22.return_status == 'E'){
                  alert(data22.return_msg);
                }

                if(val.return_status=='S'){

                }
              }
            });
}

function setConfirm(data,p_view,p_InvIdArr){
  var result_data = data.return_data;
  var unpaidamo = data.return_data.unpaiedAllAmount;
  $html = getAlertHtml(unpaidamo);
  jQuery.getScript("custom/resources/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js").done(function(){
    BootstrapDialog.confirm({
      size: BootstrapDialog.SIZE_NORMAL,
      title:"收付款",
      message:$html,
      callback: function(result){
        if(result){
          var pay_date_r = $('#pay_date').val();//付款日期
          var PayAmount_r =$('#NoAllPayAmount').val();//付款金额
          var pay_method_type_r = $('#pay_method_type').val();
          var description_r = $('#line_description').val();//说明
          var all_pay_flag = 'Y';//全部付款
          if($('#all_pay_flag').is(':checked')){
            all_pay_flag= 'Y';
          }else{
            all_pay_flag= 'N';
          }

        }
      }
    });
  });
}

//type 0:list 1:edit
function getAlertHtml(unpaidAmount){
  var $PayDateHTML='<script type="text/javascript" src="custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>'+
  '<link rel="stylesheet" type="text/css" href="custom/resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">'+  
  '<span class="input-group"><span style="width:350px;" class="input-group date calender" id="span_pay_date" >'+
  " <label  style=]display:inline-block;width:120px;' >付款日期<span class='required'>*</span>: </label>"+
  ' <input class="date_input" style="width:170px;height:32px;" autocomplete="off"  name="pay_date" id="pay_date" value="" title="" tabindex="116" type="text" >'+
  ' <span class="input-group-addon">'+
  '     <span class="glyphicon glyphicon-calendar"></span>'+
  ' </span>'+
  '</span></span><br>'+
  '<script type="text/javascript">'+
  'var Datetimepicker=$(".calender");'+
  //var dateformat="Y-m-d H:M";
  'var dateformat = "yyyy-mm-dd";'+
  'Datetimepicker.datetimepicker({'+
  'language:"zh_CN",'+
  'format:dateformat,'+
  'showMeridian:true,'+
  'minView:2,'+
  'todayBtn:true,'+
  'autoclose:true,'+
  '});'+
  '</script>'; 

  
  var $UnpaidAmount = format2Number(unpaidAmount,2);
  var $UnpaidAmountHTML = "<span id='unpaied_amount_undisplay' style='display:none;'>"+$UnpaidAmount+"</span><span class='input_group'>"+
  "<label style=]display:inline-block;width:120px;'>未付金额<span class='required'>*</span>: </label>"+
  "<input disabled=true type='text' name='unpaid_amount' id='unpaid_amount' maxlength='50' value='' title='' >"+
  "</span><br>";


  var $AllPayHTML ="<span class='input_group' style='height:32px;'>"+
  "<label style='display:inline-block;width:120px;'>是否全额付款<span class='required'>*</span>: </label>"+
  "<input  type='checkbox' onchange='getAllPayAmount()' name='all_pay_flag' id='all_pay_flag' maxlength='50' value=''  title='' >"+
  "</span><br>"+
  "<script type='text/javascript'>"+
  "function getAllPayAmount(){"+
  " var flag = $('#all_pay_flag').is(':checked')?'1':'0';"+
  " if(flag == '1'){ "+
  "    $('#YesAllPayAmount').show();"+
  "    $('#NoAllPayAmount').hide();"+
  "    $('#NoAllPayAmount').val($('#YesAllPayAmount').val()); "+
  " }else{"+
  "    $('#YesAllPayAmount').hide();"+
  "    $('#NoAllPayAmount').show();"+
  "    $('#NoAllPayAmount').val('');"+
  " }"+
  "}"+
  "</script>";

  var $payAllAmountHTML = "<span class='input_group'>"+
  "<label style=]display:inline-block;width:120px;'>付款金额<span class='required'>*</span>: </label>"+
  "<input style='display:none;' disabled=true autocomplete='off' type='text' name='YesAllPayAmount' id='YesAllPayAmount' maxlength='50' value='' title=''>"+
  "<input autocomplete='off' onblur='validatePayAmount()' type='text' name='NoAllPayAmount' id='NoAllPayAmount' maxlength='50' value='' title=''>"+
  "</span><br>"+
  "<script type='text/javascript'>"+
  "function validatePayAmount(){"+
  " var maxAmount = unformatNumber($('#YesAllPayAmount').val().trim(),',','.');"+
  " var amount = unformatNumber($('#NoAllPayAmount').val().trim(),',','.');"+
  // " var maxAmount = $('#YesAllPayAmount').val();"+
  // " var amount = $('#NoAllPayAmount').val();"+
  " if(amount <= 0){ "+
  "    alert('金额必须大于0');"+
  "    $('#NoAllPayAmount').val(''); "+
  " }"+
  " if(amount>maxAmount){"+
  "    alert('金额必须小于未付金额');"+
  "    $('#NoAllPayAmount').val('');"+
  " }"+
  " if($('#NoAllPayAmount').val()!=''){"+
  "     $('#NoAllPayAmount').val(format2Number($('#NoAllPayAmount').val(),2));"+
  " }"+
  "}"+
  "</script>";
  
  var $payTypeHTML = "<span class='input_group'>"+
  "<label style=]display:inline-block;width:120px;'>付款方式: </label>"+
  "<select tabindex='116' name='pay_method_type' id='pay_method_type'>"+
  "<option label='现金' value='Cash'>现金</option>"+
  "<option label='银行转账' value='Transfer'>银行转账</option>"+
  "</select>"+
  "</span><br>";

  var $description = "<span class='input_group'>"+
  "<label style=]display:inline-block;width:120px;'>说明：</label>"+
  "<input style=' width:210px;' type='text' name='line_description' id='line_description' maxlength='50' value='' title=''>"+
  "</span>";


  var $jsHTML = "<script type='text/javascript'>"+
  " $(function(){"+
  "     $('#pay_date').val(getSysdate());"+
  "     $('#unpaid_amount').val($('#unpaied_amount_undisplay').text());"+
  "     $('#YesAllPayAmount').val($('#unpaied_amount_undisplay').text());"+
  " });"+  
  "</script>"+
  "<script type=\"text/javascript\" src=\"custom/modules/AOS_Invoices/js/AOS_Invoices_HAOS_Payments.js\"></script>";


  var $html=$jsHTML+$PayDateHTML+$UnpaidAmountHTML+$AllPayHTML+$payAllAmountHTML+$payTypeHTML+$description;
  return $html;
}

function getSysdate(){
  var date = new Date();
  var year = date.getFullYear();
  var month = date.getMonth()+1;
  var day = date.getDate();
  if (month < 10) {
    month = "0" + month;
  }
  if (day < 10) {
    day = "0" + day;
  }
  var datastr = year+"-"+month+"-"+day;
  return datastr;
  //$("#shfsStartDate").val();
}

function format2Number(str, sig)
{
  if (typeof sig === 'undefined') { sig = sig_digits; }
  num = Number(str);
  if(sig == 2){
    str = formatCurrency(num);
  }
  else{
    str = num.toFixed(sig);
  }

  str = str.split(/,/).join('{,}').split(/\./).join('{.}');
  str = str.split('{,}').join(num_grp_sep).split('{.}').join(dec_sep);

  return str;
}

function unformat2Number(num)
{
  return unformatNumber(num, num_grp_sep, dec_sep);
}

function formatCurrency(strValue)
{
  strValue = strValue.toString().replace(/\$|\,/g,'');
  dblValue = parseFloat(strValue);

  blnSign = (dblValue == (dblValue = Math.abs(dblValue)));
  dblValue = Math.floor(dblValue*100+0.50000000001);
  intCents = dblValue%100;
  strCents = intCents.toString();
  dblValue = Math.floor(dblValue/100).toString();
  if(intCents<10)
    strCents = "0" + strCents;
  for (var i = 0; i < Math.floor((dblValue.length-(1+i))/3); i++)
    dblValue = dblValue.substring(0,dblValue.length-(4*i+3))+','+
  dblValue.substring(dblValue.length-(4*i+3));
  return (((blnSign)?'':'-') + dblValue + '.' + strCents);
}

function formatNumber(n, num_grp_sep, dec_sep, round, precision) {
  if (typeof num_grp_sep == "undefined" || typeof dec_sep == "undefined") {
    return n;
  }
  if(n === 0) n = '0';

  n = n ? n.toString() : "";
  if (n.split) {
    n = n.split(".");
  } else {
    return n;
  }
  if (n.length > 2) {
    return n.join(".");
  }
  if (typeof round != "undefined") {
    if (round > 0 && n.length > 1) {
      n[1] = parseFloat("0." + n[1]);
      n[1] = Math.round(n[1] * Math.pow(10, round)) / Math.pow(10, round);
      n[1] = n[1].toString().split(".")[1];
    }
    if (round <= 0) {
      n[0] = Math.round(parseInt(n[0], 10) * Math.pow(10, round)) / Math.pow(10, round);
      n[1] = "";
    }
  }
  if (typeof precision != "undefined" && precision >= 0) {
    if (n.length > 1 && typeof n[1] != "undefined") {
      n[1] = n[1].substring(0, precision);
    } else {
      n[1] = "";
    }
    if (n[1].length < precision) {
      for (var wp = n[1].length; wp < precision; wp++) {
        n[1] += "0";
      }
    }
  }
  regex = /(\d+)(\d{3})/;
  while (num_grp_sep !== "" && regex.test(n[0])) {
    n[0] = n[0].toString().replace(regex, "$1" + num_grp_sep + "$2");
  }
  return n[0] + (n.length > 1 && n[1] !== "" ? dec_sep + n[1] : "");
}

