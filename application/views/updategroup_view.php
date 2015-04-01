<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Update Grup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Update Grup</h1>
</div>
    <?php echo validation_errors(); ?>
    <?php echo form_open('do_updategroup'); ?>
    
    <div class="form-group">
        <input type="prev_group" class="form-control input-lg" placeholder="Nama Group" id="prev_group" name="prev_group"
        value="<?php echo $prev_group;?>" readonly/>
    </div>

    <div class="form-group">
        <input type="group_name" class="form-control input-lg" placeholder="Nama Group Baru" id="group_name" name="group_name"/>
    </div>
    <div class="form-group">
        <button type="submit" value="Update" class="btn btn-primary btn-lg btn-block">Update Group</button>
    </div>
</form>

</div>

</body>
</html>