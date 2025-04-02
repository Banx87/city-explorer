<?php

declare(strict_types=1);

class WorldCityRepository
{
    public function __construct(private PDO $pdo) {}

    private function arrayToModel(array $entry): WorldCityModel
    {
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

        return $this->arrayToModel($entry);
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
            $models[] = $this->arrayToModel($entry);
        }

        return $models;
    }

    public function paginate(int $page, int $perPage = 15): array
    {
        // Page 0 or negative pages don't exist => Show page 1 then.
        $page = max(1, $page);

        $stmt = $this->pdo->prepare('SELECT *
        FROM `worldcities` 
        ORDER BY `population` DESC 
        LIMIT :limit OFFSET :offset');
        // `id`, `city`, lat, `lng`, `country`, `iso2`, `iso3`, `capital`, `population` 

        $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', ($page - 1) * $perPage, PDO::PARAM_INT);
        $stmt->execute();

        $models = [];
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($entries as  $entry) {
            $models[] = $this->arrayToModel($entry);
        }

        return $models;
    }

    public function count(): int
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) AS `count` FROM `worldcities`');
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }

    public function update(int $id, array $properties): bool
    {

        $fields = [];
        $params = [':id' => $id];

        foreach ($properties as $key => $value) {
            $fields[] = "`$key` = :$key";
            $params[":$key"] = $value;
        }

        $sql = 'UPDATE `worldcities` SET ' . implode(', ', $fields) . ' WHERE `id` = :id';
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute($params);
    }
}