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
        <h2 style="margin-top:0px">Pelanggan Read</h2>
        <table class="table">
	    <tr><td>Nm Pelanggan</td><td><?php echo $nm_pelanggan; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Alamat Pelanggan</td><td><?php echo $alamat_pelanggan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pelanggan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>