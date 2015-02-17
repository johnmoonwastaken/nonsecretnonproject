<<<<<<< HEAD
=======
<?php
if (($_GET["auth"]) == "trainingful") {
echo <<<EOT
>>>>>>> new_design
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>Trainingful Admin: Sessions</title>
 
<link rel="stylesheet" type="text/css" media="screen" href="css/redmond192/jquery-ui-1.9.2.custom.min.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
 
<style>
html, body {
    margin: 0;
    padding: 0;
    font-size: 75%;
}
</style>
 
<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
 
<script type="text/javascript">
var lastSel
jQuery(document).ready(function(){ 
  jQuery("#session_grid").jqGrid({
      url:'admin_list?type=session',
      datatype: "json",
      mtype: 'GET',
      colNames:['ID', 'Crs ID', 'Metro', 'Location/Address', 'Start Date', 'Start Time', 'End Date', 'End Time', 'Session Type', 'Description', 'Cost', 'Cur', 'Register URL', 'Remark', 'Actv'],
      colModel:[
                {name:'session_id',index:'session_id', width:35},
                {name:'course_id',index:'course_id', width:35, editable:true},
                {name:'metro_name',index:'metro_name', width:90, editable:true},
                {name:'location',index:'location', width:250, edittype:"textarea", editoptions:{rows:"5",cols:"32"}, editable:true},
                {name:'start_date',index:'start_date', width:75, editable:true},
                {name:'start_date_time',index:'start_date_time', width:60, editable:true},
                {name:'end_date',index:'end_date', width:75, editable:true},
                {name:'end_date_time',index:'end_date_time', width:60, editable:true},
                {name:'session_type',index:'session_type', width:90, editable:true},
                {name:'description',index:'description', width:400, edittype:"textarea", editoptions:{rows:"5",cols:"53"}, editable:true},
                {name:'cost',index:'cost', width:47, editable:true},
                {name:'currency',index:'currency', width:30, editable:true},
                {name:'registration_url',index:'registration_url', width:150, editable:true},
                {name:'session_remark',index:'session_remark', width:90, editable:true},
                {name:'active',index:'active', width:15}
           ],
      rowNum:250,
      rowList:[50,100,250,500],
      pager: '#session_pager',
      sortname: "course_id, location, start_date",
      viewrecords: true,
      sortorder: "asc",
      caption:"Sessions",
      height:600,
      onSelectRow: function(id){
	      if(id && id!==lastSel){
	        jQuery('#session_grid').jqGrid('saveRow',lastSel);
	        jQuery('#session_grid').jqGrid('editRow',id,true);
	        lastSel=id;
	      }
	    },
	  editurl:'admin_list?type=session_save'
  });
  $("#session_grid").jqGrid('navGrid','#session_pager',
 	{
		edit: false,
		add: false,
		del: true,
		search: false,
		refresh: true,
		view:false,
		save:true,
		addfunc: function(id){
	        $("#session_grid").jqGrid('addRow',
			{
			    rowID : "new_row",
			    initdata : {secondary_category_id:"181", description:"-1"}
			});
    	}
	}
	);
  $("#session_grid").jqGrid("inlineNav", "#session_pager", {
	position: "left",
    editParams: { keys: true },
    addParams: { addRowParams: { keys: true } }
  });

});
</script>
 
</head>
<body>

<<<<<<< HEAD
	<div style="font-size: 16px;margin-left:20px"><a href="admin_categories">Categories</a> <a href="admin_vendors">Vendors</a> <a href="admin_courses">Courses</a> Sessions</div>
=======
	<div style="font-size: 16px;margin-left:20px"><a href="admin_categories?auth=trainingful">Categories</a> <a href="admin_vendors?auth=trainingful">Vendors</a> <a href="admin_courses?auth=trainingful">Courses</a> Sessions</div>
>>>>>>> new_design
	<br />

    <table id="session_grid"></table>
    <div id="session_pager"></div>

</body>
<<<<<<< HEAD
</html>
=======
</html>
EOT;
}
?>
>>>>>>> new_design
