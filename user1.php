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
            
              <li class="white opened">
	            <a href="user1.php">
	                <i class="fa fa-user active"></i>
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

			            <h4><u>Users List</u></h4>
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
   
                
            
            <div class="col-xs-3 sel">
        
              <div class="form-group">
    <label for="customerArea">dept</label>            
    <select id="dept" name="select" class="form-control">
    	<option value="" >Select the Department name</option>
			 <?php
include "config.php";
$result = mysqli_query($link, "SELECT  DISTINCT dept FROM userdetails");
while ($row = mysqli_fetch_array($result)) 
{
?>

        
        <option value="<?php echo $row['dept'];?>" > <?php echo $row['dept']; ?> </option>

<?php      
}

?>
          </select>
    </div>
        <button type="button" class="btn btn-primary"  onclick="departmentselect5()" >Search</button>
            
                </div> 
            
        </div>
            <br/>
             <br/> 
			<table id="userdetails" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
				    <tr>
						<th>id</th>
						<th>Name</th>
						<th>Cable_Id</th>
						<th>Email_Id</th>
						<th>password</th>
						<th>dob</th>
						<th>img</th>
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
    <label for="Id">id</label>
    <input type="text" readonly="true" class="form-control" id="id">
  </div>
  <div class="form-group">
    <label for="customerName">Name</label>
    <input type="text" class="form-control" id="name">
  </div>
    
    
    <div class="form-group">
    <label for="customerName">Cable_Id </label>
    <input type="text" class="form-control" id="cable_id">
  </div>

    <div class="form-group">
    <label for="customerArea">Email_Id</label>
    <input type="text" class="form-control" id="email_id">
  </div> 
    <div class="form-group">
    <label for="customerArea">password</label>
    <input type="text" class="form-control" id="password">
  </div> 
    <div class="form-group">
    <label for="customerArea">dob</label>
    <input type="date" class="form-control" id="dob">
  </div>  
   
    
    <div class="form-group">
    <label for="userImage_1">img
    <input type="file" class="form-control" onchange="imageUploads()"id="userImage_1"></label>
  </div><input type="hidden"  id="img"> 
     
    
    
    
     <div class="form-group">
    <label for="customerArea">dept</label>
    <select id="dept" name="select" class="form-control" onchange="showstreet3()" >
    	<option value="" >Select the Department name</option>
			 <?php
include "config.php";
$result = mysqli_query($link, "SELECT  DISTINCT dept FROM department");
while ($row = mysqli_fetch_array($result)) 
{
?>

        
        <option value="<?php echo $row['dept'];?>" > <?php echo $row['dept']; ?> </option>

<?php      
}

?>
          </select>
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
    <label for="Id">id</label>
    <input type="text" readonly="true" class="form-control" id="id1">
  </div>
    <div class="form-group">
    <label for="customerName">Name</label>
    <input type="text" class="form-control" id="name1">
  </div>
    
    
    <div class="form-group">
    <label for="customerName">Cable_Id </label>
    <input type="text" class="form-control" id="cable_id1">
  </div>

    <div class="form-group">
    <label for="customerArea">Email_Id</label>
    <input type="text" class="form-control" id="email_id1">
  </div> 
    <div class="form-group">
    <label for="customerArea">password</label>
    <input type="text" class="form-control" id="password1">
  </div> 
    <div class="form-group">
    <label for="customerArea">dob</label>
    <input type="date" class="form-control" id="dob1">
  </div>  
    
    
    
     <div class="form-group">
    <label for="userImage12">img
    <input type="file" class="form-control"  onchange="imageUploads1()"id="userImage12"></label>
  </div><input type="hidden"  id="img1">   
    
    
    
   <div class="form-group">
    <label for="customerArea">dept</label>
    <select id="dept1" name="select" class="form-control" onchange="showstreet3()" >
    	<option value="" >Select the Department name</option>
        
			 <?php
include "config.php";
$result = mysqli_query($link, "SELECT  DISTINCT dept FROM department");
while ($row = mysqli_fetch_array($result)) 
{
?>

        
        <option value="<?php echo $row['dept'];?>" > <?php echo $row['dept']; ?> </option>

<?php      
}

