<?php
session_start();
if(isset($_SESSION['FNAME']))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//All" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>الرسائل</title>
     <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
   <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" /> 
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" /> 
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-rtl.min.css">
            <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
			 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/calendarCss.css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <!-- BEGIN: load jqplot -->
    <link rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="js/jqPlot/excanvas.min.js"></script><![endif]-->
    <script language="javascript" type="text/javascript" src="js/jqPlot/jquery.jqplot.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
    <!-- END: load jqplot -->
    <script src="js/setup.js" type="text/javascript"></script>
	<script src=js/angular.min.js></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js"></script>
	<script src = "../model/js/amsgs.js" ></script>
<script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupDashboardChart('chart1');
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
</head>

<body>
    <div class="container_12">
			 <div class="grid_12 header-repeat">
            <div id="branding">
                <!-- logo pic -->
                <div class="floatright">
                    <img src="img/newlogo.PNG" alt="Logo" class="logo"/>
				
				<div class="caption2">مستشفى بهية</div>
            </div>
                <div class="floatleft">
                    <!-- profile pic -->
                    <div class="floatright">
                        <img src="img/img-profile.jpg" alt="Profile Pic" />
                    </div>
                    <!-- logout -->
                    <div class="floatright marginleft10">
                        <ul class="inline-ul floatright">
                            <li> مرحبا <?php echo ' '. $_SESSION['FNAME'];?> </li> 
                            <li><a href="#">الاعدادات</a></li>
                            <li><a href="../logout.php">تسجيل خروج</a></li>
                        </ul>
                        <br />
                        <span class="small grey"><?php echo "Date : ".date('Y-m-d'); ?></span>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
    </div>
			 <div class="clear">
             </div>
			<!-- //////////////////////////////////////////////////////////////////////////////// -->
        
        <div class="grid_12">
			<div class="floatright marginleft10">
		<!-- Navigation Bar -->
            <ul class="nav main" id="navP">
				<li class="ic-notifications"><a href="patientNotify.php"><span>الاشعارات</span></a></li>
				<li class="ic-message"><a href="allMesseges.php"><span>الرسائل</span></a>
					 <ul>
					<li><a href="allMesseges.php">الوارد</a> </li>
					<li><a href="writeMessege.php">انشاء رسالة</a> </li>
					 </ul>
				</li>
				 <li class="ic-dashboard"><a href="home.php"><span>الصفحة الرئيسية</span></a>
				 <ul>
                     <?php
                     $rays = 'rays';
                     $labs = 'labs';
                     $prescription = 'prescription';
                     ?>
					<li><?php echo '<a href="../controller/historyIndex.php?type=' . $rays.'">';
                        ?>الاشعة</a> </li>
					<li><?php echo '<a href="../controller/historyIndex.php?type=' . $labs.'">';?>التحاليل</a> </li>
					<li><?php echo '<a href="../controller/historyIndex.php?type=' . $prescription.'">';
                        ?>الروشتات</a></li>
					 </ul>
				 </li>
				 </ul>
			</div>
		</div>
	<div class="clear">
    </div>
	<!-- //////////////////////////////////////////////////////////////////////////////// -->
    <div class="grid_2 floatright  marginlt60">
		<div class="box sidemenu " style="margin-top:30px;">
			<div class="block " id="section-menu">
				<ul class="section menu one" style="text-align:right;">
					<li><a class="menuitem ">الميعاد المقبل</a>
						<ul class="submenu">
							<li><a href="#">12-3-2016</a> </li>
						</ul>
					</li>
					<li><a class="menuitem ">التواصل</a>
						<ul class="submenu ">
							<li><a href="allMesseges.php">الرسائل</a></li>
						</ul>
					</li>
					<li><a class="menuitem">بحث</a>
						<form action="#">
							<ul class="submenu">
								<div class="block">
                                        <li><input class="submenu" id="qsearch" type="text" name="qsearch" 
                                            placeholder=" بحث..." width="20px" style="text-align:right; padding:5px; 
											margin-right:5px; margin-top:5px;"/></li><br>
                                        <li><center><input class="submenu" value="بحث" type="submit" 
                                            name="searchsubmit"/></center></li>
                                    </div>
							</ul>
						</form>
					</li>
				</ul>
			</div>
		</div>
    </div>    
	<!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->
       <div id="all">
	   <div  class="grid_10 floatright">
	   <div ng-controller="getall">
            <div class="box round first" style="margin-top:30px;">
                <h2 class="floatright">الرسائل</h2><br>
                <div class="block" style="margin-top:30px;">
				<div ng-if="allmsgs.length == 0" >
								<h3 style="text-align:center;font-size:18px;"> لا يوجد رسائل لديك</h3>
				</div>
				<div ng-repeat="msg in allmsgs">
				<?php 
				$sender='{{msg.DID}}';
				$PID=$_SESSION['username'];
				$dt='{{msg.SendDATE}}';
				//echo $sender;
				?>
				<div ng-if="msg.Sender != <?php echo $PID; ?> && msg.ReceiverRead==null ">
				
				<div id ="conv" class="message hospital" style="background:#CCC;">
				<h5 class="floatright">{{msg.NAME}}</h5>
				
				<p>  <i class="fa fa-clock-o"></i><?php echo $dt ;?></p>
	
			<a href="../view/PatientviewMessege.php?sender=<?php echo $sender;?>&sendername=<?php echo '{{msg.NAME}}';?>">							
								<p> {{msg.SUBJECT}}  </p></a>
							</div>
					</div>
				<div ng-if="msg.Sender != <?php echo $PID; ?> && msg.ReceiverRead!=null ">
				
				<div id ="conv" class="message hospital" style="background:#FFF;">
				<h5 class="floatright">{{msg.NAME}}</h5>
				
				<p>  <i class="fa fa-clock-o"></i><?php echo $dt ;?></p>
	
			<a href="../view/PatientviewMessege.php?sender=<?php echo $sender;?>&sendername=<?php echo '{{msg.NAME}}';?>">							
								<p> {{msg.SUBJECT}}  </p></a>
							</div>
					</div>
				<div ng-if="msg.Sender == <?php echo $PID; ?> ">
				
				<div id ="conv" class="message hospital" style="background:#FFF;">
				<h5 class="floatright">{{msg.NAME}}</h5>
				
				<p>  <i class="fa fa-clock-o"></i><?php echo $dt ;?></p>
	
			<a href="../view/PatientviewMessege.php?sender=<?php echo $sender;?>&sendername=<?php echo '{{msg.NAME}}';?>">							
								<p> {{msg.SUBJECT}}  </p></a>
							</div>
					</div>			
							</div>
					</div>
				
				</div>
					
				</div>
            </div>
			</div>
        </div>
		
        <div class="clear">
        </div>
    </div>
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