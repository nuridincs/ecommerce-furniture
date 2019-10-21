<?PHP
	date_default_timezone_set("Asia/Jakarta");


	$pdf = new FPDF('L', 'pt', 'A4');
	$pdf -> SetTitle('Laporan rekapitulasi Periode');
	$pdf -> AliasNbPages();
	$pdf -> SetTopMargin(30);
	$pdf -> SetLeftMargin(20);
	$pdf -> SetRightMargin(20);
	$pdf -> SetAutoPageBreak(true, 50);

	$pdf ->AddPage();
	$pdf ->SetFont('Times','B',16);
	$pdf ->Cell(70);
	$pdf ->Cell(500,10,'XYZ Furniture',0,0,'L');
	$pdf ->Ln(14);
	$pdf ->Cell(70);
	$pdf ->SetFont('Times','I',9);
	$pdf ->Cell(500,10,'Bekasi',0,0,'L');
	$pdf ->SetLineWidth(1);
	$pdf ->Line(20,77,820,77);
	$pdf ->SetLineWidth(1,5);
	$pdf ->Line(20,79,820,79);
	$pdf ->SetLineWidth(1,5);
	$pdf ->Line(20,79,820,79);
	$pdf ->SetY(110);
	$pdf ->SetFont('Times', 'BUI',16);
	$pdf ->Cell(0,10,'Laporan Rekapitulasi Periode bulan ',0,0,'C');
	$pdf ->Ln(25);
	$pdf ->SetX(10);
	$pdf ->SetFont('Times','B',10);
	$pdf ->SetLineWidth(1,5);
	$pdf ->SetFillColor(252,255,189);
	$pdf ->Cell(20,40,"No",1,"LR","C", true);
	$pdf ->Cell(60,40,"Gambar",1,"LR","C", true);
	$pdf ->Cell(90,40,"Kode",1,"LR","C", true);
	$pdf ->Cell(90,40,"Tgl Beli",1,"LR","C", true);
	$pdf ->Cell(90,40,"Nama",1,"LR","C", true);
	$pdf ->Cell(90,40,"No Hp",1,"LR","C", true);
	$pdf ->Cell(90,40,"Alamat",1,"LR","C", true);
	$pdf ->Cell(90,40,"Atas Nama",1,"LR","C", true);
	$pdf ->Cell(90,40,"Konfirmasi",1,"LR","C", true);
	$pdf ->Cell(90,40,"Bayar",1,"LR","C", true);
	$pdf ->Ln();
	if(!empty($laporan)){
		$no = 0;
		$nilaiY =$pdf->GetY();
		foreach($laporan as $key){
			$no ++;
			$pdf ->SetX(10);
			$pdf ->Cell(20,40,$no,1,"LR","C");
			$pdf ->Image(base_url('assets/admin/gambar').'/'.$key->gambar_barang,40,$nilaiY,35);
			$pdf ->Cell(60,40,"",1,"LR","C");
			$pdf ->Cell(90,40,$key->kd_transaksi,1,"LR","C");
			$pdf ->Cell(90,40,$key->tgl_beli,1,"LR","C");
			$pdf ->Cell(90,40,$key->nama_pelanggan,1,"LR","C");
			$pdf ->Cell(90,40,$key->no_hp,1,"LR","C");
			$pdf ->Cell(90,40,$key->alamat_kirim,1,"LR","C");
			$pdf ->Cell(90,40,$key->atas_nama,1,"LR","C");
			$pdf ->Cell(90,40,$key->status_konfirmasi,1,"LR","C");
			$pdf ->Cell(90,40,$key->status_bayar,1,"LR","C");
			$pdf->Ln();
			$nilaiY = $pdf->GetY();
		}
	}

	$pdf ->Output('Rekap-Pelanggan-'.date('dFY').'.pdf','I');
	
	
?>