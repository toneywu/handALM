/**
 * Advanced OpenSales, Advanced, robust set of sales modules.
 * @package Advanced OpenSales for SugarCRM
 * @copyright SalesAgility Ltd http://www.salesagility.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SalesAgility <info@salesagility.com>
 */

 var lineno;
 var prodln = 0;
 var servln = 0;
 var groupn = 0;
 var group_ids = {};
 

 /**
 * Load Line Items
 */

 function insertLineItems(product,group){

    var curent_module=GetUrlParamString("module");
    var curent_module_in=$("input[name=module]").last().val();
    var type = 'product_';
    var ln = 0;
    var current_group = 'lineItems';
    var gid = product.group_id;
    if(typeof group_ids[gid] === 'undefined'){
        current_group = insertGroup();
        group_ids[gid] = current_group;
        for(var g in group){
            if(document.getElementById('group'+current_group + g) !== null){
                document.getElementById('group'+current_group + g).value = group[g];
            }
        }
    } else {
        current_group = group_ids[gid];
    }

    if(product.product_id !== '0' && product.product_id !== ''){
        ln = insertProductLine('product_group'+current_group,current_group);
        type = 'product_';
    } else {
        ln = insertServiceLine('service_group'+current_group,current_group);
        type = 'service_';
    }
    //console.log(product);
    for(var p in product){
        if(document.getElementById(type + p + ln) !== null){
            if(product[p] !== '' && isNumeric(product[p]) && p != 'vat'  && p != 'product_id' && p != 'name' && p != "part_number"){
                document.getElementById(type + p + ln).value = format2Number(product[p]);
            } else {
                document.getElementById(type + p + ln).value = product[p];
            }
            //Modefy By osmond 20161023 
            if (curent_module=='AOS_Contracts'&&p=='settlement_period_c') {
                if (type=='product_'){
                    setProductSettlementPeriodChange(document.getElementById(type + p + ln),ln);
                }
                if (type=='service_'){
                    setServiceSettlementPeriodChange(document.getElementById(type + p + ln),ln);
                }
            }
            if (curent_module=='AOS_Contracts'&&p=='number_of_periods_c') {
                $("#"+type+p+ln).val(product[p]);
                /*$("#"+type+p+ln).children().each(function(){
                    if($(this).val()==product[p]){
                        console.log($(this).text());
                        $(this).attr("selected",true);
                    }
                    
                });*/
            }
            //End Modefy osmond 20161023 
            //add by tangqi 20170223
            if (curent_module=='AOS_Contracts'&&(p=='prepay_flag_c' ||p=='deposit_flag_c')) {
                $("#"+type+p+ln).val("1");
                if (product[p]==1){
                    $("#"+type+p+ln).attr("checked", true);
                    
                }else{
                    $("#"+type+p+ln).attr("checked", false);
                    
                }
            }
            if ((curent_module=='AOS_Invoices'||curent_module_in=='AOS_Invoices')&&(p=='prepay_flag_c' ||p=='deposit_flag_c')) {
              
                $("#"+type+p+ln).val("1");
                if (product[p]==1){
                    $("#"+type+p+ln).attr("checked", true);
                    
                }else{
                    $("#"+type+p+ln).attr("checked", false);
                    
                }
            }
             //END add by tangqi 20170223
            
        }
    }

    calculateLine(ln,type);

}


/**
 * Insert product line
 */

 function insertProductLine(tableid, groupid) {
    var curent_module=GetUrlParamString("module");
    var curent_module_in=$("input[name=module]").last().val();
    if(!enable_groups){
        tableid = "product_group0";
    }
    if (document.getElementById(tableid + '_head') !== null) {
        document.getElementById(tableid + '_head').style.display = "";
    }
    document.getElementById(tableid).setAttribute("style","width:100%"); 
    var vat_hidden = document.getElementById("vathidden").value;
    var discount_hidden = document.getElementById("discounthidden").value;
    sqs_objects["product_name[" + prodln + "]"] = {
        "form": "EditView",
        "method": "query",
        "modules": ["AOS_Products"],
        "group": "or",
        "field_list": ["name", "id","part_number", "cost", "price","description","currency_id","number_of_periods_c"],
        "populate_list": ["product_name[" + prodln + "]", "product_product_id[" + prodln + "]", "product_part_number[" + prodln + "]", "product_product_cost_price[" + prodln + "]", "product_product_list_price[" + prodln + "]", "product_item_description[" + prodln + "]", "product_currency[" + prodln + "]","product_number_of_periods_c["+prodln+"]"],
        "required_list": ["product_id[" + prodln + "]"],
        "conditions": [{
            "name": "name",
            "op": "like_custom",
            "end": "%",
            "value": ""
        }],
        "order": "name",
        "limit": "30",
        "post_onblur_function": "formatListPrice(" + prodln + ");",
        "no_match_text": "No Match"
    };
    sqs_objects["product_part_number[" + prodln + "]"] = {
        "form": "EditView",
        "method": "query",
        "modules": ["AOS_Products"],
        "group": "or",
        "field_list": ["part_number", "name", "id","cost", "price","description","currency_id","number_of_periods_c"],
        "populate_list": ["product_part_number[" + prodln + "]","product_name[" + prodln + "]", "product_product_id[" + prodln + "]",  "product_product_cost_price[" + prodln + "]", "product_product_list_price[" + prodln + "]", "product_item_description[" + prodln + "]", "product_currency[" + prodln + "]","product_number_of_periods_c["+prodln+"]"],
        "required_list": ["product_id[" + prodln + "]"],
        "conditions": [{
            "name": "part_number",
            "op": "like_custom",
            "end": "%",
            "value": ""
        }],
        "order": "name",
        "limit": "30",
        "post_onblur_function": "formatListPrice(" + prodln + ");",
        "no_match_text": "No Match"
    };

    tablebody = document.createElement("tbody");
    tablebody.id = "product_body" + prodln;
    document.getElementById(tableid).appendChild(tablebody);


    var x = tablebody.insertRow(-1);
    x.id = 'product_line' + prodln;

    var b = x.insertCell(0);
    b.innerHTML = "<input style='width:178px;' class='sqsEnabled' autocomplete='off' type='text' name='product_name[" + prodln + "]' id='product_name" + prodln + "' maxlength='50' value='' title='' tabindex='116' value=''><input type='hidden' name='product_product_id[" + prodln + "]' id='product_product_id" + prodln + "' size='20' maxlength='50' value=''>";

    var b1 = x.insertCell(1);
    b1.innerHTML = "<input style='width:178px;' class='sqsEnabled' autocomplete='off' type='text' name='product_part_number[" + prodln + "]' id='product_part_number" + prodln + "' maxlength='50' value='' title='' tabindex='116' value=''>";

    var b2 = x.insertCell(2);
    b2.innerHTML = "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openProductPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>";

     var a = x.insertCell(3);
    a.innerHTML = "<input type='text' style='width:53px;' name='product_product_qty[" + prodln + "]' id='product_product_qty" + prodln + "' size='5' value='' title='' tabindex='116' onblur='Quantity_format2Number(" + prodln + ");calculateLine(" + prodln + ",\"product_\");'>";
    
    var a1 =x.insertCell(4);
    if(curent_module=="AOS_Contracts"){
        a1.innerHTML ="<input type='text' class='sqsEnabled' style='width:53px;' name='product_uom_name_c[" + prodln + "]' id='product_uom_name_c" + prodln + "' size='5' value='' title='' tabindex='116'>";
        a1.innerHTML +="<input type='hidden' class='sqsEnabled' name='product_haa_uom_id_c["+prodln+"]' id='product_haa_uom_id_c"+prodln+"'/>"
    }
    
    var a2 =x.insertCell(5);
    if (curent_module=="AOS_Contracts") {
        a2.innerHTML ="<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openProductUomPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>";
    }
    var c = x.insertCell(6);
    c.innerHTML = "<input style='text-align: right; width:115px;' type='text' name='product_product_list_price[" + prodln + "]' id='product_product_list_price" + prodln + "' size='11' maxlength='50' value='' title='' tabindex='116' onblur='calculateLine(" + prodln + ",\"product_\");'><input type='hidden' name='product_product_cost_price[" + prodln + "]' id='product_product_cost_price" + prodln + "' value=''  />";

    if (typeof currencyFields !== 'undefined'){

        currencyFields.push("product_product_list_price" + prodln);
        currencyFields.push("product_product_cost_price" + prodln);

    }

    var d = x.insertCell(7);
    d.innerHTML = "<input type='text' style='text-align: right; width:90px;' name='product_product_discount[" + prodln + "]' id='product_product_discount" + prodln + "' size='12' maxlength='50' value='' title='' tabindex='116' onblur='calculateLine(" + prodln + ",\"product_\");' onblur='calculateLine(" + prodln + ",\"product_\");'><input type='hidden' name='product_product_discount_amount[" + prodln + "]' id='product_product_discount_amount" + prodln + "' value=''  />";
    d.innerHTML += "<select tabindex='116' name='product_discount[" + prodln + "]' id='product_discount" + prodln + "' onchange='calculateLine(" + prodln + ",\"product_\");'>" + discount_hidden + "</select>";

    var e = x.insertCell(8);
    e.innerHTML = "<input type='text' style='text-align: right; width:90px;' name='product_product_unit_price[" + prodln + "]' id='product_product_unit_price" + prodln + "' size='11' maxlength='50' value='' title='' tabindex='116' readonly='readonly' onblur='calculateLine(" + prodln + ",\"product_\");' onblur='calculateLine(" + prodln + ",\"product_\");'>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("product_product_unit_price" + prodln);
    }

    var f = x.insertCell(9);
    f.innerHTML = "<input type='text' style='text-align: right; width:50px;' name='product_vat_amt[" + prodln + "]' id='product_vat_amt" + prodln + "' size='11' maxlength='250' value='' title='' tabindex='116' readonly='readonly'>";
    f.innerHTML += "<select tabindex='116' name='product_vat[" + prodln + "]' id='product_vat" + prodln + "' onchange='calculateLine(" + prodln + ",\"product_\");'>" + vat_hidden + "</select>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("product_vat_amt" + prodln);
    }

    var g = x.insertCell(10);
    g.innerHTML = "<input type='text' style='text-align: right; width:115px;' name='product_product_total_price[" + prodln + "]' id='product_product_total_price" + prodln + "' size='11' maxlength='50' value='' title='' tabindex='116' readonly='readonly'><input type='hidden' name='product_group_number[" + prodln + "]' id='product_group_number" + prodln + "' value='"+groupid+"'>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("product_product_total_price" + prodln);
    }

    //modefy BY osmond.liu 20161022合同模块增加结算周期和日期
    
     var h = x.insertCell(11);
     
