<?php 
    include('../includes/connection.php');
    $imgid=$_GET['imgid'];
    $query="delete from tblproduct_img where imgid=$imgid";
    $res=mysqli_query($con,$query) or die("Query error");
    if($res=1)
    {
        header("location:productImg_list.php");
    }
    else{
        echo "Not Deleted";
    }
?>
