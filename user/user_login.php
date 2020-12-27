<html>
<body>
</br></br></br></br></br></br></br></br>
    <table width="300" border="0" align="center" paddingTop="100px" cellpadding="0" cellspacing="1" bgcolor="#cccccc">
        <tr>
            <form name="form1" method="post" action="">
                <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
                        <tr>
                            <td colspan="3"><h1><strong>User Login</strong></h1></td>
                        </tr>  
                        <tr>
                            <td width="78">Username</td>
                            <td width="6">:</td>
                            <td width="294"><input name="name" type="text" id="name"></td>
                        </tr> 
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input name="pwd" type="password" id="pwd"></td>
                        </tr>  
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="Submit" value="Login"></td>
                        </tr>     
                    </table>
                </td>
            </form>
        </tr>
        <tr>
            <tr><td colspan=2> <h3><a href="user_register.php" >New User Register Here.</a></h3> </td></tr>
        </tr>
    </table>

    <?php 
    if(isset($_REQUEST['Submit']))
    { ?>

        <?php
        include('../includes/connection.php');
        // $con=mysqli_connect("localhost:3306","root","root") or die("Connection error");
        //  mysqli_select_db($con,"assdb") or die("Database error");
        // username and password sent from form
        $username=$_POST['name'];
        $password=$_POST['pwd'];

        // To protect MySQL injection 
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($con,$username);
        $password = mysqli_real_escape_string($con,$password);

        $sql="select * from tbluser where name = '$username' and pwd = '$password' ";
        try{
                $result=mysqli_query($con, $sql);
        }
        catch(exception $e){
                echo "$e";
        } 

        // Mysql_num_row is counting table row
        $count=mysqli_num_rows($result);
        // If result matched $myusername and $mypassword, table row must be 1 row
        if($count==1){
        $row=mysqli_fetch_array($result);

        session_start();
        $_SESSION["name"]=$row["name"];

        header("location:./user_home.php");

        //echo "done";
        }
        else
        {
            header("location:user_login.php");
        }
        ?>
    <?php
    } ?>
</body>
</html>