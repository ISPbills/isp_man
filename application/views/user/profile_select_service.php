      <div class="col-md">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Services</h3>
          </div>
          <div class="card-body p-0">
            <table class="table table-hover text-center table-sm table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>Devices/Plans</th>
                        <th>Status</th>
                        <th>Validity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                  <?php if(!empty($user->plan_id)): ?>
                    <tr>
                        <td><?php echo $user->plan_name .' Mbps'; ?></td>
                        <td><span class="badge badge-success">Active</span></td>
                        <td>
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
                              </div>
                          </div>
                          <small>21 days left</small>
                        </td>
                        <td>
                          <div class="btn-group btn-xs">
                            <button type="button" class="btn btn-success"><i class="fas fa-sync"></i></button>
                            <button type="button" class="btn btn-danger"><i class="fas fa-sync"></i></button>
                            <button type="button" class="btn btn-warning"><i class="fas fa-sync"></i></button>
                          </div>
                        </td>
                    </tr>
                  <?php endif; ?>

                  <?php if(!empty($user->voip_id)): ?>
                    <tr>
                        <td><?php echo $user->voip_no; ?></td>
                        <td><span class="badge badge-success">Active</span></td>
                        <td>
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
                              </div>
                          </div>
                          <small>21 days left</small>
                        </td>
                        <td>
                          <div class="btn-group btn-xs">
                            <button type="button" class="btn btn-success"><i class="fas fa-sync"></i></button>
                            <button type="button" class="btn btn-danger"><i class="fas fa-sync"></i></button>
                            <button type="button" class="btn btn-warning"><i class="fas fa-sync"></i></button>
                          </div>
                        </td>
                    </tr>
                  <?php endif; ?>

                  <?php if(!empty($stb)){ foreach($stb as $row){ ?>
                    <tr>
                        <td><?php echo $row->stb_no.' - '.$row->vendor_name.' - Rs.'.$row->pack_rate; ?></td>
                        <td><span class="badge badge-success">Active</span></td>
                        <td>
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
                              </div>
                          </div>
                          <small>21 days left</small>
                        </td>
                        <td>
                          <div class="btn-group btn-xs">
                            <button type="button" class="btn btn-success"><i class="fas fa-sync"></i></button>
                            <button type="button" class="btn btn-danger"><i class="fas fa-sync"></i></button>
                            <button type="button" class="btn btn-warning"><i class="fas fa-sync"></i></button>
                          </div>
                        </td>
                    </tr>
                  <?php }} else { ?>
                    <tr><td>No STB Assigned!</td></tr>
                  <?php } ?>

                </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>