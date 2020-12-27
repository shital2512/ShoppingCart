<?php
include('../includes/connection.php');
// username and password sent from form
$adminname=$_POST['aname'];
$password=$_POST['pwd'];

// To protect MySQL injection 
$adminname = stripslashes($adminname);
$password = stripslashes($password);
$adminname = mysqli_real_escape_string($con,$adminname);
$password = mysqli_real_escape_string($con,$password);

$sql="select * from tbladmin where adminname = '$adminname' and pwd = '$password' ";
try{
    $result=mysqli_query($con, $sql);
}
 catch(exception $e){
     echo "$e";
 } 

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
    $row=mysqli_fetch_array($result);

    session_start();
    $_SESSION["aname"]=$row["adminname"];

    header("location:./admin_home.php");

    //echo "done";
}
else {
header("location:./admin_login_design.php");
}
?>