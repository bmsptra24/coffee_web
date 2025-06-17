<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
    public $baseURL = 'http://localhost:8080/';
    public $indexPage = '';
    public $uriProtocol = 'PATH_INFO';
    public $defaultLocale = 'en';
    public $supportedLocales = ['en', 'id'];
    public $defaultTimezone = 'Asia/Jakarta';
    public $dateFormat = 'Y-m-d';
    public $timeFormat = 'H:i:s';
    public $appTimeFormat = 'Y-m-d H:i:s';
    public $sessionDriver = 'CodeIgniter\Session\Handlers\FileHandler';
    public $sessionPath = WRITEPATH . 'session';
    public $sessionSavePath = null;
    public $sessionMatchIP = false;
    public $sessionTimeToUpdate = 300;
    public $sessionRegenerateDestroy = false;
    public $cookiePrefix = '';
    public $cookieDomain = '';
    public $cookiePath = '/';
    public $cookieSecure = false;
    public $cookieHTTPOnly = true;
    public $cookieSameSite = 'Lax';
    public $CSRFProtection = false;
    public $CSRFTokenName = 'csrf_test_name';
    public $CSRFCookieName = 'csrf_cookie_name';
    public $CSRFExpire = 7200;
    public $CSRFRegenerate = true;
    public $CSRFRedirect = false;
    public $CSRFSameSite = 'Lax';
    public $throttleSeconds = 1;
    public $contentSecurityPolicy = false;
    public $cspNonce = true;
    public $CSPEnabled = false;
    public $forceGlobalSecureRequests = false;
    public array $allowedHostnames = [];
    public bool $negotiateLocale = false;
    public string $appTimezone = 'Asia/Jakarta';
    public array $proxyIPs = [];
}
