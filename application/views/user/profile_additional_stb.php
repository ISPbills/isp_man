		<div class="col-md">
			<?php echo form_open('User/additional_stb/' . $user->user_id); ?>
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              Additional Set-Top Boxes can only be assigned one-by-one.
            </div>
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
							<option value="<?php echo $row->stb_id; ?>"><?php echo $row->stb_no.' - '.$row->pack_rate; ?></option>
	                      <?php endforeach; ?>
	                  </select>
	                  <div class="text-danger"><?php echo form_error('stb_id'); ?></div>
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