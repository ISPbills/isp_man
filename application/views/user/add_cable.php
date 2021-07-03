      <div class="col-md">
        <?php echo form_open('add_cable/' . $user->user_id); ?>
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-hdd mr-1"></i>Set-Top Box</h3>
            </div>
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md">
                  <label for="stbNo">STB #</label>
                    <input type="text" name="stb_no" id="stb_no" class="form-control" placeholder="Enter STB #">
                    <span id="stb_checked"></span>
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