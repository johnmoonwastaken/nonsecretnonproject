<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>Trainingful Admin</title>
 
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
      url:'category_list?type=category',
      datatype: "json",
      mtype: 'GET',
      colNames:['ID', 'Primary Category', 'Secondary Category', 'Description'],
      colModel:[
                {name:'secondary_category_id',index:'secondary_category_id', width:35},
                {name:'category_name',index:'category_name', width:260},
                {name:'secondary_category_name',index:'secondary_category_name', width:340, editable:true},
                {name:'description',index:'description', width:400, editable:true},
           ],
      rowNum:50,
      rowList:[50,100,250],
      pager: '#category_pager',
      sortname: "secondary_category_id",
      viewrecords: true,
      sortorder: "asc",
      caption:"Categories",
      height:390,
	      onSelectRow: function(id){
		      if(id && id!==lastSel){
		        jQuery('#category_grid').jqGrid('saveRow',lastSel);
		        jQuery('#category_grid').jqGrid('editRow',id,true);
		        lastSel=id;
		      }
		    },
	  editurl:'category_list?type=category_save'
  });
$("#category_grid").jqGrid('navGrid','#category_pager',
 	{
		edit: true,
		add: true,
		del: true,
		search: true,
		refresh: true,
		view:true
	}
	);
});
</script>
 
</head>
<body>

    <table id="category_grid"></table>
    <div id="category_pager"></div>

</body>
</html>