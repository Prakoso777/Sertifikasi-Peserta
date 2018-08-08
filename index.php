<?php
include("koneksi.php");
//untuk memanggil modul koneksi
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SERTIFIKASI Online</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet">

  </head>
  <body>
    
    <div class="container">

    <!-- Bagian Header -->

    <div class="row">
        <div class="col-md-12 header" id="site-header">
            <!-- isi header -->
          <header>

</header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><span class="glyphicon glyphicon-globe"></span> Tambah Sertifikasi</a></li>
                    <li><a href="laporan.php"><span class="glyphicon glyphicon-globe"></span> Laporan Sertifikasi</a></li>
                    <li><a href="backup.php"><span class="glyphicon glyphicon-globe"></span> BACKUP</a></li>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</nav>

        </div>
    </div>
    <!-- End Bagian Header -->

    <!-- Bagian Wrapper 2 kolom -->
    <div class="row">
        <div class="col-md-8 articles" id="site-content">
           <!-- isi content -->

<article class="posts"> 
 <!-- modul untuk menyimpan ke database -->
<?php
if(isset($_POST['submit'])){
    $nama_peserta           = $_POST['nama_peserta'];
    $nik_peserta            = $_POST['nik_peserta'];
    $nohp_peserta           = $_POST['nohp_peserta'];
    $tanggallahir_peserta   = $_POST['tanggallahir_peserta'];
    $tanggallahir_peserta   = date('Y-m-d', strtotime($tanggallahir_peserta));
    $oraganisasi_peserta    = $_POST['oraganisasi_peserta'];
    $email_peserta          = $_POST['email_peserta'];
    $rekomendasi_peserta    = $_POST['rekomendasi_peserta'];
    $sekema_lembaga         = $_POST['sekema_lembaga'];
    $tempatuji_lembaga      = $_POST['tempatuji_lembaga'];
    $tanggalterbit_lembaga  = $_POST['tanggalterbit_lembaga'];
    $tanggalterbit_lembaga  = date('Y-m-d', strtotime($tanggalterbit_lembaga));
    //query database untuk menambah data peserta
    $insertpeserta = mysqli_query($koneksi, "INSERT INTO peserta (id_peserta, nama_peserta, nik_peserta, nohp_peserta, tanggallahir_peserta, oraganisasi_peserta, email_peserta, rekomendasi_peserta) VALUES('0','$nama_peserta','$nik_peserta', '$nohp_peserta', '$tanggallahir_peserta', '$oraganisasi_peserta', '$email_peserta','$rekomendasi_peserta')") or die(mysqli_error());

    //mencari id terakhir
    $sql = mysqli_query($koneksi, "select max(id_peserta) as last_id from peserta limit 1");
    $row = mysqli_fetch_array($sql);
    $lastId = $row['last_id'];
    //query database untuk menambah data lembaga
    $insertlembaga = mysqli_query($koneksi, "INSERT INTO lembaga (id_lembaga, id_peserta, sekema_lembaga, tempatuji_lembaga, tanggalterbit_lembaga) VALUES('0','$lastId','$sekema_lembaga','$tempatuji_lembaga','$tanggalterbit_lembaga')") or die(mysqli_error());   
    //membuat kondisi jika data peserta atau lembaga ada yang koso akan keluar peringatan
    if($insertpeserta || $insertlembaga){
        echo '<br><br><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
    }else{
        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
    }
}
?>
<!-- form yang digunakan untuk menginput datas peserta -->
<form action="" method="post" enctype="multipart/form-data">
<br><br><br><br>
        <div class="form-group">
            <input type="text" name="nik_peserta" placeholder="NIK" class="form-control" required="Maaf NIK Silahkan Diisi">
        </div>

        <div class="form-group">
            <input type="text" name="nama_peserta" placeholder="Nama" class="form-control" required>
        </div>

        <div class="form-group"> 
            <input type="text" name="nohp_peserta" placeholder="No HP " class="form-control" required>
        </div>

      <div class="form-group">
      <input type="text" name="tanggallahir_peserta" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="00-00-0000" required>
    </div>

        <div class="form-group"> 
            <input type="text" name="oraganisasi_peserta" placeholder="Organisasi" class="form-control" required>
        </div>

        <div class="form-group"> 
            <input type="text" name="email_peserta" placeholder="Email" class="form-control" required>
        </div>

        <div class="form-group"> 
            <input type="text" name="rekomendasi_peserta" placeholder="Rekomendasi" class="form-control" required>
        </div>

        <div class="form-group"> 
            <input type="text" name="sekema_lembaga" placeholder="Sekema Sertifikasi" class="form-control">
        </div>

        <div class="form-group"> 
            <input type="text" name="tempatuji_lembaga" placeholder="Tempat Uji Sertifikasi" class="form-control" required>
        </div>    

        <div class="form-group"> 
            <input type="text" name="tanggalterbit_lembaga" class="input-group date form-control" date="" data-date-format="dd-mm-yyyy" placeholder="00-00-0000" required>
        </div>
        <button type="submit" name="submit" class="btn btn-info">Simpan</button>
        <a href="index.php?" class="btn btn-danger">Batal</a> 
        <br>
        <br>
</form>
</article>

        </div>
</div>
    <!--happy code-->

    <!-- jQuery online menggunakan CDN -->
    <script src="js/jquery.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script>
    $('.date').datepicker({
        format: 'dd-mm-yyyy',
    })
    </script>

  </body>
</html>