//End modefy 20161022增加结算周期和日期

enableQS(true);
    //QSFieldsArray["EditView_product_name"+prodln].forceSelection = true;
    var y = tablebody.insertRow(-1);
    y.id = 'product_note_line' + prodln;
    //y.style.cssText="display:none";

if (curent_module=="AOS_Contracts") {
        var number_of_periods_c_hidden = document.getElementById("number_of_periods_list").value;
        h.innerHTML="<a style='float:left' title='隐藏' onclick='edit_show_more_product(this,"+prodln+")' href='javascript:;'><i class='glyphicon glyphicon-minus'></i></a>";
        var settlement_period_option=document.getElementById("settlementperiodhidden").value;
 
        var r2=y.insertCell(0);
        r2.colSpan="11";
        //结算周期
        r2.innerHTML="<div class='pull-left col-md-8' style='padding: 0px'>"+
        //结算周期  首次结算日
        "<div class='col-md-4' style='padding:0px'>"+
        "<div class='pull-left'>"+
        "<div style='height:25px; line-height:25px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_SETTLEMENT_PERIOD_C')+":</div>"+
        "<div style='height:25px; line-height:25px; margin-top:10px'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_INITIAL_ACCOUNT_DAY')+":</div>"+
        "</div>"+
        "<div class='pull-left' style='width:100px'>"+
        "<select tabindex='0' name='product_settlement_period_c[" + prodln + "]' onchange='setProductSettlementPeriodChange(this,"+prodln+");'"+ " id='product_settlement_period_c" + prodln + "'>" + settlement_period_option +"</select>"+
        "&nbsp;<select name='product_number_of_periods_c["+prodln+"]' id='product_number_of_periods_c"+prodln+"' onchange='calculateLine("+prodln+",\"product_\")'>"+number_of_periods_c_hidden+"</select>"+
        '<span id="span_product_initial_account_day_c'+prodln+'" class="input-group date" style="margin-top:5px" >'+
        '<input id="product_initial_account_day_c' + prodln + '" class="date_input pull-left" style="width:120px" autocomplete="off" name="product_initial_account_day_c[' + prodln + ']" value="" title="" tabindex="0" type="text" onchange="setNextDayVal(\'product_\','+prodln+',this)">'+
        '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></span>'+
        "</div>"+
        "</div>"+
        //生效日期  下一次结算日期
        "<div  class='col-md-4' style='padding:0px'>"+
        "<div class='pull-left'>"+
        "<div style='height:25px; line-height:25px;' >"+SUGAR.language.get(module_sugar_grp1, 'LBL_EFFECTIVE_START_C')+":</div>"+
        "<div style='height:25px; line-height:25px; margin-top:10px'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_NEXT_ACCOUNT_DAY')+":</div>"+
        "</div>"+
        "<div class='pull-left' style='width:100px'>"+
        '<span id="span_product_effective_start_c'+prodln+'" class="input-group date show_calendar" style="margin-top:5px">'+
        '<input id="product_effective_start_c' + prodln + '" class="date_input pull-left" style="width:120px" autocomplete="off" name="product_effective_start_c[' + prodln + ']" value="" title="" tabindex="0" type="text"><span class="input-group-addon">'+
        '<span class="glyphicon glyphicon-calendar"></span></span></span>'+
        "<span id='span_product_next_account_day_c"+prodln+"' class='input-group date' style='margin-top:5px'>"+
        "<input type='text' class='date_input pull-left' style='width:120px' id='product_next_account_day_c"+prodln+"' name='product_next_account_day_c["+prodln+"]'/>"+
        "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></span>"+
        "</div>"+
        "</div>"+
        //MODIFY by tangqi 20170223
        //终止日期  最后一次结算日期
        "<div class='col-md-4' style='padding:0px'>"+
        "<div class='pull-left'>"+
        "<div style='height:25px; line-height:25px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_EFFECTIVE_END_C')+":</div>"+
        "<div style='height:25px; line-height:25px;margin-top:10px'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PREPAY_FLAG_C')+":</div>"+
        "</div>"+
        "<div class='pull-left' style='width:100px'>"+
        '<span id="span_product_effective_end_c'+prodln+'" class="input-group date show_calendar" style="margin-top:5px">'+
        '<input id="product_effective_end_c' + prodln + '" class="date_input  pull-left" style="width:120px" autocomplete="off" name="product_effective_end_c[' + prodln + ']" value="" title="" tabindex="0" type="text"><span class="input-group-addon">'+
         '<span class="glyphicon glyphicon-calendar"></span></span></span>'+
         "<div style='height:25px; line-height:25px; margin-top:10px'>"+
        '<input  value="1" class="date_input pull-left" id="product_prepay_flag_c' + prodln + '" size="30" maxlength="255"  name="product_prepay_flag_c[' + prodln + ']" type="checkbox">'+
/*        '<input  size="30" maxlength="255" value="1" name="product_prepay_flag_c[' + prodln + ']" type="hidden">'+
*/
        "</div>"+
        "</div></div></div>"+
        //首次结算日
        //生效日期
        //终止日期
         "<div class='pull-left' style='padding:0px'>"+
        "<div class='pull-left'>"+
        "<div style='height:25px; line-height:25px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION')+":</div>"+
        "<div style='height:25px; line-height:25px; margin-top:10px'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_DEPOSIT_FLAG_C')+":</div>"+
        "</div>"+
        "<div class='pull-left' style='width:100px'>"+
        '<textarea tabindex="116" id="product_item_description' + prodln + '"  style="padding-top:0px" name="product_item_description[' + prodln + ']" rows="2" cols="19" ></textarea>'+
         "<div style='height:25px; line-height:25px; margin-top:10px'>"+
        '<input value="1" class="date_input pull-left" id="product_deposit_flag_c' + prodln + '" size="30" maxlength="255"  name="product_deposit_flag_c[' + prodln + ']" type="checkbox">'+
/*         '<input  size="30" maxlength="255" value="1" name="product_deposit_flag_c[' + prodln + ']" type="hidden">'+
*/        "</div>"+
        "</div>"+
        "</div>"+
        "<div class='pull-left' style='padding:0px'>"+
        "<div class='pull-left'>"+
        "<div style='height:25px; line-height:25px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE')+":</div>"+
        "<div style='height:25px; line-height:25px; margin-top:10px'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_FINAL_ACCOUNT_DAY')+":</div>"+
        "</div>"+
        "<div class='pull-left' style='width:100px'>"+
        '<textarea tabindex="116" id="product_description' + prodln + '"  style="padding-top:0px" name="product_description[' + prodln + ']" rows="2" cols="19" ></textarea>'+
        "<span id='span_product_final_account_day_c"+prodln+"' class='input-group date' style='margin-top:5px'>"+
        "<input type='text' class='date_input pull-left' style='width:120px' id='product_final_account_day_c"+prodln+"' name='product_final_account_day_c["+prodln+"]' disabled/>"+
        "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></span>"+
        "</div>"+
        "</div>"+
        "</div>";
        //说明
       /* r2.innerHTML +="<div class='pull-left'><div class='pull-left' style='height:25px; line-height:25px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION')+":</div>"+
                "<textarea tabindex='116' name='product_item_description[" + prodln + "]' id='product_item_description" + prodln + "' rows='2' cols='19' style='padding-top:0px'></textarea></div>";
        //备注
        r2.innerHTML +="<div class='pull-left' style='margin-left:10px;'><div class='pull-left' style='height:25px; line-height:25px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE')+":</div>"+
                "<textarea tabindex='116' name='product_description[" + prodln + "]' id='product_description" + prodln + "' rows='2' cols='19' style='padding-top:0px'></textarea></div>";
        */
        // END MODIFY by tangqi 20170223
        setProductSettlementPeriodChange(document.getElementById('product_settlement_period_c'+prodln),prodln);
        /*var y1 = tablebody.insertRow(-1);
        //y1.style.cssText="display:none";
        var h1 = y1.insertCell(0);
        h1.colSpan = "3";
        h1.style.color = "rgb(68,68,68)";
        h1.innerHTML = "<span style='vertical-align: top;'>" + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION') + " :&nbsp;&nbsp;</span>";
        h1.innerHTML += "<textarea tabindex='116' name='product_item_description[" + prodln + "]' id='product_item_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";

        var i = y1.insertCell(1);
        i.colSpan = "3";
        i.style.color = "rgb(68,68,68)";
        i.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE') + " :&nbsp;</span>";
        i.innerHTML += "<textarea tabindex='116' name='product_description[" + prodln + "]' id='product_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";*/
        /*$("#product_number_of_periods"+prodln).children().each(function(){
            if($(this).val()==contract_periods_c)
                $(this).attr("selected",true);
        });*/
    }else if(curent_module=='AOS_Invoices'||curent_module_in=='AOS_Invoices'){
        /*alert(curent_module);*/
        var h2 = y.insertCell(0);
        //h1.colSpan = "3";
        h2.style.color = "rgb(68,68,68)";
        h2.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_DEPOSIT_FLAG_C') + " :&nbsp;</span>";
        h2.innerHTML +='<input value="1" id="product_deposit_flag_c' + prodln + '" size="30" maxlength="255"  name="product_deposit_flag_c[' + prodln + ']" type="checkbox">';

        var j = y.insertCell(1);
        //i.colSpan = "2";
        j.style.color = "rgb(68,68,68)";
        j.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_PREPAY_FLAG_C') + " :&nbsp;</span>";
        j.innerHTML += '<input value="1" id="product_prepay_flag_c' + prodln + '" size="30" maxlength="255"  name="product_prepay_flag_c[' + prodln + ']" type="checkbox">&nbsp;&nbsp;';
        var h1 = y.insertCell(2);
        h1.colSpan = "6";
        h1.style.color = "rgb(68,68,68)";
        h1.innerHTML = "<span style='vertical-align: top;'>" + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION') + " :&nbsp;&nbsp;</span>";
        h1.innerHTML += "<textarea tabindex='116' name='product_item_description[" + prodln + "]' id='product_item_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";

        var i = y.insertCell(3);
        i.colSpan = "3";
        i.style.color = "rgb(68,68,68)";
        i.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE') + " :&nbsp;</span>";
        i.innerHTML += "<textarea tabindex='116' name='product_description[" + prodln + "]' id='product_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";
    
    }else{
        var h1 = y.insertCell(0);
        //h1.colSpan = "3";
        h1.style.color = "rgb(68,68,68)";
        h1.innerHTML = "<span style='vertical-align: top;'>" + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION') + " :&nbsp;&nbsp;</span>";
        h1.innerHTML += "<textarea tabindex='116' name='product_item_description[" + prodln + "]' id='product_item_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";

        var i = y.insertCell(1);
        //i.colSpan = "2";
        i.style.color = "rgb(68,68,68)";
        i.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE') + " :&nbsp;</span>";
        i.innerHTML += "<textarea tabindex='116' name='product_description[" + prodln + "]' id='product_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";
    }
    h.innerHTML += "<input type='hidden' name='product_currency[" + prodln + "]' id='product_currency" + prodln + "' value=''><input type='hidden' name='product_deleted[" + prodln + "]' id='product_deleted" + prodln + "' value='0'><input type='hidden' name='product_id[" + prodln + "]' id='product_id" + prodln + "' value=''><button type='button' id='product_delete_line" + prodln + "' class='button' value='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "' tabindex='116' onclick='markLineDeleted(" + prodln + ",\"product_\")'><img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>";
    h.innerHTML +="<input type='hidden' name='product_haos_revenues_quotes_id_c[" + prodln + "]' id='product_haos_revenues_quotes_id_c" + prodln + "' value=''>";
    addToValidate('EditView','product_product_id'+prodln,'id',true,"Please choose a product");
    prodln++;
    CalendarShow();
    return prodln - 1;
}

