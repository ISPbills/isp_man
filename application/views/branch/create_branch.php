<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Add Branch</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Branch Management</li>
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
      <?php echo form_open('create_branch'); ?>
        <div class="card-body">

          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputBranch">Branch Name</label>
              <input type="text" name="branch_name" class="form-control" id="inputBranch">
              <div class="text-danger"><?php echo form_error('branch_name'); ?></div>
            </div>
            
            <div class="form-group col-md">
              <label for="inputGST">Business GST</label>
              <input type="text" name="business_gst" class="form-control" id="inputGST">
              <div class="text-danger"><?php echo form_error('business_gst'); ?></div>
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputAddress">Address</label>
              <input type="text" name="branch_address" class="form-control" id="inputAddress">
              <div class="text-danger"><?php echo form_error('branch_address'); ?></div>
            </div>
            
            <div class="form-group col-md">
              <label for="inputArea">Area</label>
              <select name="area_id" class="custom-select" id="inputArea">
                <option value="">Choose...</option>
                  <?php foreach ($area as $row) : ?>
                      <option value="<?php echo $row->area_id; ?>"><?php echo $row->area_name; ?></option>
                  <?php endforeach; ?>
              </select>
              <div class="text-danger"><?php echo form_error('area_id'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputCont1">Landline #</label>
              <input type="text" name="branch_landline" class="form-control" id="inputCont1">
              <div class="text-danger"><?php echo form_error('branch_landline'); ?></div>
            </div>
            
            <div class="form-group col-md">
              <label for="inputCont2">Mobile #</label>
              <input type="text" name="branch_mobile" class="form-control" id="inputCont2">
              <div class="text-danger"><?php echo form_error('branch_mobile'); ?></div>
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
