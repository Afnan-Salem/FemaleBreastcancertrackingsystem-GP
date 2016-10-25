<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 6/20/2016
 * Time: 2:50 AM
 */

class notifications
{
    public function __construct($notifications)
    {
        $_SESSION['notify']=$notifications;

if(isset($_SESSION['FNAME']))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//All" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>الاشعارات</title>
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
                            <li>مرحبا<?php echo ' '.$_SESSION['FNAME'];?></li>
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
					<li><?php echo '<a href="../controller/historyIndex.php?type=' . $labs.'">';?>لتحاليل</a> </li>
					<li><?php echo '<a href="../controller/historyIndex.php?type=' . $prescription.'">';
                        ?>لروشتات</a></li>
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

                    </ul>
                </div>
            </div>
        </div>
        <!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="grid_10 floatright">
            <div class="box round first" style="margin-top:30px;">
                <h2 class="floatright">الاشعارات</h2><br>
                <div class="block" style="margin-top:30px;">
                    <a href="../controller/drugNotficationController.php"><div class="message stuff messageP">
                            <h4 class="floatright"><b>الجرعات والادوية</b>
                            </h4><br>
                            <p class="floatright">هنا جميع مواعيد الادوية لليوم.
                            </p>
                    </div></a>
                    <a href="../view/patientviewNotifications.php"><div class="message success messageP">
                            <h4 class="floatright"><b>االمواعيد</b>
                            </h4><br>
                            <p class="floatright">هنا المواعيد بدل الفائتة
                            <span class="number"><?php echo (count($notifications)/8);?> </span></p>
                    </div></a>
                </div>
            </div>
        </div>
        <div class="clear">
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
}}}?>