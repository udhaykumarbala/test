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
            
            <li class="black opened">
	            <a href="department.php">
	                <i class="fa fa-building active"></i>
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

			            <h4><u>department List</u></h4>
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
						<th>id</th>
						<th>name</th>
						<th>degree</th>
						<th>dept</th>
						
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
    <label for="id">id</label>
    <input type="text" readonly="true" class="form-control" id="id">
  </div>
  <div class="form-group">
    <label for="customerName">name</label>
    <input type="text" class="form-control" id="name">
  </div>

    
    
    <div class="form-group">
    <label for="customerArea">degree</label>
    <input type="text" class="form-control" id="degree">
  </div> 
    <div class="form-group">
    <label for="customerArea">dept</label>
    <input type="text" class="form-control" id="dept">
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
    <label for="id">id</label>
    <input type="text" readonly="true" class="form-control" id="id1">
  </div>
  <div class="form-group">
    <label for="customerName">name</label>
    <input type="text" class="form-control" id="name1">
  </div>

    
    
    <div class="form-group">
    <label for="customerArea">degree</label>
    <input type="text" class="form-control" id="degree1">
  </div> 
    <div class="form-group">
    <label for="customerArea">dept</label>
    <input type="text" class="form-control" id="dept1">
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
          <input type="hidden" class="form-control" id="idd">
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

           var id = $('#id1').val();
           var name = $('#name1').val();
            var degree = $('#degree1').val();
            var dept = $('#dept1').val();
           
    
      var datas={'id': id,'name': name, 'degree': degree ,'dept': dept}  
      
$.ajax({
	   type: "POST",
	   url: "php/savecustomer5.php",
	   data: datas
	}).done(function( data ) {
     location.reload();
      
	});
    }                 
                     
                     
   function updateCustomer()
{
debugger;
   var id = $('#id').val();
    var name = $('#name').val();
   var degree = $('#degree').val();
    var dept = $('#dept').val();
   
      var datas1={'id1': id,'name1': name, 'degree1': degree ,'dept1': dept}
      
$.ajax({
	   type: "POST",   
	   url: "php/updatecustomer5.php",
	   data: datas1
	}).done(function( data ) {
    location.reload();
      
	});
}
    
function deletecustomer()
 {
 debugger;
                    
     var idd= $('#idd').val();                 
   	$.ajax({
	   type: "GET",
	   url: "php/deletecustomer5.php?idd="+idd
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
  url: "php/deptlist.php",
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
            $('#id').val(test[0][0]);
            $('#name').val(test[0][1]);
            $('#degree').val(test[0][2]);
            $('#dept').val(test[0][3]);
           
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
            $('#idd').val(test[0][0]);
                     
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