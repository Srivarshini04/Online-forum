
<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginmodalLabel">Login to iDiscuss</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/phpcodes/forum/partials/_handlelogin.php" method="post">
      <div class="modal-body">
               
                <div class="mb-3">
                    <label for="loginemail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="loginemail" name="loginemail" aria-describedby="emailHelp" required>
                    
                </div>
                <div class="mb-3">
                    <label for="loginpass" class="form-label">Password</label>
                    <input type="password" class="form-control" id="loginpass" name="loginpass" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Login</button>
                
      </div>
      </form>
    </div>
  </div>
</div>