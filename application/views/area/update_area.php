<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Edit Area</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Area Management</li>
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
        <h3 class="card-title">Update Form</h3>
      </div>
      <!-- /.card-header -->

      <!-- form start -->
      <?php echo form_open('update_area/' . $area->area_id); ?>
        <div class="card-body">

          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputBranch">Area</label>
              <input type="text" name="area_name" class="form-control" value="<?php echo $area->area_name; ?>" id="inputBranch">
              <div class="text-danger"><?php echo form_error('area_name'); ?></div>
            </div>
            
            <div class="form-group col-md">
              <label for="inputGST">District</label>
              <input type="text" name="area_district" class="form-control" value="<?php echo $area->area_district; ?>" id="inputGST">
              <div class="text-danger"><?php echo form_error('area_district'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputBranch">City</label>
              <input type="text" name="area_city" class="form-control" value="<?php echo $area->area_city; ?>" id="inputBranch">
              <div class="text-danger"><?php echo form_error('area_city'); ?></div>
            </div>
            
            <div class="form-group col-md">
              <label for="inputGST">State</label>
              <input type="text" name="area_state" class="form-control" value="<?php echo $area->area_state; ?>" id="inputGST">
              <div class="text-danger"><?php echo form_error('area_state'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputBranch">Pin Code</label>
              <input type="text" name="area_pin" class="form-control" value="<?php echo $area->area_pin; ?>" id="inputBranch">
              <div class="text-danger"><?php echo form_error('area_pin'); ?></div>
            </div>
            
            <div class="form-group col-md">
              <label for="inputGST">Contry</label>
              <input type="text" name="area_country" class="form-control" value="<?php echo $area->area_country; ?>" id="inputGST">
              <div class="text-danger"><?php echo form_error('area_country'); ?></div>
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
