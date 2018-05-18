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
        <h2 style="margin-top:0px">Daftarmahasiswa <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Nomor <?php echo form_error('Nomor') ?></label>
            <input type="text" class="form-control" name="Nomor" id="Nomor" placeholder="Nomor" value="<?php echo $Nomor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('Nama') ?></label>
            <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama" value="<?php echo $Nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('Alamat') ?></label>
            <input type="text" class="form-control" name="Alamat" id="Alamat" placeholder="Alamat" value="<?php echo $Alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">TanggalLahir <?php echo form_error('TanggalLahir') ?></label>
            <input type="text" class="form-control" name="TanggalLahir" id="TanggalLahir" placeholder="TanggalLahir" value="<?php echo $TanggalLahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">KotaKelahiran <?php echo form_error('KotaKelahiran') ?></label>
            <input type="text" class="form-control" name="KotaKelahiran" id="KotaKelahiran" placeholder="KotaKelahiran" value="<?php echo $KotaKelahiran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">JenisKelamin <?php echo form_error('JenisKelamin') ?></label>
            <input type="text" class="form-control" name="JenisKelamin" id="JenisKelamin" placeholder="JenisKelamin" value="<?php echo $JenisKelamin; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Agama <?php echo form_error('Agama') ?></label>
            <input type="text" class="form-control" name="Agama" id="Agama" placeholder="Agama" value="<?php echo $Agama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kebangsaan <?php echo form_error('Kebangsaan') ?></label>
            <input type="text" class="form-control" name="Kebangsaan" id="Kebangsaan" placeholder="Kebangsaan" value="<?php echo $Kebangsaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">GolonganDarah <?php echo form_error('GolonganDarah') ?></label>
            <input type="text" class="form-control" name="GolonganDarah" id="GolonganDarah" placeholder="GolonganDarah" value="<?php echo $GolonganDarah; ?>" />
        </div>
	    <input type="hidden" name="NIM" value="<?php echo $NIM; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('daftarmahasiswa') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>