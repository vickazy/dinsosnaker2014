<?php
    session_start();
    include("koneksi.php");
    mysql_query("DELETE FROM tbl_file_pengaduan_pesan_saran WHERE id_file = '" . $_GET["id"] . "'");
    header("location:../?mod=pps&tipe_pps=" . $_GET["tipe_pps"]);
?>