/**
 * Open product popup
 */
 function openProductPopup(ln){

    lineno=ln;
    var popupRequestData = {
        "call_back_function" : "setProductReturn",
        "form_name" : "EditView",
        "field_to_name_array" : {
            "id" : "product_product_id" + ln,
            "name" : "product_name" + ln,
            "description" : "product_item_description" + ln,
            "part_number" : "product_part_number" + ln,
            "cost" : "product_product_cost_price" + ln,
            "price" : "product_product_list_price" + ln,
            "currency_id" : "product_currency" + ln,
            "primary_uom_c":"product_uom_name_c"+ln,
        }
    };

    open_popup('AOS_Products', 800, 850, '', true, true, popupRequestData);

}

function setProductReturn(popupReplyData){
    set_return(popupReplyData);
    formatListPrice(lineno);
}

function openProductUomPopup(ln){
    var popupRequestData = {
        "call_back_function" : "setProductUomReturn",
        "form_name" : "EditView",
        "field_to_name_array" : {
            "name":"product_uom_name_c"+ln,
            "id":"product_haa_uom_id_c"+ln,
        }
    };

    open_popup('HAA_UOM', 800, 850, '', true, true, popupRequestData);
}

function setProductUomReturn(popupReplyData){
    set_return(popupReplyData);
}

function formatListPrice(ln){

    if (typeof currencyFields !== 'undefined'){
        var product_currency_id = document.getElementById('product_currency' + ln).value;
        product_currency_id = product_currency_id ? product_currency_id : -99;//Assume base currency if no id
        var product_currency_rate = get_rate(product_currency_id);
        var dollar_product_price = ConvertToDollar(document.getElementById('product_product_list_price' + ln).value, product_currency_rate);
        document.getElementById('product_product_list_price' + ln).value = format2Number(ConvertFromDollar(dollar_product_price, lastRate));
        var dollar_product_cost = ConvertToDollar(document.getElementById('product_product_cost_price' + ln).value, product_currency_rate);
        document.getElementById('product_product_cost_price' + ln).value = format2Number(ConvertFromDollar(dollar_product_cost, lastRate));
    }
    else
    {
        document.getElementById('product_product_list_price' + ln).value = format2Number(document.getElementById('product_product_list_price' + ln).value);
        document.getElementById('product_product_cost_price' + ln).value = format2Number(document.getElementById('product_product_cost_price' + ln).value);
    }

    calculateLine(ln,"product_");
}


