<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Pelanggan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nm Pelanggan <?php echo form_error('nm_pelanggan') ?></label>
            <input type="text" class="form-control" name="nm_pelanggan" id="nm_pelanggan" placeholder="Nm Pelanggan" value="<?php echo $nm_pelanggan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Pelanggan <?php echo form_error('alamat_pelanggan') ?></label>
            <input type="text" class="form-control" name="alamat_pelanggan" id="alamat_pelanggan" placeholder="Alamat Pelanggan" value="<?php echo $alamat_pelanggan; ?>" />
        </div>
	    <input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pelanggan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>