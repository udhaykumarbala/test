<?php
session_start();
include_once 'config.php';
if($_SESSION['usr_name']!='')
{
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Rocket SMS</title>

  
    
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
        
      <script type="text/javascript" charset="utf-8" src="js/table.student.js"></script>
     <script type="text/javascript" charset="utf-8" src="js/table.cableconnection.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/table.Street.js"></script>
    
	<link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="img/favicon.png" rel="icon" type="image/png">
	<link href="img/favicon.ico" rel="shortcut icon">
 
   
    <link rel="stylesheet" href="css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/custom.css">
        
    <style>
#viewdata {

    margin-left: 150px;
    margin-top: 100px;
    margin-right: -20px;
    margin-bottom: 55px;
}
        .sel{
                width: 25%;
        }
        .para{
            padding: 5px;
        }
        .inline{
            display: -webkit-box;
        }   
       table, th, td {
    border: 1px solid black;
} 
        td {
    height: 50px;
    vertical-align : middle;
            
}
        i.fa-vibe  {
   content:"";
   background-image:url('complaints.png');

   width: 50px; 
   height: 50px; 
   display: inline-block;
   background-position:center;
   background-size:cover;
}
           
</style>
</head>
<body class="with-side-menu-compact">

	<header class="site-header">
	    <div class="container-fluid">
	        <a href="#" class="site-logo">
	            <img class="hidden-md-down" src="img/logo.png" alt="">
	           
	        </a>
	       
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img src="img/avatar-2-64.png" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span> <?php echo $_SESSION['usr_name']; ?> </a>
	                            <a class="dropdown-item" href="settings.php"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
	                            <a class="dropdown-item" href="support.php"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
	                            <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="logout.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
	                        </div>
	                    </div>
	
	                    <button type="button" class="burger-right">
	                        <i class="font-icon-menu-addl"></i>
	                    </button>
	                </div><!--.site-header-shown-->
	
	                <div class="mobile-menu-right-overlay"></div>
	               
	            </div>
	        </div>
	    </div>
	</header>

	<div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu side-menu-compact">
	    <ul class="side-menu-list">
            
            <li class="white">
	            <a href="user1.php">
	                <i class="fa fa-user"></i>
	                <span class="lbl">users</span>
	            </a>
	        </li>
            
             <li class="black">
	            <a href="department.php">
	                <i class="fa fa-building"></i>
	                <span class="lbl">department</span>
	            </a>
	        </li>
            
            
            
            
            
	           <li class="blue">
	            <a href="connection.php">
	                <i class="font-icon font-icon-users-group"></i>
	                <span class="lbl">Connections</span>
	            </a>
	        </li>
	        <li class="green">
	            <a href="street.php">
	                <i class="fa fa-road"></i>
	                <span class="lbl">Streets</span>
	            </a>
	        </li>
	        <li class="magenta">
	            <a href="place.php">
	                <i class="fa fa-map-marker"></i>
	                <span class="lbl">Areas</span>
	            </a>
	        </li>
	        <li class="gold">
	            <a href="payment.php">
	                <i class="fa fa-money"></i>
	                <span class="lbl">Payments</span>
	            </a>
	        </li>
	        <li class="orange-red ">
	            <a href="report.php">
	                <i class="font-icon font-icon-chart "></i>
	                <span class="lbl">Reports</span>
	            </a>
	        </li>
             <li class="blue opened">
	            <a href="complaints.php">
	                <i class="fa fa-vibe active"></i>
	                <span class="lbl">Complaints</span>
	            </a>
	        </li>
                 
            <li class="green-dark">
	            <a href="settings.php">
	                <i class="fa fa-cog"></i>
	                <span class="lbl">Settings</span>
	            </a>
	        </li>
           <li class="red">
	            <a href="support.php">
	                <i class="fa fa-life-ring"></i>
	                <span class="lbl">Help</span>
	            </a>
	        </li>  
	  
	    </ul>
	</nav>

    
	<body class="dataTables" >
		<div id="viewdata" class="container">
           
            <h4><u>Complaints </u></h4>
            <br/>
             <div class="row">

    <div class="col-xs-2">
        <button class="btn btn-primary btn-block" onclick="getIndex1()"><i class="fa fa-check"></i>Verify</button>
    </div>
    <div class="col-xs-2">
        <button class="btn btn-danger btn-block" onclick="getIndex()"><i class="fa fa-trash"></i>  Delete</button>
    </div>
        </div>

      <br/>       <br/>  
			<table id="excelDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        			<thead>
					<tr>
						<th>Cable Id</th>
                        <th>Customer Name</th> 
                        <th>Street</th>
                        <th>Area</th>
                        <th>Mobile No</th>
                        <th>Address</th>
                        <th>Complaints</th>
                        <th>Complained Date</th>
                        <th>Verified</th>
                        <th>Verified Date</th>
					</tr>
				</thead>
                <tbody id="tableBody">
                </tbody>
     
    </table>
	</div>
         <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Verify Complaint</h4>
      </div>
      <div class="modal-body">
          <h4> Do you  Verified this Complaint</h4>
          <input type="hidden" class="form-control" id="complaints">
          <input type="hidden" class="form-control" id="cableid_verify">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" id="save" onclick="verifycomplaints()" data-dismiss="modal" class="btn btn-primary">Yes</button>
      </div>
      </div>
    </div>
        </div>
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Complaint</h4>
      </div>
      <div class="modal-body">
          <h4> Do you want to delete this Complaint</h4>
          <input type="hidden" class="form-control" id="complaints">
          <input type="hidden" class="form-control" id="cableid_del">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" id="save" onclick="deletecomplaints()" data-dismiss="modal" class="btn btn-primary">Yes</button>
      </div>
      </div>
    </div>
        </div>
      
        
             <script>
