<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <style>
        .container {
        min-height: 78vh;
      }
      </style>
  </head>
  <body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    
    <!-- Search Results-->
     <div class="container my-3"> 
      <h1 class="text-center py-3 mb-4 "> Search Results for <em>"<?php echo $_GET['search'];?>"</em></h1>
      <?php
      $noresult=true;
      $query=$_GET['search'];
        $sql="SELECT * FROM threads WHERE MATCH(ttitle,tdesc) against('$query')";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
        $noresult=false;
        $title=$row['ttitle'];
        $tdesc=$row['tdesc'];
        $tid=$row['tid'];
        $url="/phpcodes/forum/thread.php?tid=".$tid;

        //display the search result
        echo '<div class="result">
              <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
              <p class="lead">'.$tdesc.'</p>
            </div>';
        }
        if($noresult)
        {
          echo '<div class="container my-4">
              <div class="container py-5 bg-ash text-black" >
            <p class="display-6">No Results Found</p>
            <p class="lead">Suggestions:<ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li>
                            </ul>
                </p>
          </div>
      </div>';
        }
        ?>
     </div>
    

  
    <?php include 'partials/_footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>