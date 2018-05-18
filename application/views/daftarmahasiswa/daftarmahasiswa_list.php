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
        <h2 style="margin-top:0px">Daftarmahasiswa List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('daftarmahasiswa/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('daftarmahasiswa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('daftarmahasiswa'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nomor</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>TanggalLahir</th>
		<th>KotaKelahiran</th>
		<th>JenisKelamin</th>
		<th>Agama</th>
		<th>Kebangsaan</th>
		<th>GolonganDarah</th>
		<th>Action</th>
            </tr><?php
            foreach ($daftarmahasiswa_data as $daftarmahasiswa)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $daftarmahasiswa->Nomor ?></td>
			<td><?php echo $daftarmahasiswa->Nama ?></td>
			<td><?php echo $daftarmahasiswa->Alamat ?></td>
			<td><?php echo $daftarmahasiswa->TanggalLahir ?></td>
			<td><?php echo $daftarmahasiswa->KotaKelahiran ?></td>
			<td><?php echo $daftarmahasiswa->JenisKelamin ?></td>
			<td><?php echo $daftarmahasiswa->Agama ?></td>
			<td><?php echo $daftarmahasiswa->Kebangsaan ?></td>
			<td><?php echo $daftarmahasiswa->GolonganDarah ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('daftarmahasiswa/read/'.$daftarmahasiswa->NIM),'Read'); 
				echo ' | '; 
				echo anchor(site_url('daftarmahasiswa/update/'.$daftarmahasiswa->NIM),'Update'); 
				echo ' | '; 
				echo anchor(site_url('daftarmahasiswa/delete/'.$daftarmahasiswa->NIM),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('daftarmahasiswa/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>