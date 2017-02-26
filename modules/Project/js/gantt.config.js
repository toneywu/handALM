gantt.config.subscales = [
	{unit:"month", step:1, date:"%M" }
];
gantt.config.date_scale = "%d,%D";
var prj_id=$("#project_id").val();
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
		for (var i = 0; i < users.length; i++) {
			if (users[i].key==item.assigned) {
				return users[i].label;
			}
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
	{name:"assigned",type:"select",map_to:"assigned",height:35,options: users},
	{name:"milestone",type:"textarea",map_to:"milestone",height:35},
	{name:"time",type:"duration",map_to:"auto",height:35},
	{name:"projects",type:"select",map_to:"project_id",height:1,options:[{"key":prj_id,"value":""}]},
];
gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
gantt.init("gantt_here");
var dp=new gantt.dataProcessor("index.php?module=Project&action=view_SaveGantt&project_id="+prj_id);
dp.init(gantt);
var url="index.php?module=Project&action=view_GanttData&tp_pdf=true&project_id="+prj_id;
var tasks_data="";
$.getJSON(url, function(tasks){
	for (var i = 0; i < tasks.length; i++) {
		for (var j = 0; j < users.length; j++) {
			if (tasks.data[i].assigned==users[j].key) 
				tasks.data[i].assigned=users[j].label;
		}
	}
	gantt.parse(tasks);
});

//gantt.load("index.php?module=Project&action=view_GanttData");