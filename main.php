
<html>
    <head>
	    <meta http-equiv = "Content-Type" type = "text/html" charset = "utf-8" />
		<link rel = "stylesheet" type = "text/css" href = "css/main.css" />
		<title>MainPage</title>
	</head>
	<body>
	    <div class = "style1">
		    User:<?php echo $_GET[uname]; ?>
		</div>
	    <div class = "style1">
		<h2>MainPage</h2>
		<a href = "addEmp.php">AddUsers</a>     <br/>
		<a href = "query.php?uname=<?php echo $_GET[uname]; ?>">QueryUsers</a>   <br/>
		<a href = "manage.php?uname=<?php echo $_GET[uname]; ?>">ManageUsers</a>  <br/>
		<a href = "login.php">SafeExit</a>  <br/>
		</div>	
	</body>
</html>