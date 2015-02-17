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
<title>Trainingful Admin: Vendors</title>
 
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
  jQuery("#vendor_grid").jqGrid({
      url:'admin_list?type=vendor',
      datatype: "json",
      mtype: 'GET',
      colNames:['ID', 'Name', 'Contact E-mail', 'Description', 'Website URL', 'Logo URL'],
      colModel:[
                {name:'vendor_id',index:'vendor_id', width:35},
                {name:'vendor_name',index:'vendor_name', width:200, editable:true},
                {name:'contact_email',index:'contact_email', width:100, editable:true},
                {name:'description',index:'description', width:400, edittype:"textarea", editoptions:{rows:"5",cols:"60"}, editable:true},
                {name:'website_url',index:'website_url', width:200, editable:true},
                //{name:'primary_category_id',index:'primary_category_id', width:300, editable:true, edittype:'select', editoptions:{dataUrl:'primary_category_select'}},
                {name:'branding_url',index:'branding_url', width:150, editable:true},
           ],
      rowNum:250,
      rowList:[50,100,250,500],
      pager: '#vendor_pager',
      sortname: "vendor_name",
      viewrecords: true,
      sortorder: "asc",
      caption:"Vendors",
      height:600,
      onSelectRow: function(id){
	      if(id && id!==lastSel){
	        jQuery('#vendor_grid').jqGrid('saveRow',lastSel);
	        jQuery('#vendor_grid').jqGrid('editRow',id,true);
	        lastSel=id;
	      }
	    },
	  editurl:'admin_list?type=vendor_save'
  });
  $("#vendor_grid").jqGrid('navGrid','#vendor_pager',
 	{
		edit: false,
		add: false,
		del: true,
		search: false,
		refresh: true,
		view:false,
		save:true,
		addfunc: function(id){
	        $("#vendor_grid").jqGrid('addRow',
			{
			    rowID : "new_row",
			    initdata : {secondary_category_id:"181", description:"-1"}
			});
    	}
	}
	);
  $("#vendor_grid").jqGrid("inlineNav", "#vendor_pager", {
	position: "left",
    editParams: { keys: true },
    addParams: { addRowParams: { keys: true } }
  });

});
</script>
 
</head>
<body>

<<<<<<< HEAD
	<div style="font-size: 16px;margin-left:20px"><a href="admin_categories">Categories</a> Vendors <a href="admin_courses">Courses</a> <a href="admin_sessions">Sessions</a></div>
=======
	<div style="font-size: 16px;margin-left:20px"><a href="admin_categories?auth=trainingful">Categories</a> Vendors <a href="admin_courses?auth=trainingful">Courses</a> <a href="admin_sessions?auth=trainingful">Sessions</a></div>
>>>>>>> new_design
	<br />

    <table id="vendor_grid"></table>
    <div id="vendor_pager"></div>

</body>
<<<<<<< HEAD
</html>
=======
</html>
EOT;
}
?>
>>>>>>> new_design
