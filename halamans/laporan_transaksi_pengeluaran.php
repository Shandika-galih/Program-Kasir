<?php
$database = new mysqli('localhost','root','','third_pro');
  if($database->connect_errno){
    echo"Database Tidak Dapat Terhubung";
  }

if(isset($_POST['simpan'])){
    $jenis_pengeluaran = $_POST['jenis_pengeluaran'];
    $nominal = $_POST['nominal'];
    $rekening= $_POST['rekening'];
     $rp=$_POST['nominal'];
      $keterangan=$_POST['keterangan'];
     $inquiri= "pengeluaran";
      $sal2= str_replace("Rp.","",$rp);
    $nominal = str_replace(".","",$sal2);




  $sql= "INSERT INTO pengeluaran VALUES('', '$jenis_pengeluaran','$nominal','$rekening','$keterangan','$inquiri', '$now')";
  //$data = $database->query($sql);
   if ($database->query($sql))
        {
echo "<script>";
echo " alert('Berhasil,Silahkan transfer');      
        window.location.href='';
    </script>";


}}
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
</head>

<body>

          <table>
            <div class="col-12 grid-margin">
              </br></br></br></br></br></br>
                    <div class="row">
                    <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                      <div class="col-md-6">
                      </div>
                    </div>
                    <!--<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Transaksi</label>
                          <div class="col-sm-9">
                             <select required aria-requiered="true" class="form-control" name="tipe" id="select" onclick="myfun()">
                 <option value="">--Pilih--</option>
                 <option value="out">Pengeluaran</option>
                <option value="in">Pemasukan</option>
              </select>
                          </div>
                        </div>
                      </div>
                    </div>-->

                    <!--<div id="pemasukan">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Pemasukan</label>
                          <div class="col-sm-9">
                             <select required aria-requiered="true" class="form-control" name="nama-pemasukan">
                 <option value="">--Pilih Jenis Pemasukan--</option>
                             <?php
//$sql2="SELECT * FROM kategori_tr_bank where tipe='0' ";
//$query2=mysqli_query($koneksi,$sql2);
//while($r2=mysqli_fetch_assoc($query2)){
 //   echo "<option value='".$r2['id']."'";
   
 //   echo ">".$r2['nama']."</option>";

?></select>
                          </div>
                        </div>
                      </div>
                    </div>-->


                    <div id="jenis_pengeluaran">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Pengeluaran</label>
                          <div class="col-sm-9">
                             <select required aria-requiered="true" class="form-control" name="jenis_pengeluaran"  id="jenis_pengeluaran">
                 <option value="">--Pilih Jenis Pengeluaran--</option>
                  <!--<option value="transfer">Transfer</option>-->
                             <?php
$sql2="SELECT * FROM kategori_tr_bank where tipe='1' ";
$query2=mysqli_query($koneksi,$sql2);
while($r2=mysqli_fetch_assoc($query2)){
    echo "<option value='".$r2['id']."'";
   
    echo ">".$r2['nama']."</option>";
}
?></select>
                           
                          </div>
                        </div>
                      </div>
                    </div>

<form class="form-sample">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nominal</label>
                          <div class="col-sm-9">
                            <input type="text" name="nominal" class="form-control" id="rupiah" placeholder="Masukkan Nominal"  required="required">
                  </div>
                          </div>
                        </div>
               </div>
                   <div id="rekening">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Rekening Pengirim</label>
                          <div class="col-sm-9">
                            <select required aria-requiered="true" class="form-control" name="rekening" id="rekening">
                               <option value="">- Pilih BANK -</option>
                 <?php
$sql2="SELECT * FROM bank b join bank_account a where a.id_bank=b.id";
$query2=mysqli_query($koneksi,$sql2);
while($r2=mysqli_fetch_assoc($query2)){
    echo "<option value='".$r2['id']."'";
   
    echo ">".$r2['account_name']." - ".$r2['account_number']." - ".$r2['nama_bank']."</option>";
}
?>
              </select>
                          </div>
                        </div>
                      </div>                                          
                        </div>
                    <!--<div id="pemasukan">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Transaksi</label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option value="">--Pilih Jenis Transaksi--</option>
                             <?php
//$sql2="SELECT * FROM bank_account";
//$query2=mysqli_query($koneksi,$sql2);
//while($r2=mysqli_fetch_assoc($query2)){
//    echo "<option value='".$r2['id']."'";
   
  //  echo ">".$r2['nama']."</option>";

?></select>
                            </select>
                          </div>
                        </div>
                      </div>                                          
                        </div>-->
                        
                
                  <form class="form-sample">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Keterangan</label>
                          <div class="col-sm-9">

                            <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Masukkan Keterangan"  required="required">
                  </div>
                          </div>
                        </div>
               </div>

                     

               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="submit" name="simpan" class="btn btn-danger btn-fw" >Pengeluaran</button>
                        <!-- <button type="reset" class="btn btn-light">Reset</button> -->
      </form>
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
    <!-- <script type="text/javascript">
 
    function myfun(){
    $(document).ready(function(){
      
        $("#select").click(
        function(){
        var data=$("#select").val();
 if($('#select').val() == 'in'){
$("#bank-penerima").hide();
$("#keterangan").show();
$("#pemasukan").show();
$("#pengeluaran").hide();
 
               }else{
               $("#keterangan").show();
               $("#pemasukan").hide();
                 $("#bank-penerima").hide();
                 $("#pengeluaran").show();
               
               }
                            });
    });
    }
      function myfun2(){
    $(document).ready(function(){
      $("#select2").click(
        function(){
        var data=$("#select2").val();
 if($('#select2').val() == 'transfer'){
$("#bank-penerima").show();
 }else{
$("#bank-penerima").hide();
 } });
    });
    }
</script>-->
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