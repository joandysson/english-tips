<?php

namespace App\Config\Router;

use Closure;

class Router extends Dispatch
{
    private static string $namespace = 'App\Controllers';

    private static string $prefix = '';

    public function __construct()
    {
        parent::__construct();
        self::init();
    }

    public static function init(): void
    {
        require_once dirname(__DIR__) . '../../../routes/web.php';
    }

    public static function prefix(string $prefix = ''): void
    {
        self::$prefix = $prefix;
    }

    public static function post($route, $handler, $name = null): void
    {
        self::addRoute('POST', $route, $handler, $name);
    }

    public static function get($route, $handler, $name = null): void
    {
        self::addRoute('GET', $route, $handler, $name);
    }

    public static function put($route, $handler, $name = null): void
    {
        self::addRoute('PUT', $route, $handler, $name);
    }

    public static function patch($route, $handler, $name = null): void
    {
        self::addRoute('PATCH', $route, $handler, $name);
    }

    public static function delete($route, $handler, $name = null): void
    {
        self::addRoute('DELETE', $route, $handler, $name);
    }

    protected static function addRoute($method, $route, $handler, $name = null): void
    {
        if (self::$prefix !== '') {
            $route = self::$prefix . ($route === '/' ? '' : $route);
        }

        if ($route == '/') {
            self::addRoute($method, '', $handler, $name);
        }

        preg_match_all('~\{\s* ([a-zA-Z_][a-zA-Z0-9_-]*) }~x', $route, $keys, PREG_SET_ORDER);
        $routeDiff = array_values(array_diff(explode('/', parent::$patch), explode('/', $route)));

        $offset = parent::$group ? 1 : 0;

        foreach ($keys as $key) {
            parent::$data[$key[1]] = $routeDiff[$offset] ?? null;
            $offset++;
        }

        parent::formSpoofing();

        $route = (!parent::$group ? $route : '/' . parent::$group . "{$route}");

        $data = parent::$data;

        $namespace = self::$namespace;
        $router = function () use ($method, $handler, $data, $route, $name, $namespace) {
            return [
                'route' => $route,
                'name' => $name,
                'method' => $method,
                'handler' => self::handler($handler, $namespace),
                'action' => self::action($handler),
                'data' => $data
            ];
        };
        if (parent::$data) {
            parent::$data = [];
        }

        $route = preg_replace('~{([^}]*)}~', '([^/]+)', $route);

        parent::$routes[$method][$route] = $router();
    }

    private static function handler($handler, $namespace): Closure|string
    {
        return (!is_string($handler) ? $handler : "{$namespace}\\" . explode(parent::$separator, $handler)[0]);
    }

    private static function action($handler): bool|string|null
    {
        return (!is_string($handler)
            ?: (explode(parent::$separator, $handler)[1] ? explode(parent::$separator, $handler)[1] : null));
    }

    public static function route($name, $data = null): ?string
    {
        foreach (static::$routes as $http_verb) {
            foreach ($http_verb as $route_item) {
                if (!empty($route_item['name']) && $route_item['name'] == $name || $route_item['route'] === $name) {
                    $route_item['route'] = empty($route_item['route']) ? '/' : $route_item['route'];

                    return self::treat($route_item, $data);
                }
            }
        }

        return null;
    }

    public static function redirect(string $route, $data = null, $status = 301): void
    {
        http_response_code($status);

        if ($name = self::route($route, $data)) {
            header("Location: {$name}");
            exit;
        }

        if (filter_var($route, FILTER_VALIDATE_URL)) {

            header("Location: {$route}");
            exit;
        }

        $route = (str_starts_with($route, '/') ? $route : "/{$route}");
        header("Location: " . parent::$projectUrl . "{$route}");
        exit;
    }

    public static function redirectBack(): void
    {
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit;
    }

    private static function treat(array $route_item, array $data = null): string
    {
        $route = $route_item['route'];

        if (!empty($data)) {
            $arguments = [];
            $params = [];
            foreach ($data as $key => $value) {
                if (!str_contains($route, "{{$key}}")) {
                    $params[$key] = $value;
                }
                $arguments["{{$key}}"] = $value;
            }
            $route = self::process($route, $arguments, $params);
        }

        return parent::$projectUrl . $route;
    }

    private static function process($route, array $arguments, array $params = null): string
    {
        $params = (!empty($params) ? '?' . http_build_query($params) : null);
        return str_replace(array_keys($arguments), array_values($arguments), $route) . "{$params}";
    }

    public static function getUrl($slice = null): array|string
    {
        $route = explode('/', $_SERVER['REDIRECT_URL']);

        if ($slice === null) {
            return $route[$slice];
        }

        return $route;
    }
}
