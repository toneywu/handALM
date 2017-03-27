function initGantt(gantt){
	$height = $(window).height() - $("#gantt_map").offset().top;
    $('#gantt_map').height($height);
	$("#gantt_map").css("background","#fff");
	gantt.config.subscales = [
		{unit:"year", step:1, date:"%Y" },
		{unit:"month", step:1, date:"%M" }
	];
	gantt.config.date_scale = "%M,%d";
	gantt.config.scale_height = 50;
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
        {name: "type", type: "typeselect", map_to: "type",options:[{"key":"project","label":"项目"}]},
		{name:"time",type:"duration",map_to:"auto",height:35,time_format:["%Y","%m","%d"]},
		{name:"projects",type:"select",map_to:"project_id",height:1,options:[{"key":prj_id,"label":""}]},
	];
	gantt.templates.progress_text = function(start, end, task){
		return "<span style='float:left;'>"+Math.round(task.progress*100)+ "% </span>";
	};
	gantt.config.task_date = "%Y年%m月%d日";
	gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
	gantt.config.keep_grid_width = false;
	gantt.config.grid_resize = true;
	gantt.config.undo = true;
	gantt.config.redo = true;
	var date_to_str = gantt.date.date_to_str(gantt.config.task_date);
	var dateNow=new Date();
	var today = new Date(dateNow.getFullYear(),dateNow.getMonth(),dateNow.getDate());
	if ($("input[name=show-today]").is(":checked")) {gantt.addMarker({
			start_date: today,
			css: "today",
			text: "今天",
			title:"今天: "+ date_to_str(today)
		});
	}
	$("input[name=show-today]").click(function(){
		if ($("input[name=show-today]").is(":checked")) {
			gantt.config.show_markers=true;
		}else{
			gantt.config.show_markers=false;
		}
		gantt.render();
	});

	$("input[name=show-progress]").click(function(){
		if ($("input[name=show-progress]").is(":checked")) {
			gantt.config.show_progress=true;
		}else{
			gantt.config.show_progress=false;
		}
		gantt.render();
	});

	/*键盘操作*/
	gantt.config.keyboard_navigation_cells = true;
	/*任务拖动*/
	gantt.config.order_branch = true;
    gantt.config.order_branch_free = true;
    /*设置文本位置*/
    $("input[name=show-text-position]").click(function(){
    	if ($("input[name=show-text-position]").is(":checked")) {
    		gantt.templates.rightside_text = function rightSideTextTemplate(start, end, task) {
				if (getTaskFitValue(task) === "right") {
					return task.text;
				}
				return "";
			};
    	}else{
    		gantt.templates.rightside_text = function rightSideTextTemplate(start, end, task) {
				return "";
			};
    		gantt.templates.task_text = function taskTextTemplate(start, end, task) {
				if (getTaskFitValue(task) === "center") {
					return task.text;
				}
				return "";
			};
    	}
    	gantt.render();
    });
    gantt.templates.rightside_text = function rightSideTextTemplate(start, end, task) {
		if (getTaskFitValue(task) === "right") {
			return task.text;
		}
		return "";
	};
	if ($("input[name=show-weekends]").is(":checked")&&gantt.config.scale_unit!="year") {
		setWeekend();
	}
	gantt.templates.task_class=function(start, end, task){
		if(gantt.getPrev(task.id)==null){
			return "the_top";
		}
		if (task.milestone=='1') {
			return "gantt_milestone";
		}
		if (gantt.hasChild(task.id)) {
			return "has_child";
		}else{
			return "not_has_child";
		}
	};
	
	gantt.attachEvent("onAfterTaskAdd", function(id,item){
	    gantt.message("保存成功.");
	});
}
gantt.config.highlight_critical_path=true;


/*function setMilestone(){
	$(".gantt_milestone").css("width",30);
	$(".gantt_milestone").css("height",30);
	$(".gantt_milestone").css("line-height",30);
	$(".gantt_milestone.gantt_task_progress").remove();
	$(".gantt_milestone.gantt_task_progress_drag").remove();
	$(".gantt_task_drag.task_right").remove();
	$(".gantt_task_drag.task_left").remove();
	$(".gantt_link_control.task_right").css("height",30);
	$(".gantt_link_control.task_left").css("height",30);
}*/


