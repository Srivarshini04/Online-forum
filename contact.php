<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      /* Custom styles */
      body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
      }
      .container {
        min-height: 78vh;
      }
      .form-container {
        background-color: #fff;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .form-label {
        font-weight: 600;
      }
      
      .form-control {
        border-radius: 5px;
      }
      .alert {
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    
    <div class="container my-4">
      <div class="form-container">
        <h2 class="text-center mb-4">Contact Us</h2>
        
        <!-- Display success or error message -->
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors',1);
        
          // Handle form submission here
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Collect and sanitize form data
            $username = $_POST['username'];
            $email = $_POST['email'];
            $contact_no = $_POST['contact_number'];
            $message = $_POST['message'];
            $terms = isset($_POST['terms']) ? true : false;

            // Form validation and process
            if ($username && $email && $contact_no && $message && $terms) {
              $sql="INSERT INTO contactus(username,useremail,contactno,concern) VALUES ('$username','$email','$contact_no','$message')";
              $result=mysqli_query($conn,$sql);
              echo '<div class="alert alert-success  alert-dismissible fade show my-0" role="alert">Your message has been sent successfully!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              // You can handle storing the data in the database or sending an email here.
            } else {
              echo '<div class="alert alert-danger  alert-dismissible fade show my-0" role="alert">Please fill in all fields and agree to the terms.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
          }
        ?>

        <!-- Contact Form (Self-Submit) -->
        <form method="POST" action="/phpcodes/forum/contact.php">
          <!-- Username Field -->
          <div class="mb-3">
            <label for="userName" class="form-label">Username</label>
            <input type="text" class="form-control" id="userName" name="username" required>
          </div>
          
          <!-- Email Field -->
          <div class="mb-3">
            <label for="userEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="userEmail" name="email" required>
          </div>

          <!-- Contact Number Field -->
          <div class="mb-3">
            <label for="contactNumber" class="form-label">Contact Number</label>
            <input type="tel" class="form-control" id="contactNumber" name="contact_number" required>
          </div>

          <!-- Concern Field (Message) -->
          <div class="mb-3">
            <label for="message" class="form-label">Your Concern</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
          </div>

          <!-- Terms and Conditions Checkbox -->
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="termsCheck" name="terms" required>
            <label class="form-check-label" for="termsCheck">I agree to the <a href="#">terms and conditions</a>.</label>
          </div>

          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>

    <?php include 'partials/_footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
