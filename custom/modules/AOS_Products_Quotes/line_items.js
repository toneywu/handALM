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
       // console.log(p);
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
                $("#"+type+p+ln).children().each(function(){
                    if($(this).text()==product[p]){
                        $(this).attr("selected",true);
                    }
                    
                });
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

     renderProductLine(ln);//正常行赋值
     renderServiceLine(ln);
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

    var z1 = tablebody.insertRow(-1);
    z1.id = 'Product_line1_displayed' + prodln;
    z1.className = 'oddListRowS1';

    if(curent_module=='AOS_Contracts') {
        z1.innerHTML  =
        "<td style='width:200px;'><span name='displayed_product_name[" + prodln + "]' id='displayed_product_name" + prodln + "'></span></td>" +
        //"<td><span name='displayed_product_part_number[" + prodln + "]' id='displayed_product_part_number" + prodln + "'></span></td>" +
        "<td style='width:80px;'><span name='displayed_product_product_qty[" + prodln + "]' id='displayed_product_product_qty" + prodln + "'></span></td>" +
        "<td style='width:120px;'><span name='displayed_product_product_list_price[" + prodln + "]' id='displayed_product_product_list_price" + prodln + "'></span></td>" +
        //"<td><span name='displayed_product_haa_uom_id_c[" + prodln + "]' id='displayed_product_haa_uom_id_c" + prodln + "'></span></td>" +
        "<td style='width:160px;'><span name='displayed_product_settlement_period_c[" + prodln + "]' id='displayed_product_settlement_period_c" + prodln + "'></span></td>"+
        "<td style='width:160px;><span name='displayed_product_number_of_periods_c[" + prodln + "]' id='displayed_product_number_of_periods_c" + prodln + "'></span></td>"+
        "<td style='width:160px;><span name='displayed_product_next_account_day_c[" + prodln + "]' id='displayed_product_next_account_day_c" + prodln + "'></span></td>"+
        "<td style='width:160px;><span name='displayed_product_final_account_day_c[" + prodln + "]' id='displayed_product_final_account_day_c" + prodln + "'></span></td>";

          // "<td></td>"+
        // "<td></td>" +
        // "<td><span name='displayed_product_vat_amt[" + prodln + "]' id='displayed_product_vat_amt" + prodln + "'></span></td>"+
        // "<td><span name='displayed_product_product_total_price[" + prodln + "]' id='displayed_product_product_total_price" + prodln + "'></span></td>";

        z1.innerHTML +="<td style='width:80px;><a style='float:left' title='隐藏' id='line_show_more_product_btn"+prodln+"' onclick='line_show_more_product(this,"+prodln+")' href='javascript:;'><i class='glyphicon glyphicon-plus'></i></a></td>";

        z1.innerHTML +="<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_product_edit_line" + prodln +"' onclick='ProductLineEditorShow("+prodln+")'></td>";

    //add 201736 增加结算周期等的list显示
    var z2 = tablebody.insertRow(-1);
    z2.id = 'Product_line2_displayed' + prodln;
    z2.style = "display:none";
    var zcell = z2.insertCell(0);
    //z2.className = 'oddListRowS1';
    zcell.colSpan='8';
    zcell.id = 'Product_line2_cell_displayed'+prodln;

    var moreShowTable = document.createElement("table");
    //moreShowTable.setAttribute('class','table-striped');
    moreShowTable.id = 'moreShowProductTable'+prodln;
    document.getElementById('Product_line2_cell_displayed'+ prodln).appendChild(moreShowTable);
    var moreShowTbody = document.createElement("tbody");
    moreShowTbody.id = "moreShowProductTbody" + prodln;
    document.getElementById("moreShowProductTable" + prodln).appendChild(moreShowTbody);

    //优惠 实际单价
    var moreShowTbodyLine0 = moreShowTbody.insertRow(-1);    
    var cell00 = moreShowTbodyLine0.insertCell(0);
    cell00.style.width = "500px";
    cell00.style.textAlign="right";
    cell00.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_VAT_AMT')+":</span>";
    var cell01 = moreShowTbodyLine0.insertCell(1);
    cell01.style.width = "200px";
    cell01.style.textAlign="left";
    cell01.innerHTML = "<span name='displayed_product_vat_amt[" + prodln + "]' id='displayed_product_vat_amt" + prodln + "'></span>";
       var cell02 = moreShowTbodyLine0.insertCell(2);
    cell02.style.width = "200px";
    cell02.style.textAlign="right";
    cell02.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_UNIT_PRICE')+":</span>";
    var cell03 = moreShowTbodyLine0.insertCell(3);
    cell03.style.width = "200px";
    cell03.style.textAlign="left";
    cell03.innerHTML = "<span name='displayed_product_product_total_price[" + prodln + "]' id='displayed_product_product_total_price" + prodln + "'></span>";
    
    //税费 总价
    var moreShowTbodyLine1 = moreShowTbody.insertRow(-1);    
    var cell10 = moreShowTbodyLine1.insertCell(0);
    cell10.style.width = "500px";
    cell10.style.textAlign="right";
    cell10.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_DISCOUNT_AMT')+":</span>";
    var cell11 = moreShowTbodyLine1.insertCell(1);
    cell11.style.width = "200px";
    cell11.style.textAlign="left";
    cell11.innerHTML = "<span name='displayed_product_product_discount[" + prodln + "]' id='displayed_product_product_discount" + prodln + "'></span>";
       var cell12 = moreShowTbodyLine1.insertCell(2);
    cell12.style.width = "200px";
    cell12.style.textAlign="right";
    cell12.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_TOTAL_PRICE')+":</span>";
    var cell13 = moreShowTbodyLine1.insertCell(3);
    cell13.style.width = "200px";
    cell13.style.textAlign="left";
    cell13.innerHTML = "<span name='displayed_product_product_unit_price[" + prodln + "]' id='displayed_product_product_unit_price" + prodln + "'></span>";


    var moreShowTbodyLine2 = moreShowTbody.insertRow(-1); 
    var cell20 = moreShowTbodyLine2.insertCell(0);
    cell20.style.width = "500px";
    cell20.style.textAlign="right";
    cell20.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_EFFECTIVE_START_C')+":</span>";
    var cell21 = moreShowTbodyLine2.insertCell(1);
    cell21.style.width = "200px";
    cell21.style.textAlign="left";
    cell21.innerHTML = "<span name='displayed_product_effective_start_c[" + prodln + "]' id='displayed_product_effective_start_c" + prodln + "'></span>";
     var cell22 = moreShowTbodyLine2.insertCell(2);
    cell22.style.width = "200px";
    cell22.style.textAlign="right";
    cell22.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_INITIAL_ACCOUNT_DAY')+":</span>";
    var cell23 = moreShowTbodyLine2.insertCell(3);
    cell23.style.width = "200px";
    cell23.style.textAlign="left";
    cell23.innerHTML = "<span name='displayed_product_initial_account_day_c[" + prodln + "]' id='displayed_product_initial_account_day_c" + prodln + "'></span>";


    var moreShowTbodyLine3 = moreShowTbody.insertRow(-1); 
    var cell30 = moreShowTbodyLine3.insertCell(0);
    cell30.style.width = "500px";
    cell30.style.textAlign="right";
    cell30.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_EFFECTIVE_END_C')+":</span>";
    var cell31 = moreShowTbodyLine3.insertCell(1);
    cell31.style.width = "200px";
    cell31.style.textAlign="left";
    cell31.innerHTML = "<span name='displayed_product_effective_end_c[" + prodln + "]' id='displayed_product_effective_end_c" + prodln + "'></span>";
    var cell32 = moreShowTbodyLine3.insertCell(2);
    cell32.style.width = "200px";
    cell32.style.textAlign="right"; 
    cell32.innerHTML = "";
    var cell33 = moreShowTbodyLine3.insertCell(3);
    cell33.style.width = "200px";
    cell33.style.textAlign="left";
    cell33.innerHTML = "";

    var moreShowTbodyLine4 = moreShowTbody.insertRow(-1); 
    var cell40 = moreShowTbodyLine4.insertCell(0);
    cell40.style.width = "500px";
    cell40.style.textAlign="right";
    cell40.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PREPAY_FLAG_C')+":</span>";
    var cell41 = moreShowTbodyLine4.insertCell(1);
    cell41.style.width = "200px";
    cell41.style.textAlign="left";
    cell41.innerHTML = "<span name='displayed_product_prepay_flag_c[" + prodln + "]' id='displayed_product_prepay_flag_c" + prodln + "'></span>";
    var cell42 = moreShowTbodyLine4.insertCell(2);
    cell42.style.width = "200px";
    cell42.style.textAlign="right";
    cell42.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_DEPOSIT_FLAG_C')+":</span>";
    var cell43 = moreShowTbodyLine4.insertCell(3);
    cell43.style.width = "200px";
    cell43.style.textAlign="left";
    cell43.innerHTML = "<span name='displayed_product_deposit_flag_c[" + prodln + "]' id='displayed_product_deposit_flag_c" + prodln + "'></span>";
    
    var moreShowTbodyLine5 = moreShowTbody.insertRow(-1); 
    var cell50 = moreShowTbodyLine5.insertCell(0);
    cell50.style.width = "500px";
    cell50.style.textAlign="right";
    cell50.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE')+":</span>";
    var cell51 = moreShowTbodyLine5.insertCell(1);
    cell51.style.width = "200px";
    cell51.style.textAlign="left";
    cell51.innerHTML = "<span name='displayed_product_item_description[" + prodln + "]' id='displayed_product_item_description" + prodln + "'></span>";
    var cell52 = moreShowTbodyLine5.insertCell(2);
    cell52.style.width = "200px";
    cell52.style.textAlign="right";
    cell52.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION')+":</span>";
    var cell53 = moreShowTbodyLine5.insertCell(3);
    cell53.style.width = "200px";
    cell53.style.textAlign="left";
    cell53.innerHTML = "<span name='displayed_product_description[" + prodln + "]' id='displayed_product_description" + prodln + "'></span>";
}else if(curent_module=='AOS_Invoices'||curent_module_in=='AOS_Invoices'){

   z1.innerHTML  =
   "<td><span name='displayed_product_name[" + prodln + "]' id='displayed_product_name" + prodln + "'></span></td>" +
   "<td><span name='displayed_product_part_number[" + prodln + "]' id='displayed_product_part_number" + prodln + "'></span></td>" +
   "<td><span name='displayed_product_product_qty[" + prodln + "]' id='displayed_product_product_qty" + prodln + "'></span></td>" +
   "<td><span name='displayed_product_product_list_price[" + prodln + "]' id='displayed_product_product_list_price" + prodln + "'></span></td>"+
   "<td><span name='displayed_product_product_discount[" + prodln + "]' id='displayed_product_product_discount" + prodln + "'></span></td>"+
   "<td><span name='displayed_product_product_unit_price[" + prodln + "]' id='displayed_product_product_unit_price" + prodln + "'></span></td>" +
   "<td><span name='displayed_product_vat_amt[" + prodln + "]' id='displayed_product_vat_amt" + prodln + "'></span></td>"+
   "<td><span name='displayed_product_product_total_price[" + prodln + "]' id='displayed_product_product_total_price" + prodln + "'></span></td>"+
   "<td><span name='displayed_product_prepay_flag_c[" + prodln + "]' id='displayed_product_prepay_flag_c" + prodln + "'></span></td>"+
   "<td><span name='displayed_product_deposit_flag_c[" + prodln + "]' id='displayed_product_deposit_flag_c" + prodln + "'></span></td>"+
   "<td><span name='displayed_product_item_description[" + prodln + "]' id='displayed_product_item_description" + prodln + "'></span></td>"+
   "<td><span name='displayed_product_description[" + prodln + "]' id='displayed_product_description" + prodln + "'></span></td>";
   z1.innerHTML +="<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_product_edit_line" + prodln +"' onclick='ProductLineEditorShow("+prodln+")'></td>";

}else{
     z1.innerHTML  =
   "<td><span name='displayed_product_name[" + prodln + "]' id='displayed_product_name" + prodln + "'></span></td>" +
   "<td><span name='displayed_product_part_number[" + prodln + "]' id='displayed_product_part_number" + prodln + "'></span></td>" +
   "<td><span name='displayed_product_product_qty[" + prodln + "]' id='displayed_product_product_qty" + prodln + "'></span></td>" +
     "<td><span name='displayed_product_product_list_price[" + prodln + "]' id='displayed_product_product_list_price" + prodln + "'></span></td>"+
   "<td><span name='displayed_product_product_discount[" + prodln + "]' id='displayed_product_product_discount" + prodln + "'></span></td>"+
   "<td><span name='displayed_product_product_unit_price[" + prodln + "]' id='displayed_product_product_unit_price" + prodln + "'></span></td>" +
   "<td><span name='displayed_product_vat_amt[" + prodln + "]' id='displayed_product_vat_amt" + prodln + "'></span></td>"+
   "<td><span name='displayed_product_product_total_price[" + prodln + "]' id='displayed_product_product_total_price" + prodln + "'></span></td>"+
   "<td><span name='displayed_product_item_description[" + prodln + "]' id='displayed_product_item_description" + prodln + "'></span></td>"+
   "<td><span name='displayed_product_description[" + prodln + "]' id='displayed_product_description" + prodln + "'></span></td>";
  z1.innerHTML +="<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_product_edit_line" + prodln +"' onclick='ProductLineEditorShow("+prodln+")'></td>";

}
    //end add 201736

    var x_table = tablebody.insertRow(-1);
    x_table.id = 'x_product_line_edit'+prodln;
    var x_line = x_table.insertCell(0);  
    if(curent_module=='AOS_Contracts'){ 
        x_line.colSpan="8";
    }else{
        x_line.colSpan="10";
    }
    x_line.id = 'x_line'+ prodln;
    x_table.style = "display:none";//

    var x_line_table = document.createElement("table");
    x_line_table.id = "x_line_product_table" + prodln;
    x_line_table.style.bgcolor="rgb(255,0,255)";
    document.getElementById('x_line'+ prodln).appendChild(x_line_table);

    var x_line_table_body = document.createElement("tbody");
    x_line_table_body.id = "x_line_product_body" + prodln;
    document.getElementById("x_line_product_table" + prodln).appendChild(x_line_table_body);
    
    //-------
    var x1=x_line_table_body.insertRow(-1);
    x1.id = 'x1_product_line' + prodln;

    var b = x1.insertCell(0); 
    b.innerHTML ="<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
    "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NAME')+": </label>"+
    "<input style='width:240px;' class='sqsEnabled' autocomplete='off' type='text' name='product_name[" + prodln + "]' id='product_name" + prodln + "' maxlength='50' value='' title='' tabindex='116' value=''><input type='hidden' name='product_product_id[" + prodln + "]' id='product_product_id" + prodln + "' size='20' maxlength='50' value=''>"+
    "</div></div>";

    var b1 = x1.insertCell(1);
    b1.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
    "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PART_NUMBER')+": </label>"+
    "<input style='width:230px;' class='sqsEnabled' autocomplete='off' type='text' name='product_part_number[" + prodln + "]' id='product_part_number" + prodln + "' maxlength='50' value='' title='' tabindex='116' value=''>"+
    "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openProductPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button><br>"+
    "</div></div>";

    //-------
    var x2=x_line_table_body.insertRow(-1);
    x2.id = 'x2_product_line' + prodln;
    //-----
    
    
    var a = x2.insertCell(0);
    a.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
    "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_QUANITY')+": </label>"+
    "<input type='text' style='width:240px;' name='product_product_qty[" + prodln + "]' id='product_product_qty" + prodln + "' size='5' value='' title='' tabindex='116' onblur='Quantity_format2Number(" + prodln + ");calculateLine(" + prodln + ",\"product_\");'>"+
    "</div></div>";


    var a1 =x2.insertCell(1);
    if(curent_module=="AOS_Contracts"){
        a1.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_UOM_NAME_C')+": </label>"+
        "<input type='text' class='sqsEnabled' style='width:230px;' name='product_uom_name_c[" + prodln + "]' id='product_uom_name_c" + prodln + "' size='5' value='' title='' tabindex='116'>"+
        "<input type='hidden' class='sqsEnabled' name='product_haa_uom_id_c["+prodln+"]' id='product_haa_uom_id_c"+prodln+"'/>"+                      
        "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openProductUomPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>"+
        "</div></div>";
    }
    

    var x3=x_line_table_body.insertRow(-1); 
    x3.id = 'x3_product_line' + prodln;

    
    var c = x3.insertCell(0);
    c.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
    "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_LIST_PRICE')+": </label>"+
    "<input style='text-align: right; width:240px;' type='text' name='product_product_list_price[" + prodln + "]' id='product_product_list_price" + prodln + "' size='11' maxlength='50' value='' title='' tabindex='116' onblur='calculateLine(" + prodln + ",\"product_\");'><input type='hidden' name='product_product_cost_price[" + prodln + "]' id='product_product_cost_price" + prodln + "' value=''  />"+
    "</div></div>";

    if (typeof currencyFields !== 'undefined'){

        currencyFields.push("product_product_list_price" + prodln);
        currencyFields.push("product_product_cost_price" + prodln);

    }

    var d = x3.insertCell(1);
    d.innerHTML =  "<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
    "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_DISCOUNT_AMT')+": </label>"+
    "<input type='text' style='text-align: right; width:160px;' name='product_product_discount[" + prodln + "]' id='product_product_discount" + prodln + "' size='12' maxlength='50' value='' title='' tabindex='116' onblur='calculateLine(" + prodln + ",\"product_\");' onblur='calculateLine(" + prodln + ",\"product_\");'><input type='hidden' name='product_product_discount_amount[" + prodln + "]' id='product_product_discount_amount" + prodln + "' value=''  />"+
    "<select style='width:120px;' tabindex='116' name='product_discount[" + prodln + "]' id='product_discount" + prodln + "' onchange='calculateLine(" + prodln + ",\"product_\");'>" + discount_hidden + "</select>"+
    "</div></div>";
    //-------
    var x4=x_line_table_body.insertRow(-1);
    x4.id = 'x4_product_line' + prodln;
    //-----

    var e = x4.insertCell(0);
    e.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
    "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_UNIT_PRICE')+": </label>"+
    "<input type='text' style='text-align: right; width:240px;' name='product_product_unit_price[" + prodln + "]' id='product_product_unit_price" + prodln + "' size='11' maxlength='50' value='' title='' tabindex='116' readonly='readonly' onblur='calculateLine(" + prodln + ",\"product_\");' onblur='calculateLine(" + prodln + ",\"product_\");'>"+
    "</div></div>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("product_product_unit_price" + prodln);
    }

    var f = x4.insertCell(1);
    f.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
    "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_VAT_AMT')+": </label>"+
    "<input type='text' style='text-align: right; width:160px;' name='product_vat_amt[" + prodln + "]' id='product_vat_amt" + prodln + "' size='11' maxlength='250' value='' title='' tabindex='116' readonly='readonly'>"+
    "<select tabindex='116' style='width:120px;' name='product_vat[" + prodln + "]' id='product_vat" + prodln + "' onchange='calculateLine(" + prodln + ",\"product_\");'>" + vat_hidden + "</select>"+
    "</div></div>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("product_vat_amt" + prodln);
    }

      //-------
      var x5=x_line_table_body.insertRow(-1);
      x5.id = 'x5_product_line' + prodln;
    //-----

    var g = x5.insertCell(0);
    g.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
    "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_TOTAL_PRICE')+": </label>"+
    "<input type='text' style='text-align: right; width:240px;' name='product_product_total_price[" + prodln + "]' id='product_product_total_price" + prodln + "' size='11' maxlength='50' value='' title='' tabindex='116' readonly='readonly'><input type='hidden' name='product_group_number[" + prodln + "]' id='product_group_number" + prodln + "' value='"+groupid+"'>"+
    "</div></div>";
    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("product_product_total_price" + prodln);
    }

    //modefy BY osmond.liu 20161022合同模块增加结算周期和日期
    
    var h = x5.insertCell(1);

    //End modefy 20161022增加结算周期和日期

    enableQS(true);
    //QSFieldsArray["EditView_product_name"+prodln].forceSelection = true;

     var y = document.createElement("tbody");
     y.id = "product_note_line" + prodln;
     document.getElementById("x_line_product_table" + prodln).appendChild(y);

    if (curent_module=="AOS_Contracts") {
        //add by hq 还需要改
       
        var number_of_periods_c_hidden = document.getElementById("number_of_periods_list").value;
        h.innerHTML="<a style='float:left' title='隐藏' onclick='edit_show_more_product(this,"+prodln+")' href='javascript:;'><i class='glyphicon glyphicon-minus'></i></a>";
        var settlement_period_option=document.getElementById("settlementperiodhidden").value;

        
        // r2.colSpan="2";
        //结算周期
        var y1=y.insertRow(-1);
        y1.id = 'y1_product_line' + prodln;

        var r10=y1.insertCell(0);
        r10.innerHTML="<div  style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_SETTLEMENT_PERIOD_C')+": </label>"+
        "<select tabindex='0' name='product_settlement_period_c[" + prodln + "]' onchange='setProductSettlementPeriodChange(this,"+prodln+");'"+ " id='product_settlement_period_c" + prodln + "'>" + settlement_period_option +"</select>"+
        "&nbsp;<select name='product_number_of_periods_c["+prodln+"]' id='product_number_of_periods_c"+prodln+"' onchange='calculateLine("+prodln+",\"product_\")'>"+number_of_periods_c_hidden+"</select>"+
        "</div></div>";

        var r11=y1.insertCell(1);
        
        r11.innerHTML= "<div  style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<span class='input_group' style='width:280px;'>"+
        '<span id="span_product_initial_account_day_c'+prodln+'" class="input-group date" style="margin-top:5px" >'+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_INITIAL_ACCOUNT_DAY')+": </label>"+
        '<input  id="product_initial_account_day_c' + prodln + '" class="date_input" style="width:180px" autocomplete="off" name="product_initial_account_day_c[' + prodln + ']" value="" title="" tabindex="0" type="text" onchange="setNextDayVal(\'product_\','+prodln+',this)">'+
        '<span class="input-group-addon">'+
        '<span class="glyphicon glyphicon-calendar"></span>'+
        '</span></span>'+
        "</span></div></div>";


        ////生效日期  下一次结算日期
        var y2=y.insertRow(-1);
        y2.id = 'y2_product_line' + prodln;

        var r20=y2.insertCell(0);
        r20.innerHTML="<div  style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<span class='input_group' style='width:280px;'>"+
        '<span id="span_product_effective_start_c'+prodln+'" class="input-group date show_calendar" style="margin-top:5px">'+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_EFFECTIVE_START_C')+": </label>"+
        '<input id="product_effective_start_c' + prodln + '" class="date_input" style="width:180px" autocomplete="off" name="product_effective_start_c[' + prodln + ']" value="" title="" tabindex="0" type="text"><span class="input-group-addon">'+
        '<span class="glyphicon glyphicon-calendar"></span></span></span>'+
        "</span></div></div>";
        var r21=y2.insertCell(1);
        
        r21.innerHTML= "<div  style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<span class='input_group' style='width:280px;'>"+
        "<span id='span_product_next_account_day_c"+prodln+"' class='input-group date' style='margin-top:5px'>"+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_NEXT_ACCOUNT_DAY')+": </label>"+
        "<input type='text' class='date_input' style='width:180px' id='product_next_account_day_c"+prodln+"' name='product_next_account_day_c["+prodln+"]'/>"+
        "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></span>"+
        "</span></div></div>";

        //终止日期  最后一次结算日期
        var y3=y.insertRow(-1);
        y3.id = 'y3_product_line' + prodln;

        var r30=y3.insertCell(0);
        r30.innerHTML="<div  style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<span class='input_group' style='width:280px;'>"+
        '<span id="span_product_effective_end_c'+prodln+'" class="input-group date show_calendar" style="margin-top:5px">'+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_EFFECTIVE_END_C')+": </label>"+
        '<input id="product_effective_end_c' + prodln + '" class="date_input" style="width:180px" autocomplete="off" name="product_effective_end_c[' + prodln + ']" value="" title="" tabindex="0" type="text"><span class="input-group-addon">'+
        '<span class="glyphicon glyphicon-calendar"></span></span></span>'+
        "</span></div></div>";
        var r31=y3.insertCell(1);
        r31.innerHTML="<div  style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<span class='input_group' style='width:280px;'>"+
        '<span id="span_product_final_account_day_c'+prodln+'" class="input-group date show_calendar" style="margin-top:5px">'+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_FINAL_ACCOUNT_DAY')+": </label>"+
        "<input type='text' class='date_input' style='width:180px' id='product_final_account_day_c"+prodln+"' name='product_final_account_day_c["+prodln+"]' disabled/>"+
        '<span class="glyphicon glyphicon-calendar"></span></span></span>'+
        "</span></div></div>";

        //是否预付 是否押金
        var y4=y.insertRow(-1);
        y4.id = 'y4_product_line' + prodln;

        var r40=y4.insertCell(0);
        r40.innerHTML="<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PREPAY_FLAG_C')+": </label>"+
        '<input  value="1" class="date_input " id="product_prepay_flag_c' + prodln + '" size="30" maxlength="255"  name="product_prepay_flag_c[' + prodln + ']" type="checkbox">'+  
        "</div></div>";

        var r41=y4.insertCell(1);
        r41.innerHTML="<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_DEPOSIT_FLAG_C')+": </label>"+
        '<input value="1" class="date_input " id="product_deposit_flag_c' + prodln + '" size="30" maxlength="255"  name="product_deposit_flag_c[' + prodln + ']" type="checkbox">'+
        "</div></div>";

         //说明 备注
         var y5=y.insertRow(-1);
         y5.id = 'y5_product_line' + prodln;
         var r50=y5.insertCell(0);
         r50.innerHTML="<div padding='5px 50px 5px 30px' style='width:480px;'><div style='width:400px;margin:8px auto;'>"+
         "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE')+": </label>"+
         '<textarea tabindex="116" rows="2" id="product_item_description' + prodln + '"  style="padding-top:0px" name="product_item_description[' + prodln + ']" rows="2" cols="19" ></textarea>'+
         "</div></div>";

         var r51=y5.insertCell(1);
         r51.innerHTML="<div padding='5px 50px 5px 30px' style='width:480px;'><div style='width:400px;margin:8px auto;'>"+
         "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION')+": </label>"+
         '<textarea tabindex="116" rows="2" id="product_description' + prodln + '"  style="padding-top:0px" name="product_description[' + prodln + ']" rows="2" cols="19" ></textarea>'+
         "</div></div>";

        //"<button type='button' id='btn_LineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='LineEditorClose(" + prodln + ",\"line_\")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>";

        setProductSettlementPeriodChange(document.getElementById('product_settlement_period_c'+prodln),prodln);


    }else if(curent_module=='AOS_Invoices'||curent_module_in=='AOS_Invoices'){
        /*alert(curent_module);*/
        var row1 =y.insertRow(-1);
        //row1.id = 'product_note_line' + prodln;
        //y.style.cssText="display:none";
        var h2 = row1.insertCell(0);
        //h1.colSpan = "3";
        // h2.style.color = "rgb(68,68,68)";
        // h2.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_DEPOSIT_FLAG_C') + " :&nbsp;</span>";
        // h2.innerHTML +='<input value="1" id="product_deposit_flag_c' + prodln + '" size="30" maxlength="255"  name="product_deposit_flag_c[' + prodln + ']" type="checkbox">';
        h2.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_DEPOSIT_FLAG_C')+": </label>"+
        '<input value="1" class="date_input " id="product_deposit_flag_c' + prodln + '" size="30" maxlength="255"  name="product_deposit_flag_c[' + prodln + ']" type="checkbox">'+
        "</div></div>";

        var j = row1.insertCell(1);
        //i.colSpan = "2";
        // j.style.color = "rgb(68,68,68)";
        // j.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_PREPAY_FLAG_C') + " :&nbsp;</span>";
        // j.innerHTML += '<input value="1" id="product_prepay_flag_c' + prodln + '" size="30" maxlength="255"  name="product_prepay_flag_c[' + prodln + ']" type="checkbox">&nbsp;&nbsp;';
        j.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PREPAY_FLAG_C')+": </label>"+
        '<input  value="1" class="date_input " id="product_prepay_flag_c' + prodln + '" size="30" maxlength="255"  name="product_prepay_flag_c[' + prodln + ']" type="checkbox">'+  
        "</div></div>";

        var row2 =y.insertRow(-1);
        var h1 = row2.insertCell(0);
        // h1.colSpan = "6";
        // h1.style.color = "rgb(68,68,68)";
        // h1.innerHTML = "<span style='vertical-align: top;'>" + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION') + " :&nbsp;&nbsp;</span>";
        // h1.innerHTML += "<textarea tabindex='116' name='product_item_description[" + prodln + "]' id='product_item_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";
          h1.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;'><div style='width:400px;margin:8px auto;'>"+
         "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE')+": </label>"+
         '<textarea tabindex="116" rows="2" id="product_item_description' + prodln + '"  style="padding-top:0px" name="product_item_description[' + prodln + ']" rows="2" cols="19" ></textarea>'+
         "</div></div>";

        var i = row2.insertCell(1);
        // i.colSpan = "3";
        // i.style.color = "rgb(68,68,68)";
        // i.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE') + " :&nbsp;</span>";
        // i.innerHTML += "<textarea tabindex='116' name='product_description[" + prodln + "]' id='product_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";
        i.innerHTML ="<div padding='5px 50px 5px 30px' style='width:480px;'><div style='width:400px;margin:8px auto;'>"+
         "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION')+": </label>"+
         '<textarea tabindex="116" rows="2" id="product_description' + prodln + '"  style="padding-top:0px" name="product_description[' + prodln + ']" rows="2" cols="19" ></textarea>'+
         "</div></div>";
        
    }else{
     var row =y.insertRow(-1);
    
     //y.style.cssText="display:none";
     var h1 = row.insertCell(0);
        //h1.colSpan = "3";
        // h1.style.color = "rgb(68,68,68)";
        // h1.innerHTML = "<span style='vertical-align: top;'>" + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION') + " :&nbsp;&nbsp;</span>";
        // h1.innerHTML += "<textarea tabindex='116' name='product_item_description[" + prodln + "]' id='product_item_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";
        h1.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;'><div style='width:400px;margin:8px auto;'>"+
         "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE')+": </label>"+
         '<textarea tabindex="116" rows="2" id="product_item_description' + prodln + '"  style="padding-top:0px" name="product_item_description[' + prodln + ']" rows="2" cols="19" ></textarea>'+
         "</div></div>";

        var i = row.insertCell(1);
        //i.colSpan = "2";
        // i.style.color = "rgb(68,68,68)";
        // i.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE') + " :&nbsp;</span>";
        // i.innerHTML += "<textarea tabindex='116' name='product_description[" + prodln + "]' id='product_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";
        i.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;'><div style='width:400px;margin:8px auto;'>"+
         "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION')+": </label>"+
         '<textarea tabindex="116" rows="2" id="product_description' + prodln + '"  style="padding-top:0px" name="product_description[' + prodln + ']" rows="2" cols="19" ></textarea>'+
         "</div></div>";
        
    }
    var y_btn = document.createElement("tbody");
        // y_btn.id = "product_note_line" + prodln;
        document.getElementById("x_line_product_table" + prodln).appendChild(y_btn);
        var y_btn_line=y_btn.insertRow(-1);
        var y_btn_line_cell = y_btn_line.insertCell(0);
        y_btn_line_cell.colSpan = '4';
        y_btn_line_cell.innerHTML += "<button type='button' id='btn_ProductLineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='ProductLineEditorClose(" + prodln + ")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>";
        y_btn_line_cell.innerHTML += "<input type='hidden' name='product_currency[" + prodln + "]' id='product_currency" + prodln + "' value=''><input type='hidden' name='product_deleted[" + prodln + "]' id='product_deleted" + prodln + "' value='0'><input type='hidden' name='product_id[" + prodln + "]' id='product_id" + prodln + "' value=''><button type='button' id='product_delete_line" + prodln + "' class='button' value='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "' tabindex='116' onclick='markLineDeleted(" + prodln + ",\"product_\")'><img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>";
        y_btn_line_cell.innerHTML +="<input type='hidden' name='product_haos_revenues_quotes_id_c[" + prodln + "]' id='product_haos_revenues_quotes_id_c" + prodln + "' value=''>";
        addToValidate('EditView','product_product_id'+prodln,'id',true,"Please choose a product");

        renderProductLine(prodln);

        prodln++;
        CalendarShow();

        return prodln - 1;
    }

