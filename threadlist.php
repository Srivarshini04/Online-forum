<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
          .bg-ash {
            background-color:rgb(192, 201, 194); /* Ash color */
          }
          #ques
          {
            min-height:440px;
          }
    </style>


  </head>
  <body>
  <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    

    <?php
     $id=$_GET['catid'];
     $sql="SELECT * FROM categories WHERE cid='$id'";
     $result=mysqli_query($conn,$sql);
     while($row=mysqli_fetch_assoc($result))
     {
      $catname=$row['cname'];
      $catdesc=$row['cdiscription'];
     }
     ?>

     <?php
     $showAlert=false;
          $method=$_SERVER['REQUEST_METHOD'];
          if($method=="POST")
          {
            //insert  thread into db
            $th_title=$_POST['title'];
            $th_title=str_replace("<","&lt;",$th_title);
            $th_title=str_replace(">","&gt;",$th_title);
            $th_desc=$_POST['desc'];
            $th_desc=str_replace("<","&lt;",$th_desc);
            $th_desc=str_replace(">","&gt;",$th_desc);
            $tuid=$_POST['sno'];
            $sql="INSERT INTO threads (ttitle,tdesc,tcid,tuid) VALUES ('$th_title','$th_desc','$id','$tuid')";
            $result=mysqli_query($conn,$sql);
            $showAlert=true;
            if($showAlert)
            {
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your thread has been added! Please wait for community to respond.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }

          }
     ?>
     <!-- category container starts here -->
    <div class="container my-4">
          <!-- jumbotron code -->
            <div class="container py-5 bg-ash text-black" >
          <h1 class='display-4'>Welcome to <?php echo $catname;?> forums</h1>
          <p class='lead'><?php echo $catdesc;?></p>
          <hr class="my-4">
          <p class="text-left">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post "offensive" posts, links or images. ... Remain respectful of other members at all times.</p>
          <a href="#" class="btn btn-success btn-lg">Learn More</a>
        </div>
    </div>
    <!-- form -->
     <?php
     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo'<div class="container">
      <h1 class="py-2">Start a Discussion</h1>
      <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
            <div class="mb-3">
              <label for="title" class="form-label">Problem Title</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">keep your title as short and crisp as possible</div>
            </div>
              
              <div class="form-group mb-3">
              <label for="desc" class="form-label">Elaborate your Concern</label>
              <textarea class="form-control" placeholder="Leave your Concern here" name="desc" id="desc" style="height: 100px"></textarea>
              <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">       
      </div>
            
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
     </div>
     <hr>';
     }
     else
     {
      echo '
      <div class="container">
      <h1 class="py-2 ">Start a Discussion</h1>
      <p class="lead"><strong>You are not logged in.Please login to be able to start Discussion <strong></p>
      </div>';
     }
?>
    <div class="container" id="ques">
      <h1 class="py-2">Browse Questions</h1>
              <?php
            $id=$_GET['catid'];
            $sql="SELECT * FROM threads WHERE tcid='$id'";
            $result=mysqli_query($conn,$sql);
            $noresult=true;
            while($row=mysqli_fetch_assoc($result))
            {
              $noresult=false;
              $id=$row['tid'];
              $title=$row['ttitle'];
              $desc=$row['tdesc'];
              $tuid=$row['tuid'];
              $thread_time=$row['thread_time'];
              $sql2="SELECT * FROM users WHERE sno='$tuid'";
              $result2=mysqli_query($conn,$sql2);
              $row2=mysqli_fetch_assoc($result2);

      
            echo  '<div class="d-flex my-4">
              <div class="flex-shrink-0">
                <img src="user.jpeg" width="70px" alt="...">
              </div>
              <div class="flex-grow-1 ms-3">
               <p class="my-1"><strong>'.$row2['user_email'].' at '.$thread_time.'</strong></p>
                <h5 class="mt-0"><a class="text-dark" href="thread.php?tid='.$id.'">'.$title.'</a></h5>
                <p class="lead">'.$desc.'</p>
                
              </div>
            </div>';
          }
        // echo var_dump($noresult);
        if($noresult)
        {
          echo '<div class="container my-4">
            <div class="container py-5 bg-ash text-black" >
          <p class="display-6">No Threads Found</p>
          <p class="lead">Be the first person to ask a question</p>
        </div>
    </div>';
        }
        ?>
    
    </div>


    <?php include 'partials/_footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>