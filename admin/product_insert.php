<html>
<head>
<title>Add New Product</title>
</head>
    <body>
    <?php
        include('../includes/connection.php');
        $que="select *from tblcategory";
        $res=mysqli_query($con,$que);
    ?>
    </br></br></br></br></br></br></br></br>
    <table width="300" border="0" align="center" paddingTop="100px" cellpadding="0" cellspacing="1" bgcolor="#cccccc">
        <tr>
            <form name="form1" method="POST" action="" enctype="multipart/form-data">
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
                        <tr>
                            <td colspan="3"><h2><strong>Add New Product</strong></h2></td>
                        </tr>  
                        <tr>
                            <td width="78">Product Name</td>
                            <td width="6">:</td>
                            <td width="294"><input name="txtpname" type="text" id="txtpname" required></td>
                        </tr>  
                        <tr>
                            <td width="78">Quantity</td>
                            <td width="6">:</td>
                            <td width="294"><input name="txtqty" type="text" id="txtqty" required></td>
                        </tr>   
                        <tr>
                            <td width="78">Price</td>
                            <td width="6">:</td>
                            <td width="294"><input name="txtprice" type="text" id="txtprice" required></td>
                        </tr>         
                        <tr>
                            <td width="78">Category</td>
                            <td width="6">:</td>
                            <td><select id="drpcat" name="drpcat" data-toggle="dropdown" required>
                                <?php 
                                    while($r=mysqli_fetch_assoc($res))
                                    {
                                        ?>
                                        <option value="<?php echo $r['catID']; ?>" data-toggle="dropdown"><?php echo $r['catName']; ?></option>
                                   <?php
                                    } ?>
                            </td>
                        </tr>  
                        <tr>
                            <td width="78">Product Image</td>
                            <td width="6">:</td>
                            <td><input type="file" name="img" required></td>
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
    
    $pname=$_POST['txtpname'];
    $qty=$_POST['txtqty'];
    $price=$_POST['txtprice'];
    $cid=$_POST['drpcat'];
    $path="../image/";
    $path=$path.basename($_FILES['img']['name']);
    if(move_uploaded_file($_FILES['img']['tmp_name'],$path))
    {
        echo "The File".basename($_FILES['img']['name'])."has been uploaded";
    }
    else{
        echo "There was an error while uploading the file.!";
    }
    //header("Content-type: image/jpeg");
    $ims= imagecreatefromjpeg($path);
	$imd=imagecreatetruecolor(100,100);
	
	//imagecopyresized ( resource dst_im, resource src_im, int dstX, int dstY, int srcX, int srcY, int dstW, int dstH, int srcW, int srcH)
	imagecopyresized ($imd, $ims, 0, 0, 0,0,100,100,imagesx($ims) , imagesy($ims));
    //imagejpeg($imd);
	imagejpeg($imd,$path); //To save in file.
	
    $query="insert into tblproduct(pname,quantity,price,catID,img) values('$pname','$qty','$price','$cid','$path')";
    $res=mysqli_query($con,$query) or die ("Query error");
    if($res=1)
    {
        header("location:product_list.php");
    }
    else{
        echo "Not Inserted!!";
    }
    // imagedestroy($ims);
	// imagedestroy($imd);
    ?>
    <?php }
?>
</body>
    </body>
</html>