<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Package List</h1>
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

    <div class="card">
      <div class="card-header">
        <a href="<?php echo base_url('create_package'); ?>" class="btn btn-sm btn-warning">Add Package</a>
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
              <th>Package</th>
              <th>Rate</th>
              <th>Type</th>
              <th>Duration</th>
              <th>Vendor</th>
              <th>Vendor Rate</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($cable)){ foreach($cable as $row){ ?>
            <tr>
              <td><?php echo $row->pack_name; ?></td>
              <td><?php echo $row->pack_rate; ?></td>
              <td><?php echo $row->pack_type; ?></td>
              <td><?php echo $row->pack_duration; ?></td>
              <td><?php echo $row->vendor_name; ?></td>
              <td><?php echo $row->vendor_rate; ?></td>
              <td>
                <div class="dropdown">
                  <a class="btn btn-secondary btn-xs dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo base_url('update_package/' . $row->pack_id); ?>">Edit</a>
                    <a class="dropdown-item" href="<?php echo base_url('delete_package/' . $row->pack_id); ?>">Delete</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php }} else { ?>
            <tr>
              <td colspan="7">No record found!</td>
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