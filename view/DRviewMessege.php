<?php

session_start();
if(isset($_SESSION['NAME']))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8"/>
        <title>My Dashboard</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="css/text.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen"/>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/calendarCss.css"/>
        <!--[if IE 6]>
        <link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen"/><![endif]-->
        <!--[if IE 7]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" media="screen"/><![endif]-->
        <!-- GLOBAL STYLES -->
        <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css"/>
        <!--END GLOBAL STYLES -->

        <!-- PAGE LEVEL STYLES -->
        <link rel="stylesheet" href="assets/plugins/fullcalendar-1.6.2/fullcalendar/fullcalendar.css"/>
        <link rel="stylesheet" href="assets/css/calendar.css"/>
        <!-- END PAGE LEVEL  STYLES -->
        <link href="css/table/demo_page.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- BEGIN: load jquery -->
        <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
        <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
        <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
        <!-- END: load jquery -->
        <script type="text/javascript" src="js/table/table.js"></script>
        <script src="js/setup.js" type="text/javascript"></script>
        <script type="text/javascript" src="ckeditor.js"></script>
<script src=js/angular.min.js></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js"></script>
	<script src = "../model/js/Dcmsg.js" ></script>

        <script type="text/javascript">

            $(document).ready(function () {
                setupLeftMenu();

                $('.datatable').dataTable();
                setSidebarHeight();


            });
        </script>
		<style>
.unread {
    padding: 10px 10px 10px 10px;
    background-color: #fff;
    -webkit-animation-name: example; /* Chrome, Safari, Opera */
    -webkit-animation-duration: 4s; /* Chrome, Safari, Opera */
    animation-name: example;
    animation-duration: 4s;
}

