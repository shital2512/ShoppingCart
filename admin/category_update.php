<html>
<head>
<title>Update Category</title>
</head>
    <body>
    <?php 
        include('../includes/connection.php');
        $cid=$_GET['catID'];
        $qry="select *from tblcategory where catID='$cid'";
        $result=mysqli_query($con,$qry) or die ("Query1 error");
        while($r=mysqli_fetch_array($result))
        {
      
    ?>
    </br></br></br></br></br></br></br></br>
    <table width="300" border="0" align="center" paddingTop="100px" cellpadding="0" cellspacing="1" bgcolor="#cccccc">
        <tr>
            <form name="form1" method="POST" action="" >
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
                        <tr>
                            <td colspan="3"><h2><strong>Update Category</strong></h2></td>
                        </tr>  
                        <tr>
                            
                            <td width="294"><input name="catID" value="<?php echo $r['catID']; ?>" type="hidden" id="catID"></td>
                        </tr>  
                        <tr>
                            <td width="78">Category Name</td>
                            <td width="6">:</td>
                            <td width="294"><input name="txtcname" value="<?php echo $r['catName']; ?>" type="text" id="txtcname"></td>
                        </tr>                
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="Submit" value="Update"></td>
                        </tr>     
                    </table>
                </td>
            </form>
        </tr>

    </table>
        <?php } ?>
    <?php 
    if(isset($_REQUEST['Submit']))
    { ?>
    <?php
    
    $cid=$_GET['catID'];
    $cname=$_POST['txtcname'];
    $query="update tblcategory set catName='$cname' where catID='$cid'";
    $res=mysqli_query($con,$query) or die ("Query2 error");
    if($res=1)
    {
        header("location:category_list.php");
    }
    else{
        echo "Not Updated!!";
    }?>
    <?php }
?>
</body>
    </body>
</html>