<?php
 
session_start();
$con=mysqli_connect("localhost","root","","book_ticket") or die("connection error");
?>
<html>
<style>

    table, th, td {
       border: 1px solid black;
       border-collapse: collapse;
}
    th, td {
       padding: 15px;
}
    th{
	   font-size: 1.3em;
	   background-color: #ADD8E6;
}
    table tr td a:link{
	    text-decoration: none;
}
    .booked{
	     color:red;
}
form{float:right; margin-top:0px;}
    .notBooked{
	color:blue;
}
</style>

<body>
<center>
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
			if($row['booked']==1)
				echo '<a href="#" class="booked" id="id">'.$row['seat_no'].'</a>';
			else
				echo '<a href="#"  class="notBooked" id="id">'.$row['seat_no'].'</a>';
			echo '</td>';
			if($i==1){
				echo ("<td colspan='2'>-</td>");			}
			$i++;
			if($i>3){
				$i=0;
				echo '</tr>';
			}
		}		
						
	?>
			
</table>	
</body>
</html>