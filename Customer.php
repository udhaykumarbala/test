<?php
session_start();
$cable_id = $_SESSION['cable_id'];
$name = $_SESSION['usr_name'];
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
	<title>RocketSMS</title>

  
    
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
        
    
    
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
 
	<body class="dataTables" >
		<div id="viewdata" class="container">
            <br/>
       
            <div >
<div class="row">
<div id="payButton"></div>

    <div class="col-xs-3">
        <button class="btn btn-info btn-block" data-toggle="modal" onclick="viewHistory()"><i class="fa fa-file"></i>  Payment History</button>
    </div>
    <div class="col-xs-3">
        <button class="btn btn-primary btn-block"  data-toggle="modal" data-target="#myModal3"><i class="fa fa-credit-card"></i> Online Payments </button>
    </div>
      <div class="col-xs-3">
        <button class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal4"><i class="fa fa-file"></i>  Add Complaints</button>
    </div>
    <div class="col-xs-3">
        <button class="btn btn-danger btn-block" data-toggle="modal" onclick="viewcomplaints()" ><i class="fa fa-file"></i>  View Complaints</button>
    </div>
    
    <br/>
    
     <div id="historyTable2">
        <br/> <br/>
    <table id="excelDataTable2" class="table table-striped table-bordered" cellspacing="0" width="80%">
            <thead>
					<tr>
						
                        <th>Complaints</th>
                        <th>Verified</th>
                        <th>Complained_date</th>
                        <th>Verified_date</th>
					</tr>
				</thead>
                <tbody id="tableBody3">
                </tbody>
    </table>
        <br/>
        <div  class="col-xs-3"> 
            <button id="historyClose"  onclick="clearHistoryTable2()" class="btn btn-alert btn-block" ><i class="fa fa-close"></i> Close </button>
    </div> 
     </div> 
    
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
   
                <hr>
            <h4><u>Customer Payment Status</u></h4>
            <br/>
			<table id="excelDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        			<thead>
					<tr>
                        <th>Customer Name</th>
						<th>Cable Id</th>
                        <th>Installation Charges</th>
                        <th>Installation Due</th>
                        <th>Monthly Rental</th>
                        <th>Rental Due</th>
					</tr>
				</thead>
                <tbody id="tableBody1">
                </tbody>
     
    </table>

		</div>
        
            
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Online Payments</h4>
      </div>
      <div class="modal-body">
        
<form id="form1">
 
<blockquote class="blockquote">
  <p class="m-b-0">This section will provide the details of all payments done online through the RocketSMS app. Currently this section is not active as the online payment is not available currently in RocketSMS.</p>
</blockquote>    

</form>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>        
           
            
            <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Complaints</h4>
      </div>
      <div class="modal-body">
        
<form id="form1">

<blockquote class="blockquote">
  <p class="m-b-0">You can add complaints related to connections....</p>
</blockquote>    
<div class="form-group">
     <label for="complaints">Type</label>
     <input type="text" placeholder=" Enter The Type Of Complaint " class="form-control" id="type">
    <br>
    <label for="complaints">Complaint Assign To</label>
    <input type="text" placeholder="Enter Your Cable Operator Name" class="form-control" id="assigncomplaints">
    <br>
    <label for="complaints">Brief Details About Complaint </label>
    <input type="text" placeholder="Enter Your Problem Briefly" class="form-control" id="addcomplaints">
   
  
  </div>
</form>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary"  onclick="addcomplaints()" data-dismiss="modal">Send</button>
      </div>
    </div>
  </div>
</div>  


        
             <script>
$(document).ready( function() {

  
    $( "#historyTable" ).toggle();
 $( "#historyTable2" ).toggle();
    
    setTimeout("$('#excelDataTable').DataTable();" , 2000);
    
$.ajax({
  dataType: "json",
  url: "php/PaymentConnectionList.php",
  data: "",
  success: success
});

} );
        
    function addcomplaints(){
	
      debugger;
    var type = $('#type').val();
    var assigncomplaints = $('#assigncomplaints').val();
    var addcomplaints = $('#addcomplaints').val(); 
    var cableid = "<?php echo $cable_id;  ?>";
    var name = "<?php echo $name;  ?>";
                    
	var datas={'type': type ,'assigncomplaints': assigncomplaints ,'addcomplaints': addcomplaints ,'cableid': cableid ,'name': name }
      
	$.ajax({
	   type: "POST",
	   url: "php/addcomplaints.php",
	   data: datas
	}).done(function( data ) {
     location.reload();
      
	});
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
               
    function buildHtmlTable2(data) {
    
     var columns = addAllColumnHeaders2(data);
 
     for (var i = 0 ; i < data.length ; i++) {
         var row$ = $('<tr/>');
         for (var colIndex = 0 ; colIndex < columns.length ; colIndex++) {
             var cellValue = data[i][columns[colIndex]];
 
             if (cellValue == null) { cellValue = ""; }
 
             row$.append($('<td/>').html(cellValue));
         }
         $("#excelDataTable2").append(row$);
     }
 }
 

 function addAllColumnHeaders2(data)
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
                            
           
               
    
       
 function viewcomplaints(){
      debugger;
	var cableId = "<?php echo $cable_id;  ?>";
	
	
debugger;
	var datas="&cableId="+cableId;
      
	$.ajax({
	   dataType: "json",
	   url: "php/viewcustomercomplaints.php",
	   data: datas
	}).done(function( data ) {
        debugger;
	
     buildHtmlTable2(data);
             $('#historyTable2').toggle();
         
	});
    }     
                 
  function viewHistory(){
      debugger;
	var cableId2 = "<?php echo $cable_id;  ?>";
	
	
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
         location.reload();
     }
                  function clearHistoryTable2()
     {
         $('#historyTable2').toggle();
          $('#excelDataTable2').html("");
         location.reload();
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