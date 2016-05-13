<form action="tambahMk.php" method="post">
    <table border="1" class="statistica"  align="center" width="85%">
        <tr>
            <td width="350" bgcolor="#66FF99"><b>ID Matakuliah</b></td>
            <td align="center" width="" bgcolor="#CCCCCC"><b>:</b></td>
            <td width=""><input type="text" name="idMk" maxlength="9" size="70"></td>
        </tr>
        <tr>
            <td bgcolor="#00FF33"><b>Nama Matakuliah</b></td>
            <td align="center" bgcolor="#CCCCCC"><b>:</b></td>
            <td><input type="text" name="namaMk" size="70"></td>
        </tr>
        <tr>
            <td bgcolor="#66FF99"><b>Nama Dosen</b></td>
            <td align="center" bgcolor="#CCCCCC"><b>:</b></td>
            <td><?php
                include './config.php';
                $result = mysql_query("select * from purchasing");
                $jsArray = "var idDosen = new Array();\n";

                echo '<select name="namaDsn" onchange="document.getElementById(\'id_Dsn\').value = idDosen[this.value]">';
                echo '<option>------ pilih dosen ------</option>';

                while ($row = mysql_fetch_array($result)) {
                    echo '<option value="' . $row['flag'] . '">' . $row['flag'] . '</option>';
                    $jsArray .= "idDosen['" . $row['flag'] . "'] = '" . addslashes($row['id']) . "';\n";
                }

                echo '</select>';
                ?>  
            </td>
        </tr>
        <tr>
            <td bgcolor="#00FF33"><b>ID Dosen</b></td>
            <td align="center" bgcolor="#CCCCCC"><b>:</b></td>
            <td><input type="text" name="idDsn" id="id_Dsn" maxlength="9" readonly size="70"/>  
                <script type="text/javascript">
<?php echo $jsArray; ?>
                </script> 
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td align="right"><input type="submit" name="submit" value="Tambah" /></td>
        </tr>
    </table>
</form>
