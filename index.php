<html>
<head>  

<title> demo website </title>
</head>
<body>
<h1>hello all </h1>
<!... please consider this as comment ...>
<!... DB username faris and passwd is toor ...>
<?php
echo "<p>helloThere!</p>";
?>
<a href="login.php"> click here to log in </a><br><br>
<a href="register.php"> not hvae account! </a>

</body>
<br/>
	<h2 align="center">List</h2>
	<table width="100%" border="1px">
			<tr>
				<th>Id</th>
				<th>Details</th>
				<th>Post Time</th>
				<th>Edit Time</th>
			</tr>
			<?php
				mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
				mysql_select_db("first_db") or die("Cannot connect to database"); //connect to database
				$query = mysql_query("Select * from list Where public='yes'"); // SQL Query
				while($row = mysql_fetch_array($query))
				{
					Print "<tr>";
						Print '<td align="center">'. $row['id'] . "</td>";
						Print '<td align="center">'. $row['details'] . "</td>";
						Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
						Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
					Print "</tr>";
				}
			?>
</table>
</html>