function getTaskFitValue(task){
	gantt.config.font_width_ratio = 7;
	var taskStartPos = gantt.posFromDate(task.start_date),
		taskEndPos = gantt.posFromDate(task.end_date);
	var width = taskEndPos - taskStartPos;
	var lenStr=0;
	for (var i = 0; i < (task.text||"").length; i++) {
		if (task.text.charCodeAt(i)>127 || task.text.charCodeAt(i)==94) { 
	    	lenStr += 2; 
	    } else { 
	    	lenStr ++; 
	    }
	}
	var textWidth = lenStr * gantt.config.font_width_ratio;
	if(width < textWidth){
		var ganttLastDate = gantt.getState().max_date;
		var ganttEndPos = gantt.posFromDate(ganttLastDate);
		if(ganttEndPos - taskEndPos < textWidth){
			return "left"
		}else {
			return "right"
		}
	}else {
		return "center";
	}
}
initGantt(gantt);

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
	if(value=="Month")unSetWeekend();
	else setWeekend();
	gantt.config.scale_height = 50;
	gantt.config.step = 1;
	switch (value) {
		case "Quarter":
			gantt.config.scale_unit = "hour";
			gantt.config.date_scale = "%G";
			gantt.config.min_column_width = 17;
			gantt.config.duration_unit = "minute";
			gantt.config.duration_step = 60;
			gantt.config.subscales = [
				{unit:"day", step:1, date : "%Y年%M%d日"},
				{unit:"minute", step:15, date : "%i"}
			];
		break;
		case "Hour":
			gantt.config.scale_unit = "day";
			gantt.config.date_scale = "%Y年%M%d日";
			gantt.config.min_column_width = 50;
			gantt.config.subscales = [
				{unit:"hour", step:1, date:"%H"}//%i
			];
			gantt.config.min_column_width = 17;
			gantt.templates.date_scale = null;
		break;
		case "Day-Compact":
			gantt.config.scale_unit = "day";
			gantt.config.date_scale = "%d";
			gantt.config.subscales = [
			{unit:"month", step:1, date:"%Y年%M" },
			];
			gantt.config.min_column_width = 17;
			gantt.templates.date_scale = null;
		break;
		case "Day-Mid":
			gantt.config.scale_unit = "day";
			gantt.config.date_scale = "%d";
			gantt.config.subscales = [
			{unit:"month", step:1, date:"%Y年%M" },
			];
			gantt.config.min_column_width = 33;
			gantt.templates.date_scale = null;
		break;
		case "Day":
			gantt.config.scale_unit = "day";
			gantt.config.date_scale = "%d";
			gantt.config.subscales = [
			{unit:"month", step:1, date:"%Y年%M" },
			];
			gantt.config.min_column_width = 50;
			gantt.templates.date_scale = null;
		break;
		case "Week":
			var weekScaleTemplate = function(date){
				var dateToStr = gantt.date.date_to_str("%M%d日");
				var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
				return dateToStr(date) + " - " + dateToStr(endDate);
			};
			gantt.config.scale_unit = "week";
			gantt.templates.date_scale = weekScaleTemplate;
			gantt.config.subscales = [
			{unit:"day", step:1, date:"%D" }];
		break;
		case "Month":
			restoreConfig();
			gantt.config.scale_unit = "year";
			gantt.config.date_scale = "%Y年";
			gantt.config.min_column_width = 50;
			gantt.templates.date_scale = null;
			gantt.config.subscales = [
			{unit:"month", step:1, date:"%M" }];
		break;
		case "Auto":
			zoomToFit();
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
			gantt.getState().fullscreen=false;
			$("#ajaxHeader").addClass("hidden");
		}else {
			gantt.collapse();
			gantt.getState().fullscreen=true;
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
		"toolbar-btn-movedown": function indent(task_id){
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
		"toolbar-btn-moveup": function outdent(task_id){
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

//gantt.config.highlight_critical_path = true;
/*关键路径*/
/*$("input[name=show-CP]").click(function(){
	if ($("input[name=show-CP]").is(":checked")) {
		gantt.config.highlight_critical_path = true;
	}else{
		gantt.config.highlight_critical_path = false;
	}
	gantt.render();
});*/

var cachedSettings = {};
function saveConfig() {
	var config = gantt.config;
	cachedSettings = {};
	cachedSettings.scale_unit = config.scale_unit;
	cachedSettings.date_scale = config.date_scale;
	cachedSettings.step = config.step;
	cachedSettings.subscales = config.subscales;
	cachedSettings.template = gantt.templates.date_scale;
	cachedSettings.start_date = config.start_date;
	cachedSettings.end_date = config.end_date;
}
function restoreConfig() {
	applyConfig(cachedSettings);
}
function applyConfig(config, dates) {
	gantt.config.scale_unit = config.scale_unit;
	if (config.date_scale) {
		gantt.config.date_scale = config.date_scale;
		gantt.templates.date_scale = null;
	}else {
		gantt.templates.date_scale = config.template;
	}
	gantt.config.step = config.step;
	gantt.config.subscales = config.subscales;
	if (dates) {
		gantt.config.start_date = gantt.date.add(dates.start_date, -1, config.unit);
		gantt.config.end_date = gantt.date.add(gantt.date[config.unit + "_start"](dates.end_date), 2, config.unit);
	} else {
		gantt.config.start_date = gantt.config.end_date = null;
	}
	gantt.templates.task_text = function rightSideTextTemplate(start, end, task) {
		if (getTaskFitValue(task) === "center") {
			return task.text;
		}
		return "";
	};
}
function zoomToFit() {
	var project = gantt.getSubtaskDates(),
	areaWidth = gantt.$task.offsetWidth;
	for (var i = 0; i < scaleConfigs.length; i++) {
		var columnCount = getUnitsBetween(project.start_date, project.end_date, scaleConfigs[i].unit, scaleConfigs[i].step);
		if ((columnCount + 2) * gantt.config.min_column_width <= areaWidth) {
			break;
		}
	}
	if (i == scaleConfigs.length) {
		i--;
	}
	gantt.templates.rightside_text = function rightSideTextTemplate(start, end, task) {
		if (getTaskFitValue(task) === "right") {
			return task.text;
		}
		return "";
	};
	applyConfig(scaleConfigs[i], project);
	gantt.render();
}

function getUnitsBetween(from, to, unit, step) {
	var start = new Date(from),
	end = new Date(to);
	var units = 0;
	while (start.valueOf() < end.valueOf()) {
		units++;
		start = gantt.date.add(start, step, unit);
	}
	return units;
}
var scaleConfigs = [
	{ unit: "minute", step: 1, scale_unit: "hour", date_scale: "%H", subscales: [{unit: "minute", step: 1, date: "%H:%i"}]},
	{ unit: "hour", step: 1, scale_unit: "day", date_scale: "%M %j",subscales: [{unit: "hour", step: 1, date: "%H:%i"}]},
	{ unit: "day", step: 1, scale_unit: "month", date_scale: "%F",subscales: [{unit: "day", step: 1, date: "%j"}]},
	{ unit: "week", step: 1, scale_unit: "month", date_scale: "%F",subscales: [{unit: "week", step: 1, 
			template: function (date) {
			var dateToStr = gantt.date.date_to_str("%M %d");
			var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
				return dateToStr(date) + " - " + dateToStr(endDate);
			}
		}]
	},
	{ unit: "month", step: 1, scale_unit: "year", date_scale: "%Y",subscales: [
		{unit: "month", step: 1, date: "%M"}]
	},
	{ unit: "month", step: 3, scale_unit: "year", date_scale: "%Y",subscales: [
		{ unit: "month", step: 3, 
			template: function (date) {
				var dateToStr = gantt.date.date_to_str("%M");
				var endDate = gantt.date.add(gantt.date.add(date, 3, "month"), -1, "day");
				return dateToStr(date) + " - " + dateToStr(endDate);
			}
		}]
	},
	{ unit: "year", step: 1, scale_unit: "year", date_scale: "%Y",subscales: [
		{ unit: "year", step: 5, 
			template: function (date) {
				var dateToStr = gantt.date.date_to_str("%Y");
				var endDate = gantt.date.add(gantt.date.add(date, 5, "year"), -1, "day");
				return dateToStr(date) + " - " + dateToStr(endDate);
			}
		}
	]},
	{ unit: "year", step: 10, scale_unit: "year", 
		template: function (date) {
			var dateToStr = gantt.date.date_to_str("%Y");
			var endDate = gantt.date.add(gantt.date.add(date, 10, "year"), -1, "day");
			return dateToStr(date) + " - " + dateToStr(endDate);
	},subscales: [
		{unit: "year", step: 100, 
			template: function (date) {
				var dateToStr = gantt.date.date_to_str("%Y");
				var endDate = gantt.date.add(gantt.date.add(date, 100, "year"), -1, "day");
				return dateToStr(date) + " - " + dateToStr(endDate);
			}
		}
	]}
];
/*区分周末背景*/
function setWeekend(){
	gantt.templates.scale_cell_class = function(date){
		if(date.getDay()==0||date.getDay()==6){
			return "weekend";
		}
	};
	gantt.templates.task_cell_class = function(item,date){
		if(date.getDay()==0||date.getDay()==6){
			return "weekend"
		}
	};
}

function unSetWeekend(){
	gantt.templates.scale_cell_class = function(date){
		return "hidden";
	}
	gantt.templates.task_cell_class = function(item,date){
		return "hidden";
	};
}
$("input[name=show-weekends]").click(function(){
	if ($("input[name=show-weekends]").is(":checked")&&gantt.config.scale_unit!="year") {
		setWeekend();
	}else{
		unSetWeekend();
	}
	gantt.render();
});
function upload(file, callback){
	gantt.importFromMSProject({
		data: file,
		callback: function(project){
		if(project){
			gantt.clearAll();
			if(project.config.duration_unit){
				gantt.config.duration_unit = project.config.duration_unit;
			}
			gantt.parse(project.data);
		}
		if(callback)
			callback(project);
		}
	});
}
gantt.config.row_height = 24;
gantt.config.xml_date = "%Y-%m-%d %H:%i";
gantt.attachEvent("onParse", function(){
	gantt.eachTask(function(task){
		if(gantt.hasChild(task.id)){
			task.type = gantt.config.types.project;
			gantt.updateTask(task.id);
		}else if(task.duration === 0){
				task.type = gantt.config.types.milestone;
				gantt.updateTask(task.id);
			}
		});
	});
	
$(function(){
	saveConfig();
	if (taskData.data!="") {
		zoomToFit();
	}
	$(".gantt_task_cell.weekend").removeClass("weekend");
	resizeContent();
	$(window).resize(function() {
        resizeContent();
    });
});
	
function resizeContent() {
    $height = $(window).height() - $("#gantt_map").offset().top;
    $('#gantt_map').height($height);
}
