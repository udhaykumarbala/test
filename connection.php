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
            
            
            
            
	        <li class="blue opened">
	            <a href="connection.php">
	                <i class="font-icon font-icon-users-group active"></i>
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
 
    
	<body class="dataTables">
		<div id="viewdata" class="container">

			            <h4><u>Connection List</u></h4>
             <br/>
            <div class="row">
    <div class="col-xs-2">
        <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#myModal1"><i class="fa fa-user"></i> New</button>
    </div>
    <div class="col-xs-2">
        <button class="btn btn-success btn-block" onclick="getIndex()"><i class="fa fa-file"></i>  Edit</button>
    </div>
    <div class="col-xs-2">
        <button class="btn btn-info btn-block" onclick="getIndex1()"><i class="fa fa-trash"></i>  Delete</button>
    </div>
   
                </div>
            <br/>
             <br/> 
			<table id="cableconnect" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
				    <tr>
						<th>Name</th>
						<th>Cable Id</th>
						<th>Street</th>
						<th>Area</th>
						<th>Address</th>
						<th>Mobile No</th>
						<th>Email Id</th>
						<th>Activation Date</th>
						<th>STB No</th>
						<th>VC Model</th>
						<th>Connection Status</th>
					</tr>
				</thead>
			</table>

		</div>
        
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Customer</h4>
      </div>
      <div class="modal-body">
        
<form id="form1">
  <div class="form-group">
    <label for="cableId">Cable Id</label>
    <input type="text" readonly="true" class="form-control" id="cable_id">
  </div>
  <div class="form-group">
    <label for="customerName">Name</label>
    <input type="text" class="form-control" id="name">
  </div>
<input type="hidden" class="form-control" id="place4" >
    <div class="form-group">
    <label for="customerArea">Area</label>
    <select id="place5" name="select" class="form-control" onchange="showstreet3()" >
    	
			 <?php
include "config.php";
$result = mysqli_query($link, "SELECT  DISTINCT place FROM Place");
while ($row = mysqli_fetch_array($result)) 
{
?>

        
        <option value="<?php echo $row['place'];?>" > <?php echo $row['place']; ?> </option>

<?php      
}

?>
          </select>
    </div>
    
   
    
    <div class="form-group">
         <label for="customerArea">Street</label>
       <select id="street_edit" name="select" class="form-control" >
                <option value="none">-Select-</option>
            
         </select>
  </div> 
    <div class="form-group">
    <label for="customerArea">Address</label>
    <input type="text" class="form-control" id="address">
  </div> 
    <div class="form-group">
    <label for="customerArea">Mobile No</label>
    <input type="text" class="form-control" id="mobile_no">
  </div> 
    <div class="form-group">
    <label for="customerArea">Email Id</label>
    <input type="text" class="form-control" id="email_id">
  </div> 
    <div class="form-group">
    <label for="customerArea">Activation Date</label>
    <input type="text" class="form-control" id="activation_date">
  </div> 
    <div class="form-group">
    <label for="customerArea">STD NO</label>
    <input type="text" class="form-control" id="stb_no">
  </div>  
    <div class="form-group">
    <label for="customerArea">VC Model</label>
    <input type="text" class="form-control" id="vc_model">
  </div>  

    
    <div class="form-group">
   <label for="customerArea1">Connection Status</label>
   <select class="form-control" id="connection_status">
       <option>--Select--</option>
       <option value="active">Active</option>
   <option value="inactive">In Active</option></select>

 </div>
</form>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="save" onclick="updateCustomer()" data-dismiss="modal" class="btn btn-primary">Update Now</button>
      </div>
    </div>
  </div>
</div>     
        
        
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Customer</h4>
      </div>
      <div class="modal-body">
        
<form id="form1">
  <div class="form-group">
    <label for="cableId1">Cable Id</label>
    <input type="text" class="form-control" id="cable_id1">
  </div>
  <div class="form-group">
    <label for="customerName1">Name</label>
    <input type="text" class="form-control" id="name1">
  </div>
  <div class="form-group">
    <label for="customerArea1">Area</label>
 
      <div id="showplace" onchange="openstreet()"></div>
  </div>
    <div class="form-group">
    <label for="customerArea1">Street</label>
 
        <div id="showstreet" ></div>
  </div> 
    <div class="form-group">
    <label for="customerArea1">Address</label>
    <input type="text" class="form-control" id="address1">
  </div> 
    <div class="form-group">
    <label for="customerArea1">MobileNo</label>
    <input type="text" class="form-control" id="mobile_no1">
  </div> 
    <div class="form-group">
    <label for="customerArea1">Email Id</label>
    <input type="text" class="form-control" id="email_id1">
  </div> 
    <div class="form-group">
    <label for="customerArea1">Activation date</label>
    <input type="date" class="form-control" id="activation_date1">
  </div> 
    <div class="form-group">
    <label for="customerArea1">STB NO</label>
    <input type="text" class="form-control" id="stb_no1">
  </div> 
    <div class="form-group">
    <label for="customerArea1">VC MODEL</label>
    <input type="text" class="form-control" id="vc_model1">
  </div>  
    <div class="form-group">
   <label for="customerArea1">Connection Status</label>
   <select class="form-control" id="connection_status1">
       <option>--Select--</option>
       <option value="active">Active</option>
   <option value="inactive">In Active</option></select>

 </div>   
</form>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="save" onclick="saveCustomer()" data-dismiss="modal" class="btn btn-primary">Create Now</button>
      </div>
    </div>
  </div>
