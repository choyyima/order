<?php
include './config.php';
function kodesms() {
    $query = mysql_query("SELECT no_sms, (substr(no_sms,4,2) + 1) as nosms FROM `order` order by id desc limit 1 ");
    $row = mysql_fetch_array($query);

    $depan = substr($row['no_sms'], 0, 2);
//    $belakang = getMo($row['no_sms']);
//    if ($belakang == '') {
//        $bel = '';
//    } else {
//        $bel = $belakang;
//    }
//    return $depan . '-' . $bel;
    return $depan;
}
