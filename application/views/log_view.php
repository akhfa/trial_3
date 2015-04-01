<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <meta charset="utf-8" />
    <title>Log Viewer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>bootstrap/js/bootstrap.min.js"></script>
 </head>
 <body>
    <div class="page-header text-center">
      <h1>Log Viewer</h1>
      <?php if($group_name === 'default') {?>
          <h3>Anda belum memasuki grup manapun <br></h3>
      <?php } else {?>
          <h3>Your group is <?php echo $group_name; ?></h3>
      <?php } ?>
    </div>
     
    
    <!-- Listing Log -->
    <?php if($role === 'leader') { ?>
      <div class="table-responsive"> 
      <?php if (!empty($daftar_log)) {?> 
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama File</th>
            <th>Username</th>
            <th>Group</th>
            <th>Kegiatan</th>
            <th>Waktu</th>
          </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($daftar_log as $log): ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $log->nama_file;?></td>
                <td><?php echo $log->username;?></td>
                <td><?php echo $log->group_name;?></td>
                <td><?php echo $log->jenis_log;?></td>
                <td><?php echo $log->waktu;?></td>
              </tr>
              <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
      </table>
      <?php } else {echo '<h2>Log tidak ditemukan</h2>';} ?>
      </div>
    <?php } else {echo "<h2> Akses tidak diijinkan.</h2>";} ?>

		  <form action="<?php echo base_url()?>index.php/home">
      <div class="form-group">
          <button type="submit" value="Home" class="btn btn-primary btn-lg btn-block">Back</button>
      </div>
    </form>
 </body>
</html>