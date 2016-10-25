<?php  session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <title>My Notifications</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-animate.js"></script>
    <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-1.2.5.js"></script>
    <script src="https://rawgit.com/dwmkerr/angular-modal-service/master/dst/angular-modal-service.js"></script>
    <!--BEGIN: load jquery -->
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
    <script src="js/modal-angular.js" type="text/javascript"></script>

    <!--<script src=js/angular.min.js></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            setupLeftMenu();
            $('.datatable').dataTable();
            setSidebarHeight();

        });
    </script>
    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="assets/css/Markdown.Editor.hack.css" />
    <link rel="stylesheet" href="assets/plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="assets/css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-wysihtml5-hack.css" />
    <style>
        ul.wysihtml5-toolbar > li {
            position: relative;
        }
    </style>
    <!-- END PAGE LEVEL  STYLES -->
    <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/js/jquery-ui.min.js"></script>
    <!---->
    <script src="assets/plugins/fullcalendar-1.6.2/fullcalendar/fullcalendar.min.js"></script>
    <script src="assets/js/calendarInit.js"></script>
    <!--END PAGE LEVEL SCRIPTS -->
    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.min.js"></script>
    <script src="assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="assets/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="assets/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="assets/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="assets/plugins/Markdown.Editor-hack.js"></script>
    <script src="assets/js/editorInit.js"></script>
    <script>
        $(function () {
            var active = true;

            $('#collapse-init').click(function () {
                if (active) {
                    active = false;
                    $('.panel-collapse').collapse('show');
                    $('.panel-title').attr('data-toggle', '');
                    $(this).text('Enable accordion behavior');
                } else {
                    active = true;
                    $('.panel-collapse').collapse('hide');
                    $('.panel-title').attr('data-toggle', 'collapse');
                    $(this).text('Disable accordion behavior');
                }
            });

            $('#accordion').on('show.bs.collapse', function () {
                if (active) $('#accordion .in').collapse('hide');
            });
            CalendarInit();
            formWysiwyg();
        });
    </script>
    <script src="../controller/record.js"></script>
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
                        <li>Hello Dr. <?php  echo $_SESSION['NAME'];?> </li>
                        <li><a href="#">Config</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                    <br />
                    <span class="small grey">Date : 12/12/2015</span>
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
            <li class="ic-dashboard"><a href="Dashboardlist2.html"><span>Dashboard</span></a> </li>
            <li class="ic-message"><a href="drmessages.html"><span>Message</span></a><span class="number">2</span>
                <ul>
                    <li><a href="drmessages.html">Open</a> </li>
                    <li><a href="newmessage.html"> New Message</a></li>
                </ul>
            </li>
            <li class="ic-history"><a href="#"><span>Patient History</span></a></li>
            <li class="ic-notifications"><a href="drnotifications.html"><span>Notifications</span></a>
                <span class="number"></span>
            </li>
            <li class="ic-form-style"><a href="calendar.html"><span>Notepad</span></a></li>
        </ul>
    </div>

    <!-- //////////////////////////////////////////////////////////////////////////////// -->
    <div class="grid_2">
        <div class="box sidemenu">
            <div class="block" id="section-menu">
                <ul class="section menu one">
                    <li><a href="table.html">Appointments</a></li>
                    <li><a class="menuitem">Patients</a>
                        <ul class="submenu">
                            <li><a href="drpatient.php">View</a> </li>
                        </ul>
                    </li>
                    <li><a class="menuitem">Search</a>
                        <form action="#">
                            <ul class="submenu">
                                <br>
                                <div class="block">
                                    <li><input class="submenu" id="qsearch" type="text" name="qsearch"
                                               placeholder="Search..." width="20px" /></li><br>
                                    <li><center><input class="submenu" value="Search" type="submit"
                                                       name="searchsubmit"/></center></li>
                                </div>
                            </ul>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //////////////////////////////////////////////////////////////////////////////////// -->
    <div class="grid_10">
        <!-- Notifications -->
        <div class="box round first">
            <h2>Activity Log Notifications</h2>
            <div class="panel-body">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" > Tasks </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php
                                $activitylogtask = $_SESSION['activitylogSt'];

                                foreach ($activitylogtask as $i)
                                {
                                echo '<ul class="list-group">';
                                echo '<li class="list-group-item">'.$i['NAME']. ' made' .$i['NCONTENT']. 'at'  .$i['TIMEDATE'].'</li>';
                                    echo '</ul>';}
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Comments </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php
                                $activitylogcomment = $_SESSION['activitylogSc'];

                                foreach ($activitylogcomment as $x)
                                {
                                    echo '<ul class="list-group">';
                                    echo '<li class="list-group-item">'.$x['NAME']. ' made' .$x['NCONTENT']. 'at'  .$x['TIMEDATE'].'</li>';
                                    echo '</ul>';}
                                ?>
                            </div>
                        </div>
                    </div>





                </div>
            </div>

                <!----------------------------------------------------------->

        </div>
    <div class="clear">
    </div>

</div>
<!-- Footer -->
<div class="clear">
</div>
<div id="site_info">
    <p>
        Copyright <a href="#">Bahya Hospital</a>. All Rights Reserved.
    </p>
</div>
</body>
</html>