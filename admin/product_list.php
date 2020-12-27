<html>
<head>
    <title>All Products</title>
</head>
<body>
    <?php
        include('../includes/connection.php');
        $result=mysqli_query($con,"select *from tblproduct");
    ?>
    <div align="center">
    <h1>All Products</h1>
    <table border='1' cellpadding="2" cellspacing="1" bgcolor="" align="center">
        <tr><td colspan="8" align="left"><a href="product_insert.php"><h3>Add New Product</h3></a> </td></tr>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Quantity</th>
            <th>Product Price</th>
            <th>Category Name</th>
            <th>Product Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
            if(mysqli_num_rows($result)==0)
            {?>
                <tr><td colspan="8"> Rows not available.</td></tr>
            <?php
            }
            else{
                $pid=1;
                while($row=mysqli_fetch_array($result,1))
                {
                ?>
                    <tr><td> <?php echo $pid++ ?></td>
                    
                    <td><?php echo $row['pname']; ?></td> 
                    <td><?php echo $row['quantity']; ?></td> 
                    <td><?php echo $row['price']; ?></td> 
                    <td><?php $cid=$row['catID'];  
                                    $qry2="select * from tblcategory where catID=$cid";
									$res2=mysqli_query($con,$qry2);
									while($r2=mysqli_fetch_assoc($res2))
									{
										echo $r2['catName'];
									}
								   ?></td>
                    <td><img src="<?php echo $row['img']; ?>" width="100" height="100"  /></td>
                    <td> <a href="product_update.php?pid=<?php echo $row['pid']; ?>">Edit</a></td>
                    <td><a href="product_delete.php?pid=<?php echo $row['pid']; ?>">Delete</a></td>
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