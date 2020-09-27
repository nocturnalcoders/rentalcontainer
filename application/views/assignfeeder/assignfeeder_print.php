<?php
	$detail = "";
	foreach ($detailRow as $key => $value) {
		$detail .= $value['contqtyasg']."x".$value['contsize']."'".$value['conttype'].",";
	}
	$detail = rtrim($detail, ",");
	$content = "
	<html> 
	<body>
		<img src='".base_url()."/assets/img/logo3.png' alt='logo'>
		<br><br>
		<table style='font-size:20px;'>
			<tr>
				<th>Auth Ref.</th><th>:</th><th>".$row->releasenumber."</th>
			</tr>
			<tr>
				<th>Date.</th><th>:</th><th>".date('F jS,  Y', strtotime($row->releasedate))."</th>
			</tr>
			<tr>
				<th>Expire Date.</th><th>:</th><th>".date('F jS,  Y', strtotime($row->expiredate))."</th>
			</tr>
		</table>
		<br>

		<table>
			<tr style='font-size:17px;'>
				<th>To</th><th>:</th><th style='padding-left:20px;'>PT. GLOBAL TERMINAL MARUNDA</th>
			</tr>
			<tr>
				<th></th>
				<th></th>
				<td style='padding-left:20px;'>
					JL. Ujung pandang Blok-2<br>
					KBN Marunda - Tanjung Priok, Jakarta Utara
				</td>
			</tr>
			<tr style='font-size:17px;'>
				<th>CC</th><th>:</th><th style='padding-left:20px;'>SPIL</th>
			</tr>
			<tr>
				<th></th>
				<th></th>
				<td style='padding-left:20px;'>
					Fax 021.4355082 / TELP 021.4355081
				</td>
			</tr>
		</table>
		<br>

		<h1 align='center'><u>EMPTY CONTAINER RELEASE ORDER</u></h1>
		<p style='font-size:15px;'>Please release empty COSCO container for repositioning purpose with deal as follows</p>
		<br>

		<table style='font-size:17px;'>
			<tr>
				<th style='padding-left:55px;'>
					QTY(s) - SZ/TP
				</th>
				<th>:</th>
				<th>".$detail."</th>
			</tr>
			<tr>
				<th style='padding-left:55px;'>
					COSCO Vendor
				</th>
				<th>:</th>
				<th>
					".$row->vesselname."
				</th>
			</tr>
			<tr>
				<th style='padding-left:55px;'>
					ITM Transportation
				</th>
				<th>:</th>
				<th>
					Trucking & Feeder
				</th>
			</tr>
			<tr>
				<th style='padding-left:55px;'>
					Feeder / Voyage
				</th>
				<th>:</th>
				<th>
					".$row->voyage."
				</th>
			</tr>
			<tr>
				<th style='padding-left:55px;'>
					ETD Jakarta
				</th>
				<th>:</th>
				<th>
					".date('F jS,  Y', strtotime($row->etd))."
				</th>
			</tr>
			<tr>
				<th style='padding-left:55px;'>
					Destination
				</th>
				<th>:</th>
				<th>
					".$row->destination."
				</th>
			</tr>
			<tr>
				<th style='padding-left:55px;'>
					Remarks
				</th>
				<th>:</th>
				<th>
					".substr($row->remarks, 0, 30) .". . .
				</th>
			</tr>
		</table>

	</body>
	</html>
	";
	//remaks 50


	require __DIR__.'/../../../assets/html2pdf/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	$html2pdf = new Html2Pdf('P','A4','fr', true, 'UTF-8', array(30, 10, 30, 30), false); 
	$html2pdf->writeHTML($content);
	$html2pdf->output('example.pdf');
?>