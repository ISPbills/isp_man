<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">VoIP List</h1>
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

    <?php $success = $this->session->userdata('success'); if($success != ""){ ?>
      <div class="alert alert-success"><?php echo $success; ?></div>
    <?php } ?>

    <?php $error = $this->session->userdata('error'); if($error != ""){ ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php } ?>

    <div class="card">
      <div class="card-header">
        <a href="<?php echo base_url('Operations/create_voip'); ?>" class="btn btn-sm btn-warning">Add VoIP</a>
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
              <th>VoIP #</th>
              <th>Description</th>
              <th>User ID</th>
              <th>Password</th>
              <th>Vendor</th>
              <th>Vendor Rate</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($voip)){ foreach($voip as $row){ ?>
            <tr>
              <td><?php echo $row->voip_no; ?></td>
              <td><?php echo $row->voip_desc; ?></td>
              <td><?php echo $row->user_id; ?></td>
              <td><?php echo $row->password; ?></td>
              <td><?php echo $row->vendor_name; ?></td>
              <td><?php echo $row->vendor_rate; ?></td>
              <td>
                <div class="dropdown">
                  <a class="btn btn-secondary btn-xs dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo base_url('Operations/update_voip/' . $row->voip_id); ?>">Edit</a>
                    <a class="dropdown-item" href="<?php echo base_url('Operations/delete_voip/' . $row->voip_id); ?>">Delete</a>
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