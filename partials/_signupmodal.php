

<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="signupmodalLabel">Signup for an iDiscuss Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/phpcodes/forum/partials/_handlesignup.php" method="post">
      <div class="modal-body">
      <div class="mb-3">
                    <label for="signupusername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="signupusername" name="signupusername" required>

                </div>
               
                <div class="mb-3">
                    <label for="signupemail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="signupemail" name="signupemail" aria-describedby="emailHelp" required>

                </div>
                <div class="mb-3">
                    <label for="signuppassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="signuppassword" name="signuppassword" required>
                </div>
                <div class="mb-3">
                    <label for="signupcpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="signupcpassword" name="signupcpassword" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Signup</button>
                
      </div>
      </form>
    </div>
  </div>
</div>