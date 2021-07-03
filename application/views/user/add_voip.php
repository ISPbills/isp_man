      <div class="col-md">
        <?php echo form_open('User/assign_plan/' . $user->user_id); ?>

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

        <?php echo form_close(); ?>
      </div>
      <!-- /.col -->

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->