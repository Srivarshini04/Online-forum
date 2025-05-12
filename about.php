<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - iDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .container {
        min-height: 80vh;
      }
      .about-section {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .about-heading {
        font-size: 2rem;
        font-weight: bold;
      }
      .about-description {
        font-size: 1.2rem;
        margin-top: 15px;
      }
      .team-member {
        margin-top: 30px;
        text-align: center;
      }
      .team-member img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        object-fit: cover;
      }
      .team-member h5 {
        margin-top: 10px;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>

    <div class="container my-4">
      <div class="about-section">
        <h2 class="about-heading text-center">About iDiscuss</h2>
        <p class="about-description">
          iDiscuss is a vibrant community dedicated to bringing people together to discuss various topics ranging from technology, coding, development, design, to everything else in between. Whether you're a beginner or an expert, iDiscuss provides a platform where you can ask questions, share knowledge, and connect with other like-minded individuals.
        </p>
        <p class="about-description">
          Our mission is to create an open and supportive environment where people can learn, grow, and share ideas. We believe in the power of community, and we strive to ensure that everyone has a voice and can participate in discussions that matter to them.
        </p>
        <p class="about-description">
          Whether you're here to get help with a coding problem, share a project idea, or learn about the latest trends in the tech world, iDiscuss is the place for you!
        </p>
        
        <!-- Team Section -->
        <h3 class="about-heading text-center">Meet Our Team</h3>
        <div class="row">
          <div class="col-md-4 team-member">
            <img src="" alt="Team Member 1">
            <h5>Varshini</h5>
            <p>Founder & Lead Developer</p>
          </div>
          <div class="col-md-4 team-member">
            <img src="" alt="Team Member 2">
            <h5>Harry</h5>
            <p>Community Manager</p>
          </div>
          <div class="col-md-4 team-member">
            <img src="" alt="Team Member 3">
            <h5>Bootstrap</h5>
            <p>Senior Developer</p>
          </div>
        </div>
      </div>
    </div>

    <?php include 'partials/_footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
