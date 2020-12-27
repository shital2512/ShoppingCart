<html>
<head>
    <title>All Product Images</title>
</head>
<body>
    <?php
        include('../includes/connection.php');
        $result=mysqli_query($con,"select *from tblproduct_img");
    ?>
    <div align="center">
    <h1>All Product Images</h1>
    <table border='1' cellpadding="2" cellspacing="1" bgcolor="" align="center">
        <tr><td colspan="8" align="left"><a href="productImg_insert.php">Add New Product Image</a> </td></tr>
        <tr>
            <th>Image Id</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
            if(mysqli_num_rows($result)==0)
            {?>
                <tr><td colspan="5"> Rows not available.</td></tr>
            <?php
            }
            else{
                $imgid=1;
                while($row=mysqli_fetch_array($result,1))
                {
                ?>
                    <tr><td> <?php echo $imgid++ ?></td>
                    <td><?php $pid=$row['pid'];  
                                    $qry2="select * from tblproduct where pid=$pid";
									$res2=mysqli_query($con,$qry2);
									while($r2=mysqli_fetch_assoc($res2))
									{
										echo $r2['pname'];
									}
								   ?></td>
                    <td><img src="<?php echo $row['img']; ?>" width="100" height="100"  /></td>
                    <td> <a href="productImg_update.php?imgid=<?php echo $row['imgid']; ?>">Edit</a></td>
                    <td><a href="productImg_delete.php?imgid=<?php echo $row['imgid']; ?>">Delete</a></td>
                    </tr>
                    <?php
                }
            }
        ?>
    </table>
    </div>
    <?php 
        mysqli_close($con);
    ?>
</body>
</html>