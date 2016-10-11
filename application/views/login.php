<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>
function showUser(user,pass) {
  if (user=="") {
    document.getElementById("txtHint").innerHTML="<font color='red'>โปรดใส่ Username !!</font>";
    return;
  } 
  if (pass=="") {
    document.getElementById("txtHint").innerHTML="<font color='red'>โปรดใส่ Password !!</font>";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		if(xmlhttp.responseText=='<font color=Green>Successful</font>')
		{
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	  window.location="import"
		}
		else
		{
		document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
	}
  }
  xmlhttp.open("GET","login/check?user="+user+"&pass="+pass,true);
  xmlhttp.send();
}
</script>
</head>
<body>
<div data-role="page">

	<div data-role="header">
		<h1>LOG IN SYSTEM</h1>
	</div><!-- /header -->

	<div role="main" class="ui-content">
    
		<center><div id="txtHint"><b>Please Log In.</b></div></center>
        <center>
        <table>
        <tr>
        <td><b>Username </b></td>
        <td><input type="text"  data-clear-btn="true" name="txtUser" id="User" value="admin"></td>
        </tr>
        <tr>
        <td><b>Password </b></td>
        <td><input type="password" data-clear-btn="true"  name="txtPass" autocomplete="off" id="Pass" value="admin"></td>
        </tr>
        </table>
        <button class="ui-btn ui-corner-all" onClick="showUser(User.value,Pass.value)">Login</button>
        </center>
        
        
        
	</div><!-- /content -->

	<div data-role="footer">
		<h4>Powered by GeniusNetwork</h4>
	</div><!-- /footer -->
</div><!-- /page -->
</body>
</body>
</html>