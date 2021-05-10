      <div class="col-md">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-wifi mr-1"></i>Internet Plan</h3>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md">
                <label for="inputName">Internet Plan</label>
                <select name="plan_id" class="custom-select" id="inputArea">
                  <option value="">Choose...</option>
                    <?php foreach ($net as $row) : ?>
                        <option value="<?php echo $row->plan_id; ?>"><?php echo $row->plan_name.' - '.$row->vendor_name; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md">
                <label for="inputDescription">Plan Rate</label>
                <input type="number" class="form-control" name="plan_rate">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md">
                <label>Installation Deposit</label>
                <input type="number" class="form-control" name="install_charge">
              </div>
              <div class="form-group col-md">
                <label>Installation Refund</label>
                <input type="number" class="form-control" name="install_refund">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md">
                <label>Router Deposit</label>
                <input type="number" class="form-control" name="install_charge">
              </div>
              <div class="form-group col-md">
                <label>Router Refund</label>
                <input type="number" class="form-control" name="install_refund">
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
                <label for="inputName">VoIP #</label>
                <select name="voip_id" class="custom-select" id="inputArea">
                  <option value="">Choose...</option>
                    <?php foreach ($voip as $row) : ?>
                        <option value="<?php echo $row->voip_id; ?>"><?php echo $row->voip_no.' - '.$row->vendor_name; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md">
                <label for="inputDescription">Plan Rate</label>
                <input type="number" class="form-control" name="voip_rate">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md">
                <label>VoIP Set Deposit</label>
                <input type="number" class="form-control" name="install_charge">
              </div>
              <div class="form-group col-md">
                <label>VoIP Set Refund</label>
                <input type="number" class="form-control" name="install_refund">
              </div>
            </div>
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