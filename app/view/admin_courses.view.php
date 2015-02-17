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
<title>Trainingful Admin: Courses</title>
 
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
  jQuery("#course_grid").jqGrid({
      url:'admin_list?type=courses',
      datatype: "json",
      mtype: 'GET',
      colNames:['ID', 'Vend. ID', 'Cat. ID', 'Name', 'URL', 'Active', 'Description'],
      colModel:[
                {name:'course_id',index:'course_id', width:35},
                {name:'vendor_id',index:'vendor_id', width:35, editable:true},
                {name:'category_id',index:'category_id', width:35, editable:true},
                //{name:'parent_category_id',index:'parent_name', width:300, editable:true, edittype:'select', editoptions:{dataUrl:'parent_category_select'}},
                {name:'course_name',index:'course_name', width:200, editable:true},
                {name:'course_url',index:'course_url', width:300, editable:true},
                {name:'active',index:'active', width:15},
                {name:'course_description',index:'course_description', width:640, edittype:'textarea', editoptions:{rows:"5",cols:"100"}, editable:true},
           ],
      rowNum:250,
      rowList:[50,100,250,500],
      pager: '#course_pager',
      sortname: "vendor_id, course_name",
      viewrecords: true,
      sortorder: "desc",
      caption:"Courses",
      height:560,
      onSelectRow: function(id){
	      if(id && id!==lastSel){
	        jQuery('#course_grid').jqGrid('saveRow',lastSel);
	        jQuery('#course_grid').jqGrid('editRow',id,true);
	        lastSel=id;
	      }
	    },
	  editurl:'admin_list?type=courses_save'
  });
  $("#course_grid").jqGrid('navGrid','#course_pager',
 	{
		edit: false,
		add: false,
		del: true,
		search: false,
		refresh: true,
		view:false,
		save:true,
		addfunc: function(id){
	        $("#course_grid").jqGrid('addRow',
			{
			    rowID : "new_row"
			});
    	}
	}
	);
  $("#course_grid").jqGrid("inlineNav", "#course_pager", {
	position: "left",
    editParams: { keys: true },
    addParams: { addRowParams: { keys: true } }
  });

});
</script>
 
</head>
<body>

<<<<<<< HEAD
	<div style="font-size: 16px;margin-left:20px"><a href="admin_categories">Categories</a> <a href="admin_vendors">Vendors</a> Courses <a href="admin_sessions">Sessions</a></div>
=======
	<div style="font-size: 16px;margin-left:20px"><a href="admin_categories?auth=trainingful">Categories</a> <a href="admin_vendors?auth=trainingful">Vendors</a> Courses <a href="admin_sessions?auth=trainingful">Sessions</a></div>
>>>>>>> new_design
	<br />

    <table id="course_grid"></table>
    <div id="course_pager"></div>

</body>
<<<<<<< HEAD
</html>
=======
</html>
EOT;
}
?>
>>>>>>> new_design
