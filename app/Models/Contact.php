<?php

namespace App\Models;

use App\Config\Model\BaseModel;

/**
 * @package App\Models
 */
class Contact extends BaseModel
{
    /**
     * @var string
     */
    private static string $table = 'contacts';

    /**
     * @param integer $id
     * @return mixed
     */
    public static function byId(int $id): mixed
    {
        $result = parent::queryRaw('SELECT * FROM ' . self::$table . ' WHERE id = ?', [$id]);

        return current($result);
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
}
