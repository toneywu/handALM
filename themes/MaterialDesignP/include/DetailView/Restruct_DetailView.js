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
            $(".detail-view .nav-tabs").hide();
        }

        $(".detail-view").prepend("<div id='header_content' class='row'></div>");
        basic_ojb.each(function(){
            if($(this).children().length>0) {
                //console.log($(this).children().length);
                /*两排变四*/
/*                $(this).switchClass("col-sm-6","col-sm-3");
                $(this).children(".label").removeClass("col-sm-4");
                $(this).children(".label").removeClass("col-sm-2");
                $(this).children(".label").addClass("col-sm-12");
                $(this).children(".detail-view-field").removeClass("col-sm-8");
                $(this).children(".detail-view-field").removeClass("col-sm-10");
                $(this).children(".detail-view-field").addClass("col-sm-12");
*/
                $(this).appendTo($("#header_content"));
            }
        });
   }

/******************************************************/
/* 标题加图标，加背景                                 */
/******************************************************/
   function renderHeader() {
        objModuleTitle=$("#content .moduleTitle");
        objContent = $("#content");
        //为标题加入模块的名称
        //objModuleTitle.prependTo(objHeader)
        //objHeader.prepend(objModuleTitle.html());
        //objModuleTitle.html("");
        objModuleTitle.prepend("<div id='module_label'>"+$(".currentTab").text()+"<div/>");
        //为标题加入图标
        objModuleTitle.prepend("<div class='module_img'><img src='themes/MaterialDesignP/images/sub_panel/"+$(".currentTab a").attr("module")+".svg' onerror='this.src=\"themes/MaterialDesignP/images/sub_panel/basic.svg\"'><div/>");
        objContent.prepend("<div class='moduleTitle'></div><div id='detailviewFixedHeader'></div>");
        objFixedHeader = objContent.children("#detailviewFixedHeader");
        $("#DetailViewBtnGroups").prependTo(objFixedHeader);
        objModuleTitle.prependTo(objFixedHeader)

   }

/******************************************************/
/* Subpanel调整                                       */
/******************************************************/
   function renderSubpanel() {
        var subpanel_obj = $(".subpanel-table");
        subpanel_obj.each(function(){
            var subpanel_header = $(this).children("thead");
            var objPagination = subpanel_header.children(".pagination").find("td[align='right']");

            //subpanel_header.children(".pagination").find(".action_buttons").appendTo( $(this).closest(".sub-panel").children("div").children("a").children("div:first"));
            //subpanel_header.children(".pagination").find(".action_buttons").appendTo( $(this).closest(".sub-panel").children("div:first"));
            //将分页由表头调整到下方。
            $(this).after("<div class='SubpanelFoot'>"+objPagination.html()+"</div>");
            objPagination.hide();

            //subpanel_header.children(".pagination").find("td[align='right']").appendTo(subpanel_footer);
        });
   }



    $(document).ready(function(){

        /*******************面板结构调整*************************/
        move_basic_to_top()
        /*******************面板细节优化*************************/

        /*******************菜单调整*************************/
        //将非常用的按钮进行缩减
        var dropdown_html = '<div id="detailview_more_actions" class="dropdown" style="float:left">'
                            + '<button class="button dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'
                            + '<span class="caret"></span></button>'
                            + '<ul class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenu1">'
                            + '</ul></div>';

        $("#formDetailView .buttons").children(".button").last().after(dropdown_html);
        //将复制、删除、合并按钮转到下拉菜单中
        objHeaderDropdown = $("#detailview_more_actions .dropdown-menu");
        $("#duplicate_button").appendTo(objHeaderDropdown);
        $("#delete_button").appendTo(objHeaderDropdown);
        $("#merge_duplicate_button").appendTo(objHeaderDropdown);
        //将模块总体菜单显示到当前数据之后
        $(".panel-content .panel").appendTo($("#tab-content-0"));

        renderHeader();// 重新绘制标题样式
        renderSubpanel();//重新绘制Subpanel

    });