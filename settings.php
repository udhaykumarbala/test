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
    <script type="text/javascript" charset="utf-8" src="js/table.Place.js"></script>
    
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
	        <li class="magenta ">
	            <a href="place.php">
	                <i class="fa fa-map-marker "></i>
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
            <li class="blue opened">
	            <a href="settings.php">
	                <i class="fa fa-cog active"></i>
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

			  <h4><u>Import Customers</u></h4>
       
			<blockquote class="blockquote">
  <p class="m-b-0">Import Customer Details </p>
</blockquote>
            
            <div class="row">                

                <div class="col-lg-4">

    <label><input type="file" id="file1"   onchange="checkFile1()"/></label>
        
</div>   
    
 <div class="col-lg-4">
<button class="btn btn-info" type="submit"id="submitButton1" onclick="readCSV1()" disabled="disabled" style="width:228px;">Upload CSV</button>            
</div>     

		</div>
        
<script>
    
function checkFile1() {
    
      var submitEl = document.getElementById("submitButton1");
        submitEl.disabled = false;
        return true;
}    
    
        function readCSV1() 
    {
        var f = file1.files[0]; 

        if (f) {
          var r = new FileReader();
          r.onload = function(e) { 
              var contents = e.target.result;
               
              alert(contents);
 
        
        data = "&csvdata="+contents;
       
        $.ajax({
      url: 'php/savecsv.php',
      type: 'POST',
      data: data,
      success: function(data)
                {
                 alert("done");        
                },
                error: function() 
                {
                    alert("not done"); 
                } 
    });
              
          }
          r.readAsText(f);
        } 
        else
        { 
            alert("Failed to load file");
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