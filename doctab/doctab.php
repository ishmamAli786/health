<?php 
session_start();
include"../config/db.php";
						$app_code = $_GET['appcode'];
						$user_code = $_SESSION['code'];
						$SQuery = mysqli_query($db, "SELECT * FROM `app_view` WHERE APP_CODE = $app_code");
						$rows = mysqli_num_rows($SQuery);
						$cnt=0;
						$s = mysqli_fetch_assoc($SQuery);
							$cnt++;
						$doctor_code = $s['DOCTORS_CODE'];
						$doctor_dtl = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `doctor_view` WHERE DOCTOR_CODE = '$doctor_code'"));
					?>
						
					
						
						



<!doctype html>

<html>
		<head>
				<title>DOCTOR LETTER PAD</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		
		</head>
<body>
		   
		   <div class="container-fluid bg-white"style="margin:0px auto;">
                <div class="row">
		          
				    <div class="col-3" >
					<img src="images/logo/docwho.png"style="height:100px;">
					</div>
					<div class="col-6" >
					<h1 style="margin-left:40px;margin-top:10px;font-size:65px;">HOSPITAL NAME</h1>
					</div>
					<div class="col-3" >
					<img src="images/logo/docskecth.jpg"style="height:100px;">
					</div>
				</div>  
                      <div class="row bg-primary">
					      <div class="col-3">
						  
						  </div>
						  <div class="col-6">
						  <h1 style="font-size:25px;margin:0px auto;"><?=$s['HOSPITAL'];?></h1>
						  </div>
						  <div class="col-3">
						  
						  </div>
					  
					  </div>		
                            <div class="row "style="margin-top:10px;">
					           <div class="col-8">
						  
						       </div>
						         <div class="col-4">
						          <h6><b>DOCTOR NAME: </b><?=$doctor_dtl['NAME'];?></h6><br>
								  <p style="margin-top:-30px;"><b>SPECIALIZATION: </b><?=$doctor_dtl['SP_NAME'];?></p><br>
								  <p style="margin-top:-40px;"><b>BACKGROUND: </b><?=$doctor_dtl['BACKGROUND'];?></p>
								  <p style="margin-top:-20px;"><b>ADDRESS: </b><?=$doctor_dtl['ADDRESS'];?></p>
						         </div>
						    </div>
							
							
							    <div class="row "style="margin-top:40px;";>
					                
						                <div class="col-12">
						                  
								          <p style="margin-top:-30px;"><b>REMARKS: </b><?=$s['REMARKS'];?></p><br><br><br><br>
								          <p style="margin-top:-20px;"style="margin-top:20px;"><b>MEDICINES: </b><?=$s['med'];?></p><br><br><br>
								          <p style="margin-top:-20px;"><b>TEST: </b><?=$s['tests'];?></p>
						                </div>
						        </div>
					               
								   
					        					
							
							
		   
		   
		   
           </div>                           
		   
		   
		   
		   
		   
		   
		   
		                                    <div class="card text-center bg-primary"style="margin-top:67px;">
  
                                               <div class="card-footer">
                                                 <p>0302-2261924</p>
												 <p style="margin-top:-20px;">zeeshanch160@gmail.com</p>
                                               </div>
                                            </div>
		       
		   
		   
		   
		   
		   
		   
        
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
</body>
</html>
















