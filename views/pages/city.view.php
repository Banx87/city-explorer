<?php

/**
 * @var WorldCityModel $city
 */
?>
<h1>CITY: <?php echo e($city->getCityWithCountry()) ?></h1>

<table>
    <tbody>
        <tr>
            <th>City name:</th>
            <td><?php echo e($city->city); ?></td>
        </tr>
        <tr>
            <th>City name (ascii):</th>
            <td><?php echo e($city->cityAscii); ?></td>
        </tr>
        <tr>
            <th>Country:</th>
            <td><?php echo e($city->country); ?></td>
        </tr>
        <tr>
            <th>Flag of the country:</th>
            <td><?php echo e($city->getFlag()); ?></td>
        </tr>
        <tr>
            <th>Capital:</th>
            <td><?php echo e($city->capital); ?></td>
        </tr>
        <tr>
            <th>Population:</th>
            <td><?php echo e($city->population); ?></td>
        </tr>
        <tr>
        <tr>
            <th>ISO2 code of country:</th>
            <td><?php echo e($city->iso2); ?></td>
        </tr>
        <th>ISO3 code of country:</th>
        <td><?php echo e($city->iso3); ?></td>
        </tr>
        <tr>
            <th>Admin name:</th>
            <td><?php echo e($city->adminName); ?></td>
        </tr>
    </tbody>
</table>