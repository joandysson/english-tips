<?php

CONST LANG_PT = 'pt';
CONST LANG_EN = 'en';
CONST LANG_FR = 'fr';
CONST LANG_ES = 'es';

/**
 * @param string $view
 * @param array $data
 * @param boolean $isMail
 * @return mixed
 */
function view(string $view, array $data = [], bool $isMail = false): mixed
{
    extract($data);
    $fileDir = $isMail
        ? 'public' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . 'email' . DIRECTORY_SEPARATOR
        : 'public' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;

    $filePath = $fileDir . $view . '.php';

    if (!is_file($filePath)) {
        exit('view not found');
    }

    ob_start();
    include $filePath;

    if ($isMail) {
        return ob_get_clean();
    }

    exit(ob_get_clean());
}

/**
 * @param string $file
 * @return string
 */
function asset(string $file): string
{
    return getenv('APP_URL') . '/' . "public" . '/' . "assets" . '/' . "{$file}";
}

function dd(mixed $data)
{
    echo '<pre>', var_dump($data);
    die;
}

/**
 * @param mixed $data
 * @return void
 */
function pd(mixed $data): void
{
    echo '<pre>', print_r($data, true);
    die;
}

/**
 * @param string $file
 * @return void
 */
function loadCSS(string $file): void
{
    $filePath = dirname(__DIR__) . '/public/assets/css/' . $file;
    $version = filemtime($filePath);
    $style = "<link rel='stylesheet' href='" . asset("css/$file") . "?v=$version' type='text/css'>";
    echo $style;
}

/**
 * @param bool $enable
 * @return void
 */
function errorReporting(bool $enable): void
{
    error_reporting(E_ALL);
    ini_set('display_errors', $enable);
}

function getTextLang(): array
{
    $data = file_get_contents(
        'public' . DIRECTORY_SEPARATOR . 'lang' . DIRECTORY_SEPARATOR . getPrefixLang() . '.json'
    );

    return json_decode($data, true) ?? [];
}

function getPrefixLang(): string
{
    $prefixLang = prefixLang();

    if(empty($prefixLang) || $prefixLang === LANG_PT || !in_array($prefixLang, languages())) {
        return LANG_PT;
    }

    return $prefixLang;
}

function prefixLang(): string
{
    $data = explode('/', $_SERVER['REDIRECT_URL']);
    return $data[1];
}

function getUri(string $uri): string
{
   return '/' . getPrefixLang() . ($uri === '/' ? '': $uri);
}

function changeLang(string $lang): string
{
    $langPrefix = array_map(fn ($value) => '/'.$value, languages());
    return match ($lang) {
        LANG_PT => str_replace($langPrefix, '/' . LANG_PT, $_SERVER['REQUEST_URI']),
        LANG_EN => str_replace($langPrefix, '/' . LANG_EN, $_SERVER['REQUEST_URI']),
        LANG_FR => str_replace($langPrefix, '/' . LANG_FR, $_SERVER['REQUEST_URI']),
        LANG_ES => str_replace($langPrefix, '/' . LANG_ES, $_SERVER['REQUEST_URI']),
        default => '/' . LANG_PT
    };
}

function languages(): array
{
    return [LANG_EN, LANG_PT, LANG_FR, LANG_ES, LANG_ES];
}

function __(string $text): string
{
    $texts = getTextLang();

    return $texts[$text] ?? $text;
}

function getHtmlLang(): string
{
    return match (getPrefixLang()) {
        LANG_EN => 'en-US',
        LANG_FR => 'fr-FR',
        LANG_ES => 'es-ES',
        default => 'pt-BR'
    };
}

function intlFormatDate(string $date): string
{
    $date = date_create($date);
        // str_replace('-','_', getHtmlLang())
    $fmt = new IntlDateFormatter(
        'pt_br',
        IntlDateFormatter::LONG,
        IntlDateFormatter::NONE
    );

    return $fmt->format($date);

}

function section(Closure $fun) {
    ob_start();

    $fun();

    return ob_get_clean();
}
