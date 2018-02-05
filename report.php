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
	        <li class="orange-red opened">
	            <a href="report.php">
	                <i class="font-icon font-icon-chart active"></i>
	                <span class="lbl">Reports</span>
	            </a>
	        </li>
             <li class="pink ">
	            <a href="complaints.php">
	                <i class="fa fa-vibe "></i>
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
            <br/>
            
        
            <div >
<div class="row">
<div id="payButton"></div>
    <div class="col-xs-3">
       <div class="card card-inverse card-primary text-xs-center">
  <div class="card-block">
    <blockquote class="card-blockquote">
      <h3 id="totalCollection">INR 5,500</h3>
      <footer>Total collection for the month</footer>
    </blockquote>
  </div>
</div>
    </div>
    <div class="col-xs-3">
       <div class="card card-inverse card-success text-xs-center">
  <div class="card-block">
    <blockquote class="card-blockquote">
      <h3  id="pendingCollection">INR 5,500</h3>
      <footer>Pending collection for the month</footer>
    </blockquote>
  </div>
</div>
    </div>
    <div class="col-xs-3">
       <div class="card card-inverse card-warning text-xs-center">
  <div class="card-block">
    <blockquote class="card-blockquote">
      <h3  id="totalConnections">1,200</h3>
      <footer>Total current connections</footer>
    </blockquote>
  </div>
</div>
    </div>
    <div class="col-xs-3">
       <div class="card card-inverse card-danger text-xs-center">
  <div class="card-block">
    <blockquote class="card-blockquote">
        <h3  id="totalComplaints">0</h3>
      <footer>Total complaints for the month</footer>
    </blockquote>
  </div>
</div>
    </div>
   
        </div>    
</div>
   
                <br>
            
            <h4><u>Collection Report</u></h4>
            <br/>

<div class="row inline">

  <div class="col-xs-3 sel">
 
<select class="form-control" id="areaList" onchange="getStreetList();">
 <option value="" >Select an Area</option>    

</select>
   
  </div> <p class="para">OR</p>
  <div class="col-xs-3 sel">
<select class="form-control"  id="streetList" >
 <option value="" >Select a Street</option>    

</select>
</div><p class="para">OR</p>
    <div class="col-xs-3 sel">
 
<select class="form-control" id="paidANDunpaid" >
  
 <option value="">Select Paid or Unpaid Customer</option>
<option value="paid">Paid Customer</option>
   <option value="unpaid"> Unpaid Customer</option>

</select>
      
  </div>
     <button type="button" class="btn btn-primary"  onclick="search()" >Search</button>

</div>
     <br/> <br/>       <br/>  
			<table id="excelDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        			<thead>
					<tr>
						<th>Cable Id</th>
                        <th>Customer Name</th>
                        <th>Installation Due</th>
                        <th>Rental Due</th>
                        <th>Street</th>
                        <th>Area</th>
                        <th>Mobile No</th>
                        <th>Address</th>
					</tr>
				</thead>
                <tbody id="tableBody1">
                </tbody>
     
    </table>
	</div>
        
      
        
             <script>
$(document).ready( function() {

    
    setTimeout(tableInit, 2000);
    
$.ajax({
  dataType: "json",
  url: "php/reportList.php",
  data: "",
  success: success
});
    
    $.ajax({
  dataType: "json",
  url: "php/table.Place.php",
  data: "",
  success: placeListCreate
});
    
    $.ajax({
  dataType: "json",
  url: "php/reportData.php",
  data: "",
  success: reportDataCreate
});    
    
} );
       
 var table1 ;
                 
function tableInit()
 {

         $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
      
     debugger;
        var installationDue = parseFloat( data[2] ) || 0;
        var rentalDue = parseFloat( data[3] ) || 0; 
        var street = data[4];
        
        
        if ( street == $("#streetList").val() && (installationDue>0 || rentalDue>0))
        {
            return true;
        }
        return false;
    }
);
    
     
     table1 = $('#excelDataTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'print','colvis','pdf','csv','copy'
        ]
    } );
     
 }
                 
 function search(){
	
      debugger;
    
    var areasearch = $('#areaList').val(); 
    var streetsearch = $('#streetList').val(); 
	var status = $('#paidANDunpaid').val();
     
                     
	var datas="&areasearch="+areasearch+"&streetsearch="+streetsearch+"&status="+status;
      
	$.ajax({
	   dataType: "json",
	   url: "php/search.php",
	   data: datas
	}).done(function( data ) {
        
	
         $('#tableBody1').html("");
     buildHtmlTable(data);
       
          
	});
    }  
                 
         
                 
// function refreshTable()
// {
//     debugger;
//     table1.draw();
// }
                 
                 
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
             
                 
    function placeListCreate(data)
    {
        debugger;
            data = data.data;
             for (var i = 0 ; i < data.length ; i++) {
         var rowHash = data[i];
                  var optionsAsString = "";
        
              optionsAsString += "<option value='" + rowHash["place"] + "'>" + rowHash["place"] + "</option>";
         
                 

$("#areaList").append( optionsAsString );         
     }
    }  
                 
    function getStreetList()
     {
        
           $.ajax({
  dataType: "json",
  url: "php/table.Street.php",
  data: "",
  success: streetListCreate
});
     }

    function streetListCreate(data)
    {
        $("#streetList").html( "" );  
        debugger;
            data = data.data;
                          var optionsAsString = "";
                optionsAsString += "<option value='' >Select a Street</option>";
             for (var i = 0 ; i < data.length ; i++) {
         var rowHash = data[i];

         if (rowHash["place"]==$("#areaList").val()) 
         {
              optionsAsString += "<option value='" + rowHash["streetname"] + "'>" + rowHash["streetname"] + "</option>";
         }
                   
     }
        
$("#streetList").append( optionsAsString );       
    }  
                 
 function reportDataCreate(data)
    {
           
        debugger;
             for (var i = 0 ; i < data.length ; i++) {
         var rowHash = data[i];
                 
                 totalCollection.innerText = rowHash["total"];
                 pendingCollection.innerText = rowHash["pending"];
                 totalConnections.innerText = rowHash["connections"];
                 
     }
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