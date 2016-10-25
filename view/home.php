<?php session_start();
if(isset($_SESSION['FNAME']))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//All" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>االصفحة الشخصية</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/calendarCss.css" />
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
    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
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

                            <li> مرحبا <?php echo $_SESSION['FNAME'];?></li>
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
    <div class="grid_2 floatright">
		<div class="box sidemenu" style="margin-top:30px;">
			<div class="block" id="section-menu">
				<ul class="section menu" style="text-align:right;">
					<li><a class="menuitem">الميعاد المقبل</a>
						<ul class="submenu">
							<li><a href="#">12-3-2016</a> </li>
						</ul>
					</li>
					<li><a class="menuitem">التواصل</a>
						<ul class="submenu">
							<li><a href="allMesseges.php">الرسائل</a></li>
						</ul>
					</li>
					<li><a class="menuitem">بحث</a>
						<form action="#">
							<ul class="submenu">
								<div class="block">
									<li><input class="submenu searchText" id="qsearch" type="text" name="qsearch" 
										placeholder="...بحث"/></li>
									<li><center><button class="submenu searchButton" type="submit" name="searchsubmit" >بحث  
										</button></center></li>
								</div>
							</ul>
						</form>
					</li>
				</ul>
			</div>
		</div>
    </div>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="grid_10 floatright">
            <div class="box round first" style="margin-top:30px;">
                <h2 class="floatright">تاريخى</h2><br>
                <div class="block" style="margin-top:30px;">
                    <?php
                    $rays = 'rays';
                    echo '<a href="../controller/historyIndex.php?type=' . $rays.'">';
                    ?>
                    <div class="message hospital ">
                        <h5 class="floatright" style="font-size: 25px; font-weight: bold;">.الاشعة</h5>
                    </div></a>
                    <?php
                    $labs = 'labs';
                    echo '<a href="../controller/historyIndex.php?type=' . $labs.'">';
                    ?>
                    <div class="message hospital  ">
                        <h5 class="floatright"  style="font-size: 25px; font-weight: bold;">.التحاليل</h5>
                    </div></a>
                    <?php
                    $prescription = 'prescription';
                    echo '<a href="../controller/historyIndex.php?type=' . $prescription.'">';
                    ?>
                    <div class="message hospital  ">
                        <h5 class="floatright"  style="font-size: 25px; font-weight: bold;">.الروشتات</h5>
                    </div></a>

                </div>
            </div>
        </div>
        <div class="clear">
        </div>
	<!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->
        
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