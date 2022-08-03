<div class="list-group" class="date">
	<?php
		$tgl=date('d-m-Y');
		$bln=date('mm');
		$thn=date('Y');
		$tgls=date('d');
		$day = date('D', strtotime($tgl));
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);
		$bulan = array(
			'01' => 'JANUARI',
			'02' => 'FEBRUARI',
			'03' => 'MARET',
			'04' => 'APRIL',
			'05' => 'MEI',
			'06' => 'JUNI',
			'07' => 'JULI',
			'08' => 'AGUSTUS',
			'09' => 'SEPTEMBER',
			'10' => 'OKTOBER',
			'11' => 'NOVEMBER',
			'12' => 'DESEMBER',
		);
	?>
    <div class="list-group-item subheader">TODAY</div>
    <div class="list-group-item two-line">
        <div class="text-muted">
			<div class="h1"> <?php echo $dayList[$day]?></div>
				<div class="h2 row no-gutters align-items-start">
                    <span> <?php echo $tgls ?></span>
                    <span class="h6">th</span>
                    <span> <?php echo $bulan[date('m')] ?></span>
                </div>
        </div>
    </div>
</div>
<div class="divider"></div>
<div class="list-group">
	<div class="list-group-item subheader">Kegiatan Ujicoba</div>
	<div class="list-group-item two-line">
		<div class="list-item-content">
            <h3>Kegiatan Ujicoba</h3>
            <p>Seluruh Importir</p>
        </div>
    </div>
	<div class="list-group-item two-line">
		<div class="list-item-content">
            <h3>Ujicoba Terakhir</h3>
            <p>Tanggal 21 Okt 2020 Jam 23.00 AM</p>
        </div>
    </div>
	<div class="list-group-item two-line">
		<div class="list-item-content">
			<h3>Penghapusan Datan Ujicoba</h3>
			<p>Tanggal 21 Okt 2020 Jam 23.59 AM</p>
        </div>
    </div>
</div>
<div class="divider"></div>
<div class="list-group">
	<div class="list-group-item subheader">Entry Data</div>
	<div class="list-group-item two-line">
		<div class="list-item-content">
            <h3>Entry Data Real Importir</h3>
            <p>Mulai: 22 Okt 2020, Jam 08.00 AM</p>
        </div>
    </div>
</div>