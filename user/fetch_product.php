<?php
include('../includes/connection.php');

$cid = $_POST['catID'];
$qry = "select * from tblproduct where catID='$cid'";
$res = mysqli_query($con, $qry) or die("q error");
?>
<table border="1">
<tbody>
    
        <?php while ($row = mysqli_fetch_assoc($res)) { ?>
            <tr>
            <td><img src="<?php echo $row['img']; ?>"  width="100" height="100"/></br>
            Product Name: <?php echo $row['pname']; ?></br>
            
            Price<?php echo $row['price']; ?></br>
            </td>
            
            </tr>
            
                
            </tr>
        <?php } ?>
    </tbody>
</table>