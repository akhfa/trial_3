<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Penambahan Grup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="<?php echo base_url()?>/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Penambahan Grup</h1>
</div>
    <?php echo validation_errors(); ?>
    <?php echo form_open('do_addgroup'); ?>
    <div class="form-group">
        <input type="group" class="form-control input-lg" placeholder="Nama group" id="group" name="group"/>
    </div>
    <div class="form-group">
        <button type="submit" value="addGroup" class="btn btn-primary btn-lg btn-block">Add Group</button>
    </div>
</form>

    <form action="<?php echo base_url()?>index.php/home">
      <div class="form-group">
          <button type="submit" value="Home" class="btn btn-primary btn-lg btn-block">Back</button>
      </div>
    </form>

</div>

</body>
</html>