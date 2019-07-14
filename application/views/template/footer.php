<?php if (!isset($pagetype['footer'])):?>
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
      </div>
    </div>

<?php endif; ?>
  </div>

  <script>
    var base_site = '<?=base_url()?>';
  </script>
  <script src="<?=base_url('aassets')?>/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?=base_url('aassets')?>/vendors/js/vendor.bundle.addons.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?=base_url('aassets')?>/js/off-canvas.js"></script>
  <script src="<?=base_url('aassets')?>/js/misc.js"></script>
  <script src="<?=base_url('aassets')?>/js/datepicker.js"></script>
  <script src="<?=base_url('aassets')?>/js/custom.js"></script>

  <script>
    // swal("This modal will disappear soon!", {
    //   icon: "error",
    //   buttons: false,
    //   timer: 3000,
    // });
  </script>
</body>

</html>