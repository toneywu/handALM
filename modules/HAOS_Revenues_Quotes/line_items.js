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
 var groupn = 0;
 var tableid="lineItems";

 /**
 * Load Line Items
 */

 function insertLineItems(product){
    $('#line_items_label').hide();
    var type = 'product_';
    var ln = 0;
    var gid = product.group_id;
    //if(product.product_id != '0' && product.product_id !== ''){
        ln = insertProductLine();
        type = 'product_';
    //} 

    for(var p in product){
        if(document.getElementById(type + p + ln) !== null){
            if(product[p] !== '' && isNumeric(product[p]) && p != 'vat'  && p != 'product_id' && p != 'name' && p != "part_number" &&p!='id'){
                document.getElementById(type + p + ln).value = format2Number(product[p]);
            } else {
                document.getElementById(type + p + ln).value = product[p];
            }
        }
    }
     setLineTypeCtrl(document.getElementById("product_line_item_type_c"+ln),ln);

}


/**
 * Insert product line
 */

 function insertProductLine() {

    var line_item_type_hidden = document.getElementById("lineitemtypehidden").value;

    var vat_hidden = document.getElementById("vathidden").value;
    var discount_hidden = document.getElementById("discounthidden").value;

    tablebody = document.createElement("tbody");
    document.getElementById(tableid).appendChild(tablebody);


    var x = tablebody.insertRow(-1);

    var a = x.insertCell(0);
    a.width ="12.5%";
    a.id="product_line_item_type_c_label"+prodln;
    a.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_LINE_ITEM_TYPE')+"<span class='required'>&nbsp*</span>";

    var b =x.insertCell(1);
    b.width="37.5%";
    b.innerHTML ="<select id='product_line_item_type_c" + prodln + "' onchange='setLineTypeCtrl(this,"+prodln+");document.getElementById(\"product_name0\").value=\"\";' name='product_line_item_type_c[" + prodln + "]'>"+line_item_type_hidden+"</select>";

    var g = x.insertCell(2);
    g.width="12.5%";
    g.id="product_product_qty_label"+prodln;
    g.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_QTY');

    var h = x.insertCell(3);
    h.width ="37.5%";
    h.innerHTML ="<input type='text' name='product_product_qty[" + prodln + "]' id='product_product_qty" + prodln + "' size='30' maxlength='255' value='' title='' tabindex='116'/>";

   /* sqs_objects["product_name[" + prodln + "]"] = {
        "form": "EditView",
        "method": "query",
        "modules": ["AOS_Products"],
        "group": "or",
        "field_list": ["name", "id","part_number", "cost", "price","description","currency_id"],
        "populate_list": ["product_name[" + prodln + "]", "product_product_id[" + prodln + "]", "product_part_number[" + prodln + "]", "product_product_cost_price[" + prodln + "]", "product_product_list_price[" + prodln + "]", "product_item_description[" + prodln + "]", "product_currency[" + prodln + "]"],
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
    };*/
    sqs_objects["product_part_number[" + prodln + "]"] = {
        "form": "EditView",
        "method": "query",
        "modules": ["AOS_Products"],
        "group": "or",
        "field_list": ["part_number", "name", "id","cost", "price","description","currency_id"],
        "populate_list": ["product_part_number[" + prodln + "]", "product_name[" + prodln + "]", "product_product_id[" + prodln + "]",  "product_product_cost_price[" + prodln + "]", "product_product_list_price[" + prodln + "]", "product_item_description[" + prodln + "]", "product_currency[" + prodln + "]"],
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

    var y = tablebody.insertRow(-1);

    var c = y.insertCell(0);
    c.id="product_name_label"+prodln;
    c.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NAME')+"<span class='required'>&nbsp*</span>";

    var c1 = y.insertCell(1);
    c1.innerHTML = "<input style='width:178px;'  type='text' name='product_name[" + prodln + "]' id='product_name" + prodln + "' maxlength='50' value='' title='' tabindex='116' value=''><input type='hidden' name='product_product_id[" + prodln + "]' id='product_product_id" + prodln + "' size='20' maxlength='50' value=''>";


    var d = y.insertCell(2);
    d.width="12.5%";
    d.id="product_part_number_label"+prodln;
    d.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_PART_NUMBER');

    

    var e = y.insertCell(3);
    e.width ="37.5%";
    e.innerHTML ="<input type='text' class='sqsEnabled' autocomplete='off' name='product_part_number[" + prodln + "]' id='product_part_number" + prodln + "' size='30' maxlength='255' value='' title='' tabindex='116'/>"+
    "<button id='part_number_select_btn" + prodln +"'title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openProductPopup(" + prodln + ");'><img src='themes/default/images/id-ff-select.png' alt='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "'></button>";



    var z = tablebody.insertRow(-1);
    var i = z.insertCell(0);
    i.id="product_product_list_price_label"+prodln;
    i.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_LIST_PRICE')+"<span class='required'>&nbsp*</span>";

    var j = z.insertCell(1);
    j.innerHTML = "<input style='text-align: right; width:115px;' type='text' name='product_product_list_price[" + prodln + "]' id='product_product_list_price" + prodln + "' size='11' maxlength='50' value='' title='' tabindex='116' onblur='calculateLine(" + prodln + ",\"product_\");'><input type='hidden' name='product_product_cost_price[" + prodln + "]' id='product_product_cost_price" + prodln + "' value=''  />";

    if (typeof currencyFields !== 'undefined'){

        currencyFields.push("product_product_list_price" + prodln);
        currencyFields.push("product_product_cost_price" + prodln);

    }

    var k = z.insertCell(2);
    k.width="12.5%";
    k.id="product_discount_label"+prodln;
    k.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DISCOUNT');

    var l = z.insertCell(3);
    l.width ="37.5%";
    l.innerHTML = "<input type='text' style='text-align: right; width:90px;' name='product_product_discount[" + prodln + "]' id='product_product_discount" + prodln + "' size='12' maxlength='50' value='' title='' tabindex='116' onblur='calculateLine(" + prodln + ",\"product_\");' onblur='calculateLine(" + prodln + ",\"product_\");'><input type='hidden' name='product_product_discount_amount[" + prodln + "]' id='product_product_discount_amount" + prodln + "' value=''  />";
    l.innerHTML += "<select tabindex='116' name='product_discount[" + prodln + "]' id='product_discount" + prodln + "' onchange='calculateLine(" + prodln + ",\"product_\");'>" + discount_hidden + "</select>";

    var z1 = tablebody.insertRow(-1);
    var m = z1.insertCell(0);
    m.id="product_product_unit_price_label"+prodln;
    m.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_UNIT_PRICE')+"<span class='required'>&nbsp*</span>";

    var n = z1.insertCell(1);
    n.innerHTML = "<input type='text' style='text-align: right; width:115px;' name='product_product_unit_price[" + prodln + "]' id='product_product_unit_price" + prodln + "' size='11' maxlength='50' value='' title='' tabindex='116' readonly='readonly' onblur='calculateLine(" + prodln + ",\"product_\");' onblur='calculateLine(" + prodln + ",\"product_\");'>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("product_product_unit_price" + prodln);
    }

    var o = z1.insertCell(2);
    o.width="12.5%";
    o.id="product_vat_label"+prodln;
    o.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_VAT_AMT');

    var o1 = z1.insertCell(3);
    o1.width ="37.5%";
    o1.innerHTML = "<input type='text' style='text-align: right; width:90px;' name='product_vat_amt[" + prodln + "]' id='product_vat_amt" + prodln + "' size='11' maxlength='250' value='' title='' tabindex='116' readonly='readonly'>";
    o1.innerHTML += "<select tabindex='116' name='product_vat[" + prodln + "]' id='product_vat" + prodln + "' onchange='calculateLine(" + prodln + ",\"product_\");'>" + vat_hidden + "</select>";
    var z2 = tablebody.insertRow(-1);
    var p = z2.insertCell(0);
    p.id="product_product_total_price_label"+prodln;
    p.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_TOTAL_PRICE')+"<span class='required'>&nbsp*</span>";

    var p1 = z2.insertCell(1);
    p1.innerHTML = "<input type='text' style='text-align: right; width:115px;' name='product_product_total_price[" + prodln + "]' id='product_product_total_price" + prodln + "' size='11' maxlength='50' value='' title='' tabindex='116' readonly='readonly'><input type='hidden' name='product_group_number[" + prodln + "]' id='product_group_number" + prodln + "' value='0'>"+
    "<input type='hidden' name='product_currency[" + prodln + "]' id='product_currency" + prodln + "' value=''><input type='hidden' name='product_deleted[" + prodln + "]' id='product_deleted" + prodln + "' value='0'><input type='hidden' name='product_id[" + prodln + "]' id='product_id" + prodln + "' value=''>";

    if (typeof currencyFields !== 'undefined'){
        currencyFields.push("product_product_total_price" + prodln);
    }

    addToValidate('EditView', 'product_line_item_type_c'+ prodln,'varchar', true,SUGAR.language.get(module_sugar_grp1, 'LBL_LINE_ITEM_TYPE'));
    addToValidate('EditView', 'product_name'+ prodln,'varchar', true,SUGAR.language.get(module_sugar_grp1, 'LBL_NAME'));
    addToValidate('EditView', 'product_product_list_price'+ prodln,'float', true,SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_LIST_PRICE'));
    addToValidate('EditView', 'product_product_unit_price'+ prodln,'float', true,SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_UNIT_PRICE'));

    prodln++;

    return prodln - 1;
}

function setLineTypeCtrl(field,ln){
    if (field.value=='Product'){
        $('#product_product_id'+ln).val("");
        $('#product_product_qty_label'+ln).html("数量");
        $('#product_product_qty'+ln).show();
        $('#product_part_number_label'+ln).html("物料编码");
        $('#part_number_select_btn'+ln).show();
        $('#product_part_number'+ln).show();
        addToValidate('EditView','product_product_id'+ln,'id',true,"Please choose a product");
        $('#product_name_label'+ln).html(SUGAR.language.get('HAOS_Revenues_Quotes', 'LBL_PRODUCT_NAME')+"<span class='required'>&nbsp*</span>");
        $('#product_product_list_price_label'+ln).html(SUGAR.language.get('HAOS_Revenues_Quotes', 'LBL_PRODUCT_LIST_PRICE')+"<span class='required'>&nbsp*</span>");
        $('#product_product_unit_price_label'+ln).html(SUGAR.language.get('HAOS_Revenues_Quotes', 'LBL_PRODUCT_UNIT_PRICE')+"<span class='required'>&nbsp*</span>"); 
   }else{
        $('#product_product_id'+ln).val("0");
        $('#product_product_qty'+ln).val("");
        $("#product_part_number_label"+ln).html("");
        $('#product_part_number'+ln).hide();
        $('#part_number_select_btn'+ln).hide();
        $('#part_number_label'+ln).hide();
        $('#product_product_qty'+ln).hide();
        $('#product_product_qty_label'+ln).html("");
        removeFromValidate('EditView','product_product_id'+ln);
        $('#product_name_label'+ln).html(SUGAR.language.get('HAOS_Revenues_Quotes', 'LBL_SERVICE_NAME')+"<span class='required'>&nbsp*</span>");   
        $('#product_product_list_price_label'+ln).html(SUGAR.language.get('HAOS_Revenues_Quotes', 'LBL_SERVICE_LIST_PRICE')+"<span class='required'>&nbsp*</span>");
        $('#product_product_unit_price_label'+ln).html(SUGAR.language.get('HAOS_Revenues_Quotes', 'LBL_SERVICE_PRICE')+"<span class='required'>&nbsp*</span>");
    }
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
            "currency_id" : "product_currency" + ln
        }
    };

    open_popup('AOS_Products', 800, 850, '', true, true, popupRequestData);

}

