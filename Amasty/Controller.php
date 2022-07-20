<?php

require_once 'DB.php';

$name = $_POST['first'];
$sauce = $_POST['second'];
$size = $_POST['third'];
$result1 = DataBase::f1();
$result2 = DataBase::f2();

foreach ($result1 as $key) {
    if ($key['name'] == $name) {
        $price = $key['price'];
    }
}
foreach ($result2 as $key) {
    if ($key['name'] == $sauce) {
        $priceSauce = $key['price'];
    }
}
if ($size == '21') {
    $price *= 1;
} elseif ($size == '26') {
    $price *= 1.2;
} elseif ($size == '31') {
    $price *= 1.5;
} else {
    $price *= 2;
}
$price += $priceSauce;


$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.nbrb.by/api/exrates/rates/431',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer 4bdac3a5aaf0da94a3f9c11c7e7d02c97a33ab34a28703f2e42a2a36bc6ba883'
    ),
));

$response = curl_exec($curl);
curl_close($curl);
$arr = json_decode($response, 1);
$dollar = $arr['Cur_OfficialRate'];

$price *= $dollar;


if (isset($_POST['first']) && $_POST['first'] && isset($_POST['second']) && $_POST['second'] && isset($_POST['third']) && $_POST['third']) {
    echo json_encode(array('success' => 1, 'first' => $_POST['first'], 'second' => $_POST['second'], 'third' => $_POST['third'], 'price' => $price));
} else {
    echo json_encode(array('success' => 0));
}