/**
 * Insert Service Line
 */

 function insertServiceLine(tableid, groupid) {
    var curent_module=GetUrlParamString("module");
    var curent_module_in=$("input[name=module]").last().val();
    if(!enable_groups){
        tableid = "service_group0";
    }
    if (document.getElementById(tableid + '_head') !== null) {
        document.getElementById(tableid + '_head').style.display = "";
    }
    document.getElementById(tableid).setAttribute("style","width:100%"); 
    var vat_hidden = document.getElementById("vathidden").value;
    var discount_hidden = document.getElementById("discounthidden").value;
    
    tablebody = document.createElement("tbody");
    tablebody.id = "service_body" + servln;
    document.getElementById(tableid).appendChild(tablebody);

    var x = tablebody.insertRow(-1);
    x.id = 'service_line' + servln;

    var a = x.insertCell(0);
    a.colSpan = "4";
    a.innerHTML = "<textarea name='service_name[" + servln + "]' id='service_name" + servln + "' size='16' cols='64' title='' tabindex='116' style='padding-top:0px'></textarea><input type='hidden' name='service_product_id[" + servln + "]' id='service_product_id" + servln + "' size='20' maxlength='50' value='0'>";

    var a1 = x.insertCell(1);
    a1.innerHTML = "<input type='text' style='text-align: right; width:115px;' name='service_product_list_price[" + servln + "]' id='service_product_list_price" + servln + "' size='11' maxlength='50' value='' title='' tabindex='116'   onblur='calculateLine(" + servln + ",\"service_\");'>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("service_product_list_price" + servln);
    }

    var a2 = x.insertCell(2);
    a2.innerHTML = "<input type='text' style='text-align: right; width:90px;' name='service_product_discount[" + servln + "]' id='service_product_discount" + servln + "' size='12' maxlength='50' value='' title='' tabindex='116' onblur='calculateLine(" + servln + ",\"service_\");' onblur='calculateLine(" + servln + ",\"service_\");'><input type='hidden' name='service_product_discount_amount[" + servln + "]' id='service_product_discount_amount" + servln + "' value=''  />";
    a2.innerHTML += "<select tabindex='116' name='service_discount[" + servln + "]' id='service_discount" + servln + "' onchange='calculateLine(" + servln + ",\"service_\");'>" + discount_hidden + "</select>";

    var b = x.insertCell(3);
    b.innerHTML = "<input type='text' style='text-align: right; width:115px;' name='service_product_unit_price[" + servln + "]' id='service_product_unit_price" + servln + "' size='11' maxlength='50' value='' title='' tabindex='116'   onblur='calculateLine(" + servln + ",\"service_\");'>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("service_product_unit_price" + servln);
    }
    var c = x.insertCell(4);
    c.innerHTML = "<input type='text' style='text-align: right; width:90px;' name='service_vat_amt[" + servln + "]' id='service_vat_amt" + servln + "' size='11' maxlength='250' value='' title='' tabindex='116' readonly='readonly'>";
    c.innerHTML += "<select tabindex='116' name='service_vat[" + servln + "]' id='service_vat" + servln + "' onchange='calculateLine(" + servln + ",\"service_\");'>" + vat_hidden + "</select>";
    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("service_vat_amt" + servln);
    }

    var e = x.insertCell(5);
    e.innerHTML = "<input type='text' style='text-align: right; width:115px;' name='service_product_total_price[" + servln + "]' id='service_product_total_price" + servln + "' size='11' maxlength='50' value='' title='' tabindex='116' readonly='readonly'><input type='hidden' name='service_group_number[" + servln + "]' id='service_group_number" + servln + "' value='"+ groupid +"'>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("service_product_total_price" + servln);
    }
    var f = x.insertCell(6);
    
    //modefy BY osmond.liu 20161022合同模块增加结算周期和日期
    if (curent_module=='AOS_Contracts') {
        var number_of_periods_c_hidden=document.getElementById("number_of_periods_list").value;
        f.innerHTML = "<a style='float:left' title='隐藏' onclick='edit_show_more_service(this,"+servln+")' href='javascript:;'><i class='glyphicon glyphicon-minus'></i></a>";
        var settlement_period_option=document.getElementById("settlementperiodhidden").value;

        //var f = x.insertCell(6);
        //f.innerHTML = "<input type='hidden' name='service_deleted[" + servln + "]' id='service_deleted" + servln + "' value='0'><input type='hidden' name='service_id[" + servln + "]' id='service_id" + servln + "' value=''><button type='button' class='button' id='service_delete_line" + servln + "' value='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "' tabindex='116' onclick='markLineDeleted(" + servln + ",\"service_\")'><img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button><br>";

        //增加行
        var y = tablebody.insertRow(-1);
        var r = y.insertCell(0);
        //r.id = 'service_line' + servln;
        r.colSpan="11";

        //结算周期 首次结算日
        r.innerHTML="<div class='pull-left col-md-8' style='padding: 0px'>"+
        "<div class='col-md-4' style='padding:0px'>"+
            "<div class='pull-left'>"+
            "<div style='height:30px; line-height:30px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_SETTLEMENT_PERIOD_C')+":</div>"+
            "<div style='padding-top:10px'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_INITIAL_ACCOUNT_DAY')+":</div>"+
            "</div>"+
            "<div class='pull-left' style='width:100px'>"+
            "<select tabindex='0' name='service_settlement_period_c[" + servln + "]' onchange='setServiceSettlementPeriodChange(this,"+servln+");'"+ " id='service_settlement_period_c" + servln + "'>" + settlement_period_option +"</select>"+
            "&nbsp;<select id='service_number_of_periods_c"+servln+"' name='service_number_of_periods_c["+servln+"]' onchange='calculateLine("+servln+",\"service_\")'>"+number_of_periods_c_hidden+"</select>"+
            '<span id="span_service_initial_account_day_c'+servln+'" class="input-group date"  style="padding-top:5px">'+
            '<input id="service_initial_account_day_c' + servln + '" class="date_input pull-left" readOnly="readOnly" style="width:120px" autocomplete="off" name="service_initial_account_day_c[' + servln + ']" value="" title="" tabindex="0" type="text" onchange="setNextDayVal(\'service_\','+servln+',this)"/>'+
            '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></span>'+
            "</div>"+
        "</div>"+
        "<div class='col-md-4' style='padding:0px'>"+
            "<div class='pull-left'>"+
            "<div style='height:30px; line-height:30px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_EFFECTIVE_START_C')+":</div>"+
            "<div style='padding-top:10px'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_NEXT_ACCOUNT_DAY')+":</div>"+
            "</div>"+
            "<div class='pull-left' style='width:100px'>"+
            '<span id="span_service_effective_start_c' + servln + '" class="input-group date show_calendar pull-left">'+
            '<input id="service_effective_start_c' + servln + '" class="date_input pull-left" style="width:120px" autocomplete="off" name="service_effective_start_c[' + servln + ']" value="" title="" tabindex="0" type="text"><span class="input-group-addon">'+
            '<span class="glyphicon glyphicon-calendar"></span></span></span>'+
            "<span id='span_service_next_account_day_c"+servln+"' class='input-group date'  style='padding-top:5px'>"+
            "<input type='text' class='date_input pull-left' id='service_next_account_day_c"+servln+"' name='service_next_account_day_c["+servln+"]' style='width:120px'/>"+
            "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></span>"+
            "</div>"+
        "</div>"+
       /* "<div class='col-md-4' style='padding:0px'>"+
            "<div class='pull-left'>"+
            "<div style='height:30px; line-height:30px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_EFFECTIVE_END_C')+":</div>"+
            "<div style='padding-top:10px'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_FINAL_ACCOUNT_DAY')+":</div>"+
            "</div>"+
            "<div class='pull-left' style='width:100px'>"+
            '<span id="span_service_effective_end_c'+ servln +'" class="input-group date show_calendar">'+
            '<input id="service_effective_end_c' + servln + '" class="date_input pull-left" style="width:120px" autocomplete="off" name="service_effective_end_c[' + servln + ']" value="" title="" tabindex="0" type="text"><span class="input-group-addon">'+
            '<span class="glyphicon glyphicon-calendar"></span></span></span>'+
            "<span id='span_service_final_account_day_c"+servln+"' class='input-group date' style='padding-top:5px'>"+
            "<input type='text' class='date_input pull-left' id='service_final_account_day_c"+servln+"' name='service_final_account_day_c["+servln+"]' disabled  style='width:120px'/>"+
            "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></span>"+
            "</div>"+
        "</div></div>";*/
         //MODIFY by tangqi 20170223
        //终止日期  最后一次结算日期
        "<div class='col-md-4' style='padding:0px'>"+
        "<div class='pull-left'>"+
        "<div style='height:25px; line-height:25px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_EFFECTIVE_END_C')+":</div>"+
        "<div style='height:25px; line-height:25px;margin-top:10px'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PREPAY_FLAG_C')+":</div>"+
        "</div>"+
        "<div class='pull-left' style='width:100px'>"+
        '<span id="span_service_effective_start_c'+prodln+'" class="input-group date show_calendar" style="margin-top:5px">'+
        '<input id="service_effective_end_c' + prodln + '" class="date_input  pull-left" style="width:120px" autocomplete="off" name="service_effective_end_c[' + prodln + ']" value="" title="" tabindex="0" type="text"><span class="input-group-addon">'+
         '<span class="glyphicon glyphicon-calendar"></span></span></span>'+
         "<div style='height:25px; line-height:25px; margin-top:10px'>"+
        '<input  value="1" class="date_input pull-left" id="service_prepay_flag_c' + prodln + '" size="30" maxlength="255"  name="service_prepay_flag_c[' + prodln + ']" type="checkbox">'+
/*        '<input  size="30" maxlength="255" value="1" name="product_prepay_flag_c[' + prodln + ']" type="hidden">'+
*/
        "</div>"+
        "</div></div></div>"+
        //首次结算日
        //生效日期
        //终止日期
         "<div class='pull-left' style='padding:0px'>"+
        "<div class='pull-left'>"+
        "<div style='height:25px; line-height:25px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION')+":</div>"+
        "<div style='height:25px; line-height:25px; margin-top:10px'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_DEPOSIT_FLAG_C')+":</div>"+
        "</div>"+
        "<div class='pull-left' style='width:100px'>"+
        '<textarea tabindex="116" id="service_item_description' + prodln + '"  style="padding-top:0px" name="service_item_description[' + prodln + ']" rows="2" cols="19" ></textarea>'+
         "<div style='height:25px; line-height:25px; margin-top:10px'>"+
        '<input value="1" class="date_input pull-left" id="service_deposit_flag_c' + prodln + '" size="30" maxlength="255"  name="service_deposit_flag_c[' + prodln + ']" type="checkbox">'+
/*         '<input  size="30" maxlength="255" value="1" name="product_deposit_flag_c[' + prodln + ']" type="hidden">'+
*/        "</div>"+
        "</div>"+
        "</div>"+
        "<div class='pull-left' style='padding:0px'>"+
        "<div class='pull-left'>"+
        "<div style='height:25px; line-height:25px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE')+":</div>"+
        "<div style='height:25px; line-height:25px; margin-top:10px'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_FINAL_ACCOUNT_DAY')+":</div>"+
        "</div>"+
        "<div class='pull-left' style='width:100px'>"+
        '<textarea tabindex="116" id="service_description' + prodln + '"  style="padding-top:0px" name="service_description[' + prodln + ']" rows="2" cols="19" ></textarea>'+
        "<span id='span_service_final_account_day_c"+prodln+"' class='input-group date' style='margin-top:5px'>"+
        "<input type='text' class='date_input pull-left' style='width:120px' id='service_final_account_day_c"+prodln+"' name='service_final_account_day_c["+prodln+"]' disabled/>"+
        "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></span>"+
        "</div>"+
        "</div>"+
        "</div>";
        //终止日期
        //说明
        /*r.innerHTML +="<div class='pull-left'><div class='pull-left' style='height:25px; line-height:25px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION')+":</div>"+
                "<textarea tabindex='116' name='service_item_description[" + servln + "]' id='product_item_description" + servln + "' rows='2' cols='20' style='padding-top:0px'></textarea></div>";
        //备注
        r.innerHTML +="<div class='pull-left' style='margin-left:10px;'><div class='pull-left' style='height:25px; line-height:25px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE')+":</div>"+
                "<textarea tabindex='116' name='service_description[" + servln + "]' id='product_description" + servln + "' rows='2' cols='20' style='padding-top:0px'></textarea></div>";
        */setServiceSettlementPeriodChange(document.getElementById('service_settlement_period_c'+servln),servln);
    }else if(curent_module=='AOS_Invoices'||curent_module_in=='AOS_Invoices'){
        /*alert(curent_module);*/
        var row=tablebody.insertRow(-1);
        var h2 = row.insertCell(0);
        //h1.colSpan = "3";
        h2.style.color = "rgb(68,68,68)";
        h2.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_DEPOSIT_FLAG_C') + " :&nbsp;</span>";
        h2.innerHTML +='<input value="1" id="service_deposit_flag_c' + prodln + '" size="30" maxlength="255"  name="service_deposit_flag_c[' + prodln + ']" type="checkbox">';

        var j = row.insertCell(1);
        //i.colSpan = "2";
        j.style.color = "rgb(68,68,68)";
        j.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_PREPAY_FLAG_C') + " :&nbsp;</span>";
        j.innerHTML += '<input value="1" id="service_prepay_flag_c' + prodln + '" size="30" maxlength="255"  name="service_prepay_flag_c[' + prodln + ']" type="checkbox">&nbsp;&nbsp;';
        var h1 = row.insertCell(2);
        h1.colSpan = "4";
        h1.style.color = "rgb(68,68,68)";
        h1.innerHTML = "<span style='vertical-align: top;'>" + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION') + " :&nbsp;&nbsp;</span>";
        h1.innerHTML += "<textarea tabindex='116' name='service_item_description[" + prodln + "]' id='service_item_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";

        var i = row.insertCell(3);
        i.colSpan = "3";
        i.style.color = "rgb(68,68,68)";
        i.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE') + " :&nbsp;</span>";
        i.innerHTML += "<textarea tabindex='116' name='service_description[" + prodln + "]' id='service_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";
    
    }
    else{
        var row=tablebody.insertRow(-1);
        var h1 = row.insertCell(0);
        //h1.colSpan = "3";
        h1.style.color = "rgb(68,68,68)";
        h1.innerHTML = "<span style='vertical-align: top;'>" + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION') + " :&nbsp;&nbsp;</span>";
        h1.innerHTML += "<textarea tabindex='116' name='servicet_item_description[" + prodln + "]' id='service_item_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";
        var i = row.insertCell(1);
        //i.colSpan = "2";
        i.style.color = "rgb(68,68,68)";
        i.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE') + " :&nbsp;</span>";
        i.innerHTML += "<textarea tabindex='116' name='service_description[" + prodln + "]' id='service_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";
    }
    //End modefy 20161022增加结算周期和日期
    f.innerHTML += "<input type='hidden' name='service_deleted[" + servln + "]' id='service_deleted" + servln + "' value='0'><input type='hidden' name='service_id[" + servln + "]' id='service_id" + servln + "' value=''><button type='button' class='button' id='service_delete_line" + servln + "' value='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "' tabindex='116' onclick='markLineDeleted(" + servln + ",\"service_\")'><img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button><br>";
        f.innerHTML +="<input type='hidden' name='service_haos_revenues_quotes_id_c[" + servln + "]' id='service_haos_revenues_quotes_id_c" + servln + "' value=''>";

    //setServiceSettlementPeriodChange($("#service_settlement_period_c"+servln).find("option:selected").val(),servln);
    CalendarShow();
    servln++;

    return servln - 1;
}


