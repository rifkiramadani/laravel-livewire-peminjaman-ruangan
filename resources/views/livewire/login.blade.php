<div>
    <div class="card mb-3">
  
        <div class="card-body">
    
          <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
            <p class="text-center small">Enter your email &amp; password to login</p>
          </div>
    
          <form wire:submit="login" class="row g-3 needs-validation">
    
            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <div class="input-group has-validation">
                <input wire:model="email" type="text" class="form-control" id="email" required="">
                <div class="invalid-feedback">Please enter your email.</div>
              </div>
            </div>
    
            <div class="col-12">
              <label for="password" class="form-label">Password</label>
              <input wire:model="password" type="password" class="form-control" id="password" required="">
              <div class="invalid-feedback">Please enter your password!</div>
            </div>
    
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary w-100" type="submit">Login</button>
            </div>
            <div class="col-12">
              <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
            </div>
          </form>
    
        </div>
      </div>
</div>
