<?php
/**
 * Created by PhpStorm.
 * User: magic net
 * Date: 6/30/2016
 * Time: 8:30 PM
 */
class create
{
    public function __construct($pids)
    {

        ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <style type="text/css">
                #addform
                {
                    width:500px;
                    height:330px;
                    margin-top:100px;
                    background-color:#585858;
                    border-radius:3px;
                    box-shadow:0px 0px 10px 0px #424242;
                    padding:10px;
                    box-sizing:border-box;
                    font-family:helvetica;
                    visibility:hidden;
                    display:none;
                }
            </style>
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

            <script>
                $(document).ready(function(){

                    $("#add").click(function(){
                        showpopup();
                    });
                    $("#close").click(function(){
                        hidepopup();
                    });

                });


                function showpopup()
                {
                    $("#addform").fadeIn();
                    $("#addform").css({"visibility":"visible","display":"block"});
                }

                function hidepopup()
                {
                    $("#addform").fadeOut();
                    $("#addform").css({"visibility":"hidden","display":"none"});
                }

                function add()
                {
                    var v = document.getElementById("patient");
                    var strUser = v.options[v.selectedIndex].text;
					$('#rs').load('add.php?name='+ strUser);
				}
            </script>
        </head>
        <body>
        <center>
            <input type="button" id="add" value="Add Ptients">
            <div id="addform">

                <form method="post" action=''>
                    <p>Choose Patient To Show Case Progress</p><br><br>

                    <select id="patient">
                        <?php
						session_start();
                        for($x=0; $x <count($pids);$x = $x +4)
                        {
                            ?>
							<option selected="selected">select patient to add</option>
                            <option value="<?php echo $pids[$x + 1] ?>"><?php echo $pids[$x + 3] ?></option>
                            <?php
                        }
						
                        ?>
                    </select><br><br>
                    <input type="submit" id="adding" value="Add" onclick="add();">
                    <input type="button" id="close" value="Close">
                </form>
            </div>
        </center>
		<div id="rs"></div>
        <div>
            <ul>
                <?php
                    //print_r($pids);
                ?>
            </ul>
        </div>
        </body>
        </html>
        <?php
    }
}