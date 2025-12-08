<?php
namespace App\Core;

use Illuminate\Database\Capsule\Manager as Capsule;

class Model
{
    public static function init()
    {
        $cfg = require __DIR__ . '/../../config/database.php';

        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'   => 'pgsql',
            'host'     => $cfg['host'],
            'port'     => $cfg['port'],
            'database' => $cfg['dbname'],
            'username' => $cfg['user'],
            'password' => $cfg['pass'],
            'charset'  => 'utf8',
            'schema'   => 'public',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
