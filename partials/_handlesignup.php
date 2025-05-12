<?php
$showAlert=false;
$showError=false;
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include "_dbconnect.php";
    $user_name=$_POST['signupusername'];
    $user_email=$_POST['signupemail'];
    $pass=$_POST['signuppassword'];
    $cpass=$_POST['signupcpassword'];
    

    //check weather this email exist or not
    $existsql="SELECT * FROM users WHERE user_email='$user_email'";
    $result=mysqli_query($conn,$existsql);
    $numrows=mysqli_num_rows($result);
    if($numrows>0)
    {
        $showError="Email already exists";
    }
    else
    {
         if($pass==$cpass){
            $hash=password_hash($pass,PASSWORD_DEFAULT);
            $sql="INSERT INTO users(username,user_email,user_pass)VALUES('$user_name','$user_email','$hash')";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                $showAlert=true;
                header("location:/phpcodes/forum/index.php?signupsuccess=true");
                exit();
            }
        }
        else
        {
            $showError="passwords do not matched";

        }
    }
    header("location:/phpcodes/forum/index.php?signupsuccess=false&error=$showError");

}
?>