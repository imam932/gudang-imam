<?php
include "tcpdf/tcpdf.php";

include("../../model/Model_report.php");

$rep_barang = new Model_report("localhost","root", "", "gudang");

        $sql = $rep_barang->mysqli->query("
            SELECT * FROM report as re
            inner join user as us
            on re.id_user = us.id_user
            inner join barang brg
            on re.id_barang = brg.id_barang
            order by id_report asc
            ");

$file = new TCPDF('L','mm','Legal');

$file->SetCreator(PDF_CREATOR);
$file->SetAuthor('Imam Nawawi');
$file->SetTitle('Laporan Data Pengambilan Barang');
$file->SetSubject('Inventory');
$file->SetKeywords('laporan, inventory, gudang');

$file->AddPage();

$file->SetFont("times", "", 12);
$file->SetFont("times", "B", 32);
$file->Cell(0,0,"PT. Meitan-X Technology",0,1,"C");

//$file->Cell(0,0,"DIPLOMA IPB",0,1,"C");
$file->SetFont("times", "", 12);

$html = '<h1>Data Pengambilan Barang</h1><u>Lampiran :</u> 1 Berkas<br><hr>&nbsp;<br><br>';
$html .= '<table border="2" cellpadding="0">
    <tr>
        <th align = "center " width = "30" bgcolor="#CCCCCC">No</th>
        <th align = "center " width = "100" bgcolor="#CCCCCC">ID Laporan</th>
        <th align = "center " width = "100" bgcolor="#CCCCCC">Keperluan</th>
        <th align = "center " width = "100" bgcolor="#CCCCCC">Nama Pengambil</th>
        <th align = "center " width = "100" bgcolor="#CCCCCC">Nama Barang</th>
        <th align = "center " width = "100" bgcolor="#CCCCCC">Jumlah</th>
        <th align = "center " width = "100" bgcolor="#CCCCCC">Tanggal</th>
        <th align = "center " width = "70" bgcolor="#CCCCCC">Keterangam</th>
    
    </tr>
    ';

$no = 1;
    while($data = $sql->fetch_array()) {
                
        $html .= '
    <tr>
        <td> '.$no.'</td>
        <td align="center">'.$data['id_report'].'</td>
        <td align="center">'.$data['nama_report'].'</td>
        <td align="center">'.$data['nama_user'].'</td>
        <td align="center">'.$data['nama_barang'].'</td>
        <td align="center">'.$data['jumlah'].'</td>
        <td align="center">'.$data['tgl_report'].'</td>
        <td align="center">'.$data['isi_report'].'</td>                

        
    </tr>';
        $no++;
    }

$html .= '</table><br><br><br>Malang, '.date('d-m-Y').'<br>
<b>Administrator Gudang</b><br><br><br><br>
<u>Imam Nawawi</u>';

$file->writeHTML($html);

$file->Output("Laporan Pengambilan Barang.pdf","I");


?>