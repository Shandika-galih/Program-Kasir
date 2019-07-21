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
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/bootstrap.js"></script>

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
             <tr>
               <th>Nomor Urut</th>
              <!--   <th>Id Produk</th> -->
                <th>Nama Penghutang</th>
                <th>Nama Produk</th>
                <th>Satuan Produk</th>
                <!-- <th>Jenis Kas</th> -->
                <th>Total Produk</th>
                <th>Keterangan Transaksi</th>
                 <th>Tanggal Transaksi</th>
                <th>Detail Transaksi</th>
                </tr>                       
        </thead>
        <tbody>
        
          
   <?php


$id=1;
$id_penghutang='id_penghutang'; 
$data = mysqli_query($database,"SELECT id, id_produk, id_penghutang, jenis_kas, nama_produk, satuan_produk, nominal,  keterangan, date_updated, SUM(nominal) AS total_jumlah_produk FROM bank_hutang_produk GROUP BY id_penghutang");


   while($d = mysqli_fetch_array($data)){

?> 
 

            <tr>
              <td><?php echo $d['id']; ?></td>
           <!--    <td><?php// echo $d['id_produk']; ?></td> -->
               <td><?php echo $d['id_penghutang']; ?></td>
               <td><?php echo $d['nama_produk']; ?></td>
               <td><?php echo $d['satuan_produk']; ?></td>
           <!--     <td><?php //echo $d['jenis_kas']; ?></td> -->
               <td><?php echo $d['total_jumlah_produk']; ?></td>
               <td><?php echo $d['keterangan']; ?></td>
               <td><?php echo $d['date_updated']; ?></td>
               <td><a href="detail_histori_penghutang_rokok.php?id_penghutang=<?php echo $d['id_penghutang']; ?>" class="fa fa-search">Detail Transaksi</a></td>  
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
 
     <p>
    <a href="halamans/cetak_report/cetak_report_penghutang_rokok.php" class="btn btn-success btn-lg">
      <span class="glyphicon glyphicon-print"></span> Cetak
    </a>
  </p>
<!-- <p>Icon Print: <span class="glyphicon glyphicon-print"></span></p>
  <p>Icon Print di atas tombol besar ("btn-lg"): --><!-- <p>
    <a href="halamans/cetak_report/cetak_report_penghutang.php" class="btn btn-success btn-lg">
      <span class="glyphicon glyphicon-print"></span> Cetak
    </a>
  </p> -->
<!-- <a href="halamans/cetak_report/cetak_report_penghutang.php" target="_BLANK">TES PRINT</a> -->
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