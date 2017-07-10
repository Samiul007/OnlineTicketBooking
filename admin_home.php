<?php
session_start();


if(!$_SESSION['admin']){
header("location: sign-in.php");

}
else { 
include 'header2.php';
$con=mysqli_connect("localhost","root","","book_ticket") or die("connection error");

?>

<!DOCTYPE html>
<html>
<head>
</head>
<style> 
     body{
     padding:0;
     margin:0;
    }
     table{
     color:blue;
     padding:10px;
     width:"400px"
    }
     input{
     padding:5px;
    }
</style>

<script type="text/javascript"></script>

<body>

    <form action="admin_home.php" method="post"">
        <table align="center" >
            <tr align="center">
                 <td colspan="4"><h2>ADD BUSSES...</h2></td>
            </tr>
            <tr>
                 <td><strong>BUS NO :</strong></td>
                 <td><input type="text" name="bus_no"  required="required"/></td>
            </tr>
            <tr>
                 <td><strong>BUS TYPE :</strong></td>
                 <td> <select  name="bus_type" required="required"><option>....</option><option>Ac</option><option>NonAc</option></select>
                 </td>
            </tr>
            <tr>
                 <td><strong>FROM :</strong></td>
                 <td> <select  name="bus_from" required="required"><option>....</option><option>Dhaka</option><option>Tangail</option></select></td>
            </tr>
            <tr>
                 <td><strong>TO :</strong></td>
                 <td> <select  name="bus_to" required="required"><option>....</option><option>Dhaka</option><option>Tangail</option></select></td>
            </tr>
            <tr>
                 <td><strong>JOURNEY DATE :</strong></td>
                 <td><input type=date name="bus_date" placeholder="dd/mm/yyyy" required="required"/></td>
            </tr>
            <tr>
                 <td><strong>START TIME :</strong></td>
                 <td><input type="time" name="bus_time" placeholder="..am/pm" required="required"></td>
            </tr>
            <tr>
                 <td><strong>BUS FAIR:</strong></td>
                 <td><input type="text" placeholder="...tk" name="bus_fair" required="required"/></td>
            </tr>

            <tr align="center">
                 <td colspan="5"><br/><input type="submit" name="done" value="DONE"</td>
            </tr>
        </table>
    </form>


<?php 
if(isset($_POST['done'])){
$bus_no = $_POST["bus_no"];
$bus_type = $_POST["bus_type"];
$bus_from = $_POST["bus_from"];
$bus_to = $_POST["bus_to"];
$bus_date = $_POST["bus_date"];
$bus_time = $_POST["bus_time"];
$bus_fair = $_POST["bus_fair"];

$select_bus="select * from bus_info where bus_no ='$bus_no'";
$run_bus=mysqli_query($con,$select_bus) or die(mysqli_error($con));

$check_bus = mysqli_num_rows($run_bus);

if($check_bus==1){
    echo "<script> alert('You already imported');</script>";
    exit();
}
    else{
         $insert="insert into bus_info (bus_no,bus_type,bus_from,bus_to,bus_date,bus_time,bus_fair) values ('$bus_no','$bus_type','$bus_from','$bus_to','$bus_date','$bus_time','$bus_fair')";

         $run_insert=mysqli_query($con, $insert)or die(mysqli_error($con));

if($run_insert){
    echo "<script> alert('successfull !');</script>";
}
}
}
?>
</body>
</html>
</body>
</html>
<?php } ?>