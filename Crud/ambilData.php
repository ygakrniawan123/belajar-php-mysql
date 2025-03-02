<?php


include "koneksi.php";

$queryresult = $connect->$query("SELECT * FROM tb_buku");
$result=array();


while ($fecthData=$queryresult->fecth_assoc()){
    $result[]= $fecthData;
}

echo json_encode($result);