<?php
$mysql_host='localhost';
$mysql_user='root';
$mysql_pass='';
$mysql_db='college';
$link=mysqli_connect('localhost','root','','college') or die('could not connect');
mysqli_select_db($link,$mysql_db);


if( isset($_POST['username']) && isset($_POST['password'])){
$username=$_POST['username'];
$password=$_POST['password'];
//$usertype=$_POST['usertype'];
//$_SESSION['usertype']=$_POST['usertype'];
if(!empty($username)&&!empty($password)){
	//if($usertype=="student"){
			$query_run=@mysqli_query($link,"select id,usr,email from college where email ='$username' and passkey ='$password'");
		if($query_run){
			$query_num_rows=@mysqli_num_rows($query_run);
			if($query_num_rows==0){
			echo 'invalid Username/Password!!';
			}
			else{
			$user=mysqli_fetch_assoc($query_run);
			$_SESSION['id']=$user['id'];
			$_SESSION['email']=$user['email'];
		//	$_SESSION['usertype']=$usertype;
			//header('Location: loginpage1.php');
			}}}
/*
else if($usertype=="librarian"){
$query_run=@mysqli_query($link,"select name,id from librarian where name ='$username' and passkey ='$password'");
		if($query_run){
			$query_num_rows=@mysqli_num_rows($query_run);
			if($query_num_rows==0){
			echo 'invalid Username/Password!!';
			}
			else{
			$user=mysqli_fetch_assoc($query_run);
			$_SESSION['id']=$user['id'];
			$_SESSION['user']=$user['name'];
			$_SESSION['usertype']=$usertype;
			header('Location: loginpage2.php');
			}
		}
}
else if($usertype=="professor"){
$query_run=@mysqli_query($link,"select name,id from professors where name ='$username' and passkey ='$password'");
	if($query_run){
		$query_num_rows=@mysqli_num_rows($query_run);
		if($query_num_rows==0){
		echo 'invalid Username/Password!!';
		}
		else{
		$user=mysqli_fetch_assoc($query_run);
		$_SESSION['id']=$user['id'];
		$_SESSION['user']=$user['name'];
		$_SESSION['usertype']=$usertype;
		header('Location: loginpage3.php');
		}	
	}
}

//$query_run=@mysqli_query($link,"select username from users where username ='$username' and password ='$password'");
}
}*/
$link->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

	<!--------------------
    LOGIN FORM
    by: Amit Jakhu
    www.amitjakhu.com
    --------------------->

	<!--META-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login Form</title>

	<!--STYLESHEETS-->
	<link href="css/style.css" rel="stylesheet" type="text/css" />

	<!--SCRIPTS-->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!--Slider-in icons-->
	<script type="text/javascript">
		$(document).ready(function() {
			$(".username").focus(function() {
				$(".user-icon").css("left","-48px");
			});
			$(".username").blur(function() {
				$(".user-icon").css("left","0px");
			});

			$(".password").focus(function() {
				$(".pass-icon").css("left","-48px");
			});
			$(".password").blur(function() {
				$(".pass-icon").css("left","0px");
			});
		});
	</script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
	<div class="user-icon"></div>
	<div class="pass-icon"></div>
	<!--END SLIDE-IN ICONS-->

	<!--LOGIN FORM-->
	<form name="login-form" class="login-form" action="test.php" method="post">

		<!--HEADER-->
		<div class="header">
			<!--TITLE--><h1>Login Form</h1><!--END TITLE-->
			<!--DESCRIPTION--><span>Fill out the form below to login to my super awesome imaginary control panel.</span><!--END DESCRIPTION-->
		</div>
		<!--END HEADER-->

		<!--CONTENT-->
		<div class="content">
			Email<input name="username" type="text" class="input username" value="username" onfocus="this.value=''" /><!--END USERNAME-->
			Password <input name="password" type="password" class="input password" value="password" onfocus="this.value=''" /><!--END PASSWORD-->
		</div>
		<!--END CONTENT-->

		<!--FOOTER-->
		<div class="footer">
			<!--LOGIN BUTTON--><input type="submit" name="submit" value="Login" class="button" /><!--END LOGIN BUTTON-->
			<!--REGISTER BUTTON--><input type="submit" name="submit" value="Register" class="register" /><!--END REGISTER BUTTON-->
		</div>
		<!--END FOOTER-->

	</form>
	<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html>




