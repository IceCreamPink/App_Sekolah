<?php
include_once('config.php');
//ini proses select data
$id = isset($_GET['id'])?$_GET['id']:"";
if($id != ""){
    $sel = mysqli_query($conn, "select * from tbkelas where idkelas=$id");
    $data = mysqli_fetch_array($sel); 
}

//ini proses update data
if(isset($_POST['update'])){
   extract($_POST);
    $up = mysqli_query($conn, "update tbkelas set kelas='$kelas',Jurusan='$Jurusan' where idkelas=$id");
if($up){
    ?>
<script>
alert('Update Berhasil');
location.href = '?hal=tampilkelas';
</script>
<?php
}
}
?>
<a href="?hal=tampilkelas">Kembali ke Tampil kelas</a>
<br>
<br>
<form action="?hal=editkelas" method="post">
    <table>
        <input type="hidden" name="id" value="<?=$data['idkelas']?>">
        <tr>
            <td>Nama Kelas</td>
            <td>
                <input type="text" value="<?=$data['kelas']?>" name="kelas" placeholder="Nama Kelas" required>
            </td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>
                <select name="Jurusan" required>
                    <option value="">==pilih jurusan==</option>
                    <option <?=$data['Jurusan']=="Rekayasa Perangkat Lunak"?'selected':''?>
                        value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option <?=$data['Jurusan']=="Desain Komunikasi Visual"?'selected':''?>
                        value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                    <option <?=$data['Jurusan']=="Manajemen Perkantoran"?'selected':''?> value="Manajemen Perkantoran">
                        ManaJemen Perkantoran</option>
                    <option <?=$data['Jurusan']=="Akuntansi"?'selected':''?> value="Akuntansi">Akuntansi</option>
                    <option <?=$data['Jurusan']=="Bisnis Digital"?'selected':''?> value="Bisnis Digital">Bisnis Digital
                    </option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="update" value="simpan">Simpan</button>
            </td>
            <td>
                <button type="reset">Reset</button>
            </td>
        </tr>
    </table>

</form>