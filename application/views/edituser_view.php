<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Edit Group</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="<?php echo base_url()?>/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Edit Group untuk user "<?php echo $username;?>"</h1>
</div>

    <?php echo validation_errors(); ?>
    <?php echo form_open('do_edituser'); ?>

    <div class="form-group">
        <input type="text" class="form-control input-lg" id="username" name="username" value="<?php echo $username; ?>" readonly/>
    </div>
    <div class="form-group">
        <!-- <input type="text" class="form-control input-lg" id="group" name="group" value="<?php //if($group_name === 'default') 
                                                                                                //echo "no group"; 
                                                                                                //else echo $group_name; ?>"/> -->
        <select name="selectedgroup"> 
            <?php echo '<option value="no group">No Group</option>'; ?>
            <?php foreach ($option as $key) {
                if($key->group_name === $group_name)
                    echo '<option value="'.$key->group_name.'" selected="selected">'.$key->group_name.'</option>';
                else
                    echo '<option value="'.$key->group_name.'">'.$key->group_name.'</option>';
            }?>
        </select>

    </div>
    <div class="form-group">
        <!-- <input type="text" class="form-control input-lg" id="role" name="role" value="<?php //echo $role; ?>"/> -->
        <select name="role">
            <?php $options = array('user', 'admin', 'leader'); ?>
            <?php foreach ($options as $key) {
                if($role === $key)
                    echo '<option value="'.$key.'" selected="selected">'.$key.'</option>';
                else
                {
                    echo '<option value="'.$key.'">'.$key.'</option>';
                }
            }?>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" value="Change" class="btn btn-primary btn-lg btn-block">Edit User</button>
    </div>
</form>
    <form action="<?php echo base_url()?>index.php/home">
        <button type="submit" value="Home" class="btn btn-primary btn-lg btn-block">Cancel</button>
    </form>

</div>

</body>
</html>