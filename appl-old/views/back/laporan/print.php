<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>
    <b><?php echo $ket; ?></b><br /><br />
    
	<table border="1" cellpadding="8">
	<tr>
		<th>TGL RIPH</th>
        <th>Nama Perusahaan</th>
        <th>Nama Kontak</th>
        <th>Telp Kontak</th>
        <th>Telp Perusahaan</th>
		<th>Volume Pengajuan</th>
		<th>Kewajiban Tanam</th>
		<th>Kewajiban Produksi</th>
		<th>Realisasi Tanam</th>
		<th>Jumlah Produksi</th>
	</tr>

    <?php
    if( ! empty($transaksi)){
    	$no = 1;
    	foreach($transaksi as $data){
            $tgl = date('d-m-Y', strtotime($data->tgl_awal_riph));
            
    		echo "<tr>";
    		echo "<td>".$tgl."</td>";
    		echo "<td>".$data->nama_perusahaan."</td>";
    		echo "<td>".$data->nama_kontak."</td>";
    		echo "<td>".$data->hp_kontak."</td>";
    		echo "<td>".$data->telp_perusahaan."</td>";
			echo "<td>".$data->volume."</td>";
			echo "<td>".$data->kewajiban_tanam."</td>";
			echo "<td>".$data->kewajiban_produksi."</td>";
			echo "<td>".$data->luas_tanam."</td>";
			echo "<td>".$data->jmlproduksi."</td>";
    		echo "</tr>";
    		$no++;
    	}
    }
    ?>
	</table>
</body>
</html>
