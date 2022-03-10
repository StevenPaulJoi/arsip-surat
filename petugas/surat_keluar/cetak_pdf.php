<?php
include"../../koneksi.php";
function cekdata($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php
include "../../FPDF/fpdf.php";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('../../img/surat.JPG',10,10);
$pdf->Ln(55);

$pdf->SetFont('Arial','B',7);
$pdf->setTitle('Cetak Data Surat');
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(25,6,'No Agenda',1,0,'C');
$pdf->Cell(25,6,'Tanggal Kirim',1,0,'C');
$pdf->Cell(40,6,'Nomor Surat',1,0,'C');
$pdf->Cell(22,6,'Pengirim',1,0,'C');
$pdf->Cell(22,6,'Jenis Surat',1,0,'C');
$pdf->Cell(45,6,'Perihal',1,0,'C');
$pdf->Ln(0);
$no = 0;
if(isset($_POST['print_keluar'])) {
    $dr_tgl = date('Y-m-d', strtotime(cekdata($_POST['dari'])));
    $smp_tgl = date('Y-m-d', strtotime(cekdata($_POST['sampai'])));

    $query = mysqli_query($conn, "SELECT * FROM q_keluar WHERE tgl_kirim BETWEEN '$dr_tgl' AND '$smp_tgl' ORDER BY no_agenda_keluar ASC");
    $jml   = mysqli_num_rows($query);
    while ($data = mysqli_fetch_array($query)) {
        $no++;
        $pdf->Ln(0);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(8, 6, $no . ".", 1, 0, 'C');
        $pdf->Cell(25, 6, $data['no_agenda_keluar'], 1, 0, 'C');
        $pdf->Cell(25, 6, $data['tanggal_kirim'], 1, 0, 'C');
        $pdf->Cell(40, 6, $data['no_surat'], 1, 0, 'C');
        $pdf->Cell(22, 6, $data['pengirim'], 1, 0, 'C');
        $pdf->Cell(22, 6, $data['jenis_surat'], 1, 0, 'C');
        $pdf->Cell(45, 6, $data['perihal'], 1, 0, 'C');
    }
}else{
    $query = mysqli_query($conn, "SELECT * FROM q_keluar ORDER BY no_agenda_keluar ASC ");
    $jml   = mysqli_num_rows($query);
    while ($data = mysqli_fetch_array($query)) {
        $no++;
        $pdf->Ln(6);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(8, 6, $no . ".", 1, 0, 'C');
        $pdf->Cell(25, 6, $data['no_agenda_keluar'], 1, 0, 'C');
        $pdf->Cell(25, 6, $data['tanggal_kirim'], 1, 0, 'C');
        $pdf->Cell(40, 6, $data['no_surat'], 1, 0, 'C');
        $pdf->Cell(22, 6, $data['pengirim'], 1, 0, 'C');
        $pdf->Cell(22, 6, $data['jenis_surat'], 1, 0, 'C');
        $pdf->Cell(45, 6, $data['perihal'], 1, 0, 'C');
    }
    $pdf->Output();
}
?>