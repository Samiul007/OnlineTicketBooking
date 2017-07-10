<?php
 
session_start();
$con=mysqli_connect("localhost","root","","book_ticket") or die("connection error");
?>


<!DOCTYPE HTML>
<?php 
include 'header.php';
?>
<html>
<head>
<title>Online ticket booking system</title>

<link rel="stylesheet" type="text/CSS" href="style.css">
</head>

<body>
	


	<script type="text/javascript">
</script>
 
<body>

<form action="sign-up.php" method="post" enctype="multipart/form-data">
     <table align="center" width="600">
        <tr align="center">
            <td colspan="4"><h2>NEW USERS ? REGISTER HERE..</h2></td>
        </tr>
        <tr>
            <td><strong>NAME :</strong></td>
            <td><input type="text" name="u_name" placeholder="Enter your name" required="required"/></td> 
        </tr>
        <tr>
            <td><strong>EMAIL :</strong></td>
            <td><input type="text" name="u_email" placeholder="Enter your email" required="required"/></td>
        </tr>
         
        <tr>
            <td><strong>PHONE NO :</strong></td>
            <td><input type="text" name="u_phone" placeholder="Enter phone no" required="required"/></td>
        </tr>
        <tr>
            <td><strong>GENDER :</strong></td>
            <td>
                MALE : <input type="radio" name="u_gender" value="Male"/>
                FEMALE : <input type="radio" name="u_gender" value="Female"/>
            </td>
        </tr>
        <tr>
            <td><strong>DATE OF BIRTH :</strong></td>
            <td><input type="date" placeholder="dd/mm/yy" name="b_day" ></td>
        </tr>

        <tr>
            <td><strong>PASSWORD :</strong></td>
            <td><input type="password" name="u_pass" placeholder="Enter password" required="required"/></td>
        </tr>
		<tr>
            <td><strong>ADDRESS :</strong></td>
            <td><textarea name="u_address" cols="30" rows="5"></textarea></td>  
        </tr>

        <tr align="center">
            <td colspan="5"><br/><input type="submit" name="register" value="Register Now"</td>
        </tr>
    </table>
</form>

</body>


</html>

<?php 


if(isset($_POST['register'])){
$u_name = $_POST["u_name"];
$u_email = $_POST["u_email"];
$u_pass = $_POST["u_pass"];
$u_phone = $_POST["u_phone"];
$u_gender = $_POST["u_gender"];
$b_day = $_POST["b_day"];
$u_address = $_POST["u_address"];

if(! filter_var($u_email,FILTER_VALIDATE_EMAIL)){
echo "<script> alert('Please fill email correctly !');</script>";
exit();
}
if(strlen($u_pass)<8){
echo "<script> alert('Please select atleast 8 charecters for password !');</script>";
exit();
}

$select_email="select * from user where u_email ='$u_email'";
$run_email=mysqli_query($con,$select_email) or die(mysqli_error($con));

$check_email = mysqli_num_rows($run_email);

if($check_email==1){
echo "<script> alert('You already registered!');</script>";
exit();
}

else{

$_SESSION['u_email']=$u_email;

 
$insert="insert into user (u_name,u_email,u_pass,u_phone,u_gender,b_day,u_address,register_date) values ('$u_name','$u_email','$u_pass','$u_phone','$u_gender','$b_day','$u_address',now())";

$run_insert=mysqli_query($con, $insert)or die(mysqli_error($con));

if($run_insert){
echo "<script> alert('Registration successfull !');</script>";
echo "<script> window.open('index.php','_self');</script>";
}
}
}
include 'footer.php'; 
?>