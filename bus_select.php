
<?php
session_start();

if(!$_SESSION['user']){
	header("location: sign-in.php");
}
else { 
include 'header3.php';
$con=mysqli_connect("localhost","root","","book_ticket") or die("connection error");
$seats ="";


if(isset($_GET['id'])){
    $edit_id=$_GET['id'];
    $select="select * from bus_info where bus_id='$edit_id '";
    $run=mysqli_query($con,$select);
    $row=mysqli_fetch_array($run) or die("query error");
	
	if(isset($_GET['total_seat'])){
		$total_seat=$_GET['total_seat'];
		
	}
	else 		$total_seat=0;
    
	$bus_id =$row['bus_id'];
	$bus_no =$row['bus_no'];		 
	$bus_type =$row['bus_type'];
    $bus_from =$row["bus_from"];
    $bus_to =$row["bus_to"];
    $bus_date =$row["bus_date"];
    $bus_time =$row["bus_time"];
	$bus_fair =$row["bus_fair"];
	$total_fair = $bus_fair * $total_seat;
	
	
	if(isset($_GET['seat'])){
		$_SESSION['seat_name'] .= $_GET['seat'] . " , ";
		$seats = $_SESSION['seat_name'];
		
		
		$query = "update seat set booked=1 where seat_no='{$_GET['seat']}'";
		$run=mysqli_query($con,$query) or die('mairala amare');
	}
	}
?>

<html>
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
    .not_Booked{
	    color:blue;
}
</style>


<body>
<div style="width:800px; marzin-top:100px">
<div style="float: left;width:400px;">
<table class="table"">
			<?php 
				function show($bus_no){
					$table_query1 = mysqli_query($con, "SELECT * FROM bus_info WHERE bus_no='$bus_no'");
					$value = mysqli_fetch_assoc($table_query1);
				}
			?>
			<form action="submit_booking.php" method="post" style="width:65%;background-color:skyblue;margin-top:120px;margin-left:50px;"> 

				<p><strong>YOUR JOURNEY DETAILS.</strong></p>
				<p>Bus No.</p>
					<input type="text" value="<?php echo $bus_no; ?>" name="bus_no" >
				<p>Bus Type.</p>
					<input type="text" value="<?php echo $bus_type; ?>" name="bus_type">	
				<p>Depature From.</p>	
					<input type="text" value="<?php echo $bus_from; ?>" name="bus_from">
				<p>Journey Date.</p>
					<input type="date" value="<?php echo $bus_date; ?>" name="bus_date">
				<P>Journey Time</p>
					<input type="text" value="<?php echo $bus_time; ?>" name="bus_time">
				<P>Seat</p>
				   <input type="text" value="<?= $seats;?>" name="seats">
				<P>Total Fair</p>
				    <input type="text" value="<?php echo $total_fair; ?>" name="bus_fair">
					 
					<input type="submit" name="ok" value="SUBMIT"> 

			</form>
	
</table>
</div>
<div style="float:right;width:400px;">
<table>
	<?php
		$i=0;
		$seat_query = mysqli_query($con, "SELECT * FROM seat ");
		if(!$seat_query){
			die("Query failed.");
		}    
		echo '<p style="align:center";><strong>SELECT YOUR SEAT </strong></p>';
		while($row = mysqli_fetch_assoc($seat_query)){
			
			if($i==0){
				echo '<tr>';
			}
			echo '<td>';
			if($row['booked']==1){
				echo "<a href='#' class='booked' id='id'>".$row['seat_no']."</a>";
			}
			else{
				$total_seat++;
				//$query = "update seat set booked=1 where seat_no='$row[seat_no]'";
				//$run = mysqli_query($con, $query);
				//if($run){
					//echo("<script>alert('Updated');</script>");
				//}
				echo "<a href='bus_select.php?id=$edit_id&seat={$row['seat_no']}&total_seat=$total_seat' class='not_booked' id='id''>".$row['seat_no']."</a>";
			}
			echo '</td>';
			if($i==1){
				echo ("<td colspan='2'>-</td>");			
				}
			$i++;
			if($i>3){
				$i=0;
				echo '</tr>';
			}
		}		
						
	?>
			
</table>
</div>
</div>
<script text/javascript>
var seat = document.getElementById['booked_seat'].value;

</script>
</body>
</html>
<?php } ?>