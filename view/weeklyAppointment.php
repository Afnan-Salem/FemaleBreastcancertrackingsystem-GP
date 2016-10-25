<?php
session_start();
if(isset($_SESSION['NAME']))
{
?>

<!--/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/7/2016
 * Time: 8:39 PM
 */
class weeklyAppointment
{
    public function __construct()
    {
        session_start();
?>-->
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
        <head>
            <meta charset="UTF-8" />
            <title>Weekly Appointments</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport" />
            <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
            <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
            <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
            <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
            <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/bootstrap.css" />
            <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
            <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
            <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.js"></script>
            <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-animate.js"></script>
            <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-1.2.5.js"></script>
            <script src="https://rawgit.com/dwmkerr/angular-modal-service/master/dst/angular-modal-service.js"></script>
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
            <script src="js/modal-angular.js" type="text/javascript"></script>

            <script src=js/angular.min.js></script>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js"></script>
            <script src = "../model/js/dispalyRecord.js" ></script>
            <!--            <script src="../model/js/instructions.js"></script>-->
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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.js"></script>
            <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-animate.js"></script>
            <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-1.2.5.js"></script>
            <script src="https://rawgit.com/dwmkerr/angular-modal-service/master/dst/angular-modal-service.js"></script>
			<script type="text/javascript" src="countNotification.js"></script>
		<script type="text/javascript" src="countMessages.js"></script>

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

            <script>
                function getAppintments(day) {
                    if (day == "") {
                        document.getElementById("appointments").innerHTML = "";
                        return;
                    } else {
                        if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else {
                            // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function() {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                document.getElementById("appointments").innerHTML = xmlhttp.responseText;
                            }
                        };
                        xmlhttp.open("GET","../model/weeklyAppointmentModel.php?num="+day,true);
                        xmlhttp.send();
                    }
                }
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
                        <img src="img/img-profile.jpg" alt="Profile Pic"/>
                    </div>
                    <!-- logout -->
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello Dr. <?php  echo $_SESSION['NAME'];?> </li>
                            <li><a href="#">Config</a></li>
                            <li><a href="../logout.php" >Logout</a></li>
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
        <!-- /////////////////////////////////////////////////////////////////////////////// -->
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
        <div class="clear">
        </div>
        <!-- //////////////////////////////////////////////////////////////////////////////// -->
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu one">
                        <li><a href="../view/index.php">Appointments</a></li>
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
        </div>
        <!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="grid_10">
            <div class="box round first grid">
                <h2>
                    Weekly Appointments</h2>
                <div class="block" id="getAppointments">
                    <br>
                    <form>
                        <select  name="day" onchange="getAppintments(this.value)">
                            <option value="">Select a Day:</option>
                            <option value="6Saturday">Saturday</option>
                            <option value="1Sunday">Sunday</option>
                            <option value="2Monday">Monday</option>
                            <option value="3Tuseday">Tuseday</option>
                            <option value="4Wedensday">Wedensday</option>
                            <option value="5Thursday">Thursday</option>
                        </select>
                    </form>
                    <br>
                    <br>
                    <br>
                    <div id="appointments">
                        <b>Doctor Appointments... </b>
                    </div>

                    <br>
                    <br>
                    <form action="../view/customizeControl.php">
                        <button style="float:left; clear:left;" class="btn btn-primary btn">Back</button>
                    </form>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <!--/////////////////////////////////////-->
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
            Copyright <a href="#">Baheya Hospital</a>. All Rights Reserved.
        </p>
    </div>
    </body>
    </html>
	<?php } else {
header('Location: ../login.php');
}?>

       <!-- --><?php
/*    }
}*/