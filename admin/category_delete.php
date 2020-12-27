<?php 
    include('../includes/connection.php');
    $cid=$_GET['catID'];
    $query="delete from tblcategory where catID=$cid";
    $res=mysqli_query($con,$query) or die("Query error");
    if($res=1)
    {
        header("location:category_list.php");
    }
    else{
        echo "Not Deleted";
    }
?>