function renderProductLine(ln) { //将编辑器中的内容显示于正常行中

  $("#displayed_product_name"+ln).html($("#product_name"+ln).val());
  $("#displayed_product_part_number"+ln).html($("#product_part_number"+ln).val());
  $("#displayed_product_product_qty"+ln).html($("#product_product_qty"+ln).val());
  $("#displayed_product_haa_uom_id_c"+ln).html($("#product_haa_uom_id_c"+ln).val());
  $("#displayed_product_product_list_price"+ln).html($("#product_product_list_price"+ln).val());
  $("#displayed_product_item_description"+ln).html($("#product_item_description"+ln).val());
  $("#displayed_product_description"+ln).html($("#product_description"+ln).val());
  
  var discount_type = '';
  if($("#product_discount"+ln).find("option:selected").val()=='Percentage'){
    discount_type = '%';
}else{
    discount_type = '';
}
$("#displayed_product_product_discount"+ln).html($("#product_product_discount"+ln).val()+discount_type);

$("#displayed_product_product_unit_price"+ln).html($("#product_product_unit_price"+ln).val());
$("#displayed_product_vat_amt"+ln).html($("#product_vat_amt"+ln).val());
$("#displayed_product_product_total_price"+ln).html($("#product_product_total_price"+ln).val());

var curent_module=GetUrlParamString("module");
if(curent_module=='AOS_Contracts'){
    renderProductMoreInfoLine(ln);
    var flag=$("#product_prepay_flag_c"+ln).is(':checked')?"是":"否";
  $("#displayed_product_prepay_flag_c"+ln).html(flag);

  var flag=$("#product_deposit_flag_c"+ln).is(':checked')?"是":"否";
  $("#displayed_product_deposit_flag_c"+ln).html(flag);

}else if(curent_module=='AOS_Invoices'){
    var flag=$("#product_prepay_flag_c"+ln).is(':checked')?"是":"否";
  $("#displayed_product_prepay_flag_c"+ln).html(flag);

  var flag=$("#product_deposit_flag_c"+ln).is(':checked')?"是":"否";
  $("#displayed_product_deposit_flag_c"+ln).html(flag);
}
 //  var flag=$("#line_enabled_flag"+ln).is(':checked')?"是":"否";
 //  $("#line_enabled_flag"+ln).val($("#line_enabled_flag"+ln).is(':checked')?"1":"0");
 //  $("#displayed_line_enabled_flag"+ln).html(flag);
 // //$("#displayed_line_enabled_flag"+ln).html($("#line_enabled_flag"+ln).val());
 //  $("#displayed_line_description"+ln).html($("#line_description"+ln).val());
}


