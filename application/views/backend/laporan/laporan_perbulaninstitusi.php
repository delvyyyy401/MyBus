<?php
 $judulfile = 'Laporan Penjualan';
 //MOFIFIKASI HEADER HTTP MENJADI FILE XLS
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=$judulfile $bulan.xls");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EXPORT LAPORAN INSTITUSI</title>
</head>

<body>
<th> <b>----- Laporan Penjualan Tiket Institusi Bulan <?php echo $bulan?> -----</b></th>
<table><tr> </tr></table>
 <table border="1" cellspacing="1" cellpadding="2" width="90%">
    <tr>
        <th width="5%" align="center">No. Tiket</th>
        <th width="20%" align="center">No. Order</th>
        <th width="20%" align="center">Nama Institusi</th>
        <th width="20%" align="center">Jumlah Kursi</th>
        <th width="20%" align="center">Harga Booking</th>
    </tr>
    <?php foreach ($laporan as $row) { ?>
    <tr>
         <td align="center"><?php echo $row['kd_tiket'];?></td>
         <td align="center"><?php echo $row['kd_order'];?></td>
         <td align="center"><?php echo $row['nama_institusi'];?></td>
         <td align="center"><?php echo $row['jumlah_kursi_institusi'];?></td>
         <td align="center"><?php echo $row['harga_tiket']*$row['jumlah_kursi_institusi'];?></td>
    </tr>
   <?php } ?>
</table>
<table>
<tr></tr>
<tr>
        <th>Total Penjualan :</th>
        <th align="center"><b><?php echo '=sum(e3:f999)';?></b></th>
</tr>
</table>
</body>
</html>
