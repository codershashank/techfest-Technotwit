<?php
$mysql_host='localhost';
$mysql_user='root';
$mysql_pass='';
$mysql_db='techfest';
$link=mysqli_connect('localhost','root','','techfest') or die('could not connect');
mysqli_select_db($link,$mysql_db);

//session_start();

if( isset($_POST['username']) && isset($_POST['password'])){
$username=$_POST['username'];
$password=$_POST['password'];
//$usertype=$_POST['usertype'];
//$_SESSION['usertype']=$_POST['usertype'];
if(!empty($username)&&!empty($password)){
	//if($usertype=="student"){
	echo "entered into if";
	$query_run=@mysqli_query($link,"select id,usr,email from college where email ='$username' and pass ='$password'");
	if($query_run){

		echo "query rub";
		$query_num_rows=@mysqli_num_rows($query_run);
		if($query_num_rows==0){
			echo 'invalid Username/Password!!';
		}
		else{

			$user=mysqli_fetch_assoc($query_run);
			$_SESSION['id']=$user['id'];
			$_SESSION['email']=$user['email'];
			//$_SESSION['usertype']=$usertype;
			header('Location: loginform.php');
		}}}}
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
	<script type="text/javascript" src="/js/jquery.min.js"></script>
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
	<form name="login-form"  class="login-form" action="loginform.php" method="POST">

		<!--HEADER-->
		<div class="header">
			<!--TITLE--><h1>Login Form</h1><!--END TITLE-->
			<!--DESCRIPTION--><span>Fill out the form below to login to my super awesome imaginary control panel.</span><!--END DESCRIPTION-->
		</div>
		<!--END HEADER-->

		<!--CONTENT-->
		<div class="content">
			<label> Email: </label> <input name="username" type="text" class="input username" value="username" onfocus="this.value=''" /><!--END USERNAME-->
			<label> Password: </label> <input name="password" type="password" class="input password" value="password" onfocus="this.value=''"/><!--END PASSWORD-->
		</div>
		<!--END CONTENT-->

		<!--FOOTER-->
		<div class="footer">
			<!--LOGIN BUTTON--><input type="submit" name="submit" value="submit" class="button" /><!--END LOGIN BUTTON-->
			<p><a href='register.php'>SignUp here!!</a></p>
		</div>
		<!--END FOOTER-->

	</form>

	<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html>


<!-- <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="bootstrap/css/theme.css"/>
<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap-theme.css"/>
<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css"/>
<link href="bootstrap/css/signin.css" rel="stylesheet"/>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<form action="" method="POST" class="form-signin">
<h2 class="form-signin-heading">Welcome to BIBLIOTHEQUE</h2>
 <label class="form control-label"> EMAIL: </label></br>
<input type="text" name="username" placeholder="Type username here..." required></br>
<label>PASSWORD:</label></br>
<input type="password" class="span3" placeholder="Type password here..." name="password" required></br>
<!--I am
<select name="usertype">
  <option name="usertype" value="student">Student</option>
  <option name="usertype" value="professor">Professor</option>
  <option name="usertype" value="librarian">Librarian</option>
  <option  name="usertype" value="others">Others</option>
</select>
<!-- <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">User Type
        <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Student</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Professor</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Librarian</a></li>
          <li role="presentation" class="divider"></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Others</a></li>
        </ul>
      </div>-->
<!--<label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
<p><a href='register.php'>SignUp here!!</a></p>
<button type="submit" value="Log In" class="btn btn-primary">Log In</button> 
</form> -->