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
<div class="container"> </br></br></br></br></br></br>
    <table id="example" class="display" style="width:100%">
          <thead style="background-color:#122631;color:#c7fcff;">

            <tr>
                <th>Nomor Id</th>
                <th>Jenis Transaksi</th>
                <th>Jenis Kas</th>
                <th>Rekening</th>
                <th>Nominal</th>
                <th>Jenis Masukan</th>
                <th>Waktu Transaksi</th>
              
            </tr>
        </thead>
        <tbody>

  <?php
function format_ribuan ($nilai){
  return number_format ($nilai, 0, ',', '.');
}

  $nominal=0;
  $sqlTampil= "SELECT id, jenis_transaksi, jenis_kas, rekening, nominal, inquiri, create_date, SUM(nominal) AS nominal from game_slot WHERE inquiri='deposit'";
  $tampil = $database->query($sqlTampil);
?>
<?php if ($tampil->num_rows > 0) {
    // jika data benar
    while($row = $tampil->fetch_assoc()){ ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['jenis_transaksi']; ?></td>
                <td><?php echo $row['jenis_kas']; ?></td>
                <td><?php echo $row['rekening']; ?></td>
                <td><?php echo @rupiah($row['nominal']); ?></td>
                <td><?php echo $row['inquiri']; ?></td>
                <td><?php echo $row['create_date']; ?></td>
                
            </tr>
            <tr>
                <td>GRAND TOTAL</td>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo @rupiah($row['nominal']); ?></td>
                <td></td>
                <td></td>
                <td></td>
            
            </tr>


            <?php   }?>
<?php } else {
    // jika data salah
    echo "data kosong";
  } ?>
        </tfoot>
    </table>
    <!--<?php  //else {
    // jika data salah
    //echo "data kosong";
   ?>-->
    <?php
      function rupiah($angka){
      $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
      return $hasil_rupiah;
}?>
    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );</script>
 
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