<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//All" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>SignUp | Patient</title>
     <link rel="stylesheet" type="text/css" href="../css/reset.css" media="screen" />
   <link rel="stylesheet" type="text/css" href="../css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/grid.css" media="screen" /> 
    <link rel="stylesheet" type="text/css" href="../css/layoutsign.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/nav.css" media="screen" /> 
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/…/3.3.6/css/bootstrap.min.css">
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
    <script type="text/javascript">

        $(document).ready(function () {
            setupDashboardChart('chart1');
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
</head>

<body>
    <div class="container_12" >
        <div class="grid_12 header-repeat">
            <div id="branding">
                <!-- logo pic -->
                <div class="floatright">
                    <img src="log.jpg" alt="Logo" height="45px" style/>
                </div>
				
							<h2>بهية</h2>
						</div>
                
			
         </div>
		 
			 <div class="clear">
             </div>
			<!-- //////////////////////////////////////////////////////////////////////////////// -->
    		<form action="Controller/signController.php" method="POST">			
        <div class="grid_12" >
			<div class="login-block">
    			<h3>تم ارسال رسالة تأكيد لرقم الهاتف الذى ادخلته</h3>
				
			</div>
		</div>
		</form>
		<div class="clear">
    	</div>
	<!-- //////////////////////////////////////////////////////////////////////////////// -->
    
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
