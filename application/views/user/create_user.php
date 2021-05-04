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
              <label for="inputUsername">First Name</label>
              <input type="text" name="first_name" class="form-control" id="inputUsername">
              <div class="text-danger"><?php echo form_error('first_name'); ?></div>
            </div>

            <div class="form-group col-md">
              <label for="inputUsername">Last Name</label>
              <input type="text" name="last_name" class="form-control" id="inputUsername">
              <div class="text-danger"><?php echo form_error('last_name'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputUsername">Contact #</label>
              <input type="text" name="contact_no" class="form-control" id="inputUsername">
              <div class="text-danger"><?php echo form_error('contact_no'); ?></div>
            </div>

            <div class="form-group col-md">
              <label for="inputUsername">Email</label>
              <input type="text" name="email" class="form-control" id="inputUsername">
              <div class="text-danger"><?php echo form_error('email'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputUsername">Billing Address</label>
              <input type="text" name="bill_address" class="form-control" id="inputUsername">
              <div class="text-danger"><?php echo form_error('bill_address'); ?></div>
            </div>

            <div class="form-group col-md">
              <label for="inputUsername">Installation Address</label>
              <input type="text" name="install_address" class="form-control" id="inputUsername">
              <div class="text-danger"><?php echo form_error('install_address'); ?></div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputUsername">First Name</label>
              <input type="text" name="first_name" class="form-control" id="inputUsername">
              <div class="text-danger"><?php echo form_error('first_name'); ?></div>
            </div>

            <div class="form-group col-md">
              <label for="inputUsername">Last Name</label>
              <input type="text" name="last_name" class="form-control" id="inputUsername">
              <div class="text-danger"><?php echo form_error('last_name'); ?></div>
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
