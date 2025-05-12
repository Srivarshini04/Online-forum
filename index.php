<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    

    <!-- slider starts here -->
                <div id="carouselExampleIndicators" class="carousel slide">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="coding1.avif" width='1100' height='400' class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="coding2.avif" width='1100' height='400' class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="coding3.avif" width='1100' height='400' class="d-block w-100" alt="...">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>

            <!-- category container starts here -->
    <div class="container my-4">
      <h2 class='text-center my-4'>iDiscuss - Browse Categories</h2>
        <div class="row my-4">
          <!-- fetch all the categories -->
           <!-- use a loop to iterate through categories -->
           <?php
            $sql="SELECT * FROM categories";
            $result=mysqli_query($conn,$sql);
            
            while($row=mysqli_fetch_assoc($result))
            {
              $id=$row['cid'];
              $cat=$row['cname'];
              $desc=$row['cdiscription'];
              echo '<div class="col-md-4 my-2">
                        <div class="card my-2" style="width: 18rem;">
                  <img src=" '.$cat.'.jpeg" width="200" height="200" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><a  class="text-dark" href="threadlist.php?catid=' . $id .'">'.$cat.'</a></h5>
                    <p class="card-text">'.substr($desc,0,210).'...</p>
                    <a href="threadlist.php?catid=' . $id .'" class="btn btn-primary">View Threads</a>
                  </div>
                </div>
         </div>';
            }
            ?>

      </div>
    </div>
    <?php include 'partials/_footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>