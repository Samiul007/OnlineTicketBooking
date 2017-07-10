<?php
include 'header2.php'; 
session_start();
$con=mysqli_connect("localhost","root","","book_ticket") or die("connection error");
?>
<html>
<head>
<style> 
     body{
     padding:0;
     margin:0;
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
		    <td colspan="9"><h2>VIEW ALL USER</h2></td>
		</tr>
		<tr align="center">
		     <th>USER ID</th> 
		     <th> USER NAME </th> 
			 <th>USER EMAIL</th> 
			 <th>USER PHNONE</th> 
			 <th>GENDER</th>
			 <th>DATE OF BIRTH</th> 
			 <th>LOCATION</th>
			 <th>REGISTER DATE</th> 
			 <th>REMOVE</th>
		</tr>
<?php
  
    $select="select * from user ";
    $run=mysqli_query($con,$select);
    
    $i=0;	
	while($row=mysqli_fetch_array($run)){
	     
        $u_id =$row['u_id'];		 
	    $u_name =$row['u_name'];
        $u_email =$row["u_email"];
        $u_phone =$row["u_phone"];
        $u_gender =$row["u_gender"];
        $b_day =$row["b_day"];
		$u_address =$row["u_address"];
		$register_date=$row["register_date"];
    $i++;     	 

?>      <tr align="center">
		     <td><?php echo $i; ?></td>
			 <td><?php echo $u_name; ?></td>
			 <td><?php echo $u_email; ?></td>
			 <td><?php echo $u_phone; ?></td>
			 <td><?php echo $u_gender; ?></td>
			 <td><?php echo $b_day; ?></td>
			 <td><?php echo $u_address; ?></td>
			 <td><?php echo $register_date; ?></td>
			 <td><a href="view_user.php?id=<?php echo $u_id?>">DELETE</a></td>
			 
		</tr>
	<?php } ?>	
	
	</table>

<?php 
if(isset($_GET['id'])){
     
	 $get_id=$_GET['id'];
	 
	 $delete="delete from user where u_id='$get_id' && u_id!='1'";
	 $run=mysqli_query($con,$delete);
	 
	 if ($run){
	    echo "<script>alert('User has deleted , Successfully..')</script>";
		echo "<script>window.open('view_user.php','_self')</script>";
	 }

}
?>
</body>
</html>