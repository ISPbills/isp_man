      <div class="col-md">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Files</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Service Name</th>
                  <th>No. of Connections</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Cable TV Connection</td>
                  <td><span class="badge badge-success">2</span></td>
                  <td class="">
                    <div class="btn-group btn-group-sm">
                      <a href="<?php echo base_url('add_cable/' . $user->user_id); ?>" class="btn btn-info"><i class="fas fa-plus-circle"></i></a>
                      <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Broadband Connection</td>
                  <td><span class="badge badge-success">2</span></td>
                  <td class="">
                    <div class="btn-group btn-group-sm">
                      <a href="<?php echo base_url('add_net/' . $user->user_id); ?>" class="btn btn-info"><i class="fas fa-plus-circle"></i></a>
                      <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>VoIP/Landline Connection</td>
                  <td><span class="badge badge-success">2</span></td>
                  <td class="">
                    <div class="btn-group btn-group-sm">
                      <a href="<?php echo base_url('add_voip/' . $user->user_id); ?>" class="btn btn-info"><i class="fas fa-plus-circle"></i></a>
                      <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->