function renderProductMoreInfoLine(ln) { //将编辑器中的内容显示于正常行中

   $("#displayed_product_initial_account_day_c"+ln).html($("#product_initial_account_day_c"+ln).val());
  $("#displayed_product_effective_start_c"+ln).html($("#product_effective_start_c"+ln).val());
  $("#displayed_product_next_account_day_c"+ln).html($("#product_next_account_day_c"+ln).val());
  $("#displayed_product_effective_end_c"+ln).html($("#product_effective_end_c"+ln).val());
  $("#displayed_product_final_account_day_c"+ln).html($("#product_final_account_day_c"+ln).val());
  //期数
  $("#displayed_product_settlement_period_c"+ln).html($("#product_settlement_period_c"+ln).find('option:selected').text());
  $("#displayed_product_number_of_periods_c"+ln).html($("#product_number_of_periods_c"+ln).find("option:selected").text());
  
  
}


function ProductLineEditorShow(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
  //validateRequired(ln);
  if (prodln>1) {
    for (var i=0;i<prodln;i++) {
      ProductLineEditorClose(i);
  }
}
$("#Product_line1_displayed"+ln).hide();
$("#x_product_line_edit"+ln).show();

$("#Product_line2_displayed"+ln).hide();
changeAttr($('#line_show_more_product_btn'+ln),"hide");
}

