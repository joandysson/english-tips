<?php

namespace App\Models;

use App\Config\Model\BaseModel;
use DateTime;

/**
 * @package App\Models
 */
class Post extends BaseModel
{
    /**
     * @var string
     */
    private static string $table = 'posts';

    /**
     * @return array
     */
    public function all(): array
    {
        return parent::queryRaw('SELECT * FROM ' . self::$table);
    }

    public function whereRaw($where) {
        return parent::queryRaw('SELECT * FROM ' . self::$table . ' WHERE ' . $where);
    }

    public function keysetPagination(int $lastPage, int $perPage) {
        return parent::queryRaw('SELECT * FROM '. self::$table . ' WHERE id <= ' . $lastPage . ' AND status = "published" AND content IS NOT NULL ORDER BY id DESC LIMIT ' . $perPage);
    }

    public function getTotal() {
        return parent::queryRaw('SELECT COUNT(*) AS total FROM '. self::$table . ' WHERE status = "published" AND content IS NOT NULL');
    }

    public function getPaginate(int $page, int $perPage, int $lastId = 0, int $days = 30, string $field = 'created_at'): array
    {
        $date = new DateTime("-$days days");
        $date = $date->format('Y-m-d H:i:s');

        $condition = $page === 1 ? '' : ' id > ? AND';
        $params = $page === 1 ? [] : [$lastId];

        $sql = sprintf(
            'SELECT * FROM %s WHERE %s deleted_at IS NULL AND %s > "%s" ORDER BY id ASC LIMIT %d',
            self::$table,
            $condition,
            $field,
            $date,
            $perPage
        );

        return parent::queryRaw($sql, $params);
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public static function byId(int $id): mixed
    {
        $result = parent::queryRaw('SELECT * FROM ' . self::$table . ' WHERE id = ? AND deleted_at IS NULL', [$id]);

        return current($result);
    }

    public function getByShortId(string $shorId): mixed
    {
        $result = parent::queryRaw(
            'SELECT * FROM ' . self::$table . ' WHERE short_id = ? AND deleted_at IS NULL',
            [$shorId]
        );

        return current($result);
    }

    public function getByShortIds(array $shorIds): array
    {
        $params = trim(str_repeat('?, ', count($shorIds)), ', ');
        return parent::queryRaw(
            'SELECT * FROM ' . self::$table . ' WHERE short_id in ('. $params .')',
            $shorIds
        );
    }

    /**
     * @param array $data
     * @return mixed
     */
    public static function create(array $data): mixed
    {
        $query = parent::prepareQueryCreate($data, self::$table);
        $result = parent::save($query, $data);

        return self::byId($result);
    }

    public static function update(int $id, array $data): mixed
    {
        $query = parent::prepareQueryUpdate($data, $id, self::$table);
        parent::save($query, $data);

        return self::byId($id);
    }

    public static function deleteByShortId(string $shortId): void
    {
        $date = date('Y-m-d H:i:s');

        $sql = 'UPDATE ' . self::$table;
        $sql .= ' SET deleted_at = :deleted_at, updated_at = :updated_at';
        $sql .= ' WHERE short_id = :id';

        self::save($sql, [
            ':deleted_at' => $date,
            ':updated_at' => $date,
            ':id' => $shortId
        ]);
    }

    public static function deleteByShortIds(array $shortIds): void
    {
        $param = self::formatParam($shortIds);
        $keys = implode(',', array_keys($param));

        self::updateDeletedAtByFieldValue('short_id', $keys, $param);
    }

    public static function deleteByUrls(array $urls): void
    {
        $param = self::formatParam($urls);
        $keys = implode(',', array_keys($param));

        self::updateDeletedAtByFieldValue('url', $keys, $param);
    }


    private static function updateDeletedAtByFieldValue(string $field, string $value, array $params): void
    {
        $date = date('Y-m-d H:i:s');

        $sql = 'UPDATE ' . self::$table;
        $sql .= ' SET deleted_at = :deleted_at, updated_at = :updated_at';
        $sql .= ' WHERE ' . $field. ' in ('. $value .')';
        $sql .= ' AND deleted_at IS NULL';

        self::save($sql, [
                ':deleted_at' => $date,
                ':updated_at' => $date,
            ] + $params);
    }

    private static function formatParam($data): array
    {
        $param = [];
        foreach ($data as $key => $value) {
            $newKey = (int) $key + 1;
            $param[':id' . $newKey] = $value;
        }

        return $param;
    }

    public function getByCategory(string $category, int $limit, array $exceptIds = []): array | null
    {
        $except = '';
        if (!empty($exceptIds)) {
            $except = ' AND id NOT IN (' . implode(',', $exceptIds) . ')';
        }

        $query = 'SELECT * FROM ' . self::$table . ' WHERE published_at IS NOT NULL AND status = "published" AND category = ?' . $except . ' ORDER BY RAND() LIMIT ' . $limit;
        $params = [$category];

        return parent::queryRaw($query, $params);
    }
}
