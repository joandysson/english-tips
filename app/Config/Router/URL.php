<?php

namespace App\Config\Router;

class URL
{
    private static array $url = [];
    public static array $labelPages = [];

    public static function getLabelPage($url)
    {
        return self::$labelPages[$url];
    }

    public static function get($positions): string
    {
        static::checkURL();
        $positions = func_get_args();

        if (! count($positions)) {
            return implode('/', static::$url);
        }

        $urlReturn = [];
        foreach ($positions as $position) {
            if (! array_key_exists($position, static::$url)) {
                continue;
            }
            $urlReturn[] = static::$url[$position];
        }

        return implode('/', $urlReturn);
    }

    private static function checkURL(): void
    {
        if (count(static::$url)) {
            return;
        }

        $uri = explode('?', $_SERVER['REQUEST_URI']);
        $url = explode('/', strip_tags(rawurldecode($uri[0])));

        if (empty($url[0])) {
            array_shift($url);
        }
        static::$url = $url;
    }
}