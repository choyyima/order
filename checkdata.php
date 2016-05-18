<?php
include "config.php";
if (isset($_GET['page'])) {
    if ($_GET['page'] === 'view') {
        ?>
        <div class="header">
            <h1 class="page-title">Check Data</h1>
            <ul class="breadcrumb">
                <li>Home </li>
                <li class="active">Check Data</li>
            </ul>
        </div>
        <div class="main-content">
            <div class="row">       
                <div class="col-sm-12 col-md-12">
                    <?php
                    if ($get['uName'] == 'admin' || $get['uName'] == 'lani' || $get['uName'] == 'yesi') {
                        ?>
                        <div class="btn-toolbar list-toolbar">
                            <a href="index.php?pic=checkdata&page=create" class="btn btn-success"><span class="fa fa-plus"></span> Tambah</a>                        
                            <div class="btn-group">
                            </div>
                        </div>
                    <?php } ?>
                    <div class="panel panel-default">
                        <a href="#widget1container" class="panel-heading" data-toggle="collapse"> Check Data</a>
                        <div id="widget1container" class="panel-body collapse in">
                            <div class="box-body table-responsive">
                                <table id="data" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="30px">No.</th>
                                            <?php
                                            if ($get['uName'] == 'admin' || $get['uName'] == 'lani' || $get['uName'] == 'yesi') {
                                                echo "<th></th>";
                                                echo "<th>Flag</th>";
                                            }
                                            ?>
                                            <th width="80px">Date Order</th>
                                            <th>SMS No. </th>
                                            <th>Buyer</th>
                                            <th>Project</th>
                                            <th>Item</th>
                                            <th>Qty</th>
                                            <th>Unit</th>
                                            <th width="80px">Date Process</th>
                                            <th>PO No. </th>
                                            <th>Vendor</th>
                                            <th>Shipping Estimate</th>
                                            <th>Contact Person</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysql_query("SELECT id,DATE_FORMAT(tanggal_order,'%d %b %Y') pesan,flag, no_sms, pemesan, nama_proyek, item, qty, satuan, DATE_FORMAT(tanggal_proses,'%d %b %Y') proses, no_po, vendor, DATE_FORMAT(estimasi,'%d %b %Y') kirim, cp FROM purchasing ORDER BY tanggal_order DESC, no_sms DESC");
                                        $total = mysql_num_rows($query);

                                        $no = 1;
                                        while ($result = mysql_fetch_array($query)) {
                                            echo"<tr>
                                                    <td>$no</td>";
                                            if ($get['uName'] == 'admin' || $get['uName'] == 'lani' || $get['uName'] == 'yesi') {
                                                echo "<td><a href= 'index.php?pic=checkdata&page=update&id=$result[id]' class='btn btn-info'> Edit</a></td>";
                                                echo "<td>$result[flag]</td>";
                                            }
                                            echo "    
                                                    <td>$result[pesan]</td>    
                                                    <td>$result[no_sms]</td>
                                                    <td>$result[pemesan]</td>
                                                    <td>$result[nama_proyek]</td>
                                                    <td>$result[item]</td>
                                                    <td>$result[qty]</td>
                                                    <td>$result[satuan]</td>
                                                    <td>$result[proses]</td>    
                                                    <td>$result[no_po]</td>
                                                    <td>$result[vendor]</td>    
                                                    <td>$result[kirim]</td> 
                                                    <td>$result[cp]</td>
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

        <script src="coba.js"></script>
        <div class="header">
            <h1 class="page-title">Create Data</h1>
            <ul class="breadcrumb">
                <li>Home </li>
                <li class="active">Create Data</li>
            </ul>
        </div>
        <div class="main-content">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#procces1" data-toggle="tab">Process 1</a></li>
            </ul>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <br/>
                    <div class="panel panel-default">
                        <a href="#widget1container" class="panel-heading" data-toggle="collapse"> Create Data SMS Center</a>
                        <div id="widget1container" class="panel-body collapse in">
                            <div class="box-body table-responsive">
                                <div class="tab-pane active in" id="procces1">
                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" name="form" method="post" id="tab">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Date Order / Tanggal Order</label>
                                                <input type="date" name="tanggal_order" value="<?php echo date("Y-m-d"); ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Time / Jam SMS</label>
                                                <input type="text" name="jam_sms" class="form-control">
                                            </div>
                                        </div>    
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>No. SMS</label>
                                                <input type="text" name="no_sms" class="form-control">
                                            </div>
                                        </div>                                        
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Buyer / Pemesan</label>
                                                <input type="text" name="pemesan" class="form-control">
                                            </div>
                                        </div>                                    
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Nama Proyek</label>
                                                <input type="text" name="nama_proyek" value="" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">                                        
                                            <div class="form-group">
                                                <label>Date Process / Tanggal Proses</label>
                                                <?php $date = new DateTime('+1 day'); ?>
                                                <input type="date" name="proses" value="<?php echo $date->format('Y-m-d') ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">                                        
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status_pic" class="form-control">
                                                    <option value="Waiting For Quotation">Waiting For Quotation</option>
                                                    <option value="Waiting Approval Director">Waiting Approval Director</option>
                                                    <option value="PO">PO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="panel panel-default" style="border-color: #337ab7;">
                                                <a href="#widget1container" class="panel-heading" data-toggle="collapse" style="background: #337ab7; border-color: #337ab7; color: white;"> Order</a>
                                                <div id="widget1container" class="panel-body collapse in">
                                                    <button class="btn btn-primary" id="add" ><span class="fa fa-plus"> Tambah</span> </button> 
                                                    <button class="btn btn-danger" id="delete" ><span class="fa fa-minus">  Hapus </span></button>
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-xs-1">#</th>
                                                                <th>Item</th>
                                                                <th class="col-lg-2">Qty</th>
                                                                <th class="col-lg-2">Unit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="addProduct">
                                                            <tr id="first" style="display:none">
                                                                <td><input type="checkbox" class="checkbox"/></td>
                                                                <td><input name="item[]" type="text" class="form-control"/></td>
                                                                <td><input name="qty[]"  type="text" class="form-control col-lg-4" /></td>
                                                                <td><input name="unit[]" type="text" class="form-control" /></td>
                                                            </tr>
                                                            <tr id="empty"><td colspan="4" align='center'>Tidak  ada data yang dimasukkan.</td></tr>
                                                        </tbody>
                                                    </table>
                                                </div>  
                                            </div>
                                            <div class="col-lg-12">    
                                                <div class="form-group">
                                                    <button class="btn btn-primary" name="saveadd" type="submit"> Submit</button>
                                                    <input type="hidden" name="counter" id="counter">
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (isset($_POST['saveadd'])) {
            $tgl_order = $_POST['tanggal_order'];
            $jam_sms = $_POST['jam_sms'];
            $no_sms = $_POST['no_sms'];
            $pemesan = $_POST['pemesan'];
            $nama_proyek = $_POST['nama_proyek'];
            $item = $_REQUEST['item'];
            $qty = $_REQUEST['qty'];
            $unit = $_REQUEST['unit'];
            $proses = $_POST['proses'];
            $status_pic = $_POST['status_pic'];
            $datenow = date("Y-m-d h:i:s");
            $cnt = $_POST['counter'];
            for ($i = 0; $i < $cnt; $i++) {
                $sql = "insert into `purchasing` SET "
                        . "`tanggal_order`='$tgl_order', "
                        . "`no_sms`='$no_sms', "
                        . "`jam_sms`='$jam_sms', "
                        . "`pemesan`='$pemesan', "
                        . "`nama_proyek`='$nama_proyek', "
                        . "`item`='$item[$i]', "
                        . "`qty`='$qty[$i]', "
                        . "`satuan`='$unit[$i]', "
                        . "`tanggal_proses`='$proses', "
                        . "`status_pic`='$status_pic', "
                        . "`createdby`='$get[uName]', "
                        . "`created`='$datenow' ";

                $exc = mysql_query($sql);
                $newid = mysql_insert_id();
            }
            if ($exc) {
                echo "<script>alert('Berhasil ditambah.')</script>";
                echo "<script type='text/javascript'>document.location='./index.php?pic=checkdata&page=print&id=$no_sms'; </script>";
            } else {
                echo "<script>alert('Gagal! tidak dapat ditambah.')</script>";
            }
        }
    } elseif ($_GET['page'] === "update") {
        ?>

        <div class="header">
            <h1 class="page-title">Update Data</h1>
            <ul class="breadcrumb">
                <li>Home </li>
                <li class="active">Update Data</li>
            </ul>
        </div>
        <div class="main-content">
            <ul class="nav nav-tabs">
                <li><a href="#procces1" data-toggle="tab">Process 1</a></li>
                <li class="active"><a href="#procces2" data-toggle="tab">Process 2</a></li>
            </ul>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <?php
                    $gets = $_GET;
                    $id = $gets['id'];
                    $sql = mysql_query("Select * From purchasing where no_sms = '$id'");
                    $rows = mysql_fetch_array($sql);
                    if ($get['uName'] == 'admin') {
                        $active = "";
                    } else if ($get['uName'] == 'lani') {
                        $active = "readonly";
                    }
                    ?>
                    <br/>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade" id="procces1">
                            <div class="panel panel-default">
                                <a href="#widget1container" class="panel-heading" data-toggle="collapse"> Create Data SMS Center - Phase 1</a>
                                <div id="widget1container" class="panel-body collapse in">
                                    <div class="box-body table-responsive">
                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" name="form" method="post" id="tab">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Date Order / Tanggal Order</label>
                                                    <input type="date" name="tanggal_order" value="<?php echo $rows['tanggal_order']; ?>" class="form-control" readonly="">
                                                </div>
                                            </div>                                
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Time / Jam SMS</label>
                                                    <input type="text" name="jam_sms" value="<?php echo $rows['jam_sms']; ?>" class="form-control" readonly="">
                                                </div>
                                            </div>    
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>No. SMS</label>
                                                    <input type="text" name="no_sms" value="<?php echo $rows['no_sms']; ?>" class="form-control" readonly="">
                                                </div>
                                            </div>                                        
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Buyer / Pemesan</label>
                                                    <input type="text" name="pemesan" value="<?php echo $rows['pemesan']; ?>" class="form-control" readonly="">
                                                </div>
                                            </div>                                    
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Nama Proyek</label>
                                                    <input type="text" name="nama_proyek" value="<?php echo $rows['nama_proyek']; ?>" class="form-control" readonly="">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">                                        
                                                <div class="form-group">
                                                    <label>Date Process / Tanggal Proses</label>
                                                    <input type="date" name="proses" value="<?php echo $rows['tanggal_proses']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">                                        
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <?php
                                                    $cheked = "";
                                                    if ($rows['status_pic'] === 'Waiting Approval Director') {
                                                        $checked = 'checked';
                                                    } else if ($rows['status_pic'] === 'Waiting Approval Director') {
                                                        $checked = 'checked';
                                                    } else if ($rows['status_pic'] === 'PO') {
                                                        $checked = 'checked';
                                                    }
                                                    ?>
                                                    <select name="status_pic" class="form-control">
                                                        <option value="Waiting For Quotation" <?php echo $checked; ?>>Waiting For Quotation</option>
                                                        <option value="Waiting Approval Director" <?php echo $checked; ?>>Waiting Approval Director</option>
                                                        <option value="PO" <?php echo $checked; ?>>PO</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane active in" id="procces2">
                            <div class="panel panel-default">
                                <a href="#widget1container" class="panel-heading" data-toggle="collapse"> Create Data Purchase Order - Phase 2</a>
                                <div id="widget1container" class="panel-body collapse in">
                                    <div class="box-body table-responsive">
                                        <form action="<?php $_SERVER['PHP_SELF']; ?>" name="form" method="post" id="tab2">
                                            <div class="col-lg-4">                                    
                                                <div class="form-group">
                                                    <label>No. PO</label>
                                                    <input type="text" name="no_po" value="<?php echo $rows['no_po']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">                                    
                                                <div class="form-group">
                                                    <label>Flag</label>
                                                    <select name="flag" class="form-control">
                                                        <option value="AC">AC</option>
                                                        <option value="PD">PD</option>
                                                        <option value="Jeffry">Jeffry</option>
                                                        <option value="Willy">Willy</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">                                    
                                                <div class="form-group">
                                                    <label>Vendor / Supplier</label>
                                                    <input type="text" name="vendor" value="<?php echo $rows['vendor']; ?>" class="form-control">
                                                </div>
                                            </div>                                                                                        
                                            <div class="col-lg-3">                                    
                                                <div class="form-group">
                                                    <label>Pengorder</label>
                                                    <input type="text" name="pengorder" value="<?php echo $rows['pengorder']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                                    
                                                <div class="form-group">
                                                    <label>Estimasi Kirim</label>
                                                    <input type="date" name="estimasi" value="<?php echo $rows['estimasi']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                                    
                                                <div class="form-group">
                                                    <label>Contact Person / Kontak</label>
                                                    <input type="text" name="cp" value="<?php echo $rows['cp']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                                    
                                                <div class="form-group">
                                                    <label>Jatuh Tempo</label>
                                                    <input type="date" name="tempo" value="<?php echo $rows['tanggal_tempo']; ?>" class="form-control">
                                                </div>
                                            </div>

                                            <!-- <div class="col-sm-12">
                                                <div class="panel" style="border-color: #337ab7;">
                                                    <div class="panel-heading" style="background: #337ab7; border-color: #337ab7; color: white;">Finance</div>
                                                    <div id="widget1container" class="panel-body collapse in">
                                                        <div class="box-body table-responsive col-lg-6">
                                                            <table class="table table-bordered table-striped">
                                                                <tbody>
                                                                <thead>
                                                                <th class="success" colspan="2">
                                                                <div class="radio">
                                                                    <label>
                                                                        <input type="radio" name="check" class="checkbox-inline" value="radio1" /> <strong>Include PPN</strong>
                                                                    </label>
                                                                </div>
                                                                </th>
                                                                </thead>
                                                                <tr>
                                                                    <td style="text-align: right">Harga</td>
                                                                    <td style="width: 200px"><input type="text" onkeyup="autoComplete(this);
                                                                            formatangka(this);" value="<?php echo $rows['harga_ppn']; ?>" disabled="true" id="harga" class="radio1 form-control" name="harga" style="text-align: right"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align: right">PPN</td>
                                                                    <td><input type="text" class="form-control" name="ppn" id="ppn" style="text-align: right" value="1.1" readonly=""></td>
                                                                </tr>         
                                                                </tbody>
                                                            </table>
                                                        </div>
                                            -->
                                            <!-- <div class="box-body table-responsive col-lg-6">
                                                <table class="table table-bordered table-striped">
                                                    <tbody>
                                                    <thead>
                                                    <th class="danger" colspan="2">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="check" class="checkbox-inline" value="radio2" /> <strong>Non PPN</strong>
                                                        </label>
                                                    </div>
                                                    </th>
                                                    </thead>
                                                    <tr>
                                                        <td style="text-align: right">Harga</td>
                                                        <td style="width: 200px"><input type="text" onkeyup="autoComplete(this);
                                                                formatangka(this);" value="<?php echo $rows['harga']; ?>" disabled="true" id="harganoppn" class="radio2 form-control" name="harganoppn" style="text-align: right"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div> -->

                                            <!-- <div class="box-body table-responsive col-lg-12">
                                                <table class="table table-bordered table-striped">
                                                    <tbody>
                                                        <tr class="info">
                                                            <td style="text-align: right">Total Inc Qty</td>
                                                            <td><input type="text" class="form-control" id="total" name="total" value="<?php echo $rows['total']; ?>" style="text-align: right" readonly=""></td>
                                                        </tr>
                                                        <tr class="info">
                                                            <td style="text-align: right">Subtotal</td>
                                                            <td style="width: 200px"><input type="text" value="<?php echo $rows['subtotal']; ?>" id="subtotal" class="form-control" name="harga" style="text-align: right" readonly=""></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> -->
                                            <!--      </div>
                                             </div>
                                         </div>
                                 </div>   -->
                                            <div class="col-sm-12 col-md-12">
                                                <div class="panel panel-default" style="border-color: #337ab7;">
                                                    <a href="#widget1container" class="panel-heading" data-toggle="collapse" style="background: #337ab7; border-color: #337ab7; color: white;"> Order</a>
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-xs-1">#</th>
                                                                <th>Item</th>
                                                                <th class="col-lg-2">Qty</th>
                                                                <th class="col-lg-2">Unit</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="addProduct">
                                                            <tr><td colspan="4" align='center'>Tidak  ada data yang dimasukkan.</td></tr>
                                                        </tbody>
                                                    </table>
                                                </div>  
                                            </div>
                                            <div class="col-lg-12">    
                                                <div class="form-group">
                                                    <button class="btn btn-primary" name="save" type="submit"> Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
            <script type="text/javascript">

                function formatangka(objek) {
                    a = objek.value;
                    b = a.replace(/[^\d]/g, "");
                    c = "";
                    panjang = b.length;
                    j = 0;
                    for (i = panjang; i > 0; i--) {
                        j = j + 1;
                        if (((j % 3) === 1) && (j !== 1)) {
                            c = b.substr(i - 1, 1) + "," + c;
                        } else {
                            c = b.substr(i - 1, 1) + c;
                        }
                    }
                    objek.value = c;
                }

                $(document).ready(function () {
                    $('input[type=radio][name=check]').click(function () {
                        var related_class = $(this).val();
                        $('.' + related_class).prop('disabled', false);

                        $('input[type=radio][name=check]').not(':checked').each(function () {
                            var other_class = $(this).val();
                            $('.' + other_class).prop('disabled', true).val("0");
                            $('#total').val("0");
                            $('#subtotal').val("0");
                        });
                    });
                });

                function autoComplete(value)
                {
                    harga = Number(document.getElementById('harga').value.replace(/[^0-9\.]+/g, ""));
                    harganoppn = Number(document.getElementById('harganoppn').value.replace(/[^0-9\.]+/g, ""));
                    ppn = document.getElementById('ppn').value;
                    qty = document.getElementById('qty').value;

                    //ngitung harga + ppn
                    if (harga > 0) {
                        jmlh = harga * ppn;
                    } else {
                        jmlh = harga;
                    }

                    //ngitung total ke subtotal    
                    if (jmlh > 0) {
                        sub = jmlh * qty;
                    } else {
                        sub = jmlh;
                    }

                    //ngitung non ppn
                    if (harganoppn > 0) {
                        subto = harganoppn * qty;
                    } else {
                        subto = harganoppn;
                    }

                    var a = parseInt(jmlh);
                    var b = parseInt(sub);
                    var c = parseInt(subto);
                    var d = parseInt(harganoppn);
                    var aaa = number_format(a);
                    var bbb = number_format(b);
                    var ccc = number_format(c);
                    var ddd = number_format(harganoppn);
                    if (a !== 0) {
                        document.getElementById("total").value = aaa;
                        document.getElementById("subtotal").value = bbb;
                    } else if (c !== 0) {
                        document.getElementById("total").value = ddd;
                        document.getElementById("subtotal").value = ccc;
                    }

                }

            </script>

            <?php
            if (isset($_POST['save'])) {
                $datenow = date("Y-m-d h:i:s");
                $no_po = $_POST['no_po'];
                $flag = $_POST['flag'];
                $pengorder = $_POST['pengorder'];
                $tempo = $_POST['tempo'];
                $vendor = $_POST['vendor'];
                $estimasi = $_POST['estimasi'];
                $cp = $_POST['cp'];
                $harga_ppn = $_POST['harga_ppn'];
                $harga = $_POST['harga'];
                $total = $_POST['total'];
                $subtotal = $_POST['subtotal'];
                $id = $gets['id'];
                $updateby = $gets['uName'];
                $updated = $datenow;

                $sql = "UPDATE `purchasing` SET "
                        . "`no_po`='$no_po', "
                        . "`flag`='$flag', "
                        . "`pengorder`='$pengorder', "
                        . "`tanggal_tempo`='$tempo', "
                        . "`vendor`='$vendor', "
                        . "`estimasi`='$estimasi', "
                        . "`cp`='$cp' "
                        . "`harga_ppn`='$harga_ppn, "
                        . "`harga`='$harga', "
                        . "`total`='$total', "
                        . "`subtotal`='$subtotal', "
                        . "`updatedby`='$updateby', "
                        . "`updated`='$updated', "
                        . "WHERE (`id`='$id')";
// echo $sql;
// die();

                $result = mysql_query($sql);

                if ($result) {
                    echo "<script>alert('Berhasil dirubah.')</script>";
                    echo "<script type='text/javascript'>document.location='./index.php?pic=checkdata&page=checkout&id=$id'; </script>";
                } else {
                    echo "<script>alert('Gagal! tidak dapat dirubah.')</script>";
                }
            }
        } elseif ($_GET['page'] === "checkout") {
            ?>

            <div class="header">
                <h1 class="page-title">Update Data</h1>
                <ul class="breadcrumb">
                    <li>Home </li>
                    <li class="active">Update Data</li>
                </ul>
            </div>
            <div class="main-content">
                <ul class="nav nav-tabs">
                    <li><a href="#procces1" data-toggle="tab">Process 1</a></li>
                    <li><a href="#procces2" data-toggle="tab">Process 2</a></li>
                    <li class="active"><a href="#procces3" data-toggle="tab">Process 3</a></li>
                </ul>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <?php
                        $gets = $_GET;
                        $id = $gets['id'];
                        $sql = mysql_query("Select * From purchasing where id = '$id'");
                        $rows = mysql_fetch_array($sql);
                        if ($get['uName'] == 'admin') {
                            $active = "";
                        } else if ($get['uName'] == 'lani') {
                            $active = "readonly";
                        }
                        ?>

                        <br/>

                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade" id="procces1">
                                <div class="panel panel-default">
                                    <a href="#widget1container" class="panel-heading" data-toggle="collapse"> Create Data SMS Center - Phase 1</a>
                                    <div id="widget1container" class="panel-body collapse in">
                                        <div class="box-body table-responsive">
                                            <form action="<?php $_SERVER['PHP_SELF']; ?>" name="form" method="post" id="tab">
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Date Order / Tanggal Order</label>
                                                        <input type="date" name="tanggal_order" value="<?php echo $rows['tanggal_order']; ?>" class="form-control" readonly="">
                                                    </div>
                                                </div>                                
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Time / Jam SMS</label>
                                                        <input type="time" name="jam_sms" value="<?php echo $rows['jam_sms']; ?>" class="form-control" readonly="">
                                                    </div>
                                                </div>    
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>No. SMS</label>
                                                        <input type="text" name="no_sms" value="<?php echo $rows['no_sms']; ?>" class="form-control" readonly="">
                                                    </div>
                                                </div>                                        
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label>Buyer / Pemesan</label>
                                                        <input type="text" name="pemesan" value="<?php echo $rows['pemesan']; ?>" class="form-control" readonly="">
                                                    </div>
                                                </div>                                    
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Nama Proyek</label>
                                                        <input type="text" name="nama_proyek" value="<?php echo $rows['nama_proyek']; ?>" class="form-control" readonly="">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">                                        
                                                    <div class="form-group">
                                                        <label>Date Process / Tanggal Proses</label>
                                                        <input type="date" name="proses" value="<?php echo $rows['tanggal_proses']; ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">                                        
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <?php
                                                        $cheked = "";
                                                        if ($rows['status_pic'] === 'Waiting Approval Director') {
                                                            $checked = 'checked';
                                                        } else if ($rows['status_pic'] === 'Waiting Approval Director') {
                                                            $checked = 'checked';
                                                        } else if ($rows['status_pic'] === 'PO') {
                                                            $checked = 'checked';
                                                        }
                                                        ?>
                                                        <select name="status_pic" class="form-control">
                                                            <option value="Waiting For Quotation" <?php echo $checked; ?>>Waiting For Quotation</option>
                                                            <option value="Waiting Approval Director" <?php echo $checked; ?>>Waiting Approval Director</option>
                                                            <option value="PO" <?php echo $checked; ?>>PO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="panel" style="border-color: #337ab7;">
                                                        <div class="panel-heading" style="background: #337ab7; border-color: #337ab7; color: white;">Order</div>
                                                        <div id="widget1container" class="panel-body collapse in">
                                                            <div class="box-body table-responsive">
                                                                <div class="col-lg-8">
                                                                    <div class="form-group">
                                                                        <label>Item</label>
                                                                        <textarea rows="2" name="item" class="form-control" readonly=""><?php echo $rows['item']; ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <div class="form-group">
                                                                        <label>Qty</label>
                                                                        <input type="text" name="qty" value="<?php echo $rows['qty']; ?>" class="form-control" readonly="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <div class="form-group">
                                                                        <label>Unit / Satuan</label>
                                                                        <input type="text" name="unit" value="<?php echo $rows['satuan']; ?>" class="form-control" readonly="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="procces2">
                                <div class="panel panel-default">
                                    <a href="#widget1container" class="panel-heading" data-toggle="collapse"> Create Data Purchase Order - Phase 3</a>
                                    <div id="widget1container" class="panel-body collapse in">
                                        <div class="box-body table-responsive">
                                            <form action="<?php $_SERVER['PHP_SELF']; ?>" name="form" method="post" id="tab2">
                                                <div class="col-lg-4">                                    
                                                    <div class="form-group">
                                                        <label>No. PO</label>
                                                        <input type="text" name="no_po" value="<?php echo $rows['no_po']; ?>" class="form-control" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">                                    
                                                    <div class="form-group">
                                                        <label>Flag</label>
                                                        <select name="flag" class="form-control" readonly>
                                                            <option value="AC">AC</option>
                                                            <option value="PD">PD</option>
                                                            <option value="Jeffry">Jeffry</option>
                                                            <option value="Willy">Willy</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">                                    
                                                    <div class="form-group">
                                                        <label>Vendor / Supplier</label>
                                                        <input type="text" name="vendor" value="<?php echo $rows['vendor']; ?>" class="form-control" readonly="">
                                                    </div>
                                                </div>                                                                                        
                                                <div class="col-lg-3">                                    
                                                    <div class="form-group">
                                                        <label>Pengorder</label>
                                                        <input type="text" name="pengorder" value="<?php echo $rows['pengorder']; ?>" class="form-control" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">                                    
                                                    <div class="form-group">
                                                        <label>Estimasi Kirim</label>
                                                        <input type="date" name="estimasi" value="<?php echo $rows['estimasi']; ?>" class="form-control" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">                                    
                                                    <div class="form-group">
                                                        <label>Contact Person / Kontak</label>
                                                        <input type="text" name="cp" value="<?php echo $rows['cp']; ?>" class="form-control" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">                                    
                                                    <div class="form-group">
                                                        <label>Jatuh Tempo</label>
                                                        <input type="date" name="tempo" value="<?php echo $rows['tempo']; ?>" class="form-control" readonly="">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="panel" style="border-color: #337ab7;">
                                                        <div class="panel-heading" style="background: #337ab7; border-color: #337ab7; color: white;">Finance</div>
                                                        <div id="widget1container" class="panel-body collapse in">
                                                            <div class="box-body table-responsive">
                                                                <table class="table table-bordered table-striped">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="text-align: right">Harga Exc PPN</td>
                                                                            <td style="width: 200px"><input type="text" class="form-control" name="harga" style="text-align: right" readonly=""></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="text-align: right">PPN</td>
                                                                            <td><input type="text" class="form-control" name="ppn" style="text-align: right" value="1.1" readonly=""></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="text-align: right">Total Incl PPN</td>
                                                                            <td><input type="text" class="form-control" name="total" style="text-align: right" readonly=""></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="text-align: right">TOTAL TAGIHAN</td>
                                                                            <td><input type="text" class="form-control" id="subtotal" name="subtotal" style="text-align: right" readonly=""></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>  
                                        <div class="col-lg-12">    
                                            <div class="form-group">
                                                <button class="btn btn-primary" name="save" type="submit"> Update</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane active in" id="procces3">
                                <div class="panel panel-default">
                                    <a href="#widget1container" class="panel-heading" data-toggle="collapse"> Create Data Purchase Order - Phase 3</a>
                                    <div id="widget1container" class="panel-body collapse in">
                                        <div class="box-body table-responsive">
                                            <form action="<?php $_SERVER['PHP_SELF']; ?>" name="form" method="post" id="tab2">
                                                <div class="col-lg-4">                                    
                                                    <div class="form-group">
                                                        <label>Delivery Date</label>
                                                        <input type="date" name="delivery" value="<?php echo $rows['no_po']; ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">                                    
                                                    <div class="form-group">
                                                        <label>No. Surat Jalan</label>
                                                        <input type="text" name="surat_jalan" value="<?php echo $rows['vendor']; ?>" class="form-control">
                                                    </div>
                                                </div>                                                                                        
                                                <div class="col-lg-3">                                    
                                                    <div class="form-group">
                                                        <label>Recipient Name</label>
                                                        <input type="text" name="recipient" value="<?php echo $rows['pengorder']; ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">    
                                                    <div class="form-group">
                                                        <button class="btn btn-primary" name="save" type="submit"> Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
                <?php
                if (isset($_POST['save'])) {
                    $tgl_order = $_POST['tanggal_order'];
                    $no_sms = $_POST['no_sms'];
                    $pemesan = $_POST['pemesan'];
                    $flag = $_POST['flag'];
                    $nama_proyek = $_POST['nama_proyek'];
                    $item = $_POST['item'];
                    $qty = $_POST['qty'];
                    $satuan = $_POST['satuan'];
                    $tanggal_proses = $_POST['tanggal_proses'];
                    $no_po = $_POST['no_po'];
                    $vendor = $_POST['vendor'];
                    $estimasi = $_POST['estimasi'];
                    $cp = $_POST['cp'];
                    $id = $gets['id'];

                    $sql = "UPDATE `purchasing` SET "
                            . "`tanggal_order`='$tgl_order', "
                            . "`no_sms`='$no_sms', "
                            . "`pemesan`='$pemesan', "
                            . "`flag`='$flag', "
                            . "`nama_proyek`='$nama_proyek', "
                            . "`item`='$item', "
                            . "`qty`='$qty', "
                            . "`satuan`='$satuan', "
                            . "`tanggal_proses`='$tanggal_proses', "
                            . "`no_po`='$no_po', "
                            . "`vendor`='$vendor', "
                            . "`estimasi`='$estimasi', "
                            . "`cp`='$cp' "
                            . "WHERE (`id`='$id')";
// echo $sql;
// die();

                    $result = mysql_query($sql);

                    if ($result) {
                        echo "<script>alert('Berhasil dirubah.')</script>";
                        echo "<script type='text/javascript'>document.location='./index.php?pic=checkdata&page=view'; </script>";
                    } else {
                        echo "<script>alert('Gagal! tidak dapat dirubah.')</script>";
                    }
                }
            } elseif ($_GET['page'] === "print") {
                $gets = $_GET;
                $id = $gets['id'];
                $sql = mysql_query("SELECT DATE_FORMAT(tanggal_order,'%d %b %Y') pesan, jam_sms, no_sms, pemesan, nama_proyek, tanggal_proses,  
                            (select replace(GROUP_CONCAT(DISTINCT p.item,' - ', p.qty,'  ', p.satuan),',',', ') orderan from purchasing p where p.no_sms='$id') orderan,
                            createdby FROM purchasing WHERE no_sms='$id'
                            GROUP BY no_sms");
                $rows = mysql_fetch_array($sql);
                if ($get['uName'] == 'admin') {
                    $active = "";
                } else if ($get['uName'] == 'lani') {
                    $active = "readonly";
                }
                ?>
                <script type="text/javascript">
                    function printDiv(divName) {
                        var printContents = document.getElementById(divName).innerHTML;
                        var originalContents = document.body.innerHTML;
                        document.body.innerHTML = printContents;
                        window.print();
                        document.body.innerHTML = originalContents;
                    }
                </script>
                <style>
                    .well-a{
                        border: 2px solid black;
                    }
                    .hr{
                        border: 1px solid #101010;
                    }

                    .tabel{
                        border: 1px solid #101010;
                    }
                    .tabeltr {
                        border: 1px solid #101010;
                    }
                </style>
                <div class="main-content well-a " id="print">
                    <div class="row padding-top">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h4><span class="fa fa-building"></span> Procurement Information Center</h4>
                                    <h5 class="text-center">Permintaan Pembelian Bahan</h5><p class="text-center text-sm text-primary">via SMS center 0816.1511.6666</p>
                                    <div class="hr"></div>
                                </div>
                                <div class="pull-left unstyled col-sm-6 col-md-6">
                                    <p><strong>Pemesan : </strong><?php echo $rows['pemesan']; ?></p>
                                    <p><strong>Tanggal : </strong><?php echo $rows['pesan']; ?></p>     
                                </div>
                                <div style="text-align: right;" class="pull-right unstyled col-sm-6 col-md-6">
                                    <p><strong>Time : </strong><?php echo $rows['jam_sms']; ?></p>
                                    <p><strong>No. SMS : </strong><?php echo $rows['no_sms']; ?></p>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="tabel table table-bordered table-striped">
                                        <thead>
                                            <tr class="tabeltr danger">
                                                <th>Pesanan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><p>Permintaan Material Proyek <strong><?php echo $rows['nama_proyek']; ?></strong>: <?php echo $rows['orderan']; ?>  </p></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="pull-left unstyled col-sm-6 col-md-6">
                                    <p>Diterima,</p><br/>
                                    <p>(Ningsih)<br/><p class="text-sm"><i>Operator</i></p></p>     
                                </div>
                                <div style="text-align: right;" class="pull-right unstyled col-sm-6 col-md-6">
                                    <p>Diarsip,</p><br/>
                                    <p>(Ivana)<br/><p class="text-sm"><i>Pembelian</i></p></p> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!--<input type="button" value="Open window"  />-->
                        <button class="btn btn-danger" onclick="printDiv('print');"><span class="fa fa-print"> Print</span></button>
                        <a href="./index.php?pic=checkdata&page=view" class="btn btn-default"> Back</a>
                    </div>
                </div>
                <?php
            }
        }    