function setProductReturn(popupReplyData){
    set_return(popupReplyData);
    formatListPrice(lineno);
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

    var productTotalPrice = productQty * productUnitPrice;


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

/*function check_form(formname) {
    if (typeof(siw) != 'undefined' && siw && typeof(siw.selectingSomething) != 'undefined' && siw.selectingSomething) {
        return false;
    } else {
        var bool=false;
        if ($("#name_label0").has(".required")&&$("#product_name0").val()=="") {
            var html='<div class="required validation-message">缺少必填字段:产品</div>';
            $("#product_name0").parent().append(html);
            bool=true;
        }
        if ($("#list_price_label0").has(".required")&&$("#product_product_list_price0").val()=="") {
            var html='<div class="required validation-message">缺少必填字段:单价</div>';
            $("#product_product_list_price0").parent().append(html);
            bool=true;
        }
        if($("#unit_price_label0").has(".required")&&$("#product_product_unit_price0").val()==""){
            var html='<div class="required validation-message">缺少必填字段:实际单价</div>';
            $("#product_product_unit_price0").parent().append(html);
            bool=true;
        }
        if($("#total_price_label0").has(".required")&&$("#product_product_total_price0").val()==""){
            var html='<div class="required validation-message">缺少必填字段:单价</div>';
            $("#product_product_total_price0").parent().append(html);
            bool=true;
        }
        if (bool==true) {
            return false;
        }else{
            return validate_form(formname, '');
        }
    }
}*/