   function move_basic_to_top() {
        //将BASIC提前

        //如果有TAB页
        if ($("#tab-content-0").length>0) {
            basic_ojb = $("#tab-content-0 .detail-view-row .detail-view-row-item");
            basic_ojb.parent('.detail-view-row').hide();
        } else {
        //如果没有TAB页就把第1个Panel添加到最上方
            basic_ojb = $("#top-panel--1 .detail-view-row .detail-view-row-item");
            $(".panel-content").find('.panel').first().hide();
            $(".nav-tabs").hide();
        }

        $(".detail-view").prepend("<div id='header_content' class='row'></div>");
        basic_ojb.each(function(){
            if($(this).children().length>0) {
                //console.log($(this).children().length);
                $(this).switchClass("col-sm-6","col-sm-3");/*两排变四*/

                $(this).children(".label").removeClass("col-sm-4");
                $(this).children(".label").removeClass("col-sm-2");
                $(this).children(".label").addClass("col-sm-12");
                $(this).children(".detail-view-field").removeClass("col-sm-8");
                $(this).children(".detail-view-field").removeClass("col-sm-10");
                $(this).children(".detail-view-field").addClass("col-sm-12");

                $(this).appendTo($("#header_content"));
            }
        });
   }

    $(document).ready(function(){

        /*******************面板结构调整*************************/
        move_basic_to_top()
        /*******************面板细节优化*************************/

/*       $("#header_content .detail-view-row-item .label ").switchClass("col-sm-3","col-sm-12");
       $("#header_content .detail-view-row-item .detail-view-field ").switchClass("col-sm-4","col-sm-12");*/


        /*******************菜单调整*************************/
        //将非常用的按钮进行缩减
        var dropdown_html = '<div id="detailview_more_actions" class="dropdown" style="float:left">'
                            + '<button class="button dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'
                            + '<span class="caret"></span></button>'
                            + '<ul class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenu1">'
                            + '</ul></div>';

        $("#formDetailView .buttons").children(".button").last().after(dropdown_html);
        //将复制、删除、合并按钮转到下拉菜单中
        $("#duplicate_button").appendTo($("#detailview_more_actions .dropdown-menu"));
        $("#delete_button").appendTo($("#detailview_more_actions .dropdown-menu"));
        $("#merge_duplicate_button").appendTo($("#detailview_more_actions .dropdown-menu"));
        //将模块总体菜单显示到当前数据之后
        $(".panel-content .panel").appendTo($("#tab-content-0"));


        $("#content .moduleTitle").prepend("<div id='module_label'>"+$(".currentTab").text()+"<div/>");
        $("#content .moduleTitle").prepend("<div class='module_img'><img src='themes/MaterialDesignP/images/sub_panel/"+$(".currentTab a").attr("module")+".svg' onerror='this.src=\"themes/MaterialDesignP/images/sub_panel/basic.svg\"'><div/>");

        /*******************Subpanel调整*************************/
        var subpanel_obj = $(".subpanel-table");
/*        subpanel_obj.each(function(){
            var subpanel_header = $(this).children("thead");
            subpanel_header.children(".pagination").prependTo(subpanel_header);
        });
*/
    });