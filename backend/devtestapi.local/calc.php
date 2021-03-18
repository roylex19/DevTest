<?php

header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: POST,GET");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

$data = json_decode(file_get_contents('php://input'), true);

$datetime = strtotime($data['date']);
$daysn = date('t', $datetime);
$percent = 10;
$daysy = date('z', mktime(0, 0, 0, 12, 31, date('Y', $datetime)));
$summadd = $data['depositReplenishment'] == 1 ? $data['depositReplenishmentAmount'] : 0;
$summn_1 = $data['depositAmount'];

$summn = $summn_1 + ($summn_1 + $summadd) * $daysn * ($percent / $daysy);

echo json_encode(['result' => (int)$summn]);
