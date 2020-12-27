<html>
<head>
    <title>All Categories</title>
</head>
<body>
    <?php
        include('../includes/connection.php');
        $result=mysqli_query($con,"select *from tblcategory");
    ?>
    <div align="center">
    <h1>All Categories</h1>
    <table border='1' cellpadding="2" cellspacing="1" bgcolor="" align="center">
        <tr><td colspan="4" align="left"><a href="category_insert.php">Add New Category</a> </td></tr>
        <tr>
            <th>Categoty ID</th>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
            if(mysqli_num_rows($result)==0)
            {?>
                <tr><td colspan="4"> Rows not available.</td></tr>
            <?php
            }
            else{
                $cid=1;
                while($row=mysqli_fetch_array($result,1))
                {
                ?>
                    <tr><td> <?php echo $cid++ ?></td>
                    
                    <td><?php echo $row['catName']; ?></td> 
                    <td> <a href="category_update.php?catID=<?php echo $row['catID']; ?>">Edit</a></td>
                    <td><a href="category_delete.php?catID=<?php echo $row['catID']; ?>">Delete</a></td>
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