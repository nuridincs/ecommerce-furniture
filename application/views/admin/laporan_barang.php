<?PHP
	date_default_timezone_set("Asia/Jakarta");


	$pdf = new FPDF('L', 'pt', 'A4');
	$pdf -> SetTitle('Laporan rekapitulasi barang');
	$pdf -> AliasNbPages();
	$pdf -> SetTopMargin(30);
	$pdf -> SetLeftMargin(20);
	$pdf -> SetRightMargin(20);
	$pdf -> SetAutoPageBreak(true, 50);

	$pdf ->AddPage();
	$pdf ->SetFont('Times','B',20);
	$pdf ->Cell(350);
	$pdf ->Cell(500,10,'XYZ Furniture',0,0,'L');
	$pdf ->Ln(14);
	$pdf ->Cell(360);
	$pdf ->SetFont('Times','I',12);
	$pdf ->Cell(500,12,'Bekasi',0,0,'L');
	$pdf ->SetLineWidth(1);
	$pdf ->Line(20,77,820,77);
	$pdf ->SetLineWidth(1,5);
	$pdf ->Line(20,79,820,79);
	$pdf ->SetLineWidth(1,5);
	$pdf ->Line(20,79,820,79);
	$pdf ->SetY(110);
	$pdf ->SetFont('Times', 'BUI',16);
	$pdf ->Cell(0,10,'Laporan Rekapitulasi Barang',0,0,'C');
	$pdf ->Ln(25);
	$pdf ->SetX(120);
	$pdf ->SetFont('Times','B',10);
	$pdf ->SetLineWidth(1,5);
	$pdf ->SetFillColor(252,255,189);
	$pdf ->Cell(20,40,"No",1,"LR","C", true);
	$pdf ->Cell(90,40,"Gambar",1,"LR","C", true);
	$pdf ->Cell(90,40,"Kode Barang",1,"LR","C", true);
	$pdf ->Cell(150,40,"Nama Barang",1,"LR","C", true);
	$pdf ->Cell(90,40,"Jenis Barang",1,"LR","C", true);
	$pdf ->Cell(90,40,"Stok Barang",1,"LR","C", true);
	$pdf ->Cell(90,40,"Harga Barang",1,"LR","C", true);
	$pdf ->Ln();
	if(!empty($laporan)){
		$no = 0;
		$nilaiY =$pdf->GetY();
		foreach($laporan as $key){
			$no ++;
			$pdf ->SetX(120);
			$pdf ->Cell(20,40,$no,1,"LR","C");
			$pdf ->Image(base_url('assets/admin/gambar').'/'.$key->gambar_barang,158,$nilaiY,35);
			$pdf ->Cell(90,40,"",1,"LR","C");
			$pdf ->Cell(90,40,$key->kd_barang,1,"LR","C");
			$pdf ->Cell(150,40,$key->nama_barang,1,"LR","C");
			$pdf ->Cell(90,40,$key->jenis_barang,1,"LR","C");
			$pdf ->Cell(90,40,$key->stok_barang,1,"LR","C");
			$pdf ->Cell(90,40,$key->harga_barang,1,"LR","C");
			$pdf->Ln();
			$nilaiY = $pdf->GetY();
		}
	}

	$pdf ->Output('Rekap-Barang-'.date('dFY').'.pdf','I');
	
?>