function ProductLineEditorClose(ln) {//关闭行编辑器（显示为正常行）
  //if (check_form('EditView')) {
    $("#x_product_line_edit"+ln).hide();
    $("#Product_line1_displayed"+ln).show();
    renderProductLine(ln);

    $("#Product_line2_displayed"+ln).hide();
    changeAttr($('#line_show_more_product_btn'+ln),"hide");
    //resetLineNum_Bold();
  //}
}


function addProductLine(tableid, groupid){
    insertProductLine(tableid, groupid);//加入新行
    ProductLineEditorShow(prodln - 1);  
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
    var condition = '&contract_flag_c_advanced=1';
    open_popup('AOS_Products', 800, 850, condition, true, true, popupRequestData);

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

    var z1 = tablebody.insertRow(-1);
    z1.id = 'Service_line1_displayed' + servln;
    z1.className = 'oddListRowS1';
    if(curent_module=='AOS_Contracts') {
    z1.innerHTML  =
    "<td style='width:220px;'><span name='displayed_service_name[" + servln + "]' id='displayed_service_name" + servln + "'></span></td>" +
    "<td style='width:180px;'><span name='displayed_service_product_list_price[" + servln + "]' id='displayed_service_product_list_price" + servln + "'></span></td>" +
    "<td style='width:160px;'><span name='displayed_service_settlement_period_c[" + servln + "]' id='displayed_service_settlement_period_c" + servln + "'></span></td>"+
    "<td style='width:160px;'><span name='displayed_service_number_of_periods_c[" + servln + "]' id='displayed_service_number_of_periods_c" + servln + "'></span></td>"+
    "<td style='width:160px;'><span name='displayed_service_next_account_day_c[" + servln + "]' id='displayed_service_next_account_day_c" + servln + "'></span></td>"+
    "<td style='width:160px;'><span name='displayed_service_final_account_day_c[" + servln + "]' id='displayed_service_final_account_day_c" + servln + "'></span></td>";

    // "<td></td>" +
    // "<td></td>" +
    // "<td></td>"+
    // "<td></td>";
    
    z1.innerHTML += "<td style='width:80px;'><a style='float:left' title='隐藏' id='line_show_more_service_btn"+servln+"' onclick='line_show_more_service(this,"+servln+")' href='javascript:;'><i class='glyphicon glyphicon-plus'></i></a></td>";
    
    z1.innerHTML +="<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_service_edit_line" + servln +"' onclick='ServiceLineEditorShow("+servln+")'></td>";

    //add 201736 增加结算周期等的list显示
    var z2 = tablebody.insertRow(-1);
    z2.id = 'Service_line2_displayed' + servln;
    z2.style = "display:none";
    var zcell = z2.insertCell(0);
    //z2.className = 'oddListRowS1';
    zcell.colSpan='12';
    zcell.id = 'Service_line2_cell_displayed'+servln;

    var moreShowTable = document.createElement("table");
    //moreShowTable.setAttribute('class','table-striped');
    moreShowTable.id = 'moreShowTable'+servln;
    document.getElementById('Service_line2_cell_displayed'+ servln).appendChild(moreShowTable);
    var moreShowTbody = document.createElement("tbody");
    moreShowTbody.id = "moreShowTbody" + servln;
    document.getElementById("moreShowTable" + servln).appendChild(moreShowTbody);

    var moreShowTbodyLine0 = moreShowTbody.insertRow(-1);    
    var cell00 = moreShowTbodyLine0.insertCell(0);
    cell00.style.width = "500px";
    cell00.style.textAlign="right";
    cell00.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_TOTAL_PRICE')+":</span>";
    var cell01 = moreShowTbodyLine0.insertCell(1);
    cell01.style.width = "200px";
    cell01.style.textAlign="left";
    cell01.innerHTML = "<span name='displayed_service_product_total_price[" + servln + "]' id='displayed_service_product_total_price" + servln + "'></span>";
    var cell02 = moreShowTbodyLine0.insertCell(2);
    cell02.style.width = "200px";
    cell02.style.textAlign="right";
    cell02.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_VAT_AMT')+":</span>";
    var cell03 = moreShowTbodyLine0.insertCell(3);
    cell03.style.width = "200px";
    cell03.style.textAlign="left";
    cell03.innerHTML = "<span name='displayed_service_vat_amt[" + servln + "]' id='displayed_service_vat_amt" + servln + "'></span>";

     var moreShowTbodyLine1 = moreShowTbody.insertRow(-1);    
    var cell10 = moreShowTbodyLine1.insertCell(0);
    cell10.style.width = "500px";
    cell10.style.textAlign="right";
    cell10.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_DISCOUNT_AMT')+":</span>";
    var cell11 = moreShowTbodyLine1.insertCell(1);
    cell11.style.width = "200px";
    cell11.style.textAlign="left";
    cell11.innerHTML = "<span name='displayed_service_discount[" + servln + "]' id='displayed_service_discount" + servln + "'></span>";
    var cell12 = moreShowTbodyLine1.insertCell(2);
    cell12.style.width = "200px";
    cell12.style.textAlign="right";
    cell12.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_UNIT_PRICE')+":</span>";
    var cell13 = moreShowTbodyLine1.insertCell(3);
    cell13.style.width = "200px";
    cell13.style.textAlign="left";
    cell13.innerHTML = "<span name='displayed_service_product_unit_price[" + servln + "]' id='displayed_service_product_unit_price" + servln + "'></span>";
        

    var moreShowTbodyLine2 = moreShowTbody.insertRow(-1); 
    var cell20 = moreShowTbodyLine2.insertCell(0);
    cell20.style.width = "500px";
    cell20.style.textAlign="right";
    cell20.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_EFFECTIVE_START_C')+":</span>";
    var cell21 = moreShowTbodyLine2.insertCell(1);
    cell21.style.width = "200px";
    cell21.style.textAlign="left";
    cell21.innerHTML = "<span name='displayed_service_effective_start_c[" + servln + "]' id='displayed_service_effective_start_c" + servln + "'></span>";
    var cell22 = moreShowTbodyLine2.insertCell(2);
    cell22.style.width = "200px";
    cell22.style.textAlign="right";
    cell22.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_INITIAL_ACCOUNT_DAY')+":</span>";
    var cell23 = moreShowTbodyLine2.insertCell(3);
    cell23.style.width = "200px";
    cell23.style.textAlign="left";
    cell23.innerHTML = "<span name='displayed_service_initial_account_day_c[" + servln + "]' id='displayed_service_initial_account_day_c" + servln + "'></span>";

    var moreShowTbodyLine3 = moreShowTbody.insertRow(-1); 
    var cell30 = moreShowTbodyLine3.insertCell(0);
    cell30.style.width = "500px";
    cell30.style.textAlign="right";
    cell30.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_EFFECTIVE_END_C')+":</span>";
    var cell31 = moreShowTbodyLine3.insertCell(1);
    cell31.style.width = "200px";
    cell31.style.textAlign="left";
    cell31.innerHTML = "<span name='displayed_service_effective_end_c[" + servln + "]' id='displayed_service_effective_end_c" + servln + "'></span>";
    // var cell32 = moreShowTbodyLine3.insertCell(2);
    // cell32.style.width = "200px";
    // cell32.style.textAlign="right"; 
    // cell32.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_FINAL_ACCOUNT_DAY')+":</span>";
    // var cell33 = moreShowTbodyLine3.insertCell(3);
    // cell33.style.width = "200px";
    // cell33.style.textAlign="left";
    // cell33.innerHTML = "";

    var moreShowTbodyLine4 = moreShowTbody.insertRow(-1); 
    var cell40 = moreShowTbodyLine4.insertCell(0);
    cell40.style.width = "500px";
    cell40.style.textAlign="right";
    cell40.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PREPAY_FLAG_C')+":</span>";
    var cell41 = moreShowTbodyLine4.insertCell(1);
    cell41.style.width = "200px";
    cell41.style.textAlign="left";
    cell41.innerHTML = "<span name='displayed_service_prepay_flag_c[" + servln + "]' id='displayed_service_prepay_flag_c" + servln + "'></span>";
    var cell42 = moreShowTbodyLine4.insertCell(2);
    cell42.style.width = "200px";
    cell42.style.textAlign="right";
    cell42.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_DEPOSIT_FLAG_C')+":</span>";
    var cell43 = moreShowTbodyLine4.insertCell(3);
    cell43.style.width = "200px";
    cell43.style.textAlign="left";
    cell43.innerHTML = "<span name='displayed_service_deposit_flag_c[" + servln + "]' id='displayed_service_deposit_flag_c" + servln + "'></span>";
    
    var moreShowTbodyLine5 = moreShowTbody.insertRow(-1); 
    var cell50 = moreShowTbodyLine5.insertCell(0);
    cell50.style.width = "500px";
    cell50.style.textAlign="right";
    cell50.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE')+":</span>";
    var cell51 = moreShowTbodyLine5.insertCell(1);
    cell51.style.width = "200px";
    cell51.style.textAlign="left";
    cell51.innerHTML = "<span name='displayed_service_item_description[" + servln + "]' id='displayed_service_item_description" + servln + "'></span>";
    var cell52 = moreShowTbodyLine5.insertCell(2);
    cell52.style.width = "200px";
    cell52.style.textAlign="right";
    cell52.innerHTML = "<span>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION')+":</span>";
    var cell53 = moreShowTbodyLine5.insertCell(3);
    cell53.style.width = "200px";
    cell53.style.textAlign="left";
    cell53.innerHTML = "<span name='displayed_service_description[" + servln + "]' id='displayed_service_description" + servln + "'></span>";
    
    }else if(curent_module=='AOS_Invoices'||curent_module_in=='AOS_Invoices'){
    z1.innerHTML ="<td ><span name='displayed_service_name[" + servln + "]' id='displayed_service_name" + servln + "'></span></td>" +
    "<td><span name='displayed_service_product_list_price[" + servln + "]' id='displayed_service_product_list_price" + servln + "'></span></td>" +
    "<td><span name='displayed_service_discount[" + servln + "]' id='displayed_service_discount" + servln + "'></span></td>" +
    "<td><span name='displayed_service_product_unit_price[" + servln + "]' id='displayed_service_product_unit_price" + servln + "'></span></td>" +
    "<td><span name='displayed_service_vat_amt[" + servln + "]' id='displayed_service_vat_amt" + servln + "'></span></td>"+
    "<td><span name='displayed_service_product_total_price[" + servln + "]' id='displayed_service_product_total_price" + servln + "'></span></td>"+
     "<td><span name='displayed_service_prepay_flag_c[" + servln + "]' id='displayed_service_prepay_flag_c" + servln + "'></span></td>"+
     "<td><span name='displayed_service_deposit_flag_c[" + servln + "]' id='displayed_service_deposit_flag_c" + servln + "'></span></td>"+
     "<td><span name='displayed_service_item_description[" + servln + "]' id='displayed_service_item_description" + servln + "'></span></td>"+
     "<td><span name='displayed_service_description[" + servln + "]' id='displayed_service_description" + servln + "'></span></td>";
    z1.innerHTML +="<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_service_edit_line" + servln +"' onclick='ServiceLineEditorShow("+servln+")'></td>";

    }else{
        z1.innerHTML ="<td ><span name='displayed_service_name[" + servln + "]' id='displayed_service_name" + servln + "'></span></td>" +
    "<td><span name='displayed_service_product_list_price[" + servln + "]' id='displayed_service_product_list_price" + servln + "'></span></td>" +
    "<td><span name='displayed_service_discount[" + servln + "]' id='displayed_service_discount" + servln + "'></span></td>" +
    "<td><span name='displayed_service_product_unit_price[" + servln + "]' id='displayed_service_product_unit_price" + servln + "'></span></td>" +
    "<td><span name='displayed_service_vat_amt[" + servln + "]' id='displayed_service_vat_amt" + servln + "'></span></td>"+
    "<td><span name='displayed_service_product_total_price[" + servln + "]' id='displayed_service_product_total_price" + servln + "'></span></td>"+
    "<td><span name='displayed_service_item_description[" + servln + "]' id='displayed_service_item_description" + servln + "'></span></td>"+
     "<td><span name='displayed_service_description[" + servln + "]' id='displayed_service_description" + servln + "'></span></td>";
    z1.innerHTML +="<td><input type='button' value='" + SUGAR.language.get('app_strings', 'LBL_EDITINLINE') + "' class='button'  id='btn_service_edit_line" + servln +"' onclick='ServiceLineEditorShow("+servln+")'></td>";

    }
    //end add 201736

    //////////////////
    var x_service_table = tablebody.insertRow(-1);
    x_service_table.id='x_service_line_edit'+servln;
    x_service_table.style = "display:none";//
    var x_service_line = x_service_table.insertCell(0);    
    x_service_line.colSpan="9";
    x_service_line.id = 'x_service_line'+ servln;

    var x_service_line_table = document.createElement("table");
    x_service_line_table.id = "x_line_service_table" + servln;
    document.getElementById('x_service_line'+ servln).appendChild(x_service_line_table);

    var x_service_line_table_body = document.createElement("tbody");
    x_service_line_table_body.id = "x_line_service_body" + servln;
    document.getElementById("x_line_service_table" + servln).appendChild(x_service_line_table_body);
    

    var x1 = x_service_line_table_body.insertRow(-1);
    x1.id = 'x1_service_line' + servln;

    var a = x1.insertCell(0);
    //a.colSpan = "4";
    //a.innerHTML = "<textarea name='service_name[" + servln + "]' id='service_name" + servln + "' size='16' cols='64' title='' tabindex='116' style='padding-top:0px'></textarea><input type='hidden' name='service_product_id[" + servln + "]' id='service_product_id" + servln + "' size='20' maxlength='50' value='0'>";
    a.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
    "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_NAME')+": </label>"+
    "<textarea name='service_name[" + servln + "]' id='service_name" + servln + "' size='16' cols='64' title='' tabindex='116' style='padding-top:0px'></textarea><input type='hidden' name='service_product_id[" + servln + "]' id='service_product_id" + servln + "' size='20' maxlength='50' value='0'>"+
    "</div></div>";
    var a1 = x1.insertCell(1);
    //a1.innerHTML = "<input type='text' style='text-align: right; width:115px;' name='service_product_list_price[" + servln + "]' id='service_product_list_price" + servln + "' size='11' maxlength='50' value='' title='' tabindex='116'   onblur='calculateLine(" + servln + ",\"service_\");'>";
    a1.innerHTML ="<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
    "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_LIST_PRICE')+": </label>"+
    "<input type='text' style='text-align: right; width:115px;' name='service_product_list_price[" + servln + "]' id='service_product_list_price" + servln + "' size='11' maxlength='50' value='' title='' tabindex='116'   onblur='calculateLine(" + servln + ",\"service_\");'>"+
    "</div></div>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("service_product_list_price" + servln);
    }

   //-----------------
   var x2 = x_service_line_table_body.insertRow(-1);
   x2.id = 'x2_service_line' + servln;

   var a2 = x2.insertCell(0);
    // a2.innerHTML = "<input type='text' style='text-align: right; width:90px;' name='service_product_discount[" + servln + "]' id='service_product_discount" + servln + "' size='12' maxlength='50' value='' title='' tabindex='116' onblur='calculateLine(" + servln + ",\"service_\");' onblur='calculateLine(" + servln + ",\"service_\");'><input type='hidden' name='service_product_discount_amount[" + servln + "]' id='service_product_discount_amount" + servln + "' value=''  />";
    // a2.innerHTML += "<select tabindex='116' name='service_discount[" + servln + "]' id='service_discount" + servln + "' onchange='calculateLine(" + servln + ",\"service_\");'>" + discount_hidden + "</select>";
    a2.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
    "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_DISCOUNT')+": </label>"+
    "<input type='text' style='text-align: right; width:90px;' name='service_product_discount[" + servln + "]' id='service_product_discount" + servln + "' size='12' maxlength='50' value='' title='' tabindex='116' onblur='calculateLine(" + servln + ",\"service_\");' onblur='calculateLine(" + servln + ",\"service_\");'><input type='hidden' name='service_product_discount_amount[" + servln + "]' id='service_product_discount_amount" + servln + "' value=''  />"+
    "<select tabindex='116' name='service_discount[" + servln + "]' id='service_discount" + servln + "' onchange='calculateLine(" + servln + ",\"service_\");'>" + discount_hidden + "</select>"+
    "</div></div>";

    var b = x2.insertCell(1);
    //b.innerHTML = "<input type='text' style='text-align: right; width:115px;' name='service_product_unit_price[" + servln + "]' id='service_product_unit_price" + servln + "' size='11' maxlength='50' value='' title='' tabindex='116'   onblur='calculateLine(" + servln + ",\"service_\");'>";
    b.innerHTML ="<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
    "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_PRICE')+": </label>"+
    "<input type='text' style='text-align: right; width:115px;' name='service_product_unit_price[" + servln + "]' id='service_product_unit_price" + servln + "' size='11' maxlength='50' value='' title='' tabindex='116'   onblur='calculateLine(" + servln + ",\"service_\");'>"+
    "</div></div>";
    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("service_product_unit_price" + servln);
    }

    //-----------------
    var x3 = x_service_line_table_body.insertRow(-1);
    x3.id = 'x3_service_line' + servln;
    var c = x3.insertCell(0);
    // c.innerHTML = "<input type='text' style='text-align: right; width:90px;' name='service_vat_amt[" + servln + "]' id='service_vat_amt" + servln + "' size='11' maxlength='250' value='' title='' tabindex='116' readonly='readonly'>";
    // c.innerHTML += "<select tabindex='116' name='service_vat[" + servln + "]' id='service_vat" + servln + "' onchange='calculateLine(" + servln + ",\"service_\");'>" + vat_hidden + "</select>";
    c.innerHTML ="<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
    "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_VAT_AMT')+": </label>"+
    "<input type='text' style='text-align: right; width:90px;' name='service_vat_amt[" + servln + "]' id='service_vat_amt" + servln + "' size='11' maxlength='250' value='' title='' tabindex='116' readonly='readonly'>"+
    "<select tabindex='116' name='service_vat[" + servln + "]' id='service_vat" + servln + "' onchange='calculateLine(" + servln + ",\"service_\");'>" + vat_hidden + "</select>"+
    "</div></div>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("service_vat_amt" + servln);
    }

    var e = x3.insertCell(1);
    //e.innerHTML = "<input type='text' style='text-align: right; width:115px;' name='service_product_total_price[" + servln + "]' id='service_product_total_price" + servln + "' size='11' maxlength='50' value='' title='' tabindex='116' readonly='readonly'><input type='hidden' name='service_group_number[" + servln + "]' id='service_group_number" + servln + "' value='"+ groupid +"'>";
    e.innerHTML =  "<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
    "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_TOTAL_PRICE')+": </label>"+
    "<input type='text' style='text-align: right; width:115px;' name='service_product_total_price[" + servln + "]' id='service_product_total_price" + servln + "' size='11' maxlength='50' value='' title='' tabindex='116' readonly='readonly'><input type='hidden' name='service_group_number[" + servln + "]' id='service_group_number" + servln + "' value='"+ groupid +"'>"+
    "</div></div>";
    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("service_product_total_price" + servln);
    }

    var x4 = x_service_line_table_body.insertRow(-1);
    //x4.id = 'service_line' + servln;
    var f = x4.insertCell(0);
    
      var y = document.createElement("tbody");
      y.id = "service_line" + servln;
    document.getElementById("x_line_service_table" + servln).appendChild(y);
    //modefy BY osmond.liu 20161022合同模块增加结算周期和日期
    if (curent_module=='AOS_Contracts') {
        var number_of_periods_c_hidden=document.getElementById("number_of_periods_list").value;
        f.innerHTML = "<a style='float:left' title='隐藏' onclick='edit_show_more_service(this,"+servln+")' href='javascript:;'><i class='glyphicon glyphicon-minus'></i></a>";
        var settlement_period_option=document.getElementById("settlementperiodhidden").value;

        //var f = x.insertCell(6);
        //f.innerHTML = "<input type='hidden' name='service_deleted[" + servln + "]' id='service_deleted" + servln + "' value='0'><input type='hidden' name='service_id[" + servln + "]' id='service_id" + servln + "' value=''><button type='button' class='button' id='service_delete_line" + servln + "' value='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "' tabindex='116' onclick='markLineDeleted(" + servln + ",\"service_\")'><img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button><br>";

        //增加行
        //var y = tablebody.insertRow(-1);
        // var r = y.insertCell(0);
        //r.id = 'service_line' + servln;
        //r.colSpan="11";
      
        //结算周期
        var y1=y.insertRow(-1);

        var r10=y1.insertCell(0);
        r10.innerHTML="<div  style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_SETTLEMENT_PERIOD_C')+": </label>"+
        "<select tabindex='0' name='service_settlement_period_c[" + servln + "]' onchange='setServiceSettlementPeriodChange(this,"+servln+");'"+ " id='service_settlement_period_c" + servln + "'>" + settlement_period_option +"</select>"+
        "&nbsp;<select id='service_number_of_periods_c"+servln+"' name='service_number_of_periods_c["+servln+"]' onchange='calculateLine("+servln+",\"service_\")'>"+number_of_periods_c_hidden+"</select>"+
        "</div></div>";

        var r11=y1.insertCell(1);
        
        r11.innerHTML= "<div  style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<span class='input_group' style='width:280px;'>"+
        '<span id="span_service_initial_account_day_c'+servln+'" class="input-group date" style="margin-top:5px" >'+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_INITIAL_ACCOUNT_DAY')+": </label>"+
        '<input id="service_initial_account_day_c' + servln + '" class="date_input" readOnly="readOnly" style="width:120px" autocomplete="off" name="service_initial_account_day_c[' + servln + ']" value="" title="" tabindex="0" type="text" onchange="setNextDayVal(\'service_\','+servln+',this)"/>'+
        '<span class="input-group-addon">'+
        '<span class="glyphicon glyphicon-calendar"></span>'+
        '</span></span>'+
        "</span></div></div>";


        ////生效日期  下一次结算日期
        var y2=y.insertRow(-1);
        y2.id = 'y2_product_line' + servln;

        var r20=y2.insertCell(0);
        r20.innerHTML="<div  style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<span class='input_group' style='width:280px;'>"+
        '<span id="span_service_effective_start_c'+servln+'" class="input-group date show_calendar" style="margin-top:5px">'+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_EFFECTIVE_START_C')+": </label>"+
        '<input id="service_effective_start_c' + servln + '" class="date_input" style="width:120px" autocomplete="off" name="service_effective_start_c[' + servln + ']" value="" title="" tabindex="0" type="text"><span class="input-group-addon">'+
        '<span class="glyphicon glyphicon-calendar"></span></span></span>'+
        "</span></div></div>";
        var r21=y2.insertCell(1);
        
        r21.innerHTML= "<div  style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<span class='input_group' style='width:280px;'>"+
        "<span id='span_service_next_account_day_c"+servln+"' class='input-group date' style='margin-top:5px'>"+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_NEXT_ACCOUNT_DAY')+": </label>"+
        "<input type='text' class='date_input' id='service_next_account_day_c"+servln+"' name='service_next_account_day_c["+servln+"]' style='width:120px'/>"+
        "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></span>"+
        "</span></div></div>";

        //终止日期  最后一次结算日期
        var y3=y.insertRow(-1);
        y3.id = 'y3_product_line' + servln; 

        var r30=y3.insertCell(0);
        r30.innerHTML="<div  style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<span class='input_group' style='width:280px;'>"+
        '<span id="span_serviceeffective_end_c'+servln+'" class="input-group date show_calendar" style="margin-top:5px">'+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_EFFECTIVE_END_C')+": </label>"+
        '<input id="service_effective_end_c' + servln + '" class="date_input" style="width:120px" autocomplete="off" name="service_effective_end_c[' + servln + ']" value="" title="" tabindex="0" type="text"><span class="input-group-addon">'+
        '<span class="glyphicon glyphicon-calendar"></span></span></span>'+
        "</span></div></div>";
        var r31=y3.insertCell(1);
        r31.innerHTML="<div  style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<span class='input_group' style='width:280px;'>"+
        '<span id="span_service_final_account_day_c'+servln+'" class="input-group date show_calendar" style="margin-top:5px">'+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_FINAL_ACCOUNT_DAY')+": </label>"+
        "<input type='text' class='date_input' style='width:120px' id='service_final_account_day_c"+servln+"' name='service_final_account_day_c["+servln+"]' disabled/>"+
        '<span class="glyphicon glyphicon-calendar"></span></span></span>'+
        "</span></div></div>";

        //是否预付 是否押金
        var y4=y.insertRow(-1);
        y4.id = 'y4_product_line' + servln;

        var r40=y4.insertCell(0);
        r40.innerHTML="<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PREPAY_FLAG_C')+": </label>"+
        '<input  value="1" class="date_input" id="service_prepay_flag_c' + servln + '" size="30" maxlength="255"  name="service_prepay_flag_c[' + servln + ']" type="checkbox">'+
        "</div></div>";

        var r41=y4.insertCell(1);
        r41.innerHTML="<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_DEPOSIT_FLAG_C')+": </label>"+
        '<input value="1" class="date_input" id="service_deposit_flag_c' + servln + '" size="30" maxlength="255"  name="service_deposit_flag_c[' + servln + ']" type="checkbox">'+
        "</div></div>";

         //说明 备注  prodln?servln?
         var y5=y.insertRow(-1);
         y5.id = 'y5_product_line' + servln;
         var r50=y5.insertCell(0);
         r50.innerHTML="<div padding='5px 50px 5px 30px' style='width:480px;'><div style='width:400px;margin:8px auto;'>"+
         "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE')+": </label>"+
         '<textarea tabindex="116" id="service_item_description' + servln + '"  style="padding-top:0px" name="service_item_description[' + servln + ']" rows="2" cols="19" ></textarea>'+
         "</div></div>";

         var r51=y5.insertCell(1);
         r51.innerHTML="<div padding='5px 50px 5px 30px' style='width:480px;'><div style='width:400px;margin:8px auto;'>"+
         "<label style='width:85px;font-size:16px;' >"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION')+": </label>"+
         '<textarea tabindex="116" id="service_description' + servln + '"  style="padding-top:0px" name="service_description[' + servln + ']" rows="2" cols="19" ></textarea>'+
         "</div></div>";


        //终止日期
        //说明
        /*r.innerHTML +="<div class='pull-left'><div class='pull-left' style='height:25px; line-height:25px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION')+":</div>"+
                "<textarea tabindex='116' name='service_item_description[" + servln + "]' id='product_item_description" + servln + "' rows='2' cols='20' style='padding-top:0px'></textarea></div>";
        //备注
        r.innerHTML +="<div class='pull-left' style='margin-left:10px;'><div class='pull-left' style='height:25px; line-height:25px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE')+":</div>"+
                "<textarea tabindex='116' name='service_description[" + servln + "]' id='product_description" + servln + "' rows='2' cols='20' style='padding-top:0px'></textarea></div>";
                */
                setServiceSettlementPeriodChange(document.getElementById('service_settlement_period_c'+servln),servln);
        }else if(curent_module=='AOS_Invoices'||curent_module_in=='AOS_Invoices'){
                /*alert(curent_module);*/
                var row=y.insertRow(-1);
                var h2 = row.insertCell(0);
        //h1.colSpan = "3";
        // h2.style.color = "rgb(68,68,68)";
        // h2.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_DEPOSIT_FLAG_C') + " :&nbsp;</span>";
        // h2.innerHTML +='<input value="1" id="service_deposit_flag_c' + prodln + '" size="30" maxlength="255"  name="service_deposit_flag_c[' + prodln + ']" type="checkbox">';
        h2.innerHTML="<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_DEPOSIT_FLAG_C')+": </label>"+
        '<input value="1" class="date_input" id="service_deposit_flag_c' + servln + '" size="30" maxlength="255"  name="service_deposit_flag_c[' + servln + ']" type="checkbox">'+
        "</div></div>";


        var j = row.insertCell(1);
        //i.colSpan = "2";
        // j.style.color = "rgb(68,68,68)";
        // j.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_PREPAY_FLAG_C') + " :&nbsp;</span>";
        // j.innerHTML += '<input value="1" id="service_prepay_flag_c' + prodln + '" size="30" maxlength="255"  name="service_prepay_flag_c[' + prodln + ']" type="checkbox">&nbsp;&nbsp;';
        j.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;height:35px;'><div style='width:400px;height:30px;margin:8px auto;'>"+
        "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PREPAY_FLAG_C')+": </label>"+
        '<input  value="1" class="date_input" id="service_prepay_flag_c' + servln + '" size="30" maxlength="255"  name="service_prepay_flag_c[' + servln + ']" type="checkbox">'+
        "</div></div>";

         var row2=y.insertRow(-1);
        var h1 = row2.insertCell(0);
        // h1.colSpan = "4";
        // h1.style.color = "rgb(68,68,68)";
        // h1.innerHTML = "<span style='vertical-align: top;'>" + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION') + " :&nbsp;&nbsp;</span>";
        // h1.innerHTML += "<textarea tabindex='116' name='service_item_description[" + prodln + "]' id='service_item_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";
        h1.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;'><div style='width:400px;margin:8px auto;'>"+
         "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE')+": </label>"+
         '<textarea tabindex="116" id="service_item_description' + servln + '"  style="padding-top:0px" name="service_item_description[' + servln + ']" rows="2" cols="19" ></textarea>'+
         "</div></div>";

        var i = row2.insertCell(1);
        // i.colSpan = "3";
        // i.style.color = "rgb(68,68,68)";
        // i.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE') + " :&nbsp;</span>";
        // i.innerHTML += "<textarea tabindex='116' name='service_description[" + prodln + "]' id='service_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";
        i.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;'><div style='width:400px;margin:8px auto;'>"+
         "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION')+": </label>"+
         '<textarea tabindex="116" id="service_description' + servln + '"  style="padding-top:0px" name="service_description[' + servln + ']" rows="2" cols="19" ></textarea>'+
         "</div></div>";
    }
    else{
        var row=y.insertRow(-1);
        var h1 = row.insertCell(0);
        //h1.colSpan = "3";
        // h1.style.color = "rgb(68,68,68)";
        // h1.innerHTML = "<span style='vertical-align: top;'>" + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION') + " :&nbsp;&nbsp;</span>";
        // h1.innerHTML += "<textarea tabindex='116' name='servicet_item_description[" + prodln + "]' id='service_item_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";
        h1.innerHTML ="<div padding='5px 50px 5px 30px' style='width:480px;'><div style='width:400px;margin:8px auto;'>"+
         "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE')+": </label>"+
         '<textarea tabindex="116" id="service_item_description' + servln + '"  style="padding-top:0px" name="service_item_description[' + servln + ']" rows="2" cols="19" ></textarea>'+
         "</div></div>";

        var i = row.insertCell(1);
        //i.colSpan = "2";
        // i.style.color = "rgb(68,68,68)";
        // i.innerHTML = "<span style='vertical-align: top;'>"  + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE') + " :&nbsp;</span>";
        // i.innerHTML += "<textarea tabindex='116' name='service_description[" + prodln + "]' id='service_description" + prodln + "' rows='2' cols='23'></textarea>&nbsp;&nbsp;";
         i.innerHTML = "<div padding='5px 50px 5px 30px' style='width:480px;'><div style='width:400px;margin:8px auto;'>"+
         "<label style='width:85px;font-size:16px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION')+": </label>"+
         '<textarea tabindex="116" id="service_description' + servln + '"  style="padding-top:0px" name="service_description[' + servln + ']" rows="2" cols="19" ></textarea>'+
         "</div></div>";
    }
    //End modefy 20161022增加结算周期和日期


    // f.innerHTML += "<input type='hidden' name='service_deleted[" + servln + "]' id='service_deleted" + servln + "' value='0'><input type='hidden' name='service_id[" + servln + "]' id='service_id" + servln + "' value=''><button type='button' class='button' id='service_delete_line" + servln + "' value='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "' tabindex='116' onclick='markLineDeleted(" + servln + ",\"service_\")'><img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button><br>";
    // f.innerHTML +="<input type='hidden' name='service_haos_revenues_quotes_id_c[" + servln + "]' id='service_haos_revenues_quotes_id_c" + servln + "' value=''>";
    var y_btn = document.createElement("tbody");
    document.getElementById("x_line_service_table" + servln).appendChild(y_btn);

    var y_btn_line=y_btn.insertRow(-1);
    var y_btn_line_cell = y_btn_line.insertCell(0);
    y_btn_line_cell.colSpan = '4';
    y_btn_line_cell.innerHTML += "<button type='button' id='btn_ServiceLineEditorClose" + prodln + "' class='button btn_save' value='" + SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE') + "' tabindex='116' onclick='ServiceLineEditorClose(" + servln + ")'>"+SUGAR.language.get('app_strings', 'LBL_SAVE_BUTTON_LABEL')+" & "+SUGAR.language.get('app_strings', 'LBL_CLOSEINLINE')+" <img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button>";
    y_btn_line_cell.innerHTML +="<input type='hidden' name='service_deleted[" + servln + "]' id='service_deleted" + servln + "' value='0'><input type='hidden' name='service_id[" + servln + "]' id='service_id" + servln + "' value=''><button type='button' class='button' id='service_delete_line" + servln + "' value='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "' tabindex='116' onclick='markLineDeleted(" + servln + ",\"service_\")'><img src='themes/default/images/id-ff-clear.png' alt='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "'></button><br>";
    y_btn_line_cell.innerHTML +="<input type='hidden' name='service_haos_revenues_quotes_id_c[" + servln + "]' id='service_haos_revenues_quotes_id_c" + servln + "' value=''>";
        //addToValidate('EditView','product_product_id'+prodln,'id',true,"Please choose a product");

    renderServiceLine(servln);


    //setServiceSettlementPeriodChange($("#service_settlement_period_c"+servln).find("option:selected").val(),servln);
    CalendarShow();
    servln++;

    return servln - 1;
}

