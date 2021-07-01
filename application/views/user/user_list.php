<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">User List</h1>
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
  <div class="container-fluid">

    <div class="card">
      <div class="card-header">
        <a href="<?php echo base_url('create_user'); ?>" class="btn btn-sm btn-warning">Add User</a>
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->

      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-center table-bordered table-sm table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>Action</th>
              <th>Username</th>
              <th>Name</th>
              <th>Contact #</th>
              <th>Email</th>
              <th>Address</th>
              <th>Area</th>
              <th>Status</th>
              <th colspan="3">Services</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($user)){ foreach($user as $row){ ?>
            <tr>
              <td>
                <div class="dropdown">
                  <a class="btn btn-secondary btn-xs dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <?php if(empty($row->service_id)): ?>
                      <a class="dropdown-item" href="<?php echo base_url('select_assign/' . $row->user_id); ?>">Assign Plans</a>
                    <?php else: ?>
                      <a class="dropdown-item" href="<?php echo base_url('assign_validity/' . $row->user_id); ?>">Assign Validity</a>
                  <?php endif; ?>
                  </div>
                </div>
              </td>
              <td><?php echo $row->username; ?></td>
              <td><?php echo $row->first_name .' '. $row->last_name; ?></td>
              <td><?php echo $row->contact_no; ?></td>
              <td><?php echo $row->email; ?></td>
              <td><?php echo $row->bill_address; ?></td>
              <td><?php echo $row->area_name; ?></td>
              <td>
                <?php echo ($row->user_status == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>'; ?>
              </td>
              <td><?php echo !empty($row->cable) ? '<i class="fas fa-tv"></i> '.$row->cable.'' : '-'; ?></td>
              <td><?php echo !empty($row->net) ? '<i class="fas fa-wifi"></i> '.$row->net.'' : '-'; ?></td>
              <td><?php echo !empty($row->voip) ? '<i class="fas fa-phone-alt"></i> '.$row->voip.'' : '-'; ?></td>
            </tr>
          <?php }} else { ?>
            <tr>
              <td colspan="9">No record(s) found!</td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>