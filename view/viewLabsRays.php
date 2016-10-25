<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 3/21/2016
 * Time: 8:09 AM
 */
class viewLabsRays
{
    public function __construct($labray)
    {
        foreach ($labray as $x)
        { //loop the array

            header("Content-type: image/jpg");
            echo $x['ATTACHEMENT'];
        }


        echo '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <title>My Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/calendarCss.css" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="assets/plugins/fullcalendar-1.6.2/fullcalendar/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/calendar.css" />
    <!-- END PAGE LEVEL  STYLES -->
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
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


    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $(\'.datatable\').dataTable();
            setSidebarHeight();


        });
    </script>
</head>
<body>
<div class="container_12">
    <div class="grid_12 header-repeat">
        <div id="branding">
            <!-- logo pic -->
            <div class="floatleft">
                <img src="img/newlogo.PNG" alt="Logo" class="logo"/>

                <div class="caption">مستشفى بهية</div>
            </div>
            <div class="floatright">
                <!-- profile pic -->
                <div class="floatleft">
                    <img src="img/img-profile.jpg" alt="Profile Pic" />
                </div>
                <!-- logout -->
                <div class="floatleft marginleft10">
                    <ul class="inline-ul floatleft">
                        <li><?php  session_start(); echo $_SESSION[\'NAME\'];?>مرحبا </li>
                        <li><a href="#">Config</a></li>
                        <li><a href="../logout.php" >تسجيل الخروج</a></li>
                    </ul>
                    <br />
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
            <!-- /////////////////////////////////////////////////////////////////////////////// -->
            <div class="grid_12">
                <!-- Navigation Bar -->
                <ul class="nav main">
                    <li class="ic-dashboard"><a href="Dashboardlist2.html"><span>Dashboard</span></a></li>
                    <li class="ic-history"><a href="timeline.html"><span>Timeline</span></a></li>
                    <li class="ic-message"><a href="drmessages.html"><span>Message</span></a><span
                            class="number">2</span>
                        <ul>
                            <li><a href="drmessages.html">Open</a></li>
                            <li><a href="newmessage.html"> New Message</a></li>
                        </ul>
                    </li>
                    <li class="ic-notifications"><a href="drnotifications.html"><span>Notifications</span></a>
                        <span class="number">4</span>
                    </li>
                    <li class="ic-form-style"><a href="calendar.html"><span>Notepad</span></a></li>
                </ul>
            </div>
            <div class="clear">
            </div>
            <!-- //////////////////////////////////////////////////////////////////////////////// -->
            <div class="grid_2">
                <div class="box sidemenu">
                    <div class="block" id="section-menu">
                        <ul class="section menu one">
                            <li><a href="table.html">Appointments</a></li>
                            <li><a class="menuitem">Patients</a>
                                <ul class="submenu">
                                    <li><a href="drpatient.html">View</a></li>
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
            </div>
            <!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="grid_10">
                <div class="box round first grid">
                    <h2>
                       </h2>
                    <div class="block">';

                    echo'</div>
                </div>
                <div class="clear">
                </div>
            </div>
            <!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->

            <div class="clear">
            </div>
            <div id="site_info">
                <p>
                    Copyright <a href="#">Baheya Hospital</a>. All Rights Reserved.
                </p>
            </div>
        </body>
        </html>';
    }

}