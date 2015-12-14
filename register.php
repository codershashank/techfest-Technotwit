<?php
require 'core.php';
require 'connect.php';
if(1){
if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['password_retype'])&&isset($_POST['firstname'])){
$username=$_POST['username'];
$password=$_POST['password'];
$password_retype=$_POST['password_retype'];
$firstname=$_POST['firstname'];
//$lastname=$_POST['lastname'];
if(!empty($username)&&!empty($password)&&!empty($password_retype)&&!empty($firstname)){
$query="select email from college where email='$username'";
$query_run=mysqli_query($link,$query);
if(mysqli_num_rows($query_run)==1){
echo 'The email '.$username.' already exists.';
}
if($password!=$password_retype){
echo 'Passwords do not match!!';
}

else{
$query="INSERT INTO college(usr,pass,email,phone,dt) VALUES('','$password','$username','$firstname',now())";
if($query_run=mysqli_query($link,$query))
{
header('Location:register_success.php');
}
else
{
echo 'Plz Try Again!!';
}
}


}
else
{
echo 'All fields are compulsory';
}
}

}
?>
<h2><a href="main.php">Back to login!!</a></h2>
<form action="register.php" method="POST">
Email:<br><input type="text" name="username" value="<?php if(isset($username)){echo $username;} ?>"/><br>
Password:<br><input type="password" name="password" /><br>
Retype Password:<br><input type="password" name="password_retype"/><br>
Phone:<br><input type="text" name="firstname"value="<?php if(isset($firstname)){echo $firstname;} ?>"/><br>
<!--Last Name:<br><input type="text" name="lastname"value="/><br>-->
<input type="submit" value="submit"/>
</form>
