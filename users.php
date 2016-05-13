<?php
include "config.php";
if (isset($_GET['page'])) {
    if ($_GET['page'] === 'view') {
        ?>
        <div class="header">
            <h1 class="page-title">Users</h1>
            <ul class="breadcrumb">
                <li>Home </li>
                <li class="active">Users</li>
            </ul>
        </div>
        <div class="main-content">
            <div class="row">       
                <div class="col-sm-12 col-md-12">
                    <?php
                    if ($get['uName'] == 'admin' || $get['uName'] == 'lani' || $get['uName'] == 'yesi') {
                        ?>
                        <div class="btn-toolbar list-toolbar">
                            <a href="index.php?pic=user&page=create" class="btn btn-success"><span class="fa fa-plus"></span> Tambah</a>                        
                            <div class="btn-group">
                            </div>
                        </div>
                    <?php } ?>
                    <div class="panel panel-default">
                        <a href="#widget1container" class="panel-heading" data-toggle="collapse"> User Data</a>
                        <div id="widget1container" class="panel-body collapse in">
                            <div class="box-body table-responsive">
                                <table id="data" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="30px">No.</th>
                                            <th width="80px">Username</th>
                                            <th>Oauth</th>
                                            <th>Status</th>
                                            <th>Last Login</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysql_query("SELECT * FROM user");
                                        $total = mysql_num_rows($query);

                                        $no = 1;
                                        while ($result = mysql_fetch_array($query)) {
                                            echo"<tr>
                                                    <td>$no</td>    
                                                    <td>$result[username]</td>    
                                                    <td>$result[oauth]</td>
                                                    <td>$result[status]</td>
                                                    <td>$result[last_login]</td>                      
                                                 </tr>";
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    } elseif ($_GET['page'] === "create") {
        ?>

        <div class="header">
            <h1 class="page-title">Create User</h1>
            <ul class="breadcrumb">
                <li>Home </li>
                <li class="active">Create User</li>
            </ul>
        </div>
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active in" id="home">
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" name="form" method="post">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" value="" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select name="jabatan" class="form-control" required="">
                                            <option value="0">-Pilih-</option>
                                            <?php
                                            $sql_jabatan = mysql_query("SELECT * FROM jabatan");
                                            while ($data = mysql_fetch_array($sql_jabatan)) {
                                                ?>
                                                <option value="<?php echo $data['id']; ?>"><?php echo $data['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>No. HP</label>
                                        <input name="no_hp" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" name="saveadd" type="submit"> Save</button>
                                        <a href="index.php?pic=pm&page=view" class="btn btn-default">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <?php
        if (isset($_POST['saveadd'])) {
            $nama = $_POST['nama'];
            $jabatan = $_POST['jabatan'];
            $no_hp = $_POST['no_hp'];

            $sql = "insert into `employee` SET "
                    . "`nama`='$nama', "
                    . "`id_jabatan`='$jabatan', "
                    . "`no_hp`='$no_hp'";

            $result = mysql_query($sql);

            if ($result) {
                echo "<script>alert('Berhasil ditambah.')</script>";
                echo "<script type='text/javascript'>document.location='./index.php?pic=pm&page=view'; </script>";
            } else {
                echo "<script>alert('Gagal! tidak dapat ditambah.')</script>";
            }
        }
    }
}
?>
