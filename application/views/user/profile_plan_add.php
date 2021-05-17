      <div class="col-md">
        <?php echo form_open('User/assign_plan/' . $user->user_id); ?>
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
          </div>
          <!-- /.card -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-phone-alt mr-1"></i>VoIP Plan</h3>
            </div>
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md">
                  <label for="selectVoipNo">VoIP #</label>
                  <select name="voip_id" class="custom-select" id="selectVoipNo">
                    <option value="">Choose...</option>
                      <?php foreach ($voip as $row) : ?>
                          <option value="<?php echo $row->voip_id; ?>"><?php echo $row->voip_no.' - '.$row->vendor_name; ?></option>
                      <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md">
                  <label for="inputSetDep">VoIP Set Deposit</label>
                  <input type="number" class="form-control" name="voip_charge" id="inputSetDep">
                </div>
                <div class="form-group col-md">
                  <label for="inputVoipSetRef">VoIP Set Refund</label>
                  <input type="number" class="form-control" name="voip_refund" id="inputVoipSetRef">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-phone-alt mr-1"></i>Set-Top Box</h3>
            </div>
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md">
                  <label for="stbNo">STB #</label>
                  <select name="stb_id" class="custom-select" id="stbNo">
                    <option value="">Choose...</option>
                      <?php foreach ($stb as $row) : ?>
                          <option value="<?php echo $row->stb_id; ?>"><?php echo $row->stb_no; ?></option>
                      <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md">
                  <label for="stbDep">STB Deposit</label>
                  <input type="number" class="form-control" name="stb_charge" id="stbDep">
                </div>
                <div class="form-group col-md">
                  <label for="stbRef">STB Refund</label>
                  <input type="number" class="form-control" name="stb_refund" id="stbRef">
                </div>
                <div class="form-group col-md">
                  <label for="stbRef">Cable Wire Charge</label>
                  <input type="number" class="form-control" name="cable_wire" id="stbRef">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button class="btn btn-primary float-right" name="submit" type="submit">Submit</button>
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