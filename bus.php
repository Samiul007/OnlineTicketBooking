<?php
session_start();

if(!$_SESSION['user']){
header("location: sign-in.php");

}
else { 
include 'header3.php';
$con=mysqli_connect("localhost","root","","book_ticket") or die("connection error");

?>

<!DOCTYPE html>
<html>
<head>

<style>

    table, th, td {
	  align:center;
      border: 2px solid black;
      border-collapse: collapse;
}
    th, td {
       padding: 20px;
	   bgcolor:blue;
}
    th{
	   font-size: 1.2em;
}
    table tr td a:link{
	    text-decoration: none;
}
    .booked{
	     color:red;
}
    form{
	    float:center;
}
    .notBooked{
	    color:blue;
}
</style>
</head>
<body>
<?php

 
if(isset($_POST['search'])){
	$bus_from = $_POST['bus_from'];
	$bus_to = $_POST['bus_to'];
	$bus_type = $_POST['bus_type'];
	$bus_date = $_POST['bus_date'];
	
	$sel="SELECT * FROM bus_info WHERE bus_from = '$bus_from' AND bus_to = '$bus_to' AND bus_type = '$bus_type' AND bus_date = '$bus_date' ";
	$query = mysqli_query($con, $sel);
	if(!$query){
		die("Query failed.");
	}
	$run = mysqli_num_rows($query);
		if($run == 0){
		echo "<script>alert('Bus not avaiable')</script>";
		
		echo "<script>window.open('u_home.php','_self')</script>";
		}else{
		     
		
				$table_query = mysqli_query($con,$sel);
					if(!$table_query){
							die("Table query failed.");
						}
				echo '<table class="table" style="position:relative;marzin-top:150px;">';
				echo '<tr cellpadding="1px solid #000">';
				echo '<th>SELECT</th>';
				echo '<th>BUS NO</th>';
				echo '<th>BUS TYPE</th>';
				echo '<th>DATE</th>';
				echo '<th>BUS TIME</th>';
				echo '<th>BUS FAIR</th>';
				echo '</tr>';
			while($row = mysqli_fetch_assoc($table_query)){
				echo '<tr>';
				echo '<td>'.'<a href="bus_select.php?id='.$row['bus_id'].'">select</a></td>';
				echo '<td>'.$row['bus_no'].'</td>';
				echo '<td>'.$row['bus_type'].'</td>';
				echo '<td>'.$row['bus_date'].'</td>';
				echo '<td>'.$row['bus_time'].'</td>';
				echo '<td>'.$row['bus_fair'].'</td>';
				echo '</tr>';
				}
				echo '</table></br></br>';
			
	
?>

</body>


</html>
<?php } } }?>