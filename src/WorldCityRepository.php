<?php

declare(strict_types=1);

class WorldCityRepository
{
    public function __construct(private PDO $pdo) {}

    public function fetchById(int $id): ?WorldCityModel
    {
        $stmt = $this->pdo->prepare('SELECT * 
            FROM `worldcities` 
            WHERE `id` = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $entry = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($entry === false) {
            return null;
        }

        return new WorldCityModel(
            $entry['id'],
            $entry['city'],
            $entry['city_ascii'],
            (float) $entry['lat'],
            (float) $entry['lng'],
            $entry['country'],
            $entry['iso2'],
            $entry['iso3'],
            $entry['admin_name'],
            $entry['capital'],
            $entry['population'],
        );
    }

    public function fetch(): array
    {
        $stmt = $this->pdo->prepare('SELECT *
        FROM `worldcities` 
        ORDER BY `population` DESC 
        LIMIT 25');
        // `id`, `city`, lat, `lng`, `country`, `iso2`, `iso3`, `capital`, `population` 

        $stmt->execute();

        $models = [];
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($entries as  $entry) {
            $models[] = new WorldCityModel(
                $entry['id'],
                $entry['city'],
                $entry['city_ascii'],
                (float) $entry['lat'],
                (float) $entry['lng'],
                $entry['country'],
                $entry['iso2'],
                $entry['iso3'],
                $entry['admin_name'],
                $entry['capital'],
                $entry['population'],
            );
        }

        return $models;
    }
}