<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Add Package</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Package Management</li>
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
      <?php echo form_open('Administration/create_package'); ?>
        <div class="card-body">

          <div class="form-row">
            <div class="form-group col-md">
              <label for="packName">Package Name</label>
              <input type="text" name="pack_name" class="form-control" id="packName">
              <div class="text-danger"><?php echo form_error('pack_name'); ?></div>
            </div>
            
            <div class="form-group col-md">
              <label for="packRate">Pack Rate</label>
              <input type="text" name="pack_rate" class="form-control" id="packRate">
              <div class="text-danger"><?php echo form_error('pack_rate'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="packType">Pack Type</label>
              <select class="custom-select" name="pack_type" id="packType">
                <option value="">Choose...</option>
                <option value="SD" selected="">SD</option>
                <option value="HD">HD</option>
              </select>
              <div class="text-danger"><?php echo form_error('pack_type'); ?></div>
            </div>
            
            <div class="form-group col-md">
              <label for="packDuration">Pack Duration (in Months)</label>
              <input type="number" name="pack_duration" class="form-control" id="packDuration">
              <div class="text-danger"><?php echo form_error('pack_duration'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="vendName">Vendor Name</label>
              <input type="text" name="vendor_name" class="form-control" id="vendName">
              <div class="text-danger"><?php echo form_error('vendor_name'); ?></div>
            </div>
            
            <div class="form-group col-md">
              <label for="vendRate">Vendor Rate</label>
              <input type="number" name="vendor_rate" class="form-control" id="vendRate">
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
