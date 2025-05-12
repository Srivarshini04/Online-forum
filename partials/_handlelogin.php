<?php
$showError=false;
if($_SERVER['REQUEST_METHOD']=="POST")
{
    include "_dbconnect.php";
    $email=$_POST['loginemail'];
    $pass=$_POST['loginpass'];
    $sql="SELECT * FROM users WHERE user_email='$email'";
    $result=mysqli_query($conn,$sql);
    $numrows=mysqli_num_rows($result);
    if($numrows==1)
    {
        $row=mysqli_fetch_assoc($result);
        if(password_verify($pass,$row['user_pass']))
        {
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSIOn['alert_display']=false;
            $_SESSION['useremail']=$email;
            $_SESSION['username']=$row['username'];
            $_SESSION['sno']=$row['sno'];
            echo "Logged in".$email;
            header("location:/phpcodes/forum/index.php");
        }
        else
        {
            header("location:/phpcodes/forum/index.php?loggedwrong=true");
        }
    }
    else
    {
        header("location:/phpcodes/forum/index.php?loggedwrong=true");
    }

}
?>