<html>
    <head>
        <title>My PHP Website</title>
    </head>
   <?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: index.php"); // redirects if user is not logged in
	  exit;
   }
   $user = $_SESSION['user']; //assigns user value
   ?>
    <body>
        <h2>Home Page</h2>
        
<hello>! 
 <!--Display's user name-->
        <a href="logout.php">Click here to go logout</a><br/><br/>
        <form action="add.php" method="POST">
           Add more to list: <input type="text" name="details" /> <br/>
           Public post? <input type="checkbox" name="public[]" value="yes" /> <br/>
           <input type="submit" value="Add to list"/>
        </form>
		
		<?php echo "username is  " . $_SESSION["user"] . ".<br>"; 
	print_r($_SESSION);
	?> 
	
    <h2 align="center">My list</h2>
	<table border="1px" width="100%">
		<tr>
			<th>Id</th>
			<th>Details</th>
			<th>Post time</th>
			<th>Edit time</th>
			<th>Edit</th>
			<th>Delete</th>
			<th>Public Post</th>
		</tr>
		<?php
				mysql_connect("localhost", "root","") or die(mysql_error()); //connect to server
				mysql_select_db("first_db") or die("cannot connect to database"); //connect to dba_close
				$query = mysql_query("select * from list"); //sql query
				while($row = mysql_fetch_array($query))
				{
					print "<tr>";
						print '<td align="center">'. $row['id']. "</td>";
						print '<td align="center">'. $row['details']. "</td>";
						print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']. "</td>";
						print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
						print '<td align="center"><a href="edit.php?id='. $row['id']. '"> edit </a></td>';
						print '<td align="center"><a href="#" onclick="myFunction('. $row['id'].')"> delete </a> </td>';
						print '<td align="center">'. $row['public']. "</td>";
					print "</tr>";
				}
		?>
	</table>
	<script>
		function myFunction(id)
		{
			var r=confirm("Are you sure you want to delete this record?");
			if (r==true)
			{
			window.location.assign("delete.php?id=" + id);	
			}
		}
	</script>
    </body>
</html>
	
	 