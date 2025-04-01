<?php
require __DIR__ . '/inc/all.inc.php';

$budapest = new WorldCityModel();
$budapest->city = 'Budapest';
$budapest->country = 'Hungary';
$budapest->population = '3500000';

$helsinki = new WorldCityModel();
$helsinki->city = 'Helsinki';
$helsinki->country = 'Finland';
$helsinki->population = '1500000';

$oslo = new WorldCityModel();
$oslo->city = 'Oslo';
$oslo->country = 'Norway';
$oslo->population = '7500000';



$entries = [
    $budapest,
    $helsinki,
    $oslo
];

render('index.view', ['entries' => $entries]);