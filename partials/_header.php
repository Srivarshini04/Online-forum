<?php
session_start();

echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="/phpcodes/forum/">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/phpcodes/forum/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/phpcodes/forum/about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Categories
        </a>
        <div class="dropdown-menu">';
        $sql="SELECT * FROM categories";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {

          echo '<a class="dropdown-item" href="/phpcodes/forum/threadlist.php?catid='.$row['cid'].'">'.$row['cname'].'</a>';
          
        }
         
        echo '</div>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="/phpcodes/forum/contact.php" >Contact</a>
      </li>
    </ul>
    <div class="d-flex align-items-center mx-2">';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '
        <form class="d-flex align-items-center w-100" role="search" action="/phpcodes/forum/search.php" method="get">
            <p class="text-light my-0 mx-5" style="white-space: nowrap; text-align:center;">Welcome '.$_SESSION['username'].'</p>
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
            <a href="partials/_logout.php" class="btn btn-outline-primary mx-2">Logout</a>
        </form>';
    }

  else{
  echo '<form class="d-flex" role="search" action="/phpcodes/forum/search.php" method="get">
    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success" type="submit">Search</button>
  </form>
  <button class="btn btn-outline-primary mx-2" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
  <button class="btn btn-outline-primary mx-2" data-bs-toggle="modal" data-bs-target="#signupmodal">Signup</button>
</div>';
  }

  echo'</div>
        </div>
        </nav>';

include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=='true')
{
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> Signup Successfull!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
else if($_GET['error']){
  $error=$_GET['error'];
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> '.$error.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if((isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)&&!($_SESSION['alert_display'])){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> Welcome '.$_SESSION['username'].'. You are Logged in Successfully!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>'; 
$_SESSION['alert_display']=true;
}
elseif($_GET['loggedwrong'])
{
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Invalid Credentials!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($_GET['logout'])
{
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong>Logged Out Successfully!!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>