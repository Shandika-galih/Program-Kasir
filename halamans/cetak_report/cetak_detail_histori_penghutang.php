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
      <center><h1>LAPORAN HISTORI PENGHUTANG</h1></center>
                <th>Nomor Urut</th>
                <th>Kode Rekening</th>
                <!-- <th>Nama Pemilik Rekening</th>
                <th>Nomor Rekening</th> -->
                <th>Nominal Deposit</th>
                <th>Nominal Withdraw</th>
                <th>Keterangan Transaksi</th>
                <th>Tanggal Transaksi</th>
              
                <!-- <th>Detail Transaksi</th> -->
            </tr>
        </thead>
        <tbody>

 <?php
function format_ribuan ($nilai){
  return number_format ($nilai, 0, ',', '.');
}


// $id='1';
//     $id_pemain = $_GET['id_pemain'];
//     $data = mysqli_query($koneksi,"SELECT * FROM pemain WHERE id_pemain='$id_pemain'");
//     while($d = mysqli_fetch_array($data)){

 $id=1;
 $id_penghutang = $_GET['id_penghutang'];
 $data = mysqli_query($database,"SELECT * FROM bank_hutang where id_penghutang='$id_penghutang'");
    while($d = mysqli_fetch_array($data)){
      ?>


                <tr>
                <td><?php echo $d['id']; ?></td>
                <td><?php echo $d['id_penghutang']; ?></td>
                <td><?php echo @rupiah($d['nominal1']); ?></td>
                <td><?php echo @rupiah($d['nominal']); ?></td>
                <td><?php echo $d['inquiri']; ?></td>
                <!-- <?php //echo @rupiah($pendapatan = $row['nominal']-$row1['nominal']); ?> -->
                <!-- <td><?php //echo $row['jenis_kas']; ?></td> -->
                <!-- <td><?php //echo $row['rekening']; ?></td>--> 
              <!--   <td><?php //echo $row2['nama_bank']; ?></td> -->
                <!--<td><?php ///echo $row['rekening']; ?></td>-->
                <td><?php echo $d['date_updated']; ?></td>
                <!--<td><?php //echo $row['create_date']; ?></td>
                <td><a href="">Detail Transaksi</a></td>-->
            </tr>
            </tfoot>
        <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );</script>

            <?php  } ?>

        </tfoot>
    </table>
  

    <?php
      function rupiah($angka){
      $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
      return $hasil_rupiah;
}?>
<script>
    window.print();
  </script>
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