$(document).ready( function() {

   
   setTimeout(tableInit,2000);
    $.ajax({
	   dataType: "json",
	   url: "php/showcomplaints.php",
	   
	}).done(function( data ) {
        
     buildHtmlTable(data);
        
          
	});

} );
     
    function tableInit()
 {
     
  table = $('#excelDataTable').DataTable({
        select: {
            style: 'single'
        }
    } );

 }
    
                 
 function verifycomplaints()
 {
    debugger;               
      var complaints = $('#complaints').val(); 
      var cableid_verify = $('#cableid_verify').val();
     
      var datas1={'complaints': complaints, 'cableid_verify': cableid_verify } 
      
   	 $.ajax({
	   type: "POST",
	   url: "php/verifycomplaints.php",
	   data: datas1
	}).done(function( data ) {
    location.reload();
	});
 }                 
                 
                 
  function deletecomplaints()
 
{
     
    debugger;               
     var complaints = $('#complaints').val(); 
     var cableid_del = $('#cableid_del').val();
     
     var datas1={'complaints': complaints, 'cableid_del': cableid_del }
     
     $.ajax({
	   type: "POST",
	   url: "php/deletecomplaints.php",
	   data: datas1
	}).done(function( data ) {
    location.reload();
      
	});
 }
                 
  function getIndex()
{
    debugger;
            var test = table.rows('.selected').data();
            $('#myModal2').modal('show');
            $('#cableid_del').val(test[0][0]);
            $('#complaints').val(test[0][6]);
           
                     
}
function getIndex1()
{
    debugger;
            var test = table.rows('.selected').data();
            $('#myModal1').modal('show');
           $('#cableid_verify').val(test[0][0]);
            $('#complaints').val(test[0][6]);                     
}
 function refreshTable()
 {
     debugger;
     table1.draw();
 }
                 
                 
 function success(data)
    {
        
        buildHtmlTable(data);
    }

             
 function buildHtmlTable(data) {

     var columns = addAllColumnHeaders(data);
 
     for (var i = 0 ; i < data.length ; i++) {
         var row$ = $('<tr/>');
         for (var colIndex = 0 ; colIndex < columns.length ; colIndex++) {
             var cellValue = data[i][columns[colIndex]];
 
             if (cellValue == null) { cellValue = ""; }
 
             row$.append($('<td/>').html(cellValue));
         }
         $("#excelDataTable").append(row$);
     }
 }
 

 function addAllColumnHeaders(data)
 {
     var columnSet = [];
     var headerTr$ = $('<tr/>');
 
     for (var i = 0 ; i < data.length ; i++) {
         var rowHash = data[i];
         for (var key in rowHash) {
             if ($.inArray(key, columnSet) == -1){
                 columnSet.push(key);
                 headerTr$.append($('<th/>').html(key));
             }
         }
     }
    
     return columnSet;
 }
      
        </script>

        
	</body>
</html>
       <?php
}
else
{
   header("Location: login.php");
}
?>