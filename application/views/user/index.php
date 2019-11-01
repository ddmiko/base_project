
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-lg">
              <?= $this->session->flashdata('message');?>
            </div>
          </div>
          <div class="card mb-3 col-lg">
            <div class="row no-gutters">
              <div class="col-md-2">
                <img src="<?= base_url('assets/img/profile/').$user['image'];?>" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $user['name'];?></h5>
                  <p class="card-text"><?= $user['email'];?></p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  <a href="<?= base_url('user/edit');?>" class="btn btn-primary">Edit Profile</a>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="card" style="width: 18rem;">
            <img src="<?= base_url('assets/img/profile/').$user['image'];?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= $user['name'];?></h5>
              <p class="card-text"><?= $user['email'];?></p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div> -->
          <!-- <div class="card mb-3">
            <img src="<?= base_url('assets/img/profile/').$user['image'];?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?= $user['name'];?></h5>
              <p class="card-text"><?= $user['email'];?></p>
              <p class="card-text"><small class="text-muted">Member since </small></p>
            </div>
          </div> -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

