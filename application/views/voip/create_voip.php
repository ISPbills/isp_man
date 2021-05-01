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
      <?php echo form_open('Operations/create_branch'); ?>
        <div class="card-body">
          
          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputBranch">VoIP #</label>
              <input type="text" name="voip_no" class="form-control" id="inputBranch">
              <div class="text-danger"><?php echo form_error('voip_no'); ?></div>
            </div>
            
            <div class="form-group col-md">
              <label for="inputGST">VoIP Description</label>
              <input type="text" name="voip_desc" class="form-control" id="inputGST">
              <div class="text-danger"><?php echo form_error('voip_desc'); ?></div>
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
