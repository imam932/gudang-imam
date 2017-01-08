<?php
include "tcpdf/tcpdf.php";

include("../../model/Model_penampungan.php");

$brg_masuk = new Model_penampungan("localhost","root", "", "gudang");

        $sql = $brg_masuk->mysqli->query("
            SELECT * FROM penampungan as pe
            inner join supplier as su
            on pe.id_supplier = su.id_supplier
            inner join barang brg
            on pe.id_barang = brg.id_barang
            order by id_penampungan asc
            ");

$file = new TCPDF('L','mm','Legal');

$file->SetCreator(PDF_CREATOR);
$file->SetAuthor('Imam Nawawi');
$file->SetTitle('Laporan Data Barang Masuk');
$file->SetSubject('Inventory');
$file->SetKeywords('laporan, inventory, gudang');

$file->AddPage();

$file->SetFont("times", "", 12);
$file->SetFont("times", "B", 32);
$file->Cell(0,0,"PT. Meitan-X Technology",0,1,"C");

//$file->Cell(0,0,"DIPLOMA IPB",0,1,"C");
$file->SetFont("times", "", 12);

$html = '<h1>Data Barang Masuk</h1><u>Lampiran :</u> 1 Berkas<br><hr>&nbsp;<br><br>';
$html .= '<table border="2" cellpadding="0">
    <tr>
        <th align = "center " width = "30" bgcolor="#CCCCCC">No</th>
        <th align = "center " width = "100" bgcolor="#CCCCCC">ID Penampungan</th>
        <th align = "center " width = "100" bgcolor="#CCCCCC">Supplier</th>
        <th align = "center " width = "100" bgcolor="#CCCCCC">Jumlah Unit</th>
        <th align = "center " width = "100" bgcolor="#CCCCCC">Tanggal Masuk</th>
        <th align = "center " width = "100" bgcolor="#CCCCCC">Nama Barang</th>
        <th align = "center " width = "100" bgcolor="#CCCCCC">Status</th>
    
    </tr>
    ';

$no = 1;
    while($data = $sql->fetch_array()) {
                
        $html .= '
    <tr>
        <td> '.$no.'</td>
        <td align="center">'.$data['id_penampungan'].'</td>
        <td align="center">'.$data['nama_supplier'].'</td>
        <td align="center">'.$data['jumlah_unit'].'</td>
        <td align="center">'.$data['tgl_masuk'].'</td>
        <td align="center">'.$data['nama_barang'].'</td>
        <td align="center">'.$data[5].'</td>
        
    </tr>';
        $no++;
    }

$html .= '</table><br><br><br>Malang, '.date('d-m-Y').'<br>
<b>Administrator Gudang</b><br><br><br><br>
<u>Imam Nawawi</u>';

$file->writeHTML($html);

$file->Output("Laporan Barang Masuk.pdf","I");


?>