?>
          </select>
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

           
           
            var id = $('#id1').val();
            var name = $('#name1').val();
            var cable_id = $('#cable_id1').val();
            var email_id = $('#email_id1').val();
            var password = $('#password1').val(); 
            var dob = $('#dob1').val();
            var img = $('#img1').val();
            var dept = $('#dept1').val();
  
    
      var datas={'id': id,'name': name, 'cable_id': cable_id, 'email_id': email_id ,'password': password, 'dob': dob ,'img': img, 'dept': dept }
      
$.ajax({
	   type: "POST",
	   url: "php/savecustomer1.php",
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
      var cable_id = $('#cable_id').val();
    var email_id = $('#email_id').val();
    var password = $('#password').val();
   var dob = $('#dob').val();  
    var img = $('#img').val();
   var dept = $('#dept').val();
    
   
        
      var datas1={'id1': id,'name1': name, 'cable_id1': cable_id , 'email_id1': email_id ,'password1': password, 'dob1': dob ,'img1': img, 'dept1': dept }
      
$.ajax({
	   type: "POST",
	   url: "php/updatecustomer1.php",
	   data: datas1
	}).done(function( data ) {
    location.reload();
      
	});
}
    
function deletecustomer()
 {
 debugger;
                    
     var cable_idd = $('#cable_idd').val();                 
   	$.ajax({
	   type: "GET",
	   url: "php/deletecustomer1.php?cable_idd="+cable_idd
	}).done(function( data ) {
         location.reload();

	});
 }
                
     function departmentselect5(){

    debugger;
        
        var dept=$('#dept').val();
        
        var datas={'dept':dept};

        $.ajax({
            
 type: "POST",     
  dataType: "json",
  url: "php/departmentselect5.php",
  data: datas,
  success: select
         
});   
 }   
    function select(data){
   debugger;
        table.clear();
        table.destroy();
        
        
        buildHtmlTable(data);    
        tableInit1();
        
    }  
                     
       
         var table; 
                     
       function tableInit()
 {     
    
  table = $('#userdetails').DataTable({
     
        select: {
            style: 'single'
        }
    });

 }               
                     
 
    function tableInit1()
 {     
    $('#userdetails').DataTable().destroy();
  table = $('#userdetails').DataTable({
     
        select: {
            style: 'single'
        }
    } );

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
  url: "php/user1list.php",
  data: "",
  success: success
});     
} );
                     
 function imageUploads()
{
    debugger;
        console.log("in uploading....");
        var myFormData = new FormData();
        myFormData.append('userImage_1', userImage_1.files[0]);
   
  
        var img= userImage_1.files[0].name;

        document.getElementById('img').value = img;

$.ajax({
    url: 'php/imageuploads.php',
    type: 'POST',
    processData: false,
    contentType: false,
    data: myFormData,
    success: function(data)
    
            {
                alert(data);
            $("#targetLayer").html(data);
            },
              error: function()  
    {
        
    }
});
}     function imageUploads1()
{
    debugger;
        console.log("in uploading....");
        var myFormData = new FormData();
        myFormData.append('userImage12', userImage12.files[0]);
   
  
        var img= userImage12.files[0].name;

        document.getElementById('img1').value = img;

$.ajax({
    url: 'php/imageuploads1.php',
    type: 'POST',
    processData: false,
    contentType: false,
    data: myFormData,
    success: function(data)
    
            {
                alert(data);
            $("#targetLayer").html(data);
            },
              error: function()  
    {
        
    }
});
}     
     
     
                         
                     
                     

   
                     
function getIndex()
{
    debugger;
         var test = table.rows('.selected').data();
            $('#myModal').modal('show');
            $('#id').val(test[0][0]);
            $('#name').val(test[0][1]);
            $('#cable_id').val(test[0][2]);
            $('#email_id').val(test[0][3]);
            $('#password').val(test[0][4]);
            $('#dob').val(test[0][5]);
            $('#img').val(test[0][6]);
            $('#dept').val(test[0][7]);
      

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
                     


                     
                     
 function getIndex1()
{
    debugger;
            var test = table.rows('.selected').data();
            $('#myModal2').modal('show');
            $('#cable_idd').val(test[0][2]);
                     
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
         $("#userdetails").append(row$);
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