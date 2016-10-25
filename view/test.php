<?php
?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html"
              xmlns="http://www.w3.org/1999/html">
        <head>
            <meta charset="UTF-8" />
            <title>Display Record</title>
            <meta content="width=device-width, initial-scale=1.0" name="viewport" />
            <link rel="stylesheet"  href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/themes/ui-lightness/jquery-ui.css"/>

</head>
<body>
<script type="text/javascript">
$(document).ready(function() {
    $("#dialog-message").dialog({
      autoOpen: false,
      modal: true
    });

$(".confirmLink").click(function(e) {
    e.preventDefault();
    var targetUrl = $(this).attr("href");
	alert(targetUrl);
$("#dialog-message").dialog({
    modal: true,
    draggable: false,
    resizable: false,
    position: ['center', 'top'],
    show: 'blind',
    hide: 'blind',
    width: 400,
    dialogClass: 'ui-dialog-osx',
    buttons: {
    "Confirm" : function() {
		  
          window.location.href = targetUrl;
        },
        "Cancel" : function() {
          $(this).dialog("close");
        }

    }
});
$("#dialog-message").dialog("open");
});
  });
				</script>
<a class="confirmLink" href="#">Hello World!</a><br><br>
<a class="confirmLink" href="#">Hello World!</a>

<div id="dialog-message" title="Important information">
    <span class="ui-state-default ui-corner-all" style="float: left; margin:0 7px 0 0;"><span class="ui-icon ui-icon-info" style="float:left;"></span></span>
    <div style="margin-left: 23px;">
        <p>
            We're closed during the winter holiday from 21st of December, 2010 until 10th of January 2011.
            <br /><br />
            Our hotel will reopen at 11th of January 2011.<br /><br />
            Another line which demonstrates the auto height adjustment of the dialog component.
        </p></div>
</div>
</body>
</html>
