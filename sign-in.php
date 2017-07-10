<?php
 
session_start();
$con=mysqli_connect("localhost","root","","book_ticket") or die("connection error");
?>

<!DOCTYPE HTML>
<?php

 include 'header.php';
 ?>

<body>

<form action="sign-in.php" method="post" >
<table align="center" >
<tr align="center">
<td colspan="4"><h2>ALREADY REGISTERED ? LOGIN HERE..</h2></td>
</tr>

<tr>
<td><strong>EMAIL :</strong></td>
<td><input type="text" name="u_email" placeholder="Enter your email" required="required"/></td>
</tr>
<tr>
<td><strong>PASSWORD :</strong></td>
<td><input type="password" name="u_pass" placeholder="Enter password" required="required"/></td>
</tr>

<tr align="center">
<td colspan="5"><br/><input type="submit" name="login" value="LOGIN"</td>
</tr>
</table>
</form>

 <a  href="sign-up.php" >Not registered yet? Sign up</a>

 
 <?php
if(isset($_POST['login'])){
$u_email = $_POST["u_email"];
$u_pass = $_POST["u_pass"];

$select="select * from user where u_email='$u_email' AND u_pass='$u_pass'";
$run=mysqli_query($con,$select);

$check=mysqli_num_rows($run);
if($check==0){
echo "<script>alert('Password or Email is not correct ! Try again ..') </script>";
exit();
}
else if($u_email == "admin@gmail.com" && $u_pass == "00000000"){
		header("location: admin_home.php");
		$_SESSION['admin'] = $u_email;
	}
	else{
	 
	header("location: u_home.php");
	$_SESSION['user'] = $u_email;
	}
}


?>


</body>
</html>
