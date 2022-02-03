<?php
include 'backend/cek.php';
require 'backend/koneksi.php';

$pelatihan = $_POST['pelatihan1'];
?>
<link rel="stylesheet" type="text/css" href="../style.css">
<h3>DATA PENDAFTAR PELATIHAN DAN PRODUKTIVITAS KERJA</h3></div>
<div id="content">
<table border="1" id="tabel-tampil">
		<tr>
			<th id="label-tampil-no">No</th>
            <th>Register</th>
            <th>Posisi</th>
			<th>NIK</th>
            <th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
         	<th>Status Penerimaan</th>
		</tr>
		<?php
		
		if(isset($_POST['cetak_pdf'])){		
		$nomor=1;
		$query="SELECT * FROM registrant left join job on registrant.idjob = job.id where idjob = ".$pelatihan." ORDER BY idjob DESC";
		$q_tampil_pendaftar = mysqli_query($conn, $query);
		if(mysqli_num_rows($q_tampil_pendaftar)>0)
		{
		while($r_tampil_pendaftar=mysqli_fetch_array($q_tampil_pendaftar)){
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $r_tampil_pendaftar['idreg']; ?></td>
			<td><?php echo $r_tampil_pendaftar['jobname']; ?></td>
			<td><?php echo $r_tampil_pendaftar['nik']; ?></td>
			<td><?php echo $r_tampil_pendaftar['name']; ?></td>
			<td><?php echo $r_tampil_pendaftar['gender']; ?></td>
			<td><?php echo $r_tampil_pendaftar['alamat']; ?></td>
			<td><?php echo $r_tampil_pendaftar['status']; ?></td>		
		</tr>		
		<?php $nomor++; } 
		}
	};?>		
	</table>
	<script>
		window.print();
	</script>
</div>