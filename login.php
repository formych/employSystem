<!--
    Version 0:simple login
	Version 1:add return incorrect information
-->
<html>
    <head>
	<link rel="stylesheet" type="text/css"  href="css/Login.css"/>
	<meta http-equiv="Content-Type" type="text/html" charset="utf-8"/>
    <title>employManageSysyem</title>
	</head>

    <body>
	<div class="style1">
    <h2>Login:</h2> 
	<form action="login_exe" method="post" name="login" >
	UserNmae:<input type="text" name="uname" />           <br/>
	PassWord:<input type="password" name="pwd" />         <br/>
	Save cookies yes or not? <input type="checkbox" name="cookies" value="save"/> <br/>
	<input type="submit" value="Login" /> <br/>	
	<a href="regiser.html" >Sign Up</a>   <br/>
	</form>
	<!--Give error information when UserName or password is incorrect-->
	<?php
	    if (!empty($_GET[error]))
		{
			echo "<font color = 'red' size = '3px'>UserNmae or PassWord is incorrect!</font>";
	    }		
	?>
	</div>
    </body>
</html>