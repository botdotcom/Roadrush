<?php
//get username and password
$username = $_POST["uname"];
$password = $_POST["pwd"];
//connect to MySQL database, else failure
$connection = mysqli_connect("127.0.0.1","root","root","esdl_trial") or die("Connection failed! ".mysql_error());
//try block
try
{
//function to fetch credentials if available in database
function Login()
{
	session_start();
	global $username, $password, $connection;
	//extract usernames and passwords from 'admins' table for validating
    $login_d = mysqli_query($connection,"SELECT name,user,pass FROM admins WHERE user='$_POST[uname]'");
    if(!$login_d)
    {
    	printf("Error:%s\n",mysqli_error($connection));
        exit();
	}
    $arr = mysqli_fetch_array($login_d,MYSQLI_ASSOC) or die(mysql_error());
    if($arr["user"]==$username and $arr["pass"]==$password)
    {
		echo "Welcome ".$arr["name"];
		header("refresh:2; url=login_success.html");		
	}
	else
	{
		echo "Invalid username and/or password. Please try again!"; 
		header("refresh:2; url=login.html");		
	}
}
}
catch(Exception $e)
{
	echo "Unable to process request. Please try again later!";
}
//if submit button is clicked
if(isset($_POST["submit"]))
{
	Login();
}
?>
