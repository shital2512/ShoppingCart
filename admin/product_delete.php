<?php 
    include('../includes/connection.php');
    $pid=$_GET['pid'];
    $query="delete from tblproduct where pid=$pid";
    $res=mysqli_query($con,$query) or die("Query error");
    if($res=1)
    {
        header("location:product_list.php");
    }
    else{
        echo "Not Deleted";
    }
?>