function renderServiceLine(ln) { //将编辑器中的内容显示于正常行中
 
 $("#displayed_service_name"+ln).html($("#service_name"+ln).val());
 $("#displayed_service_product_list_price"+ln).html($("#service_product_list_price"+ln).val());
 var discount_type = '';
 if($("#service_discount"+ln).find("option:selected").val()=='Percentage'){
    discount_type='%';
}else{
   discount_type='';
}
$("#displayed_service_discount"+ln).html($("#service_product_discount"+ln).val()+discount_type);
$("#displayed_service_product_unit_price"+ln).html($("#service_product_unit_price"+ln).val());
$("#displayed_service_vat_amt"+ln).html($("#service_vat_amt"+ln).val());
$("#displayed_service_product_total_price"+ln).html($("#service_product_total_price"+ln).val());

$("#displayed_service_item_description"+ln).html($("#service_item_description"+ln).val());
$("#displayed_service_description"+ln).html($("#service_description"+ln).val());

  
var curent_module=GetUrlParamString("module");

if(curent_module=='AOS_Contracts'){
    renderServiceMoreInfoLine(ln);
    var flag=$("#service_prepay_flag_c"+ln).is(':checked')?"是":"否";
  $("#displayed_service_prepay_flag_c"+ln).html(flag);

  var flag=$("#service_deposit_flag_c"+ln).is(':checked')?"是":"否";
  $("#displayed_service_deposit_flag_c"+ln).html(flag);
}else if(curent_module=='AOS_Invoices'){

  var flag=$("#service_prepay_flag_c"+ln).is(':checked')?"是":"否";
  $("#displayed_service_prepay_flag_c"+ln).html(flag);

  var flag=$("#service_deposit_flag_c"+ln).is(':checked')?"是":"否";
  $("#displayed_service_deposit_flag_c"+ln).html(flag);
}

 //  var flag=$("#line_enabled_flag"+ln).is(':checked')?"是":"否";
 //  $("#line_enabled_flag"+ln).val($("#line_enabled_flag"+ln).is(':checked')?"1":"0");
 //  $("#displayed_line_enabled_flag"+ln).html(flag);
 // //$("#displayed_line_enabled_flag"+ln).html($("#line_enabled_flag"+ln).val());
 //  $("#displayed_line_description"+ln).html($("#line_description"+ln).val());
}
function renderServiceMoreInfoLine(ln) { //将编辑器中的内容显示于正常行中

  $("#displayed_service_settlement_period_c"+ln).html($("#service_settlement_period_c"+ln).val());
  $("#displayed_service_initial_account_day_c"+ln).html($("#service_initial_account_day_c"+ln).val());
  $("#displayed_service_effective_start_c"+ln).html($("#service_effective_start_c"+ln).val());
  $("#displayed_service_next_account_day_c"+ln).html($("#service_next_account_day_c"+ln).val());
  $("#displayed_service_effective_end_c"+ln).html($("#service_effective_end_c"+ln).val());
  $("#displayed_service_final_account_day_c"+ln).html($("#service_final_account_day_c"+ln).val());
  
  $("#displayed_service_settlement_period_c"+ln).html($("#service_settlement_period_c"+ln).find('option:selected').text());
  $("#displayed_service_number_of_periods_c"+ln).html($("#service_number_of_periods_c"+ln).find("option:selected").text());
  
 //  var flag=$("#line_enabled_flag"+ln).is(':checked')?"是":"否";
 //  $("#line_enabled_flag"+ln).val($("#line_enabled_flag"+ln).is(':checked')?"1":"0");
 //  $("#displayed_line_enabled_flag"+ln).html(flag);
 // //$("#displayed_line_enabled_flag"+ln).html($("#line_enabled_flag"+ln).val());
 //  $("#displayed_line_description"+ln).html($("#line_description"+ln).val());
}

