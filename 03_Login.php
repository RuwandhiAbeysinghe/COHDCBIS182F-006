03_Login.php File
<?php
	include("config.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{$username= mysqli_real_escape_string($dbs,$_POST['uname']);
	$password= mysqli_real_escape_string($dbs, $_POST['pword']);

	$sql="select id from admin where uname='$username' and pword='$password';
	$result= mysql_query($dbs,$sql);
	$row= mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active= $row['active'];
	
	$count= mysql_num_rows($result);

	if($count==1)
	{session_register("username");
	$_SESSION['login_user']=$username;

	header("location: Home.php");
	}
	else 
	{
	$error= "your Username or Password is Wrong";
	}
	}
?>

Session.php File

<?php
	include("config.php");
	session_start();

	$user_check=$_SESSION['login_user'];
	$ses_sql=mysqli_query($dbs,"select username from admin where uname='$user_check'");
	$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

	$login_session=$row['uname'];

	if(!isset($_SESSION['login_user']))
	{
	header("location: 03_Login.php");
	}
?>

