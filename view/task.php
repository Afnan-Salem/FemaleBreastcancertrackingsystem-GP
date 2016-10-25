<?php

echo
'<style>
.dropbtn {
    background-color: #428bca;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
	margin-right:-150px;
	margin-top:10px;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
.dropdown-content .follow{

 color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content  .unfollow{
 color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}


.dropdown:hover .dropdown-content {
    display: block;
    left:100%;
}

.dropdown:hover .dropbtn {
    background-color: #008dcc;
}
.dropdown {
    position: relative;
    display: inline-block;
	Z-index: 1000;
}
.progress
{
height:10px;
width:40%;
float:right;
}
.dangerb
{
    background-color:#ff6347;
}
.h2f{
background-color:#000;
color:#cc;
}
.glyphicon{
margin-top:-12px;
}

</style>
<script>
		
		
		
		
</script>
';
/**
 * Created by PhpStorm.
 * User: nooor
 * Date: 3/11/2016
 * Time: 10:39 PM
 */
class task
{
public function __construct($row2,$row1,$row3,$row4,$row5)
{ //session_start();
if(isset($_SESSION['DID']))
		{
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8"/>
        <title>Patient Tasks</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="css/text.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen"/>
		<link rel="stylesheet" href="css/colors.css"/>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
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
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

            <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/themes/ui-lightness/jquery-ui.css">
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
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src=js/angular.min.js></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js"></script>
        <script type="text/javascript" src="../model/js/comment.js"></script>
        <!-- END: load jquery -->
        <script type="text/javascript" src="js/table/table.js"></script>
        <script src="js/setup.js" type="text/javascript"></script>



        <style>
            /*
            FORM STYLING
            */
            #fileselector {

                margin: 10px;
            }

            #upload-file-selector {
                display: none;
            }

            .margin-correction {
                margin-right: 10px;
            }

            .chat li {
                margin-bottom: 10px;
                padding-bottom: 5px;
                border-bottom: 1px dotted #B3A9A9;
            }

            .chat li.left .chat-body {
                margin-left: 10px;
            }

            .chat li .chat-body p {
                margin: 0;
                color: #777777;
            }

            .panel .slidedown .glyphicon, .chat .glyphicon {
                margin-right: 5px;
            }

            .panel-body {
                overflow-y: scroll;
                height: 150px;
            }

            ::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
                background-color: #F5F5F5;
            }

            ::-webkit-scrollbar {
                width: 12px;
                background-color: #F5F5F5;
            }

            ::-webkit-scrollbar-thumb {
                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
                background-color: #555;
            }

        </style>

        <script type="text/javascript">

            $(document).ready(function () {
                setupLeftMenu();

                $('.datatable').dataTable();
                setSidebarHeight();
preventDefault();

            });
function show(str,id){  

str.firstChild.data = str.firstChild.data == "UnFollow" ? "Follow" : "UnFollow";
//alert(str.lastChild.data); 7atetl3 m3kosa unfollow x el pannel = follow x el js ana 3aiza el pannel 3la tol el conditions 
if(str.lastChild.data=="UnFollow") //do followers insertion 
{
//alert("follow");
$( "#"+id).css("background-color", "yellow");
	$("#sp").load("../model/insertFollowersModel.php?TID="+id);
	
	preventDefault();

}
else if(str.lastChild.data=="Follow")
{// do followers deletion 
//alert("unfollow");
$( "#"+id).css("background-color", "#E6F0F3");

    $("#sp").load("../model/deleteFollowersModel.php?TID="+id); //sp dummy malosh ay lazma ana just banade beh 
	
	preventDefault();
}
};


	function show3(strr,id)
		{
           if(strr.lastChild.data=="Delete")
            {
			
			//alert(id);
			$("."+id).hide();
	$("#spp").load("../model/deleteTaskModel.php?TID="+ id);
		preventDefault();
            }
			
        };
		function show4(strr,id)
		{
            if(strr.lastChild.data=="Archive")
            {
			/**/

	$("#spoo").load("../model/archiveTaskModel.php?TID="+ id);
	//

			$("."+id).hide();
			preventDefault();
		
            }
			
        };
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
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->
   <div class="grid_9">
    <div class="box round first" style="height:33%;">
        <h2>Case ID :</h2>
        <br>

        <div class="block">
            <br>
            <ul style="square">
                <li>Name : <?php echo $row3[1];?>
                    <?php echo $row3[3];?>
                    <?php echo $row3[5];?>
                </li>
                <li>DATE OF BIRTH :  <?php echo $row3[7];?></li>

            </ul>
        </div>
    </div>


    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////// from heree -->
     <div id="getmsg">
      <div ng-controller="Patientgetmsgcontroller">
	 
	<?php
	
    if (count($row2) > 0) {
        $count =0;
        for ($x = 0; $x < count($row2); $x+=2) {
            $count=$count+1;
	 $d = 0;
        $dr=0;
                    if ($row2[$x] == "NAME" ){
                       $n=$x;
					   
				$follower=0;				
		for($j = 0; $j< count($row5); $j++){
		//echo $row4[($j*2)+3];	
					if($row5[$j]['TASK_ID']==$row1[($x*8)+1] &&$row5[$j]['DID']==$_SESSION['DID'])
					{
					$follower=1;
					break;
					}
					
					}
					//echo $follower;
                    ?>
                    <div class="grid_5">
					<div class="<?php  echo $row1[($x*8)+1] ?>">
                        <div class="box round first">
						  <input type="hidden" id="TID" value="<?php echo  $row1[($x*8)+1];?>">

                           
  <?php if($row1[$dr+1] == $row4[$d+1])
                                    {
                                        $currentDate = date_create(date('Y-m-d'));
                                        $pDate = date_create($row1[($x*8)+15]);
                                        $curDay = $currentDate->format('d');
                                        $pDay = $pDate->format('d');
                                        $curm = $currentDate->format('m');
                                        $pm = $pDate->format('m');
                                        $maxDay = max($curDay,$pDay);
                                        $maxm = max($curm,$pm);
                                        $diff = date_diff($currentDate,$pDate);
                                        $status = $row4[$d+3];
                                       // echo 'max-->'.$currentDate ->format('Y-m-d').'<br>';
                                        if($diff ->format('%a') == 0)
                                        {
                                           ?>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" style="width:100%;" title="This task is due soon">
                                                </div>
                                            </div>

                                        <?php
                                            $PID = '1';
                                            include_once '../controller/notifyTaskController.php';
                                            $notify = new notifyTaskController();
                                            $inserted = $notify->_notifyTask($row1[$dr+1],$PID,$row1[$dr+3],$row1[$dr+7],$row4[$d+5],$row4[$d+7]);
                                            if($inserted == true)
                                            {

                                            }
                                        }
                                        elseif($diff ->format('%a') > 0 && $maxDay == $pDay || $maxDay == $curDay && $maxm == $pm)
                                        {
                                            ?>
                                           <div class="progress">
                                                <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" style="width:100%;" title="This task is due later">
                                                </div>
                                           </div>
                                        <?php
                                        }
                                        elseif($diff ->format('%a') == 1 && $maxDay == $curDay && $status == 1)
                                        {
                                           ?>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" style="width:100%;" title="This Task is recently past due">
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        elseif($diff ->format('%a') == 1 && $maxDay == $curDay && $status == 0)
                                        {
                                           ?>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" style="width:100%;" title="This task is due later">
                                                </div>
                                            </div>
                                        <?php
                                            $PID = '1';
                                            include_once '../controller/notifyTaskController.php';
                                            $notify = new notifyTaskController();
                                            $inserted = $notify->_notifyNewReservation($row1[$dr+1],$PID,$row1[$dr+3],$row1[$dr+7]);
                                            if($inserted == true)
                                            {

                                            }
                                        }
                                        elseif($diff ->format('%a') > 1 && $maxDay == $curDay && $maxm == $curm )
                                        {
                                            ?>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger progress-bar-striped active dangerb" role="progressbar" style="width:100%;" title="This Task is past due">
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }?>
									
                           
						

							
                            
							
						 <?php 
						 if($follower == 1)
                            {?>

                                <h2 id="<?php  echo $row1[($x*8)+1] ?>"style="background:yellow">Task<?php echo $count ?><?php echo $row2[$n +1] ?></h2>
                            <?php
                            }
                            else
                            {?>
                                 <h2 id="<?php  echo $row1[($x*8)+1] ?>">Task<?php echo $count ?><?php echo $row2[$n +1] ?></h2>
                            <?php
                            }
							
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if($row1[($x*8)+13]=='w')
	{ ?>
	<a id="fillwhite" href="#"style="float:right;padding-top:15px;margin-right:-90px;" ><i class="fa fa-circle-thin fa-2x " aria-hidden="true" title="upcomming"></i></a>
	
	<?php }
	else if($row1[($x*8)+13]=='g')
	{ ?>
	<a id="fillgreen" href="#" style="float:right;padding-top:15px;margin-right:-90px;"><i class="fa fa-circle fa-2x green" aria-hidden="true" title="This task is on Track"></i></a>
	
	<?php }
	else if($row1[($x*8)+13]=='y')
	{ ?>
	<a id="fillyellow" href="#" style="float:right;padding-top:15px;margin-right:-90px;"><i class="fa fa-circle fa-2x yellow" aria-hidden="true" title="This task has issues"></i></a>
	
	<?php }
	else if($row1[($x*8)+13]=='r')
	{ ?>
	<a id="fillred" href="#"style="float:right;padding-top:15px;margin-right:-90px;"><i class="fa fa-circle fa-2x red" aria-hidden="true" title="This Task is in danger and requires attention"></i></a>
	
	<?php }
                            
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                             if($_SESSION['TYPE']=="c" && $row3[9]== $_SESSION['DID'] && $row1[($x*8)+5] == 1 && $follower==1)
                            {
							
?>
                                <div class="dropdown" style="float:right; margin-left:60px;">
                                    <button class="dropbtn" ><span class="caret"></span></button>
                                    <div class="dropdown-content" style="left:-300%;">
                                        <a href="#"><div id="sp"><span onclick="show(this,<?php  echo $row1[($x*8)+1]?>)">UnFollow</span></div></a>
									<a href="#"><div id="spp"><span onclick="show3(this,<?php  echo $row1[($x*8)+1]?>)">Delete</span></div></a>
							
                                    </div>
                                </div>
								   
								
									
									 <span class="glyphicon glyphicon-ok" title="This task is marked complete"style="color:red;font-size: 25px;"></span>

                                <?php
                            }
							if($_SESSION['TYPE']=="c" && $row3[9]== $_SESSION['DID'] && $row1[($x*8)+5] == 1 && $follower==0)
                            {
							
							?>
                                <div class="dropdown" style="float:right;margin-left:60px;">
                                    <button class="dropbtn" ><span class="caret"></span></button>
                                    <div class="dropdown-content" style="left:-300%;">
                                         <a href="#"><div id="sp"><span onclick="show(this,<?php  echo $row1[($x*8)+1]?>)">Follow</span></div></a>
				<a href="#"><div id="spp"><span onclick="show3(this,<?php  echo $row1[($x*8)+1]?>)">Delete</span></div></a>
				<?php 
										//echo $contentComment;?>
										


                                    </div>
                                </div><br>
								
								 

									 <span class="glyphicon glyphicon-ok" title="this task is marked complete"style="color:red;font-size: 25px;"></span>
									 
                                <?php
                            }
							if($_SESSION['TYPE']=="c" && $row3[9]== $_SESSION['DID'] && $row1[($x*8)+5] == 0 && $follower==0)
                            {
							
							?>
						    
                                <div class="dropdown" style="float:right;">
                                    <button class="dropbtn" ><span class="caret"></span></button>
                                    <div class="dropdown-content" style="left:-300%;">
                                        <a href="#"><div id="sp"><span onclick="show(this,<?php  echo $row1[($x*8)+1]?>)">Follow</span></div></a>
                                    <a href="#"><div id="spp"><span onclick="show3(this,<?php  echo $row1[($x*8)+1]?>)">Delete</span></div></a>
									</div>
									</div><br>
									
									
								
                                <?php
                            }
			if($_SESSION['TYPE']=="c" && $row3[9]== $_SESSION['DID'] && $row1[($x*8)+5] == 0 && $follower==1)
                            {
							
							?>
						  
                                <div class="dropdown" style="float:right;">
                                    <button class="dropbtn" ><span class="caret"></span></button>
                                    <div class="dropdown-content" style="left:-300%;">
                                        <a href="#"><div id="sp"><span onclick="show(this,<?php  echo $row1[($x*8)+1]?>)">UnFollow</span></div></a>
                                    <a href="#"><div id="spp"><span onclick="show3(this,<?php  echo $row1[($x*8)+1]?>)">Delete</span></div></a>
									</div>
									</div><br>

								
									
									 
                                <?php
                            }
			
							  else if($_SESSION['TYPE']=="s" &&  $row1[($x*8)+3] == $_SESSION['DID'] &&  $row1[($x*8)+5] ==1 && $follower==1)
                            {
							
							?>
                                <div class="dropdown" style="float:right;">
                                    <button class="dropbtn" ><span class="caret"></span></button>
                                    <div class="dropdown-content" style="left:-300%;">
                                         <a href="#"><div id="sp"><span onclick="show(this,<?php  echo $row1[($x*8)+1]?>)">UnFollow</span></div></a>
										<a href="#"><div id="spoo"><span onclick="show4(this,<?php  echo $row1[($x*8)+1]?>)">Archive</span></div></a>



                                    </div>
                                </div><br>
								
									
									 <span class="glyphicon glyphicon-ok" title="Tis task is marked colplete"style="color:red;font-size: 25px;"></span>
									 <span class="glyphicon glyphicon-user" title="Asigned"style="color:blue;font-size: 25px;"></span>
                                <?php
                            }
							else if($_SESSION['TYPE']=="s" &&  $row1[($x*8)+3] == $_SESSION['DID'] &&  $row1[($x*8)+5] ==0&& $follower==0)
                            {
							
							?>
                                <div class="dropdown" style="float:right;">
                                    <button class="dropbtn" ><span class="caret"></span></button>
                                    <div class="dropdown-content" style="left:-300%;">
                                       <a href="#"><div id="sp"><span onclick="show(this,<?php  echo $row1[($x*8)+1]?>)">Follow</span></div></a>
										<a href="#"><div id="spoo"><span onclick="show4(this,<?php  echo $row1[($x*8)+1]?>)">Archive</span></div></a>



                                    </div>
                                </div><br>
								
									 <span class="glyphicon glyphicon-user" title="Assigned"style="color:blue;font-size: 25px;"></span>
                                <?php
                            }
							else if($_SESSION['TYPE']=="s" &&  $row1[($x*8)+3] == $_SESSION['DID'] &&  $row1[($x*8)+5] ==0&& $follower==1)
                            {
							?>

                                <div class="dropdown" style="float:right;">
                                    <button class="dropbtn" ><span class="caret"></span></button>
                                    <div class="dropdown-content" style="left:-300%;">
                                        <a href="#"><div id="sp"><span onclick="show(this,<?php  echo $row1[($x*8)+1]?>)">UnFollow</span></div></a>
										<a href="#"><div id="spoo"><span onclick="show4(this,<?php  echo $row1[($x*8)+1]?>)">Archive</span></div></a>



                                    </div>
                                </div><br>
								
									
									
									 <span class="glyphicon glyphicon-user" title="Assigned"style="color:blue;font-size: 25px;"></span>
                                <?php
                            }
							else if($_SESSION['TYPE']=="s" &&  $row1[($x*8)+3] == $_SESSION['DID'] &&  $row1[($x*8)+5] ==1&& $follower==0)
                            {
?>
                                <div class="dropdown" style="float:right;">
                                    <button class="dropbtn" ><span class="caret"></span></button>
                                    <div class="dropdown-content" style="left:-300%;">
                                  <a href="#"><div id="sp"><span onclick="show(this,<?php  echo $row1[($x*8)+1]?>)">Follow</span></div></a>
										<a href="#"><div id="spoo"><span onclick="show4(this,<?php  echo $row1[($x*8)+1]?>)">Archive</span></div></a>



                                    </div>
                                </div><br>
								
									
									 <span class="glyphicon glyphicon-ok" title="This task is marked complete"style="color:red;font-size: 25px;"></span>
									 <span class="glyphicon glyphicon-user" title="Assigned"style="color:blue;font-size: 25px;"></span>
                                <?php
                            }
							else if($_SESSION['TYPE']=="s" &&  $row1[($x*8)+3] != $_SESSION['DID'] &&  $row1[($x*8)+5] ==1&& $follower==0)
                            {
							?>

                                <div class="dropdown" style="float:right;">
                                    <button class="dropbtn" ><span class="caret"></span></button>
                                    <div class="dropdown-content" style="left:-300%;">
                                         <a href="#"><div id="sp"><span onclick="show(this,<?php  echo $row1[($x*8)+1]?>)">Follow</span></div></a>
										<a href="#"><div id="spoo"><span onclick="show4(this,<?php  echo $row1[($x*8)+1]?>)">Archive</span></div></a>



                                    </div>
                                </div><br>
									
									 <span class="glyphicon glyphicon-ok" title="This task is marked complete"style="color:red;font-size: 25px;"></span>
                                <?php
                            }
							else if($_SESSION['TYPE']=="s" &&  $row1[($x*8)+3] != $_SESSION['DID'] &&  $row1[($x*8)+5] ==1&& $follower==1)
                            {?>			  
                                <div class="dropdown" style="float:right;">
                                    <button class="dropbtn" ><span class="caret"></span></button>
                                    <div class="dropdown-content" style="left:-300%;">
                                        <a href="#"><div id="sp"><span onclick="show(this,<?php  echo $row1[($x*8)+1]?>)">UnFollow</span></div></a>
										<a href="#"><div id="spoo"><span onclick="show4(this,<?php  echo $row1[($x*8)+1]?>)">Archive</span></div></a>



                                    </div>
                                </div><br>
									
									 <span class="glyphicon glyphicon-ok" title="This task is marked complete"style="color:red;font-size: 25px;"></span>
                                <?php
                            }
							else if($_SESSION['TYPE']=="s" &&  $row1[($x*8)+3] != $_SESSION['DID'] &&  $row1[($x*8)+5] ==0&& $follower==1)
                            {?>

                                <div class="dropdown" style="float:right;">
                                    <button class="dropbtn" ><span class="caret"></span></button>
                                    <div class="dropdown-content" style="left:-300%;">
                                        <a href="#"><div id="sp"><span onclick="show(this,<?php  echo $row1[($x*8)+1]?>)">UnFollow</span></div></a>
										<a href="#"><div id="spoo"><span onclick="show4(this,<?php  echo $row1[($x*8)+1]?>)">Archive</span></div></a>



                                    </div>
                                </div><br>
									
									 
                                <?php
                            }
							else if($_SESSION['TYPE']=="s" &&  $row1[($x*8)+3] != $_SESSION['DID'] &&  $row1[($x*8)+5] ==0&& $follower==0)
                            {
							?>

                                <div class="dropdown" style="float:right;">
                                    <button class="dropbtn" ><span class="caret"></span></button>
                                    <div class="dropdown-content" style="left:-300%;">
                                        <a href="#"><div id="sp"><span onclick="show(this,<?php  echo $row1[($x*8)+1]?>)">Follow</span></div></a>
										<a href="#"><div id="spoo"><span onclick="show4(this,<?php  echo $row1[($x*8)+1]?>)">Archive</span></div></a>



                                    </div>
                                </div> <br>
                                <?php
                            }
                          
?>
                            <div class="block">
                                <br>
                                <ul style="square">
                                    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////// from heree i dooo-->
                                    TITLE: <?php echo $row1[($x*8)+7] ;
                                    ?>
                                    <br>
                                    Intiation Date:<?php echo $row1[($x*8)+11] ?>
                                    <p>
									<?php
                                    if($row1[$dr+1] == $row4[$d+1])
                                    {
                                        ?>
                                         Process Date:<?php echo $row1[($x*8)+15];
                                        $d = $d + 8;
                                        $dr = $dr + 12;

                                    }
                                    ?><br>
                                        Description:<?php echo $row1[($x*8)+9] ?>
                                    </p>


                                    <div class="panel-body">
									 <?php
                                        $taskidc = $row1[($x*8)+1];
                                       // echo $taskidc;
                                     ?>
									 
                                        <div class="chat" ng-repeat="message in msgs">
										  <div ng-if = "message.taskID == <?php echo $taskidc; ?>">
                                            <li class="left clearfix">
                                                <div class="chat-body clearfix">
                                                    <div class="header">
                                                        <strong class="primary-font">{{message.NAME}}</strong>
                                                        
                                                    </div>
                                                    <p>
                                                         {{message.COMMENT}}
                                                    </p>
                                                </div>
												<br>

                                                <small class="pull-left text-muted">
                                                <span class="fa fa-download">   {{message.ATTACHEMENT}}   </span>
                                                </small><br>
                                                <small class="pull-right text-muted">
                                                <span class="glyphicon glyphicon-time">  {{message.DATE}}  </span>
                                                </small>

                                               </li>

                                               </div>

                                              <div ng-if= "message.taskID != <?php echo $taskidc;?>">
                                              </div>

                                            </div>
                                          </div>

                                       <br>
                                           </li>
                                        </ul>
<?php
if( $row1[($x*6)+5] !=1){

?>							
                           <div   class="panel-footer" id="<?php echo 'c'.$row1[($x*8)+1]; ?>">
                                <div class="input-group">
                                    <form method="post">	
										<?php $contentComment = "you have anew comment in " .$row1[($x*8)+7] ." Task of ".$row3[1]." " .$row3[3]." ". $row3[5];
										//echo $contentComment;?>
										
                                        <input id="msg" type="text" ng-model="msg" name="msg" class="form-control input-sm" placeholder="Comment" />
										<input id="Ncontent" type="hidden" value="<?php echo $contentComment;?>" />

                                        <input type="submit" class="btn btn-primary btn" value=" Comment " id="btn-chat"  ng-click="sendmsg(<?php echo $taskidc;?>);"name="submit" />
                                     </form>
                                 </div>
                           </div>
<?php } ?>
                                    <br>
                                    </li>
                                </ul>
                            </div>
							
                        </div>
						</div>
                    </div>
                    <?php
                }
            }


         }?>
            </div>
          </div>
          </div>
            <div class="clear">
            </div>
        </div>

        <!-- ///////////////////////////////////////////////////////////////////////////////////////////////// toooo heree-->

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
}

}