<?php

/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 3/19/2016
 * Time: 11:56 AM
 */

class displayRecordGuest
{

    public function __construct()
    {
		if(isset($_SESSION['DID']))
		{
        ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta charset="UTF-8"/>
            <title>Display Record</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
            <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen"/>
            <link rel="stylesheet" type="text/css" href="css/text.css" media="screen"/>
            <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen"/>
            <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen"/>
            <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen"/>
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <link rel="stylesheet"
                  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/bootstrap.css"/>
            <!--[if IE 6]>
            <link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen"/><![endif]-->
            <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/ie.css" media="screen"/><![endif]-->
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


            <script type="text/javascript">

                $(document).ready(function () {
                    setupLeftMenu();

                    $('.datatable').dataTable();
                    setSidebarHeight();


                });
            </script>

            <!-- PAGE LEVEL STYLES -->
            <link rel="stylesheet" href="assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css"/>
            <link rel="stylesheet" href="assets/css/Markdown.Editor.hack.css"/>
            <link rel="stylesheet" href="assets/plugins/CLEditor1_4_3/jquery.cleditor.css"/>
            <link rel="stylesheet" href="assets/css/jquery.cleditor-hack.css"/>
            <link rel="stylesheet" href="assets/css/bootstrap-wysihtml5-hack.css"/>
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
			<script type="text/javascript" src="countNotification.js"></script>
		<script type="text/javascript" src="countMessages.js"></script>
            <script src="assets/js/editorInit.js"></script>
            <script>
                $(function () {
                    CalendarInit();
                    formWysiwyg();
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
                            <img src="img/img-profile.jpg" alt="Profile Pic"/>
                        </div>
                        <!-- logout -->
                        <div class="floatleft marginleft10">
                            <ul class="inline-ul floatleft">
                                <li>Hello Dr. <?php   echo $_SESSION['NAME'];?> </li>
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
            <!-- /////////////////////////////////////////////////////////////////////////////// -->
            <div class="grid_12">
                <!-- Navigation Bar -->
                <ul class="nav main">
                    <li class="ic-dashboard"><a href="../view/customizeControl.php"><span>Dashboard</span></a></li>
                    <li class="ic-history"><a href="timeline.php"><span>Timeline</span></a></li>
                    <li class="ic-message"><a href="DRallMesseges.php"><span>Inbox</span></a><span id = "message_count" class="number"></span>
                     
                    </li>
                    <li class="ic-notifications"><a href="drNotificationController.php"><span>Notifications</span></a>
                        <span id="notification_count"  class="number"></span>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-dummy">
                            <button class="btn btn-primary disabled btn-lg" data-toggle="modal" >
                                Medical Record  <i class="fa fa-file-text"></i>
                            </button>
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#myModalForInst" >
                                Add-Instructions  <i class="fa fa-user-md"></i>
                            </button>
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalForPres">
                                Prescribe <i class="fa fa-stethoscope stethoscope"></i>
                            </button>
                            <form id="myForm">
                                <div class="modal fade" id="myModalForInst" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h3 class="modal-title" id="myModalLabel">Instructions Sheet</h3>
                                            </div>
                                            <div class="modal-body">

                                                <h4>Title <input type="text" name="title style="border: 1px solid;"/></h4>
                                                <h4>Instruction</h4><textarea rows="4" cols="30" style="border: 1px solid;"></textarea><br>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"  >Save changes</button>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form id="myForm">
                                <div class="modal fade" id="myModalForPres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h3 class="modal-title" id="myModalLabel">Prescribtion</h3>
                                            </div>
                                            <div class="modal-body">

                                                <h4>Medicine <input type="text" name="title style="border: 1px solid;"/></h4>
                                                <h4>Frequency <input type="number" name="quantity" min="1" max="5"/></h4>
                                                <h4>Instructions</h4><textarea rows="2" cols="20" style="border: 1px solid;"></textarea><br>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"  >Save changes</button>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-body">

                            <div class="panel-group" id="accordion">

                                <div class="col-xs-6 right, panel panel-default" >

                                    <div class="panel-heading" >
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="accordion" href="#collapseFive">Labs</a>
                                        </h4>
                                    </div>


                                    <div id="collapseFive" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                    </div>


                                </div>

                                <div class="col-xs-6 right, panel panel-default" style="margin-top:1px">

                                    <div class="panel-heading" >
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="accordion" href="#collapseFive1">Rays</a>
                                        </h4>
                                    </div>


                                    <div id="collapseFive1" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                    </div>


                                </div>
                                <div class="col-xs-12 col-md-8, panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" >General Information</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <table class="colorTable">
                                                <tr class="trColor">
                                                    <td class="tdColor">Patient Name</td>
                                                    <td>Name</td>
                                                </tr>
                                                <tr class="trColor">
                                                    <td class="tdColor">Date of birth</td>
                                                    <td>Date</td>
                                                </tr>
                                                <tr class="trColor">
                                                    <td class="tdColor">Age at diagnosis</td>
                                                    <td>Age</td>
                                                </tr>
                                                <tr class="trColor">
                                                    <td class="tdColor">Support contact</td>
                                                    <td>Contact</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-8, panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Background Information</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <table class="colorTable">
                                                <tr class="trColor">
                                                    <td class="tdColor">Family history</td>
                                                    <td>None</td>
                                                </tr>
                                                <tr class="trColor">
                                                    <td class="tdColor">Genetic testing</td>
                                                    <td>Not applicable</td>
                                                </tr>
                                                <tr class="trColor">
                                                    <td class="tdColor">Other health concerns</td>
                                                    <td>History of cervical cancer</td>
                                                </tr>
                                                <tr class="trColor">
                                                    <td class="tdColor">Echocardiogram or MUGA result</td>
                                                    <td>EF = 0%</td>
                                                </tr>
                                                <tr class="trColor">
                                                    <td class="tdColor">Additional comments</td>
                                                    <td>Additional Comments.</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-8, panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Left breast</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <table class="colorTable">
                                                <tr class="trColor">
                                                    <td class="tdColor">Definitive breast surgery</td>
                                                    <td>Mastectomy</td>
                                                </tr>
                                                <tr class="trColor">
                                                    <td class="tdColor">Sentinel node biopsy</td>
                                                    <td><input type="text" Value="no"></td>
                                                </tr>
                                                <tr class="trColor">
                                                    <td class="tdColor">Other health concerns</td>
                                                    <td>History of cervical cancer</td>
                                                </tr>
                                                <tr class="trColor">
                                                    <td class="tdColor">Echocardiogram or MUGA result</td>
                                                    <td>EF = 0%</td>
                                                </tr>
                                                <tr class="trColor">
                                                    <td class="tdColor">Echocardiogram or MUGA result</td>
                                                    <td>EF = 0%</td>
                                                </tr>
                                                <tr class="trColor">
                                                    <td class="tdColor">Echocardiogram or MUGA result</td>
                                                    <td>EF = 0%</td>
                                                </tr>
                                                <tr class="trColor">
                                                    <td class="tdColor">Echocardiogram or MUGA result</td>
                                                    <td>EF = 0%</td>
                                                </tr>
                                                <tr class="trColor">
                                                    <td class="tdColor">Echocardiogram or MUGA result</td>
                                                    <td>EF = 0%</td>
                                                </tr>
                                                <tr class="trColor">
                                                    <td class="tdColor">Echocardiogram or MUGA result</td>
                                                    <td>EF = 0%</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-8, panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Collapsible Group Item #4</a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-8, panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Collapsible Group Item #5</a>
                                        </h4>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-8, panel panel-default" >
                                    <div class="panel-heading" ">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Collapsible Group Item #6</a>
                                    </h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
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
        <?php
		} else {
header('Location: ../login.php');
}
    }
}