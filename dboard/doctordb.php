<!-- Dash Board Panel--->

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Health Center</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
	<div class="container-fluid">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Health Center</a> 
            </div>
			  <div style="color: white;
			padding: 15px 50px 5px 50px;
			float: right;
			font-size: 16px;"><a href="" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
			
                <nav class="navbar-default navbar-side container-fluid" role="navigation" id="aa">
            <div class="sidebar-collapse" >
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href=""><i class="fa fa-dashboard fa-3x"></i> My Account</a>
                    </li>
                     <li>
                        <a  href=""><i class="fa fa-desktop fa-3x"></i> Doctor Profile</a>
                    </li>
                    <li>
                        <a  href=""><i class="fa fa-qrcode fa-3x"></i> Schedule</a>
                    </li>
						   <li  >
                        <a   href=""><i class="fa fa-bar-chart-o fa-3x"></i> Appointments</a>
                    </li>	
					
					<li  >
                        <a   href=""><i class="fa fa-bar-chart-o fa-3x"></i> Consultation Fees</a>
                    </li>					
            </div>
            
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Doctor Dashboard</h2>   
                        
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
<!--               
			  <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
				
				-->
				
                <div class="text-box" >
                    <p class="main-text">My Account</p>
                    <p class="text-muted"></p>
                </div>
             </div>
		     </div>
			  <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
<!--               
			  <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
				
				-->
				
                <div class="text-box" >
                    <p class="main-text">Doctor Profile</p>
                    <p class="text-muted"></p>
                </div>
             </div>
		     </div>
			 
			 
			 
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
              <!--  <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
				-->
                <div class="text-box" >
                    <p class="main-text">Consultation Fees</p>
                    <p class="text-muted"></p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
               <!-- <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
				-->
                <div class="text-box" >
                    <p class="main-text">Schedule</p>
                    <p class="text-muted"></p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
             <!--   <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
				-->
                <div class="text-box" >
                    <p class="main-text">Appointments</p>
                    <p class="text-muted"></p>
                </div>
             </div>
		     </div>
			</div>
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
