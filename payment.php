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
	                </div>
	
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
	        <li class="gold opened">
	            <a href="payment.php">
	                <i class="fa fa-money active"></i>
	                <span class="lbl">Payments</span>
	            </a>
	        </li>
       
	        <li class="orange-red">
	            <a href="report.php">
	                <i class="font-icon font-icon-chart"></i>
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
            
             <h4><u>Customer Payment Status</u></h4>
                <br>
        
            <div >
               
<div class="row">
<div id="payButton"></div>
    <div class="col-xs-3">
        <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i> Pay Customer Bill</button>
    </div>
    <div class="col-xs-3">
        <button class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal1"><i class="fa fa-file"></i>  Generate Bill</button>
    </div>
    <div class="col-xs-3">
        <button class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal2"><i class="fa fa-file"></i>  Payment History</button>
    </div>
    
<!--
    <div class="col-xs-3">
        <button class="btn btn-primary btn-block"  data-toggle="modal" data-target="#myModal3"><i class="fa fa-user"></i> Customer Status </button>
    </div>
-->
   
    <br/>
    
    <div id="historyTable">
        <br/> <br/>
    <table id="excelDataTable1" class="table table-striped table-bordered" cellspacing="0" width="80%">
            <thead>
					<tr>
						<th>Cable Id</th>
                        <th>Customer Name</th>
                        <th>Payment Amount</th>
                        <th>Payment Date</th>
                        <th>Collection Agent</th>
					</tr>
				</thead>
                <tbody id="tableBody2">
                </tbody>
    </table>
        <br/>
        <div id="historyButton" class="col-xs-3"> 
            <button id="historyClose"  onclick="clearHistoryTable()" class="btn btn-alert btn-block" ><i class="fa fa-close"></i> Close </button>
    </div> 
        </div>    
</div>
   
                <br>
            
            <br/>
			<table id="excelDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        			<thead>
					<tr>
						<th>Cable Id</th>
                        <th>Customer Name</th>
                        <th>Installation Charges</th>
                        <th>Installation Due</th>
                        <th>Monthly Rental</th>
                        <th>Rental Due</th>
					</tr>
				</thead>
                <tbody id="tableBody">
                </tbody>
     
    </table>

		</div>
        
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pay Customer Bill</h4>
      </div>
      <div class="modal-body">
        
<form id="form1">
    <blockquote class="blockquote">
  <p class="m-b-0">Kindly check the Cable Id of the customer and the payment amount entered. Payment once done cannot be reversed.</p>
</blockquote>  
  <div class="form-group">
    <label for="cableId">Cable Id</label>
    <input type="text" class="form-control" id="cableId">
  </div>
  <div class="form-group">
    <label for="amount">Amount</label>
    <input type="text" class="form-control" id="amount">
  </div>
</form>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="save" onclick="savePayment()" data-dismiss="modal" class="btn btn-primary">Pay Now</button>
      </div>
    </div>
  </div>
</div>       

            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Generate Bill</h4>
      </div>
      <div class="modal-body">
        
<form id="form1">
 
<blockquote class="blockquote">
  <p class="m-b-0">Generating bill process will create monthly bills for the below mentioned amount for all customers. Kindly review the amount and confirm to generate the bills for all.</p>
</blockquote>    
  <div class="form-group">
    <label for="amount1">Amount</label>
    <input type="text" class="form-control" id="amount1">
  </div>
</form>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="save" onclick="generateBill()" data-dismiss="modal" class="btn btn-primary">Generate Bill Now</button>
      </div>
    </div>
  </div>
</div>  
            
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Payment History</h4>
      </div>
      <div class="modal-body">
        
<form id="form1">
 
<blockquote class="blockquote">
  <p class="m-b-0">Enter the Cable Id of the customer for whom the payment history is required. Kindly note that the payments made with RocketSMS only will be provided.</p>
</blockquote>    
  <div class="form-group">
    <label for="cableId2">Cable Id</label>
    <input type="text" class="form-control" id="cableId2">
  </div>
</form>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="save" onclick="viewHistory()" data-dismiss="modal" class="btn btn-primary">View Payment History</button>
      </div>
    </div>
  </div>
</div>       
            
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Customer Status</h4>
      </div>
      <div class="modal-body">
        
<form id="form1">
 
  <div class="form-group">
    <label for="cableId">Cable Id OR mobile_no</label>
    <input type="text" class="form-control" id="cableidstatus">
  </div>


</form>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="reload()" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="customerstatus()" >Submit</button>
          <div id="idDetails" ></div>
      </div>
    </div>
  </div>
</div>                   


        
             <script>
$(document).ready( function() {

    $( "#historyTable" ).toggle();
   
    
    setTimeout("$('#excelDataTable').DataTable();" , 2000);
    
$.ajax({
  dataType: "json",
  url: "php/paymentList.php",
  data: "",
  success: success
});
   
} );
            
  function reload(){
                     
      location.reload();
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
                 
function buildHtmlTable1(data) {
     var columns = addAllColumnHeaders1(data);
 
     for (var i = 0 ; i < data.length ; i++) {
         var row$ = $('<tr/>');
         for (var colIndex = 0 ; colIndex < columns.length ; colIndex++) {
             var cellValue = data[i][columns[colIndex]];
 
             if (cellValue == null) { cellValue = ""; }
 
             row$.append($('<td/>').html(cellValue));
         }
         $("#excelDataTable1").append(row$);
     }
 }
 
 
 function addAllColumnHeaders1(data)
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
                 
     function savePayment(){
	
	var cableId = $('#cableId').val();
	var amount = $('#amount').val();

	var datas="&cableId="+cableId+"&amount="+amount;
      
	$.ajax({
	   type: "POST",
	   url: "php/makePayment.php",
	   data: datas
	}).done(function( data ) {
        debugger;
	  $('#payButton').append(data);
               $("#tableBody").html("");
        $.ajax({
  dataType: "json",
  url: "php/paymentList.php",
  data: "",
  success: success
}); 
	});
    }
                 

    function generateBill(){
	
	var amount1 = $('#amount1').val();
debugger;
	var datas="&amount="+amount1;
      
	$.ajax({
	   type: "POST",
	   url: "php/generateBill.php",
	   data: datas
	}).done(function( data ) {
        debugger;
	  $('#payButton').append(data);
    
        $("#tableBody").html("");
        $.ajax({
  dataType: "json",
  url: "php/paymentList.php",
  data: "",
  success: success
});
    
	});
    }
       
                 
   function customerstatus(){
	
      debugger;
                     
	var cableid = $('#cableidstatus').val();


                     
	var datas="&cableid="+cableid;
      
      
	$.ajax({
	  type: "POST",
	   url: "php/showcustomerstatus.php",
	   data: datas
	}).done(function( data ) {
   $("#idDetails").html(data);
	

	});
    }   
                 
  function viewHistory(){
	
	var cableId2 = $('#cableId2').val();
debugger;
	var datas="&cableId="+cableId2;
      
	$.ajax({
	   dataType: "json",
	   url: "php/paymentHistory.php",
	   data: datas
	}).done(function( data ) {
        debugger;
	
     buildHtmlTable1(data);
             $('#historyTable').toggle();
	});
    }       
                 
    function clearHistoryTable()
     {
         $('#historyTable').toggle();
          $('#excelDataTable1').html("");
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