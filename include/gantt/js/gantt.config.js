function initGantt(gantt){
	var _height=$("body").height()-150;
	$("#gantt_map").css("height",_height);
	$("#gantt_map").css("background","#fff");
	gantt.config.subscales = [
		{unit:"year", step:1, date:"%Y" },
		{unit:"month", step:1, date:"%M" }
	];
	gantt.config.date_scale = "%d,%M";
	gantt.config.columns=[
		{name:"text", label:"任务名称", align:"left", tree:true, width:130,resize:true,
			template:function(item){
				if (typeof(item.text)=="undefined"){
					return "";
				}
				return item.text;
			}
		},
		{name:"start_date", label:"开始",align:"center", width:90,resize:true},
		{name:"progress", label:"进度", width:50, align: "center",resize:true,
			template: function(item) {
			if (item.progress >= 1)
				return "完成";
			if (item.progress == 0||typeof(item.progress)=="undefined")
				return "未开始";
			return Math.round(item.progress*100) + "%";
		}},
		{name:"duration",label:"期间",width:35,align:"center",resize:true,},
		{name:"assigned", label:"负责人", align: "center", width:80,resize:true,
			template: function(item) {
			if (!item.assigned) 
				return "";
			for (var j = 0; j < users.length; j++) {
				if (item.assigned==users[j].key) 
					return users[j].label;
			}
		}},
		{name:"priority", label:"优先级", width:40, align: "center",
			template: function(item) {
			if (!item.priority||typeof(item.priority)=="undefined") 
				return "";
			for (var i = 0; i < priority.length; i++) {
				if (item.priority==priority[i].key) 
					return priority[i].label;
			}
		}},
		{name:"milestone",label:"里程碑",align:"center",width:40,resize:true,
			template:function(item){
			return item.milestone=="1"?"是":"否";
		}},
		{name:'add',width:30}
	];/*注意，projects应放置在最后*/
	gantt.config.lightbox.sections=[
		{name:"description",type:"textarea",map_to:"text",height:70,focus:true},
		{name:"assigned",type:"select",map_to:"assigned",height:35,options:users},
		{name:"milestone",type:"select",map_to:"milestone",height:35,options:[{"key":"0","label":"否"},{"key":"1","label":"是"}]},
		{name:"priority",type:"select",map_to:"priority",height:35, options: priority},
		{name: "progress", height: 35, map_to: "progress", type: "select", options: [
            {key:"0", label: "未开始"},
            {key:"0.1", label: "10%"},
            {key:"0.2", label: "20%"},
            {key:"0.3", label: "30%"},
            {key:"0.4", label: "40%"},
            {key:"0.5", label: "50%"},
            {key:"0.6", label: "60%"},
            {key:"0.7", label: "70%"},
            {key:"0.8", label: "80%"},
            {key:"0.9", label: "90%"},
            {key:"1", label: "已完成"}
        ]},
		{name:"time",type:"duration",map_to:"auto",height:35,time_format:["%Y","%m","%d"]},
		{name:"projects",type:"select",map_to:"project_id",height:1,options:[{"key":prj_id,"label":""}]},
	];
	gantt.config.task_date = "%Y年%m月%d日";
	gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
	gantt.config.keep_grid_width = false;
	gantt.config.grid_resize = true;
	gantt.config.undo = true;
	gantt.config.redo = true;
	if ($("input[name=show-today]").is(":checked")) {
		var date_to_str = gantt.date.date_to_str(gantt.config.task_date);
		var dateNow=new Date();
		var today = new Date(dateNow.getFullYear(),dateNow.getMonth(),dateNow.getDate());
		gantt.addMarker({
			start_date: today,
			css: "today",
			text: "今天",
			title:"今天: "+ date_to_str(today)
		});
	}
	$("input[name=show-today]").click(function(){
		if ($("input[name=show-today]").is(":checked")) {
			$(".gantt_marker.today").show();
		}else{
			$(".gantt_marker.today").hide();
		}
	});
	/*键盘操作*/
	gantt.config.keyboard_navigation_cells = true;
	/*任务拖动*/
	gantt.config.order_branch = true;
    gantt.config.order_branch_free = true;
}
initGantt(gantt);
/*工作日*/
$("input[name=show-workday]").click(function(){
	if($("input[name=show-workday]").is(":checked")){
		gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
		gantt.config.scale_unit = "month";
		gantt.config.step = 1;
		gantt.config.date_scale = "%F, %Y";
		var weekScaleTemplate = function(date){
			var dateToStr = gantt.date.date_to_str("%d %M");
			var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
			return dateToStr(date) + " - " + dateToStr(endDate);
		};
		gantt.config.subscales = [
			{unit:"week", step:1, template:weekScaleTemplate},
			{unit:"day", step:1, date:"%D" }
		];
		gantt.ignore_time = function(date){//ignore_time没有这个算法
			if(date.getDay() == 0 || date.getDay() == 6)
				return true;
			return false;
		};
		gantt.render();
	}
});
/*主题切换*/
function changeSkin(name){
	var link = document.createElement("link");
	link.onload = function(){
		gantt.resetSkin();
		gantt.render();
	};
	link.rel="stylesheet";
	link.type="text/css";
	link.id = "skin";
	link.href = "include/gantt/codebase/skins/dhtmlxgantt_"+name+".css";
	$('#skin').replaceWith(link);
}

