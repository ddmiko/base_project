
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
          	<div class="col-lg-8">
          		<form action="<?= base_url('admin/editRole/'.$getrole['id']);?>" method="post">
          		      
          		        <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="role" name="role" value="<?= $getrole['role'];?>" placeholder="Role Name">
                          </div>
                      </div>
          		      

          		      <div class="modal-footer">
          		        <a href="<?= base_url('admin/role')?>" class="btn btn-secondary" data-dismiss="modal">Back</a>
          		        <button type="submit" class="btn btn-primary">Save</button>
          		      </div>
          		</form>
          	</div>
          </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

