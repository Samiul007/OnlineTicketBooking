<?php
session_start();


if(!$_SESSION['admin']){
header("location: sign-in.php");

}
else { 
include 'header2.php';
$con=mysqli_connect("localhost","root","","book_ticket") or die("connection error");

?>
<html>
<head>
   <title>admin panel</title>

<style> 
     body{
     padding:10px;
     margin:0;
     background-image:abc.jpg;
    }
     table{
     color:blue;
     padding:0px;
     width:1200px;
	 blackground:white;
    }
	th{
	border:2px solid black;
	}
     input{
     padding:5px;
    }
</style>
</head>

<script type="text/javascript"></script>

<body>
    <table align="center">
	    <tr align="center">
		    <td colspan="9"><h2>VIEW ALL BUSSES</h2></td>
		</tr>
		<tr align="center">
		     <th>COUNT</th> 
			 <th>BUS NO</th> 
		     <th>BUS TYPE </th> 
			 <th>BUS FROM</th> 
			 <th>BUS TO</th> 
			 <th>JOURNEY DATE</th>
			 <th>BUS TIME</th> 
			 <th>BUS FAIR</th>
			 <th>UPDATE</th> 
			 <th>REMOVE</th>
		</tr>
<?php
  
    $select="select * from bus_info ";
    $run=mysqli_query($con,$select);
    
    $i=0;	
	while($row=mysqli_fetch_array($run)){
	    $bus_id =$row['bus_id']; 
        $bus_no =$row['bus_no'];		 
	    $bus_type =$row['bus_type'];
        $bus_from =$row["bus_from"];
        $bus_to =$row["bus_to"];
        $bus_date =$row["bus_date"];
        $bus_time =$row["bus_time"];
		$bus_fair =$row["bus_fair"];
		
    $i++;     	 

?>      <tr align="center">
             <td><?php echo $i; ?></td>
		     <td><?php echo $bus_no; ?></td>
			 <td><?php echo $bus_type; ?></td>
			 <td><?php echo $bus_from; ?></td>
			 <td><?php echo $bus_to; ?></td>
			 <td><?php echo $bus_date; ?></td>
			 <td><?php echo $bus_time; ?></td>
			 <td><?php echo $bus_fair; ?></td>
			 <td><a href="view_bus_edit.php?id=<?php echo $bus_id?>">UPDATE</a></td>
			 <td><a href="view_bus.php?id=<?php echo $bus_id?>">DELETE</a></td>
			 
		</tr>
	<?php } ?>	
	
	</table>
<?php 
    if(isset($_GET['id'])){
     
	     $get_id=$_GET['id'];
	 
	     $delete="delete from bus_info where bus_id='".$get_id."'";
	     $run=mysqli_query($con,$delete);
	 
	 if ($run){
	    echo "<script>alert('Bus has been deleted , Successfully..')</script>";
		echo "<script>window.open('view_bus.php','_self')</script>";
	 }

}
?>
	
</body>
</html>
<?php } ?>