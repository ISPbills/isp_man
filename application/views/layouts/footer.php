  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <span><b>Version</b> 3.0 (Red Velvet)</span>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019-<?php echo date('Y'); ?> <a href="#">Endeavour Technologies</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/js/adminlte.min.js"></script>
<!-- Toastr Js -->
<script src="<?php echo base_url(); ?>assets/js/toastr.min.js"></script>

<?php $success = $this->session->userdata('success'); if($success != ""){ ?>
  <script type="text/javascript">
    toastr["success"]("<?php echo $success; ?>")
  </script>
<?php } ?>

<?php $error = $this->session->userdata('error'); if($error != ""){ ?>
  <script type="text/javascript">
    toastr["error"]("<?php echo $error; ?>")
  </script>
<?php } ?>

<!-- <script>
// JavaScript Form Validation
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script> -->

</body>
</html>