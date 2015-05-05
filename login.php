<?php
    require_once('common.php');
	session_start();
?>
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
	UserNmae:<input type="text" name="uname" 
	        value=<?php getValFromCookie(uname); ?> /><br/>
	PassWord:<input type="password" name="pwd" 
            value=<?php getValFromCookie("pwd"); ?> />         <br/>
	CheckCode:<input type="text" name="checkCode"  /> 
	          <img src="checkCode.php " onclick="this.src='checkCode.php?num='+Math.random() " /> <br/>
	Save cookies yes or not? <input type="checkbox" name="cookie"  value="yes" /> <br/>
	<input type="submit" value="Login" /> <br/>	
	<a href="regiser.html" >Sign Up</a>   <br/>
	</form>
	<!--Give error information when UserName or password is incorrect-->
	<?php
	    if (!empty($_GET[errno]))
		{
		    if ($_GET[errno]==1)
			    echo "<font color = 'red' size = '3px'>UserNmae or PassWord is incorrect!</font>";
			else if ($_GET[errno]==2)
			    echo  "<font color = 'red' size = '3px'>Please login!</font>";
			else if ($_GET[errno]==3) 
			    echo "<font color = 'red' size = '3px'>CheckCode is wrong!</font>";
			else 
			{
			}
			
	    }		
	?>
	</div>
    </body>
</html>