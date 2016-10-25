<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 3/19/2016
 * Time: 11:56 AM
 */

class displayRecord
{
    public function __construct($record)
    {
        $id = $_GET['id'];

        $_SESSION['patient']=$id;
		if(isset($_SESSION['DID']))
		{
        $x = 0;
        ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html"
              xmlns="http://www.w3.org/1999/html">
        <head>
            <meta charset="UTF-8" />
            <title>Display Record</title>
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
                            <img src="img/img-profile.jpg" alt="Profile Pic"/>
                        </div>
                        <!-- logout -->
                        <div class="floatleft marginleft10">
                            <ul class="inline-ul floatleft">
                                <li>Hello Dr. <?php echo $_SESSION['NAME'];?> </li>
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
                    <li class="ic-message"><a href="DRallMesseges.php"><span>Inbox</span></a><span  id = "message_count" class="number"></span>
                    
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
            <div class="row">
                <div class="col-lg-12">
      
                                    <div class="panel panel-default">
                                            <div class="panel-dummy">
                                                <button class="btn btn-primary disabled btn-lg" data-toggle="modal" >
                                                    Medical Record  <i class="fa fa-file-text"></i>
                                                </button>
		                                         <button class="btn btn-primary btn-lg" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#myModalForInst" id="inst">
                                                                Add-Instructions  <i class="fa fa-user-md"></i>
                                                            </button>
                                                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalForPres" id="pres">
                                                                Prescribe <i class="fa fa-stethoscope stethoscope"></i>
                                                            </button>
                                                  
                                                <div class="modal fade" id="myModalForPres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h3 class="modal-title" id="myModalLabel">Prescribtion</h3>
                                            </div>
                                            <div class="modal-body">
                                                <div id="prescriptionForm">
                                                    <div ng-controller="PrescController">
                                                        <form ng-submit="addMedicine()">
                                                            <table class="colorTable">
                                                                <tr class="trColor">
                                                                    <datalist id="medicine" ng-model="medicine" required="required">
                                                                        <?php
                                                                        $drugs = $_SESSION['drugs'];
                                                                        foreach($drugs as $y)
                                                                            echo '<option value='.$y['NAME'].'>';
                                                                        ?>
                                                                    </datalist>
                                                                    <td class="tdColor"><label for="medicine">Medicine</label></td>
                                                                    <td class="tdColor"><input type="text" class="form-control" list="medicine" ng-model="medicine" required="required" ></td>
                                                                </tr>
                                                                <tr class="trColor">
                                                                    <td class="tdColor"><label for="freq">Frequancy</label></td>
                                                                    <td><input type="number" class="form-control" id="quantity" ng-model="frequency" required="required" ></td>
                                                                </tr>
                                                                <tr class="trColor">
                                                                    <td class="tdColor"><label for="ins">Instructions</label></td>
                                                                    <td><textarea id="instruction" rows="2" cols="40" ng-model ="instruction" style="border: 1px solid;"
                                                                                  required="required"></textarea></td><br>
                                                                </tr>
                                                            </table>
                                                            <button class="btn btn-primary" style="float: right;" type="submit" ><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Medicine</button>
                                                        </form>
                                                        <br>
                                                        <div>
                                                            <table class="colorTable">
                                                                <tr style="display:none;">
                                                                    <td>Medicine</td>
                                                                    <td>Frequency</td>
                                                                    <td>Instructions</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr ng-repeat="p in presc track by $index" class="trColor">
                                                                    <td >{{p.NAME}}</td>
                                                                    <td >{{p.FREQUENCY}}</td>
                                                                    <td >{{p.INSTRUCTIONS}}</td>
                                                                    <td ><a ng-click="deleteMedicine(p.Drug_ID,p.FREQUENCY,p.INSTRUCTIONS,p.PRESID)" class="pull-right"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="myModalForInst" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h3 class="modal-title" id="myModalLabel">Instructions</h3>
                                        </div>
                                        <div class="modal-body">
                                            <div id="instructionForm">
                                                <div ng-controller="InstController">
                                                    <form ng-submit="addTask()">
                                                        <table class="colorTable">
                                                            <tr class="trColor">
                                                                <td class="tdColor"><label for="specialist">Assigned Doctor</label></td>
                                                                <td class="tdColor"><select name="show-filter" ng-model="assigned" required="required" class="form-control"
                                                                                            ng-options="m.DID as m.NAME for m in doctors"  >
                                                                    </select></td>
                                                            </tr>
                                                            <tr class="trColor">
                                                                <td class="tdColor"><label for="title">Title</label></td>
<!--                                                                <td><input type="text" class="form-control" ng-model="title" required="required" ></td>-->
                                                                <td><select class="form-control" ng-model = "title" required="required" >
                                                                        <option value="lab">Lab</option>
                                                                        <option value="ray">Ray</option>
                                                                        <option value="session">Session</option>
                                                                    </select></td>
                                                            </tr>
                                                            <tr class="trColor">
                                                                <td class="tdColor"><label for="ins">Description</label></td>
                                                                <td><textarea id="instruction" rows="2" cols="40" ng-model ="taskInstruction" style="border: 1px solid;"
                                                                              required="required"></textarea></td><br>
                                                            </tr>
                                                        </table>
                                                        <button class="btn btn-primary" style="float: right;" type="submit" ><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Instruction</button>
                                                    </form>
                                                    <br>
                                                    <div>
                                                        <table class="colorTable">
                                                            <tr style="display:none;">
                                                                <td>Doctor</td>
                                                                <td>Title</td>
                                                                <td>Description</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr class ="trColor" ng-repeat="p in tasks track by $index">
                                                                <td >{{p.NAME}}</td>
                                                                <td >{{p.TITLE}}</td>
                                                                <td >{{p.description}}</td>
                                                                <td ><a ng-click="deleteMedicine(p.task_ID,p.DID)" class="pull-right"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                                            </div>
                                        <!--//////////////////////////////////////////////////////////////////-->
                                        <?php
                                        $num=0;
                                        if(count($record) == 4)
                                        {
                                            echo '<div class="panel-body">
											<div class="panel-group" id="accordion">
                                                    <!--//////////// 1 ////////////////////////////////////-->
                                                         <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-target="#collapseOne" >General Information</a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseOne" class="panel-collapse collapsein">
                                                                <div class="panel-body">
                                                                    <table class="colorTable">
                                                                        <tr class="trColor">
                                                                            <td class="tdColor">Patient Name</td>';
                                                                                if($record[$x+1] != null)
                                                                                {
                                                                                    $name= $record[$x+1];
                                                                                }
                                                                                else{$name= " ";}
                                                                                echo '<td>'. $name .'</td>';
                                                                                $x=$x+2;
                                                                                ?>
                                                                                </tr>
                                                                                <tr class="trColor">
                                                                                    <td class="tdColor">Date of birth</td>
                                                                                    <?php
                                                                                    if($record[$x+1] != null)
                                                                                    {
                                                                                        echo '<td>' . $record[$x + 1] . '</td>';
                                                                                    }
                                                                                    else{echo '<td>'. " " .'</td>';}
                                                                                    ?>
                                                                                </tr>
                                                                                <tr class="trColor">
                                                                                    <td class="tdColor">Age at diagnosis</td>
                                                                                    <?php
                                                                                    echo '<td>'. " " .'</td>';
                                                                                    ?>
                                                                                </tr>
                                                                                <tr class="trColor">
                                                                                    <td class="tdColor">Support contact</td>
                                                                                    <?php
                                                                                    echo '<td>'. " " .'</td>';
                                                                                    ?>
                                                                                </tr>
                                                                                <tr class="trColor">
                                                                                    <td class="tdColor">Family history</td>
                                                                                    <?php
                                                                                    echo '<td>'. " " .'</td>';
                                                                                    ?>
                                                                                </tr>
                                                                                <tr class="trColor">
                                                                                    <td class="tdColor">Genetic testing</td>
                                                                                    <?php
                                                                                    echo '<td>'. " " .'</td>
                                                                                </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                         </div>
                                                    <!--//////////////// 2 ////////////////-->
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-target="#collapseTwo">Labs And Rays</a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    <?php
                                                                        echo "There is not any Labs";

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-target="#collapseEight">Prescriptions</a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseEight" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    There is not a record.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!--///////////////// 3 ////////////////////////////////-->
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-target="#collapseThree">Background Information</a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseThree" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    <table class="colorTable">
                                                                       <tr class="trColor">
                                                                        <td class="tdColor">Other health concerns</td>';?>
                                                                        <?php
                                                                        echo '<td>'. " " .'</td>';
                                                                        ?>
                                                                    </tr>
                                                                    <tr class="trColor">
                                                                        <td class="tdColor">Echocardiogram or MUGA result</td>
                                                                        <?php
                                                                        echo '<td>'. " " .'</td>';
                                                                        ?>
                                                                    </tr>
                                                                    <tr class="trColor">
                                                                        <td class="tdColor">Additional comments</td>
                                                                        <?php
                                                                        echo '<td>'. " " .'</td>';
                                                                        ?>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--//////////// 4 ////////////////////////////////////-->
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-target="#collapseFour">Left breast</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseFour" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <table class="colorTable">
                                                                    <tr class="trColor">
                                                                        <td class="tdColor">Definitive breast surgery</td>
                                                                        <?php
                                                                        echo '<td>'. " " .'</td>';
                                                                        ?>
                                                                    </tr>
                                                                    <tr class="trColor">
                                                                        <td class="tdColor">Sentinel node biopsy</td>
                                                                        <?php
                                                                        echo '<td>'. " " .'</td>';
                                                                        ?>
                                                                    </tr>
                                                                    <tr class="trColor">
                                                                        <td class="tdColor">Other health concerns</td>
                                                                        <?php
                                                                        echo '<td>'. " " .'</td>';
                                                                        ?>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--//////////// 5 ////////////////////////////////////-->
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-target="#collapseFive">Collapsible
                                                                    Group Item #4</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseFive" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                There is not a record.
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--//////////// 6 ////////////////////////////////////-->
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-target="#collapseSix">Collapsible
                                                                    Group Item #4</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseSix" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                There is not a record.
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--//////////// 7 ////////////////////////////////////-->
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-target="#collapseSeven">Collapsible
                                                                    Group Item #4</a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseSeven" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                There is not a record.
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!--////////////////////////////////////////////////////////////////////////////////////-->
                                                </div>
                                            </div>
											 </div>
                </div>
            </div>
                                        <?php
                                        }
                                        else
                                        {
                                        include_once("../controller/displayRecordCont.php");
                                        $controller = new displayRecordCont();
                                        $wh = $controller->_getLabs($id);
                                        $pres = $controller->_getPrescribtion($id);
                                            $num = 0;
                                            echo '<div id="updateForm">
                                                            <form ng-controller = "updatecontroller" method="post">
											<div class="panel-body">
											<div class="panel-group" id="accordion">
                                                    <!--//////////// 1 ////////////////////////////////////-->
                                                         <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" >General Information</a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseOne" class="panel-collapse collapsein">
                                                                <div class="panel-body">
                                                                    <table class="colorTable">
                                                                        <tr class="trColor">
                                                                            <td class="tdColor">Patient Name</td>';
                                                                            if ($record[$x + 1] != null && $record[$x + 3] != null) {
                                                                                $name = $record[$x + 1] . ' ' . $record[$x + 3];
                                                                            } else {
                                                                                $name = " ";
                                                                            }
                                                                            echo '<td>' . $name . '</td>';
                                                                            $x = $x + 4;
                                                                            ?>
                                                                        </tr>
                                                                        <tr class="trColor">
                                                                            <td class="tdColor">Date of birth</td>
                                                                            <?php
                                                                            if ($record[$x + 1] != null) {
                                                                                echo '<td>' . $record[$x + 1] . '</td>';
                                                                            } else {
                                                                                echo '<td>' . " " . '</td>';
                                                                            }
                                                                            $x = $x + 2;
                                                                            ?>
                                                                        </tr>
                                                                        <tr class="trColor">
                                                                            <td class="tdColor">Age at diagnosis</td>
                                                                            <?php
                                                                            echo '<td>' . $record[$x + 1] . '</td>';
                                                                            $x = $x + 2;
                                                                            ?>
                                                                        </tr>
                                                                        <tr class="trColor">
                                                                            <td class="tdColor">Support contact</td>
                                                                            <?php
                                                                            echo '<td>' . $record[$x + 1] . '</td>';
                                                                            $x = $x + 2;
                                                                            ?>
                                                                        </tr>
                                                                        <tr class="trColor">
                                                                            <td class="tdColor">Family history</td>
                                                                            <?php
                                                                            echo '<td>' . $record[$x + 1] . '</td>';
                                                                            $x = $x + 2;
                                                                            ?>
                                                                        </tr>
                                                                        <tr class="trColor">
                                                                            <td class="tdColor">Genetic testing</td>
                                                                            <?php
                                                                            echo '<td>' . $record[$x + 1] . '</td>';
                                                                            $x = $x + 2;
                                                                       echo '</tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                         </div>
                                                    <!--//////////////// 2 ////////////////-->
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Labs And Rays</a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    <table class="colorTable">
                                                                        <thead>
                                                                            <tr class="trColor">
                                                                                <th class="tdColor">Labs</th>
                                                                                <th class="tdColor">Rays</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>';?>
                                                                            <?php
                                                                            if (count($wh) == 0) {
                                                                                echo "There isn't any Labs or Rays";
                                                                            } else {
                                                                                echo '<form  name="getLabsRays"  action="../controller/compareLabRay.php" method="POST">';                       }
                                                                                for ($m = 0; $m < count($wh); $m = $m + 6) {
                                                                                    if ($wh[$m] == 'Flag'){
                                                                                        echo '<tr class="trColor">
                                                                                                <td>';
                                                                                                if($wh[$m + 1] == 'l'){
                                                                                                    $num = $num + 1;
                                                                                                    echo '<a href="../view/LabsIndex.php?id='.$wh[$m + 3].'" style="color: black;">' . $wh[$m + 5] . ' </a>
                                                                                                            <input type="checkbox" name="Labs[]" value=' . $wh[$m + 3] . '>';
                                                                                                }
                                                                                                echo'</td>
                                                                                                     <td>';
                                                                                                     if($wh[$m + 1] == 'r'){
                                                                                                        $num = $num + 1;
                                                                                                        echo '<a href="../view/LabsIndex.php?id='.$wh[$m + 3].'" style="color: black;">' . $wh[$m + 5] . ' </a>
                                                                                                                <input type="checkbox" name="Labs[]" value=' . $wh[$m + 3] . '>';
                                                                                                     }
                                                                                                     echo '</td>
                                                                                        </tr>';
                                                                                    }
                                                                                }
                                                                                $num = 0;
                                                                                echo '<br>
                                                                                    <input type="submit" name="compare" value="Compare" style="clear: right; float: right;">
                                                                                </form>
                                                                                </div>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!--/////////////////////////////////8//////////////////////-->
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">Prescriptions</a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseEight" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    <table class="colorTable">
                                                                        <tbody>';?>
                                                                            <?php
                                                                            if (count($pres) == 0) {
                                                                                echo "There isn't any prescriptions";
                                                                            } else {
                                                                                for ($m = 0; $m < count($pres); $m = $m + 4) {
                                                                                    if ($pres[$m] == 'ID'){
                                                                                        echo '<tr class="trColor">
                                                                                                <td>
                                                                                                    <a href="../controller/patientPrescriptionController.php?id='.$pres[$m + 1].'" style="color: black;">' . $pres[$m + 3] . ' </a>
                                                                                                </td>
                                                                                        </tr>';
                                                                                        $m=$m+4;
                                                                                    }
                                                                                }
                                                                            }?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>     
                                                        													
														<!--///////////////// 3 ////////////////////////////////-->
                                                        
																
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Background Information</a>
                                                                        </h4>
                                                                    </div>
                                                                    <div id="collapseThree" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                            <table class="colorTable">
                                                                                <tr class="trColor">
                                                                                    <td class="tdColor">Other health concerns</td>
                                                                                    <?php
                                                                                    echo '<td>' . $record[$x + 1] . '</td>';
                                                                                    $x = $x + 2;
                                                                                    ?>
                                                                                </tr>
                                                                                <tr class="trColor">
                                                                                    <td class="tdColor">Echocardiogram or MUGA result</td>
                                                                                    <?php
                                                                                    echo '<td>' . $record[$x + 1] . '</td>';
                                                                                    $x = $x + 2;
                                                                                    ?>
                                                                                </tr>
                                                                                <tr class="trColor">
                                                                                    <td class="tdColor">Additional comments</td>
                                                                                    <?php
                                                                                    echo '<td>' . $record[$x + 1] . '</td>';
                                                                                    $x = $x + 2;
                                                                                    ?>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    <!--//////////// 4 ////////////////////////////////////-->
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Left breast</a>
                                                                        </h4>
                                                                    </div>
                                                                    <div id="collapseFour" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                            <table class="colorTable">
                                                                                <tr class="trColor">
                                                                                    <td class="tdColor">Definitive breast surgery</td>
                                                                                    <?php
                                                                                    echo '<td>' . $record[$x + 1] . '</td>';
                                                                                    $x = $x + 2;
                                                                                    ?>
                                                                                </tr>
                                                                                <tr class="trColor">
                                                                                    <td class="tdColor">Sentinel node biopsy</td>
                                                                                    <?php
                                                                                    echo '<td><input type="text" value='.$record[$x + 1].' placeholder='.$record[$x + 1].' ng-model = "node"></td>';
                                                                                    $x = $x + 2;
                                                                                    ?>
                                                                                </tr>
                                                                                <tr class="trColor">
                                                                                    <td class="tdColor">Axillary Dissection</td>
                                                                                    <?php
                                                                                    echo '<td>' . $record[$x + 1] . '</td>';
                                                                                    ?>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    <!--//////////// 5 ////////////////////////////////////-->
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Collapsible
                                                                                Group Item #4</a>
                                                                        </h4>
                                                                    </div>
                                                                    <div id="collapseFive" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                                            veniam,
                                                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                                                            esse
                                                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                                                            cupidatat
                                                                            non proident, sunt in culpa qui officia deserunt mollit anim id est
                                                                            laborum.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    <!--//////////// 6 ////////////////////////////////////-->
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Collapsible
                                                                                Group Item #4</a>
                                                                        </h4>
                                                                    </div>
                                                                    <div id="collapseSix" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                                            veniam,
                                                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                                                            esse
                                                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                                                            cupidatat
                                                                            non proident, sunt in culpa qui officia deserunt mollit anim id est
                                                                            laborum.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    <!--//////////// 7 ////////////////////////////////////-->
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">Collapsible
                                                                                Group Item #4</a>
                                                                        </h4>
                                                                    </div>
                                                                    <div id="collapseSeven" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                                            veniam,
                                                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                                                            esse
                                                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                                                            cupidatat
                                                                            non proident, sunt in culpa qui officia deserunt mollit anim id est
                                                                            laborum.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <!--////////////////////////////////////////////////////////////////////////////////////-->
                                                                <input type="button" value="Update" ng-click = "updateRec();">
                                                            </form>
                                                        </div>
                                            </div>
                                        <?php
                                            }
                                        ?>
                                                                        </tr>
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
        </html>
        <?php
    }
}
}
?>
