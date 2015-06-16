<?php
/**
 * Created by Vitaly Iegorov <egorov@samsonos.com>
 * on 05.03.14 at 12:25
 */
namespace samson\core;

/**  Отметка времени начала работы фреймворка */
define('__SAMSON_T_STARTED__', microtime(TRUE));

/** Constant for storing flag that current PHP version is really old */
define('__SAMSON_PHP_OLD', version_compare(PHP_VERSION, '5.3.0', '<'));

/** PHP 5 compatibility*/
if (!defined('__DIR__')) {
    define('__DIR__', dirname(__FILE__));
}

/** Define path to SamsonPHP framework */
define('__SAMSON_PATH__', __DIR__.'/../');

/** Namespace separator */
define('__NS_SEPARATOR__', '\\');

/** Get HTTP protocol **/
define('__SAMSON_PROTOCOL', (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT']== 443)) ? "https://" : "http://" );

if (strpos($_SERVER['SCRIPT_NAME'],'.php') === false) $_SERVER['SCRIPT_NAME'] = '/index.php';
/** Apache2 mod_vhost_alias fix - makes $_SERVER['DOCUMENT_ROOT'] always correct */
$_SERVER['DOCUMENT_ROOT'] = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['SCRIPT_FILENAME']);

/** Default path to web-application public resources */
if (!defined('__SAMSON_PUBLIC_PATH')) {
    define('__SAMSON_PUBLIC_PATH', 'www/');
}

/** Default path to web-application cache folder */
if (!defined('__SAMSON_CACHE_PATH')) {
    define('__SAMSON_CACHE_PATH', __SAMSON_PUBLIC_PATH . 'cache/');
}

/** Default path to web-application tests folder */
if (!defined('__SAMSON_TEST_PATH')) {
    define('__SAMSON_TEST_PATH', 'tests/');
}

/** Default path to install/update bash scripts folder */
if (!defined('__SAMSON_CONTRIB_PATH')) {
    define('__SAMSON_CONTRIB_PATH', 'contrib/');
}

/** If no specific vendor path is defined */
if (!defined('__SAMSON_VENDOR_PATH')) {
    define('__SAMSON_VENDOR_PATH', 'vendor/');
}

/** Default relative path from init script to __SAMSON_CWD__ */
if (!defined('__SAMSON_REL_PATH')) {
    define('__SAMSON_REL_PATH', '../');
}

/** Default path to web-application code root */
if (!defined('__SAMSON_APP_PATH')) {
    define('__SAMSON_APP_PATH', 'app/');
}

/** Default path to tests folder */
if (!defined('__SAMSON_CONFIG_PATH')) {
    define('__SAMSON_CONFIG_PATH', __SAMSON_APP_PATH.'config/');
}

/** Default path to web-application functional module controllers root */
if (!defined('__SAMSON_CONTROLLER_PATH')) {
    define('__SAMSON_CONTROLLER_PATH', __SAMSON_APP_PATH.'controller/');
}

/** Default path to web-application module models root */
if (!defined('__SAMSON_MODEL_PATH')) {
    define('__SAMSON_MODEL_PATH', __SAMSON_APP_PATH.'model/');
}

/** Default path to web-application module views root */
if (!defined('__SAMSON_VIEW_PATH')) {
    define('__SAMSON_VIEW_PATH', __SAMSON_APP_PATH.'view/');
}

/** Default path to web-application default template view */
if (!defined('__SAMSON_DEFAULT_TEMPLATE')) {
    define('__SAMSON_DEFAULT_TEMPLATE', __SAMSON_VIEW_PATH.'index.php');
}

/** Get current web-application root folder */
if (!defined('__SAMSON_CWD__')) {
    define('__SAMSON_CWD__', realpath(str_ireplace('\\', '/', getcwd() . '/').'../').'/');
}

/** Get current relative url base */
if(!defined('__SAMSON_BASE__')) {
    /**
     * Defining base url for framework, we take web-server document root and path to script that
     * has started all this process, and remove document root from it, if we are running the script
     * from internal folder, does not matter any depth of it, we will always get correct relative
     * path in document root, and so this would be our url base for all resources and links.
     */
    define(
        '__SAMSON_BASE__',
        str_ireplace(
            __SAMSON_PUBLIC_PATH,
            '',
            str_ireplace($_SERVER['DOCUMENT_ROOT'], '', dirname($_SERVER['SCRIPT_FILENAME']).'/')
        )
    );
}

/** Flag that this script runs from remote app */
define('__SAMSON_REMOTE_APP', __SAMSON_BASE__ !== '/');

/** Максимальное время выполнения скрипта */
define( '__SAMSON_MAX_EXECUTION__', 120 );

/** Действие контроллера выполнено успешно */
define( 'A_SUCCESS', TRUE );

/** Действие контроллера НЕ выполнено */
define( 'A_FAILED', FALSE );

/** Путь к файлу с глобальными данными модуля */
define( '__SAMSON_GLOBAL_FILE', 'global.php' );

//[PHPCOMPRESSOR(remove,start)]

/** SamsonPHP copyright */
if (!defined('__SAMSON_COPYRIGHT')) {
    define('__SAMSON_COPYRIGHT', '<!-- This site is working under SamsonPHP framework http://samsonphp.com  -->');
}
//[PHPCOMPRESSOR(remove,end)]