/*年月日切换*/
function setScaleConfig(value){
	switch (value) {
		case "Day":
			gantt.config.scale_unit = "day";
			gantt.config.step = 1;
			gantt.config.date_scale = "%d %M";
			gantt.config.subscales = [];
			gantt.config.scale_height = 27;
			gantt.templates.date_scale = null;
		break;
		case "Week":
			var weekScaleTemplate = function(date){
				var dateToStr = gantt.date.date_to_str("%d %M");
				var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
				return dateToStr(date) + " - " + dateToStr(endDate);
			};
			gantt.config.scale_unit = "week";
			gantt.config.step = 1;
			gantt.templates.date_scale = weekScaleTemplate;
			gantt.config.subscales = [
			{unit:"day", step:1, date:"%D" }];
			gantt.config.scale_height = 50;
		break;
		case "Month":
			gantt.config.scale_unit = "month";
			gantt.config.date_scale = "%F, %Y";
			gantt.config.subscales = [
			{unit:"day", step:1, date:"%j, %D" }
			];
			gantt.config.scale_height = 50;
			gantt.templates.date_scale = null;
		break;
		case "Year":
			gantt.config.scale_unit = "year";
			gantt.config.step = 1;
			gantt.config.date_scale = "%Y";
			gantt.config.min_column_width = 50;
			gantt.config.scale_height = 90;
			gantt.templates.date_scale = null;
			gantt.config.subscales = [
			{unit:"month", step:1, date:"%M" }];
		break;
		case "Auto":
			gantt.config.scale_unit = "day";
			gantt.config.step = 1;
			gantt.config.scale_height = 35;
			gantt.config.subscales = [
				{unit:"year", step:1, date:"%Y" },
				{unit:"month", step:1, date:"%M" }
			];
			gantt.config.date_scale = "%d,%M";
		break;
	}
}
var func = function(e) {
	e = e || window.event;
	var el = e.target || e.srcElement;
	var value = el.value;
	setScaleConfig(value);
	gantt.render();
};
var els = document.getElementsByName("scale");
for (var i = 0; i < els.length; i++) {
	els[i].onclick = func;
}

/*全屏*/
gantt.attachEvent("onTemplatesReady", function(){
	var toggle = document.createElement("i");
	toggle.className = "fa fa-expand gantt-fullscreen";//"glyphicon glyphicon-fullscreen";
	gantt.toggleIcon = toggle;
	gantt.$container.appendChild(toggle);
	toggle.onclick = function() {
		if (!gantt.getState().fullscreen) {
			gantt.expand();
			$("#ajaxHeader").addClass("hidden");
		}else {
			gantt.collapse();
			$("#ajaxHeader").removeClass("hidden");
		}
	};
});
gantt.attachEvent("onExpand", function(){
	var icon = gantt.toggleIcon;
	if(icon){
		icon.className = icon.className.replace("fa-expand", "fa-compress");
	}
});
gantt.attachEvent("onCollapse", function(){
	var icon = gantt.toggleIcon;
	if(icon){
		icon.className = icon.className.replace("fa-compress", "fa-expand");
	}
});
/*任务升级降级*/
$("#toolbar-btn-moveup").click(function(){
	gantt.performAction("toolbar-btn-moveup");
});
$("#toolbar-btn-movedown").click(function(){
	gantt.performAction("toolbar-btn-movedown");
});
(function(){
	function shiftTask(task_id, direction) {
		var task = gantt.getTask(task_id);
		task.start_date = gantt.date.add(task.start_date, direction, "day");
		task.end_date = gantt.calculateEndDate(task.start_date, task.duration);
		gantt.updateTask(task.id);
	}
	var actions = {
		"toolbar-btn-moveup": function indent(task_id){
			var prev_id = gantt.getPrevSibling(task_id);
			while(gantt.isSelectedTask(prev_id)){
				var prev = gantt.getPrevSibling(prev_id);
				if(!prev) break;
					prev_id = prev;
			}
			if (prev_id) {
				var new_parent = gantt.getTask(prev_id);
				gantt.moveTask(task_id, gantt.getChildren(new_parent.id).length, new_parent.id);
				new_parent.type = gantt.config.types.project;
				new_parent.$open = true;
				gantt.updateTask(task_id);
				gantt.updateTask(new_parent.id);
				return task_id;
			}
			return null;
		},
		"toolbar-btn-movedown": function outdent(task_id){
			var cur_task = gantt.getTask(task_id);
			var old_parent = cur_task.parent;
			if (gantt.isTaskExists(old_parent) && old_parent != gantt.config.root_id){
				gantt.moveTask(task_id, gantt.getTaskIndex(old_parent)+1+gantt.getTaskIndex(task_id), gantt.getParent(cur_task.parent));
				if (!gantt.hasChild(old_parent))
					gantt.getTask(old_parent).type = gantt.config.types.task;
					gantt.updateTask(task_id);
					gantt.updateTask(old_parent);
					return task_id;
				}
				return null;
		},
	};
	var cascadeAction = {
		"toolbar-btn-moveup":true,
		"toolbar-btn-movedown":true,
	};
	gantt.performAction = function(actionName){
		var action = actions[actionName];
		if(!action)
			return;
		gantt.batchUpdate(function () {
			var updated = {};
			gantt.eachSelectedTask(function(task_id){
				if(cascadeAction[actionName]){
					if(!updated[gantt.getParent(task_id)]){
						var updated_id = action(task_id);
						updated[updated_id] = true;
					}else{
						updated[task_id] = true;
					}
				}else{
					action(task_id);
				}
			});
		});
	};
})();

gantt.config.highlight_critical_path = true;
/*关键路径*/
$("input[name=show-CP]").click(function(){
	console.log($("input[name=show-CP]").is(":checked"));
	if ($("input[name=show-CP]").is(":checked")) {
		gantt.config.highlight_critical_path = true;
	}else{
		gantt.config.highlight_critical_path = false;
	}
	gantt.render();
});

function sortByKey(array, key) {
    return array.sort(function(a, b) {
        var x = a[key]; var y = b[key];
        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
    });
}