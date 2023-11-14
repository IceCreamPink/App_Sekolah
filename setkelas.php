<?php
     include_once('config.php');
     $sql = mysqli_query($conn,"select * from tbsiswa where idsiswa NOT IN (select idsiswa from tbsetkelas where tahun = '2023/2024')");
     $kelas = mysqli_query($conn,"select * from tbkelas order by kelas asc");
     $setkelas = mysqli_query($conn,"select a.nama_siswa, b.kelas,c.tahun from tbsiswa a, tbkelas b, tbsetkelas c where a.idsiswa=c.idsiswa AND b.idkelas=c.idkelas order by b.kelas, a.nama_siswa asc");
?>

<div style="width: 48%;min-height:300px;float:left; padding-left:5px;">
    <h3 style="color:red;">Siswa Belum Punya Kelas</h3>
    <form action="?hal=proses_set_kelas" method="post">
        <table>
            <?php
            while($row = mysqli_fetch_array($sql)){
                ?>
            <tr>
                <td>
                    <input type="checkbox" name="siswa[<?=$row['idsiswa']?>]" value="<?=$row['idsiswa']?>">
                </td>
                <td>
                    <?=$row['nama_siswa']?>
                </td>
            </tr>
            <?php
            }
         ?>
        </table>
        <table>
            <tr>
                <td>
                    <select name="kelas" required>
                        <option value="">==pilih kelas==</option>
                        <?php
                        while($baris=mysqli_fetch_array($kelas)){
                            echo "<option value='$baris[idkelas]'>$baris[kelas]</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="tahun" required>
                        <option value="">==pilih tahun==</option>
                        <option value="2023/2024">2023/2024</option>
                        <option value="2024/2025">2024/2025</option>
                        <option value="2025/2026">2025/2026</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="tambah">Tambahkan</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<div style="width: 48%;min-height:300px;float:left;padding-left:5px;">
    <h3 style="color:green;"> Siswa Sudah Punya Kelas</h3>
    <table border="1" width="100%" cellspacing=0 cellpadding=0>
        <tr>
            <th>Kelas</th>
            <th>Nama Siswa</th>
            <th>Tahun</th>
        </tr>
        <?php
                    while($data=mysqli_fetch_array($setkelas)){
                        ?>
        <tr>
            <td><?=$data['kelas']?></td>
            <td><?=$data['nama_siswa']?></td>
            <td><?=$data['tahun']?></td>
        </tr>
        <?php
                    }
                    ?>
    </table>
</div>