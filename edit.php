<?php
require __DIR__ . '/inc/all.inc.php';

$id = (int) ($_GET['id'] ?? 0);

$worldCityRepository = new WorldCityRepository($pdo);
$model = $worldCityRepository->fetchById($id);
if (empty($model)) {
    redirectToHome();
}

if (!empty($_POST)) {
    $city = (string) ($_POST['city'] ?? '');
    $cityAscii = (string) ($_POST['cityAscii'] ?? '');
    $country = (string) ($_POST['country'] ?? '');
    $capital = (string) ($_POST['capital'] ?? '');
    $population = (int) ($_POST['population'] ?? 0);
    $iso2 = (string) ($_POST['iso2'] ?? '');
    $iso3 = (string) ($_POST['iso3'] ?? '');

    if (empty($city) || empty($cityAscii) || empty($country) || empty($population) || empty($iso2) || empty($iso3)) {
        redirectToHome();
    }

    $worldCityRepository->update($id, [
        'city' => $city,
        'city_ascii' => $cityAscii,
        'country' => $country,
        'capital' => $capital,
        'population' => $population,
        'iso2' => $iso2,
        'iso3' => $iso3
    ]);

    redirectToCity($id);
};

render('edit.view', ['city' => $model]);