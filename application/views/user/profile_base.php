<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $title; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">User Profile</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>assets/img/avatar.png" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center"><?php echo $user->first_name .' '. $user->last_name; ?></h3>

          <div class="btn-group btn-block" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="<?php echo base_url('assign_validity/' . $user->user_id); ?>">Renew Plan</a>
                <a class="dropdown-item" href="#">Update Profile</a>
                <a class="dropdown-item" href="<?php echo base_url('add_cable/' . $user->user_id); ?>">Add Set-Top Box</a>
                <a class="dropdown-item" href="<?php echo base_url('add_net/' . $user->user_id); ?>">Add Internet Plan</a>
                <a class="dropdown-item" href="<?php echo base_url('add_voip/' . $user->user_id); ?>">Add VoIP Number</a>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Basic Details</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong><i class="fas fa-map-marker-alt mr-1"></i>Address</strong>
            <p class="text-muted"><?php echo $user->bill_address .', '. $user->area_name; ?></p>

            <hr>

            <strong><i class="fas fa-mobile mr-1"></i>Contact #</strong>
            <p class="text-muted"><?php echo $user->contact_no; ?></p>

            <?php if(!empty($user->plan_id)): ?>
              <hr>
              <strong><i class="fas fa-wifi mr-1"></i>Internet Plan</strong>
              <p class="text-muted"><?php echo $user->plan_name; ?></p>
            <?php endif; ?>

            <?php if(!empty($user->voip_id)): ?>
              <hr>
              <strong><i class="fas fa-phone-alt mr-1"></i>VoIP #</strong>
              <p class="text-muted"><?php echo $user->voip_no; ?></p>
            <?php endif; ?>
            
            <?php if(!empty($userstb)): ?>
              <hr>
              <strong><i class="fas fa-hdd mr-1"></i>STB #</strong>
              <p class="text-muted">
                <?php foreach($userstb as $row): ?>
                  <span><?php echo $row->stb_no.' - '.$row->vendor_name.' - Rs.'.$row->pack_rate; ?></span><br>
                <?php endforeach; ?>
              </p>
            <?php endif; ?>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->