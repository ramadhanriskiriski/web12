<?php
include("config.php");
if(isset($_GET['nis'])){
    //ambil nis query string
    $nis = $_GET['nis'];
    //buat query hapus
    $sql ="DELETE FROM t_siswa WHERE nis=$nis";
    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
    //apakah query update berhasil?
    if($query){
        //kkalau berhasil,alihkan ke halaman index.php dengan status=suskes
        header('location:index.php?status=gagal');
    }
}else{
    die("akses dilarang...");
}
?>