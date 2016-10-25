<html>
<body>
<script type="text/javascript">
    function show_student()
    {
        var strclass=document.getElementsByName("select_class")[0].value;
        document.getElementById("NAME").innerHTML="";
        var xmlhttp;
        if (window.XMLHttpRequest)
        {
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("NAME").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","include "../view/connection.php";?c="+strclass,true);

        xmlhttp.send();
    }
</script>
<select name="select_class" id="select_class"  onChange="show_student()">
    <option value="-1">Select...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
</select>

<div id="NAME">
</div>
</body>
</html>