<?php

/**
 * @var WorldCityModel $city
 */
?>
<form method="post" action="edit.php?<?php echo http_build_query(['id' => $city->id]); ?>">
    <label for="city">City:</label>
    <input type="text" name="city" id="city" value="<?php echo e($city->city); ?>" required>

    <label for="cityAscii">City name (ascii):</label>
    <input type="text" name="cityAscii" id="cityAscii" value="<?php echo e($city->cityAscii); ?>" required>

    <label for="country">Country:</label>
    <input type="text" name="country" id="country" value="<?php echo e($city->country); ?>" required>
    <!-- <label for="flag">Flag of the country:</label>
    <input type="text" name="flag" id="flag" value="<?php echo e($city->getFlag()); ?>" required> -->
    <label for="capital">Capital:</label>
    <input type="text" name="capital" id="capital" value="<?php echo e($city->capital); ?>">

    <label for="population">Population:</label>
    <input type="number" name="population" id="population" value="<?php echo e($city->population); ?>" required>

    <label for="iso2">ISO2 code of the country:</label>
    <input type="text" name="iso2" id="iso2" value="<?php echo e($city->iso2); ?>" required>

    <label for="iso3">ISO3 code of the country:</label>
    <input type="text" name="iso3" id="iso3" value="<?php echo e($city->iso3); ?>" required>
    <!-- <label for="admin_name">Admin name:</label>
    <input type="text" name="admin_name" id="admin_name" value="<?php echo e($city->adminName); ?>" required> -->
    <br>
    <input type="submit" value="Submit">
</form>