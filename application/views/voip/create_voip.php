<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Add VoIP #</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">VoIP Management</li>
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
      <?php echo form_open('Operations/create_voip'); ?>
        <div class="card-body">
          
          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputVoip">VoIP #</label>
              <input type="text" name="voip_no" class="form-control" id="inputVoip">
              <div class="text-danger"><?php echo form_error('voip_no'); ?></div>
            </div>
            
            <div class="form-group col-md">
              <label for="inputVoipDesc">VoIP Description</label>
              <input type="text" name="voip_desc" class="form-control" value="Unlimited VoIP Calls" id="inputVoipDesc">
              <div class="text-danger"><?php echo form_error('voip_desc'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputUserID">User ID</label>
              <input type="text" name="user_id" class="form-control" id="inputUserID">
              <div class="text-danger"><?php echo form_error('user_id'); ?></div>
            </div>
            
            <div class="form-group col-md">
              <label for="inputPass">Password</label>
              <input type="text" name="password" class="form-control" id="inputPass">
              <div class="text-danger"><?php echo form_error('password'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputVendor">Vendor Name</label>
              <input type="text" name="vendor_name" class="form-control" id="inputVendor">
              <div class="text-danger"><?php echo form_error('vendor_name'); ?></div>
            </div>
            
            <div class="form-group col-md">
              <label for="inputVenRate">Vendor Rate</label>
              <input type="number" name="vendor_rate" class="form-control" id="inputVenRate">
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
