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
            
            
            
            
            
            
	           <li class="blue">
	            <a href="connection.php">
	                <i class="font-icon font-icon-users-group"></i>
	                <span class="lbl">Connections</span>
	            </a>
	        </li>
	        <li class="green opened">
	            <a href="street.php">
	                <i class="fa fa-road active"></i>
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
            <h4><u>Street List</u></h4><br/>
            <div class="row">
    <div class="col-xs-2">
        <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#myModal1"><i class="fa fa-user"></i> New</button>
    </div>
    <div class="col-xs-2">
        <button class="btn btn-success btn-block" onclick="getIndex1()"><i class="fa fa-file"></i>  Edit</button>
    </div>
    <div class="col-xs-2">
        <button class="btn btn-info btn-block" onclick="getIndex2()"><i class="fa fa-trash"></i>  Delete</button>
       
    </div>
   
                </div>
            <br/>
            <br/>
			<table id="street" class="table table-striped table-bordered" cellspacing="0">
				<thead>
					<tr>
                        <th>Serial No</th>
						<th>Street Name</th>
						<th>Area</th>
						<th>City</th>
                        <th>State</th>
					</tr>
				</thead>
			</table>
		</div>
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Street</h4>
      </div>
      <div class="modal-body">
        
<form id="form1">
  <div class="form-group">
    <label for="Area">Street Name</label>
    <input type="text" class="form-control" id="new_street">
  </div>
  <div class="form-group">
    <label for="place">Place</label><div id="place" onchange="place()" ></div>
  </div>
  <div class="form-group">
    <label for="city">City</label><div id="city1" ></div>
  </div>  
</form>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button"  onclick="savestreet()" data-dismiss="modal" class="btn btn-primary">Create Now</button>
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
        <button type="button"  onclick="deletestreet()" data-dismiss="modal" class="btn btn-primary">Yes</button>
      </div>
      </div>
    </div>
        </div>    
        
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Street</h4>
      </div>
      <div class="modal-body">
        
<form id="form1">

    <input type="hidden" readonly="true" class="form-control" id="id">
   
  <div class="form-group">
    <label for="Area">Street Name</label>
    <input type="text" class="form-control" id="cable_id">
  </div>
  
    <div class="form-group">
    <label for="place">Place</label>
      <select id="place_edit" onchange="check()" name="select" class="form-control">
    			 <option value="none">-Select-</option>
			 <?php
include "config.php";
$result = mysqli_query($link, "SELECT DISTINCT place FROM Place");
while ($row = mysqli_fetch_array($result)) 
{
?>
<option value="<?php echo $row['place'];?>" > <?php echo $row['place']; ?> </option>
<?php  
  }
mysqli_close($link);
?>
        </select>
    </div>
    
   
  <div class="form-group">
    <label for="city">City</label>

       <select id="city_change" onchange="statechange()" class="form-control"  >

    			 <option value="none">-Select-</option>

      </select>

  </div> 
      <div class="form-group">
    <label for="state">State</label>

         <select id="state_ch"  class="form-control"  >
    			  
            
        </select>
  </div>
   
</form>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button"  onclick="updatestreet()" data-dismiss="modal" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
        
    
	</body>
    <script>
        
        
        
 function updatestreet()
{
debugger;
    var id = $('#id').val();
    var street = $('#cable_id').val();
   var area = $('#place_edit').val();
    var city = $('#city_change').val();
    var state = $('#state_ch').val();
  
    
    
        
      var datas1={'id': id, 'street': street, 'area': area ,'city': city, 'state': state }
      
$.ajax({
	   type: "POST",
	   url: "php/updatestreet.php",
	   data: datas1
	}).done(function( data ) {
      location.reload();
	});
}
    
function deletestreet()
 {
 debugger;
                    
     var cable_id = $('#cable_idd').val();                 
   	$.ajax({
	   type: "GET",
	   url: "php/deletestreet.php?cable_id="+cable_id
	}).done(function( data ) {
 location.reload();
	});
 }
        
var table;
                     
