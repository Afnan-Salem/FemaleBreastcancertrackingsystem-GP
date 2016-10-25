<?php
//session_start();
class savedLinks
{
    public function _getLinks($linksarray)
    {
        $_SESSION['links']=$linksarray;
        $DID = $_SESSION['DID'];
		 if(isset($_SESSION['DID']))
		{
        include_once '../controller/drNotify.php';
        $obj=new drNotify();
        $result = $obj->_construct($DID);
        ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta charset="UTF-8"/>
            <title>Saved Links</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
            <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen"/>
            <link rel="stylesheet" type="text/css" href="css/text.css" media="screen"/>
            <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen"/>
            <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen"/>
            <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen"/>
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <link rel="stylesheet"
                  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/calendarCss.css"/>
            <!--[if IE 6]>
            <link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen"/><![endif]-->
            <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/ie.css" media="screen"/><![endif]-->
            <!-- GLOBAL STYLES -->
            <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css"/>
            <!--END GLOBAL STYLES -->

            <!-- PAGE LEVEL STYLES -->
            <link rel="stylesheet" href="assets/plugins/fullcalendar-1.6.2/fullcalendar/fullcalendar.css"/>
            <link rel="stylesheet" href="assets/css/calendar.css"/>
            <!-- END PAGE LEVEL  STYLES -->
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
            <script type="text/javascript" src="ckeditor.js"></script>

            <script>
                /*function showLink() {
                 var links =  document.getElementById("link").value;

                 document.getElementById('display').innerHTML = links;}*/
                function savelink() {
                    var links = document.getElementById("link").value;
                    if (links == "") {
                        document.getElementById("display").innerHTML = "";
                        return;
                    } else {
                        if (window.XMLHttpRequest) {
                            // code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                        } else {
                            // code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function () {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                document.getElementById("display").innerHTML = xmlhttp.responseText;
                            }
                        };
                        xmlhttp.open("GET", "../model/savedLinksModel.php?lin=" + links, true);
                        xmlhttp.send();
                    }
                }

            </script>

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
                                <li>Hello Dr.<?php
                                    echo $_SESSION['NAME']; ?> </li>
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


            <!-- ////////////////////////////////////////////////////////////////////////// -->
                <div class="grid_10">
                    <div class="box round first grid">
                        <h2>Saved Links</h2>
                        <div class="block">
                            <div class="grid_7">
                                <br>
                                <br>
                                <form>
                                    <input type="text" name="Link" id="link">
                                </form>
                                <input type="submit" value="Add" onclick="savelink();"/>
                                <br>
                                <br>
                                <label>Your Saved Links :</label>
                                <div id="display1">
                                    <?php
                                    echo "<ul>";
                                    for ($x = 0; $x < count($linksarray); $x = $x + 2) {
                                        if ($linksarray[$x] == 'link') {
                                            //echo count($linksarray);
                                            echo "<li><a>" . $linksarray[$x + 1] . ".</a></li>";
                                        }
                                    }
                                    echo "</ul>";
                                    ?>
                                </div>
                                <div id="display"></div>
                            </div>

                            <div class="clear">
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
				} else {
header('Location: ../login.php');
}
    }}