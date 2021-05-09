<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Add User</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">User Management</li>
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
      <?php echo form_open('Operations/create_user'); ?>
        <div class="card-body">
          
          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputUsername">Username</label>
              <input type="text" name="username" class="form-control" id="inputUsername">
              <div class="text-danger"><?php echo form_error('username'); ?></div>
            </div>

            <div class="form-group col-md">
              <label for="inputPass">Password</label>
              <input type="text" name="password" class="form-control" id="inputPass">
              <div class="text-danger"><?php echo form_error('password'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputFName">First Name</label>
              <input type="text" name="first_name" class="form-control" id="inputFName">
              <div class="text-danger"><?php echo form_error('first_name'); ?></div>
            </div>

            <div class="form-group col-md">
              <label for="inputLName">Last Name</label>
              <input type="text" name="last_name" class="form-control" id="inputLName">
              <div class="text-danger"><?php echo form_error('last_name'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputContact">Contact #</label>
              <input type="text" name="contact_no" class="form-control" id="inputContact">
              <div class="text-danger"><?php echo form_error('contact_no'); ?></div>
            </div>

            <div class="form-group col-md">
              <label for="inputEmail">Email</label>
              <input type="email" name="email" class="form-control" id="inputEmail">
              <div class="text-danger"><?php echo form_error('email'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputBillAdd">Billing Address</label>
              <textarea name="bill_address" class="form-control" id="inputBillAdd"></textarea>
              <div class="text-danger"><?php echo form_error('bill_address'); ?></div>
            </div>

            <div class="form-group col-md">
              <label for="inputInstAdd">Installation Address</label>
              <textarea name="install_address" class="form-control" id="inputInstAdd"></textarea>
              <div class="text-danger"><?php echo form_error('install_address'); ?></div>
            </div>
          </div>

          <div class="form-row">
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

            <div class="form-group col-md">
              <label for="inputConnType">Connection Type</label>
              <select name="connection_type" class="custom-select" id="inputConnType">
                <option value="">Choose...</option>
                <option value="Fiber Connection" selected="">Fiber Connection</option>
                <option value="Cat5 Connection">Cat5 Connection</option>
              </select>
              <div class="text-danger"><?php echo form_error('connection_type'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputBusiName">Buiness/Comany Name</label>
              <input type="text" name="business_name" class="form-control" id="inputBusiName">
              <div class="text-danger"><?php echo form_error('business_name'); ?></div>
            </div>

            <div class="form-group col-md">
              <label for="inputGST">GST #</label>
              <input type="text" name="business_gst" class="form-control" id="inputGST">
              <div class="text-danger"><?php echo form_error('business_gst'); ?></div>
            </div>
          </div>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <input type="hidden" name="user_status" value="1">
        </div>
      <?php echo form_close(); ?>

    </div>
    <!-- /.card -->
  </div>
</div>
<!-- /.content -->
