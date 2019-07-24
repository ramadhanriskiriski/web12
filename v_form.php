<?php
incldue("config.php");
    if (isset($_GET['nis'])){
        $title = "Edit";
            $url = 'proses_edit.php';
            $id = $_GET['nis']
            //buat query untuk ambil data dari database
            $sql = "SELECT * FROM t_siswa WHERE nis = $id";
            $query = mysqli_query($db, $sql);
            $siswa = mysqli_fetct_assoc($query);
            //jika data yang diedit tidak ditemukan
                if (mysqli_num_rows($query) < 1){
                    die("data tidak ditemukan")
                }
                //url jika edit data
    }else{
        $title = "Add";
        //url jika di tambah data
        $url = 'proses_pendaftaran.php';        
    }
?>

<html>
<head><title>Formulir siswa</title></head>
<body>
    <header><h3>Formulir siswa</h3></header>
    <form action="proses_pendaftaran.php" method = "POST">
    <fieldset>
    <legend><h2>Form siswa</h2></legend>
    <div>
    <label for="nis">NIS</label><br>
    <input type="text" name="nis" value="<?php if (isset($_GET['nis'])){ echo $siswa['nis'];}?>"/>
    </div>
    <div>
    <label for="nama">Nama: </label><br>
    <input type="text" name="nama_lengkap" value="<?php if (isset($_GET['nis'])){ echo $siswa['nama_lengkap'];}?>"/>
    </div>
    <div>
    <label for="alamat">Alamat</label><br>
    <textarea name="alamat" row ="5"> <?php if (isset($_GET['nis'])){ echo $siswa['alamat'];?> </textarea>
    </div>
    <div>
    <label for="jenis_kelamin">Jenis kelamin</label><br>
    <?php if(isset($_GET['nis'])){$jk = $siswa['jenis_kelamin']; ?>
    <td>
    <input name="jenis_kelamin" type = "radio" value = "Laki-laki">
    <?php if ($jk=='Laki-Laki'){echo 'checked';}?>>Laki-Laki
    <input name= "jenis_kelamin" type = "radio" value="Perempuan">
    <?php if ($jk=='Perempuan'){echo 'checked';}?>>Perempuan
    </td>
    <?php }else{ ?>
    <td><br>
    <input name= "jenis_kelamin" type = "radio" value= "Laki-laki">Laki-Laki
    <input name= "jenis_kelamin" type = "radio" value= "Perempuan">Perempuan
    </td>
    <?php } ?>
    </div>
    <div>
    <label for="no_telp">No Telepon</label><br>
    <input type="text" name="no_telp" value ="<?php if(isset($_GET['nis'])){echo $siswa['no_telp']; } ?>"/>
    </div>
    <div>
    <label for="kelas">Kelas:</label><br>
    <input type="text" name="kelas" value = "<?php if(isset($_GET['nis'])){echo $siswa['kelas'];} ?>"/>
    </div>
    <hr>
    <div>
    <input type="submit" value= "Simpan" name = "simpan"/>
    </div>
    </fieldset>
    </form>
    </body>
   </html>