/**
 * Insert product Header
 */

 function insertProductHeader(tableid){
    var curent_module=GetUrlParamString("module");
    tablehead = document.createElement("thead");
    tablehead.id = tableid +"_head";
    tablehead.style.display="none";
    document.getElementById(tableid).appendChild(tablehead);

    var x=tablehead.insertRow(-1);
    x.id='product_head';

    var b=x.insertCell(0);
    b.style.color="rgb(68,68,68)";
    b.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NAME');

    var b1=x.insertCell(1);
    b1.colSpan = "2";
    b1.style.color="rgb(68,68,68)";
    b1.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PART_NUMBER');

    var a=x.insertCell(2);
    a.style.color="rgb(68,68,68)";
    a.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_QUANITY');

    var a1=x.insertCell(3);
    a1.style.color="rgb(68,68,68)";
    if (curent_module=="AOS_Contracts") {
        a1.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_UOM_NAME_C');
    }
    var a2=x.insertCell(4);
    a2.style.color="rgb(68,68,68)";
    a2.innerHTML="";

    var c=x.insertCell(5);
    c.style.color="rgb(68,68,68)";
    c.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_LIST_PRICE');

    var d=x.insertCell(6);
    d.style.color="rgb(68,68,68)";
    d.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_DISCOUNT_AMT');

    var e=x.insertCell(7);
    e.style.color="rgb(68,68,68)";
    e.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_UNIT_PRICE');

    var f=x.insertCell(8);
    f.style.color="rgb(68,68,68)";
    f.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_VAT_AMT');

    var g=x.insertCell(9);
    g.style.color="rgb(68,68,68)";
    g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_TOTAL_PRICE');
    //Modefy BY osmond 20161022 合同模块增加结算周期
    /*if (curent_module=='AOS_Contracts') {
        var g1=x.insertCell(8);
        g1.style.color="rgb(68,68,68)";
        g1.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_SETTLEMENT_PERIOD_C');

        var g2=x.insertCell(9);
        g2.style.color="rgb(68,68,68)";
        g2.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_INITIAL_ACCOUNT_DAY');
        var h=x.insertCell(10);
        h.style.color="rgb(68,68,68)";
        h.innerHTML='&nbsp;';
    }else{*/
       var h=x.insertCell(10);
       h.style.color="rgb(68,68,68)";
       h.innerHTML='&nbsp;';
   //}
//End Modefy BY osmond 20161022 合同模块增加结算周期

}


/**
 * Insert service Header
 */

 function insertServiceHeader(tableid){
    var curent_module=GetUrlParamString("module");
    tablehead = document.createElement("thead");
    tablehead.id = tableid +"_head";
    tablehead.style.display="none";
    document.getElementById(tableid).appendChild(tablehead);

    var x=tablehead.insertRow(-1);
    x.id='service_head';

    var a=x.insertCell(0);
    a.colSpan = "4";
    a.style.color="rgb(68,68,68)";
    a.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_NAME');

    var b=x.insertCell(1);
    b.style.color="rgb(68,68,68)";
    b.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_LIST_PRICE');

    var c=x.insertCell(2);
    c.style.color="rgb(68,68,68)";
    c.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_DISCOUNT');

    var d=x.insertCell(3);
    d.style.color="rgb(68,68,68)";
    d.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_PRICE');

    var e=x.insertCell(4);
    e.style.color="rgb(68,68,68)";
    e.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_VAT_AMT');

    var f=x.insertCell(5);
    f.style.color="rgb(68,68,68)";
    f.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_TOTAL_PRICE');
    //Modefy BY osmond 20161022 合同模块增加结算周期
    /*if (curent_module=='AOS_Contracts') {
        var g1=x.insertCell(6);
        g1.style.color="rgb(68,68,68)";
        g1.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_SETTLEMENT_PERIOD_C');

        var g2=x.insertCell(7);
        g2.style.color="rgb(68,68,68)";
        g2.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_INITIAL_ACCOUNT_DAY');
        var g=x.insertCell(8);
        g.style.color="rgb(68,68,68)";
        g.innerHTML='&nbsp;';
    }
    else
    {*/
       var g=x.insertCell(6);
       g.style.color="rgb(68,68,68)";
       g.innerHTML='&nbsp;'; 
   //}
    //End Modefy by osmond 20161022 合同模块增加结算周期
    
}

