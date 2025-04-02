<h1>List of cities</h1>

<ul>
    <?php foreach ($entries as $city) { ?>
        <li>
            <a href="city.php?<?php echo http_build_query(['id' => $city->id]); ?>">
                <?php echo e($city->getCityWithCountry()); ?>
            </a>
        </li>
    <?php  } ?>
</ul>

<?php if ($pagination['page'] > 1) { ?>
    <a href="index.php?<?php echo http_build_query(['page' => $pagination['page'] - 1]); ?>">Previous</a>
<?php  } ?>
<?php if ($pagination['perPage'] * $pagination['page'] < $pagination['count']) { ?>
    <a href="index.php?<?php echo http_build_query(['page' => $pagination['page'] + 1]); ?>">Next</a>
<?php  } ?>