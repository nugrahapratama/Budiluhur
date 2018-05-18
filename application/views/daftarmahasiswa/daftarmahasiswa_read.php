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
        <h2 style="margin-top:0px">Daftarmahasiswa Read</h2>
        <table class="table">
	    <tr><td>Nomor</td><td><?php echo $Nomor; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $Nama; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $Alamat; ?></td></tr>
	    <tr><td>TanggalLahir</td><td><?php echo $TanggalLahir; ?></td></tr>
	    <tr><td>KotaKelahiran</td><td><?php echo $KotaKelahiran; ?></td></tr>
	    <tr><td>JenisKelamin</td><td><?php echo $JenisKelamin; ?></td></tr>
	    <tr><td>Agama</td><td><?php echo $Agama; ?></td></tr>
	    <tr><td>Kebangsaan</td><td><?php echo $Kebangsaan; ?></td></tr>
	    <tr><td>GolonganDarah</td><td><?php echo $GolonganDarah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('daftarmahasiswa') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>