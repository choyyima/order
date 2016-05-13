<?php

$body_mail = "<h3>Dear Purchasing</h3>\r\n 
	Pada tanggal , jam \r\n 
	. Telah menerima laporan dari $jabatan bernama $nama, no. telp $no_tlp\r\n
	. Pada proyek $proyek, no. order $no_order. Ada komplain sebagai berikut:";
$body_mail .= "<html><body><p>Halo <i>dunia</i>, ini email <br>HTML lho.</p></body></html>";
$headers = "From: support\r\n";
$headers .= "Reply-to:orderkantor.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$mail_sent = @mail("it-support@aryana.co.id", "Judul TEST", $body_mail, $headers);
echo $mail_sent ? "Terkirim" : "
Gagal";
?>