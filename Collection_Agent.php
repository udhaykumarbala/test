<?php
session_start();
$collection_agent = $_SESSION['usr_name'];
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
        <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user"></i> Pay Customer Bill</button>
    </div>

    <div class="col-xs-3">
        <button class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal2"><i class="fa fa-file"></i>  Payment History</button>
    </div>

    
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
   
                <hr>
            <h4><u>Customer Payment Status</u></h4>
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
                <tbody id="tableBody1">
                </tbody>
     
    </table>

		</div>
        </div>
    </body>
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pay Customer Bill</h4>
      </div>
      <div class="modal-body">
        

    <blockquote class="blockquote">
  <p class="m-b-0">Kindly check the Cable Id of the customer and the payment amount entered. Payment once done cannot be reversed.</p>
</blockquote>  
  <div class="form-group">
    <label for="cableId">Cable Id</label>
    <input type="text" class="form-control" id="cableId">
      
     
     <br>
      <button onclick="CableidDetails()" class="btn btn-primary">Submit</button>
 <div id="idDetails"></div>
  </div>
  <div class="form-group">
    <label for="amount">Amount</label>
    <input type="text" class="form-control" id="amount">
  </div>

          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="reload()" data-dismiss="modal">Close</button>
        <button type="button" id="save1" onclick="savePayment()" data-dismiss="modal" class="paynow btn btn-primary">Pay Now</button>
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
     
             <script>
                 
$(document).ready( function() {
 document.getElementById("save1").disabled = true;
   
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
               
 function CableidDetails(){
     
     debugger;
        
    var cableId = $('#cableId').val(); 
        
      var datas="&cableId="+cableId;
                         
        $.ajax({
            type: "POST",
            url: "php/agentcheck.php",
            data: datas
	}).done(function( data ) {
            $("#idDetails").html(data);
             document.getElementById("save1").disabled = false;
        })  
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
     
     debugger;
	
	var cableId = $('#cableId').val();
	var amount = $('#amount').val();
        var collection_agent = "<?php echo $collection_agent; ?> ";

	var datas="&cableId="+cableId+"&amount="+amount+"&collection_agent="+collection_agent;
      
	$.ajax({
	   type: "POST",
	   url: "php/makePayment.php",
	   data: datas
	}).done(function( data ) {
        debugger;
	  $('#payButton').append(data);
               $("#tableBody1").html("");
        $.ajax({
  dataType: "json",
  url: "php/paymentList.php",
  data: "",
  success: success
}); 
	}); location.reload();
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
    
        $("#tableBody1").html("");
        $.ajax({
  dataType: "json",
  url: "php/paymentList.php",
  data: "",
  success: success
});
    
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