var _height=$("body").height()-150;
$("#gantt_map").css("height",_height);
$("#gantt_map").css("background","#fff");
gantt.config.subscales = [
	{unit:"year", step:1, date:"%Y" },
	{unit:"month", step:1, date:"%M" }
];
gantt.config.date_scale = "%d,%M";
gantt.config.columns=[
	{name:"text", label:"任务名称", align:"left", tree:true, width:130,
		template:function(item){
			if (typeof(item.text)=="undefined"){
				return "";
			}
			return item.text;
		}
	},
	{name:"start_date", label:"开始",align:"center", width:90},
	{name:"progress", label:"%完成", width:50, align: "center",
		template: function(item) {
		if (item.progress >= 1)
			return "完成";
		if (item.progress == 0||typeof(item.progress)=="undefined")
			return "未开始";
		return Math.round(item.progress*100) + "%";
	}},
	{name:"duration",label:"期间",width:50,align:"center"},
	{name:"assigned", label:"负责人", align: "center", width:80,
		template: function(item) {
		if (!item.assigned) 
			return "";
		for (var j = 0; j < users.length; j++) {
			if (item.assigned==users[j].key) 
				return users[j].label;
		}
	}},
	{name:"milestone",label:"里程碑",align:"center",width:80,
		template:function(item){
		return item.milestone=="1"?"是":"否";
	}},
	{name:'add',width:30}
];
gantt.config.lightbox.sections=[
	{name:"description",type:"textarea",map_to:"text",height:70,focus:true},
	{name:"assigned",type:"select",map_to:"assigned",height:35,options:users},
	{name:"milestone",type:"select",map_to:"milestone",height:35,options:[{"key":"0","label":"否"},{"key":"1","label":"是"}]},
	{name:"time",type:"duration",map_to:"auto",height:35,time_format:["%Y","%m","%d"]},
	{name:"projects",type:"select",map_to:"project_id",height:1,options:[{"key":prj_id,"label":""}]},
];
gantt.config.task_date = "%Y年%m月%d日";
gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";