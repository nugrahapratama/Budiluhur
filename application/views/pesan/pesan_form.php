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
        <h2 style="margin-top:0px">Pesan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Pelanggan <?php echo form_error('id_pelanggan') ?></label>
            <input type="text" class="form-control" name="id_pelanggan" id="id_pelanggan" placeholder="Id Pelanggan" value="<?php echo $id_pelanggan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Pesan <?php echo form_error('tgl_pesan') ?></label>
            <input type="text" class="form-control" name="tgl_pesan" id="tgl_pesan" placeholder="Tgl Pesan" value="<?php echo $tgl_pesan; ?>" />
        </div>
	    <input type="hidden" name="id_pesan" value="<?php echo $id_pesan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pesan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>