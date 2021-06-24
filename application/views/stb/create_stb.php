<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Add Set-Top Box</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Set-Top Box Management</li>
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
      <?php echo form_open('create_stb'); ?>
        <div class="card-body">

          <div class="form-row">
            <div class="form-group col-md">
              <label for="stbNo">STB #</label>
              <input type="text" name="stb_no" class="form-control" id="stbNo">
              <div class="text-danger"><?php echo form_error('stb_no'); ?></div>
            </div>
            
            <div class="form-group col-md">
              <label for="stbType">STB Type</label>
              <select class="custom-select" name="stb_type" id="stbType">
                <option value="">Choose...</option>
                <option value="SD" selected="">SD</option>
                <option value="HD">HD</option>
              </select>
              <div class="text-danger"><?php echo form_error('stb_type'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="vendName">Vendor Name</label>
              <input type="text" name="vendor_name" class="form-control" id="vendName">
              <div class="text-danger"><?php echo form_error('vendor_name'); ?></div>
            </div>
            
            <div class="form-group col-md">
              <label for="stbWarran">STB Warranty (in Months)</label>
              <input type="number" name="stb_warranty" class="form-control" id="stbWarran">
              <div class="text-danger"><?php echo form_error('stb_warranty'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="stbRate">STB Rate</label>
              <input type="number" name="stb_rate" class="form-control" id="stbRate">
              <div class="text-danger"><?php echo form_error('stb_rate'); ?></div>
            </div>
            <div class="form-group col-md">
              <label for="pack">Package</label>
              <select class="custom-select" name="pack_id" id="pack">
                <option value="">Choose...</option>
                  <?php foreach ($cable as $row) : ?>
                      <option value="<?php echo $row->pack_id; ?>"><?php echo $row->pack_name; ?></option>
                  <?php endforeach; ?>
              </select>
              <div class="text-danger"><?php echo form_error('pack_id'); ?></div>
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
