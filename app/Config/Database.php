<?php

namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    public $defaultGroup = 'default';

    public $default = [
        'DSN'      => '',
        'hostname' => '127.0.0.1', // Sesuaikan dengan host database Anda
        'username' => '', // Ganti dengan username database Anda (misal: 'root')
        'password' => '', // Ganti dengan password database Anda
        'database' => '', // Ganti dengan nama database Anda (misal: 'cafe_db')
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => true, // Set false di lingkungan produksi
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306, // Port default MySQL
    ];

    public $tests = [
        'DSN'      => '',
        'hostname' => '127.0.0.1',
        'username' => '',
        'password' => '',
        'database' => ':memory:',
        'DBDriver' => 'SQLite3',
        'DBPrefix' => 'db_',
        'pConnect' => false,
        'DBDebug'  => true,
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306,
    ];

    public function __construct()
    {
        parent::__construct();

        // Mengambil kredensial dari file .env
        if (ENVIRONMENT !== 'testing') {
            if (empty($this->default['hostname'])) {
                $this->default['hostname'] = env('database.default.hostname') ?? '127.0.0.1';
            }
            if (empty($this->default['username'])) {
                $this->default['username'] = env('database.default.username') ?? 'root'; // Default XAMPP/MAMP
            }
            if (empty($this->default['password'])) {
                $this->default['password'] = env('database.default.password') ?? ''; // Default XAMPP/MAMP
            }
            if (empty($this->default['database'])) {
                $this->default['database'] = env('database.default.database') ?? 'cafe_db'; // Default database name
            }
            if (empty($this->default['DBDriver'])) {
                $this->default['DBDriver'] = env('database.default.DBDriver') ?? 'MySQLi';
            }
            if (empty($this->default['port'])) {
                $this->default['port'] = (int) (env('database.default.port') ?? 3306);
            }
        }
    }
}
