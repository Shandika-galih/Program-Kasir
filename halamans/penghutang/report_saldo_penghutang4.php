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

  <html>
<body>
  <br/>
  <br/>
<div class="container">
    <table id="example" class="display" style="width:100%">
       <thead style="background-color:#122631;color:#c7fcff;">
      

           <tr>
                <th>Nomor Id</th>
                <th>Nama Penghutang</th>
                <th>Total Debit</th>
                <th>Total Kredit</th>
                <th>Total Saldo</th>
                <th>Tanggal Berhutang</th>
                <!--<th>Waktu Transaksi</th>
                <th>Detail Transaksi</th>-->
            </tr>
        </thead>
        <tbody>




<!-- <?php

//$id=0;
//$query= "SELECT id, id_penghutang, saldo, nominal_depo, nominal_with, SUM(nominal_depo) AS nominal_depo, SUM(nominal_with) AS nominal_with FROM transaksi_bank_hutang_depo 
      // INNER JOIN transaksi_bank_hutang_with ON transaksi_bank_hutang_with.id_penghutang=transaksi_bank_hutang_depo.id_penghutang";
//$sqldehutang = mysqli_query($database, $query) or die (mysqli_error($database));
//while($data = mysqli_fetch_array($sqldehutang)) { ?> -->




        <!-- <?php

//$nominal=0;
//$pendapatan = $nominal-$nominal;
//$sqlTampil= "SELECT id, jenis_transaksi, jenis_kas, nominal, inquiri, date_updated, SUM(nominal) AS nominal from bank_hutang WHERE inquiri='deposit''";
//$tampil = $database->query($sqlTampil);
//?>
//<?php //if ($tampil->num_rows > 0) {
  // jika data benar
 // while($row = $tampil->fetch_assoc()){ ?>

 --><?php

             $sql = "SELECT * FROM transaksi_bank_hutang_depo join tran where bank.id=bank_account.id_bank ";
$query=mysqli_query($koneksi,$sql);
 
if(mysqli_num_rows($query)==0){
  echo "<td colspan='6'>Data Masih Kosong</td>";
    echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";   
}else{
  $no=1;
  while($r=mysqli_fetch_assoc($query)){
    echo "<tr>";
    echo "<td>$no</td>";
    echo "<td>".$r['nama_bank']."</td>";
    echo "<td>".$r['account_name']."</td>";
    echo "<td>".$r['account_number']."</td>";
    echo "<td>".rupiah($r['saldo'])."</td>";
    
  

?>
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