<?php include 'config.php'; ?>
<table border="1" id="data" class=" table table-bordered table-striped table-responsive">
    <thead>
        <tr>
            <th>No.</th>
            <th>PO Number / No. PO</th>
            <th>Date PO / Tanggal PO</th>
            <th>Flag / Bendera</th>
            <th>Vendor/ Supplier</th>
            <th>Buyer / Pemesan</th>
            <th>Estimation Date / Estimasi Kirim</th>
            <th>Contact Person / Kontak </th>
            <th>Term Of Date / Jatuh Tempo</th>
            <th>Item</th>
            <th>Qty</th>
            <th>Unit</th>
            <th>Unit Price / Harga Satuan</th>
            <th>PPN 10%</th>
            <th>Unit Price Final / Total</th>
            <th>Total Price Final / Total Harga * Qty</th>
            <th>Delivery Date / Tanggal Kirim</th>
            <th>Delivery Order / Surat Jalan</th>
            <th>Recipient / Penerima</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $dataCek = mysql_query("select * from purchasing where id='611'");
        while ($arr = mysql_fetch_array($dataCek)) {
            if (!empty($arr)) {
                ?>
                <tr>
                    <td align=center><?php echo $no; ?></td>
                    <td>
                        <?php echo $arr['no_po']; ?>
                    </td>
                    <td>
                        <?php echo $arr['tanggal_proses']; ?>
                    </td>
                    <td>                                                                                
                        <?php echo $arr['flag']; ?>
                    </td>
                    <td>
                        <?php echo $arr['vendor']; ?>
                    </td>
                    <td>
                        <?php echo $arr['pengorder']; ?>
                    </td>
                    <td>
                        <?php echo $arr['estimasi']; ?>
                    </td>
                    <td>
                        <?php echo $arr['cp']; ?>
                    </td>
                    <td>
                        <?php echo $arr['tanggal_tempo']; ?>
                    </td>
                    <td class="col-lg-3"><?php echo $arr['item']; ?></td>
                    <td align=center><?php echo $arr['qty']; ?></td>
                    <td align=center><?php echo $arr['satuan']; ?></td>
                    <td><?php echo $arr['harga']; ?></td>
                    <td><?php echo $arr['ppn']; ?></td> 
                    <td><?php echo $arr['total']; ?></td>
                    <td><?php echo $arr['subtotal']; ?></td>                                                                
                    <td>
                        <input type="date" name="delivery" value="<?php echo $arr['tanggal_kirim']; ?>" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="surat_jalan" value="<?php echo $arr['surat_jalan']; ?>" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="recipient" value="<?php echo $arr['recipient']; ?>" class="form-control">
                    </td>
                </tr>
                <?php
            } else {
                ?>
                <tr><td colspan=4 align='center'>Tidak ada data yang dimasukkan.</td></tr>      
                <?php
            }
            $no++;
        }
        ?>
    </tbody>
</table>