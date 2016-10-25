<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 6/20/2016
 * Time: 2:50 AM
 */
session_start();
if(isset($_SESSION['FNAME']))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8" />
    <title>اشعارات الادوية</title>
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
    <div class="grid_2 floatright  marginlt60">
        <div class="box sidemenu " style="margin-top:30px;">
            <div class="block " id="section-menu">
                <ul class="section menu one" style="text-align:right;">
                    <li><a class="menuitem ">الميعاد المقبل</a>
                        <ul class="submenu">
                            <li><a href="#">12-3-2016</a> </li>
                        </ul>
                    </li>
                    <li><a class="menuitem ">التواصل</a>
                        <ul class="submenu ">
                            <li><a href="allMesseges.php">الرسائل</a></li>
                        </ul>
                    </li>
                    <li><a class="menuitem">بحث</a>
                        <form action="#">
                            <ul class="submenu">
                                <div class="block">
                                    <li><input class="submenu" id="qsearch" type="text" name="qsearch"
                                               placeholder=" بحث..." width="20px" style="text-align:right; padding:5px;
											margin-right:5px; margin-top:5px;"/></li><br>
                                    <li><center><input class="submenu" value="بحث" type="submit"
                                                       name="searchsubmit"/></center></li>
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
            <h2 class="floatright">الاشعارات</h2>
            <div class="block" style="margin-top:30px;">
                <div class="message info">
                    <?php
                    $result = $_SESSION['drugsNotifications'];
                    $counter = 0;
                    $n = "null";
                    echo '<div class="panel-group" id="accordion">';
                    foreach($result as $x)
                    {
                        if($x['NAME'] != $n||$counter == 0)// lw awel mara
                        {
                            $counter++;
                            $n = $x['NAME'];
                            echo '
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse"  data-parent="#accordion"
                                                href="#'.$x['NAME'].'">'.$x['NAME'].'</a>
                                            </h4>
                                        </div>';
                            echo '<div id="'.$x['NAME'].'" class="panel-collapse collapse">
                                                <ul class="list-group">';
                            foreach($result as $y)
                            {
                                if($x['NAME'] == $y['NAME'])
                                {
                                    $t = substr($y['time'],11);
                                     if($t<='11:59:59')
                                    {
                                        echo '
                                                    <li class="list-group-item">'.$t.' am</li>';

                                    }
                                    else if ($t>'11:59:59')
                                    {
                                        echo '
                                                <li class="list-group-item">'.$t.' pm</li>';


                                    }
                                }
                            }
                            echo '</ul>
                                            <div class="panel-footer">'.$x['description'].'</div>
                                                </div>
                                            ';
                            echo '</div>
                                        ';
                        }
                    }
                    echo '</div>';
                    ?>
                </div>
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
}?>