function ServiceLineEditorShow(ln){ //显示行编辑器（先自动关闭所有的行编辑器，再打开当前行）
  //validateRequired(ln);
  if (prodln>1) {
    for (var i=0;i<prodln;i++) {
      ServiceLineEditorClose(i);
  }
}
$("#Service_line1_displayed"+ln).hide();
$("#x_service_line_edit"+ln).show();

$("#Service_line2_displayed"+ln).hide();
changeAttr($('#line_show_more_service_btn'+ln),"hide");

}

function ServiceLineEditorClose(ln) {//关闭行编辑器（显示为正常行）
  //if (check_form('EditView')) {
    $("#x_service_line_edit"+ln).hide();
    $("#Service_line1_displayed"+ln).show();
    renderServiceLine(ln);
    //resetLineNum_Bold();
  //}
  $("#Service_line2_displayed"+ln).hide();
  changeAttr($('#line_show_more_service_btn'+ln),"hide");
}


function addServiceLine(tableid, groupid){
    insertServiceLine(tableid, groupid)//加入新行
    ServiceLineEditorShow(servln - 1);  
}

/**
 * Insert product Header
 */

 function insertProductHeader(tableid){
    var curent_module=GetUrlParamString("module");
    tablehead = document.createElement("thead");
    tablehead.id = tableid +"_head";
    tablehead.style.display="none";
    tablehead.style.backgroundColor='#aaa';
    tablehead.style.fontSize = '16px';
    document.getElementById(tableid).appendChild(tablehead);

    var x=tablehead.insertRow(-1);
    x.id='product_head';
     if (curent_module=='AOS_Contracts') {
     var a=x.insertCell(0);
    a.style.color="rgb(68,68,68)";
    a.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NAME');


    var b=x.insertCell(1);
    //b1.colSpan = "2";   ？
    b.style.color="rgb(68,68,68)";
    b.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_QUANITY');

    var c=x.insertCell(2);
    c.style.color="rgb(68,68,68)";
    c.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_LIST_PRICE');

     var d=x.insertCell(3);
    d.style.color="rgb(68,68,68)";
    d.innerHTML='计价方式';
    //d.innerHTML=SUGAR.language.get(module_sugar_grp1, '计价方式');

    var e=x.insertCell(4);
    //b1.colSpan = "2";   ？
    e.style.color="rgb(68,68,68)";
    e.innerHTML='期数';
    //e.innerHTML=SUGAR.language.get(module_sugar_grp1, '期数');

    var f=x.insertCell(5);
    f.style.color="rgb(68,68,68)";
    f.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_NEXT_ACCOUNT_DAY');

     var f=x.insertCell(6);
    f.style.color="rgb(68,68,68)";
    f.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_FINAL_ACCOUNT_DAY');

   
        
        var h=x.insertCell(7);
        h.style.color="rgb(68,68,68)";
        h.innerHTML='更多';

        var k=x.insertCell(8);
        k.style.color="rgb(68,68,68)";
        k.innerHTML='&nbsp;';
    }else if(curent_module=='AOS_Invoices'){
    var b=x.insertCell(0);
    b.style.color="rgb(68,68,68)";
    b.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NAME');

    var b1=x.insertCell(1);
    //b1.colSpan = "2";   ？
    b1.style.color="rgb(68,68,68)";
    b1.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PART_NUMBER');

    var a=x.insertCell(2);
    a.style.color="rgb(68,68,68)";
    a.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_QUANITY');

   
    // var a2=x.insertCell(4);
    // a2.style.color="rgb(68,68,68)";
    // a2.innerHTML="";

    var c=x.insertCell(3);
    c.style.color="rgb(68,68,68)";
    c.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_LIST_PRICE');

    var d=x.insertCell(4);
    d.style.color="rgb(68,68,68)";
    d.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_DISCOUNT_AMT');

    var e=x.insertCell(5);
    e.style.color="rgb(68,68,68)";
    e.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_UNIT_PRICE');

    var f=x.insertCell(6);
    f.style.color="rgb(68,68,68)";
    f.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_VAT_AMT');

    var g=x.insertCell(7);
    g.style.color="rgb(68,68,68)";
    g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_TOTAL_PRICE');

    var g=x.insertCell(8);
    g.style.color="rgb(68,68,68)";
    g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PREPAY_FLAG_C');

    var g=x.insertCell(9);
    g.style.color="rgb(68,68,68)";
    g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_DEPOSIT_FLAG_C');

    var g=x.insertCell(10);
    g.style.color="rgb(68,68,68)";
    g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE');

    var g=x.insertCell(11);
    g.style.color="rgb(68,68,68)";
    g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION');
   
    var i=x.insertCell(12);
    i.style.color="rgb(68,68,68)";
    //i.innerHTML='更多';

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
     var k=x.insertCell(13);
     k.style.color="rgb(68,68,68)";
     k.innerHTML='&nbsp;';
   //}
    }else{
         var b=x.insertCell(0);
    b.style.color="rgb(68,68,68)";
    b.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NAME');

    var b1=x.insertCell(1);
    //b1.colSpan = "2";   ？
    b1.style.color="rgb(68,68,68)";
    b1.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PART_NUMBER');

    var a=x.insertCell(2);
    a.style.color="rgb(68,68,68)";
    a.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_QUANITY');

   
    // var a2=x.insertCell(4);
    // a2.style.color="rgb(68,68,68)";
    // a2.innerHTML="";

    var c=x.insertCell(3);
    c.style.color="rgb(68,68,68)";
    c.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_LIST_PRICE');

    var d=x.insertCell(4);
    d.style.color="rgb(68,68,68)";
    d.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_DISCOUNT_AMT');

    var e=x.insertCell(5);
    e.style.color="rgb(68,68,68)";
    e.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_UNIT_PRICE');

    var f=x.insertCell(6);
    f.style.color="rgb(68,68,68)";
    f.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_VAT_AMT');

    var g=x.insertCell(7);
    g.style.color="rgb(68,68,68)";
    g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_TOTAL_PRICE');


    var g=x.insertCell(8);
    g.style.color="rgb(68,68,68)";
    g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE');

    var g=x.insertCell(9);
    g.style.color="rgb(68,68,68)";
    g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION');
   
    var i=x.insertCell(10);
    i.style.color="rgb(68,68,68)";
   
     var k=x.insertCell(11);
     k.style.color="rgb(68,68,68)";
     k.innerHTML='&nbsp;';
    }
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
    tablehead.style.backgroundColor='#aaa';
    tablehead.style.fontSize = '16px';
    document.getElementById(tableid).appendChild(tablehead);

    var x=tablehead.insertRow(-1);

    x.id='service_head';
     if (curent_module=='AOS_Contracts') {
         var a=x.insertCell(0);
    a.style.color="rgb(68,68,68)";
    a.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_NAME');


    var b=x.insertCell(1);
    //b1.colSpan = "2";   ？
    b.style.color="rgb(68,68,68)";
    b.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_LIST_PRICE');


     var d=x.insertCell(2);
    d.style.color="rgb(68,68,68)";
    d.innerHTML='计价方式';
    //d.innerHTML=SUGAR.language.get(module_sugar_grp1, '计价方式');

    var e=x.insertCell(3);
    //b1.colSpan = "2";   ？
    e.style.color="rgb(68,68,68)";
    e.innerHTML='期数';
    //e.innerHTML=SUGAR.language.get(module_sugar_grp1, '期数');

    var f=x.insertCell(4);
    f.style.color="rgb(68,68,68)";
    f.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_NEXT_ACCOUNT_DAY');

     var f=x.insertCell(5);
    f.style.color="rgb(68,68,68)";
    f.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_FINAL_ACCOUNT_DAY');

        var h=x.insertCell(6);
        h.style.color="rgb(68,68,68)";
        h.innerHTML='更多';

       var g=x.insertCell(7);
       g.style.color="rgb(68,68,68)";
       g.innerHTML='&nbsp;'; 
    }else if(curent_module=='AOS_Invoices'){
        var a=x.insertCell(0);
    //a.colSpan = "4";
    a.style.color="rgb(68,68,68)";
    a.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_NAME');

    // var a2=x.insertCell(1);
    // a2.style.color="rgb(68,68,68)";
    // a2.innerHTML="";

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

   var g=x.insertCell(6);
    g.style.color="rgb(68,68,68)";
    g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PREPAY_FLAG_C');

    var g=x.insertCell(7);
    g.style.color="rgb(68,68,68)";
    g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_DEPOSIT_FLAG_C');

    var g=x.insertCell(8);
    g.style.color="rgb(68,68,68)";
    g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE');

    var g=x.insertCell(9);
    g.style.color="rgb(68,68,68)";
    g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION');

    var i=x.insertCell(10);
    i.style.color="rgb(68,68,68)";
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
         var g=x.insertCell(11);
         g.style.color="rgb(68,68,68)";
         g.innerHTML='&nbsp;'; 
   }else{
    var a=x.insertCell(0);
    //a.colSpan = "4";
    a.style.color="rgb(68,68,68)";
    a.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_NAME');

    // var a2=x.insertCell(1);
    // a2.style.color="rgb(68,68,68)";
    // a2.innerHTML="";

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


    var g=x.insertCell(6);
    g.style.color="rgb(68,68,68)";
    g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE');

    var g=x.insertCell(7);
    g.style.color="rgb(68,68,68)";
    g.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION');

    var i=x.insertCell(8);
    i.style.color="rgb(68,68,68)";
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
         var g=x.insertCell(9);
         g.style.color="rgb(68,68,68)";
         g.innerHTML='&nbsp;'; 
   }
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
    //tableBody.style.width = '800px';
    //tableBody.style.align="center";// =------
    document.getElementById('lineItems').appendChild(tableBody);

    var a=tableBody.insertCell(0);
    a.colSpan="100";
    var table = document.createElement("table");
    table.id = "group"+groupn;
    if(enable_groups){
        table.style.border = '1px grey solid';
        table.style.borderRadius = '4px';
        table.border="1";
        //table.width='900px';
    }
    table.style.whiteSpace = 'nowrap';

    table.width = '1200px';
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
    footer_cell.colSpan="4";
   // footer_cell.innerHTML="<input type='button' tabindex='116' class='button' value='"+SUGAR.language.get(module_sugar_grp1, 'LBL_ADD_PRODUCT_LINE')+"' id='"+productTable.id+"addProductLine' onclick='insertProductLine(\""+productTable.id+"\",\""+groupn+"\")' />";
   footer_cell.innerHTML="<input type='button' tabindex='116' class='button' value='"+SUGAR.language.get(module_sugar_grp1, 'LBL_ADD_PRODUCT_LINE')+"' id='"+productTable.id+"addProductLine' onclick='addProductLine(\""+productTable.id+"\",\""+groupn+"\")' />";
   //footer_cell.innerHTML+=" <input type='button' tabindex='116' class='button' value='"+SUGAR.language.get(module_sugar_grp1, 'LBL_ADD_SERVICE_LINE')+"' id='"+serviceTable.id+"addServiceLine' onclick='insertServiceLine(\""+serviceTable.id+"\",\""+groupn+"\")' />";
   footer_cell.innerHTML+=" <input type='button' tabindex='116' class='button' value='"+SUGAR.language.get(module_sugar_grp1, 'LBL_ADD_SERVICE_LINE')+"' id='"+serviceTable.id+"addServiceLine' onclick='addServiceLine(\""+serviceTable.id+"\",\""+groupn+"\")' />";
   if(enable_groups){
       footer_cell.innerHTML+="<span id='span_total_amt' style='float:right;display:none'><span><label style='width:70px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_TOTAL_AMT')+":&nbsp;&nbsp;</label><input name='group_total_amt[]' id='"+ table.id +"total_amt' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly>";
       footer_cell.innerHTML+="</span></span>";

       var footer_row2=tablefooter.insertRow(-1);
       footer_row2.style='display:none';
       var footer_cell2 = footer_row2.insertCell(0);
       footer_cell2.scope="row";
       footer_cell2.colSpan="8";
       footer_cell2.id='footer_cell2';
       //footer_cell2.style='display:none';
       footer_cell2.innerHTML="<span style='float: right;'><div><label style='width:70px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_DISCOUNT_AMOUNT')+":&nbsp;&nbsp;</label><input name='group_discount_amount[]' id='"+ table.id +"discount_amount' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></div></span>";

       var footer_row3=tablefooter.insertRow(-1);
       footer_row3.style='display:none';
       var footer_cell3 = footer_row3.insertCell(0);
       footer_cell3.scope="row";
       footer_cell3.colSpan="8";
       footer_cell3.id='footer_cell3';
       //footer_cell3.style='display:none';
       footer_cell3.innerHTML="<span style='float: right;'><div><label style='width:70px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_SUBTOTAL_AMOUNT')+":&nbsp;&nbsp;</label><input name='group_subtotal_amount[]' id='"+ table.id +"subtotal_amount' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></div></span>";

       var footer_row4=tablefooter.insertRow(-1);
       footer_row4.style='display:none';
       var footer_cell4 = footer_row4.insertCell(0);
       footer_cell4.scope="row";
       footer_cell4.colSpan="8";
       footer_cell4.id='footer_cell4';
       //footer_cell4.style='display:none';
       footer_cell4.innerHTML="<span style='float: right;'><div><label style='width:70px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_TAX_AMOUNT')+":&nbsp;&nbsp;</label><input name='group_tax_amount[]' id='"+ table.id +"tax_amount' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></div></span>";

       if(document.getElementById('subtotal_tax_amount') !== null){
        var footer_row5=tablefooter.insertRow(-1);
        footer_row5.style='display:none';
        var footer_cell5 = footer_row5.insertCell(0);
        footer_cell5.scope="row";
        footer_cell5.colSpan="8";
        footer_cell5.id='footer_cell5';
        //footer_cell5.style='display:none';
        footer_cell5.innerHTML="<span style='float: right;'><div><label style='width:70px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_SUBTOTAL_TAX_AMOUNT')+":&nbsp;&nbsp;</label><input name='group_subtotal_tax_amount[]' id='"+ table.id +"subtotal_tax_amount' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly></div></span>";

        if (typeof currencyFields !== 'undefined'){
            currencyFields.push("" + table.id+ 'subtotal_tax_amount');
        }
    }

    var footer_row6=tablefooter.insertRow(-1);
    var footer_cell6 = footer_row6.insertCell(0);
    footer_cell6.scope="row";
    footer_cell6.colSpan="8";
    footer_cell6.id='footer_cell6';

    footer_cell6.innerHTML="<span style='float: right;'><div><label style='width:70px;'>"+SUGAR.language.get(module_sugar_grp1, 'LBL_GROUP_TOTAL')+":&nbsp;&nbsp;</label><input name='group_total_amount[]' id='"+ table.id +"total_amount' size='21' maxlength='26' value='' title='' tabindex='120' type='text' readonly>";
    footer_cell6.innerHTML+="<a style='float:right' title='更多' onclick='show_more_total_info(this,\"group"+groupn+"\")' href='javascript:;'><i class='glyphicon glyphicon-plus'></i></a>";
    footer_cell6.innerHTML+="</div></span>";

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

function show_more_total_info(btn,tableid){//编辑模式下的显示隐藏product
 if($("#"+tableid+"total_amt").parent().parent().css("display")=="none"){
    
    $("#"+tableid+"discount_amount").parent().parent().parent().parent().show();
    $("#"+tableid+"total_amt").parent().parent().show();
    $("#"+tableid+"subtotal_amount").parent().parent().parent().parent().show();
    $("#"+tableid+"tax_amount").parent().parent().parent().parent().show();
    if($("#"+tableid+"subtotal_tax_amount")){
        $("#"+tableid+"subtotal_tax_amount").parent().parent().parent().parent().show();
    }
   //$("#span_total_amt").show();
   changeAttr(btn,"show");
}else{
   $("#"+tableid+"discount_amount").parent().parent().parent().parent().hide();
   $("#"+tableid+"total_amt").parent().parent().hide();
   $("#"+tableid+"subtotal_amount").parent().parent().parent().parent().hide();
   $("#"+tableid+"tax_amount").parent().parent().parent().parent().hide();
  if($("#"+tableid+"subtotal_tax_amount")){
        $("#"+tableid+"subtotal_tax_amount").parent().parent().parent().parent().hide();
    }
   //$("#span_total_amt").hide();   
   changeAttr(btn,"hide");
}

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
        if(row[i].id.indexOf('x_line') == -1){
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
         // console.log('qty:'+qty);
         // console.log('list:'+list);   
         // console.log('deleted:'+deleted);
         // console.log('unit:'+unit);
         // console.log('tot_amt:'+tot_amt);

        if (dis_amt !== 0 && deleted != 1) {
            dis_tot += dis_amt * qty * periods;
        }
        if (product_vat_amt !== 0 && deleted != 1) {
            tax += product_vat_amt * periods;
        }
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

 renderProductLine(prodlns);//正常行赋值
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

renderServiceLine(servln);
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

function line_show_more_product(btn,num){//编辑模式下的显示隐藏product
    if($("#Product_line2_displayed"+num).css("display")=="none"){
        $("#Product_line2_displayed"+num).show();
        changeAttr(btn,"show");
    }else{
        $("#Product_line2_displayed"+num).hide();
        changeAttr(btn,"hide");
    }
}

function edit_show_more_service(btn,num){//编辑模式下的显示隐藏service
    if($("#service_line"+num).css("display")=="none"){
       $("#service_line"+num).show();
       $("#service_line"+num).next().show();
       changeAttr(btn,"show");
   }else{
    $("#service_line"+num).hide();
    $("#service_line"+num).next().hide();
    changeAttr(btn,"hide");
}
}

function line_show_more_service(btn,num){//行模式下的显示隐藏service
    if($("#Service_line2_displayed"+num).css("display")=="none"){
       $("#Service_line2_displayed"+num).show();
       changeAttr(btn,"show");
   }else{
       $("#Service_line2_displayed"+num).hide();
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

$(function(){
    if($("#edit_button").length>0){//判断是否在Detail中
        $("#LBL_LINE_ITEMS>tbody>tr>td").removeAttr("colspan");//清除colsan,因为只有两列
        $("#LBL_LINE_ITEMS>tbody>tr:lt(3)>td:eq(1)").attr("width","87.5%");//第一列已经是12.5%，只需设置第二列
        $("#LBL_LINE_ITEMS>tbody>tr>td").removeAttr("width");//行宽，无用设置，移除
        $("#LBL_LINE_ITEMS>tbody>tr:eq(7)>td:gt(1)").remove();
    }
});