/**
 * Insert Group
 */

 function insertGroup()
 {
    var curent_module=GetUrlParamString("module");
    if(!enable_groups && groupn > 0){
        return;
    }
    var tableBody = document.createElement("tr");
    tableBody.id = "group_body"+groupn;
    document.getElementById('lineItems').appendChild(tableBody);

    var a=tableBody.insertCell(0);
    a.colSpan="100";
    var table = document.createElement("table");
    table.id = "group"+groupn;
    if(enable_groups){
        table.style.border = '1px grey solid';
        table.style.borderRadius = '4px';
        table.border="1";
    }
    table.style.whiteSpace = 'nowrap';

    table.width = '100%';
    a.appendChild(table);



    tableheader = document.createElement("thead");
    table.appendChild(tableheader);
    var header_row=tableheader.insertRow(-1);
    if (curent_module=="AOS_Invoices"){
        sqs_objects["group_name["+groupn+"]"] = {
            "form": "EditView",
            "method": "query",
            "modules": ["HAA_Codes"],
            "group": "or",
            "field_list": [ "name"],
            "populate_list": ["group_name["+groupn+"]"],
            "required_list": ["group_name["+groupn+"]"],
            "conditions": [{
               "name": "name",
               "op": "like_custom",
               "end": "%",'begin': '%',
               "value": ""
           }],
           "order": "name",
           "limit": "30",
           "no_match_text": "No Match"
       };
   }

   if(enable_groups){
    var header_cell = header_row.insertCell(0);
    header_cell.scope="row";
    header_cell.colSpan="8";
    if (curent_module=="AOS_Invoices"){
        header_cell.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_GROUP_NAME')+":&nbsp;&nbsp;<input  class='sqsEnabled' autocomplete='off' type='text' name='group_name["+groupn+"]' id='"+ table.id +"name' size='30' maxlength='255'  title='' tabindex='120' >"+"<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openGroupPopup(" + groupn+ ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
        "<input type='hidden' name='group_id["+groupn+"]' id='"+ table.id +"id' value=''><input type='hidden' name='group_group_number["+groupn+"]' id='"+ table.id +"group_number' value='"+groupn+"'>";
    }
    else{
     header_cell.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_GROUP_NAME')+":&nbsp;&nbsp;<input name='group_name[]' id='"+ table.id +"name' size='30' maxlength='255'  title='' tabindex='120' type='text'><input type='hidden' name='group_id[]' id='"+ table.id +"id' value=''><input type='hidden' name='group_group_number[]' id='"+ table.id +"group_number' value='"+groupn+"'>";

 }
 var header_cell_del = header_row.insertCell(1);
 header_cell_del.scope="row";
 header_cell_del.innerHTML="<span title='" + SUGAR.language.get(module_sugar_grp1, 'LBL_DELETE_GROUP') + "' style='float: right;'><a style='cursor: pointer;' id='deleteGroup' tabindex='116' onclick='markGroupDeleted("+groupn+")'><img src='themes/default/images/id-ff-clear.png' alt='X'></a></span><input type='hidden' name='group_deleted[]' id='"+ table.id +"deleted' value='0'>";
}



var productTableHeader = document.createElement("thead");
table.appendChild(productTableHeader);
var productHeader_row=productTableHeader.insertRow(-1);
var productHeader_cell = productHeader_row.insertCell(0);
productHeader_cell.colSpan="100";
var productTable = document.createElement("table");
productTable.id = "product_group"+groupn;
productHeader_cell.appendChild(productTable);

insertProductHeader(productTable.id);

var serviceTableHeader = document.createElement("thead");
table.appendChild(serviceTableHeader);
var serviceHeader_row=serviceTableHeader.insertRow(-1);
var serviceHeader_cell = serviceHeader_row.insertCell(0);
serviceHeader_cell.colSpan="100";
var serviceTable = document.createElement("table");
serviceTable.id = "service_group"+groupn;
serviceHeader_cell.appendChild(serviceTable);

insertServiceHeader(serviceTable.id);


    /*tablebody = document.createElement("tbody");
    table.appendChild(tablebody);
    var body_row=tablebody.insertRow(-1);
    var body_cell = body_row.insertCell(0);
    body_cell.innerHTML+="&nbsp;";*/

    tablefooter = document.createElement("tfoot");
    table.appendChild(tablefooter);
    var footer_row=tablefooter.insertRow(-1);
    var footer_cell = footer_row.insertCell(0);
    footer_cell.scope="row";
    footer_cell.colSpan="20";
    footer_cell.innerHTML="<input type='button' tabindex='116' class='button' value='"+SUGAR.language.get(module_sugar_grp1, 'LBL_ADD_PRODUCT_LINE')+"' id='"+productTable.id+"addProductLine' onclick='insertProductLine(\""+productTable.id+"\",\""+groupn+"\")' />";
    footer_cell.innerHTML+=" <input type='button' tabindex='116' class='button' value='"+SUGAR.language.get(module_sugar_grp1, 'LBL_ADD_SERVICE_LINE')+"' id='"+serviceTable.id+"addServiceLine' onclick='insertServiceLine(\""+serviceTable.id+"\",\""+groupn+"\")' />";
    if(enable_groups){
        footer_cell.innerHTML+="<span style='float: right;'><div>"+SUGAR.language.get(module_sugar_grp1, 'LBL_TOTAL_AMT')+":&nbsp;&nbsp;</div><div><input name='group_total_amt[]' id='"+ table.id +"total_amt' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></div></span>";

        var footer_row2=tablefooter.insertRow(-1);
        var footer_cell2 = footer_row2.insertCell(0);
        footer_cell2.scope="row";
        footer_cell2.colSpan="20";
        footer_cell2.innerHTML="<span style='float: right;'><div>"+SUGAR.language.get(module_sugar_grp1, 'LBL_DISCOUNT_AMOUNT')+":&nbsp;&nbsp;</div><div><input name='group_discount_amount[]' id='"+ table.id +"discount_amount' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></div></span>";

        var footer_row3=tablefooter.insertRow(-1);
        var footer_cell3 = footer_row3.insertCell(0);
        footer_cell3.scope="row";
        footer_cell3.colSpan="20";
        footer_cell3.innerHTML="<span style='float: right;'><div>"+SUGAR.language.get(module_sugar_grp1, 'LBL_SUBTOTAL_AMOUNT')+":&nbsp;&nbsp;</div><div><input name='group_subtotal_amount[]' id='"+ table.id +"subtotal_amount' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></div></span>";

        var footer_row4=tablefooter.insertRow(-1);
        var footer_cell4 = footer_row4.insertCell(0);
        footer_cell4.scope="row";
        footer_cell4.colSpan="20";
        footer_cell4.innerHTML="<span style='float: right;'><div>"+SUGAR.language.get(module_sugar_grp1, 'LBL_TAX_AMOUNT')+":&nbsp;&nbsp;</div><div><input name='group_tax_amount[]' id='"+ table.id +"tax_amount' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></div></span>";

        if(document.getElementById('subtotal_tax_amount') !== null){
            var footer_row5=tablefooter.insertRow(-1);
            var footer_cell5 = footer_row5.insertCell(0);
            footer_cell5.scope="row";
            footer_cell5.colSpan="20";
            footer_cell5.innerHTML="<span style='float: right;'><div>"+SUGAR.language.get(module_sugar_grp1, 'LBL_SUBTOTAL_TAX_AMOUNT')+":&nbsp;&nbsp;</div><div><input name='group_subtotal_tax_amount[]' id='"+ table.id +"subtotal_tax_amount' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></div></span>";

            if (typeof currencyFields !== 'undefined'){
                currencyFields.push("" + table.id+ 'subtotal_tax_amount');
            }
        }

        var footer_row6=tablefooter.insertRow(-1);
        var footer_cell6 = footer_row6.insertCell(0);
        footer_cell6.scope="row";
        footer_cell6.colSpan="20";
        footer_cell6.innerHTML="<span style='float: right;'><div>"+SUGAR.language.get(module_sugar_grp1, 'LBL_GROUP_TOTAL')+":&nbsp;&nbsp;</div><div><input name='group_total_amount[]' id='"+ table.id +"total_amount' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></div></span>";

        if (typeof currencyFields !== 'undefined'){
            currencyFields.push("" + table.id+ 'total_amt');
            currencyFields.push("" + table.id+ 'discount_amount');
            currencyFields.push("" + table.id+ 'subtotal_amount');
            currencyFields.push("" + table.id+ 'tax_amount');
            currencyFields.push("" + table.id+ 'total_amount');
        }
    }
    groupn++;
    return groupn -1;
}
/**
 * Open group popup
 */
 function openGroupPopup(groupn){
    groupn=groupn;
    var popupRequestData = {
        "call_back_function" : "setGroupReturn",
        "form_name" : "EditView",
        "field_to_name_array" : {
            "name" :"group_name["+groupn+"]"
        }
    };

    open_popup('HAA_Codes', 800, 850, '&code_type_advanced=revenue_expense_group', true, true, popupRequestData);

}
function setGroupReturn(popupReplyData){
  set_return(popupReplyData);
}

/**
 * Mark Group Deleted
 */

 function markGroupDeleted(gn)
 {
    document.getElementById('group_body' + gn).style.display = 'none';

    var rows = document.getElementById('group_body' + gn).getElementsByTagName('tbody');

    for (x=0; x < rows.length; x++) {
        var input = rows[x].getElementsByTagName('button');
        for (y=0; y < input.length; y++) {
            if (input[y].id.indexOf('delete_line') != -1) {
                input[y].click();
            }
        }
    }

}

/**
 * Mark line deleted
 */

 function markLineDeleted(ln, key)
 {
    // collapse line; update deleted value
    document.getElementById(key + 'body' + ln).style.display = 'none';
    document.getElementById(key + 'deleted' + ln).value = '1';
    document.getElementById(key + 'delete_line' + ln).onclick = '';
    var groupid = 'group' + document.getElementById(key + 'group_number' + ln).value;

    if(checkValidate('EditView',key+'product_id' +ln)){
        removeFromValidate('EditView',key+'product_id' +ln);
    }

    calculateTotal(groupid);
    calculateTotal();
}


