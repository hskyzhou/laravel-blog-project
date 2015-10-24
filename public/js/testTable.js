$(document).ready(function() {
	$('#example').dataTable({
		"autoWidth": false, //禁止计算列宽
		// "info" : false, //是否显示表格左下角的消息
		"lengthChange" : false, // 是否允许用户修改表格每页显示的条数
		// "ordering" : false, //是否允许表格进行排序
		// "paging" : false, //是否允许表格进行分页
		// "processing" : false, //是否显示处理状态(排序的时候，数据很多耗费时间长的话，也会显示这个)
		// "scrollX" : false, // 允许水平滚动	
		// // "scrollY" : "200px", // 允许垂直滚动
		// // "scrollCollapse" : true,
		// "searching" : false, // 允许搜索
		"serverSide" : true, //开启服务端获取数据
		"ajax":{
			"url" : "api/nav/show",
			"data" : {
				"id" : "1"
			},
			"type" : "post",
		},
		"dom":"lfT",


	});
});