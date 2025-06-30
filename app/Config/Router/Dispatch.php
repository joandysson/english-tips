<?php
namespace App\Config\Router;

abstract class Dispatch
{
    protected static mixed $httpMethod;
    protected static mixed $routes;
    protected static mixed $route;
    protected static string $patch;
    protected static mixed $projectUrl = null;
    protected static string $separator;
    protected static mixed $group = null;
    protected static mixed $data = null;
    protected static mixed $error = null;
    public static int $BAD_REQUEST = 400;
    public static int $NOT_FOUND = 404;
    public static int $METHOD_NOT_ALLOWED = 405;
    public static int $NOT_IMPLEMENTED = 501;

    public function __construct()
    {
        self::$patch = explode('?', $_SERVER['REQUEST_URI'])[0];
        self::$separator = ':';
        self::$httpMethod = $_SERVER['REQUEST_METHOD'];
    }

    public function __debugInfo()
    {
        return self::$routes;
    }

    public static function group($group = null): mixed
    {
        return self::$group = ($group ? str_replace('/', '', $group) : null);
    }

    public function data(): mixed
    {
        return self::$data;
    }

    public static function error(): mixed
    {
        return self::$error;
    }

    public static function run(): bool
    {
        if (empty(self::$routes) || empty(self::$routes[self::$httpMethod])) {
            self::$error = self::$NOT_IMPLEMENTED;
            return false;
        }

        self::$route = null;
        foreach (self::$routes[self::$httpMethod] as $key => $route) {
            if (preg_match('~^' . $key . '$~', self::$patch, $found)) {
                self::$route = $route;
            }
        }

        return self::execute();
    }

    private static function execute(): bool
    {
        if (self::$route) {
            if (is_callable(self::$route['handler'])) {
                call_user_func(self::$route['handler'], self::$route['data'] ?? []);
                return true;
            }

            $controller = self::$route['handler'];
            $method = self::$route['action'];

            if (class_exists($controller)) {
                $newController = new $controller();
                if (method_exists($controller, $method)) {
                    $newController->$method((self::$route['data'] ?? []));
                    return true;
                }

                self::$error = self::$METHOD_NOT_ALLOWED;
                return false;
            }

            self::$error = self::$BAD_REQUEST;
            return false;
        }

        self::$error = self::$NOT_FOUND;
        return false;
    }

    protected static function formSpoofing(): void
    {
        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        self::$data = is_array(self::$data) ? self::$data : [];
        if ($_FILES) {
            self::$data['files'] = $_FILES;
        }

        if (!empty($post['_method']) && in_array($post['_method'], ['PUT', 'PATCH', 'DELETE']) && is_array($post)) {
            self::$httpMethod = $post['_method'];
            self::$data = array_merge(self::$data, $post);

            unset(self::$data['_method']);
            return;
        }

        if (self::$httpMethod == 'POST' && is_array($post)) {
            self::$data = array_merge(self::$data, $post);
            return;
        }

        if (self::$httpMethod == 'GET') {
            if(!is_array(self::$data)) { self::$data = [];
            }

            $get = filter_input_array(INPUT_GET, FILTER_DEFAULT);
            if(!is_array($get)) { return;
            }
            self::$data = array_merge(self::$data, $get);
            return;
        }

        if (in_array(self::$httpMethod, ['PUT', 'PATCH', 'DELETE']) && !empty($_SERVER['CONTENT_LENGTH'])) {
            parse_str(file_get_contents('php://input', false, null, 0, $_SERVER['CONTENT_LENGTH']), $putPatch);
            self::$data = $putPatch;

            unset(self::$data['_method']);
            return;
        }

        self::$data = [];
    }
}