/**
 * Calculate Line Values
 */

 function calculateLine(ln, key){

    var required = 'product_list_price';
    if(document.getElementById(key + required + ln) === null){
        required = 'product_unit_price';
    }

    if (document.getElementById(key + 'name' + ln).value === '' || document.getElementById(key + required + ln).value === ''){
        return;
    }

    if(key === "product_" && document.getElementById(key + 'product_qty' + ln) !== null && document.getElementById(key + 'product_qty' + ln).value === ''){
        document.getElementById(key + 'product_qty' + ln).value =1;
    }

    var periods=1;
    if (document.getElementById(key+'number_of_periods_c'+ln)!==null) {
        periods= document.getElementById(key+'number_of_periods_c'+ln).value;
        periods=periods==""?1:periods;
    } 

    var productUnitPrice = unformat2Number(document.getElementById(key + 'product_unit_price' + ln).value);

    if(document.getElementById(key + 'product_list_price' + ln) !== null && document.getElementById(key + 'product_discount' + ln) !== null && document.getElementById(key + 'discount' + ln) !== null){
        var listPrice = get_value(key + 'product_list_price' + ln);
        var discount = get_value(key + 'product_discount' + ln);
        var dis = document.getElementById(key + 'discount' + ln).value;

        if(dis == 'Amount')
        {
            if(discount > listPrice)
            {
                document.getElementById(key + 'product_discount' + ln).value = listPrice;
                discount = listPrice;
            }
            productUnitPrice = listPrice - discount;
            document.getElementById(key + 'product_unit_price' + ln).value = format2Number(listPrice - discount);
        }
        else if(dis == 'Percentage')
        {
            if(discount > 100)
            {
                document.getElementById(key + 'product_discount' + ln).value = 100;
                discount = 100;
            }
            discount = (discount/100) * listPrice;
            productUnitPrice = listPrice - discount;
            document.getElementById(key + 'product_unit_price' + ln).value = format2Number(listPrice - discount);
        }
        else
        {
            document.getElementById(key + 'product_unit_price' + ln).value = document.getElementById(key + 'product_list_price' + ln).value;
            document.getElementById(key + 'product_discount' + ln).value = '';
            discount = 0;
        }
        document.getElementById(key + 'product_list_price' + ln).value = format2Number(listPrice);
        //document.getElementById(key + 'product_discount' + ln).value = format2Number(unformat2Number(document.getElementById(key + 'product_discount' + ln).value));
        document.getElementById(key + 'product_discount_amount' + ln).value = format2Number(-discount, 6);
    }

    var productQty = 1;
    if(document.getElementById(key + 'product_qty' + ln) !== null){
        productQty = unformat2Number(document.getElementById(key + 'product_qty' + ln).value);
        Quantity_format2Number(ln);
    }


    var vat = unformatNumber(document.getElementById(key + 'vat' + ln).value,',','.');

    var productTotalPrice = productQty * productUnitPrice * periods;

    var totalvat=(productTotalPrice * vat) /100;

    if(total_tax){
        productTotalPrice=productTotalPrice + totalvat;
    }
    
    document.getElementById(key + 'vat_amt' + ln).value = format2Number(totalvat);

    document.getElementById(key + 'product_unit_price' + ln).value = format2Number(productUnitPrice);
    document.getElementById(key + 'product_total_price' + ln).value = format2Number(productTotalPrice);
    var groupid = 0;
    if(enable_groups){
        groupid = document.getElementById(key + 'group_number' + ln).value;
    }
    groupid = 'group' + groupid;

    calculateTotal(groupid);
    calculateTotal();

}

function calculateAllLines(){

    var row = document.getElementById('lineItems').getElementsByTagName('tbody');
    var length = row.length;
    for (k=0; k < length; k++) {
        var input = row[k].getElementsByTagName('input');
        var key = input[0].id.split('_')[0]+'_';
        var ln = input[0].id.slice(-1);
        calculateLine(ln, key);
    }

}

/**
 * Calculate totals
 */
 function calculateTotal(key)
 {
    if (typeof key === 'undefined') {  key = 'lineItems'; }
    var row = document.getElementById(key).getElementsByTagName('tbody');
    if(key == 'lineItems') key = '';
    var length = row.length;
    var head = {};
    var tot_amt = 0;
    var subtotal = 0;
    var dis_tot = 0;
    var tax = 0;

    for (i=0; i < length; i++) {
        var qty = 1;
        var list = null;
        var unit = 0;
        var deleted = 0;
        var dis_amt = 0;
        var product_vat_amt = 0;
        var periods=1;
        var input = row[i].getElementsByTagName('input');
        for (j=0; j < input.length; j++) {
            if (input[j].id.indexOf('product_qty') != -1) {
                qty = unformat2Number(input[j].value);
            }
            if (input[j].id.indexOf('product_list_price') != -1)
            {
                list = unformat2Number(input[j].value);
            }
            if (input[j].id.indexOf('product_unit_price') != -1)
            {
                unit = unformat2Number(input[j].value);
            }
            if (input[j].id.indexOf('product_discount_amount') != -1)
            {
                dis_amt = unformat2Number(input[j].value);
            }
            if (input[j].id.indexOf('vat_amt') != -1)
            {
                product_vat_amt = unformat2Number(input[j].value);
            }
            if (input[j].id.indexOf('deleted') != -1) {
                deleted = input[j].value;
            }
        }
        var select = row[i].getElementsByTagName('select');
        for (var z = 0; z < select.length; z++) {
            if (select[z].id.indexOf('number_of_periods_c')!=-1&&select[z].value!="") {
                periods=select[z].value;
            }
        }

        if(deleted != 1 && key !== ''){
            head[row[i].parentNode.id] = 1;
        } else if(key !== '' && head[row[i].parentNode.id] != 1){
            head[row[i].parentNode.id] = 0;
        }

        if (qty !== 0 && list !== null && deleted != 1) {
            tot_amt += list * qty * periods;
        } else if (qty !== 0 && unit !== 0 && deleted != 1) {
            tot_amt += unit * qty * periods;
        }

        if (dis_amt !== 0 && deleted != 1) {
            dis_tot += dis_amt * qty * periods;
        }
        if (product_vat_amt !== 0 && deleted != 1) {
            tax += product_vat_amt * periods;
        }
    }
    for(var h in head){
        if (head[h] != 1 && document.getElementById(h + '_head') !== null) {
            document.getElementById(h + '_head').style.display = "none";
        }
    }

    subtotal = tot_amt + dis_tot;

    set_value(key+'total_amt',tot_amt);
    set_value(key+'subtotal_amount',subtotal);
    set_value(key+'discount_amount',dis_tot);

    var shipping = get_value(key+'shipping_amount');

    var shippingtax = get_value(key+'shipping_tax');

    var shippingtax_amt = shipping * (shippingtax/100);

    set_value(key+'shipping_tax_amt',shippingtax_amt);

    tax += shippingtax_amt;

    set_value(key+'tax_amount',tax);

    set_value(key+'subtotal_tax_amount',subtotal + tax);
    set_value(key+'total_amount',subtotal + tax + shipping);
}

function set_value(id, value){
    if(document.getElementById(id) !== null)
    {
        document.getElementById(id).value = format2Number(value);
    }
}

function get_value(id){
    if(document.getElementById(id) !== null)
    {
        return unformat2Number(document.getElementById(id).value);
    }
    return 0;
}


