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
	        <li class="magenta ">
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
            <li class="blue-dark ">
	            <a href="settings.php">
	                <i class="fa fa-cog "></i>
	                <span class="lbl">Settings</span>
	            </a>
	        </li>
              <li class="red opened">
	            <a href="support.php">
	                <i class="fa fa-life-ring active"></i>
	                <span class="lbl">Help</span>
	            </a>
	        </li>  
	  
	    </ul>
	</nav>
<body class="dataTables">
		<div id="viewdata" class="container">

			<blockquote class="blockquote">
  <p class="m-b-0">First start creating the area in the area field.Next create the street associated with the area in the street field. Now you can start creating the connection in the Connections field for every users.Next you can pay customer bill,generate bill for every customers and you can also check the payment history for everycustomer from their CABLEID in the payments field .In Reports field you can see the total number of connections in the particular street .You can also import bulk customes by uploading csv file in the setting field</p>
</blockquote>
            
            <div class="row">                
            <section class="box-typical faq-page">
		<section class="faq-page-cats">
					<div class="row">
						<div class="col-md-4">
							<div class="faq-page-cat">
                                <div class="faq-page-cat-icon"><a href="mailto:support@macappstudio.com"><img  src="contactus.png" alt=""></a></div>
								<div class="faq-page-cat-title">
									<a href="mailto:support@macappstudio.com">Contact Us For Support</a>
								</div>
							
							</div>
						</div>
						<div class="col-md-4">
						
						</div>
						<div class="col-md-4">
							<div class="faq-page-cat">
								<div class="faq-page-cat-icon"><img src="img/faq-3.png" alt=""></div>
								<div class="faq-page-cat-title">
									<a href="#">Suggest a feature</a>
								</div>
							
							</div>
						</div>
					</div>
				</section>
            </section>
    
            </div>
	
    
    
	</body>
</html>
       <?php
}
else
{
   header("Location: login.php");
}
?>