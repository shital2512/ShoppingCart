<html>
<head>
<title>Add New Product Image</title>
</head>
    <body>
    <?php
        include('../includes/connection.php');
        $que="select *from tblproduct";
        $res=mysqli_query($con,$que);
    ?>
    </br></br></br></br></br></br></br></br>
    <table width="300" border="0" align="center" paddingTop="100px" cellpadding="0" cellspacing="1" bgcolor="#cccccc">
        <tr>
            <form name="form1" method="POST" action="" enctype="multipart/form-data">
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
                        <tr>
                            <td colspan="3"><h2>Add New Product Image</h2></td>
                        </tr>    
                        <tr>
                            <td width="78">Product</td>
                            <td width="6">:</td>
                            <td><select id="drppname" name="drppname" data-toggle="dropdown" required>
                                <?php 
                                    while($r=mysqli_fetch_assoc($res))
                                    {
                                        ?>
                                        <option value="<?php echo $r['pid']; ?>" data-toggle="dropdown"><?php echo $r['pname']; ?></option>
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
    $pid=$_POST['drppname'];
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
	
    $query="insert into tblproduct_img(pid,img) values('$pid','$path')";
    $res=mysqli_query($con,$query) or die ("Query error");
    if($res=1)
    {
        header("location:productImg_list.php");
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