<html>
    <head>
	    <meta http-equiv="Conten-Type" type="text/html" charset="utf-8" />
		<title> addEmp</title>
	</head>
	<body>
	    <h2>AddEmp</h2>
		<form action="empProcess_control.php" method="post">
		<table>
		    <tr><td>Name</td><td><input type="text" name="name"></td></tr>
			<tr><td>Pwd</td><td><input type="text" name="pwd"></td></tr>
			<tr><td>Grade</td><td><input type="text" name="grade"></td></tr>
			<tr><td>Salary</td><td><input type="text" name="salary"></td></tr>
			<tr><td>Email</td><td><input type="text" name="email"></td></tr>
			<tr><td><input type="submit" name="submit"> 
			        <input type="hidden" name="type" value="addEmp"></td>
			    <td><input type="reset" name="reset"></td></tr>
			
		</table>
		</form>
	
	
	
	</body>
</html>