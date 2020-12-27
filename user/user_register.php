<?php
	session_start();
?>
<html>
<head>
<title>Registration</title>
</head>
<?php
    include('../includes/connection.php');
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if($_SESSION['code']==$_POST['txt_code'])
		{
            if(isset($_REQUEST['Submit']))
            {
            //     echo "valid<br>";
			// echo $_POST['txt_name']."<br>";
            // echo $_POST['txt_email']."<br>";
            // echo $_POST['txt_pwd']."</br>";
            // echo $_POST['txt_no']."</br>";

            $name=$_POST['txt_name'];
            $email=$_POST['txt_email'];
            $pwd=$_POST['txt_pwd'];
            $no=$_POST['txt_no'];
            $qry="insert into tbluser(name,email,pwd,contactNo) values('$name','$email','$pwd','$no')";
            $res=mysqli_query($con,$qry) or die("Register q error");
            if($res=1)
            {
                //header("location:category_list.php");
                echo "Successfully registered";
            }
            else{
                echo "Not Inserted!!";
            }
            } 
			
		}
		else
		{
			echo "invalid";
		}
	}
?>
<body>
</br></br></br></br></br></br></br></br>
    <table width="300" border="0" align="center" paddingTop="100px" cellpadding="0" cellspacing="1" bgcolor="#cccccc">
        <tr>
            <form name="form1" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
            <td>
                    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#ffffff">
                        <tr>
                            <td colspan="3"><h2><strong>Register New User</strong></h2></td>
                        </tr>  
                        <tr>
                            <td width="78">User Name</td>
                            <td width="6">:</td>
                            <td width="294"><input name="txt_name" type="text" id="txt_name" required></td>
                        </tr> 
                        <tr>
                            <td width="78">Email</td>
                            <td width="6">:</td>
                            <td width="294"><input name="txt_email" type="text" id="txt_email" required></td>
                        </tr> 
                        <tr>
                            <td width="78">Password</td>
                            <td width="6">:</td>
                            <td width="294"><input name="txt_pwd" type="password" id="txt_pwd" required></td>
                        </tr> 
                        <tr>
                            <td width="78">ContactNO</td>
                            <td width="6">:</td>
                            <td width="294"><input name="txt_no" type="text" id="txt_no" required></td>
                        </tr> 
                        
                        <tr>
                            <td width="100"><img src="captcha.php"> 
                            </td>
                        </tr>
                        <tr>
                            <td width="78">Enter CAPTCHA code</td>
                            <td width="6">:</td>
                            <td width="294"><input type="text" name="txt_code" /><td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="Submit" value="Submit" /></td>
                        </tr>
                    </table>
            </td>
            </form>
    </table>
</body>
</html>
