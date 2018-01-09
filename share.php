<?php
include "phpqrcode/qrlib.php"; //<-- LOKASI FILE UTAMA PLUGINNYA

$tempdir = "temp/"; //<-- Nama Folder file QR Code kita nantinya akan disimpan
if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
mkdir($tempdir);

#parameter inputan
    $isi_teks = "http://192.168.0.4/survey_web/index?" . $_GET['share'];
    $namafile = "share.png";
    $quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
    $ukuran = 10; //batasan 1 paling kecil, 10 paling besar
    $padding = 0;
    QRCode::png($isi_teks, $tempdir . $namafile, $quality, $ukuran, $padding);





function get_current_url($s, $use_forwarded_host = false)
{
    $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true : false;
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $s['SERVER_PORT'];
    $port = ((!$ssl && $port == '80') || ($ssl && $port == '443')) ? '' : ':' . $port;
    $host = ($use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST'])) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
    return $protocol . '://' . $host . $s['REQUEST_URI'];
}
 
 
// $isi_teks = get_current_url($_SERVER); //inputan fungsi tadi itu cuma $_SERVER aja
// $namafile = "url_saat_ini.png";
// $quality = 'H';
// $ukuran = 4;
// $padding = 2;
 
// QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
?>

    <style>
        .container-share {
            margin: auto;
            width: 400px;
            height: 400px;
            margin-top: 100px;
            /* box-shadow: 0 0 0 99999px rgba(0, 0, 0, 0.7); */
        }

        a{
            /* margin: auto; */
            font-size: 40px;
            text-decoration: none;
            font-weight: bold;
            color: black;
            left: 100px;
            margin: 70px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
        }
    </style>
    <div class="container-share">
        <!-- <button class="show-modal open-modal">Open Modal</button> -->
        <img class="close-modal" src="temp/share.png">
        <a href="surveys"><= back =></a>
    </div>

    <!-- <script src="js/jquery-3.2.1.min.js"></script> -->