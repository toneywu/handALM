var _height=$("body").height()-150;
$("#gantt_map").css("height",_height);
$("#gantt_map").css("background","#fff");
gantt.config.subscales = [
	{unit:"month", step:1, date:"%M" }
];
gantt.config.date_scale = "%d,%D";
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
			console.log(item.progress);
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
		if(!item.milestone)
			return "";
		return item.milestone;
	}},
	{name:'add',width:30}
];
gantt.config.lightbox.sections=[
	{name:"description",type:"textarea",map_to:"text",height:70,focus:true},
	{name:"assigned",type:"select",map_to:"assigned",height:35,options:users},
	{name:"milestone",type:"textarea",map_to:"milestone",height:35},
	{name:"time",type:"duration",map_to:"auto",height:35},
	{name:"projects",type:"select",map_to:"project_id",height:1,options:[{"key":prj_id,"value":""}]},
];
gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";