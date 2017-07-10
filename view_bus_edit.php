<?php
session_start();


if(!$_SESSION['admin']){
header("location: sign-in.php");

}
else { 
include 'header2.php';
$con=mysqli_connect("localhost","root","","book_ticket") or die("connection error");

if(isset($_GET['id'])){

    $edit_id=$_GET['id'];
    $select="select * from bus_info where bus_id='$edit_id '";
    $run=mysqli_query($con,$select);
    $row=mysqli_fetch_array($run) or die("query11 error");
    
	$bus_id =$row['bus_id'];
	$bus_no =$row['bus_no'];		 
	$bus_type =$row['bus_type'];
    $bus_from =$row["bus_from"];
    $bus_to =$row["bus_to"];
    $bus_date =$row["bus_date"];
    $bus_time =$row["bus_time"];
	$bus_fair =$row["bus_fair"];
}

?>
<html>
<head>
   <title>admin panel</title>
</head>
<style> 
     body{
     padding:0;
     margin:0;
     background-image:abc.jpg;
    }
     table{
     color:black;
     padding:10px;
     width:"400px"
    }
     input{
     padding:5px;
    }
</style>

<script type="text/javascript"></script>

<body>

    <form action="view_bus_edit.php?id=<?php echo  $bus_id;?>" method="post">
        <table align="center" bgcolor="skyblue" width="600">
            <tr align="center">
                 <td colspan="4"><h2>UPDATE BUSSES...</h2></td>
            </tr>
            <tr>
                 <td><strong>BUS NO :</strong></td>
                 <td><input type="text" name="bus_no" value="<?php echo $bus_no; ?>" required="required"/></td>
            </tr>
            <tr>
                 <td><strong>BUS TYPE :</strong></td>
                 <td> <select  name="bus_type" ><option> <?php echo $bus_type ;?><option>AC</option><option>NON AC</option></select>
                 </td>
            </tr>
            <tr>
                 <td><strong>FROM :</strong></td>
                 <td> <select  name="bus_from" ><option><?php echo $bus_from; ?></option><option>DHAKA</option><option>TANGAIL</option></select></td>
            </tr>
            <tr>
                 <td><strong>TO :</strong></td>
                 <td> <select  name="bus_to"  required="required"><option><?php echo $bus_to; ?></option><option>DHAKA</option><option>TANGAIL</option></select></td>
            </tr>
            <tr>
                 <td><strong>JOURNEY DATE :</strong></td>
                 <td><input type="date" name="bus_date" value="<?php echo $bus_date; ?>" required="required"/></td>
            </tr>
            <tr>
                 <td><strong>START TIME :</strong></td>
                 <td><input type="time" name="bus_time" value="<?php echo $bus_time; ?>" required="required"></td>
            </tr>
            <tr>
                 <td><strong>BUS FAIR:</strong></td>
                 <td><input type="text" value="<?php echo $bus_fair; ?>" name="bus_fair" required="required"/></td>
            </tr>

            <tr align="center">
                 <td colspan="5"><br/><input type="submit" name="update" value="UPDATE"</td>
            </tr>
        </table>
    </form>

<?php 
if(isset($_POST['update'])){
 
  $bus_no = $_POST["bus_no"];
  $bus_type = $_POST["bus_type"];
  $bus_from = $_POST["bus_from"];
  $bus_to = $_POST["bus_to"];
  $bus_date = $_POST["bus_date"];
  $bus_time = $_POST["bus_time"];
  $bus_fair = $_POST["bus_fair"];


  
     $update="update bus_info set bus_no='$bus_no',bus_type='$bus_type',bus_from='$bus_from',bus_to='$bus_to',bus_date='$bus_date',bus_time='$bus_time',bus_fair='$bus_fair' where bus_id='$edit_id'";
     $run_update=mysqli_query($con, $update)or die(mysqli_error($con));
          if($run_update){
             echo "<script> alert('Bus has been updated successfully');</script>";
	         //echo "<script> window.open('admin.php','_self')</script>";
}

}
?>	
	
	

</body>
</html>
<?php } ?>