function tableInit1()
 {
     debugger;
  table = $('#street').DataTable({
        select: {
            style: 'single'
        }
    } );
         
 }  
       
function savestreet()
{
debugger;

           var street = $('#new_street').val();
           var place = $('#area').val();
           var city = $('#city').val();
           var state = $('#state').val();
        
         var datas={'street': street ,'place': place, 'city': city ,'state': state }
      
$.ajax({
	   type: "POST",
	   url: "php/savestreet.php",
	   data: datas
	}).done(function( data ) {
	});
    location.reload();
    }
        
     
$(street).ready( function() {

    
    setTimeout(tableInit, 2000);
    
$.ajax({
  dataType: "json",
  url: "php/streetobj.php",
  data: "",
  success: success
});  
} );

function tableInit1()
    {
        $('#street').DataTable();
    }
    var table;
                     
function tableInit()
 {
  table = $('#street').DataTable({
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
    
}
        
function getIndex2()
{
    debugger;
            var test = table.rows('.selected').data();
            $('#myModal2').modal('show');
            $('#cable_idd').val(test[0][0]);
                     
}                     
 function getIndex1()
{
 debugger;
            var test = table.rows('.selected').data();
            $('#myModal').modal('show');
            $('#id').val(test[0][0]);
            $('#cable_id').val(test[0][1]);
            $('#area').val(test[0][2]);
            $('#city_edit').val(test[0][3]);
            $('#state').val(test[0][4]);
  
    
    
    $("#area").attr("value", test[0][2]);
    var optionValue2  = $("#area").val();

    $("#place_edit").val(optionValue2)

    
    $.ajax({
  dataType: "json",
  url: "php/GetSiblingArea.php",
  data: "&cityName="+test[0][2],
  success: function(data){            
	    $.each(data, function(i, value) {
            
            $('#city_change').append($('<option>').text(data[i].name).attr('value', data[i].name));
            $('#city_change').val(test[0][3]);
        });
		}
} ); 
 
    $.ajax({
  dataType: "json",
  url: "php/getSiblingStatesStreet.php",
  data: "&stateName="+test[0][3],
  success: function(data){            
	    $.each(data, function(i, value) {
            
            $('#state_ch').append($('<option>').text(data[i].name).attr('value', data[i].name));
            $('#state_ch').val(test[0][4]);
        });
		}
} );       
    
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
         $("#street").append(row$);
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
           

 $(document).ready( function() {
    
    
       $.ajax({
	   type: "GET",
	   url: "php/streetcity.php"
      }).done(function( data ) {
	  $('#place').html(data);
      });
 
   
    
} );
       function place(){
        debugger;
	
		 var e = document.getElementById("area");
        var area = e.options[e.selectedIndex].text;
	  
	    $.ajax({
	    type: "POST",
	    url: "php/streetplace.php",
	    data: "&area="+area,
	    success: function(data){
	    $('#city1').html(data);
		}
	});
	}
        
        function check(){
            debugger;
             var e = document.getElementById("place_edit");
        var place_ed = e.options[e.selectedIndex].text;
            
                       $.ajax({
  dataType: "json",
  url: "php/GetSiblingArea.php",
  data: "&cityName="+place_ed,
  success: function(data){     
      $('#city_change').html("");
          $('#city_change').append($('<option>').text("select").attr('value',"none"));
	    $.each(data, function(i, value) {
           
            $('#city_change').append($('<option>').text(data[i].name).attr('value', data[i].name)); 

        });
		}
} );
  
   }
            function statechange(){
        debugger;
	
		 var e = document.getElementById("city_change");
        var city_edit = e.options[e.selectedIndex].text;

                      $.ajax({
  dataType: "json",
  url: "php/GetSiblingState_change.php",
  data: "&stateName="+city_edit,
  success: function(data){     
      $('#state_ch').html("");
	    $.each(data, function(i, value) {
            
            
            $('#state_ch').append($('<option>').text(data[i].name).attr('value', data[i].name));
        });
		}
} );   
      
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