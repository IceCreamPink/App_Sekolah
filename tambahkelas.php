<?php
     include_once('config.php');
     if(isset($_POST['simpan'])){
        extract($_POST);
        $ins = mysqli_query($conn, "insert into tbkelas values(null, '$kelas','$Jurusan')");
        if($ins){
            ?>
<script>
alert('simpan berhasil');
location.href = '?hal=tampilkelas';
</script>
<?php
        }
     }
     ?>
<a href="?hal=tampilkelas">Kembali ke tampil</a>
<br>
<br>
<form action="?hal=tambahkelas" method="post">
    <table>
        <tr>
            <td>Nama Kelas</td>
            <td>
                <input type="text" name="kelas" placeholder="Nama Kelas" required>
            </td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>
                <select name="Jurusan" required>
                    <option value="">==pilih jurusan==</option>
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                    <option value="Manajemen Perkantoran">Manajemen Perkantoran</option>
                    <option value="Akuntansi">Akuntansi</option>
                    <option value="Bisnis Digital">Bisnis Digital</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="simpan" value="simpan">Simpan</button>
            </td>
            <td>
                <button type="reset">Reset</button>
            </td>
        </tr>
    </table>

</form>