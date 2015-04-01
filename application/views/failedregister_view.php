<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Failed Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="<?php echo base_url()?>/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Register</h1>
</div>
    <?php echo '<h1> Register Failed<h1>' ?>
    <div>
        <form action="register">
            <button type="submit" value="Register" class="btn btn-primary btn-lg btn-block">Register</button>
        </form>
        <br>
        <form action="home">
            <button type="submit" value="Home" class="btn btn-primary btn-lg btn-block">Cancel</button>
        </form>
    </div>
</form>

</div>

</body>
</html>