/* Chrome, Safari, Opera */
@-webkit-keyframes example {
    0%   {background-color: #e6e6e6;}
   75% {background-color: #e6e6e6;}
    100% {background-color: #fff;}
}
</style>
    </head>
    <body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <!-- logo pic -->
                <div class="floatleft">
                    <img src="img/newlogo.PNG" alt="Logo" class="logo"/>

                    <div class="caption">مسشتفي بهية</div>
                </div>
                <div class="floatright">
                    <!-- profile pic -->
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic"/>
                    </div>
                    <!-- logout -->
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello Dr.<?php
                                echo $_SESSION['NAME']; ?> </li>
                            <li><a href="#">Config</a></li>
                            <li><a href="../logout.php">Logout</a></li>
                        </ul>
                        <br/>
                    <span class="small grey">Date :
                        <?php
                        echo date("Y-m-d");
                        ?>
                    </span>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <!-- Navigation Bar -->
            <ul class="nav main">
                <li class="ic-dashboard"><a href="../view/customizeControl.php"><span>Dashboard</span></a></li>
                <li class="ic-history"><a href="timeline.php"><span>Timeline</span></a></li>
                <li class="ic-message"><a href="DRallMesseges.php"><span>Inbox</span></a><span id = "message_count" class="number"></span>
                  
                </li>
                <li class="ic-notifications"><a href="drNotificationController.php"><span>Notifications</span></a>
                    <span id="notification_count" class="number"></span>
                </li>
                <li class="ic-form-style"><a href="calendar.html"><span>Notepad</span></a></li>
            </ul>
        </div>

        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu one">
                        <li><a href="../View/index.php">Appointments</a></li>
                        <li><a class="menuitem">Patients</a>
                            <ul class="submenu">
                                <li><a href="../view/drpatient.php">View</a></li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Search</a>
                            <form action="#">
                                <ul class="submenu">
                                    <br>
                                    <div class="block">
                                        <li><input class="submenu" id="qsearch" type="text" name="qsearch"
                                                   placeholder="Search..." width="20px"/></li>
                                        <br>
                                        <li>
                                            <center><input class="submenu" value="Search" type="submit"
                                                           name="searchsubmit"/></center>
                                        </li>
                                    </div>
                                </ul>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>  <!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->

	
   <div   class="grid_10 floatright">
   <?php
  // session_start();
			$sender_id=$_GET['sender'];
			$sender=$_GET['sendername'];
			/*echo $sender;
			echo $sender_id;*/
			
			$_SESSION['sender_id']=$sender_id;
			$_SESSION['sendername']=$sender;
			$receiver=$_SESSION['DID'];
			//echo $receiver?>
	<input id="sender_id" type="hidden" value=" <?php echo $sender_id; ?>" >
	<input id="sender_name" type="hidden" value=" <?php echo $sender; ?>" >

  <?php
			$senderID;
		$result=array();
								?>
								
   <div id="getmsg"> 
   <div ng-controller="DRgetmsgcontroller">
            <div   class="box round first" style="margin-top:30px;">
              
						
                 <div class="tab-content">
				<div class="tab-pane fade in active" id="inbox" >
				
				<div class="box round first" style="margin-top:30px;background-color:#ccebff" >
				
							
<div class="msg">
				<div  ng-repeat="message in msgs" >
				
				<div ng-if="message.Sender == <?php echo $receiver;?>" >
				<div class="box round first"  >
							<?php $senderID=' {{message.Sender}}' ; ?>
							<h2 style="margin-right:95%;">You</h2>
							<?php
							$Date='{{message.SendDATE}}';
							?>
									<p style="float: right; clear: right;"> <i class="fa fa-clock-o"></i>
									<?php
								echo $Date; echo "\n"; ?> </p> <br>
								
								<p style="float: right; clear: right;"> {{message.SUBJECT}} </p> <br>
								<h5 > 
                                {{message.CONTENT}} </h5> <br>
								</div>
							</div>
				<div  ng-if="message.Sender != <?php echo $receiver;?> && message.ReceiverRead== null" ng-init="readmessage()">
				<?php $senderID=' {{message.Sender}}' ; ?>
				<div  class="box round first" >
				<div class="unread">

							<h2   style="margin-right:95%;"> <?php
									echo $sender; echo "\n"; 
									
									?> </h2>
									<!--input type="submit" id="fname" onclick="show2(this)"-->
									<?php
							$Date='{{message.SendDATE}}';
							?>
									<p style="float: right; clear: right;"> <i class="fa fa-clock-o"></i>
									<?php
								echo $Date; echo "\n"; ?> </p><br>
								<p style="float: right; clear: right;"> {{message.SUBJECT}} </p>
								
								<h5 > 
                                {{message.CONTENT}} </h5> <br>
							</div>
							</div>
							</div>
							
			<div ng-if="message.Sender != <?php echo $receiver;?> && message.ReceiverRead!= null">
			
							<div class="box round first" >

				<?php $senderID=' {{message.Sender}}' ; ?>
							<h2   style="margin-right:95%;"> <?php
									//echo $senderID;
									echo $sender;echo "\n"; 
									?> </h2>
									<?php
							$Date='{{message.SendDATE}}';
							?>
									<p style="float: right; clear: right;"> <i class="fa fa-clock-o"></i>
									<?php
								echo $Date; echo "\n"; ?> </p> <br>
								
								<p style="float: right; clear: right;"> {{message.SUBJECT}} </p>
								<h5 > 
                                {{message.CONTENT}} </h5> <br>
							</div>
							</div>
							
			</div>
							
								</div>

				               
								</div>
							</div>	
						</div>
			
						</div>
<!--/div-->
		
		<div  class="panel-footer">
                                            
			<form   method="post">
				<label  >subject</label><br>
				<input type="text"  id="subject" ng-model="subject" name="subject"><br><br>
					<div class="input-group">
											
				        <span class="input-group-btn">

                      <input id="btn-input" name="msg" id="msg" ng-model="msg" style="text-align:left;" type="text" class="form-control input-sm" placeholder="Message Content ......" />
	            <input id="to_id" type="hidden" value="<?php echo $sender_id;  ?>" >
				
                         <span class="input-group-btn">
				<input class="btn btn-warning btn-sm" id="btn-chat" type="submit" style="text-align:right;" ng-click="sendmsg();"name="submit"  value="Send" >
                  </span>                       
                                            </div>
											</form>
                                        </div>
										</div>
										</div>
										<br>                             
                                                
			<form action="home.php">
                    <button class="btn btn-primary btn">Back</button>
                </form>
			  
			  		  
        </div>
		
        <div class="clear">
        </div>
	<!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->
        
    </div>
    <div class="clear">
    </div>
    <div id="site_info" >
        <p>
            Copyright <a href="#">Bahya hospital</a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>
<?php } else {
header('Location: ../login.php');
}?>