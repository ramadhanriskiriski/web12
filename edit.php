<?php
include("config.php");
if (isset($_GET['nis'])){
    $title ="edit"
    $url = 'proses-edit.php';
    $id = $_GET['nis'];
    //buat query untuk ambil dari database
    $sql ="SELECT* FROM t_siswa WHERE nis = $id";
    $query = mysqli_query($db,$sql);
    $siswa = myqsli_fetch_assoc($query);
    //jika data yang diedit tidak ditemukan
    if (mysqli_num_rows($query)<1){
        die("data tidak ditemukan ...");
    }
    //url jika edit data
}else{
    $title ="add";
    //url jika tambah data
    $url ='proses_pendaftaran.php';
}
?>