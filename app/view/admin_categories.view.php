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
<title>Trainingful Admin: Categories</title>
 
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
  jQuery("#category_grid").jqGrid({
      url:'admin_list?type=category',
      datatype: "json",
      mtype: 'GET',
      colNames:['ID', 'Parent Category', 'Category', 'Description'],
      colModel:[
                {name:'category_id',index:'category_id', width:35},
                {name:'parent_category_id',index:'parent_name', width:300, editable:true, edittype:'select', editoptions:{dataUrl:'parent_category_select'}},
                {name:'category_name',index:'category_name', width:340, editable:true},
                {name:'description',index:'description', width:400, edittype:'textarea', editable:true},
           ],
      rowNum:250,
      rowList:[50,100,250,500],
      pager: '#category_pager',
      sortname: "parent_name, category_name",
      viewrecords: true,
      sortorder: "asc",
      caption:"Categories",
      height:460,
      onSelectRow: function(id){
	      if(id && id!==lastSel){
	        jQuery('#category_grid').jqGrid('saveRow',lastSel);
	        jQuery('#category_grid').jqGrid('editRow',id,true);
	        lastSel=id;
	      }
	    },
	  editurl:'admin_list?type=category_save'
  });
  $("#category_grid").jqGrid('navGrid','#category_pager',
 	{
		edit: false,
		add: false,
		del: true,
		search: false,
		refresh: true,
		view:false,
		save:true,
		addfunc: function(id){
	        $("#category_grid").jqGrid('addRow',
			{
			    rowID : "new_row"
			});
    	}
	}
	);
  $("#category_grid").jqGrid("inlineNav", "#category_pager", {
	position: "left",
    editParams: { keys: true },
    addParams: { addRowParams: { keys: true } }
  });

});
</script>
 
</head>
<body>

<<<<<<< HEAD
	<div style="font-size: 16px;margin-left:20px">Categories <a href="admin_vendors">Vendors</a> <a href="admin_courses">Courses</a> <a href="admin_sessions">Sessions</a></div>
=======
	<div style="font-size: 16px;margin-left:20px">Categories <a href="admin_vendors?auth=trainingful">Vendors</a> <a href="admin_courses?auth=trainingful">Courses</a> <a href="admin_sessions?auth=trainingful">Sessions</a></div>
>>>>>>> new_design
	<br />
    <table id="category_grid"></table>
    <div id="category_pager"></div>

</body>
<<<<<<< HEAD
</html>
=======
</html>
EOT;
}
?>
>>>>>>> new_design