</div> 
        
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Customer</h4>
      </div>
      <div class="modal-body">
          <h4> Do you want to delete this record</h4>
          <input type="hidden" class="form-control" id="cable_idd">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" id="save" onclick="deletecustomer()" data-dismiss="modal" class="btn btn-primary">Yes</button>
      </div>
      </div>
    </div>
        </div>
                 <script>
                     
                     
    function saveCustomer()
{
    debugger;

   var name = $('#name1').val();
            var cable_id = $('#cable_id1').val();
            var e = document.getElementById("place1");
            var place = e.options[e.selectedIndex].text; 
            var e = document.getElementById("street1");
            var street = e.options[e.selectedIndex].text;
            var address = $('#address1').val();
            var mobile_no = $('#mobile_no1').val();
            var email_id = $('#email_id1').val();
            var activation_date = $('#activation_date1').val(); 
            var stb_no = $('#stb_no1').val();
            var vc_model = $('#vc_model1').val();
            var connection_status = $('#connection_status1').val();
  
    
      var datas={'name': name, 'cable_id': cable_id ,'street': street, 'place': place ,'address': address, 'mobile_no': mobile_no, 'email_id': email_id ,'activation_date': activation_date, 'stb_no': stb_no ,'vc_model': vc_model, 'connection_status': connection_status }
      
$.ajax({
	   type: "POST",
	   url: "php/savecustomer.php",
	   data: datas
	}).done(function( data ) {
     location.reload();
      
	});
    }                 
                     
                     
   function updateCustomer()
{
debugger;
   var cable_id = $('#cable_id').val();
    var name = $('#name').val();
   var place = $('#place5').val();
    var street = $('#street_edit').val();
    var address = $('#address').val();
   var mobile_no = $('#mobile_no').val(); 
    var email_id = $('#email_id').val();
    var activation_date = $('#activation_date').val();
   var stb_no = $('#stb_no').val();  
    var vc_model = $('#vc_model').val();
   var connection_status = $('#connection_status').val();
    
   
        
      var datas1={'name1': name, 'cable_id1': cable_id ,'street1': street, 'place1': place ,'address1': address, 'mobile_no1': mobile_no, 'email_id1': email_id ,'activation_date1': activation_date, 'stb_no1': stb_no ,'vc_model1': vc_model, 'connection_status1': connection_status }
      
$.ajax({
	   type: "POST",   
	   url: "php/updatecustomer.php",
	   data: datas1
	}).done(function( data ) {
    location.reload();
      
	});
}
    
function deletecustomer()
 {
 debugger;
                    
     var cable_id = $('#cable_idd').val();                 
   	$.ajax({
	   type: "GET",
	   url: "php/deletecustomer.php?cable_id="+cable_id
	}).done(function( data ) {
         location.reload();

	});
 }
                
                     
    function openstreet(){
    debugger;

        var e = document.getElementById("place1");
        var place = e.options[e.selectedIndex].text;

        $.ajax({
        type: "POST",
        url: "php/showstreet.php",
        data: "&place="+place,
        success: function(data){
        $('#showstreet').html(data);
    }
    });
    }
                     
$(document).ready( function() {

    debugger;
    
    
         $.ajax({
	   type: "GET",
	   url: "php/showplace.php"
      }).done(function( data ) {
	  $('#showplace').html(data);
      });
  
    setTimeout(tableInit, 2000);
    
$.ajax({
  dataType: "json",
  url: "php/connectionList1.php",
  data: "",
  success: success
});     
} );

   var table;
                     
function tableInit()
 {
    
  table = $('#cableconnect').DataTable({
     
        select: {
            style: 'single'
        }
    } );

 }
 
                     
function getIndex()
{
  debugger;
    var test = table.rows('.selected').data();
            $('#myModal').modal('show');
            $('#name').val(test[0][0]);
            $('#cable_id').val(test[0][1]);
            $('#street').val(test[0][2]);
            $('#place').val(test[0][3]);
            $('#address').val(test[0][4]);
            $('#mobile_no').val(test[0][5]);
            $('#email_id').val(test[0][6]);
            $('#activation_date').val(test[0][7]);
            $('#stb_no').val(test[0][8]);
            $('#vc_model').val(test[0][9]);
            $('#connection_status').val(test[0][10]);
      $("#place4").attr("value", test[0][3]);
   
var optionValue  = $("#place4").val();
$("#place5").val(optionValue)
 

 $.ajax({
 dataType: "json",
 url: "php/connectioneditstreet.php",
 data: "&areaName="+test[0][3],
 success: function(data){            
        $.each(data, function(i, value) {
          
           $('#street_edit').append($('<option>').text(data[i].name).attr('value', data[i].name));
           $('#street_edit').val(test[0][2]);
       });
        }
} );   
   
}
                     

function showstreet3(){
       debugger;
    
         var e = document.getElementById("place5");
       var name5 = e.options[e.selectedIndex].text;
      
      $.ajax({
 dataType: "json",
 url: "php/connectioneditstreet.php",
 data: "&areaName="+name5,
 success: function(data){            
         $('#street_edit').html("");
	    $.each(data, function(i, value) {
      
        $('#street_edit').append($('<option>').text(data[i].name).attr('value', data[i].name)); 

        });
		}
} ); 
    }
                     
                     
                     
 function getIndex1()
{
    debugger;
            var test = table.rows('.selected').data();
            $('#myModal2').modal('show');
            $('#cable_idd').val(test[0][1]);
                     
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
         $("#cableconnect").append(row$);
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