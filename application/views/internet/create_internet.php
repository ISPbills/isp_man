<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Add Internet Plan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Internet Plan Management</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Entry Form</h3>
      </div>
      <!-- /.card-header -->
      
      <!-- form start -->
      <?php echo form_open('Operations/create_internet'); ?>
        <div class="card-body">
          
          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputPlan">Plan</label>
              <input type="text" name="plan_name" class="form-control" id="inputPlan">
              <div class="text-danger"><?php echo form_error('plan_name'); ?></div>
            </div>

            <div class="form-group col-md">
              <label for="inputDesc">Description</label>
              <input type="text" name="plan_desc" class="form-control" id="inputDesc">
              <div class="text-danger"><?php echo form_error('plan_desc'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputVendor">Vendor</label>
              <input type="text" name="vendor_name" class="form-control" id="inputVendor">
              <div class="text-danger"><?php echo form_error('vendor_name'); ?></div>
            </div>

            <div class="form-group col-md">
              <label for="inputVendRate">Vendor Rate</label>
              <input type="number" name="vendor_rate" class="form-control" id="inputVendRate">
              <div class="text-danger"><?php echo form_error('vendor_rate'); ?></div>
            </div>
          </div>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      <?php echo form_close(); ?>

    </div>
    <!-- /.card -->
  </div>
</div>
<!-- /.content -->
