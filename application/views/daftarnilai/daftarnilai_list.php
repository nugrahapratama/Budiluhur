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
        <h2 style="margin-top:0px">Daftarnilai List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('daftarnilai/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('daftarnilai/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('daftarnilai'); ?>" class="btn btn-default">Reset</a>
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
		<th>ProgramStudi</th>
		<th>Fakultas</th>
		<th>TahunAjaran</th>
		<th>Alamat</th>
		<th>TanggalUjian</th>
		<th>Nilai</th>
		<th>MataKuliah</th>
		<th>Action</th>
            </tr><?php
            foreach ($daftarnilai_data as $daftarnilai)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $daftarnilai->Nomor ?></td>
			<td><?php echo $daftarnilai->Nama ?></td>
			<td><?php echo $daftarnilai->ProgramStudi ?></td>
			<td><?php echo $daftarnilai->Fakultas ?></td>
			<td><?php echo $daftarnilai->TahunAjaran ?></td>
			<td><?php echo $daftarnilai->Alamat ?></td>
			<td><?php echo $daftarnilai->TanggalUjian ?></td>
			<td><?php echo $daftarnilai->Nilai ?></td>
			<td><?php echo $daftarnilai->MataKuliah ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('daftarnilai/read/'.$daftarnilai->NIM),'Read'); 
				echo ' | '; 
				echo anchor(site_url('daftarnilai/update/'.$daftarnilai->NIM),'Update'); 
				echo ' | '; 
				echo anchor(site_url('daftarnilai/delete/'.$daftarnilai->NIM),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('daftarnilai/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>