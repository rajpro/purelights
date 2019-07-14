<div class="container-fluid page-body-wrapper full-page-wrapper">
  <div class="content-wrapper d-flex align-items-center auth">
    <div class="row w-100">
      <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-center p-5">
          <div class="brand-logo">
            <img src="<?=base_url('aassets/images/purelights.png')?>">
          </div>
          <h4>Hello! let's get started</h4>
          <h6 class="font-weight-light">Sign in to continue.</h6>
            <?=form_open(base_url('auth/login'), ['class'=>'pt-3'])?>
            <div class="form-group">
              <input type="text" name="username" class="form-control form-control-lg" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
            </div>
            <div class="mt-3">
              <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</a>
            </div>
            <div class="my-2 d-flex justify-content-between align-items-center">
              <div class="form-check">
                <label class="form-check-label text-muted">
                  <input type="checkbox" class="form-check-input">
                  Keep me signed in
                </label>
              </div>
              <a href="#" class="auth-link text-black">Forgot password?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
</div>