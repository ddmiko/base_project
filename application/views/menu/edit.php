
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
          	<div class="col-lg-8">
          		<form action="<?= base_url('menu/edit/'.$submenu['id']);?>" method="post">
          		      <div class="modal-body">
          		        <div class="form-group">
          		            <input type="text" class="form-control" id="title" name="title" value="<?= $submenu['title'];?>" placeholder="SubMenu Title">
          		        </div>
          		        <div class="form-group">
          		        	<select name="menu_id" id="menu_id" class="form-control">
          		        		<option value="">Select Menu</option>
          		        		<?php foreach ($menu as $m) : ?>
          		        			<option value="<?= $m['id'];?>"><?= $m['menu'];?></option>
          		        		<?php endforeach; ?>	
          		        	</select>
          		        </div> 
          		        
          		        <div class="form-group">
          		            <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url'];?>" placeholder="SubMenu Url">
          		        </div>
          				    <div class="form-group">
          		            <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon'];?>" placeholder="SubMenu Icon">
          		        </div>
          		        <div class="form-group">
          		        	<div class="form-check">
          		        	  <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
          		        	  <label class="form-check-label" for="is_active">
          		        	    Active?
          		        	  </label>
          		        	</div>
          		        </div>
          		      </div>

          		      <div class="modal-footer">
          		        <a href="<?= base_url('menu/submenu')?>" class="btn btn-secondary" data-dismiss="modal">Back</a>
          		        <button type="submit" class="btn btn-primary">Save</button>
          		      </div>
          		</form>
          	</div>
          </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

