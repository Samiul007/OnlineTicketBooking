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

<body>
    <h3><strong>SELECT YOUR JOURNEY DETAILS.</strong></h3>
 <form action="bus.php" form align="center" method="post"> 
    <p>Depature From</p>
        <select name="bus_from">
		     <option>...</option>
		     <option>Dhaka</option>
             <option>Tangail</option>
		</select>
    <p>Destination</p>	
        <select name="bus_to">
		     <option>...</option>
             <option>Dhaka</option>
             <option>Tangail</option>
        </select>

    <p>Bus Type</p>	
        <select name="bus_type">
             <option>Ac</option>
             <option>NonAc</option>
        </select>
    <p>Journey Date</p>
        <input type="date" placeholder="dd/mm/yy" name="bus_date" id="bus_date">
        <input type="submit" name="search" value="Search">
 </form>

 
 
</body>

</head>
</html>
<?php } ?>