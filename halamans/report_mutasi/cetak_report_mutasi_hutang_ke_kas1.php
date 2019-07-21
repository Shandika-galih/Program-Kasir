<?php
$database = new mysqli('localhost','root','','third_pro');
  if($database->connect_errno){
    echo"Database Tidak Dapat Terhubung";
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin Free Bootstrap-4 Admin Dashboard Template</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../vendors/icheck/skins/all.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />

   <script type="text/javascript" src="DataTables/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="DataTables/media/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="DataTables/media/css/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.css">
</head>
<body>
  <br/>
  <br/>
<div class="container">
    <table id="example" class="display" style="width:100%">
          <thead style="background-color:#122631;color:#c7fcff;">
          <center><h1>LAPORAN TRANSAKSI MUTASI HUTANG KE KAS</h1></center>
               <tr>
               <th>Nomor Urut</th>
               <!-- <th>Jenis Transaksi</th> -->
               <th>Penghutang Pengirim</th>
               <th>Jenis Kas Penerima</th> 
            <!--     <th>Kode Rekening</th> -->
                <th>Nominal Terkirim</th>
                <th>Nominal Di Terima</th>
                <!-- <th>Total Kas Kecil</th>
                <th>Total Kas Besar</th>-->
                <!-- <th>Total Saldo</th>  --> 
                <!--  <th>Keterangan Transaksi</th>  -->
                <th>Tanggal Transaksi</th>         
                </tr>                        
        </thead>
        <tbody>

 <?php
function format_ribuan ($nilai){
  return number_format ($nilai, 0, ',', '.');
}

$no=1;
$jenis_kas='jenis_kas'; 
$rekening='rekening'; 
// $data = mysqli_query($database,"SELECT kas_kecil.id, kas_kecil.jenis_kas, kas_kecil.jenis_kas AS jenis_kas_kas_kecil, kas_kecil.nominal AS nominal_kas_kecil, kas_besar.jenis_kas, kas_besar.jenis_kas AS jenis_kas_kas_besar, kas_besar.nominal AS nominal_kas_besar, bank_akun.rekening, bank_akun.nominal AS nominal_bank_akun, bank_akun.date_updated 
//                             FROM kas_kecil, kas_besar, bank_akun
//                             WHERE kas_kecil.jenis_kas = kas_besar.jenis_kas
//                             AND kas_kecil.rekening = bank_akun.rekening
//                             GROUP BY rekening DESC");

$data = mysqli_query($database,"SELECT bank_hutang.id, bank_hutang.id_penghutang, bank_hutang.nominal, bank_hutang.nominal1, bank_hutang.nominal1 AS nominal_terkirim, bank_hutang.date_updated, kas_kecil.id, kas_kecil.jenis_transaksi, kas_kecil.jenis_kas, kas_kecil.rekening, kas_kecil.nominal, kas_kecil.inquiri, kas_kecil.create_date, kas_kecil.nominal AS nominal_diterima, kas_besar.id, kas_besar.jenis_transaksi, kas_besar.jenis_kas, kas_besar.rekening, kas_besar.nominal, kas_besar.inquiri, kas_besar.create_date, kas_besar.nominal AS nominal_diterima, bank_hutang.id  FROM bank_hutang, kas_kecil, kas_besar WHERE bank_hutang.id_penghutang=kas_kecil.jenis_kas AND kas_kecil.jenis_kas=kas_besar.jenis_kas");



   while($d = mysqli_fetch_array($data)){
      ?>


            <tr>
              <td><?php echo $no++; ?></td>
            <!--  <td><?php// echo $d['jenis_transaksi']; ?></td> -->
              <td><?php echo $d['id_penghutang']; ?></td> 
            <!--   <td><?php// echo $d['jenis_kas_kas_besar']; ?></td>  -->
               <td><?php echo $d['jenis_kas']; ?></td>
               <td><?php echo @rupiah(-$d['nominal_terkirim']); ?></td>
              <!--  <td><?php// echo @rupiah($d['nominal_kas_besar']); ?></td> -->
               <td><?php echo @rupiah($d['nominal_diterima']); ?></td>
            <td><?php echo $d['date_updated']; ?></td>
                </tr>
            
         </tfoot>
        <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );</script>



  
            <?php } ?>

  
        </tfoot>
    </table>


    <!--<?php  //else {
    // jika data salah
    //echo "data kosong";
   ?>-->
    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );</script>
<?php
      function rupiah($angka){
      $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
      return $hasil_rupiah;
}?>

<script>
    window.print();
  </script>

    </table>


<!-- <p>
    <a href="halamans/report_mutasi/cetak_report_mutasi_hutang_ke_kas.php" class="btn btn-success btn-lg">
      <span class="glyphicon glyphicon-print"></span> Cetak
    </a>
  </p> -->
    </table>
        <footer class="footer">
          
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>