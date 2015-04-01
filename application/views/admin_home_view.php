<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <meta charset="utf-8" />
    <title>Selamat datang di private homepage :D</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="<?php echo base_url()?>/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>/bootstrap/js/bootstrap.min.js"></script>

 </head>
 <body>
    <?php $session_data = $this->session->userdata('logged_in'); ?>
    <div class="page-header text-center">
      <h1>Home</h1>
      <h2>Welcome <?php echo $username; ?>!</h2>
      <h3>Your member id is <?php echo $id; ?> </h3>
      <?php if($group_name === 'default') {?>
          <h3>Anda belum memasuki grup manapun <br></h3>
      <?php } else {?>
          <h3>Your group is <?php echo $group_name; ?></h3>
      <?php } ?>
    </div>
    

    <!-- Listing directory -->
    <?php $map = directory_map('./uploads/'.$group_name);?>
      <?php $dir = base_url().'uploads/'.$group_name; ?>

      <div class="table-responsive">          
      <?php if (!empty($map)) {?>
      <h1>Daftar file</h1>
        <table class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>File Name</th>
              <th class="row text-center">Delete</th>
              <th class="row text-center">Download</th>
            </tr>
          </thead>
          <tbody>
              <?php $no = 1; ?>
              <?php foreach ($map as $value):?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href="<?php echo $dir.'/'.$value?>"><?php echo $value;?></td>
                  <td class="row text-center"> <a href="file_controller/delFile/<?php echo $value?>"><span class="glyphicon glyphicon-remove"></span></td>
                  <td class="row text-center"> <a href="<?php echo $dir.'/'.$value?>"><span class="glyphicon glyphicon-download-alt"></span></td>
                </tr>
                <?php $no++; ?>
              <?php endforeach; ?>
          </tbody>
        </table>
      <?php } else {echo '<h2>Folder kosong </h2>';} ?>

      </div>

    <form action="manageuser">
      <div class="form-group">
          <button type="submit" value="manageuser" class="btn btn-primary btn-lg btn-block">Manage User</button>
      </div>
    </form>

    <form action="managegroup">
      <div class="form-group">
          <button type="submit" value="manageuser" class="btn btn-primary btn-lg btn-block">Manage Group</button>
      </div>
    </form>

    <form action="changepassword_controller">
      <div class="form-group">
          <button type="submit" value="ChangePassword" class="btn btn-primary btn-lg btn-block">Change My Password</button>
      </div>
    </form>

    <?php if(strcmp($group_name, "default")  != 0){?>
    <form action="upload_controller">
      <div class="form-group row text-center">
          <button type="submit" value="Upload" class="btn btn-primary btn-lg btn-block">Upload</button>
      </div>
   </form>
   <?php } else { ?>
        <script type="text/javascript">
            alert("Anda belum masuk ke grup manapun. Manajemen file tidak dapat dilakukan.");
        </script>
   <?php } ?>

      <form action="home/logout">
    	   <div class="form-group row text-center">
      	   <button type="submit" value="Logout" class="btn btn-primary btn-lg btn-block">Logout</button>
    	   </div>
	    </form>
 </body>
</html>