function unformat2Number(num)
{
    return unformatNumber(num, num_grp_sep, dec_sep);
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

function Quantity_format2Number(ln)
{
    var str = '';
    var qty=unformat2Number(document.getElementById('product_product_qty' + ln).value);
    if(qty === null){qty = 1;}

    if(qty === 0){
        str = '0';
    } else {
        str = format2Number(qty);
        if(sig_digits){
            str = str.replace(/0*$/,'');
            str = str.replace(dec_sep,'~');
            str = str.replace(/~$/,'');
            str = str.replace('~',dec_sep);
        }
    }

    document.getElementById('product_product_qty' + ln).value=str;
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

function check_form(formname) {
    calculateAllLines();
    if (typeof(siw) != 'undefined' && siw && typeof(siw.selectingSomething) != 'undefined' && siw.selectingSomething)
        return false;
    return validate_form(formname, '');
}
function CalendarShow() {//显示日历
  /*var field_name='#span_'+field.getAttribute("id");
  console.log(field_name);*/

  var Datetimepicker=$(".show_calendar");
  var dateformat="Y-m-d H:M";
  dateformat = dateformat.replace(/Y/,"yyyy");
  dateformat = dateformat.replace(/m/,"mm");
  dateformat = dateformat.replace(/d/,"dd");
  dateformat = dateformat.split(" ",1);
  Datetimepicker.datetimepicker({
     language: 'zh_CN',
     format: dateformat[0],
     showMeridian: true,
     minView: 2,
     todayBtn: true,
     autoclose: true,
 });
}

function setProductSettlementPeriodChange(field,prodlns) {
  /*var field_name=field.getAttribute("id");
  var accountDay=document.getElementById("span_product_initial_account_day_c"+prodlns);
  var accountDayValue=document.getElementById("product_initial_account_day_c"+prodlns).value;
  
  var html='';*/
  var field_value=field.value; 
  var html='<input id="product_next_account_day'+prodlns+'" name="product_next_account_day_c['+prodlns+']" type="hidden">';
  if ($("#product_final_account_day_c"+prodlns).val()) {
    $("#product_settlement_period_c"+prodlns).attr('disabled',true);
    $("#product_next_account_day_c"+prodlns).attr('disabled',true);
    $("#product_next_account_day_c"+prodlns).next().hide();
  }
  if (field_value=="Once"){
     //html= '<input class="date_input pull-left" disabled="disabled" autocomplete="off" name="product_initial_account_day_c[' + prodlns + ']" style="width:75px" id="product_initial_account_day_c' + prodlns + '" value="" title="" tabindex="0" type="text">';
    $("#product_initial_account_day_c"+prodlns).val("");
    //$("#product_next_account_day_c"+prodlns).val("");
    $("#product_initial_account_day_c"+prodlns).next().hide();
    $("#product_initial_account_day_c"+prodlns).attr('disabled',true);
    $("#product_initial_account_day_c"+prodlns).parent().removeClass("show_calendar");
    $("#span_product_next_account_day_c"+prodlns).addClass('show_calendar');
    if ($("#product_next_account_day"+prodlns)) {
        $("#product_next_account_day"+prodlns).remove();
    }
    $("#product_next_account_day_c"+prodlns).attr('disabled',false);
    $("#product_next_account_day_c"+prodlns).next().show();
    $("#product_number_of_periods_c"+prodlns).attr('disabled',true);
    $("#product_number_of_periods_c"+prodlns).val("");
 }else{
     $("#product_initial_account_day_c"+prodlns).next().show();
     $("#product_initial_account_day_c"+prodlns).attr('disabled',false);
     $("#product_initial_account_day_c"+prodlns).parent().addClass("show_calendar");
     $("#span_product_next_account_day_c"+prodlns).removeClass('show_calendar');
     //$("#product_next_account_day_c"+prodlns).val($("#product_initial_account_day_c"+prodlns).val());
     $("#product_next_account_day_c"+prodlns).attr('disabled',true);
     if ($("#product_next_account_day_c"+prodlns).val()) {
        $("#product_next_account_day_c"+prodlns).next().show();
        $("#product_next_account_day_c"+prodlns).attr('disabled',false);
     }else{
        $("#product_next_account_day_c"+prodlns).next().hide();
        $("#product_next_account_day_c"+prodlns).after(html);
        $("#product_next_account_day"+prodlns).val($("#product_initial_account_day_c"+prodlns).val());
     }
     $("#product_number_of_periods_c"+prodlns).attr('disabled',false);
     if ($("#product_number_of_periods_c"+prodlns).val()=="") {
        $("#product_number_of_periods_c"+prodlns).val($("#number_of_periods_c").val());
     }
 }
 //accountDay.innerHTML=html;
 calculateLine(prodlns,"product_");
 CalendarShow();
 //进行计算
    var groupid = 0;
    var key="product_";
    if(enable_groups){
        groupid = document.getElementById(key + 'group_number' + prodlns).value;
    }
    groupid = 'group' + groupid;
    calculateTotal(groupid);
    calculateTotal();
}

function setServiceSettlementPeriodChange(field,servln) {
/*  var field_name=field.getAttribute("id");
  var accountDay=document.getElementById("span_service_initial_account_day_c"+servln);
  var accountDayValue=document.getElementById("service_initial_account_day_c"+servln).value;*/
  var field_value=field.value;
  var html='<input id="service_next_account_day'+servln+'" name="service_next_account_day_c['+servln+']" type="hidden">';
 if ($("#service_final_account_day_c"+servln).val()) {
    $("#service_settlement_period_c"+servln).attr('disabled',true);
    $("#service_next_account_day_c"+servln).attr('disabled',true);
    $("#service_next_account_day_c"+servln).next().hide();
  }
  if (field_value=="Once"){

    //html= '<input class="date_input pull-left" disabled="disabled" style="width:75px" autocomplete="off" name="service_initial_account_day_c[' + servln + ']" id="service_initial_account_day_c' + servln + '" value="" title="" tabindex="0" type="text">';
    $("#service_initial_account_day_c"+servln).val("");
   // $("#service_next_account_day_c"+servln).val("");
    $("#service_initial_account_day_c"+servln).next().hide();
    $("#service_initial_account_day_c"+servln).attr('disabled',true);
    $("#service_initial_account_day_c"+servln).parent().removeClass("show_calendar");
    $("#span_service_next_account_day_c"+servln).addClass('show_calendar');
    if ($("#service_next_account_day"+servln)) {
        $("#service_next_account_day"+servln).remove();
    }
    $("#service_next_account_day_c"+servln).attr('disabled',false);
    $("#service_next_account_day_c"+servln).next().show();
    $("#service_number_of_periods_c"+servln).attr("disabled",true);
    $("#service_number_of_periods_c"+servln).val("");
    //$("#span_service_next_account_day_c"+servln).next().show();
 }else{
    /* html='<input class="date_input pull-left" autocomplete="off" style="width:75px" name="service_initial_account_day_c[' + servln + ']" id="service_initial_account_day_c' + servln + '" value="'+accountDayValue+'" title="" tabindex="0" type="text">'+
     '<span class="input-group-addon">'+
     '<span class="glyphicon glyphicon-calendar"></span></span>';*/
     $("#service_initial_account_day_c"+servln).next().show();
     $("#service_initial_account_day_c"+servln).attr('disabled',false);
     $("#service_initial_account_day_c"+servln).parent().addClass("show_calendar");
     $("#span_service_next_account_day_c"+servln).removeClass('show_calendar');
     //$("#service_next_account_day_c"+servln).val($("#service_initial_account_day_c"+servln).val());
    // $("#service_next_account_day"+servln).val($("#service_initial_account_day_c"+servln).val());
     $("#service_next_account_day_c"+servln).attr('disabled',true);
     if ($("#service_next_account_day_c"+servln).val()) {
        $("#service_next_account_day_c"+servln).next().show();
        $("#service_next_account_day_c"+servln).attr('disabled',false);
     }else{
        $("#service_next_account_day_c"+servln).next().hide();
        $("#service_next_account_day_c"+servln).after(html);
        $("#service_next_account_day"+servln).val($("#product_initial_account_day_c"+servln).val());
     }
     $("#service_number_of_periods_c"+servln).attr("disabled",false);
     if ($("#service_number_of_periods_c"+servln).val()=="") {
        $("#service_number_of_periods_c"+servln).val($("#number_of_periods_c").val());
     }
 }
 //accountDay.innerHTML=html;
 calculateLine(servln,"service_");
 CalendarShow();
    var groupid = 0;
    var key="service_";
    if(enable_groups){
        groupid = document.getElementById(key + 'group_number' + servln).value;
    }
    groupid = 'group' + groupid;
    calculateTotal(groupid);
    calculateTotal();
}

function setNextDayVal(key,num,ipt) {
    var id="#"+key+"next_account_day_c"+num;
    var id_hidden="#"+key+"next_account_day"+num;
    if (!$(id).val()) {
        $(id).val($(ipt).val());
        $(id_hidden).val($(ipt).val());
    }
}

function replace_display_lines(linesHtml) {
  var lineItems=document.getElementById("line_items_span");
  lineItems.innerHTML=linesHtml;
}

function GetUrlParamString(paramName)
{
    if ($("#viewtype").val()) {
        return $("#viewtype").val();
    }
    var reg = new RegExp("(^|&)"+ paramName +"=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if(r!=null){return  unescape(r[2]);}
    else{
        var url=decodeURIComponent(document.location.href);
        url=url.split("#")[1];
        if (url) {
            url=url.split("?")[1];
            r = url.match(reg);
            if(r!=null)return  unescape(r[2]); return null;
        }
    } 
    return null;
}

function edit_show_more_product(btn,num){//编辑模式下的显示隐藏product
    if($("#product_note_line"+num).css("display")=="none"){
        $("#product_note_line"+num).show();
        $("#product_note_line"+num).next().show();
        changeAttr(btn,"show");
    }else{
        $("#product_note_line"+num).hide();
        $("#product_note_line"+num).next().hide();
        changeAttr(btn,"hide");
    }
}

function changeAttr(btn,type){
    if (type=="show") {
        $(btn).children().removeClass("glyphicon glyphicon-plus");
        $(btn).children().addClass("glyphicon glyphicon-minus");
        $(btn).attr("title","隐藏");
    }else{
        $(btn).children().removeClass("glyphicon glyphicon-minus");
        $(btn).children().addClass("glyphicon glyphicon-plus");
        $(btn).attr("title","更多");
    }
}

function edit_show_more_service(btn,num){//编辑模式下的显示隐藏service
    if($("#service_line"+num).next().css("display")=="none"){
        //$("#service_line"+num).show();
        $("#service_line"+num).next().show();
        changeAttr(btn,"show");
    }else{
        //$("#service_line"+num).hide();
        $("#service_line"+num).next().hide();
        changeAttr(btn,"hide");
    }
}

function showMore(btn,num){//btn和num确定点击哪个+
    if($(".showmore"+num+"").css("display")=="none"){
        $(".showmore"+num+"").show();
        $(btn).children().removeClass("glyphicon glyphicon-plus");
        $(btn).children().addClass("glyphicon glyphicon-minus");
    }else{
        $(".showmore"+num+"").hide();
        $(btn).children().removeClass("glyphicon glyphicon-minus");
        $(btn).children().addClass("glyphicon glyphicon-plus");
    }
}

/*$(function(){
    if($("#edit_button").length>0){//判断是否在Detail中
        $("#LBL_LINE_ITEMS>tbody>tr>td").removeAttr("colspan");//清除colsan,因为只有两列
        $("#LBL_LINE_ITEMS>tbody>tr:lt(3)>td:eq(1)").attr("width","87.5%");//第一列已经是12.5%，只需设置第二列
        $("#LBL_LINE_ITEMS>tbody>tr>td").removeAttr("width");//行宽，无用设置，移除
        $("#LBL_LINE_ITEMS>tbody>tr:eq(7)>td:gt(1)").remove();
    }
});*/