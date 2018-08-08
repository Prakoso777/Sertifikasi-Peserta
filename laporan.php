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
                <!-- fungsi untuk membuat menu header -->
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
    <br><br><br>
    <!–membaut fungsi cari->
    <form action="" method="post">
        <input type="text" name="tanggal">
        <input type="submit" name="cari2">
    </form>
    <!–membuat tabel untuk tempat data laporan peserta yang akan ditampilkan->
        <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th class="text-center active">No</th>
            <th class="text-center active">Nama</th>
            <th class="text-center active">NIK</th>
            <th class="text-center active">NO HP</th>
            <th class="text-center active">TANGGAL LAHIR</th>
            <th class="text-center active">ORGANISASI</th>
            <th class="text-center active">EMAIL</th>
            <th class="text-center active">REKOMENDASI</th>
            <th class="text-center active">SEKEMA</th>
            <th class="text-center active">TEMPAT UJI</th>
            <th class="text-center active">TANGGAL TERBIT SERTIFIKAT</th>
        </tr>    
        </thead>


       <?php
       if (isset($_POST['cari2'])){
           $tgl = $_POST['tanggal'];
       // fungsi join untuk menggabungkan dua databse
        //fungsi wahre tanggallahir_peserta untuk mencari data peserta sesuai tanggal lahir
            $sql = mysqli_query($koneksi, "SELECT peserta.*,lembaga.* FROM peserta JOIN lembaga USING (id_peserta) WHERE tanggallahir_peserta='$tgl'");
        if(mysqli_num_rows($sql) == 0){
            echo '<tr><td colspan="10">Data Tidak Ada.</td></tr>';
        }else{
            $no=1;
            while($row = mysqli_fetch_assoc($sql)){

                //digunakan untuk memanggil dataa dari database
                echo '

                <br><br><br>
            <tr>
                <td>'.$no.'</td>
                <td>'.$row['nama_peserta'].'</td>
                <td>'.$row['nik_peserta'].'</td>
                <td>'.$row['nohp_peserta'].'</td>
                <td>'.$row['tanggallahir_peserta'].'</td>
                <td>'.$row['oraganisasi_peserta'].'</td>
                <td>'.$row['email_peserta'].'</td>
                <td>'.$row['rekomendasi_peserta'].'</td>
                <td>'.$row['sekema_lembaga'].'</td>
                <td>'.$row['tempatuji_lembaga'].'</td>
                <td>'.$row['tanggalterbit_lembaga'].'</td>
    
                ';
                echo '
                </td>
            </tr>
                ';
                $no++;
            }
        }
    }
        ?>
    </table>
    </div>
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