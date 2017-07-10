<?php session_start(); ?>
<?php $con=mysqli_connect("localhost","root","","book_ticket") or die("connection error"); ?>
<?php
	if(isset($_POST['ok'])){
		$u_name =$_SESSION['user'];
		$bus_no = $_POST["bus_no"];
		$bus_type = $_POST["bus_type"];
		$bus_from = $_POST["bus_from"];
		//$bus_to = $_POST["bus_to"];
		$bus_date = $_POST["bus_date"];
		$bus_time = $_POST["bus_time"];
		$seat=$_POST["seats"];
		$bus_fair = $_POST["bus_fair"];
		
		$insert="insert into user_details (u_name,bus_no,bus_type,bus_from,bus_date,bus_time,seat,bus_fair) values ('$u_name','$bus_no','$bus_type','$bus_from','$bus_date','$bus_time','$seat','$bus_fair')";

		$run_insert=mysqli_query($con, $insert)or die(mysqli_error($con));
				echo '<h3 style="color:green;">Bus booking successfull !</h3>';
s
		//if($run_insert){
				//echo "<script> alert('Bus booking successfull !');</script>";
				//exit();
}
?>