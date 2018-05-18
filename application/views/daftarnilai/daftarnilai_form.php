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
        <h2 style="margin-top:0px">Daftarnilai <?php echo $button ?></h2>
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
            <label for="varchar">ProgramStudi <?php echo form_error('ProgramStudi') ?></label>
            <input type="text" class="form-control" name="ProgramStudi" id="ProgramStudi" placeholder="ProgramStudi" value="<?php echo $ProgramStudi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Fakultas <?php echo form_error('Fakultas') ?></label>
            <input type="text" class="form-control" name="Fakultas" id="Fakultas" placeholder="Fakultas" value="<?php echo $Fakultas; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">TahunAjaran <?php echo form_error('TahunAjaran') ?></label>
            <input type="text" class="form-control" name="TahunAjaran" id="TahunAjaran" placeholder="TahunAjaran" value="<?php echo $TahunAjaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('Alamat') ?></label>
            <input type="text" class="form-control" name="Alamat" id="Alamat" placeholder="Alamat" value="<?php echo $Alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">TanggalUjian <?php echo form_error('TanggalUjian') ?></label>
            <input type="text" class="form-control" name="TanggalUjian" id="TanggalUjian" placeholder="TanggalUjian" value="<?php echo $TanggalUjian; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Nilai <?php echo form_error('Nilai') ?></label>
            <input type="text" class="form-control" name="Nilai" id="Nilai" placeholder="Nilai" value="<?php echo $Nilai; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">MataKuliah <?php echo form_error('MataKuliah') ?></label>
            <input type="text" class="form-control" name="MataKuliah" id="MataKuliah" placeholder="MataKuliah" value="<?php echo $MataKuliah; ?>" />
        </div>
	    <input type="hidden" name="NIM" value="<?php echo $NIM; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('daftarnilai') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>