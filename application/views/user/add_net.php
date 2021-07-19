      <div class="col-md">
        <?php echo form_open('add_net/' . $user->user_id); ?>

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-wifi mr-1"></i>Internet Plan</h3>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md">
                <label for="selectNetPlan">Internet Plan</label>
                <select name="plan_id" class="custom-select" id="selectNetPlan">
                  <option value="">Choose...</option>
                    <?php foreach ($net as $row) : ?>
                        <option value="<?php echo $row->plan_id; ?>"><?php echo $row->plan_name.' - '.$row->vendor_name; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="text-danger"><?php echo form_error('plan_id'); ?></div>
              </div>
              <div class="form-group col-md">
                <label for="inputInstallDeposit">Service Name</label>
                <input type="text" class="form-control" name="install_charge" id="inputInstallDeposit">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md">
                <label for="inputInstallDeposit">Username</label>
                <input type="text" class="form-control" name="install_charge" id="inputInstallDeposit">
              </div>
              <div class="form-group col-md">
                <label for="inputInstallDeposit">Password</label>
                <input type="text" class="form-control" name="install_charge" id="inputInstallDeposit">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md">
                <label for="inputInstallDeposit">Installation Deposit</label>
                <input type="number" class="form-control" name="install_charge" id="inputInstallDeposit">
              </div>
              <div class="form-group col-md">
                <label for="inputInstallRef">Installation Refund</label>
                <input type="number" class="form-control" name="install_refund" id="inputInstallRef">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md">
                <label for="inputDevDep">Router Deposit</label>
                <input type="number" class="form-control" name="router_charge" id="inputDevDep">
              </div>
              <div class="form-group col-md">
                <label for="inputRouterRef">Router Refund</label>
                <input type="number" class="form-control" name="router_refund" id="inputRouterRef">
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button class="btn btn-primary float-right" name="submit" type="submit">Submit</button>
          </div>
        </div>
      </div>
          <!-- /.card -->

        <?php echo form_close(); ?>
      </div>
      <!-- /.col -->

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->