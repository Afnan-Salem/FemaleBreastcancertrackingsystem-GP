<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/30/2016
 * Time: 4:14 AM
 */
class popupform
{
    public function __construct($pids, $prate)
    {
        ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta charset="UTF-8"/>
            <title>Rate tasks</title>
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
            <link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen"/>
            <link rel="stylesheet" type="text/css" href="css/ie.css" media="screen"/>
            <link href="css/table/demo_page.css" rel="stylesheet" type="text/css"/>
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
<!--            <style type="text/css">-->
<!--                #addform {-->
<!--                    width: 200px;-->
<!--                    height: 200px;-->
<!--                    margin-top: 100px;-->
<!--                    background-color: #fefffd;-->
<!--                    border-radius: 3px;-->
<!--                    box-shadow: 0px 0px 10px 0px #424242;-->
<!--                    padding: 10px;-->
<!--                    box-sizing: border-box;-->
<!--                    font-family: helvetica;-->
<!--                    visibility: hidden;-->
<!--                    display: none;-->
<!--                }-->
<!--            </style>-->
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

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

            <script>
                $(document).ready(function () {

                    $("#add").click(function () {
                        showpopup();
                    });
                    $("#close").click(function () {
                        hidepopup();
                    });

                });
                function showpopup() {
                    $("#addform").fadeIn();
                    $("#addform").css({"visibility": "visible", "display": "block"});
                }

                function hidepopup() {
                    $("#addform").fadeOut();
                    $("#addform").css({"visibility": "hidden", "display": "none"});
                }

                function add() {
                    var v = document.getElementById("patient");
                    var strUser = v.options[v.selectedIndex].value;
                    $('#rs').load('add.php?name=' + strUser);
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

                        <div class="caption">?????? ????</div>
                    </div>
                    <div class="floatright">
                        <!-- profile pic -->
                        <div class="floatleft">
                            <img src="img/img-profile.jpg" alt="Profile Pic"/>
                        </div>
                        <!-- logout -->
                        <div class="floatleft marginleft10">
                            <ul class="inline-ul floatleft">
                                <li>Hello Dr</li>
                                <li><a href="#">Config</a></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                            <br/>
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
                    <li class="ic-dashboard"><a href="../view/customizeControl.php"><span>Dashboard</span></a></li>
                    <li class="ic-history"><a href="timeline.html"><span>Timeline</span></a></li>
                    <li class="ic-message"><a href="drmessages.html"><span>Message</span></a><span class="number">2</span>
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
                        </ul>
                    </div>
                </div>
            </div>
        <!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="grid_9">
            <center>
                <div class="grid_5" style="margin-left: 25%;">
                    <div class="box round first">
                        <h2>Add Patients</h2>
                        <div class="block">
                            <br>

                                <h4><b>Add Patients to show case progress.</b></h4>

                            <br>
                            <center>
<!--                                <input type="button" id="add" value="Add Ptients">-->
                                <button class="btn btn-primary btn-lg" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#myModalForAdd"
                                        id="add" style="padding: 5px;">
                                    Add Patients</button>
                            </center>
                        </div>
                        <div class="modal fade" id="myModalForAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h3 class="modal-title" id="myModalLabel">Choose Patient To Show Case Progress</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="grid_5" id="addform">
                                            <form method="post" action=''>
                                                <select id="patient">
                                                    <option selected="selected">select patient to add</option>
                                                    <?php
                                                    session_start();
                                                    for ($x = 0; $x < count($pids); $x = $x + 4) {
                                                        ?>
                                                        <option value="<?php echo $pids[$x + 1] ?>"><?php echo $pids[$x + 3] ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select><br><br>
                                                <input type="submit" id="adding" value="Add" onclick="add();" class="btn btn-primary">
                                            </form>
                                        </div>
                                        <br><br><br><br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
            <div id="rs"></div>
            <?php
            $n = 0;
            if (count($prate) > 0) {
                for ($x = 0; $x < count($prate); $x += 2) {
                    if ($prate[$x] == "id") {
                        $id = $prate[$x + 1];
                        include_once 'gettask.php';
                        $get2 = new gettask();
                        $complete =  $get2->_getptask($id);
                        $tasks = $get2->_getpcount($id);
                        $cp = ($complete * 100) / $tasks;
                        ?>
                        <div class="grid_5" style="margin: 20px; width: 45%;">
                            <div class="box round first">
                                <?php
                                    echo '<a href="../model/preferePatient.php?prefered=1&ID='.$id.'">
                                    <span class="glyphicon glyphicon-remove" style="float: right;"></span>
                                </a>';
                                ?>
                                <h2 style="background:#e699cc">Patient: <?php echo $id; ?></h2>
                                <div class="block">
                                    <br>
                                    <br>
                                    <ul style="square">
                                        Total Tasks: <?php echo $tasks;?>
                                        <br>
                                        Completed Tasks: <?php echo $complete;?>
                                        <br>
                                        Remaining Tasks: <?php echo ($tasks-$complete);?>
                                        <br>
                                        <br>
                                        <br>
                                        <center>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success progress-bar-striped"
                                                         role="progressbar" aria-valuenow="<?php echo $cp; ?>"
                                                         aria-valuemin="0" aria-valuemax="100"
                                                         style="width:<?php echo $cp; ?>%" >
                                                        <div style="color: black"><?php echo $cp; ?>%Complete</div>
                                                </div>
                                            </div>
                                        </center>
                                    </ul>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </div>
        <!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->
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
        <?php
    }
}