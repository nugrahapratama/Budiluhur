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
        <h2 style="margin-top:0px">Daftarnilai Read</h2>
        <table class="table">
	    <tr><td>Nomor</td><td><?php echo $Nomor; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $Nama; ?></td></tr>
	    <tr><td>ProgramStudi</td><td><?php echo $ProgramStudi; ?></td></tr>
	    <tr><td>Fakultas</td><td><?php echo $Fakultas; ?></td></tr>
	    <tr><td>TahunAjaran</td><td><?php echo $TahunAjaran; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $Alamat; ?></td></tr>
	    <tr><td>TanggalUjian</td><td><?php echo $TanggalUjian; ?></td></tr>
	    <tr><td>Nilai</td><td><?php echo $Nilai; ?></td></tr>
	    <tr><td>MataKuliah</td><td><?php echo $MataKuliah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('daftarnilai') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>