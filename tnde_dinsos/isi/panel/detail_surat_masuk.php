<script type="text/javascript">
$(document).ready(function(){
    $("#tgl_surat").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true
    });
    $("#tgl_terima").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true
    });
    $("#harus_selesai").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true
    });
});
</script>
<table width="1024" border="0" cellspacing="2" cellpadding="5">
      <tr> 
      <!-- Header -->
        <td >
        	<div id='header' style='background:url(./image/coba/header2.png) no-repeat;'>
              <table border="0" id='atasan'>
                        <tr>
                                <td colspan='2' style="text-align:right; padding-right:10px;">
                                <h1><a style="color:#AA9F00;" href="./"></a></h1>
                                </td>
                        </tr>
                        <tr>
                            <td style="text-align:left; padding-left:10px; border-left:0px solid black;"><a href='<?=$url_main;?>'> <span></span>DETAIL SURAT MASUK</a>
                                 <span> </span> <img src="./image/panah.gif" /> <span>DETAIL SURAT MASUK</span>
                            <td><img  align="right" width="90" height="29" onclick="document.location.href='<?=$url_main;?>'" 
                                onmouseout="this.src='./image/button/KEMBALI.gif'" onmouseover="this.src='./image/button/KEMBALI2.gif'" src="./image/button/KEMBALI.gif"></img>
                                </td>
                        </tr>
                    </table>            
                    </div>
            <br>
        </td>
  </tr>
  <tr>
  	<td>
    <div id='content' style='padding-top:10px;'>	<br>
		<fieldset>    
	<legend><h3>DETAIL DATA SURAT MASUK</h3></legend>
            <?php
				$id = anti_injection($_GET["id"]);
                $res_sm = mysql_query("SELECT * FROM myapp_maintable_suratmasuk WHERE id='" . $id . "'");
                $ds_sm = mysql_fetch_array($res_sm);
            ?>
		<form name="frm" action="php/edit_surat_masuk.php" method="post">	
            <input type="hidden" name="id" value="<?php echo($_GET["id"]); ?>" />
            <table border="0px" cellspacing='0' cellpadding='0' width='100%'>
                <tr>
                    <td width='20%'>Nomor Surat</td>
                    <td width='10px'>:</td>
                    <td><input type="text" name="no_surat" value="<?php echo($ds_sm["no_surat"]); ?>" /></td>
                </tr>
                <tr>
                    <td width='20%'>Tanggal Surat</td>
                    <td width='10px'>:</td>
                    <td><input type="text" name="tgl_surat" id="tgl_surat" value="<?php echo($ds_sm["tgl_surat"]); ?>" /></td>
                </tr>
                <tr>
                    <td width='20%'>Tanggal Terima</td>
                    <td width='10px'>:</td>
                    <td><input type="text" name="tgl_terima" id="tgl_terima" value="<?php echo($ds_sm["tgl_terima"]); ?>" /></td>
                </tr>
                <tr>
                    <td width='20%'>Perihal</td>
                    <td width='10px'>:</td>
                    <td><input type="text" name="perihal_surat" value="<?php echo($ds_sm["perihal_surat"]); ?>" /></td>
                </tr>
                <tr>
                    <td width='20%'>Pengirim</td>
                    <td width='10px'>:</td>
                    <td><input type="text" name="pengirim_surat" value="<?php echo($ds_sm["pengirim_surat"]); ?>" /></td>
                </tr>
                <tr>
                    <td width='20%'>Alamat Pengirim</td>
                    <td width='10px'>:</td>
                    <td><input type="text" name="alamat_pengirim" value="<?php echo($ds_sm["alamat_pengirim"]); ?>" /></td>
                </tr>
                <tr>
                    <td width='20%'>Judul Surat</td>
                    <td width='10px'>:</td>
                    <td><input type="text" name="judul_surat" value="<?php echo($ds_sm["judul_surat"]); ?>" /></td>
                </tr>
                <tr>
                    <td width='20%'>Deskripsi Surat</td>
                    <td width='10px'>:</td>
                    <td><input type="text" name="deskripsi_surat" value="<?php echo($ds_sm["deskripsi_surat"]); ?>" /></td>
                </tr>
                <tr>
                    <td width='20%'>Catatan Tambahan</td>
                    <td width='10px'>:</td>
                    <td><textarea name="catatan"><?php echo($ds_sm["catatan"]); ?></textarea></td>
                </tr>
                <tr>
                    <td width='20%'>SKPD / Unit Pengirim</td>
                    <td width='10px'>:</td>
                    <td>
                        <select name="id_skpd_pengirim">
                            <option value="0">[.. Pilih SKPD Pengirim ..]</option>
                        <?php
                            $res_skpd = mysql_query("SELECT * FROM myapp_reftable_unitkerja ORDER BY unit_kerja ASC");
                            while($ds_skpd = mysql_fetch_array($res_skpd)){
                                if($ds_skpd["id_unit_kerja"] == $ds_sm["id_skpd_pengirim"])
                                    echo("<option value='" . $ds_skpd["id_unit_kerja"] . "' selected='selected'>" . $ds_skpd["unit_kerja"] . "</option>");
                                else
                                    echo("<option value='" . $ds_skpd["id_unit_kerja"] . "'>" . $ds_skpd["unit_kerja"] . "</option>");
                            }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width='20%'>Masalah</td>
                    <td width='10px'>:</td>
                    <td>
                        <select name="id_masalah">
                            <option value="0">[.. Pilih Masalah ..]</option>
                        <?php
                            $res_masalah= mysql_query("SELECT * FROM myapp_reftable_masalah ORDER BY masalah ASC");
                            while($ds_masalah = mysql_fetch_array($res_masalah)){
                                if($ds_masalah["id_masalah"] == $ds_sm["id_masalah"])
                                    echo("<option value='" . $ds_masalah["id_masalah"] . "' selected='selected'>" . $ds_masalah["masalah"] . "</option>");
                                else
                                    echo("<option value='" . $ds_masalah["id_masalah"] . "'>" . $ds_masalah["masalah"] . "</option>");
                            }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width='20%'>Jenis Surat</td>
                    <td width='10px'>:</td>
                    <td>
                        <select name="id_jenis_surat">
                            <option value="0">[.. Pilih Jenis Surat ..]</option>
                        <?php
                            $res_js= mysql_query("SELECT * FROM myapp_reftable_jenissurat ORDER BY jenis_surat ASC");
                            while($ds_js = mysql_fetch_array($res_js)){
                                if($ds_js["id_jenis_surat"] == $ds_sm["id_jenis_surat"])
                                    echo("<option value='" . $ds_js["id_jenis_surat"] . "' selected='selected'>" . $ds_js["jenis_surat"] . "</option>");
                                else
                                    echo("<option value='" . $ds_js["id_jenis_surat"] . "'>" . $ds_js["jenis_surat"] . "</option>");
                            }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width='20%'>Harus Selesai Pada<br /><span class="footnote">*) Kosongkan jika tidak perlu ditindak lanjuti</span></td>
                    <td width='10px'>:</td>
                    <td><input type="text" name="harus_selesai" id="harus_selesai" value="<?php echo($ds_sm["harus_selesai"]); ?>" /></td>
                </tr>
                <tr>
                    <td width='20%'>Indeks</td>
                    <td width='10px'>:</td>
                    <td><input type="text" name="indeks" value="<?php echo($ds_sm["indeks"]); ?>" /></td>
                </tr>
                <tr>
                    <td width='20%'>Kode</td>
                    <td width='10px'>:</td>
                    <td><input type="text" name="kode" value="<?php echo($ds_sm["kode"]); ?>" /></td>
                </tr>
            </table>
            <br />
            
            <table border="0px" cellspacing='0' cellpadding='0' width='20%'>
                <tr>
                    <td width='50%'><input type="button" value='Kembali' style="width: 100%;" onclick="document.location.href='?mod=<?php echo($_GET["redir"]); ?>';" /></td>
                </tr>
            </table>
		</form>
</fieldset>	
	</div>
</td>
</tr>
<tr>
    <td align="center" valign="middle">
    <div id='menu' style='border:0px solid black;'>
                    <nav>
                            <ul>
                                    <li><img src='./image/list.png'>&nbsp;&nbsp;<a href='<?=$url_main;?>'>BERANDA UTAMA</a></li>
                                    <li><img src='./image/list.png'>&nbsp;&nbsp;<a href='./?mod=latar_belakang'>LATAR BELAKANG</a></li>
                                    <li><img src='./image/list.png'>&nbsp;&nbsp;<a href='./?mod=berita_dan_informasi'>BERITA DAN INFORMASI</a></li>
									<li><img src='./image/list.png'>&nbsp;&nbsp;<a href='./?mod=fdownload'>FILE DOWNLOAD</a></li>
                                </ul>
                    </nav>
    </div>
    </td>
</tr>
<tr>
     <td><br><div id='footer'></div></td>
 </tr>
 </table>