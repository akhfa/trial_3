<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Sukses
    <?php if($jenis === 'addgroup')
            echo "Menambahkan group";
    ?>

    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="<?php echo base_url()?>/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Sukses 
    <?php if($jenis === 'addgroup')
            echo "Menambahkan group";
    ?>
    </h1>
</div>
    
    <div>
        <form action="home">
            <button type="submit" value="Login" class="btn btn-primary btn-lg btn-block">Home</button>
        </form>
    </div>
</form>

</div>

</body>
</html>