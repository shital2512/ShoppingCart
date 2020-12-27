<html>
<head>
<title>Update Product</title>
</head>
    <body>
    <?php
        include('../includes/connection.php');
        $que="select *from tblcategory";
        $res=mysqli_query($con,$que) or die("cat query error");

        $pid=$_GET['pid'];
        $query="select *from tblproduct where pid='$pid'";
        $result=mysqli_query($con,$query) or die("product query error");
        while($r=mysqli_fetch_array($result))
        {

    ?>
    </br></br></br></br></br></br></br></br>
    <table width="300" border="0" align="center" paddingTop="100px" cellpadding="0" cellspacing="1" bgcolor="#cccccc">
        <tr>
            <form name="form1" method="POST" action="" enctype="multipart/form-data">
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
                        <tr>
                            <td colspan="3"><h2><strong>Update Product</strong></h2></td>
                        </tr>  
                        <tr>
                            
                            <td width="294"><input name="pid" value="<?php echo $r['pid']; ?>" type="hidden" id="pid"></td>
                        </tr> 
                        <tr>
                            <td width="78">Product Name</td>
                            <td width="6">:</td>
                            <td width="294"><input name="txtpname" type="text" id="txtpname" value="<?php echo $r['pname']; ?>" required></td>
                        </tr>  
                        <tr>
                            <td width="78">Quantity</td>
                            <td width="6">:</td>
                            <td width="294"><input name="txtqty" type="text" id="txtqty" value="<?php echo $r['quantity'];?>" required></td>
                        </tr>   
                        <tr>
                            <td width="78">Price</td>
                            <td width="6">:</td>
                            <td width="294"><input name="txtprice" type="text" id="txtprice" value="<?php echo $r['price'];?>" required></td>
                        </tr>         
                        <tr>
                            <td width="78">Category</td>
                            <td width="6">:</td>
                            <td><select id="drpcat" name="drpcat" required>
                                <?php 
                                    while($r1=mysqli_fetch_assoc($res))
                                    {
                                        ?>
                                        <option value="<?php echo $r1['catID']; ?>" data-toggle="dropdown"><?php echo $r1['catName']; ?></option>
                                   <?php
                                    } ?>
                            </td>
                        </tr>  
                        <tr>
                            <td width="78">Product Image</td>
                            <td width="6">:</td>
                            
                            <td>
                            <div>
                            <img src="<?php echo $r['img']; ?>" alt="<?php echo $r['img']; ?>" height="100" width="100" /></br>
                            </div>
                            <input type="file" name="img" required></td>
                            <input type="hidden" name="hdn_old_pic" value="<?php echo $r['img']; ?>"	 />
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
    <?php  } ?>
    <?php 
    if(isset($_REQUEST['Submit']))
    { ?>
    <?php
    $pid=$_GET['pid'];
    $pname=$_POST['txtpname'];
    $qty=$_POST['txtqty'];
    $price=$_POST['txtprice'];
    $cid=$_POST['drpcat'];
    $old=$_POST['hdn_old_pic'];
    $path="../image/";
    $path=$path.basename($_FILES['img']['name']);
    if(move_uploaded_file($_FILES['img']['tmp_name'],$path))
    {
        echo "The File".basename($_FILES['img']['name'])."has been uploaded";
    }
    else{
        echo "There was an error while uploading the file.!";
    }
    if(file_exists($path) && is_readable($path))
    {
	 //echo "abc";
	 unlink($old);
    }
    //header("Content-type: image/jpeg");
    $ims= imagecreatefromjpeg($path);
	$imd=imagecreatetruecolor(100,100);
	
	//imagecopyresized ( resource dst_im, resource src_im, int dstX, int dstY, int srcX, int srcY, int dstW, int dstH, int srcW, int srcH)
	imagecopyresized ($imd, $ims, 0, 0, 0,0,100,100,imagesx($ims) , imagesy($ims));
    //imagejpeg($imd);
	imagejpeg($imd,$path); //To save in file.
	
    $query="update tblproduct set pname='$pname',quantity='$qty',price='$price',catID='$cid',img='$path' where pid='$pid'";
    $res=mysqli_query($con,$query) or die ("Update Query error");
    if($res=1)
    {
        header("location:product_list.php");
    }
    else{
        echo "Not Updated!!";
    }
    // imagedestroy($ims);
	// imagedestroy($imd);
    ?>
    <?php }
?>
</body>
    </body>
</html>