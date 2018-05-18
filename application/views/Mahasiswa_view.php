<?php

if($mhs) {
	echo "<h1>List mahasiswa</h1>";
	echo "<table border='1' cellpadding='5' cellspacing='0'>";
	echo "<tr>
			<th>No.</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Action</th>
		  </tr>";
	$no = 1;
	foreach($mhs as $content) {
		echo "<tr>
				<td>$no.</td>
				<td>$content[0].</td>
				<td>$content[1].</td>
				<td>$content[2].</td>
				<td>".
				anchor('mahasiswa/delete/'.$content[0], 'Delete', 'title="Delete data"'). " | " .
				anchor('mahasiswa/form_update/'.$content[0], 'Update', 'title="Update data"') .
				"</td>
				</tr>";
			$no++;
	}
	echo "</table>";
	echo anchor('mahasiswa/form_tambah/', 'Tambah', 'title="Tambah data"');
}

?>
