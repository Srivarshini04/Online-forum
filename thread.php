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
     $id=$_GET['tid'];
     $sql="SELECT * FROM threads WHERE tid='$id'";
     $result=mysqli_query($conn,$sql);
     while($row=mysqli_fetch_assoc($result))
     {
      $title=$row['ttitle'];
      $tdesc=$row['tdesc'];
      $tuid=$row['tuid'];
     }
     $sql2="SELECT * FROM users WHERE sno='$tuid'";
     $result2=mysqli_query($conn,$sql2);
     $row=mysqli_fetch_assoc($result2);
     ?>

      <?php
          $showAlert=false;
          $method=$_SERVER['REQUEST_METHOD'];
          if($method=="POST")
          {
            //insert comment into db
            $comment=$_POST['comment'];
            $comment=str_replace("<","&lt;",$comment);
            $comment=str_replace(">","&gt;",$comment);
            $sno=$_POST['sno'];
            $sql="INSERT INTO comments(comment_content,thread_id,comment_by) VALUES ('$comment','$id','$sno')";
            $result=mysqli_query($conn,$sql);
            $showAlert=true;
            if($showAlert)
            {
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your Comment has been added!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }

          }
     ?>

    <div class="container my-4">
          <!-- jumbotron code -->
            <div class="container py-5 bg-ash text-black" >
          <h1 class='display-4'><?php echo $title;?></h1>
          <p class='lead'><?php echo $tdesc;?></p>
          <hr class="my-4">
          <p class="text-left">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post "offensive" posts, links or images. ... Remain respectful of other members at all times.</p>
          <p class="lead">Posted by:<em><b><?php echo $row['username'];?></b></em></p>
        </div>
    </div>
    <!-- form -->
     <?php
     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '<div class="container">
      <h1 class="py-2">Post a Comment</h1>
      <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
              <div class="form-group mb-3">
              <label for="comment" class="form-label">Type your Comment</label>
              <textarea class="form-control" placeholder="Leave your Comment here" name="comment" id="comment" style="height: 100px"></textarea>  
              <input type="hidden" name="sno" value="'.$_SESSION["sno"].'"> 
      </div>
            
            <button type="submit" class="btn btn-success">Post Comment</button>
          </form>
     </div>
     <hr>';
     }
     else
     {
      echo '
      <div class="container">
      <h1 class="py-2 ">Post a Comment</h1>
      <p class="lead"><strong>You are not logged in.Please login to be able to Post a Comment <strong></p>
      </div>';
     }
     ?>


    <div class="container" id="ques">
      <h1 class="py-2">Discussions</h1>
              <?php
            $id=$_GET['tid'];
            $sql="SELECT * FROM comments WHERE thread_id='$id'";
            $result=mysqli_query($conn,$sql);
            $noresult=true;
            while($row=mysqli_fetch_assoc($result))
            {
              $noresult=false;
              $id=$row['comment_id'];
              $content=$row['comment_content'];
              $comment_time=$row['comment_time'];
              $comment_by=$row['comment_by'];
              $sql2="SELECT * FROM users WHERE sno='$comment_by'";
              $result2=mysqli_query($conn,$sql2);
              $row2=mysqli_fetch_assoc($result2);

      
            echo  '<div class="d-flex my-4">
              <div class="flex-shrink-0">
                <img src="user.jpeg" width="70px" alt="...">
              </div>
              <div class="flex-grow-1 ms-3">
                <p class="my-0"><strong>'.$row2['user_email'].' at '.$comment_time.'</strong></p>
                <p class="lead">'.$content.'</p>
                
              </div>
            </div>';
          }
          if($noresult)
          {
            echo '<div class="container my-4">
              <div class="container py-5 bg-ash text-black" >
            <p class="display-6">No Comments Found</p>
            <p class="lead">Be the first person to Comment!!</p>
          </div>
      </div>';
          }
        ?> 

    </div>

    <?php include 'partials/_footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>