<?php
//connect to database again!
$connection = mysqli_connect("127.0.0.1","root","root","esdl_trial") or die("Connection failed! ".mysql_error());
//get data to show 
$squery = mysqli_query($connection, "SELECT uid,name,username FROM users");
header("Refresh:10"); //refresh database updates after every 10 sec
?>

<!-- html code here, to display the database -->
<html>
<head>
	<title> Users | Roadrush </title>
</head>
<body>
	<div style="text-align:center" id="Users"> 
		<img src="logo_f7_jpeg.jpg" style="width:250px; height:250px">
		<h1> Roadrush </h1> <!-- actual name of the app goes here -->
	    <h2> Now stay updated and avoid all traffic woes... </h2> <!-- tagline -->	
	</div>	
	<!-- go back to previous page -->
	<div style="float:left">
		<form name="back" method="post" action="viewdbs.html">
			<!-- go back to previous page -->
			<input type="submit" value="Go Back"/> 					
		</form>
	</div>
	<!-- logout -->
	<div style="float:right">
		<form name="logout" method="post" action="logout.php">
			<!-- button to logout -->		
			<input type="submit" value="Logout"/> 					
		</form>	
	</div>
    </br>
    <!-- display table -->
    <div style="text-align:center" id="Users"> 
	    <h4> The app users </h4>
	</div>
	</div>
</br>
	<table width="600" border="1" cellpadding="1" cellspacing="1" align="center">
		<!-- table headings -->
		<tr>
			<th> ID </th>
			<th> Name </th>
			<th> Username </th>
		</tr>
		<tr>
			<?php 
			while($row=mysqli_fetch_assoc($squery))
			{
				echo "<tr>";
				echo "<td>".$row['uid']."</td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['username']."</td>";
				echo "</tr>";
			}//end while loop
			?> <!-- php code ends again -->
		</tr>
	</table>
</body>
</html>
