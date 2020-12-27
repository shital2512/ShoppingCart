<html>
<head>
<title>Add New Category</title>
</head>
    <body>
    </br></br></br></br></br></br></br></br>
    <table width="300" border="0" align="center" paddingTop="100px" cellpadding="0" cellspacing="1" bgcolor="#cccccc">
        <tr>
            <form name="form1" method="POST" action="">
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
                        <tr>
                            <td colspan="3" align="center"><h2><strong>Add New Category</strong></h2></td>
                        </tr>  
                        <tr>
                            <td width="78">Category Name</td>
                            <td width="6">:</td>
                            <td width="294"><input name="txtcname" type="text" id="txtcname"></td>
                        </tr>                
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="Submit" value="Add"></td>
                        </tr>     
                    </table>
                </td>
            </form>
        </tr>

    </table>
    <?php 
    if(isset($_REQUEST['Submit']))
    { ?>
    <?php
    include('../includes/connection.php');

    $cname=$_POST['txtcname'];
    $query="insert into tblcategory(catName) values('$cname')";
    $res=mysqli_query($con,$query) or die ("Query error");
    if($res=1)
    {
        header("location:category_list.php");
    }
    else{
        echo "Not Inserted!!";
    }?>
    <?php }
?>
</body>
    </body>
</html>